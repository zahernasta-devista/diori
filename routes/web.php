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
    return view('auth.login');
});

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


//admin side
    route::get('/index/admin', [AdminController::class, 'index']);
    route::get('/datatable', [AdminController::class, 'datatable']);
    route::get('/empty', [AdminController::class, 'empty']);
    route::get('/tables', [AdminController::class, 'tables']);
    route::get('/userslist', [AdminController::class, 'userslist']);
    route::get('/verticalmenu', [AdminController::class, 'verticalmenu']);
    route::get('/profile/admin', [AdminController::class, 'adminProfile']); //project table

//project-admin
    route::get('/addProject', [ProjectController::class, 'addProject']);


//employee side
    route::get('/calendar2', [EmployeeController::class, 'calendar2']);
    route::get('/index/employee', [EmployeeController::class, 'index2']);
    route::get('/worklog', [EmployeeController::class, 'workLog']);
    route::get('/index4', [EmployeeController::class, 'index4']);
    route::get('/index5', [EmployeeController::class, 'index5']);
    route::get('profile/employee', [EmployeeController::class, 'employeeProfile']);





