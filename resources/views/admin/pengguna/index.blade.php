<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div>
                    <h1 class="mb-1">Data Pengguna</h1>
                    <p class="text-muted mb-0">Kelola data pengguna sistem rekomendasi tempat wisata.</p>
                </div>
                <x-button.create-button url="admin/pengguna/create" />
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
                    <h3 class="card-title">Daftar Pengguna</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th style="width: 220px;">Aksi</th>
                                    <th style="width: 80px;">Poto</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_pengguna as $pengguna)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <x-button.show-button url="admin/pengguna" id="{{ $pengguna->id }}" />
                                                <x-button.edit-button url="admin/pengguna" id="{{ $pengguna->id }}" />
                                                <x-button.delete-button url="admin/pengguna" id="{{ $pengguna->id }}" />
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if ($pengguna->poto)
                                                <img src="{{ url("public/$pengguna->poto") }}"
                                                    alt="{{ $pengguna->nama_pengguna }}" width="50" height="50"
                                                    onerror="this.onerror=null; this.src='https://img.icons8.com/stickers/1200/user.jpg';"
                                                    class="img-circle elevation-1" style="object-fit: cover;">
                            
                                            @endif
                                        </td>
                                        <td>{{ $pengguna->nama_pengguna }}</td>
                                        <td>{{ $pengguna->email }}</td>
                                        <td>{{ $pengguna->no_telp ?? '-' }}</td>
                                        <td>{{ $pengguna->alamat ?? '-' }}</td>
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
