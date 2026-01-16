<div >
    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-5 max-w-full mx-auto gap-4">
            <div class="col-span-3 ">
                <div class="bg-[#616161]/5 rounded-xl shadow-xl shadow-[0px_4px_4px_0px_#00000040]">
                    <div class="bg-[#0948EE0D] rounded-xl p-4">
                        <div class="flex justify-between">
                            <h1 class="font-bold text-2xl">موجودی اجناس:</h1>
                            <div class="bg-[#0948EE] text-white p-2 rounded-lg flex gap-1 items-center cursor-pointer">
                                <a href="{{ route('device.form') }}" class="flex items-center gap-1 p-2 bg-[#0948EE] text-white rounded-lg cursor-pointer">
                                    <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_464_1107)">
                                            <path d="M7.52977 13.8047C10.981 13.8047 13.8047 10.981 13.8047 7.52977C13.8047 4.07858 10.981 1.25488 7.52977 1.25488C4.07858 1.25488 1.25488 4.07858 1.25488 7.52977C1.25488 10.981 4.07858 13.8047 7.52977 13.8047Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.02002 7.52979H10.0399" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.52979 10.0399V5.02002" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_464_1107">
                                                <rect width="15.0597" height="15.0597" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <span class="hidden md:inline text-sm">
                                        اضافه کردن دستگاه جدید
                                    </span>
                                </a>
                            </div>
                        </div>
                        <p class="font-bold text-lg mt-8">فیلتر پیشرفته:</p>
                        <div class="grid grid-cols-3 gap-3 mb-4">
                            <select wire:model.defer="selectedCategory" class="bg-blue-100 rounded p-2">
                                <option value="">کتگوری</option>
                                <option value="mobile">موبایل</option>
                                <option value="tablet">تبلت</option>
                                <option value="laptob">لپتاب</option>
                            </select>
                            <select wire:model.defer="selectedBrand" class="bg-blue-100 rounded p-2">
                                <option value="">برند</option>
                                <option value="apple">اپل (آیفون)</option>
                                <option value="samsung">سامسونگ</option>
                                <option value="xiaomi">شیائومی</option>
                                <option value="huawei">هواوی</option>
                                <option value="oppo">اوپو</option>
                            </select>
                            <select wire:model.defer="selectedStatus" class="bg-blue-100 rounded p-2">
                                <option value="">حالت</option>
                                <option value="new">نو</option>
                                <option value="used">کارکرده</option>
                                <option value="damaged">معیوب</option>
                            </select>
                            <div  wire:click="applyFilter" class="cursor-pointer bg-[#0948EE] text-white py-4 rounded-lg flex gap-1 items-center justify-center">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.34985 2H12.2499C12.9899 2 13.5999 2.61001 13.5999 3.35001V4.82999C13.5999 5.36999 13.2599 6.04 12.9299 6.38L10.0299 8.94C9.62991 9.28 9.35986 9.94999 9.35986 10.49V13.39C9.35986 13.79 9.08988 14.33 8.74988 14.54L7.80987 15.15C6.92987 15.69 5.71985 15.08 5.71985 14V10.43C5.71985 9.95999 5.44987 9.35001 5.17987 9.01001L2.61987 6.31C2.27987 5.97 2.00989 5.36999 2.00989 4.95999V3.41C1.99989 2.61 2.60985 2 3.34985 2Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12.0002V15.0002C2 20.0002 4 22.0002 9 22.0002H15C20 22.0002 22 20.0002 22 15.0002V9.00024C22 5.88024 21.22 3.92024 19.41 2.90024C18.9 2.61024 17.88 2.39023 16.95 2.24023" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13 13H18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11 17H18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-sm"> فیلتر اجرا</p>
                            </div>
                            <div  wire:click="resetFilter" class="cursor-pointer bg-[#0948EE] text-white py-4 rounded-lg flex gap-1 items-center justify-center">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.34985 2H12.2499C12.9899 2 13.5999 2.61001 13.5999 3.35001V4.82999C13.5999 5.36999 13.2599 6.04 12.9299 6.38L10.0299 8.94C9.62991 9.28 9.35986 9.94999 9.35986 10.49V13.39C9.35986 13.79 9.08988 14.33 8.74988 14.54L7.80987 15.15C6.92987 15.69 5.71985 15.08 5.71985 14V10.43C5.71985 9.95999 5.44987 9.35001 5.17987 9.01001L2.61987 6.31C2.27987 5.97 2.00989 5.36999 2.00989 4.95999V3.41C1.99989 2.61 2.60985 2 3.34985 2Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12.0002V15.0002C2 20.0002 4 22.0002 9 22.0002H15C20 22.0002 22 20.0002 22 15.0002V9.00024C22 5.88024 21.22 3.92024 19.41 2.90024C18.9 2.61024 17.88 2.39023 16.95 2.24023" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13 13H18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11 17H18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-sm"> فیلتر حذف</p>
                            </div>
                        </div>
                    </div>
                    <div id="div1" class="transition-all duration-300 pb-3">
                        <div class="mx-2 rounded-lg border border-[#0948EE] mt-1">
                            <div class="hidden md:grid grid-cols-12 items-center bg-[#0948EE] text-white rounded-t-md py-4 ">
                                <div class="col-span-2 text-center"><p class="font-bold">مدل دستگاه</p></div>
                                <div class="text-center"><p class="font-bold">حافظه</p></div>
                                <div class="col-span-2 text-center"><p class="font-bold">شماره IMEI</p></div>
                                <div class="col-span-3 text-center"><p class="font-bold">  حالت</p></div>
                                <div class="col-span-2 text-center"><p class="font-bold">حالت موجودی</p></div>
                                <div class="text-center"><p class="font-bold">ادیت</p></div>
                                <div class="text-center"><p class="font-bold">حذف</p></div>
                            </div>
                            @forelse($devices as $device)
                            <div
                                class="cursor-pointer md:grid grid-cols-11 items-center py-4 hover:bg-[#0948EE]/20 border-b border-dotted border-[#0948EE]"
                                wire:click="selectDevice({{ $device->id }})"
                                >
                                <div class="col-span-2 text-center">
                                    <p class="text-sm">{{ $device->model }}</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm">{{ $device->memory }}</p>
                                </div>
                                <div class="col-span-6 grid grid-cols-4 my-3 md:my-0">
                                    <div class="text-center">
                                        <h1 class="text-[#00000080] block md:hidden">شماره</h1>
                                        <p class="text-sm">{{ $device->imei }}</p>
                                    </div>
                                    <div class="col-span-2 text-center">
                                        <h1 class="text-[#00000080] block md:hidden">حالت</h1>
                                        <p class="text-sm">{{ $device->status }}</p>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="text-[#00000080] block md:hidden">حالت موجودی</h1>
                                        <p class="text-sm">{{ $device->stock }}</p>
                                    </div>
                                </div>
                                <div class="col-span-2 grid grid-cols-2 my-5 md:my-0 px-16 md:px-0">
                                    <div
                                        wire:click.stop="edit({{ $device->id }})"
                                        class="mx-auto flex items-center border border-[#0033BB] md:border-none rounded-lg px-2 py-1"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#0948EE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p class="text-[#0033BB] block md:hidden">ویرایش</p>
                                    </div>
                                    <div
                                        wire:click.prevent="delete({{ $device->id }})"
                                        onclick="confirm('مطمئن هستید؟') || event.stopImmediatePropagation()"
                                        class="mx-auto flex items-center border border-[#9C0000] md:border-none rounded-lg px-2 py-1"
                                        >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.8499 9.14001L18.1999 19.21C18.0899 20.78 17.9999 22 15.2099 22H8.7899C5.9999 22 5.9099 20.78 5.7999 19.21L5.1499 9.14001" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.3301 16.5H13.6601" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.5 12.5H14.5" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p class="text-[#9C0000] block md:hidden">حذف</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div>
                                <p colspan="6" class="border px-2 py-1 text-center">داده‌ای یافت نشد</p>
                            </div>
                            @endforelse
                            <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                                <button
                                    wire:click="previousPage"
                                    @disabled($devices->onFirstPage())
                                    class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white disabled:opacity-50"
                                >
                                    ‹
                                </button>
                                @foreach ($devices->links()->elements[0] as $page => $url)
                                    <button
                                        wire:click="gotoPage({{ $page }})"
                                        @class([
                                            'w-7 h-7 rounded-md border text-xs font-medium',
                                            'border-blue-500 bg-[#0948EE]/60 text-white' => $devices->currentPage() == $page,
                                            'border-transparent bg-[#0948EE]/60 text-white' => $devices->currentPage() != $page,
                                        ])
                                    >
                                        {{ $page }}
                                    </button>
                                @endforeach
                                <button
                                    wire:click="nextPage"
                                    @disabled($devices->onLastPage())
                                    class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white disabled:opacity-50"
                                >
                                    ›
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-3">
                        <div class="bg-[#0B35CC]/10 rounded-xl space-y-5 p-3 border-r-2 border-[#0B35CC] shadow-xl shadow-[0px_4px_4px_0px_#00000040] transition-all duration-200 hover:scale-105 cursor-pointer">
                            <div class="flex justify-between items-center">
                                <h1 class="font-bold">موجودی کل</h1>
                                <div class="bg-[#0B35CC33] rounded-full p-1">
                                    <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.125 18.3337H16.875C22.5 18.3337 24.75 16.667 24.75 12.5003V7.50033C24.75 3.33366 22.5 1.66699 16.875 1.66699H10.125C4.5 1.66699 2.25 3.33366 2.25 7.50033V12.5003C2.25 16.667 4.5 18.3337 10.125 18.3337Z" stroke="#0B35CC" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 15.8337H18C20.25 15.8337 21.375 15.0003 21.375 13.3337V6.66699C21.375 5.00033 20.25 4.16699 18 4.16699H9C6.75 4.16699 5.625 5.00033 5.625 6.66699V13.3337C5.625 15.0003 6.75 15.8337 9 15.8337Z" stroke="#0B35CC" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.625 7.91699H8.415C9.9675 7.91699 11.2275 8.85033 11.2275 10.0003C11.2275 11.1503 9.9675 12.0837 8.415 12.0837H5.625" stroke="#0B35CC" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21.375 8.3252H18" stroke="#0B35CC" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21.375 11.667H18" stroke="#0B35CC" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.1001 10H8.2126" stroke="#0B35CC" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <h1 class="font-bold">60</h1>
                                <p class="text-[#0B35CC] bg-[#0B35CC33] text-[7px] p-0.5 ml-1 rounded-sm">+ 20%</p>
                            </div>
                        </div>
                        <div class="bg-[#0099FF]/10 rounded-xl space-y-5 p-3 border-r-2 border-[#0099FF] shadow-xl shadow-[0px_4px_4px_0px_#00000040] transition-all duration-200 hover:scale-105 cursor-pointer">
                            <div class="flex justify-between items-center">
                                <h1 class="font-bold">موجودی دوکان</h1>
                                <div class="bg-[#0099FF33] rounded-full p-1">
                                    <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.77686 13.4998L12.5885 16.2223L18.2235 10.7773" stroke="#0099FF" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.5419 2.75611C13.3469 2.09236 14.6652 2.09236 15.4819 2.75611L17.3252 4.28611C17.6752 4.57861 18.3285 4.81486 18.7952 4.81486H20.7785C22.0152 4.81486 23.0302 5.79361 23.0302 6.98611V8.89861C23.0302 9.33736 23.2752 9.97861 23.5785 10.3161L25.1652 12.0936C25.8535 12.8699 25.8535 14.1411 25.1652 14.9286L23.5785 16.7061C23.2752 17.0436 23.0302 17.6736 23.0302 18.1236V20.0361C23.0302 21.2286 22.0152 22.2074 20.7785 22.2074H18.7952C18.3402 22.2074 17.6752 22.4436 17.3252 22.7361L15.4819 24.2661C14.6769 24.9299 13.3585 24.9299 12.5419 24.2661L10.6985 22.7361C10.3485 22.4436 9.69519 22.2074 9.22852 22.2074H7.21019C5.97352 22.2074 4.95852 21.2286 4.95852 20.0361V18.1124C4.95852 17.6736 4.71352 17.0436 4.42186 16.7061L2.84686 14.9174C2.17019 14.1411 2.17019 12.8811 2.84686 12.1049L4.42186 10.3161C4.71352 9.97861 4.95852 9.34861 4.95852 8.90986V6.97486C4.95852 5.78236 5.97352 4.80361 7.21019 4.80361H9.22852C9.68352 4.80361 10.3485 4.56736 10.6985 4.27486L12.5419 2.75611Z" stroke="#0099FF" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <h1 class="font-bold">60</h1>
                                <p class="text-[#0099FF] bg-[#0099FF33] text-[7px] p-0.5 ml-1 rounded-sm">+ 20%</p>
                            </div>
                        </div>
                        <div class="bg-[#31009B]/10 rounded-xl space-y-5 p-3 border-r-2 border-[#31009B] shadow-xl shadow-[0px_4px_4px_0px_#00000040] transition-all duration-200 hover:scale-105 cursor-pointer">
                            <div class="flex justify-between items-center">
                                <h1 class="font-bold">موجودی انبار</h1>
                                <div class="bg-[#31009B33] rounded-full p-1">
                                    <svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.40764 16.8604V18.8904C9.40764 20.6104 8.00763 22.0004 6.28388 22.0004C4.56013 22.0004 3.15137 20.6104 3.15137 18.8904V16.8604C3.15137 18.5804 4.55138 19.8004 6.28388 19.8004C8.00763 19.8004 9.40764 18.5704 9.40764 16.8604Z" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.40609 14.1097C9.40609 14.6097 9.28359 15.0697 9.07359 15.4697C8.55734 16.4397 7.49857 17.0497 6.27357 17.0497C5.04857 17.0497 3.98981 16.4297 3.47356 15.4697C3.26356 15.0697 3.14111 14.6097 3.14111 14.1097C3.14111 13.2497 3.49109 12.4797 4.05109 11.9197C4.61984 11.3497 5.39857 11.0098 6.26482 11.0098C7.13107 11.0098 7.90984 11.3597 8.47859 11.9197C9.05609 12.4697 9.40609 13.2497 9.40609 14.1097Z" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.40764 14.11V16.86C9.40764 18.58 8.00763 19.8 6.28388 19.8C4.56013 19.8 3.15137 18.57 3.15137 16.86V14.11C3.15137 12.39 4.55138 11 6.28388 11C7.15013 11 7.92891 11.35 8.49766 11.91C9.05766 12.47 9.40764 13.25 9.40764 14.11Z" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M19.2502 10.9702V13.0302C19.2502 13.5802 18.8652 14.0302 18.3752 14.0502H16.6602C15.7152 14.0502 14.8489 13.2602 14.7702 12.1802C14.7177 11.5502 14.9277 10.9602 15.2952 10.5502C15.6189 10.1702 16.0652 9.9502 16.5552 9.9502H18.3752C18.8652 9.9702 19.2502 10.4202 19.2502 10.9702Z" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.75 10.5V8.5C1.75 5.78 3.185 3.88 5.41625 3.56C5.64375 3.52 5.88 3.5 6.125 3.5H14C14.2275 3.5 14.4463 3.50999 14.6562 3.54999C16.9137 3.84999 18.375 5.76 18.375 8.5V9.95001H16.555C16.065 9.95001 15.6187 10.17 15.295 10.55C14.9275 10.96 14.7175 11.55 14.77 12.18C14.8488 13.26 15.715 14.05 16.66 14.05H18.375V15.5C18.375 18.5 16.625 20.5 14 20.5H11.8125" stroke="#31009B" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <h1 class="font-bold">75000</h1>
                                <p class="text-[#31009B] bg-[#31009B33] text-[7px] p-0.5 ml-1 rounded-sm">+ 20%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 hidden md:block mt-4 md:mt-0">
                <div class="rounded-xl bg-[#616161]/5 shadow-xl pt-5 px-4 pb-5">
                    @if($selectedDevice)
                        <div class="flex justify-center">
                            @if($device->image)
                                <img src="{{ asset('storage/' . $device->image) }}"
                                    width="200" height="200">
                            @else
                                ندارد
                            @endif
                        </div>
                        <h1 class="font-bold text-2xl text-center mt-2">
                            {{ $selectedDevice->model }} {{ $selectedDevice->category }}
                        </h1>
                        <div class="flex items-center mt-4">
                            <p class="text-gray-500">IMEI:</p>
                            <p class="mr-2">{{ $selectedDevice->imei }}</p>
                        </div>
                        <div class="flex items-center mt-1">
                            <p class="text-gray-500">کتگوری:</p>
                            <p class="mr-9">{{ $selectedDevice->category }}</p>
                        </div>
                        <div class="flex items-center mt-1">
                            <p class="text-gray-500">حالت:</p>
                            <p class="mr-12">{{ $selectedDevice->status }}</p>
                        </div>
                        <div class="flex items-center mt-1">
                            <p class="text-gray-500">رنگ:</p>
                            <p class="mr-12">{{ $selectedDevice->color }}</p>
                        </div>
                        <div class="flex items-center mt-1">
                            <p class="text-gray-500">موجودی:</p>
                            <p class="mr-8">{{ $selectedDevice->stock }}</p>
                        </div>
                        <div wire:click="toggleSaleDetails" class="flex justify-center">
                            <button class="w-48 border border-[#0948EE] rounded-lg text-center py-1 mt-1 cursor-pointer">مشخصات فروش</button>
                        </div>
                        @if($showSaleDetails)
                        <div class="flex items-center mt-2">
                            <p class="text-gray-500">قیمت خرید:</p>
                            <p class="mr-8">{{ number_format($buy_price, 2) }}؋</p>
                        </div>
                        <div class="flex items-center mt-2">
                            <p class=" text-gray-500">قیمت فروش:</p>
                            <p class="mr-6">  {{ number_format($sell_price, 2) }}؋</p>
                        </div>
                        <div class="flex items-center mt-2">
                            <p class= "{{ $profit < 0 ? 'text-red-600' : 'text-green-600'  }}">مقدار مفاد:</p>
                            <p class="mr-10">   {{ number_format($profit, 2) }}؋</p>
                        </div>
                        <div class="flex items-center mt-2">
                            <p class="text-gray-500">فیصدی مفاد:</p>
                            <p class="mr-6">{{ $profitPercent }} %</p>
                        </div>
                        <div class="flex items-center mt-2">
                            <p class="text-gray-500">حالت راجستر:</p>
                            <p class="mr-6">ثبت شده</p>
                        </div>
                        <div class="flex items-center mt-2">
                            <p class="text-gray-500">گارانتی:</p>
                            <p class="mr-6">{{ $selectedDevice->warranty }}</p>
                        </div>
                    @endif
                    @else
                        <p class="text-center text-gray-400 py-10">
                            لطفاً یک دستگاه را انتخاب کنید
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
