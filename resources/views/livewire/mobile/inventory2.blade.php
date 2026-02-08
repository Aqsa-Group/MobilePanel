<div class="w-full">
    <main>
        <div class="p-4  max-w-full mx-auto">
            <div class="rounded-xl shadow-xl w-full shadow-[0px_4px_4px_0px_#00000040] border border-gray-300  px-2 py-4">
                <form wire:submit.prevent="save" class="">
                    <div class="flex items-center justify-start">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.66162 11.333H15.3283" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.99487 22H10.6615" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.9949 22H19.3282" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M29.3283 16.0403V21.4803C29.3283 26.1603 28.1416 27.3337 23.4083 27.3337H8.58162C3.84829 27.3337 2.66162 26.1603 2.66162 21.4803V10.5203C2.66162 5.84033 3.84829 4.66699 8.58162 4.66699H19.3283" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25.4349 5.50675L20.4882 10.4534C20.3016 10.6401 20.1149 11.0134 20.0749 11.2801L19.8082 13.1734C19.7149 13.8534 20.1949 14.3334 20.8749 14.2401L22.7682 13.9734C23.0349 13.9334 23.4082 13.7467 23.5949 13.5601L28.5416 8.61342C29.3949 7.76008 29.7949 6.77341 28.5416 5.52008C27.2749 4.25341 26.2882 4.65342 25.4349 5.50675Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.7283 6.21289C25.1549 7.71956 26.3283 8.89289 27.8216 9.30622" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h1 class="font-bold text-lg md:text-2xl">فورم ثبت محصول جدید:</h1>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 mt-4 gap-2">
                        <div class="relative">
                            <h1>بارکد محصول(اختیاری):</h1>
                            <input wire:model="barcode" type="text" class="w-full text-xs input-field rounded-lg pl-8 py-4 px-1 mt-1" placeholder="در صورت خالی بودن خودکار ایجاد میشود.">
                            <div class="absolute left-2 top-10">
                                <svg fill="#000000" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4,4h6v6H4V4M20,4v6H14V4h6M14,15h2V13H14V11h2v2h2V11h2v2H18v2h2v3H18v2H16V18H13v2H11V16h3V15m2,0v3h2V15H16M4,20V14h6v6H4M6,6V8H8V6H6M16,6V8h2V6H16M6,16v2H8V16H6M4,11H6v2H4V11m5,0h4v4H11V13H9V11m2-5h2v4H11V6M2,2V6H0V2A2,2,0,0,1,2,0H6V2H2M22,0a2,2,0,0,1,2,2V6H22V2H18V0h4M2,18v4H6v2H2a2,2,0,0,1-2-2V18H2m20,4V18h2v4a2,2,0,0,1-2,2H18V22Z"></path> </g></svg>
                            </div>
                        </div>
                        <div class="relative">
                            <h1>نام دستگاه:</h1>
                            <input type="text" wire:model.defer="name" class="w-full text-xs input-field rounded-lg pl-8 py-4 px-1 mt-1" placeholder="نام کامل جنس">
                            <div class="absolute left-2 top-10">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.9098 7.84015L7.71979 13.0302C7.51979 13.2302 7.3298 13.6202 7.2898 13.9002L7.0098 15.8802C6.9098 16.6002 7.40979 17.1002 8.12979 17.0002L10.1098 16.7202C10.3898 16.6802 10.7798 16.4902 10.9798 16.2902L16.1698 11.1002C17.0598 10.2102 17.4898 9.17015 16.1698 7.85015C14.8498 6.52015 13.8098 6.94015 12.9098 7.84015Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.1699 8.58008C12.6099 10.1501 13.8399 11.3901 15.4199 11.8301" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="relative">
                            <h1>کتگوری:</h1>
                            <select wire:model.defer="category" class="input-field rounded-lg mt-1 pl-8 p-2.5 ">
                                <option value="">کتگوری</option>
                                <option value="موبایل">موبایل</option>
                                <option value="تبلت">تبلت</option>
                                <option value="لپتاب">لپتاب</option>
                            </select>
                        </div>
                        <div class="relative">
                            <h1>حالت:</h1>
                            <select wire:model.defer="status" class="input-field rounded-lg mt-1 pl-8 p-2.5">
                                <option value="">حالت</option>
                                <option value="نو">نو</option>
                                <option value="کارکرده">کارکرده</option>
                                <option value="معیوب">معیوب</option>
                            </select>
                        </div>
                        <div class="relative">
                            <h1>شرکت:</h1>
                            <input wire:model.defer="company"  type="text" class="w-full text-xs input-field rounded-lg pl-8 py-4 px-1 mt-1" placeholder="نام شرکت">
                            <div class="absolute left-2 top-10">
                                <svg fill="#000000" width="24" height="24" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M8 2L8 6L4 6L4 48L46 48L46 14L30 14L30 6L26 6L26 2 Z M 10 4L24 4L24 8L28 8L28 46L19 46L19 39L15 39L15 46L6 46L6 8L10 8 Z M 10 10L10 12L12 12L12 10 Z M 14 10L14 12L16 12L16 10 Z M 18 10L18 12L20 12L20 10 Z M 22 10L22 12L24 12L24 10 Z M 10 15L10 19L12 19L12 15 Z M 14 15L14 19L16 19L16 15 Z M 18 15L18 19L20 19L20 15 Z M 22 15L22 19L24 19L24 15 Z M 30 16L44 16L44 46L30 46 Z M 32 18L32 20L34 20L34 18 Z M 36 18L36 20L38 20L38 18 Z M 40 18L40 20L42 20L42 18 Z M 10 21L10 25L12 25L12 21 Z M 14 21L14 25L16 25L16 21 Z M 18 21L18 25L20 25L20 21 Z M 22 21L22 25L24 25L24 21 Z M 32 22L32 24L34 24L34 22 Z M 36 22L36 24L38 24L38 22 Z M 40 22L40 24L42 24L42 22 Z M 32 26L32 28L34 28L34 26 Z M 36 26L36 28L38 28L38 26 Z M 40 26L40 28L42 28L42 26 Z M 10 27L10 31L12 31L12 27 Z M 14 27L14 31L16 31L16 27 Z M 18 27L18 31L20 31L20 27 Z M 22 27L22 31L24 31L24 27 Z M 32 30L32 32L34 32L34 30 Z M 36 30L36 32L38 32L38 30 Z M 40 30L40 32L42 32L42 30 Z M 10 33L10 37L12 37L12 33 Z M 14 33L14 37L16 37L16 33 Z M 18 33L18 37L20 37L20 33 Z M 22 33L22 37L24 37L24 33 Z M 32 34L32 36L34 36L34 34 Z M 36 34L36 36L38 36L38 34 Z M 40 34L40 36L42 36L42 34 Z M 32 38L32 40L34 40L34 38 Z M 36 38L36 40L38 40L38 38 Z M 40 38L40 40L42 40L42 38 Z M 10 39L10 44L12 44L12 39 Z M 22 39L22 44L24 44L24 39 Z M 32 42L32 44L34 44L34 42 Z M 36 42L36 44L38 44L38 42 Z M 40 42L40 44L42 44L42 42Z"></path></g></svg>
                            </div>
                        </div>
                        <div class="relative">
                            <h1>قیمت خرید هر محصول:</h1>
                            <input  wire:model.defer="buy_price" type="text" class="w-full text-xs input-field no-spinner rounded-lg pl-8 py-4 px-1 mt-1" placeholder="75,000؋">
                            <div class="absolute left-2 top-10">
                                <svg width="24" height="24" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="layer1"> <path d="M 0 4 L 0 15 L 18 15 L 18 4 L 0 4 z M 1 5 L 17 5 L 17 14 L 1 14 L 1 5 z M 3 6 C 3 6.558207 2.558207 7 2 7 L 2 8 C 3.0986472 8 4 7.0986472 4 6 L 3 6 z M 8.5 6 L 8.5 7 C 7.677495 7 7 7.677495 7 8.5 C 7 9.322505 7.677495 10 8.5 10 L 9.5 10 C 9.782065 10 10 10.217935 10 10.5 C 10 10.782065 9.782065 11 9.5 11 L 8.5 11 L 7 11 L 7 12 L 8.5 12 L 8.5 13 L 9.5 13 L 9.5 12 C 10.322504 12 11 11.322505 11 10.5 C 11 9.6774955 10.322504 9 9.5 9 L 8.5 9 C 8.217935 9 8 8.782065 8 8.5 C 8 8.217935 8.217935 8 8.5 8 L 9.5 8 L 11 8 L 11 7 L 9.5 7 L 9.5 6 L 8.5 6 z M 14 6 C 14 7.0986472 14.901353 8 16 8 L 16 7 C 15.441793 7 15 6.558207 15 6 L 14 6 z M 19 6 L 19 16 L 2 16 L 2 17 L 20 17 L 20 6 L 19 6 z M 2 11 L 2 12 C 2.558207 12 3 12.441793 3 13 L 4 13 C 4 11.901353 3.0986472 11 2 11 z M 16 11 C 14.901353 11 14 11.901353 14 13 L 15 13 C 15 12.441793 15.441793 12 16 12 L 16 11 z " style="fill:#222222; fill-opacity:1; stroke:none; stroke-width:0px;"></path> </g> </g></svg>
                            </div>
                        </div>
                        <div class="relative">
                            <h1>مبلغ کل خرید:</h1>
                            <input wire:model.defer="total_buy"   type="text" class="w-full text-xs no-spinner input-field rounded-lg pl-8 py-4 px-1 mt-1" placeholder="75,000؋">
                            <div class="absolute left-2 top-10">
                                <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 31.521 31.522" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M12.204,8.502L9.517,1.407h12.479l-2.688,7.095H12.204z M10.648,9.782h10.225v-1H10.648V9.782z M24.029,12.801 l-1.604-4.242h7.545l-1.604,4.242H24.029z M23.869,9.559l0.851,2.242h2.953l0.851-2.242H23.869z M3.154,12.801L1.55,8.559h7.545 L7.49,12.801H3.154z M2.995,9.559l0.85,2.242h2.953l0.85-2.242H2.995z M17.617,20.792c-0.217-0.146-0.669-0.219-1.355-0.219v2.381 h0.22c0.976,0,1.463-0.418,1.463-1.256C17.945,21.24,17.836,20.936,17.617,20.792z M13.668,18.066c0,0.745,0.448,1.118,1.344,1.118 c0.009,0,0.084,0.004,0.226,0.013V16.99l-0.22,0.006C14.118,16.997,13.668,17.352,13.668,18.066z M31.521,17.193v6.17 c0,1.76-1.434,3.19-3.193,3.19H24.09c-0.701,2.062-2.635,3.562-4.932,3.562h-6.699c-2.299,0-4.235-1.5-4.936-3.567 c-0.022,0-0.046,0.008-0.07,0.008H3.191C1.43,26.555,0,25.123,0,23.364v-6.17c0-1.762,1.432-3.192,3.191-3.192h4.186 c0.005-0.022,0.016-0.042,0.021-0.065H2.07v-1h5.697c0.844-1.754,2.617-2.978,4.69-2.978h6.698c2.074,0,3.85,1.223,4.69,2.978 h5.603v1h-5.23c0.006,0.022,0.018,0.042,0.021,0.065h4.09C30.088,13.999,31.521,15.43,31.521,17.193z M7.294,25.553 c-0.028-0.223-0.067-0.438-0.067-0.67v-9.696c0-0.064,0.017-0.125,0.021-0.188H3.191C1.982,15,1,15.983,1,17.192v6.17 c0,1.209,0.982,2.191,2.191,2.191H7.294L7.294,25.553z M19.482,21.672c0-0.885-0.197-1.49-0.595-1.822 c-0.396-0.332-1.157-0.526-2.288-0.59l-0.338-0.014v-2.25H16.5c0.833,0,1.25,0.332,1.25,1l0.006,0.162h1.469v-0.207 c0-0.883-0.209-1.486-0.628-1.812c-0.419-0.324-1.196-0.487-2.335-0.487v-0.875h-1.024v0.875c-1.191,0-2.008,0.17-2.447,0.51 c-0.438,0.341-0.66,0.97-0.66,1.892c0,0.949,0.221,1.599,0.656,1.943c0.438,0.346,1.256,0.52,2.451,0.52v2.438l-0.226-0.006 c-0.612,0-1.008-0.08-1.185-0.242c-0.178-0.158-0.268-0.518-0.268-1.07v-0.156H12.04l-0.007,0.306c0,0.91,0.219,1.547,0.654,1.914 c0.434,0.367,1.188,0.549,2.26,0.549l0.287,0.007v1.006h1.026v-1.006l0.313-0.008c1.076,0,1.828-0.191,2.26-0.574 S19.482,22.622,19.482,21.672z M30.521,17.193c0-1.209-0.984-2.192-2.193-2.192h-3.959c0.002,0.064,0.02,0.124,0.02,0.188v9.697 c0,0.229-0.039,0.446-0.066,0.67h4.008c1.209,0,2.191-0.982,2.191-2.191V17.193L30.521,17.193z"></path> </g> </g></svg>
                            </div>
                        </div>
                        <div class="relative">
                            <h1>مبلغ رسید:</h1>
                            <input wire:model.defer="paid_amount" type="text" class="w-full text-xs input-field rounded-lg pl-8 py-4 px-1 mt-1 no-spinner" placeholder="75,000؋">
                            <div class="absolute left-2 top-10">
                                <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 496 496" xml:space="preserve" width="24" height="24"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M472,96c13.232,0,24-10.768,24-24V24c0-13.232-10.768-24-24-24H312c-13.232,0-24,10.768-24,24v48 c0,13.232,10.768,24,24,24h48v240h-16V152c0-22.056-17.944-40-40-40H192V0H48v112h-8c-22.056,0-40,17.944-40,40v184v8v152h496 V336h-72V96H472z M64,16h16v16h16V16h16v16h16V16h16v16h16V16h16v144H64V16z M16,152c0-13.232,10.768-24,24-24h8v32H32v16h176 v-16h-16v-32h112c13.232,0,24,10.768,24,24v184H16V152z M480,352v128H16V352H480z M376,336V96h32v240H376z M312,80 c-4.416,0-8-3.584-8-8V24c0-4.416,3.584-8,8-8h160c4.416,0,8,3.584,8,8v48c0,4.416-3.584,8-8,8H312z"></path> <rect x="448" y="48" width="16" height="16"></rect> <rect x="360" y="48" width="72" height="16"></rect> <rect x="80" y="48" width="80" height="16"></rect> <rect x="80" y="80" width="80" height="16"></rect> <rect x="128" y="112" width="32" height="16"></rect> <path d="M240,256h48v-48h-48V256z M256,224h16v16h-16V224z"></path> <path d="M176,256h48v-48h-48V256z M192,224h16v16h-16V224z"></path> <path d="M112,256h48v-48h-48V256z M128,224h16v16h-16V224z"></path> <path d="M48,256h48v-48H48V256z M64,224h16v16H64V224z"></path> <path d="M240,320h48v-48h-48V320z M256,288h16v16h-16V288z"></path> <path d="M176,320h48v-48h-48V320z M192,288h16v16h-16V288z"></path> <path d="M112,320h48v-48h-48V320z M128,288h16v16h-16V288z"></path> <path d="M48,320h48v-48H48V320z M64,288h16v16H64V288z"></path> <path d="M248,464c23.736,0,43.448-17.336,47.28-40H376v-16h-80.72c-3.824-22.664-23.544-40-47.28-40 c-23.736,0-43.448,17.336-47.28,40H120v16h80.72C204.552,446.664,224.264,464,248,464z M248,384c17.648,0,32,14.352,32,32 s-14.352,32-32,32s-32-14.352-32-32S230.352,384,248,384z"></path> </g> </g> </g> </g></svg>
                            </div>
                        </div>
                        <div class="relative">
                            <h1>موجودی کل:</h1>
                            <input wire:model.defer="quantity" type="text" class="w-full no-spinner text-xs input-field rounded-lg pl-8 py-4 px-1 mt-1" placeholder="30">
                            <div class="absolute left-2 top-10">
                                <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 256 253" enable-background="new 0 0 256 253" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M122,219H76v-45h18v14h10v-14h18V219z M182,219h-46v-45h18v14h10v-14h18V219z M152,160h-46v-45h18v14h10v-14h18V160z M2,69 c0,13.678,9.625,25.302,22,29.576V233H2v18h252v-18h-22V98.554c12.89-3.945,21.699-15.396,22-29.554v-8H2V69z M65.29,68.346 c0,6.477,6.755,31.47,31.727,31.47c21.689,0,31.202-19.615,31.202-31.47c0,11.052,7.41,31.447,31.464,31.447 c21.733,0,31.363-20.999,31.363-31.447c0,14.425,9.726,26.416,22.954,30.154V233H42V98.594C55.402,94.966,65.29,82.895,65.29,68.346 z M222.832,22H223V2H34v20L2,54h252L222.832,22z"></path> </g></svg>
                            </div>
                        </div>
                        <div class="relative">
                            <h1>آپلود عکس محصول:</h1>
                            <div class="relative w-full">
                                <input   wire:model.defer="image"   type="file"   id="imageInput"  class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"   >
                                <div class="w-full text-xs input-field rounded-lg  py-3 mt-1 flex items-center border h-12">
                                    <div class="flex-1 flex justify-start items-center space-x-2">
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" class="w-8 h-8 rounded object-cover border" alt="preview">
                                            <span class="text-xs text-gray-700">{{ \Illuminate\Support\Str::limit($image->getClientOriginalName(), 15) }}</span>
                                        @else
                                            <span class="text-xs text-gray-700">انتخاب فایل</span>
                                        @endif
                                    </div>
                                    <div class="flex-shrink-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.6136 15.3473L17.8651 10.9766L21 13.9844M6.96484 19L11.9688 13.9766L17.9727 19M9.96875 9.97656C9.96875 11.0811 9.07332 11.9766 7.96875 11.9766C6.86418 11.9766 5.96875 11.0811 5.96875 9.97656C5.96875 8.87199 6.86418 7.97656 7.96875 7.97656C9.07332 7.97656 9.96875 8.87199 9.96875 9.97656ZM12.0627 6.06274L11.9373 5.93726C11.5914 5.59135 11.4184 5.4184 11.2166 5.29472C11.0376 5.18506 10.8425 5.10425 10.6385 5.05526C10.4083 5 10.1637 5 9.67452 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V10.2C21 9.0799 21 8.51984 20.782 8.09202C20.5903 7.71569 20.2843 7.40973 19.908 7.21799C19.4802 7 18.9201 7 17.8 7H14.3255C13.8363 7 13.5917 7 13.3615 6.94474C13.1575 6.89575 12.9624 6.81494 12.7834 6.70528C12.5816 6.5816 12.4086 6.40865 12.0627 6.06274Z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row">
                        <button class="w-full  bg-red-800 hover:bg-red-700 text-white mt-2 rounded-lg py-2 font-bold text-xl cursor-pointer">لغو</button>
                        <input type="submit" class="w-full  bg-blue-800 hover:bg-blue-700 text-white mt-2 rounded-lg py-2 font-bold text-xl cursor-pointer" value="ثبت محصول جدید">
                    </div>
                </from>
            </div>
            <div class="grid grid-cols-1 w-full lg:grid-cols-2 gap-3 pt-2">
                <div class="lg:col-span-2 border border-gray-300 rounded-2xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl  w-full lg:max-w-full p-3">
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
                                <h2 class="font-bold text-lg mb-0">  لیست موجودی تمام محصولات گدام:</h2>
                            </div>
                            <div class="flex gap-2 w-full ">
                                <div class="relative   w-full  md:w-1/4  ">
                                    <input type="text"  wire:model.live="search" class="w-full h-full block rounded-md md:rounded bg-[#1E40AF]/20  md:top-0 md:right-0 pr-2 text-[7px] sm:p-4  p-4  md:text-[10px]" placeholder="جستجو">
                                    <span class="absolute md:hidden left-1  top-3">
                                        <svg  width="14" height="14" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.899 14.9749C8.8537 14.9749 6.38498 12.5062 6.38498 9.46083C6.38498 6.4155 8.8537 3.94678 11.899 3.94678C14.9444 3.94678 17.4131 6.4155 17.4131 9.46083C17.4131 12.5062 14.9444 14.9749 11.899 14.9749Z"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5.80448 15.5554L6.96533 14.3945" stroke="#292D32" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @forelse($products as $product)
                        <div class="p-4">
                            <div class="">
                                <div class="grid grid-cols-2 gap-5 text-center text-sm">
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1"> عکس </div>
                                        <div class="text-gray-900 font-bold flex justify-center"> @if($product->image)
                                            <img src="{{ asset('storage/'.$product->image) }}" class="w-10 h-10  rounded-full">
                                        @endif </div>
                                    </div>
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1">بار کد </div>
                                        <div class="text-gray-900 font-bold">{{ $product->barcode }} </div>
                                    </div>
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1">نام دستگاه</div>
                                        <div class="text-gray-900 font-bold">{{ $product->name  }} </div>
                                    </div>
                                    <div>
                                        <div class="text-gray-600 text-xs font-semibold mb-1">کتکوری</div>
                                        <div class="text-gray-900 font-bold"> {{ $product->category  }}</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">  حالت   </div>
                                        <div class="text-gray-900 font-bold">   {{ ($product->status ) }}</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">شرکت </div>
                                        <div class="text-gray-900 font-bold">  {{ $product->company  }}</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">ادمین </div>
                                        <div class="text-gray-900 font-bold">  @if($product->admin)   {{ $product->admin->name }} ({{ $product->admin->rule }})   @else     --  @endif</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">قیمت خرید </div>
                                        <div class="text-gray-900 font-bold"> {{ ($product->buy_price) }}؋</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1"> مبلغ رسید   </div>
                                        <div class="text-gray-900 font-bold"> {{ ($product->sell_price_wholesale) }}</div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">  الباقی قیمت  </div>
                                        <div class="text-gray-900 font-bold"> <span > {{ ($product->total_buy) }}</span></div>
                                    </div>
                                    <div class="">
                                        <div class="text-gray-600 text-xs font-semibold mb-1">  موجودی   </div>
                                        <div class="text-gray-900 font-bold">{{ $product->quantity }} </div>
                                    </div>
                                </div>
                                <div class="flex justify-center gap-3 mt-5">
                                    <button  wire:click="edit({{ $product->id }})" class="flex items-center gap-1 text-[#1C274C] border-[#1C274C] border border-2 e py-2 px-3 rounded-lg text-xs">
                                        <i class="bi bi-pencil-square">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                        </i> چاپ
                                    </button>
                                    <button  wire:click="edit({{ $product->id }})" class="flex items-center gap-1 text-[#1E40AF]  border-blue-800 border border-2 e py-2 px-3 rounded-lg text-xs">
                                        <i class="bi bi-pencil-square">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02025L8.15988 10.9003C7.85988 11.2003 7.55988 11.7903 7.49988 12.2203L7.06988 15.2303C6.90988 16.3203 7.67988 17.0803 8.76988 16.9303L11.7799 16.5003C12.1999 16.4403 12.7899 16.1403 13.0999 15.8403L20.9799 7.96025C22.3399 6.60025 22.9799 5.02025 20.9799 3.02025C18.9799 1.02025 17.3999 1.66025 16.0399 3.02025Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15039C15.5802 6.54039 17.4502 8.41039 19.8502 9.09039" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        </i> ویرایش
                                    </button>
                                </div>
                            </div>
                            <div class="border-b border-gray-300 mt-5"></div>
                        </div>
                        @empty
                        <div class="flex justify-center gap-3 mt-5">
                            هیچ محصولی ثبت نشده
                        </div>
                    @endforelse
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
                                <h2 class="font-bold text-lg mb-0">  لیست موجودی تمام محصولات گدام:</h2>
                            </div>
                            <div class="flex flex-col lg:flex-row gap-1">
                                <div class="relative   w-full   ">
                                    <input type="text"  wire:model.live="search" class="w-full h-full block rounded-md md:rounded bg-[#1E40AF]/20  md:top-0 md:right-0 pr-2 text-[7px] sm:p-4  p-4  md:text-[10px]" placeholder="جستجو">
                                    <span class="hidden md:block absolute left-2 top-4">
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.899 14.9749C8.8537 14.9749 6.38498 12.5062 6.38498 9.46083C6.38498 6.4155 8.8537 3.94678 11.899 3.94678C14.9444 3.94678 17.4131 6.4155 17.4131 9.46083C17.4131 12.5062 14.9444 14.9749 11.899 14.9749Z"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5.80448 15.5554L6.96533 14.3945" stroke="#292D32" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <table class="w-full text-center text-sm border-collapse">
                            <thead class=" bg-[#1E40AF] text-white  border-b-2 border-[#1E40AF] text-center">
                                <tr>
                                    <th class="p-2 text-[12px]">آیدی</th>
                                        <th class="p-2 text-[12px]">عکس</th>
                                    <th class="p-2 text-[12px]"> بارکد</th>
                                    <th class="p-2 text-[12px]">نام دستگاه</th>
                                    <th class="p-2 text-[12px]">کتگوری</th>
                                    <th class="p-2 text-[12px]">حالت</th>
                                    <th class="p-2 text-[12px]">ادمین</th>
                                    <th class="p-2 text-[12px]">شرکت</th>
                                    <th class="p-2 text-[12px]">قیمت خرید</th>
                                    <th class="p-2 text-[12px]"> مبلغ رسید</th>
                                    <th class="p-2 text-[12px]"> الباقی مبلغ</th>
                                    <th class="p-2 text-[12px]">موجودی</th>
                                    <th class="p-2 text-[12px]">ویرایش</th>
                                    <th class="p-2 text-[12px]">چاپ</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $i => $product)
                                <tr class=" text-[10px] border-b-2 border-[#1E40AF]">
                                    <td class="p-2 font-bold">{{ $products->firstItem() + $i }}</td>
                                    <td class="p-2">
                                        @if($product->image) <img src="{{ asset('storage/'.$product->image) }}" class="w-10 block mx-auto  h-10 rounded-full">   @endif
                                    </td>
                                    <td class="p-2">{{ $product->barcode }}</td>
                                    <td class="p-2">{{ $product->name }}</td>
                                    <td class="p-2">{{ $product->category }}</td>
                                    <td class="p-2">{{ $product->status }}</td>
                                    <td class="p-2">@if($product->admin)   {{ $product->admin->name }} ({{ $product->admin->rule }})   @else     --  @endif</td>
                                    <td class="p-2">{{ $product->company }}</td>
                                    <td class="p-2">{{ ($product->buy_price) }}؋</td>
                                    <td class="p-2">{{ ($product->sell_price_wholesale) }}؋</td>
                                    <td class="p-2">{{ ($product->total_buy) }}؋</td>
                                    <td class="p-2">{{ $product->quantity }}</td>
                                    <td class="p-2">
                                        <i    wire:click="edit({{ $product->id }})" class="text-blue-800 flex justify-center text-lg cursor-pointer">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                        </i>
                                    </td>
                                    <td class="p-2">
                                        <i    wire:click="edit({{ $product->id }})" class="text-blue-800 flex justify-center text-lg cursor-pointer">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.01976L8.15988 10.8998C7.85988 11.1998 7.55988 11.7898 7.49988 12.2198L7.06988 15.2298C6.90988 16.3198 7.67988 17.0798 8.76988 16.9298L11.7799 16.4998C12.1999 16.4398 12.7899 16.1398 13.0999 15.8398L20.9799 7.95976C22.3399 6.59976 22.9799 5.01976 20.9799 3.01976C18.9799 1.01976 17.3999 1.65976 16.0399 3.01976Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.1499C15.5802 6.5399 17.4502 8.4099 19.8502 9.0899" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        </i>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="17" class="p-4 text-center text-gray-400">
                                        هیچ محصولی ثبت نشده
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
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
            </div>
        </div>
    </main>
</div>
