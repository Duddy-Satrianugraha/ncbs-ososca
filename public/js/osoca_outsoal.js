document.addEventListener('DOMContentLoaded', function () {
  const outUrl = window.OSOCA.outUrl;
  const POLL_MS = 10000;
  let ticking = false;
  let redirected = false;

  function pollOut() {
    if (ticking || redirected) return;
    ticking = true;

    fetch(outUrl, {
      method: 'GET',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      cache: 'no-store'
    })
      .then(async (res) => {
        if (res.status === 200) {
          const data = await res.json().catch(() => ({}));
          if (data && data.closed) {
            redirected = true;
            // Redirect normal agar session bisa dihapus di server
            window.location.href = outUrl;
          }
        }
      })
      .catch((e) => console.error('Polling error:', e))
      .finally(() => { ticking = false; });
  }

  pollOut();
  setInterval(pollOut, POLL_MS);
});

