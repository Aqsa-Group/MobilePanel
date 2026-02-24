<div>
    <div>
        <div class="mx-auto max-w-full">
            <div>
                <div class="card rounded-xl border shadow-xl shadow-[0px_4px_4px_0px_#00000040]">
                    <div class="rounded-xl bg-[#0B35CC]/5 p-4">
                        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                            <h1 class="text-2xl font-bold">لیست دستگاه ها :</h1>
                        </div>
                        <div class="relative w-full md:w-1/2">
                            <input
                                type="text"
                                placeholder="جستحو به اساس شماره Imei..."
                                class="w-full rounded-lg bg-blue-100 p-2 pr-10 outline-none"
                            >
                            <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-2 text-lg font-bold">فیلتر پیشرفته:</p>
                        <div class="mb-4 grid grid-cols-2 gap-3 sm:grid-cols-5">
                            <select class="rounded bg-blue-100 p-2">
                                <option>کتگوری</option>
                                <option>موبایل</option>
                                <option>تبلت</option>
                                <option>لپتاب</option>
                            </select>
                            <select class="rounded bg-blue-100 p-2">
                                <option>برند</option>
                                <option>اپل (آیفون)</option>
                                <option>سامسونگ</option>
                                <option>شیائومی</option>
                                <option>هواوی</option>
                                <option>اوپو</option>
                            </select>
                            <div class="cursor-pointer rounded-lg bg-[#0B35CC] py-4 text-white flex items-center justify-center">
                                <p class="text-sm">فیلتر اجرا</p>
                            </div>
                            <div class="cursor-pointer rounded-lg bg-[#0B35CC] py-4 text-white flex items-center justify-center">
                                <p class="text-sm">فیلتر حذف</p>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded-2xl pb-3">
                        <div class="mx-2 mt-1">
                            <div class="hidden overflow-x-auto md:block">
                                <table class="min-w-full">
                                    <thead class="bg-[#0B35CC] text-white">
                                        <tr>
                                            <th class="p-2 text-center text-[12px]">آیدی</th>
                                            <th class="p-2 text-center text-[12px]">عکس دستگاه</th>
                                            <th class="p-2 text-center text-[12px]">عکس کارتن دستگاه</th>
                                            <th class="p-2 text-center text-[12px]">نام دستگاه</th>
                                            <th class="p-2 text-center text-[12px]">رنگ</th>
                                            <th class="p-2 text-center text-[12px]">کتگوری</th>
                                            <th class="p-2 text-center text-[12px]">شماره IMEI</th>
                                            <th class="p-2 text-center text-[12px]">نام مالک</th>
                                            <th class="p-2 text-center text-[12px]">شماره تماس</th>
                                            <th class="p-2 text-center text-[12px]">آدرس مالک</th>
                                            <th class="p-2 text-center text-[12px]">آیدی تذکره</th>
                                            <th class="p-2 text-center text-[12px]">عکس تذکره</th>
                                            <th class="p-2 text-center text-[12px]">عکس مالک</th>
                                            <th class="p-2 text-center text-[12px]">وضعیت دستگاه</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="14" class="px-4 py-4 text-center">داده‌ای یافت نشد</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="block w-full max-w-full overflow-hidden border-b border-[#0B35CC] py-4 text-center md:hidden">
                                <p class="block px-2 py-1 text-center">داده‌ای یافت نشد</p>
                            </div>

                            <div class="mt-3 flex flex-wrap items-center justify-center gap-2 text-[10px] sm:hidden">
                                <button type="button" class="rounded bg-blue-800 px-2 py-1 text-sm text-white">قبلی</button>
                                <span class="mx-2 text-sm font-medium">1 از 1</span>
                                <button type="button" class="rounded bg-blue-800 px-2 py-1 text-sm text-white">بعدی</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
