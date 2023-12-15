    <!DOCTYPE html>
    <html lang="en">
    <head>
        @include('Authorization.header')
    </head>

    <body class="antialiased bg-cover bg-center" style="background-image: url('https://i.postimg.cc/Jhf45Z6p/bhavana-foto2.png');">
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
                        <form method="POST">
                            @csrf
                            <input type="hidden" id="role" name="Peran" value="Supplier">
                            <input type="hidden" id="status" name="Status" value="Pending">
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="nama_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Perusahaan</label>
                                    <input type="text" id="nama_perusahaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Nama') is-invalid @enderror" placeholder="PT. Bidaraksa" name="Nama" value="{{ old('Nama') }}">
                                    @error('Nama')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="">
                                    <label for="bidangusaha" class="block mb-2 text-sm font-medium text-gray-900">Bidang Usaha</label>
                                    <div class="relative inline-block text-left">
                                        <select id="bidangusaha" class="text-dark border border-black hover:bg-white bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm pr-9 py-3 inline-flex @error('Bidang_Usaha') is-invalid @enderror" name="Bidang_Usaha" value="{{ old('Bidang_Usaha') }}">
                                            <option selected disabled>Pilih</option>
                                            <option value="kelapa_sawit">Kelapa Sawit</option>
                                            <option value="sayuran">Sayuran</option>
                                            <option value="buah">Buah</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                        @error('Bidang_Usaha')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                        @enderror
                                        {{-- <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telephone</label>
                                <input type="text" id="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('No_Telp') is-invalid @enderror" placeholder="+628xxxx" name="No_Telp" value="{{ old('No_Telp') }}">
                                @error('No_Telp')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                            </div> 
                            <div>    
                                <div class="grid row-span-2">
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Alamat</label>
                                    <textarea id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Alamat') is-invalid @enderror" placeholder="Masukkan alamat lengkap seperti kota, kabupaten, kecamatan, nama jalan, dan kode pos" name="Alamat" value="{{ old('Alamat') }}"></textarea>
                                    @error('Alamat')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="grid gap-3 mb-6 md:grid-cols-2">    
                                <div>
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Jalan/Unit</label>
                                    <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jalan Megarsari no.12">
                                </div>
                                <div >
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Kode Pos</label>
                                    <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="13567">
                                </div>
                            </div> --}}
                    </div>
                    <div class="h-full w-3 bg-yellow-300"></div>
                    <div class="flex flex-col">
                            <div class="grid gap-3 mb-6 md:grid-cols-2">    
                                <div>
                                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                                    <input type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Username') is-invalid @enderror" placeholder="Bidaraksa" name="Username" value="{{ old('Username') }}">
                                    @error('Username')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email address</label>
                                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Email') is-invalid @enderror" placeholder="Bidaraksa@company.com" name="Email" value="{{ old('Email') }}">
                                @error('Email')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                            </div> 
                            <div class="mb-6">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Password') is-invalid @enderror" placeholder="•••••••••" name="Password" value="{{ old('Password') }}">
                                @error('Password')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                            </div> 
                            <div class="mb-6">
                                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                                <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" name="Confirm_Password" required>
                            </div>  
                            <div class="flex justify-end">
                                <button type="submit" class="text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
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
