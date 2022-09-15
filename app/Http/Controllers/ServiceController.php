<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function service(){
        return view('first');
    }

    function routingParametre($name = null){
        print_r($name);
    }
}
