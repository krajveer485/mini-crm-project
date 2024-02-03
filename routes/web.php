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

Route::get('/', function () {
    return view('admin-dashboard.dashboard');
});
// Route::get('add-company', function () {
//     return view('admin-dashboard.add-companie');
// });
// Route::get('companies-list', function () {
//     return view('admin-dashboard.companie-list');
// });
// Route::get('add-employee', function () {
//     return view('admin-dashboard.add-employee');
// });
// Route::get('employee-list', function () {
//     return view('admin-dashboard.employee-list');
// });
Auth::routes(['register' => false]);
// Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
