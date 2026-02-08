<div>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <div cl x-data="{ tab: 'invoice', counts: { invoice: {{ $sales->total() }},  debts: {{ $borrowings->total() }}, stock: {{ $products->total() }},  salary: {{ $salaryPayments->total() }},    withdraw: {{ $withdrawals->total() }}  }}" class="max-w-full">
        <section class="p-4 border mt-3 bg-gray-100 border-gray-300 rounded-xl">
            <span class="font-bold block mb-4">نوع گزارش:</span>
            <div class="hidden md:grid grid-cols-7 gap-4">
                <template x-for="item in [
                    {id:'invoice', label:'فاکتور فروش'},
                    {id:'debts', label:'قرض‌ها'},
                    {id:'stock', label:'موجودی دستگاه‌ها'},
                    {id:'salary', label:'معاش کارمندان'},
                    {id:'withdraw', label:'برداشت‌ها'},
                ]">
                    <button
                        @click="tab=item.id"
                        :class="tab===item.id ? 'bg-blue-800 text-white' : 'bg-white'"
                        class="h-auto rounded-lg p-2 shadow-md text-sm font-medium transition">
                        <span x-text="item.label"></span>
                    </button>
                </template>
            </div>
            <div class="grid grid-cols-2 gap-3 md:hidden">
                <template x-for="item in [
                    {id:'invoice', label:'فاکتور'},
                    {id:'debts', label:'قرض‌ها'},
                    {id:'stock', label:'موجودی'},
                    {id:'salary', label:'معاش'},
                    {id:'withdraw', label:'برداشت'},
                ]">
                    <button
                        @click="tab=item.id"
                        :class="tab===item.id ? 'bg-blue-800 text-white' : 'bg-white'"
                        class="h-[60px] rounded-md shadow text-xs transition">
                        <span x-text="item.label"></span>
                    </button>
                </template>
            </div>
        </section>
        <section class="mt-6 bg-gray-100 p-4 border border-gray-300 rounded-xl">
            <div class="w-full h-auto p-2 flex flex-row justify-between text-[20px]">
                <div>
                    <span class="my-2 mb-6 font-bold">نتایج گزارش:</span>
                    <span class=" text-[12px] text-center px-3 py-1 rounded-md bg-blue-800 text-white" x-text="counts[tab] + ' مورد'">
                    </span>
                </div>
                <div class="flex flex-wrap md:flex-nowrap gap-3 text-[10px]">
                    <div class="flex flex-row justify-center items-center px-4 bg-[#1E40AF]/20 rounded-md gap-1 h-[25px] md:h-[40px] w-fit">
                        <button class="flex flex-row items-center gap-1 px-2">
                        <svg class="w-5 h-5" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26 26" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#030104;" d="M25.162,3H16v2.984h3.031v2.031H16V10h3v2h-3v2h3v2h-3v2h3v2h-3v3h9.162 C25.623,23,26,22.609,26,22.13V3.87C26,3.391,25.623,3,25.162,3z M24,20h-4v-2h4V20z M24,16h-4v-2h4V16z M24,12h-4v-2h4V12z M24,8 h-4V6h4V8z"></path> <path style="fill:#030104;" d="M0,2.889v20.223L15,26V0L0,2.889z M9.488,18.08l-1.745-3.299c-0.066-0.123-0.134-0.349-0.205-0.678 H7.511C7.478,14.258,7.4,14.494,7.277,14.81l-1.751,3.27H2.807l3.228-5.064L3.082,7.951h2.776l1.448,3.037 c0.113,0.24,0.214,0.525,0.304,0.854h0.028c0.057-0.198,0.163-0.492,0.318-0.883l1.61-3.009h2.542l-3.037,5.022l3.122,5.107 L9.488,18.08L9.488,18.08z"></path> </g> </g></svg>
                            <span>چاپ کردن به اکسل</span>
                        </button>
                    </div>
                    <div class="flex flex-row justify-center items-center px-4 bg-[#1E40AF]/20 rounded-md gap-1 h-[25px] md:h-[40px] w-fit">
                        <button class="flex flex-row items-center gap-1 px-2">
                            <svg class="w-5 h-5" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.5 8H3V7H3.5C3.77614 7 4 7.22386 4 7.5C4 7.77614 3.77614 8 3.5 8Z" fill="#000000"></path> <path d="M7 10V7H7.5C7.77614 7 8 7.22386 8 7.5V9.5C8 9.77614 7.77614 10 7.5 10H7Z" fill="#000000"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M1 1.5C1 0.671573 1.67157 0 2.5 0H10.7071L14 3.29289V13.5C14 14.3284 13.3284 15 12.5 15H2.5C1.67157 15 1 14.3284 1 13.5V1.5ZM3.5 6H2V11H3V9H3.5C4.32843 9 5 8.32843 5 7.5C5 6.67157 4.32843 6 3.5 6ZM7.5 6H6V11H7.5C8.32843 11 9 10.3284 9 9.5V7.5C9 6.67157 8.32843 6 7.5 6ZM10 11V6H13V7H11V8H12V9H11V11H10Z" fill="#000000"></path> </g></svg>
                            <span>چاپ کردن به پی دی اف</span>
                        </button>
                    </div>
                </div>
            </div>
            <div x-show="tab==='invoice'" x-cloak>
                <h2 class="font-bold mb-3">فاکتور فروش</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                    <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 ">
                        <table class="w-full text-center  border-collapse">
                            <tr>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">آیدی</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام مشتری</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مدل دستگاه</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">قیمت</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">شماره IMEI</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">تاریخ فروش</th>
                            </tr>
                            <tbody class="text-[13px] ">
                                @forelse($sales as $index => $sale)
                                <tr class="border-b border-[#1E40AF]">
                                    <td class="p-2 font-bold text-[11px]"> {{ $sales->firstItem() + $index }}</td>
                                    <td class="p-2 font-bold text-[11px]"> {{ $sale->customer->name ?? '-' }}</td>
                                    <td class="p-2 font-bold text-[11px]">{{ $sale->device_model }} </td>
                                    <td class="p-2 font-bold text-[11px]">{{ number_format($sale->total_price) }}؋</td>
                                    <td class="p-2 font-bold text-[11px]">{{ $sale->imei }}</td>
                                    <td class="p-2 font-bold text-[11px]">{{ \Carbon\Carbon::parse($sale->created_at)->format('Y/m/d') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-gray-400">
                                        هیچ فروشی ثبت نشده
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="md:hidden mt-3 space-y-3">
                        @forelse($sales as $sale)
                        <div class="grid  text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                            <div>
                                <span class="text-gray-500">نام مشتری</span>
                                <div class="font-semibold mt-1"> {{ $sale->customer->name ?? '-' }}</div>
                            </div>
                            <div>
                                <span class="text-gray-500">مدل دستگاه</span>
                                <div class="font-semibold mt-1">{{ $sale->device_model }} </div>
                            </div>
                            <div>
                                <span class="text-gray-500">قیمت</span>
                                <div class="font-semibold mt-1">{{ number_format($sale->total_price) }}؋</div>
                            </div>
                            <div>
                                <span class="text-gray-500">شماره IMEI</span>
                                <div class="font-semibold mt-1">{{ $sale->imei }}</div>
                            </div>
                            <div  class="text-center col-span-2">
                                <span class="text-gray-500">تاریخ فروش</span>
                                <div class="font-semibold mt-1">{{ \Carbon\Carbon::parse($sale->created_at)->format('Y/m/d') }}</div>
                            </div>
                        </div>
                        @empty
                        <div class="flex justify-center gap-3 mt-5">
                            هیچ فروشی ثبت نشده
                        </div>
                        @endforelse
                    </div>
                    <div class="flex flex-wrap gap-1 justify-center sm:justify-start items-center mt-3 text-[10px]">
                        @if ($sales->lastPage() > 1)
                            <button
                                wire:click="previousPage"
                                @disabled($sales->onFirstPage())
                                class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                                قبلی
                            </button>
                            <span class="mx-2 text-sm font-medium">
                                {{ $sales->currentPage() }} از {{ $sales->lastPage() }}
                            </span>
                            <button
                                wire:click="nextPage"
                                @disabled($sales->onLastPage())
                                class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                                بعدی
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div x-show="tab==='debts'" x-cloak>
                <h2 class="font-bold mb-3">قرض‌ها</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                    <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2  rounded-xl">
                        <table class="w-full text-center border-collapse">
                            <tr>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">آیدی</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام مشتری</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">قرض </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مبلغ کل</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white"> مبلغ دریافت </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">تاریخ </th>
                            </tr>
                            <tbody class="text-[13px] ">
                                @forelse($borrowings as $index => $borrowing)
                                <tr class="border-b-2 border-[#1E40AF] ">
                                    <td class="p-2 text-[11px] font-bold">{{ $borrowings->firstItem() + $index }}</td>
                                    <td class="p-2 text-[11px] font-bold">{{ $borrowing->customer->name ?? '-' }} </td>
                                    <td class="p-2 text-[11px] font-bold">{{ $borrowing->item_name ?? '-' }} </td>
                                    <td class="p-2 text-[11px] font-bold">{{ number_format($borrowing->total_amount) }}؋</td>
                                    <td class="p-2 text-[11px] font-bold">{{ number_format($borrowing->paid_amount) }}؋</td>
                                    <td class="p-2 text-[11px] font-bold">{{ \Carbon\Carbon::parse($borrowing->created_at)->format('Y/m/d') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-gray-400">
                                        هیچ قرضی ثبت نشده
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="md:hidden mt-3 space-y-3">
                        @forelse($borrowings as $borrowing)
                        <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                            <div>
                                <span class="text-gray-500">نام مشتری</span>
                                <div class="font-semibold mt-1">{{ $borrowing->customer->name ?? '-' }} </div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قرض</span>
                                <div class="font-semibold mt-1">{{ $borrowing->item_name ?? '-' }} </div>
                            </div>
                            <div>
                                <span class="text-gray-500">قیمت کل</span>
                                <div class="font-semibold mt-1">{{ number_format($borrowing->total_amount) }}؋</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قیمت پرداخت شده</span>
                                <div class="font-semibold mt-1">{{ number_format($borrowing->paid_amount) }}؋</div>
                            </div>
                            <div  class="text-center col-span-2">
                                <span class="text-gray-500">تاریخ فروش</span>
                                <div class="font-semibold mt-1">{{ \Carbon\Carbon::parse($borrowing->created_at)->format('Y/m/d') }}</div>
                            </div>
                        </div>
                        @empty
                        <div class="flex justify-center gap-3 mt-5">
                            هیچ قرضی ثبت نشده
                        </div>
                        @endforelse
                    </div>
                    <div class="flex flex-wrap gap-1 justify-center sm:justify-start items-center mt-3 text-[10px]">
                        @if ($borrowings->lastPage() > 1)
                            <button
                                wire:click="previousPage"
                                @disabled($borrowings->onFirstPage())
                                class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                                قبلی
                            </button>
                            <span class="mx-2 text-sm font-medium">
                                {{ $borrowings->currentPage() }} از {{ $borrowings->lastPage() }}
                            </span>
                            <button
                                wire:click="nextPage"
                                @disabled($borrowings->onLastPage())
                                class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                                بعدی
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div x-show="tab==='stock'" x-cloak>
                <h2 class="font-bold mb-3">موجودی دستگاه‌ها</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                    <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2  rounded-xl">
                        <table class="w-full text-center border-collapse">
                            <tr>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">آیدی</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام دستگاه </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">کتگوری </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white"> تعداد </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">  قیمت خرید</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">  قیمت فروش</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">  حالت  </th>
                            </tr>
                            <tbody >
                                @forelse($products as $index => $product)
                                <tr class="border-b-2 border-[#1E40AF] ">
                                    <td class="p-2 text-[11px] font-bold">{{ $products->firstItem() + $index }}</td>
                                    <td class="p-2 text-[11px] font-bold">{{ $product->name }}</td>
                                    <td class="p-2 text-[11px] font-bold">{{ $product->category }} </td>
                                    <td class="p-2 text-[11px] font-bold">{{ $product->quantity }}</td>
                                    <td class="p-2 text-[11px] font-bold">{{ number_format($product->buy_price) }}؋</td>
                                    <td class="p-2 text-[11px] font-bold">{{ number_format($product->sell_price_retail) }}؋</td>
                                    <td class="p-2 text-[11px] font-bold">{{ $product->status }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="p-4 text-center text-gray-400">
                                        هیچ دستگاهی ثبت نشده
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="md:hidden mt-3 space-y-3">
                        @forelse($products as $product)
                        <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                            <div>
                                <span class="text-gray-500">نام دستگاه</span>
                                <div class="font-semibold mt-1">{{ $product->name }} </div>
                            </div>
                            <div>
                                <span class="text-gray-500"> کتگوری</span>
                                <div class="font-semibold mt-1">>{{ $product->category }} </div>
                            </div>
                            <div>
                                <span class="text-gray-500"> تعداد</span>
                                <div class="font-semibold mt-1">{{ $product->quantity }}</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قیمت  خرید</span>
                                <div class="font-semibold mt-1">{{ number_format($product->buy_price) }}؋</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قیمت  فروش</span>
                                <div class="font-semibold mt-1">{{ number_format($product->sell_price_retail) }}؋</div>
                            </div>
                            <div  class="text-center ">
                                <span class="text-gray-500"> حالت</span>
                                <div class="font-semibold mt-1">{{ $product->status }}</div>
                            </div>
                        </div>
                        @empty
                        <div class="flex justify-center gap-3 mt-5">
                            هیچ دستگاهی ثبت نشده
                        </div>
                        @endforelse
                    </div>
                    <div class="flex flex-wrap gap-1 justify-center sm:justify-start items-center mt-3 text-[10px]">
                    @if ($products->lastPage() > 1)
                        <button
                            wire:click="previousPage"
                            @disabled($products->onFirstPage())
                            class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                            قبلی
                        </button>
                        <span class="mx-2 text-sm font-medium">
                            {{ $products->currentPage() }} از {{ $products->lastPage() }}
                        </span>
                        <button
                            wire:click="nextPage"
                            @disabled($products->onLastPage())
                            class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                            بعدی
                        </button>
                    @endif
            </div>
            </div>
            </div>
            <div x-show="tab==='salary'" x-cloak>
                <h2 class="font-bold mb-3">معاش کارمندان</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 rounded-xl">
                    <table class="w-full text-center   border-collapse">
                        <tr>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">آیدی</th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام کارمند</th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">تاریخ  دریافت  </th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مبلغ کل</th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">شغل </th>
                        </tr>
                        <tbody class="text-[13px] ">
                            @forelse($salaryPayments as $index => $payment)
                            <tr class="border-b-2 border-[#1E40AF]">
                                <td  class="p-2 text-[11px] font-bold ">{{ $salaryPayments->firstItem() + $index }}</td>
                                <td  class="p-2 text-[11px] font-bold ">{{ $payment->employee->name }} </td>
                                <td  class="p-2 text-[11px] font-bold ">{{ \Morilog\Jalali\Jalalian::fromDateTime($payment->payment_date)->format('Y/m/d') }} </td>
                                <td  class="p-2 text-[11px] font-bold ">{{ number_format($payment->amount) }}؋</td>
                                <td  class="p-2 text-[11px] font-bold "> {{ $payment->employee->position ?? '—' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center text-gray-400">
                                    هیچ پرداخت معاشی ثبت نشده
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="md:hidden mt-3 space-y-3">
                    @forelse($salaryPayments as $payment)
                    <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                        <div>
                            <span class="text-gray-500">نام کارمند</span>
                            <div class="font-semibold mt-1"> {{ $payment->employee->name }}</div>
                        </div>
                        <div>
                            <span class="text-gray-500"> تاریخ دریافت</span>
                            <div class="font-semibold mt-1">{{ \Morilog\Jalali\Jalalian::fromDateTime($payment->payment_date)->format('Y/m/d') }}  </div>
                        </div>
                        <div>
                            <span class="text-gray-500">مبلغ کل</span>
                            <div class="font-semibold mt-1">{{ number_format($payment->amount) }}؋</div>
                        </div>
                        <div  class="text-center ">
                            <span class="text-gray-500"> شغل</span>
                            <div class="font-semibold mt-1">{{ $payment->employee->position ?? '—' }}</div>
                        </div>
                    </div>
                    @empty
                    <div class="flex justify-center gap-3 mt-5">
                        هیچ پرداخت معاشی ثبت نشده
                    </div>
                    @endforelse
                </div>
                <div class="flex flex-wrap gap-1 justify-center sm:justify-start items-center mt-3 text-[10px]">
                @if ($salaryPayments->lastPage() > 1)
                    <button
                        wire:click="previousPage"
                        @disabled($salaryPayments->onFirstPage())
                        class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                        قبلی
                    </button>
                    <span class="mx-2 text-sm font-medium">
                        {{ $salaryPayments->currentPage() }} از {{ $salaryPayments->lastPage() }}
                    </span>
                    <button
                        wire:click="nextPage"
                        @disabled($salaryPayments->onLastPage())
                        class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                        بعدی
                    </button>
                @endif
            </div>
            </div>
            </div>
            <div x-show="tab==='withdraw'" x-cloak>
                <h2 class="font-bold mb-3">برداشت‌ها</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                    <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2  rounded-xl">
                        <table class="w-full text-center  border-collapse">
                            <tr>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">آیدی</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white"> نوع برداشت</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مبلغ </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white"> توضیحات</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">تاریخ </th>
                            </tr>
                            <tbody class="text-[11px] font-bold">
                                @forelse($withdrawals as $index => $withdrawal)
                                <tr class="border-b border-[#1E40AF]">
                                    <td class="p-2">{{ $withdrawals->firstItem() + $index }}</td>
                                    <td class="p-2">{{ $withdrawal->withdrawal_type }} </td>
                                    <td class="p-2">{{ number_format($withdrawal->amount) }}؋ </td>
                                    <td class="p-2">{{ $withdrawal->description }}</td>
                                    <td class="p-2">{{ \Morilog\Jalali\Jalalian::fromDateTime($withdrawal->withdrawal_date)->format('Y/m/d') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-gray-400">
                                        هیچ برداشتی ثبت نشده
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="md:hidden mt-3 space-y-3">
                        @forelse($withdrawals as $withdrawal)
                        <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                            <div>
                                <span class="text-gray-500">نوع برداشت</span>
                                <div class="font-semibold mt-1">{{ $withdrawal->withdrawal_type }} </div>
                            </div>
                            <div>
                                <span class="text-gray-500"> مبلغ</span>
                                <div class="font-semibold mt-1">{{ number_format($withdrawal->amount) }}؋ </div>
                            </div>
                            <div>
                                <span class="text-gray-500"> توضیحات</span>
                                <div class="font-semibold mt-1">{{ $withdrawal->description }}</div>
                            </div>
                            <div>
                                <span class="text-gray-500">   تاریخ برداشت</span>
                                <div class="font-semibold mt-1">{{ \Morilog\Jalali\Jalalian::fromDateTime($withdrawal->withdrawal_date)->format('Y/m/d') }}</div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center text-gray-400 text-sm">
                            هیچ برداشتی ثبت نشده
                        </div>
                        @endforelse
                    </div>
                    <div class="flex flex-wrap gap-1 justify-center sm:justify-start items-center mt-3 text-[10px]">
                        @if ($withdrawals->lastPage() > 1)
                            <button
                                wire:click="previousPage"
                                @disabled($withdrawals->onFirstPage())
                                class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                                قبلی
                            </button>
                            <span class="mx-2 text-sm font-medium">
                                {{ $withdrawals->currentPage() }} از {{ $withdrawals->lastPage() }}
                            </span>
                            <button
                                wire:click="nextPage"
                                @disabled($withdrawals->onLastPage())
                                class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                                بعدی
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
<div>
