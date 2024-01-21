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
                            <div class="grid gap-6 mb-3 md:grid-cols-2">
                                <input type="hidden" id="role" name="Peran" value="Pembeli">
                                <input type="hidden" id="status" name="Status" value="Accept">
                                <div>
                                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                                    <input type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Username') is-invalid @enderror" placeholder="johndoe" name="Username" value="{{ old('Username') }}">
                                    @error('Username')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Email') is-invalid @enderror" placeholder="john.doe@company.com" name="Email" value="{{ old('Email') }}">
                                    @error('Email')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-6 mb-3 md:grid-cols-2">
                                <div>
                                    <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telephone</label>
                                <input type="text" id="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('No_Telp') is-invalid @enderror" placeholder="+62xxxx" name="No_Telp" value="{{ old('No_Telp') }}">
                                @error('No_Telp')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                                </div>

                                <div class="relative">
                                    <label for="Tanggal_Lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                                    <input name="Tanggal_Lahir" type="date" id="Tanggal_Lahir"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 @error('Tanggal_Lahir') is-invalid @enderror"
                                        placeholder="Select date start" value="{{ old('Tanggal_Lahir') }}">
                                        @error('Tanggal_Lahir')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                                </div>
                            </div> 

                            <div class="mb-3">    
                                <div class="grid row-span-2">
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Alamat</label>
                                    <textarea id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Alamat') is-invalid @enderror" placeholder="Masukkan alamat lengkap seperti kota, kabupaten, kecamatan, nama jalan, dan kode pos" name="Alamat" value="{{ old('Alamat') }}"></textarea>
                                    @error('Alamat')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Password') is-invalid @enderror" placeholder="•••••••••" name="Password" value="{{ old('Password') }}">
                                @error('Password')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                                </div>

                                <div>
                                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                                <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" name="Confirm_Password" required>
                                </div>
                            </div> 

                            {{-- <a href="/buyer" type="submit" class="text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</a> --}}
                            <div class="flex justify-end">
                                <button type="submit" class="text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                            </div>
                        </form>
                    </div>
               </div>
            </div>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>
