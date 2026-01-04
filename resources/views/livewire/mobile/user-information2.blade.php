<div>
   <div class="text-gray-800 flex items-center max-w-full mt-3 mx-auto justify-center p-3 sm:p-4">
        <!-- باکس اصلی سفید با انیمیشن -->
        <div class="animate-fade-slide w-full overflow-x-hidden p-2 bg-[#fafafa] rounded-2xl shadow-xl flex flex-col lg:flex-row">
        <!-- ستون فرم -->
        <div class="flex-1 lg:w-1/2 flex items-center justify-center px-3 sm:px-4 order-1 animate-fade-in delay-200">

            <div class="w-full max-w-lg mx-auto">
                <h2 class="text-[40px] sm:text-2xl font-bold text-center lg:text-right flex items-center justify-center ">
                    اطلاعات کاربر
                </h2>
                <p class="text-[10px] text-gray-500 text-center lg:text-right mb-6 mt-2 flex items-center justify-center">
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
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#0D00C8] font-bold bg-[#1100FF]/20 shadow-md text-[20px]">
                            1
                            </div>
                            <p class="text-sm text-gray-700">  اطلاعات شخصی</p>
                        </div>
                        <div class="flex flex-col items-center relative z-10 bg-[#fafafa] ">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl text-white font-bold bg-[#1100FF] shadow-md text-[20px]">
                            2
                            </div>
                            <p class="text-sm text-gray-700">  اطلاعات کاربری</p>
                        </div>
                        <div class="flex flex-col items-center relative z-10 bg-[#fafafa] ">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#1100FF] font-bold bg-[#1100FF]/20 text-[20px] shadow-md">
                            3
                            </div>
                            <p class="text-sm text-gray-700"> پیام ثبت</p>
                        </div>
                    </div>
                </div>
                <!-- فرم -->
                <form action="" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-10 gap-3">
                    <!-- نمونه ورودی -->
                    <div class="relative w-full">
                        <input type="text" placeholder="نام کاربری"
                            class="input-field ">
                        <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="relative w-full">
                        <input type="text" placeholder="نقش"
                            class="input-field ">
                        <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_678_3357)">
                            <path d="M10.0999 10.65C10.0416 10.6417 9.9666 10.6417 9.89993 10.65C8.43327 10.6 7.2666 9.39998 7.2666 7.92498C7.2666 6.41665 8.48327 5.19165 9.99993 5.19165C11.5083 5.19165 12.7333 6.41665 12.7333 7.92498C12.7249 9.39998 11.5666 10.6 10.0999 10.65Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.6166 16.15C14.1333 17.5084 12.1666 18.3334 9.99997 18.3334C7.8333 18.3334 5.86663 17.5084 4.3833 16.15C4.46663 15.3667 4.96663 14.6 5.8583 14C8.14163 12.4834 11.875 12.4834 14.1416 14C15.0333 14.6 15.5333 15.3667 15.6166 16.15Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.99984 18.3333C14.6022 18.3333 18.3332 14.6023 18.3332 9.99996C18.3332 5.39759 14.6022 1.66663 9.99984 1.66663C5.39746 1.66663 1.6665 5.39759 1.6665 9.99996C1.6665 14.6023 5.39746 18.3333 9.99984 18.3333Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_678_3357">
                            <rect width="20" height="20" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="relative w-full">
                        <input type="password" placeholder="پسورد"
                            class="input-field ">
                        <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_833_2380)">
                            <path d="M16.4917 12.4417C14.775 14.1501 12.3167 14.6751 10.1584 14.0001L6.23337 17.9167C5.95004 18.2084 5.39171 18.3834 4.99171 18.3251L3.17504 18.0751C2.57504 17.9917 2.01671 17.4251 1.92504 16.8251L1.67504 15.0084C1.61671 14.6084 1.80837 14.0501 2.08337 13.7667L6.00004 9.85006C5.33337 7.68339 5.85004 5.22506 7.56671 3.51672C10.025 1.05839 14.0167 1.05839 16.4834 3.51672C18.95 5.97506 18.95 9.98339 16.4917 12.4417Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.7417 14.575L7.65837 16.4916" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0835 9.16663C12.7739 9.16663 13.3335 8.60698 13.3335 7.91663C13.3335 7.22627 12.7739 6.66663 12.0835 6.66663C11.3931 6.66663 10.8335 7.22627 10.8335 7.91663C10.8335 8.60698 11.3931 9.16663 12.0835 9.16663Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_833_2380">
                            <rect width="20" height="20" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="relative w-full">
                        <input type="text" placeholder="محدود کردن یوزر"
                            class="input-field ">
                        <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_833_2389)">
                            <path d="M8.7418 1.8583L4.58346 3.42497C3.62513 3.7833 2.8418 4.91663 2.8418 5.9333V12.125C2.8418 13.1083 3.4918 14.4 4.28346 14.9916L7.8668 17.6666C9.0418 18.55 10.9751 18.55 12.1501 17.6666L15.7335 14.9916C16.5251 14.4 17.1751 13.1083 17.1751 12.125V5.9333C17.1751 4.9083 16.3918 3.77497 15.4335 3.41663L11.2751 1.8583C10.5668 1.59997 9.43346 1.59997 8.7418 1.8583Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.5415 9.89169L8.88317 11.2334L12.4665 7.65002" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_833_2389">
                            <rect width="20" height="20" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </div>
                    </div>
                    <!-- دکمه‌ها -->
                    <div class="flex flex-col mb-6 sm:flex-row sm:mt-6 justify-between mt-6 gap-4 animate-fade-in delay-500">
                    <a  href="{{ route('user.form') }}"
                    class="w-full sm:w-[48%] py-3 rounded-xl bg-[#FF0000] text-white text-base font-semibold text-center hover:scale-105 transition-all duration-300">
                        برگشت
                    </a>
                    <a href="{{ url('/user-Information') }}"
                        class="w-full sm:w-[48%] py-3 rounded-xl bg-[#1100FF] text-white text-base font-semibold flex items-center justify-center hover:scale-105 transition-all duration-300">
                        ثبت
                    </a>
                    </div>
                </form>
            </div>
        </div>
        <!-- ستون تصویر -->
        <div class="flex-1 lg:w-5/12 flex items-center justify-center p-5 sm:p-5 order-2 lg:order-1   mt-6 lg:mt-0 animate-fade-in delay-400">
            <div class="w-full max-w-full">
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
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(17, 0, 255, 0.2);
        }
        </style>
    </div>
</div>
