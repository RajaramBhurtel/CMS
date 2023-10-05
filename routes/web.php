<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\MenifestController;
use App\Http\Controllers\ConsigneeController;
use App\Http\Controllers\MerchandiseController;

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

Route::get('/dashboard', function () {
    return view('booking.dashboard');
});
Route::get('/', function () {
    return view('booking.dashboard');
});

Route::get('/test', function () {
    return view('booking.test');
});




Route::get('booking/bulk', function () {
    return view('booking.bulk');
});

// Route::get('login/login', function () {
    //     return view('auth.login');
    // });

Route::get('login', [AuthController::class, 'index']);
Route::post('user/login', [AuthController::class, 'store']);

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

// User Routes
Route::get('user/create', [UserController::class, 'index']);
Route::get('user/view', [UserController::class, 'view']);
Route::post( 'user/create' , [UserController::class, 'create'] );
Route::get('user/{user:id}/edit', [UserController::class, 'edit']);
Route::patch('user/{user:id}/update', [UserController::class, 'update']);
Route::delete('user/{user:id}', [UserController::class, 'delete']);

// User Routes
Route::get('merchandise/create', [MerchandiseController::class, 'index']);
Route::get('merchandise/view', [MerchandiseController::class, 'view']);
Route::post( 'merchandise/create' , [MerchandiseController::class, 'create'] );
Route::get('merchandise/{merchandise:id}/edit', [MerchandiseController::class, 'edit']);
Route::patch('merchandise/{merchandise:id}/update', [MerchandiseController::class, 'update']);
Route::delete('merchandise/{merchandise:id}', [MerchandiseController::class, 'delete']);

//booking routes
Route::get('booking/single', [BookingController::class, 'index'] );
Route::get('booking/master', [BookingController::class, 'master'] );
Route::get('booking/{booking:id}/view', [BookingController::class, 'view']);
Route::post('booking/createSingle', [BookingController::class, 'createSingle'] );
Route::post( 'booking/getShipperAddress' , [BookingController::class, 'getShipperAddress'] );
Route::post( 'booking/getConsigneeAddress' , [BookingController::class, 'getConsigneeAddress'] );
Route::delete('booking/{booking:id}', [BookingController::class, 'delete']);
Route::post('/booking/getDistancePrice', [BookingController::class, 'getDistancePrice']);

// Menifest
Route::get('menifest/create', [MenifestController::class, 'index'] );
Route::post( '/menifest/getRequiredmanifest' , [MenifestController::class, 'getRequiredmanifest'] );
Route::post( 'manifest/createMenifest' , [MenifestController::class, 'create'] );
Route::get('manifest/master', [MenifestController::class, 'master'] );
Route::get('menifest/{menifest:id}/view', [MenifestController::class, 'view']);
Route::delete('menifest/{menifest:id}', [MenifestController::class, 'delete']);
Route::post( '/menifest/getMenifestCode' , [MenifestController::class, 'getMenifestCode'] );


// Delivery
Route::get('delivery/create', [DeliveryController::class, 'index'] );
Route::post( '/delivery/getRequireddelivery' , [DeliveryController::class, 'getRequireddelivery'] );
Route::post( 'delivery/createDelivery' , [DeliveryController::class, 'create'] );
Route::get('delivery/master', [DeliveryController::class, 'master'] );
Route::get('delivery/{delivery:id}/view', [DeliveryController::class, 'view']);
Route::delete('delivery/{delivery:id}', [DeliveryController::class, 'delete']);
