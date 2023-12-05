<?php

use App\Models\services;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\ServicesController;


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

// Route::get('/', function () {
//     return view('/homepage/index');
// });
Route::get('/', [ServicesController::class, 'homepage'])->name('home');




// LANDING PAGE ROUTING 
Route::view('about', 'homepage/pages/about')->name("about");
Route::view('contactus', 'homepage/pages/contactus')->name("contactUs");
Route::get('pricing', [PricesController::class, 'pricespage']);
// Route::view('services','homepage/pages/services');
Route::get('services', [ServicesController::class, 'serviespage']);

Route::get('/checkout/{id}', [PricesController::class, 'checkout'])->name('pricecheckout');
Route::post('/checkout/payment', [PricesController::class, 'pay'])->name('payment');




Route::middleware([AdminMiddleware::class])->group(function () {
    // ADMIN ROUTEING 
    Route::get('/admin', function () {
        return view('/admin/admindashboard');
    })->middleware('admin');;
 
// ADMIN USER ROUTING 
Route::resource('admin/users', UsersController::class);
Route::get('admin/adminusersedit/{id}', [UsersController::class, 'edit'])->name('usersedit');
Route::post('admin/adminusersedit/{id}', [UsersController::class, 'update'])->name('userupdate');
Route::delete('admin/adminusers/{id}', [UsersController::class, 'destroy'])->name('usersdelete');

// ADMIN SERVICES ROUTING
Route::resource('admin/services', ServicesController::class);
Route::get('admin/adminservicesedit/{id}', [ServicesController::class, 'edit'])->name('serviceedit');
Route::post('admin/adminservicesedit/{id}', [ServicesController::class, 'update'])->name('serviceupdate');
Route::delete('admin/adminservice/{id}', [ServicesController::class, 'destroy'])->name('servicedelete');
// ADMIN PRICING ROUTES
Route::resource('admin/pricing', PricesController::class);
Route::get('admin/adminpriceedit/{id}', [PricesController::class, 'edit'])->name('priceedit');
Route::post('admin/adminpriceedit/{id}', [PricesController::class, 'update'])->name('priceupdate');
Route::delete('admin/adminprice/{id}', [PricesController::class, 'destroy'])->name('pricedelete');
// ADMIN SUBS
Route::get('admin/adminsubscriptions', [ServicesController::class, 'subsshow'])->name('adminsubshow');

});
// AUTH 

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('post-login', [UsersController::class, 'Login'])->name('Login');


Route::get('/register', function () {
    return view('Auth.register');
});
Route::post('post-register', [UsersController::class, 'register'])->name('register');

Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::get('/userprofile', [UsersController::class, 'profile'])->name('profile');
