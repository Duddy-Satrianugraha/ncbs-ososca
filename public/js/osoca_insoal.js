document.addEventListener('DOMContentLoaded', function () {
  const inUrl = window.OSOCA.inUrl;
  const POLL_MS = 5000;
  let ticking = false;
  let redirected = false;

  function pollIn() {
    if (ticking || redirected) return;
    ticking = true;

    fetch(inUrl, {
      method: 'GET',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      cache: 'no-store'
    })
      .then(async (res) => {
        if (res.status === 200) {
          const data = await res.json().catch(() => ({}));
          if (data && data.open) {
            redirected = true;
            // lakukan normal navigation agar controller set session & redirect ke soal
            window.location.href = inUrl;
          }
        }
        // 204 = belum open → diam
      })
      .catch((e) => console.error('Polling error:', e))
      .finally(() => { ticking = false; });
  }

  // jalankan awal & per 20 detik
  pollIn();
  setInterval(pollIn, POLL_MS);
});

