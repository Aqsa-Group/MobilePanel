<div class=" text-gray-800 ">
    <div class=" flex items-center justify-center p-3 sm:p-4">
        <!-- باکس اصلی سفید با انیمیشن -->
        <div class="animate-fade-slide  shadow-xl shadow-[0px_4px_4px_0px_#00000040] max-w-7xl   bg-[#fafafa] rounded-2xl overflow-hidden flex flex-col lg:flex-row opacity-0 transform translate-y-10">
            <!-- ستون فرم -->
            <div class="flex-1 lg:w-5/12 flex items-start justify-center sm:p-4 order-1 lg:order-1 animate-fade-in delay-200">
                <div class="w-full max-w-md">
                    <h2 class="text-[40px] sm:text-2xl font-bold text-center lg:text-right flex items-center justify-center mt-[30px]">
                        اطلاعات دستگاه
                    </h2>
                    <p class="text-[10px] text-gray-500 text-center lg:text-right mb-6  flex items-center justify-center">
                        لطفا اطلاعات را وارد کنید.
                    </p>
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
                            <div class="flex flex-col items-center relative z-10 bg-[#fafafa]">
                                <div class="w-10 h-10 flex items-center justify-center rounded-xl text-white font-bold bg-[#1100FF] shadow-md text-[20px]">
                                1
                                </div>
                                <p class="text-sm  text-gray-700"> مشخصات دستگاه</p>
                            </div>
                            <div class="flex flex-col items-center relative z-10 bg-[#fafafa] ">
                                <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#0D00C8] font-bold bg-[#1100FF]/20 shadow-md text-[20px]">
                                2
                                </div>
                                <p class="text-sm  text-gray-700"> توضیحات دستگاه</p>
                            </div>
                            <div class="flex flex-col items-center relative z-10 bg-[#fafafa] ">
                                <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#1100FF] font-bold bg-[#1100FF]/20 text-[20px] shadow-md">
                                3
                                </div>
                                <p class="text-sm  text-gray-700"> پیام ثبت</p>
                            </div>
                        </div>
                    </div>
                    <!-- فرم -->
                    <form action="" class="space-y-8">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-12 gap-3">
                            <!-- نمونه ورودی -->
                            <div class="relative w-full">
                                <input type="text" placeholder="عکس"
                                    class="input-field  ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500 " viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.49984 18.3333H12.4998C16.6665 18.3333 18.3332 16.6666 18.3332 12.5V7.49996C18.3332 3.33329 16.6665 1.66663 12.4998 1.66663H7.49984C3.33317 1.66663 1.6665 3.33329 1.6665 7.49996V12.5C1.6665 16.6666 3.33317 18.3333 7.49984 18.3333Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.50016 8.33333C8.42064 8.33333 9.16683 7.58714 9.16683 6.66667C9.16683 5.74619 8.42064 5 7.50016 5C6.57969 5 5.8335 5.74619 5.8335 6.66667C5.8335 7.58714 6.57969 8.33333 7.50016 8.33333Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.2251 15.7917L6.33343 13.0333C6.99176 12.5917 7.94176 12.6417 8.53343 13.15L8.80843 13.3917C9.45843 13.95 10.5084 13.95 11.1584 13.3917L14.6251 10.4167C15.2751 9.85834 16.3251 9.85834 16.9751 10.4167L18.3334 11.5833" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="برند"
                                    class="input-field  ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2.66663V2.67496" stroke="#17191C" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 6.41663V6.42496" stroke="#17191C" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 9.75V9.75833" stroke="#17191C" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 13.0834V13.0917" stroke="#17191C" stroke-opacity="0.8" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 16V16.0083" stroke="#17191C" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 18.5V18.5083" stroke="#17191C" stroke-opacity="0.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.9165 6.41663V6.42496" stroke="#17191C" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.0835 6.41663V6.42496" stroke="#17191C" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.0835 9.75V9.75833" stroke="#17191C" stroke-opacity="0.8" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.9165 9.75V9.75833" stroke="#17191C" stroke-opacity="0.8" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.0835 12.25V12.2583" stroke="#17191C" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.0835 14.75V14.7583" stroke="#17191C" stroke-opacity="0.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.9165 12.25V12.2583" stroke="#17191C" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.9165 14.75V14.7583" stroke="#17191C" stroke-opacity="0.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.5 8.08337V8.09171" stroke="#17191C" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.4585 4.58337V4.59171" stroke="#17191C" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 8.08337V8.09171" stroke="#17191C" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5415 4.58337V4.59171" stroke="#17191C" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.5 11.4166V11.425" stroke="#17191C" stroke-opacity="0.8" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.5 13.9166V13.925" stroke="#17191C" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.5 16.4166V16.425" stroke="#17191C" stroke-opacity="0.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 11.4166V11.425" stroke="#17191C" stroke-opacity="0.8" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 13.9166V13.925" stroke="#17191C" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.5 16.4166V16.425" stroke="#17191C" stroke-opacity="0.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>


                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="مدل"
                                    class="input-field  ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.75 5.75V15.75C16.75 19.75 15.75 20.75 11.75 20.75H5.75C1.75 20.75 0.75 19.75 0.75 15.75V5.75C0.75 1.75 1.75 0.75 5.75 0.75H11.75C15.75 0.75 16.75 1.75 16.75 5.75Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.75 4.25H6.75" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.7502 17.85C9.60624 17.85 10.3002 17.156 10.3002 16.3C10.3002 15.444 9.60624 14.75 8.7502 14.75C7.89415 14.75 7.2002 15.444 7.2002 16.3C7.2002 17.156 7.89415 17.85 8.7502 17.85Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="حافظه"
                                    class="input-field ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.10979 11.85C5.28979 12.05 5.29979 16.15 8.10979 16.35H14.7798C15.5898 16.36 16.3698 16.05 16.9698 15.51C18.9498 13.78 17.8898 10.31 15.2898 9.98001C14.3598 4.34001 6.20982 6.48 8.13982 11.85" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 15C2 18.87 5.13 22 9 22L7.95001 20.25" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 9C22 5.13 18.87 2 15 2L16.05 3.75" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="رنگ"
                                    class="input-field  ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_448_1071)">
                                <path d="M9.5 19.5V18H4.5C3.95 18 3.45 17.78 3.09 17.41C2.72 17.05 2.5 16.55 2.5 16C2.5 14.97 3.3 14.11 4.31 14.01C4.37 14 4.43 14 4.5 14H19.5C19.57 14 19.63 14 19.69 14.01C20.17 14.05 20.59 14.26 20.91 14.59C21.32 14.99 21.54 15.56 21.49 16.18C21.4 17.23 20.45 18 19.39 18H14.5V19.5C14.5 20.88 13.38 22 12 22C10.62 22 9.5 20.88 9.5 19.5Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.1702 5.3L19.6902 14.01C19.6302 14 19.5702 14 19.5002 14H4.50016C4.43016 14 4.37016 14 4.31016 14.01L3.83016 5.3C3.65016 3.53 5.04016 2 6.81016 2H17.1902C18.9602 2 20.3502 3.53 20.1702 5.3Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.99023 2V7" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 2V4" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_448_1071">
                                <rect width="24" height="24" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>


                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="شماره IMEI"
                                    class="input-field  ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.2748 5.6333L15.4665 16.9083C15.2665 17.75 14.5165 18.3333 13.6498 18.3333H2.69978C1.44145 18.3333 0.541462 17.0999 0.916462 15.8916L4.42479 4.625C4.66646 3.84167 5.39147 3.29993 6.20813 3.29993H16.4581C17.2498 3.29993 17.9081 3.78326 18.1831 4.44993C18.3415 4.80826 18.3748 5.21663 18.2748 5.6333Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10"/>
                                <path d="M13.3335 18.3333H17.3168C18.3918 18.3333 19.2335 17.425 19.1585 16.35L18.3335 5" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.06689 5.31663L8.93357 1.71667" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.6499 5.32501L14.4332 1.70837" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.4165 10H13.0832" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5.5835 13.3334H12.2502" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <!-- دکمه‌ها -->
                        <div class="flex flex-col sm:flex-row sm:mt-6 justify-between mt-6 gap-4 animate-fade-in delay-500">
                            <a href="{{ url('/inventory') }}"
                            class="w-full sm:w-[48%] py-3 rounded-xl bg-[#FF0000] text-white text-base font-semibold text-center hover:scale-105 transition-all duration-300">
                                برگشت
                            </a>
                            <a href="{{ url('/device-form2') }}"
                                class="w-full sm:w-[48%] py-3 rounded-xl bg-[#1100FF] text-white text-base font-semibold flex items-center justify-center hover:scale-105 transition-all duration-300">
                                مرحله بعدی
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ستون تصویر -->
            <div class="flex-1 lg:w-5/12 flex items-center justify-center p-5 sm:p-5 order-2 lg:order-1   mt-6 lg:mt-0 animate-fade-in delay-400">
                <div class="w-full max-w-[400px]">
                    <img src="https://i.postimg.cc/CMnYr98x/download-(2).png" alt="Success Illustration"
                        class="w-full h-auto object-cover rounded-2xl  ">
                </div>
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
        border: 1.5px solid #ccc;
        border-radius: 12px;
        padding: 0.75rem 0.75rem;
        text-align: right;
        transition: all 0.25s ease;
        outline: none;
    }
    .input-field:focus {
        /* border-color: #1100FF; */
        box-shadow: 0 0 0 3px rgba(17, 0, 255, 0.2);
    }
    </style>
</div>
