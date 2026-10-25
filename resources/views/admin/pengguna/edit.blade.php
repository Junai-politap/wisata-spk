<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/pengguna') }}">Data Pengguna</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Pengguna</h3>
                        </div>

                        <form action="{{ url('admin/pengguna/' . $pengguna->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Data belum dapat disimpan.</strong>
                                        <ul class="mb-0 mt-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="nama_pengguna">Nama Pengguna</label>
                                    <input type="text"
                                        class="form-control @error('nama_pengguna') is-invalid @enderror"
                                        id="nama_pengguna" name="nama_pengguna"
                                        value="{{ old('nama_pengguna', $pengguna->nama_pengguna) }}"
                                        placeholder="Masukkan nama pengguna" required>
                                    @error('nama_pengguna')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $pengguna->email) }}"
                                        placeholder="nama@contoh.com" required>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password saat ini.</small>
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_telp">No. Telepon / WhatsApp</label>
                                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                        id="no_telp" name="no_telp"
                                        value="{{ old('no_telp', $pengguna->no_telp) }}"
                                        placeholder="Contoh: 08123456789">
                                    @error('no_telp')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                        placeholder="Masukkan alamat lengkap">{{ old('alamat', $pengguna->alamat) }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="poto">Foto Profil</label>
                                    @if ($pengguna->poto)
                                        <div class="mb-2">
                                            <span class="d-block text-muted text-sm mb-1">Foto Saat Ini:</span>
                                            <img src="{{ url("public/$pengguna->poto") }}"
                                                alt="{{ $pengguna->nama_pengguna }}"
                                                class="img-circle elevation-1"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                    @endif

                                    <div>
                                        <input type="file"
                                            class="form-control @error('poto') is-invalid @enderror"
                                            id="poto" name="poto" accept=".jpg,.jpeg,.png,.webp"
                                            onchange="previewFotoPengguna(event)">
                                        <div class="mt-3">
                                            <img id="preview-poto" src="#" alt="Pratinjau foto baru"
                                                class="img-circle elevation-1 d-none"
                                                style="width: 120px; height: 120px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto. Format: JPG, JPEG, PNG, WEBP.</small>
                                    @error('poto')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ url('admin/pengguna') }}" class="btn btn-default mr-2">Batal</a>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function previewFotoPengguna(event) {
            const input = event.target;
            const preview = document.getElementById('preview-poto');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(input.files[0]);

                if (input.form) {
                    input.form.enctype = 'multipart/form-data';
                }
            } else {
                preview.src = '#';
                preview.classList.add('d-none');
            }
        }
    </script>
</x-admin>
