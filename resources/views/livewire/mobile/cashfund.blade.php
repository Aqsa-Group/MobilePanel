
<div class="max-w-full mx-auto p-4">
    <h2 class="text-xl font-semibold text-center mb-8 text-gray-700"> موجودی صندوق ها</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div  class="bg-[#1E40AF]/10 border-r-4 border-r-[3px] border-[#1E40AF] text-[#1E40AF] p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold"> درآمد کل </h3>
                <div class="bg-[#1E40AF] p-2 text-center rounded-full">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.052 1.25H11.948C11.0495 1.24997 10.3003 1.24995 9.70552 1.32991C9.07773 1.41432 8.51093 1.59999 8.05546 2.05546C7.59999 2.51093 7.41432 3.07773 7.32991 3.70552C7.27259 4.13189 7.25637 5.15147 7.25179 6.02566C5.22954 6.09171 4.01536 6.32778 3.17157 7.17157C2 8.34315 2 10.2288 2 14C2 17.7712 2 19.6569 3.17157 20.8284C4.34314 22 6.22876 22 9.99998 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14C22 10.2288 22 8.34315 20.8284 7.17157C19.9846 6.32778 18.7705 6.09171 16.7482 6.02566C16.7436 5.15147 16.7274 4.13189 16.6701 3.70552C16.5857 3.07773 16.4 2.51093 15.9445 2.05546C15.4891 1.59999 14.9223 1.41432 14.2945 1.32991C13.6997 1.24995 12.9505 1.24997 12.052 1.25ZM15.2479 6.00188C15.2434 5.15523 15.229 4.24407 15.1835 3.9054C15.1214 3.44393 15.0142 3.24644 14.8839 3.11612C14.7536 2.9858 14.5561 2.87858 14.0946 2.81654C13.6116 2.7516 12.964 2.75 12 2.75C11.036 2.75 10.3884 2.7516 9.90539 2.81654C9.44393 2.87858 9.24644 2.9858 9.11612 3.11612C8.9858 3.24644 8.87858 3.44393 8.81654 3.9054C8.771 4.24407 8.75661 5.15523 8.75208 6.00188C9.1435 6 9.55885 6 10 6H14C14.4412 6 14.8565 6 15.2479 6.00188ZM12 9.25C12.4142 9.25 12.75 9.58579 12.75 10V10.0102C13.8388 10.2845 14.75 11.143 14.75 12.3333C14.75 12.7475 14.4142 13.0833 14 13.0833C13.5858 13.0833 13.25 12.7475 13.25 12.3333C13.25 11.9493 12.8242 11.4167 12 11.4167C11.1758 11.4167 10.75 11.9493 10.75 12.3333C10.75 12.7174 11.1758 13.25 12 13.25C13.3849 13.25 14.75 14.2098 14.75 15.6667C14.75 16.857 13.8388 17.7155 12.75 17.9898V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.9898C10.1612 17.7155 9.25 16.857 9.25 15.6667C9.25 15.2525 9.58579 14.9167 10 14.9167C10.4142 14.9167 10.75 15.2525 10.75 15.6667C10.75 16.0507 11.1758 16.5833 12 16.5833C12.8242 16.5833 13.25 16.0507 13.25 15.6667C13.25 15.2826 12.8242 14.75 12 14.75C10.6151 14.75 9.25 13.7903 9.25 12.3333C9.25 11.143 10.1612 10.2845 11.25 10.0102V10C11.25 9.58579 11.5858 9.25 12 9.25Z" fill="#fafafa"></path> </g></svg>
                </div>
            </div>
            <div class="space-y-10">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#1E40AF]">افغانی:</span>
                    <span class="text-lg font-bold">{{ number_format($totalIncomeAFN) }}؋</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#1E40AF]">دالر:</span>
                    <span class="text-lg font-bold"> ${{ number_format($totalIncomeUSD) }}</span>
                </div>
            </div>
        </div>
        <div  class="bg-[#0746F7]/10 border-r-4 border-r-[3px] border-[#0746F7] text-[#0746F7] p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-md font-bold">درآمد تعمیرات </h3>
                <div class="bg-[#0746F7] p-2 text-center rounded-full">
                    <svg fill="#ffffff" width="24px" height="24px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M187.698 120.105c41.846-15.492 89.309-5.554 121.432 26.561 44.941 44.941 44.941 117.826-.002 162.769-44.953 44.953-117.828 44.953-162.781 0-32.25-32.25-42.125-79.975-26.367-121.934 3.977-10.589-1.383-22.396-11.972-26.373s-22.396 1.383-26.373 11.972c-21.357 56.869-7.968 121.581 35.749 165.298 60.949 60.949 159.758 60.949 220.707 0 60.939-60.939 60.939-159.758 0-220.697-43.541-43.53-107.898-57.005-164.614-36.008-10.607 3.927-16.023 15.709-12.096 26.316s15.709 16.023 26.316 12.096z"></path><path d="M161.408 118.082l52.879 52.869c4.331 4.334 4.331 11.381-.001 15.713l-27.924 27.924c-4.341 4.341-11.373 4.341-15.714 0l-52.594-52.584c-7.999-7.997-20.966-7.996-28.963.003s-7.996 20.966.003 28.963l52.593 52.582c20.336 20.336 53.302 20.336 73.639-.001l27.924-27.924c20.326-20.326 20.326-53.297.006-73.634l-52.887-52.877c-7.999-7.997-20.966-7.996-28.963.003s-7.996 20.966.003 28.963zM836.42 904.635c-41.846 15.492-89.309 5.554-121.432-26.561-44.941-44.941-44.941-117.826.002-162.769 44.953-44.953 117.828-44.953 162.781 0 32.25 32.25 42.125 79.975 26.367 121.934-3.977 10.589 1.383 22.396 11.972 26.373s22.396-1.383 26.373-11.972c21.357-56.869 7.968-121.581-35.749-165.298-60.949-60.949-159.758-60.949-220.707 0-60.939 60.939-60.939 159.758 0 220.697 43.541 43.53 107.898 57.005 164.614 36.008 10.607-3.927 16.023-15.709 12.096-26.316s-15.709-16.023-26.316-12.096z"></path><path d="M862.712 906.659l-52.869-52.869c-4.34-4.34-4.34-11.377-.006-15.708l27.923-27.933c4.339-4.339 11.37-4.339 15.711.003l52.594 52.584c7.999 7.997 20.966 7.996 28.963-.003s7.996-20.966-.003-28.963l-52.593-52.582c-20.336-20.336-53.302-20.336-73.639.001l-27.917 27.927c-20.335 20.319-20.335 53.299.003 73.638l52.869 52.869c7.998 7.998 20.965 7.998 28.963 0s7.998-20.965 0-28.963zM674.469 738.186l-391.26-391.26c-7.998-7.998-20.965-7.998-28.963 0s-7.998 20.965 0 28.963l391.26 391.26c7.998 7.998 20.965 7.998 28.963 0s7.998-20.965 0-28.963zM343.768 279.258l400.374 400.374c7.998 7.998 20.965 7.998 28.963 0s7.998-20.965 0-28.963L372.731 250.295c-7.998-7.998-20.965-7.998-28.963 0s-7.998 20.965 0 28.963zm255.917 112.52l176.732-176.732c7.998-7.998 7.998-20.965 0-28.963s-20.965-7.998-28.963 0L570.722 362.815c-7.998 7.998-7.998 20.965 0 28.963s20.965 7.998 28.963 0zm214.393-149.914L631.53 422.641c-8.037 7.959-8.1 20.926-.141 28.963s20.926 8.1 28.963.141L842.9 270.968c8.037-7.959 8.1-20.926.141-28.963s-20.926-8.1-28.963-.141z"></path><path d="M945.721 131.005a20.48 20.48 0 014.873 21.176l-28.201 81.531a20.481 20.481 0 01-12.659 12.66l-81.541 28.211a20.48 20.48 0 01-21.179-4.874l-53.32-53.33a20.48 20.48 0 01-4.872-21.175l28.201-81.531a20.478 20.478 0 0112.658-12.659l81.531-28.211a20.478 20.478 0 0121.178 4.873l53.33 53.33zm-73.228-15.302l-60.012 20.765-20.758 60.014 35.194 35.201 60.021-20.766 20.758-60.012-35.202-35.202zm-421.165 544.57L208.763 902.838c-7.497 7.497-16.502 8.466-19.734 5.237l-74.541-74.541c-3.223-3.226-2.254-12.226 5.248-19.733l242.089-242.079c7.998-7.998 7.998-20.965.001-28.963s-20.965-7.998-28.963-.001L90.769 784.842c-22.28 22.295-26.003 56.877-5.249 77.648l74.553 74.553c20.778 20.76 55.375 17.036 77.654-5.243l242.565-242.565c7.998-7.998 7.998-20.965 0-28.963s-20.965-7.998-28.963 0z"></path></g></svg>
                </div>
            </div>
            <div class="space-y-10">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#0746F7]">افغانی:</span>
                    <span class="text-md font-bold">{{ number_format($repairIncomeAFN) }}؋</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#0746F7]">دالر:</span>
                    <span class="text-md font-bold">${{ number_format($repairIncomeUSD, 2) }}</span>
                </div>
            </div>
        </div>
        <div  class="bg-[#0099FF]/10 border-r-[3px] border-[#0099FF] text-[#0099FF] p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold"> فروش کل </h3>
                <div class="bg-[#0099FF] p-2 rounded-full">
                    <svg width="24px" height="24px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="layer1"> <path d="M 9.5 0 L 9.5 1 C 8.6774954 1 8 1.677495 8 2.5 C 8 3.322505 8.6774954 4 9.5 4 L 10.5 4 C 10.782065 4 11 4.217935 11 4.5 C 11 4.782065 10.782065 5 10.5 5 L 9.5 5 L 8 5 L 8 6 L 9.5 6 L 9.5 7 L 10.5 7 L 10.5 6 C 11.322504 6 12 5.322505 12 4.5 C 12 3.677495 11.322504 3 10.5 3 L 9.5 3 C 9.2179352 3 9 2.782065 9 2.5 C 9 2.217935 9.2179352 2 9.5 2 L 10.5 2 L 12 2 L 12 1 L 10.5 1 L 10.5 0 L 9.5 0 z M 7 3.9238281 L 0 6.1328125 L 0 6.5 L 0 9 L 1 9 L 1 17 L 0 17 L 0 20 L 20 20 L 20 17 L 19.5 17 L 19 17 L 19 9 L 20 9 L 20 6.1328125 L 13 3.9238281 L 13 4.9707031 L 19 6.8671875 L 19 8 L 1 8 L 1 6.8652344 L 7 4.9707031 L 7 3.9238281 z M 2 9 L 3 9 L 3 17 L 2 17 L 2 9 z M 4 9 L 6 9 L 6 17 L 4 17 L 4 9 z M 7 9 L 8 9 L 8 17 L 7 17 L 7 9 z M 9 9 L 11 9 L 11 17 L 9 17 L 9 9 z M 12 9 L 13 9 L 13 17 L 12 17 L 12 9 z M 14 9 L 16 9 L 16 17 L 14 17 L 14 9 z M 17 9 L 18 9 L 18 17 L 17 17 L 17 9 z M 1 18 L 4 18 L 6 18 L 9 18 L 11 18 L 14 18 L 16 18 L 19 18 L 19 19 L 1 19 L 1 18 z " style="fill:#fafafa; fill-opacity:1; stroke:none; stroke-width:0px;"></path> </g> </g></svg>
                </div>
            </div>
            <div class="space-y-10">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#0099FF]">افغانی:</span>
                    <span class="text-lg font-bold">{{ number_format($salesAFN) }}؋</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#0099FF]">دالر:</span>
                    <span class="text-lg font-bold">${{ number_format($salesUSD) }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-gradient-to-br from-green-100 to-green-200 border-r-4 border-green-500 text-green-800 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold"> سود کل </h3>
                <div class="bg-green-500 p-2 rounded-full">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 5C22 6.65685 20.6569 8 19 8C17.3431 8 16 6.65685 16 5C16 3.34315 17.3431 2 19 2C20.6569 2 22 3.34315 22 5Z" fill="#fafafa"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C13.3988 2 14.59 2 15.612 2.03826C14.9196 2.82967 14.5 3.86584 14.5 5C14.5 7.48528 16.5147 9.5 19 9.5C20.1342 9.5 21.1703 9.08042 21.9617 8.38802C22 9.41 22 10.6012 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2ZM14.5 10.75C14.0858 10.75 13.75 10.4142 13.75 10C13.75 9.58579 14.0858 9.25 14.5 9.25H17C17.4142 9.25 17.75 9.58579 17.75 10V12.5C17.75 12.9142 17.4142 13.25 17 13.25C16.5858 13.25 16.25 12.9142 16.25 12.5V11.8107L14.2374 13.8232C13.554 14.5066 12.446 14.5066 11.7626 13.8232L10.1768 12.2374C10.0791 12.1398 9.92085 12.1398 9.82322 12.2374L7.53033 14.5303C7.23744 14.8232 6.76256 14.8232 6.46967 14.5303C6.17678 14.2374 6.17678 13.7626 6.46967 13.4697L8.76256 11.1768C9.44598 10.4934 10.554 10.4934 11.2374 11.1768L12.8232 12.7626C12.9209 12.8602 13.0791 12.8602 13.1768 12.7626L15.1893 10.75H14.5Z" fill="#fafafa"></path> </g></svg>
                </div>
            </div>
            <div class="space-y-10">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-green-700">افغانی:</span>
                    <span class="text-lg font-bold">{{ number_format($profitAFN) }}؋</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-green-700">دالر:</span>
                    <span class="text-lg font-bold">${{ number_format($profitUSD) }}</span>
                </div>
            </div>
        </div>
        <div   class="bg-[#FF0000]/10 border-r-4 border-[#FF0000] text-[#FF0000] p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold"> ضرر کل </h3>
                <div class="bg-[#FF0000] p-2 rounded-full">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 5C22 6.65685 20.6569 8 19 8C17.3431 8 16 6.65685 16 5C16 3.34315 17.3431 2 19 2C20.6569 2 22 3.34315 22 5Z" fill="#fafafa"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C13.3988 2 14.59 2 15.612 2.03826C14.9196 2.82967 14.5 3.86584 14.5 5C14.5 7.48528 16.5147 9.5 19 9.5C20.1342 9.5 21.1703 9.08042 21.9617 8.38802C22 9.41 22 10.6012 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2ZM14.5 13.25C14.0858 13.25 13.75 13.5858 13.75 14C13.75 14.4142 14.0858 14.75 14.5 14.75H17C17.4142 14.75 17.75 14.4142 17.75 14V11.5C17.75 11.0858 17.4142 10.75 17 10.75C16.5858 10.75 16.25 11.0858 16.25 11.5V12.1893L14.2374 10.1768C13.554 9.49336 12.446 9.49336 11.7626 10.1768L10.1768 11.7626C10.0791 11.8602 9.92085 11.8602 9.82322 11.7626L7.53033 9.46967C7.23744 9.17678 6.76256 9.17678 6.46967 9.46967C6.17678 9.76256 6.17678 10.2374 6.46967 10.5303L8.76256 12.8232C9.44598 13.5066 10.554 13.5066 11.2374 12.8232L12.8232 11.2374C12.9209 11.1398 13.0791 11.1398 13.1768 11.2374L15.1893 13.25H14.5Z" fill="#fafafa"></path> </g></svg>
                </div>
            </div>
            <div class="space-y-10">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#FF0000]">افغانی:</span>
                    <span class="text-lg font-bold">{{ number_format($lossAFN) }}؋</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#FF0000]">دالر:</span>
                    <span class="text-lg font-bold">${{ number_format($lossUSD) }}</span>
                </div>
            </div>
        </div>
        <div  class="bg-[#31009B]/10 border-r-4 border-[#31009B] text-[#31009B] p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold"> قرض های کل </h3>
                <div class="bg-[#31009B] p-2 rounded-full">
                    <svg fill="#fafafa" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 38.926 38.926" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M25.264,2.918l-2.002,5.143h-2.17c-0.006,0-0.012,0.004-0.02,0.004h-6.424c-2.367,0-4.293,1.801-4.293,4.012v0.121 l-2.301-0.022v-1.875H0v17.166h8.055v-1.424l2.439-0.002c0.481,1.676,2.16,2.916,4.152,2.916h0.484l-0.675,1.732l13.666,5.318 L38.926,8.235L25.264,2.918z M14.648,26.955c-1.264,0-2.291-0.854-2.291-1.916v-1.001l-4.302,0.003v-9.867l4.302,0.043v-2.141 c0-1.109,1.027-2.012,2.291-2.012h10.629c0.002,0,0.006-0.002,0.008-0.002c0.383,0.006,0.705,0.42,0.705,0.911 c0,0.495-0.326,0.914-0.713,0.914l-4.238,0.001l-0.182,0.01c-0.531,0.029-0.949,0.469-0.949,1c0,0.805,0,0.948-1.342,0.948h-3.564 c-0.554,0-1,0.447-1,1c0,0.554,0.446,1,1,1h3.565c0.596,0,1.219-0.058,1.768-0.264l-4.424,11.371L14.648,26.955L14.648,26.955z M24.871,24.143c-2.584-1.004-3.863-3.916-2.857-6.502s3.916-3.863,6.5-2.859c2.586,1.007,3.865,3.918,2.861,6.501 C30.369,23.869,27.459,25.148,24.871,24.143z M30.068,20.102c0.297-0.768,0.371-1.355,0.217-1.771 c-0.152-0.414-0.57-0.753-1.25-1.019c-0.629-0.246-1.117-0.271-1.465-0.082c-0.349,0.189-0.699,0.683-1.06,1.471l-0.104,0.238 L24.8,18.309l0.065-0.168c0.232-0.596,0.589-0.801,1.062-0.613l0.117,0.041l0.41-1.049l-0.146-0.059 c-0.633-0.246-1.121-0.266-1.469-0.057c-0.352,0.211-0.684,0.719-1,1.533l-0.625-0.244l-0.281,0.731l0.623,0.244 c-0.332,0.852-0.438,1.479-0.316,1.889c0.123,0.409,0.513,0.738,1.168,0.996c0.681,0.266,1.201,0.287,1.57,0.072 c0.367-0.219,0.721-0.752,1.051-1.605l1.742,0.68l-0.065,0.158c-0.171,0.438-0.341,0.695-0.502,0.775 c-0.166,0.082-0.445,0.047-0.841-0.105l-0.11-0.043l-0.422,1.084l0.219,0.09c0.646,0.252,1.162,0.271,1.547,0.062 c0.384-0.209,0.724-0.691,1.021-1.459l0.084-0.205l0.721,0.279l0.283-0.73l-0.719-0.279L30.068,20.102z M26.02,19.812 c-0.248,0.641-0.643,0.855-1.174,0.648c-0.51-0.199-0.639-0.617-0.389-1.262l0.055-0.158l1.576,0.613 C26.045,19.752,26.02,19.805,26.02,19.812z M29.117,19.811l-0.062,0.156l-1.697-0.662c0.189-0.492,0.367-0.795,0.531-0.908 c0.166-0.115,0.41-0.106,0.736,0.021C29.225,18.649,29.389,19.113,29.117,19.811z"></path> </g> </g></svg>
                </div>
            </div>
            <div class="space-y-10">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#31009B]">افغانی:</span>
                    <span class="text-lg font-bold">{{ number_format($totalLoansAFN) }}؋</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#31009B]">دالر:</span>
                    <span class="text-lg font-bold">${{ number_format($totalLoansUSD) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
