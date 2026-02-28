<div class="min-h-screen max-w-full w-full flex justify-center">
    <main class="w-full">
        <section class="col-span-1 lg:col-span-2 rounded-xl pt-0 pb-4 space-y-4">
            <aside class="col-span-1 space-y-5">
                <div class="grid grid-cols-1 w-full sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($cards as $card)
                        @php
                            $circumference = 113.1;
                            $progress = round(($card['percent'] / 100) * $circumference, 2);
                            $remaining = round($circumference - $progress, 2);
                            $angle = deg2rad(($card['percent'] * 3.6) - 90);
                            $dotX = 20 + (18 * cos($angle));
                            $dotY = 20 + (18 * sin($angle));
                        @endphp
                        <div class="relative card-anim w-full p-6 shadow-[0px_4px_4px_0px_#00000040] shadow-xl rounded-xl bg-white overflow-visible">
                            <div class="w-5 bg-[#0B35CC] absolute right-0 top-0 bottom-0 rounded-xl flex items-center justify-center z-0"></div>
                            <div class="cut-circle cut-top"></div>
                            <div class="cut-circle cut-bottom"></div>
                            <div class="z-10 flex flex-col">
                                <div class="flex justify-between">
                                    <div class="percent-wrap">
                                        <svg width="45" height="45" viewBox="0 0 40 40" class="block">
                                            <circle cx="20" cy="20" r="18" stroke="#ECECEC" stroke-width="4" fill="none"/>
                                            <circle
                                                cx="20"
                                                cy="20"
                                                r="18"
                                                stroke="#1F5BFF"
                                                stroke-width="4"
                                                stroke-linecap="round"
                                                fill="none"
                                                stroke-dasharray="{{ $progress }} {{ $remaining }}"
                                                transform="rotate(-90 20 20)"
                                            />
                                            <circle cx="{{ number_format($dotX, 3, '.', '') }}" cy="{{ number_format($dotY, 3, '.', '') }}" r="3.6" fill="#1F5BFF" />
                                            <circle cx="{{ number_format($dotX, 3, '.', '') }}" cy="{{ number_format($dotY, 3, '.', '') }}" r="2.6" fill="#FFF" />
                                            <text x="20" y="25" text-anchor="middle" font-size="10" font-weight="800" fill="#111827">{{ $card['percent'] }}%</text>
                                        </svg>
                                    </div>
                                    <div class="flex-1"></div>
                                    @switch($card['key'])
                                        @case('total_devices')
                                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5771 21.4373L15.7646 23.6248L21.598 17.7915" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M14.5832 8.74984H20.4165C23.3332 8.74984 23.3332 7.2915 23.3332 5.83317C23.3332 2.9165 21.8748 2.9165 20.4165 2.9165H14.5832C13.1248 2.9165 11.6665 2.9165 11.6665 5.83317C11.6665 8.74984 13.1248 8.74984 14.5832 8.74984Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M23.3333 5.86279C28.1896 6.12529 30.625 7.91904 30.625 14.5836V23.3336C30.625 29.167 29.1667 32.0836 21.875 32.0836H13.125C5.83333 32.0836 4.375 29.167 4.375 23.3336V14.5836C4.375 7.93363 6.81042 6.12529 11.6667 5.86279" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            @break
                                        @case('pending_devices')
                                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2981 3.25215L8.02106 5.97923C6.34397 6.60632 4.97314 8.58965 4.97314 10.3834V21.2188C4.97314 22.9396 6.11066 25.2001 7.49608 26.2355L13.7669 30.9167C15.8231 32.4626 19.2065 32.4626 21.2627 30.9167L27.5336 26.2355C28.919 25.2001 30.0565 22.9396 30.0565 21.2188V10.3834C30.0565 8.58965 28.6856 6.60632 27.0085 5.97923L19.7315 3.25215C18.4919 2.80007 16.5085 2.80007 15.2981 3.25215Z" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M17.4998 22.6042C20.7215 22.6042 23.3332 19.9925 23.3332 16.7708C23.3332 13.5492 20.7215 10.9375 17.4998 10.9375C14.2782 10.9375 11.6665 13.5492 11.6665 16.7708C11.6665 19.9925 14.2782 22.6042 17.4998 22.6042Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M17.8644 14.9478V16.304C17.8644 16.8144 17.6019 17.2957 17.1499 17.5582L16.0415 18.229" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            @break
                                        @case('approved_devices')
                                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.2981 3.25215L8.02106 5.99382C6.34398 6.6209 4.97314 8.60423 4.97314 10.3834V21.2188C4.97314 22.9396 6.11064 25.2001 7.49606 26.2355L13.7669 30.9167C15.8231 32.4626 19.2065 32.4626 21.2627 30.9167L27.5336 26.2355C28.919 25.2001 30.0565 22.9396 30.0565 21.2188V10.3834C30.0565 8.58965 28.6856 6.60632 27.0086 5.97923L19.7315 3.25215C18.4919 2.80007 16.5086 2.80007 15.2981 3.25215Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M13.1978 17.3106L15.5457 19.6585L21.8165 13.3877" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            @break
                                        @case('blocked_devices')
                                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4336 29.1958L13.7523 30.9312C15.8086 32.4771 19.1919 32.4771 21.2482 30.9312L27.519 26.25C28.9044 25.2146 30.0419 22.9541 30.0419 21.2333V10.3833" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M27.6789 6.32923C27.4602 6.19798 27.2268 6.08131 26.9935 5.97923L19.7164 3.25215C18.506 2.80007 16.5227 2.80007 15.3122 3.25215L8.02057 5.99382C6.34349 6.6209 4.97266 8.60423 4.97266 10.3834V21.2188C4.97266 22.9396 6.11016 25.2001 7.49557 26.2355L7.78724 26.4542" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M32.0837 2.9165L2.91699 32.0832" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            @break
                                        @case('reports_total')
                                            <svg fill="#000000" height="35" width="35" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 483.128 483.128" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M322.304,224c-4.424,0-8,3.576-8,8v208c0,13.232-10.768,24-24,24h-248c-13.232,0-24-10.768-24-24V96 c0-10.96,7.4-20.512,17.992-23.24c4.28-1.104,6.856-5.472,5.76-9.744c-1.096-4.272-5.504-6.832-9.744-5.76 C14.64,61.816,2.304,77.744,2.304,96v344c0,22.056,17.944,40,40,40h248c22.056,0,40-17.944,40-40V232 C330.304,227.576,326.728,224,322.304,224z"></path> </g> </g> <g> <g> <path d="M300.328,57.272c-4.28-1.152-8.64,1.456-9.744,5.744c-1.112,4.272,1.464,8.64,5.744,9.744 c10.584,2.736,17.976,12.296,17.976,23.24v8c0,4.424,3.576,8,8,8s8-3.576,8-8v-8C330.304,77.76,317.976,61.832,300.328,57.272z"></path> </g> </g> <g> <g> <path d="M258.304,56h-9.968l-11.024-38.592C234.384,7.16,224.888,0,214.232,0h-95.856c-10.656,0-20.152,7.16-23.08,17.408 L84.272,56h-9.968c-13.232,0-24,10.768-24,24v24c0,4.424,3.576,8,8,8h216c4.424,0,8-3.576,8-8V80 C282.304,66.768,271.536,56,258.304,56z M266.304,96h-200V80c0-4.416,3.584-8,8-8h16c3.568,0,6.712-2.368,7.696-5.808l12.688-44.4 c0.968-3.408,4.128-5.792,7.688-5.792h95.856c3.552,0,6.72,2.384,7.688,5.8l12.688,44.4c0.984,3.432,4.128,5.8,7.696,5.8h16 c4.416,0,8,3.584,8,8V96z"></path> </g> </g> <g> <g> <path d="M167.384,27.584c-13.528,0-24.536,11.008-24.536,24.536s11.008,24.536,24.536,24.536S191.92,65.648,191.92,52.12 S180.912,27.584,167.384,27.584z M167.384,60.664c-4.712,0-8.536-3.832-8.536-8.536s3.832-8.536,8.536-8.536 s8.536,3.832,8.536,8.536S172.096,60.664,167.384,60.664z"></path> </g> </g> <g> <g> <path d="M234.304,192h-48c-4.424,0-8,3.576-8,8s3.576,8,8,8h48c4.424,0,8-3.576,8-8S238.728,192,234.304,192z"></path> </g> </g> <g> <g> <path d="M114.304,248h-48c-4.424,0-8,3.576-8,8s3.576,8,8,8h48c4.424,0,8-3.576,8-8S118.728,248,114.304,248z"></path> </g> </g> <g> <g> <path d="M274.304,136h-88c-4.424,0-8,3.576-8,8s3.576,8,8,8h88c4.424,0,8-3.576,8-8S278.728,136,274.304,136z"></path> </g> </g> <g> <g> <path d="M218.304,248h-56c-4.424,0-8,3.576-8,8s3.576,8,8,8h56c4.424,0,8-3.576,8-8S222.728,248,218.304,248z"></path> </g> </g> <g> <g> <path d="M274.304,304h-208c-4.424,0-8,3.576-8,8s3.576,8,8,8h208c4.424,0,8-3.576,8-8S278.728,304,274.304,304z"></path> </g> </g> <g> <g> <path d="M114.304,360h-48c-4.424,0-8,3.576-8,8s3.576,8,8,8h48c4.424,0,8-3.576,8-8S118.728,360,114.304,360z"></path> </g> </g> <g> <g> <path d="M274.304,360h-112c-4.424,0-8,3.576-8,8s3.576,8,8,8h112c4.424,0,8-3.576,8-8S278.728,360,274.304,360z"></path> </g> </g> <g> <g> <path d="M274.304,416h-208c-4.424,0-8,3.576-8,8s3.576,8,8,8h208c4.424,0,8-3.576,8-8S278.728,416,274.304,416z"></path> </g> </g> <g> <g> <path d="M138.304,136h-56c-13.232,0-24,10.768-24,24v24c0,13.232,10.768,24,24,24h56c13.232,0,24-10.768,24-24v-24 C162.304,146.768,151.536,136,138.304,136z M146.304,184c0,4.416-3.584,8-8,8h-56c-4.416,0-8-3.584-8-8v-24c0-4.416,3.584-8,8-8 h56c4.416,0,8,3.584,8,8V184z"></path> </g> </g> <g> <g> <path d="M420.696,202.872c-33.16,0-60.128,26.968-60.128,60.128c0,33.16,26.968,60.128,60.128,60.128 c33.16,0,60.128-26.968,60.128-60.128C480.824,229.84,453.856,202.872,420.696,202.872z M420.688,307.128 c-24.328,0-44.128-19.8-44.128-44.128s19.8-44.128,44.128-44.128s44.128,19.8,44.128,44.128S445.016,307.128,420.688,307.128z"></path> </g> </g> <g> <g> <path d="M444.912,241.168c-3.776-2.304-8.696-1.096-10.992,2.68l-14.96,24.632l-11.192-10.352 c-3.24-2.992-8.312-2.808-11.312,0.44c-3,3.248-2.808,8.304,0.44,11.312l18.368,17c1.496,1.376,3.44,2.128,5.44,2.128 c0.368,0,0.744-0.024,1.112-0.08c2.376-0.336,4.488-1.72,5.728-3.768l20.048-33C449.888,248.376,448.688,243.456,444.912,241.168z "></path> </g> </g> <g> <g> <path d="M420.696,362.872c-33.16,0-60.128,26.968-60.128,60.128c0,33.16,26.968,60.128,60.128,60.128 c33.16,0,60.128-26.968,60.128-60.128C480.824,389.84,453.848,362.872,420.696,362.872z M420.696,467.128 c-24.328,0-44.128-19.8-44.128-44.128s19.8-44.128,44.128-44.128s44.128,19.8,44.128,44.128S445.024,467.128,420.696,467.128z"></path> </g> </g> <g> <g> <path d="M444.896,401.168c-3.776-2.304-8.696-1.096-10.992,2.68l-14.96,24.632l-11.176-10.352 c-3.24-2.992-8.312-2.816-11.312,0.44c-3,3.24-2.808,8.304,0.44,11.312l18.368,17c1.496,1.376,3.44,2.128,5.44,2.128 c0.368,0,0.744-0.024,1.112-0.08c2.376-0.336,4.488-1.72,5.728-3.768l20.048-33C449.872,408.376,448.672,403.456,444.896,401.168z "></path> </g> </g> <g> <g> <path d="M445.296,118.256l-16.968-16.968c4.528-4.528,7.032-10.56,7.032-16.968c0-6.416-2.496-12.448-7.032-16.968 c-9.36-9.36-24.576-9.36-33.936,0l-8.2,8.192l-59.68,59.688l-67.888,67.888c-4.528,4.528-7.032,10.552-7.032,16.968 c0,3.632,0.88,7.104,2.4,10.288l-12.344,12.344c-3.128,3.128-3.128,8.184,0,11.312c1.56,1.56,3.608,2.344,5.656,2.344 c2.048,0,4.096-0.784,5.656-2.344l12.352-12.352c3.248,1.544,6.744,2.4,10.272,2.4c6.152,0,12.288-2.336,16.968-7.016l67.88-67.88 L417,112.616l11.328,11.296l-50.904,50.912c-3.128,3.128-3.128,8.184,0,11.312c1.56,1.56,3.608,2.344,5.656,2.344 c2.048,0,4.096-0.784,5.656-2.344l56.56-56.568C448.424,126.44,448.424,121.384,445.296,118.256z M281.248,225.744 c-3.128,3.128-8.184,3.128-11.312,0c-1.504-1.512-2.344-3.52-2.344-5.656c0-2.144,0.832-4.144,2.344-5.648 c0-0.008,0-0.008,0-0.008l62.224-62.224l11.312,11.312L281.248,225.744z M354.792,152.2l-11.312-11.312l48.368-48.376l5.656,5.656 l5.656,5.664L354.792,152.2z M417.016,89.976l-2.544,2.544l-5.656-5.656L403.16,81.2l2.544-2.536 c3.128-3.112,8.2-3.12,11.312,0.008c1.512,1.504,2.344,3.504,2.344,5.648C419.36,86.456,418.528,88.464,417.016,89.976z"></path> </g> </g> </g></svg>
                                            @break
                                        @case('stores_total')
                                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.5 11V14C3.5 17.7712 3.5 19.6569 4.67157 20.8284C5.84315 22 7.72876 22 11.5 22H12.5C16.2712 22 18.1569 22 19.3284 20.8284M20.5 11V14C20.5 15.1698 20.5 16.1581 20.465 17" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M9.50002 2H14.5M9.50002 2L8.84828 8.51737C8.66182 10.382 10.1261 12 12 12C13.874 12 15.3382 10.382 15.1518 8.51737L14.5 2M9.50002 2H7.41771C6.50969 2 6.05567 2 5.66628 2.10675C4.84579 2.33168 4.15938 2.89439 3.77791 3.65484M9.50002 2L8.77549 9.24527C8.61911 10.8091 7.30318 12 5.73155 12C3.8011 12 2.35324 10.2339 2.73183 8.34093L2.80002 8M14.5 2H16.5823C17.4904 2 17.9444 2 18.3338 2.10675C19.1542 2.33168 19.8407 2.89439 20.2221 3.65484C20.4032 4.01573 20.4922 4.46093 20.6703 5.35133L21.2682 8.34093C21.6468 10.2339 20.1989 12 18.2685 12C16.6969 12 15.3809 10.8091 15.2245 9.24527L14.5 2Z" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M9.5 21.5V18.5C9.5 17.5654 9.5 17.0981 9.70096 16.75C9.83261 16.522 10.022 16.3326 10.25 16.201C10.5981 16 11.0654 16 12 16C12.9346 16 13.4019 16 13.75 16.201C13.978 16.3326 14.1674 16.522 14.299 16.75C14.5 17.0981 14.5 17.5654 14.5 18.5V21.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                            @break
                                        @case('active_stores')
                                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#231F20" d="M59,0H5C2.789,0,1,1.789,1,4v20c0,2.22,1.208,4.152,3,5.19V60c0,2.211,1.789,4,4,4h48c2.211,0,4-1.789,4-4 V29.19c1.792-1.038,3-2.971,3-5.19V4C63,1.789,61.211,0,59,0z M51,2v22c0,2.209-1.791,4-4,4s-4-1.791-4-4V2H51z M41,2v22 c0,2.209-1.791,4-4,4s-4-1.791-4-4V2H41z M31,2v22c0,2.209-1.791,4-4,4s-4-1.791-4-4V2H31z M21,2v22c0,2.209-1.791,4-4,4 s-4-1.791-4-4V2H21z M3,4c0-1.104,0.896-2,2-2h6v22c0,2.209-1.791,4-4,4s-4-1.791-4-4V4z M12,62V38h12v10h-1c-0.553,0-1,0.447-1,1 s0.447,1,1,1h1v12H12z M58,60c0,1.104-0.896,2-2,2H26V37c0-0.516-0.447-1-1-1H11c-0.553,0-1,0.447-1,1v25H8c-1.104,0-2-0.896-2-2 V29.91C6.326,29.965,6.658,30,7,30c2.088,0,3.926-1.068,5-2.687C13.074,28.932,14.912,30,17,30s3.926-1.068,5-2.687 C23.074,28.932,24.912,30,27,30s3.926-1.068,5-2.687C33.074,28.932,34.912,30,37,30s3.926-1.068,5-2.687 C43.074,28.932,44.912,30,47,30s3.926-1.068,5-2.687C53.074,28.932,54.912,30,57,30c0.342,0,0.674-0.035,1-0.09V60z M57,28 c-2.209,0-4-1.791-4-4V2h6c1.104,0,2,0.896,2,2v20C61,26.209,59.209,28,57,28z"></path> <path fill="#231F20" d="M53,36H29c-0.553,0-1,0.447-1,1v20c0,0.553,0.447,1,1,1h24c0.553,0,1-0.447,1-1V37 C54,36.447,53.553,36,53,36z M52,56H30V38h22V56z"></path> <path fill="#231F20" d="M48.293,42.707C48.488,42.902,48.744,43,49,43s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414 l-1-1c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414L48.293,42.707z"></path> <path fill="#231F20" d="M48.293,47.707C48.488,47.902,48.744,48,49,48s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414 l-6-6c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414L48.293,47.707z"></path> </g> </g></svg>
                                            @break
                                        @default
                                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.5 32.0832C25.5542 32.0832 32.0833 25.5541 32.0833 17.4999C32.0833 9.44576 25.5542 2.91663 17.5 2.91663C9.44581 2.91663 2.91669 9.44576 2.91669 17.4999C2.91669 25.5541 9.44581 32.0832 17.5 32.0832Z" stroke="#292D32" stroke-width="2"/>
                                                <path d="M17.5 10.2083V18.9583" stroke="#292D32" stroke-width="2" stroke-linecap="round"/>
                                                <path d="M17.5 23.3333H17.5146" stroke="#292D32" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                    @endswitch
                                </div>
                                <div class="flex flex-col mt-6 h-full pt-2">
                                    <div class="ml-auto pr-2">
                                        <div class="text-3xl font-bold leading-none">{{ number_format($card['value']) }}</div>
                                    </div>
                                    <div class="w-full flex items-center justify-start mt-2 z-20">
                                        <div class="-pr-6">
                                            <p class="text-gray-500">{{ $card['label'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </aside>
            <div class="col-span-1 max-w-full lg:col-span-3 grid grid-cols-1 lg:grid-cols-2 gap-5 mt-6">
                <div class="card-anim bg-white shadow-lg rounded-xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl p-5" style="border-color: rgba(9, 72, 238, 0.15);">
                    <div class="flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.87988 18.1501V16.0801" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 18.1498V14.0098" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.1201 18.1502V11.9302" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M17.1199 5.8501L16.6599 6.3901C14.1099 9.3701 10.6899 11.4801 6.87988 12.4301" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M14.1899 5.8501H17.1199V8.7701" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#01BB04" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="font-bold">آمار ثبت دستگاه ها</h3>
                    </div>
                    <div class="chart-wrap mt-4">
                        <canvas id="registerChart"></canvas>
                    </div>
                </div>
                <div class="card-anim bg-white shadow-lg rounded-xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl p-5" style="border-color: rgba(9, 72, 238, 0.15);">
                    <div class="flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.1201 5.84992V7.91992" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 5.85023V9.99023" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M6.87988 5.84982L6.87988 12.0698" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M6.88012 18.1499L7.34012 17.6099C9.89012 14.6299 13.3101 12.5199 17.1201 11.5699" stroke="#E30000" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M9.81006 18.1499H6.88006V15.2299" stroke="#E30000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2Z" stroke="#E30000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="font-bold">آمار دستگاه های بلاک شده</h3>
                    </div>
                    <div class="chart-wrap mt-4">
                        <canvas id="blockedChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (() => {
            const labels = @json($chartLabels);
            const registerSeries = @json($registerSeries);
            const blockedSeries = @json($blockedSeries);
            const initCharts = () => {
                if (typeof Chart === 'undefined') return;
                const registerCanvas = document.getElementById('registerChart');
                const blockedCanvas = document.getElementById('blockedChart');
                if (!registerCanvas || !blockedCanvas) return;
                const isDark = document.body.classList.contains('dark');
                const axisTickColor = isDark ? '#cbd5e1' : '#000';
                const yGridColor = isDark ? 'rgba(148,163,184,.22)' : 'rgba(0,0,0,.05)';
                const tooltipBg = isDark ? '#0f172a' : '#000';
                const tooltipColor = '#fff';
                window.__adminDashboardCharts = window.__adminDashboardCharts || {};
                if (window.__adminDashboardCharts.register) {
                    window.__adminDashboardCharts.register.destroy();
                }
                if (window.__adminDashboardCharts.blocked) {
                    window.__adminDashboardCharts.blocked.destroy();
                }
                const registerCtx = registerCanvas.getContext('2d');
                const registerGradient = registerCtx.createLinearGradient(0, 0, 0, 260);
                registerGradient.addColorStop(0, 'rgba(16,185,129,.25)');
                registerGradient.addColorStop(1, 'rgba(16,185,129,0)');
                window.__adminDashboardCharts.register = new Chart(registerCtx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'ثبت دستگاه',
                            data: registerSeries,
                            tension: 0.35,
                            fill: true,
                            backgroundColor: registerGradient,
                            borderColor: 'rgb(16,185,129)',
                            borderWidth: 2,
                            pointRadius: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                enabled: true,
                                backgroundColor: tooltipBg,
                                titleColor: tooltipColor,
                                bodyColor: tooltipColor,
                                displayColors: false,
                                callbacks: {
                                    label: (context) => `تعداد: ${context.raw}`
                                }
                            }
                        },
                        interaction: {
                            mode: 'index',
                            intersect: false
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { color: axisTickColor }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: { precision: 0 },
                                grid: { color: yGridColor }
                            }
                        }
                    }
                });
                const blockedCtx = blockedCanvas.getContext('2d');
                const blockedGradient = blockedCtx.createLinearGradient(0, 0, 0, 260);
                blockedGradient.addColorStop(0, 'rgba(244,63,94,.25)');
                blockedGradient.addColorStop(1, 'rgba(244,63,94,0)');
                window.__adminDashboardCharts.blocked = new Chart(blockedCtx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'دستگاه بلاک شده',
                            data: blockedSeries,
                            tension: 0.35,
                            fill: true,
                            backgroundColor: blockedGradient,
                            borderColor: 'rgb(244,63,94)',
                            borderWidth: 2,
                            pointRadius: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                enabled: true,
                                backgroundColor: tooltipBg,
                                titleColor: tooltipColor,
                                bodyColor: tooltipColor,
                                displayColors: false,
                                callbacks: {
                                    label: (context) => `تعداد: ${context.raw}`
                                }
                            }
                        },
                        interaction: {
                            mode: 'index',
                            intersect: false
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { color: axisTickColor }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: { precision: 0 },
                                grid: { color: yGridColor }
                            }
                        }
                    }
                });
            };
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initCharts, { once: true });
            } else {
                initCharts();
            }
            if (window.__adminDashboardNavigatedHandler) {
                window.removeEventListener('livewire:navigated', window.__adminDashboardNavigatedHandler);
            }
            window.__adminDashboardNavigatedHandler = initCharts;
            window.addEventListener('livewire:navigated', window.__adminDashboardNavigatedHandler);
            if (window.__adminDashboardThemeHandler) {
                window.removeEventListener('admin-theme-changed', window.__adminDashboardThemeHandler);
            }
            window.__adminDashboardThemeHandler = initCharts;
            window.addEventListener('admin-theme-changed', window.__adminDashboardThemeHandler);
        })();
    </script>
    <style>
        .cut-circle {
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgb(253, 253, 253);
            right: 14px;
            z-index: 1;
        }
        .cut-top {
            top: 0;
            right: 0;
            border-radius: 0 18px 50px 50px;
        }
        .cut-bottom {
            bottom: 0;
            right: 0;
            border-radius: 50px 50px 18px 0;
        }
        .percent-wrap {
            width: 66px;
            height: 66px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            position: absolute;
            right: 4px;
            top: 2px;
            z-index: 2;
        }
        .card-anim {
            transition: all 0.4s ease;
        }
        .card-anim:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }
        ::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 999px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        .chart-wrap {
            position: relative;
            width: 100%;
            height: 270px;
        }
        #registerChart,
        #blockedChart {
            width: 100% !important;
            height: 100% !important;
            min-height: 0 !important;
        }
        @media (max-width: 640px) {
            .chart-wrap {
                height: 220px;
            }
        }
        body.admin-shell.dark .card-anim .flex.justify-between > svg path[stroke],
        body.admin-shell.dark .card-anim .flex.justify-between > svg circle[stroke],
        body.admin-shell.dark .card-anim .flex.justify-between > svg rect[stroke],
        body.admin-shell.dark .card-anim .flex.justify-between > svg line[stroke] {
            stroke: #f8fafc !important;
        }
        body.admin-shell.dark .card-anim .flex.justify-between > svg path[fill]:not([fill='none']),
        body.admin-shell.dark .card-anim .flex.justify-between > svg circle[fill]:not([fill='none']),
        body.admin-shell.dark .card-anim .flex.justify-between > svg rect[fill]:not([fill='none']),
        body.admin-shell.dark .card-anim .flex.justify-between > svg polygon[fill]:not([fill='none']) {
            fill: #f8fafc !important;
        }
    </style>
</div>
