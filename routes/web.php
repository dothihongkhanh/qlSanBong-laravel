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
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\owner\See_OrderController;
use App\Http\Controllers\Auth\GoogleAuthController;
use Illuminate\Auth\Events\Login;

Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::get('/fields-f', [HomeController::class, 'filterFields'])->name('client.home.filter');
Route::get('/home', function () {
    return view('client.home.index');
});

Route::get('/fields', [FieldController::class, 'index'])->name('client.fields.index');

Route::get('/detail', [FieldController::class, 'detail'])->name('client.fields.detail');

Route::post('/vnpay_payment', [OnlinePaymentController::class, 'vnpay_payment']);
Route::post('/detail', 'App\Http\Controllers\Client\FieldController@busy')->name('client.fields.detail');

Route::get('/fields-h', [FieldController::class, 'filterFields'])->name('filter.fields');

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


Route::get('/owner_home',[LoginController::class,'dashboard_owner'])->name('owner_home');

Route::get('/admin home page',[LoginController::class,'dashboard_admin'])->name('admin_home');


Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//payment
Route::get('/payment', [OrderController::class, 'index']);
Route::post('/payment', [OrderController::class, 'saveOrder']);
// Route::get('/payment_succsess', function () {
//     return view('client.payment.success_payment');
// });

Route::get('client.payment.success_payment', [OrderController::class, 'success'])->name('client.payment.success_payment');

Route::get('/client/profile', [ProfileController::class, 'index'])->name('profile');
// web.php or routes/web.php
Route::get('/profile/{id}', [ProfileController::class, 'confirmOrder'])->name('profile.confirmOrder');

Route::get('/manage_field', function () {
    return view('owner.fields.manage_field');
});

Route::get('/post_field', function () {
    return view('owner.fields.post_field');
});

Route::get('/history_order', function () {
    return view('owner.order.history_order');
});
Route::get('/statistical', function () {
    return view('owner.revenue.statistical');
});

// Trong tệp web.php

use App\Http\Controllers\owner\PostFieldController;
Route::post('/post_field', [FieldController::class, 'store'])->name('post_field');

Route::get('/see_order', [See_OrderController::class, 'index'])->name('see_order');

Route::get('/see_order_detail', [See_OrderController::class, 'detail'])->name('owner.order.see_order_detail');

Route::get('/see_order_detail/{id}', [See_OrderController::class, 'confirmOrder'])->name('owner.order.see_order_detail.confirmOrder');

//ManageController
Route::get('/getChildFields/{id}', 'App\Http\Controllers\owner\ManageController@getFieldDetails');
Route::get('/getNameField/{id}', 'App\Http\Controllers\owner\ManageController@getNameField');
//login with google
Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/callback',[GoogleAuthController::class,'callbackGoogle']);
