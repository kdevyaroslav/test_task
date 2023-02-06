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
            'phone_name' => 'required|string',
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
}
