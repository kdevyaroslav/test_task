CURL EXAMPLES

--------------------
/api/product/set_data

curl --request POST \
  --url 'http://localhost:8000/api/product/set_data?=' \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data 'phone_name=iphone 40' \
  --data seller_id=1 \
  --data display_size=123 \
  --data quantity=100 \
  --data cost=50
---------------------

---------------------
/api/product/get_data/{id}

curl --request GET \
  --url http://localhost:8000/api/product/get_data/2
---------------------

---------------------
/api/product/update_data_bulk/

curl --request POST \
  --url http://localhost:8000/api/product/update_data_bulk/ \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data 'ids[]=1' \
  --data 'ids[]=2' \
  --data cost=11111
---------------------

---------------------
/api/seller/set_data

curl --request POST \
  --url http://localhost:8000/api/seller/set_data \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data seller_name=perviy2
---------------------

---------------------
/api/bulk_insert

curl --request POST \
  --url http://localhost:8000/api/bulk_insert \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data 'products[0][phone_name]=asd' \
  --data 'products[0][seller_id]=1' \
  --data 'products[0][display_size]=123' \
  --data 'products[0][quantity]=11' \
  --data 'products[0][cost]=1' \
  --data 'products[1][phone_name]=asd1' \
  --data 'products[1][seller_id]=1' \
  --data 'products[1][display_size]=123' \
  --data 'products[1][quantity]=11' \
  --data 'products[1][cost]=1'
---------------------

---------------------
/api/parser

curl --request GET \
  --url http://localhost:8000/api/utilities/parser
---------------------


HOW TO SETUP:

1. composer install
2. php artisan migrate
3. npm i
4. node parser.js
5. php artisan serve