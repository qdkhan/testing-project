<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function registrationForm(){
        return view('registration-form');
    }

    public function saveDetail(Request $request){
        print_r($request->all());

        return view('registration-form');
        // return redirect('registration');
    }
}
