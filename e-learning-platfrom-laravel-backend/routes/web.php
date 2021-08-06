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
Route::get('/api', 'AdminController@userJson');

Route::get('/note', 'NoteController@index');

Route::get('/registration', 'RegistrationController@index')->name('registration.index');
Route::post('/registration', 'RegistrationController@verify');

Route::get('/profile', 'ProfileController@index');

Route::get('/dashboard', 'DashBoardController@verify')->name('dashboard');
Route::get('/student', 'StudentController@index');

Route::get('/instructor', 'InstructorController@index');
Route::get('/supportstaff', 'SupportstaffController@index');
Route::get('/courses/list', 'CourseController@index')->name('courses');
Route::get('/courses/create', 'CourseController@create');
Route::get('/courses/delete', 'CourseController@delete')->name('course.delete');
Route::get('/courses/edit', 'CourseController@edit')->name('course.edit');

Route::get('/instructor/list', 'InstructorController@index')->name('instructor.index');
// Route::get('/instructor/create', 'InstructorController@create');
// Route::get('/instructor/delete', 'InstructorController@delete')->name('instructor.delete');
// Route::get('/instructor/edit', 'InstructorController@edit')->name('instructor.edit');;
Route::get('/student', 'StudentController@index')->name('student.index');
Route::get('/profile/{id}', 'AdminController@profile')->name('profile');
Route::get('/notice/list', 'AdminController@noticeList')->name('notice');
Route::get('/notice/{id}/download', 'AdminController@NoticeDownload')->name('notice.download');
Route::group(['middleware' => ['sess']], function () {
});
Route::group(['middleware' => ['type']], function () {
    Route::get('/admin/notice/notice', 'AdminController@notice')->name('notice.list');

    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/student/list', 'AdminController@listStudent')->name('student.list');
    Route::get('/admin/student/details/{id}', 'AdminController@detailsStudent')->name('student.details');
    Route::get('/admin/student/edit/{id}', 'AdminController@editStudent')->name('student.edit');
    Route::post('/admin/student/edit/{id}', 'AdminController@updateStudent');
    Route::get('/admin/student/delete/{id}', 'AdminController@deleteStudent')->name('student.delete');
    Route::post('/admin/student/delete/{id}', 'AdminController@destroyStudent');
    Route::get('/admin/student/list/download_student_data', 'AdminController@sheetStudent')->name('student.sheet');
    Route::get('/admin/student/list/search', 'AdminController@searchStudent')->name('student.search');

    Route::get('/admin/instructor/list', 'AdminController@listInstructor')->name('instructor.list');
    Route::get('/admin/instructor/details/{id}', 'AdminController@detailsInstructor')->name('instructor.details');
    Route::get('/admin/instructor/edit/{id}', 'AdminController@editInstructor')->name('instructor.edit');
    Route::post('/admin/instructor/edit/{id}', 'AdminController@updateInstructor');
    Route::get('/admin/instructor/delete/{id}', 'AdminController@deleteInstructor')->name('instructor.delete');
    Route::post('/admin/instructor/delete/{id}', 'AdminController@destroyInstructor');
    Route::get('/admin/instructor/list/download_instructor_data', 'AdminController@sheetInstructor')->name('instructor.sheet');
    Route::get('/admin/instructor/list/search', 'AdminController@searchInstructor')->name('instructor.search');

    Route::get('/admin/stuff/list', 'AdminController@listStuff')->name('stuff.list');
    Route::get('/admin/stuff/list/add', 'AdminController@addStuff')->name('stuff.add');
    Route::post('/admin/stuff/list/add', 'AdminController@createStuff');
    Route::get('/admin/stuff/details/{id}', 'AdminController@detailsStuff')->name('stuff.details');
    Route::get('/admin/stuff/edit/{id}', 'AdminController@editStuff')->name('stuff.edit');
    Route::post('/admin/stuff/edit/{id}', 'AdminController@updateStuff');
    Route::get('/admin/stuff/delete/{id}', 'AdminController@deleteStuff')->name('stuff.delete');
    Route::post('/admin/stuff/delete/{id}', 'AdminController@destroyStuff');
    Route::get('/admin/stuff/list/download_stuff_data', 'AdminController@sheetStuff')->name('stuff.sheet');
    Route::get('/admin/stuff/list/search', 'AdminController@searchStuff')->name('stuff.search');

    Route::get('/admin/course/list', 'AdminController@listCourse')->name('course.list');
    Route::get('/admin/course/details/{id}', 'AdminController@detailsCourse')->name('course.details');
    Route::get('/admin/course/edit/{id}', 'AdminController@editCourse')->name('course.edit');
    Route::post('/admin/course/edit/{id}', 'AdminController@updateCourse');
    Route::get('/admin/course/delete/{id}', 'AdminController@deleteCourse')->name('course.delete');
    Route::post('/admin/course/delete/{id}', 'AdminController@destroyCourse');
    Route::get('/admin/course/list/download_course_data', 'AdminController@sheetCourse')->name('course.sheet');
    Route::get('/admin/course/list/search', 'AdminController@searchCourse')->name('course.search');

    Route::post('/files', 'AdminController@data');
});

/*function () {
    //echo "it works...";
   // return view('login.index');
});*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');