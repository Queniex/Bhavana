<nav id="sidebar">
    <div class="sidebar-header">
        <h3 class="header-text"><span class="c1">Bha</span>vana</h3>
    </div>
    <ul class="list-unstyled components">
        <hr>
        <p>Menu</p>
        <li class="active">
            <router-link to="/Dashboard"><i class="ri-dashboard-fill"></i> Dashboard</router-link>
        </li>
        <li>
            <router-link to="/Profile"><i class="ri-profile-line"></i> Profile</router-link>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="ri-bar-chart-grouped-line"></i> Kelola Transaksi</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li><router-link to="/Contract"><i class="ri-mail-fill"></i> Kontrak</router-link></li>
                <li><router-link to="/Selling"><i class="ri-shopping-cart-line"></i> Penjualan</router-link></li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false"><i class="ri-database-line"></i> Kelola Inventory</a>
            <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li><router-link to="/Product"><i class="ri-archive-fill"></i> Produk</router-link></li>
                {{-- <li><a href="#">Page 3</a></li> --}}
            </ul>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li><a href="/login" class="download">Logout</a></li>
    </ul>
</nav>