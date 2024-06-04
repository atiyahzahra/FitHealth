<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('sesi.register');
    }

    // Handle the registration request
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful! You can now login.');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('sesi.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            // Redirect to the intended page or dashboard
            return redirect()->intended('dashboard')->with('success', 'Login successful!');
        }

        // Redirect back with an error message
        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    // Handle the logout request
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Logout successful!');
    }
}
