<div>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <div x-data="{ tab: 'invoice' }" class="max-w-full ">
        <section class="p-4 border mt-3 border-gray-300 rounded-xl">
            <span class="font-bold block mb-4">نوع گزارش:</span>
            <div class="hidden md:grid grid-cols-7 gap-4">
                <template x-for="item in [
                    {id:'invoice', label:'فاکتور فروش'},
                    {id:'debts', label:'قرض‌ها'},
                    {id:'stock', label:'موجودی دستگاه‌ها'},
                    {id:'salary', label:'معاش کارمندان'},
                    {id:'sold', label:'دستگاه‌های فروخته شده'},
                    {id:'withdraw', label:'برداشت‌ها'},
                    {id:'sales', label:'گزارش فروشات'}
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
                    {id:'sold', label:'فروخته شده'},
                    {id:'withdraw', label:'برداشت'},
                    {id:'sales', label:'فروشات'}
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
        <section class="mt-6 p-4 border border-gray-300 rounded-xl">
            <div class="w-full h-auto p-2 flex flex-row justify-between text-[20px]">
                <div>
                    <span class="my-2 mb-6 font-bold">نتایج گزارش:</span>
                    <span class=" text-[12px] text-center px-3 py-1 rounded-md bg-blue-800 text-white">
                        20 مورد
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
                    <div x-show="tab==='one'" x-cloak class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 ">
                        <table class="w-full text-center border-separate border-spacing-0">
                            <tr>
                                <th class="p-2 text-[14px] bg-[#1E40AF] text-white ">آیدی</th>
                                <th class="p-2 text-[14px] bg-[#1E40AF] text-white">نام مشتری</th>
                                <th class="p-2 text-[14px] bg-[#1E40AF] text-white">مدل دستگاه</th>
                                <th class="p-2 text-[14px] bg-[#1E40AF] text-white">قیمت</th>
                                <th class="p-2 text-[14px] bg-[#1E40AF] text-white">شماره IMEI</th>
                                <th class="p-2 text-[14px] bg-[#1E40AF] text-white ">تاریخ فروش</th>
                            </tr>
                            <tbody class="text-[13px] font-semibold">
                                <tr>
                                    <td>1</td>
                                    <td>احمد عزیزی</td>
                                    <td>سامسونگ A20</td>
                                    <td>15000.000؋</td>
                                    <td>0767567567</td>
                                    <td>1404/2/30</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 ">
                        <table class="w-full text-center border-b border-[#1E40AF] border-separate border-spacing-0">
                            <tr>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">آیدی</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام مشتری</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مدل دستگاه</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">قیمت</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">شماره IMEI</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">تاریخ فروش</th>
                            </tr>
                            <tbody class="text-[13px] ">
                                <tr >
                                    <td class="p-2 font-bold text-[11px]">1</td>
                                    <td class="p-2 font-bold text-[11px]">احمد عزیزی</td>
                                    <td class="p-2 font-bold text-[11px]">سامسونگ A20</td>
                                    <td class="p-2 font-bold text-[11px]">15000.000؋</td>
                                    <td class="p-2 font-bold text-[11px]">0767567567</td>
                                    <td class="p-2 font-bold text-[11px]">1404/2/30</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="md:hidden mt-3 space-y-3">
                        <div class="grid  text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                            <div>
                                <span class="text-gray-500">نام مشتری</span>
                                <div class="font-semibold mt-1">احمد عزیزی</div>
                            </div>
                            <div>
                                <span class="text-gray-500">مدل دستگاه</span>
                                <div class="font-semibold mt-1">سامسونگ A20</div>
                            </div>
                            <div>
                                <span class="text-gray-500">قیمت</span>
                                <div class="font-semibold mt-1">15000.000؋</div>
                            </div>
                            <div>
                                <span class="text-gray-500">شماره IMEI</span>
                                <div class="font-semibold mt-1">0767567567</div>
                            </div>
                            <div  class="text-center col-span-2">
                                <span class="text-gray-500">تاریخ فروش</span>
                                <div class="font-semibold mt-1">1404/2/30</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">‹</button>
                        <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs font-medium">1</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">2</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">...</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">25</button>
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">›</button>
                    </div>
                </div>
            </div>
            <div x-show="tab==='debts'" x-cloak>
                <h2 class="font-bold mb-3">قرض‌ها</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                    <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2  rounded-xl">
                        <table class="w-full text-center border-separate border-b border-[#1E40AF] border-spacing-0">
                            <tr>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">آیدی</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام مشتری</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">قرض‌ها </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مبلغ کل</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white"> مبلغ دریافت </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">تاریخ </th>
                            </tr>
                            <tbody class="text-[13px] ">
                                <tr>
                                    <td class="p-2 text-[11px] font-bold">1</td>
                                    <td class="p-2 text-[11px] font-bold">احمد عزیزی</td>
                                    <td class="p-2 text-[11px] font-bold">سامسونگ </td>
                                    <td class="p-2 text-[11px] font-bold">15000.000؋</td>
                                    <td class="p-2 text-[11px] font-bold">15000.000؋</td>
                                    <td class="p-2 text-[11px] font-bold">1404/2/30</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="md:hidden mt-3 space-y-3">
                        <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                            <div>
                                <span class="text-gray-500">نام مشتری</span>
                                <div class="font-semibold mt-1">احمد عزیزی</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قرض</span>
                                <div class="font-semibold mt-1">سامسونگ </div>
                            </div>
                            <div>
                                <span class="text-gray-500">قیمت کل</span>
                                <div class="font-semibold mt-1">15000.000؋</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قیمت پرداخت شده</span>
                                <div class="font-semibold mt-1">0767567567</div>
                            </div>
                            <div  class="text-center col-span-2">
                                <span class="text-gray-500">تاریخ فروش</span>
                                <div class="font-semibold mt-1">1404/2/30</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">‹</button>
                        <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs font-medium">1</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">2</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">...</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">25</button>
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">›</button>
                    </div>
                </div>
            </div>
            <div x-show="tab==='stock'" x-cloak>
                <h2 class="font-bold mb-3">موجودی دستگاه‌ها</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                    <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2  rounded-xl">
                        <table class="w-full text-center border-b border-[#1E40AF] border-separate border-spacing-0">
                            <tr>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">آیدی</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">عنوان </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مدل دستگاه </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white"> موجودی کل</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">  حالت  </th>
                            </tr>
                            <tbody class="text-[13px] ">
                                <tr>
                                    <td class="p-2 text-[11px] font-bold">1</td>
                                    <td class="p-2 text-[11px] font-bold">احمد عزیزی</td>
                                    <td class="p-2 text-[11px] font-bold">سامسونگ </td>
                                    <td class="p-2 text-[11px] font-bold">15000.000؋</td>
                                    <td class="p-2 text-[11px] font-bold">15000.000؋</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="md:hidden mt-3 space-y-3">
                        <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                            <div>
                                <span class="text-gray-500">نام مشتری</span>
                                <div class="font-semibold mt-1">احمد عزیزی</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قرض</span>
                                <div class="font-semibold mt-1">سامسونگ </div>
                            </div>
                            <div>
                                <span class="text-gray-500">قیمت کل</span>
                                <div class="font-semibold mt-1">15000.000؋</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قیمت پرداخت شده</span>
                                <div class="font-semibold mt-1">0767567567</div>
                            </div>
                            <div  class="text-center col-span-2">
                                <span class="text-gray-500">تاریخ فروش</span>
                                <div class="font-semibold mt-1">1404/2/30</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">‹</button>
                        <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs font-medium">1</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">2</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">...</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">25</button>
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">›</button>
                    </div>
                </div>
            </div>
            <div x-show="tab==='salary'" x-cloak>
                <h2 class="font-bold mb-3">معاش کارمندان</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 rounded-xl">
                    <table class="w-full text-center border-b border-[#1E40AF]  border-separate border-spacing-0">
                        <tr>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">آیدی</th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام کارمند</th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">تاریخ  دریافت  </th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مبلغ کل</th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">شغل </th>
                        </tr>
                        <tbody class="text-[13px] ">
                            <tr>
                                <td  class="p-2 text-[11px] font-bold ">1</td>
                                <td  class="p-2 text-[11px] font-bold ">احمد عزیزی</td>
                                <td  class="p-2 text-[11px] font-bold ">سامسونگ </td>
                                <td  class="p-2 text-[11px] font-bold ">15000.000؋</td>
                                <td  class="p-2 text-[11px] font-bold ">15000.000؋</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="md:hidden mt-3 space-y-3">
                    <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                        <div>
                            <span class="text-gray-500">نام مشتری</span>
                            <div class="font-semibold mt-1">احمد عزیزی</div>
                        </div>
                        <div>
                            <span class="text-gray-500"> قرض</span>
                            <div class="font-semibold mt-1">سامسونگ </div>
                        </div>
                        <div>
                            <span class="text-gray-500">قیمت کل</span>
                            <div class="font-semibold mt-1">15000.000؋</div>
                        </div>
                        <div>
                            <span class="text-gray-500"> قیمت پرداخت شده</span>
                            <div class="font-semibold mt-1">0767567567</div>
                        </div>
                        <div  class="text-center col-span-2">
                            <span class="text-gray-500">تاریخ فروش</span>
                            <div class="font-semibold mt-1">1404/2/30</div>
                        </div>
                    </div>
                </div>
                <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                    <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">‹</button>
                    <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs font-medium">1</button>
                    <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">2</button>
                    <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">...</button>
                    <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">25</button>
                    <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">›</button>
                </div>
            </div>
            </div>
            <div x-show="tab==='sold'" x-cloak>
                <h2 class="font-bold mb-3">دستگاه‌های فروخته شده</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                    <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 rounded-xl">
                        <table class="w-full text-center border-b border-[#1E40AF]  border-separate border-spacing-0">
                            <tr>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">آیدی</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام مشتری</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">قرض‌ها </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مبلغ کل</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white"> مبلغ دریافت </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">تاریخ </th>
                            </tr>
                            <tbody class="text-[11px] font-bold">
                                <tr>
                                    <td class="p-2">1</td>
                                    <td class="p-2">احمد عزیزی</td>
                                    <td class="p-2">سامسونگ </td>
                                    <td class="p-2">15000.000؋</td>
                                    <td class="p-2">15000.000؋</td>
                                    <td class="p-2">1404/2/30</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="md:hidden mt-3 space-y-3">
                        <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                            <div>
                                <span class="text-gray-500">نام مشتری</span>
                                <div class="font-semibold mt-1">احمد عزیزی</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قرض</span>
                                <div class="font-semibold mt-1">سامسونگ </div>
                            </div>
                            <div>
                                <span class="text-gray-500">قیمت کل</span>
                                <div class="font-semibold mt-1">15000.000؋</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قیمت پرداخت شده</span>
                                <div class="font-semibold mt-1">0767567567</div>
                            </div>
                            <div  class="text-center col-span-2">
                                <span class="text-gray-500">تاریخ فروش</span>
                                <div class="font-semibold mt-1">1404/2/30</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">‹</button>
                        <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs font-medium">1</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">2</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">...</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">25</button>
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">›</button>
                    </div>
                </div>
            </div>
            <div x-show="tab==='withdraw'" x-cloak>
                <h2 class="font-bold mb-3">برداشت‌ها</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                    <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2  rounded-xl">
                        <table class="w-full text-center border-b border-[#1E40AF] border-separate border-spacing-0">
                            <tr>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">آیدی</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام مشتری</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">قرض‌ها </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مبلغ کل</th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white"> مبلغ دریافت </th>
                                <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">تاریخ </th>
                            </tr>
                            <tbody class="text-[11px] font-bold">
                                <tr>
                                    <td class="p-2">1</td>
                                    <td class="p-2">احمد عزیزی</td>
                                    <td class="p-2">سامسونگ </td>
                                    <td class="p-2">15000.000؋</td>
                                    <td class="p-2">15000.000؋</td>
                                    <td class="p-2">1404/2/30</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="md:hidden mt-3 space-y-3">
                        <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                            <div>
                                <span class="text-gray-500">نام مشتری</span>
                                <div class="font-semibold mt-1">احمد عزیزی</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قرض</span>
                                <div class="font-semibold mt-1">سامسونگ </div>
                            </div>
                            <div>
                                <span class="text-gray-500">قیمت کل</span>
                                <div class="font-semibold mt-1">15000.000؋</div>
                            </div>
                            <div>
                                <span class="text-gray-500"> قیمت پرداخت شده</span>
                                <div class="font-semibold mt-1">0767567567</div>
                            </div>
                            <div  class="text-center col-span-2">
                                <span class="text-gray-500">تاریخ فروش</span>
                                <div class="font-semibold mt-1">1404/2/30</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">‹</button>
                        <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs font-medium">1</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">2</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">...</button>
                        <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">25</button>
                        <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">›</button>
                    </div>
                </div>
            </div>
            <div x-show="tab==='sales'" x-cloak>
                <h2 class="font-bold mb-3">گزارش فروشات</h2>
                <div class="bg-white p-4 rounded-xl shadow">
                <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2  rounded-xl">
                    <table class="w-full text-center border-b border-[#1E40AF] border-separate border-spacing-0">
                        <tr>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">آیدی</th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">نام مشتری</th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">قرض‌ها </th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white">مبلغ کل</th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white"> مبلغ دریافت </th>
                            <th class="p-2 text-[12px] bg-[#1E40AF] text-white ">تاریخ </th>
                        </tr>
                        <tbody class="text-[11px] font-bold">
                            <tr>
                                <td class="p-2">1</td>
                                <td class="p-2">احمد عزیزی</td>
                                <td class="p-2">سامسونگ </td>
                                <td class="p-2">15000.000؋</td>
                                <td class="p-2">15000.000؋</td>
                                <td class="p-2">1404/2/30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="md:hidden mt-3 space-y-3">
                    <div class="grid text-center grid-cols-2 gap-3 border border-[#1E40AF] rounded-xl p-3 text-[12px]">
                        <div>
                            <span class="text-gray-500">نام مشتری</span>
                            <div class="font-semibold mt-1">احمد عزیزی</div>
                        </div>
                        <div>
                            <span class="text-gray-500"> قرض</span>
                            <div class="font-semibold mt-1">سامسونگ </div>
                        </div>
                        <div>
                            <span class="text-gray-500">قیمت کل</span>
                            <div class="font-semibold mt-1">15000.000؋</div>
                        </div>
                        <div>
                            <span class="text-gray-500"> قیمت پرداخت شده</span>
                            <div class="font-semibold mt-1">0767567567</div>
                        </div>
                        <div  class="text-center col-span-2">
                            <span class="text-gray-500">تاریخ فروش</span>
                            <div class="font-semibold mt-1">1404/2/30</div>
                        </div>
                    </div>
                </div>
                <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                    <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">‹</button>
                    <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs font-medium">1</button>
                    <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">2</button>
                    <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">...</button>
                    <button class="w-7 h-7 rounded-md border border-transparent bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white text-xs">25</button>
                    <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#1E40AF]/60 hover:bg-[#1E40AF] text-white">›</button>
                </div>
            </div>
        </section>
    </div>
<div>
