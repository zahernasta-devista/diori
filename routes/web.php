<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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
    return view('index');
});
route::get('/index', [UserController::class, 'index']);
route::get('/calendar2', [UserController::class, 'calendar2']);
route::get('/datatable', [UserController::class, 'datatable']);
route::get('/profile', [UserController::class, 'editprofile']); //project table
route::get('/empty', [UserController::class, 'empty']);
route::get('/forgotpassword', [UserController::class, 'forgotpassword']);
route::get('/index2', [UserController::class, 'index2']);
route::get('/index3', [UserController::class, 'index3']);
route::get('/index4', [UserController::class, 'index4']);
route::get('/index5', [UserController::class, 'index5']);
route::get('/login', [UserController::class, 'login']);
route::get('/register', [UserController::class, 'register']);
route::get('/tables', [UserController::class, 'tables']);
route::get('/userslist', [UserController::class, 'userslist']);
route::get('/verticalmenu', [UserController::class, 'verticalmenu']);
route::get('/AddProject', [UserController::class, 'projectAdd']);

