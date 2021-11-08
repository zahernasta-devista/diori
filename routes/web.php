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
|--------------------------------------------------------------------------
| Routing Convention
|--------------------------------------------------------------------------
| To create a route in the correct way, it has to follow the following convention:
| /(name_of_model_plural_form)/(method_to_do)/(id)
| Real-life Example for adding a new employee:
| /employees/add
| Real-life example for updating an employee:
| /employees/edit/1
*/

Route::get('/', function () {
    return view('auth.login');
});


require __DIR__ . '/auth.php';

Route::group(['middleware' => ['role:admin','first.time.login']], function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    route::get('/index/admin', [AdminController::class, 'index']);
    route::get('/datatable', [AdminController::class, 'datatable']);
    route::get('/empty', [AdminController::class, 'empty']);
    route::get('/tables', [AdminController::class, 'tables']);
    route::get('/userslist', [AdminController::class, 'userslist']); //TODO: Refactor naming to the convention (See the comments above)
    route::get('/vertical-menu', [AdminController::class, 'verticalmenu']); //TODO: Refactor naming
    route::get('/profile/admin', [AdminController::class, 'adminProfile']);
    route::get('/addProject', [ProjectController::class, 'addProject']); //TODO: Refactor to the convention (See the comments above)
});

Route::group(['middleware' => 'role:employee'], function() {
    route::get('/calendar2', [EmployeeController::class, 'calendar2']);
    route::get('/index/employee', [EmployeeController::class, 'index2'])->middleware('first.time.login');
    route::get('/worklog', [EmployeeController::class, 'workLog']);
    route::get('/index4', [EmployeeController::class, 'index4']);
    route::get('/index5', [EmployeeController::class, 'index5']);
    route::get('profile/employee', [EmployeeController::class, 'employeeProfile']);
});


