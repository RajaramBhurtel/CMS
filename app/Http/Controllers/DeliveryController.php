<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Delivery;
use App\Models\Consignee;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menifest;

class DeliveryController extends Controller
{
    public function index( ) {
        $address = Booking::pluck('id');

        if ($address->isEmpty()) {
            return redirect('booking/single')->with('success', 'No bookings found. Please create a booking.');
        }

        // return view('booking.master', compact('bookings'));
        
        return view( 'delivery.create');
    }
    public function create( Request $request  ) {
       // Create a new delivery
        try{
            $delivery = Delivery::create([
                'date' => $request['date'],
                'route' => $request['route'],
                'vehicle' => $request['vehicle'],
                'user' => $request['name'],
            ]);

            // Associate existing bookings with the newly created delivery
            foreach ($request['cn_no'] as $bookingCn) {
                $booking = Booking::where('cn_no', $bookingCn)->first();
                if ($booking) {
                    $booking->update([
                        'delivery_code' => $delivery->delivery_code,
                        'status' => 'processing delivery'
                    ]);
                }
            }
            return view('delivery.master')->with('success', 'Delivery created successfully.');
        }catch(Exception $e){
            return view('delivery.master')->with('success',  $e->getMessage());
        }

    }
    public function getRequireddelivery( Request $request  ) {
        $cn = $request->input('cn_no');
        // $location = $request->input('location');
        $delivery = Booking::where('cn_no', $cn)
                  ->first();
        // $consignee=$delivery['consignee_id'];
        $consignee_name = Consignee::where('id', $delivery['consignee_id'])
        ->pluck('name')
        ->first();

        $shipped_date = Menifest::where('menifests_code', $delivery['menifests_code'])
        ->pluck('date')
        ->first();

        $delivery['consignee_name'] = $consignee_name;
        $delivery['date2'] = $shipped_date;

        return response()->json($delivery);
    }

    public function master( ) {
        $deliverys = Delivery::paginate(5);

        if ($deliverys->isEmpty()) {
            return redirect('delivery/create')->with('success', 'No deliverys found. Please create a delivery.');
        }

        return view('delivery.master', compact('deliverys'));
    }

    public function view($delivery) {
        $delivery = Delivery::where('id', $delivery)->first();

        if (!$delivery) {
            // Handle error, delivery not found
            // ...
        }

        $bookings = $delivery->bookings()->select(
            'id',
            'cn_no',
            'consignee_id',
            'one_time_consignee',
            'consignee_address1',
            'merchandise_code',
            'weight',
            'quantity',
            'menifests_code',
            'status',
            'updated_at'
        )->get();

        foreach ($bookings as $booking) {
            if ($booking->one_time_consignee) {
                // One-time consignee, add it to return value
                $booking->consignee_name = $booking->one_time_consignee;
            } else {
                // Get consignee name from consignee_id
                $consignee = Consignee::find($booking->consignee_id);
                $booking->consignee_name = $consignee ? $consignee->name : null;
            }

            // Get merchandise name from merchandise_code
            $merchandise = Merchandise::where('id', $booking->merchandise_code)->first();
            // dd($merchandise);
            $booking->merchandise_name = $merchandise ? $merchandise->name : 'DOCUMENT';

            // Get merchandise name from merchandise_code
            // $menifest = Menifest::where('menifests_code', $booking->menifests_code)->first();
            // dd($menifest);
            $booking->shipped_date =  $booking->updated_at;
        }

        return view('delivery.view', ['delivery' => $delivery, 'bookings' => $bookings]);
    }

    public function delete(Delivery $delivery) {

        $delivery->bookings()->update([
            'status' => 'shipped',
            'delivery_code' => null
        ]);
        
        $delivery->delete();

        return back()->with('success', 'Delivery Runsheet Deleted!');
    }
    public function update( $request ) {
        $booking = Booking::where('id', $request)->first();
        $booking->update([
            'status' => 'delivered'
        ]);
    
        return back()->with('success', 'Delivery status updated!');
    }
    public function cancel( $request ) {
        $booking = Booking::where('id', $request)->first();
        $booking->update([
            'status' => 'cancelled'
        ]);
    
        return back()->with('success', 'Delivery status updated!');
    }

     public function searchDelivery(Request $request)
    {
        $query = Delivery::query();

        foreach (['delivery_code', 'route', 'date'] as $param) {
            if ($value = $request->input($param)) {
                $query->where($param, 'like', '%' . $value . '%');
            }
        }

        $deliverys = $query->paginate(100);
        return view('delivery.master', compact('deliverys'));
    }
}
