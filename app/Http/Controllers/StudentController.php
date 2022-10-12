<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Support\Facades\Cache;
use App\Mail\StudentMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentMarkdownMail;

class StudentController extends Controller
{
    public function registrationForm(){

        $data = cache()->remember('students', 120, function () {
            // return DB::table('users')->get();
            return Student::whereLname('Khanna')->orderBy('id','DESC')->get();;
        });

        // $data = DB::table('students')->select('*')->get();
        // $data = Student::withTrashed()->select('*')->get();

        // $data = Student::whereLname('Khanna')->orderBy('id','DESC')->get();

        #$data = Student::skip(3)->take(5)->get();// Or
        #$data = Student::offset(3)->limit(5)->get();

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

            cache()->flush();

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
        // $id = Student::destroy([1,2,3,4,5]);
        cache()->flush();
        $request->session()->flash('delete', 'Deleted Successfully');
        return redirect()->to('/registration');
    }

    public function editRecord(Request $request){
        
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


            $result = Student::find($request->id);
            $result->fname = $request->fname;
            $result->lname = $request->lname;
            $result->mobile = $request->mobile;
            $result->save();

            cache()->flush();
            // $id = $result->id;

            // $request->session()->flash('success', 'Updated Successfully');

            // $result = DB::table('students')->where('id',$request->id)->update([
            // 'fname' => $request->fname,
            // 'lname' => $request->lname,
            // 'mobile' => $request->mobile,
            // ]);
            $request->session()->flash('success', 'Updated Successfully');
            return redirect()->to('/registration');
        }else{
            // return $request->id;
            $dataa = Student::findOrFail($request->id);
            // return view('/update-form', ['dataa' => $data]);
            // return $data;
            $all_data = Student::orderBy('id','DESC')->get();
            return view('/registration-form', ['dataa' => $dataa, 'data'=>$all_data]);
        }
    }

    public function sendEmail(){
        $details = [
            'title' => 'Testing Mail',
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'
        ];

        Mail::to('qdkhan05@gmail.com')->send(new StudentMail($details));
        Mail::to('qdkhan05@gmail.com')->send(new StudentMarkdownMail($details));
    }
}
