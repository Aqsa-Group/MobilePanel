<!DOCTYPE html>
<html lang="{{ session('locale', config('app.locale')) }}" dir="{{ session('locale') === 'en' ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بازار مبایل</title>
    @include('Mobile.layouts.links')

    <style>
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #161c0f 0%, #5f502d 100%);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

        .loader-container {
            text-align: center;
            animation: fadeInUp 1s ease;
        }

        .spinner-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
        }

        .spinner {
            position: absolute;
            border: 4px solid transparent;
            border-radius: 50%;
            animation: spin 2s linear infinite;
        }

        .spinner-1 {
            width: 120px;
            height: 120px;
            border-top: 4px solid #122EE1;
            border-bottom: 4px solid #122EE1;
            animation-duration: 1.5s;
        }

        .spinner-2 {
            width: 100px;
            height: 100px;
            top: 10px;
            left: 10px;
            border-left: 4px solid #FF6B6B;
            border-right: 4px solid #FF6B6B;
            animation-duration: 2s;
            animation-direction: reverse;
        }

        .spinner-3 {
            width: 80px;
            height: 80px;
            top: 20px;
            left: 20px;
            border-top: 4px solid #4ECDC4;
            border-bottom: 4px solid #4ECDC4;
            animation-duration: 2.5s;
        }

        .logo-loader {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 30px;
            left: 30px;
            box-shadow: 0 0 20px rgba(18, 46, 225, 0.3);
        }

        .logo-loader span {
            font-size: 24px;
            font-weight: bold;
            color: #122EE1;
            font-family: 'Yekan', sans-serif;
        }

        .loader-text {
            color: white;
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 10px;
            font-family: 'Vazir', sans-serif;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .loader-subtext {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            font-family: 'Vazir', sans-serif;
        }

        .progress-bar {
            width: 200px;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
            margin: 20px auto 0;
            overflow: hidden;
        }

        .progress {
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, #122EE1, #4ECDC4);
            border-radius: 2px;
            animation: progress 3s ease-in-out infinite;
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .element-1 {
            width: 20px;
            height: 20px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .element-2 {
            width: 15px;
            height: 15px;
            top: 60%;
            left: 80%;
            animation-delay: 1s;
        }

        .element-3 {
            width: 25px;
            height: 25px;
            top: 80%;
            left: 20%;
            animation-delay: 2s;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes progress {
            0% {
                width: 0%;
            }

            50% {
                width: 70%;
            }

            100% {
                width: 100%;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .loader-complete {
            opacity: 0;
            visibility: hidden;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        #mainContent {
            display: none;
            opacity: 1;
        }

        .content-loaded {
            display: block;
            opacity: 1;
        }

        #toggleCircle {
            transition: transform 0.3s ease-in-out;
        }

        [dir="rtl"] #toggleCircle.move-dark {
            transform: translateX(-2rem);
        }

        [dir="ltr"] #toggleCircle.move-dark {
            transform: translateX(2rem);
        }

        .dark {
            color-scheme: dark;
        }

        .dark body {
            background-color: #1a202c;
            color: #e2e8f0;
        }

        .dark header {
            background-color: #2d3748;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
        }

        .dark aside {
            background-color: #2d3748;
        }

        .dark input {
            background-color: #4a5568;
            color: #e2e8f0;
            border-color: #718096;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            z-index: 100;
        }

        .mobile-menu-icon {
            width: 24px;
            height: 24px;
            position: relative;
        }

        .mobile-menu-icon span {
            display: block;
            position: absolute;
            height: 3px;
            width: 100%;
            background: #353e73;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .mobile-menu-icon span:nth-child(1) {
            top: 0;
        }

        .mobile-menu-icon span:nth-child(2) {
            top: 8px;
        }

        .mobile-menu-icon span:nth-child(3) {
            top: 16px;
        }

        .mobile-menu-btn.active .mobile-menu-icon span:nth-child(1) {
            transform: rotate(45deg);
            top: 8px;
        }

        .mobile-menu-btn.active .mobile-menu-icon span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-btn.active .mobile-menu-icon span:nth-child(3) {
            transform: rotate(-45deg);
            top: 8px;
        }

        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: none;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 100%;
            padding: 0 1rem;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .company-name {
            font-size: 40px;
            font-weight: bold;
            color: #353e73;
        }

        .search-input {
            width: 250px;
        }

        .profile-image {
            width: 70px;
            height: 70px;
        }

        .notification-btn {
            width: 50px;
            height: 50px;
        }

        .sidebar-container {
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            width: 320px;
            background: white;
            z-index: 50;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            overflow-y: auto;
            padding: 1.5rem;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-container.active {
            transform: translateX(0);
        }

        .mobile-overlay.active {
            display: block;
        }

        .main-content-container {
            margin-top: 1rem;
            padding: 0 1rem;
        }

        @media (max-width: 1024px) {
            .company-name {
                font-size: 32px !important;
            }

            .search-input {
                width: 200px !important;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            .company-name {
                font-size: 24px !important;
                max-width: 200px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .header-container {
                padding: 0 0.5rem;
            }

            .search-input {
                width: 150px !important;
                display: none;
            }

            .profile-image {
                width: 50px !important;
                height: 50px !important;
            }

            .notification-btn {
                width: 45px !important;
                height: 45px !important;
            }

            .notification-btn img {
                width: 20px !important;
                height: 20px !important;
            }

            .profile-dropdown {
                width: 280px !important;
                right: 0;
                left: auto !important;
            }

            #sidebar.desktop-sidebar {
                display: none;
            }
        }

        @media (max-width: 640px) {
            .company-name {
                font-size: 20px !important;
                max-width: 150px;
            }

            .search-input {
                display: none;
            }

            .header-right {
                gap: 0.5rem !important;
            }
        }

        @media (max-width: 480px) {
            header {
                padding-left: 10px !important;
                padding-right: 10px !important;
                height: 70px !important;
            }

            .company-name {
                font-size: 18px !important;
                max-width: 120px;
            }

            .profile-image {
                width: 45px !important;
                height: 45px !important;
            }

            .notification-btn {
                width: 40px !important;
                height: 40px !important;
            }

            .sidebar-container {
                width: 280px;
            }
        }

        @media (min-width: 769px) {
            .sidebar-container {
                position: static;
                transform: none;
                width: 320px;
                height: auto;
                box-shadow: none;
                display: block !important;
            }

            .mobile-overlay {
                display: none !important;
            }

            .mobile-menu-btn {
                display: none;
            }
        }

        .main-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-wrapper {
            display: flex;
            flex: 1;
        }
    </style>
</head>

<body class="vazir dark:text-white">

    <div id="loader">
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
            <div class="floating-element element-3"></div>
        </div>

        <div class="loader-container pulse">
            <div class="spinner-wrapper">
                <div class="spinner spinner-1"></div>
                <div class="spinner spinner-2"></div>
                <div class="spinner spinner-3"></div>
                <div class="logo-loader">
                    <span>مبایل فروشی یاران</span>
                </div>
            </div>

            <div class="loader-text">فروشگاه یاران</div>
            <div class="loader-subtext">در حال بارگذاری...</div>

            <div class="progress-bar">
                <div class="progress"></div>
            </div>
        </div>
    </div>

    <!-- محتوای اصلی -->
    <div id="mainContent">
        <header class="bg-white w-full h-[80px] shadow-[0_4px_4px_rgba(32,41,199,0.4)]">
            <div class="header-container">
                <!-- بخش چپ هدر -->
                <div class="header-left">
                    <!-- دکمه منو موبایل -->
                    <button class="mobile-menu-btn" id="mobileMenuBtn">
                        <div class="mobile-menu-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- نام شرکت -->
                    <div class="text-[40px] text-[#353e73] font-bold amiri company-name">
                        شرکت یاران
                    </div>
                </div>

                <div class="header-right">
                    <!-- جستجو -->
                    <div class="relative">
                        <input type="text" placeholder="جستجو کنید"
                            class="border border-[#8C8C8C] placeholder:text-black vazir rounded-2xl px-3 py-3 pr-10 text-right font-vazir focus:outline-none focus:ring-2 focus:ring-blue-500 search-input">
                        <img src="" alt=""
                            class="h-7 w-7 absolute left-2 bottom-3">
                    </div>

                    <!-- اعلان -->
                    <button
                        class="relative flex items-center justify-center rounded-[25px] bg-[#E5E5E5] hover:bg-gray-300 transition notification-btn">
                        <img src="" alt="اعلان" class="w-7 h-7">
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">3</span>
                    </button>

                    <!-- پروفایل -->
                    <div class="relative">
                        <div id="profileBtn"
                            class="rounded-full border overflow-hidden flex items-center justify-center cursor-pointer transition profile-image">
                            <img src="{{ asset('assets/tools/man.png') }}" alt="پروفایل"
                                class="w-full h-full object-cover">
                        </div>

                        <!-- منو dropdown -->
                        <div id="profileDropdown" style="box-shadow: 0px 4px 4px 0px #00000040, 0 0 0 0 #3B82F6;"
                            class="absolute top-full left-0 space-y-3 text-2xl w-72 h-76 bg-white rounded-lg shadow-lg border hidden z-50 p-4 profile-dropdown">

                            <div class="p-3 border-b space-y-5">
                                <div class="flex flex-col justify-center items-center ">
                                    <img src="{{ asset('assets/tools/man.png') }}" alt="" class="h-20 w-20">
                                    <p class="font-vazir font-semibold text-gray-700 mt-5">
                                        {{ Auth::guard('tools')->user()->name }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex justify-start items-center">
                                <img src="" alt="">
                                <a href="" class="block px-4 py-2 text-gray-700 vazir">تنظیمات</a>
                            </div>

                            <form action="{{ route('tools.logout') }}" method="POST">
                                @csrf
                                <div class="flex justify-start items-center">
                                    <img src="" alt="">
                                    <button type="submit" class="px-4 py-2 text-gray-700 vazir">
                                        خروج از حساب
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="mobile-overlay" id="mobileOverlay"></div>

        <div class="content-wrapper mt-5">
            <div class="sidebar-container" id="mobileSidebar">
                <nav class="mt-0 space-y-1"> 
                       {{-- sidebarlink  --}}
                </nav>
            </div>

        

            <!-- محتوای اصلی -->
            <main class="flex-1 main-content-container">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('loader');
            const mainContent = document.getElementById('mainContent');
            const progressBar = document.querySelector('.progress');

            const profileBtn = document.getElementById('profileBtn');
            const profileDropdown = document.getElementById('profileDropdown');
            
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const mobileOverlay = document.getElementById('mobileOverlay');
            
            function closeMobileMenu() {
                mobileSidebar.classList.remove('active');
                mobileOverlay.classList.remove('active');
                if (mobileMenuBtn) {
                    mobileMenuBtn.classList.remove('active');
                }
            }
            
            if (mobileMenuBtn && mobileSidebar && mobileOverlay) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileSidebar.classList.toggle('active');
                    mobileOverlay.classList.toggle('active');
                    mobileMenuBtn.classList.toggle('active');
                });
                
                mobileOverlay.addEventListener('click', function() {
                    closeMobileMenu();
                });
            }

            profileBtn.addEventListener('click', () => {
                profileDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', (event) => {
                if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });

            if (mainContent) {
                mainContent.style.display = 'none';
            }

            let progress = 0;
            let fakeProgressInterval;

            function startFakeProgress() {
                fakeProgressInterval = setInterval(() => {
                    progress += Math.random() * 30;
                    if (progress > 90) progress = 90;
                    if (progressBar) {
                        progressBar.style.width = progress + '%';
                    }
                }, 10);
            }

            if (loader && progressBar) {
                startFakeProgress();

                window.addEventListener('load', function() {
                    clearInterval(fakeProgressInterval);
                    progress = 100;
                    if (progressBar) {
                        progressBar.style.width = progress + '%';
                    }

                    setTimeout(() => {
                        loader.classList.add('loader-complete');
                        if (mainContent) {
                            mainContent.style.display = 'block';
                            mainContent.classList.add('content-loaded');
                        }

                        setTimeout(() => {
                            loader.style.display = 'none';
                        }, 400);
                    }, 600);
                });
            }

            const navLinks = document.querySelectorAll('.nav-link, .locale-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href && !href.startsWith('#')) {
                        e.preventDefault();
                        if (loader) {
                            loader.style.display = 'flex';
                            loader.classList.remove('loader-complete');
                        }
                        setTimeout(() => window.location.href = href, 50);
                    }
                });
            });

            const btn = document.getElementById('dropdownButton');
            const menu = document.getElementById('dropdownMenu');
            if (btn && menu) {
                btn.addEventListener('click', () => menu.classList.toggle('hidden'));
                document.addEventListener('click', e => {
                    if (!btn.contains(e.target) && !menu.contains(e.target)) {
                        menu.classList.add('hidden');
                    }
                });
            }
            
            window.closeMobileMenu = closeMobileMenu;
        });
    </script>
</body>

</html>