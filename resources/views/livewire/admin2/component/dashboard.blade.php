<div class="min-h-screen max-w-full w-full flex justify-center" >
    <main class="w-full px-3 sm:px-4 lg:px-6">
         <section class="col-span-1 lg:col-span-2 rounded-xl p-4 space-y-4">
            <aside class="col-span-1 space-y-5">
            <!-- Cards -->
                <div class="grid grid-cols-1  w-full sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="relative card-anim w-full p-6 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl bg-white overflow-visible ">
                        <div class="w-5 bg-[#0B35CC] absolute right-0 top-0 bottom-0 rounded-xl flex items-center justify-center z-0"></div>
                        <!-- نیم‌دایره‌های سفید که نوار آبی را "کات" می‌کنند -->
                        <div class="cut-circle cut-top"></div>
                        <div class="cut-circle cut-bottom"></div>
                        <!-- محتوا -->
                        <div class="z-10 flex flex-col">
                            <div class="flex justify-between">
                                <!-- دایره درصد (SVG) -->
                                <div class="percent-wrap">
                                    <!-- SVG circle - بدون JS: مقدار 8% ثابت شده -->
                                    <svg width="45" height="45" viewBox="0 0 40 40" class="block">
                                        <!-- حلقه زمینه (خاکستری) -->
                                        <circle cx="20" cy="20" r="18" stroke="#ECECEC" stroke-width="4" fill="none"/>
                                        <!-- آرک درصد (آبی) - شروع از بالا: با rotate(-90) -->
                                        <g transform="rotate(0 20 20)">
                                        <!-- رنگ آبی با stroke-dasharray برای 8% -->
                                        <circle cx="20" cy="20" r="18" stroke="#1F5BFF" stroke-width="4" stroke-linecap="round"
                                                fill="none"
                                                stroke-dasharray="9.05 113.1"
                                                stroke-dashoffset="0"
                                                transform="rotate(-90 20 20)"/>
                                        </g>
                                        <!-- نقطه کوچک در انتهای آرک: مختصات محاسبه شده برای 8% (بدون JS) -->
                                        <!-- محاسبه‌شده: x≈28.672, y≈4.226 -->
                                        <circle cx="28.672" cy="4.226" r="3.6" fill="#1F5BFF" />
                                        <circle cx="28.672" cy="4.226" r="2.6" fill="#FFF" />
                                        <!-- درصد متن داخل -->
                                        <text x="20" y="25" text-anchor="middle" font-size="10" font-weight="800" fill="#111827">8%</text>
                                    </svg>
                                </div>
                                <div class="flex-1"></div>
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5771 21.4373L15.7646 23.6248L21.598 17.7915" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.5832 8.74984H20.4165C23.3332 8.74984 23.3332 7.2915 23.3332 5.83317C23.3332 2.9165 21.8748 2.9165 20.4165 2.9165H14.5832C13.1248 2.9165 11.6665 2.9165 11.6665 5.83317C11.6665 8.74984 13.1248 8.74984 14.5832 8.74984Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M23.3333 5.86279C28.1896 6.12529 30.625 7.91904 30.625 14.5836V23.3336C30.625 29.167 29.1667 32.0836 21.875 32.0836H13.125C5.83333 32.0836 4.375 29.167 4.375 23.3336V14.5836C4.375 7.93363 6.81042 6.12529 11.6667 5.86279" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <!-- عدد بزرگ و متن -->
                            <div class="flex flex-col mt-6 h-full pt-2">
                                <div class="ml-auto pr-2">
                                    <div class="text-3xl font-bold leading-none">200</div>
                                </div>
                                <div class="w-full flex items-center justify-start mt-2 z-20">
                                    <div class="-pr-6">
                                        <p class="text-gray-500">دستگاه های در حال انتظار</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative card-anim w-full p-6 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl bg-white overflow-visible ">
                        <div class="w-5 bg-[#0B35CC] absolute right-0 top-0 bottom-0 rounded-xl flex items-center justify-center z-0"></div>
                        <!-- نیم‌دایره‌های سفید که نوار آبی را "کات" می‌کنند -->
                        <div class="cut-circle cut-top"></div>
                        <div class="cut-circle cut-bottom"></div>
                        <!-- محتوا -->
                        <div class="z-10 flex flex-col">
                            <div class="flex justify-between">
                                <!-- دایره درصد (SVG) -->
                                <div class="percent-wrap">
                                    <!-- SVG circle - بدون JS: مقدار 8% ثابت شده -->
                                    <!-- تنظیمات: r=18, cx=20, cy=20 => محیط ≈ 113.097, 8% => stroke length ≈ 9.0478 -->
                                    <svg width="45" height="45" viewBox="0 0 40 40" class="block">
                                        <!-- حلقه زمینه (خاکستری) -->
                                        <circle cx="20" cy="20" r="18" stroke="#ECECEC" stroke-width="4" fill="none"/>
                                        <!-- آرک درصد (آبی) - شروع از بالا: با rotate(-90) -->
                                        <g transform="rotate(0 20 20)">
                                        <!-- رنگ آبی با stroke-dasharray برای 8% -->
                                        <circle cx="20" cy="20" r="18" stroke="#1F5BFF" stroke-width="4" stroke-linecap="round"
                                                fill="none"
                                                stroke-dasharray="9.05 113.1"
                                                stroke-dashoffset="0"
                                                transform="rotate(-90 20 20)"/>
                                        </g>
                                        <!-- نقطه کوچک در انتهای آرک: مختصات محاسبه شده برای 8% (بدون JS) -->
                                        <!-- محاسبه‌شده: x≈28.672, y≈4.226 -->
                                        <circle cx="28.672" cy="4.226" r="3.6" fill="#1F5BFF" />
                                        <circle cx="28.672" cy="4.226" r="2.6" fill="#FFF" />
                                        <!-- درصد متن داخل -->
                                        <text x="20" y="25" text-anchor="middle" font-size="10" font-weight="800" fill="#111827">8%</text>
                                    </svg>
                                </div>
                                <div class="flex-1"></div>
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.2981 3.25215L8.02106 5.97923C6.34397 6.60632 4.97314 8.58965 4.97314 10.3834V21.2188C4.97314 22.9396 6.11066 25.2001 7.49608 26.2355L13.7669 30.9167C15.8231 32.4626 19.2065 32.4626 21.2627 30.9167L27.5336 26.2355C28.919 25.2001 30.0565 22.9396 30.0565 21.2188V10.3834C30.0565 8.58965 28.6856 6.60632 27.0085 5.97923L19.7315 3.25215C18.4919 2.80007 16.5085 2.80007 15.2981 3.25215Z" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.4998 22.6042C20.7215 22.6042 23.3332 19.9925 23.3332 16.7708C23.3332 13.5492 20.7215 10.9375 17.4998 10.9375C14.2782 10.9375 11.6665 13.5492 11.6665 16.7708C11.6665 19.9925 14.2782 22.6042 17.4998 22.6042Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.8644 14.9478V16.304C17.8644 16.8144 17.6019 17.2957 17.1499 17.5582L16.0415 18.229" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <!-- عدد بزرگ و متن -->
                            <div class="flex flex-col mt-6 h-full pt-2">
                                <div class="ml-auto pr-2">
                                    <div class="text-3xl font-bold leading-none">200</div>
                                </div>
                                <div class="w-full flex items-center justify-start mt-2 z-20">
                                    <div class="-pr-6">
                                        <p class="text-gray-500">دستگاه های در حال انتظار</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative card-anim w-full p-6 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl bg-white overflow-visible ">
                        <div class="w-5 bg-[#0B35CC] absolute right-0 top-0 bottom-0 rounded-xl flex items-center justify-center z-0"></div>
                        <!-- نیم‌دایره‌های سفید که نوار آبی را "کات" می‌کنند -->
                        <div class="cut-circle cut-top"></div>
                        <div class="cut-circle cut-bottom"></div>
                        <!-- محتوا -->
                        <div class="z-10 flex flex-col">
                            <div class="flex justify-between">
                                <!-- دایره درصد (SVG) -->
                                <div class="percent-wrap">
                                    <!-- SVG circle - بدون JS: مقدار 8% ثابت شده -->
                                    <!-- تنظیمات: r=18, cx=20, cy=20 => محیط ≈ 113.097, 8% => stroke length ≈ 9.0478 -->
                                    <svg width="45" height="45" viewBox="0 0 40 40" class="block">
                                        <!-- حلقه زمینه (خاکستری) -->
                                        <circle cx="20" cy="20" r="18" stroke="#ECECEC" stroke-width="4" fill="none"/>
                                        <!-- آرک درصد (آبی) - شروع از بالا: با rotate(-90) -->
                                        <g transform="rotate(0 20 20)">
                                        <!-- رنگ آبی با stroke-dasharray برای 8% -->
                                        <circle cx="20" cy="20" r="18" stroke="#1F5BFF" stroke-width="4" stroke-linecap="round"
                                                fill="none"
                                                stroke-dasharray="9.05 113.1"
                                                stroke-dashoffset="0"
                                                transform="rotate(-90 20 20)"/>
                                        </g>
                                        <!-- نقطه کوچک در انتهای آرک: مختصات محاسبه شده برای 8% (بدون JS) -->
                                        <!-- محاسبه‌شده: x≈28.672, y≈4.226 -->
                                        <circle cx="28.672" cy="4.226" r="3.6" fill="#1F5BFF" />
                                        <circle cx="28.672" cy="4.226" r="2.6" fill="#FFF" />
                                        <!-- درصد متن داخل -->
                                        <text x="20" y="25" text-anchor="middle" font-size="10" font-weight="800" fill="#111827">8%</text>
                                    </svg>
                                </div>
                                <div class="flex-1"></div>
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.2981 3.25215L8.02106 5.99382C6.34398 6.6209 4.97314 8.60423 4.97314 10.3834V21.2188C4.97314 22.9396 6.11064 25.2001 7.49606 26.2355L13.7669 30.9167C15.8231 32.4626 19.2065 32.4626 21.2627 30.9167L27.5336 26.2355C28.919 25.2001 30.0565 22.9396 30.0565 21.2188V10.3834C30.0565 8.58965 28.6856 6.60632 27.0086 5.97923L19.7315 3.25215C18.4919 2.80007 16.5086 2.80007 15.2981 3.25215Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.1978 17.3106L15.5457 19.6585L21.8165 13.3877" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <!-- عدد بزرگ و متن -->
                            <div class="flex flex-col mt-6 h-full pt-2">
                                <div class="ml-auto pr-2">
                                    <div class="text-3xl font-bold leading-none">200</div>
                                </div>
                                <div class="w-full flex items-center justify-start mt-2 z-20">
                                    <div class="-pr-6">
                                        <p class="text-gray-500">دستگاه های در حال انتظار</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative card-anim w-full p-6 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl bg-white overflow-visible ">
                        <div class="w-5 bg-[#0B35CC] absolute right-0 top-0 bottom-0 rounded-xl flex items-center justify-center z-0"></div>
                        <!-- نیم‌دایره‌های سفید که نوار آبی را "کات" می‌کنند -->
                        <div class="cut-circle cut-top"></div>
                        <div class="cut-circle cut-bottom"></div>
                        <!-- محتوا -->
                        <div class="z-10 flex flex-col">
                            <div class="flex justify-between">
                                <!-- دایره درصد (SVG) -->
                                <div class="percent-wrap">
                                    <!-- SVG circle - بدون JS: مقدار 8% ثابت شده -->
                                    <!-- تنظیمات: r=18, cx=20, cy=20 => محیط ≈ 113.097, 8% => stroke length ≈ 9.0478 -->
                                    <svg width="45" height="45" viewBox="0 0 40 40" class="block">
                                        <!-- حلقه زمینه (خاکستری) -->
                                        <circle cx="20" cy="20" r="18" stroke="#ECECEC" stroke-width="4" fill="none"/>
                                        <!-- آرک درصد (آبی) - شروع از بالا: با rotate(-90) -->
                                        <g transform="rotate(0 20 20)">
                                        <!-- رنگ آبی با stroke-dasharray برای 8% -->
                                        <circle cx="20" cy="20" r="18" stroke="#1F5BFF" stroke-width="4" stroke-linecap="round"
                                                fill="none"
                                                stroke-dasharray="9.05 113.1"
                                                stroke-dashoffset="0"
                                                transform="rotate(-90 20 20)"/>
                                        </g>
                                        <!-- نقطه کوچک در انتهای آرک: مختصات محاسبه شده برای 8% (بدون JS) -->
                                        <!-- محاسبه‌شده: x≈28.672, y≈4.226 -->
                                        <circle cx="28.672" cy="4.226" r="3.6" fill="#1F5BFF" />
                                        <circle cx="28.672" cy="4.226" r="2.6" fill="#FFF" />
                                        <!-- درصد متن داخل -->
                                        <text x="20" y="25" text-anchor="middle" font-size="10" font-weight="800" fill="#111827">8%</text>
                                    </svg>
                                </div>
                                <div class="flex-1"></div>
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4336 29.1958L13.7523 30.9312C15.8086 32.4771 19.1919 32.4771 21.2482 30.9312L27.519 26.25C28.9044 25.2146 30.0419 22.9541 30.0419 21.2333V10.3833" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M27.6789 6.32923C27.4602 6.19798 27.2268 6.08131 26.9935 5.97923L19.7164 3.25215C18.506 2.80007 16.5227 2.80007 15.3122 3.25215L8.02057 5.99382C6.34349 6.6209 4.97266 8.60423 4.97266 10.3834V21.2188C4.97266 22.9396 6.11016 25.2001 7.49557 26.2355L7.78724 26.4542" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M32.0837 2.9165L2.91699 32.0832" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <!-- عدد بزرگ و متن -->
                            <div class="flex flex-col mt-6 h-full pt-2">
                                <div class="ml-auto pr-2">
                                    <div class="text-3xl font-bold leading-none">200</div>
                                </div>
                                <div class="w-full flex items-center justify-start mt-2 z-20">
                                    <div class="-pr-6">
                                    <p class="text-gray-500">دستگاه های در حال انتظار</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative card-anim w-full p-6 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl bg-white overflow-visible ">
                        <div class="w-5 bg-[#0B35CC] absolute right-0 top-0 bottom-0 rounded-xl flex items-center justify-center z-0"></div>
                        <!-- نیم‌دایره‌های سفید که نوار آبی را "کات" می‌کنند -->
                        <div class="cut-circle cut-top"></div>
                        <div class="cut-circle cut-bottom"></div>
                        <!-- محتوا -->
                        <div class="z-10 flex flex-col">
                            <div class="flex justify-between">
                                <!-- دایره درصد (SVG) -->
                                <div class="percent-wrap">
                                    <!-- SVG circle - بدون JS: مقدار 8% ثابت شده -->
                                    <!-- تنظیمات: r=18, cx=20, cy=20 => محیط ≈ 113.097, 8% => stroke length ≈ 9.0478 -->
                                    <svg width="45" height="45" viewBox="0 0 40 40" class="block">
                                        <!-- حلقه زمینه (خاکستری) -->
                                        <circle cx="20" cy="20" r="18" stroke="#ECECEC" stroke-width="4" fill="none"/>
                                        <!-- آرک درصد (آبی) - شروع از بالا: با rotate(-90) -->
                                        <g transform="rotate(0 20 20)">
                                        <!-- رنگ آبی با stroke-dasharray برای 8% -->
                                        <circle cx="20" cy="20" r="18" stroke="#1F5BFF" stroke-width="4" stroke-linecap="round"
                                                fill="none"
                                                stroke-dasharray="9.05 113.1"
                                                stroke-dashoffset="0"
                                                transform="rotate(-90 20 20)"/>
                                        </g>
                                        <!-- نقطه کوچک در انتهای آرک: مختصات محاسبه شده برای 8% (بدون JS) -->
                                        <!-- محاسبه‌شده: x≈28.672, y≈4.226 -->
                                        <circle cx="28.672" cy="4.226" r="3.6" fill="#1F5BFF" />
                                        <circle cx="28.672" cy="4.226" r="2.6" fill="#FFF" />
                                        <!-- درصد متن داخل -->
                                        <text x="20" y="25" text-anchor="middle" font-size="10" font-weight="800" fill="#111827">8%</text>
                                    </svg>
                                </div>
                                <div class="flex-1"></div>
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.9582 32.0832H7.2915C4.37484 32.0832 2.9165 30.6248 2.9165 27.7082V16.0415C2.9165 13.1248 4.37484 11.6665 7.2915 11.6665H14.5832V27.7082C14.5832 30.6248 16.0415 32.0832 18.9582 32.0832Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.7436 5.8335C14.6269 6.271 14.5832 6.75225 14.5832 7.29183V11.6668H7.2915V8.75016C7.2915 7.146 8.604 5.8335 10.2082 5.8335H14.7436Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M20.4165 11.6665V18.9582" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M26.25 11.6665V18.9582" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M24.7915 24.7915H21.8748C21.0728 24.7915 20.4165 25.4478 20.4165 26.2498V32.0832H26.2498V26.2498C26.2498 25.4478 25.5936 24.7915 24.7915 24.7915Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.75 18.9585V24.7918" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.5835 27.7082V7.2915C14.5835 4.37484 16.0418 2.9165 18.9585 2.9165H27.7085C30.6252 2.9165 32.0835 4.37484 32.0835 7.2915V27.7082C32.0835 30.6248 30.6252 32.0832 27.7085 32.0832H18.9585C16.0418 32.0832 14.5835 30.6248 14.5835 27.7082Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <!-- عدد بزرگ و متن -->
                            <div class="flex flex-col mt-6 h-full pt-2">
                                <div class="ml-auto pr-2">
                                    <div class="text-3xl font-bold leading-none">200</div>
                                </div>
                                <div class="w-full flex items-center justify-start mt-2 z-20">
                                    <div class="-pr-6">
                                        <p class="text-gray-500">دستگاه های در حال انتظار</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative card-anim w-full p-6 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl bg-white overflow-visible ">
                        <div class="w-5 bg-[#0B35CC] absolute right-0 top-0 bottom-0 rounded-xl flex items-center justify-center z-0"></div>
                        <!-- نیم‌دایره‌های سفید که نوار آبی را "کات" می‌کنند -->
                        <div class="cut-circle cut-top"></div>
                        <div class="cut-circle cut-bottom"></div>
                        <!-- محتوا -->
                        <div class="z-10 flex flex-col">
                            <div class="flex justify-between">
                                <!-- دایره درصد (SVG) -->
                                <div class="percent-wrap">
                                    <!-- SVG circle - بدون JS: مقدار 8% ثابت شده -->
                                    <!-- تنظیمات: r=18, cx=20, cy=20 => محیط ≈ 113.097, 8% => stroke length ≈ 9.0478 -->
                                    <svg width="45" height="45" viewBox="0 0 40 40" class="block">
                                        <!-- حلقه زمینه (خاکستری) -->
                                        <circle cx="20" cy="20" r="18" stroke="#ECECEC" stroke-width="4" fill="none"/>
                                        <!-- آرک درصد (آبی) - شروع از بالا: با rotate(-90) -->
                                        <g transform="rotate(0 20 20)">
                                        <!-- رنگ آبی با stroke-dasharray برای 8% -->
                                        <circle cx="20" cy="20" r="18" stroke="#1F5BFF" stroke-width="4" stroke-linecap="round"
                                                fill="none"
                                                stroke-dasharray="9.05 113.1"
                                                stroke-dashoffset="0"
                                                transform="rotate(-90 20 20)"/>
                                        </g>
                                        <!-- نقطه کوچک در انتهای آرک: مختصات محاسبه شده برای 8% (بدون JS) -->
                                        <!-- محاسبه‌شده: x≈28.672, y≈4.226 -->
                                        <circle cx="28.672" cy="4.226" r="3.6" fill="#1F5BFF" />
                                        <circle cx="28.672" cy="4.226" r="2.6" fill="#FFF" />
                                        <!-- درصد متن داخل -->
                                        <text x="20" y="25" text-anchor="middle" font-size="10" font-weight="800" fill="#111827">8%</text>
                                    </svg>
                                </div>
                                <div class="flex-1"></div>
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1131_3264)">
                                    <path d="M11.6665 2.9165V7.2915" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M23.3335 2.9165V7.2915" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M30.625 12.3957V24.7915C30.625 29.1665 28.4375 32.0832 23.3333 32.0832H11.6667C6.5625 32.0832 4.375 29.1665 4.375 24.7915V12.3957C4.375 8.02067 6.5625 5.104 11.6667 5.104H23.3333C28.4375 5.104 30.625 8.02067 30.625 12.3957Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.6665 16.0415H23.3332" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.6665 23.3335H17.4998" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_1131_3264">
                                    <rect width="35" height="35" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <!-- عدد بزرگ و متن -->
                            <div class="flex flex-col mt-6 h-full pt-2">
                                <div class="ml-auto pr-2">
                                    <div class="text-3xl font-bold leading-none">200</div>
                                </div>
                                <div class="w-full flex items-center justify-start mt-2 z-20">
                                    <div class="-pr-6">
                                        <p class="text-gray-500">دستگاه های در حال انتظار</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative card-anim w-full p-6 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl bg-white overflow-visible ">
                        <div class="w-5 bg-[#0B35CC] absolute right-0 top-0 bottom-0 rounded-xl flex items-center justify-center z-0"></div>
                        <!-- نیم‌دایره‌های سفید که نوار آبی را "کات" می‌کنند -->
                        <div class="cut-circle cut-top"></div>
                        <div class="cut-circle cut-bottom"></div>
                        <!-- محتوا -->
                        <div class="z-10 flex flex-col">
                            <div class="flex justify-between">
                                <!-- دایره درصد (SVG) -->
                                <div class="percent-wrap">
                                    <!-- SVG circle - بدون JS: مقدار 8% ثابت شده -->
                                    <!-- تنظیمات: r=18, cx=20, cy=20 => محیط ≈ 113.097, 8% => stroke length ≈ 9.0478 -->
                                    <svg width="45" height="45" viewBox="0 0 40 40" class="block">
                                        <!-- حلقه زمینه (خاکستری) -->
                                        <circle cx="20" cy="20" r="18" stroke="#ECECEC" stroke-width="4" fill="none"/>
                                        <!-- آرک درصد (آبی) - شروع از بالا: با rotate(-90) -->
                                        <g transform="rotate(0 20 20)">
                                        <!-- رنگ آبی با stroke-dasharray برای 8% -->
                                        <circle cx="20" cy="20" r="18" stroke="#1F5BFF" stroke-width="4" stroke-linecap="round"
                                                fill="none"
                                                stroke-dasharray="9.05 113.1"
                                                stroke-dashoffset="0"
                                                transform="rotate(-90 20 20)"/>
                                        </g>
                                        <!-- نقطه کوچک در انتهای آرک: مختصات محاسبه شده برای 8% (بدون JS) -->
                                        <!-- محاسبه‌شده: x≈28.672, y≈4.226 -->
                                        <circle cx="28.672" cy="4.226" r="3.6" fill="#1F5BFF" />
                                        <circle cx="28.672" cy="4.226" r="2.6" fill="#FFF" />
                                        <!-- درصد متن داخل -->
                                        <text x="20" y="25" text-anchor="middle" font-size="10" font-weight="800" fill="#111827">8%</text>
                                    </svg>
                                </div>
                                <div class="flex-1"></div>
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1131_3254)">
                                    <path d="M18.0396 12.9502H25.6958" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.3042 12.9502L10.3979 14.0439L13.6792 10.7627" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.0396 23.1582H25.6958" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.3042 23.1582L10.3979 24.252L13.6792 20.9707" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.1248 32.0832H21.8748C29.1665 32.0832 32.0832 29.1665 32.0832 21.8748V13.1248C32.0832 5.83317 29.1665 2.9165 21.8748 2.9165H13.1248C5.83317 2.9165 2.9165 5.83317 2.9165 13.1248V21.8748C2.9165 29.1665 5.83317 32.0832 13.1248 32.0832Z" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_1131_3254">
                                    <rect width="35" height="35" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <!-- عدد بزرگ و متن -->
                            <div class="flex flex-col mt-6 h-full pt-2">
                                <div class="ml-auto pr-2">
                                    <div class="text-3xl font-bold leading-none">200</div>
                                </div>
                                <div class="w-full flex items-center justify-start mt-2 z-20">
                                    <div class="-pr-6">
                                    <p class="text-gray-500">دستگاه های در حال انتظار</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative card-anim w-full p-6 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl bg-white overflow-visible ">
                        <div class="w-5 bg-[#0B35CC] absolute right-0 top-0 bottom-0 rounded-xl flex items-center justify-center z-0"></div>
                        <!-- نیم‌دایره‌های سفید که نوار آبی را "کات" می‌کنند -->
                        <div class="cut-circle cut-top"></div>
                        <div class="cut-circle cut-bottom"></div>
                        <!-- محتوا -->
                        <div class="z-10 flex flex-col">
                            <div class="flex justify-between">
                                <!-- دایره درصد (SVG) -->
                                <div class="percent-wrap">
                                    <!-- SVG circle - بدون JS: مقدار 8% ثابت شده -->
                                    <!-- تنظیمات: r=18, cx=20, cy=20 => محیط ≈ 113.097, 8% => stroke length ≈ 9.0478 -->
                                    <svg width="45" height="45" viewBox="0 0 40 40" class="block">
                                        <!-- حلقه زمینه (خاکستری) -->
                                        <circle cx="20" cy="20" r="18" stroke="#ECECEC" stroke-width="4" fill="none"/>
                                        <!-- آرک درصد (آبی) - شروع از بالا: با rotate(-90) -->
                                        <g transform="rotate(0 20 20)">
                                        <!-- رنگ آبی با stroke-dasharray برای 8% -->
                                        <circle cx="20" cy="20" r="18" stroke="#1F5BFF" stroke-width="4" stroke-linecap="round"
                                                fill="none"
                                                stroke-dasharray="9.05 113.1"
                                                stroke-dashoffset="0"
                                                transform="rotate(-90 20 20)"/>
                                        </g>
                                        <!-- نقطه کوچک در انتهای آرک: مختصات محاسبه شده برای 8% (بدون JS) -->
                                        <!-- محاسبه‌شده: x≈28.672, y≈4.226 -->
                                        <circle cx="28.672" cy="4.226" r="3.6" fill="#1F5BFF" />
                                        <circle cx="28.672" cy="4.226" r="2.6" fill="#FFF" />
                                        <!-- درصد متن داخل -->
                                        <text x="20" y="25" text-anchor="middle" font-size="10" font-weight="800" fill="#111827">8%</text>
                                    </svg>
                                </div>
                                <div class="flex-1"></div>
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.6058 16.5376C21.1745 14.1459 19.0891 12.0604 16.6974 12.6292C15.5745 12.9063 14.6558 13.8251 14.3787 14.948C13.81 17.3396 15.8954 19.425 18.287 18.8563C19.4245 18.5792 20.3433 17.6605 20.6058 16.5376Z" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M26.265 25.0686C28.7587 22.7353 30.3191 19.4248 30.3191 15.7352C30.3191 8.64772 24.5733 2.9165 17.5004 2.9165C10.4275 2.9165 4.68164 8.66231 4.68164 15.7352C4.68164 19.4394 6.25664 22.779 8.77955 25.1123" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.6671 21.2186C10.3254 19.7894 9.49414 17.8644 9.49414 15.7352C9.49414 11.3165 13.0816 7.729 17.5004 7.729C21.9191 7.729 25.5067 11.3165 25.5067 15.7352C25.5067 17.8644 24.6754 19.7748 23.3337 21.2186" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.0204 24.2957L12.9204 26.9062C11.2579 28.9916 12.7308 32.0686 15.3996 32.0686H19.585C22.2537 32.0686 23.7412 28.977 22.0642 26.9062L19.9642 24.2957C18.71 22.7061 16.2892 22.7061 15.0204 24.2957Z" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <!-- عدد بزرگ و متن -->
                            <div class="flex flex-col mt-6 h-full pt-2">
                                <div class="ml-auto pr-2">
                                    <div class="text-3xl font-bold leading-none">200</div>
                                </div>
                                <div class="w-full flex items-center justify-start mt-2 z-20">
                                    <div class="-pr-6">
                                        <p class="text-gray-500">دستگاه های در حال انتظار</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- نمودارها: ردیف پایین -->
            <div class="col-span-1 max-w-full lg:col-span-3 grid grid-cols-1 lg:grid-cols-2 gap-5 mt-6">
                <div class="card-anim bg-white shadow-lg rounded-xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl p-5 "style="border-color: rgba(9, 72, 238, 0.15);">
                    <div class="flex items-center gap-2 ">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.87988 18.1501V16.0801" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 18.1498V14.0098" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.1201 18.1502V11.9302" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.1199 5.8501L16.6599 6.3901C14.1099 9.3701 10.6899 11.4801 6.87988 12.4301" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M14.1899 5.8501H17.1199V8.7701" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="font-bold">آمار ثبت دستگاه ها</h3>
                    </div>
                    <canvas id="profitChart" height="120" class="mt-4"></canvas>
                </div>
                <div class="card-anim bg-white shadow-lg rounded-xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl p-5 "style="border-color: rgba(9, 72, 238, 0.15);">
                    <div class="flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.1201 5.84992V7.91992" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 5.85023V9.99023" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M6.87988 5.84982L6.87988 12.0698" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M6.88012 18.1499L7.34012 17.6099C9.89012 14.6299 13.3101 12.5199 17.1201 11.5699" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M9.81006 18.1499H6.88006V15.2299" stroke="#E30000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2Z" stroke="#E30000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="font-bold">آمار دستگاه هاس بلاک شده</h3>
                    </div>
                    <canvas id="lossChart" height="120" class="mt-4"></canvas>
                </div>
            </div>
         </section>
    </main>
    <script>
        const ctx = document.getElementById('myGraph').getContext('2d');
        const graphData = {
            labels: ['1', '2', '3', '4', '5', '6', '7'],
            datasets: [{
                label: 'Changes in Users',
                data: [10, 12, 11, 13, 15, 14, 18],
                fill: false,
                borderColor: 'rgba(255, 99, 132, 1)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: graphData,
        };
        const myGraph = new Chart(ctx, config);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const months = ['حمل','ثور','جوزا','سرطان','اسد','سنبله','میزان','عقرب','قوس','جدی','دلو','حوت'];
            const sampleProfit = [600, 800, 1200, 1400, 1600, 1700, 1850, 2100, 2400, 2800, 3300, 3900];
            const sampleLoss = [500, 900, 700, 1100, 500, 300, 800, 600, 900, 700, 650, 600];

            function money(num){
                return new Intl.NumberFormat('fa-AF', { style: 'currency', currency: 'AFN' }).format(num);
            }

            // ====== گراف مفاد (سود) ======
            const profitCtx = document.getElementById('profitChart').getContext('2d');
            const profitGradient = profitCtx.createLinearGradient(0,0,0,260);
            profitGradient.addColorStop(0, 'rgba(16,185,129,.25)');
            profitGradient.addColorStop(1, 'rgba(16,185,129,0)');

            new Chart(profitCtx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'مفاد',
                        data: sampleProfit,
                        tension: 0.35,
                        fill: true,
                        backgroundColor: profitGradient,
                        borderColor: 'rgb(16,185,129)',
                        borderWidth: 2,
                        pointRadius: 0
                    }]
                },
                options: {
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            enabled: true,
                            backgroundColor: '#000',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            displayColors: false,
                            callbacks: {
                                title: function(context) {
                                    return context[0].label; // نام ماه
                                },
                                label: function(context) {
                                    return `مفاد: ${money(context.raw)}`;
                                }
                            }
                        }
                    },
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'index',
                        intersect: false
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: '#000' },
                        },
                        y: {
                            grid: { color: 'rgba(0,0,0,.05)' }
                        }
                    }
                }
            });

            // ====== گراف ضرر ======
            const lossCtx = document.getElementById('lossChart').getContext('2d');
            const lossGradient = lossCtx.createLinearGradient(0,0,0,260);
            lossGradient.addColorStop(0, 'rgba(244,63,94,.25)');
            lossGradient.addColorStop(1, 'rgba(244,63,94,0)');

            new Chart(lossCtx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'ضرر',
                        data: sampleLoss,
                        tension: 0.35,
                        fill: true,
                        backgroundColor: lossGradient,
                        borderColor: 'rgb(244,63,94)',
                        borderWidth: 2,
                        pointRadius: 0
                    }]
                },
                options: {
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            enabled: true,
                            backgroundColor: '#000',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            displayColors: false,
                            callbacks: {
                                title: function(context) {
                                    return context[0].label; // نام ماه
                                },
                                label: function(context) {
                                    return `ضرر: ${money(context.raw)}`;
                                }
                            }
                        }
                    },
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'index',
                        intersect: false
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: '#000' },
                        },
                        y: {
                            grid: { color: 'rgba(0,0,0,.05)' }
                        }
                    }
                }
            });
        });
    </script>
    <script>
        tailwind.config = {
            theme: {
            extend: {
                colors: {
                primary: '#6C5CE7',
                accent: '#FF00C3',
                skydeep: '#00C2FF',
                soft: '#F6F7FB',
                ink: '#0F172A'
                },
                boxShadow: {
                card: '0 8px 30px rgba(31,45,61,.08)'
                },
                borderRadius: {
                '2xl': '1.25rem'
                }
            }
            }
        }
    </script>
    <style>
        .cut-circle {
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgb(253, 253, 253);
            right: 14px; /* در جلوِ نوار آبی قرار می‌گیرد و نیم‌دایره‌ی سفید را می‌سازد */
            z-index:1;
        }
        .cut-top { top:0px; right:0px; border-radius: 0px 18px 50px 50px;  }
        .cut-bottom { bottom:0px; right:0px; border-radius: 50px 50px 18px 0px; }
        .percent-wrap {
            width: 66px;
            height: 66px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:9999px;
            position: absolute;
            right: 4px;
            top: 2px;
            z-index: 2;
        }
        .icon {
            display: inline-block;
            transition: transform 0.5s; /* اضافه کردن انیمیشن */
        }
        .rotated {
            transform: rotate(180deg); /* چرخش ۱۸۰ درجه */
        }
        .content {
            display: none; /* به طور پیش‌فرض محتوا مخفی است */
            margin-top: 6px;
            padding-left: 2px;
        }
        /* اصلاح گراف‌ها */
        .graph-container {
            background: #ffffff;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            height: 350px;
        }
        .ring-shadow{filter: drop-shadow(0 8px 24px rgba(0,0,0,.08))}
        ::-webkit-scrollbar { height: 8px; width: 8px; }
        ::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 999px; }
        ::-webkit-scrollbar-track { background: transparent; }
        .ring-shadow { filter: drop-shadow(0 8px 24px rgba(0,0,0,.08)); }
        .card-anim {
            transition: all 0.4s ease;
        }
        .card-anim:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }
        ::-webkit-scrollbar { height: 8px; width: 8px; }
        ::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 999px; }
        ::-webkit-scrollbar-track { background: transparent; }
        @keyframes fadeUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .fade-up {
            animation: fadeUp 0.8s ease forwards;
        }
        @keyframes drawRing {
            from { stroke-dashoffset: 690; }
            to { stroke-dashoffset: 0; }
        }
        #ring-new, #ring-second, #ring-returns {
            animation: drawRing 1.8s ease-out forwards;
        }
        body { background: #f6f7fb; }
        .card { box-shadow: 0 8px 30px rgba(31,45,61,.08) }
        .legend-off { opacity: 0.5; }
        .draw {
        animation: draw 2s ease-in-out forwards;
        }
        @keyframes draw {
        0% { stroke-dasharray: 0, 1000; }
        100% { stroke-dasharray: 1000, 1000; }
        }
        .delay {
        animation: delay 2s ease-in-out forwards;
        }
        @keyframes delay {
        0% { stroke-dasharray: 0, 1000; }
        100% { stroke-dasharray: 1000, 1000; }
        }
        /* اصلاح گراف‌ها */
        .graph-container {
        background: #ffffff;
        padding: 1rem;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        height: 350px;
        }
    </style>
</div>
