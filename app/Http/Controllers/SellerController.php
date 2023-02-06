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
            'seller_name' => 'required|string',
        ]);

        if($validator->fails()){
            return Helper::responseErrors($validator);
        }

        Seller::create($request->all());

        return Helper::response(true, 'Seller successfully created');
    }
}
