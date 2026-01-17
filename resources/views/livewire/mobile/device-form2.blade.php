<div class="text-gray-800 ">
    <div class="min-h-full flex items-center  max-w-full mx-auto justify-center p-3 sm:p-4">
        <div class="animate-fade-slide shadow-xl w-full shadow-[0px_4px_4px_0px_#00000040]  bg-[#616161]/5 rounded-2xl  overflow-hidden flex flex-col lg:flex-row opacity-0 transform translate-y-10">
            <div class="flex-1 lg:w-5/12 flex items-start justify-center sm:p-4 order-1 lg:order-1 animate-fade-in delay-200">
                <div class="w-full max-w-md">
                    <h2 class="text-[40px] sm:text-2xl font-bold text-center lg:text-right flex items-center justify-center mt-[30px]">
                        اطلاعات دستگاه
                    </h2>
                    <p class="text-[10px] text-gray-500 text-center lg:text-right mb-6 mt-2 flex items-center justify-center">
                        لطفا اطلاعات را وارد کنید.
                    </p>
                    <div class="flex items-center justify-center mb-[30px] gap-10 sm:gap-20 animate-fade-in delay-300">
                        <div class="flex items-center justify-between relative w-full">
                            <div class="absolute top-6 left-[calc(16.5%+1.5rem)] right-[calc(50%+3rem)] z-0">
                                <div class="w-16 sm-[150px] border-t-2 border-dashed border-gray-400"></div>
                            </div>
                            <div class="absolute top-6 left-[calc(50%+3rem)] right-[calc(16.5%+1.5rem)] z-0">
                                <div class="w-16 sm-[150px] border-t-2 border-dashed border-gray-400"></div>
                            </div>
                            <div class="flex flex-col items-center relative z-10">
                                <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#1100FF] text-white font-bold bg-[#1100FF]/20 shadow-md text-[20px]">
                                1
                                </div>
                                <p class="text-sm  text-gray-700"> مشخصات دستگاه</p>
                            </div>
                            <div class="flex flex-col items-center relative z-10 ">
                                <div class="w-10 h-10 flex items-center justify-center rounded-xl text-white font-bold bg-[#1100FF] shadow-md text-[20px]">
                                2
                                </div>
                                <p class="text-sm  text-gray-700"> توضیحات دستگاه</p>
                            </div>
                            <div class="flex flex-col items-center relative z-10 ">
                                <div class="w-10 h-10 flex items-center justify-center rounded-xl text-[#1100FF] font-bold bg-[#1100FF]/20 text-[20px] shadow-md">
                                3
                                </div>
                                <p class="text-sm  text-gray-700"> پیام ثبت</p>
                            </div>
                        </div>
                    </div>
                    <form  wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-12 gap-3">
                            <div class="relative w-full">
                                <input type="file"
                                    wire:model="image"
                                    class="input-field">
                                @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative w-full">
                                <input type="number" wire:model.defer="buy_price"  placeholder="قیمت خرید"  class="input-field">
                                    @error('buy_price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.5 13.7502C9.5 14.7202 10.25 15.5002 11.17 15.5002H13.05C13.85 15.5002 14.5 14.8202 14.5 13.9702C14.5 13.0602 14.1 12.7302 13.51 12.5202L10.5 11.4702C9.91 11.2602 9.51001 10.9402 9.51001 10.0202C9.51001 9.18023 10.16 8.49023 10.96 8.49023H12.84C13.76 8.49023 14.51 9.27023 14.51 10.2402" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 7.5V16.5" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22 6V2H18" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17 7L22 2" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="number"
                                        wire:model.defer="sell_price"
                                        placeholder="قیمت فروش"
                                        class="input-field">
                                    @error('sell_price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.5 13.7502C9.5 14.7202 10.25 15.5002 11.17 15.5002H13.05C13.85 15.5002 14.5 14.8202 14.5 13.9702C14.5 13.0602 14.1 12.7302 13.51 12.5202L10.5 11.4702C9.91 11.2602 9.51001 10.9402 9.51001 10.0202C9.51001 9.18023 10.16 8.49023 10.96 8.49023H12.84C13.76 8.49023 14.51 9.27023 14.51 10.2402" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 7.5V16.5" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17 3V7H21" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22 2L17 7" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text" wire:model.defer="stock" placeholder="موجودی"  class="input-field">
                                @error('stock') <span class="error text-red-500 text-xs">{{ $message }}</span> @enderror
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6 9H12" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.75 13H11.25" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="relative w-full">
                                <input type="text"  wire:model.defer="imei"  placeholder="شماره IMEI" class="input-field">
                                <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.2748 5.6333L15.4665 16.9083C15.2665 17.75 14.5165 18.3333 13.6498 18.3333H2.69978C1.44145 18.3333 0.541462 17.0999 0.916462 15.8916L4.42479 4.625C4.66646 3.84167 5.39147 3.29993 6.20813 3.29993H16.4581C17.2498 3.29993 17.9081 3.78326 18.1831 4.44993C18.3415 4.80826 18.3748 5.21663 18.2748 5.6333Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10"/>
                                <path d="M13.3335 18.3333H17.3168C18.3918 18.3333 19.2335 17.425 19.1585 16.35L18.3335 5" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.06689 5.31663L8.93357 1.71667" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.6499 5.32501L14.4332 1.70837" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.4165 10H13.0832" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5.5835 13.3334H12.2502" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                @error('imei') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative w-full">
                                <input type="text"  wire:model.defer="warranty"  placeholder="گارانتی" class="input-field">
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
                        <div class="flex flex-col sm:flex-row sm:mt-6 justify-between mt-6 gap-4 animate-fade-in delay-500">
                            <a href="{{ url('/device-Form') }}"
                                class="w-full sm:w-[48%] py-3 rounded-xl bg-[#FF0000] text-white text-base font-semibold text-center hover:bg-red-700">
                                    برگشت
                            </a>
                            <a href="{{ url('/device-Information') }}"
                                class="w-full sm:w-[48%] py-3 rounded-xl bg-[#1100FF] text-white text-base font-semibold flex items-center justify-center hover:bg-blue-700">
                                <button type="submit">
                                        ثبت نهایی
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex-1 lg:w-5/12 flex items-center justify-center p-5 sm:p-5 order-2 lg:order-1   mt-6 lg:mt-0 animate-fade-in delay-400">
                <div class="w-full max-w-full">
                <img src="https://i.postimg.cc/CMnYr98x/download-(2).png" alt="Success Illustration"
                    class="w-full h-auto ">
                </div>
            </div>
        </div>
    </div>
</div>
