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
                
                <div class="h-16 mt-3 mb-5 flex items-center justify-center">
                    <div class="w-12 h-12 border border-black bg-yellow-500 rounded-full flex items-center justify-center text-black text-2xl font-semibold">
                        1
                    </div>
                    <div class="w-24 h-1 bg-black"></div>
                    <div class="w-12 h-12 border border-black bg-gray-300 rounded-full flex items-center justify-center text-black text-2xl font-semibold">
                        2
                    </div>
                </div>
                <div class="h-20 mt-5 mb-2 flex items-center justify-center">
                    <div class="font-semibold text-3xl">Apa Peran Anda?</div>
                </div>
                <div class="flex items-center justify-center">
                    <div class="mr-5 flex items-center ps-4">
                        <a href="/regist/supplier" class="bg-yellow-300 px-4 border border-black rounded-2xl hover:bg-yellow-500">
                            Penjual       
                        </a>
                    </div>
                    <div class="flex items-center ps-4">
                        <a href="/regist/buyer" class="bg-yellow-300 px-4 border border-black rounded-2xl hover:bg-yellow-500">
                            Pembeli      
                        </a>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-2">
                    <img class="object-contain h-72 w-96" src="images/system/person-think.png" alt="">
                </div>
                <div class="mx-24 justify-center items-center flex flex-row pl-2">
                    <div class="text-center underline underline-offset-4">Sudah Memiliki Akun?</div>
                    <span class="font-bold ml-1 no-underline text-yellow-600"><a href="/login">Masuk Sekarang</a></span>
                </div>
            </div>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>
