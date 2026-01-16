<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل فروشندگان</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
    @include('Mobile.layouts.links')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/js.js') }}"></script>
    @livewireStyles
</head>
<body class="bg-white">
    <div class="flex min-h-screen ">
        @include('Mobile.layouts.sidebar')
        <main class="flex-1 w-full px-3 sm:px-4 overflow-x-hidden mx-auto lg:px-6 pt-16 sm:pt-20 lg:pt-20">
            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </div>
@livewireScripts
</body>
</html>
