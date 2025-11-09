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
        <div class="flex items-center gap-2 justify-center hover-lift">
          <img src="{{ asset('img/logoo.jpg') }}" alt="لوگو"
               class="h-14 w-14 sm:h-16 sm:w-16 md:h-20 md:w-20 object-contain select-none anim-float" />
          <h3 class="text-blue-700 text-base sm:text-lg md:text-xl font-semibold whitespace-nowrap leading-none">
            پنل موبایل
          </h3>
        </div>
      <p class="text-[#0300CC] text-[8px] sm:text-[9px] leading-none -mt-1 text-center">
  لطفاً اطلاعات حساب خود را وارد کنید.
</p>


      </div>

      <!-- فرم ورود -->
      <form id="loginForm" class="w-full max-w-sm space-y-6 sm:space-y-8 anim-rtl" novalidate>
        <div>
          <div class="relative">
            <input id="username" name="username" type="text" placeholder="نام کاربری"
                   class="peer w-full border border-gray-300 rounded-xl
                          py-6 sm:py-3.5 pr-10 pl-3
                          text-right text-sm sm:text-base
                          outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-500
                          placeholder:text-gray-500 bg-white transition input-anim"/>
            <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 flex items-center">
              <img src="{{ asset('img/profile.png') }}" alt="" aria-hidden="true"
                   class="w-4 h-4 sm:w-5 sm:h-5 object-contain opacity-70 transition peer-focus:opacity-100"/>
            </span>
          </div>
          <p id="userError" class="hidden text-red-600 text-xs sm:text-sm mt-1">نام کاربری الزامی است.</p>
        </div>

        <div>
          <div class="relative">
            <input id="password" name="password" type="password" placeholder="رمز عبور"
                   class="peer w-full border border-gray-300 rounded-xl
                          py-6 sm:py-3.5 pr-10 pl-3
                          text-right text-sm sm:text-base
                          outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-500
                          placeholder:text-gray-500 bg-white transition input-anim"/>
            <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 flex items-center">
              <img src="{{ asset('img/lock.png') }}" alt="" aria-hidden="true"
                   class="w-4 h-4 sm:w-5 sm:h-5 object-contain opacity-70 transition peer-focus:opacity-100"/>
            </span>
          </div>
          <p id="passError" class="hidden text-red-600 text-xs sm:text-sm mt-1">رمز عبور باید حداقل ۶ کاراکتر باشد.</p>
        </div>

        <button type="submit"
                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold
                       py-6 sm:py-3.5 rounded-lg transition text-sm sm:text-base
                       hover-lift btn-shimmer">
          ورود
        </button>
      </form>
    </div>

    <!-- ستون تصویر) -->
    <div class="relative w-full md:w-1/2 order-1 md:mt-0 min-h-[48vh] md:min-h-[350px] mb-0 pb-0 overflow-hidden img-reveal">
     
      <img
        src="{{ asset('img/@Pixelifybot.jpg') }}"
        alt="phone"
        class="absolute inset-0 w-full h-auto md:h-full object-cover
               -rotate-90 md:rotate-0 origin-center anim-fade"
      />

    
      <div class="absolute inset-0 z-10 grid place-items-center px-3 text-center">
        <div class="flex flex-col items-center mt-20 lg:mt-0 lg:py-10 py-5 anim-tilt">
        
          <img
            src="{{ asset('img/11.png') }}"
            alt="overlay"
            class="pointer-events-none object-contain w-[35vw] sm:w-[40vw] md:w-auto md:max-w-[70%]"
          />
          <p class="text-white font-semibold mt-0 sm:text-xs md:text-base drop-shadow">
            بهترین پنل موبایل را بیابید!
          </p>
        </div>
      </div>
    </div>
  </div>

  
  <div id="toast" class="fixed bottom-4 right-4 md:right-auto md:left-1/2 md:-translate-x-1/2 px-4 py-2 rounded-xl bg-blue-600 text-white text-sm shadow-xl opacity-0 pointer-events-none">
    خوش آمدید!
  </div>

  <script>
    // Select-to-copy QoL
    ['username', 'password'].forEach(id => {
      const el = document.getElementById(id);
      el.addEventListener('focus', e => setTimeout(() => e.target.select(), 0));
      el.addEventListener('mouseup', e => e.preventDefault());
    });

    const form = document.getElementById('loginForm');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const userError = document.getElementById('userError');
    const passError = document.getElementById('passError');
    const toast = document.getElementById('toast');

    function setError(inputEl, errorEl, hasError, message) {
      if (hasError) {
        errorEl.textContent = message;
        errorEl.classList.remove('hidden');
        inputEl.classList.remove('border-gray-300');
        inputEl.classList.add('border-red-500');
        // tiny pulse when error shows
        inputEl.style.animation = 'pulse-border .6s ease-out';
        setTimeout(()=> inputEl.style.animation = '', 650);
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
      e.preventDefault();
      const u = username.value.trim();
      const p = password.value;

      const userInvalid = u.length === 0;
      const passInvalid = p.length < 6;

      setError(username, userError, userInvalid, 'نام کاربری الزامی است.');
      setError(password, passError, passInvalid, 'رمز عبور باید حداقل ۶ کاراکتر باشد.');

      if (!userInvalid && !passInvalid) {
        // Success toast
        toast.style.opacity = '0';
        toast.style.pointerEvents = 'auto';
        toast.style.transition = 'opacity .25s ease, transform .25s ease';
        toast.style.transform = 'translateY(8px)';
        requestAnimationFrame(() => {
          toast.style.opacity = '1';
          toast.style.transform = 'translateY(0)';
        });
        setTimeout(() => {
          toast.style.opacity = '0';
          toast.style.transform = 'translateY(8px)';
          setTimeout(()=> toast.style.pointerEvents = 'none', 250);
        }, 1800);

        alert(`خوش آمدید، ${u}!`);
      }
    });

    // Entrance stagger for inputs
    window.addEventListener('DOMContentLoaded', () => {
      const stagger = [...document.querySelectorAll('#loginForm > *')];
      stagger.forEach((el, i) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(12px)';
        el.style.transition = 'opacity .5s ease, transform .5s cubic-bezier(.22,1,.36,1)';
        setTimeout(() => {
          el.style.opacity = '1';
          el.style.transform = 'translateY(0)';
        }, 200 + i * 100);
      });
    });
  </script>
</body>
</html>
