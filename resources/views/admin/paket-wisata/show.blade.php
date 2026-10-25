<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Paket Wisata</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/paket-wisata') }}">Paket Wisata</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle mr-1"></i> Informasi Paket: {{ $paket_wisata->nama_paket }}
                    </h3>
                    <div class="card-tools">
                        <div class="btn-group" role="group">
                            <x-button.edit-button url="admin/paket-wisata" id="{{ $paket_wisata->id }}" />
                            <x-button.delete-button url="admin/paket-wisata" id="{{ $paket_wisata->id }}" />
                            <x-button.back-button url="admin/paket-wisata" />
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 col-lg-4 mb-4 mb-md-0 text-center">
                            @if ($paket_wisata->poto)
                                <img src="{{ url("public/$paket_wisata->poto") }}"
                                    onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTwtYMjdu_ANbSA4judVJlam9OON9Ml3iszB2fmnTaxkYK1v3bMFtLl14i&s=10';"
                                    alt="{{ $paket_wisata->nama_paket }}"
                                    class="img-fluid rounded shadow-sm border"
                                    style="width: 100%; max-height: 380px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex flex-column align-items-center justify-content-center rounded border p-5 text-muted"
                                    style="min-height: 250px;">
                                    <i class="fas fa-image fa-4x mb-2"></i>
                                    <span>Tidak ada foto tersedia</span>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-7 col-lg-8">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 25%;">Nama Paket</th>
                                        <td>
                                            <span class="font-weight-bold text-lg">{{ $paket_wisata->nama_paket }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi</th>
                                        <td>
                                            <i class="fas fa-map-marker-alt text-danger mr-1"></i>
                                            {{ $paket_wisata->lokasi ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>
                                            <span class="text-success font-weight-bold text-lg">
                                                Rp {{ number_format((float) $paket_wisata->harga, 0, ',', '.') }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Durasi Perjalanan</th>
                                        <td>
                                            <i class="fas fa-clock text-info mr-1"></i>
                                            {{ $paket_wisata->durasi_perjalanan }} Hari
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Destinasi</th>
                                        <td>
                                            <i class="fas fa-map-marked-alt text-primary mr-1"></i>
                                            {{ $paket_wisata->jumlah_destinasi }} Destinasi
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Rating</th>
                                        <td>
                                            @php
                                                $rating = (float) $paket_wisata->rating;
                                                $roundedRating = (int) round($rating);
                                            @endphp
                                            <span class="text-nowrap" role="img" aria-label="Rating {{ $rating }} dari 5">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= $roundedRating ? 'text-warning' : 'text-muted' }}"></i>
                                                @endfor
                                                <span class="badge badge-warning ml-2 font-weight-bold">
                                                    {{ number_format($rating, 1) }} / 5.0
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td style="white-space: pre-line;">{{ $paket_wisata->deskripsi ?: 'Tidak ada deskripsi.' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Dibuat</th>
                                        <td>{{ $paket_wisata->created_at ? $paket_wisata->created_at->translatedFormat('d F Y, H:i') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diperbarui</th>
                                        <td>{{ $paket_wisata->updated_at ? $paket_wisata->updated_at->translatedFormat('d F Y, H:i') : '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <x-button.back-button url="admin/paket-wisata" />
                    <div>
                        <x-button.edit-button url="admin/paket-wisata" id="{{ $paket_wisata->id }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>
