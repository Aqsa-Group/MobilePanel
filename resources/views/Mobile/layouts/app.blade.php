<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    @include('Mobile.layouts.links') 
    <style>
        @font-face {
    font-family: 'Yekan';
    src: url('/fonts/Yekan.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}
</style>
</head>
<body class="flex flex-row bg-gray-100 font-yekan ">

    
   
    <main class="flex-1 main-content-container flex justify-center items-center mt-20 ">
        @yield('content') 
    </main>

</body>
</html>
