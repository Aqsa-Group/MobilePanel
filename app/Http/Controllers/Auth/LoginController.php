<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string|min:6',
    ], [
        'username.required' => 'نام کاربری الزامی است',
        'password.required' => 'رمز عبور الزامی است',
        'password.min' => 'رمز عبور حداقل ۶ کاراکتر باشد',
    ]);

    if (!Auth::attempt($request->only('username', 'password'))) {
        return back()->withErrors([
            'username' => 'نام کاربری یا رمز عبور اشتباه است',
        ])->withInput();
    }

    $request->session()->regenerate();
    return redirect()->route('dashboard');
}


}
