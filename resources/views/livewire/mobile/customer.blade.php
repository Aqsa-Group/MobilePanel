<div>
    <div class=" text-gray-800 flex max-w-7xl mx-auto items-center justify-center p-3 sm:p-4">
        <!-- باکس اصلی سفید با انیمیشن -->
        <div class="animate-fade-slide shadow-[0px_4px_4px_0px_#00000040] bg-[#fafafa]  max-w-7xl  bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col lg:flex-row opacity-0 transform translate-y-10">
            <!-- ستون فرم -->
            <div class="flex-1 lg:w-5/12 flex items-start justify-center sm:p-4 order-1 lg:order-1 animate-fade-in delay-200">
                <div class="w-full max-w-md">
                    <h2 class="text-[40px] sm:text-2xl font-bold text-center lg:text-right flex items-center justify-center mt-[30px]">
                        اطلاعات مشتری
                    </h2>
                    <p class="text-[10px] text-gray-500 text-center lg:text-right mb-6 flex items-center justify-center">
                        لطفا اطلاعات را وارد کنید.
                    </p>
                    <!-- فرم -->
                    <form action="" class="space-y-8">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-10 gap-3">
                            <!-- نمونه ورودی -->
                            <div class="relative w-full">
                                <input type="text" placeholder="عکس"
                                    class="input-field ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.49984 18.3333H12.4998C16.6665 18.3333 18.3332 16.6666 18.3332 12.5V7.49996C18.3332 3.33329 16.6665 1.66663 12.4998 1.66663H7.49984C3.33317 1.66663 1.6665 3.33329 1.6665 7.49996V12.5C1.6665 16.6666 3.33317 18.3333 7.49984 18.3333Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.50016 8.33333C8.42064 8.33333 9.16683 7.58714 9.16683 6.66667C9.16683 5.74619 8.42064 5 7.50016 5C6.57969 5 5.8335 5.74619 5.8335 6.66667C5.8335 7.58714 6.57969 8.33333 7.50016 8.33333Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.2251 15.7917L6.33343 13.0333C6.99176 12.5917 7.94176 12.6417 8.53343 13.15L8.80843 13.3917C9.45843 13.95 10.5084 13.95 11.1584 13.3917L14.6251 10.4167C15.2751 9.85834 16.3251 9.85834 16.9751 10.4167L18.3334 11.5833" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="نام کامل"
                                    class="input-field ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="شماره"
                                    class="input-field ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.3082 15.2751C18.3082 15.5751 18.2415 15.8834 18.0998 16.1834C17.9582 16.4834 17.7748 16.7667 17.5332 17.0334C17.1248 17.4834 16.6748 17.8084 16.1665 18.0167C15.6665 18.2251 15.1248 18.3334 14.5415 18.3334C13.6915 18.3334 12.7832 18.1334 11.8248 17.7251C10.8665 17.3167 9.90817 16.7667 8.95817 16.0751C7.99984 15.3751 7.0915 14.6001 6.22484 13.7417C5.3665 12.8751 4.5915 11.9667 3.89984 11.0167C3.2165 10.0667 2.6665 9.11675 2.2665 8.17508C1.8665 7.22508 1.6665 6.31675 1.6665 5.45008C1.6665 4.88341 1.7665 4.34175 1.9665 3.84175C2.1665 3.33341 2.48317 2.86675 2.92484 2.45008C3.45817 1.92508 4.0415 1.66675 4.65817 1.66675C4.8915 1.66675 5.12484 1.71675 5.33317 1.81675C5.54984 1.91675 5.7415 2.06675 5.8915 2.28341L7.82484 5.00841C7.97484 5.21675 8.08317 5.40841 8.15817 5.59175C8.23317 5.76675 8.27484 5.94175 8.27484 6.10008C8.27484 6.30008 8.2165 6.50008 8.09984 6.69175C7.9915 6.88341 7.83317 7.08341 7.63317 7.28341L6.99984 7.94175C6.90817 8.03341 6.8665 8.14175 6.8665 8.27508C6.8665 8.34175 6.87484 8.40008 6.8915 8.46675C6.9165 8.53341 6.9415 8.58341 6.95817 8.63341C7.10817 8.90841 7.3665 9.26675 7.73317 9.70008C8.10817 10.1334 8.50817 10.5751 8.9415 11.0167C9.3915 11.4584 9.82484 11.8667 10.2665 12.2417C10.6998 12.6084 11.0582 12.8584 11.3415 13.0084C11.3832 13.0251 11.4332 13.0501 11.4915 13.0751C11.5582 13.1001 11.6248 13.1084 11.6998 13.1084C11.8415 13.1084 11.9498 13.0584 12.0415 12.9667L12.6748 12.3417C12.8832 12.1334 13.0832 11.9751 13.2748 11.8751C13.4665 11.7584 13.6582 11.7001 13.8665 11.7001C14.0248 11.7001 14.1915 11.7334 14.3748 11.8084C14.5582 11.8834 14.7498 11.9917 14.9582 12.1334L17.7165 14.0917C17.9332 14.2417 18.0832 14.4167 18.1748 14.6251C18.2582 14.8334 18.3082 15.0417 18.3082 15.2751Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="آدرس"
                                    class="input-field ">
                                <svg  class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.6665 18.3333H18.3332" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.4585 18.3334L2.50017 8.30836C2.50017 7.80003 2.74183 7.31674 3.14183 7.00008L8.97516 2.4584C9.57516 1.99173 10.4168 1.99173 11.0252 2.4584L16.8585 6.99173C17.2668 7.3084 17.5002 7.7917 17.5002 8.30836V18.3334" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linejoin="round"/>
                                <path d="M12.9168 9.16675H7.0835C6.39183 9.16675 5.8335 9.72508 5.8335 10.4167V18.3334H14.1668V10.4167C14.1668 9.72508 13.6085 9.16675 12.9168 9.16675Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.3335 13.5417V14.7917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.75 6.25H11.25" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="آیدی تذکره"
                                    class="input-field ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.1665 17.5H5.83317C2.49984 17.5 1.6665 16.6667 1.6665 13.3333V6.66667C1.6665 3.33333 2.49984 2.5 5.83317 2.5H14.1665C17.4998 2.5 18.3332 3.33333 18.3332 6.66667V13.3333C18.3332 16.6667 17.4998 17.5 14.1665 17.5Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.6665 6.66675H15.8332" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 10H15.8333" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.1665 13.3333H15.8332" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.08353 9.40827C7.91656 9.40827 8.59186 8.73296 8.59186 7.89993C8.59186 7.0669 7.91656 6.3916 7.08353 6.3916C6.2505 6.3916 5.5752 7.0669 5.5752 7.89993C5.5752 8.73296 6.2505 9.40827 7.08353 9.40827Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.99984 13.6082C9.88317 12.3999 8.92484 11.4499 7.7165 11.3416C7.29984 11.2999 6.87484 11.2999 6.44984 11.3416C5.2415 11.4582 4.28317 12.3999 4.1665 13.6082" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text" placeholder="توضیحات"
                                    class="input-field ">
                                <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.6665 1.66675V4.16675" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.3335 1.66675V4.16675" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.5 7.08341V14.1667C17.5 16.6667 16.25 18.3334 13.3333 18.3334H6.66667C3.75 18.3334 2.5 16.6667 2.5 14.1667V7.08341C2.5 4.58341 3.75 2.91675 6.66667 2.91675H13.3333C16.25 2.91675 17.5 4.58341 17.5 7.08341Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.6665 9.16675H13.3332" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.6665 13.3333H9.99984" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <!-- دکمه‌ها -->
                        <div class="flex flex-col mb-6 sm:flex-row sm:mt-6 justify-between mt-6 gap-4 animate-fade-in delay-500">
                            <a  href="{{ route('customers') }}"
                            class="w-full sm:w-[48%] py-3 rounded-xl bg-[#FF0000] text-white text-base font-semibold text-center hover:scale-105 transition-all duration-300">
                                برگشت
                            </a>
                            <a href="{{ url('/customer-Information') }}"
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
                    <img src="https://i.postimg.cc/26KWkgjQ/download-(4).png" alt="Success Illustration"
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
