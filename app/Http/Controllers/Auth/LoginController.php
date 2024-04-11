<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            return redirect()->route('dashboard');
        }

        return view('auth/login');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'nullable|sometimes',
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return redirect()->back()->with(['status' => 'Credenciais Inválidas']);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return back();
    }
}
