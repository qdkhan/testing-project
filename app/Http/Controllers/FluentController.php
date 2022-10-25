<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class FluentController extends Controller
{
    public function fluentString(){
        // echo '<h1>Hello</h1>';

        $slice = Str::of('Hello And Welcome')->after('Hello');
        // return $slice;
        $slice = Str::of('\Illuminate\Http\Request')->afterLast('\\');
        return $slice;
    }
    
}
