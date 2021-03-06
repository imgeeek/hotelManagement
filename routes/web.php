<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffDepartment;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'home']);
//Admin Dashbopard
Route::get('/admin', function () {
    return view('dashboard');
});
Route::get('admin',[AdminController::class,'dashboard']);

Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'check_login']);
Route::get('admin/logout',[AdminController::class,'logout']);
//Room type routes
Route::resource('admin/roomtype',RoomtypeController::class);
Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class,'destroy']);
Route::resource('admin/room',RoomController::class);
Route::get('admin/room/{id}/delete',[RoomController::class,'destroy']);
Route::resource('admin/customer',CustomerController::class);

// Delete the image from the room type image
Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image']);
//department
Route::resource('admin/department',StaffDepartment::class);
Route::get('admin/department/{id}/delete',[StaffDepartment::class,'destroy']);
Route::resource('admin/staff',StaffController::class);

//Booking
Route::resource('admin/booking',BookingController::class);

Route::get('admin/booking/available_rooms/{checkindate}',[BookingController::class,'available_rooms']);

Route::get('frontlogin',[CustomerController::class,'login']);
Route::get('register',[CustomerController::class,'register']);
Route::post('customer/login',[CustomerController::class,'cslogin']);
Route::get('customer/logout',[CustomerController::class,'logout']);
Route::get('booking',[BookingController::class,'front_booking']);