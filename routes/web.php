<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\ConsigneeController;

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

// Shipper Routes
Route::get('shipper/create', [ShipperController::class, 'index']);
Route::get('shipper/view', [ShipperController::class, 'view']);
Route::post( 'shipper/create' , [ShipperController::class, 'create'] );
Route::get('shipper/{shipper:id}/edit', [ShipperController::class, 'edit']);
Route::patch('shipper/{shipper:id}/update', [ShipperController::class, 'update']);
Route::delete('shipper/{shipper:id}', [ShipperController::class, 'delete']);

// Consignee Routes
Route::get('consignee/create', [ConsigneeController::class, 'index']);
Route::get('consignee/view', [ConsigneeController::class, 'view']);
Route::post( 'consignee/create' , [ConsigneeController::class, 'create'] );
Route::get('consignee/{consignee:id}/edit', [ConsigneeController::class, 'edit']);
Route::patch('consignee/{consignee:id}/update', [ConsigneeController::class, 'update']);
Route::delete('consignee/{consignee:id}', [ConsigneeController::class, 'delete']);
