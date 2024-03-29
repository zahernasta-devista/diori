<?php

use App\Http\Controllers\ChangePasswordProfileController;
use App\Mail\ReportsMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ExcelController;


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
use App\Http\Controllers\MyController;
  
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
})->middleware('guest');


require __DIR__ . '/auth.php';

route::post('profile/password/change', [ChangePasswordProfileController::class, 'store'])
    ->name('profile-change-password');

Route::get('export', [ExcelController::class, 'export'])->name('export');


Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(['auth','first.time.login']);
//only admin
route::get('/dashboard/admin-access',[UserController::class,'multipleAccess'])
    ->name('dashboard-admin')
    ->middleware(['auth','first.time.login']);
route::get('/dashboard/employee-access',[UserController::class,'multipleAccessEmployee'])
    ->name('dashboard-employee')
    ->middleware(['auth','first.time.login']);

//middleware role admin
Route::group(['middleware' => ['role:admin','auth', 'first.time.login']], function () {

    route::get('/vertical-menu', [AdminController::class, 'verticalMenu']);

    route::get('/empty', [AdminController::class, 'empty'])
        ->name('empty');

    route::get('/tables', [AdminController::class, 'tables']);

    route::get('/profile/admin', [AdminController::class, 'adminProfile'])
        ->name('admin-profile');
      
       

        //employees
    route::get('/users', [AdminController::class, 'showUsersList']);

    Route::post('/users/add', [AdminController::class, 'store']);

    Route::get('/users/add', [AdminController::class, 'showAddUser'])
        ->name('add-user');

    route::get('/users/delete/{id}', [AdminController::class, 'deleteUser'])
        ->name('delete-user');

    route::get('/users/edit/{id}', [AdminController::class, 'getEdit'])
        ->name('edit-user');

    route::post('users/edit/{id}', [AdminController::class, 'editUsers'])
        ->name('edit-user');


    //admin
    route::get('/admin/delete/{id}', [AdminController::class, 'deleteAdmin'])
        ->name('delete-admin');

    route::get('/admin/edit/{id}', [AdminController::class, 'getEditAdmin'])
        ->name('edit-admin');


    route::post('admin/edit/{id}', [AdminController::class, 'editAdmin'])
        ->name('edit-admin');

    route::get('credentials/edit/{id}', [AdminController::class, 'editAdminCredentialsPage'])
        ->name('edit-credentials-admin');

    route::post('credentials/edit/{id}', [AdminController::class, 'editAdminCredentials'])
        ->name('edit-credentials-admin');

    route::get('/admin/list', [AdminController::class, 'adminList'])
        ->name('admins');

    route::get('/user/change/admin/{id}', [AdminController::class, 'makeAdmin'])
        ->name('change-to-admin');

    route::get('/user/change/employee/{id}', [AdminController::class, 'makeEmployee'])
        ->name('change-to-employee');

    route::get('/calendar', [AdminController::class, 'calendar'])
        ->name('calendar');
    route::get('/timesheet-response', [AdminController::class, 'timeSheetResponse'])
        ->name('timesheet-response');


    //checkbox
    route::post('/projects/delete/checkbox', [AdminController::class, 'deleteUsingCheckBoxesProjects'])
        ->name('delete-checkbox-project');

    route::post('/employee/delete/checkbox', [AdminController::class, 'deleteUsingCheckBoxesEmployees'])
        ->name('delete-checkbox-employee');

    route::post('/customer/delete/checkbox', [AdminController::class, 'deleteUsingCheckBoxesCustomer'])
        ->name('delete-checkbox-customer');

    route::post('/admin/delete/checkbox', [AdminController::class, 'deleteUsingCheckBoxesAdmin'])
        ->name('delete-checkbox-admin');


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

    route::get('/projects/assign/{id}', [AdminController::class, 'assignProjectToPage'])
        ->name('assign-project-page');

    route::post('/projects/assgin/{user_id}',[AdminController::class, 'assignEmployeeToProject'])
        ->name('assign-employee-project');

    //customer
    route::get('/customers', [AdminController::class, 'showCostumersList'])
        ->name('customers');

    Route::post('/customers/add', [AdminController::class, 'storeCustomer']);

    Route::get('/customers/add', [AdminController::class, 'showAddCustomer'])
        ->name('add-customers');

    Route::get('/customers/delete/{id}', [AdminController::class, 'deleteCustomer'])
        ->name('delete-customers');

    route::post('/customers/edit/{id}', [AdminController::class, 'editCustomers'])
        ->name('edit-customer');

    route::get('customers/edit/{id}', [AdminController::class, 'getCustomer'])
        ->name('edit-customer-page');

    //assign projects to employees
    route::post('/projects/unassign/{user_id}/{project_id}', [AdminController::class, 'unassignProject'])
        ->name('unassign-employee-project');

    route::get('/employee/projects/{id}', [AdminController::class, 'employeeProjectsAssignedPage'])
        ->name('employee-project-page');

    route::get('/customers/projects/{id}', [AdminController::class, 'customersProjectsAssignedPage'])
        ->name('customer-projects-page');
    //detail page for employee

    route::get('/users/detail/{id}', [AdminController::class, 'EmployeeDetail'])
        ->name('employee-detail');
    route::get('/response/detail/{id}', [AdminController::class, 'responseDetail'])
        ->name('response-detail');

    //summary
    Route::group(['prefix' => 'summary'], function () {
        route::get('/monthly', [AdminController::class, 'monthlySummary'])->name('monthly-summary');
        route::get('/weekly', [AdminController::class, 'weeklySummary'])->name('weekly-summary');
    });

    //filters
    route::get('/summary', [AdminController::class, 'filters'])->name('filters');

});
//middleware role employee
Route::group(['middleware' => ['role:employee','auth', 'first.time.login']], function () {
    route::get('/calendar', [EmployeeController::class, 'calendar'])
        ->name('calendar');

    route::get('/timesheet-response', [EmployeeController::class, 'timeSheetResponse'])
        ->name('timesheet-response');

    route::post('/timesheet/update', [EmployeeController::class, 'timeSheetUpdate'])
        ->name('timesheet-update');

    route::post('timesheet/add',[EmployeeController::class,'timeSheetAdd'])
        ->name('timesheet-add');

    route::post('/timesheet/delete', [EmployeeController::class, 'timeSheetDelete'])
        ->name('timesheet-delete');

    route::post('timesheet/update/date',[EmployeeController::class,'updateDateOfTimeLog'])
        ->name('timesheet-date-update');

    route::post('timesheet/clone',[EmployeeController::class,'timeSheetClone'])
        ->name('timesheet-clone');

    Route::get('profile/employee', [EmployeeController::class, 'employeeProfile'])
        ->name('employee-profile');

    Route::get('/project/{id}', [ProjectController::class, 'getProjectById'])
        ->name('get-one-project');

    Route::post('/worklog/add', [EmployeeController::class, 'worklogstore'])->name('worklog-add');

    Route::get('/restriction', [EmployeeController::class, 'worklogRestriction'])->name('worklog-restriction');

    Route::get('/extract/history', [EmployeeController::class, 'extractHistory'])->name('extract-history');


});
