

<div class="flex min-h-screen">

  <!-- Main -->
  <main class="flex-1 p-6">


    <div class="bg-white rounded-2xl shadow p-6">
        <h1 class="text-xl font-bold text-center mb-6">فروشات  </h1>
      <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                            <div class="flex justify-between mb-3">
                        <div class="flex gap-1 items-center">
                                <a  class="flex items-center gap-1 px-3 py-2 bg-[#1E40AF] text-white rounded-lg cursor-pointer
                                whitespace-nowrap"   id="btnLoan" onclick="showLoanTable()">

                                    <span class="hidden md:inline text-[10px] truncate">فرم فروشات ها پرچون   </span>
                                </a>
                                <a  class="flex items-center gap-1 px-3 py-2 bg-[#1E40AF] text-white rounded-lg
                                 cursor-pointer whitespace-nowrap" id="btnCash" onclick="showCashTable()">
                                    <span class="hidden md:inline text-[10px] truncate">فرم فروشات ها عمده   </span>
                                </a>
                        </div>


                        <div class="flex flex-col lg:flex-row gap-2 items-center">
                            <div class="flex-1 relative w-full">
                                <input type="text" wire:model.live="search"
                                    class="w-full h-full block rounded-lg bg-[#1E40AF]/20 pr-3 pl-8 py-2 text-[10px] md:text-[10px] focus:outline-none"
                                    placeholder="جستجو">
                                <span class="absolute left-2 top-1/2 -translate-y-1/2">
                                    <svg width="16" height="16" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.899 14.9749C8.8537 14.9749 6.38498 12.5062 6.38498 9.46083C6.38498 6.4155 8.8537 3.94678 11.899 3.94678C14.9444 3.94678 17.4131 6.4155 17.4131 9.46083C17.4131 12.5062 14.9444 14.9749 11.899 14.9749Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.80448 15.5554L6.96533 14.3945" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-none">

                            </div>
                        </div>
                    </div>
        <!-- Device info -->

          <div class="space-y-3" id="loanTable" style="display:block">
            <input type="text" placeholder="اسم" class="w-full border rounded-xl px-4 py-2 focus:outline-none focus:ring" />
            <input type="text" placeholder="مدل دستگاه" class="w-full border rounded-xl px-4 py-2" />
            <input type="text" placeholder="شماره" class="w-full border rounded-xl px-4 py-2" />
            <input type="text" placeholder="مبلغ " class="w-full border rounded-xl px-4 py-2" />
            <input type="text" placeholder="ادمین " class="w-full border rounded-xl px-4 py-2" />
          </div>

         <div class="space-y-3" id="cashTable" style="display:none">
            <input type="text" placeholder="اسم" class="w-full border rounded-xl px-4 py-2 focus:outline-none focus:ring" />
            <input type="text" placeholder="مدل دستگاه" class="w-full border rounded-xl px-4 py-2" />
            <input type="text" placeholder="شماره" class="w-full border rounded-xl px-4 py-2" />
            <input type="text" placeholder="مبلغ " class="w-full border rounded-xl px-4 py-2" />
            <input type="text" placeholder="ادمین " class="w-full border rounded-xl px-4 py-2" />
            <input type="text" placeholder="تذکره " class="w-full border rounded-xl px-4 py-2" />
            <input type="text" placeholder="آدرس " class="w-full border rounded-xl px-4 py-2" />
         </div>
      <!-- Buttons -->
      <div class="flex gap-4 mt-6">
        <button class="flex-1 bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">ثبت</button>
        <button class="flex-1 bg-red-600 text-white py-3 rounded-xl hover:bg-red-700">لغو</button>
        <button class="flex-1 bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">ثبت و چاپ</button>
      </div>
    </div>
  </main>


</div>


<script>

function showLoanTable() {

    document.getElementById("loanTable").style.display = "block";
    document.getElementById("cashTable").style.display = "none";

    document.getElementById("btnLoan").classList.add("bg-blue-700", "text-white");
    document.getElementById("btnCash").classList.remove("bg-blue-700", "text-white");
}

function showCashTable() {

    document.getElementById("loanTable").style.display = "none";
    document.getElementById("cashTable").style.display = "block";

    document.getElementById("btnCash").classList.add("bg-blue-700", "text-white");
    document.getElementById("btnLoan").classList.remove("bg-blue-700", "text-white");
}

</script>
