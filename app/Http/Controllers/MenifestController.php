<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Menifest;
use App\Models\Consignee;
use Illuminate\Http\Request;
use PharIo\Manifest\Manifest;
use App\Http\Controllers\Controller;

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
       // Create a new manifest
        $manifest = Menifest::create([
            'date' => $request['date'],
            'location' => $request['location'],
        ]);

        // Associate existing bookings with the newly created manifest
        foreach ($request['cn_no'] as $bookingCn) {
            $booking = Booking::where('cn_no', $bookingCn)->first();
            if ($booking) {
                $booking->update(['menifests_code' => $manifest->menifests_code]);
            }
        }
        return redirect('consignee/view')->with('success', 'Menifest created successfully.');

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

      public function master( ) {
        $menifests = Menifest::paginate(5);

        if ($menifests->isEmpty()) {
            return redirect('menifest/create')->with('success', 'No menifests found. Please create a menifest.');
        }

        return view('menifest.master', compact('menifests'));
    }
}
