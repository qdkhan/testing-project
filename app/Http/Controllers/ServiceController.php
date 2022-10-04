<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Branch;

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

    public function hasOne(){
        // $result = Student::find(2)->branch;
        // return $result;

        //Inverse of hasOne
        $result = Branch::find(2)->student;
        return $result;
        
    }

    public function oneTwoMany(){
        // $result = Student::find(2)->oneToMany;
        // return $result;

        //Inverse of hasmany
        // $result = Branch::find(3)->belongsToMany;
        // return $result;
    }
}
