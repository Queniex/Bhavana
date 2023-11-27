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
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                                    <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="flowbite" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe@company.com" required>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telephone</label>
                                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="+62xxxx" required>
                            </div> 
                            <div class="mb-6">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" required>
                            </div> 
                            <div class="mb-6">
                                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                                <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" required>
                            </div>  
                            <button type="submit" class="text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                        </form>
                    </div>
               </div>
            </div>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>
