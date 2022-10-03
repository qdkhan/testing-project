<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

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

    public function eloquentORM(){
        $result = Student::select('fname','lname')->with('branch')->find(2);
        return $result;
        
    }
}
