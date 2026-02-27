<div>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <section class="relative bg-white pt-16 lg:pt-10">
    <div class="absolute top-0 left-0 w-full h-1/2 wave-bg -z-10"></div>
    <div class="mx-auto w-full px-8 md:px-6">
        <div class="flex flex-col justify-center items-center space-y-4">
                    <h1 class="font-bold text-xl sm:text-3xl gradient-text min-h-[2.5rem]">
            <span id="typeText"></span>
            <span class="cursor">|</span>
        </h1>
                    <p class="text-[13px] text-center md:w-[35%] w-[90%] text-gary-500">شماره IMEI یا کد اتومات دستگاه را وارد نموده و اطلاعات دقیق در مورد مشخصات
                        و وضعیت آن دریافت کنید.
                    </p>
                    <div class="relative w-full  sm:w-[400px]">
                        <input
                            type="text"
                            inputmode="numeric"
                            wire:model.defer="imeiInput"
                            wire:keydown.enter.prevent="searchImei"
                            class="border border-gray-600 w-full rounded-lg p-4 overflow-hidden"
                            placeholder="IMEI 15 رقمی یا کد اتومات را وارد کنید...">
                        <button
                            type="button"
                            wire:click="searchImei"
                            class="absolute left-0 top-0 bg-[#2F25FF] rounded-lg w-14 h-[90%] m-1 flex justify-center items-center">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.042 29.1665C23.2907 29.1665 29.167 23.2902 29.167 16.0415C29.167 8.79277 23.2907 2.9165 16.042 2.9165C8.79325 2.9165 2.91699 8.79277 2.91699 16.0415C2.91699 23.2902 8.79325 29.1665 16.042 29.1665Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M27.6063 30.1728C28.3792 32.5062 30.1438 32.7395 31.5 30.6978C32.7396 28.8312 31.9229 27.2999 29.6771 27.2999C28.0146 27.2853 27.0813 28.5833 27.6063 30.1728Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <p class="text-[13px] text-center md:w-[35%] w-[90%] text-gary-500">هر مبایل یا دستگاهی یک شماره 15 رقمی یا کد اتومات دارد. که بر اساس آن
                        شما میتوانید معلومات کامل دستگاه را بدست آورید.
                    </p>
        </div>
    </div>
    @if($showImeiModal)
        @php
            $isBlocked = $imeiState === 'blocked';
            $isFound = $imeiState === 'found';
            $isNotFound = $imeiState === 'not_found' || $imeiState === 'invalid';
            $modalHeaderClass = $isBlocked ? 'from-red-600 to-red-500' : ($isFound ? 'from-blue-700 to-blue-500' : 'from-slate-700 to-slate-600');
            $chipClass = $isBlocked ? 'bg-red-100 text-red-700' : ($isFound ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-700');
        @endphp
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="w-full max-w-3xl rounded-2xl bg-white shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r {{ $modalHeaderClass }} px-4 py-3 text-white flex items-center justify-between">
                    <h4 class="font-bold">نتیجه بررسی IMEI</h4>
                    <button type="button" wire:click="closeImeiModal" class="h-8 w-8 rounded-full bg-white/20 hover:bg-white/30">✕</button>
                </div>
                <div class="p-4 sm:p-5 space-y-4 max-h-[70vh] overflow-y-auto">
                    <div class="rounded-lg border border-gray-200 p-3 flex items-center justify-between gap-3">
                        <p class="text-sm text-gray-700">{{ $imeiMessage }}</p>
                        @if($imeiDevice)
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $chipClass }}">{{ $imeiDevice['status_label'] ?? '-' }}</span>
                        @endif
                    </div>
                    @if($imeiDevice)
                        @php
                            $ownerImage = trim((string) ($imeiDevice['customer_image'] ?? ''));
                            $deviceImage = trim((string) ($imeiDevice['device_image'] ?? ''));
                            $tazkiraImage = trim((string) ($imeiDevice['tazkira_image'] ?? ''));
                            $cartonImage = trim((string) ($imeiDevice['carton_image'] ?? ''));
                        @endphp
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <div class="rounded-lg border p-2 text-center">
                                <p class="text-xs text-gray-500 mb-2">عکس مالک</p>
                                @if($ownerImage !== '')
                                    <img src="{{ asset('storage/' . ltrim($ownerImage, '/')) }}" alt="owner image" class="w-full h-24 rounded-lg object-cover border">
                                @else
                                    <div class="w-full h-24 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                                @endif
                            </div>
                            <div class="rounded-lg border p-2 text-center">
                                <p class="text-xs text-gray-500 mb-2">عکس دستگاه</p>
                                @if($deviceImage !== '')
                                    <img src="{{ asset('storage/' . ltrim($deviceImage, '/')) }}" alt="device image" class="w-full h-24 rounded-lg object-cover border">
                                @else
                                    <div class="w-full h-24 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                                @endif
                            </div>
                            <div class="rounded-lg border p-2 text-center">
                                <p class="text-xs text-gray-500 mb-2">عکس تذکره</p>
                                @if($tazkiraImage !== '')
                                    <img src="{{ asset('storage/' . ltrim($tazkiraImage, '/')) }}" alt="tazkira image" class="w-full h-24 rounded-lg object-cover border">
                                @else
                                    <div class="w-full h-24 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                                @endif
                            </div>
                            <div class="rounded-lg border p-2 text-center">
                                <p class="text-xs text-gray-500 mb-2">عکس کارتن</p>
                                @if($cartonImage !== '')
                                    <img src="{{ asset('storage/' . ltrim($cartonImage, '/')) }}" alt="carton image" class="w-full h-24 rounded-lg object-cover border">
                                @else
                                    <div class="w-full h-24 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                                @endif
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">IMEI</p>
                                <p class="font-semibold" dir="ltr">{{ $imeiDevice['imei'] ?? '-' }}</p>
                            </div>
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">تاریخ ثبت</p>
                                <p class="font-semibold">{{ $imeiDevice['created_at_label'] ?? '-' }}</p>
                            </div>
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">نام مالک</p>
                                <p class="font-semibold">{{ $imeiDevice['customer_name'] ?? '-' }}</p>
                            </div>
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">شماره تماس</p>
                                <p class="font-semibold" dir="ltr">{{ $imeiDevice['customer_phone'] ?? '-' }}</p>
                            </div>
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">آیدی تذکره</p>
                                <p class="font-semibold" dir="ltr">{{ $imeiDevice['customer_tazkira_id'] ?? '-' }}</p>
                            </div>
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">آدرس مالک</p>
                                <p class="font-semibold">{{ $imeiDevice['customer_address'] ?? '-' }}</p>
                            </div>
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">مدل دستگاه</p>
                                <p class="font-semibold">{{ $imeiDevice['model'] ?? '-' }}</p>
                            </div>
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">رنگ</p>
                                <p class="font-semibold">{{ $imeiDevice['color'] ?? '-' }}</p>
                            </div>
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">کتگوری</p>
                                <p class="font-semibold">{{ $imeiDevice['category'] ?? '-' }}</p>
                            </div>
                            <div class="rounded-lg border p-3">
                                <p class="text-xs text-gray-500 mb-1">نام فروشگاه</p>
                                <p class="font-semibold">{{ $imeiDevice['shop_name'] ?? '-' }}</p>
                            </div>
                            @if(($imeiDevice['status'] ?? '') === 'blocked')
                                <div class="rounded-lg border border-red-200 bg-red-50 p-3 sm:col-span-2">
                                    <p class="text-xs text-red-600 mb-1">علت بلاک</p>
                                    <p class="font-semibold text-red-700">{{ $imeiDevice['review_note'] !== '' ? $imeiDevice['review_note'] : 'دلیل بلاک ثبت نشده است.' }}</p>
                                </div>
                            @endif
                        </div>
                    @endif
                    @if($isNotFound)
                        <div class="rounded-lg border border-dashed border-gray-300 p-4 text-center text-sm text-gray-500">
                            اگر شماره IMEI درست باشد و دستگاه قبلاً ثبت شده باشد، مشخصات در اینجا نمایش داده می‌شود.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div >
        <div class="w-full flex justify-between" >
            <div data-aos="zoom-in-right" class="relative w-full sm:w-[320px] sm:h-[300px] hidden lg:flex  sm:-top-36 -right-6 inset-0 bg-[#3B39FF] rounded-tl-[500px]   ">
                <img src="https://i.postimg.cc/8kyzXGnW/undraw-confirmed-c5lo-removebg-preview.png" alt="" class="absolute h-[385px]  left-1/2 -translate-x-1/4 -top-[51px] w-full z-10">
            </div>
            <img src="https://i.postimg.cc/j5Mt16vR/undraw-server-status-7viz.png" data-aos="zoom-in-left"  alt="" class="w-[300px] hidden lg:flex   relative sm:top-[-85px]  h-full  ">
        </div>
       <section data-aos="zoom-in-down"  class="relative mt-0 px-5 sm:-mt-20">
    <div  class=" w-full  ">
        <div class="flex justify-between flex-wrap">
            <div class="w-full lg:w-6/12">
                <h1 class="text-slate-800 mb-3 text-xl font-bold leading-snug sm:text-2xl ">شماره IMEI دستگاه خود را چطور پیدا کنم؟</h1>
                <div class="space-y-6 mt-10">
                    <div class="flex items-center gap-4">
                        <span class="bg-[#3B39FF]  rounded-full text-white py-0.4 px-2">1</span>
                        <p class="text-sm font-semibold  ">کد *#06# را دایل نمایید.</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="bg-[#3B39FF] rounded-full text-white py-0.4 px-2">2</span>
                        <p class="text-sm font-semibold">شماره 15 رقمی IMEI مربوط به دستگاه شما نمایش داده میشود.</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="bg-[#3B39FF] rounded-full text-white py-0.4 px-2">3</span>
                        <p class="text-sm font-semibold">IMEI را در فیلد بالا وارد کنید.</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="bg-[#3B39FF] rounded-full text-white py-0.4 px-2">4</span>
                        <p class="text-sm font-semibold">اطلاعات دستگاه مبایل خود را دریافت کنید.</p>
                    </div>
                </div>
            </div>
            <div  class="w-fulllg:w-6/12  sm:-mt-12">
                <div class="relative z-10 inline-block  ">
                    <img src="https://i.postimg.cc/VNjNKb3c/undraw-mobile-application-uc2q.png" alt="hero section img" class="w-[450px] -ml-16 inline-block h-[350px]">
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
<style>
.gradient-text {
    background: linear-gradient(90deg, #3B39FF, #08015d, #2F25FF);
    background-size: 180% 180%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: wave 3.5s ease-in-out infinite;
}
.cursor {
    display: inline-block;
    margin-right: 4px;
    animation: blink 1s steps(1) infinite;
    color: #2F25FF;
}
@keyframes wave {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
@keyframes blink {
    50% { opacity: 0; }
}
</style>
<script>
const texts = [
    "وضعیت مبایل خود را چک کنید.",
    "بررسی سریع IMEI موبایل.",
    "جلوگیری از خرید موبایل سرقتی."
];
const el = document.getElementById("typeText");
let textIndex = 0;
let charIndex = 0;
let deleting = false;
function typeWriter() {
    const current = texts[textIndex];
    if (!deleting) {
        el.textContent = current.slice(0, charIndex + 1);
        charIndex++;
        if (charIndex === current.length) {
            setTimeout(() => deleting = true, 1200);
        }
    } else {
        el.textContent = current.slice(0, charIndex - 1);
        charIndex--;
        if (charIndex === 0) {
            deleting = false;
            textIndex = (textIndex + 1) % texts.length;
        }
    }
    setTimeout(typeWriter, deleting ? 45 : 85);
}
typeWriter();
</script>
</section>
</div>
