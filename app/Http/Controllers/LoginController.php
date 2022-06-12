<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('marketplace.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            if(!auth()->check() || (auth()->user()->role->role_name === 'Admin' && auth()->user()->role->role_name === 'SuperAdmin')) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return abort(403);
            }
            $request->session()->regenerate();

            return redirect()->intended('/stores');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
