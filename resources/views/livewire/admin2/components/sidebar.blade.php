<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $latestAdminUnread = ($adminSidebarNotifications ?? collect())->firstWhere('is_read', false);
        $latestAdminType = strtolower((string) data_get($latestAdminUnread, 'type', ''));
        $latestAdminIsBlocked = str_contains($latestAdminType, 'blocked') || str_contains($latestAdminType, 'rejected');
        $latestAdminIsApproved = str_contains($latestAdminType, 'approved');
        $latestAdminIsPending = str_contains($latestAdminType, 'pending') || str_contains($latestAdminType, 'submitted');

        $latestAdminToastClass = 'bg-slate-700 text-white';
        if ($latestAdminIsBlocked) {
            $latestAdminToastClass = 'bg-red-700 text-white';
        } elseif ($latestAdminIsApproved) {
            $latestAdminToastClass = 'bg-blue-700 text-white';
        } elseif ($latestAdminIsPending) {
            $latestAdminToastClass = 'bg-amber-600 text-white';
        }
    @endphp
    @if($latestAdminUnread)
        <div x-data="{show:true}" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="fixed bottom-4 left-4 z-[70]">
            <div class="{{ $latestAdminToastClass }} px-4 py-3 rounded-lg shadow text-sm">{{ $latestAdminUnread->message }}</div>
        </div>
    @endif
    <!-- Header -->
    <header class="fixed top-0 inset-x-0 w-full h-auto bg-white z-[60] shadow shadow-[#0B35CC] p-2">
        <div class="w-full  lg:px-2">
            <div class="h-auto flex items-center justify-between">
                <div class="flex items-center p-3">
                    <button id="openSidebar"
                            class="lg:hidden inline-flex items-center justify-center rounded-lg p-2 hover:bg-gray-100 transition"
                            aria-label="باز کردن منو">
                    <i class="fa-solid fa-bars"></i>
                    </button>

                    <a href="" class="flex items-center gap-2 text-[#002ED3]">
                    <span class="font-bold text-lg md:text-3xl">مدیریت بازار موبایل و کمپیوتر</span>
                    </a>
                </div>
                <div class="flex-1"></div>
                <div class="flex items-center gap-2 sm:gap-3">
                 <div class="w-10 sm:w-44 md:w-60">
                    <div class="flex items-center h-10 rounded-full sm:rounded-lg border border-gray-500 bg-gray-50 overflow-hidden
                                justify-center sm:justify-start sm:pl-2">
                        <!-- آیکون و متن -->
                        <span class="flex items-center gap-2 text-gray-600 shrink-0 sm:flex-row-reverse">
                            <!-- متن فقط در sm به بالا -->
                            {{-- <p><span class="text-sm hidden sm:inline pr-1">جستجو</span></p> --}}
                            <!-- آیکون همیشه نمایش داده شود -->
                            <svg width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.8621 12.3747C20.5137 17.333 16.2118 21.0701 11.2534 20.7218C6.2951 20.3734 2.55797 16.0715 2.90634 11.1131C3.2547 6.15478 7.55664 2.41766 12.515 2.76602C17.4733 3.11439 21.2104 7.41632 20.8621 12.3747Z" stroke="#292D32" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.9943 20.3334C22.5533 20.9742 22.6281 22.1924 21.1663 23.022C19.8299 23.7802 18.8217 23.148 18.9297 21.6118C18.9996 20.4739 19.9323 19.8979 20.9943 20.3334Z" stroke="#292D32" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>

                        <!-- ورودی متن فقط در sm به بالا نمایش داده شود -->
                        <input type="text" placeholder="جستجو" class="w-full h-full bg-transparent outline-none px-3 text-sm placeholder-gray-400 hidden sm:block" />
                    </div>
                </div>



                    <div class="relative">
                        <button id="adminBellButton" class="rounded-full bg-gray-200 w-10 h-10 transition relative">
                            <i class="fa-regular fa-bell"></i>
                            <span id="adminBellBadge" class="absolute -top-1 -right-1 inline-flex min-w-[18px] h-[18px] bg-[#0B35CC] text-white items-center justify-center text-[10px] rounded-full px-1.5 {{ (($adminSidebarNotificationCount ?? 0) > 0) ? '' : 'hidden' }}">{{ $adminSidebarNotificationCount ?? 0 }}</span>
                        </button>
                        <div id="adminBellMenu" class="hidden absolute left-0 mt-2 w-80 bg-white border border-blue-200 rounded-xl shadow-lg z-50 max-h-80 overflow-auto">
                            <div class="px-3 py-2 border-b font-semibold text-sm text-gray-700">اعلان‌ها</div>
                            @forelse(($adminSidebarNotifications ?? collect()) as $n)
                                @php
                                    $link = data_get($n->payload, 'link', route('admin2.dashboard'));
                                    $registerId = (int) data_get($n->payload, 'register_id', 0);
                                    $reportId = (int) data_get($n->payload, 'report_id', 0);
                                    $type = strtolower((string) ($n->type ?? ''));
                                    $isBlocked = str_contains($type, 'blocked') || str_contains($type, 'rejected');
                                    $isApproved = str_contains($type, 'approved');
                                    $isPending = str_contains($type, 'pending') || str_contains($type, 'submitted');

                                    $itemBorderClass = 'border-slate-200 hover:bg-slate-50';
                                    $titleClass = 'text-slate-700';
                                    $badgeClass = 'bg-slate-100 text-slate-700';

                                    if ($isBlocked) {
                                        $itemBorderClass = 'border-red-200 hover:bg-red-50';
                                        $titleClass = 'text-red-700';
                                        $badgeClass = 'bg-red-100 text-red-700';
                                    } elseif ($isApproved) {
                                        $itemBorderClass = 'border-blue-200 hover:bg-blue-50';
                                        $titleClass = 'text-blue-700';
                                        $badgeClass = 'bg-blue-100 text-blue-700';
                                    } elseif ($isPending) {
                                        $itemBorderClass = 'border-amber-200 hover:bg-amber-50';
                                        $titleClass = 'text-amber-700';
                                        $badgeClass = 'bg-amber-100 text-amber-700';
                                    }
                                @endphp
                                <button
                                    type="button"
                                    class="admin-notification-item block w-full px-3 py-2 border-b text-right {{ $itemBorderClass }}"
                                    data-register-id="{{ $registerId }}"
                                    data-report-id="{{ $reportId }}"
                                    data-link="{{ $link }}"
                                >
                                    <div class="flex items-center justify-between gap-2">
                                        <div class="text-xs font-semibold {{ $titleClass }}">{{ $n->title }}</div>
                                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-semibold {{ $badgeClass }}">جدید</span>
                                    </div>
                                    <div class="text-xs text-gray-600 mt-1">{{ $n->message }}</div>
                                </button>
                            @empty
                                <div id="adminBellEmptyState" class="px-3 py-3 text-xs text-gray-500">اعلانی موجود نیست</div>
                            @endforelse
                        </div>
                    </div>
                    <!-- پروفایل -->
                    <div class="relative">
                        <button id="profileButton" class="flex items-center border border-gray-600 rounded-full p-0.5 gap-2 focus:outline-none" aria-expanded="false" aria-haspopup="true">
    @if(auth('admin2')->user()?->image)
        <img
            src="{{ asset('storage/' . auth('admin2')->user()->image) }}"
            alt="Admin Avatar"
            class="w-10 h-10 rounded-full object-cover"
        >
    @else
        <div class="w-10 h-10 rounded-full border border-[#0948EE] bg-blue-50 text-[#0948EE] flex items-center justify-center">
            <i class="fa-regular fa-user"></i>
        </div>
    @endif
