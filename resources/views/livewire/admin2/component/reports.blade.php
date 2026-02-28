<div class="w-full space-y-5">
    @php
        $statCards = [
            [
                'key' => 'reports_today',
                'title' => 'گزارشات امروز',
                'subtitle' => 'تعداد گزارشات امروز',
                'value' => (int) ($stats['reports_today'] ?? 0),
            ],
            [
                'key' => 'reports_total',
                'title' => 'گزارشات کل',
                'subtitle' => 'تعداد کل گزارشات',
                'value' => (int) ($stats['reports_total'] ?? 0),
            ],
            [
                'key' => 'visitors_today',
                'title' => 'بازدید امروز',
                'subtitle' => 'بازدیدکنندگان امروز سایت',
                'value' => (int) ($stats['visitors_today'] ?? 0),
            ],
            [
                'key' => 'sellers_total',
                'title' => 'فروشندگان کل',
                'subtitle' => 'تعداد کل فروشندگان',
                'value' => (int) ($stats['sellers_total'] ?? 0),
            ],
        ];
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($statCards as $card)
            <div class="relative overflow-hidden rounded-xl border-r-4 border-[#0B35CC]  bg-[#F1F4FF] px-5 pb-5 pt-4  ">
                <div class="flex flex-row-reverse items-start justify-between gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#0B35CC] text-white shadow-sm">
                        @if($card['key'] === 'reports_today')
                            <svg class="h-6 w-6" viewBox="0 0 35 35" fill="none">
                                <path d="M13.5771 21.4373L15.7646 23.6248L21.598 17.7915" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.5832 8.74984H20.4165C23.3332 8.74984 23.3332 7.2915 23.3332 5.83317C23.3332 2.9165 21.8748 2.9165 20.4165 2.9165H14.5832C13.1248 2.9165 11.6665 2.9165 11.6665 5.83317C11.6665 8.74984 13.1248 8.74984 14.5832 8.74984Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M23.3333 5.86279C28.1896 6.12529 30.625 7.91904 30.625 14.5836V23.3336C30.625 29.167 29.1667 32.0836 21.875 32.0836H13.125C5.83333 32.0836 4.375 29.167 4.375 23.3336V14.5836C4.375 7.93363 6.81042 6.12529 11.6667 5.86279" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        @elseif($card['key'] === 'reports_total')
                            <svg fill="#fff" class="h-6 w-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 483.128 483.128" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M322.304,224c-4.424,0-8,3.576-8,8v208c0,13.232-10.768,24-24,24h-248c-13.232,0-24-10.768-24-24V96 c0-10.96,7.4-20.512,17.992-23.24c4.28-1.104,6.856-5.472,5.76-9.744c-1.096-4.272-5.504-6.832-9.744-5.76 C14.64,61.816,2.304,77.744,2.304,96v344c0,22.056,17.944,40,40,40h248c22.056,0,40-17.944,40-40V232 C330.304,227.576,326.728,224,322.304,224z"></path> </g> </g> <g> <g> <path d="M300.328,57.272c-4.28-1.152-8.64,1.456-9.744,5.744c-1.112,4.272,1.464,8.64,5.744,9.744 c10.584,2.736,17.976,12.296,17.976,23.24v8c0,4.424,3.576,8,8,8s8-3.576,8-8v-8C330.304,77.76,317.976,61.832,300.328,57.272z"></path> </g> </g> <g> <g> <path d="M258.304,56h-9.968l-11.024-38.592C234.384,7.16,224.888,0,214.232,0h-95.856c-10.656,0-20.152,7.16-23.08,17.408 L84.272,56h-9.968c-13.232,0-24,10.768-24,24v24c0,4.424,3.576,8,8,8h216c4.424,0,8-3.576,8-8V80 C282.304,66.768,271.536,56,258.304,56z M266.304,96h-200V80c0-4.416,3.584-8,8-8h16c3.568,0,6.712-2.368,7.696-5.808l12.688-44.4 c0.968-3.408,4.128-5.792,7.688-5.792h95.856c3.552,0,6.72,2.384,7.688,5.8l12.688,44.4c0.984,3.432,4.128,5.8,7.696,5.8h16 c4.416,0,8,3.584,8,8V96z"></path> </g> </g> <g> <g> <path d="M167.384,27.584c-13.528,0-24.536,11.008-24.536,24.536s11.008,24.536,24.536,24.536S191.92,65.648,191.92,52.12 S180.912,27.584,167.384,27.584z M167.384,60.664c-4.712,0-8.536-3.832-8.536-8.536s3.832-8.536,8.536-8.536 s8.536,3.832,8.536,8.536S172.096,60.664,167.384,60.664z"></path> </g> </g> <g> <g> <path d="M234.304,192h-48c-4.424,0-8,3.576-8,8s3.576,8,8,8h48c4.424,0,8-3.576,8-8S238.728,192,234.304,192z"></path> </g> </g> <g> <g> <path d="M114.304,248h-48c-4.424,0-8,3.576-8,8s3.576,8,8,8h48c4.424,0,8-3.576,8-8S118.728,248,114.304,248z"></path> </g> </g> <g> <g> <path d="M274.304,136h-88c-4.424,0-8,3.576-8,8s3.576,8,8,8h88c4.424,0,8-3.576,8-8S278.728,136,274.304,136z"></path> </g> </g> <g> <g> <path d="M218.304,248h-56c-4.424,0-8,3.576-8,8s3.576,8,8,8h56c4.424,0,8-3.576,8-8S222.728,248,218.304,248z"></path> </g> </g> <g> <g> <path d="M274.304,304h-208c-4.424,0-8,3.576-8,8s3.576,8,8,8h208c4.424,0,8-3.576,8-8S278.728,304,274.304,304z"></path> </g> </g> <g> <g> <path d="M114.304,360h-48c-4.424,0-8,3.576-8,8s3.576,8,8,8h48c4.424,0,8-3.576,8-8S118.728,360,114.304,360z"></path> </g> </g> <g> <g> <path d="M274.304,360h-112c-4.424,0-8,3.576-8,8s3.576,8,8,8h112c4.424,0,8-3.576,8-8S278.728,360,274.304,360z"></path> </g> </g> <g> <g> <path d="M274.304,416h-208c-4.424,0-8,3.576-8,8s3.576,8,8,8h208c4.424,0,8-3.576,8-8S278.728,416,274.304,416z"></path> </g> </g> <g> <g> <path d="M138.304,136h-56c-13.232,0-24,10.768-24,24v24c0,13.232,10.768,24,24,24h56c13.232,0,24-10.768,24-24v-24 C162.304,146.768,151.536,136,138.304,136z M146.304,184c0,4.416-3.584,8-8,8h-56c-4.416,0-8-3.584-8-8v-24c0-4.416,3.584-8,8-8 h56c4.416,0,8,3.584,8,8V184z"></path> </g> </g> <g> <g> <path d="M420.696,202.872c-33.16,0-60.128,26.968-60.128,60.128c0,33.16,26.968,60.128,60.128,60.128 c33.16,0,60.128-26.968,60.128-60.128C480.824,229.84,453.856,202.872,420.696,202.872z M420.688,307.128 c-24.328,0-44.128-19.8-44.128-44.128s19.8-44.128,44.128-44.128s44.128,19.8,44.128,44.128S445.016,307.128,420.688,307.128z"></path> </g> </g> <g> <g> <path d="M444.912,241.168c-3.776-2.304-8.696-1.096-10.992,2.68l-14.96,24.632l-11.192-10.352 c-3.24-2.992-8.312-2.808-11.312,0.44c-3,3.248-2.808,8.304,0.44,11.312l18.368,17c1.496,1.376,3.44,2.128,5.44,2.128 c0.368,0,0.744-0.024,1.112-0.08c2.376-0.336,4.488-1.72,5.728-3.768l20.048-33C449.888,248.376,448.688,243.456,444.912,241.168z "></path> </g> </g> <g> <g> <path d="M420.696,362.872c-33.16,0-60.128,26.968-60.128,60.128c0,33.16,26.968,60.128,60.128,60.128 c33.16,0,60.128-26.968,60.128-60.128C480.824,389.84,453.848,362.872,420.696,362.872z M420.696,467.128 c-24.328,0-44.128-19.8-44.128-44.128s19.8-44.128,44.128-44.128s44.128,19.8,44.128,44.128S445.024,467.128,420.696,467.128z"></path> </g> </g> <g> <g> <path d="M444.896,401.168c-3.776-2.304-8.696-1.096-10.992,2.68l-14.96,24.632l-11.176-10.352 c-3.24-2.992-8.312-2.816-11.312,0.44c-3,3.24-2.808,8.304,0.44,11.312l18.368,17c1.496,1.376,3.44,2.128,5.44,2.128 c0.368,0,0.744-0.024,1.112-0.08c2.376-0.336,4.488-1.72,5.728-3.768l20.048-33C449.872,408.376,448.672,403.456,444.896,401.168z "></path> </g> </g> <g> <g> <path d="M445.296,118.256l-16.968-16.968c4.528-4.528,7.032-10.56,7.032-16.968c0-6.416-2.496-12.448-7.032-16.968 c-9.36-9.36-24.576-9.36-33.936,0l-8.2,8.192l-59.68,59.688l-67.888,67.888c-4.528,4.528-7.032,10.552-7.032,16.968 c0,3.632,0.88,7.104,2.4,10.288l-12.344,12.344c-3.128,3.128-3.128,8.184,0,11.312c1.56,1.56,3.608,2.344,5.656,2.344 c2.048,0,4.096-0.784,5.656-2.344l12.352-12.352c3.248,1.544,6.744,2.4,10.272,2.4c6.152,0,12.288-2.336,16.968-7.016l67.88-67.88 L417,112.616l11.328,11.296l-50.904,50.912c-3.128,3.128-3.128,8.184,0,11.312c1.56,1.56,3.608,2.344,5.656,2.344 c2.048,0,4.096-0.784,5.656-2.344l56.56-56.568C448.424,126.44,448.424,121.384,445.296,118.256z M281.248,225.744 c-3.128,3.128-8.184,3.128-11.312,0c-1.504-1.512-2.344-3.52-2.344-5.656c0-2.144,0.832-4.144,2.344-5.648 c0-0.008,0-0.008,0-0.008l62.224-62.224l11.312,11.312L281.248,225.744z M354.792,152.2l-11.312-11.312l48.368-48.376l5.656,5.656 l5.656,5.664L354.792,152.2z M417.016,89.976l-2.544,2.544l-5.656-5.656L403.16,81.2l2.544-2.536 c3.128-3.112,8.2-3.12,11.312,0.008c1.512,1.504,2.344,3.504,2.344,5.648C419.36,86.456,418.528,88.464,417.016,89.976z"></path> </g> </g> </g></svg>
                        @elseif($card['key'] === 'visitors_today')
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="6" r="4" stroke="#fff" stroke-width="1.5"></circle> <path d="M15 20.6151C14.0907 20.8619 13.0736 21 12 21C8.13401 21 5 19.2091 5 17C5 14.7909 8.13401 13 12 13C15.866 13 19 14.7909 19 17C19 17.3453 18.9234 17.6804 18.7795 18" stroke="#fff" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        @else
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C9.37665 1.25 7.25 3.37665 7.25 6C7.25 8.62335 9.37665 10.75 12 10.75C14.6234 10.75 16.75 8.62335 16.75 6C16.75 3.37665 14.6234 1.25 12 1.25ZM8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6C15.25 7.79493 13.7949 9.25 12 9.25C10.2051 9.25 8.75 7.79493 8.75 6Z" fill="#fff"></path> <path d="M18 3.25C17.5858 3.25 17.25 3.58579 17.25 4C17.25 4.41421 17.5858 4.75 18 4.75C19.3765 4.75 20.25 5.65573 20.25 6.5C20.25 7.34427 19.3765 8.25 18 8.25C17.5858 8.25 17.25 8.58579 17.25 9C17.25 9.41421 17.5858 9.75 18 9.75C19.9372 9.75 21.75 8.41715 21.75 6.5C21.75 4.58285 19.9372 3.25 18 3.25Z" fill="#fff"></path> <path d="M6.75 4C6.75 3.58579 6.41421 3.25 6 3.25C4.06278 3.25 2.25 4.58285 2.25 6.5C2.25 8.41715 4.06278 9.75 6 9.75C6.41421 9.75 6.75 9.41421 6.75 9C6.75 8.58579 6.41421 8.25 6 8.25C4.62351 8.25 3.75 7.34427 3.75 6.5C3.75 5.65573 4.62351 4.75 6 4.75C6.41421 4.75 6.75 4.41421 6.75 4Z" fill="#fff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.25C10.2157 12.25 8.56645 12.7308 7.34133 13.5475C6.12146 14.3608 5.25 15.5666 5.25 17C5.25 18.4334 6.12146 19.6392 7.34133 20.4525C8.56645 21.2692 10.2157 21.75 12 21.75C13.7843 21.75 15.4335 21.2692 16.6587 20.4525C17.8785 19.6392 18.75 18.4334 18.75 17C18.75 15.5666 17.8785 14.3608 16.6587 13.5475C15.4335 12.7308 13.7843 12.25 12 12.25ZM6.75 17C6.75 16.2242 7.22169 15.4301 8.17338 14.7956C9.11984 14.1646 10.4706 13.75 12 13.75C13.5294 13.75 14.8802 14.1646 15.8266 14.7956C16.7783 15.4301 17.25 16.2242 17.25 17C17.25 17.7758 16.7783 18.5699 15.8266 19.2044C14.8802 19.8354 13.5294 20.25 12 20.25C10.4706 20.25 9.11984 19.8354 8.17338 19.2044C7.22169 18.5699 6.75 17.7758 6.75 17Z" fill="#fff"></path> <path d="M19.2674 13.8393C19.3561 13.4347 19.7561 13.1787 20.1607 13.2674C21.1225 13.4783 21.9893 13.8593 22.6328 14.3859C23.2758 14.912 23.75 15.6352 23.75 16.5C23.75 17.3648 23.2758 18.088 22.6328 18.6141C21.9893 19.1407 21.1225 19.5217 20.1607 19.7326C19.7561 19.8213 19.3561 19.5653 19.2674 19.1607C19.1787 18.7561 19.4347 18.3561 19.8393 18.2674C20.6317 18.0936 21.2649 17.7952 21.6829 17.4532C22.1014 17.1108 22.25 16.7763 22.25 16.5C22.25 16.2237 22.1014 15.8892 21.6829 15.5468C21.2649 15.2048 20.6317 14.9064 19.8393 14.7326C19.4347 14.6439 19.1787 14.2439 19.2674 13.8393Z" fill="#fff"></path> <path d="M3.83935 13.2674C4.24395 13.1787 4.64387 13.4347 4.73259 13.8393C4.82132 14.2439 4.56525 14.6439 4.16065 14.7326C3.36829 14.9064 2.73505 15.2048 2.31712 15.5468C1.89863 15.8892 1.75 16.2237 1.75 16.5C1.75 16.7763 1.89863 17.1108 2.31712 17.4532C2.73505 17.7952 3.36829 18.0936 4.16065 18.2674C4.56525 18.3561 4.82132 18.7561 4.73259 19.1607C4.64387 19.5653 4.24395 19.8213 3.83935 19.7326C2.87746 19.5217 2.0107 19.1407 1.36719 18.6141C0.724248 18.088 0.25 17.3648 0.25 16.5C0.25 15.6352 0.724248 14.912 1.36719 14.3859C2.0107 13.8593 2.87746 13.4783 3.83935 13.2674Z" fill="#fff"></path> </g></svg>
                        @endif
                    </div>
                    <h3 class="text-right text-lg font-extrabold leading-7 text-[#0B35CC]">{{ $card['title'] }}</h3>
                </div>
                <div class="mt-12 text-center">
                    <p class="text-xl font-extrabold leading-none text-[#0B35CC]" dir="ltr">{{ number_format($card['value']) }}</p>
                    <p class="mt-2 text-xs font-semibold text-[#3F4B74]">{{ $card['subtitle'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sm:p-6">
        <div class="mb-4 space-y-3">
            <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                <h3 class="font-semibold text-gray-700 text-right">جستجو و فیلتر پیشرفته گزارشات:</h3>
                <div class="w-full lg:w-96 relative">
                    <input
                        type="text"
                        wire:model.live.debounce.400ms="search"
                        class="input-field text-xs w-full !pl-10"
                        placeholder="جستجو بر اساس نام، IMEI، موبایل، فروشگاه..."
                    >
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700 pointer-events-none">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"></circle>
                            <path d="M20 20L17 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">
                <select wire:model.live="incidentFilter" class="input-field text-xs w-full">
                    <option value="">نوع حادثه</option>
                    <option value="stolen">سرقت</option>
                    <option value="lost">مفقودی</option>
                </select>
                <select wire:model.live="statusFilter" class="input-field text-xs w-full">
                    <option value="">وضعیت</option>
                    <option value="pending">در انتظار</option>
                    <option value="blocked">بلاک</option>
                    <option value="resolved">حل‌شده</option>
                </select>
                <button
                    type="button"
                    wire:click="clearFilters"
                    class="h-10 w-full rounded-lg bg-[#0B35CC] px-3 text-sm font-semibold text-white"
                >
                    حذف فیلتر
                </button>
                <div class="h-10 w-full rounded-lg border border-blue-100 bg-blue-50 px-3 text-xs font-semibold text-blue-700 flex items-center justify-center">
                    تعداد نتایج: {{ number_format($reports->total()) }}
                </div>
            </div>
        </div>
        <div class="hidden md:block overflow-x-hidden">
            <table class="w-full table-fixed text-[11px]">
                <thead class="bg-[#0B35CC] text-white">
                    <tr class="border-b text-center">
                        <th class="p-2 text-[10px]">آیدی</th>
                        <th class="p-2 text-[10px]">مالک</th>
                        <th class="p-2 text-[10px]">موبایل</th>
                        <th class="p-2 text-[10px]">فروشگاه</th>
                        <th class="p-2 text-[10px]">دستگاه</th>
                        <th class="p-2 text-[10px]">IMEI</th>
                        <th class="p-2 text-[10px]">نوع حادثه</th>
                        <th class="p-2 text-[10px]">وضعیت</th>
                        <th class="p-2 text-[10px]">تاریخ ثبت</th>
                        <th class="p-2 text-[10px]">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                        @php
                            $rowNumber = (($reports->currentPage() - 1) * $reports->perPage()) + $loop->iteration;
                        @endphp
                        <tr wire:key="desktop-report-row-{{ $report->id }}" class="border-b align-top">
                            <td class="p-2 text-[9px] font-bold text-center">{{ $rowNumber }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal text-center">{{ $report->owner_full_name }}</td>
                            <td class="p-2 text-[9px] break-all whitespace-normal text-center" dir="ltr">{{ $report->owner_phone }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal text-center">{{ $report->store_name ?: '-' }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal text-center">{{ $report->device_model }}</td>
                            <td class="p-2 text-[9px] break-all whitespace-normal text-center" dir="ltr">{{ $report->device_imei }}</td>
                            <td class="p-2 text-[9px] text-center">{{ $report->incident_type === 'stolen' ? 'سرقت' : 'مفقودی' }}</td>
                            <td class="p-2 text-[9px] text-center">
                                @if(in_array($report->status, ['verified', 'rejected'], true))
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-red-100 text-red-800 text-[10px] font-semibold">بلاک</span>
                                @elseif($report->status === 'resolved')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 text-[10px] font-semibold">حل‌شده</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-semibold">در انتظار</span>
                                @endif
                            </td>
                            <td class="p-2 text-[9px] text-center">
                                {{ $report->created_at ? \Morilog\Jalali\Jalalian::fromDateTime($report->created_at)->format('Y/m/d') . ' ' . $report->created_at->format('h:i A') : '-' }}
                            </td>
                            <td class="p-2 text-[9px] text-center">
                                <button type="button" wire:click="openReportDetails({{ $report->id }})" class="px-2 py-1 rounded bg-gray-100 text-[10px]">
                                    جزئیات
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="py-4 text-center text-gray-500">گزارشی یافت نشد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="md:hidden space-y-3">
            @forelse($reports as $report)
                @php
                    $rowNumber = (($reports->currentPage() - 1) * $reports->perPage()) + $loop->iteration;
                @endphp
                <div wire:key="mobile-report-card-{{ $report->id }}" class="rounded-xl border border-gray-200 bg-white shadow-sm p-3">
                    <div class="grid grid-cols-2 gap-x-3 gap-y-2 text-xs">
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">آیدی</p>
                            <p class="font-semibold break-words text-center">{{ $rowNumber }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">وضعیت</p>
                            <p class="font-semibold text-center">
                                @if(in_array($report->status, ['verified', 'rejected'], true))
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-red-100 text-red-800 text-[10px] font-semibold">بلاک</span>
                                @elseif($report->status === 'resolved')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 text-[10px] font-semibold">حل‌شده</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-semibold">در انتظار</span>
                                @endif
                            </p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">مالک</p>
                            <p class="font-semibold break-words text-center">{{ $report->owner_full_name }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">شماره تماس</p>
                            <p class="font-semibold break-all text-center" dir="ltr">{{ $report->owner_phone }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">فروشگاه</p>
                            <p class="font-semibold break-words text-center">{{ $report->store_name ?: '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">IMEI</p>
                            <p class="font-semibold break-all text-center" dir="ltr">{{ $report->device_imei }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">نوع حادثه</p>
                            <p class="font-semibold break-words text-center">{{ $report->incident_type === 'stolen' ? 'سرقت' : 'مفقودی' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">تاریخ</p>
                            <p class="font-semibold break-words text-center">
                                {{ $report->created_at ? \Morilog\Jalali\Jalalian::fromDateTime($report->created_at)->format('Y/m/d') . ' ' . $report->created_at->format('h:i A') : '-' }}
                            </p>
                        </div>
                    </div>
                    <button type="button" wire:click="openReportDetails({{ $report->id }})" class="mt-3 w-full px-3 py-2 rounded-lg bg-gray-100 text-sm">
                        جزئیات
                    </button>
                </div>
            @empty
                <div class="rounded-xl border border-gray-200 bg-white p-4 text-center text-gray-500">گزارشی یافت نشد.</div>
            @endforelse
        </div>
        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
    @if($showDetailModal && $selectedReport)
        @php
            $status = (string) ($selectedReport->status ?? 'pending');
            $statusLabel = 'در انتظار';
            $statusClass = 'bg-amber-100 text-amber-800';
            $surfaceClass = 'border-amber-200';
            $headerGradient = 'from-amber-500 to-yellow-500';
            if (in_array($status, ['verified', 'rejected'], true)) {
                $statusLabel = 'بلاک';
                $statusClass = 'bg-red-100 text-red-800';
                $surfaceClass = 'border-red-200';
                $headerGradient = 'from-red-600 to-red-500';
            } elseif ($status === 'resolved') {
                $statusLabel = 'حل‌شده';
                $statusClass = 'bg-blue-100 text-blue-800';
                $surfaceClass = 'border-blue-200';
                $headerGradient = 'from-blue-700 to-blue-500';
            }
        @endphp
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="w-full max-w-4xl rounded-2xl border {{ $surfaceClass }} bg-white shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r {{ $headerGradient }} text-white px-4 py-3 flex items-center justify-between">
                    <h4 class="font-bold">جزئیات گزارش #{{ $selectedReport->id }}</h4>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">{{ $statusLabel }}</span>
                        <button type="button" wire:click="closeReportDetails" class="h-8 w-8 rounded-full bg-white/20 hover:bg-white/30">✕</button>
                    </div>
                </div>
                <div class="p-4 sm:p-5 max-h-[75vh] overflow-y-auto grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">نام مالک</p>
                        <p class="font-semibold">{{ $selectedReport->owner_full_name }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">شماره تماس</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedReport->owner_phone }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">آیدی تذکره</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedReport->owner_national_id ?: '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">نام فروشگاه</p>
                        <p class="font-semibold">{{ $selectedReport->store_name ?: '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">مدل دستگاه</p>
                        <p class="font-semibold">{{ $selectedReport->device_model }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">IMEI</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedReport->device_imei }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">نوع حادثه</p>
                        <p class="font-semibold">{{ $selectedReport->incident_type === 'stolen' ? 'سرقت' : 'مفقودی' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">وضعیت</p>
                        <p class="font-semibold">{{ $statusLabel }}</p>
                    </div>
                    <div class="rounded-lg border p-3 md:col-span-2">
                        <p class="text-xs text-gray-500 mb-1">محل حادثه</p>
                        <p class="font-semibold">{{ $selectedReport->incident_location }}</p>
                    </div>
                    <div class="rounded-lg border p-3 md:col-span-2">
                        <p class="text-xs text-gray-500 mb-1">توضیحات</p>
                        <p class="font-semibold">{{ $selectedReport->incident_description ?: '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3 md:col-span-2">
                        <p class="text-xs text-gray-500 mb-1">دلیل بلاک برای فروشندگان</p>
                        <textarea wire:model.defer="blockReason" rows="3" class="w-full rounded-lg border px-2 py-1 text-xs text-gray-700 bg-white" placeholder="علت بلاک را دقیق بنویسید..."></textarea>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">عکس مالک</p>
                        @if($selectedReport->owner_photo)
                            <img src="{{ asset('storage/' . $selectedReport->owner_photo) }}" class="w-full h-40 rounded-lg object-cover border">
                        @else
                            <div class="h-40 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                        @endif
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">عکس دستگاه</p>
                        @if($selectedReport->device_image)
                            <img src="{{ asset('storage/' . $selectedReport->device_image) }}" class="w-full h-40 rounded-lg object-cover border">
                        @else
                            <div class="h-40 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                        @endif
                    </div>
                    <div class="md:col-span-2 flex flex-col sm:flex-row gap-2">
                        <button type="button" wire:click="blockForSellers" class="w-full px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm font-semibold">
                            بلاک این دستگاه در تمام پنل‌های فروشندگان
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
