<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);
Route::get('/companies-list', [App\Http\Controllers\CompanyController::class,'datalist'])->name('companies_list');
Route::get('/employees-list', [App\Http\Controllers\EmployeeController::class,'datalist'])->name('employees_list');


Auth::routes(['register' => false]);
// Auth::routes();

Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
