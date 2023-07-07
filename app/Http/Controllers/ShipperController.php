<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => 'required|min:3|max:255|',
            'address'   => 'required',
            'phone'     => 'required|min:10',
            'email'     => 'required|email|max:255|unique:shippers,email',
        ]);

        Shipper::create($validatedData);

        return redirect()->back()->with('success', 'Shipper created successfully.');
    }
}
