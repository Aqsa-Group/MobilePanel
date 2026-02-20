<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControllers extends Controller
{
    public function showLogin()
    {
        return view('livewire.admin2.pages.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

       if (Auth::guard('admin2')->attempt($credentials)) {
    $request->session()->regenerate();
    return redirect()->route('admin2.dashboard');
}

        return back()->withErrors([
            'loginError' => 'نام کاربری یا رمز عبور اشتباه است.',
        ]);
    }


    public function logout(Request $request)
    {
      Auth::guard('admin2')->logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect()->route('admin2.login');
    }
}
