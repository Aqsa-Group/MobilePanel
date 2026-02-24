@extends('livewire.admin2.layouts.app')

@section('content')
<div class="max-w-full mx-auto p-4">

    {{-- پیام موفقیت --}}
    @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif


    {{-- ======================= فرم ثبت / ویرایش ======================= --}}
    <div class="bg-white rounded-2xl shadow-xl p-5">

        <h1 class="text-xl font-bold text-center mb-6">
            {{ isset($store) ? 'ویرایش فروشگاه' : 'ثبت فروشگاه جدید' }}
        </h1>

        <form method="POST"
            action="{{ isset($store) ? route('admin2.store.update', $store->id) : route('admin2.store.save') }}"
            enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <input type="text" name="store_name" value="{{ old('store_name', $store->store_name ?? '') }}"
                        placeholder="نام فروشگاه" class="border p-3 rounded-lg w-full">
                    @error('store_name')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div>
                    <input type="text" name="owner_name" value="{{ old('owner_name', $store->owner_name ?? '') }}"
                        placeholder="نام فروشنده" class="border p-3 rounded-lg w-full">
                    @error('owner_name')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror

                </div>
                <div>
                    <input type="text" name="address" value="{{ old('address', $store->address ?? '') }}"
                        placeholder="آدرس فروشگاه" class="border p-3 rounded-lg w-full">
                    @error('address')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="text" name="phone" value="{{ old('phone', $store->phone ?? '') }}"
                        placeholder="شماره تماس" class="border p-3 rounded-lg w-full">
                    @error('phone')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="text" name="tazkira_id" value="{{ old('tazkira_id', $store->tazkira_id ?? '') }}"
                        placeholder="آیدی تذکره" class="border p-3 rounded-lg w-full">
                    @error('phone')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <input type="file" name="owner_photo" class="border p-3 rounded-lg w-full">

                <div>
                    <input type="text" name="license_number"
                        value="{{ old('license_number', $store->license_number ?? '') }}" placeholder="شماره جواز"
                        class="border p-3 rounded-lg w-full">
                    @error('license_number')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <input type="file" name="license_photo" class="border p-3 rounded-lg w-full">

            </div>

            <div class="mt-4">
                <select name="status" class="border p-3 rounded-lg w-full">
                    <option value="1" {{ old('status', $store->status ?? 1) == 1 ? 'selected' : '' }}>فعال</option>
                    <option value="0" {{ old('status', $store->status ?? 1) == 0 ? 'selected' : '' }}>غیرفعال</option>
                </select>
            </div>

            {{-- دکمه‌ها ریسپانسیو --}}
            <div class="flex flex-col md:flex-row gap-4 mt-6">
                <a href="{{ route('admin2.store') }}" class="bg-red-600 text-white w-full text-center py-3 rounded-lg">
                    لغو
                </a>

                <button type="submit" class="bg-blue-600 text-white w-full py-3 rounded-lg">
                    {{ isset($store) ? 'ویرایش' : 'ثبت' }}
                </button>
            </div>

        </form>
    </div>


    {{-- ======================= جستجو و فیلتر ======================= --}}
    <div class="bg-white rounded-xl shadow p-4 mt-6">

        <form method="GET" action="{{ route('admin2.store') }}" id="filterForm"
            class="flex flex-col md:flex-row gap-3">

            <select name="filterStatus" onchange="this.form.submit()" class="border p-2 rounded-lg w-full md:w-auto">

                <option value="">همه</option>
                <option value="1" {{ request('filterStatus') == '1' ? 'selected' : '' }}>فعال</option>
                <option value="0" {{ request('filterStatus') == '0' ? 'selected' : '' }}>غیرفعال</option>
            </select>

            <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                placeholder="جستجو..." onkeyup="debounceSearch()" class="border p-2 rounded-lg w-full md:flex-1">

        </form>
    </div>

    <div class="md:hidden space-y-4">

        @forelse($stores as $store)
        <div class="border rounded-xl p-4 shadow-sm">

            <div class="flex justify-between items-center mb-2">
                <h2 class="font-bold text-lg">
                    {{ $store->store_name }}
                </h2>

                <span class="text-sm {{ $store->status ? 'text-green-600' : 'text-red-600' }}">
                    {{ $store->status ? 'فعال' : 'غیرفعال' }}
                </span>
            </div>

            <div class="text-sm text-gray-600 space-y-1">
                <p><strong>مالک:</strong> {{ $store->owner_name }}</p>
                <p><strong>تماس:</strong> {{ $store->phone }}</p>
                <p><strong>تذکره:</strong> {{ $store->tazkira_id }}</p>
                <p><strong>جواز:</strong> {{ $store->license_number }}</p>
            </div>

            <div class="flex justify-between mt-3">

                <a href="{{ route('admin2.store.edit', $store->id) }}" class="text-blue-600 text-sm">
                    ویرایش
                </a>

                <form action="{{ route('admin2.store.delete', $store->id) }}" method="POST"
                    onsubmit="return confirm('مطمئن هستید؟')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 text-sm">
                        حذف
                    </button>
                </form>

            </div>

        </div>

        @empty
        <div class="text-center text-gray-500">
            داده‌ای موجود نیست
        </div>
        @endforelse

    </div>
    {{-- ======================= جدول فروشگاه‌ها ======================= --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-[900px] w-full text-center border-collapse">

            <thead class="bg-blue-600 text-white text-sm md:text-base">
                <tr>
                    <th class="p-2 whitespace-nowrap">#</th>
                    <th class="p-2 whitespace-nowrap">عکس</th>
                    <th class="p-2 whitespace-nowrap">نام فروشنده</th>
                    <th class="p-2 whitespace-nowrap">نام فروشگاه</th>
                    <th class="p-2 whitespace-nowrap">ادرس فروشگاه</th>
                    <th class="p-2 whitespace-nowrap">شماره تماس</th>
                    <th class="p-2 whitespace-nowrap">ایدی تذکره</th>
                    <th class="p-2 whitespace-nowrap">شماره جواز</th>
                    <th class="p-2 whitespace-nowrap">جواز</th>
                    <th class="p-2 whitespace-nowrap">وضعیت</th>
                    <th class="p-2 whitespace-nowrap">ویرایش</th>
                    <th class="p-2 whitespace-nowrap">حذف</th>
                </tr>
            </thead>

            <tbody class="text-sm md:text-base">
                @forelse($stores as $store)
                <tr class="border-b hover:bg-gray-100">

                    <td class="p-2 whitespace-nowrap">
                        {{ ($stores->currentPage() - 1) * $stores->perPage() + $loop->iteration }}
                    </td>

                    <td class="p-2 whitespace-nowrap">

                        @if ($store->owner_photo)
                        <img src="{{ asset('storage/' . $store->owner_photo) }}"
                            class="w-10 h-10 rounded-full mx-auto object-cover">
                        @else
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center mx-auto text-sm font-bold">
                            {{ mb_substr($store->owner_name, 0, 1) }}
                        </div>
                        @endif

                    </td>

                    <td class="p-2 whitespace-nowrap">{{ $store->owner_name }}</td>
                    <td class="p-2 whitespace-nowrap">{{ $store->store_name }}</td>
                    <td class="p-2 whitespace-nowrap">{{ $store->address }}</td>
                    <td class="p-2 whitespace-nowrap">{{ $store->phone }}</td>
                    <td class="p-2 whitespace-nowrap">{{ $store->tazkira_id }}</td>
                    <td class="p-2 whitespace-nowrap">{{ $store->license_number }}</td>
                    <td class="p-2 whitespace-nowrap">

                        @if ($store->license_photo)
                        <img src="{{ asset('storage/' . $store->license_photo) }}"
                            class="w-10 h-10 rounded-lg mx-auto object-cover">
                        @else
                        <div class="w-10 h-10 rounded-lg bg-gray-200 flex items-center justify-center mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h10M7 11h6m-6 4h10M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            </svg>
                        </div>
                        @endif

                    </td>

                    <td class="p-2 whitespace-nowrap">
                        <span class="{{ $store->status ? 'text-green-600' : 'text-red-600' }}">
                            {{ $store->status ? 'فعال' : 'غیرفعال' }}
                        </span>
                    </td>

                    <td class="p-2 whitespace-nowrap">
                        <a href="{{ route('admin2.store.edit', $store->id) }}" class="text-blue-600">
                            ویرایش
                        </a>
                    </td>

                    <td class="p-2 whitespace-nowrap">
                        <form action="{{ route('admin2.store.delete', $store->id) }}" method="POST"
                            onsubmit="return confirm('مطمئن هستید؟')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">حذف</button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="11" class="p-4 text-gray-500">
                        داده‌ای موجود نیست
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

        <div class="p-4">
            {{ $stores->withQueryString()->links() }}
        </div>

    </div>

</div>

{{-- اسکریپت سرچ اتوماتیک --}}
<script>
    let timeout = null;

    function debounceSearch() {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
            document.getElementById('filterForm').submit();
        }, 600);
    }
</script>
@endsection
