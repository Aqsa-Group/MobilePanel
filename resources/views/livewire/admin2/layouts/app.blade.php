<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نبض بازار دیجیتال</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@30.1.0/dist/font-face.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@600;700&display=swap" rel="stylesheet">
    @include('livewire.admin2.components.links')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    <style>
        body.admin-shell {
            min-height: 100vh;
            transition: background 0.3s ease, color 0.3s ease;
        }
        body.admin-shell.dark {
            background: linear-gradient(180deg, #0b1220 0%, #0f172a 100%);
            color: #e5e7eb;
        }
        body.admin-shell.dark header,
        body.admin-shell.dark #sidebar,
        body.admin-shell.dark #adminBellMenu,
        body.admin-shell.dark #profileMenu {
            background-color: #111827 !important;
            border-color: #334155 !important;
        }
        body.admin-shell.dark header {
            box-shadow: 0 0 0 1px rgba(59, 130, 246, 0.35), 0 10px 24px rgba(2, 6, 23, 0.55);
        }
        body.admin-shell.dark #sidebar {
            box-shadow: 0 0 0 1px rgba(59, 130, 246, 0.35), 0 10px 24px rgba(2, 6, 23, 0.7);
        }
        body.admin-shell.dark .bg-white {
            background-color: #111827 !important;
        }
        body.admin-shell.dark .bg-gray-100 {
            background-color: #1f2937 !important;
        }
        body.admin-shell.dark .text-gray-500 {
            color: #94a3b8 !important;
        }
        body.admin-shell.dark .text-gray-600 {
            color: #cbd5e1 !important;
        }
        body.admin-shell.dark .text-gray-700 {
            color: #e2e8f0 !important;
        }
        body.admin-shell.dark .text-gray-800 {
            color: #f1f5f9 !important;
        }
        body.admin-shell.dark .border,
        body.admin-shell.dark [class*="border-"] {
            border-color: #334155 !important;
        }
        body.admin-shell.dark input,
        body.admin-shell.dark select,
        body.admin-shell.dark textarea {
            background-color: #0f172a !important;
            color: #e2e8f0 !important;
            border-color: #334155 !important;
        }
        body.admin-shell.dark input::placeholder,
        body.admin-shell.dark textarea::placeholder {
            color: #94a3b8 !important;
        }
        body.admin-shell.dark .toggle-btn {
            background-color: #0f172a !important;
            color: #e2e8f0 !important;
            border: 1px solid #334155 !important;
            box-shadow: none !important;
        }
        body.admin-shell.dark .toggle-btn:hover {
            background-color: #1e293b !important;
        }
        body.admin-shell.dark .menu-btn {
            color: #e2e8f0 !important;
        }
        body.admin-shell.dark .menu-btn svg path[stroke],
        body.admin-shell.dark .menu-btn svg circle[stroke],
        body.admin-shell.dark .menu-btn svg rect[stroke],
        body.admin-shell.dark .menu-btn svg line[stroke] {
            stroke: #f8fafc !important;
        }
        body.admin-shell.dark .menu-btn svg path[fill]:not([fill='none']),
        body.admin-shell.dark .menu-btn svg circle[fill]:not([fill='none']),
        body.admin-shell.dark .menu-btn svg rect[fill]:not([fill='none']) {
            fill: #f8fafc !important;
        }
        body.admin-shell.dark header .fa-solid,
        body.admin-shell.dark header .fa-regular,
        body.admin-shell.dark header svg {
            color: #f8fafc !important;
        }
        body.admin-shell.dark header svg path[stroke],
        body.admin-shell.dark header svg circle[stroke],
        body.admin-shell.dark header svg rect[stroke] {
            stroke: #f8fafc !important;
        }
    </style>
</head>
<body class="admin-shell">
    <script>
        (function () {
            try {
                if (localStorage.getItem('admin_theme') === 'dark') {
                    document.body.classList.add('dark');
                    document.documentElement.classList.add('dark');
                }
            } catch (e) {}
        })();
    </script>
    @include('components.flash-modal')
    <div class="pt-[72px] min-h-screen">
        <div class="flex min-h-[calc(100vh-72px)] items-stretch">
            @include('livewire.admin2.components.sidebar')
            <main class="flex-1 max-w-full px-3 sm:px-4 overflow-x-hidden mx-auto pt-2 lg:px-6 lg:pt-2 lg:pb-6">
                @isset($slot)
                    {{ $slot }}
                @else
                    @yield('content')
                @endisset
            </main>
        </div>
    </div>
    @livewireScripts
</body>
</html>
