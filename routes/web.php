<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;


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

// Route::get('student', [Controller::class, 'student'])->name('student');

//student 
// Route::get('student-table', [StudentController::class, 'student_table'])->name('student_table');
// Route::get('edit-student/{id?}', [StudentController::class, 'student_profile'])->name('edit-student');
// Route::post('update-student', [StudentController::class, 'student_update'])->name('update-student');
// Route::get('delete-student/{id?}', [StudentController::class, 'delete_student'])->name('delete-student');
// Route::post('search_student',[StudentController::class,'student_table'])->name('search_student');

//College

// Route::get('college-table', [CollegeController::class, 'college_table'])->name('college_table');
// Route::get('edit-college/{id?}', [CollegeController::class, 'college_profile'])->name('edit-college');
// Route::post('update-college', [CollegeController::class, 'college_update'])->name('update-college');
// Route::get('delete-college/{id?}', [CollegeController::class, 'delete_college'])->name('delete-college');
// Route::post('search_college',[CollegeController::class,'college_table'])->name('search_college');



Route::get('deshboard', [Controller::class, 'template'])->name('index');

Route::get('registration', [Controller::class, 'add'])->name('registration');
Route::post('add_registration', [Controller::class,'registration_post'])->name('registration-add');
Route::get('login', [Controller::class, 'login']);
Route::get('logout', [Controller::class, 'logout'])->name('logout');
Route::post('loginuser', [Controller::class, 'loginuser'])->name('login');


// Route::group(['middleware' => ['auth', 'role_Admin']], function () {

// Route::group(['middleware' => 'auth', 'role_User'index], function () {

Route::group(['middleware' => 'usersession'], function () {



Route::get('table/{role_id?}', [Controller::class, 'table'])->name('table-basic');


Route::get('email', [Controller::class, 'email']);
Route::get('edituser/{id?}', [Controller::class, 'profile'])->name('edituser');
Route::post('update-profile', [Controller::class, 'update'])->name('update-profile');

Route::get('delete/{id?}', [Controller::class, 'delete'])->name('delete');


// Route::post('search_user',[Controller::class,'table'])->name('search_user');

});







