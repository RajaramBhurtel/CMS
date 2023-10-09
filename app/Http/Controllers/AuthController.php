<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index( ) {
        return view( 'auth.login');
    }
   
    public function destroy(){
        auth()->logout();
        // session_destroy();
        return redirect('/login')->with('success', 'Goodbye!');
    }

    public function store() {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => ['required', 'min:7', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
        ]);

        if( ! auth()->attempt($attributes)){

            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
        
        session()->regenerate();
        
        return redirect('/dashboard')->with('success', 'Welcome Back !');
    }
}
