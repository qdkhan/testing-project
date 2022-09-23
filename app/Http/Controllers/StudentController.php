<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function registrationForm(){
        return view('registration-form');
    }

    // public function saveDetail(Request $request){
        //Validation Using Validate
        /* if($request->isMethod('post')){
            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'mobile' => 'required',
            ],
            [
                'fname.required' => 'First name field is required',
                'lname.required' => 'Last name field is required',
                'mobile.required' => 'Mobile field is required',
            ]);
            print_r($request->all());
            return view('registration-form');
        } */


        
    // }

    /* public function saveDetail(StudentValidation $request){
        //make:request validator
        $request->validated();
        print_r($request->all());
        return view('registration-form');
    } */

    public function saveDetail(Request $request){
        print_r($request->all());

        return view('registration-form');
        // return redirect('registration');
        $validate = Validator::make($request->all(),
        [
            'fname' => 'required',
            'lname' => 'required',
            'mobile' => 'required',
        ],
        [
            'fname.required' => 'First name field is required',
            'lname.required' => 'Last name field is required',
            'mobile.required' => 'Mobile field is required',
        ]);
        if($validate->fails()) return redirect ('/registration')->withErrors($validate)->withInput();
        // if($validate->fails()) return Redirect::back()->withErrors($validate)->withInput();
        
        print_r($request->all());
        return view('registration-form');

    }
}
