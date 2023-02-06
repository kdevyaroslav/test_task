<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Helper;
use App\Models\Product;

class ProductController extends Controller
{
    public function setData(Request $request){
        $validator = Validator::make($request->all(), [
            'phone_name' => 'required|string|unique:products,phone_name',
            'seller_id'  => 'required|exists:sellers,id|integer',
            'display_size' => 'required|integer',
            'quantity' => 'required|integer',
            'cost' => 'required|integer'
        ]);

        if($validator->fails()){
            return Helper::responseErrors($validator);
        }

        Product::create($request->all());

        return Helper::response(true, 'Product successfully created');
    }

    public function getData(Request $request, $id){
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:sellers,id',
        ]);

        if($validator->fails()){
            return Helper::responseErrors($validator);
        }

        $data = Product::select('products.phone_name', 'sellers.seller_name')->where('seller_id', $id)->where('products.display_size', '>', 5)
        ->join('sellers', 'products.seller_id', '=', 'sellers.id')->get();

        return Helper::response(true, $data);
    }
}