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

    public function printName(Request $request){
        return $request->name;
        // $n = ['name' => $name, 'email' => $email];
        // return view('multimediaView', $n);

        $n = ['name' => $name, 'email' => $email];
        // $name = $name;
        // $email = $email;
        return view('multimediaView', compact('n'));
    }
}
