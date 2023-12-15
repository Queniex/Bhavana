<div class="container-fluid">
        <div class="flex justify-between text-black rounded-3xl mx-5 mt-3">
            
                <!-- navbar -->
                    <div class="px-12 xl:px-12 py-6 flex w-full items-center">
                        <a class="text-3xl font-bold font-heading" href="#">
                            <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                            <span class="text-yellow-300">Bha</span>vana
                        </a>
                        <!-- Nav Links -->
                        <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                            <li><router-link class="x hover:text-yellow-300 hover:underline hover:underline-offset-8" to="/Dash-Buy">BERANDA</router-link></li>
                            <li><router-link class="x hover:text-yellow-300 hover:underline hover:underline-offset-8" to="/Catalogue">KATALOG</router-link></li>
                            <li><router-link class="x hover:text-yellow-300 hover:underline hover:underline-offset-8" to="/Contract-Buy">TRANSAKSI</router-link></li>
                        </ul>
                        <!-- Header Icons -->
                        <div class="hidden xl:flex items-center space-x-5">
                            <!-- Sign In / Register      -->
                            <button class="flex items-center hover:text-yellow-300" id="dropdownDefaultButton" data-dropdown-toggle="profile" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-yellow-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                            <div id="profile" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                  <li>
                                    <router-link to="/Profile-Buy" class="block px-4 py-2 hover:bg-gray-100">Profile</router-link>
                                  </li>
                                  <li>
                                    <a href="logout" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
                                  </li>
                                </ul>
                            </div>                            
                        </div>
                    </div>
                    <!-- Responsive navbar -->
                    <a class="xl:hidden flex mr-6 items-center" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="flex absolute -mt-5 ml-4">
                            <span
                                class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                            </span>
                        </span>
                    </a>
                    <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </a>
        </div>
    </div>