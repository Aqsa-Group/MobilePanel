<?php

namespace App\Http\Controllers;

use App\Models\UserForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class WebsiteAuthController extends Controller
{
    public function showLogin(Request $request): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('website.home');
        }

        return view('website.auth.login', [
            'prefillEmail' => (string) $request->query('email', ''),
            'initialTab' => 'login',
        ]);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validateWithBag(
            'login',
            [
                'login_email' => ['required', 'email'],
                'login_password' => ['required', 'string', 'min:6'],
            ],
            [
                'login_email.required' => 'وارد کردن ایمیل الزامی است.',
                'login_email.email' => 'فرمت ایمیل معتبر نیست.',
                'login_password.required' => 'وارد کردن رمز عبور الزامی است.',
                'login_password.min' => 'رمز عبور باید حداقل ۶ کاراکتر باشد.',
            ]
        );

        $loginEmail = trim((string) ($credentials['login_email'] ?? ''));
        $loginPassword = (string) ($credentials['login_password'] ?? '');

        if (!Auth::attempt(['email' => $loginEmail, 'password' => $loginPassword])) {
            return back()
                ->withInput($request->only('login_email'))
                ->withErrors([
                    'loginError' => 'ایمیل یا رمز عبور اشتباه است.',
                ], 'login');
        }

        $request->session()->regenerate();

        return redirect()
            ->intended(route('website.home'))
            ->with('success', 'با موفقیت وارد شدید.');
    }

    public function showSignup(Request $request): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('website.home');
        }

        return view('website.auth.login', [
            'prefillEmail' => (string) $request->query('email', ''),
            'initialTab' => 'signup',
        ]);
    }

    public function signup(Request $request): RedirectResponse
    {
        $data = $request->validateWithBag(
            'signup',
            [
                'signup_username' => ['required', 'string', 'min:3', 'max:100', 'unique:users,username'],
                'signup_email' => ['required', 'email', 'max:255', 'unique:users,email'],
                'signup_password' => ['required', 'string', 'min:6', 'confirmed'],
            ],
            [
                'signup_username.required' => 'وارد کردن یوزرنیم الزامی است.',
                'signup_username.min' => 'یوزرنیم باید حداقل ۳ کاراکتر باشد.',
                'signup_username.max' => 'یوزرنیم نباید بیشتر از ۱۰۰ کاراکتر باشد.',
                'signup_username.unique' => 'این یوزرنیم قبلاً ثبت شده است.',
                'signup_email.required' => 'وارد کردن ایمیل الزامی است.',
                'signup_email.email' => 'فرمت ایمیل معتبر نیست.',
                'signup_email.unique' => 'این ایمیل قبلاً ثبت شده است.',
                'signup_password.required' => 'وارد کردن رمز عبور الزامی است.',
                'signup_password.min' => 'رمز عبور باید حداقل ۶ کاراکتر باشد.',
                'signup_password.confirmed' => 'تایید رمز عبور مطابقت ندارد.',
            ]
        );

        $username = trim((string) ($data['signup_username'] ?? ''));
        $signupEmail = trim((string) ($data['signup_email'] ?? ''));
        $signupPassword = (string) ($data['signup_password'] ?? '');
        $displayName = $username;
        $displayName = trim((string) $displayName);
        if ($displayName === '') {
            $displayName = 'کاربر';
        }

        $user = UserForm::create([
            'name' => $displayName,
            'first_name' => $displayName,
            'last_name' => '',
            'username' => $username,
            'email' => $signupEmail,
            'number' => '-',
            'address' => '-',
            'rule' => 'user',
            'limit' => '-',
            'password' => Hash::make($signupPassword),
            'creator_id' => null,
            'admin_id' => null,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->intended(route('website.home'))
            ->with('success', 'حساب شما ساخته شد و وارد شدید.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('website.home')
            ->with('success', 'با موفقیت خارج شدید.');
    }
}
