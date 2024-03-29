<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- Flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- Remixion --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <title>Bhavana</title>
    <style>
        /* *{
            border: red 1px solid;
        } */

        .container-fluid {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }

        /* a.router-link-exact-active {
            color: #fde047 !important;
            font-weight: 500px; 
            text-decoration: underline;
            text-underline-offset: px;
        } */

    </style>
    <body class="antialiased bg-[#F5F5F5]">
        <div id="app">
            <div class="wrapper">
                <div id="content">
                        @include('Buyer.header')
    
                    <router-view></router-view>

                        @include('Buyer.footer')
                </div>
            </div>    
        </div>
    
        <script src="js/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
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
    </body>
</html>

<div class="text-black">
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                            <h1 class="text-xl font-bold">{{ $user->Username }}</h1>
                            <p class="text-gray-700">Johndoe@gmail.com</p>
                            <div class="mt-6 flex flex-wrap gap-4 justify-center">


                                <!-- Modal toggle -->
                                <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Ubah Profile
                                </button>

                                <!-- Main modal -->
                                <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <h3 class="text-xl font-semibold text-gray-900 ">
                                                    Ubah Profile
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-hide="static-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="max-w-md mx-auto mt-3 bg-white rounded-md overflow-hidden mb-3">
                                                <div class="text-center pt-3">
                                                    <img  alt="Profile"
                                                        class="w-20 h-20 object-cover mx-auto rounded-full" />
                                                    <div v-else
                                                        class="w-20 h-20 mx-auto bg-gray-300 rounded-full flex items-center justify-center">
                                                        <span class="text-gray-600 text-xs">No Image</span>
                                                    </div>
                                                </div>
                                                <div class="px-6 py-4">
                                                    <label for="fileInput"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        Pilih Foto Profile :
                                                    </label>
                                                    <input id="fileInput" type="file" ref="fileInput"
                                                        class="w-full text-sm py-2 px-3 border border-gray-300 rounded-md" />
                                                </div>
                                            </div>

                                            <form>
                                                <div class="grid gap-6 mx-5 mb-6 md:grid-cols-2">
                                                    <div>
                                                        <label for="first_name"
                                                            class="block mb-2 text-sm font-medium text-black">Username</label>
                                                        <input type="text" id="first_name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="John" required>
                                                    </div>
                                                    <div>
                                                        <label for="last_name"
                                                            class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                        <input type="text" id="last_name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Johndoe@gmail.com" required>
                                                    </div>
                                                    <div>
                                                        <label for="company"
                                                            class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                                            Lahir</label>
                                                        <input type="text" id="company"
                                                            class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="27-08-1999" disabled>
                                                    </div>
                                                    <div>
                                                        <label for="phone"
                                                            class="block mb-2 text-sm font-medium text-gray-900">No
                                                            Telp</label>
                                                        <input type="tel" id="phone"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="123-45-678"
                                                            pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                                    </div>
                                                </div>
                                            </form>

                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-hide="static-modal" type="button"
                                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span
                                class="text-gray-700 uppercase font-bold tracking-wider mb-2 underline underline-offset-4">Info
                                Data</span>
                            <ul>
                                <li class="mb-2">No telp : +6278322213</li>
                                <li class="mb-2">Tanggal Lahir : -</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-9">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-2">Analitik Pembelian</h2>
                        <div class="bg-light mt-2 border border-black rounded-4">
                            <canvas ref="myChart" style="width: 100%; height: 112px;"></canvas>
                        </div>

                        <div class="container mx-auto mt-8">
                            <h2 class="text-2xl font-bold">Riwayat Pembelian</h2>

                            <div class="bg-white shadow-md rounded my-4 overflow-x-auto">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="text-black bg-yellow-300 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">No</th>
                                            <th class="py-3 px-6 text-left">Tanggal Pembelian</th>
                                            <th class="py-3 px-6 text-left">Produk</th>
                                            <th class="py-3 px-6 text-left">Jumlah</th>
                                            <th class="py-3 px-6 text-left">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-black text-sm font-light">
                                        <!-- Dummy Data -->
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">1</td>
                                            <td class="py-3 px-6 text-left whitespace-nowrap">2023-01-01</td>
                                            <td class="py-3 px-6 text-left">
                                                <span
                                                    class="inline-block bg-yellow-100 rounded-full px-3 py-1 text-sm font-semibold text-black">Produk
                                                    A</span>
                                            </td>
                                            <td class="py-3 px-6 text-left">2 Tons</td>
                                            <td class="py-3 px-6 text-left">Rp 2.750.000</td>
                                        </tr>
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">2</td>
                                            <td class="py-3 px-6 text-left whitespace-nowrap">2023-02-01</td>
                                            <td class="py-3 px-6 text-left">
                                                <span
                                                    class="inline-block bg-yellow-100 rounded-full px-3 py-1 text-sm font-semibold text-black">Produk
                                                    B</span>
                                            </td>
                                            <td class="py-3 px-6 text-left">100 Kg</td>
                                            <td class="py-3 px-6 text-left">Rp 3.050.000</td>
                                        </tr>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>