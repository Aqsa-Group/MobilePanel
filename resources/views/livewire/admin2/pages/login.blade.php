<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="bg-slate-200 max-w-7xl  h-screen sm:h-screen flex justify-center md:items-center">
        <div class="max-w-7xl  mx-auto flex ">
            <div class="w-full h-[500px] bg-white hidden md:flex justify-center items-center">
                <div class="w-full flex flex-col justify-center items-center">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold text-[#002ED3]">پنل بازار الکترونیک</h1>
                        <p class="text-[#005CAF80] text-sm mt-3">لطفا اکانت تان را تایید کنید</p>
                    </div>
                    <div class="w-[80%]   mt-20 space-y-10">
                        <div class="relative">
                            <input type="text" name="username"  value="{{ old('username') }}"
                             class="border border-gray-400 py-4 pr-10 rounded-xl w-full focus:border-black outline-none" placeholder="نام کاربری">
                                @error('username')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                             <div class="absolute top-5 right-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.16021 14.56C4.74021 16.18 4.74021 18.82 7.16021 20.43C9.91021 22.27 14.4202 22.27 17.1702 20.43C19.5902 18.81 19.5902 16.17 17.1702 14.56C14.4302 12.73 9.92021 12.73 7.16021 14.56Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="relative">
                            <input type="password"  name="password"
                             class="border border-gray-400 py-4 pr-10 rounded-xl w-full focus:border-black outline-none" placeholder="رمز عبور">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                             <div class="absolute top-5 right-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 10V8C6 4.69 7 2 12 2C17 2 18 4.69 18 8V10" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 18.5C13.3807 18.5 14.5 17.3807 14.5 16C14.5 14.6193 13.3807 13.5 12 13.5C10.6193 13.5 9.5 14.6193 9.5 16C9.5 17.3807 10.6193 18.5 12 18.5Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17 22H7C3 22 2 21 2 17V15C2 11 3 10 7 10H17C21 10 22 11 22 15V17C22 21 21 22 17 22Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <input type="submit" class="w-full bg-[#002ED3] hover:scale-105 transition-all duration-300 cursor-pointer text-white rounded-xl py-4 text-xl" value="ورود">
                    </div>
                </div>
            </div>
            <div class="bg-[url(https://i.postimg.cc/Dwy5BYfJ/photologin.jpg)] w-full sm:w-[600px]  sm:h-[500px] max-h-[600px] bg-cover ">
                <div class="bg-[#00000080] w-full sm:h-[500px] h-[600px]  flex justify-center">
                    <div class="bg-white md:hidden w-[90%] h-[80%] flex flex-col justify-center items-center  mt-10">
                        <div class="text-center">
                            <h1 class="text-4xl font-bold text-[#002ED3]">پنل بازار الکترونیک</h1>
                            <p class="text-[#005CAF80] text-sm mt-3">لطفا اکانت تان را تایید کنید</p>
                        </div>
                        <div class="w-[80%]  mt-20 space-y-10">
                            <div class="relative">
                                <input type="text" class="border border-gray-400 py-4 pr-10 rounded-xl w-full focus:border-black outline-none" placeholder="نام کاربری">
                                <div class="absolute top-5 right-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.16021 14.56C4.74021 16.18 4.74021 18.82 7.16021 20.43C9.91021 22.27 14.4202 22.27 17.1702 20.43C19.5902 18.81 19.5902 16.17 17.1702 14.56C14.4302 12.73 9.92021 12.73 7.16021 14.56Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="password" class="border border-gray-400 py-4 pr-10 rounded-xl w-full focus:border-black outline-none" placeholder="رمز عبور">
                                <div class="absolute top-5 right-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10V8C6 4.69 7 2 12 2C17 2 18 4.69 18 8V10" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 18.5C13.3807 18.5 14.5 17.3807 14.5 16C14.5 14.6193 13.3807 13.5 12 13.5C10.6193 13.5 9.5 14.6193 9.5 16C9.5 17.3807 10.6193 18.5 12 18.5Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17 22H7C3 22 2 21 2 17V15C2 11 3 10 7 10H17C21 10 22 11 22 15V17C22 21 21 22 17 22Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="submit" class="w-full bg-[#002ED3] hover:scale-105 transition-all duration-300 cursor-pointer text-white rounded-xl py-4 text-xl" value="ورود">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
