<div>
    <div class="text-gray-800 flex max-w-full mx-auto items-center justify-center p-3 sm:p-4">
        <div class="shadow-[0px_4px_4px_0px_#00000040] border border-gray-300 w-full bg-white rounded-2xl shadow-xl  flex flex-col lg:flex-row">
            <div class="flex-1 lg:w-5/12 flex p-3 items-start justify-center sm:p-4">
                <div class="w-full max-w-full">
                    @if (session()->has('success'))
                        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h2 class="text-2xl text-center font-bold mb-2">اطلاعات فروش</h2>
                    <p class="text-gray-500 text-center text-[12px]">لطفا اطلاعات را دقیق وارد کنید.</p>
                    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        <div class="flex w-full mt-5">
                            <div class="w-1/2 flex flex-col items-center">
                                <div class="relative w-24 h-24">
                                    <label class="w-full h-full rounded-full border flex items-center justify-center cursor-pointer bg-blue-800 overflow-hidden relative text-white font-bold text-xl">
                                        <input type="file" wire:model="customer_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" />
                                        @if($customer_image)
                                            <img src="{{ $customer_image->temporaryUrl() }}">
                                        @elseif($customer_id)
                                            <img src="{{ Storage::url($customer->image_path) }}">
                                        @else
                                        <svg fill="#ffffff" height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M416,21.333h32v32C448,59.221,452.779,64,458.667,64s10.667-4.779,10.667-10.667V10.667 C469.333,4.779,464.555,0,458.667,0H416c-5.888,0-10.667,4.779-10.667,10.667S410.112,21.333,416,21.333z"></path> <path d="M53.333,64C59.221,64,64,59.221,64,53.333v-32h32c5.888,0,10.667-4.779,10.667-10.667S101.888,0,96,0H53.333 c-5.888,0-10.667,4.779-10.667,10.667v42.667C42.667,59.221,47.445,64,53.333,64z"></path> <path d="M416,362.667h42.667c5.888,0,10.667-4.779,10.667-10.667v-42.667c0-5.888-4.779-10.667-10.667-10.667 S448,303.445,448,309.333v32h-32c-5.888,0-10.667,4.779-10.667,10.667C405.333,357.888,410.112,362.667,416,362.667z"></path> <path d="M421.163,384.981l-81.728-20.416l-6.955-27.819c21.888-21.653,36.864-51.392,41.301-81.92 c12.117-3.392,21.504-13.824,23.125-26.837l5.333-42.667c1.131-9.003-1.643-18.091-7.595-24.939 c-3.499-4.032-7.936-7.061-12.821-8.917l1.963-40.171l7.979-7.979c12.032-12.779,21.995-34.709,1.152-66.475 C376.917,12.395,349.739,0,312.128,0c-14.827,0-49.024,0-80.875,21.376C140.352,23.275,128,65.472,128,106.667 c0,9.579,2.325,31.147,3.861,44.139c-5.483,1.749-10.453,4.928-14.336,9.323c-6.059,6.891-8.896,16.043-7.765,25.173 l5.333,42.667c1.728,13.888,12.309,24.832,25.643,27.435c4.437,29.312,18.624,58.112,39.232,79.403l-7.424,29.739L90.816,384.96 C37.333,398.336,0,446.187,0,501.333c0,2.837,1.109,5.568,3.115,7.552C5.12,510.869,7.829,512,10.667,512l490.667-0.043 c5.888,0,10.667-4.779,10.667-10.667C512,446.187,474.667,398.336,421.163,384.981z M21.888,490.624 C26.283,449.92,55.531,415.787,96,405.653l87.936-21.973c3.819-0.96,6.805-3.925,7.765-7.765l10.453-41.835 c0.939-3.733-0.235-7.701-3.072-10.347c-21.547-20.224-35.819-49.856-38.165-79.253c-0.427-5.547-5.056-9.813-10.624-9.813 h-3.456c-5.376,0-9.92-4.011-10.603-9.344l-5.333-42.645c-0.384-3.093,0.533-6.08,2.603-8.405 c2.048-2.325,4.864-3.605,7.979-3.605h2.219c3.072,0,5.995-1.323,8-3.584c2.027-2.325,2.965-5.355,2.581-8.405 c-1.365-10.923-4.949-41.579-4.949-52.011c0-33.28,6.549-63.211,85.44-64c2.176-0.021,4.309-0.704,6.101-1.984 c23.829-17.067,49.408-19.349,71.253-19.349c29.952,0,51.136,9.152,62.976,27.2c14.165,21.632,8.043,32.832,1.365,39.936 l-10.667,10.667c-1.877,1.877-2.987,4.373-3.115,7.019l-2.603,53.376c-0.149,2.901,0.896,5.696,2.88,7.829 c1.963,2.091,4.715,3.307,7.616,3.349c3.093,0.043,5.931,1.365,7.979,3.691c2.005,2.304,2.901,5.227,2.517,8.256l-5.333,42.667 c-0.661,5.333-5.205,9.344-11.627,9.344c-5.547,0-10.176,4.267-10.624,9.856c-2.411,30.315-17.344,60.523-39.979,80.811 c-2.923,2.624-4.181,6.677-3.221,10.517l10.027,40.085c0.96,3.819,3.925,6.805,7.765,7.765l87.936,21.973 c40.469,10.112,69.696,44.267,74.091,84.992L21.888,490.624z"></path> <path d="M53.333,362.667H96c5.888,0,10.667-4.779,10.667-10.667c0-5.888-4.779-10.667-10.667-10.667H64v-32 c0-5.888-4.779-10.667-10.667-10.667s-10.667,4.779-10.667,10.667V352C42.667,357.888,47.445,362.667,53.333,362.667z"></path> </g> </g> </g> </g></svg>
                                        @endif
                                    </label>
                                </div>
                                <p class="text-[12px] text-gray-500 text-center mt-2">
                                    برای آپلود عکس روی قسمت بالا کلیک کنید.
                                </p>
                                @error('customer_image')
                                    <span class="text-red-500 text-sm mt-1 text-center block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-1/2 flex flex-col items-center">
                                <div class="relative w-24 h-24">
                                    <label class="w-full h-full rounded-full border flex items-center justify-center cursor-pointer bg-blue-800 overflow-hidden relative text-white font-bold text-xl">
                                        <input type="file" wire:model="device_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" />
                                        @if($device_image)
                                            <img src="{{ $device_image->temporaryUrl() }}">
                                        {{-- @elseif($device_id)
                                            <img src="{{ Storage::url($device->image_path) }}"> --}}
                                        @else
                                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 15H4V6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V8" stroke="#fafafa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2 18H14" stroke="#fafafa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 9.2C14 8.53726 14.597 8 15.3333 8H20.6667C21.403 8 22 8.53726 22 9.2V18.8C22 19.4627 21.403 20 20.6667 20H15.3333C14.597 20 14 19.4627 14 18.8V9.2Z" stroke="#fafafa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 17H18.01" stroke="#fafafa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                        @endif
                                    </label>
                                </div>
                                <p class="text-[12px] text-gray-500 text-center mt-2">
                                    برای آپلود عکس روی قسمت بالا کلیک کنید.
                                </p>
                                @error('device_image')
                                    <span class="text-red-500 text-sm mt-1 text-center block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-3">
                            <div class="flex flex-col w-full">
                                <div class="relative w-full" wire:click.outside="$set('customersList', [])">
                                    <input
                                        type="text"
                                        placeholder="نام کامل مشتری"
                                        wire:model.debounce.300ms="searchName"
                                        autocomplete="off"
                                        class="input-field"
                                    >
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    @if(!empty($customersList))
                                        <div class="absolute z-50 bg-white border border-gray-300 w-full rounded-xl mt-1 shadow-lg max-h-60 overflow-y-auto">
                                            @foreach($customersList as $customer)
                                                <div
                                                    wire:click.prevent="selectCustomer({{ $customer->id }})"
                                                    class="px-4 py-3 hover:bg-blue-100 cursor-pointer text-sm flex justify-between items-center"
                                                >
                                                    <span>{{ $customer->fullname }}</span>
                                                    <span class="text-gray-400 text-xs">{{ $customer->phone }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                @error('name')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <select wire:model="category" class=" input-field  p-2.5">
                                        <option value="">کتگوری</option>
                                        <option value="mobile">موبایل</option>
                                        <option value="tablet">تبلت</option>
                                        <option value="laptob">لپتاب</option>
                                    </select>
                                </div>
                                @error('device_category')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="شماره" wire:model.lazy="customer_number" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.3082 15.2751C18.3082 15.5751 18.2415 15.8834 18.0998 16.1834C17.9582 16.4834 17.7748 16.7667 17.5332 17.0334C17.1248 17.4834 16.6748 17.8084 16.1665 18.0167C15.6665 18.2251 15.1248 18.3334 14.5415 18.3334C13.6915 18.3334 12.7832 18.1334 11.8248 17.7251C10.8665 17.3167 9.90817 16.7667 8.95817 16.0751C7.99984 15.3751 7.0915 14.6001 6.22484 13.7417C5.3665 12.8751 4.5915 11.9667 3.89984 11.0167C3.2165 10.0667 2.6665 9.11675 2.2665 8.17508C1.8665 7.22508 1.6665 6.31675 1.6665 5.45008C1.6665 4.88341 1.7665 4.34175 1.9665 3.84175C2.1665 3.33341 2.48317 2.86675 2.92484 2.45008C3.45817 1.92508 4.0415 1.66675 4.65817 1.66675C4.8915 1.66675 5.12484 1.71675 5.33317 1.81675C5.54984 1.91675 5.7415 2.06675 5.8915 2.28341L7.82484 5.00841C7.97484 5.21675 8.08317 5.40841 8.15817 5.59175C8.23317 5.76675 8.27484 5.94175 8.27484 6.10008C8.27484 6.30008 8.2165 6.50008 8.09984 6.69175C7.9915 6.88341 7.83317 7.08341 7.63317 7.28341L6.99984 7.94175C6.90817 8.03341 6.8665 8.14175 6.8665 8.27508C6.8665 8.34175 6.87484 8.40008 6.8915 8.46675C6.9165 8.53341 6.9415 8.58341 6.95817 8.63341C7.10817 8.90841 7.3665 9.26675 7.73317 9.70008C8.10817 10.1334 8.50817 10.5751 8.9415 11.0167C9.3915 11.4584 9.82484 11.8667 10.2665 12.2417C10.6998 12.6084 11.0582 12.8584 11.3415 13.0084C11.3832 13.0251 11.4332 13.0501 11.4915 13.0751C11.5582 13.1001 11.6248 13.1084 11.6998 13.1084C11.8415 13.1084 11.9498 13.0584 12.0415 12.9667L12.6748 12.3417C12.8832 12.1334 13.0832 11.9751 13.2748 11.8751C13.4665 11.7584 13.6582 11.7001 13.8665 11.7001C14.0248 11.7001 14.1915 11.7334 14.3748 11.8084C14.5582 11.8834 14.7498 11.9917 14.9582 12.1334L17.7165 14.0917C17.9332 14.2417 18.0832 14.4167 18.1748 14.6251C18.2582 14.8334 18.3082 15.0417 18.3082 15.2751Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10"/>
                                    </svg>
                                </div>
                                @error('customer_number')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="مدل دستگاه"wire:model.lazy="model" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 15H4V6C4 4.89543 4.89543 4 6 4H18C19.1046 4 20 4.89543 20 6V8" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M2 18H14" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 9.2C14 8.53726 14.597 8 15.3333 8H20.6667C21.403 8 22 8.53726 22 9.2V18.8C22 19.4627 21.403 20 20.6667 20H15.3333C14.597 20 14 19.4627 14 18.8V9.2Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 17H18.01" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </div>
                                @error('customer_number')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="آیدی تذکره" wire:model.lazy="id_card" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#292D32;} </style> <g> <path class="st0" d="M317.796,61.373c0-24.336-19.802-44.138-44.138-44.138h-35.311c-24.337,0-44.138,19.802-44.138,44.138v79.449 h123.587V61.373z M282.485,79.029c0,4.88-3.948,8.828-8.828,8.828h-35.311c-4.88,0-8.828-3.948-8.828-8.828V61.373 c0-4.879,3.948-8.828,8.828-8.828h35.311c4.879,0,8.828,3.949,8.828,8.828V79.029z"></path> <path class="st0" d="M491.965,124.003H335.451v16.776c0,9.801-7.94,17.655-17.655,17.655H194.209 c-9.707,0-17.656-7.854-17.656-17.655v-16.776H20.039C8.918,124.003,0,133.012,0,144.047v330.77 c0,11.035,8.918,19.949,20.039,19.949h471.926c11.034,0,20.035-8.914,20.035-19.949v-330.77 C512,133.012,502.999,124.003,491.965,124.003z M117.88,271.979c-1.238-8.431-2.94-25.095,1.465-33.458 c0,0-3.008-5.465-3.008-12.681c12.668,1.802,53.117-24.155,65.19-3.017c17.496-1.818,27.962,22.871,20.018,49.156 c0,0,9.81-0.457,5.888,13.284c-3.672,12.897-6.625,15.854-11.788,17.69c-2.216,12.534-5.936,23.604-10.837,29.052 c0,6.534,0,11.301,0,15.121c0,0.379,0.073,0.793,0.181,1.207l-17.164,8.25v12.129h-16.155v-12.129l-17.173-8.268 c0.108-0.413,0.181-0.81,0.181-1.189c0-3.82,0-8.586,0-15.121c-4.901-5.448-8.604-16.518-10.827-29.052 c-5.173-1.837-8.117-4.793-11.798-17.69C108.281,272.073,117.152,271.979,117.88,271.979z M159.751,431.971 c-57.957,0-97.794-7.509-98.414-14.759c-2.504-30.19,36.595-46.311,52.522-51.906c1.561-0.56,3.371-1.422,5.25-2.474l30.397,42.044 l2.164-27.544h16.155l2.164,27.544l30.388-42.044c1.828,0.999,3.612,1.853,5.259,2.474c15.81,5.906,55.026,21.69,52.513,51.906 C257.536,424.463,217.7,431.971,159.751,431.971z M372.317,411.851h-52.962v-17.655h52.962V411.851z M425.283,335.341H319.356 v-17.655h105.928V335.341z M425.283,258.832H319.356v-17.656h105.928V258.832z"></path> </g> </g></svg>
                                </div>
                                @error('id_card')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="رنگ" wire:model.lazy="color" class="input-field">
                                    <svg fill="#000" class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500"version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M288.846,236.944H185.779c-4.442,0-8.043,3.601-8.043,8.043s3.601,8.043,8.043,8.043h76.853 c-5.931,9.105-9.523,21.398-9.523,35.121c0,13.724,3.591,26.015,9.522,35.12H115.642c-10.473,0-19.659-16.411-19.659-35.12 c0-18.709,9.186-35.121,19.659-35.121h43.327c4.442,0,8.043-3.601,8.043-8.043s-3.601-8.043-8.043-8.043h-43.327 c-20.043,0-35.745,22.493-35.745,51.207c0,28.715,15.701,51.206,35.745,51.206h165.164v3.013c0,6.517-5.302,11.819-11.819,11.819 h-58.839c-15.387,0-27.905,12.518-27.905,27.905v13.324h-7.418h-13.247c-4.442,0-8.043,3.601-8.043,8.043s3.601,8.043,8.043,8.043 h5.204v92.452c0,4.442,3.601,8.043,8.043,8.043h34.787c4.442,0,8.043-3.601,8.043-8.043v-92.452h5.204 c4.442,0,8.043-3.601,8.043-8.043s-3.601-8.043-8.043-8.043h-13.247h-11.283v-13.324c0-6.517,5.302-11.819,11.819-11.819h58.839 c15.387,0,27.905-12.518,27.905-27.905v-4.28c16.042-5.1,27.698-25.204,27.698-49.94 C324.59,259.437,308.889,236.944,288.846,236.944z M201.569,411.505v84.409h-18.701v-84.409H201.569z M296.892,319.95v-31.799 c0-4.442-3.601-8.043-8.043-8.043s-8.043,3.601-8.043,8.043v31.802c-6.715-5.718-11.611-18.143-11.611-31.801 c0-18.709,9.183-35.121,19.651-35.121c10.473,0,19.659,16.412,19.659,35.121C308.504,301.807,303.608,314.23,296.892,319.95z"></path> </g> </g> <g> <g> <path d="M316.55,143.005c-4.442,0-8.043,3.601-8.043,8.043v79.464c0,4.442,3.601,8.043,8.043,8.043s8.043-3.601,8.043-8.043 v-79.464C324.593,146.606,320.992,143.005,316.55,143.005z"></path> </g> </g> <g> <g> <path d="M299.23,49.142c-5.115,0-9.277-4.162-9.277-9.277V25.363C289.952,11.378,278.575,0,264.59,0 c-13.986,0-25.363,11.378-25.363,25.363v39.325c0,5.115-4.162,9.277-9.277,9.277s-9.277-4.162-9.277-9.277V47.884 c0-13.985-11.378-25.363-25.363-25.363c-13.986,0-25.363,11.378-25.363,25.363v15.375c0,5.115-4.162,9.277-9.277,9.277 c-13.985,0-25.363,11.378-25.363,25.363v124.568c0,4.442,3.601,8.043,8.043,8.043s8.043-3.601,8.043-8.043V97.9 c0-5.116,4.162-9.277,9.277-9.277c13.985,0,25.363-11.378,25.363-25.363V47.884c0-5.115,4.162-9.277,9.277-9.277 s9.277,4.162,9.277,9.277v16.805c0,13.985,11.378,25.363,25.363,25.363s25.363-11.378,25.363-25.363V25.363 c0-5.115,4.162-9.277,9.277-9.277s9.277,4.162,9.277,9.277v14.501c0,13.985,11.378,25.363,25.363,25.363 c5.115,0,9.277,4.162,9.277,9.277v49.733c0,4.442,3.601,8.043,8.043,8.043s8.043-3.601,8.043-8.043V74.505 C324.593,60.52,313.215,49.142,299.23,49.142z"></path> </g> </g> <g> <g> <path d="M287.501,106.186h-55.252c-4.442,0-8.043,3.601-8.043,8.043s3.601,8.043,8.043,8.043h55.252 c4.442,0,8.043-3.601,8.043-8.043S291.943,106.186,287.501,106.186z"></path> </g> </g> <g> <g> <path d="M205.439,106.186h-33.043c-4.442,0-8.043,3.601-8.043,8.043s3.601,8.043,8.043,8.043h33.043 c4.442,0,8.043-3.601,8.043-8.043S209.881,106.186,205.439,106.186z"></path> </g> </g> <g> <g> <path d="M287.501,138.876H172.396c-4.442,0-8.043,3.601-8.043,8.043s3.601,8.043,8.043,8.043h115.104 c4.442,0,8.043-3.601,8.043-8.043S291.943,138.876,287.501,138.876z"></path> </g> </g> <g> <g> <path d="M287.501,171.565h-10.211c-4.442,0-8.043,3.601-8.043,8.043s3.601,8.043,8.043,8.043h10.211 c4.442,0,8.043-3.601,8.043-8.043S291.943,171.565,287.501,171.565z"></path> </g> </g> <g> <g> <path d="M250.48,171.565h-78.084c-4.442,0-8.043,3.601-8.043,8.043s3.601,8.043,8.043,8.043h78.084 c4.442,0,8.043-3.601,8.043-8.043S254.922,171.565,250.48,171.565z"></path> </g> </g> <g> <g> <path d="M287.501,204.255H172.396c-4.442,0-8.043,3.601-8.043,8.043s3.601,8.043,8.043,8.043h115.104 c4.442,0,8.043-3.601,8.043-8.043S291.943,204.255,287.501,204.255z"></path> </g> </g> <g> <g> <path d="M424.061,46.846h-70.779c-4.442,0-8.043,3.601-8.043,8.043v334.59c0,4.442,3.601,8.043,8.043,8.043h70.779 c4.442,0,8.043-3.601,8.043-8.043V54.889C432.104,50.447,428.503,46.846,424.061,46.846z M416.018,381.436h-54.693v-17.159h23.206 c4.442,0,8.043-3.601,8.043-8.043s-3.601-8.043-8.043-8.043h-23.206v-17.292h23.206c4.442,0,8.043-3.601,8.043-8.043 s-3.601-8.043-8.043-8.043h-23.206V297.52h23.206c4.442,0,8.043-3.601,8.043-8.043s-3.601-8.043-8.043-8.043h-23.206v-17.292 h23.206c4.442,0,8.043-3.601,8.043-8.043s-3.601-8.043-8.043-8.043h-23.206v-17.293h23.206c4.442,0,8.043-3.601,8.043-8.043 s-3.601-8.043-8.043-8.043h-23.206v-17.292h23.206c4.442,0,8.043-3.601,8.043-8.043s-3.601-8.043-8.043-8.043h-23.206v-17.293 h23.206c4.442,0,8.043-3.601,8.043-8.043s-3.601-8.043-8.043-8.043h-23.206v-17.293h23.206c4.442,0,8.043-3.601,8.043-8.043 s-3.601-8.043-8.043-8.043h-23.206V97.249h23.206c4.442,0,8.043-3.601,8.043-8.043s-3.601-8.043-8.043-8.043h-23.206V62.932 h54.693V381.436z"></path> </g> </g> </g></svg>
                                </div>
                                @error('customer_number')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="آدرس" wire:model.lazy="address" class="input-field">
                                    <svg  class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.6665 18.3333H18.3332" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.4585 18.3334L2.50017 8.30836C2.50017 7.80003 2.74183 7.31674 3.14183 7.00008L8.97516 2.4584C9.57516 1.99173 10.4168 1.99173 11.0252 2.4584L16.8585 6.99173C17.2668 7.3084 17.5002 7.7917 17.5002 8.30836V18.3334" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M12.9168 9.16675H7.0835C6.39183 9.16675 5.8335 9.72508 5.8335 10.4167V18.3334H14.1668V10.4167C14.1668 9.72508 13.6085 9.16675 12.9168 9.16675Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.3335 13.5417V14.7917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.75 6.25H11.25" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                @error('address')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder=" مبلغ" wire:model.lazy="price" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="layer1"> <path d="M 12.964844 0.095703125 C 12.805889 0.093483625 12.654204 0.10575226 12.503906 0.12890625 C 11.902715 0.22152215 11.399294 0.43880053 10.416016 0.60742188 C 9.5128573 0.76230303 8.9000581 0.53804687 8.1347656 0.34375 C 7.3694731 0.14945313 6.4403485 0.025497315 5.2929688 0.54492188 C 5.0125471 0.67254789 4.9131349 1.0209548 5.0839844 1.2773438 L 6.8574219 3.9355469 C 6.4799034 4.2948616 5.386098 5.3589005 4.0996094 7.0742188 C 2.5695621 9.1142816 1 11.799685 1 14.5 C 1 17.150236 2.3087845 18.664286 4.0703125 19.341797 C 5.8318405 20.019308 8 20 10 20 C 12 20 14.168159 20.01931 15.929688 19.341797 C 17.691216 18.664286 19 17.150236 19 14.5 C 19 11.799685 17.430438 9.1142814 15.900391 7.0742188 C 14.613901 5.3589005 13.520096 4.2948616 13.142578 3.9355469 L 14.916016 1.2773438 C 15.088927 1.0174273 14.984039 0.66436818 14.697266 0.54101562 C 13.978672 0.23310127 13.441708 0.10236154 12.964844 0.095703125 z M 12.65625 1.1171875 C 12.922777 1.0761275 13.330981 1.236312 13.679688 1.3300781 L 12.232422 3.5 L 7.7675781 3.5 L 6.3046875 1.3046875 C 6.8796693 1.1670037 7.3639663 1.1812379 7.8886719 1.3144531 C 8.5922201 1.493074 9.440416 1.7898596 10.583984 1.59375 C 11.647433 1.4113805 12.227503 1.1832377 12.65625 1.1171875 z M 7.7070312 4.5 L 12.292969 4.5 C 12.480348 4.6748327 13.734431 5.8555424 15.099609 7.6757812 C 16.569562 9.6357185 18 12.200315 18 14.5 C 18 16.849764 17.058785 17.835714 15.570312 18.408203 C 14.081843 18.980692 12 19 10 19 C 8 19 5.9181595 18.980692 4.4296875 18.408203 C 2.9412155 17.835714 2 16.849764 2 14.5 C 2 12.200315 3.4304379 9.6357186 4.9003906 7.6757812 C 6.2655702 5.855542 7.5196519 4.6748327 7.7070312 4.5 z M 9.5 9 L 9.5 10 C 8.6774954 10 8 10.677495 8 11.5 C 8 12.322505 8.6774954 13 9.5 13 L 10.5 13 C 10.782065 13 11 13.217935 11 13.5 C 11 13.782065 10.782065 14 10.5 14 L 9.5 14 L 8 14 L 8 15 L 9.5 15 L 9.5 16 L 10.5 16 L 10.5 15 C 11.322504 15 12 14.322505 12 13.5 C 12 12.677495 11.322504 12 10.5 12 L 9.5 12 C 9.2179352 12 9 11.782065 9 11.5 C 9 11.217935 9.2179352 11 9.5 11 L 10.5 11 L 12 11 L 12 10 L 10.5 10 L 10.5 9 L 9.5 9 z " style="fill:#222222; fill-opacity:1; stroke:none; stroke-width:0px;"></path> </g> </g></svg>
                                </div>
                                @error('cost')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="md:col-span-2 flex flex-col md:flex-row gap-2">
                            <button wire:click="resetForm" type="button" class="w-full bg-red-800 hover:bg-red-700 md:w-auto flex-1 text-white font-semibold py-3 rounded-md transition">لغو</button>
                            <button type="submit" class="w-full bg-blue-800 hover:bg-blue-700 md:w-auto flex-1 text-white font-semibold py-3 rounded-md transition">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
