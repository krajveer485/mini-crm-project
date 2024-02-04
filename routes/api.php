<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EmployeeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/companies', [CompanyController::class, 'companies'])->name('companies');
Route::post('/addCompany', [CompanyController::class, 'addCompany'])->name('addCompany');

Route::get('/employees', [EmployeeController::class, 'employees'])->name('employees');

Route::post('/addEmployees', [EmployeeController::class, 'addEmployees'])->name('addEmployees');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
