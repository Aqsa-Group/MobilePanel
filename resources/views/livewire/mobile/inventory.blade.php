<div >
    <div class="p-4">
        <div class=" text-gray-800 ">
            <div class=" flex items-center mx-auto max-w-full justify-center">
                <div class="shadow-xl card shadow-[0px_4px_4px_0px_#00000040] w-full  border rounded-2xl overflow-hidden flex flex-col lg:flex-row ">
                    <div class="flex-1  flex items-start justify-center sm:p-4  ">
                        <div class="w-full max-w-full">
                            <h2 class="text-[40px] sm:text-2xl font-bold text-center lg:text-right flex items-center justify-center mt-[30px]">
                                اطلاعات دستگاه
                            </h2>
                            <p class="text-[10px] text-gray-500 text-center lg:text-right mb-6  flex items-center justify-center">
                                لطفا اطلاعات را دقیق وارد کنید.
                            </p>
                            @if (session()->has('error'))
                                <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form wire:submit.prevent="saveDevice" enctype="multipart/form-data">
                                @csrf
                                <div class="grid p-4 grid-cols-1 sm:grid-cols-2 gap-y-3 gap-3">
                                    <div class="relative w-full">
                                        <select wire:model="category" class="input-field">
                                            <option value="">کتگوری</option>
                                            <option value="mobile">موبایل</option>
                                            <option value="tablet">تبلت</option>
                                            <option value="laptob">لپتاب</option>
                                        </select>
                                        @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="relative w-full">
                                        <select wire:model="status" class="input-field">
                                            <option value="">حالت</option>
                                            <option value="new">نو</option>
                                            <option value="used">کارکرده</option>
                                            <option value="damaged">معیوب</option>
                                        </select>
                                        @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="relative w-full">
                                        <input type="text" placeholder="نام دستگاه" wire:model="model" class="input-field">
                                        @error('model') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.75 5.75V15.75C16.75 19.75 15.75 20.75 11.75 20.75H5.75C1.75 20.75 0.75 19.75 0.75 15.75V5.75C0.75 1.75 1.75 0.75 5.75 0.75H11.75C15.75 0.75 16.75 1.75 16.75 5.75Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.75 4.25H6.75" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.7502 17.85C9.60624 17.85 10.3002 17.156 10.3002 16.3C10.3002 15.444 9.60624 14.75 8.7502 14.75C7.89415 14.75 7.2002 15.444 7.2002 16.3C7.2002 17.156 7.89415 17.85 8.7502 17.85Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="relative w-full">
                                        <input type="text" wire:model.defer="buy_price" placeholder="قیمت خرید"  class="input-field no-spinner">
                                            <svg fill="#000000" class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M482.358,229.671h-63.223v-3.525c0-36.462-29.664-66.126-66.125-66.126c-36.461,0-66.125,29.664-66.125,66.126v3.525 h-31.563c12.826-21.276,19.54-45.428,19.54-70.687c0-75.781-61.651-137.434-137.432-137.434S0,83.202,0,158.983 s61.651,137.434,137.432,137.434c19.577,0,38.896-4.178,56.589-12.167v109.772l-10.426-8.229 c-5.027-3.966-12.61-3.968-17.641,0.001c-2.957,2.335-4.652,5.744-4.652,9.353v28.005H72.758 c-19.316,0-35.032-15.715-35.032-35.033v-97.012c0-4.466-3.62-8.084-8.084-8.084c-4.465,0-8.084,3.618-8.084,8.084v97.013 c0,28.232,22.969,51.201,51.2,51.201h88.544v28.006c0,3.609,1.695,7.018,4.652,9.353c0.001,0,0.002,0.001,0.003,0.002 c5.026,3.964,12.608,3.966,17.637-0.001l10.428-8.229v3.127c0,16.344,13.297,29.642,29.642,29.642h258.695 c16.345,0,29.642-13.298,29.642-29.642V259.313C512,242.969,498.703,229.671,482.358,229.671z M411.051,303.88 c4.465,0,8.084-3.619,8.084-8.084V283.01c4.233,2.685,7.048,7.414,7.048,12.786c0,8.344-6.789,15.133-15.133,15.133 s-15.133-6.789-15.133-15.133c0-5.372,2.814-10.101,7.048-12.786v12.786C402.967,300.261,406.586,303.88,411.051,303.88z M303.054,226.146c0-27.546,22.411-49.957,49.956-49.957s49.956,22.411,49.956,49.957v3.525h-99.912V226.146z M294.97,303.88 c4.465,0,8.084-3.619,8.084-8.084V283.01c4.233,2.685,7.048,7.414,7.048,12.786c0,8.344-6.789,15.133-15.133,15.133 s-15.133-6.789-15.133-15.133c0-5.372,2.815-10.101,7.048-12.786v12.786C286.886,300.261,290.506,303.88,294.97,303.88z M137.432,280.249c-66.865,0-121.263-54.4-121.263-121.265S70.567,37.718,137.432,37.718s121.263,54.4,121.263,121.265 c0,25.654-7.845,50.007-22.73,70.686h-12.302c-16.345,0-29.642,13.298-29.642,29.642v6.946 C176.666,275.425,157.201,280.249,137.432,280.249z M197.179,445.362c-0.052,0.04-0.103,0.081-0.155,0.122l-19.555,15.432 v-59.359l19.582,15.454c0.033,0.026,0.067,0.053,0.1,0.079l17.927,14.146L197.179,445.362z M495.832,471.579 c0,7.43-6.044,13.474-13.474,13.474H223.663c-7.43,0-13.474-6.045-13.474-13.474v-15.888l15.324-12.094 c3.96-3.125,6.232-7.63,6.233-12.36c0-4.73-2.271-9.235-6.233-12.362l-15.324-12.094V271.165c0.001-0.099,0.001-0.198,0-0.296 v-11.556c0-7.43,6.044-13.474,13.474-13.474h16.274c0.055,0,0.11,0,0.164,0h46.784v19.714 c-13.353,3.573-23.217,15.778-23.217,30.242c0,17.26,14.042,31.302,31.301,31.302s31.301-14.042,31.301-31.302 c0-14.464-9.863-26.669-23.217-30.242v-19.714h99.912v19.714c-13.353,3.573-23.217,15.778-23.217,30.242 c0,17.26,14.042,31.302,31.301,31.302c17.259,0,31.301-14.042,31.301-31.302c0-14.464-9.863-26.669-23.217-30.242v-19.714h63.224 c7.43,0,13.474,6.045,13.474,13.474V471.579z"></path> <path d="M286.486,71.559l41.92,33.082c5.028,3.967,12.611,3.969,17.641-0.001c2.957-2.335,4.652-5.744,4.652-9.353V67.283h88.543 c19.316,0,35.032,15.715,35.032,35.033v97.013c0,4.466,3.62,8.084,8.084,8.084c4.465,0,8.084-3.618,8.084-8.084v-97.014 c0-28.232-22.969-51.201-51.2-51.201h-88.544V23.107c0-3.609-1.695-7.018-4.652-9.353c-0.001,0-0.002-0.001-0.003-0.002 c-5.026-3.964-12.608-3.966-17.637,0.001l-41.92,33.083c-3.961,3.126-6.234,7.631-6.234,12.361 C280.253,63.926,282.524,68.432,286.486,71.559z M334.53,29.519v59.359l-37.609-29.68L334.53,29.519z"></path> <path d="M160.915,93.376V72.751c0-4.466-3.62-8.084-8.084-8.084s-8.084,3.619-8.084,8.084v16.935 c-4.807-0.503-9.821-0.503-14.628,0V72.751c0-4.466-3.62-8.084-8.084-8.084c-4.465,0-8.084,3.619-8.084,8.084v20.625 c-26.902,9.658-46.195,35.422-46.195,65.607s19.293,55.949,46.195,65.607v20.625c0,4.466,3.62,8.084,8.084,8.084 c4.465,0,8.084-3.618,8.084-8.084v-16.935c4.807,0.503,9.821,0.503,14.628,0v16.935c0,4.466,3.62,8.084,8.084,8.084 s8.084-3.618,8.084-8.084v-20.625c26.902-9.658,46.195-35.422,46.195-65.607S187.817,103.034,160.915,93.376z M113.949,207.062 c-17.766-8.714-30.027-26.99-30.027-48.077c0-21.087,12.261-39.364,30.027-48.077V207.062z M144.746,211.996 c-4.783,0.656-9.847,0.656-14.628,0V105.971c4.783-0.656,9.847-0.656,14.628,0V211.996z M160.915,207.062v-96.156 c17.766,8.714,30.027,26.99,30.027,48.077S178.68,198.348,160.915,207.062z"></path> </g> </g> </g> </g></svg>
                                            @error('buy_price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </div>
                                    <div class="relative w-full">
                                        <input type="text"  wire:model.defer="stock" placeholder="تعداد"  class="input-field">
                                        <svg fill="#000000" class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" version="1.2" baseProfile="tiny" id="inventory" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 230" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M61.2,106h37.4v31.2H61.2V106z M61.2,178.7h37.4v-31.2H61.2V178.7z M61.2,220.1h37.4v-31.2H61.2V220.1z M109.7,178.7H147 v-31.2h-37.4V178.7z M109.7,220.1H147v-31.2h-37.4V220.1z M158.2,188.9v31.2h37.4v-31.2H158.2z M255,67.2L128.3,7.6L1.7,67.4 l7.9,16.5l16.1-7.7v144h18.2V75.6h169v144.8h18.2v-144l16.1,7.5L255,67.2z"></path> </g></svg>
                                        @error('stock') <span class="error text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row p-4 sm:mt-3 justify-between mt-3 gap-2 ">
                                    <a href="{{ url('/inventory') }}"
                                    class="w-full sm:w-full py-3 rounded-lg bg-red-800 text-white text-base font-semibold text-center hover:bg-red-700">
                                        برگشت
                                    </a>
                                <button type="submit"
                                    class="w-full sm:w-full py-3 rounded-lg bg-blue-800 text-white text-base font-semibold hover:bg-blue-700">
                                    ثبت
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid max-w-full mx-auto mt-4 gap-4">
            <div class=" ">
                <div class="border card rounded-xl shadow-xl shadow-[0px_4px_4px_0px_#00000040]">
                    <div class="bg-[#1E40AF]/5 rounded-xl p-4">
                        <div class="flex justify-between">
                            <h1 class="font-bold text-2xl">موجودی دوکان:</h1>
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
                    <div id="div1" class="bg-white rounded-2xl pb-3">
                        <div class="mx-2   mt-1">
                            <div class="hidden md:block  overflow-x-auto">
                                <table class="min-w-full ">
                                    <thead class="bg-[#1E40AF]  text-white">
                                        <tr>
                                            <th class="p-2 text-[12px] text-center">آیدی </th>
                                            <th class="p-2 text-[12px] text-center">نام دستگاه</th>
                                            <th class="p-2 text-[12px] text-center">حالت</th>
                                            <th class="p-2 text-[12px] text-center">کتگوری</th>
                                            <th class="p-2 text-[12px] text-center">تعداد </th>
                                            <th class="p-2 text-[12px] text-center"> ادمین</th>
                                            <th class="p-2 text-[12px] text-center"> قیمت خرید</th>
                                            <th class="p-2 text-[12px] text-center">چاپ</th>
                                            <th class="p-2 text-[12px] text-center">ادیت</th>
                                            <th class="p-2 text-[12px] text-center">حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($devices as $device)
                                        <tr class="border-b text-[11px] border-b-2 border-[#1E40AF]  cursor-pointer">
                                            <td class="px-4 py-2 font-bold text-center">  {{ $devices->firstItem() + $loop->index }}</td>
                                            <td class="px-4 py-2 text-center">{{ $device->model }}</td>
                                            <td class="px-4 py-2 text-center">{{ $device->status_fa }}</td>
                                            <td class="px-4 py-2 text-center">{{ $device->category_fa }}</td>
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
                                            <td class="px-4 py-2 text-center">
                                                <button  wire:click="confirmDelete({{ $device->id }})">
                                                    <i class="text-red-600 text-center flex justify-center text-lg cursor-pointer">
                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M18.8499 9.14014L18.1999 19.2101C18.0899 20.7801 17.9999 22.0001 15.2099 22.0001H8.7899C5.9999 22.0001 5.9099 20.7801 5.7999 19.2101L5.1499 9.14014" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10.3301 16.5H13.6601" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M9.5 12.5H14.5" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        </i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="11" class="px-4 py-2 text-center">
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
                                <div class="col-span-6 text-center justify-center grid grid-cols-2 my-3 md:my-0">
                                    <div class="text-center">
                                        <h1 class="text-[#00000080] block md:hidden">مدل دستگاه</h1>
                                        <p class="text-sm">{{ $device->model }}</p>
                                    </div>
                                    <div class="text-center ">
                                        <h1 class="text-[#00000080] block md:hidden">کتگوری</h1>
                                        <p class="text-sm">{{ $device->category_fa }}</p>
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
                                <div class=" grid grid-cols-3 my-5 md:my-0 px-16 md:px-0">
                                    <div  wire:click.stop="edit({{ $device->id }})"  class="mx-auto flex items-center text-[#1C274C] border border-[#1C274C] md:border-none rounded-lg px-2 py-1"  >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                        <p class="text-[#1C274C] block md:hidden">چاپ</p>
                                    </div>
                                    <div   wire:click.stop="edit({{ $device->id }})"  class="mx-auto flex items-center border text-[#0033BB]  border-[#0033BB] md:border-none rounded-lg px-2 py-1"  >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p class="text-[#0033BB] block md:hidden">ویرایش</p>
                                    </div>
                                </div>
                                <div  wire:click="confirmDelete({{ $device->id }})" class="mx-auto flex items-center text-[#FF0000] border border-[#FF0000] md:border-none rounded-lg px-2 py-1"  >
                                    <i class="text-red-600 text-center flex justify-center text-lg cursor-pointer">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.8499 9.14014L18.1999 19.2101C18.0899 20.7801 17.9999 22.0001 15.2099 22.0001H8.7899C5.9999 22.0001 5.9099 20.7801 5.7999 19.2101L5.1499 9.14014" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.3301 16.5H13.6601" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.5 12.5H14.5" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        </i>
                                        <p class="text-[#0033BB] block md:hidden">حذف</p>
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
    @if ($confirmingDelete)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-2xl shadow-xl w-[90%] max-w-sm p-6 animate-fade-in">
                <div class="flex flex-col items-center text-center gap-3">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                        <path d="M12 9V13" stroke="#FF0000" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 17H12.01" stroke="#FF0000" stroke-width="2" stroke-linecap="round"/>
                        <path d="M10.29 3.86L1.82 18A2 2 0 003.55 21H20.45A2 2 0 0022.18 18L13.71 3.86A2 2 0 0010.29 3.86Z"
                            stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h2 class="text-lg font-bold text-gray-800">
                        آیا مطمئن هستید؟
                    </h2>
                    <p class="text-sm text-gray-500">
                        این عملیات قابل برگشت نمی‌باشد.
                    </p>
                    <div class="flex gap-3 w-full mt-4">
                        <button
                            wire:click="$set('confirmingDelete', false)"
                            class="w-1/2 py-2 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100">
                            لغو
                        </button>
                        <button
                            wire:click="deleteConfirmed"
                            class="w-1/2 py-2 rounded-xl bg-red-600 text-white hover:bg-red-700">
                            بله، حذف کن
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
