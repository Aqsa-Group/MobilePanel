<div>
    <div class="text-gray-800 flex items-center justify-center sm:p-4">
        <div class="bg-white w-full rounded-lg shadow-xl border border-gray-300 p-4">
            <h2 class="text-2xl font-bold text-center mb-2">پروفایل من</h2>
            <p class="text-center text-[12px] text-gray-500 mb-6">
                شما می‌توانید معلومات تانرا ویرایش کنید.
            </p>
            <div class="flex flex-col items-center mb-8">
                <div class="relative w-28 h-28">
                    @if($image || $oldImage)
                        <img
                            src="{{ $image ? $image->temporaryUrl() : asset('storage/' . $oldImage) }}"
                            class="w-full h-full rounded-full object-cover border border-gray-300"
                            alt="profile"
                        >
                    @else
                        <div class="w-full h-full rounded-full border border-gray-300 bg-gray-100 text-gray-500 flex items-center justify-center text-xs">
                            بدون عکس
                        </div>
                    @endif
                    <input type="file" id="profile_image" wire:model="image" class="hidden" accept="image/*">
                    <label for="profile_image" class="absolute bottom-1 right-1 bg-blue-800 hover:bg-blue-700 text-white w-8 h-8 rounded-full flex items-center justify-center cursor-pointer shadow-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536 9 15l.464-3.536z" />
                        </svg>
                    </label>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col w-full">
                    <div class="relative w-full">
                        <input type="text" placeholder="نام کامل" class="input-field" wire:model="name" />
                        <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <div class="relative w-full">
                        <input type="text" placeholder="نام کاربری" wire:model.defer="username" class="input-field" />
                        <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.0002 10.0001C12.3013 10.0001 14.1668 8.1346 14.1668 5.83341C14.1668 3.53223 12.3013 1.66675 10.0002 1.66675C7.69898 1.66675 5.8335 3.53223 5.8335 5.83341C5.8335 8.1346 7.69898 10.0001 10.0002 10.0001Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.0085 13.1167L13.0585 16.0667C12.9418 16.1834 12.8335 16.4 12.8085 16.5584L12.6502 17.6833C12.5919 18.0917 12.8752 18.375 13.2835 18.3167L14.4085 18.1583C14.5668 18.1333 14.7919 18.025 14.9002 17.9084L17.8502 14.9584C18.3585 14.45 18.6002 13.8583 17.8502 13.1083C17.1085 12.3667 16.5169 12.6083 16.0085 13.1167Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.5835 13.5417C15.8335 14.4417 16.5335 15.1417 17.4335 15.3917" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2.8418 18.3333C2.8418 15.1083 6.05015 12.5 10.0002 12.5C10.8668 12.5 11.7001 12.625 12.4751 12.8583" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="relative w-full">
                        <input type="email" placeholder="ایمیل" wire:model.defer="email" class="input-field">
                        <svg fill="#000000" class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 511.92 511.92" xmlns="http://www.w3.org/2000/svg">
                            <path d="M482.413,197.147L442.52,158.96V96.453c0,0-15.467-32.427-33.813-33.493h-57.934l-58.013-51.2 c-17.707-15.68-45.44-15.68-63.147,0L171.48,63.067l0.853,0.96H103c-18.347,0-33.813,14.827-33.813,32.427v62.507L29.4,197.147 c-8.64,8.32-13.44,19.733-13.44,31.573v249.6c0,18.56,15.04,33.6,33.6,33.6h413.867c17.92,0,32.533-14.613,32.533-32.533V228.72 C495.853,216.88,490.947,205.467,482.413,197.147z M243.693,27.76c9.6-8.533,25.28-8.533,34.88,0l41.067,36.267H202.627 L243.693,27.76z M90.52,96.453c0-5.76,5.973-11.093,12.373-11.093h305.813c6.507,0,12.48,5.333,12.48,11.093v199.04 l-58.56,48.747l-5.12-5.44c-7.573-8.107-17.707-8.107-23.787-8.107H188.44c-6.293,0-15.68,0-22.933,7.253L159,344.453 L90.52,291.76V96.453z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <div class="relative w-full">
                        <input type="text" placeholder="شماره" wire:model.defer="number" class="input-field" />
                        <svg class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.3082 15.2751C18.3082 15.5751 18.2415 15.8834 18.0998 16.1834C17.9582 16.4834 17.7748 16.7667 17.5332 17.0334C17.1248 17.4834 16.6748 17.8084 16.1665 18.0167C15.6665 18.2251 15.1248 18.3334 14.5415 18.3334C13.6915 18.3334 12.7832 18.1334 11.8248 17.7251C10.8665 17.3167 9.90817 16.7667 8.95817 16.0751C7.99984 15.3751 7.0915 14.6001 6.22484 13.7417C5.3665 12.8751 4.5915 11.9667 3.89984 11.0167C3.2165 10.0667 2.6665 9.11675 2.2665 8.17508C1.8665 7.22508 1.6665 6.31675 1.6665 5.45008C1.6665 4.88341 1.7665 4.34175 1.9665 3.84175C2.1665 3.33341 2.48317 2.86675 2.92484 2.45008C3.45817 1.92508 4.0415 1.66675 4.65817 1.66675C4.8915 1.66675 5.12484 1.71675 5.33317 1.81675C5.54984 1.91675 5.7415 2.06675 5.8915 2.28341L7.82484 5.00841C7.97484 5.21675 8.08317 5.40841 8.15817 5.59175C8.23317 5.76675 8.27484 5.94175 8.27484 6.10008C8.27484 6.30008 8.2165 6.50008 8.09984 6.69175C7.9915 6.88341 7.83317 7.08341 7.63317 7.28341L6.99984 7.94175C6.90817 8.03341 6.8665 8.14175 6.8665 8.27508C6.8665 8.34175 6.87484 8.40008 6.8915 8.46675C6.9165 8.53341 6.9415 8.58341 6.95817 8.63341C7.10817 8.90841 7.3665 9.26675 7.73317 9.70008C8.10817 10.1334 8.50817 10.5751 8.9415 11.0167C9.3915 11.4584 9.82484 11.8667 10.2665 12.2417C10.6998 12.6084 11.0582 12.8584 11.3415 13.0084C11.3832 13.0251 11.4332 13.0501 11.4915 13.0751C11.5582 13.1001 11.6248 13.1084 11.6998 13.1084C11.8415 13.1084 11.9498 13.0584 12.0415 12.9667L12.6748 12.3417C12.8832 12.1334 13.0832 11.9751 13.2748 11.8751C13.4665 11.7584 13.6582 11.7001 13.8665 11.7001C14.0248 11.7001 14.1915 11.7334 14.3748 11.8084C14.5582 11.8834 14.7498 11.9917 14.9582 12.1334L17.7165 14.0917C17.9332 14.2417 18.0832 14.4167 18.1748 14.6251C18.2582 14.8334 18.3082 15.0417 18.3082 15.2751Z" stroke="#292D32" stroke-opacity="0.8" stroke-width="1.5" stroke-miterlimit="10"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="relative w-full">
                        <input type="password" wire:model.defer="password" placeholder="پسورد" class="input-field">
                        <svg fill="#000000" class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M464.4326,147.54a9.8985,9.8985,0,0,0-17.56,9.1406,214.2638,214.2638,0,0,1-38.7686,251.42c-83.8564,83.8476-220.3154,83.874-304.207-.0088a9.8957,9.8957,0,0,0-16.8926,7.0049v56.9a9.8965,9.8965,0,0,0,19.793,0v-34.55A234.9509,234.9509,0,0,0,464.4326,147.54Z"></path>
                            <path d="M103.8965,103.9022c83.8828-83.874,220.3418-83.8652,304.207-.0088a9.8906,9.8906,0,0,0,16.8926-6.9961v-56.9a9.8965,9.8965,0,0,0-19.793,0v34.55C313.0234-1.3556,176.0547,3.7509,89.9043,89.9012A233.9561,233.9561,0,0,0,47.5674,364.454a9.8985,9.8985,0,0,0,17.56-9.1406A214.2485,214.2485,0,0,1,103.8965,103.9022Z"></path>
                            <path d="M126.4009,254.5555v109.44a27.08,27.08,0,0,0,27,27H358.5991a27.077,27.077,0,0,0,27-27v-109.44a27.0777,27.0777,0,0,0-27-27H153.4009A27.0805,27.0805,0,0,0,126.4009,254.5555ZM328,288.13a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,328,288.13Zm-72,0a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,256,288.13Zm-72,0a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,184,288.13Z"></path>
                            <path d="M343.6533,207.756V171.7538a87.6533,87.6533,0,0,0-175.3066,0V207.756H188.14V171.7538a67.86,67.86,0,0,1,135.7208,0V207.756Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <div class="relative w-full">
                        <input type="text" wire:model.defer="address" placeholder="آدرس" class="input-field" />
                        <svg fill="#292D32" class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 text-gray-500" viewBox="0 0 511 511" xmlns="http://www.w3.org/2000/svg">
                            <path d="M431.5,0h-336C73.72,0,56,17.72,56,39.5V88h-8.5c-4.142,0-7.5,3.357-7.5,7.5s3.358,7.5,7.5,7.5H56v65h-8.5 c-4.142,0-7.5,3.357-7.5,7.5s3.358,7.5,7.5,7.5H56v65h-8.5c-4.142,0-7.5,3.357-7.5,7.5s3.358,7.5,7.5,7.5H56v65h-8.5 c-4.142,0-7.5,3.357-7.5,7.5s3.358,7.5,7.5,7.5H56v65h-8.5c-4.142,0-7.5,3.357-7.5,7.5s3.358,7.5,7.5,7.5H56v48.5 c0,21.78,17.72,39.5,39.5,39.5h336c21.78,0,39.5-17.72,39.5-39.5v-432C471,17.72,453.28,0,431.5,0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
                <button wire:click="cancel" type="button" class="w-full bg-red-800 hover:bg-red-700 text-white font-semibold py-3 rounded-md transition">
                    برگشت
                </button>
                <button wire:click="save" type="button" class="w-full bg-blue-800 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition">
                    ثبت تغییرات
                </button>
            </div>
        </div>
    </div>
</div>
