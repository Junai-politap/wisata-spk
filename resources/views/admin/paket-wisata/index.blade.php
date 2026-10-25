<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div>
                    <h1 class="mb-1">Paket Wisata</h1>
                    <p class="text-muted mb-0">Kelola data paket wisata yang tersedia.</p>
                </div>
                <x-button.create-button url="admin/paket-wisata/create" />
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
                    <h3 class="card-title">Daftar Paket Wisata</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th style="width: 220px;">Aksi</th>
                                    <th>Nama Paket</th>
                                    <th>Lokasi</th>
                                    <th>Harga</th>
                                    <th>Rating</th>
                                    <th>Poto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_paket_wisata as $paket_wisata)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <x-button.show-button url="admin/paket-wisata"
                                                    id="{{ $paket_wisata->id }}" />
                                                <x-button.edit-button url="admin/paket-wisata"
                                                    id="{{ $paket_wisata->id }}" />
                                                <x-button.delete-button url="admin/paket-wisata"
                                                    id="{{ $paket_wisata->id }}" />
                                            </div>
                                        </td>
                                        <td>{{ $paket_wisata->nama_paket }}</td>
                                        <td>{{ $paket_wisata->lokasi ?? '-' }}</td>
                                        <td>Rp. {{ number_format($paket_wisata->harga, 0, ',', '.') }}</td>
                                        <td>{{ $paket_wisata->rating }}</td>
                                        <td>
                                            @if ($paket_wisata->poto)
                                                <img src="{{ url("public/$paket_wisata->poto") }}"
                                                    onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTwtYMjdu_ANbSA4judVJlam9OON9Ml3iszB2fmnTaxkYK1v3bMFtLl14i&s=10';"
                                                    alt="{{ $paket_wisata->nama_paket }}" width="100"
                                                    class="img-thumbnail">
                                            @else
                                                <span class="text-muted">Tidak ada poto</span>
                                            @endif
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.table-responsive table, .card table').forEach(function(table) {
                const headers = Array.from(table.querySelectorAll('thead th'));
                const ratingIndex = headers.findIndex(function(header) {
                    return /rating|bintang/i.test(header.textContent.trim());
                });

                if (ratingIndex === -1) return;

                table.querySelectorAll('tbody tr').forEach(function(row) {
                    const cell = row.cells[ratingIndex];
                    if (!cell) return;

                    const rating = Number((cell.textContent.match(/[0-5](?:[.,]\d+)?/) || [])[0]
                        ?.replace(',', '.'));
                    if (!Number.isFinite(rating)) return;

                    const roundedRating = Math.max(0, Math.min(5, Math.round(rating)));
                    cell.innerHTML = '<span class="text-nowrap" role="img" aria-label="Rating ' +
                        rating + ' dari 5">' +
                        Array.from({
                            length: 5
                        }, function(_, index) {
                            return '<i class="fas fa-star ' + (index < roundedRating ?
                                'text-warning' : 'text-muted') + '" aria-hidden="true"></i>';
                        }).join('') +
                        '<small class="text-muted ml-1">' + rating + '/5</small></span>';
                });
            });
        });
    </script>
</x-admin>
