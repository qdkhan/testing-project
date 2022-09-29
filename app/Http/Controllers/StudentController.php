<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Student;


class StudentController extends Controller
{
    public function registrationForm(){

        // $data = DB::table('students')->select('*')->get();
        // $data = Student::withTrashed()->select('*')->get();
        $data = Student::all();

        return view('registration-form', ['data' => $data]);
    }

    public function saveDetail(Request $request){
        //Validation Using Validate
        // return $request->all();
        if($request->isMethod('post')){
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
            // Query Builder
            // $id = DB::table('students')->insertGetId([
            //     'fname'     => $request->fname,
            //     'lname'     => $request->lname,
            //     'mobile'    => $request->mobile,
            // ]);

            // Using Model 
            $result = new Student;
            $result->fname = $request->fname;
            $result->lname = $request->lname;
            $result->mobile = $request->mobile;
            $result->save();

            $id = $result->id;

            $request->session()->flash('success', 'Inserted Successfully');
            // if($id) return view('registration-form');
            #if($id) return redirect('/registration'); // Or
            if($id) return redirect()->to('/registration');
            // print_r($request->all());
            // return view('registration-form');
        }


        
    }

    /* public function saveDetail(StudentValidation $request){
        //make:request validator
        $request->validated();
        print_r($request->all());
        return view('registration-form');
    } */

    // public function saveDetail(Request $request){
        // print_r($request->all());
    /* public function saveDetail(Request $request){
        print_r($request->all());

        // return view('registration-form');
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
        
        // print_r($request->all());
        return view('registration-form');

    } */

    public function deleteRecord(Request $request){
        // return $request->id;
        $id = Student::where('id', $request->id)->delete();
        $request->session()->flash('delete', 'Deleted Successfully');
        return redirect()->to('/registration');
    }
}
