<x-user>
    <section id="hero" class="hero section dark-background">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5500">
            <div class="carousel-item active">
                <img src="{{ url('public/user/assets/img/hero-carousel/hero-carousel-1.jpg') }}" alt="Pemandangan alam untuk perjalanan wisata">
                <div class="carousel-container">
                    <h2>Temukan perjalanan yang tepat untukmu</h2>
                    <p>Jelajahi pilihan paket wisata dan temukan rekomendasi terbaik berdasarkan harga, rating, durasi, serta jumlah destinasi.</p>
                    <a href="#recommendations" class="btn-get-started">Lihat Rekomendasi</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ url('public/user/assets/img/hero-carousel/hero-carousel-3.jpg') }}" alt="Destinasi wisata alam Indonesia">
                <div class="carousel-container">
                    <h2>Liburan lebih yakin, pilihan lebih mudah</h2>
                    <p>Bandingkan informasi setiap paket dan pilih pengalaman yang paling sesuai dengan rencana perjalananmu.</p>
                    <a href="#packages" class="btn-get-started">Jelajahi Paket</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ url('public/user/assets/img/hero-carousel/hero-carousel-5.jpg') }}" alt="Wisata dan pengalaman perjalanan">
                <div class="carousel-container">
                    <h2>Mulai petualangan berikutnya</h2>
                    <p>Temukan inspirasi destinasi baru dari katalog paket wisata pilihan.</p>
                    <a href="#packages" class="btn-get-started">Mulai Jelajah</a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev" aria-label="Sebelumnya">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next" aria-label="Berikutnya">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>

    <section id="featured-services" class="featured-services section dark-background">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                    <div class="icon flex"><i class="bi bi-compass"></i></div>
                    <div><h4 class="title">Banyak pilihan</h4><p class="description">Jelajahi paket wisata dari berbagai lokasi dengan detail yang mudah dibandingkan.</p></div>
                </div>
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex"><i class="bi bi-stars"></i></div>
                    <div><h4 class="title">Rekomendasi TOPSIS</h4><p class="description">Lihat urutan paket berdasarkan penilaian beberapa kriteria wisata.</p></div>
                </div>
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon flex"><i class="bi bi-info-circle"></i></div>
                    <div><h4 class="title">Informasi transparan</h4><p class="description">Periksa harga, rating, durasi perjalanan, dan jumlah destinasi sebelum memilih.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section id="recommendations" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Rekomendasi Pilihan</h2>
            <p>Paket dengan peringkat terbaik berdasarkan hasil perhitungan TOPSIS.</p>
        </div>
        <div class="container">
            @if ($recommendations->isNotEmpty())
                <div class="row gy-4">
                    @foreach ($recommendations as $recommendation)
                        @php($package = $recommendation->package)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <article class="travel-card">
                                @if ($package?->poto)
                                    <img class="travel-card-image" src="{{ url('public/' . $package->poto) }}" alt="{{ $package->nama_paket }}" onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTwtYMjdu_ANbSA4judVJlam9OON9Ml3iszB2fmnTaxkYK1v3bMFtLl14i&s=10';">
                                @else
                                    <div class="travel-card-placeholder"><i class="bi bi-image"></i></div>
                                @endif
                                <div class="p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge text-bg-primary rounded-pill px-3 py-2">Peringkat #{{ $recommendation->peringkat }}</span>
                                        <span class="score-pill"><i class="bi bi-graph-up-arrow"></i>{{ number_format((float) $recommendation->skor_topsis, 4, ',', '.') }}</span>
                                    </div>
                                    <h3 class="h5 fw-bold mb-2">{{ $package?->nama_paket ?? 'Paket wisata tidak tersedia' }}</h3>
                                    <p class="text-secondary mb-3"><i class="bi bi-geo-alt me-1"></i>{{ $package?->lokasi ?? 'Lokasi tidak tersedia' }}</p>
                                    <div class="d-flex flex-wrap gap-3 text-secondary small mb-4">
                                        <span><i class="bi bi-cash-coin me-1"></i>Rp {{ number_format((float) ($package?->harga ?? 0), 0, ',', '.') }}</span>
                                        <span><i class="bi bi-star-fill text-warning me-1"></i>{{ number_format((float) ($package?->rating ?? 0), 1, ',', '.') }}</span>
                                    </div>
                                    @if ($package)
                                        <a href="{{ url('paket-wisata', $package->id) }}" class="btn btn-outline-primary w-100">Lihat Detail <i class="bi bi-arrow-right ms-1"></i></a>
                                    @else
                                        <span class="btn btn-outline-secondary w-100 disabled">Paket tidak tersedia</span>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5 px-3 rounded-4" style="background: #f5f8fa;">
                    <i class="bi bi-compass display-5 text-primary"></i>
                    <h3 class="h5 fw-bold mt-3">Rekomendasi sedang disiapkan</h3>
                    <p class="text-secondary mb-0">Silakan lihat katalog paket wisata yang tersedia sementara ini.</p>
                </div>
            @endif
        </div>
    </section>

    <section id="nearby" class="services section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Rekomendasi Wisata Terdekat Anda</h2>
            <p>TOPSIS menilai harga, rating, durasi, jumlah destinasi, serta jarak dari titik awal Anda.</p>
        </div>
        <div class="container text-center" data-aos="fade-up" data-nearby-endpoint="{{ route('user.nearby') }}">
            <div class="row g-3 justify-content-center align-items-end">
                <div class="col-md-7 col-lg-6 text-start">
                    <label for="nearby-area" class="form-label fw-semibold">Pilih daerah atau kota</label>
                    <input id="nearby-area" class="form-control form-control-lg" list="nearby-area-options"
                        placeholder="Contoh: Bandung" autocomplete="off">
                    <datalist id="nearby-area-options">
                        @foreach ($nearbyAreas as $area)
                            <option value="{{ $area }}"></option>
                        @endforeach
                    </datalist>
                    <div class="form-text">Pilih lokasi dari daftar. Untuk posisi yang lebih tepat, gunakan GPS.</div>
                </div>
                <div class="col-md-auto">
                    <button id="find-nearby-area" type="button" class="btn btn-primary btn-lg rounded-pill px-4 w-100">
                        <i class="bi bi-calculator me-2"></i>Hitung Rekomendasi
                    </button>
                </div>
            </div>
            <div class="my-3 text-secondary small">atau</div>
            <button id="find-nearby" type="button" class="btn btn-outline-primary rounded-pill px-4">
                <i class="bi bi-crosshair me-2"></i>Gunakan Lokasi Saya
            </button>
            <p class="small text-secondary mt-3 mb-0">Bobot jarak 25%, sedangkan bobot kriteria admin 75%. Lokasi GPS hanya dipakai untuk menghitung dan tidak disimpan.</p>
            <div id="nearby-status" class="mt-4" role="status" aria-live="polite"></div>
            <div id="nearby-results" class="row gy-4 text-start mt-2"></div>
        </div>
    </section>

    <section id="about" class="about section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Memilih wisata jadi lebih mudah</h2>
            <p>Jelajah Wisata membantu Anda membandingkan alternatif perjalanan secara praktis.</p>
        </div>
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6 content" data-aos="fade-up">
                    <p class="who-we-are">KENALI PILIHANMU</p>
                    <h3>Perjalanan yang pas dimulai dari informasi yang jelas</h3>
                    <p class="fst-italic">Setiap orang punya pertimbangan berbeda saat merencanakan liburan. Kami menyajikan rincian paket dan hasil rekomendasi dalam satu tempat.</p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i><span>Bandingkan harga dan rating paket wisata.</span></li>
                        <li><i class="bi bi-check-circle"></i><span>Ketahui durasi perjalanan dan jumlah destinasi.</span></li>
                        <li><i class="bi bi-check-circle"></i><span>Gunakan peringkat TOPSIS sebagai panduan memilih.</span></li>
                    </ul>
                    <a href="#packages" class="read-more"><span>Lihat semua paket</span><i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                    <img src="{{ url('public/user/assets/img/about-company-1.jpg') }}" alt="Pemandangan destinasi wisata" class="img-fluid rounded-4 shadow-sm">
                </div>
            </div>
        </div>
    </section>

    <section id="packages" class="portfolio section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Jelajahi Paket Wisata</h2>
            <p>Pilih destinasi yang cocok untuk rencana perjalanan Anda.</p>
        </div>
        <div class="container">
            <form action="{{ url('/') }}#packages" method="GET" class="row g-2 justify-content-center mb-4" data-aos="fade-up">
                <div class="col-md-6 col-lg-5">
                    <label for="package-search" class="visually-hidden">Cari paket atau lokasi</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input id="package-search" type="search" name="q" value="{{ $search }}" class="form-control" placeholder="Cari nama paket atau lokasi...">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
                @if ($search !== '')
                    <div class="col-auto"><a href="{{ url('/') }}#packages" class="btn btn-outline-secondary">Hapus pencarian</a></div>
                @endif
            </form>

            @if ($packages->isNotEmpty())
                <div class="row gy-4">
                    @foreach ($packages as $package)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 75 }}">
                            <article class="travel-card">
                                @if ($package->poto)
                                    <img class="travel-card-image" src="{{ url('public/' . $package->poto) }}" alt="{{ $package->nama_paket }}" onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTwtYMjdu_ANbSA4judVJlam9OON9Ml3iszB2fmnTaxkYK1v3bMFtLl14i&s=10';">
                                @else
                                    <div class="travel-card-placeholder"><i class="bi bi-image"></i></div>
                                @endif
                                <div class="p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-secondary small"><i class="bi bi-geo-alt me-1"></i>{{ $package->lokasi }}</span>
                                        @if ($package->rating)
                                            <span class="text-nowrap small fw-semibold"><i class="bi bi-star-fill text-warning me-1"></i>{{ number_format((float) $package->rating, 1, ',', '.') }}</span>
                                        @endif
                                    </div>
                                    <h3 class="h5 fw-bold mb-3">{{ $package->nama_paket }}</h3>
                                    <div class="d-flex justify-content-between align-items-end mb-3">
                                        <div><div class="text-secondary small">Mulai dari</div><div class="fw-bold text-primary">Rp {{ number_format((float) $package->harga, 0, ',', '.') }}</div></div>
                                        <div class="text-end text-secondary small">{{ $package->durasi_perjalanan }} hari <span class="mx-1">·</span>{{ $package->jumlah_destinasi }} destinasi</div>
                                    </div>
                                    <a href="{{ url('paket-wisata', $package->id) }}" class="btn btn-outline-primary w-100">Lihat Paket <i class="bi bi-arrow-right ms-1"></i></a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    {{ $packages->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="text-center py-5 px-3 rounded-4" style="background: #f5f8fa;">
                    <i class="bi bi-search display-5 text-primary"></i>
                    <h3 class="h5 fw-bold mt-3">Paket belum ditemukan</h3>
                    <p class="text-secondary mb-0">Coba kata kunci lain atau hapus pencarian untuk melihat semua paket.</p>
                </div>
            @endif
        </div>
    </section>

    <section class="call-to-action section dark-background">
        <img src="{{ url('public/user/assets/img/cta-bg.jpg') }}" alt="Suasana perjalanan wisata">
        <div class="container">
            <div class="row justify-content-center" data-aos="zoom-in">
                <div class="col-xl-10 text-center">
                    <h3>Petualangan baru menantimu</h3>
                    <p>Mulai dari melihat rekomendasi, lalu temukan paket wisata yang paling sesuai dengan keinginanmu.</p>
                    <a class="cta-btn" href="#recommendations">Lihat Rekomendasi</a>
                </div>
            </div>
        </div>
    </section>

</x-user>

