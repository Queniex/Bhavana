<!-- Sidebar -->
 <aside id="sidebar">
    <div class="h-75">
        <div class="sidebar-logo">
            <h2 class="header-text text-black fw-bold text-3xl"><span class="text-warning">Bha</span>vana</h3>
            <h6 class="text-base mb-3">Welcome, <span class="bg-warning px-2 rounded-pill fw-bold text-sm">Admin!</span></h6>
            <hr>
        </div>
        <!-- Sidebar Navigation -->
        <ul class="sidebar-nav">
            <li class="sidebar-header text-black fw-semibold">
                Menu
            </li>
            {{-- <li class="sidebar-item text-black">
                <router-link to="/Dashboard" class="sidebar-link text-black" active-class="active-link"><i class="ri-dashboard-fill"></i> Dashboard</router-link>
            </li> --}}
            <li class="sidebar-item text-black">
                <router-link to="/Dash" class="sidebar-link text-black" active-class="active-link"><i class="ri-dashboard-fill"></i> Dashboard</router-link>
            </li>
            <li class="sidebar-item text-black">
                <a href="#" class="sidebar-link text-black collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
                    aria-expanded="false" aria-controls="auth">
                    <i class="ri-bar-chart-grouped-line"></i> Kelola Transaksi</a>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <router-link to="/Contract" class="sidebar-link text-black" active-class="active-link"><i class="ri-mail-fill"></i> Kontrak</router-link>
                    </li>
                    <li class="sidebar-item">
                        <router-link to="/Selling" class="sidebar-link text-black" active-class="active-link"><i class="ri-shopping-cart-line"></i> Penjualan</router-link>
                    </li>
                    <li class="sidebar-item">
                        <router-link to="/Buying" class="sidebar-link text-black" active-class="active-link"><i class="ri-shopping-cart-fill"></i> Pembelian</router-link>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item text-black">
                <a href="#" class="sidebar-link text-black collapsed" data-bs-toggle="collapse" data-bs-target="#auth2"
                    aria-expanded="false" aria-controls="auth2">
                    <i class="ri-database-line"></i> Kelola Inventory
                </a>
                <ul id="auth2" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <router-link to="/Category" class="sidebar-link text-black" active-class="active-link"><i class="ri-archive-line"></i> Kategori</router-link>
                    </li>
                    <li class="sidebar-item">
                        <router-link to="/Product" class="sidebar-link text-black" active-class="active-link"><i class="ri-archive-fill"></i> Produk</router-link>
                </ul>
            </li>
            <li class="sidebar-item text-black">
                <router-link to="/User" class="sidebar-link text-black" active-class="active-link"><i class="ri-team-line"></i> Kelola Pengguna</router-link>
            </li>
            {{-- <li class="sidebar-item text-black">
                <a href="#" class="sidebar-link text-black collapsed" data-bs-toggle="collapse" data-bs-target="#auth3"
                    aria-expanded="false" aria-controls="auth3">
                    <i class="ri-user-fill"></i> Kelola Pengguna</a>
                </a>
                <ul id="auth3" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebarx">
                    <li class="sidebar-item">
                        <router-link to="/User" class="sidebar-link text-black" active-class="active-link"><i class="ri-team-line"></i> Akun</router-link>
                    </li>
                    <li class="sidebar-item">
                        <router-link to="/Request" class="sidebar-link text-black" active-class="active-link"><i class="ri-user-add-line"></i> Permintaan</router-link>
                    </li>
                </ul>
            </li> --}}
            <hr class="mt-3">
            <li class="sidebar-item text-black mt-3">
                <a href="/logout" class="sidebar-link text-black logout">Logout</a>
            </li>
        </ul>
    </div>
</aside>