<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود و ثبت نام - همراه یاب</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@30.1.0/dist/font-face.css" rel="stylesheet">
    <style>
        body { font-family: "Vazir", sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center p-4">
    @php
        $loginBag = $errors->getBag('login');
        $signupBag = $errors->getBag('signup');
        $activeTab = old('auth_tab', $initialTab ?? 'login');
        if ($signupBag->any()) {
            $activeTab = 'signup';
        }
        if ($loginBag->any()) {
            $activeTab = 'login';
        }
    @endphp
    <div id="website-auth-root" class="w-full max-w-5xl bg-white rounded-3xl overflow-hidden shadow-2xl border border-slate-200">
        <div class="grid grid-cols-1">
            <div class="p-5 sm:p-8 md:p-10">
                <div class="mb-5 text-center">
                    <h1 class="text-2xl font-extrabold text-slate-900">ورود و ثبت نام</h1>
                </div>
                @if(session('success'))
                    <div class="mb-4 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('info'))
                    <div class="mb-4 rounded-xl bg-blue-50 border border-blue-200 px-4 py-3 text-sm text-blue-700">
                        {{ session('info') }}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="mb-4 rounded-xl bg-amber-50 border border-amber-200 px-4 py-3 text-sm text-amber-700">
                        {{ session('warning') }}
                    </div>
                @endif
                <div class="mb-4 rounded-2xl bg-slate-100 p-1 flex gap-1">
                    <button type="button" data-auth-tab-btn="login" class="auth-tab-btn flex-1 rounded-xl px-3 py-2 text-sm font-bold transition">
                        ورود
                    </button>
                    <button type="button" data-auth-tab-btn="signup" class="auth-tab-btn flex-1 rounded-xl px-3 py-2 text-sm font-bold transition">
                        ثبت نام
                    </button>
                </div>
                <div class="rounded-2xl border border-slate-200 p-4 sm:p-5 overflow-hidden">
                    <div id="auth-panels" class="relative overflow-hidden transition-[height] duration-500 ease-out">
                    <div data-auth-tab-panel="login" class="auth-panel absolute top-0 right-0 w-full transition-all duration-500 ease-out will-change-transform {{ $activeTab === 'signup' ? 'opacity-0 -translate-x-6 pointer-events-none' : 'opacity-100 translate-x-0 pointer-events-auto' }}">
                        @if($loginBag->has('loginError'))
                            <div class="mb-4 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700">
                                {{ $loginBag->first('loginError') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('website.login.post') }}" class="space-y-4">
                            @csrf
                            <input type="hidden" name="auth_tab" value="login">
                            <div class="text-right">
                                <label class="block text-sm font-semibold text-slate-700 mb-1">ایمیل</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="1.7"/><path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                                    </span>
                                    <input
                                        type="email"
                                        name="login_email"
                                        value="{{ old('login_email', $prefillEmail ?? '') }}"
                                        class="w-full rounded-xl border border-slate-300 pr-4 pl-10 py-3 text-right focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="example@email.com"
                                        required
                                    >
                                </div>
                                @if($loginBag->has('login_email'))
                                    <p class="mt-1 text-xs text-red-600">{{ $loginBag->first('login_email') }}</p>
                                @endif
                            </div>
                            <div class="text-right">
                                <label class="block text-sm font-semibold text-slate-700 mb-1">رمز عبور</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><rect x="4" y="10" width="16" height="10" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M8 10V7a4 4 0 118 0v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                                    </span>
                                    <input
                                        type="password"
                                        name="login_password"
                                        class="w-full rounded-xl border border-slate-300 pr-4 pl-10 py-3 text-right focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="حداقل ۶ کاراکتر"
                                        required
                                    >
                                </div>
                                @if($loginBag->has('login_password'))
                                    <p class="mt-1 text-xs text-red-600">{{ $loginBag->first('login_password') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="w-full rounded-xl bg-[#2F25FF] hover:bg-[#241dd1] text-white font-bold py-3 transition">
                                ورود
                            </button>
                        </form>
                        <div class="mt-4 text-center text-sm text-slate-600">
                            حساب ندارید؟
                            <button type="button" data-switch-tab="signup" class="font-bold text-[#2F25FF] hover:underline">ثبت نام</button>
                        </div>
                    </div>
                    <div data-auth-tab-panel="signup" class="auth-panel absolute top-0 right-0 w-full transition-all duration-500 ease-out will-change-transform {{ $activeTab === 'signup' ? 'opacity-100 translate-x-0 pointer-events-auto' : 'opacity-0 translate-x-6 pointer-events-none' }}">
                        <form method="POST" action="{{ route('website.signup.post') }}" class="space-y-4">
                            @csrf
                            <input type="hidden" name="auth_tab" value="signup">
                            <div class="text-right">
                                <label class="block text-sm font-semibold text-slate-700 mb-1">نام کاربری</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.7"/><path d="M5 20c0-3.3 3.1-6 7-6s7 2.7 7 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                                    </span>
                                    <input
                                        type="text"
                                        name="signup_username"
                                        value="{{ old('signup_username') }}"
                                        class="w-full rounded-xl border border-slate-300 pr-4 pl-10 py-3 text-right focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="مثال: user_123"
                                        required
                                    >
                                </div>
                                @if($signupBag->has('signup_username'))
                                    <p class="mt-1 text-xs text-red-600">{{ $signupBag->first('signup_username') }}</p>
                                @endif
                            </div>
                            <div class="text-right">
                                <label class="block text-sm font-semibold text-slate-700 mb-1">ایمیل</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="1.7"/><path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                                    </span>
                                    <input
                                        type="email"
                                        name="signup_email"
                                        value="{{ old('signup_email', $prefillEmail ?? '') }}"
                                        class="w-full rounded-xl border border-slate-300 pr-4 pl-10 py-3 text-right focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="example@email.com"
                                        required
                                    >
                                </div>
                                @if($signupBag->has('signup_email'))
                                    <p class="mt-1 text-xs text-red-600">{{ $signupBag->first('signup_email') }}</p>
                                @endif
                            </div>
                            <div class="text-right">
                                <label class="block text-sm font-semibold text-slate-700 mb-1">رمز عبور</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><rect x="4" y="10" width="16" height="10" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M8 10V7a4 4 0 118 0v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                                    </span>
                                    <input
                                        type="password"
                                        name="signup_password"
                                        class="w-full rounded-xl border border-slate-300 pr-4 pl-10 py-3 text-right focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="حداقل ۶ کاراکتر"
                                        required
                                    >
                                </div>
                                @if($signupBag->has('signup_password'))
                                    <p class="mt-1 text-xs text-red-600">{{ $signupBag->first('signup_password') }}</p>
                                @endif
                            </div>
                            <div class="text-right">
                                <label class="block text-sm font-semibold text-slate-700 mb-1">تایید رمز عبور</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><rect x="4" y="10" width="16" height="10" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M8 10V7a4 4 0 118 0v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                                    </span>
                                    <input
                                        type="password"
                                        name="signup_password_confirmation"
                                        class="w-full rounded-xl border border-slate-300 pr-4 pl-10 py-3 text-right focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="تکرار رمز عبور"
                                        required
                                    >
                                </div>
                            </div>
                            <button type="submit" class="w-full rounded-xl bg-[#2F25FF] hover:bg-[#241dd1] text-white font-bold py-3 transition">
                                ثبت نام
                            </button>
                        </form>
                        <div class="mt-4 text-center text-sm text-slate-600">
                            حساب دارید؟
                            <button type="button" data-switch-tab="login" class="font-bold text-[#2F25FF] hover:underline">ورود</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const root = document.getElementById('website-auth-root');
            if (!root) return;
            const buttons = Array.from(root.querySelectorAll('[data-auth-tab-btn]'));
            const panels = Array.from(root.querySelectorAll('[data-auth-tab-panel]'));
            const switchers = Array.from(root.querySelectorAll('[data-switch-tab]'));
            const panelsWrap = document.getElementById('auth-panels');
            const initialTab = @json($activeTab === 'signup' ? 'signup' : 'login');
            let currentTab = initialTab;
            const adjustHeight = (tab) => {
                if (!panelsWrap) return;
                const activePanel = panels.find((panel) => panel.getAttribute('data-auth-tab-panel') === tab);
                if (!activePanel) return;
                panelsWrap.style.height = `${activePanel.scrollHeight}px`;
            };
            const setTab = (tab) => {
                const safeTab = tab === 'signup' ? 'signup' : 'login';
                currentTab = safeTab;
                buttons.forEach((btn) => {
                    const isActive = btn.getAttribute('data-auth-tab-btn') === safeTab;
                    btn.classList.toggle('bg-white', isActive);
                    btn.classList.toggle('text-[#2F25FF]', isActive);
                    btn.classList.toggle('shadow-sm', isActive);
                    btn.classList.toggle('text-slate-600', !isActive);
                });
                panels.forEach((panel) => {
                    const panelName = panel.getAttribute('data-auth-tab-panel');
                    const isActive = panelName === safeTab;
                    panel.classList.remove('opacity-100', 'translate-x-0', 'pointer-events-auto');
                    panel.classList.remove('opacity-0', '-translate-x-6', 'translate-x-6', 'pointer-events-none');
                    if (isActive) {
                        panel.classList.add('opacity-100', 'translate-x-0', 'pointer-events-auto');
                        panel.setAttribute('aria-hidden', 'false');
                        return;
                    }
                    panel.classList.add('opacity-0', 'pointer-events-none');
                    panel.setAttribute('aria-hidden', 'true');
                    if (safeTab === 'signup' && panelName === 'login') {
                        panel.classList.add('-translate-x-6');
                    } else if (safeTab === 'login' && panelName === 'signup') {
                        panel.classList.add('translate-x-6');
                    } else {
                        panel.classList.add('translate-x-6');
                    }
                });
                requestAnimationFrame(() => adjustHeight(safeTab));
            };
            buttons.forEach((btn) => {
                btn.addEventListener('click', () => {
                    setTab(btn.getAttribute('data-auth-tab-btn'));
                });
            });
            switchers.forEach((btn) => {
                btn.addEventListener('click', () => {
                    setTab(btn.getAttribute('data-switch-tab'));
                });
            });
            setTab(initialTab);
            window.addEventListener('resize', () => adjustHeight(currentTab));
        });
    </script>
</body>
</html>
