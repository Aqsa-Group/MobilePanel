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
    <!-- فاصله برای هدر -->
    <div class="pt-[78px] min-h-screen">

        <div class="flex">
            @include('livewire.admin2.components.sidebar')

            <main class="flex-1 max-w-full px-3 bg-[#616161]/5 sm:px-4 overflow-x-hidden mx-auto lg:p-6">
                @yield('content')
            </main>
        </div>

    </div>
</body>

</html>
