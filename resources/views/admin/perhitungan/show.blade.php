<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div>
                    <h1 class="mb-1">Detail Hasil Perhitungan</h1>
                    <p class="text-muted mb-0">Ringkasan rekomendasi paket berdasarkan perhitungan TOPSIS.</p>
                </div>
                <ol class="breadcrumb float-sm-right mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('admin/perhitungan') }}">Hasil Perhitungan</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
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

            <div class="card card-primary card-outline shadow-sm">
                <div class="card-header border-0 pb-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="mb-2">
                            <span class="badge badge-{{ $rankColor }} px-3 py-2 mb-2">
                                @if ($rank === 1)<i class="fas fa-trophy mr-1"></i>@else<i class="fas fa-medal mr-1"></i>@endif
                                Peringkat #{{ $rank }}
                            </span>
                            <h3 class="card-title d-block font-weight-bold text-lg mb-1">
                                {{ $package?->nama_paket ?? 'Paket wisata tidak tersedia' }}
                            </h3>
                            <p class="text-muted mb-0">
                                <i class="fas fa-map-marker-alt text-danger mr-1"></i>{{ $package?->lokasi ?? 'Lokasi tidak tersedia' }}
                            </p>
                        </div>
                        <div class="btn-group mb-2" role="group" aria-label="Aksi detail perhitungan">
                            <x-button.back-button url="admin/perhitungan" />
                        </div>
                    </div>
                </div>

                <div class="card-body pt-3">
                    <div class="row">
                        <div class="col-lg-8 mb-3">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="info-box bg-light h-100 mb-0">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-line"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Skor Preferensi TOPSIS</span>
                                            <span class="info-box-number text-success">{{ number_format((float) $perhitungan->skor_topsis, 4, ',', '.') }}</span>
                                            <div class="progress mt-2">
                                                <div class="progress-bar bg-success" style="width: {{ $scorePercent }}%"></div>
                                            </div>
                                            <span class="progress-description">{{ number_format($scorePercent, 1, ',', '.') }}% dari skala 0–1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="info-box bg-light h-100 mb-0">
                                        <span class="info-box-icon bg-{{ $rankColor }} elevation-1"><i class="fas fa-award"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Posisi Rekomendasi</span>
                                            <span class="info-box-number">Peringkat {{ $rank }}</span>
                                            <span class="progress-description">Di antara seluruh paket yang dihitung</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-outline card-light">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold"><i class="fas fa-suitcase-rolling text-primary mr-2"></i>Informasi Paket</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 35%">Nama Paket</th>
                                                    <td class="font-weight-bold">{{ $package?->nama_paket ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fas fa-map-marker-alt text-danger mr-1"></i>Lokasi</th>
                                                    <td>{{ $package?->lokasi ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fas fa-tag text-success mr-1"></i>Harga</th>
                                                    <td class="text-success font-weight-bold">Rp {{ number_format((float) ($package?->harga ?? 0), 0, ',', '.') }}</td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fas fa-star text-warning mr-1"></i>Rating</th>
                                                    <td>
                                                        @if ($package?->rating !== null)
                                                            {{ number_format((float) $package->rating, 1, ',', '.') }} <span class="text-muted">/ 5</span>
                                                            <i class="fas fa-star text-warning ml-1"></i>
                                                        @else
                                                            <span class="text-muted">Belum ada rating</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fas fa-clock text-info mr-1"></i>Durasi</th>
                                                    <td>{{ $package?->durasi_perjalanan ?? '-' }} hari</td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fas fa-map-marked-alt text-primary mr-1"></i>Destinasi</th>
                                                    <td>{{ $package?->jumlah_destinasi ?? '-' }} tempat</td>
                                                </tr>
                                                <tr>
                                                    <th><i class="far fa-calendar-alt text-muted mr-1"></i>Perhitungan dibuat</th>
                                                    <td>{{ $perhitungan->created_at?->translatedFormat('d F Y, H:i') ?? '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div class="card bg-gradient-primary h-100 mb-0">
                                <div class="card-body d-flex flex-column justify-content-center text-center p-4">
                                    @if ($package?->poto)
                                        <img src="{{ url('public/' . $package->poto) }}" onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTwtYMjdu_ANbSA4judVJlam9OON9Ml3iszB2fmnTaxkYK1v3bMFtLl14i&s=10';" alt="{{ $package->nama_paket }}" class="img-fluid rounded shadow mx-auto mb-3" style="width: 100%; max-height: 220px; object-fit: cover;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center rounded mb-3 mx-auto" style="width: 100%; min-height: 180px; background: rgba(255,255,255,.15);">
                                            <i class="fas fa-mountain fa-4x text-white-50"></i>
                                        </div>
                                    @endif
                                    <h4 class="font-weight-bold">Rekomendasi #{{ $rank }}</h4>
                                    <p class="mb-0">Skor menunjukkan tingkat kecocokan paket terhadap kriteria yang digunakan. Nilai lebih tinggi berarti rekomendasi lebih baik.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="callout callout-info mb-0">
                        <h5><i class="fas fa-lightbulb mr-1"></i> Cara membaca skor</h5>
                        <p class="mb-0">Nilai preferensi TOPSIS berada pada rentang 0 sampai 1. Peringkat disusun dari skor tertinggi ke terendah, sehingga paket ini berada di posisi <strong>#{{ $rank }}</strong> dengan skor <strong>{{ number_format((float) $perhitungan->skor_topsis, 4, ',', '.') }}</strong>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>
