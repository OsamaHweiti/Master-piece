<?php

use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\services;


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

Route::get('/', function () {
    return view('/homepage/index');
});

Route::get('/ads', function () {
    return view('/admin/admindashboard');
});
Route::get('/admin/users', function () {
    return view('/admin/adminusers');
});

// LANDING PAGE ROUTING 
Route::view('about','homepage/pages/about')->name("about");
Route::view('contactus','homepage/pages/contactus')->name("contactUs");
Route::view('pricing','homepage/pages/pricing')->name("pricing");
Route::view('services','homepage/pages/services')->name("services");


// ADMIN ROUTEING 
    // ADMIN USER ROUTING 
Route::resource('admin/users', UsersController::class);
Route::get('admin/adminusersedit/{id}',[UsersController::class,'edit'])->name('usersedit');
Route::post('admin/adminusersedit/{id}',[UsersController::class,'update'])->name('userupdate');
Route::delete('admin/adminusers/{id}',[UsersController::class,'destroy'])->name('usersdelete');
    
    // ADMIN SERVICES ROUTING
Route::resource('admin/services', ServicesController::class);
Route::get('admin/adminservicesedit/{id}',[ServicesController::class,'edit'])->name('serviceedit');
Route::post('admin/adminservicesedit/{id}',[ServicesController::class,'update'])->name('serviceupdate');
Route::delete('admin/adminservice/{id}',[ServicesController::class,'destroy'])->name('servicedelete');


// AUTH 

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('post-login', [UsersController::class, 'Login'])->name('Login'); 
