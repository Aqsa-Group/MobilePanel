<div>
    <div class="text-gray-800 flex max-w-full mx-auto items-center justify-center p-3 sm:p-4">
        <div class="shadow-[0px_4px_4px_0px_#00000040] border border-gray-300 w-full bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col lg:flex-row">
            <div class="flex-1 lg:w-5/12 flex p-3 items-start justify-center sm:p-4">
                <div class="w-full max-w-full">
                    <h2 class="text-2xl text-center font-bold mb-2">اطلاعات مشتری</h2>
                    <p class="text-gray-500 text-center text-[12px]">لطفا اطلاعات را دقیق وارد کنید.</p>
                    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        <div class="flex flex-col items-center">
                            <div class="relative w-24 h-24">
                                <label class="w-full h-full rounded-full border flex items-center justify-center cursor-pointer bg-blue-800 overflow-hidden relative text-white font-bold text-xl">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover absolute inset-0" />
                                    @elseif (!empty($oldImage))
                                        <img src="{{ asset('storage/'.$oldImage) }}" class="w-full h-full object-cover absolute inset-0" />
                                    @elseif (!empty($name))
                                        <span class="uppercase text-3xl select-none">
                                            {{ mb_substr($name, 0, 1) }}
                                        </span>
                                    @else
                                        <svg class="w-12 h-12" viewBox="0 0 487.678 487.678" fill="#fafafa">
                                            <path d="M377.996,282.347c-56.201-18.357-79.563-41.185-79.563-41.185l-1.881,1.793c-16.69,15.709-35.149,24.944-51.965,24.944H243c-16.815,0-35.274-9.235-51.964-24.944l-1.882-1.793s-23.36,22.827-79.562,41.185c-82.964,30.992-58.053,157.119-58.077,158.096c2.613,14.047,4.136,18.875,5.463,19.417c83.314,37.091,290.319,37.091,373.634,0c1.327-0.542,2.85-5.37,5.463-19.417C436.051,439.466,461.295,313.84,377.996,282.347z"/>
                                            <path d="M330.924,121.441l-0.696-0.755c-4.668-4.274-4.303-4.029-4.303-4.029s8.142-41.083,1.613-60.511c-10.25-31.027-71.475-51.822-83.755-54.239c0.002-0.023-7.469-1.518-7.946-1.521c0,0-9.659-1.953-20.854,2.93c-7.291,2.805-45.408,20.09-56.227,52.83c-6.528,19.428,1.614,60.511,1.614,60.511s0.365-0.245-4.304,4.029l-0.695,0.755c-3.158,3.586-2.378,14.806,1.074,26.479c3.128,11.695,7.205,14.838,8.182,17.577c9.903,46.497,44.338,86.197,79.429,86.197s67.707-39.7,77.61-86.197c0.978-2.738,5.055-5.882,8.183-17.577C333.301,136.246,334.172,124.256,330.924,121.441z"/>
                                        </svg>
                                    @endif
                                    <input type="file" wire:model="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" />
                                </label>
                            </div>
                            <p class="text-[12px] text-gray-500 text-center mt-2">برای آپلود عکس روی قسمت بالا کلیک کنید.</p>
                            @error('image')
                                <span class="text-red-500 text-sm px-2 mt-1 text-center block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-3">
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="نام" wire:model.lazy="first_name" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                @error('first_name')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="تخلص" wire:model.lazy="last_name" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                </div>
                                @error('last_name')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="tel" placeholder="شماره" wire:model.lazy="customer_number" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.3082 15.2751C18.3082 15.5751 18.2415 15.8834 18.0998 16.1834C17.9582 16.4834 17.7748 16.7667 17.5332 17.0334C17.1248 17.4834 16.6748 17.8084 16.1665 18.0167C15.6665 18.2251 15.1248 18.3334 14.5415 18.3334C13.6915 18.3334 12.7832 18.1334 11.8248 17.7251C10.8665 17.3167 9.90817 16.7667 8.95817 16.0751C7.99984 15.3751 7.0915 14.6001 6.22484 13.7417C5.3665 12.8751 4.5915 11.9667 3.89984 11.0167C3.2165 10.0667 2.6665 9.11675 2.2665 8.17508C1.8665 7.22508 1.6665 6.31675 1.6665 5.45008C1.6665 4.88341 1.7665 4.34175 1.9665 3.84175C2.1665 3.33341 2.48317 2.86675 2.92484 2.45008C3.45817 1.92508 4.0415 1.66675 4.65817 1.66675C4.8915 1.66675 5.12484 1.71675 5.33317 1.81675C5.54984 1.91675 5.7415 2.06675 5.8915 2.28341L7.82484 5.00841C7.97484 5.21675 8.08317 5.40841 8.15817 5.59175C8.23317 5.76675 8.27484 5.94175 8.27484 6.10008C8.27484 6.30008 8.2165 6.50008 8.09984 6.69175C7.9915 6.88341 7.83317 7.08341 7.63317 7.28341L6.99984 7.94175C6.90817 8.03341 6.8665 8.14175 6.8665 8.27508C6.8665 8.34175 6.87484 8.40008 6.8915 8.46675C6.9165 8.53341 6.9415 8.58341 6.95817 8.63341C7.10817 8.90841 7.3665 9.26675 7.73317 9.70008C8.10817 10.1334 8.50817 10.5751 8.9415 11.0167C9.3915 11.4584 9.82484 11.8667 10.2665 12.2417C10.6998 12.6084 11.0582 12.8584 11.3415 13.0084C11.3832 13.0251 11.4332 13.0501 11.4915 13.0751C11.5582 13.1001 11.6248 13.1084 11.6998 13.1084C11.8415 13.1084 11.9498 13.0584 12.0415 12.9667L12.6748 12.3417C12.8832 12.1334 13.0832 11.9751 13.2748 11.8751C13.4665 11.7584 13.6582 11.7001 13.8665 11.7001C14.0248 11.7001 14.1915 11.7334 14.3748 11.8084C14.5582 11.8834 14.7498 11.9917 14.9582 12.1334L17.7165 14.0917C17.9332 14.2417 18.0832 14.4167 18.1748 14.6251C18.2582 14.8334 18.3082 15.0417 18.3082 15.2751Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10"/>
                                    </svg>
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
                                    <input type="text" placeholder="آیدی تذکره" wire:model.lazy="id_card" class="input-field">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#292D32;} </style> <g> <path class="st0" d="M317.796,61.373c0-24.336-19.802-44.138-44.138-44.138h-35.311c-24.337,0-44.138,19.802-44.138,44.138v79.449 h123.587V61.373z M282.485,79.029c0,4.88-3.948,8.828-8.828,8.828h-35.311c-4.88,0-8.828-3.948-8.828-8.828V61.373 c0-4.879,3.948-8.828,8.828-8.828h35.311c4.879,0,8.828,3.949,8.828,8.828V79.029z"></path> <path class="st0" d="M491.965,124.003H335.451v16.776c0,9.801-7.94,17.655-17.655,17.655H194.209 c-9.707,0-17.656-7.854-17.656-17.655v-16.776H20.039C8.918,124.003,0,133.012,0,144.047v330.77 c0,11.035,8.918,19.949,20.039,19.949h471.926c11.034,0,20.035-8.914,20.035-19.949v-330.77 C512,133.012,502.999,124.003,491.965,124.003z M117.88,271.979c-1.238-8.431-2.94-25.095,1.465-33.458 c0,0-3.008-5.465-3.008-12.681c12.668,1.802,53.117-24.155,65.19-3.017c17.496-1.818,27.962,22.871,20.018,49.156 c0,0,9.81-0.457,5.888,13.284c-3.672,12.897-6.625,15.854-11.788,17.69c-2.216,12.534-5.936,23.604-10.837,29.052 c0,6.534,0,11.301,0,15.121c0,0.379,0.073,0.793,0.181,1.207l-17.164,8.25v12.129h-16.155v-12.129l-17.173-8.268 c0.108-0.413,0.181-0.81,0.181-1.189c0-3.82,0-8.586,0-15.121c-4.901-5.448-8.604-16.518-10.827-29.052 c-5.173-1.837-8.117-4.793-11.798-17.69C108.281,272.073,117.152,271.979,117.88,271.979z M159.751,431.971 c-57.957,0-97.794-7.509-98.414-14.759c-2.504-30.19,36.595-46.311,52.522-51.906c1.561-0.56,3.371-1.422,5.25-2.474l30.397,42.044 l2.164-27.544h16.155l2.164,27.544l30.388-42.044c1.828,0.999,3.612,1.853,5.259,2.474c15.81,5.906,55.026,21.69,52.513,51.906 C257.536,424.463,217.7,431.971,159.751,431.971z M372.317,411.851h-52.962v-17.655h52.962V411.851z M425.283,335.341H319.356 v-17.655h105.928V335.341z M425.283,258.832H319.356v-17.656h105.928V258.832z"></path> </g> </g></svg>
                                </div>
                                @error('id_card')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                            <div class="relative">
                                <select wire:model="customer_type" class="input-field">
                                    <option value="">نوع مشتری</option>
                                    <option value="مشتری همیشه گی">همیشه گی</option>
                                    <option value="مشتری جدید">جدید</option>
                                </select>
                                @error('customer_type')<span class="text-red-500 text-sm px-2 mt-1">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="md:col-span-2 flex flex-col md:flex-row gap-2">
                            <button wire:click="resetForm" type="button" class="w-full bg-red-800 hover:bg-red-700 md:w-auto flex-1 text-white font-semibold py-3 rounded-md transition">لغو</button>
                            <button type="submit" class="w-full bg-blue-800 hover:bg-blue-700 md:w-auto flex-1 text-white font-semibold py-3 rounded-md transition"> {{ $editing ? 'بروزرسانی' : 'ثبت' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
