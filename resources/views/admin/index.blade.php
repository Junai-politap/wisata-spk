<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            {{-- Baris 1: Statistik Ringkasan --}}
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $total_paket_wisata }}</h3>
                            <p>Paket Wisata</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <a href="{{ url('admin/paket-wisata') }}" class="small-box-footer">
                            Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $total_pengguna }}</h3>
                            <p>Data Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ url('admin/pengguna') }}" class="small-box-footer">
                            Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $total_kriteria }}</h3>
                            <p>Data Kriteria</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list-alt"></i>
                        </div>
                        <a href="{{ url('admin/kriteria') }}" class="small-box-footer">
                            Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_sub_kriteria }}</h3>
                            <p>Data Sub Kriteria</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <a href="{{ url('admin/sub-kriteria') }}" class="small-box-footer">
                            Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            {{-- /.row statistik --}}

            {{-- Baris 2: Info dan Panduan Singkat --}}
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-info-circle mr-2"></i>
                                Sistem Pendukung Keputusan — Metode TOPSIS
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="mb-2">
                                        Selamat datang di panel administrasi <strong>Sistem Rekomendasi Tempat Wisata</strong>.
                                        Sistem ini menggunakan metode <strong>TOPSIS (Technique for Order Preference by Similarity to Ideal Solution)</strong>
                                        untuk membantu pengguna menemukan paket wisata terbaik berdasarkan preferensi mereka.
                                    </p>
                                    <p class="text-muted mb-0">
                                        Pastikan semua data kriteria, sub kriteria, dan paket wisata telah diisi dengan lengkap sebelum sistem digunakan oleh pengguna.
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="font-weight-bold mb-2">Alur Proses TOPSIS:</h6>
                                    <ol class="pl-3 mb-0" style="font-size: 0.9rem; line-height: 1.8;">
                                        <li>Tentukan kriteria &amp; bobotnya</li>
                                        <li>Masukkan sub kriteria penilaian</li>
                                        <li>Input data paket wisata</li>
                                        <li>Pengguna mengisi preferensi</li>
                                        <li>Sistem menghitung &amp; merekomendasikan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Baris 3: Tabel Data Terbaru --}}
            <div class="row">
                {{-- Paket Wisata Terbaru --}}
                <div class="col-lg-7 col-md-12 mb-3">
                    <div class="card card-outline card-success h-100">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-map-marked-alt mr-2"></i> Paket Wisata Terbaru
                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/paket-wisata/create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus mr-1"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nama Paket</th>
                                            <th>Lokasi</th>
                                            <th>Harga</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($paket_terbaru as $paket)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('admin/paket-wisata/' . $paket->id) }}" class="font-weight-bold text-dark">
                                                        {{ $paket->nama_paket }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <i class="fas fa-map-marker-alt text-danger mr-1"></i>
                                                    {{ $paket->lokasi ?? '-' }}
                                                </td>
                                                <td class="text-success font-weight-bold text-nowrap">
                                                    Rp {{ number_format((float) $paket->harga, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    @php $r = round((float) $paket->rating); @endphp
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fas fa-star {{ $i <= $r ? 'text-warning' : 'text-muted' }}" style="font-size: 11px;"></i>
                                                    @endfor
                                                    <small class="text-muted ml-1">{{ number_format((float) $paket->rating, 1) }}</small>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-4">
                                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                                    Belum ada data paket wisata.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($paket_terbaru->isNotEmpty())
                            <div class="card-footer text-right p-2">
                                <a href="{{ url('admin/paket-wisata') }}" class="btn btn-sm btn-outline-success">
                                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Pengguna Terbaru + Ringkasan Kriteria --}}
                <div class="col-lg-5 col-md-12 mb-3 d-flex flex-column" style="gap: 1rem;">

                    {{-- Pengguna Terbaru --}}
                    <div class="card card-outline card-info mb-0">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users mr-2"></i> Pengguna Terbaru
                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/pengguna/create') }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-plus mr-1"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @forelse ($pengguna_terbaru as $pengguna)
                                    <li class="list-group-item d-flex align-items-center py-2">
                                        @if ($pengguna->poto)
                                            <img src="{{ url("public/$pengguna->poto") }}"
                                            onerror="this.onerror=null; this.src='https://img.icons8.com/stickers/1200/user.jpg';"
                                                class="img-circle mr-3"
                                                style="width: 38px; height: 38px; object-fit: cover;">
                                        @else
                                            <img src="{{ url('public/admin') }}/dist/img/user2-160x160.jpg"
                                                class="img-circle mr-3"
                                                style="width: 38px; height: 38px; object-fit: cover;">
                                        @endif
                                        <div class="flex-1" style="min-width: 0;">
                                            <div class="font-weight-bold text-truncate">{{ $pengguna->nama_pengguna }}</div>
                                            <small class="text-muted text-truncate d-block">{{ $pengguna->email }}</small>
                                        </div>
                                        <a href="{{ url('admin/pengguna/' . $pengguna->id) }}"
                                            class="btn btn-xs btn-outline-info ml-2 text-nowrap">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </li>
                                @empty
                                    <li class="list-group-item text-center text-muted py-4">
                                        <i class="fas fa-users-slash fa-2x mb-2 d-block"></i>
                                        Belum ada data pengguna.
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                        @if ($pengguna_terbaru->isNotEmpty())
                            <div class="card-footer text-right p-2">
                                <a href="{{ url('admin/pengguna') }}" class="btn btn-sm btn-outline-info">
                                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        @endif
                    </div>

                    {{-- Ringkasan Kriteria --}}
                    <div class="card card-outline card-warning mb-0">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-list-alt mr-2"></i> Ringkasan Kriteria
                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/kriteria') }}" class="btn btn-sm btn-outline-warning">
                                    Kelola <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @forelse (App\Models\Kriteria::withCount('subKriteria')->orderBy('kode')->get() as $kriteria)
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2 px-3">
                                        <div>
                                            <span class="badge badge-secondary mr-2">{{ $kriteria->kode }}</span>
                                            <span class="font-weight-bold" style="font-size: 0.9rem;">{{ $kriteria->nama_kriteria }}</span>
                                        </div>
                                        <div class="d-flex align-items-center" style="gap: 6px;">
                                            <span class="badge {{ $kriteria->tipe_kriteria === 'Benefit' ? 'badge-success' : 'badge-danger' }}">
                                                {{ $kriteria->tipe_kriteria }}
                                            </span>
                                            <span class="badge badge-light border text-nowrap">
                                                {{ $kriteria->sub_kriteria_count }} sub
                                            </span>
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item text-center text-muted py-4">
                                        Belum ada kriteria.
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            {{-- /.row tabel terbaru --}}

        </div>
    </section>
</x-admin>
