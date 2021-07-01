<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
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

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});
Route::get('login/', 'LoginController@index')->name('login');
Route::post('login/', 'Auth\LoginController@login');

Route::get('logout/', 'Auth\LoginController@index')->name('logout');;
Route::post('logout/', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/note', 'NoteController@index');

Route::get('/registration', 'RegistrationController@index')->name('registration.index');
Route::post('/registration', 'RegistrationController@verify');

Route::get('/profile', 'ProfileController@index');

Route::get('/dashboard', 'DashBoardController@index');
Route::get('/student', 'StudentController@index');

Route::get('/instructor', 'InstructorController@index');
Route::get('/supportstaff', 'SupportstaffController@index');
Route::get('/courses/list', 'CourseController@index');
Route::get('/courses/create', 'CourseController@create');
Route::get('/courses/delete', 'CourseController@delete')->name('course.delete');
Route::get('/courses/edit', 'CourseController@edit')->name('course.edit');

Route::get('/instructor/list', 'InstructorController@index')->name('instructor.index');
Route::get('/instructor/create', 'InstructorController@create');
Route::get('/instructor/delete', 'InstructorController@delete')->name('instructor.delete');
Route::get('/instructor/edit', 'InstructorController@edit')->name('instructor.edit');;


Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/student/list', 'AdminController@list')->name('student.list');
Route::get('/admin/student/details/{id}', 'AdminController@details')->name('student.details');
Route::get('/admin/student/edit/{id}', 'AdminController@edit')->name('student.edit');
Route::post('/admin/student/edit/{id}', 'AdminController@updateStudent');
Route::get('/admin/student/delete/{id}', 'AdminController@deleteStudent')->name('student.delete');
Route::post('/admin/student/delete/{id}', 'AdminController@destroy');
Route::get('/admin/student/list/download_student_data', 'AdminController@sheet')->name('student.sheet');
Route::get('/admin/student/list/search', 'AdminController@search')->name('student.search');



/*function () {
    //echo "it works...";
   // return view('login.index');
});*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');