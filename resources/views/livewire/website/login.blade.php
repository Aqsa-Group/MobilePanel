<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>صفحه ورود </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@30.1.0/dist/font-face.css" rel="stylesheet">
    <style>
        /* ======= Base Background ======= */
        body {
            background-color: rgba(0, 0, 255, 0.1);
            background-image: none;
            font-family: 'Vazir', 'Poppins', sans-serif;
        }
        /* ======= Keyframes ======= */
        @keyframes fade-in{
        from{opacity:0} to{opacity:1}
        }
        @keyframes slide-up{
        from{transform:translateY(24px); opacity:0} to{transform:translateY(0); opacity:1}
        }
        @keyframes slide-in-rtl{ /* for RTL: from left to right visually */
        from{transform:translateX(-28px); opacity:0} to{transform:translateX(0); opacity:1}
        }
        @keyframes float-y{
        0%{ transform: translateY(0) }
        50%{ transform: translateY(-8px) }
        100%{ transform: translateY(0) }
        }
        @keyframes subtle-tilt{
        0%{ transform: rotate(-1deg) scale(1) }
        50%{ transform: rotate(1deg) scale(1.01) }
        100%{ transform: rotate(-1deg) scale(1) }
        }
        @keyframes glow{
        0%{ box-shadow: 0 0 0 rgba(59,130,246,0) }
        100%{ box-shadow: 0 10px 30px rgba(59,130,246,.25) }
        }
        @keyframes pulse-border{
        0%{ box-shadow: 0 0 0 0 rgba(59,130,246,.45) }
        100%{ box-shadow: 0 0 0 10px rgba(59,130,246,0) }
        }
        @keyframes shimmer{
        0%{ background-position: 200% 0 }
        100%{ background-position: -200% 0 }
        }
        /* ======= Animation Utilities ======= */
        .anim-fade{ animation: fade-in .7s ease-out both }
        .anim-card{ animation: slide-up .8s cubic-bezier(.22,1,.36,1) .15s both }
        .anim-rtl{ animation: slide-in-rtl .8s cubic-bezier(.22,1,.36,1) .2s both }
        .anim-float{ animation: float-y 5s ease-in-out infinite }
        .anim-tilt{ animation: subtle-tilt 9s ease-in-out infinite }
        .anim-glow{ animation: glow .9s ease-out .2s both }
        /* Button shimmer on hover */
        .btn-shimmer{ position: relative; overflow: hidden }
        .btn-shimmer::after{
        content:""; position:absolute; inset:0; background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,.5) 50%, rgba(255,255,255,0) 100%);
        transform: translateX(-150%);
        }
        .btn-shimmer:hover::after{ animation: shimmer 1.3s ease }
        /* Focus styles & micro-interactions */
        .input-anim{ transition: box-shadow .25s ease, transform .15s ease, border-color .2s ease }
        .input-anim:focus{ box-shadow: 0 8px 24px rgba(59,130,246,.15); transform: translateY(-1px) }
        .card-press{ transition: transform .18s ease }
        .card-press:active{ transform: translateY(1px) }
        .hover-lift{ transition: transform .25s ease }
        .hover-lift:hover{ transform: translateY(-2px) }
        /* Image reveal gradient on the right side */
        .img-reveal{ position: relative }
        .img-reveal::before{
        content:""; position:absolute; inset:0;
        background: radial-gradient(120% 100% at 50% 100%, rgba(0,0,0,.35), rgba(0,0,0,.15) 40%, rgba(0,0,0,0) 70%);
        pointer-events:none; opacity:.3; transition: opacity .4s ease
        }
        .img-reveal:hover::before{ opacity:.2 }
        /* Respect reduced motion */
        @media (prefers-reduced-motion: reduce){
        .anim-fade,.anim-card,.anim-rtl,.anim-float,.anim-tilt,.anim-glow{ animation: none !important }
        .hover-lift,.card-press,.input-anim{ transition: none !important }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen relative p-4 sm:p-6 anim-fade">
    <!-- کارت اصلی: عرض کمتر + قد ثابت در دسکتاپ -->
    <div id="card"
        class="relative w-full max-w-[820px] md:max-w-[880px]
        flex flex-col md:flex-row
        rounded-2xl md:rounded-3xl overflow-hidden shadow-2xl bg-white md:h-[520px]
        anim-card anim-glow card-press">
        <!-- ستون فرم) -->
        <div class="mt-5 relative w-full md:w-1/2 bg-white
            flex flex-col justify-center items-center
            px-8 sm:px-6 md:px-10 order-1">
            <!-- هدر -->
            <div class="mb-8 sm:mb-6 flex flex-col items-center w-full anim-rtl">
               <div class="flex items-center justify-center hover-lift">
                   <div
                    class="w-9 h-9 bg-[#2F25FF] rounded-xl flex items-center justify-center text-white font-bold">
                   <svg width="84" height="84" viewBox="0 0 79 83" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="79" height="83" fill="url(#pattern0_1518_3460)"/>
                        <defs>
                        <pattern id="pattern0_1518_3460" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_1518_3460" transform="matrix(0.00188324 0 0 0.00179248 0 -0.00368706)"/>
                        </pattern>
                        <image id="image0_1518_3460" width="531" height="562" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                        </defs>
                        </svg>

                </div>
                <span class="text-2xl">همراه <span class="text-[#2F25FF]">یاب</span>
                    </span>
                </div>
                <p class="text-[#2F25FF] opacity-[70%] text-[8px] sm:text-[9px] leading-none mt-3 text-center">
                    لطفاً اطلاعات حساب خود را وارد کنید.
                </p>
            </div>
            <!-- فرم ورود -->
            <form  id="loginForm"
                    method="POST"
                    action=""
                    class="w-full max-w-sm space-y-6 sm:space-y-8 anim-rtl"
                >
                @csrf
                <div>
                    <div class="relative">
                        <input id="username" name="username" type="text" placeholder="نام کاربری"
                            class="peer w-full border border-gray-900 rounded-xl
                            py-6 sm:py-3.5 pr-10 pl-3
                            text-right text-sm sm:text-base
                            outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-500
                            placeholder:text-gray-500 bg-white transition input-anim"/>
                        <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 flex  items-center">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.15997 14.56C4.73997 16.18 4.73997 18.82 7.15997 20.43C9.90997 22.27 14.42 22.27 17.17 20.43C19.59 18.81 19.59 16.17 17.17 14.56C14.43 12.73 9.91997 12.73 7.15997 14.56Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </div>
                    <p id="userError" class="hidden text-red-600 text-xs sm:text-sm mt-1">نام کاربری الزامی است.</p>
                </div>
                <div>
                    <div class="relative">
                        <input id="password" name="password" type="password" placeholder="رمز عبور"
                            class="peer w-full border border-gray-900 rounded-xl
                            py-6 sm:py-3.5 pr-10 pl-3
                            text-right text-sm sm:text-base
                            outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-500
                            placeholder:text-gray-500 bg-white transition input-anim"/>
                        <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 flex items-center">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_66)">
                                <path d="M6 10V8C6 4.69 7 2 12 2C17 2 18 4.69 18 8V10" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 18.5C13.3807 18.5 14.5 17.3807 14.5 16C14.5 14.6193 13.3807 13.5 12 13.5C10.6193 13.5 9.5 14.6193 9.5 16C9.5 17.3807 10.6193 18.5 12 18.5Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17 22H7C3 22 2 21 2 17V15C2 11 3 10 7 10H17C21 10 22 11 22 15V17C22 21 21 22 17 22Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_71_66">
                                <rect width="24" height="24" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </span>
                    </div>
                    <p id="passError" class="hidden text-red-600 text-xs sm:text-sm mt-1">رمز عبور باید حداقل ۶ کاراکتر باشد.</p>
                </div>
                <a href="{{ route('website.home') }}"
                class="w-full inline-block bg-[#2F25FF] hover:bg-blue-700 text-white font-bold
                        py-6 sm:py-3.5 text-center rounded-lg transition text-sm sm:text-base
                        hover-lift btn-shimmer">
                    ورود
                </a>
            </form>
        </div>
        <!-- ستون تصویر) -->
        <div class="relative w-full md:w-1/2 order-1 md:mt-0 min-h-[48vh] md:min-h-[450px] mb-0 pb-0 overflow-hidden img-reveal">
            <img
                src="https://i.postimg.cc/25hmvLFQ/222.jpg"
                alt="phone"
                class="absolute hidden sm:block inset-0 w-full h-auto md:h-full object-cover
                md:rotate-0 origin-center anim-fade"
            />
            <img
                src="https://i.postimg.cc/25hmvLFQ/222.jpg"
                alt="phone mobile"
                class="block md:hidden absolute inset-0 mt-[10px] w-full h-full md:h-full object-cover
                md:rotate-0 origin-center anim-fade"
            />
        </div>
    </div>
    <div id="toast" class="fixed bottom-4 right-4 md:right-auto md:left-1/2 md:-translate-x-1/2 px-4 py-2 rounded-xl bg-blue-600 text-white text-sm shadow-xl opacity-0 pointer-events-none">
        خوش آمدید!
    </div>
    <script>
       const form = document.getElementById('loginForm');
