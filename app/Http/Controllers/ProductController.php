<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Helper;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function setData(Request $request){
        $validator = Validator::make($request->all(), [
            'phone_name' => 'required|string|unique:products,phone_name',
            'seller_id'  => 'required|exists:sellers,id',
            'display_size' => 'required|integer|gt:0',
            'quantity' => 'required|integer|gt:0',
            'cost' => 'required|integer|gt:0'
        ]);

        if($validator->fails()){
            return Helper::responseErrors($validator);
        }

        Product::create($request->all());

        return Helper::response(true, 'Product successfully created');
    }

    public function getData(Request $request, $id){
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:sellers,id',
        ]);

        if($validator->fails()){
            return Helper::responseErrors($validator);
        }

        $data = Product::select('products.phone_name', 'sellers.seller_name')->where('seller_id', $id)->where('products.display_size', '>', 5)
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')->get();

        return Helper::response(true, $data);
    }

    public function updateData(Request $request){
        $validator = Validator::make($request->all(), [
            'ids' => 'required|array|min:1',
            'ids.*' => 'exists:products,id|distinct',
            'cost' => 'required|integer|gt:0'
        ]);

        if($validator->fails()){
            return Helper::responseErrors($validator);
        }

        Product::whereIn('id', $request->post('ids'))->update(['cost' => $request->post('cost')]);

        return Helper::response(true, 'Successfully updated');
    }

    public function bulkInsert(Request $request){
        $validator = Validator::make($request->all(), [
            'products' => 'required|array|min:1',
            'products.*.phone_name' => 'required|string|unique:products,phone_name|distinct',
            'products.*.seller_id' => 'required|exists:sellers,id',
            'products.*.display_size' => 'required|integer|gt:0',
            'products.*.quantity' => 'required|integer|gt:0',
            'products.*.cost' => 'required|integer|gt:0'
        ]);

        if($validator->fails()){
            return Helper::responseErrors($validator);
        }

        $products = array_map(function($product) { // it is not for and foreach :)
            $product['created_at'] = Carbon::now();
            $product['updated_at'] = Carbon::now();
            return $product;
        }, $request->post('products'));

        Product::insert($products);

        return Helper::response(true, 'Successfully inserted');
    }
}