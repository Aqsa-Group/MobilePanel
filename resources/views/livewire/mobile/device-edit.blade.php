<div>
    <div class="text-gray-800 flex items-center max-w-7xl  mx-auto justify-center md:p-3 sm:p-4">
        <div class="animate-fade-slide  mx-auto max-w-7xl overflow-x-hidden p-2 shadow-[0px_4px_4px_0px_#00000040]  bg-[#fafafa] rounded-2xl shadow-xl overflow-hidden flex flex-col lg:flex-row opacity-0 transform translate-y-10">
            <div class="flex-1 lg:w-5/12 w-full flex items-start justify-center sm:p-4 order-1 lg:order-1 animate-fade-in delay-200">
                <div class="w-full max-w-md">
                    <h2 class="text-2xl  md:text-[40px]  font-bold text-center lg:text-right flex items-center justify-center mt-[30px]">
                         ویرایش اطلاعات دستگاه
                    </h2>
                    <form wire:submit.prevent="update"  class="mt-8">
                        <div class="relative grid  grid-cols-2 gap-y-6 gap-3">
                            <div class="flex flex-col w-full">
                                <span class="text-gray-700 p-2">
                                حالت:
                                </span>
                                <div class="relative w-full">
                                    <select wire:model="status" class="input-field">
                                            <option value="">حالت</option>
                                            <option value="new">نو</option>
                                            <option value="used">کارکرده</option>
                                            <option value="damaged">معیوب</option>
                                    </select>
                                </div>
                                <div class="flex flex-col w-full">
                                    <span class="text-gray-700 p-2">
                                        مدل:
                                    </span>
                                <div class="relative w-full">
                                    <input type="text" placeholder="مدل" wire:model="model" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.75 5.75V15.75C16.75 19.75 15.75 20.75 11.75 20.75H5.75C1.75 20.75 0.75 19.75 0.75 15.75V5.75C0.75 1.75 1.75 0.75 5.75 0.75H11.75C15.75 0.75 16.75 1.75 16.75 5.75Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.75 4.25H6.75" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.7502 17.85C9.60624 17.85 10.3002 17.156 10.3002 16.3C10.3002 15.444 9.60624 14.75 8.7502 14.75C7.89415 14.75 7.2002 15.444 7.2002 16.3C7.2002 17.156 7.89415 17.85 8.7502 17.85Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-col w-full">
                                <span class="text-gray-700 p-2">
                                     حافظه:
                                </span>
                                <div class="relative w-full">
                                   <input type="text" placeholder="حافظه" wire:model="memory" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.10979 11.85C5.28979 12.05 5.29979 16.15 8.10979 16.35H14.7798C15.5898 16.36 16.3698 16.05 16.9698 15.51C18.9498 13.78 17.8898 10.31 15.2898 9.98001C14.3598 4.34001 6.20982 6.48 8.13982 11.85" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 15C2 18.87 5.13 22 9 22L7.95001 20.25" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22 9C22 5.13 18.87 2 15 2L16.05 3.75" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="flex flex-col w-full">
                                    <span class="text-gray-700 p-2">
                                        رنگ:
                                    </span>
                                <div class="relative w-full">
                                    <input type="text" wire:model="color" placeholder="رنگ" class="input-field">
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
                                <div class="flex flex-col w-full">
                                    <span class="text-gray-700 p-2">
                                        عکس:
                                    </span>
                                    <div class="relative w-full">
                                    <input type="file"  wire:model="image" class="input-field">
                                </div>
                                <div class="flex flex-col w-full">
                                    <span class="text-gray-700 p-2">
                                    قیمت خرید:
                                    </span>
                                    <div class="relative w-full">
                                        <input type="number"  wire:model.defer="buy_price"  placeholder="قیمت خرید"  class="input-field">
                                        <svg class="w-4 h-4 absolute left-2 top-1/2 mt-2 -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.5 13.7502C9.5 14.7202 10.25 15.5002 11.17 15.5002H13.05C13.85 15.5002 14.5 14.8202 14.5 13.9702C14.5 13.0602 14.1 12.7302 13.51 12.5202L10.5 11.4702C9.91 11.2602 9.51001 10.9402 9.51001 10.0202C9.51001 9.18023 10.16 8.49023 10.96 8.49023H12.84C13.76 8.49023 14.51 9.27023 14.51 10.2402" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 7.5V16.5" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22 6V2H18" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M17 7L22 2" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col w-full">
                                        <span class="text-gray-700 p-2">
                                            قیمت فروش:
                                        </span>
                                        <div class="relative w-full">
                                            <input type="number" wire:model.defer="sell_price" placeholder="قیمت فروش" class="input-field">
                                            <svg class="w-4 h-4 absolute left-2 top-1/2 mt-2 -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.5 13.7502C9.5 14.7202 10.25 15.5002 11.17 15.5002H13.05C13.85 15.5002 14.5 14.8202 14.5 13.9702C14.5 13.0602 14.1 12.7302 13.51 12.5202L10.5 11.4702C9.91 11.2602 9.51001 10.9402 9.51001 10.0202C9.51001 9.18023 10.16 8.49023 10.96 8.49023H12.84C13.76 8.49023 14.51 9.27023 14.51 10.2402" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 7.5V16.5" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M17 3V7H21" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M22 2L17 7" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="flex flex-col w-full">
                                            <span class="text-gray-700 p-2">
                                                موجودی:
                                            </span>
                                            <div class="relative w-full">
                                                <input type="text" wire:model.defer="stock" placeholder="موجودی" class="input-field">
                                                <svg class="w-4 h-4 absolute left-2 top-1/2 mt-2 -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6 9H12" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6.75 13H11.25" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full">
                                        <span class="text-gray-700 p-2">
                                            محدودیت:
                                        </span>
                                        <div class="relative w-full">
                                            <input type="text" wire:model.defer="imei" placeholder="شماره IMEI" class="input-field">
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
                                        <div class="flex flex-col w-full">
                                            <span class="text-gray-700 p-2">
                                                محدودیت:
                                            </span>
                                            <div class="relative w-full">
                                <input type="text"  wire:model.defer="warranty"
 placeholder="گارانتی"
                                    class="input-field">
                                       <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 9.6C20 5.6 18.4 4 14.4 4H9.6C5.6 4 4 5.6 4 9.6V14.4C4 18.4 5.6 20 9.6 20" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.35 8C15.8 7.3 14.88 7 13.5 7H10.5C8 7 7 8 7 10.5V13.5C7 14.88 7.3 15.8 7.99 16.35" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.01001 4V2" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 4V2" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 4V2" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20 8H22" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.01001 20V22" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 8H4" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 12H4" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 16H4" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.71 18.59C17.5881 18.59 18.3 17.8782 18.3 17C18.3 16.1219 17.5881 15.41 16.71 15.41C15.8319 15.41 15.12 16.1219 15.12 17C15.12 17.8782 15.8319 18.59 16.71 18.59Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.41 17.46V16.53C11.41 15.98 11.86 15.53 12.41 15.53C13.37 15.53 13.76 14.85 13.28 14.02C13 13.54 13.17 12.92 13.65 12.65L14.56 12.12C14.98 11.87 15.52 12.02 15.77 12.44L15.83 12.54C16.31 13.37 17.09 13.37 17.57 12.54L17.63 12.44C17.88 12.02 18.42 11.88 18.84 12.12L19.75 12.65C20.23 12.93 20.4 13.54 20.12 14.02C19.64 14.85 20.03 15.53 20.99 15.53C21.54 15.53 21.99 15.98 21.99 16.53V17.46C21.99 18.01 21.54 18.46 20.99 18.46C20.03 18.46 19.64 19.14 20.12 19.97C20.4 20.45 20.23 21.07 19.75 21.34L18.84 21.87C18.42 22.12 17.88 21.97 17.63 21.55L17.57 21.45C17.09 20.62 16.31 20.62 15.83 21.45L15.77 21.55C15.52 21.97 14.98 22.11 14.56 21.87L13.65 21.34C13.17 21.06 13 20.45 13.28 19.97C13.76 19.14 13.37 18.46 12.41 18.46C11.86 18.47 11.41 18.02 11.41 17.46Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </div>
                                          </div>
                        </div>
                        <div class="flex flex-row justify-between gap-3  my-4">
                            <button type="submit" class=" w-full  bg-blue-500 text-white  justify-center  py-3 px-2  border  border-black rounded-xl cursor-pointer flex  ">
                                ذخیره تغییرات
                            </button>
                            <button type="reset" class=" w-full  bg-red-500 text-white  justify-center  py-3 px-2  border  border-black rounded-xl cursor-pointer flex  ">
                                حذف تغییرات
                            </button>
                        </div>
                    </form>
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
