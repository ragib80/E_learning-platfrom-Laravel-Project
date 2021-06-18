<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

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

Route::get('/login',['uses'=>'LoginController@index']); 

Route::post('/login','LoginController@verify');

Route::get('/home','HomeController@index');

Route::get('/note','NoteController@index');

Route::get('/profile','ProfileController@index');

Route::get('/dashboard','DashBoardController@index');
Route::get('/student','StudentController@index');
Route::get('/courses/list','CourseController@index');
Route::get('/registration','RegistrationController@index');
/*function () {
    //echo "it works...";
   // return view('login.index');
});*/

