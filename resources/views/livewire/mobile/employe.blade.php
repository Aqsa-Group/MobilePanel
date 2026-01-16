<div class="w-full">
    <main>
        <div class="p-4  max-w-full mx-auto">
            <div class="rounded-xl shadow-xl w-full shadow-[0px_4px_4px_0px_#00000040] bg-[#616161]/5 px-2 py-4">
                <h2 class="text-2xl font-bold text-center mb-2"> کارمند جدید</h2>
                <p class="text-center text-sm text-gray-500 mb-6">
                    شما می‌توانید کارمند جدید ثبت کنید.
                </p>
                <div class="flex flex-col items-center mb-8">
                    <div class="relative bg-[#0948EE] flex items-center justify-center  rounded-full w-24 h-24">
                        <svg xmlns="http://www.w3.org/2000/svg"class="w-14 h-14 " viewBox="0 0 20 20"><path fill="#fff" d="M7.725 2.146c-1.016.756-1.289 1.953-1.239 2.59c.064.779.222 1.793.222 1.793s-.313.17-.313.854c.109 1.717.683.976.801 1.729c.284 1.814.933 1.491.933 2.481c0 1.649-.68 2.42-2.803 3.334C3.196 15.845 1 17 1 19v1h18v-1c0-2-2.197-3.155-4.328-4.072c-2.123-.914-2.801-1.684-2.801-3.334c0-.99.647-.667.932-2.481c.119-.753.692-.012.803-1.729c0-.684-.314-.854-.314-.854s.158-1.014.221-1.793c.065-.817-.398-2.561-2.3-3.096c-.333-.34-.558-.881.466-1.424c-2.24-.105-2.761 1.067-3.954 1.929"/></svg>
                    </div>
                </div>
                <div class="">
                    <div class="grid grid-cols-1 md:grid-cols-2 mt-4 gap-2">
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
                            <div class="relative w-full">
                                <label for="imageUpload" class="w-full  text-gray-500  input-field  bg-white cursor-pointer flex    ">
                                    عکس
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
                                <input type="text" placeholder="آیدی تذکره "  wire:model.lazy="name"  wire:model="name"
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
                        <div class="flex flex-col">
                            <div class="relative  w-full">
                                <input type="text" placeholder="معاش" wire:model="money" wire:model.lazy="money"
                                    class="input-field ">
                                <svg xmlns="http://www.w3.org/2000/svg" class=" w-6 h-6 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M19.745 13a7 7 0 1 0-12.072-1"/><path d="M16 6.373c-.156-.828-1.114-1.607-2.407-1.307c-1.355.314-1.969 1.907-1.355 2.902c.637 1.032.942 2.032.111 3.447c-.161.275-.242.413-.198.5c.045.085.188.085.473.085H16m-5-3h4M3 14h2.395c.294 0 .584.066.847.194l2.042.988c.263.127.553.193.848.193h1.042c1.008 0 1.826.791 1.826 1.767c0 .04-.027.074-.066.085l-2.541.703a1.95 1.95 0 0 1-1.368-.124L5.842 16.75M12 16.5l4.593-1.411a1.985 1.985 0 0 1 2.204.753c.369.51.219 1.242-.319 1.552l-7.515 4.337a2 2 0 0 1-1.568.187L3 20.02"/></g></svg>
                            </div>
                            @error('money')
                                <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative" >
                            <select name="" id="" class="w-full text-gray-600 input-field">
                                <option value="">انتخاب شغل</option>
                                <option value="">فروشنده</option>
                                <option value="">تعمیر کار</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3">
                        <button
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-md transition">
                            لغو
                        </button>
                        <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 w-full lg:grid-cols-2 gap-3 pt-2">
                <div class="lg:col-span-2 bg-[#616161]/5 rounded-2xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl  w-full lg:max-w-full p-3">
                    <div class="lg:hidden space-y-3 ">
                        <div class="flex justify-between items-center mb-3 flex-wrap gap-2">
                                <div class="flex items-center gap-1 flex-shrink-0">
                                    <i>
                                        <svg width="20" height="20" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1047_2670)">
                                            <path d="M34.4314 16.596L32.8736 23.2407C31.5383 28.9792 28.8995 31.3001 23.9398 30.8232C23.145 30.7596 22.2866 30.6166 21.3646 30.394L18.694 29.7582C12.0652 28.1844 10.0146 24.9098 11.5725 18.2651L13.1303 11.6045C13.4482 10.2533 13.8297 9.07698 14.3066 8.1073C16.1665 4.26038 19.3299 3.22712 24.6393 4.48293L27.294 5.10289C33.9545 6.66073 35.9893 9.95128 34.4314 16.596Z" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M23.9399 30.8233C22.9543 31.491 21.7144 32.0474 20.2043 32.5401L17.6926 33.3668C11.3818 35.4015 8.05944 33.7006 6.00881 27.3897L3.97408 21.1107C1.93934 14.7998 3.62436 11.4616 9.93522 9.42682L12.4468 8.60021C13.0986 8.39356 13.7186 8.2187 14.3067 8.10742C13.8298 9.0771 13.4483 10.2534 13.1304 11.6046L11.5725 18.2652C10.0147 24.9099 12.0653 28.1845 18.6941 29.7583L21.3647 30.3941C22.2867 30.6167 23.1451 30.7598 23.9399 30.8233Z" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M20.093 13.5596L27.8028 15.5148" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.5352 19.7119L23.1451 20.8882" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_1047_2670">
                                            <rect width="38.1513" height="38.1513" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </i>
                                    <h2 class="font-bold text-lg mb-0">  لیست کارمندان:</h2>
                                </div>
                        <div class="flex gap-2 flex-1 min-w-[100px]">
                            <div class="relative flex-1">
                                <span class="absolute right-2 top-1.5 text-gray-200 mt-1">
                                            <svg width="8" height="8" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1047_2643)">
                                            <path d="M10.2915 12.8337V6.41699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.2915 4.08366V1.16699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M6.5 12.8337V9.91699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M6.5 7.58366V1.16699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2.7085 12.8337V6.41699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2.7085 4.08366V1.16699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M1.625 6.41699H3.79167" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.2085 6.41699H11.3752" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.4165 7.58301H7.58317" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_1047_2643">
                                            <rect width="13" height="14" fill="white"/>
                                            </clipPath>
                                            </defs>
                                            </svg>
                                </span>
                                <input type="text" class="p-1 pr-8 w-full  bg-[#0948EE]/20 rounded-xl" placeholder="فیلتر">
                            </div>
                            <div class="relative flex-1">
                                <input type="text" class="p-1 w-full  bg-[#0948EE]/20  rounded-xl" placeholder="جستجو....">
                                <span class="absolute left-1 top-1.5 text-gray-600">
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.46875 15.3184C9.42002 15.3184 11.8125 12.793 11.8125 9.67773C11.8125 6.5625 9.42002 4.03711 6.46875 4.03711C3.51748 4.03711 1.125 6.5625 1.125 9.67773C1.125 12.793 3.51748 15.3184 6.46875 15.3184Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.375 15.9121L11.25 14.7246" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        </div>
                        @for ($i=1; $i<=5; $i++)
                        <div class="p-4">
                            <div class="">
                                <div class="grid grid-cols-2 gap-5 text-sm">
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1"> عکس </div>
                                        <div class="text-gray-900 font-bold">#565777 </div>
                                    </div>
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1">نام کارمند</div>
                                        <div class="text-gray-900 font-bold">علی </div>
                                    </div>
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1">آیدی تذکره</div>
                                        <div class="text-gray-900 font-bold"> ۸۹۹۹۹۸</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">شماره </div>
                                        <div class="text-gray-900 font-bold">  ۰۲۹۰۱</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1"> آدرس </div>
                                        <div class="text-gray-900 font-bold">  گلها</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1"> معاش  </div>
                                        <div class="text-gray-900 font-bold">  ؋43,000</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">  شغل   </div>
                                        <div class="text-gray-900 font-bold">   جدید</div>
                                    </div>
                                </div>
                                <div class="flex justify-center gap-3 mt-5">
                                    <a href="{{ route('employe.edit') }}"
                                        class="flex items-center gap-1 border-blue-600 border border-2 py-2 px-3 rounded-lg text-xs">
                                        <i class="bi bi-pencil-square">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"
                                                    stroke="#0948EE" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                <path d="M16.0399 3.02025L8.15988 10.9003C7.85988 11.2003 7.55988 11.7903
                                                        7.49988 12.2203L7.06988 15.2303C6.90988 16.3203 7.67988 17.0803
                                                        8.76988 16.9303L11.7799 16.5003C12.1999 16.4403 12.7899 16.1403
                                                        13.0999 15.8403L20.9799 7.96025C22.3399 6.60025 22.9799 5.02025
                                                        20.9799 3.02025C18.9799 1.02025 17.3999 1.66025 16.0399 3.02025Z"
                                                    stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M14.9102 4.15039C15.5802 6.54039 17.4502 8.41039
                                                        19.8502 9.09039"
                                                    stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </i>
                                        ویرایش
                                    </a>
                                    <button class="flex items-center gap-1  border-red-600 border border-2   py-2 px-3 rounded-lg text-xs">
                                        <i class="bi bi-trash">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 5.98047C17.67 5.65047 14.32 5.48047 10.98 5.48047C9 5.48047 7.02 5.58047 5.04 5.78047L3 5.98047" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.8499 9.13965L18.1999 19.2096C18.0899 20.7796 17.9999 21.9996 15.2099 21.9996H8.7899C5.9999 21.9996 5.9099 20.7796 5.7999 19.2096L5.1499 9.13965" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.3301 16.5H13.6601" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.5 12.5H14.5" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        </i> حذف
                                    </button>
                                </div>
                            </div>
                            <div class="border-b border-gray-300 mt-5"></div>
                        </div>
                        @endfor
                        <div class="flex items-start justify-center sm:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
                            <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
                            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
                            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
                            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
                            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
                        </div>
                    </div>
                    <div class="hidden lg:block overflow-x-auto ">
                        <div class="flex justify-between mb-3">
                            <div class="flex gap-1 items-center">
                                <i>
                                <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1047_2670)">
                                <path d="M34.4314 16.596L32.8736 23.2407C31.5383 28.9792 28.8995 31.3001 23.9398 30.8232C23.145 30.7596 22.2866 30.6166 21.3646 30.394L18.694 29.7582C12.0652 28.1844 10.0146 24.9098 11.5725 18.2651L13.1303 11.6045C13.4482 10.2533 13.8297 9.07698 14.3066 8.1073C16.1665 4.26038 19.3299 3.22712 24.6393 4.48293L27.294 5.10289C33.9545 6.66073 35.9893 9.95128 34.4314 16.596Z" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M23.9399 30.8233C22.9543 31.491 21.7144 32.0474 20.2043 32.5401L17.6926 33.3668C11.3818 35.4015 8.05944 33.7006 6.00881 27.3897L3.97408 21.1107C1.93934 14.7998 3.62436 11.4616 9.93522 9.42682L12.4468 8.60021C13.0986 8.39356 13.7186 8.2187 14.3067 8.10742C13.8298 9.0771 13.4483 10.2534 13.1304 11.6046L11.5725 18.2652C10.0147 24.9099 12.0653 28.1845 18.6941 29.7583L21.3647 30.3941C22.2867 30.6167 23.1451 30.7598 23.9399 30.8233Z" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.093 13.5596L27.8028 15.5148" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.5352 19.7119L23.1451 20.8882" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_1047_2670">
                                <rect width="38.1513" height="38.1513" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                                </i>
                                <h2 class="font-bold text-lg mb-0"> لیست کارمندان:</h2>
                            </div>
                            <div class="flex flex-col lg:flex-row gap-1">
                                <div class="relative mb-1">
                                    <span class="absolute right-2 top-1.5 text-gray-200 mt-1">
                                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1047_2643)">
                                        <path d="M10.2915 12.8337V6.41699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.2915 4.08366V1.16699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.5 12.8337V9.91699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.5 7.58366V1.16699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2.7085 12.8337V6.41699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2.7085 4.08366V1.16699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.625 6.41699H3.79167" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.2085 6.41699H11.3752" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.4165 7.58301H7.58317" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_1047_2643">
                                        <rect width="13" height="14" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                    </span>
                                    <input type="text" class="p-1 pr-8 w-[100px] bg-[#0948EE]/20 rounded-xl" placeholder="فیلتر">
                                </div>
                                <div class="relative mb-1">
                                    <input type="text" class="p-1 w-[170px]  bg-[#0948EE]/20  rounded-xl" placeholder="جستجو....">
                                    <span class="absolute left-1 top-1.5 text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <table class="w-full text-center border-2 border-[#0948EE] text-sm border-collapse">
                            <thead class=" bg-[#0948EE] text-white  border-b-2 border-[#0948EE] text-center">
                                <tr>
                                    <th class="p-2 text-[12px]">شماره</th>
                                    <th class="p-2 text-[12px]">عکس</th>
                                    <th class="p-2 text-[12px]">نام کارمند</th>
                                    <th class="p-2 text-[12px]">آیدی تذکره</th>
                                    <th class="p-2 text-[12px]"> شماره</th>
                                    <th class="p-2 text-[12px]"> آدرس</th>
                                    <th class="p-2 text-[12px]"> معاش</th>
                                    <th class="p-2 text-[12px]"> شغل</th>
                                    <th class="p-2 text-[12px]">ویرایش</th>
                                    <th class="p-2 text-[12px]">حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=1; $i<=5; $i++)
                                <tr class="hover:bg-gray-200 text-[10px] border-b-2 border-[#0948EE]">
                                    <td class="p-2">{{ $i }}</td>
                                    <td class="p-2"> عکس</td>
                                    <td class="p-2"> علی</td>
                                    <td class="p-2"> #5289328</td>
                                    <td class="p-2"> ۰۹۰۰۹۰</td>
                                    <td class="p-2">گلها</td>
                                    <td class="p-2">75,000؋</td>
                                    <td class="p-2">فروشنده</td>
                                    <td class="p-2">
                                        <a  href="{{ route('employe.edit') }}">
                                            <i class="text-blue-600 text-center flex justify-center text-lg cursor-pointer">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"
                                                        stroke="#0948EE" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M16.0399 3.01976L8.15988 10.8998C7.85988 11.1998 7.55988 11.7898
                                                            7.49988 12.2198L7.06988 15.2298C6.90988 16.3198 7.67988 17.0798
                                                            8.76988 16.9298L11.7799 16.4998C12.1999 16.4398 12.7899 16.1398
                                                            13.0999 15.8398L20.9799 7.95976C22.3399 6.59976 22.9799 5.01976
                                                            20.9799 3.01976C18.9799 1.01976 17.3999 1.65976 16.0399 3.01976Z"
                                                        stroke="#0948EE" stroke-width="1.5"
                                                        stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M14.9102 4.1499C15.5802 6.5399 17.4502 8.4099
                                                            19.8502 9.0899"
                                                        stroke="#0948EE" stroke-width="1.5"
                                                        stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </i>
                                        </a>
                                    </td>
                                    <td class="p-2">
                                        <i class=" text-blue-600 text-center flex justify-center text-lg cursor-pointer">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.8499 9.14014L18.1999 19.2101C18.0899 20.7801 17.9999 22.0001 15.2099 22.0001H8.7899C5.9999 22.0001 5.9099 20.7801 5.7999 19.2101L5.1499 9.14014" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.3301 16.5H13.6601" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.5 12.5H14.5" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </i>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="flex items-start justify-center sm:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
                            <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
                            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
                            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
                            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
                            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </main>
</div>
