<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('user.home') }}" class="logo d-flex align-items-center">
            <img src="{{ url('public/user/assets/img/logo.png') }}" alt="Jelajah Wisata" style="max-height: 42px; margin-right: 10px;">
            <h1 class="sitename">Jelajah Wisata</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('user.home') }}#hero" @class(['active' => request()->routeIs('user.home')])>Beranda</a></li>
                <li><a href="{{ route('user.home') }}#recommendations">Rekomendasi</a></li>
                <li><a href="{{ route('user.home') }}#nearby">Terdekat</a></li>
                <li><a href="{{ route('user.home') }}#packages">Paket Wisata</a></li>
                <li><a href="{{ route('user.home') }}#about">Tentang</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
