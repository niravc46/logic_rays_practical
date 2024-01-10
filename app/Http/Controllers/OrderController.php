<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Traits\HttpResponses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use HttpResponses;

    protected $order, $product;
    public function __construct(Order $order, Product $product)
    {
        $this->product = $product;
        $this->order = $order;
    }

    /**
     * Get Order with products.
     */
    public function getOrder($id)
    {
        try {
            $order_data = $this->order->select('id','timstamp',DB::raw("CASE WHEN (placed = 1) THEN 'true' ELSE 'false' END as placed"),'total_price','total_qty')->where('id', $id)->with('products:id,category,brand,name,price,qty,img_url')->first();
            return $this->success([$order_data], \Config::get('constants.GET_PRODUCT_SUCCESS'), 200);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Create Order.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $date_time = Carbon::now()->format('Y-m-d H:i:s');
            $price = 0;
            $quantity = 0;

            foreach ($request->products as $product) {
                $product = $this->product->where('id', $product['product_id'])->first();
                $price += $product->price;
                $quantity += $product->qty;
            }
            DB::commit();
            $order = $this->order->create([
                'total_qty' => $quantity,
                'total_price' => $price,
                'placed' => true,
                'timstamp' => $date_time,
            ]);
            $order_id = $order->id;
            $products = $request->products;

            $newArray = [];
            foreach ($products as $key => $val) {
                $newArray[$key]['product_id'] = $val['product_id'];
                $newArray[$key]['order_id'] = $order_id;
            }

            $order->products()->attach($newArray);

            return $this->success([], \Config::get('constants.PRODUCT_CREATED'), 200);
        } catch (\Exception $e) {
            DB::rollback();
            $e->getMessage();
        }
    }
}
