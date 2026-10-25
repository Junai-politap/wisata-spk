<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/kriteria') }}">Master Kriteria</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Kriteria</h3>
                        </div>

                        <form action="{{ url('admin/kriteria') }}" method="POST">
                            @csrf

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
                                        id="kode" name="kode" value="{{ old('kode') }}"
                                        placeholder="Contoh: C1, C2, C3" maxlength="10" required>
                                    <small class="form-text text-muted">Kode pengenal kriteria untuk perhitungan TOPSIS.</small>
                                    @error('kode')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_kriteria">Nama Kriteria</label>
                                    <input type="text"
                                        class="form-control @error('nama_kriteria') is-invalid @enderror"
                                        id="nama_kriteria" name="nama_kriteria" value="{{ old('nama_kriteria') }}"
                                        placeholder="Contoh: Harga Tiket, Fasilitas, Jarak / Aksesibilitas" required>
                                    @error('nama_kriteria')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tipe_kriteria">Tipe Kriteria</label>
                                    <select class="form-control @error('tipe_kriteria') is-invalid @enderror"
                                        id="tipe_kriteria" name="tipe_kriteria" required>
                                        <option value="">-- Pilih Tipe Kriteria --</option>
                                        <option value="Benefit" {{ old('tipe_kriteria') === 'Benefit' ? 'selected' : '' }}>
                                            Benefit (Semakin besar nilainya semakin baik)
                                        </option>
                                        <option value="Cost" {{ old('tipe_kriteria') === 'Cost' ? 'selected' : '' }}>
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
                                        name="bobot" value="{{ old('bobot') }}" placeholder="Contoh: 25 atau 0.25"
                                        required>
                                    <small class="form-text text-muted">Nilai bobot kriteria dalam skala TOPSIS.</small>
                                    @error('bobot')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ url('admin/kriteria') }}" class="btn btn-default mr-2">Batal</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> Simpan Kriteria
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>
