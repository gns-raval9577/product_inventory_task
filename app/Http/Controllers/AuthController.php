<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index(){
        return view('Auth.Login');
    }
    public function store(Request $request){

         // Validate the request data
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
     // Attempt to authenticate the user
     if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password'], 'role' => 'Admin'])) {
        // Authentication successful, redirect to the dashboard
        return redirect()->route('dashboard');
    }

    // Authentication failed, redirect back to the login page with an error message
    return redirect()->route('loginview')->with('error', 'Invalid email or password. Please try again.');
    }

    public function dashboard(){
        return view('Dashbord.home');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect(route('loginview'));
    }
}
