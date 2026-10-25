<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Paket Wisata</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/paket-wisata') }}">Paket Wisata</a></li>
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
                            <h3 class="card-title">Form Edit Paket Wisata</h3>
                        </div>

                        <form action="{{ url('admin/paket-wisata/' . $paket_wisata->id) }}" method="POST"
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
                                    <label for="nama_paket">Nama Paket</label>
                                    <input type="text"
                                        class="form-control @error('nama_paket') is-invalid @enderror"
                                        id="nama_paket" name="nama_paket"
                                        value="{{ old('nama_paket', $paket_wisata->nama_paket) }}"
                                        placeholder="Contoh: Paket Wisata Pantai" required>
                                    @error('nama_paket')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text"
                                        class="form-control @error('lokasi') is-invalid @enderror"
                                        id="lokasi" name="lokasi"
                                        value="{{ old('lokasi', $paket_wisata->lokasi) }}"
                                        placeholder="Masukkan lokasi wisata" required>
                                    @error('lokasi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                        <input type="number" min="0" step="1"
                                            class="form-control @error('harga') is-invalid @enderror" id="harga"
                                            name="harga"
                                            value="{{ old('harga', (int) $paket_wisata->harga) }}"
                                            placeholder="0" required>
                                    </div>
                                    @error('harga')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="durasi_perjalanan">Durasi Perjalanan (Hari)</label>
                                            <div class="input-group">
                                                <input type="number" min="1" step="1"
                                                    class="form-control @error('durasi_perjalanan') is-invalid @enderror"
                                                    id="durasi_perjalanan" name="durasi_perjalanan"
                                                    value="{{ old('durasi_perjalanan', $paket_wisata->durasi_perjalanan) }}"
                                                    placeholder="Contoh: 3" required>
                                                <div class="input-group-append"><span class="input-group-text">Hari</span></div>
                                            </div>
                                            @error('durasi_perjalanan')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah_destinasi">Jumlah Destinasi</label>
                                            <div class="input-group">
                                                <input type="number" min="1" step="1"
                                                    class="form-control @error('jumlah_destinasi') is-invalid @enderror"
                                                    id="jumlah_destinasi" name="jumlah_destinasi"
                                                    value="{{ old('jumlah_destinasi', $paket_wisata->jumlah_destinasi) }}"
                                                    placeholder="Contoh: 5" required>
                                                <div class="input-group-append"><span class="input-group-text">Destinasi</span></div>
                                            </div>
                                            @error('jumlah_destinasi')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <input type="text"
                                        class="form-control @error('rating') is-invalid @enderror"
                                        id="rating" name="rating"
                                        value="{{ old('rating', $paket_wisata->rating) }}"
                                        placeholder="Contoh: 4.5">
                                    @error('rating')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-0">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4"
                                        placeholder="Jelaskan informasi paket wisata">{{ old('deskripsi', $paket_wisata->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label for="poto">Poto Paket Wisata</label>
                                    @if ($paket_wisata->poto)
                                        <div class="mb-2">
                                            <span class="d-block text-muted text-sm mb-1">Foto Saat Ini:</span>
                                            <img src="{{ url("public/$paket_wisata->poto") }}"
                                                onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTwtYMjdu_ANbSA4judVJlam9OON9Ml3iszB2fmnTaxkYK1v3bMFtLl14i&s=10';"
                                                alt="{{ $paket_wisata->nama_paket }}"
                                                class="img-thumbnail"
                                                style="max-width: 250px; max-height: 180px; object-fit: cover;">
                                        </div>
                                    @endif

                                    <div>
                                        <input type="file"
                                            class="form-control @error('poto') is-invalid @enderror"
                                            id="poto" name="poto" accept=".jpg,.jpeg,.png,.webp"
                                            onchange="previewFotoPaketWisata(event)">
                                        <div class="mt-3">
                                            <img id="preview-poto" src="#" alt="Pratinjau foto baru"
                                                class="img-thumbnail d-none"
                                                style="max-width: 320px; max-height: 220px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto. Pilih foto (JPG, JPEG, PNG, atau WEBP).</small>
                                    @error('poto')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ url('admin/paket-wisata') }}" class="btn btn-default mr-2">Batal</a>
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
        function previewFotoPaketWisata(event) {
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ratingField = Array.from(document.querySelectorAll('input, select')).find(function(field) {
                const label = field.labels ? Array.from(field.labels).map(label => label.textContent).join(
                    ' ') : '';
                return /rating|bintang/i.test([field.name, field.id, label].join(' '));
            });

            if (!ratingField) return;

            const ratingContainer = document.createElement('div');
            ratingContainer.className = 'd-flex align-items-center mt-2';
            ratingContainer.setAttribute('role', 'group');
            ratingContainer.setAttribute('aria-label', 'Pilih rating dari 1 sampai 5 bintang');

            const currentValue = Math.round(Number(ratingField.value)) || 0;
            const buttons = [];
            for (let value = 1; value <= 5; value++) {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'btn btn-link p-0 mr-1';
                button.style.fontSize = '1.6rem';
                button.setAttribute('aria-label', value + ' bintang');
                button.setAttribute('aria-pressed', value === currentValue ? 'true' : 'false');
                button.innerHTML = '<i class="fas fa-star ' + (value <= currentValue ? 'text-warning' :
                    'text-muted') + '"></i>';
                button.addEventListener('click', function() {
                    ratingField.value = value;
                    ratingField.dispatchEvent(new Event('input', {
                        bubbles: true
                    }));
                    ratingField.dispatchEvent(new Event('change', {
                        bubbles: true
                    }));
                    buttons.forEach(function(star, index) {
                        star.setAttribute('aria-pressed', index < value ? 'true' : 'false');
                        star.querySelector('i').classList.toggle('text-warning', index < value);
                        star.querySelector('i').classList.toggle('text-muted', index >= value);
                    });
                });
                buttons.push(button);
                ratingContainer.appendChild(button);
            }

            ratingField.classList.add('d-none');
            ratingField.insertAdjacentElement('afterend', ratingContainer);
        });
    </script>
</x-admin>
