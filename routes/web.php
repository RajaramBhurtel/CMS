<?php

use App\Http\Controllers\ShipperController;
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


Route::get('shipper/create', [ShipperController::class, 'index']);
Route::get('shipper/view', [ShipperController::class, 'view']);
Route::post( 'shipper/create' , [ShipperController::class, 'create'] );
Route::get('shipper/{shipper:id}/edit', [ShipperController::class, 'edit']);
Route::patch('shipper/{shipper:id}/update', [ShipperController::class, 'update']);
Route::delete('shipper/{shipper:id}', [ShipperController::class, 'delete']);
