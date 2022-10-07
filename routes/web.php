<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HasOneController;

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

//Laravel Breeze
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
//End Breeze



Route::get('/', function () {
    return view('welcome');
});

Route::get('/first', [SiteController::class, "first"]);
Route::get('/first-view', [SiteController::class, 'firstView']);
// Route::get('/first-view', function(){
//     return view("first");
// });


//Basic Routings
// Route::get('/about', function(){
//     return '<h1>Basic Routings</h1>';
// });

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

// Route::get('/about', function() {
//     return view('about');
// });
Route::view('/about','about');
Route::view('/product','products');
//Component With Dynamic Value
Route::get('/about', function(){

    return view('about', ['page' => 'About Us Page']);
});

Route::get('/home', function(){
    return view('home', ['page' => 'Home Page']);
});


//Registration Start Here
Route::get('/registration', [StudentController::class, 'registrationForm']);
Route::post('/save_detail', [Studentcontroller::class, 'saveDetail']);
Route::get('/delete_record/{id}', [Studentcontroller::class, 'deleteRecord']);
Route::match(['Get', 'Post'], 'edit_record/{id?}', [Studentcontroller::class, 'editRecord']);

//Sum In an Array
Route::get('/find-sum', [SiteController::class, 'findSum']);

// Use DB updateData
Route::get('get-data', [CrudController::class, 'getRecord']);
Route::get('insert-data', [CrudController::class, 'insertData']);
Route::get('update-data', [CrudController::class, 'updateData']);
Route::get('delete-data', [CrudController::class, 'deleteData']);

// Middleware
Route::middleware(['web'])->group(function(){ 
    Route::get('/routeOne', function(){
        echo '<h3>Route One<h3>';
    });
    Route::get('/routeTwo', function(){
        echo '<h3>Route Two<h3>';
    });
    Route::get('/routeThree', function(){
        echo '<h3>Route Three<h3>';
    });
    Route::get('/routeFour', function(){
        echo '<h3>Route Four<h3>';
    });
});
    
Route::view('/noaccess', 'noaccess');
//Third Party Data
Route::get('/json-placeholder', [PostController::class, 'jsonDataGet']);
//Language 
Route::view('/language', 'language');

//Eloquent ORM One To One
Route::get('hasOne', [ServiceController::class, 'hasOne']);
Route::get('oneToMany', [ServiceController::class, 'oneTwoMany']);

//One To Many
Route::get('/hasMany', [ServiceController::class, 'hasMany']);
Route::get('/hasManyPost', [ServiceController::class, 'hasManyPost']);

//Belongs To many
Route::get('/belongsToMany', [ServiceController::class, 'belongsToMany']);

//Has One Controller
Route::get('hasOneThrough', [HasOneController::class, 'hasOneThrough']);