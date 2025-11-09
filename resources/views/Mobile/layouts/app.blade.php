<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    @include('Mobile.layouts.links') 
</head>
<body class="flex flex-row h-screen">

    
   
    <main class="flex-1 main-content-container flex justify-center items-center overflow-auto">
        @yield('content') 
    </main>

</body>
</html>
