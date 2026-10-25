document.addEventListener('DOMContentLoaded', function () {
    const section = document.querySelector('[data-nearby-endpoint]');

    if (!section) {
        return;
    }

    const endpoint = section.dataset.nearbyEndpoint;
    const areaInput = document.getElementById('nearby-area');
    const areaButton = document.getElementById('find-nearby-area');
    const locationButton = document.getElementById('find-nearby');
    const status = document.getElementById('nearby-status');
    const results = document.getElementById('nearby-results');
    const buttons = [areaButton, locationButton];

    function setBusy(isBusy) {
        buttons.forEach(function (button) {
            button.disabled = isBusy;
        });
    }

    function renderRecommendations(packages) {
        results.replaceChildren();

        packages.forEach(function (packageData) {
            const column = document.createElement('div');
            column.className = 'col-lg-4 col-md-6';

            const card = document.createElement('article');
            card.className = 'travel-card';

            if (packageData.image_url) {
                const image = document.createElement('img');
                image.className = 'travel-card-image';
                image.src = packageData.image_url;
                image.alt = packageData.nama_paket;
                image.onerror = function () {
                    this.onerror = null;
                    this.src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTwtYMjdu_ANbSA4judVJlam9OON9Ml3iszB2fmnTaxkYK1v3bMFtLl14i&s=10';
                };
                card.appendChild(image);
            } else {
                const placeholder = document.createElement('div');
                placeholder.className = 'travel-card-placeholder';
                placeholder.innerHTML = '<i class="bi bi-image" aria-hidden="true"></i>';
                card.appendChild(placeholder);
            }

            const body = document.createElement('div');
            body.className = 'p-4';

            const badges = document.createElement('div');
            badges.className = 'd-flex flex-wrap justify-content-between align-items-center gap-2 mb-3';

            const rank = document.createElement('span');
            rank.className = 'badge text-bg-primary rounded-pill px-3 py-2';
            rank.textContent = 'Peringkat #' + packageData.peringkat;

            const score = document.createElement('span');
            score.className = 'score-pill';
            score.textContent = 'Skor SPK ' + Number(packageData.score).toFixed(4);

            badges.append(rank, score);

            const title = document.createElement('h3');
            title.className = 'h5 fw-bold mb-2';
            title.textContent = packageData.nama_paket;

            const location = document.createElement('p');
            location.className = 'text-secondary mb-3';
            location.textContent = packageData.lokasi;

            const distance = document.createElement('p');
            distance.className = 'small text-primary fw-semibold mb-2';
            distance.textContent = 'Jarak garis lurus: ' + Number(packageData.distance_km).toLocaleString('id-ID', {
                minimumFractionDigits: 1,
                maximumFractionDigits: 1,
            }) + ' km';

            const details = document.createElement('p');
            details.className = 'small text-secondary mb-4';
            details.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(packageData.harga)
                + ' · ' + packageData.durasi_perjalanan + ' hari · '
                + packageData.jumlah_destinasi + ' destinasi';

            const link = document.createElement('a');
            link.className = 'btn btn-outline-primary w-100';
            link.href = packageData.detail_url;
            link.textContent = 'Lihat Detail';

            body.append(badges, title, location, distance, details, link);
            card.appendChild(body);
            column.appendChild(card);
            results.appendChild(column);
        });
    }

    async function requestRecommendations(payload) {
        results.replaceChildren();
        status.textContent = 'Menghitung rekomendasi TOPSIS berdasarkan lokasi...';
        setBusy(true);

        try {
            const response = await fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(payload),
            });
            const responseData = await response.json();

            if (!response.ok) {
                throw new Error(responseData.message || 'Perhitungan gagal. Silakan coba lagi.');
            }

            if (responseData.length === 0) {
                status.textContent = 'Belum ada paket wisata dengan koordinat dan data kriteria yang lengkap.';
                return;
            }

            status.textContent = 'Hasil TOPSIS diurutkan berdasarkan skor. Jarak menjadi 25% dari bobot perhitungan.';
            renderRecommendations(responseData);
        } catch (error) {
            status.textContent = error.message || 'Terjadi kendala saat menghitung rekomendasi.';
        } finally {
            setBusy(false);
        }
    }

    areaButton.addEventListener('click', function () {
        const area = areaInput.value.trim();

        if (!area) {
            status.textContent = 'Pilih atau masukkan daerah dari lokasi paket yang tersedia.';
            areaInput.focus();
            return;
        }

        requestRecommendations({ area: area });
    });

    locationButton.addEventListener('click', function () {
        results.replaceChildren();

        if (!window.isSecureContext) {
            status.textContent = 'Browser hanya mengizinkan akses lokasi melalui HTTPS atau localhost.';
            return;
        }

        if (!navigator.geolocation) {
            status.textContent = 'Browser ini belum mendukung fitur lokasi.';
            return;
        }

        status.textContent = 'Meminta izin lokasi dari browser...';
        setBusy(true);

        navigator.geolocation.getCurrentPosition(function (position) {
            requestRecommendations({
                latitude: position.coords.latitude,
                longitude: position.coords.longitude,
            });
        }, function (error) {
            const messages = {
                1: 'Izin lokasi belum diberikan. Izinkan akses lokasi di browser untuk menggunakan GPS.',
                2: 'Lokasi Anda belum dapat ditemukan. Periksa GPS atau koneksi perangkat, lalu coba lagi.',
                3: 'Pencarian lokasi terlalu lama. Silakan coba lagi.',
            };

            status.textContent = messages[error.code] || 'Lokasi tidak dapat diakses.';
            setBusy(false);
        }, { enableHighAccuracy: true, timeout: 15000, maximumAge: 60000 });
    });
});
