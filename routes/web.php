<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\RegisteredUserController;



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
    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('dashboard');
    route::get('/vertical-menu', [AdminController::class, 'verticalMenu']);

    //users-routes
    route::get('/users', [AdminController::class, 'showUsersList']);
    Route::post('/users/add', [AdminController::class, 'store']);
    Route::get('/users/add', [AdminController::class, 'showAddUser'])
     ->name('add-user');
    route::get('/users/delete/{id}', [AdminController::class, 'deleteUser'])
     ->name('delete-user');
    route::post('/users/edit/{id}', [AdminController::class, 'editUsers'])->name('edit');
    route::get('/edit/{id}', [AdminController::class, 'getEdit']) ->name('edit-user');

    route::get('/empty', [AdminController::class, 'empty'])
        ->name('empty');

    route::get('/tables', [AdminController::class, 'tables']);
    route::get('/users/list', [AdminController::class, 'usersList']);
    route::get('/vertical-menu', [AdminController::class, 'verticalMenu']);

    route::get('/profile/admin', [AdminController::class, 'adminProfile'])
    ->name('admin-profile');

    //project side
    route::get('/projects/add', [ProjectController::class, 'addProjectPage'])
    ->name('add-project-page');

    route::get('/projects', [ProjectController::class, 'getProjects'])
        ->name('projects');

    route::post('/projects/add', [ProjectController::class, 'addProjects'])
        ->name('add-project');

    route::post('/project/edit/{id}', [ProjectController::class, 'editProject'])
        ->name('edit-project');

    route::get('/project/edit/{id}', [ProjectController::class, 'editProjectPage'])
        ->name('edit-projects-page');

    route::get('/project/delete/{id}', [ProjectController::class, 'deleteProject'])
    ->name('delete-project');

//customer
    route::get('/customers', [AdminController::class, 'showCostumersList'])->name('customers');
    Route::post('/customers/add', [AdminController::class, 'storeCustomer']);
    Route::get('/customers/add', [AdminController::class, 'showAddCustomer'])
    ->name('add-customers');

    Route::get('/customers/delete/{id}', [AdminController::class, 'deleteCustomer'])
    ->name('delete-customers');



    route::post('/customers/edit/{id}', [AdminController::class, 'editCustomers'])->name('edit-customer');
    route::get('/edit/{id}', [AdminController::class, 'getCustomer']) ->name('edit-customer-page');

});

Route::group(['middleware' => ['role:employee','first.time.login']], function() {
    route::get('/calendar', [EmployeeController::class, 'calendar'])
    ->name('calendar');

    route::get('/dashboard/employee', [EmployeeController::class, 'dashboardEmployee'])
    ->name('dashboard-employee');

    route::get('/worklog', [EmployeeController::class, 'workLog'])
    ->name('work-log');

    route::get('profile/employee', [EmployeeController::class, 'employeeProfile'])
    ->name('employee-profile');
});


