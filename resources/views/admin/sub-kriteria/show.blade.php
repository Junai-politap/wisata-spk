<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Sub Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/sub-kriteria') }}">Master Kriteria</a></li>
                        <li class="breadcrumb-item active">Detail Sub Kriteria</li>
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
                        <i class="fas fa-info-circle mr-1"></i> Informasi Sub Kriteria: {{ $sub_kriteria->nama }}
                    </h3>
                    <div class="card-tools">
                        <div class="btn-group" role="group">
                            <x-button.edit-button url="admin/sub-kriteria" id="{{ $sub_kriteria->id }}" />
                            <x-button.delete-button url="admin/sub-kriteria" id="{{ $sub_kriteria->id }}" />
                            <x-button.back-button url="admin/sub-kriteria" />
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 25%;">Kriteria Utama</th>
                                <td>
                                    @if ($sub_kriteria->kriteria)
                                        <span class="badge badge-secondary px-2 py-1 font-weight-bold">
                                            {{ $sub_kriteria->kriteria->kode }}
                                        </span>
                                        <span class="font-weight-bold text-md ml-1">
                                            {{ $sub_kriteria->kriteria->nama_kriteria }}
                                        </span>
                                        <span class="badge {{ $sub_kriteria->kriteria->tipe_kriteria === 'Benefit' ? 'badge-success' : 'badge-danger' }} ml-1">
                                            {{ $sub_kriteria->kriteria->tipe_kriteria }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Sub Kriteria</th>
                                <td>
                                    <span class="font-weight-bold text-lg">{{ $sub_kriteria->nama }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Nilai / Bobot Skor</th>
                                <td>
                                    <span class="badge badge-primary px-3 py-2 text-md font-weight-bold">
                                        {{ $sub_kriteria->nilai }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Rentang Nilai</th>
                                <td>
                                    @if (!is_null($sub_kriteria->min_range) || !is_null($sub_kriteria->max_range))
                                        @if (!is_null($sub_kriteria->min_range) && !is_null($sub_kriteria->max_range))
                                            {{ (float) $sub_kriteria->min_range }} s/d {{ (float) $sub_kriteria->max_range }}
                                        @elseif (!is_null($sub_kriteria->min_range))
                                            &ge; {{ (float) $sub_kriteria->min_range }}
                                        @else
                                            &le; {{ (float) $sub_kriteria->max_range }}
                                        @endif
                                    @else
                                        <span class="text-muted">Tidak memiliki batas rentang numerik</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Dibuat</th>
                                <td>{{ $sub_kriteria->created_at ? $sub_kriteria->created_at->translatedFormat('d F Y, H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diperbarui</th>
                                <td>{{ $sub_kriteria->updated_at ? $sub_kriteria->updated_at->translatedFormat('d F Y, H:i') : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <x-button.back-button url="admin/sub-kriteria" />
                    <div>
                        <x-button.edit-button url="admin/sub-kriteria" id="{{ $sub_kriteria->id }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>
