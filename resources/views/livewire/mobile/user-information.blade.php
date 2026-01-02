<div>
    <div class=" text-gray-800 max-w-7xl mx-auto flex items-center justify-center p-3 sm:p-4">
        <!-- باکس اصلی سفید -->
        <div class="animate-fade-slide w-full p-2 shadow-xl shadow-[0px_4px_4px_0px_#00000040] bg-[#FAFAFA] md:w-[600px] mt-[45]    lg:w-[900px]  rounded-2xl flex flex-col lg:flex-row overflow-hidden">
            <div class="flex-1 lg:w-7/12 flex items-center justify-center p-5 sm:p-6 order-1 lg:order-1">
                <div class="w-full max-w-md text-center lg:text-right">
                    <h2 class="text-[40px] sm:text-2xl mb-6 font-bold text-center lg:text-right flex items-center justify-center mt-[30px]">
                        اطلاعات کاربری
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
                        <div class="flex flex-col items-center relative z-10 bg-[#FAFAFA]">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#0D00C8] font-bold bg-[#1100FF]/20 shadow-md text-[20px]">
                                1
                            </div>
                            <p class="text-sm mt-2 text-gray-700">  اطلاعات شخصی</p>
                        </div>
                        <div class="flex flex-col items-center relative z-10 bg-[#FAFAFA]">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#0D00C8] font-bold bg-[#1100FF]/20 shadow-md text-[20px]">
                                2
                            </div>
                            <p class="text-sm mt-2 text-gray-700">  اطلاعات کاربری</p>
                        </div>
                        <div class="flex flex-col items-center relative z-10 bg-[#FAFAFA]">
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
                    class="w-[500px] sm:w-80 md:w-90 ">
                </div>
                <!-- دکمه بازگشت -->
                <div class="flex justify-center">
                <a href="{{ route('user.list') }}"
                    class=" w-[300px] flex justify-center py-2.5 hover:scale-105 transition-all duration-300 rounded-xl bg-[#FF0000] text-white text-sm sm:text-base font-semibold transition-all duration-200">
                    بازگشت به صفحه اصلی
                </a>
                </div>
            </div>
        </div>
        <!-- ستون عکس (در موبایل پایین بیاد) -->
        <div class="flex-1 lg:w-1/12 flex items-center justify-center p-4 sm:p-5 order-2 lg:order-2">
            <div class="w-full max-w-full rounded-2xl overflow-hidden">
                <img src="https://i.postimg.cc/Vkfgsc4N/download-(5).png" alt="Success Illustration"
                    class="w-full h-auto ">
            </div>
        </div>
    </div>
    <style>
         * { font-family: "Vazirmatn", sans-serif !important; }
        @keyframes fade-slide {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in {
            0% { opacity: 0; transform: scale(0.98); }
            100% { opacity: 1; transform: scale(1); }
        }
        .animate-fade-slide {
            animation: fade-slide 0.9s ease-out forwards;
        }
        .animate-fade-in {
            animation: fade-in 0.8s ease-out forwards;
        }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .input-field {
            width: 100%;
            border: 1.5px solid #000000;
            border-radius: 12px;
            padding: 0.75rem 0.75rem;
            text-align: right;
            transition: all 0.25s ease;
            outline: none;
        }
    </style>
</div>
