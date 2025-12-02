document.addEventListener('DOMContentLoaded', function () {
    const soalUrl    = window.OSOCA.soalUrl;
    const container  = document.getElementById('soal-container');
    const INTERVAL_MS = 5000; // 5 detik

    let isLoading = false;

    function attachButtonHandler() {
        const btnRefresh = document.getElementById('btn-refresh-soal');
        if (btnRefresh) {
            btnRefresh.addEventListener('click', function (e) {
                e.preventDefault();
                loadSoal();
            });
        }
    }

    function loadSoal() {
        if (isLoading) return;
        isLoading = true;

        fetch(soalUrl, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            cache: 'no-store'
        })
        .then(response => response.json())
        .then(data => {
            if (data && data.html && container) {
                container.innerHTML = data.html;
                // setelah container diganti, tombol baru perlu di-bind lagi
                attachButtonHandler();
            }
        })
        .catch(err => {
            console.error('Error fetching soal:', err);
            // opsional tampilkan pesan error:
            // container.innerHTML = '<div class="alert alert-danger">Gagal memuat soal.</div>';
        })
        .finally(() => {
            isLoading = false;
        });
    }

    // Pertama kali: pasang handler tombol & jalanin interval
    attachButtonHandler();

    // Auto refresh tiap 5 detik
    setInterval(loadSoal, INTERVAL_MS);
});
