<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/pengguna') }}">Data Pengguna</a></li>
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
                        <i class="fas fa-user mr-1"></i> Informasi Pengguna: {{ $pengguna->nama_pengguna }}
                    </h3>
                    <div class="card-tools">
                        <div class="btn-group" role="group">
                            <x-button.edit-button url="admin/pengguna" id="{{ $pengguna->id }}" />
                            <x-button.delete-button url="admin/pengguna" id="{{ $pengguna->id }}" />
                            <x-button.back-button url="admin/pengguna" />
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 mb-4 mb-md-0 text-center">
                            @if ($pengguna->poto)
                                <img src="{{ url("public/$pengguna->poto") }}"
                                    alt="{{ $pengguna->nama_pengguna }}"
                                    class="img-circle elevation-2"
                                    style="width: 160px; height: 160px; object-fit: cover;">
                            @else
                                <img src="{{ url('public/admin') }}/dist/img/user2-160x160.jpg"
                                    alt="Default Avatar"
                                    class="img-circle elevation-2"
                                    style="width: 160px; height: 160px; object-fit: cover;">
                            @endif
                            <h5 class="mt-3 font-weight-bold mb-1">{{ $pengguna->nama_pengguna }}</h5>
                            <p class="text-muted text-sm">{{ $pengguna->email }}</p>
                        </div>

                        <div class="col-md-8 col-lg-9">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Nama Pengguna</th>
                                        <td>
                                            <span class="font-weight-bold">{{ $pengguna->nama_pengguna }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Email</th>
                                        <td>
                                            <a href="mailto:{{ $pengguna->email }}">
                                                <i class="fas fa-envelope mr-1 text-primary"></i> {{ $pengguna->email }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No. Telepon / WhatsApp</th>
                                        <td>
                                            @if ($pengguna->no_telp)
                                                <i class="fas fa-phone mr-1 text-success"></i> {{ $pengguna->no_telp }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td style="white-space: pre-line;">{{ $pengguna->alamat ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Terdaftar</th>
                                        <td>{{ $pengguna->created_at ? $pengguna->created_at->translatedFormat('d F Y, H:i') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diperbarui</th>
                                        <td>{{ $pengguna->updated_at ? $pengguna->updated_at->translatedFormat('d F Y, H:i') : '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <x-button.back-button url="admin/pengguna" />
                    <div>
                        <x-button.edit-button url="admin/pengguna" id="{{ $pengguna->id }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>
