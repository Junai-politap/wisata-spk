<x-admin>
    @php
        $totalRekomendasi = $list_perhitungan->total();
        $rekomendasiTeratas = $list_perhitungan->first();
    @endphp

    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <h1 class="mb-1 font-weight-bold">Rekomendasi Wisata</h1>
                    <p class="text-muted mb-0">Temukan paket wisata terbaik berdasarkan perhitungan TOPSIS.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center">
                    <a href="{{ url('admin/perhitungan/calculate') }}" class="btn btn-primary shadow-sm mr-2 mb-2">
                        <i class="fas fa-sync-alt mr-1"></i> Hitung Ulang Rekomendasi
                    </a>
                    @if ($totalRekomendasi > 0)
                        <form action="{{ route('perhitungan.reset') }}" method="POST" class="mb-2"
                            onsubmit="return confirm('Yakin ingin menghapus semua hasil perhitungan TOPSIS? Data paket wisata dan kriteria tidak akan dihapus.')">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger shadow-sm">
                                <i class="fas fa-trash-alt mr-1"></i> Reset Hasil
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            @if ($rekomendasiTeratas && $list_perhitungan->currentPage() === 1)
                @php
                    $paketTeratas = $rekomendasiTeratas->package;
                    $skorTeratas = max(0, min(100, (float) $rekomendasiTeratas->skor_topsis * 100));
                @endphp
                <div class="card border-0 shadow-sm mb-4 overflow-hidden" style="background: linear-gradient(120deg, #163a70 0%, #2865a8 58%, #49a4be 100%); color: #fff;">
                    <div class="card-body p-4 p-lg-5">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <span class="badge badge-warning px-3 py-2 mb-3 text-uppercase">
                                    <i class="fas fa-crown mr-1"></i> Rekomendasi Teratas
                                </span>
                                <h2 class="font-weight-bold mb-2">{{ $paketTeratas?->nama_paket ?? 'Paket wisata tidak tersedia' }}</h2>
                                <p class="mb-3" style="opacity: .88;">
                                    <i class="fas fa-map-marker-alt mr-1"></i>{{ $paketTeratas?->lokasi ?? 'Lokasi tidak tersedia' }}
                                    <span class="mx-2">•</span>
                                    {{ number_format((float) $rekomendasiTeratas->skor_topsis, 4, ',', '.') }} skor TOPSIS
                                </p>
                                <div class="d-flex flex-wrap align-items-center">
                                    <a href="{{ url('admin/perhitungan/' . $rekomendasiTeratas->id) }}" class="btn btn-light text-primary font-weight-bold mr-2 mb-2">
                                        Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                    @if ($paketTeratas)
                                        <span class="mr-3 mb-2"><i class="fas fa-tag mr-1"></i>Rp {{ number_format((float) $paketTeratas->harga, 0, ',', '.') }}</span>
                                        <span class="mb-2"><i class="fas fa-star text-warning mr-1"></i>{{ number_format((float) $paketTeratas->rating, 1, ',', '.') }} / 5</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 mt-4 mt-lg-0 text-center">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle border border-light" style="width: 150px; height: 150px; background: rgba(255,255,255,.12);">
                                    <div>
                                        <div class="text-uppercase small" style="letter-spacing: 1px; opacity: .85;">Skor terbaik</div>
                                        <div class="font-weight-bold" style="font-size: 2.2rem; line-height: 1.2;">{{ number_format($skorTeratas, 1, ',', '.') }}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="d-flex flex-wrap align-items-end justify-content-between mb-3">
                <div>
                    <h3 class="font-weight-bold mb-1">Semua Rekomendasi</h3>
                    <p class="text-muted mb-0">Paket diurutkan dari skor tertinggi ke terendah.</p>
                </div>
                <span class="badge badge-light border px-3 py-2 mt-2 mt-md-0">
                    <i class="fas fa-layer-group text-primary mr-1"></i>{{ $totalRekomendasi }} paket ditemukan
                </span>
            </div>

            @if ($list_perhitungan->isNotEmpty())
                <div class="row">
                    @foreach ($list_perhitungan as $perhitungan)
                        @php
                            $package = $perhitungan->package;
                            $rank = (int) $perhitungan->peringkat;
                            $rankColor = match ($rank) {
                                1 => 'warning',
                                2 => 'secondary',
                                3 => 'info',
                                default => 'primary',
                            };
                            $scorePercent = max(0, min(100, (float) $perhitungan->skor_topsis * 100));
                        @endphp
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="position-relative">
                                    @if ($package?->poto)
                                        <img src="{{ url('public/' . $package->poto) }}" alt="{{ $package->nama_paket }}" onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTwtYMjdu_ANbSA4judVJlam9OON9Ml3iszB2fmnTaxkYK1v3bMFtLl14i&s=10';" class="card-img-top" style="height: 190px; object-fit: cover;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-light text-muted" style="height: 190px;">
                                            <div class="text-center"><i class="fas fa-mountain fa-3x mb-2"></i><div class="small">Foto belum tersedia</div></div>
                                        </div>
                                    @endif
                                    <span class="badge badge-{{ $rankColor }} position-absolute shadow-sm" style="top: 14px; left: 14px; padding: 9px 12px;">
                                        @if ($rank === 1)<i class="fas fa-trophy mr-1"></i>@else<i class="fas fa-medal mr-1"></i>@endif
                                        Peringkat #{{ $rank }}
                                    </span>
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div class="pr-2">
                                            <h5 class="font-weight-bold mb-1">{{ $package?->nama_paket ?? 'Paket wisata tidak tersedia' }}</h5>
                                            <div class="text-muted text-sm"><i class="fas fa-map-marker-alt text-danger mr-1"></i>{{ $package?->lokasi ?? 'Lokasi tidak tersedia' }}</div>
                                        </div>
                                        <span class="text-warning text-nowrap"><i class="fas fa-star"></i> {{ number_format((float) ($package?->rating ?? 0), 1, ',', '.') }}</span>
                                    </div>

                                    <div class="rounded bg-light p-3 my-2">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="text-muted text-sm">Skor TOPSIS</span>
                                            <strong class="text-primary">{{ number_format((float) $perhitungan->skor_topsis, 4, ',', '.') }}</strong>
                                        </div>
                                        <div class="progress" style="height: 7px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $scorePercent }}%" aria-valuenow="{{ $scorePercent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="row text-center mt-2 mb-3">
                                        <div class="col-4 border-right">
                                            <div class="text-muted text-xs text-uppercase">Harga</div>
                                            <div class="font-weight-bold text-sm">Rp {{ number_format((float) ($package?->harga ?? 0), 0, ',', '.') }}</div>
                                        </div>
                                        <div class="col-4 border-right">
                                            <div class="text-muted text-xs text-uppercase">Durasi</div>
                                            <div class="font-weight-bold text-sm">{{ $package?->durasi_perjalanan ?? '-' }} hari</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-muted text-xs text-uppercase">Destinasi</div>
                                            <div class="font-weight-bold text-sm">{{ $package?->jumlah_destinasi ?? '-' }} tempat</div>
                                        </div>
                                    </div>

                                    <a href="{{ url('admin/perhitungan/' . $perhitungan->id) }}" class="btn btn-outline-primary btn-block mt-auto">
                                        Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($list_perhitungan->hasPages())
                    <div class="d-flex flex-wrap align-items-center justify-content-between mt-2 mb-4">
                        <small class="text-muted mb-2 mb-md-0">
                            Menampilkan {{ $list_perhitungan->firstItem() }}–{{ $list_perhitungan->lastItem() }} dari {{ $list_perhitungan->total() }} rekomendasi
                        </small>
                        <div class="ml-auto">
                            {{ $list_perhitungan->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                @endif
            @else
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">
                        <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 88px; height: 88px;">
                            <i class="fas fa-route fa-2x text-primary"></i>
                        </div>
                        <h4 class="font-weight-bold">Belum ada rekomendasi</h4>
                        <p class="text-muted mb-3">Jalankan perhitungan TOPSIS untuk melihat urutan paket wisata terbaik.</p>
                        <a href="{{ url('admin/perhitungan/calculate') }}" class="btn btn-primary">
                            <i class="fas fa-calculator mr-1"></i> Mulai Perhitungan
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-admin>
