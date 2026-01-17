<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserForm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
public function store(Request $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();
    session()->flash(
        'welcome',
        Auth::user()->name . '  به پنل بازار الکترونیک خوش آمدید'
    );
    return redirect()->intended(RouteServiceProvider::HOME);
}
    public function showLogin()
    {
        return view('Mobile.Auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        $user = UserForm::where('username', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'loginError' => 'نام کاربری یا رمز عبور اشتباه است',
            ]);
        }
        Auth::login($user);
        $request->session()->regenerate();
        session()->flash(
            'welcome',
            $user->name . ' به پنیل بازار الکترونیک خوش آمدید!'
        );
        return redirect()->route('welcome');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
