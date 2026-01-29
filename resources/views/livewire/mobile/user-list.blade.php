<div>
    <main class="max-w-full p-4 mx-auto  mt-2 ">
        @if($canEdit)
        <div class=" w-full mx-auto shadow-[0px_4px_4px_0px_#00000040] border  border-gray-300 rounded-lg  flex flex-col lg:flex-row">
            <div class="flex-1 lg:w-1/2 flex items-center justify-center p-3 sm:p-4 order-1 ">
                <div class="w-full max-w-full mx-auto">
                    <h2 class="sm:text-[30px] sm:text-2xl font-bold text-center lg:text-right flex items-center justify-center ">
                        افزودن کاربر
                    </h2>
                    <p class="text-[10px] text-gray-500 text-center lg:text-right mt-2 flex items-center justify-center">
                        لطفا اطلاعات را واضح و دقیق وارد کنید.
                    </p>
                    <form wire:submit.prevent="submit"  enctype="multipart/form-data"  class="space-y-3">
                        @csrf
                        <div class="relative mx-auto w-24 h-24">
                            <div id="profileWrapper"
                                onclick="document.getElementById('profile_image').click()"
                                class="w-full h-full rounded-full border flex items-center justify-center cursor-pointer bg-blue-800 overflow-hidden relative text-white font-bold text-xl">
                                @if ($image)
                                    <img class="w-full h-full object-cover"   src="{{ $image->temporaryUrl() }}">
                                @elseif($user && $user->image)
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/'.$user->image) }}">
                                @elseif($first_name || $last_name)
                                    <span id="avatarText">
                                        {{ mb_strtoupper(
                                            mb_substr($first_name, 0, 1) .
                                            mb_substr($last_name, 0, 1)
                                        ) }}
                                    </span>
                                @else
                                    <svg height="48px" width="48px"  viewBox="0 0 487.678 487.678"  fill="#fafafa">
                                        <path d="M377.996,282.347c-56.201-18.357-79.563-41.185-79.563-41.185l-1.881,1.793c-16.69,15.709-35.149,24.944-51.965,24.944H243c-16.815,0-35.274-9.235-51.964-24.944l-1.882-1.793s-23.36,22.827-79.562,41.185c-82.964,30.992-58.053,157.119-58.077,158.096c2.613,14.047,4.136,18.875,5.463,19.417c83.314,37.091,290.319,37.091,373.634,0c1.327-0.542,2.85-5.37,5.463-19.417C436.051,439.466,461.295,313.84,377.996,282.347z"/>
                                        <path d="M330.924,121.441l-0.696-0.755c-4.668-4.274-4.303-4.029-4.303-4.029s8.142-41.083,1.613-60.511c-10.25-31.027-71.475-51.822-83.755-54.239c0.002-0.023-7.469-1.518-7.946-1.521c0,0-9.659-1.953-20.854,2.93c-7.291,2.805-45.408,20.09-56.227,52.83c-6.528,19.428,1.614,60.511,1.614,60.511s0.365-0.245-4.304,4.029l-0.695,0.755c-3.158,3.586-2.378,14.806,1.074,26.479c3.128,11.695,7.205,14.838,8.182,17.577c9.903,46.497,44.338,86.197,79.429,86.197s67.707-39.7,77.61-86.197c0.978-2.738,5.055-5.882,8.183-17.577C333.301,136.246,334.172,124.256,330.924,121.441z"/>
                                    </svg>
                                @endif
                            </div>
                            <input type="file"  wire:model="image"  id="profile_image"  class="hidden"  accept="image/*">
                        </div>
                        <p class="text-[12px] text-gray-500 text-center flex items-center justify-center">
                         برای آپلود عکس روی قسمت بالا کلید کنید.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-3">
                            <div class="flex flex-col ">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="نام "  wire:model="first_name"    class="input-field ">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                @error('first_name')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="نام فامیلی"   wire:model="last_name"  class="input-field ">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                @error('last_name')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <div class="relative w-full">
                                    <input type="text" placeholder="نام کاربری" wire:model="username"  class="input-field ">
                                    <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </div>
                                @error('username')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="relative  w-full">
                                    <input type="text" placeholder="آدرس" wire:model="address" class="input-field ">
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
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-3">
                            <div class="flex flex-col ">
                                <div class="relative w-full">
                                    <input type="tel" placeholder="شماره" wire:model="number"
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
                                    <input type="email" placeholder=" ایمیل" wire:model="email"
                                        class="input-field ">
                                    <svg fill="#000000" class="w-4 h-4 absolute left-2 top-1/2  -translate-y-1/2 text-gray-500" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.92 511.92" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M482.413,197.147L442.52,158.96V96.453c0,0-15.467-32.427-33.813-33.493h-57.934l-58.013-51.2 c-17.707-15.68-45.44-15.68-63.147,0L171.48,63.067l0.853,0.96H103c-18.347,0-33.813,14.827-33.813,32.427v62.507L29.4,197.147 c-8.64,8.32-13.44,19.733-13.44,31.573v249.6c0,18.56,15.04,33.6,33.6,33.6h413.867c17.92,0,32.533-14.613,32.533-32.533V228.72 C495.853,216.88,490.947,205.467,482.413,197.147z M243.693,27.76c9.6-8.533,25.28-8.533,34.88,0l41.067,36.267H202.627 L243.693,27.76z M90.52,96.453c0-5.76,5.973-11.093,12.373-11.093h305.813c6.507,0,12.48,5.333,12.48,11.093v199.04 l-58.56,48.747l-5.12-5.44c-7.573-8.107-17.707-8.107-23.787-8.107H188.44c-6.293,0-15.68,0-22.933,7.253L159,344.453 L90.52,291.76V96.453z M37.187,228.72c0-6.08,2.56-11.947,6.933-16.213l25.067-24v86.827l-32-24.64V228.72z M37.187,277.68 L143.64,359.6L37.187,465.093V277.68z M463.427,490.693H49.453c-2.133,0-4.16-0.64-5.973-1.813l137.067-135.787 c0.96-0.96,4.053-1.067,7.893-1.067h145.28c4.373,0,7.147,0.213,8.213,1.387l127.68,135.147 C467.8,489.84,465.667,490.587,463.427,490.693z M474.52,462.747l-97.173-102.933l97.173-80.96V462.747z M474.52,251.013 l-32,26.667v-89.173l25.067,24.107c4.373,4.267,6.933,10.133,6.933,16.213V251.013z"></path> <path d="M133.187,160.027h106.347c5.333,0,10.133-3.84,10.88-9.067c0.96-6.613-4.16-12.267-10.56-12.267H133.507 c-5.333,0-10.133,3.84-10.88,9.067C121.667,154.373,126.787,160.027,133.187,160.027z"></path> <path d="M133.187,234.693H378.2c5.333,0,10.133-3.84,10.88-9.067c0.96-6.613-4.16-12.267-10.56-12.267H133.507 c-5.333,0-10.133,3.84-10.88,9.067C121.667,229.04,126.787,234.693,133.187,234.693z"></path> <path d="M389.08,268.293c0.96-6.613-4.16-12.267-10.56-12.267H133.507c-5.333,0-10.133,3.84-10.88,9.067 c-0.96,6.613,4.16,12.267,10.56,12.267H378.2C383.533,277.36,388.333,273.52,389.08,268.293z"></path> </g> </g> </g> </g></svg>
                                </div>
                                @error('email')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <select wire:model="rule" class="  text-gray-500 input-field cursor-pointer flex  ">
                                    <option value="">انتخاب نقش</option>
                                    @if(auth()->user()->rule === 'super_admin')
                                        <option value="admin">ادمین</option>
                                        <option value="user">کاربر</option>
                                    @endif
                                    @if(auth()->user()->rule === 'admin')
                                        <option value="user">کاربر</option>
                                    @endif
                                </select>
                                @error('rule')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                <div class="relative w-full">
                                    <input type="password" placeholder="پسورد"  wire:model="password"
                                        class="input-field ">
                                    <svg fill="#000000" class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Change_password"> <path d="M464.4326,147.54a9.8985,9.8985,0,0,0-17.56,9.1406,214.2638,214.2638,0,0,1-38.7686,251.42c-83.8564,83.8476-220.3154,83.874-304.207-.0088a9.8957,9.8957,0,0,0-16.8926,7.0049v56.9a9.8965,9.8965,0,0,0,19.793,0v-34.55A234.9509,234.9509,0,0,0,464.4326,147.54Z"></path> <path d="M103.8965,103.9022c83.8828-83.874,220.3418-83.8652,304.207-.0088a9.8906,9.8906,0,0,0,16.8926-6.9961v-56.9a9.8965,9.8965,0,0,0-19.793,0v34.55C313.0234-1.3556,176.0547,3.7509,89.9043,89.9012A233.9561,233.9561,0,0,0,47.5674,364.454a9.8985,9.8985,0,0,0,17.56-9.1406A214.2485,214.2485,0,0,1,103.8965,103.9022Z"></path> <path d="M126.4009,254.5555v109.44a27.08,27.08,0,0,0,27,27H358.5991a27.077,27.077,0,0,0,27-27v-109.44a27.0777,27.0777,0,0,0-27-27H153.4009A27.0805,27.0805,0,0,0,126.4009,254.5555ZM328,288.13a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,328,288.13Zm-72,0a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,256,288.13Zm-72,0a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,184,288.13Z"></path> <path d="M343.6533,207.756V171.7538a87.6533,87.6533,0,0,0-175.3066,0V207.756H188.14V171.7538a67.86,67.86,0,0,1,135.7208,0V207.756Z"></path> </g> </g></svg>
                                </div>
                                @error('password')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col ">
                                @if(auth()->user()->rule === 'super_admin' && $rule === 'admin')
                                    <select class="text-gray-500 input-field cursor-pointer flex " wire:model="limit">
                                        <option value="">انتخاب حد مجاز</option>
                                        <option value="5">5 کاربر</option>
                                        <option value="10">10 کاربر</option>
                                    </select>
                                @endif
                                @error('limit')
                                    <span class=" text-red-500 text-xs px-2 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="md:col-span-2 flex flex-col md:flex-row gap-2">
                            <button   wire:click="resetForm" type="button" class="w-full md:w-auto flex-1 bg-red-800 hover:bg-red-700 text-white font-semibold py-3 rounded-md transition">
                                لغو
                            </button>
                            <button  type="submit" class="w-full bg-blue-800 md:w-auto flex-1 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition">
                                ثبت
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        <section class=" w-full  mt-2   mx-auto h-full flex flex-col border  border-gray-300  rounded-lg  shadow-[0px_4px_4px_0px_#00000040] p-2  items-center">
            <div class="flex flex-col md:flex-row justify-between items-center w-full mt-1 gap-1 md:gap-2">
                <div class="flex gap-2 w-full ">
                    <div class="relative   w-full  md:w-1/4  ">
                        <input type="text"  wire:model.live="search" class="w-full h-full block rounded-md md:rounded-lg bg-[#1E40AF]/20 md:absolute md:top-0 md:right-0 pr-2 text-[7px] sm:p-6 p-4  md:text-[10px]" placeholder="جستجو">
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
            <div class="flex flex-col w-full gap-2 ">
                <div class="hidden md:flex flex-col w-full gap-2 sm:mt-14 ">
                    <table class="w-full text-center border-separate border-spacing-0 text-lg" style="font-style: Regular;">
                        <tr>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">آیدی</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">عکس</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">نام کامل</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">اسم کاربری</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white"> ادمین</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">شماره</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">ایمیل</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">آدرس</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">نقش</th>
                            @if(auth()->user()->rule !== 'user')
                                <th class="p-4 text-[12px] bg-blue-800 text-white">وضعیت</th>
                            @endif
                            <th class="p-4 text-[12px] bg-blue-800 text-white">چاپ</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">ادیت</th>
                            <th class="p-4 text-[12px] bg-blue-800 text-white">حذف</th>
                        </tr>
                        <tbody class="[&>tr:not(:last-child)>td]:border-b [&>tr:not(:last-child)>td]:border-blue-800 text-[10px]">
                            @forelse($users as $index => $user)
                            <tr>
                                <td class="font-bold">{{ $users->firstItem() + $index }}</td>
                                <td class="text-center" >
                                    @if($user->image)
                                        <img class="w-10 h-10 rounded-full block mx-auto object-cover" src="{{ asset('storage/'.$user->image) }}" alt="avatar">
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-blue-800 flex mx-auto items-center justify-center text-white font-bold">
                                            {{ mb_strtoupper(mb_substr(explode(' ', $user->name)[0],0,1) . mb_substr(explode(' ', $user->name)[1] ?? '',0,1)) }}
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    {{ $user->admin?->name ?? '—' }}
                                    <span class="text-[9px] text-gray-500 block">
                                    (
                                    @if($user->admin?->rule === 'super_admin')
                                        سوپر ادمین
                                    @elseif($user->admin?->rule === 'admin')
                                        ادمین
                                    @elseif($user->admin?->rule === 'user')
                                        کاربر
                                    @else
                                        —
                                    @endif
                                    )
                                    </span>
                                </td>
                                <td>{{ $user->number }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td> @if($user->rule === 'user') کاربر
                                    @elseif($user->rule === 'admin') ادمین
                                    @else سوپر ادمین
                                    @endif
                                </td>
                                @if(auth()->user()->rule !== 'user')
                                <td>
                                    @if($user->isOnline())
                                        <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">فعال</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-700">غیرفعال</span>
                                    @endif
                                </td>
                                @endif
                                <td class="text-center">
                                    <button type="button" wire:click="editUser({{ $user->id }})" class="flex items-center justify-center mx-auto h-full">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button type="button" wire:click="editUser({{ $user->id }})" class="flex items-center justify-center mx-auto h-full">
                                        <svg width="20"  height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button  type="button" wire:click="confirmDelete({{ $user->id }})"  class="flex items-center justify-center mx-auto h-full" >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998"
                                                stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97"
                                                stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.8499 9.14001L18.1999 19.21C18.0899 20.78 17.9999 22 15.2099 22H8.7899C5.9999 22 5.9099 20.78 5.7999 19.21L5.1499 9.14001"
                                                stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.3301 16.5H13.6601"
                                                stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.5 12.5H14.5"
                                                stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="13" class="p-4 text-center text-gray-400">
                                    هیچ کاربری ثبت نشده
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="print-area mt-2 md:hidden flex flex-col  px-2 gap-2 w-full">
                    @forelse($users as $user)
                    <div class="rounded-xl flex   flex-col items-center  border border-[#1E40AF66] h-auto w-full">
                        <table dir="ltr" class="w-full table-fixed  items-center font-semibold justify-center text-center mx-auto">
                            <tr>
                                <td colspan="3" class="text-center pt-2">
                                    @if($user->image)
                                        <img
                                            src="{{ asset('storage/'.$user->image) . '?t=' . now()->timestamp }}"
                                            alt="{{ $user->name }}"
                                            class="w-[50px] h-[50px] mx-auto rounded-full object-cover"
                                        >
                                    @else
                                        <div class="w-[50px] h-[50px] mx-auto rounded-full bg-blue-800 flex items-center justify-center text-white font-bold text-[14px]">
                                            {{
                                                mb_strtoupper(
                                                    mb_substr(explode(' ', $user->name)[0], 0, 1) .
                                                    mb_substr(explode(' ', $user->name)[1] ?? '', 0, 1)
                                                )
                                            }}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-center text-[13px]">{{ $user->name }}</th>
                            </tr>
                            <tr>
                                <th class="pt-2 text-center align-middle text-[13px]">آدرس</th>
                                <th class="pt-3 text-[13px]">نقش</th>
                                <th class="pt-3 text-[13px]">ادمین</th>
                            </tr>
                            <tr class="text-[#00000080]">
                                <td  class="text-[10px] text-center align-middle">{{ $user->address }}</td>
                                <td  class="text-[10px]">
                                    @if($user->rule === 'user') کاربر
                                    @elseif($user->rule === 'admin') ادمین
                                    @else سوپر ادمین
                                    @endif
                                </td>
                                <td class="text-[10px]">
                                    {{ $user->admin?->name ?? '—' }}
                                    <span class="block text-[9px] text-gray-500">
                                        @if($user->admin?->rule === 'super_admin')
                                            سوپر ادمین
                                        @elseif($user->admin?->rule === 'admin')
                                            ادمین
                                        @else
                                            کاربر
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="pt-2 text-[13px]">نام کاربری</th>
                                <th class="pt-2 text-[13px]">شماره</th>
                                <th class="pt-2 text-[13px]">ایمیل</th>
                            </tr>
                            <tr class="text-[#00000080]">
                                <td class="text-[10px]">{{ $user->username }}</td>
                                <td  class="text-[10px]">{{ $user->number }}</td>
                                <td  class="text-[10px]">{{ $user->email}}</td>
                            </tr>
                            <tr>
                                @if(auth()->user()->rule !== 'user')
                                    <th colspan="3" class="pt-3 text-center text-[13px]">وضعیت</th>
                                @endif
                            </tr>
                            <tr class="text-[#00000080] mt-2">
                                @if(auth()->user()->rule !== 'user')
                                    <td colspan="3" class="text-[10px] text-center align-middle">
                                        @if($user->isOnline())
                                            <span class=" px-2 py-1 rounded-full text-xs bg-green-100 text-green-700 font-bold">فعال</span>
                                        @else
                                            <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-700">غیرفعال</span>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        </table>
                        <div  class="flex flex-row gap-2 my-2 w-full px-4 mt-4">
                            <button type="button" wire:click="editUser({{ $user->id }})" class="flex justify-center items-center gap-1 border rounded-lg border-[#000] w-1/2 h-[30px] text-black text-[10px]">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                <span>چاپ</span>
                            </button>
                            <button type="button" wire:click="editUser({{ $user->id }})" class="flex justify-center items-center gap-1 border rounded-lg border-[#0033BB] w-1/2 h-[30px] text-[#0033BB] text-[10px]">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>ویرایش</span>
                            </button>
                            <button  type="button"  wire:click="confirmDelete({{ $user->id }})" class="flex justify-center items-center gap-1 border rounded-lg border-[#FF0000] text-white w-1/2 h-[30px] text-[#FF0000] text-[10px]">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.8499 9.14001L18.1999 19.21C18.0899 20.78 17.9999 22 15.2099 22H8.7899C5.9999 22 5.9099 20.78 5.7999 19.21L5.1499 9.14001" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.3301 16.5H13.6601" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.5 12.5H14.5" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>حذف</span>
                            </button>
                        </div>
                    </div>
                    @empty
                    <div class="flex justify-center gap-3 mt-5">
                            هیچ کاربری ثبت نشده
                    </div>
                    @endforelse
                </div>
                <div class="flex flex-wrap gap-1 justify-center sm:justify-start items-center mt-3 text-[10px]">
                    @if ($users->lastPage() > 1)
                    <button
                        wire:click="previousPage"
                        @disabled($users->onFirstPage())
                        class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                        قبلی
                    </button>
                    <span class="mx-2 text-sm font-medium">
                        {{ $users->currentPage() }} از {{ $users->lastPage() }}
                    </span>
                    <button
                        wire:click="nextPage"
                        @disabled($users->onLastPage())
                        class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                        بعدی
                    </button>
                    @endif
                </div>
            </div>
        </section>
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
        <div>
            @if($showMaxModal)
                <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-80 max-w-full text-center relative">
                        <h2 class="text-lg font-bold mb-3">تعداد کاربران به حداکثر رسیده!</h2>
                        <p class="text-gray-600 mb-4 text-sm">دیگر نمی‌توانید کاربر جدید اضافه کنید.</p>
                        <button
                            wire:click="hideMaxModal"
                            class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded"
                        >
                            باشه
                        </button>
                    </div>
                </div>
            @endif
        </div>
        <script>
            document.addEventListener('livewire:load', function () {
                window.addEventListener('autoCloseModal', () => {
                    setTimeout(() => {
                        @this.hideMaxModal();
                    }, 3000);
                });
                });
            window.addEventListener('reset-file-input', event => {
                let input = document.getElementById('profile_image');
                if(input) {
                    input.value = null;
                }
            });
        </script>
    </main>
</div>
