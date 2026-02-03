<div >
    <div class="p-4">
        <div class="grid max-w-full mx-auto gap-4">
            <div class=" ">
                <div class="border border-gray-300 rounded-xl shadow-xl shadow-[0px_4px_4px_0px_#00000040]">
                    <div class="bg-[#1E40AF]/5 rounded-xl p-4">
                        <div class="flex justify-between">
                            <h1 class="font-bold text-2xl">موجودی دوکان:</h1>
                            <div class="bg-[#1E40AF] text-white p-2 rounded-lg flex gap-1 items-center cursor-pointer">
                                <a href="{{ route('device.form') }}" class="flex items-center gap-1 p-2 bg-[#1E40AF] text-white rounded-lg cursor-pointer">
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
                        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 mb-4">
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
                            <div  wire:click="applyFilter" class="cursor-pointer bg-[#1E40AF] text-white py-4 rounded-lg flex gap-1 items-center justify-center">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.34985 2H12.2499C12.9899 2 13.5999 2.61001 13.5999 3.35001V4.82999C13.5999 5.36999 13.2599 6.04 12.9299 6.38L10.0299 8.94C9.62991 9.28 9.35986 9.94999 9.35986 10.49V13.39C9.35986 13.79 9.08988 14.33 8.74988 14.54L7.80987 15.15C6.92987 15.69 5.71985 15.08 5.71985 14V10.43C5.71985 9.95999 5.44987 9.35001 5.17987 9.01001L2.61987 6.31C2.27987 5.97 2.00989 5.36999 2.00989 4.95999V3.41C1.99989 2.61 2.60985 2 3.34985 2Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12.0002V15.0002C2 20.0002 4 22.0002 9 22.0002H15C20 22.0002 22 20.0002 22 15.0002V9.00024C22 5.88024 21.22 3.92024 19.41 2.90024C18.9 2.61024 17.88 2.39023 16.95 2.24023" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13 13H18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11 17H18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-sm"> فیلتر اجرا</p>
                            </div>
                            <div  wire:click="resetFilter" class="cursor-pointer bg-[#1E40AF] text-white py-4 rounded-lg flex gap-1 items-center justify-center">
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
                    <div id="div1" class=" pb-3">
                        <div class="mx-2   mt-1">
                            <div class="hidden md:block overflow-x-auto">
                                <table class="min-w-full ">
                                    <thead class="bg-[#1E40AF]  text-white">
                                        <tr>
                                            <th class="p-2 text-[12px] text-center">آیدی </th>
                                            <th class="p-2 text-[12px] text-center">عکس </th>
                                            <th class="p-2 text-[12px] text-center">مدل دستگاه</th>
                                            <th class="p-2 text-[12px] text-center">حافظه</th>
                                            <th class="p-2 text-[12px] text-center"> بارکد</th>
                                            <th class="p-2 text-[12px] text-center">حالت</th>
                                            <th class="p-2 text-[12px] text-center">کتگوری</th>
                                            <th class="p-2 text-[12px] text-center">رنگ</th>
                                            <th class="p-2 text-[12px] text-center">حالت موجودی</th>
                                            <th class="p-2 text-[12px] text-center"> ادمین</th>
                                            <th class="p-2 text-[12px] text-center"> قیمت خرید</th>
                                            <th class="p-2 text-[12px] text-center">چاپ</th>
                                            <th class="p-2 text-[12px] text-center">ادیت</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($devices as $device)
                                        <tr class="border-b text-[11px] border-b-2 border-[#1E40AF]  cursor-pointer">
                                            <td class="px-4 py-2 font-bold text-center">  {{ $devices->firstItem() + $loop->index }}</td>
                                            <td class="text-center">
                                                <div class="w-8 h-8 rounded-full block mx-auto overflow-hidden flex items-center  bg-gray-100">
                                                    @if($device->image)
                                                        <img
                                                            src="{{ asset('storage/' . $device->image) }}"
                                                            class="w-full h-full object-cover"
                                                            alt="device"
                                                        >
                                                    @else
                                                        <span class="text-sm text-gray-500">ندارد</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center">{{ $device->model }}</td>
                                            <td class="px-4 py-2 text-center">{{ $device->memory }}</td>
                                            <td class="px-4 py-2 text-center">{{ $device->imei }}</td>
                                            <td class="px-4 py-2 text-center">{{ $device->status_fa }}</td>
                                            <td class="px-4 py-2 text-center">{{ $device->category_fa }}</td>
                                            <td class="px-4 py-2 text-center">{{ $device->color }}</td>
                                            <td class="px-4 py-2 text-center">{{ $device->stock }}</td>
                                            <td class="px-4 py-2 text-center">@if($device->admin)     {{ $device->admin->name }} ({{ $device->admin->rule }})  @else     -- @endif</td>
                                            <td class="px-4 py-2 text-center">{{ number_format($device->buy_price, 2) }}؋</td>
                                            <td class="px-4 py-2 text-center">
                                                <button wire:click.stop="edit({{ $device->id }})" class="text-blue-800">
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                                </button>
                                            </td>
                                            <td class="px-4 py-2 text-center">
                                                <button wire:click.stop="edit({{ $device->id }})" class="text-blue-600">
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="px-4 py-2 text-center">
                                                <div class="md:flex md:justify-center">
                                                    داده‌ای یافت نشد
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @forelse($devices as $device)
                            <div  class="cursor-pointer text-center block md:hidden items-center py-4  border-b  border-[#1E40AF]"  >
                                <div class="w-10 h-10 rounded-full block mx-auto overflow-hidden bg-gray-100">
                                    @if($device->image)
                                        <img
                                            src="{{ asset('storage/' . $device->image) }}"
                                            class="w-full h-full object-cover"
                                            alt="device"
                                        >
                                    @else
                                        <span class="text-sm text-gray-500">ندارد</span>
                                    @endif
                                </div>
                                <div class="col-span-6 text-center justify-center grid grid-cols-2 my-3 md:my-0">
                                    <div class="text-center">
                                        <h1 class="text-[#00000080] block md:hidden">مدل دستگاه</h1>
                                        <p class="text-sm">{{ $device->model }}</p>
                                    </div>
                                    <div class="text-center ">
                                        <h1 class="text-[#00000080] block md:hidden">حافظه</h1>
                                        <p class="text-sm">{{ $device->memory }}</p>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="text-[#00000080] block md:hidden">بارکد</h1>
                                        <p class="text-sm">{{ $device->imei }}</p>
                                    </div>
                                    <div class="text-center ">
                                        <h1 class="text-[#00000080] block md:hidden">کتگوری</h1>
                                        <p class="text-sm">{{ $device->category_fa }}</p>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="text-[#00000080] block md:hidden">رنگ</h1>
                                        <p class="text-sm">{{ $device->color }}</p>
                                    </div>
                                    <div class=" text-center">
                                        <h1 class="text-[#00000080] block md:hidden">حالت</h1>
                                        <p class="text-sm">{{ $device->status_fa }}</p>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="text-[#00000080] block md:hidden">حالت موجودی</h1>
                                        <p class="text-sm">{{ $device->stock }}</p>
                                    </div>
                                    <div class=" text-center">
                                        <h1 class="text-[#00000080] block md:hidden"> ادمین</h1>
                                        <p class="text-sm">@if($device->admin)     {{ $device->admin->name }} ({{ $device->admin->rule }})  @else     -- @endif</p>
                                    </div>
                                    <div class=" text-center col-span-2">
                                        <h1 class="text-[#00000080] block md:hidden"> قیمت خرید</h1>
                                        <p class="text-sm"> {{ number_format($device->buy_price, 2) }}؋</p>
                                    </div>
                                </div>
                                <div class=" grid grid-cols-2 my-5 md:my-0 px-16 md:px-0">
                                    <div  wire:click.stop="edit({{ $device->id }})"  class="mx-auto flex items-center border border-[#1C274C] md:border-none rounded-lg px-2 py-1"  >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                        <p class="text-[#1C274C] block md:hidden">چاپ</p>
                                    </div>
                                    <div   wire:click.stop="edit({{ $device->id }})"  class="mx-auto flex items-center border border-[#0033BB] md:border-none rounded-lg px-2 py-1"  >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p class="text-[#0033BB] block md:hidden">ویرایش</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div>
                                <p colspan="6" class=" md:hidden block px-2 py-1 text-center">داده‌ای یافت نشد</p>
                            </div>
                            @endif
                            <div class="flex flex-wrap gap-1 justify-center sm:justify-start items-center mt-3 text-[10px]">
                                @if ($devices->lastPage() > 1)
                                <button
                                    wire:click="previousPage"
                                    @disabled($devices->onFirstPage())
                                    class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                                    قبلی
                                </button>
                                <span class="mx-2 text-sm font-medium">
                                    {{ $devices->currentPage() }} از {{ $devices->lastPage() }}
                                </span>
                                <button
                                    wire:click="nextPage"
                                    @disabled($devices->onLastPage())
                                    class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                                    بعدی
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
