<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function jsonDataGet(){
        //For Get Third Party API
        $result = Http::get('https://jsonplaceholder.typicode.com/users');
        foreach(json_decode($result) AS $res){
            echo "<pre>";
                print_r($res->name);
            echo "</pre>";
        };

    }
}
