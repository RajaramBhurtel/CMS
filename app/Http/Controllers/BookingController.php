<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use App\Models\Consignee;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getShipperAddress(Request $request ){
        $shipper_id = $request->input('shipper_id');
        $shipper = Shipper::findOrFail($shipper_id);

        $address = [
            'address_1' => $shipper->shipper_address_1,
            'address_2' => $shipper->shipper_address_2,
            'latitude' => $shipper->shipper_latitude,
            'longitude' => $shipper->shipper_longitude,
        ];
    
        return response()->json($address);
    } 
    public function getConsigneeAddress(Request $request ){
        $consignee_id = $request->input('consignee_id');
        $consignee = Consignee::findOrFail($consignee_id);

        $address = [
            'address_1' => $consignee->consignee_address_1,
            'address_2' => $consignee->consignee_address_2,
            'latitude' => $consignee->consignee_latitude,
            'longitude' => $consignee->consignee_longitude,
        ];
    
        return response()->json($address);
    } 
}
