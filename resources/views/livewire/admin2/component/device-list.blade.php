<div>
    <div>
        <div class="mx-auto max-w-full">
            <div>
                <!-- Image Modal -->
                <div id="imageModal"
                    class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-70 z-50"
                    onclick="closeModal(event)">

                    <div class="relative" onclick="event.stopPropagation()">
                        <button onclick="closeModal()"
                            class="absolute -top-10 right-0 text-white text-3xl font-bold">
                            ✕
                        </button>

                        <img id="modalImage"
                            class="max-h-[80vh] max-w-[90vw] rounded-lg shadow-lg">
                    </div>
                </div>

                <script>
                    function showImage(src) {
                        document.getElementById('modalImage').src = src;
                        const modal = document.getElementById('imageModal');
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        document.body.classList.add('overflow-hidden'); 
                    }

                    function closeModal(event = null) {
                        if (!event || event.target.id === 'imageModal') {
                            const modal = document.getElementById('imageModal');
                            modal.classList.add('hidden');
                            modal.classList.remove('flex');
                            document.body.classList.remove('overflow-hidden');
                        }
                    }

                    // بستن با ESC
                    document.addEventListener('keydown', function(e) {
                        if (e.key === "Escape") {
                            closeModal();
                        }
                    });
                </script>
                <div class="card rounded-xl border shadow-xl shadow-[0px_4px_4px_0px_#00000040]">
                    <div class="rounded-xl bg-[#0B35CC]/5 p-4">
                        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                            <h1 class="text-2xl font-bold">لیست دستگاه ها :</h1>
                        </div>
                        <form method="GET" action="{{ route('admin2.device-list') }}" class="mt-4 space-y-3">
                            <input
                                type="text"
                                name="imei"
                                value="{{ request('imei') }}"
                                placeholder="جستجو به اساس شماره Imei..."
                                class="w-full rounded-lg bg-blue-100 p-2 pr-10 outline-none">
                            <div class="flex flex-col gap-2 md:flex-row md:items-center">
                                <select name="category" class="rounded bg-blue-100 p-2 md:min-w-40">
                                    <option value="">کتگوری</option>
                                    <option value="موبایل" {{ request('category') == 'موبایل' ? 'selected' : '' }}>موبایل</option>
                                    <option value="تبلت" {{ request('category') == 'تبلت' ? 'selected' : '' }}>تبلت</option>
                                    <option value="لپتاب" {{ request('category') == 'لپتاب' ? 'selected' : '' }}>لپتاب</option>
                                </select>
                                <select name="model" class="rounded bg-blue-100 p-2 md:min-w-40">
                                    <option value="">برند</option>
                                    <option value="Apple" {{ request('model') == 'Apple' ? 'selected' : '' }}>اپل</option>
                                    <option value="Samsung" {{ request('model') == 'Samsung' ? 'selected' : '' }}>سامسونگ</option>
                                    <option value="Xiaomi" {{ request('model') == 'Xiaomi' ? 'selected' : '' }}>شیائومی</option>
                                    <option value="Huawei" {{ request('model') == 'Huawei' ? 'selected' : '' }}>هواوی</option>
                                </select>
                                <select name="status" class="rounded bg-blue-100 p-2 md:min-w-40">
                                    <option value="">وضعیت</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>در انتظار</option>
                                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>تایید شده</option>
                                    <option value="blocked" {{ request('status') == 'blocked' ? 'selected' : '' }}>بلاک شده</option>
                                </select>
                                <button type="submit" class="rounded-lg bg-[#0B35CC] py-3 text-white px-6">
                                    فیلتر اجرا
                                </button>
                                <a href="{{ route('admin2.device-list') }}" class="rounded-lg bg-[#0B35CC] py-3 text-white px-6 text-center">
                                    فیلتر حذف
                                </a>
                            </div>
                        </form>
                        <div class="mt-4 rounded-xl p-2">
                            <div class="hidden overflow-x-auto md:block">
                            <table class="min-w-full whitespace-nowrap">
                                <thead class="bg-[#0B35CC] text-white">
                                    <tr>
                                        <th class="p-2 text-center text-[10px]">آیدی</th>
                                        <th class="p-2 text-center text-[10px]">نام فروشگاه </th>
                                        <th class="p-2 text-center text-[10px]">ثبت کننده </th>
                                        <th class="p-2 text-center text-[10px]">عکس دستگاه</th>
                                        <th class="p-2 text-center text-[10px]">عکس کارتن دستگاه</th>
                                        <th class="p-2 text-center text-[10px]">نام دستگاه</th>
                                        <th class="p-2 text-center text-[10px]">رنگ</th>
                                        <th class="p-2 text-center text-[10px]">کتگوری</th>
                                        <th class="p-2 text-center text-[10px]">شماره IMEI</th>
                                        <th class="p-2 text-center text-[10px]">نام مالک</th>
                                        <th class="p-2 text-center text-[10px]">شماره تماس</th>
                                        <th class="p-2 text-center text-[10px]">آدرس مالک</th>
                                        <th class="p-2 text-center text-[10px]">آیدی تذکره</th>
                                        <th class="p-2 text-center text-[10px]">عکس تذکره</th>
                                        <th class="p-2 text-center text-[10px]">عکس مالک</th>
                                        <th class="p-2 text-center text-[10px]"> وضعیت</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if($devices->count())
                                    @foreach($devices as $device)
                                    <tr class="border-b-2 border-[#0B35CC]  text-center">
                                        <td class="p-2 align-middle">{{ $device->id }}</td>
                                        <td class="p-2 align-middle">{{ $device->shop_name ?? '-' }}</td>
                                        <td class="p-2 align-middle">
                                            {{ $device->submittedBy?->name ?? ('کاربر #' . ($device->submitted_by_user_id ?? '-')) }}
                                        </td>

                                        <td class="p-2 align-middle">
                                            @if($device->device_image)
                                            <img
                                                src="{{ asset('storage/'.$device->device_image) }}"
                                                class="w-12 h-12 rounded object-cover cursor-pointer hover:scale-110 transition mx-auto"
                                                onclick="showImage(this.src)">
                                            @else
                                            <img
                                                src="https://ui-avatars.com/api/?name={{ urlencode($device->model) }}&background=0B35CC&color=fff"
                                                class="w-12 h-12 rounded object-cover mx-auto">
                                            @endif
                                        </td>

                                        <td class="p-2 align-middle">
                                            @if($device->carton_image)
                                            <img
                                                src="{{ asset('storage/'.$device->carton_image) }}"
                                                class="w-12 h-12 rounded object-cover cursor-pointer hover:scale-110 transition mx-auto"
                                                onclick="showImage(this.src)">
                                            @else
                                            <img
                                                src="https://ui-avatars.com/api/?name=Box&background=cccccc&color=000"
                                                class="w-12 h-12 rounded object-cover mx-auto">
                                            @endif
                                        </td>

                                        <td class="p-2 align-middle">{{ $device->model ?? '-' }}</td>
                                        <td class="p-2 align-middle">{{ $device->color ?? '-' }}</td>
                                        <td class="p-2 align-middle">{{ $device->category ?? '-' }}</td>
                                        <td class="p-2 align-middle" dir="ltr">{{ $device->imei ?? '-' }}</td>
                                        <td class="p-2 align-middle">{{ $device->customer_name ?? '-' }}</td>
                                        <td class="p-2 align-middle" dir="ltr">{{ $device->customer_phone ?? '-' }}</td>
                                        <td class="p-2 align-middle">{{ $device->customer_address ?? '-' }}</td>
                                        <td class="p-2 align-middle" dir="ltr">{{ $device->customer_tazkira_id ?? '-' }}</td>

                                        <td class="p-2 align-middle">
                                            @if($device->tazkira_image)
                                            <img
                                                src="{{ asset('storage/'.$device->tazkira_image) }}"
                                                class="w-12 h-12 rounded object-cover cursor-pointer hover:scale-110 transition mx-auto"
                                                onclick="showImage(this.src)">
                                            @else
                                            <img
                                                src="https://ui-avatars.com/api/?name=ID&background=999999&color=fff"
                                                class="w-12 h-12 rounded object-cover mx-auto">
                                            @endif
                                        </td>

                                        <td class="p-2 align-middle">
                                            @if($device->customer_image)
                                            <img
                                                src="{{ asset('storage/'.$device->customer_image) }}"
                                                class="w-12 h-12 rounded-full object-cover cursor-pointer hover:scale-110 transition mx-auto"
                                                onclick="showImage(this.src)">
                                            @else
                                            <img
                                                src="https://ui-avatars.com/api/?name={{ urlencode($device->customer_name) }}&background=random"
                                                class="w-12 h-12 rounded-full object-cover mx-auto">
                                            @endif
                                        </td>
                                        <td class="p-2 align-middle">
                                            @if($device->status === 'approved')
                                                <span class="text-green-600 font-semibold">تایید شده</span>
                                            @elseif($device->status === 'blocked')
                                                <span class="text-red-600 font-semibold">بلاک شده</span>
                                            @else
                                                <span class="text-amber-600 font-semibold">در انتظار</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="16" class="text-center py-4">داده‌ای یافت نشد</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            </div>

                            <div class="mt-4">
                                {{ $devices->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