</button>
                        <div id="profileMenu"
                            class="hidden absolute left-0  mt-2 w-[150px] bg-white border border-[#0948EE] rounded-xl shadow shadow-[#0B35CC] overflow-hidden z-50 text-right">
                            <div class="p-3 border-b border-dashed border-[#0948EE] flex items-center justify-center">
    @if(auth('admin2')->user()?->image)
        <img
            src="{{ asset('storage/' . auth('admin2')->user()->image) }}"
            alt="Admin Avatar"
            class="w-16 h-16 rounded-full object-cover border border-[#0948EE]"
        >
    @else
        <div class="w-16 h-16 rounded-full border border-[#0948EE] bg-blue-50 text-[#0948EE] flex items-center justify-center">
            <i class="fa-regular fa-user text-lg"></i>
        </div>
    @endif
</div>
                            <div class="py-1">
                                <a href="{{ route('admin2.profile') }}"
                                class="flex items-center gap-2 px-3 py-1.5 text-[13px] text-gray-700 hover:bg-gray-100 transition">
                                    <i class="fa-regular fa-user text-[#0948EE]"></i>
                                    پروفایل من
                                </a>
                                <form method="POST" action="{{ route('admin2.logout') }}">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="flex items-center gap-2 px-3 py-1.5 text-[13px] text-gray-700 hover:bg-gray-100 transition w-full text-right">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="stroke-red-500">
                                            <path d="M13 11L21.2 2.80005" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22 6.8V2H17.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        خروج از حساب
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /پروفایل -->
                </div>
            </div>
        </div>
    </header>
    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 right-0 sm:top-16 z-40 h-[calc(100vh-100px)] w-64
        bg-white shadow shadow-[#0B35CC]
        transform translate-x-full transition-transform duration-200 ease-out
        lg:sticky lg:top-[78px] lg:h-[calc(100vh-78px)] lg:translate-x-0 lg:flex lg:flex-col lg:w-52 p-2" aria-label="Sidebar">
        <div class="h-16 flex items-center justify-start px-3">
           <a id="closeSidebar" class="hidden" aria-label="بستن">
            <i class="fa-solid fa-xmark"></i>
            </a>
        </div>
        <nav id="menu" class="p-3 mt-0  h-full flex flex-col justify-start  ">
            <div class="space-y-2">
                <a  href="{{ route('admin2.dashboard') }}"  data-section="dashboard"
                    class="menu-btn group sm:-mt-10   w-full  {{ request()->routeIs('admin2.dashboard') ? 'bg-[#0B35CC] text-white' : 'text-gray-700' }} text-right flex  gap-3 rounded-xl px-2 py-2 text-sm transition hover:bg-[#0B35CC] hover:text-white">
                    <svg class="group-hover:fill-white" width="22" height="22" viewBox="0 0 22 22" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.75 8.64844H5.75C7.75 8.64844 8.75 7.66113 8.75 5.68652V3.71191C8.75 1.7373 7.75 0.75 5.75 0.75H3.75C1.75 0.75 0.75 1.7373 0.75 3.71191V5.68652C0.75 7.66113 1.75 8.64844 3.75 8.64844Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.75 8.64844H17.75C19.75 8.64844 20.75 7.66113 20.75 5.68652V3.71191C20.75 1.7373 19.75 0.75 17.75 0.75H15.75C13.75 0.75 12.75 1.7373 12.75 3.71191V5.68652C12.75 7.66113 13.75 8.64844 15.75 8.64844Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.75 20.4961H17.75C19.75 20.4961 20.75 19.5088 20.75 17.5342V15.5596C20.75 13.585 19.75 12.5977 17.75 12.5977H15.75C13.75 12.5977 12.75 13.585 12.75 15.5596V17.5342C12.75 19.5088 13.75 20.4961 15.75 20.4961Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.75 20.4961H5.75C7.75 20.4961 8.75 19.5088 8.75 17.5342V15.5596C8.75 13.585 7.75 12.5977 5.75 12.5977H3.75C1.75 12.5977 0.75 13.585 0.75 15.5596V17.5342C0.75 19.5088 1.75 20.4961 3.75 20.4961Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-[15px]">داشبورد</span>
                </a>
                <a  href="{{ route('admin2.users') }}" data-section="users"
                    class="menu-btn group w-full text-right flex {{ request()->routeIs('admin2.users') ? 'bg-[#0B35CC] text-white' : 'text-gray-700' }} gap-3 rounded-xl px-2 py-2 text-sm  transition hover:bg-[#0B35CC] hover:text-white">
                    <svg class="group-hover:fill-white" width="20" height="20" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.16006 10.87C9.06006 10.86 8.94006 10.86 8.83006 10.87C6.45006 10.79 4.56006 8.84 4.56006 6.44C4.56006 3.99 6.54006 2 9.00006 2C11.4501 2 13.4401 3.99 13.4401 6.44C13.4301 8.84 11.5401 10.79 9.16006 10.87Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.41 4C18.35 4 19.91 5.57 19.91 7.5C19.91 9.39 18.41 10.93 16.54 11C16.46 10.99 16.37 10.99 16.28 11" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56C11.43 12.73 6.91997 12.73 4.15997 14.56Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.3401 20C19.0601 19.85 19.7401 19.56 20.3001 19.13C21.8601 17.96 21.8601 16.03 20.3001 14.86C19.7501 14.44 19.0801 14.16 18.3701 14" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-[15px]">کاربران </span>
                </a>
                <a
                            href="{{ route('admin2.device-list') }}"
                            class="menu-btn group w-full text-right flex {{ request()->routeIs('admin2.device-list') ? 'bg-[#0B35CC] text-white' : 'text-gray-700' }} gap-3 rounded-xl px-2 py-2 text-sm  transition hover:bg-[#0B35CC] hover:text-white">
                           <svg class="w-5 h-5 ttransition" viewBox="0 0 17 17" fill="#fafafa" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.37484 15.5832H10.6248C14.1665 15.5832 15.5832 14.1665 15.5832 10.6248V6.37484C15.5832 2.83317 14.1665 1.4165 10.6248 1.4165H6.37484C2.83317 1.4165 1.4165 2.83317 1.4165 6.37484V10.6248C1.4165 14.1665 2.83317 15.5832 6.37484 15.5832Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>

                            <path d="M8.76221 6.29004H12.481" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.51904 6.29004L5.05029 6.82129L6.64404 5.22754" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.76221 11.2485H12.481" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.51904 11.2485L5.05029 11.7798L6.64404 10.186" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>


                            <span class="text-[14px]">لیست دستگاه</span>
                        </a>
                @if(auth('admin2')->user()?->isAdmin())
                    <a
                        x-data
                        href="{{ route('admin2.store') }}"
                        :class="{ 'bg-[#0B35CC] text-white': @js(request()->routeIs('admin2.store')) }"
                        class="menu-btn group w-full text-right flex gap-3 rounded-xl px-2 py-2 text-sm  transition hover:bg-[#0B35CC] hover:text-white"
                        >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#fafafa" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.00977 11.2202V15.7102C3.00977 20.2002 4.80977 22.0002 9.29977 22.0002H14.6898C19.1798 22.0002 20.9798 20.2002 20.9798 15.7102V11.2202" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12C13.83 12 15.18 10.51 15 8.68L14.34 2H9.66999L8.99999 8.68C8.81999 10.51 10.17 12 12 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.3098 12C20.3298 12 21.8098 10.36 21.6098 8.35L21.3298 5.6C20.9698 3 19.9698 2 17.3498 2H14.2998L14.9998 9.01C15.1698 10.66 16.6598 12 18.3098 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.63988 12C7.28988 12 8.77988 10.66 8.93988 9.01L9.15988 6.8L9.63988 2H6.58988C3.96988 2 2.96988 3 2.60988 5.6L2.33988 8.35C2.13988 10.36 3.61988 12 5.63988 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 17C10.33 17 9.5 17.83 9.5 19.5V22H14.5V19.5C14.5 17.83 13.67 17 12 17Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="text-[15px]">فروشگاه ها</span>
                    </a>
                @endif
                <a
                    x-data
                    href="{{ route('admin2.reports') }}"
                    :class="{ 'bg-[#0B35CC] text-white': @js(request()->routeIs('admin2.reports')) }"
                    class="menu-btn group w-full text-right flex gap-3 rounded-xl px-2 py-2 text-sm  transition hover:bg-[#0B35CC] hover:text-white"
                    >
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="#fafafa" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.1098 11.1504H7.45981C6.82981 11.1504 6.31982 11.6603 6.31982 12.2903V17.4103H10.1098V11.1504V11.1504Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.7611 6.6001H11.2411C10.6111 6.6001 10.1011 7.11011 10.1011 7.74011V17.4001H13.8911V7.74011C13.8911 7.11011 13.3911 6.6001 12.7611 6.6001Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16.5479 12.8501H13.8979V17.4001H17.688V13.9901C17.678 13.3601 17.1679 12.8501 16.5479 12.8501Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                   </svg>

                    <span class="text-[15px]"> گزارشات </span>
                </a>
            </div>
        </nav>
    </aside>
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const openBtn  = document.getElementById('openSidebar');
        const sidebar  = document.getElementById('sidebar');
        const closeBtn = document.getElementById('closeSidebar');
        const menuButtons = document.querySelectorAll('.menu-btn');
        // بک‌دراپ (موبایل)
        let backdrop = document.getElementById('sidebarBackdrop');
        if (!backdrop) {
            backdrop = document.createElement('div');
            backdrop.id = 'sidebarBackdrop';
            backdrop.className = 'lg:hidden fixed inset-0 z-30 bg-black/30 hidden';
            document.body.appendChild(backdrop);
        }
        const open = () => {
            sidebar.classList.remove('translate-x-full');
            backdrop.classList.remove('hidden');
            document.documentElement.classList.add('overflow-hidden');
            openBtn?.setAttribute('aria-expanded', 'true');
        };
        const close = () => {
            sidebar.classList.add('translate-x-full');
            backdrop.classList.add('hidden');
            document.documentElement.classList.remove('overflow-hidden');
            openBtn?.setAttribute('aria-expanded', 'false');
        };
        // Toggle فقط در موبایل
        const toggle = () => {
            if (window.innerWidth >= 1024) return;
            if (sidebar.classList.contains('translate-x-full')) open();
            else close();
        };
        openBtn?.addEventListener('click', (e) => { e.stopPropagation(); toggle(); });
        closeBtn?.addEventListener('click', close);
        backdrop.addEventListener('click', close);
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });
        // Active state
        menuButtons.forEach(btn => {
            btn.addEventListener('click', () => {
            menuButtons.forEach(b => b.classList.remove('active', 'bg-[#0B35CC]', 'text-white'));
            btn.classList.add('active', 'bg-[#0B35CC]', 'text-white');
            if (window.innerWidth < 1024) close();
            });
        });
        // ریسایز به دسکتاپ
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
            backdrop.classList.add('hidden');
            document.documentElement.classList.remove('overflow-hidden');
            openBtn?.setAttribute('aria-expanded', 'false');
            }
        });
        const profileBtn  = document.getElementById('profileButton');
        const profileMenu = document.getElementById('profileMenu');
        const adminBellButton = document.getElementById('adminBellButton');
        const adminBellMenu = document.getElementById('adminBellMenu');
        const adminBellBadge = document.getElementById('adminBellBadge');

        const updateBellBadge = (count) => {
            if (!adminBellBadge) return;
            const nextCount = Number.isFinite(Number(count)) ? Math.max(0, Number(count)) : 0;
            adminBellBadge.textContent = String(nextCount);
            adminBellBadge.classList.toggle('hidden', nextCount <= 0);
        };

        const ensureBellEmptyState = () => {
            if (!adminBellMenu) return;
            const hasItems = adminBellMenu.querySelectorAll('.admin-notification-item').length > 0;
            let empty = document.getElementById('adminBellEmptyState');
            if (!hasItems && !empty) {
                empty = document.createElement('div');
                empty.id = 'adminBellEmptyState';
                empty.className = 'px-3 py-3 text-xs text-gray-500';
                empty.textContent = 'اعلانی موجود نیست';
                adminBellMenu.appendChild(empty);
            }
            if (hasItems && empty) {
                empty.remove();
            }
        };

        const removeNotificationItemsByRegisterId = (registerId) => {
            if (!adminBellMenu || !registerId) return 0;
            const items = adminBellMenu.querySelectorAll(`.admin-notification-item[data-register-id="${registerId}"]`);
            const removed = items.length;
            items.forEach((item) => item.remove());
            ensureBellEmptyState();
            return removed;
        };

        const removeNotificationItemsByReportId = (reportId) => {
            if (!adminBellMenu || !reportId) return 0;
            const items = adminBellMenu.querySelectorAll(`.admin-notification-item[data-report-id="${reportId}"]`);
            const removed = items.length;
            items.forEach((item) => item.remove());
            ensureBellEmptyState();
            return removed;
        };

        profileBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            profileMenu?.classList.toggle('hidden');
            profileBtn.setAttribute(
            'aria-expanded',
            profileMenu?.classList.contains('hidden') ? 'false' : 'true'
            );
        });
        profileMenu?.addEventListener('click', (e) => e.stopPropagation());
        adminBellButton?.addEventListener('click', (e) => {
            e.stopPropagation();
            adminBellMenu?.classList.toggle('hidden');
        });
        adminBellMenu?.querySelectorAll('.admin-notification-item').forEach((item) => {
            item.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const registerId = Number(item.getAttribute('data-register-id'));
            const reportId = Number(item.getAttribute('data-report-id'));
            const link = item.getAttribute('data-link') || '';
            let removed = 0;

            if (!Number.isNaN(registerId) && registerId > 0) {
                removed += removeNotificationItemsByRegisterId(registerId);
            }
            if (!Number.isNaN(reportId) && reportId > 0) {
                removed += removeNotificationItemsByReportId(reportId);
            }
            if (removed > 0) {
                updateBellBadge(Number(adminBellBadge?.textContent ?? 0) - removed);
            }
            adminBellMenu?.classList.add('hidden');

            if (link !== '') {
                window.location.href = link;
                return;
            }

            if (!Number.isNaN(registerId) && registerId > 0) {
                window.dispatchEvent(new CustomEvent('admin-open-device-detail', { detail: { id: registerId } }));
            }
            });
        });
        if (window.Livewire && typeof window.Livewire.on === 'function') {
            window.Livewire.on('admin-notifications-sync', (payload) => {
                const data = Array.isArray(payload) ? (payload[0] ?? {}) : (payload ?? {});
                const unreadCount = Number(data.unreadCount ?? 0);
                const registerId = Number(data.registerId ?? 0);
                const reportId = Number(data.reportId ?? 0);
                if (!Number.isNaN(registerId) && registerId > 0) {
                    removeNotificationItemsByRegisterId(registerId);
                }
                if (!Number.isNaN(reportId) && reportId > 0) {
                    removeNotificationItemsByReportId(reportId);
                }
                updateBellBadge(unreadCount);
                ensureBellEmptyState();
            });
        }
        adminBellMenu?.addEventListener('click', (e) => e.stopPropagation());
        document.addEventListener('click', () => {
            if (profileMenu && !profileMenu.classList.contains('hidden')) {
            profileMenu.classList.add('hidden');
            profileBtn?.setAttribute('aria-expanded', 'false');
            }
            if (adminBellMenu && !adminBellMenu.classList.contains('hidden')) {
            adminBellMenu.classList.add('hidden');
            }
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && profileMenu && !profileMenu.classList.contains('hidden')) {
            profileMenu.classList.add('hidden');
            profileBtn?.setAttribute('aria-expanded', 'false');
            }
        });
        });
    </script>
</body>
</html>
