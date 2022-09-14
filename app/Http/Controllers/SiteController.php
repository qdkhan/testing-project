<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function first(){
        echo "Hello";
    }

    public function firstView(){
        // return 'Hello';
       return view('first');//first.blade.php
    }
}
