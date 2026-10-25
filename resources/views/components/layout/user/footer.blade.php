<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-6 footer-about">
                <a href="{{ route('user.home') }}" class="logo d-flex align-items-center"><span class="sitename">Jelajah Wisata</span></a>
                <p class="mt-3">Temukan perjalanan yang paling sesuai dengan preferensi Anda melalui rekomendasi wisata berbasis TOPSIS.</p>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Jelajahi</h4>
                <ul>
                    <li><a href="{{ route('user.home') }}#hero">Beranda</a></li>
                    <li><a href="{{ route('user.home') }}#packages">Paket wisata</a></li>
                    <li><a href="{{ route('user.home') }}#recommendations">Rekomendasi</a></li>
                    <li><a href="{{ route('user.home') }}#nearby">Terdekat</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 footer-links">
                <h4>Perjalanan lebih mudah</h4>
                <p>Bandingkan harga, rating, durasi, dan jumlah destinasi sebelum menentukan pilihan.</p>
            </div>
        </div>
    </div>
    <div class="container copyright text-center mt-4">
        <p>© {{ date('Y') }} <strong class="px-1 sitename">Jelajah Wisata</strong><span> — Temukan perjalanan favoritmu.</span></p>
    </div>
</footer>
