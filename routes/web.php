<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;

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

Route::get('api/employee/', [EmployeeController::class, 'index']);
Route::post('api/employee/create', [EmployeeController::class, 'create']);
Route::get('api/employee/detail/{id}', [EmployeeController::class, 'detail']);
Route::get('api/employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::get('api/employee/delete/{id}', [EmployeeController::class, 'delete']);
Route::post('api/admin-user/login', [LoginController::class, 'login']);