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
        view('first');//first.blade.php
    }
}
