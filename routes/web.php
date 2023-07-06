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

Route::get('/', function () {
    return view('booking.dashboard');
});

Route::get('booking/single', function () {
    return view('booking.index');
});

Route::get('booking/bulk', function () {
    return view('booking.bulk');
});

Route::get('login', function () {
    return view('auth.login');
});
