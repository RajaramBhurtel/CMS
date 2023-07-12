<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getShipperAddress(Request $request ){
        $shipper_id = $request->input('shipper_id');
        $shipper = Shipper::findOrFail($shipper_id);

        $address = [
            'address_1' => $shipper->address_1,
            'address_2' => $shipper->address_2,
            'latitude' => $shipper->latitude,
            'longitude' => $shipper->longitude,
        ];
    
        return response()->json($address);
    } 
}
