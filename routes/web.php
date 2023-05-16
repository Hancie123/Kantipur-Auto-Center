<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\rackcontroller;
use App\Http\Controllers\stepscontroller;

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

Route::get('/',[logincontroller::class,'userlogin']);

Route::post('/',[logincontroller::class,'login']);

Route::get('admin/dashboard',[dashboardcontroller::class,'dashboard']);

Route::get('admin/customer/createaccount',[customercontroller::class,'viewcustomerform']);
Route::get('admin/customer/view_all_customers',[customercontroller::class,'viewcustomerpage']);
Route::post('admin/customer/createaccount',[customercontroller::class,'insertdata']);
Route::get('admin/customer/view',[customercontroller::class,'viewcustomerdata']);
Route::get('/admin/customer/{id}', [customercontroller::class, 'getStudentById']);
Route::post('/admin/customer', [customerController::class, 'editCustomer'])->name('customer.edit');


Route::get('admin/racks/create',[rackcontroller::class,'viewcreaterackpage']);
Route::get('admin/racks/table',[rackcontroller::class,'viewdata']);
Route::post('admin/racks/create',[rackcontroller::class,'insertdata']);

Route::get('admin/steps/create',[stepscontroller::class,'viewcreatestepspage']);
Route::post('admin/steps/create',[stepscontroller::class,'insertdata']);