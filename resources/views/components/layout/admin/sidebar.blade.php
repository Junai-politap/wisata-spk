<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ url('public/admin') }}/dist/img/logo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Rekomendasi Wisata</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('public/admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> Super Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
                <li class="nav-item {{ request()->is('admin/kriteria*') || request()->is('admin/sub-kriteria*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/kriteria*') || request()->is('admin/sub-kriteria*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Master Kriteria
                           <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/kriteria') }}" class="nav-link {{ request()->is('admin/kriteria*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kriteria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/sub-kriteria') }}" class="nav-link {{ request()->is('admin/sub-kriteria*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Sub Kriteria</p>
                            </a>
                        </li>
                       
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/paket-wisata') }}" class="nav-link {{ request()->is('admin/paket-wisata*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Data Paket Wisata
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/pengguna') }}" class="nav-link {{ request()->is('admin/pengguna*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Pengguna
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/perhitungan') }}" class="nav-link {{ request()->is('admin/perhitungan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Perhitungan
                        </p>
                    </a>
                </li>
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
