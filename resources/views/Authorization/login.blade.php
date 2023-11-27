<!DOCTYPE html>
<html lang="en">
<head>
    @include('Authorization.header')
</head>

<body class="antialiased">
    <div id="app" class="sm:items-center">
        <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
            <div class="h-[87%]">
                <img class="object-cover h-full w-full" src="images/system/bhavana-foto.png" alt="">
            </div>
            <div class="h-[87%]">
                <div class="h-24 w-full">
                    <div class="flex flex-row-reverse mt-5 mx-10">
                        <div class="text-2xl font-semibold">
                            <span class="text-[#F3D464]">Bha<span class="text-black">vana</span></span>
                        </div>
                    </div>
                </div>
                <div class="mx-10">
                    <div class="mb-10 text-4xl font-bold text-center">Sign In</div>
                    <div class="h-64">
                        <form class="max-w-sm mx-auto">
                            <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                            <input type="email" id="email" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="username" required>
                            </div>
                            <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" id="password" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="**********" required>
                            </div>
                            <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required>
                            </div>
                            <label for="remember" class="ms-2 text-sm font-medium text-gray-900">Ingat saya</label>
                            </div>
                            <a href="/admin" type="submit" class="text-black bg-[#FFDD63] hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Masuk</a>
                        </form>
                    </div>
                    <div class="mx-24 mt-5 flex flex-row pl-2">
                        <div class="text-center underline underline-offset-4">Belum Memiliki Akun?</div>
                        <span class="font-bold ml-1 no-underline text-yellow-600"><a href="/regist">Daftar Sekarang</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>
