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

    public function findsum(){
        $arr1 = [1,2,3,8];
        $sum = 10;
        $num = 0;
        for($i =0; $i < count($arr1); $i++){
            for($j =0; $j < count($arr1); $j++){
                if($arr1[$i] + $arr1[$j] == $sum){
                    echo true,'<br/>';
                }
            }
        }
    }
}
