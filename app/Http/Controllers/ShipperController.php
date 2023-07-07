<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Validation\Rule;

class ShipperController extends Controller
{
    public function index( ) {
        return view( 'shipper.create');
    }

    public function create()
    {
        $validatedData = $this->validateShipper();

        Shipper::create($validatedData);

        return redirect('shipper/view')->with('success', 'Shipper created successfully.');
    }
    public function view( ) {
        return view( 'shipper.index', [
            'shippers' => Shipper::paginate(50)
        ] );
    }

    public function edit(Shipper $shipper) {
        return view('shipper.edit', [
            'shipper' => $shipper
        ]);
    }

    public function delete(Shipper $shipper) {
        $shipper->delete();

        return back()->with('success', 'Shipper Deleted!');
    }

    public function update(Shipper $shipper) {
        $attributes = $this->validateShipper($shipper);

        $shipper->update($attributes);

        return redirect('shipper/view')->with('success', 'Shipper has been updated' );
    }

    protected function validateShipper(?Shipper $shipper = null): array {
        $shipper ??= new Shipper();

        return request()->validate([
            'name'      => 'required|min:3|max:255|',
            'email'     => ['required', Rule::unique('shippers', 'email')->ignore($shipper)],
            'phone'     => 'required|min:10',
            'address'   => 'required',
        ]);
    }
}
