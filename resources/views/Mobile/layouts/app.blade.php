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
<style>

</style>

<body class="bg-gray-100">
    @if(session()->has('welcome'))
        <div  x-data="{ show: true }"  x-show="show"  x-init="setTimeout(() => show = false, 4000)" x-transition:enter="transition duration-500 ease-out"
            x-transition:enter-start="opacity-0 scale-90"  x-transition:enter-end="opacity-100 scale-100"  x-transition:leave="transition duration-700 ease-in"  x-transition:leave-start="opacity-100 scale-100"  x-transition:leave-end="opacity-0 scale-90"  class="fixed inset-0 flex items-center justify-center z-50" >
            <div class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>
            <div class="relative px-6 py-4 rounded-2xl bg-white shadow-lg border border-[#0948EE] text-[#0948EE] font-medium  gap-4">
                <div class="w-16 flex items-center justify-center h-16 rounded-full block mx-auto overflow-hidden border-2 border-[#0948EE] flex-shrink-0">
                    <img    src="{{ asset('storage/' . auth()->user()->image) }}"    alt="{{ auth()->user()->name }}"    class="w-full h-full object-cover"  >
                </div>
                <span class="text-sm block mx-auto mt-4 text-center">
                    {{ session('welcome') }}
                </span>
            </div>
        </div>
    @endif
    <div class="flex min-h-screen ">
        @include('Mobile.layouts.sidebar')
        <main class="flex-1 w-full px-3 sm:px-4 overflow-x-hidden mx-auto lg:px-6 pt-16 sm:pt-20 lg:pt-20">
            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </div>
@livewireScripts
<script>
const toggleBtn = document.getElementById('darkToggle');

// اعمال حالت ذخیره شده
if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark');
    toggleBtn.innerHTML = '<i class="fa-solid fa-sun "></i>'; // آیکون خورشید
} else {
    toggleBtn.innerHTML = '<i class="fa-solid fa-moon "></i>'; // آیکون ماه
}

// کلیک روی toggle
toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    if (document.body.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
        toggleBtn.innerHTML = '<i class="fa-solid fa-sun"></i>';
    } else {
        localStorage.setItem('theme', 'light');
        toggleBtn.innerHTML = '<i class="fa-solid fa-moon"></i>';
    }
});

</script>
</body>
</html>
