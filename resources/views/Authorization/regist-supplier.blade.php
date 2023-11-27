    <!DOCTYPE html>
    <html lang="en">
    <head>
        @include('Authorization.header')
    </head>

    <body class="antialiased bg-cover bg-center" style="background-image: url('images/system/bhavana-foto2.png');">
        <div id="app" class="sm:items-center">
            <div class="grid grid-cols-1">
                <div class="flex flex-row-reverse mt-5 mx-16">
                    <div class="text-2xl font-semibold">
                        <span class="text-[#F3D464]">Bha<span class="text-black">vana</span></span>
                    </div>
                </div>
                {{-- <div class="h-1 w-full bg-black mt-5"></div> --}}
                
                <div class="h-16 mt-3 flex items-center justify-center">
                    <a href="/regist"><div class="w-12 h-12 border border-black bg-gray-300 rounded-full flex items-center justify-center text-black text-2xl font-semibold">
                        1
                    </div></a>
                    <div class="w-24 h-1 bg-black"></div>
                    <div class="w-12 h-12 border border-black bg-yellow-500 rounded-full flex items-center justify-center text-black text-2xl font-semibold">
                        2
                    </div>
                </div>
                <div class="mt-5 mb-7 flex items-center justify-center">
                    <div class="font-semibold text-3xl">Formulir Registrasi</div>
                </div>
               <div class="flex justify-center gap-4 items-start">
                    <div class="flex items-center justify-center">
                        <form>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Perusahaan</label>
                                    <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="PT. Bidaraksa" required>
                                </div>
                                <div class="">
                                    <label for="bidangusaha" class="block mb-2 text-sm font-medium text-gray-900 ">Bidang Usaha</label>
                                    <button id="bidangusaha" data-dropdown-toggle="dropdown" class="text-dark bg-gray-300 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">Bidang Usaha  <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                    </button>
                                    
                                    <!-- Dropdown menu -->
                                    <div id="dropdown" class="z-10 hidden bg-gray-300 divide-y divide-gray-100 rounded-lg shadow w-44">
                                        <ul class="py-2 text-sm text-white-700" aria-labelledby="bidangusaha">
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Kelapa Sawit</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sayuran</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Buah</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Lainnya</a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telephone</label>
                                <input type="text" id="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="+628xxxx" required>
                            </div> 
                            <div class="grid gap-3 mb-6 md:grid-cols-2">    
                                <div>
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Kecamatan</label>
                                    <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jatinegara" required>
                                </div>
                                <div >
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Kelurahan</label>
                                    <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Kampung Melayu" required>
                                </div>
                            </div>
                            <div class="grid gap-3 mb-6 md:grid-cols-2">    
                                <div>
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Jalan/Unit</label>
                                    <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jalan Megarsari no.12" required>
                                </div>
                                <div >
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Kode Pos</label>
                                    <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="13567" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="h-full w-3 bg-yellow-300"></div>
                    <div class="flex items-center justify-center">
                        <form>
                            <div class="grid gap-3 mb-6 md:grid-cols-2">    
                                <div>
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                                    <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Bidaraksa" required>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email address</label>
                                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Bidaraksa@company.com" required>
                            </div> 
                            <div class="mb-6">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" required>
                            </div> 
                            <div class="mb-6">
                                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                                <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" required>
                            </div>  
                            <div class="flex justify-end">
                                <a href="/supplier" type="submit" class="text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</a>
                            </div>
                        </form>
                    </div>
               </div>
            </div>
        </div>
        <script src="js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    </body>
</html>
