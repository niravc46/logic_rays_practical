For Run This Project

1. Clone This Project
2. Setup databse phpMyadmin
3. Compy .env.example file to .env file
4. Run Migration Command:  php artisan migrate
5. Run Seeder Command: php artisan db:seed
6. start local server: php artisan serve
7. Hit Api in postman for create new order

 http://127.0.0.1:8000/api/order/create

payload: 
{
    "products": [
        {
            "product_id": 1
        },
        {
            "product_id": 2
        },
        {
            "product_id": 5
        },
        {
            "product_id": 6
        }
    ]
}

8. Hit the api for get order

http://127.0.0.1:8000/api/order/1
