<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    

            if ($user->role === 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($user->role === 'bendahara') {
                return redirect()->route('dashboard.bendahara');
            } elseif ($user->role === 'pengasuh') {
                return redirect()->route('dashboard.pengasuh');
            } elseif ($user->role === 'walisantri') {
                return redirect()->route('dashboard.walisantri');
            }
        }
    
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}