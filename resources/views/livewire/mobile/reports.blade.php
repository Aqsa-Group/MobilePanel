<div>
      <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
<div x-data="{ tab: 'invoice' }" class="max-w-full ">

    <!-- ====== BUTTONS ====== -->
    <section class="p-4 bg-gray-200/40 rounded-xl">
        <span class="font-bold block mb-4">نوع گزارش:</span>
        <!-- Desktop -->
        <div class="hidden md:grid grid-cols-4 gap-4">
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
                    :class="tab===item.id ? 'bg-blue-600 text-white' : 'bg-white'"
                    class="h-[30px] rounded-xl shadow text-sm font-medium transition">
                    <span x-text="item.label"></span>
                </button>
            </template>
        </div>

        <!-- Mobile -->
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
                    :class="tab===item.id ? 'bg-blue-600 text-white' : 'bg-white'"
                    class="h-[60px] rounded-xl shadow text-xs transition">
                    <span x-text="item.label"></span>
                </button>
            </template>
        </div>
    </section>

    <!-- ====== CONTENT ====== -->
    <section class="mt-6 p-4 bg-gray-200/40 rounded-xl">
        <div class="w-full h-auto p-2 flex flex-row justify-between text-[20px]">
            <div>
                <span class="my-2 mb-6 font-bold">نتایج گزارش:</span>
                <span class=" text-[12px] text-center px-3 py-1 rounded-xl bg-[#0B35CC] text-white">
                    20 مورد
                </span>
            </div>
            <div class="flex flex-wrap md:flex-nowrap gap-3 text-[10px]">
                <div class="flex flex-row justify-center items-center px-4 bg-[#0948EE]/20 rounded-xl gap-1 h-[25px] md:h-[40px] w-fit">
                    <button class="flex flex-row items-center gap-1 px-2">
                       <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-8 h-8" viewBox="0 0 48 48">
                        <path fill="#4CAF50" d="M41,10H25v28h16c0.553,0,1-0.447,1-1V11C42,10.447,41.553,10,41,10z"></path><path fill="#FFF" d="M32 15H39V18H32zM32 25H39V28H32zM32 30H39V33H32zM32 20H39V23H32zM25 15H30V18H25zM25 25H30V28H25zM25 30H30V33H25zM25 20H30V23H25z"></path><path fill="#2E7D32" d="M27 42L6 38 6 10 27 6z"></path><path fill="#FFF" d="M19.129,31l-2.411-4.561c-0.092-0.171-0.186-0.483-0.284-0.938h-0.037c-0.046,0.215-0.154,0.541-0.324,0.979L13.652,31H9.895l4.462-7.001L10.274,17h3.837l2.001,4.196c0.156,0.331,0.296,0.725,0.42,1.179h0.04c0.078-0.271,0.224-0.68,0.439-1.22L19.237,17h3.515l-4.199,6.939l4.316,7.059h-3.74V31z"></path>
                        </svg>
                        <span>چاپ کردن به اکسل</span>
                    </button>
                </div>
                <div class="flex flex-row justify-center items-center px-4 bg-[#0948EE]/20 rounded-xl gap-1 h-[25px] md:h-[40px] w-fit">
                    <button class="flex flex-row items-center gap-1 px-2">
                        <svg class="w-8 h-8" viewBox="0 0 500 615" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 25C0 11.1929 11.1929 0 25 0H359.889C366.461 0 372.769 2.58794 377.447 7.20375L492.558 120.776C497.32 125.473 500 131.883 500 138.572V590C500 603.807 488.807 615 475 615H25C11.1929 615 0 603.807 0 590V25Z" fill="url(#paint0_linear_1_401)"/>
                        <path d="M0 590V25C6.81751e-06 11.4087 10.8457 0.350186 24.3545 0.0078125L25 0H359.889L360.504 0.0078125C366.853 0.163882 372.915 2.73245 377.447 7.2041L492.559 120.775C497.32 125.473 500 131.884 500 138.572V590L499.992 590.646C499.655 603.94 488.94 614.655 475.646 614.992L475 615V614C488.255 614 499 603.255 499 590V138.572C499 132.151 496.427 125.997 491.856 121.487L376.745 7.91602C372.254 3.48484 366.198 1 359.889 1H25C11.7452 1 1.00001 11.7452 1 25V590C1 603.255 11.7452 614 25 614V615L24.3545 614.992C11.0602 614.655 0.34475 603.94 0.0078125 590.646L0 590ZM475 614V615H25V614H475Z" fill="#E4E4E4"/>
                        <path d="M0 420H500V590C500 603.807 488.807 615 475 615H25C11.1929 615 0 603.807 0 590V420Z" fill="#FF2116"/>
                        <path d="M216.622 107.89C218.074 81.6565 250.487 78.4629 258.952 107.89C265.725 131.431 254.834 169.252 247.9 196.258C254.834 212.137 277.485 241.564 290.985 254.566C336.06 247.723 361.458 248.486 378.162 256.391C400.814 267.113 396.009 293.49 374.043 295.626C355.281 297.451 327.594 295.626 288.239 263.006C278.019 264.375 247.557 270.26 211.131 282.852C197.174 305.207 177.724 335.782 161.25 349.005C134.251 370.675 113.887 363.604 108.167 351.742C100.387 330.756 131.963 311.138 189.394 282.852C198.47 264.907 219.414 220.03 230.579 184.079C225.698 172.445 214.792 140.966 216.622 107.89ZM181.615 295.17C103.362 328.835 107.023 351.514 121.667 353.795C136.311 356.076 154.386 337.599 181.615 295.17ZM373.128 275.096C372.213 253.654 339.264 253.653 296.248 260.953C346.357 296.539 373.128 290.152 373.128 275.096ZM244.08 204.837C231.998 240.423 220.283 265.44 215.936 273.5C248.518 263.463 274.359 258.064 283.206 256.619C265.084 236.18 249.571 213.581 244.08 204.837ZM234.698 172.673C253.689 112.223 247.283 93.062 232.868 95.1148C217.767 97.6241 219.826 140.509 234.698 172.673Z" fill="#FF2116"/>
                        <path d="M322.585 467.578V560H305.129V467.578H322.585ZM359.846 507.505V521.279H318.015V507.505H359.846ZM364.733 467.578V481.353H318.015V467.578H364.733Z" fill="white"/>
                        <path d="M248.063 560H228.132L228.259 546.289H248.063C253.438 546.289 257.945 545.104 261.584 542.734C265.223 540.322 267.974 536.873 269.836 532.388C271.698 527.86 272.629 522.443 272.629 516.138V511.377C272.629 506.51 272.1 502.215 271.042 498.491C269.984 494.767 268.418 491.636 266.345 489.097C264.313 486.558 261.796 484.632 258.791 483.32C255.786 482.008 252.338 481.353 248.444 481.353H227.751V467.578H248.444C254.623 467.578 260.251 468.615 265.329 470.688C270.45 472.762 274.872 475.745 278.596 479.639C282.362 483.49 285.24 488.102 287.229 493.477C289.26 498.851 290.275 504.86 290.275 511.504V516.138C290.275 522.739 289.26 528.748 287.229 534.165C285.24 539.539 282.362 544.152 278.596 548.003C274.872 551.854 270.428 554.816 265.266 556.89C260.103 558.963 254.369 560 248.063 560ZM237.907 467.578V560H220.451V467.578H237.907Z" fill="white"/>
                        <path d="M172.59 526.294H148.786V512.583H172.59C176.483 512.583 179.636 511.948 182.048 510.679C184.502 509.367 186.301 507.59 187.443 505.347C188.586 503.062 189.157 500.459 189.157 497.539C189.157 494.704 188.586 492.059 187.443 489.604C186.301 487.15 184.502 485.161 182.048 483.638C179.636 482.114 176.483 481.353 172.59 481.353H154.499V560H137.043V467.578H172.59C179.784 467.578 185.92 468.869 190.998 471.45C196.118 473.989 200.012 477.523 202.678 482.051C205.386 486.536 206.74 491.657 206.74 497.412C206.74 503.379 205.386 508.521 202.678 512.837C200.012 517.153 196.118 520.475 190.998 522.803C185.92 525.13 179.784 526.294 172.59 526.294Z" fill="white"/>
                        <defs>
                        <linearGradient id="paint0_linear_1_401" x1="250" y1="-80.5" x2="250" y2="519.5" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#F0F0F0"/>
                        <stop offset="1" stop-color="#F8F8F8"/>
                        </linearGradient>
                        </defs>
                        </svg>

                        <span>چاپ کردن به پی دی اف</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- فاکتور فروش -->
        <div x-show="tab==='invoice'" x-cloak>
            <h2 class="font-bold mb-3">فاکتور فروش</h2>
            <div class="bg-white p-4 rounded-xl shadow">
                           <!-- TABLE (Laptop) -->
                <div x-show="tab==='one'" x-cloak class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 border border-[#0948EE] rounded-xl">
                    <table class="w-full text-center border-separate border-spacing-0">
                        <tr>
                            <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tr-xl">#</th>
                            <th class="p-2 text-[14px] bg-[#0948EE] text-white">نام مشتری</th>
                            <th class="p-2 text-[14px] bg-[#0948EE] text-white">مدل دستگاه</th>
                            <th class="p-2 text-[14px] bg-[#0948EE] text-white">قیمت</th>
                            <th class="p-2 text-[14px] bg-[#0948EE] text-white">شماره IMEI</th>
                            <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tl-xl">تاریخ فروش</th>
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
                <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 border border-[#0948EE] rounded-xl">
                            <table class="w-full text-center border-separate border-spacing-0">
                                <tr>
                                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tr-xl">#</th>
                                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">نام مشتری</th>
                                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">مدل دستگاه</th>
                                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">قیمت</th>
                                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">شماره IMEI</th>
                                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tl-xl">تاریخ فروش</th>
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
                <!-- MOBILE CARDS -->
                <div class="md:hidden mt-3 space-y-3">
                    <div class="grid grid-cols-2 gap-3 border border-[#0948EE] rounded-xl p-3 text-[12px]">
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
                        <div>
                            <span class="text-gray-500">تاریخ فروش</span>
                            <div class="font-semibold mt-1">1404/2/30</div>
                        </div>
                        <div>
                            <span class="text-gray-500">شماره</span>
                            <div class="font-semibold mt-1">1</div>
                        </div>
                    </div>

                </div>
                <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                    <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
                    <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
                    <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
                    <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
                    <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
                    <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
                </div>
            </div>
        </div>

        <!-- قرض‌ها -->
        <div x-show="tab==='debts'" x-cloak>
            <h2 class="font-bold mb-3">قرض‌ها</h2>
            <div class="bg-white p-4 rounded-xl shadow">

        <!-- TABLE (Laptop) -->


          <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 border border-[#0948EE] rounded-xl">
            <table class="w-full text-center border-separate border-spacing-0">
                <tr>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tr-xl">#</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">نام مشتری</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">قرض‌ها </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">مبلغ کل</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white"> مبلغ دریافت </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tl-xl">تاریخ </th>
                </tr>
                <tbody class="text-[13px] font-semibold">
                    <tr>
                        <td>1</td>
                        <td>احمد عزیزی</td>
                        <td>سامسونگ </td>
                        <td>15000.000؋</td>
                        <td>15000.000؋</td>
                        <td>1404/2/30</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- صفحه بندی -->

        <!-- MOBILE CARDS -->
        <div class="md:hidden mt-3 space-y-3">
            <div class="grid grid-cols-2 gap-3 border border-[#0948EE] rounded-xl p-3 text-[12px]">
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
                <div>
                    <span class="text-gray-500">تاریخ فروش</span>
                    <div class="font-semibold mt-1">1404/2/30</div>
                </div>
                <div>
                    <span class="text-gray-500">شماره</span>
                    <div class="font-semibold mt-1">1</div>
                </div>
            </div>

        </div>
        <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
            <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
        </div>
            </div>
        </div>

        <!-- موجودی -->
        <div x-show="tab==='stock'" x-cloak>
            <h2 class="font-bold mb-3">موجودی دستگاه‌ها</h2>
            <div class="bg-white p-4 rounded-xl shadow">
                         <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 border border-[#0948EE] rounded-xl">
            <table class="w-full text-center border-separate border-spacing-0">
                <tr>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tr-xl">#</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">عنوان </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">مدل دستگاه </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white"> موجودی کل</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">  حالت  </th>
                </tr>
                <tbody class="text-[13px] font-semibold">
                    <tr>
                        <td>1</td>
                        <td>احمد عزیزی</td>
                        <td>سامسونگ </td>
                        <td>15000.000؋</td>
                        <td>15000.000؋</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- صفحه بندی -->

        <!-- MOBILE CARDS -->
        <div class="md:hidden mt-3 space-y-3">
            <div class="grid grid-cols-2 gap-3 border border-[#0948EE] rounded-xl p-3 text-[12px]">
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
                <div>
                    <span class="text-gray-500">تاریخ فروش</span>
                    <div class="font-semibold mt-1">1404/2/30</div>
                </div>
                <div>
                    <span class="text-gray-500">شماره</span>
                    <div class="font-semibold mt-1">1</div>
                </div>
            </div>

        </div>
        <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
            <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
        </div>
            </div>
        </div>
        <!-- معاش -->
        <div x-show="tab==='salary'" x-cloak>
                <h2 class="font-bold mb-3">معاش کارمندان</h2>
                <div class="bg-white p-4 rounded-xl shadow">

          <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 border border-[#0948EE] rounded-xl">
            <table class="w-full text-center border-separate border-spacing-0">
                <tr>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tr-xl">#</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">نام کارمند</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">تاریخ  دریافت  </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">مبلغ کل</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tl-xl">شغل </th>
                </tr>
                <tbody class="text-[13px] font-semibold">
                    <tr>
                        <td>1</td>
                        <td>احمد عزیزی</td>
                        <td>سامسونگ </td>
                        <td>15000.000؋</td>
                        <td>15000.000؋</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- صفحه بندی -->

        <!-- MOBILE CARDS -->
        <div class="md:hidden mt-3 space-y-3">
            <div class="grid grid-cols-2 gap-3 border border-[#0948EE] rounded-xl p-3 text-[12px]">
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
                <div>
                    <span class="text-gray-500">تاریخ فروش</span>
                    <div class="font-semibold mt-1">1404/2/30</div>
                </div>
                <div>
                    <span class="text-gray-500">شماره</span>
                    <div class="font-semibold mt-1">1</div>
                </div>
            </div>

        </div>
        <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
            <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
        </div>
        </div>

        <!-- فروخته شده -->
        <div x-show="tab==='sold'" x-cloak>
            <h2 class="font-bold mb-3">دستگاه‌های فروخته شده</h2>
            <div class="bg-white p-4 rounded-xl shadow">
                          <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 border border-[#0948EE] rounded-xl">
            <table class="w-full text-center border-separate border-spacing-0">
                <tr>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tr-xl">#</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">نام مشتری</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">قرض‌ها </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">مبلغ کل</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white"> مبلغ دریافت </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tl-xl">تاریخ </th>
                </tr>
                <tbody class="text-[13px] font-semibold">
                    <tr>
                        <td>1</td>
                        <td>احمد عزیزی</td>
                        <td>سامسونگ </td>
                        <td>15000.000؋</td>
                        <td>15000.000؋</td>
                        <td>1404/2/30</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- صفحه بندی -->

        <!-- MOBILE CARDS -->
        <div class="md:hidden mt-3 space-y-3">
            <div class="grid grid-cols-2 gap-3 border border-[#0948EE] rounded-xl p-3 text-[12px]">
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
                <div>
                    <span class="text-gray-500">تاریخ فروش</span>
                    <div class="font-semibold mt-1">1404/2/30</div>
                </div>
                <div>
                    <span class="text-gray-500">شماره</span>
                    <div class="font-semibold mt-1">1</div>
                </div>
            </div>

        </div>
        <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
            <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
        </div>
            </div>
        </div>

        <!-- برداشت -->
        <div x-show="tab==='withdraw'" x-cloak>
            <h2 class="font-bold mb-3">برداشت‌ها</h2>
            <div class="bg-white p-4 rounded-xl shadow">
          <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 border border-[#0948EE] rounded-xl">
            <table class="w-full text-center border-separate border-spacing-0">
                <tr>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tr-xl">#</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">نام مشتری</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">قرض‌ها </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">مبلغ کل</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white"> مبلغ دریافت </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tl-xl">تاریخ </th>
                </tr>
                <tbody class="text-[13px] font-semibold">
                    <tr>
                        <td>1</td>
                        <td>احمد عزیزی</td>
                        <td>سامسونگ </td>
                        <td>15000.000؋</td>
                        <td>15000.000؋</td>
                        <td>1404/2/30</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- صفحه بندی -->

        <!-- MOBILE CARDS -->
        <div class="md:hidden mt-3 space-y-3">
            <div class="grid grid-cols-2 gap-3 border border-[#0948EE] rounded-xl p-3 text-[12px]">
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
                <div>
                    <span class="text-gray-500">تاریخ فروش</span>
                    <div class="font-semibold mt-1">1404/2/30</div>
                </div>
                <div>
                    <span class="text-gray-500">شماره</span>
                    <div class="font-semibold mt-1">1</div>
                </div>
            </div>

        </div>
        <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
            <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
        </div>
    </div>
        </div>

        <!-- گزارش فروشات -->
        <div x-show="tab==='sales'" x-cloak>
            <h2 class="font-bold mb-3">گزارش فروشات</h2>
            <div class="bg-white p-4 rounded-xl shadow">
          <div  class="hidden md:flex flex-col justify-center w-full h-auto gap-1 mt-2 border border-[#0948EE] rounded-xl">
            <table class="w-full text-center border-separate border-spacing-0">
                <tr>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tr-xl">#</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">نام مشتری</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">قرض‌ها </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white">مبلغ کل</th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white"> مبلغ دریافت </th>
                    <th class="p-2 text-[14px] bg-[#0948EE] text-white rounded-tl-xl">تاریخ </th>
                </tr>
                <tbody class="text-[13px] font-semibold">
                    <tr>
                        <td>1</td>
                        <td>احمد عزیزی</td>
                        <td>سامسونگ </td>
                        <td>15000.000؋</td>
                        <td>15000.000؋</td>
                        <td>1404/2/30</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- صفحه بندی -->

        <!-- MOBILE CARDS -->
        <div class="md:hidden mt-3 space-y-3">
            <div class="grid grid-cols-2 gap-3 border border-[#0948EE] rounded-xl p-3 text-[12px]">
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
                <div>
                    <span class="text-gray-500">تاریخ فروش</span>
                    <div class="font-semibold mt-1">1404/2/30</div>
                </div>
                <div>
                    <span class="text-gray-500">شماره</span>
                    <div class="font-semibold mt-1">1</div>
                </div>
            </div>

        </div>
        <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
            <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
            <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
            <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
        </div>
        </div>
        </div>

    </section>

</div>

</div>
<div>
