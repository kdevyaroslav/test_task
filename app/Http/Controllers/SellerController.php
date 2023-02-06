<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use Validator;
use App\Helper;

class SellerController extends Controller
{
    public function setData(Request $request){
        $validator = Validator::make($request->all(), [
            'seller_name' => 'required|string|unique:sellers,seller_name',
        ]);

        if($validator->fails()){
            return Helper::responseErrors($validator);
        }

        $seller = Seller::create($request->all());

        return Helper::response(true, ['id' => $seller->id]);
    }
}
