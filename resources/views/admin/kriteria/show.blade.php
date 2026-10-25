<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/kriteria') }}">Master Kriteria</a></li>
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
                        <i class="fas fa-info-circle mr-1"></i> Informasi Kriteria: {{ $kriteria->kode }} - {{ $kriteria->nama_kriteria }}
                    </h3>
                    <div class="card-tools">
                        <div class="btn-group" role="group">
                            <x-button.edit-button url="admin/kriteria" id="{{ $kriteria->id }}" />
                            <x-button.delete-button url="admin/kriteria" id="{{ $kriteria->id }}" />
                            <x-button.back-button url="admin/kriteria" />
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 25%;">Kode Kriteria</th>
                                <td>
                                    <span class="badge badge-secondary px-3 py-2 text-md font-weight-bold">
                                        {{ $kriteria->kode }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Kriteria</th>
                                <td>
                                    <span class="font-weight-bold text-lg">{{ $kriteria->nama_kriteria }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Kriteria</th>
                                <td>
                                    @if ($kriteria->tipe_kriteria === 'Benefit')
                                        <span class="badge badge-success px-3 py-2">
                                            <i class="fas fa-arrow-up mr-1"></i> Benefit (Keuntungan)
                                        </span>
                                        <small class="text-muted ml-2">Semakin tinggi nilainya, semakin baik alternatif tersebut.</small>
                                    @else
                                        <span class="badge badge-danger px-3 py-2">
                                            <i class="fas fa-arrow-down mr-1"></i> Cost (Biaya)
                                        </span>
                                        <small class="text-muted ml-2">Semakin rendah nilainya, semakin baik alternatif tersebut.</small>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Bobot</th>
                                <td>
                                    <span class="font-weight-bold text-lg text-primary">
                                        {{ (float) $kriteria->bobot }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Dibuat</th>
                                <td>{{ $kriteria->created_at ? $kriteria->created_at->translatedFormat('d F Y, H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diperbarui</th>
                                <td>{{ $kriteria->updated_at ? $kriteria->updated_at->translatedFormat('d F Y, H:i') : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <x-button.back-button url="admin/kriteria" />
                    <div>
                        <x-button.edit-button url="admin/kriteria" id="{{ $kriteria->id }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>
