<div>
    <div class="text-gray-800 flex items-center max-w-full  mx-auto justify-center p-3 sm:p-4">
        <div class="animate-fade-slide w-full mx-auto overflow-x-hidden  p-2 shadow-[0px_4px_4px_0px_#00000040]  bg-[#616161]/5 rounded-2xl shadow-xl overflow-hidden flex flex-col lg:flex-row  opacity-0 transform translate-y-10">
            <div class="flex-1 lg:w-1/2 flex items-center justify-center px-3 sm:px-4 order-1 animate-fade-in delay-200">
                <div class="w-full max-w-lg mx-auto">
                    <h2 class="text-[40px] sm:text-2xl font-bold text-center lg:text-right flex items-center justify-center mt-[30px]">
                        اطلاعات کاربر
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
                                <div class="w-16 sm-[150px]  border-t-2 border-dashed border-gray-400"></div>
                            </div>
                            <div class="flex flex-col items-center relative z-10">
                                <div class="{{ $step >= 1 ? 'bg-[#1100FF] text-white' : 'bg-[#1100FF]/20 text-[#0D00C8]' }} w-10 h-10 flex items-center justify-center rounded-xl  font-bold  shadow-md text-[20px]">
                                    1
                                </div>
                                <p class="text-sm mt-2 text-gray-700">  اطلاعات شخصی</p>
                            </div>
                            <div class="flex flex-col items-center relative z-10">
                                <div class="{{ $step >= 2 ? 'bg-[#1100FF] text-white' : 'bg-[#1100FF]/20 text-[#0D00C8]' }} w-10 h-10 flex items-center justify-center rounded-xl  font-bold shadow-md text-[20px]"
                                    >
                                    2
                                </div>
                                <p class="text-sm mt-2 text-gray-700">  اطلاعات کاربری</p>
                            </div>
                            <div class="flex flex-col items-center relative z-10 ">
                                <div class="{{ $step >= 3 ? 'bg-[#1100FF] text-white' : 'bg-[#1100FF]/20 text-[#0D00C8]' }} w-10 h-10 flex items-center justify-center rounded-xl  font-bold shadow-md text-[20px]">
                                    3
                                </div>
                                <p class="text-sm mt-2 text-gray-700"> پیام ثبت</p>
                            </div>
                        </div>
                    </div>
                    <form wire:submit.prevent="submit"  class="space-y-8">
                        @csrf
                        @if($step == 1)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-10 gap-3">
                            <div class="flex flex-col">
                                <div class="relative w-full">
                                    <label for="imageUpload" class="w-full py-3 px-4  text-gray-500 border input-field  bg-white cursor-pointer flex    ">
                                        {{ $image ? $image->getClientOriginalName() : ' عکس' }}
                                    </label>
                                    <input type="file" id="imageUpload" wire:model="image" wire:model.lazy="image" class="hidden">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.49984 18.3333H12.4998C16.6665 18.3333 18.3332 16.6666 18.3332 12.5V7.49996C18.3332 3.33329 16.6665 1.66663 12.4998 1.66663H7.49984C3.33317 1.66663 1.6665 3.33329 1.6665 7.49996V12.5C1.6665 16.6666 3.33317 18.3333 7.49984 18.3333Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.50016 8.33333C8.42064 8.33333 9.16683 7.58714 9.16683 6.66667C9.16683 5.74619 8.42064 5 7.50016 5C6.57969 5 5.8335 5.74619 5.8335 6.66667C5.8335 7.58714 6.57969 8.33333 7.50016 8.33333Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2.2251 15.7917L6.33343 13.0333C6.99176 12.5917 7.94176 12.6417 8.53343 13.15L8.80843 13.3917C9.45843 13.95 10.5084 13.95 11.1584 13.3917L14.6251 10.4167C15.2751 9.85834 16.3251 9.85834 16.9751 10.4167L18.3334 11.5833" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                @error('image')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="نام کامل"  wire:model.lazy="name"  wire:model="name"
                                        class="input-field ">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                @error('name')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="آدرس" wire:model="address" wire:model.lazy="address"
                                        class="input-field ">
                                    <svg  class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.6665 18.3333H18.3332" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.4585 18.3334L2.50017 8.30836C2.50017 7.80003 2.74183 7.31674 3.14183 7.00008L8.97516 2.4584C9.57516 1.99173 10.4168 1.99173 11.0252 2.4584L16.8585 6.99173C17.2668 7.3084 17.5002 7.7917 17.5002 8.30836V18.3334" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M12.9168 9.16675H7.0835C6.39183 9.16675 5.8335 9.72508 5.8335 10.4167V18.3334H14.1668V10.4167C14.1668 9.72508 13.6085 9.16675 12.9168 9.16675Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.3335 13.5417V14.7917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.75 6.25H11.25" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                @error('address')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <div class="relative w-full">
                                    <input type="tel" placeholder="شماره" wire:model="number"  wire:model.lazy="number"
                                        class="input-field ">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.3082 15.2751C18.3082 15.5751 18.2415 15.8834 18.0998 16.1834C17.9582 16.4834 17.7748 16.7667 17.5332 17.0334C17.1248 17.4834 16.6748 17.8084 16.1665 18.0167C15.6665 18.2251 15.1248 18.3334 14.5415 18.3334C13.6915 18.3334 12.7832 18.1334 11.8248 17.7251C10.8665 17.3167 9.90817 16.7667 8.95817 16.0751C7.99984 15.3751 7.0915 14.6001 6.22484 13.7417C5.3665 12.8751 4.5915 11.9667 3.89984 11.0167C3.2165 10.0667 2.6665 9.11675 2.2665 8.17508C1.8665 7.22508 1.6665 6.31675 1.6665 5.45008C1.6665 4.88341 1.7665 4.34175 1.9665 3.84175C2.1665 3.33341 2.48317 2.86675 2.92484 2.45008C3.45817 1.92508 4.0415 1.66675 4.65817 1.66675C4.8915 1.66675 5.12484 1.71675 5.33317 1.81675C5.54984 1.91675 5.7415 2.06675 5.8915 2.28341L7.82484 5.00841C7.97484 5.21675 8.08317 5.40841 8.15817 5.59175C8.23317 5.76675 8.27484 5.94175 8.27484 6.10008C8.27484 6.30008 8.2165 6.50008 8.09984 6.69175C7.9915 6.88341 7.83317 7.08341 7.63317 7.28341L6.99984 7.94175C6.90817 8.03341 6.8665 8.14175 6.8665 8.27508C6.8665 8.34175 6.87484 8.40008 6.8915 8.46675C6.9165 8.53341 6.9415 8.58341 6.95817 8.63341C7.10817 8.90841 7.3665 9.26675 7.73317 9.70008C8.10817 10.1334 8.50817 10.5751 8.9415 11.0167C9.3915 11.4584 9.82484 11.8667 10.2665 12.2417C10.6998 12.6084 11.0582 12.8584 11.3415 13.0084C11.3832 13.0251 11.4332 13.0501 11.4915 13.0751C11.5582 13.1001 11.6248 13.1084 11.6998 13.1084C11.8415 13.1084 11.9498 13.0584 12.0415 12.9667L12.6748 12.3417C12.8832 12.1334 13.0832 11.9751 13.2748 11.8751C13.4665 11.7584 13.6582 11.7001 13.8665 11.7001C14.0248 11.7001 14.1915 11.7334 14.3748 11.8084C14.5582 11.8834 14.7498 11.9917 14.9582 12.1334L17.7165 14.0917C17.9332 14.2417 18.0832 14.4167 18.1748 14.6251C18.2582 14.8334 18.3082 15.0417 18.3082 15.2751Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10"/>
                                    </svg>
                                </div>
                                @error('number')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="email" placeholder=" ایمیل" wire:model="email"  wire:model.lazy="email"
                                        class="input-field ">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.0002 8.49999H10.1668V11.5833H14.7502C14.6668 12.3333 14.1668 13.5 13.0835 14.25C12.4168 14.75 11.4168 15.0833 10.1668 15.0833C8.00016 15.0833 6.0835 13.6667 5.41683 11.5833C5.25016 11.0833 5.16683 10.5 5.16683 9.91666C5.16683 9.33332 5.25016 8.74999 5.41683 8.24999C5.50016 8.08332 5.50016 7.91666 5.5835 7.83332C6.3335 6.08332 8.0835 4.83332 10.1668 4.83332C11.7502 4.83332 12.7502 5.49999 13.4168 6.08332L15.7502 3.74999C14.3335 2.49999 12.4168 1.66666 10.1668 1.66666C6.91683 1.66666 4.0835 3.49999 2.75016 6.24999C2.16683 7.41666 1.8335 8.66666 1.8335 9.99999C1.8335 11.3333 2.16683 12.5833 2.75016 13.75C4.0835 16.5 6.91683 18.3333 10.1668 18.3333C12.4168 18.3333 14.3335 17.5833 15.6668 16.3333C17.2502 14.9167 18.1668 12.75 18.1668 10.1667C18.1668 9.49999 18.0835 8.99999 18.0002 8.49999Z" stroke="#17191C" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                @error('email')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        @if($step == 2)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-10 gap-3">
                            <div class="flex flex-col ">
                                <div class="relative w-full">
                                    <input type="text" placeholder="نام کاربری" wire:model="username"  wire:model.lazy="username"
                                        class="input-field ">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                @error('username')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                    <select  wire:model="rule"   wire:model.lazy="rule"   class="  text-gray-500 input-field cursor-pointer flex  ">
                                        <option value="">انتخاب نقش</option>
                                        <option value="admin">سوپر ادمین</option>
                                        <option value="admin">ادمین</option>
                                        <option value="user">کاربر</option>
                                    </select>
                                @error('rule')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <div class="relative w-full">
                                    <input type="password" placeholder="پسورد"  wire:model="password"   wire:model.lazy="password"
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
                                @error('password')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <select  wire:model="limit"   wire:model.lazy="limit"   class="  text-gray-500 input-field cursor-pointer flex   ">
                                        <option value="">انتخاب محدودیت</option>
                                        <option value="بدون محدودیت">بدون محدودیت</option>
                                        <option value="محدود">محدود</option>
                                    </select>
                                @error('limit')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        @if($step == 3)
                        <div class="flex justify-center mb-4">
                            <img src="https://i.postimg.cc/FzxKqMpg/mkk-removebg-preview-(1).png" alt="Success"
                                class="w-[500px] sm:w-80 md:w-90">
                        </div>
                        @endif
                        <div class="flex justify-between mt-6">
                        @if($step > 0)
                            <button type="button" wire:click="previousStep" class="w-full sm:w-[48%] py-3 rounded-xl bg-[#FF0000] text-white text-base font-semibold text-center hover:bg-red-700">قبلی</button>
                        @endif
                        @if($step < 3)
                            <button type="button" wire:click="nextStep" class="w-full sm:w-[48%] py-3 rounded-xl bg-[#1100FF] text-white text-base font-semibold flex items-center justify-center hover:bg-blue-700">مرحله بعدی</button>
                        @else
                            <button type="submit" class="w-full sm:w-[48%] py-3 rounded-xl bg-[#1100FF] text-white text-base font-semibold flex items-center justify-center hover:bg-blue-700">ثبت نهایی</button>
                        @endif
                    </div>
                    </form>
                </div>
            </div>
            <div class="flex-1 lg:w-5/12 flex items-center justify-center p-5 sm:p-5 order-2 lg:order-1   mt-6 lg:mt-0 animate-fade-in delay-400">
                <div class="w-full max-w-full">
                <img src="https://i.postimg.cc/Vkfgsc4N/download-(5).png" alt="Success Illustration"
                    class="w-full h-auto sm:h-[500px]">
                </div>
            </div>
        </div>
    </div>
</div>
