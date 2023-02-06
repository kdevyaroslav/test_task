<?php
namespace App;
use Validator;

class Helper
{
    public static function responseErrors($validator){
        return self::response(false, implode(',',$validator->messages()->all()));
    }

    public static function response(bool $state, $message){
        return [
            'success' => $state,
            'message' => $message
        ];
    }
}