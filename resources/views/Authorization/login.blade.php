
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
                        <form class="max-w-sm mx-auto" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                <input type="text" id="username" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Username') is-invalid @enderror" placeholder="username" name="Username" value="{{ old('Username') }}">
                                @error('Username')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" id="password" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Password') is-invalid @enderror" placeholder="**********" name="Password" value="{{ old('Password') }}">
                                @error('Password')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="flex items-start mb-5">
                                <div>
                                    <input id="remember" name="remember" type="checkbox">
                                    <label for="remember">Remember Me</label>
                                    <input type="hidden" id="remember_token" name="remember_token">
                                </div>
                            </div> --}}
                            {{-- <a href="/admin" type="submit" class="text-black bg-[#FFDD63] hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Masuk</a> --}}
                            <button type="submit" class="text-black bg-[#FFDD63] hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Masuk</button>
                        </form>
                    </div>
                    <div class="mx-24 mt-16 flex flex-row pl-2">
                        <div class="text-center underline underline-offset-4">Belum Memiliki Akun?</div>
                        <span class="font-bold ml-1 no-underline text-yellow-600"><a href="/regist">Daftar Sekarang</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('berhasil'))
    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.success("{{ Session::get('berhasil') }}", "Sukses!", {timeout:12000});
    </script>
    @endif

    @if (Session::has('gagal'))
    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.error("{{ Session::get('gagal') }}", "Gagal!", {timeout:12000});
    </script>
    @endif
</body>
</html>
