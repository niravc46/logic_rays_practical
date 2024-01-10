<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        $date_time = Carbon::now()->format('Y-m-d H:i:s');
        DB::table('products')->insert([
            [
                'id' => 1,
                'category' => 'Electronics',
                'brand' => 'Samsung',
                'name' => 'TV',
                'price' => 15999,
                'qty' => 1,
                'img_url' => 'abc.com/image1.jpg',
                'created_at' => $date_time,
                'updated_at' => $date_time
            ],
            [
                'id' => 2,
                'category' => 'Electronics',
                'brand' => 'LG',
                'name' => 'Washing Machine',
                'price' => 17000,
                'qty' => 1,
                'img_url' => 'abc.com/image2.jpg',
                'created_at' => $date_time,
                'updated_at' => $date_time
            ],
            [
                'id' => 3,
                'category' => 'Home & Furniture',
                'brand' => 'Home Garage',
                'name' => 'Badsheets',
                'price' => 3000,
                'qty' => 1,
                'img_url' => 'abc.com/image3.jpg',
                'created_at' => $date_time,
                'updated_at' => $date_time
            ],
            [
                'id' => 4,
                'category' => 'Home & Furniture',
                'brand' => 'ABC Company',
                'name' => 'Dining Sets',
                'price' => 4000,
                'qty' => 8,
                'img_url' => 'abc.com/image4.jpg',
                'created_at' => $date_time,
                'updated_at' => $date_time
            ],
            [
                'id' => 5,
                'category' => 'Beauty',
                'brand' => 'CDF Company',
                'name' => 'Eye Makup',
                'price' => 800,
                'qty' => 1,
                'img_url' => 'abc.com/image5.jpg',
                'created_at' => $date_time,
                'updated_at' => $date_time
            ],
            [
                'id' => 6,
                'category' => 'Beauty',
                'brand' => 'Suger',
                'name' => 'Lipstic',
                'price' => 800,
                'qty' => 1,
                'img_url' => 'abc.com/image6.jpg',
                'created_at' => $date_time,
                'updated_at' => $date_time
            ],
            [
                'id' => 7,
                'category' => 'Toys',
                'brand' => 'EDV Company',
                'name' => 'Beer',
                'price' => 900,
                'qty' => 1,
                'img_url' => 'abc.com/image7.jpg',
                'created_at' => $date_time,
                'updated_at' => $date_time
            ],
            [
                'id' => 8,
                'category' => 'Toys',
                'brand' => 'EPF Company',
                'name' => 'transformer',
                'price' => 800,
                'qty' => 1,
                'img_url' => 'abc.com/image8.jpg',
                'created_at' => $date_time,
                'updated_at' => $date_time
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
