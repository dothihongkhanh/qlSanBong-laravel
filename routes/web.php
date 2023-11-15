<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\FieldController;
use App\Http\Controllers\Client\OnlinePaymentController;
use App\Http\Controllers\Client\OrderController;
use Illuminate\Auth\Events\Login;

Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::get('/home', function () {
    return view('client.home.index');
});

Route::get('/fields', [FieldController::class, 'index'])->name('client.fields.index');
Route::get('/detail', [FieldController::class, 'detail'])->name('client.fields.detail');

Route::post('/vnpay_payment', [OnlinePaymentController::class, 'vnpay_payment']);
Route::post('/detail', 'App\Http\Controllers\Client\FieldController@busy')->name('client.fields.detail');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');

Route::get('/registerOwner', function () {
    return view('auth.registerOwner');
})->name('registerOwner');

Route::post('/registerOwner', 'App\Http\Controllers\Auth\RegisterOwnerController@registerOwner')->name('registerOwner');


Route::get('/loginform', function () {
    return view('auth.login');
})->name('login');

// Route::post('/login2', 'App\Http\Controllers\Auth\LoginController@login')->name('auth.login');


Route::post('/login', [LoginController::class, 'login'])->name('login-user');
//Login--


Route::get('/owner home page',[LoginController::class,'dashboard_owner'])->name('owner page');

Route::get('/admin home page',[LoginController::class,'dashboard_admin'])->name('admin page');


Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/client/profile', function () {
    return view('client.profile.index');
})->name('profile');

//payment
Route::get('/payment', [OrderController::class, 'index']);
Route::post('/payment', [OrderController::class, 'saveOrder']);
// Route::get('/payment_succsess', function () {
//     return view('client.payment.success_payment');
// });

Route::get('client.payment.success_payment', [OrderController::class, 'success'])->name('client.payment.success_payment');