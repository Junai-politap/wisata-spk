<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div>
                    <h1 class="mb-1">Data Sub Kriteria</h1>
                    <p class="text-muted mb-0">Kelola sub kriteria dan pembobotan nilai alternatif kriteria TOPSIS.</p>
                </div>
                <x-button.create-button url="admin/sub-kriteria/create" />
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle mr-1"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Sub Kriteria</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th style="width: 220px;">Aksi</th>
                                    <th>Kriteria Utama</th>
                                    <th>Nama Sub Kriteria</th>
                                    <th style="width: 80px;">Nilai</th>
                                    <th>Rentang Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_sub_kriteria as $sub_kriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <x-button.show-button url="admin/sub-kriteria" id="{{ $sub_kriteria->id }}" />
                                                <x-button.edit-button url="admin/sub-kriteria" id="{{ $sub_kriteria->id }}" />
                                                <x-button.delete-button url="admin/sub-kriteria" id="{{ $sub_kriteria->id }}" />
                                            </div>
                                        </td>
                                        <td>
                                            @if ($sub_kriteria->kriteria)
                                                <span class="badge badge-secondary font-weight-bold">{{ $sub_kriteria->kriteria->kode }}</span>
                                                {{ $sub_kriteria->kriteria->nama_kriteria }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $sub_kriteria->nama }}</td>
                                        <td>
                                            <span class="badge badge-primary px-2 py-1 font-weight-bold text-md">
                                                {{ $sub_kriteria->nilai }}
                                            </span>
                                        </td>
                                        <td>
                                            @php
                                                $tipe = $sub_kriteria->kriteria?->tipe_kriteria;
                                                $kode = $sub_kriteria->kriteria?->kode;
                                            @endphp
                                            @if ($tipe)
                                                <span class="badge {{ $tipe === 'Benefit' ? 'badge-success' : 'badge-danger' }} mr-1">
                                                    {{ $tipe === 'Benefit' ? '↑' : '↓' }} {{ $tipe }}
                                                </span>
                                            @endif
                                            {{ $sub_kriteria->rentang_format }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>
