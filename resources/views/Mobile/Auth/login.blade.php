<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>صفحه ورود </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* ======= Base Background ======= */
        body {
            background-color: rgba(0, 0, 255, 0.1);
            background-image: none;
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
                <div class="flex items-center  justify-center hover-lift">
                    <h3 class="flex items-center font-bold gap-2 text-blue-800 mb-4 text-base    sm:text-lg md:text-xl  whitespace-nowrap leading-none">
                    بازار الکترونیک
                    </h3>
                </div>
                <p class="text-[#0053FF] opacity-[70%] text-[8px] sm:text-[9px] leading-none -mt-1 text-center">
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
                <button type="submit"
                    class="w-full bg-[#0B35CC] hover:bg-blue-800 text-white font-bold
                    py-6 sm:py-3.5  rounded-lg transition text-sm sm:text-base
                    hover-lift btn-shimmer">
                    ورود
                </button>
            </form>
        </div>
        <!-- ستون تصویر) -->
        <div class="relative w-full md:w-1/2 order-1 md:mt-0 min-h-[48vh] md:min-h-[450px] mb-0 pb-0 overflow-hidden img-reveal">
            <img
                src="https://i.postimg.cc/nVdv0b8Z/Pixelifybot.jpg"
                alt="phone"
                class="absolute hidden sm:block inset-0 w-full h-auto md:h-full object-cover
                md:rotate-0 origin-center anim-fade"
            />
            <img
                src="https://i.postimg.cc/gjwrg7RY/Pixelifybot.jpg"
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
