<div class="w-full">
    <div class="py-4 px-4 max-w-full mx-auto md:px-0">
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 w-full">
            <div class="bg-[#0B35CC]/10 w-full rounded-2xl space-y-3 p-4 border-r-[3px] border-[#0B35CC] shadow-xl shadow-[0px_4px_4px_0px_#00000040] ">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-sm md:text-base">کل معاش سالانه</h1>
                    <div class="bg-[#0B35CC33] rounded-full p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 11V9C2 5.5 4 4 7 4H17C20 4 22 5.5 22 9V15C22 18.5 20 20 17 20H12" stroke="#0B35CC" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 14.5C13.3807 14.5 14.5 13.3807 14.5 12C14.5 10.6193 13.3807 9.5 12 9.5C10.6193 9.5 9.5 10.6193 9.5 12C9.5 13.3807 10.6193 14.5 12 14.5Z" stroke="#0B35CC" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5 9.5V14.5" stroke="#0B35CC" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 15.5H7.34003C7.98003 15.5 8.5 16.02 8.5 16.66V17.94" stroke="#0B35CC" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.21997 14.2803L2 15.5002L3.21997 16.7202" stroke="#0B35CC" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.5 20.7798H3.15997C2.51997 20.7798 2 20.2598 2 19.6198V18.3398" stroke="#0B35CC" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.28125 22.0005L8.50122 20.7806L7.28125 19.5605" stroke="#0B35CC" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h1 class="font-bold text-lg md:text-xl">{{ number_format($totalSalary) }}؋</h1>
                    <h1 class="text-xs md:text-sm">معاش سالانه کارمند</h1>
                </div>
            </div>
            <div class="bg-[#0099FF]/10 w-full rounded-2xl space-y-3 p-4 border-r-[3px] border-[#0099FF] shadow-xl shadow-[0px_4px_4px_0px_#00000040] ">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-sm md:text-base">کل مبلغ پرداختی</h1>
                    <div class="bg-[#0099FF33] rounded-full p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#0099FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.3511 10.9101C14.2511 11.6201 13.8311 12.2201 13.2511 12.5801V14.5601C13.2511 15.2501 12.6911 15.8101 12.0011 15.8101C11.3111 15.8101 10.7511 15.2501 10.7511 14.5601V12.5801C10.1711 12.2201 9.75109 11.6201 9.65109 10.9101C9.63109 10.8001 9.62109 10.6801 9.62109 10.5601C9.62109 9.04012 11.0611 7.86012 12.6411 8.28012C13.4411 8.49012 14.0911 9.14012 14.3011 9.94012C14.3911 10.2701 14.4011 10.6001 14.3511 10.9101Z" stroke="#0099FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22.0016 10.9102H14.3516" stroke="#0099FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.64999 10.9102H2" stroke="#0099FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h1 class="font-bold text-lg md:text-xl">{{ number_format($totalPaid) }}؋</h1>
                    <h1 class="text-xs md:text-sm">کل پرداخت انجام شده</h1>
                </div>
            </div>
            <div class="bg-[#31009B]/10 w-full rounded-2xl space-y-3 p-4 border-r-[3px] border-[#31009B] shadow-xl shadow-[0px_4px_4px_0px_#00000040] ">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-sm md:text-base">مانده معاش سالانه</h1>
                    <div class="bg-[#31009B33] rounded-full p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 11.1504H7" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 11.1498V6.52985C2 4.48985 3.65 2.83984 5.69 2.83984H11.31C13.35 2.83984 15 4.10984 15 6.14984" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.48 12.2004C16.98 12.6804 16.74 13.4204 16.94 14.1804C17.19 15.1104 18.11 15.7004 19.07 15.7004H20V17.1504C20 19.3604 18.21 21.1504 16 21.1504H6C3.79 21.1504 2 19.3604 2 17.1504V10.1504C2 7.94039 3.79 6.15039 6 6.15039H16C18.2 6.15039 20 7.95039 20 10.1504V11.6003H18.92C18.36 11.6003 17.85 11.8204 17.48 12.2004Z" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22.0002 12.6196V14.6796C22.0002 15.2396 21.5402 15.6996 20.9702 15.6996H19.0402C17.9602 15.6996 16.9702 14.9097 16.8802 13.8297C16.8202 13.1997 17.0602 12.6096 17.4802 12.1996C17.8502 11.8196 18.3602 11.5996 18.9202 11.5996H20.9702C21.5402 11.5996 22.0002 12.0596 22.0002 12.6196Z" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h1 class="font-bold text-lg md:text-xl">{{ number_format($remainingSalary) }}؋</h1>
                    <h1 class="text-xs md:text-sm">مبلغ باقی مانده برای پرداخت</h1>
                </div>
            </div>
            <div class="bg-[#3A64D0]/10 w-full rounded-2xl space-y-3 p-4 border-r-[3px] border-[#3A64D0] shadow-xl shadow-[0px_4px_4px_0px_#00000040] ">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-sm md:text-base">درصد پرداخت سالانه</h1>
                    <div class="bg-[#3A64D033] rounded-full p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z" stroke="#3A64D0" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 7V21C2 21.83 2.94 22.3 3.6 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.29 22.29C8.68 22.68 9.32 22.68 9.71 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z" stroke="#3A64D0" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.27002 13.7295L11.73 8.26953" stroke="#3A64D0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.9247 13.5H11.9337" stroke="#3A64D0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.1947 8.5H6.20368" stroke="#3A64D0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h1 class="font-bold text-lg md:text-xl">{{ $paymentPercentage }}%</h1>
                    <h1 class="text-xs md:text-sm">درصد پرداخت شده از کل معاش</h1>
                </div>
            </div>
            <div class="bg-[#0066E4]/10 w-full rounded-2xl space-y-3 p-4 border-r-[3px] border-[#0066E4] shadow-xl shadow-[0px_4px_4px_0px_#00000040] ">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-sm md:text-base">معاش ماهانه</h1>
                    <div class="bg-[#0066E433] rounded-full p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.74 17.7504H17.66C17.57 17.8304 17.48 17.9004 17.39 17.9804L13.12 21.1803C11.71 22.2303 9.41001 22.2303 7.99001 21.1803L3.71001 17.9804C2.77001 17.2804 2 15.7304 2 14.5604V7.15035C2 5.93035 2.93001 4.58035 4.07001 4.15035L9.05 2.28035C9.87 1.97035 11.23 1.97035 12.05 2.28035L17.02 4.15035C17.97 4.51035 18.78 5.51035 19.03 6.53035H11.73C11.51 6.53035 11.31 6.54036 11.12 6.54036C9.27 6.65036 8.78999 7.32035 8.78999 9.43035V14.8603C8.79999 17.1603 9.39001 17.7504 11.74 17.7504Z" stroke="#0066E4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.80005 11.2207H22" stroke="#0066E4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 9.42075V14.9707C21.98 17.1907 21.37 17.7407 19.06 17.7407H11.7401C9.39005 17.7407 8.80005 17.1507 8.80005 14.8407V9.41074C8.80005 7.31074 9.28005 6.64072 11.1301 6.52072C11.3201 6.52072 11.5201 6.51074 11.7401 6.51074H19.06C21.41 6.52074 22 7.10075 22 9.42075Z" stroke="#0066E4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.3201 15.2607H12.6501" stroke="#0066E4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.75 15.2607H18.02" stroke="#0066E4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h1 class="font-bold text-lg md:text-xl">{{ number_format($monthlySalary) }}؋</h1>
                    <h1 class="text-xs md:text-sm">معاش ماهوار کارمند</h1>
                </div>
            </div>
            <div class="bg-[#00DFAE]/10 w-full rounded-2xl space-y-3 p-4 border-r-[3px] border-[#00DFAE] shadow-xl shadow-[0px_4px_4px_0px_#00000040] ">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-sm md:text-base">پرداختی 30گذشته</h1>
                    <div class="bg-[#00DFAE33] rounded-full p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 11.1504H7" stroke="#00DFAE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 11.1498V6.52985C2 4.48985 3.65 2.83984 5.69 2.83984H11.31C13.35 2.83984 15 4.10984 15 6.14984" stroke="#00DFAE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.48 12.2004C16.98 12.6804 16.74 13.4204 16.94 14.1804C17.19 15.1104 18.11 15.7004 19.07 15.7004H20V17.1504C20 19.3604 18.21 21.1504 16 21.1504H6C3.79 21.1504 2 19.3604 2 17.1504V10.1504C2 7.94039 3.79 6.15039 6 6.15039H16C18.2 6.15039 20 7.95039 20 10.1504V11.6003H18.92C18.36 11.6003 17.85 11.8204 17.48 12.2004Z" stroke="#00DFAE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22.0002 12.6196V14.6796C22.0002 15.2396 21.5402 15.6996 20.9702 15.6996H19.0402C17.9602 15.6996 16.9702 14.9097 16.8802 13.8297C16.8202 13.1997 17.0602 12.6096 17.4802 12.1996C17.8502 11.8196 18.3602 11.5996 18.9202 11.5996H20.9702C21.5402 11.5996 22.0002 12.0596 22.0002 12.6196Z" stroke="#00DFAE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h1 class="font-bold text-lg md:text-xl">{{ number_format($last30DaysPayment) }}؋</h1>
                    <h1 class="text-xs md:text-sm">پرداختی 30روز گذشته</h1>
                </div>
            </div>
            <div class="bg-[#009B10]/10 w-full rounded-2xl space-y-3 p-4 border-r-[3px] border-[#009B10] shadow-xl shadow-[0px_4px_4px_0px_#00000040] ">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-sm md:text-base">مانده معاش ماهانه</h1>
                    <div class="bg-[#009B1033] rounded-full p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 11.1504H7" stroke="#009B10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 11.1498V6.52985C2 4.48985 3.65 2.83984 5.69 2.83984H11.31C13.35 2.83984 15 4.10984 15 6.14984" stroke="#009B10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.48 12.2004C16.98 12.6804 16.74 13.4204 16.94 14.1804C17.19 15.1104 18.11 15.7004 19.07 15.7004H20V17.1504C20 19.3604 18.21 21.1504 16 21.1504H6C3.79 21.1504 2 19.3604 2 17.1504V10.1504C2 7.94039 3.79 6.15039 6 6.15039H16C18.2 6.15039 20 7.95039 20 10.1504V11.6003H18.92C18.36 11.6003 17.85 11.8204 17.48 12.2004Z" stroke="#009B10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22.0002 12.6196V14.6796C22.0002 15.2396 21.5402 15.6996 20.9702 15.6996H19.0402C17.9602 15.6996 16.9702 14.9097 16.8802 13.8297C16.8202 13.1997 17.0602 12.6096 17.4802 12.1996C17.8502 11.8196 18.3602 11.5996 18.9202 11.5996H20.9702C21.5402 11.5996 22.0002 12.0596 22.0002 12.6196Z" stroke="#009B10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h1 class="font-bold text-lg md:text-xl">{{ number_format($remainingMonthlySalary) }}؋</h1>
                    <h1 class="text-xs md:text-sm">مبلغ باقی مانده این ماه</h1>
                </div>
            </div>
            <div class="bg-[#1D4385]/10 w-full rounded-2xl space-y-3 p-4 border-r-[3px] border-[#1D4385] shadow-xl shadow-[0px_4px_4px_0px_#00000040] ">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-sm md:text-base">درصد پرداخت ماهانه</h1>
                    <div class="bg-[#1D438533] rounded-full p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.57031 15.2704L15.1103 8.73047" stroke="#1D4385" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.98001 10.3701C9.65932 10.3701 10.21 9.81948 10.21 9.14017C10.21 8.46086 9.65932 7.91016 8.98001 7.91016C8.3007 7.91016 7.75 8.46086 7.75 9.14017C7.75 9.81948 8.3007 10.3701 8.98001 10.3701Z" stroke="#1D4385" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.52 16.0899C16.1993 16.0899 16.75 15.5392 16.75 14.8599C16.75 14.1806 16.1993 13.6299 15.52 13.6299C14.8407 13.6299 14.29 14.1806 14.29 14.8599C14.29 15.5392 14.8407 16.0899 15.52 16.0899Z" stroke="#1D4385" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#1D4385" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h1 class="font-bold text-lg md:text-xl">{{ $monthlyPaymentPercentage }}%</h1>
                    <h1 class="text-xs md:text-sm">درصد پرداخت شده این ماه</h1>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1  lg:grid-cols-3 gap-3 pt-2">
            <div class="border  border-gray-300 rounded-2xl shadow-xl p-3">
                 @if (session()->has('message'))
                <div class="bg-green-500 text-white px-4 py-2 rounded mb-3">
                    {{ session('message') }}
                </div>
                @endif
                @if (session()->has('error'))
                    <div class="bg-red-500 text-white px-4 py-2 rounded mb-3">
                        {{ session('error') }}
                    </div>
                @endif
                <select wire:model="employee_id"
                        class="w-full rounded-xl border border  border-gray-300 border-gray-900 p-4 text-sm mb-3">
                    <option value="">انتخاب کارمند</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
                @error('employee_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-3">
                    <div class="border rounded-xl p-4 border-gray-900 flex items-center gap-2">
                        <input wire:model="amount" type="text" class="w-full bg-transparent focus:outline-none text-sm no-spinner" placeholder="مبلغ">
                        <i>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_974_3657)">
                                    <path d="M7.22656 11.9412C7.22656 13.0162 8.05156 13.8829 9.07656 13.8829H11.1682C12.0599 13.8829 12.7849 13.1245 12.7849 12.1912C12.7849 11.1745 12.3432 10.8162 11.6849 10.5829L8.32656 9.41621C7.66823 9.18288 7.22656 8.82454 7.22656 7.80788C7.22656 6.87454 7.95156 6.11621 8.84323 6.11621H10.9349C11.9599 6.11621 12.7849 6.98288 12.7849 8.05788" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 5V15" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.99984 18.3337C14.6022 18.3337 18.3332 14.6027 18.3332 10.0003C18.3332 5.39795 14.6022 1.66699 9.99984 1.66699C5.39746 1.66699 1.6665 5.39795 1.6665 10.0003C1.6665 14.6027 5.39746 18.3337 9.99984 18.3337Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_974_3657">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </i>
                    </div>
                    <div class="border rounded-xl p-4 border-gray-900 flex items-center gap-2">
                        <input wire:model="payment_date" readonly type="text"  class="w-full bg-transparent focus:outline-none text-sm">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentcolor" d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z"/><path fill="currentColor" fill-rule="evenodd" d="M22 12c0-.839 0-1.585-.013-2.25H2.013C2 10.415 2 11.161 2 12v2c0 3.771 0 5.657 1.172 6.828S6.229 22 10 22h4c3.771 0 5.657 0 6.828-1.172S22 17.771 22 14zm-8 .25A1.75 1.75 0 0 0 12.25 14v2a1.75 1.75 0 1 0 3.5 0v-2A1.75 1.75 0 0 0 14 12.25m0 1.5a.25.25 0 0 0-.25.25v2a.25.25 0 1 0 .5 0v-2a.25.25 0 0 0-.25-.25m-3.213-1.443a.75.75 0 0 1 .463.693v4a.75.75 0 0 1-1.5 0v-2.19l-.22.22a.75.75 0 0 1-1.06-1.06l1.5-1.5a.75.75 0 0 1 .817-.163" clip-rule="evenodd"/></svg>
                        </i>
                    </div>
                    @error('amount') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <textarea wire:model="description"  class="w-full rounded-xl border border  border-gray-300 border-gray-900 p-2 text-sm h-28 mb-3"   placeholder="توضیحات..."></textarea>
                    @error('description')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                <div class="grid grid-cols-2 gap-2">
                    <button wire:click="resetForm" class="bg-red-800 hover:bg-red-700 text-white  rounded-xl py-3 text-sm">
                    انصراف
                    </button>
                    <button wire:click.prevent="submit"  class="bg-blue-800 hover:bg-blue-700 text-white rounded-xl py-3 text-sm ">
                       {{ $edit_id ? 'بروزرسانی' : 'ثبت' }}
                    </button>
                </div>
            </div>
            <div class="lg:col-span-2 border  border-gray-300 rounded-2xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl border border-gray-200 w-full lg:max-w-full p-3">
                <div class="lg:hidden space-y-3 ">
                    <div class="flex justify-between items-center mb-3 flex-wrap gap-2">
                        <div class="flex items-center gap-1 flex-shrink-0">
                            <i>
                                <svg width="20" height="20" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1047_2670)">
                                    <path d="M34.4314 16.596L32.8736 23.2407C31.5383 28.9792 28.8995 31.3001 23.9398 30.8232C23.145 30.7596 22.2866 30.6166 21.3646 30.394L18.694 29.7582C12.0652 28.1844 10.0146 24.9098 11.5725 18.2651L13.1303 11.6045C13.4482 10.2533 13.8297 9.07698 14.3066 8.1073C16.1665 4.26038 19.3299 3.22712 24.6393 4.48293L27.294 5.10289C33.9545 6.66073 35.9893 9.95128 34.4314 16.596Z" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M23.9399 30.8233C22.9543 31.491 21.7144 32.0474 20.2043 32.5401L17.6926 33.3668C11.3818 35.4015 8.05944 33.7006 6.00881 27.3897L3.97408 21.1107C1.93934 14.7998 3.62436 11.4616 9.93522 9.42682L12.4468 8.60021C13.0986 8.39356 13.7186 8.2187 14.3067 8.10742C13.8298 9.0771 13.4483 10.2534 13.1304 11.6046L11.5725 18.2652C10.0147 24.9099 12.0653 28.1845 18.6941 29.7583L21.3647 30.3941C22.2867 30.6167 23.1451 30.7598 23.9399 30.8233Z" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M20.093 13.5596L27.8028 15.5148" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.5352 19.7119L23.1451 20.8882" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_1047_2670">
                                    <rect width="38.1513" height="38.1513" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                            </i>
                            <h2 class="font-bold text-lg mb-0">  لیست معاش های پرداخت شده:</h2>
                        </div>
                        <div class="flex gap-2 flex-1 min-w-[100px]">
                            <div class="relative flex-1">
                                <input type="text"  wire:model="search" class="p-1 w-full  bg-[#1E40AF]/20 text-white rounded-md" placeholder="جستجو....">
                                <span class="absolute left-1 top-1.5 text-gray-600">
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.46875 15.3184C9.42002 15.3184 11.8125 12.793 11.8125 9.67773C11.8125 6.5625 9.42002 4.03711 6.46875 4.03711C3.51748 4.03711 1.125 6.5625 1.125 9.67773C1.125 12.793 3.51748 15.3184 6.46875 15.3184Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.375 15.9121L11.25 14.7246" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    @foreach($payments as $payment)
                        <div class="p-4 ">
                            <div class="">
                                <div class="text-center flex items-center justify-center font-bold text-lg text-[#1E40AF] mb-4">
                                {{ $payment->employee->name }}
                                </div>
                                <div class="grid grid-cols-2  gap-5 text-sm">
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1">تاریخ</div>
                                        <div class="text-gray-900 font-bold"  >  {{ $payment->shamsi_payment_date }}</div>
                                    </div>
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1">حقوق کل</div>
                                        <div class="text-gray-900 font-bold">{{ number_format($employee->salary) }}؋</div>
                                    </div>
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1"> مبلغ پرداختی</div>
                                        <div class="text-gray-900 font-bold">{{ number_format($employee->paid_this_month) }}؋</div>
                                    </div>
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1">مبلغ باقی</div>
                                        <div class="text-gray-900 font-bold">{{ number_format($employee->remaining_this_month) }}؋</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">توضیحات</div>
                                        <div class="text-gray-900 font-bold">{{ $payment->description }}</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">ادمین</div>
                                        <div class="text-gray-900 font-bold">@if($payment->admin)     {{ $payment->admin->name }} ({{ $payment->admin->rule }})  @else     -- @endif</div>
                                    </div>
                                </div>
                                <div class="flex justify-center gap-3 mt-5">
                                    <button wire:click="edit({{ $payment->id }})" class="flex items-center gap-1 text-[#1E40AF] border-blue-800 border border-2 e py-2 px-3 rounded-lg text-xs">
                                        <i class="bi bi-pencil-square">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02025L8.15988 10.9003C7.85988 11.2003 7.55988 11.7903 7.49988 12.2203L7.06988 15.2303C6.90988 16.3203 7.67988 17.0803 8.76988 16.9303L11.7799 16.5003C12.1999 16.4403 12.7899 16.1403 13.0999 15.8403L20.9799 7.96025C22.3399 6.60025 22.9799 5.02025 20.9799 3.02025C18.9799 1.02025 17.3999 1.66025 16.0399 3.02025Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15039C15.5802 6.54039 17.4502 8.41039 19.8502 9.09039" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        </i> ویرایش
                                    </button>
                                    <button  onclick="window.print()" class="flex items-center gap-1 text-[#1C274C] border-gray-700 border border-2  py-2 px-3 rounded-lg text-xs">
                                        <i class="bi bi-printer">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                        </i> چاپ
                                    </button>
                                </div>
                            </div>
                            <div class="border-b border-gray-300 mt-5"></div>
                        </div>
                    @endforeach
                </div>
                <div class="hidden lg:block overflow-x-auto ">
                <div class="flex justify-between mb-3">
                    <div class="flex gap-1 items-center">
                        <i>
                        <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1047_2670)">
                        <path d="M34.4314 16.596L32.8736 23.2407C31.5383 28.9792 28.8995 31.3001 23.9398 30.8232C23.145 30.7596 22.2866 30.6166 21.3646 30.394L18.694 29.7582C12.0652 28.1844 10.0146 24.9098 11.5725 18.2651L13.1303 11.6045C13.4482 10.2533 13.8297 9.07698 14.3066 8.1073C16.1665 4.26038 19.3299 3.22712 24.6393 4.48293L27.294 5.10289C33.9545 6.66073 35.9893 9.95128 34.4314 16.596Z" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23.9399 30.8233C22.9543 31.491 21.7144 32.0474 20.2043 32.5401L17.6926 33.3668C11.3818 35.4015 8.05944 33.7006 6.00881 27.3897L3.97408 21.1107C1.93934 14.7998 3.62436 11.4616 9.93522 9.42682L12.4468 8.60021C13.0986 8.39356 13.7186 8.2187 14.3067 8.10742C13.8298 9.0771 13.4483 10.2534 13.1304 11.6046L11.5725 18.2652C10.0147 24.9099 12.0653 28.1845 18.6941 29.7583L21.3647 30.3941C22.2867 30.6167 23.1451 30.7598 23.9399 30.8233Z" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20.093 13.5596L27.8028 15.5148" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5352 19.7119L23.1451 20.8882" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1047_2670">
                        <rect width="38.1513" height="38.1513" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                        </i>
                        <h2 class="font-bold text-lg mb-0">لیست معاش های پرداخت شده: </h2>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-1">
                        <div class="relative mb-1">
                            <input wire:model="search" type="text" class="p-2 w-[170px]  bg-[#1E40AF]/20 text-white  rounded-xl" placeholder="جستجو....">
                            <span class="absolute left-1  top-3 text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <table class="w-full text-center text-sm border-collapse">
                    <thead class="bg-[#1E40AF] text-white border-b-2 border-[#1E40AF]">
                        <tr>
                            <th class="p-2">آیدی</th>
                            <th class="p-2"> نام کارمند </th>
                            <th class="p-2">تاریخ</th>
                            <th class="p-2"> حقوق کل</th>
                            <th class="p-2">مبلغ پرداختی</th>
                            <th class="p-2">مبلغ باقی</th>
                            <th class="p-2">توضیحات</th>
                            <th class="p-2">ادمین</th>
                            <th class="p-2">چاپ</th>
                            <th class="p-2">ویرایش</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr class=" border-b-2 border-[#1E40AF]">
                            <td class="p-2 font-bold" >   {{ ($payments->currentPage() - 1) * $payments->perPage() + $loop->iteration }}</td>
                            <td class="p-2">{{ $payment->employee->name }}</td>
                            <td class="p-2" >  {{ $payment->shamsi_payment_date }}</td>
                            <td class="p-2">{{ number_format($employee->salary) }}؋</td>
                            <td class="p-2">{{ number_format($employee->paid_this_month) }}؋</td>
                            <td class="p-2">{{ number_format($employee->remaining_this_month) }}؋</td>
                            <td class="p-2">  {{ $payment->description }}</td>
                            <td class="p-2">  @if($payment->admin)     {{ $payment->admin->name }} ({{ $payment->admin->rule }})  @else     -- @endif</td>
                            <td class="p-2 text-center">
                                <i  onclick="window.print()" class="flex justify-center text-blue-600 text-lg cursor-pointer">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                </i>
                            </td>
                            <td class="p-2 ">
                                <i wire:click="edit({{ $payment->id }})" class="text-blue-600 flex justify-center text-lg cursor-pointer">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.0399 3.01976L8.15988 10.8998C7.85988 11.1998 7.55988 11.7898 7.49988 12.2198L7.06988 15.2298C6.90988 16.3198 7.67988 17.0798 8.76988 16.9298L11.7799 16.4998C12.1999 16.4398 12.7899 16.1398 13.0999 15.8398L20.9799 7.95976C22.3399 6.59976 22.9799 5.01976 20.9799 3.01976C18.9799 1.01976 17.3999 1.65976 16.0399 3.01976Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.9102 4.1499C15.5802 6.5399 17.4502 8.4099 19.8502 9.0899" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                </i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex flex-wrap gap-1 justify-start  items-center mt-3 text-[10px]">
                    @if ($payments->total() > $payments->perPage())
                        <button
                            wire:click="previousPage"
                            @disabled($payments->onFirstPage())
                            class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                            قبلی
                        </button>
                        <span class="mx-2 text-sm font-medium">
                            {{ $payments->currentPage() }} از {{ $payments->lastPage() }}
                        </span>
                        <button
                            wire:click="nextPage"
                            @disabled($payments->onLastPage())
                            class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                            بعدی
                        </button>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap gap-1 justify-center sm:hidden items-center mt-3 text-[10px]">
                @if ($payments->lastPage() > 1)
                <button
                    wire:click="previousPage"
                    @disabled($payments->onFirstPage())
                    class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                    قبلی
                </button>
                <span class="mx-2 text-sm font-medium">
                    {{ $payments->currentPage() }} از {{ $payments->lastPage() }}
                </span>
                <button
                    wire:click="nextPage"
                    @disabled($payments->onLastPage())
                    class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                    بعدی
                </button>
                @endif
            </div>
        </div>
    </div>
</div>
