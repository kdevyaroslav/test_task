<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;

class ParserController extends Controller
{
    public function rozetkaParse(){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'http://localhost:3000');

        $content = $response->getBody()->getContents();

        $images = array_slice(json_decode($content), 0, 8);

        return Helper::response(true, $images);   
    }
}
