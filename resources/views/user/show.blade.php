<x-user>
    <section class="page-title dark-background" style="background-image: url('{{ url('public/user/assets/img/page-title-bg.jpg') }}');">
        <div class="container position-relative">
            <h1>{{ $package->nama_paket }}</h1>
            <p><i class="bi bi-geo-alt me-1"></i>{{ $package->lokasi }}</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/') }}#packages">Paket Wisata</a></li>
                    <li class="current">Detail Paket</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="portfolio-details section">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-8">
                    @if ($package->poto)
                        <img src="{{ url('public/' . $package->poto) }}" alt="{{ $package->nama_paket }}" onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTwtYMjdu_ANbSA4judVJlam9OON9Ml3iszB2fmnTaxkYK1v3bMFtLl14i&s=10';" class="img-fluid rounded-4 shadow-sm w-100" style="max-height: 520px; object-fit: cover;">
                    @else
                        <div class="travel-card-placeholder rounded-4" style="height: 420px;"><i class="bi bi-image"></i></div>
                    @endif
                    <div class="portfolio-description mt-4">
                        <h2>Tentang perjalanan ini</h2>
                        <p style="white-space: pre-line;">{{ $package->deskripsi ?: 'Belum ada deskripsi untuk paket wisata ini.' }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-summary">
                        <div class="package-summary-heading">
                            <div class="package-summary-icon"><i class="bi bi-card-checklist"></i></div>
                            <div class="min-w-0">
                                <p class="package-summary-eyebrow">Ringkasan perjalanan</p>
                                <h2 class="package-summary-title">Detail Paket</h2>
                            </div>
                        </div>

                        <div class="package-summary-price">
                            <span>Harga paket</span>
                            <strong>Rp {{ number_format((float) $package->harga, 0, ',', '.') }}</strong>
                        </div>

                        <div class="package-summary-grid">
                            <div class="package-summary-stat package-summary-stat-wide">
                                <span><i class="bi bi-geo-alt me-1"></i>Lokasi</span>
                                <strong>{{ $package->lokasi }}</strong>
                            </div>
                            <div class="package-summary-stat">
                                <span><i class="bi bi-star-fill me-1"></i>Rating</span>
                                <strong>{{ $package->rating ? number_format((float) $package->rating, 1, ',', '.') . ' / 5' : 'Belum ada' }}</strong>
                            </div>
                            <div class="package-summary-stat">
                                <span><i class="bi bi-clock me-1"></i>Durasi</span>
                                <strong>{{ $package->durasi_perjalanan }} hari</strong>
                            </div>
                            <div class="package-summary-stat package-summary-stat-wide">
                                <span><i class="bi bi-map me-1"></i>Jumlah destinasi</span>
                                <strong>{{ $package->jumlah_destinasi }} tempat</strong>
                            </div>
                            @if ($recommendation)
                                <div class="package-summary-stat">
                                    <span><i class="bi bi-trophy me-1"></i>Peringkat TOPSIS</span>
                                    <strong>#{{ $recommendation->peringkat }}</strong>
                                </div>
                                <div class="package-summary-stat">
                                    <span><i class="bi bi-graph-up me-1"></i>Skor TOPSIS</span>
                                    <strong>{{ number_format((float) $recommendation->skor_topsis, 4, ',', '.') }}</strong>
                                </div>
                            @endif
                        </div>

                        <a href="{{ url('/') }}#packages" class="btn btn-primary package-summary-action w-100">
                            <i class="bi bi-arrow-left"></i><span>Kembali ke Paket Wisata</span>
                        </a>
                    </div>
                    @if ($recommendation)
                        <div class="nearby-rank-note mt-3">
                            <i class="bi bi-stars me-1"></i>Paket ini termasuk rekomendasi TOPSIS dengan peringkat <strong>#{{ $recommendation->peringkat }}</strong>.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-user>
