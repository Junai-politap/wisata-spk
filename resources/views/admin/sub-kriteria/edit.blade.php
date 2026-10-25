<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Sub Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/sub-kriteria') }}">Master Kriteria</a></li>
                        <li class="breadcrumb-item active">Edit Sub Kriteria</li>
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
                            <h3 class="card-title">Form Edit Sub Kriteria</h3>
                        </div>

                        <form action="{{ url('admin/sub-kriteria/' . $sub_kriteria->id) }}" method="POST">
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
                                    <label for="kriteria_id">Pilih Kriteria Utama</label>
                                    <select class="form-control @error('kriteria_id') is-invalid @enderror"
                                        id="kriteria_id" name="kriteria_id" required>
                                        <option value="">-- Pilih Kriteria --</option>
                                        @foreach ($list_kriteria as $kriteria)
                                            <option value="{{ $kriteria->id }}"
                                                {{ old('kriteria_id', $sub_kriteria->kriteria_id) === $kriteria->id ? 'selected' : '' }}>
                                                [{{ $kriteria->kode }}] {{ $kriteria->nama_kriteria }} ({{ $kriteria->tipe_kriteria }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kriteria_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Sub Kriteria</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama', $sub_kriteria->nama) }}"
                                        placeholder="Contoh: Sangat Murah, Rp 100.000 - Rp 250.000, Dekat" maxlength="100" required>
                                    @error('nama')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nilai">Nilai / Bobot Skor</label>
                                    <input type="number" step="1"
                                        class="form-control @error('nilai') is-invalid @enderror" id="nilai"
                                        name="nilai" value="{{ old('nilai', $sub_kriteria->nilai) }}"
                                        placeholder="Contoh: 1, 2, 3, 4, 5" required>
                                    <small class="form-text text-muted">Nilai bobot skala penilaian sub kriteria.</small>
                                    @error('nilai')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="min_range">Batas Minimal (Min Range)</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('min_range') is-invalid @enderror"
                                                id="min_range" name="min_range"
                                                value="{{ old('min_range', !is_null($sub_kriteria->min_range) ? (float) $sub_kriteria->min_range : '') }}"
                                                placeholder="Opsional, contoh: 100000">
                                            @error('min_range')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="max_range">Batas Maksimal (Max Range)</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('max_range') is-invalid @enderror"
                                                id="max_range" name="max_range"
                                                value="{{ old('max_range', !is_null($sub_kriteria->max_range) ? (float) $sub_kriteria->max_range : '') }}"
                                                placeholder="Opsional, contoh: 250000">
                                            @error('max_range')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ url('admin/sub-kriteria') }}" class="btn btn-default mr-2">Batal</a>
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
