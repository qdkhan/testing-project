<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;

class CrudController extends Controller
{
    public function getRecord(){
        $records = DB::select('SELECT name, phone, email from users');
        echo '<pre>';
            print_r($records);
        echo '</pre>';

        // $recordss = DB::table('users')->select('name', 'phone', 'email')->get();
        $recordss = DB::table('users')->select('name', 'phone', 'email')->get()->toArray();
        echo '<pre>';
            print_r($recordss);
            // foreach($recordss AS $record){
            //     print_r($record->name);
            // }
        echo '</pre>';
    }

    public function insertData(){
        // $result = DB::insert("INSERT into users(name,phone,email,password,address,profile) values(?,?,?,?,?,?)", ["Asish",9638527410,'ash@gmail.com',123456789,'New Delhi','abc.png']);

        $result = DB::table('users')->insertGetId([
            'name' => 'Soli Gupta KKR Developer',
            'phone' => 7894561230,
            'email' => 'solsol@gmaill.com',
            'password' => Hash::make(1231230),
            'address' => 'Lucknow',
            'profile' => 'abc.png',
        ]);
        // $id = $result->id;
        echo $result;
    }

    public function updateData(){
        // $result = DB::update("update users SET email = ?, name = ? WHERE id = ?", ['xipe@xipe.com', 'Xipetech India',18]);
        // print_r($result);

        $result = DB::table('users')->where('id', 18)->update([
            'name' => 'Akshay Saini',
            'phone'=> 9999999900,
            'email'=> 'akshay@gmail.com',
        ]);

        // print_r($result);
    }

    public function deleteData(){
        // $result = DB::delete("DELETE from users WHERE id = ?",[4]);
        // print_r($result);

        $result = DB::table('users')->where('id',3)->delete();
    }
}
