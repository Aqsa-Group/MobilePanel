<div>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
.card p {
  color: black;
}


.go-corner {
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  width: 32px;
  height: 32px;
  overflow: hidden;
  top: 0;
  right: 0;
  background-color: #2F25FF;
  border-radius: 0 4px 0 32px;
}

.go-arrow {
  margin-top: -4px;
  margin-right: -4px;
  color: white;
}

.card1 {
  position: relative;
  border-radius: 15px;
  padding: 32px 24px;
  margin: 12px;
  text-decoration: none;
  z-index: 0;
  overflow: hidden;
}

.card1:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: -16px;
  right: -16px;
  background: #2F25FF;
  height: 32px;
  width: 32px;
  border-radius: 32px;
  transform: scale(1);
  transform-origin: 50% 50%;
  transition: transform 0.25s ease-out;
}

.card1:hover:before {
  transform: scale(25);
}

.card1:hover p,
.card1:hover h2 {
  color: white;
  transition: all 0.3s ease-out;
}
.card1:hover #icon path {
  stroke: white; /* تغییر رنگ خطوط SVG */
  transition: stroke 0.3s ease-out;
}


    </style>

 <section data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000" class="max-w-6xl mx-auto px-4 ">
    <!-- Title -->
    <h2 class="text-2xl md:text-3xl font-bold text-center mb-10">
      خدمات ما
    </h2>

    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 ">

      <!-- Card 1 -->
      <div class="bg-gray-100 card1 card rounded-2xl shadow-sm p-8 flex items-center justify-center ">
      <div class="  ">
          <!-- icon -->
          <svg  id="icon" width="40" height="40" class="m-auto" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M68.6329 35.1668V23.7334C68.6329 19.6334 65.4995 15.1001 61.6662 13.6668L45.0329 7.43345C42.2662 6.40011 37.7329 6.40011 34.9662 7.43345L18.3329 13.7001C14.4995 15.1334 11.3662 19.6668 11.3662 23.7334V48.5001C11.3662 52.4334 13.9662 57.6001 17.1329 59.9668L31.4662 70.6668C33.7995 72.4668 36.8995 73.3335 39.9995 73.3335" stroke="#2F25FF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M53.3333 66.6667C60.6971 66.6667 66.6667 60.6971 66.6667 53.3333C66.6667 45.9695 60.6971 40 53.3333 40C45.9695 40 40 45.9695 40 53.3333C40 60.6971 45.9695 66.6667 53.3333 66.6667Z" stroke="#2F25FF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M69.9847 69.9999H70.0147" stroke="#2F25FF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <h2 class="text-xl mt-2 md:text-xl mx-auto font-bold text-center mb-2">
          بررسی وضعیت سرقتی
          </h2>
          <p>با بررسی در پایگاه داده جهانی، می‌توانید مطمئن
            اطمینان از تطابق دستگاه با نیازهای شما مفید قرار می دهد
          </p>
          <div class="go-corner" href="#">
      <div class="go-arrow">
        +
      </div>
    </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-gray-100 card1 rounded-2xl shadow-sm p-8 flex items-center justify-center ">
        <div class="  ">
          <!-- icon -->
          <svg id="icon" width="40" height="40" class="m-auto" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M33.3337 56.5H20.7003C9.46699 56.5 6.66699 53.7 6.66699 42.4667V22.4667C6.66699 11.2334 9.46699 8.43335 20.7003 8.43335H55.8003C67.0337 8.43335 69.8337 11.2334 69.8337 22.4667" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M33.333 71.5667V56.5" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M6.66699 43.1667H33.3337" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M22.4668 71.5667H33.3335" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M73.3333 42.6667V61.7C73.3333 69.6 71.3666 71.5667 63.4666 71.5667H51.6333C43.7333 71.5667 41.7666 69.6 41.7666 61.7V42.6667C41.7666 34.7667 43.7333 32.8 51.6333 32.8H63.4666C71.3666 32.8 73.3333 34.7667 73.3333 42.6667Z" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M57.4814 60.8334H57.5113" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <h2 class="text-xl md:text-xl mt-2 m-auto font-bold text-center mb-2">
             اطلاعات فنی دستگاه
          </h2>
          <p class="">مشخصات کامل دستگاه شامل مدل، سال تولید، وسایر جزئیات فنی را دریافت کنید. این اطلاعات برای است.
          </p>
              <div class="go-corner" href="#">
      <div class="go-arrow">
        +
      </div>
    </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-gray-100 card1 rounded-2xl shadow-sm p-8 flex items-center justify-center ">
        <div class="  ">
          <!-- icon -->
          <svg id="icon" width="40" height="40" class="m-auto" viewBox="0 0 60 70" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.5 54.8333V18.1667C1.5 4.83333 4.83333 1.5 18.1667 1.5H41.5C54.8333 1.5 58.1667 4.83333 58.1667 18.1667V51.5C58.1667 51.9667 58.1667 52.4333 58.1333 52.9" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M11 44.8333H58.1667V56.4999C58.1667 62.9333 52.9333 68.1666 46.5 68.1666H13.1667C6.73333 68.1666 1.5 62.9333 1.5 56.4999V54.3333C1.5 49.0999 5.76667 44.8333 11 44.8333Z" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16.5 18.1665H43.1667" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16.5 29.8333H33.1667" stroke="#2F25FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <h2 class="text-xl md:text-xl mt-2 m-auto font-bold text-center mb-2">
          گزارش کامل
          </h2>
          <p class="">  دریافت گزارش کامل از تمام بررسی‌های انجام شده
          در قالب یک فایل PDF که شامل تمام جزئیات مورد
          نیاز شما است.
          </p>
              <div class="go-corner" href="#">
      <div class="go-arrow">
        +
      </div>
    </div>
        </div>
      </div>

    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
  AOS.init();
</script>
  </section>


</div>
