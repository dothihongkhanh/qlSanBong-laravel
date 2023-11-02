<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::get('/home', function () {
    return view('client.home.index');
});

Route::get('/fields', [FieldController::class, 'index'])->name('client.fields.index');
Route::get('/detail', [FieldController::class, 'detail'])->name('client.fields.detail');

Route::post('/detail', [FieldController::class, 'busy'])->name('client.fields.detail');




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

Route::match(['GET', 'POST'], '/vnpay_payment', [OnlinePaymentController::class, 'vnpay_payment']);

Route::get('/payment', function () {
    return view('client.payment.index');
});

Route::get('/payment_succsess', function () {
    return view('client.payment.success_payment');
});

