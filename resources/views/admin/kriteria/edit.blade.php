<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/kriteria') }}">Master Kriteria</a></li>
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
                            <h3 class="card-title">Form Edit Kriteria</h3>
                        </div>

                        <form action="{{ url('admin/kriteria/' . $kriteria->id) }}" method="POST">
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
                                    <label for="kode">Kode Kriteria</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                        id="kode" name="kode" value="{{ old('kode', $kriteria->kode) }}"
                                        placeholder="Contoh: C1, C2, C3" maxlength="10" required>
                                    @error('kode')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_kriteria">Nama Kriteria</label>
                                    <input type="text"
                                        class="form-control @error('nama_kriteria') is-invalid @enderror"
                                        id="nama_kriteria" name="nama_kriteria"
                                        value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}"
                                        placeholder="Contoh: Harga Tiket, Fasilitas, Jarak / Aksesibilitas" required>
                                    @error('nama_kriteria')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tipe_kriteria">Tipe Kriteria</label>
                                    <select class="form-control @error('tipe_kriteria') is-invalid @enderror"
                                        id="tipe_kriteria" name="tipe_kriteria" required>
                                        <option value="Benefit"
                                            {{ old('tipe_kriteria', $kriteria->tipe_kriteria) === 'Benefit' ? 'selected' : '' }}>
                                            Benefit (Semakin besar nilainya semakin baik)
                                        </option>
                                        <option value="Cost"
                                            {{ old('tipe_kriteria', $kriteria->tipe_kriteria) === 'Cost' ? 'selected' : '' }}>
                                            Cost (Semakin kecil nilainya semakin baik)
                                        </option>
                                    </select>
                                    @error('tipe_kriteria')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bobot">Bobot Kriteria</label>
                                    <input type="number" step="0.01" min="0" max="100"
                                        class="form-control @error('bobot') is-invalid @enderror" id="bobot"
                                        name="bobot" value="{{ old('bobot', (float) $kriteria->bobot) }}"
                                        placeholder="Contoh: 25 atau 0.25" required>
                                    @error('bobot')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ url('admin/kriteria') }}" class="btn btn-default mr-2">Batal</a>
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
</x-admin>
