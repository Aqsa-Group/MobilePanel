<div class="w-full p-4 max-w-full mx-auto">
    <div class="rounded-lg shadow-xl w-full shadow-[0px_4px_4px_0px_#00000040] bg-white border  border-gray-300 px-2 py-4">
        <h2 class="text-2xl text-center font-bold mb-2">اطلاعات کارمند </h2>
        <p class="text-gray-500 text-center text-[12px]">شما می‌توانید کارمند جدید ثبت کنید.</p>
        <form  wire:submit.prevent="{{ $editMode ? 'update' : 'save' }}"  wire:key="{{ $formKey }}"    enctype="multipart/form-data" class=" mt-3 ">
            <div class="flex flex-col">
                <div class="relative mx-auto w-24 h-24">
                    <div id="profileWrapper" onclick="document.getElementById('profile_image').click()"
                        class="w-full h-full rounded-full border flex items-center justify-center cursor-pointer bg-blue-800 overflow-hidden relative text-white font-bold text-xl">
                        @if ($imagePreview)
                            <img src="{{ $imagePreview }}" class="w-full h-full object-cover">
                        @elseif($name)
                            @php
                                $parts = preg_split('/\s+/', trim($name));
                                $initials = mb_substr($parts[0],0,1) . (isset($parts[1]) ? mb_substr($parts[1],0,1) : '');
                            @endphp
                            <span>{{ mb_strtoupper($initials) }}</span>
                        @else
                            <svg height="48px" width="48px" viewBox="0 0 487.678 487.678" fill="#fafafa">
                                <path d="M377.996,282.347c-56.201-18.357-79.563-41.185-79.563-41.185l-1.881,1.793c-16.69,15.709-35.149,24.944-51.965,24.944H243c-16.815,0-35.274-9.235-51.964-24.944l-1.882-1.793s-23.36,22.827-79.562,41.185c-82.964,30.992-58.053,157.119-58.077,158.096c2.613,14.047,4.136,18.875,5.463,19.417c83.314,37.091,290.319,37.091,373.634,0c1.327-0.542,2.85-5.37,5.463-19.417C436.051,439.466,461.295,313.84,377.996,282.347z"/>
                                <path d="M330.924,121.441l-0.696-0.755c-4.668-4.274-4.303-4.029-4.303-4.029s8.142-41.083,1.613-60.511c-10.25-31.027-71.475-51.822-83.755-54.239c0.002-0.023-7.469-1.518-7.946-1.521c0,0-9.659-1.953-20.854,2.93c-7.291,2.805-45.408,20.09-56.227,52.83c-6.528,19.428,1.614,60.511,1.614,60.511s0.365-0.245-4.304,4.029l-0.695,0.755c-3.158,3.586-2.378,14.806,1.074,26.479c3.128,11.695,7.205,14.838,8.182,17.577c9.903,46.497,44.338,86.197,79.429,86.197s67.707-39.7,77.61-86.197c0.978-2.738,5.055-5.882,8.183-17.577C333.301,136.246,334.172,124.256,330.924,121.441z"/>
                            </svg>
                        @endif
                    </div>
                    <input type="file" wire:model="image" id="profile_image" class="hidden" accept="image/*">
                </div>
                <p class="text-[12px] text-gray-500 text-center">
                    برای آپلود عکس روی قسمت بالا کلید کنید.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col  ">
                    <div class="relative  w-full">
                        <input type="text" placeholder="نام کامل" wire:model="name" class="input-field">
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
                    <div class="relative  w-full">
                        <input type="text" placeholder="آیدی تذکره" wire:model="nid" class="input-field">
                        <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#292D32;} </style> <g> <path class="st0" d="M317.796,61.373c0-24.336-19.802-44.138-44.138-44.138h-35.311c-24.337,0-44.138,19.802-44.138,44.138v79.449 h123.587V61.373z M282.485,79.029c0,4.88-3.948,8.828-8.828,8.828h-35.311c-4.88,0-8.828-3.948-8.828-8.828V61.373 c0-4.879,3.948-8.828,8.828-8.828h35.311c4.879,0,8.828,3.949,8.828,8.828V79.029z"></path> <path class="st0" d="M491.965,124.003H335.451v16.776c0,9.801-7.94,17.655-17.655,17.655H194.209 c-9.707,0-17.656-7.854-17.656-17.655v-16.776H20.039C8.918,124.003,0,133.012,0,144.047v330.77 c0,11.035,8.918,19.949,20.039,19.949h471.926c11.034,0,20.035-8.914,20.035-19.949v-330.77 C512,133.012,502.999,124.003,491.965,124.003z M117.88,271.979c-1.238-8.431-2.94-25.095,1.465-33.458 c0,0-3.008-5.465-3.008-12.681c12.668,1.802,53.117-24.155,65.19-3.017c17.496-1.818,27.962,22.871,20.018,49.156 c0,0,9.81-0.457,5.888,13.284c-3.672,12.897-6.625,15.854-11.788,17.69c-2.216,12.534-5.936,23.604-10.837,29.052 c0,6.534,0,11.301,0,15.121c0,0.379,0.073,0.793,0.181,1.207l-17.164,8.25v12.129h-16.155v-12.129l-17.173-8.268 c0.108-0.413,0.181-0.81,0.181-1.189c0-3.82,0-8.586,0-15.121c-4.901-5.448-8.604-16.518-10.827-29.052 c-5.173-1.837-8.117-4.793-11.798-17.69C108.281,272.073,117.152,271.979,117.88,271.979z M159.751,431.971 c-57.957,0-97.794-7.509-98.414-14.759c-2.504-30.19,36.595-46.311,52.522-51.906c1.561-0.56,3.371-1.422,5.25-2.474l30.397,42.044 l2.164-27.544h16.155l2.164,27.544l30.388-42.044c1.828,0.999,3.612,1.853,5.259,2.474c15.81,5.906,55.026,21.69,52.513,51.906 C257.536,424.463,217.7,431.971,159.751,431.971z M372.317,411.851h-52.962v-17.655h52.962V411.851z M425.283,335.341H319.356 v-17.655h105.928V335.341z M425.283,258.832H319.356v-17.656h105.928V258.832z"></path> </g> </g></svg>
                    </div>
                    @error('nid')
                        <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col ">
                    <div class="relative w-full">
                        <input type="tel" placeholder="شماره" wire:model="number" class="input-field">
                        <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.3082 15.2751C18.3082 15.5751 18.2415 15.8834 18.0998 16.1834C17.9582 16.4834 17.7748 16.7667 17.5332 17.0334C17.1248 17.4834 16.6748 17.8084 16.1665 18.0167C15.6665 18.2251 15.1248 18.3334 14.5415 18.3334C13.6915 18.3334 12.7832 18.1334 11.8248 17.7251C10.8665 17.3167 9.90817 16.7667 8.95817 16.0751C7.99984 15.3751 7.0915 14.6001 6.22484 13.7417C5.3665 12.8751 4.5915 11.9667 3.89984 11.0167C3.2165 10.0667 2.6665 9.11675 2.2665 8.17508C1.8665 7.22508 1.6665 6.31675 1.6665 5.45008C1.6665 4.88341 1.7665 4.34175 1.9665 3.84175C2.1665 3.33341 2.48317 2.86675 2.92484 2.45008C3.45817 1.92508 4.0415 1.66675 4.65817 1.66675C4.8915 1.66675 5.12484 1.71675 5.33317 1.81675C5.54984 1.91675 5.7415 2.06675 5.8915 2.28341L7.82484 5.00841C7.97484 5.21675 8.08317 5.40841 8.15817 5.59175C8.23317 5.76675 8.27484 5.94175 8.27484 6.10008C8.27484 6.30008 8.2165 6.50008 8.09984 6.69175C7.9915 6.88341 7.83317 7.08341 7.63317 7.28341L6.99984 7.94175C6.90817 8.03341 6.8665 8.14175 6.8665 8.27508C6.8665 8.34175 6.87484 8.40008 6.8915 8.46675C6.9165 8.53341 6.9415 8.58341 6.95817 8.63341C7.10817 8.90841 7.3665 9.26675 7.73317 9.70008C8.10817 10.1334 8.50817 10.5751 8.9415 11.0167C9.3915 11.4584 9.82484 11.8667 10.2665 12.2417C10.6998 12.6084 11.0582 12.8584 11.3415 13.0084C11.3832 13.0251 11.4332 13.0501 11.4915 13.0751C11.5582 13.1001 11.6248 13.1084 11.6998 13.1084C11.8415 13.1084 11.9498 13.0584 12.0415 12.9667L12.6748 12.3417C12.8832 12.1334 13.0832 11.9751 13.2748 11.8751C13.4665 11.7584 13.6582 11.7001 13.8665 11.7001C14.0248 11.7001 14.1915 11.7334 14.3748 11.8084C14.5582 11.8834 14.7498 11.9917 14.9582 12.1334L17.7165 14.0917C17.9332 14.2417 18.0832 14.4167 18.1748 14.6251C18.2582 14.8334 18.3082 15.0417 18.3082 15.2751Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10"/>
                        </svg>
                    </div>
                    @error('number')
                        <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col ">
                    <div class="relative w-full">
                        <input type="text" placeholder="آدرس" wire:model="address" class="input-field">
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
                        <input type="text" placeholder="معاش" wire:model="salary" class="input-field">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" w-6 h-6 absolute left-2 top-1/2  -translate-y-1/2 text-gray-900" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M19.745 13a7 7 0 1 0-12.072-1"/><path d="M16 6.373c-.156-.828-1.114-1.607-2.407-1.307c-1.355.314-1.969 1.907-1.355 2.902c.637 1.032.942 2.032.111 3.447c-.161.275-.242.413-.198.5c.045.085.188.085.473.085H16m-5-3h4M3 14h2.395c.294 0 .584.066.847.194l2.042.988c.263.127.553.193.848.193h1.042c1.008 0 1.826.791 1.826 1.767c0 .04-.027.074-.066.085l-2.541.703a1.95 1.95 0 0 1-1.368-.124L5.842 16.75M12 16.5l4.593-1.411a1.985 1.985 0 0 1 2.204.753c.369.51.219 1.242-.319 1.552l-7.515 4.337a2 2 0 0 1-1.568.187L3 20.02"/></g></svg>
                    </div>
                    @error('salary')
                        <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative" >
                    <select name="" id="" wire:model="job" class="w-full text-gray-600 input-field">
                        <option value="">انتخاب شغل</option>
                        <option value="seller">فروشنده</option>
                        <option value="fixer">تعمیر کار</option>
                    </select>
                </div>
                <div class="md:col-span-2 flex flex-col md:flex-row gap-2">
                    <button  wire:click="resetForm" type="button" class="w-full bg-red-800 hover:bg-red-700 md:w-auto flex-1 text-white font-semibold py-3 rounded-md transition">
                        لغو
                    </button>
                    <button {{ $editMode ? 'bg-green-600' : 'bg-blue-600' }}  type="submit" class="w-full bg-blue-800 hover:bg-blue-700 md:w-auto flex-1  text-white font-semibold py-3 rounded-md transition">
                    {{ $editMode ? 'بروزرسانی' : 'ثبت کارمند' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="grid grid-cols-1 w-full lg:grid-cols-2 gap-3 pt-2">
        <div class="lg:col-span-2 border  border-gray-300 bg-white rounded-lg shadow-[0px_4px_4px_0px_#00000040] shadow-xl  w-full lg:max-w-full p-3">
            <div class="flex flex-col md:flex-row justify-between items-center w-full mt-1 gap-1 md:gap-2">
                <div class="flex gap-2 w-full ">
                    <div class="relative   w-full  md:w-1/4  ">
                        <input type="text"  wire:model.live="search" class="w-full h-full block rounded-md md:rounded-lg bg-[#1E40AF]/20  md:top-0 md:right-0 pr-2 text-[7px] sm:p-4  p-4  md:text-[10px]" placeholder="جستجو">
                        <span class="absolute md:hidden left-1  top-3">
                            <svg  width="14" height="14" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.899 14.9749C8.8537 14.9749 6.38498 12.5062 6.38498 9.46083C6.38498 6.4155 8.8537 3.94678 11.899 3.94678C14.9444 3.94678 17.4131 6.4155 17.4131 9.46083C17.4131 12.5062 14.9444 14.9749 11.899 14.9749Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M5.80448 15.5554L6.96533 14.3945" stroke="#292D32" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="hidden md:block absolute left-2 top-4">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.899 14.9749C8.8537 14.9749 6.38498 12.5062 6.38498 9.46083C6.38498 6.4155 8.8537 3.94678 11.899 3.94678C14.9444 3.94678 17.4131 6.4155 17.4131 9.46083C17.4131 12.5062 14.9444 14.9749 11.899 14.9749Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M5.80448 15.5554L6.96533 14.3945" stroke="#292D32" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="hidden mt-2 lg:block overflow-x-auto ">
                <table class="w-full text-center  text-sm border-collapse">
                    <thead class="bg-blue-800 text-white  border-b-2 border-blue-800 text-center">
                        <tr>
                            <th class="p-2 text-[12px]">آیدی</th>
                            <th class="p-2 text-[12px]">عکس</th>
                            <th class="p-2 text-[12px]">نام کارمند</th>
                            <th class="p-2 text-[12px]"> ادمین</th>
                            <th class="p-2 text-[12px]">آیدی تذکره</th>
                            <th class="p-2 text-[12px]"> شماره</th>
                            <th class="p-2 text-[12px]"> آدرس</th>
                            <th class="p-2 text-[12px]"> معاش</th>
                            <th class="p-2 text-[12px]"> شغل</th>
                            <th class="p-2 text-[12px]">چاپ</th>
                            <th class="p-2 text-[12px]">ویرایش</th>
                            <th class="p-2 text-[12px]">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $index => $employee)
                        <tr class=" text-[10px] border-b-2 border-blue-800">
                            <td class="p-2 font-bold">{{ $index + 1 }}</td>
                            <td class="p-2 text-center">
                                @if(!empty($employee->image))
                                    <img src="{{ asset('storage/'.$employee->image) }}" class="w-10 h-10 rounded-full mx-auto object-cover" alt="عکس کارمند">
                                @elseif(!empty($employee->name))
                                    @php
                                        $parts = preg_split('/\s+/', trim($employee->name));
                                        $initials = mb_substr($parts[0], 0, 1) . (isset($parts[1]) ? mb_substr($parts[1], 0, 1) : '');
                                    @endphp
                                    <div class="w-10 h-10 rounded-full mx-auto bg-blue-800 text-white flex items-center justify-center font-bold">
                                        {{ mb_strtoupper($initials) }}
                                    </div>
                                @else
                                    <img src="{{ asset('default.png') }}" class="w-10 h-10 rounded-full mx-auto object-cover" alt="عکس کارمند">
                                @endif
                            </td>
                            <td class="p-2">{{ $employee->name }}</td>
                            <td class="text-center">
                                @if($employee->admin)
                                    {{ $employee->admin->name }} ({{ $employee->admin->rule }})
                                @else
                                    --
                                @endif
                            </td>
                            <td class="p-2">{{ $employee->nid }}</td>
                            <td class="p-2">{{ $employee->number }}</td>
                            <td class="p-2">{{ $employee->address }}</td>
                            <td class="p-2">
                                {{ is_numeric($employee->salary) ? number_format((float)$employee->salary) : '0' }}؋
                            </td>
                            <td class="p-2">{{ $employee->job_fa }}</td>
                            <td class="p-2">
                                <button wire:click="goToEdit({{ $employee->id }})" >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                </button>
                            </td>
                            <td class="p-2">
                                <button wire:click="edit({{ $employee->id }})" >
                                    <i class="text-blue-600 text-center flex justify-center text-lg cursor-pointer">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"
                                                stroke="#1E40AF" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.0399 3.01976L8.15988 10.8998C7.85988 11.1998 7.55988 11.7898
                                                    7.49988 12.2198L7.06988 15.2298C6.90988 16.3198 7.67988 17.0798
                                                    8.76988 16.9298L11.7799 16.4998C12.1999 16.4398 12.7899 16.1398
                                                    13.0999 15.8398L20.9799 7.95976C22.3399 6.59976 22.9799 5.01976
                                                    20.9799 3.01976C18.9799 1.01976 17.3999 1.65976 16.0399 3.01976Z"
                                                stroke="#1E40AF" stroke-width="1.5"
                                                stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14.9102 4.1499C15.5802 6.5399 17.4502 8.4099
                                                    19.8502 9.0899"
                                                stroke="#1E40AF" stroke-width="1.5"
                                                stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </i>
                                </button>
                            </td>
                            <td class="p-2">
                                <button wire:click="confirmDelete({{ $employee->id }})">
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
                                <td colspan="12" class="p-4 text-center text-gray-400">
                                    هیچ کارمندی ثبت نشده
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="flex flex-wrap gap-1 justify-center sm:justify-start items-center mt-3 text-[10px]">
                    @if ($employees->lastPage() > 1)
                    <button
                        wire:click="previousPage"
                        @disabled($employees->onFirstPage())
                        class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                        قبلی
                    </button>
                    <span class="mx-2 text-sm font-medium">
                        {{ $employees->currentPage() }} از {{ $employees->lastPage() }}
                    </span>
                    <button
                        wire:click="nextPage"
                        @disabled($employees->onLastPage())
                        class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                        بعدی
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 w-full lg:grid-cols-2 gap-3 pt-2 mt-4">
        @forelse($employees as $index => $employee)
            <div class=" rounded-2xl shadow-xl sm:hidden block p-3">
                <div>
                    @if($employee->image)
                        <img wire:model="image" src="{{ asset('storage/'.$employee->image) }}" class="w-20 h-20 rounded-full mx-auto object-cover block" alt="عکس کارمند">
                    @elseif(!empty($employee->name))
                        @php
                            $parts = preg_split('/\s+/', trim($employee->name));
                            $initials = mb_substr($parts[0], 0, 1) . (isset($parts[1]) ? mb_substr($parts[1], 0, 1) : '');
                        @endphp
                        <div class="w-20 h-20 rounded-full mx-auto bg-blue-800 text-white flex items-center justify-center font-bold text-xl">
                            {{ mb_strtoupper($initials) }}
                        </div>
                    @else
                        <img wire:model="image" src="https://via.placeholder.com/50" class="w-20 h-20 rounded-full mx-auto object-cover block" alt="عکس کارمند">
                    @endif
                </div>
                <div class="grid grid-cols-2 mx-auto gap-5 text-sm ">
                    <div class="flex flex-col items-center">
                        <div class="text-gray-600 text-xs font-semibold mb-1">نام</div>
                        <div class="text-gray-900 font-bold">{{ $employee->name }}</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-gray-600 text-xs font-semibold mb-1">آیدی</div>
                        <div class="text-gray-900 font-bold">{{ $employee->nid }}</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-gray-600 text-xs font-semibold mb-1">شماره</div>
                        <div class="text-gray-900 font-bold">{{ $employee->number }}</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-gray-600 text-xs font-semibold mb-1">آدرس</div>
                        <div class="text-gray-900 font-bold">{{ $employee->address }}</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-gray-600 text-xs font-semibold mb-1">ادمین</div>
                        <div class="text-gray-900 font-bold"> @if($employee->admin)   {{ $employee->admin->name }} ({{ $employee->admin->rule }})   @else     --  @endif</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-gray-600 text-xs font-semibold mb-1">معاش</div>
                        <div class="text-gray-900 font-bold">{{ $employee->salary }}</div>
                    </div>
                    <div class="flex flex-col w-full text-center items-center  col-span-2">
                        <div class="text-gray-600 text-center text-xs font-semibold mb-1">شغل</div>
                        <div class="text-gray-900 font-bold">{{ $employee->job_fa }}</div>
                    </div>
                </div>
                <div class="flex justify-center items-center gap-2 mt-3">
                    <div class="flex  gap-3 mt-5">
                        <a wire:click="goToEdit({{ $employee->id }})" class="flex items-center gap-1  border border-2 border-gray-600 py-2 px-3 rounded-lg text-xs">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                            چاپ
                        </a>
                        <a wire:click="edit({{ $employee->id }})"   class="flex items-center gap-1 border-[#1E40AF] border border-2 py-2 px-3 rounded-lg text-xs">
                            <i class="bi bi-pencil-square">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"
                                        stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M16.0399 3.02025L8.15988 10.9003C7.85988 11.2003 7.55988 11.7903
                                            7.49988 12.2203L7.06988 15.2303C6.90988 16.3203 7.67988 17.0803
                                            8.76988 16.9303L11.7799 16.5003C12.1999 16.4403 12.7899 16.1403
                                            13.0999 15.8403L20.9799 7.96025C22.3399 6.60025 22.9799 5.02025
                                            20.9799 3.02025C18.9799 1.02025 17.3999 1.66025 16.0399 3.02025Z"
                                        stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.9102 4.15039C15.5802 6.54039 17.4502 8.41039
                                            19.8502 9.09039"
                                        stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </i>
                            ویرایش
                        </a>
                        <button wire:click="confirmDelete({{ $employee->id }})" class="flex items-center gap-1  border-red-600 border border-2   py-2 px-3 rounded-lg text-xs">
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
            @empty
            <div class="flex sm:hidden justify-center gap-3 mt-5">
                    هیچ کارمندی ثبت نشده
            </div>
        @endforelse
        <div class="flex flex-wrap gap-1 justify-center sm:hidden items-center mt-3 text-[10px]">
            @if ($employees->lastPage() > 1)
            <button
                wire:click="previousPage"
                @disabled($employees->onFirstPage())
                class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                قبلی
            </button>
            <span class="mx-2 text-sm font-medium">
                {{ $employees->currentPage() }} از {{ $employees->lastPage() }}
            </span>
            <button
                wire:click="nextPage"
                @disabled($employees->onLastPage())
                class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                بعدی
            </button>
            @endif
        </div>
    </div>
    @push('scripts')
    <script>
    window.addEventListener('scroll-to-form', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    </script>
    @endpush
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
    <script>
        window.addEventListener('reset-file-input', () => {
            const fileInput = document.getElementById('imageUpload');
            if (fileInput) {
                fileInput.value = '';
            }
        });
    </script>
</div>
