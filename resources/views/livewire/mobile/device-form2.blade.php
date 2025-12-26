<div class="text-gray-800 ">
    <div class="min-h-full flex items-center justify-center p-3 sm:p-4">
        <!-- باکس اصلی سفید با انیمیشن -->
        <div class="animate-fade-slide shadow-xl shadow-[0px_4px_4px_0px_#00000040] max-w-7xl  bg-[#fafafa] rounded-2xl  overflow-hidden flex flex-col lg:flex-row opacity-0 transform translate-y-10">
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
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#0D00C8] font-bold bg-[#1100FF]/20 shadow-md text-[20px]">
                            1
                            </div>
                            <p class="text-sm  text-gray-700"> مشخصات دستگاه</p>
                        </div>
                        <div class="flex flex-col items-center relative z-10 bg-[#fafafa] ">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl text-white font-bold bg-[#1100FF] shadow-md text-[20px]">
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
                            <input type="text" placeholder="خرید"
                                class="input-field  ">
                            <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.5 13.7502C9.5 14.7202 10.25 15.5002 11.17 15.5002H13.05C13.85 15.5002 14.5 14.8202 14.5 13.9702C14.5 13.0602 14.1 12.7302 13.51 12.5202L10.5 11.4702C9.91 11.2602 9.51001 10.9402 9.51001 10.0202C9.51001 9.18023 10.16 8.49023 10.96 8.49023H12.84C13.76 8.49023 14.51 9.27023 14.51 10.2402" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 7.5V16.5" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 6V2H18" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17 7L22 2" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="relative w-full">
                            <input type="text" placeholder="فروش"
                                class="input-field  ">
                            <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.5 13.7502C9.5 14.7202 10.25 15.5002 11.17 15.5002H13.05C13.85 15.5002 14.5 14.8202 14.5 13.9702C14.5 13.0602 14.1 12.7302 13.51 12.5202L10.5 11.4702C9.91 11.2602 9.51001 10.9402 9.51001 10.0202C9.51001 9.18023 10.16 8.49023 10.96 8.49023H12.84C13.76 8.49023 14.51 9.27023 14.51 10.2402" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 7.5V16.5" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17 3V7H21" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 2L17 7" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="relative w-full">
                            <input type="text" placeholder="فایده"
                                class="input-field  ">
                            <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.9889 14.6604L2.46891 13.1404C1.84891 12.5204 1.84891 11.5004 2.46891 10.8804L3.9889 9.36039C4.2489 9.10039 4.4589 8.59038 4.4589 8.23038V6.08036C4.4589 5.20036 5.1789 4.48038 6.0589 4.48038H8.2089C8.5689 4.48038 9.0789 4.27041 9.3389 4.01041L10.8589 2.49039C11.4789 1.87039 12.4989 1.87039 13.1189 2.49039L14.6389 4.01041C14.8989 4.27041 15.4089 4.48038 15.7689 4.48038H17.9189C18.7989 4.48038 19.5189 5.20036 19.5189 6.08036V8.23038C19.5189 8.59038 19.7289 9.10039 19.9889 9.36039L21.5089 10.8804C22.1289 11.5004 22.1289 12.5204 21.5089 13.1404L19.9889 14.6604C19.7289 14.9204 19.5189 15.4304 19.5189 15.7904V17.9403C19.5189 18.8203 18.7989 19.5404 17.9189 19.5404H15.7689C15.4089 19.5404 14.8989 19.7504 14.6389 20.0104L13.1189 21.5304C12.4989 22.1504 11.4789 22.1504 10.8589 21.5304L9.3389 20.0104C9.0789 19.7504 8.5689 19.5404 8.2089 19.5404H6.0589C5.1789 19.5404 4.4589 18.8203 4.4589 17.9403V15.7904C4.4589 15.4204 4.2489 14.9104 3.9889 14.6604Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 15L15 9" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.4945 14.5H14.5035" stroke="#292D32" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.49451 9.5H9.50349" stroke="#292D32" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="relative w-full">
                            <input type="text" placeholder="مقدار فایده"
                                class="input-field ">
                            <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.9889 14.6604L2.46891 13.1404C1.84891 12.5204 1.84891 11.5004 2.46891 10.8804L3.9889 9.36039C4.2489 9.10039 4.4589 8.59038 4.4589 8.23038V6.08036C4.4589 5.20036 5.1789 4.48038 6.0589 4.48038H8.2089C8.5689 4.48038 9.0789 4.27041 9.3389 4.01041L10.8589 2.49039C11.4789 1.87039 12.4989 1.87039 13.1189 2.49039L14.6389 4.01041C14.8989 4.27041 15.4089 4.48038 15.7689 4.48038H17.9189C18.7989 4.48038 19.5189 5.20036 19.5189 6.08036V8.23038C19.5189 8.59038 19.7289 9.10039 19.9889 9.36039L21.5089 10.8804C22.1289 11.5004 22.1289 12.5204 21.5089 13.1404L19.9889 14.6604C19.7289 14.9204 19.5189 15.4304 19.5189 15.7904V17.9403C19.5189 18.8203 18.7989 19.5404 17.9189 19.5404H15.7689C15.4089 19.5404 14.8989 19.7504 14.6389 20.0104L13.1189 21.5304C12.4989 22.1504 11.4789 22.1504 10.8589 21.5304L9.3389 20.0104C9.0789 19.7504 8.5689 19.5404 8.2089 19.5404H6.0589C5.1789 19.5404 4.4589 18.8203 4.4589 17.9403V15.7904C4.4589 15.4204 4.2489 14.9104 3.9889 14.6604Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 15L15 9" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.4945 14.5H14.5035" stroke="#292D32" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.49451 9.5H9.50349" stroke="#292D32" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="relative w-full">
                            <input type="text" placeholder="موجودی"
                                class="input-field  ">
                            <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 9H12" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.75 13H11.25" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <!-- دکمه‌ها -->
                    <div class="flex flex-col sm:flex-row sm:mt-6 justify-between mt-6 gap-4 animate-fade-in delay-500">
                        <a href="{{ url('/device.form') }}"
                        class="w-full sm:w-[48%] py-3 rounded-xl bg-[#FF0000] text-white text-base font-semibold text-center hover:scale-105 transition-all duration-300">
                            برگشت
                        </a>
                        <a href="{{ url('/device-Information') }}"
                            class="w-full sm:w-[48%] py-3 rounded-xl bg-[#1100FF] text-white text-base font-semibold flex items-center justify-center hover:scale-105 transition-all duration-300">
                            ثبت
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
