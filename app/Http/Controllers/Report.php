<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Shipper;
use Illuminate\Http\Request;

class Report extends Controller
{
    public function index( ) {
        // $shippers = Shipper::all();
        return view('report.cash');
    }  
    public function cash( Request $request ) {
        // $shipper_id = $request->input('shipper_id');
        $dateFrom = $request->input('from');
        $dateTo = $request->input('to');

        $bookings  = Booking::where('payment_mode', 'cash')
            ->whereDate('date', '>=', $dateFrom)
            ->whereDate('date', '<=', $dateTo)
            ->paginate(100);
        return view('report.cash', compact('bookings'));
    }
    public function view( ) {
        // $shippers = Shipper::all();
        return view('report.cash');
    }  
    public function credit( Request $request ) {
        // $shipper_id = $request->input('shipper_id');
        $dateFrom = $request->input('from');
        $dateTo = $request->input('to');

        $bookings  = Booking::where('payment_mode', 'credit')
            ->whereDate('date', '>=', $dateFrom)
            ->whereDate('date', '<=', $dateTo)
            ->paginate(100);
        return view('report.cash', compact('bookings'));
    } 
}
