<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>داشبورد</title>
  @include('Mobile.layouts.links')
</head>
<style>
    .icon-outline path {
            stroke: black;
            stroke-width: 30px;
        }
    .fade-enter {
        opacity: 0;
        transform: scale(0.95);
    }
    .fade-enter-active {
        transition: all 300ms ease-out;
        opacity: 1;
        transform: scale(1);
    }
    .fade-leave {
        opacity: 1;
        transform: scale(1);
    }
    .fade-leave-active {
        transition: all 300ms ease-in;
        opacity: 0;
        transform: scale(0.95);
    }
</style>
<body>
    <header class="fixed top-0 inset-x-0 w-full bg-white z-[60] shadow shadow-blue-800 p-2">
        <div class="w-full  lg:px-2">
            <div class="h-16 flex items-center justify-between">
                <div class="flex items-center">
                    <button id="openSidebar" class="lg:hidden inline-flex items-center justify-center rounded-lg p-2 hover:bg-gray-100 transition" aria-label="باز کردن منو">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <a href="" class="flex items-center font-bold text-3xl gap-2 text-blue-800">
                        <span class=""> بازار الکترونیک</span>
                    </a>
                </div>
                <div class="flex-1"></div>
                <div class="flex items-center gap-2 sm:gap-3">
                    <button class="rounded-full bg-gray-100  w-10 h-10  transition relative">
                        <i class="fa-regular text-lg fa-bell"></i>
                        <span class="absolute -top-1 -right-1 bg-blue-800 text-white text-[10px] rounded-full px-1.5">3</span>
                    </button>
                    <div class="relative">
                        <button id="profileButton" class="flex items-center border border-gray-600 rounded-full p-0.5 gap-2 focus:outline-none" aria-expanded="false" aria-haspopup="true">
                            <img   src="{{ asset('storage/' . auth()->user()->image) }}" alt="user avatar"  class="w-10 h-10 rounded-full object-cover border border-blue-800" >
                        </button>
                        <div id="profileMenu" class="hidden absolute left-0  mt-2 w-[150px] bg-white border border-blue-800 rounded-xl shadow shadow-[#0B35CC] overflow-hidden z-50 text-right">
                            <div class="p-3 border-b border-dashed border-blue-800 flex items-center justify-center">
                                <img src="{{ asset('storage/' . auth()->user()->image) }}"   alt="user avatar" class="w-16 h-16 rounded-full object-cover border border-blue-800"  >
                            </div>
                            <div class="py-1">
                                <a   class="flex items-center gap-2 px-3 py-1.5 text-[13px] text-gray-700 hover:bg-gray-100 transition">
                                    <i class="fa-regular fa-user text-blue-800"></i>
                                    پروفایل من
                                </a>
                                <a href="#" class="flex  items-center gap-2 px-3 py-1.5 text-[13px] text-gray-700 hover:bg-gray-100 transition">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="stroke-red-500">
                                        <path d="M13 11L21.2 2.80005" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M22 6.8V2H17.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    خروج از حساب
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <aside id="sidebar"   class="fixed lg:static  sm:top-20 lg:top-0 top-5  right-0  h-[calc(100vh-5rem)] lg:h-auto  w-56  bg-white  shadow shadow-blue-800    duration-200 ease-out  z-40  overflow-y-auto transform translate-x-full lg:translate-x-0  transition-transform" aria-label="Sidebar">
        <div class="h-16 flex items-center justify-start ">
            <a id="closeSidebar" class="hidden" aria-label="بستن">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </div>
        <nav id="menu" class="sm:p-7 mt-0  p-3  flex flex-col justify-start ">
            <div class="space-y-2 sm:mt-2 mt-0">
                <a  href="{{ route('welcome') }}"  data-section="welcome"
                    class="menu-btn group  w-full  {{ request()->routeIs('welcome') ? 'bg-blue-600 text-white' : 'text-gray-700' }} text-right flex  gap-3 rounded-xl px-2 py-2 text-sm transition hover:bg-blue-600 hover:text-white ">
                    <svg class="group-hover:fill-white" width="22" height="22" viewBox="0 0 22 22" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.75 8.64844H5.75C7.75 8.64844 8.75 7.66113 8.75 5.68652V3.71191C8.75 1.7373 7.75 0.75 5.75 0.75H3.75C1.75 0.75 0.75 1.7373 0.75 3.71191V5.68652C0.75 7.66113 1.75 8.64844 3.75 8.64844Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.75 8.64844H17.75C19.75 8.64844 20.75 7.66113 20.75 5.68652V3.71191C20.75 1.7373 19.75 0.75 17.75 0.75H15.75C13.75 0.75 12.75 1.7373 12.75 3.71191V5.68652C12.75 7.66113 13.75 8.64844 15.75 8.64844Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.75 20.4961H17.75C19.75 20.4961 20.75 19.5088 20.75 17.5342V15.5596C20.75 13.585 19.75 12.5977 17.75 12.5977H15.75C13.75 12.5977 12.75 13.585 12.75 15.5596V17.5342C12.75 19.5088 13.75 20.4961 15.75 20.4961Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.75 20.4961H5.75C7.75 20.4961 8.75 19.5088 8.75 17.5342V15.5596C8.75 13.585 7.75 12.5977 5.75 12.5977H3.75C1.75 12.5977 0.75 13.585 0.75 15.5596V17.5342C0.75 19.5088 1.75 20.4961 3.75 20.4961Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-[15px]">داشبورد</span>
                </a>
                <a  href="{{ route('user.list') }}" data-section="users"
                    class="menu-btn group w-full text-right flex {{ request()->routeIs('user.list') ? 'bg-blue-600 text-white' : 'text-gray-700' }} gap-3 rounded-xl px-2 py-2 text-sm  transition hover:bg-blue-600 hover:text-white">
                    <svg class="group-hover:fill-white" width="20" height="20" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.16006 10.87C9.06006 10.86 8.94006 10.86 8.83006 10.87C6.45006 10.79 4.56006 8.84 4.56006 6.44C4.56006 3.99 6.54006 2 9.00006 2C11.4501 2 13.4401 3.99 13.4401 6.44C13.4301 8.84 11.5401 10.79 9.16006 10.87Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.41 4C18.35 4 19.91 5.57 19.91 7.5C19.91 9.39 18.41 10.93 16.54 11C16.46 10.99 16.37 10.99 16.28 11" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56C11.43 12.73 6.91997 12.73 4.15997 14.56Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.3401 20C19.0601 19.85 19.7401 19.56 20.3001 19.13C21.8601 17.96 21.8601 16.03 20.3001 14.86C19.7501 14.44 19.0801 14.16 18.3701 14" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-[15px]">کاربران ها</span>
                </a>
                <a  href="{{ route('employe') }}" data-section="users"
                    class="menu-btn group w-full text-right flex {{ request()->routeIs('employe') ? 'bg-blue-600 text-white' : 'text-gray-700' }} gap-3  rounded-xl px-2 py-2 text-sm  transition hover:bg-blue-600 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-outline group-hover:fill-white" width="20" height="20" viewBox="0 0 448 512"><path fill="#fff" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128m95.8 32.6L272 480l-32-136l32-56h-96l32 56l-32 136l-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8"/></svg>
                    <span class="text-[15px] flex items-center">کارمندان </span>
                </a>
                <a data-section="customers"  href="{{ route('customers') }}"
                    class="menu-btn group w-full text-right flex  {{ request()->routeIs('customers') ? 'bg-blue-600 text-white' : 'text-gray-700' }} gap-3 rounded-xl px-2 py-2 text-sm  transition hover:bg-blue-600 hover:text-white"
                    style="cursor: pointer;">
                    <svg class="group-hover:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.0001 7.16C17.9401 7.15 17.8701 7.15 17.8101 7.16C16.4301 7.11 15.3301 5.98 15.3301 4.58C15.3301 3.15 16.4801 2 17.9101 2C19.3401 2 20.4901 3.16 20.4901 4.58C20.4801 5.98 19.3801 7.11 18.0001 7.16Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.9702 14.4399C18.3402 14.6699 19.8502 14.4299 20.9102 13.7199C22.3202 12.7799 22.3202 11.2399 20.9102 10.2999C19.8402 9.58992 18.3102 9.34991 16.9402 9.58991" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.96998 7.16C6.02998 7.15 6.09998 7.15 6.15998 7.16C7.53998 7.11 8.63998 5.98 8.63998 4.58C8.63998 3.15 7.48998 2 6.05998 2C4.62998 2 3.47998 3.16 3.47998 4.58C3.48998 5.98 4.58998 7.11 5.96998 7.16Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.99994 14.4399C5.62994 14.6699 4.11994 14.4299 3.05994 13.7199C1.64994 12.7799 1.64994 11.2399 3.05994 10.2999C4.12994 9.58992 5.65994 9.34991 7.02994 9.58991" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.0001 14.63C11.9401 14.62 11.8701 14.62 11.8101 14.63C10.4301 14.58 9.33008 13.45 9.33008 12.05C9.33008 10.62 10.4801 9.46997 11.9101 9.46997C13.3401 9.46997 14.4901 10.63 14.4901 12.05C14.4801 13.45 13.3801 14.59 12.0001 14.63Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.08997 17.7799C7.67997 18.7199 7.67997 20.2599 9.08997 21.1999C10.69 22.2699 13.31 22.2699 14.91 21.1999C16.32 20.2599 16.32 18.7199 14.91 17.7799C13.32 16.7199 10.69 16.7199 9.08997 17.7799Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-[15px]">مشتریان</span>
                </a>
                <div x-data="{  open: @js(      request()->routeIs('accounts') ||      request()->routeIs('salaryworkers') ||      request()->routeIs('borrowings')  )   }"  class="w-full">
                    <button  @click.prevent="open = !open" :class="{ 'bg-blue-600 text-white': open }"
                        class="menu-btn group w-full text-right flex items-center gap-3 rounded-xl px-2 py-2 text-sm  transition hover:bg-blue-600 hover:text-white"  style="cursor: pointer;"  >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.25 11H7.75C6.79 11 6 10.21 6 9.25V6.75C6 5.79 6.79 5 7.75 5H16.25C17.21 5 18 5.79 18 6.75V9.25C18 10.21 17.21 11 16.25 11Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.3 15.2803L8 17.5803" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.03003 15.3101L10.33 17.61" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.49 15.3301H16.51" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.49 17.5V17.48" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="text-[15px]">حسابات</span>
                        <i   class="fa-solid fa-chevron-down transition ml-auto"   :class="{ 'rotate-180': open }"
                        ></i>
                    </button>
                    <div x-show="open" x-transition class="w-full mt-1 space-y-1">
                        <a href="{{ route('accounts') }}" :class="{ 'bg-blue-400 text-white': @js(request()->routeIs('accounts')) }" class="menu-btn bg-gray-50 group w-full text-left flex  items-center gap-3 rounded-xl px-5 py-2 text-sm  transition hover:bg-blue-400 hover:text-white" >
                            <svg class="w-5 h-5 transition " viewBox="0 0 17 17" fill="#fafafa" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.07609 12.7357C10.2018 12.7357 12.7357 10.2018 12.7357 7.07609C12.7357 3.95039 10.2018 1.4165 7.07609 1.4165C3.95039 1.4165 1.4165 3.95039 1.4165 7.07609C1.4165 10.2018 3.95039 12.7357 7.07609 12.7357Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.6665 8.0751C5.6665 8.62051 6.0915 9.06676 6.60859 9.06676H7.67109C8.12442 9.06676 8.49275 8.67718 8.49275 8.2026C8.49275 7.68551 8.26609 7.50135 7.93317 7.38093L6.23317 6.78593C5.89317 6.66551 5.6665 6.48135 5.6665 5.96426C5.6665 5.48968 6.03484 5.1001 6.48817 5.1001H7.55067C8.07484 5.10718 8.49984 5.54635 8.49984 6.09176" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 9.10205V9.62622" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 4.54053V5.09303" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.19434 14.0818C9.83184 14.9814 10.8731 15.5693 12.0631 15.5693C13.9968 15.5693 15.5693 13.9968 15.5693 12.0631C15.5693 10.8872 14.9885 9.846 14.1031 9.2085" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-[14px]">برداشت ها</span>
                        </a>
                        <a  href="{{ route('salaryworkers') }}"  :class="{ 'bg-blue-400 text-white': @js(request()->routeIs('salaryworkers')) }"  class="menu-btn bg-gray-50 group w-full text-left flex  items-center gap-2 rounded-xl px-5 py-2  text-sm  transition hover:bg-blue-400 hover:text-white" >
                            <svg class="w-5 h-5 transition" viewBox="0 0 17 17" fill="#fafafa" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.2085 6.375H4.9585" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.5833 7.77032V9.22953C15.5833 9.61911 15.2717 9.93783 14.875 9.952H13.4866C12.7216 9.952 12.0204 9.39242 11.9567 8.62742C11.9142 8.18117 12.0841 7.76325 12.3816 7.47283C12.6437 7.20367 13.005 7.04785 13.4016 7.04785H14.875C15.2717 7.06202 15.5833 7.38074 15.5833 7.77032Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.3815 7.47275C12.084 7.76316 11.914 8.18108 11.9565 8.62733C12.0203 9.39233 12.7215 9.95191 13.4865 9.95191H14.8748V10.979C14.8748 13.104 13.4582 14.5207 11.3332 14.5207H4.95817C2.83317 14.5207 1.4165 13.104 1.4165 10.979V6.02067C1.4165 4.094 2.57817 2.74817 4.38442 2.5215C4.56859 2.49317 4.75984 2.479 4.95817 2.479H11.3332C11.5173 2.479 11.6944 2.48608 11.8644 2.51441C13.6919 2.72691 14.8748 4.07984 14.8748 6.02067V7.04776H13.4015C13.0048 7.04776 12.6436 7.20358 12.3815 7.47275Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            <span class="text-[14px]">معاش ها</span>
                        </a>
                        <a href="{{ route('borrowings') }}" :class="{ 'bg-blue-400 text-white': @js(request()->routeIs('borrowings')) }" class="menu-btn bg-gray-50 group w-full text-left flex  items-center gap-2 rounded-xl px-5 py-2 text-sm  transition hover:bg-blue-400 hover:text-white" >
                            <svg class="w-5 h-5 transition" viewBox="0 0 17 17" fill="#fafafa" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.31567 12.5728H12.509C12.4453 12.6295 12.3815 12.6791 12.3178 12.7357L9.29317 15.0024C8.29442 15.7461 6.66526 15.7461 5.65942 15.0024L2.62776 12.7357C1.96193 12.2399 1.4165 11.142 1.4165 10.3132V5.06446C1.4165 4.2003 2.07526 3.24405 2.88276 2.93946L6.41026 1.61488C6.99109 1.3953 7.95442 1.3953 8.53526 1.61488L12.0557 2.93946C12.7286 3.19446 13.3023 3.9028 13.4794 4.6253H8.30858C8.15275 4.6253 8.01108 4.63239 7.8765 4.63239C6.56608 4.71031 6.22608 5.18488 6.22608 6.67946V10.5257C6.23317 12.1549 6.65109 12.5728 8.31567 12.5728Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.2334 7.94727H15.5834" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.5834 6.67258V10.6038C15.5692 12.1763 15.1371 12.5659 13.5009 12.5659H8.3159C6.65132 12.5659 6.2334 12.148 6.2334 10.5117V6.66549C6.2334 5.17799 6.5734 4.7034 7.88382 4.6184C8.0184 4.6184 8.16007 4.61133 8.3159 4.61133H13.5009C15.1655 4.61841 15.5834 5.02925 15.5834 6.67258Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.01807 10.8091H8.96014" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.4478 10.8091H12.764" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-[14px]">قرضه ها</span>
                        </a>
                    </div>
                </div>
                <div  x-data="{ open: {{ request()->routeIs('sell') || request()->routeIs('inventory') || request()->routeIs('inventory2') ? 'true' : 'false' }} }"class="w-full" >
                    <button @click.prevent="open = !open" type="button" class="menu-btn group w-full text-right flex items-center gap-3 rounded-xl px-2 py-2 text-sm transition hover:text-white {{ request()->routeIs('sell') || request()->routeIs('inventory') || request()->routeIs('inventory2') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-600' }}" style="cursor: pointer;" >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5 22.0003H4.07997C2.91997 22.0003 1.96997 21.0703 1.96997 19.9303V5.09035C1.96997 2.47035 3.91997 1.28035 6.30997 2.45035L10.75 4.63035C11.71 5.10035 12.5 6.35035 12.5 7.41035V22.0003Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.97 15.0599V18.8399C21.97 20.9999 20.97 21.9999 18.81 21.9999H12.5V10.4199L12.97 10.5199L17.47 11.5299L19.5 11.9799C20.82 12.2699 21.9 12.9499 21.96 14.8699C21.97 14.9299 21.97 14.9899 21.97 15.0599Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.5 9H8.97" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.5 13H8.97" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.47 11.53V14.75C17.47 15.99 16.46 17 15.22 17C13.98 17 12.97 15.99 12.97 14.75V10.52L17.47 11.53Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.96 14.8703C21.9 16.0503 20.92 17.0003 19.72 17.0003C18.48 17.0003 17.47 15.9903 17.47 14.7503V11.5303L19.5 11.9803C20.82 12.2703 21.9 12.9503 21.96 14.8703Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="text-[15px]">دوکانداری</span>
                        <i class="fa-solid fa-chevron-down transition ml-auto" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-transition class="w-full mt-1 space-y-1">
                        <a  href="{{ route('sell') }}"  class="menu-btn group w-full flex  items-center gap-2 px-5 py-2 rounded-xl text-sm transition hover:text-white  {{ request()->routeIs('sell') ? 'bg-blue-400 text-white' : 'bg-gray-50 text-gray-700 hover:bg-blue-400 ' }}" >
                            <svg class="w-5 h-5 transition" viewBox="0 0 17 17" fill="#fafafa" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.671 5.6098V9.25774C13.671 11.4394 12.4243 12.3744 10.5543 12.3744H4.32809C4.00934 12.3744 3.70476 12.3461 3.42142 12.2823C3.24434 12.254 3.07434 12.2044 2.91851 12.1478C1.85601 11.7511 1.21143 10.8302 1.21143 9.25774V5.6098C1.21143 3.42814 2.45809 2.49316 4.32809 2.49316H10.5543C12.141 2.49316 13.2814 3.16608 13.586 4.70316C13.6356 4.98649 13.671 5.27689 13.671 5.6098Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.7969 7.73477V11.3827C15.7969 13.5644 14.5503 14.4993 12.6803 14.4993H6.45403C5.92986 14.4993 5.45529 14.4285 5.04445 14.2727C4.20154 13.961 3.62778 13.3165 3.42236 12.2823C3.7057 12.3461 4.01028 12.3743 4.32903 12.3743H10.5553C12.4253 12.3743 13.6719 11.4394 13.6719 9.2577V5.60977C13.6719 5.27685 13.6436 4.97937 13.587 4.70312C14.9328 4.98646 15.7969 5.9356 15.7969 7.73477Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.43642 9.3074C8.46919 9.3074 9.30643 8.47017 9.30643 7.43739C9.30643 6.40462 8.46919 5.56738 7.43642 5.56738C6.40364 5.56738 5.56641 6.40462 5.56641 7.43739C5.56641 8.47017 6.40364 9.3074 7.43642 9.3074Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M3.38623 5.87891V8.99559" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.4907 5.87939V8.99608" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-[14px]">فروشات</span>
                        </a>
                        <a href="{{ route('inventory') }}" class="menu-btn group w-full flex  items-center gap-2 px-5 py-2 rounded-xl text-sm transition hover:text-white  {{ request()->routeIs('inventory') ? 'bg-blue-400 text-white' : 'bg-gray-50 text-gray-700 hover:bg-blue-400 ' }}" >
                            <svg class="w-5 h-5 transition" viewBox="0 0 24 24" fill="#fafafa" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.00999 11.22V15.71C3.00999 20.2 4.80999 22 9.29999 22H14.69C19.18 22 20.98 20.2 20.98 15.71V11.22" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12C13.83 12 15.18 10.51 15 8.68L14.34 2H9.67L9 8.68C8.82 10.51 10.17 12 12 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.31 12C20.33 12 21.81 10.36 21.61 8.35L21.33 5.6C20.97 3 19.97 2 17.35 2H14.3L15 9.01C15.17 10.66 16.66 12 18.31 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.64 12C7.29 12 8.78 10.66 8.94 9.01L9.16 6.8L9.64001 2H6.59C3.97001 2 2.97 3 2.61 5.6L2.34 8.35C2.14 10.36 3.62 12 5.64 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 17C10.33 17 9.5 17.83 9.5 19.5V22H14.5V19.5C14.5 17.83 13.67 17 12 17Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-[14px]">موجودی دوکان</span>
                        </a>
                        <a  href="{{ route('inventory2') }}" class="menu-btn group w-full flex  items-center gap-2 px-5 py-2  rounded-xl text-sm transition hover:text-white {{ request()->routeIs('inventory2') ? 'bg-blue-400 text-white' : 'bg-gray-50 text-gray-700 hover:bg-blue-400 ' }}" >
                            <svg class="w-5 h-5 transition" viewBox="0 0 17 17" fill="#fafafa" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.4165 15.5835H15.5832" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0417 1.4165H4.95833C2.83333 1.4165 2.125 2.68442 2.125 4.24984V15.5832H14.875V4.24984C14.875 2.68442 14.1667 1.4165 12.0417 1.4165Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.9585 11.6875H7.0835" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.9165 11.6875H12.0415" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.9585 8.5H7.0835" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.9165 8.5H12.0415" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.9585 5.3125H7.0835" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.9165 5.3125H12.0415" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-[14px]">موجودی گدام</span>
                        </a>
                    </div>
                </div>
                <a data-section="reports" href="{{ route('reports') }}"
                    class="menu-btn group w-full text-right flex gap-3 rounded-xl px-2 py-2 text-sm transition hover:text-white
                    {{ request()->routeIs('reports') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-600 ' }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" fill="#fff" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.11 11.1501H7.46005C6.83005 11.1501 6.32007 11.6601 6.32007 12.2901V17.4101H10.11V11.1501V11.1501Z" fill="#fff" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.7613 6.6001H11.2413C10.6113 6.6001 10.1013 7.11011 10.1013 7.74011V17.4001H13.8913V7.74011C13.8913 7.11011 13.3913 6.6001 12.7613 6.6001Z" fill="#fff" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.5482 12.8501H13.8982V17.4001H17.6882V13.9901C17.6782 13.3601 17.1682 12.8501 16.5482 12.8501Z" fill="#fff" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-[15px]">گزارشات</span>
                </a>
                <a data-section="fix" href="{{ route('device.repair') }}"
                    class="menu-btn group w-full text-right flex gap-3 rounded-xl px-2 py-2 text-sm transition hover:text-white
                    {{ request()->routeIs('device.repair') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-600 ' }}"
                    style="cursor: pointer;">
                    <svg width="26" height="23" viewBox="0 0 26 23" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.6666 9.20016C21.6666 5.36683 19.9333 3.8335 15.5999 3.8335H10.3999C6.06659 3.8335 4.33325 5.36683 4.33325 9.20016V13.8002C4.33325 17.6335 6.06659 19.1668 10.3999 19.1668" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.7124 7.66683C17.1166 6.996 16.1199 6.7085 14.6249 6.7085H11.3749C8.66659 6.7085 7.58325 7.66683 7.58325 10.0627V12.9377C7.58325 14.2602 7.90825 15.1418 8.65575 15.6689" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.67749 3.83317V1.9165" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13 3.83317V1.9165" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.3333 3.83317V1.9165" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21.6667 7.6665H23.8334" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.67749 19.1665V21.0832" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.16675 7.6665H4.33341" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.16675 11.5H4.33341" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.16675 15.3335H4.33341" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.1026 17.8156C19.0539 17.8156 19.8251 17.1334 19.8251 16.2918C19.8251 15.4503 19.0539 14.7681 18.1026 14.7681C17.1513 14.7681 16.3801 15.4503 16.3801 16.2918C16.3801 17.1334 17.1513 17.8156 18.1026 17.8156Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.3611 16.7325V15.8412C12.3611 15.3141 12.8486 14.8829 13.4444 14.8829C14.4844 14.8829 14.9069 14.2312 14.3869 13.4358C14.0836 12.9758 14.2678 12.3816 14.7878 12.1229L15.7736 11.615C16.2286 11.3754 16.8136 11.5191 17.0844 11.9216L17.1494 12.0175C17.6694 12.8129 18.5144 12.8129 19.0344 12.0175L19.0994 11.9216C19.3702 11.5191 19.9553 11.385 20.4103 11.615L21.3961 12.1229C21.9161 12.3912 22.1003 12.9758 21.7969 13.4358C21.2769 14.2312 21.6994 14.8829 22.7394 14.8829C23.3352 14.8829 23.8227 15.3141 23.8227 15.8412V16.7325C23.8227 17.2595 23.3352 17.6908 22.7394 17.6908C21.6994 17.6908 21.2769 18.3425 21.7969 19.1379C22.1003 19.5979 21.9161 20.192 21.3961 20.4508L20.4103 20.9587C19.9553 21.1983 19.3702 21.0545 19.0994 20.652L19.0344 20.5562C18.5144 19.7608 17.6694 19.7608 17.1494 20.5562L17.0844 20.652C16.8136 21.0545 16.2286 21.1887 15.7736 20.9587L14.7878 20.4508C14.2678 20.1825 14.0836 19.5979 14.3869 19.1379C14.9069 18.3425 14.4844 17.6908 13.4444 17.6908C12.8486 17.7004 12.3611 17.2691 12.3611 16.7325Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-[15px]">خدمات و تعمیرات</span>
                </a>
            </div>
        </nav>
    </aside>
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
            menuButtons.forEach(b => b.classList.remove('active', 'bg-blue-600', 'text-white'));
            btn.classList.add('active', 'bg-blue-600', 'text-white');
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

        profileBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            profileMenu?.classList.toggle('hidden');
            profileBtn.setAttribute(
            'aria-expanded',
            profileMenu?.classList.contains('hidden') ? 'false' : 'true'
            );
        });
        profileMenu?.addEventListener('click', (e) => e.stopPropagation());
        document.addEventListener('click', () => {
            if (profileMenu && !profileMenu.classList.contains('hidden')) {
            profileMenu.classList.add('hidden');
            profileBtn?.setAttribute('aria-expanded', 'false');
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
