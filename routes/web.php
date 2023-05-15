<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\customercontroller;

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
Route::post('admin/customer/createaccount',[customercontroller::class,'insertdata']);
Route::get('admin/customer/view',[customercontroller::class,'viewcustomerdata']);
Route::get('/admin/customer/{customerId}/edit', 'customercontroller@edit')->name('customer.edit');