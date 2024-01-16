<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\index_controller;
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

Route::get('/index', [index_controller::class, 'index'])
->name('index');
Route::get('/module', [index_controller::class, 'module'])
->name('module');
Route::get('/semister', [index_controller::class, 'semister'])
->name('semister');
Route::get('/department', [index_controller::class, 'department'])
->name('department');
Route::get('/course', [index_controller::class, 'course'])
->name('course');
Route::get('/grade', [index_controller::class, 'grade'])
->name('grade');

// Auth::routes();


Route::get('login', [LoginController::class, 'show_login'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function() {

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('my_profile', [LoginController::class, 'userProfile'])->name('staff.profile');

    Route::get('change_password', [LoginController::class, 'changePassword'])->name('staff.change_password');

    Route::get('/', [index_controller::class, 'index'])->name('staff.dashboard');

    Route::get('/departments', [index_controller::class, 'departments'])->name('departments');
    
        
});