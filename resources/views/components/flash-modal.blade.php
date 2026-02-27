@php
    $flashType = null;
    $flashMessage = null;

    if (session()->has('success')) {
        $flashType = 'success';
        $flashMessage = (string) session('success');
    } elseif (session()->has('error')) {
        $flashType = 'error';
        $flashMessage = (string) session('error');
    } elseif (session()->has('warning')) {
        $flashType = 'warning';
        $flashMessage = (string) session('warning');
    } elseif (session()->has('info')) {
        $flashType = 'info';
        $flashMessage = (string) session('info');
    } elseif (session()->has('message')) {
        $flashType = 'success';
        $flashMessage = (string) session('message');
    } elseif (session()->has('status')) {
        $flashType = 'success';
        $flashMessage = (string) session('status');
    }

    $ui = [
        'success' => [
            'title' => 'عملیات موفق',
            'panel' => 'border-emerald-200',
            'icon' => 'bg-emerald-100 text-emerald-700',
            'titleClass' => 'text-emerald-700',
            'button' => 'bg-emerald-600 hover:bg-emerald-700',
        ],
        'error' => [
            'title' => 'خطا در عملیات',
            'panel' => 'border-red-200',
            'icon' => 'bg-red-100 text-red-700',
            'titleClass' => 'text-red-700',
            'button' => 'bg-red-600 hover:bg-red-700',
        ],
        'warning' => [
            'title' => 'توجه',
            'panel' => 'border-amber-200',
            'icon' => 'bg-amber-100 text-amber-700',
            'titleClass' => 'text-amber-700',
            'button' => 'bg-amber-600 hover:bg-amber-700',
        ],
        'info' => [
            'title' => 'اطلاع‌رسانی',
            'panel' => 'border-blue-200',
            'icon' => 'bg-blue-100 text-blue-700',
            'titleClass' => 'text-blue-700',
            'button' => 'bg-blue-600 hover:bg-blue-700',
        ],
    ];

    $config = $ui[$flashType] ?? $ui['success'];

    if ($flashMessage !== null && $flashMessage !== '') {
        foreach (['success', 'error', 'warning', 'info', 'message', 'status'] as $key) {
            session()->forget($key);
        }
    }
@endphp

@if($flashMessage !== null && $flashMessage !== '')
    <div
        x-data="{ open: true }"
        x-show="open"
        x-init="setTimeout(() => open = false, 4200)"
        x-transition.opacity
        class="fixed inset-0 z-[999] flex items-center justify-center p-4"
    >
        <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px]" @click="open = false"></div>

        <div class="relative w-full max-w-md rounded-2xl border {{ $config['panel'] }} bg-white px-5 py-6 text-center shadow-2xl">
            <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full {{ $config['icon'] }}">
                @if($flashType === 'error')
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path d="M15 9l-6 6M9 9l6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                @elseif($flashType === 'warning')
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path d="M12 8v5m0 4h.01M10.2 3.9L3 16.5A2 2 0 004.8 19h14.4a2 2 0 001.8-2.5L13.8 3.9a2 2 0 00-3.6 0z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                @else
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                @endif
            </div>

            <h4 class="text-base font-bold {{ $config['titleClass'] }}">{{ $config['title'] }}</h4>
            <p class="mt-2 text-sm text-gray-700 leading-6">{{ $flashMessage }}</p>

            <button
                type="button"
                @click="open = false"
                class="mt-5 inline-flex items-center justify-center rounded-lg px-4 py-2 text-sm font-semibold text-white transition {{ $config['button'] }}"
            >
                متوجه شدم
            </button>
        </div>
    </div>
@endif
