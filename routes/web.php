<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/first', [SiteController::class, "first"]);
Route::get('/first-view', [SiteController::class, 'firstView']);
// Route::get('/first-view', function(){
//     return view("first");
// });


//Basic Routings
Route::get('/about', function(){
    return '<h1>Basic Routings</h1>';
});

//View Route
Route::get('/service', [ServiceController::class, 'service']);

Route::view('/service2', 'first');

//Route With Parametre
Route::get('/service3/{qdkhan?}', [ServiceController::class, 'routingParametre']);

//Redirect Route From One Route to another Route
Route::redirect('/redirect', '/service2');
Route::get('/fill-form', function(){
    return redirect('/about');
});

//Route::view('/multimedia/{email?}', 'multimediaView'); //OR
Route::get('/multimedia/{email?}', function($email){
    return view('multimediaView', ['email'  => $email]);
});

// Route::get('/view/{name}/{email}', [ServiceController::class, 'printName']);
Route::view('/view', 'multimediaView', [ 'names' => ['name' => 'Online exam', 'email' => 'onlineweb@xipetech.com']]);

Route::get('/json', function(){
    return view('json', ['names' => ['exam'=> 'Online exam', 'email' => 'onlinewebTutorials']]);
});
