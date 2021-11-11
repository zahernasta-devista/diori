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


//admin side
Route::group(['middleware' => 'role:admin'], function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    route::get('/index/admin', [AdminController::class, 'index']);
    route::get('/datatable', [AdminController::class, 'datatable']);
    route::get('/empty', [AdminController::class, 'empty']);
    route::get('/tables', [AdminController::class, 'tables']);
    route::get('/users', [AdminController::class, 'getUser']);//TODO: Refactor naming to the convention (See the comments above)
    route::get('/vertical-menu', [AdminController::class, 'verticalmenu']); //TODO: Refactor naming
    route::get('/profile/admin', [AdminController::class, 'adminProfile']); //project table
    route::get('/addProject', [ProjectController::class, 'addProject']); //TODO: Refactor to the convention (See the comments above)
<<<<<<< Updated upstream
    Route::post('/addUser', [AdminController::class, 'store']);
    Route::get('/addUser', [AdminController::class, 'create'])
     ->name('addUser');

=======
    Route::post('/users/add', [AdminController::class, 'store']);
    Route::get('/users/add', [AdminController::class, 'create'])
     ->name('add-user');

   
>>>>>>> Stashed changes
    
    
    
                
});

//project-admin


//employee side
//    route::get('/calendar2', [EmployeeController::class, 'calendar2']);
//    route::get('/index/employee', [EmployeeController::class, 'index2']);
//    route::get('/worklog', [EmployeeController::class, 'workLog']);
//    route::get('/index4', [EmployeeController::class, 'index4']);
//    route::get('/index5', [EmployeeController::class, 'index5']);
//    route::get('profile/employee', [EmployeeController::class, 'employeeProfile']);





