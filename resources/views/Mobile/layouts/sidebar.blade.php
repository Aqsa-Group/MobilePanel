<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>داشبورد</title>
  @include('Mobile.layouts.links')
<<<<<<< HEAD
<<<<<<< HEAD
  @vite('resources/css/app.css')

</head>
<style>
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
=======
</head>
>>>>>>> 35f639f42dfbb415133f110a21e2e895a9349a44
=======
</head>
>>>>>>> origin/Marwa-K
<body  >
  <!-- Header -->
  <header class="fixed top-0 inset-x-0 w-full bg-white z-[60] border-b-4 border-blue-500 p-2" style="border-color: rgba(9, 72, 238, 0.15);">
    <div class="w-full  lg:px-2">
      <div class="h-16 flex items-center justify-between">
                
         <div class="flex items-center">
            <button id="openSidebar"
                    class="lg:hidden inline-flex items-center justify-center rounded-lg p-2 hover:bg-gray-100 transition"
                    aria-label="باز کردن منو">
              <i class="fa-solid fa-bars"></i>
            </button>

            <a href="" class="flex items-center gap-2 text-blue-600">
              <img src="/img/logoo.jpg" alt="brand" class="w-10 h-10" />
              <span class=""> بازار الکترونیک</span>
            </a>
        </div>
        <div class="flex-1"></div>
        <div class="flex items-center gap-2 sm:gap-3">
          <div class="w-44 sm:w-60">
            <div class="flex items-center h-10 rounded-lg border border-blue-500 bg-gray-50 overflow-hidden">
              <span class="flex  gap-[160px] px-2 text-gray-600 shrink-0">
                <p  > <span class="text-sm">جستجو</span></p>

                <img src="/img/search-normal.png" class="w-5 h-5 " alt="search" />
                
              </span>
              <input type="text" class="w-full h-full bg-transparent outline-none px-3 text-sm placeholder-gray-400" />
            </div>
          </div>

          <button class="rounded-full bg-blue-100  p-1  transition">
            <img src="/img/Icon Frame (1).png" class="w-6 h-6" alt="plus" />
          </button>

          <button class="rounded-full bg-blue-100  w-8 h-8  transition relative">
            <i class="fa-regular fa-bell"></i>
            <span class="absolute -top-1 -right-1 bg-blue-500 text-white text-[10px] rounded-full px-1.5">3</span>
          </button>

          <!-- پروفایل -->
          <div class="relative">
            <button id="profileButton" class="flex items-center border border-blue-600 rounded-full p-0.5 gap-2 focus:outline-none" aria-expanded="false" aria-haspopup="true">
              <img src="/img/avatar5 1.png" class="w-7 h-7 rounded-full object-cover" alt="user" />
            </button>

          
            <div id="profileMenu"
            class="hidden absolute left-0  mt-2 w-44 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden z-50 text-right">

              <div class="p-3 border-b border-dashed border-gray-300 flex items-center justify-center">
                <img src="/img/avatar5 1.png" class="w-12 h-12 rounded-full object-cover" alt="user"/>
              </div>

              <div class="py-1">
                <a href=""
                   class="flex items-center gap-2 px-3 py-1.5 text-[10px] text-gray-700 hover:bg-gray-100 transition">
                  <i class="fa-regular fa-user text-blue-600"></i>
                  پروفایل من
                </a>
                <a href="#"
                   class="flex items-center gap-2 px-3 py-1.5 text-[10px] text-gray-700 hover:bg-gray-100 transition">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                       xmlns="http://www.w3.org/2000/svg" class="stroke-blue-800">
                    <path d="M13 11L21.2 2.80005" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 6.8V2H17.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  خروج از حساب
                </a>
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
    class="fixed inset-y-0 right-0 z-40 w-48 bg-white shadow-md transform translate-x-full transition-transform duration-200 ease-out
           lg:static lg:translate-x-0 lg:flex lg:flex-col lg:w-52
           border-l-4 border-blue-500 p-2"
    style="border-color: rgba(9, 72, 238, 0.25);"
    aria-label="Sidebar">

    <div class="h-16 flex items-center justify-end px-3">
      <a id="closeSidebar"
         class="lg:hidden inline-flex items-center justify-center rounded-lg border border-gray-200 p-2 hover:bg-gray-100 transition"
         aria-label="بستن">
        <i class="fa-solid fa-xmark"></i>
      </a>
    </div>

    <nav id="menu" class="p-3 h-full flex flex-col justify-start ">

      <div class=" mt-2">
        <a href="" data-section="dashboard"
           class="menu-btn group active w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm transition bg-blue-600 text-white">
          <svg class="group-hover:fill-white" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.75 8.64844H5.75C7.75 8.64844 8.75 7.66113 8.75 5.68652V3.71191C8.75 1.7373 7.75 0.75 5.75 0.75H3.75C1.75 0.75 0.75 1.7373 0.75 3.71191V5.68652C0.75 7.66113 1.75 8.64844 3.75 8.64844Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15.75 8.64844H17.75C19.75 8.64844 20.75 7.66113 20.75 5.68652V3.71191C20.75 1.7373 19.75 0.75 17.75 0.75H15.75C13.75 0.75 12.75 1.7373 12.75 3.71191V5.68652C12.75 7.66113 13.75 8.64844 15.75 8.64844Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15.75 20.4961H17.75C19.75 20.4961 20.75 19.5088 20.75 17.5342V15.5596C20.75 13.585 19.75 12.5977 17.75 12.5977H15.75C13.75 12.5977 12.75 13.585 12.75 15.5596V17.5342C12.75 19.5088 13.75 20.4961 15.75 20.4961Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M3.75 20.4961H5.75C7.75 20.4961 8.75 19.5088 8.75 17.5342V15.5596C8.75 13.585 7.75 12.5977 5.75 12.5977H3.75C1.75 12.5977 0.75 13.585 0.75 15.5596V17.5342C0.75 19.5088 1.75 20.4961 3.75 20.4961Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="text-[15px]">داشبورد</span>
        </a>

        <a data-section="customers"
           class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white"
           style="cursor: pointer;">
          <svg class="group-hover:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.0001 7.16C17.9401 7.15 17.8701 7.15 17.8101 7.16C16.4301 7.11 15.3301 5.98 15.3301 4.58C15.3301 3.15 16.4801 2 17.9101 2C19.3401 2 20.4901 3.16 20.4901 4.58C20.4801 5.98 19.3801 7.11 18.0001 7.16Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.9702 14.4399C18.3402 14.6699 19.8502 14.4299 20.9102 13.7199C22.3202 12.7799 22.3202 11.2399 20.9102 10.2999C19.8402 9.58992 18.3102 9.34991 16.9402 9.58991" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M5.96998 7.16C6.02998 7.15 6.09998 7.15 6.15998 7.16C7.53998 7.11 8.63998 5.98 8.63998 4.58C8.63998 3.15 7.48998 2 6.05998 2C4.62998 2 3.47998 3.16 3.47998 4.58C3.48998 5.98 4.58998 7.11 5.96998 7.16Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6.99994 14.4399C5.62994 14.6699 4.11994 14.4299 3.05994 13.7199C1.64994 12.7799 1.64994 11.2399 3.05994 10.2999C4.12994 9.58992 5.65994 9.34991 7.02994 9.58991" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12.0001 14.63C11.9401 14.62 11.8701 14.62 11.8101 14.63C10.4301 14.58 9.33008 13.45 9.33008 12.05C9.33008 10.62 10.4801 9.46997 11.9101 9.46997C13.3401 9.46997 14.4901 10.63 14.4901 12.05C14.4801 13.45 13.3801 14.59 12.0001 14.63Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9.08997 17.7799C7.67997 18.7199 7.67997 20.2599 9.08997 21.1999C10.69 22.2699 13.31 22.2699 14.91 21.1999C16.32 20.2599 16.32 18.7199 14.91 17.7799C13.32 16.7199 10.69 16.7199 9.08997 17.7799Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="text-[15px]">مشتریان</span>
        </a>

        <a href="" data-section="mobiles"
           class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white">
             <svg class="group-hover:fill-white" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.16006 10.87C9.06006 10.86 8.94006 10.86 8.83006 10.87C6.45006 10.79 4.56006 8.84 4.56006 6.44C4.56006 3.99 6.54006 2 9.00006 2C11.4501 2 13.4401 3.99 13.4401 6.44C13.4301 8.84 11.5401 10.79 9.16006 10.87Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.41 4C18.35 4 19.91 5.57 19.91 7.5C19.91 9.39 18.41 10.93 16.54 11C16.46 10.99 16.37 10.99 16.28 11" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56C11.43 12.73 6.91997 12.73 4.15997 14.56Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M18.3401 20C19.0601 19.85 19.7401 19.56 20.3001 19.13C21.8601 17.96 21.8601 16.03 20.3001 14.86C19.7501 14.44 19.0801 14.16 18.3701 14" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="text-[15px]">کاربران ها</span>
        </a>

        <a data-section="sells"
           class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white"
           style="cursor: pointer;">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M19.3 7.91998V13.07C19.3 16.15 17.54 17.47 14.9 17.47H6.10995C5.65995 17.47 5.22996 17.43 4.82996 17.34C4.57996 17.3 4.33996 17.23 4.11996 17.15C2.61996 16.59 1.70996 15.29 1.70996 13.07V7.91998C1.70996 4.83998 3.46995 3.52002 6.10995 3.52002H14.9C17.14 3.52002 18.75 4.47001 19.18 6.64001C19.25 7.04001 19.3 7.44998 19.3 7.91998Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M22.3011 10.9201V16.0701C22.3011 19.1501 20.5411 20.4701 17.9011 20.4701H9.11105C8.37105 20.4701 7.70106 20.3701 7.12106 20.1501C5.93106 19.7101 5.12105 18.8001 4.83105 17.3401C5.23105 17.4301 5.66105 17.4701 6.11105 17.4701H14.9011C17.5411 17.4701 19.3011 16.1501 19.3011 13.0701V7.9201C19.3011 7.4501 19.2611 7.03014 19.1811 6.64014C21.0811 7.04014 22.3011 8.38011 22.3011 10.9201Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M10.4984 13.1399C11.9564 13.1399 13.1384 11.9579 13.1384 10.4999C13.1384 9.04185 11.9564 7.85986 10.4984 7.85986C9.04038 7.85986 7.8584 9.04185 7.8584 10.4999C7.8584 11.9579 9.04038 13.1399 10.4984 13.1399Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M4.78003 8.2998V12.6998" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16.2217 8.30029V12.7003" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>

          <span class="text-[15px]">فروشات</span>
        </a>

        <a data-section="reports"
           class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white"
           style="cursor: pointer;">
          <svg class="group-hover:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.11 11.1501H7.46005C6.83005 11.1501 6.32007 11.6601 6.32007 12.2901V17.4101H10.11V11.1501V11.1501Z" fill="none" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12.7613 6.6001H11.2413C10.6113 6.6001 10.1013 7.11011 10.1013 7.74011V17.4001H13.8913V7.74011C13.8913 7.11011 13.3913 6.6001 12.7613 6.6001Z" fill="none" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.5482 12.8501H13.8982V17.4001H17.6882V13.9901C17.6782 13.3601 17.1682 12.8501 16.5482 12.8501Z" fill="none" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" fill="none" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="text-[15px]">گزارشات</span>
        </a>

        <a data-section="counts"
           class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white"
           style="cursor: pointer;">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7.5 7.67001V6.70001C7.5 4.45001 9.31 2.24001 11.56 2.03001C14.24 1.77001 16.5 3.88001 16.5 6.51001V7.89001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M9.00007 22H15.0001C19.0201 22 19.7401 20.39 19.9501 18.43L20.7001 12.43C20.9701 9.99 20.2701 8 16.0001 8H8.00007C3.73007 8 3.03007 9.99 3.30007 12.43L4.05007 18.43C4.26007 20.39 4.98007 22 9.00007 22Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M15.4955 12H15.5045" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M8.49451 12H8.50349" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>

          <span class="text-[15px]"> سفارشات</span>
        </a>
        <a data-section="customers"
           class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white"
           style="cursor: pointer;">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M9 8H21" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>

          <span class="text-[15px]"> خرید و تامین کننده</span>
        </a>   
        <a data-section="counts"
           class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white"
           style="cursor: pointer;">
          <svg class="group-hover:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 7V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.25 11H7.75C6.79 11 6 10.21 6 9.25V6.75C6 5.79 6.79 5 7.75 5H16.25C17.21 5 18 5.79 18 6.75V9.25C18 10.21 17.21 11 16.25 11Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10.3 15.2803L8 17.5803" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M8.03003 15.3101L10.33 17.61" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.49 15.3301H16.51" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14.49 17.5V17.48" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="text-[15px]"> حسابات</span>
        </a>
       
        <a data-section="counts"
           class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white"
           style="cursor: pointer;">
            <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
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



          <span class="text-[15px]">    خدمات و تعمیرات
          </span>
        </a>

        <a data-section="users"
           class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white"
           style="cursor: pointer;">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.40002 6.5H15.6C19 6.5 19.34 8.09 19.57 10.03L20.47 17.53C20.76 19.99 20 22 16.5 22H7.51003C4.00003 22 3.24002 19.99 3.54002 17.53L4.44003 10.03C4.66003 8.09 5.00002 6.5 8.40002 6.5Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M8 8V4.5C8 3 9 2 10.5 2H13.5C15 2 16 3 16 4.5V8" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M20.41 17.0298H8" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>

          <span class="text-[15px]"> موجودی اجناس</span>
        </a>

        <div class="space-y-1 mt-2 lg:mt-0">
          <a data-section="settings"
             class="menu-btn group w-full text-right flex  gap-3 rounded-xl px-2 py-2 text-sm text-gray-700 transition hover:bg-blue-600 hover:text-white"
             style="cursor: pointer;">
            <svg class="group-hover:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 9.11011V14.8801C3 17.0001 3 17.0001 5 18.3501L10.5 21.5301C11.33 22.0101 12.68 22.0101 13.5 21.5301L19 18.3501C21 17.0001 21 17.0001 21 14.8901V9.11011C21 7.00011 21 7.00011 19 5.65011L13.5 2.47011C12.68 1.99011 11.33 1.99011 10.5 2.47011L5 5.65011C3 7.00011 3 7.00011 3 9.11011Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="text-[15px]">تنظیمات</span>
          </a>
        </div>
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
<<<<<<< HEAD
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 35f639f42dfbb415133f110a21e2e895a9349a44
=======
</html>
>>>>>>> origin/Marwa-K
