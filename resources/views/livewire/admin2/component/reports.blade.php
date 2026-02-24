<div>
    <form wire:key="{{ $formKey }}" wire:submit.prevent="save" class="flex min-h-screen">
        <main class="flex-1 p-6">
            <div class="bg-white rounded-lg border border-gray-300 shadow p-6">

                <h1 class="text-2xl font-bold text-center mb-6">ثبت دستگاه</h1>

                @if (session()->has('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


                    {{-- مشخصات مشتری --}}
                    <div class="space-y-4">

                        <input type="text" wire:model="customer_name" placeholder="نام کامل" class="input-field w-full">
                        @error('customer_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <input type="text" wire:model="customer_phone" placeholder="شماره تماس" class="input-field w-full">
                        @error('customer_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <input type="text" wire:model="customer_tazkira_id" placeholder="آیدی تذکره" class="input-field w-full">
                        @error('customer_tazkira_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <input type="text" wire:model="customer_address" placeholder="آدرس کامل" class="input-field w-full">
                        @error('customer_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <input type="file" wire:model="customer_image" class="input-field w-full">
                        <small class="text-gray-500 text-xs">عکس واضح مشتری</small>
                        @if ($customer_image)
                        <img src="{{ $customer_image->temporaryUrl() }}" class="w-20 mt-2 rounded">
                        @endif

                        <input type="file" wire:model="tazkira_image" class="input-field w-full">
                        <small class="text-gray-500 text-xs">عکس تذکره</small>
                        @if ($tazkira_image)
                        <img src="{{ $tazkira_image->temporaryUrl() }}" class="w-20 mt-2 rounded">
                        @endif

                    </div>

                    {{-- مشخصات دستگاه --}}
                    <div class="space-y-4">

                        <select wire:model="category" class="input-field w-full">
                            <option value="">انتخاب کتگوری</option>
                            <option value="mobile">موبایل</option>
                            <option value="tablet">تبلت</option>
                            <option value="laptop">لپتاپ</option>
                        </select>
                        @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <input type="text" wire:model="model" placeholder="مدل دستگاه" class="input-field w-full">
                        @error('model') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <input type="text" wire:model="color" placeholder="رنگ دستگاه" class="input-field w-full">
                        @error('color') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <input type="text" wire:model="imei" placeholder="شماره IMEI" class="input-field w-full">
                        @error('imei') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <input type="file" wire:model="carton_image" class="input-field w-full">
                        <small class="text-gray-500 text-xs">عکس کارتن</small>
                        @if ($carton_image)
                        <img src="{{ $carton_image->temporaryUrl() }}" class="w-20 mt-2 rounded">
                        @endif

                        <input type="file" wire:model="device_image" class="input-field w-full">
                        <small class="text-gray-500 text-xs">عکس دستگاه</small>
                        @if ($device_image)
                        <img src="{{ $device_image->temporaryUrl() }}" class="w-20 mt-2 rounded">
                        @endif

                    </div>

                </div>

                <div class="flex gap-4 mt-8">
                    <button type="button"
                        wire:click="cancel"
                        class="flex-1 bg-red-800 text-white py-3 rounded-lg">
                        لغو
                    </button>

                    <button type="submit"
                        wire:loading.attr="disabled"
                        class="flex-1 bg-blue-800 text-white py-3 rounded-lg">
                        <span wire:loading.remove>ثبت</span>
                        <span wire:loading>در حال ثبت...</span>
                    </button>
                </div>

            </div>
        </main>
    </form>
</div>
