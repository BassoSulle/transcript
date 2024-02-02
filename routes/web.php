<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\index_controller;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', function () {
//     notify()->success('Welcome to You Dashboard!.');
//     return view('index');
// });

// Auth::routes();

Route::get('login', [LoginController::class, 'show_login'])->name('login');

Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function() {

    Route::get('/', [index_controller::class, 'index'])->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/my_profile', [LoginController::class, 'userProfile'])->name('profile');

    Route::get('/change_password', [LoginController::class, 'changePassword'])->name('change_password');

    Route::get('/module', [index_controller::class, 'module'])->name('module');

    Route::get('/semister', [index_controller::class, 'semister'])->name('semister');

    Route::get('/department', [index_controller::class, 'department'])->name('department');

    Route::get('/course', [index_controller::class, 'course'])->name('course');

    Route::get('/grade', [index_controller::class, 'grade'])->name('grade');

    Route::get('/students', [index_controller::class, 'students'])->name('students');

    Route::get('/staffs', [index_controller::class, 'staffs'])->name('staffs');

    Route::get('/staffs/add', [index_controller::class, 'add_staff'])->name('add.staff');

    Route::get('/staffs/{staff}/edit', [index_controller::class, 'edit_staff'])->name('edit.staff');

    Route::get('/students', [index_controller::class, 'student'])->name('students');

});

//Student routes
// Route::get('student/dashboard', [index_controller::class, 'student_dashboard'])->name('student_dashboad');
// Route::get('staff/dashboard', [index_controller::class, 'staff_dashboard'])->name('staff_dashboad');


// Route::group(['prefex=>student','middleware'=>'auth'],function(){
//     Route::get('student/dashboard', [index_controller::class, 'student_dashboard'])->name('student_dashboad');


// });

// //Student routes
// Route::group(['prefex'=>'staff','middleware'=>'auth'],function(){
//     Route::get('staff/dashboard', [index_controller::class, 'staff_dashboard'])->name('staff_dashboad');


// });
    Route::get('/awards', [index_controller::class, 'awards'])->name('awards');

    Route::get('/nta_levels', [index_controller::class, 'nta_levels'])->name('nta_levels');

    Route::get('/course_semister_modules', [index_controller::class, 'courseSemisterModules'])->name('course_semister_modules');

    Route::get('/course_semister_modules/add', [index_controller::class, 'addCourseSemisterModules'])->name('add.course_semister_modules');

    Route::get('/course_semister_modules/{course}/edit', [index_controller::class, 'editCourseSemisterModules'])->name('edit.course_semister_modules');

    Route::get('/assign_modules/{staff}', [index_controller::class, 'assignModules'])->name('assign_modules');


    // Lecturer routes
    Route::prefix('lecturer')->group( function() {

        Route::post('/logout', [LoginController::class, 'logout'])->name('lecturer.logout');

        Route::get('/', [LecturerController::class, 'index'])->name('lecturer.dashboard');


    });


