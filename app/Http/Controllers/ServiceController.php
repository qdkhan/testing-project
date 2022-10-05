<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Branch;
use App\Models\User;
use App\Models\Post;

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
        // $results = Student::with('branch')->get();
        // foreach($results AS $result){
        //     echo '<pre>';
        //     echo $result->fname;
        //     print_r($result->branch->course_name);
        //     echo '</pre>';
        // }

        //Inverse of hasOne
        // $result = Branch::find(2)->student;
        $results = Branch::with('student')->get();
        foreach($results AS $result){
            echo '<pre>';
            echo $result->student->fname.' '.$result->student->lname.' => '.$result->course_name;
            // print_r($result->course_name);
            echo '</pre>'; 
        }
    }

    public function oneTwoMany(){
        // $result = Student::find(2)->oneToMany;
        // return $result;

        //Inverse of hasmany
        // $result = Branch::find(3)->belongsToMany;
        // return $result;
    }

    public function hasMany(){
        $results = Student::with('branches')->get();
        // return $results;
        foreach($results as $result){
            echo '<pre>';
            $name = $result->fname.' '.$result->lname;
            foreach($result->branches as $branch){
                 $course_name = $branch->course_name.'</br>';
                 print_r($name.'=>'.$course_name);
            }
            // print_r($name.'=>'.$course_name);
            echo '</pre>'; 
        }
    }

    public function hasManyPost(){
        /* $results = User::with('post')->get();
        // return $results;
        foreach($results AS $result){
            echo '<pre>';
            $name = $result->name.' => <i>'.$result->email.'</i> => <b>'.$result->post->posts.'</b>';
            print_r($name);
            echo '</pre>'; 
        } */

        /* $results = Post::with('user')->get();
        return $results;
        foreach($results AS $result){
            echo '<pre>';
            $name = $result->name.' => <i>'.$result->email.'</i> => <b>'.$result->post->posts.'</b>';
            print_r($name);
            echo '</pre>'; 
        } */

        $results = User::whereHas('posts',function($query){
            $query->where('posts', 'like', '%porro%');
        })->with('posts')->get();
        // $results = User::doesntHave('posts')->with('posts')->get();
        // return $results;
        foreach($results AS $result){
            echo '<pre>';
            $name = $result->name.' => <i>'.$result->email;
            foreach($result->posts AS $post){
                $post = $post->posts;
                print_r($name.' Post=>'.$post.'<br/>');
            }
            
            echo '</pre>'; 
        }
    }

    //Belongs To Many
    public function belongsToMany(){
        $results = Post::with(['user','tags'])->get();
        // return $results;
        foreach ($results as $result){
            $post = ' Post => '.$result->posts;
            $user = ' User Name => '.$result->user->name;
            print_r($post.'<br/>');
            print_r($user.'<br/>');

            foreach($result->tags AS $tag){
                $language = ' Language=> '.$tag->name;
                print_r($language.'<br/>');
            }
        }
    }
}
