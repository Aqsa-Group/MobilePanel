<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>همراه یاب</title>

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@30.1.0/dist/font-face.css" rel="stylesheet">

    {{-- website links --}}
    @include('livewire.website.components.links')

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
    <div class=" min-h-screen">

        @include('livewire.website.components.header')

        <main class="flex-1 w-full px-3 sm:px-4 max-w-full overflow-x-hidden mx-auto lg:p-6">
            {{ $slot }}
        </main>

        @include('livewire.website.components.footer')

    </div>

    @livewireScripts
</body>
</html>
