<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;



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
    return view('login');
});
//all Users
    route::get('/profile', [UserController::class, 'editprofile']); //project table
    route::get('/forgotpassword', [UserController::class, 'forgotpassword']);
    route::get('/register', [UserController::class, 'register']);
    route::get('/login', [UserController::class, 'login']);

//admin side
    route::get('/index/admin', [AdminController::class, 'index']);
    route::get('/datatable', [AdminController::class, 'datatable']);
    route::get('/empty', [AdminController::class, 'empty']);
    route::get('/tables', [AdminController::class, 'tables']);
    route::get('/userslist', [AdminController::class, 'userslist']);
    route::get('/verticalmenu', [AdminController::class, 'verticalmenu']);

//project-admin
    route::get('/addProject', [ProjectController::class, 'addProject']);


//employee side
    route::get('/calendar2', [EmployeeController::class, 'calendar2']);
    route::get('/index/employee', [EmployeeController::class, 'index2']);
    route::get('/index3', [EmployeeController::class, 'index3']);
    route::get('/index4', [EmployeeController::class, 'index4']);
    route::get('/index5', [EmployeeController::class, 'index5']);

