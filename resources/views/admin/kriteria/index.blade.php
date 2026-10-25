<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div>
                    <h1 class="mb-1">Data Kriteria</h1>
                    <p class="text-muted mb-0">Kelola kriteria penilaian keputusan rekomendasi tempat wisata (TOPSIS).</p>
                </div>
                <x-button.create-button url="admin/kriteria/create" />
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
                    <h3 class="card-title">Daftar Kriteria</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th style="width: 220px;">Aksi</th>
                                    <th style="width: 100px;">Kode</th>
                                    <th>Nama Kriteria</th>
                                    <th style="width: 130px;">Tipe Kriteria</th>
                                    <th style="width: 120px;">Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_kriteria as $kriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <x-button.show-button url="admin/kriteria" id="{{ $kriteria->id }}" />
                                                <x-button.edit-button url="admin/kriteria" id="{{ $kriteria->id }}" />
                                                <x-button.delete-button url="admin/kriteria" id="{{ $kriteria->id }}" />
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-secondary px-2 py-1 font-weight-bold">{{ $kriteria->kode }}</span>
                                        </td>
                                        <td>{{ $kriteria->nama_kriteria }}</td>
                                        <td>
                                            @if ($kriteria->tipe_kriteria === 'Benefit')
                                                <span class="badge badge-success px-2 py-1">
                                                    <i class="fas fa-arrow-up mr-1"></i> Benefit
                                                </span>
                                            @else
                                                <span class="badge badge-danger px-2 py-1">
                                                    <i class="fas fa-arrow-down mr-1"></i> Cost
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="font-weight-bold">{{ (float) $kriteria->bobot }}</span>
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
