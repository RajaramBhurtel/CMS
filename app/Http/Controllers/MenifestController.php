<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consignee;

class MenifestController extends Controller
{
    public function index( ) {
        $address = Booking::pluck('consignee_address2');

        if ($address->isEmpty()) {
            return redirect('booking/single')->with('success', 'No bookings found. Please create a booking.');
        }

        // return view('booking.master', compact('bookings'));
        
        return view( 'menifest.create', compact('address'));
    }
    public function create( Request $request  ) {
        ddd($request);
    }
    public function getRequiredmanifest( Request $request  ) {
        $cn = $request->input('cn_no');
        // $location = $request->input('location');
        $menifest = Booking::where('cn_no', $cn)
                  ->first();
        $consignee=$menifest['consignee_id'];
        $consignee_name = Consignee::where('id', $menifest['consignee_id'])
        ->pluck('name')
        ->first();

        $menifest['consignee_name'] = $consignee_name;

        return response()->json($menifest);
    }
}