const username = document.getElementById('username');
const password = document.getElementById('password');
const userError = document.getElementById('userError');
const passError = document.getElementById('passError');

function setError(inputEl, errorEl, hasError, message) {
    if (hasError) {
        errorEl.textContent = message;
        errorEl.classList.remove('hidden');
        inputEl.classList.remove('border-gray-300');
        inputEl.classList.add('border-red-500');
        inputEl.style.animation = 'pulse-border .6s ease-out';
        setTimeout(() => inputEl.style.animation = '', 650);
    } else {
        errorEl.classList.add('hidden');
        inputEl.classList.remove('border-red-500');
        inputEl.classList.add('border-gray-300');
    }
}

username.addEventListener('input', () => {
    setError(username, userError, username.value.trim().length === 0, 'نام کاربری الزامی است.');
});
password.addEventListener('input', () => {
    setError(password, passError, password.value.length < 6, 'رمز عبور باید حداقل ۶ کاراکتر باشد.');
});

form.addEventListener('submit', (e) => {
    const u = username.value.trim();
    const p = password.value;
    const userInvalid = u.length === 0;
    const passInvalid = p.length < 6;

    setError(username, userError, userInvalid, 'نام کاربری الزامی است.');
    setError(password, passError, passInvalid, 'رمز عبور باید حداقل ۶ کاراکتر باشد.');

    if (userInvalid || passInvalid) {
        e.preventDefault(); // مانع submit در صورت خطا
    }
});

    </script>
</body>
</html>
