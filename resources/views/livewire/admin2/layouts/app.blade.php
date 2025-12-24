<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@30.1.0/dist/font-face.css" rel="stylesheet">
    {{-- admin2 links --}}
    @include('livewire.admin2.components.links')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    <style>
        body {
            font-family: 'Vazir', 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-white">
    <div class="flex min-h-screen">
        <aside class="w-0 bg-white sm:w-72 lg:block">
            @include('livewire.admin2.components.sidebar')
        </aside>
        <main class="flex-1 sm:-mr-[60px] mx-auto px-4 ">
            @yield('content')
        </main>
    </div>
</body>
</html>
