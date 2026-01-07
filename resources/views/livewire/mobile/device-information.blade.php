<div>
    <div class="  text-gray-800 flex items-center mx-auto max-w-full  justify-center p-3 sm:p-4">
    <!-- باکس اصلی سفید -->
    <div class=" mt-[50] shadow-xl w-full shadow-[0px_4px_4px_0px_#00000040] bg-[#616161]/5  rounded-2xl shadow-lg flex flex-col lg:flex-row overflow-hidden">
        <div class="flex-1 lg:w-7/12 flex items-center justify-center p-5 sm:p-6 order-1 lg:order-1">
        <div class="w-full max-w-md text-center lg:text-right">
            <h2 class="text-[40px] sm:text-2xl font-bold text-center lg:text-right flex items-center justify-center mt-[30px]">
                اطلاعات دستگاه
            </h2>
            <!-- نوار مراحل -->
            <div class="flex items-center justify-center mb-[30px] gap-10 sm:gap-20 animate-fade-in delay-300">
                <div class="flex items-center justify-between relative w-full">
                <!-- خط‌های بین -->
                <div class="absolute top-6 left-[calc(16.5%+1.5rem)] right-[calc(50%+3rem)] z-0">
                    <div class="w-16 sm-[150px] border-t-2 border-dashed border-gray-400"></div>
                </div>
                <div class="absolute top-6 left-[calc(50%+3rem)] right-[calc(16.5%+1.5rem)] z-0">
                    <div class="w-16 sm-[150px] border-t-2 border-dashed border-gray-400"></div>
                </div>
                <!-- مراحل -->
                <div class="flex flex-col items-center relative z-10">
                    <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#0D00C8] font-bold bg-[#1100FF]/20 shadow-md text-[20px]">
                    1
                    </div>
                    <p class="text-sm mt-2 text-gray-700"> مشخصات دستگاه</p>
                </div>
                <div class="flex flex-col items-center relative z-10  px-2">
                    <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#0D00C8] font-bold bg-[#1100FF]/20 shadow-md text-[20px]">
                    2
                    </div>
                    <p class="text-sm mt-2 text-gray-700"> توضیحات دستگاه</p>
                </div>
                <div class="flex flex-col items-center relative z-10  px-2">
                    <div class="w-10 h-10 flex items-center justify-center rounded-xl text-white font-bold bg-[#1100FF] text-[20px] shadow-md">
                    3
                    </div>
                    <p class="text-sm mt-2 text-gray-700"> پیام ثبت</p>
                </div>
                </div>
            </div>
            <!-- تصویر موفقیت -->
            <div class="flex justify-center mb-4">
            <img src="https://i.postimg.cc/FzxKqMpg/mkk-removebg-preview-(1).png" alt="Success"
                class="w-[500px] sm:w-80 md:w-90 rounded-xl ">
            </div>
            <!-- دکمه بازگشت -->
            <div class="flex justify-center">
            <a href="{{ route('inventory') }}"
                class=" w-[300px] flex justify-center py-2.5 rounded-xl bg-[#FF0000] text-white text-sm sm:text-base font-semibold hover:scale-105 transition-all duration-300">
                بازگشت به صفحه اصلی
            </a>
            </div>
        </div>
        </div>
        <!-- ستون عکس (در موبایل پایین بیاد) -->
        <div class="flex-1 lg:w-1/12 flex items-center justify-center p-4 sm:p-5 order-2 lg:order-2">
        <div class="w-full max-w-full rounded-2xl overflow-hidden">
            <img src="https://i.postimg.cc/26KWkgjQ/download-(4).png" alt="Success Illustration"
                class="w-full h-auto ">
        </div>
        </div>
    </div>
    </div>
    <style>
    * {
        font-family: "Vazirmatn", sans-serif !important;
    }
    </style>
</div>
