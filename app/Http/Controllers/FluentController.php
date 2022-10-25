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

        $slice = Str::of('\Illuminate\Http\Request')->append('\Xipetech');

        $slice = Str::of('\Illuminate\Http\Request')->lower();

        $slice = Str::of('\Illuminate\Http\Request')->replace('\Request','\Not Requested');

        $slice = Str::of('\illuminate\http\request')->replace('\request','\not requested')->title();

        $slice = Str::of('Hello And Welcome')->slug();

        $slice = Str::of('Hello And Welcome')->substr('6','5');

        return $slice;
    }
    
}
