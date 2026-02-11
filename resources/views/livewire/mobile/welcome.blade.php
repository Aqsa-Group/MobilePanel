<div class="min-h-screen max-w-full w-full flex justify-center">
    <main class="w-full px-3 sm:px-4 lg:px-6">
        <section class="col-span-1 lg:col-span-2 rounded-xl p-4 space-y-4">
            <aside class="col-span-1 space-y-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    <div class="card-anim relative bg-[#616161]/5 shadow-xl p-4 pb-[70px] flex flex-col justify-between rounded-xl shadow-[0px_4px_4px_0px_#00000040] overflow-hidden">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-3xl text-[#1E40AF] sm:text-2xl font-bold leading-none">
                                     {{ $totalUsers }}
                                </h3>
                                <p class="mt-2 text-[15px] font-semibold text-gray-700">
                                    تعداد کاربران
                                </p>
                            </div>
                            <svg class=" p-1 " width="45" height="45" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.16006 10.87C9.06006 10.86 8.94006 10.86 8.83006 10.87C6.45006 10.79 4.56006 8.84 4.56006 6.44C4.56006 3.99 6.54006 2 9.00006 2C11.4501 2 13.4401 3.99 13.4401 6.44C13.4301 8.84 11.5401 10.79 9.16006 10.87Z"
                                    stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.41 4C18.35 4 19.91 5.57 19.91 7.5C19.91 9.39 18.41 10.93 16.54 11"
                                    stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56"
                                    stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.3401 20C19.0601 19.85 19.7401 19.56 20.3001 19.13C21.8601 17.96 21.8601 16.03 20.3001 14.86"
                                    stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-[55px] bg-[#1E40AF] flex items-center px-4">
                            <span class="text-sm font-semibold text-white">
                                کاربران فعال:{{ $activeUsers }}
                            </span>
                        </div>
                    </div>
                    <div class="card-anim relative bg-[#616161]/5 shadow-xl p-4 pb-[70px] flex flex-col justify-between rounded-xl shadow-[0px_4px_4px_0px_#00000040] overflow-hidden">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-3xl sm:text-2xl font-bold leading-none text-[#1E40AF]">
                                    {{ $totalCustomers }}
                                </h3>
                                <p class="mt-2 text-[15px] font-semibold text-gray-700">
                                    تعداد مشتریان
                                </p>
                            </div>
                            <svg class="  p-2 ml-2" width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.25C6.37665 1.25 4.25 3.37665 4.25 6C4.25 8.62335 6.37665 10.75 9 10.75C11.6234 10.75 13.75 8.62335 13.75 6C13.75 3.37665 11.6234 1.25 9 1.25ZM5.75 6C5.75 4.20507 7.20507 2.75 9 2.75C10.7949 2.75 12.25 4.20507 12.25 6C12.25 7.79493 10.7949 9.25 9 9.25C7.20507 9.25 5.75 7.79493 5.75 6Z" fill="#1E40AF"></path> <path d="M15 2.25C14.5858 2.25 14.25 2.58579 14.25 3C14.25 3.41421 14.5858 3.75 15 3.75C16.2426 3.75 17.25 4.75736 17.25 6C17.25 7.24264 16.2426 8.25 15 8.25C14.5858 8.25 14.25 8.58579 14.25 9C14.25 9.41421 14.5858 9.75 15 9.75C17.0711 9.75 18.75 8.07107 18.75 6C18.75 3.92893 17.0711 2.25 15 2.25Z" fill="#1E40AF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M3.67815 13.5204C5.07752 12.7208 6.96067 12.25 9 12.25C11.0393 12.25 12.9225 12.7208 14.3219 13.5204C15.7 14.3079 16.75 15.5101 16.75 17C16.75 18.4899 15.7 19.6921 14.3219 20.4796C12.9225 21.2792 11.0393 21.75 9 21.75C6.96067 21.75 5.07752 21.2792 3.67815 20.4796C2.3 19.6921 1.25 18.4899 1.25 17C1.25 15.5101 2.3 14.3079 3.67815 13.5204ZM4.42236 14.8228C3.26701 15.483 2.75 16.2807 2.75 17C2.75 17.7193 3.26701 18.517 4.42236 19.1772C5.55649 19.8253 7.17334 20.25 9 20.25C10.8267 20.25 12.4435 19.8253 13.5776 19.1772C14.733 18.517 15.25 17.7193 15.25 17C15.25 16.2807 14.733 15.483 13.5776 14.8228C12.4435 14.1747 10.8267 13.75 9 13.75C7.17334 13.75 5.55649 14.1747 4.42236 14.8228Z" fill="#1E40AF"></path> <path d="M18.1607 13.2674C17.7561 13.1787 17.3561 13.4347 17.2674 13.8393C17.1787 14.2439 17.4347 14.6439 17.8393 14.7326C18.6317 14.9064 19.2649 15.2048 19.6829 15.5468C20.1014 15.8892 20.25 16.2237 20.25 16.5C20.25 16.7507 20.1294 17.045 19.7969 17.3539C19.462 17.665 18.9475 17.9524 18.2838 18.1523C17.8871 18.2717 17.6624 18.69 17.7818 19.0867C17.9013 19.4833 18.3196 19.708 18.7162 19.5886C19.5388 19.3409 20.2743 18.9578 20.8178 18.4529C21.3637 17.9457 21.75 17.2786 21.75 16.5C21.75 15.6352 21.2758 14.912 20.6328 14.3859C19.9893 13.8593 19.1225 13.4783 18.1607 13.2674Z" fill="#1E40AF"></path> </g></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-[55px] bg-[#1E40AF] flex items-center px-4">
                            <span class="text-sm font-semibold text-white">
                                مشتریان فعال: {{ $activeCustomers }}
                            </span>
                        </div>
                    </div>
                    <div class="card-anim relative bg-[#616161]/5 shadow-xl p-4 pb-[70px] flex flex-col justify-between rounded-xl shadow-[0px_4px_4px_0px_#00000040] overflow-hidden">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-3xl sm:text-2xl font-bold leading-none text-[#1E40AF]">
                                    {{ number_format($todaySalesAmount) }}؋
                                </h3>
                                <p class="mt-2 text-[15px] font-semibold text-gray-700">
                                    فروش روزانه
                                </p>
                            </div>
                            <svg class=" p-2 ml-2"  width="50px" height="50px"viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#1E40AF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M914.29 438.86v-84.87L512 72.92 109.72 353.99v84.87h73.14V768h-73.14v182.86h804.57V768h-73.14V438.86h73.14zM512 162.15L803.06 365.5H220.95L512 162.15z m256 276.71V768h-36.57V438.86H768zM542.12 630.75c10.73 0 19.46 8.73 19.46 19.48 0 10.73-8.73 19.46-19.46 19.46h-57v-38.95h57z m-57-54.86v-38.95h57c10.73 0 19.46 8.73 19.46 19.48 0 10.73-8.73 19.46-19.46 19.46h-57z m-0.54-93.8h-54.32V724.55h54.32V768H365.72V438.86h118.86v43.23z m54.86 242.46h2.68c40.98 0 74.32-33.34 74.32-74.32 0-17.87-6.6-34.07-17.15-46.91 10.55-12.83 17.15-29.03 17.15-46.9 0-40.98-33.34-74.34-74.32-74.34h-2.68v-43.23h118.85V768H539.44v-43.45zM292.57 438.86V768H256V438.86h36.57z m548.57 438.85H182.86v-36.57h658.29v36.57z" fill="#1E40AF"></path></g></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-[55px] bg-[#1E40AF] flex items-center px-4">
                            <span class="text-sm font-semibold text-white">
                                درصد فروش امروز: %{{ $todaySalesPercent }}
                            </span>
                        </div>
                    </div>
                    <div class="card-anim relative bg-[#616161]/5 shadow-xl p-4 pb-[70px] flex flex-col justify-between rounded-xl shadow-[0px_4px_4px_0px_#00000040] overflow-hidden">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-3xl sm:text-2xl font-bold leading-none text-[#1E40AF]">
                                   {{ number_format($todayProfitAmount) }}؋
                                </h3>
                                <p class="mt-2 text-[15px] font-semibold text-gray-700">
                                    فایده روزانه
                                </p>
                            </div>
                            <svg  class=" p-2 ml-2" width="50"  height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#1E40AF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.9426 1.25H13.5C13.9142 1.25 14.25 1.58579 14.25 2C14.25 2.41421 13.9142 2.75 13.5 2.75H12C9.62178 2.75 7.91356 2.75159 6.61358 2.92637C5.33517 3.09825 4.56445 3.42514 3.9948 3.9948C3.42514 4.56445 3.09825 5.33517 2.92637 6.61358C2.75159 7.91356 2.75 9.62178 2.75 12C2.75 14.3782 2.75159 16.0864 2.92637 17.3864C3.09825 18.6648 3.42514 19.4355 3.9948 20.0052C4.56445 20.5749 5.33517 20.9018 6.61358 21.0736C7.91356 21.2484 9.62178 21.25 12 21.25C14.3782 21.25 16.0864 21.2484 17.3864 21.0736C18.6648 20.9018 19.4355 20.5749 20.0052 20.0052C20.5749 19.4355 20.9018 18.6648 21.0736 17.3864C21.2484 16.0864 21.25 14.3782 21.25 12V10.5C21.25 10.0858 21.5858 9.75 22 9.75C22.4142 9.75 22.75 10.0858 22.75 10.5V12.0574C22.75 14.3658 22.75 16.1748 22.5603 17.5863C22.366 19.031 21.9607 20.1711 21.0659 21.0659C20.1711 21.9607 19.031 22.366 17.5863 22.5603C16.1748 22.75 14.3658 22.75 12.0574 22.75H11.9426C9.63423 22.75 7.82519 22.75 6.41371 22.5603C4.96897 22.366 3.82895 21.9607 2.93414 21.0659C2.03933 20.1711 1.63399 19.031 1.43975 17.5863C1.24998 16.1748 1.24999 14.3658 1.25 12.0574V11.9426C1.24999 9.63423 1.24998 7.82519 1.43975 6.41371C1.63399 4.96897 2.03933 3.82895 2.93414 2.93414C3.82895 2.03933 4.96897 1.63399 6.41371 1.43975C7.82519 1.24998 9.63423 1.24999 11.9426 1.25Z" fill="#1C274C"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M15.25 5C15.25 2.92893 16.9289 1.25 19 1.25C21.0711 1.25 22.75 2.92893 22.75 5C22.75 7.07107 21.0711 8.75 19 8.75C16.9289 8.75 15.25 7.07107 15.25 5ZM19 2.75C17.7574 2.75 16.75 3.75736 16.75 5C16.75 6.24264 17.7574 7.25 19 7.25C20.2426 7.25 21.25 6.24264 21.25 5C21.25 3.75736 20.2426 2.75 19 2.75Z" fill="#1C274C"></path> <path d="M13.75 10C13.75 10.4142 14.0858 10.75 14.5 10.75H15.1893L13.1768 12.7626C13.0791 12.8602 12.9209 12.8602 12.8232 12.7626L11.2374 11.1768C10.554 10.4934 9.44598 10.4934 8.76256 11.1768L6.46967 13.4697C6.17678 13.7626 6.17678 14.2374 6.46967 14.5303C6.76256 14.8232 7.23744 14.8232 7.53033 14.5303L9.82322 12.2374C9.92085 12.1398 10.0791 12.1398 10.1768 12.2374L11.7626 13.8232C12.446 14.5066 13.554 14.5066 14.2374 13.8232L16.25 11.8107V12.5C16.25 12.9142 16.5858 13.25 17 13.25C17.4142 13.25 17.75 12.9142 17.75 12.5V10C17.75 9.58579 17.4142 9.25 17 9.25H14.5C14.0858 9.25 13.75 9.58579 13.75 10Z" fill="#1C274C"></path> </g></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-[55px] bg-[#1E40AF] flex items-center px-4">
                            <span class="text-sm font-semibold text-white">
                                سود امروز: %{{ $todayProfitPercent }}
                            </span>
                        </div>
                    </div>
                    <div class="card-anim relative bg-[#616161]/5 shadow-xl p-4 pb-[70px] flex flex-col justify-between rounded-xl shadow-[0px_4px_4px_0px_#1E40AF1E40AF40] overflow-hidden">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-3xl sm:text-2xl font-bold leading-none text-[#1E40AF]">
                                    {{ number_format($grandTotal) }} ؋
                                </h3>
                                <p class="mt-2 text-[15px] font-semibold text-gray-700">
                                    موجودی کل اجناس
                                </p>
                            </div>
                            <svg fill="#1E40AF"  class=" p-2 ml-2"  width="50" height="50" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 256 253" enable-background="new 0 0 256 253" xml:space="preserve" stroke="                          #1E40AF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M122,219H76v-45h18v14h10v-14h18V219z M182,219h-46v-45h18v14h10v-14h18V219z M152,160h-46v-45h18v14h10v-14h18V160z M2,69 c0,13.678,9.625,25.302,22,29.576V233H2v18h252v-18h-22V98.554c12.89-3.945,21.699-15.396,22-29.554v-8H2V69z M65.29,68.346 c0,6.477,6.755,31.47,31.727,31.47c21.689,0,31.202-19.615,31.202-31.47c0,11.052,7.41,31.447,31.464,31.447 c21.733,0,31.363-20.999,31.363-31.447c0,14.425,9.726,26.416,22.954,30.154V233H42V98.594C55.402,94.966,65.29,82.895,65.29,68.346 z M222.832,22H223V2H34v20L2,54h252L222.832,22z"></path> </g></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-[55px] bg-[#1E40AF] flex items-center px-4">
                            <span class="text-sm font-semibold text-white">
                                موجودی انبار :%{{ $warehousePercent }}
                            </span>
                        </div>
                    </div>
                    <div class="card-anim relative bg-[#616161]/5 shadow-xl p-4 pb-[70px] flex flex-col justify-between rounded-xl shadow-[0px_4px_4px_0px_#00000040] overflow-hidden">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-3xl sm:text-2xl font-bold leading-none text-[#1E40AF]">
                                    {{ number_format($totalBorrowings) }} ؋
                                </h3>
                                <p class="mt-2 text-[15px] font-semibold text-gray-700">
                                    مجموعه قرضه ها
                                </p>
                            </div>
                            <svg class="p-2 ml-2" width="50" height="50" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#1E40AF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="layer1"> <path d="M 9.5 0 L 9.5 1 C 8.6774954 1 8 1.677495 8 2.5 C 8 3.322505 8.6774954 4 9.5 4 L 10.5 4 C 10.782065 4 11 4.217935 11 4.5 C 11 4.782065 10.782065 5 10.5 5 L 9.5 5 L 8 5 L 8 6 L 9.5 6 L 9.5 7 L 10.5 7 L 10.5 6 C 11.322504 6 12 5.322505 12 4.5 C 12 3.677495 11.322504 3 10.5 3 L 9.5 3 C 9.2179352 3 9 2.782065 9 2.5 C 9 2.217935 9.2179352 2 9.5 2 L 10.5 2 L 12 2 L 12 1 L 10.5 1 L 10.5 0 L 9.5 0 z M 7 3.9238281 L 0 6.1328125 L 0 6.5 L 0 9 L 1 9 L 1 17 L 0 17 L 0 20 L 20 20 L 20 17 L 19.5 17 L 19 17 L 19 9 L 20 9 L 20 6.1328125 L 13 3.9238281 L 13 4.9707031 L 19 6.8671875 L 19 8 L 1 8 L 1 6.8652344 L 7 4.9707031 L 7 3.9238281 z M 2 9 L 3 9 L 3 17 L 2 17 L 2 9 z M 4 9 L 6 9 L 6 17 L 4 17 L 4 9 z M 7 9 L 8 9 L 8 17 L 7 17 L 7 9 z M 9 9 L 11 9 L 11 17 L 9 17 L 9 9 z M 12 9 L 13 9 L 13 17 L 12 17 L 12 9 z M 14 9 L 16 9 L 16 17 L 14 17 L 14 9 z M 17 9 L 18 9 L 18 17 L 17 17 L 17 9 z M 1 18 L 4 18 L 6 18 L 9 18 L 11 18 L 14 18 L 16 18 L 19 18 L 19 19 L 1 19 L 1 18 z " style="fill:#1E40AF; fill-opacity:1; stroke:none; stroke-width:0px;"></path> </g> </g></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-[55px] bg-[#1E40AF] flex items-center px-4">
                            <span class="text-sm font-semibold text-white">
                                درصد قرضها :%{{ $borrowingsPercent }}
                            </span>
                        </div>
                    </div>
                    <div class="card-anim relative bg-[#616161]/5 shadow-xl p-4 pb-[70px] flex flex-col justify-between rounded-xl shadow-[0px_4px_4px_0px_#00000040] overflow-hidden">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-3xl sm:text-2xl font-bold leading-none text-[#1E40AF]">
                                   {{ number_format($this->totalSalaryPaid + $this->totalWithdrawals) }}؋
                                </h3>
                                <p class="mt-2 text-[15px] font-semibold text-gray-700">
                                    مصارف امروز
                                </p>
                            </div>
                            <svg fill="#1E40AF" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="p-2 ml-2"   width="50"    height="50" viewBox="0 0 31.521 31.522" xml:space="preserve" stroke="#1E40AF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M12.204,8.502L9.517,1.407h12.479l-2.688,7.095H12.204z M10.648,9.782h10.225v-1H10.648V9.782z M24.029,12.801 l-1.604-4.242h7.545l-1.604,4.242H24.029z M23.869,9.559l0.851,2.242h2.953l0.851-2.242H23.869z M3.154,12.801L1.55,8.559h7.545 L7.49,12.801H3.154z M2.995,9.559l0.85,2.242h2.953l0.85-2.242H2.995z M17.617,20.792c-0.217-0.146-0.669-0.219-1.355-0.219v2.381 h0.22c0.976,0,1.463-0.418,1.463-1.256C17.945,21.24,17.836,20.936,17.617,20.792z M13.668,18.066c0,0.745,0.448,1.118,1.344,1.118 c0.009,0,0.084,0.004,0.226,0.013V16.99l-0.22,0.006C14.118,16.997,13.668,17.352,13.668,18.066z M31.521,17.193v6.17 c0,1.76-1.434,3.19-3.193,3.19H24.09c-0.701,2.062-2.635,3.562-4.932,3.562h-6.699c-2.299,0-4.235-1.5-4.936-3.567 c-0.022,0-0.046,0.008-0.07,0.008H3.191C1.43,26.555,0,25.123,0,23.364v-6.17c0-1.762,1.432-3.192,3.191-3.192h4.186 c0.005-0.022,0.016-0.042,0.021-0.065H2.07v-1h5.697c0.844-1.754,2.617-2.978,4.69-2.978h6.698c2.074,0,3.85,1.223,4.69,2.978 h5.603v1h-5.23c0.006,0.022,0.018,0.042,0.021,0.065h4.09C30.088,13.999,31.521,15.43,31.521,17.193z M7.294,25.553 c-0.028-0.223-0.067-0.438-0.067-0.67v-9.696c0-0.064,0.017-0.125,0.021-0.188H3.191C1.982,15,1,15.983,1,17.192v6.17 c0,1.209,0.982,2.191,2.191,2.191H7.294L7.294,25.553z M19.482,21.672c0-0.885-0.197-1.49-0.595-1.822 c-0.396-0.332-1.157-0.526-2.288-0.59l-0.338-0.014v-2.25H16.5c0.833,0,1.25,0.332,1.25,1l0.006,0.162h1.469v-0.207 c0-0.883-0.209-1.486-0.628-1.812c-0.419-0.324-1.196-0.487-2.335-0.487v-0.875h-1.024v0.875c-1.191,0-2.008,0.17-2.447,0.51 c-0.438,0.341-0.66,0.97-0.66,1.892c0,0.949,0.221,1.599,0.656,1.943c0.438,0.346,1.256,0.52,2.451,0.52v2.438l-0.226-0.006 c-0.612,0-1.008-0.08-1.185-0.242c-0.178-0.158-0.268-0.518-0.268-1.07v-0.156H12.04l-0.007,0.306c0,0.91,0.219,1.547,0.654,1.914 c0.434,0.367,1.188,0.549,2.26,0.549l0.287,0.007v1.006h1.026v-1.006l0.313-0.008c1.076,0,1.828-0.191,2.26-0.574 S19.482,22.622,19.482,21.672z M30.521,17.193c0-1.209-0.984-2.192-2.193-2.192h-3.959c0.002,0.064,0.02,0.124,0.02,0.188v9.697 c0,0.229-0.039,0.446-0.066,0.67h4.008c1.209,0,2.191-0.982,2.191-2.191V17.193L30.521,17.193z"></path> </g> </g></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-[55px] bg-[#1E40AF] flex items-center px-4">
                            <span class="text-sm font-semibold text-white">
                               درصد مصارف:%{{ $expensesPercent }}
                            </span>
                        </div>
                    </div>
                    <div class="card-anim relative bg-[#616161]/5 shadow-xl p-4 pb-[70px] flex flex-col justify-between rounded-xl shadow-[0px_4px_4px_0px_#00000040] overflow-hidden">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-3xl sm:text-2xl font-bold leading-none text-[#1E40AF]">
                                    {{ $totalemployee }}
                                </h3>
                                <p class="mt-2 text-[15px] font-semibold text-gray-700">
                                    تعداد کارمندان
                                </p>
                            </div>
                            <svg class="p-2 ml-2"  width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C9.37665 1.25 7.25 3.37665 7.25 6C7.25 8.62335 9.37665 10.75 12 10.75C14.6234 10.75 16.75 8.62335 16.75 6C16.75 3.37665 14.6234 1.25 12 1.25ZM8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6C15.25 7.79493 13.7949 9.25 12 9.25C10.2051 9.25 8.75 7.79493 8.75 6Z" fill="#1E40AF"></path> <path d="M18 3.25C17.5858 3.25 17.25 3.58579 17.25 4C17.25 4.41421 17.5858 4.75 18 4.75C19.3765 4.75 20.25 5.65573 20.25 6.5C20.25 7.34427 19.3765 8.25 18 8.25C17.5858 8.25 17.25 8.58579 17.25 9C17.25 9.41421 17.5858 9.75 18 9.75C19.9372 9.75 21.75 8.41715 21.75 6.5C21.75 4.58285 19.9372 3.25 18 3.25Z" fill="#1E40AF"></path> <path d="M6.75 4C6.75 3.58579 6.41421 3.25 6 3.25C4.06278 3.25 2.25 4.58285 2.25 6.5C2.25 8.41715 4.06278 9.75 6 9.75C6.41421 9.75 6.75 9.41421 6.75 9C6.75 8.58579 6.41421 8.25 6 8.25C4.62351 8.25 3.75 7.34427 3.75 6.5C3.75 5.65573 4.62351 4.75 6 4.75C6.41421 4.75 6.75 4.41421 6.75 4Z" fill="#1E40AF"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.25C10.2157 12.25 8.56645 12.7308 7.34133 13.5475C6.12146 14.3608 5.25 15.5666 5.25 17C5.25 18.4334 6.12146 19.6392 7.34133 20.4525C8.56645 21.2692 10.2157 21.75 12 21.75C13.7843 21.75 15.4335 21.2692 16.6587 20.4525C17.8785 19.6392 18.75 18.4334 18.75 17C18.75 15.5666 17.8785 14.3608 16.6587 13.5475C15.4335 12.7308 13.7843 12.25 12 12.25ZM6.75 17C6.75 16.2242 7.22169 15.4301 8.17338 14.7956C9.11984 14.1646 10.4706 13.75 12 13.75C13.5294 13.75 14.8802 14.1646 15.8266 14.7956C16.7783 15.4301 17.25 16.2242 17.25 17C17.25 17.7758 16.7783 18.5699 15.8266 19.2044C14.8802 19.8354 13.5294 20.25 12 20.25C10.4706 20.25 9.11984 19.8354 8.17338 19.2044C7.22169 18.5699 6.75 17.7758 6.75 17Z" fill="#1E40AF"></path> <path d="M19.2674 13.8393C19.3561 13.4347 19.7561 13.1787 20.1607 13.2674C21.1225 13.4783 21.9893 13.8593 22.6328 14.3859C23.2758 14.912 23.75 15.6352 23.75 16.5C23.75 17.3648 23.2758 18.088 22.6328 18.6141C21.9893 19.1407 21.1225 19.5217 20.1607 19.7326C19.7561 19.8213 19.3561 19.5653 19.2674 19.1607C19.1787 18.7561 19.4347 18.3561 19.8393 18.2674C20.6317 18.0936 21.2649 17.7952 21.6829 17.4532C22.1014 17.1108 22.25 16.7763 22.25 16.5C22.25 16.2237 22.1014 15.8892 21.6829 15.5468C21.2649 15.2048 20.6317 14.9064 19.8393 14.7326C19.4347 14.6439 19.1787 14.2439 19.2674 13.8393Z" fill="#1E40AF"></path> <path d="M3.83935 13.2674C4.24395 13.1787 4.64387 13.4347 4.73259 13.8393C4.82132 14.2439 4.56525 14.6439 4.16065 14.7326C3.36829 14.9064 2.73505 15.2048 2.31712 15.5468C1.89863 15.8892 1.75 16.2237 1.75 16.5C1.75 16.7763 1.89863 17.1108 2.31712 17.4532C2.73505 17.7952 3.36829 18.0936 4.16065 18.2674C4.56525 18.3561 4.82132 18.7561 4.73259 19.1607C4.64387 19.5653 4.24395 19.8213 3.83935 19.7326C2.87746 19.5217 2.0107 19.1407 1.36719 18.6141C0.724248 18.088 0.25 17.3648 0.25 16.5C0.25 15.6352 0.724248 14.912 1.36719 14.3859C2.0107 13.8593 2.87746 13.4783 3.83935 13.2674Z" fill="#1E40AF"></path> </g></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full h-[55px] bg-[#1E40AF] flex items-center px-4">
                            <span class="text-sm font-semibold text-white">
                                کارمندان فعال:{{ $activeemployee }}
                            </span>
                        </div>
                    </div>
                </div>
            </aside>
            <div class=" grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5">
                <div class="card-anim bg-[#616161]/5 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl p-4 sm:p-5">
                    <div class="flex items-center gap-2 ">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.87988 18.1501V16.0801" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 18.1498V14.0098" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.1201 18.1502V11.9302" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.1199 5.8501L16.6599 6.3901C14.1099 9.3701 10.6899 11.4801 6.87988 12.4301" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M14.1899 5.8501H17.1199V8.7701" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="font-bold">مفاد ماهوار</h3>
                    </div>
                    <canvas id="profitChart" class="w-full h-[220px] sm:h-[260px]"></canvas>
                </div>
                <div class="card-anim bg-[#616161]/5 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl p-4 sm:p-5">
                    <div class="flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.1201 5.84992V7.91992" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 5.85023V9.99023" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M6.87988 5.84982L6.87988 12.0698" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M6.88012 18.1499L7.34012 17.6099C9.89012 14.6299 13.3101 12.5199 17.1201 11.5699" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M9.81006 18.1499H6.88006V15.2299" stroke="#E30000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2Z" stroke="#E30000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="font-bold">ضرر ماهوار</h3>
                    </div>
                    <canvas id="lossChart" class="w-full h-[220px] sm:h-[260px]"></canvas>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const months = ['حمل','ثور','جوزا','سرطان','اسد','سنبله','میزان','عقرب','قوس','جدی','دلو','حوت'];
                    const sampleProfit = [600, 800, 1200, 1400, 1600, 1700, 1850, 2100, 2400, 2800, 3300, 3900];
                    const sampleLoss = [500, 900, 700, 1100, 500, 300, 800, 600, 900, 700, 650, 600];
                    function money(num){
                        return new Intl.NumberFormat('fa-AF', { style: 'currency', currency: 'AFN' }).format(num);
                    }
                    const profitCtx = document.getElementById('profitChart').getContext('2d');
                    const profitGradient = profitCtx.createLinearGradient(0,0,0,260);
                    profitGradient.addColorStop(0, 'rgba(16,185,129,.25)');
                    profitGradient.addColorStop(1, 'rgba(16,185,129,0)');
                    new Chart(profitCtx, {
                        type: 'line',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'مفاد',
                                data: sampleProfit,
                                tension: 0.35,
                                fill: true,
                                backgroundColor: profitGradient,
                                borderColor: 'rgb(16,185,129)',
                                borderWidth: 2,
                                pointRadius: 0
                            }]
                        },
                        options: {
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    enabled: true,
                                    backgroundColor: '#000',
                                    titleColor: '#fff',
                                    bodyColor: '#fff',
                                    displayColors: false,
                                    callbacks: {
                                        title: function(context) {
                                            return context[0].label;
                                        },
                                        label: function(context) {
                                            return `مفاد: ${money(context.raw)}`;
                                        }
                                    }
                                }
                            },
                            interaction: {
                                mode: 'index',
                                intersect: false
                            },
                            hover: {
                                mode: 'index',
                                intersect: false
                            },
                            scales: {
                                x: {
                                    grid: { display: false },
                                    ticks: { color: '#000' },
                                },
                                y: {
                                    grid: { color: 'rgba(0,0,0,.05)' }
                                }
                            }
                        }
                    });
                    const lossCtx = document.getElementById('lossChart').getContext('2d');
                    const lossGradient = lossCtx.createLinearGradient(0,0,0,260);
                    lossGradient.addColorStop(0, 'rgba(244,63,94,.25)');
                    lossGradient.addColorStop(1, 'rgba(244,63,94,0)');
                    new Chart(lossCtx, {
                        type: 'line',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'ضرر',
                                data: sampleLoss,
                                tension: 0.35,
                                fill: true,
                                backgroundColor: lossGradient,
                                borderColor: 'rgb(244,63,94)',
                                borderWidth: 2,
                                pointRadius: 0
                            }]
                        },
                        options: {
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    enabled: true,
                                    backgroundColor: '#000',
                                    titleColor: '#fff',
                                    bodyColor: '#fff',
                                    displayColors: false,
                                    callbacks: {
                                        title: function(context) {
                                            return context[0].label;
                                        },
                                        label: function(context) {
                                            return `ضرر: ${money(context.raw)}`;
                                        }
                                    }
                                }
                            },
                            interaction: {
                                mode: 'index',
                                intersect: false
                            },
                            hover: {
                                mode: 'index',
                                intersect: false
                            },
                            scales: {
                                x: {
                                    grid: { display: false },
                                    ticks: { color: '#000' },
                                },
                                y: {
                                    grid: { color: 'rgba(0,0,0,.05)' }
                                }
                            }
                        }
                    });
                });
            </script>
        </section>
        <style>
            .ring-shadow{filter: drop-shadow(0 8px 24px rgba(0,0,0,.08))}
            ::-webkit-scrollbar { height: 8px; width: 8px; }
            ::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 999px; }
            ::-webkit-scrollbar-track { background: transparent; }
            .ring-shadow { filter: drop-shadow(0 8px 24px rgba(0,0,0,.08)); }
            .card-anim {
                transition: all 0.4s ease;
            }
            .card-anim:hover {
                transform: translateY(-6px) scale(1.02);
                box-shadow: 0 10px 25px rgba(0,0,0,0.12);
            }
            ::-webkit-scrollbar { height: 8px; width: 8px; }
            ::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 999px; }
            ::-webkit-scrollbar-track { background: transparent; }
            @keyframes fadeUp {
                0% { opacity: 0; transform: translateY(30px); }
                100% { opacity: 1; transform: translateY(0); }
            }
            .fade-up {
                animation: fadeUp 0.8s ease forwards;
            }
            @keyframes drawRing {
                from { stroke-dashoffset: 690; }
                to { stroke-dashoffset: 0; }
            }
            #ring-new, #ring-second, #ring-returns {
                animation: drawRing 1.8s ease-out forwards;
            }
            body { background: #f6f7fb; }
            .card { box-shadow: 0 8px 30px rgba(31,45,61,.08) }
            .legend-off { opacity: 0.5; }
            .draw {
            animation: draw 2s ease-in-out forwards;
            }
            @keyframes draw {
            0% { stroke-dasharray: 0, 1000; }
            100% { stroke-dasharray: 1000, 1000; }
            }
            .delay {
            animation: delay 2s ease-in-out forwards;
            }
            @keyframes delay {
            0% { stroke-dasharray: 0, 1000; }
            100% { stroke-dasharray: 1000, 1000; }
            }
            .graph-container {
            background: #ffffff;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            height: 350px;
            }
        </style>
        <script>
            tailwind.config = {
                theme: {
                extend: {
                    colors: {
                    primary: '#6C5CE7',
                    accent: '#FF00C3',
                    skydeep: '#00C2FF',
                    soft: '#F6F7FB',
                    ink: '#0F172A'
                    },
                    boxShadow: {
                    card: '0 8px 30px rgba(31,45,61,.08)'
                    },
                    borderRadius: {
                    '2xl': '1.25rem'
                    }
                }
                }
            }
        </script>
    </main>
</div>
