# Panduan Pengembangan CBS OSOCA

## Tujuan dan cakupan

Dokumen ini menjadi panduan bagi pengembang dan agen coding yang bekerja pada repository CBS OSOCA. Jalankan perintah dari root repository, kecuali disebutkan lain. Utamakan perubahan kecil yang dapat ditinjau dan mengikuti pola modul yang sedang diubah.

File ini berada di `docs/AGENTS.md`: penemuan otomatis instruksi AGENTS biasanya mengikuti direktori tempat file berada. Untuk pekerjaan di `app/`, `routes/`, dan direktori lainnya, baca atau rujuk dokumen ini secara eksplisit; lokasinya tidak menjadikannya instruksi otomatis untuk seluruh repository.

## Teknologi dan struktur

- Backend: PHP `^8.2`, Laravel `^11.31`, Eloquent, dan Laravel Fortify. Gunakan `composer.lock` sebagai acuan versi yang terpasang.
- Database pengembangan: MySQL 8 melalui Laravel Sail.
- UI: Blade dengan aset Bootstrap, jQuery, dan plugin di `public/`. Vite 6 dan Tailwind CSS 3 juga dikonfigurasi; periksa layout yang digunakan sebelum memilih jalur perubahan aset.
- Dokumen dan pertukaran data: Dompdf, Laravel Excel, QR Code, Intervention Image, serta impor arsip menggunakan `ZipArchive`.
- Pengujian: PHPUnit 11; pemformatan PHP: Laravel Pint.

| Lokasi | Tanggung jawab |
| --- | --- |
| `routes/web.php` | Route web, nama route, kelompok akses admin, peserta, OSOCA, dan PBL |
| `bootstrap/app.php` | Bootstrap Laravel 11, route, middleware global `Power` dan `TrustProxies` |
| `app/Http/Controllers/` | Alur OSOCA, administrasi, peserta, nilai, media, PDF, dan impor |
| `app/Http/Controllers/pbl/` | Kegiatan, mininotes, tutor, penilaian, berita acara, dan impor PBL |
| `app/Http/Middleware/` | Pemeriksaan role dan sesi khusus tiap alur |
| `app/Models/` | Model, relasi, atribut yang dapat diisi, dan cast |
| `app/Actions/Fortify/`, `app/Providers/` | Login, registrasi, pengaturan Fortify, dan otorisasi aplikasi |
| `app/Actions/helper.php` | Helper global melalui Composer autoload: CAPTCHA, tanggal, waktu, dan utilitas |
| `app/Imports/`, `app/Exports/` | Impor peserta dan ekspor nilai |
| `resources/views/` | Template Blade; periksa layout dan include yang dipakai halaman |
| `resources/js/`, `resources/css/`, `vite.config.js` | Sumber aset Vite |
| `public/css/`, `public/js/` | Aset yang langsung dirujuk layout lama melalui `asset()` |
| `database/migrations/`, `database/seeders/` | Skema dan seed data; `oldseed/` berisi seeder lama |
| `tests/`, `phpunit.xml` | Unit test, feature test, dan konfigurasi lingkungan tes |

README saat ini masih didominasi template Laravel. Gunakan implementasi, manifest dependency, dan konfigurasi repository untuk memastikan perilaku aktual.

## Setup lokal dengan Docker dan Laravel Sail

Runtime pengembangan proyek ini menggunakan Docker dan Laravel Sail. Jalankan Composer, Artisan, PHP, npm, tes, dan formatter melalui `./vendor/bin/sail` agar versi runtime dan ekstensi konsisten dengan container. Perintah Git dan Docker dijalankan dari host. Pastikan Docker Engine dan Docker Compose tersedia serta daemon Docker aktif.

1. Pastikan dependency PHP tersedia sehingga `./vendor/bin/sail` dapat dijalankan. Jika `vendor/` belum ada, bootstrap dependency menggunakan container Composer yang kompatibel dengan PHP 8.2 dan kebutuhan ekstensi pada `composer.lock`; konfigurasi build Sail merujuk file dalam `vendor/laravel/sail`. Setelah container aktif, gunakan `./vendor/bin/sail composer install` untuk instalasi rutin. Repository saat ini belum memiliki lockfile npm. Jangan menjalankan `composer update` untuk setup rutin.
2. Buat `.env` dari `.env.example` hanya jika `.env` belum ada. Atur kredensial lokal sendiri; jangan menyalin token contoh sebagai kredensial aktif atau memasukkannya ke dokumentasi.
3. Pastikan external network `sail-network` tersedia (`docker network inspect sail-network`; bila belum ada, `docker network create sail-network`). Compose menggunakan network ini bersama layanan lain.
4. Jalankan `./vendor/bin/sail up -d`, lalu `./vendor/bin/sail artisan key:generate` hanya untuk lingkungan baru yang belum memiliki `APP_KEY`.
5. Setelah memastikan koneksi mengarah ke database pengembangan yang benar, jalankan `./vendor/bin/sail artisan migrate`. Jangan otomatis menjalankan seed penuh.
6. Jalankan `./vendor/bin/sail artisan storage:link` bila halaman membutuhkan file pada disk `public`.
7. Instal dependency frontend dengan `./vendor/bin/sail npm install`. Jalankan `./vendor/bin/sail npm run dev` untuk aset Vite, atau `./vendor/bin/sail npm run build` untuk build.

Konfigurasi Sail yang perlu diperhatikan:

- Aplikasi dipetakan ke `http://localhost:81`.
- Host MySQL dari container adalah `mysqly:3306`; dari host gunakan port `FORWARD_DB_PORT` (default `33062`).
- Layanan SMTP bernama `mailpity`, port internal `1025`, dashboard host default `8125`. `.env.example` memakai `MAIL_HOST=mailpit`; sesuaikan menjadi `mailpity` untuk Compose ini.
- Mapping Vite adalah `${VITE_PORT:-9173}:${VITE_PORT:-5173}`. Pastikan port yang didengarkan Vite dan port HMR cocok; `vite.config.js` saat ini belum mengatur host/port server secara eksplisit.
- `SESSION_DRIVER`, `CACHE_STORE`, dan `QUEUE_CONNECTION` contoh menggunakan database, sehingga tabel pendukung harus tersedia.

Perintah operasional dari root repository:

```bash
./vendor/bin/sail ps
./vendor/bin/sail logs laravel.test
./vendor/bin/sail shell
./vendor/bin/sail composer install
./vendor/bin/sail artisan queue:listen --tries=1
./vendor/bin/sail down
```

Aplikasi web dilayani container `laravel.test` pada port 81. Jalankan Vite terpisah melalui Sail bila diperlukan. Jalankan queue listener hanya bila fitur yang dikerjakan membutuhkan queue; worker memproses pekerjaan pada koneksi aktif. `sail down` menghentikan container tanpa menghapus volume database; jangan menambahkan `-v` untuk penghentian rutin.

## Alur domain dan akses

- OSOCA menggunakan model berawalan `O`, seperti `Oujian`, `Otemplate`, `Orubrik`, `Ostation`, `Osesi`, `Opeserta`, `Openguji`, `Onilai`, dan `Ofeedback`. Telusuri route ke controller dan view sebelum mengubah alur ujian atau perhitungan nilai.
- PBL menggunakan `PblKeg`, `PblMininote`, `PblKelompok`, `PblPeserta`, `PblNilai`, dan `PblBa`. Perubahan penilaian perlu menjaga hubungan kegiatan, kelompok, skenario, tutor, peserta, dan berita acara.
- Ada artefak OSCE lama, model `Nilai`/`Peserta`, serta tabel dan view dengan nama mirip. Pastikan referensi aktif di route; jangan menganggap semuanya bagian dari OSOCA atau menghapusnya hanya karena namanya lama.
- Login Fortify memakai `username`, password, dan CAPTCHA melalui `CustomLoginHandler`; CAPTCHA menggunakan helper dan sesi `osce_captcha`.
- Route admin memakai `auth` dan middleware `Panitia`, yang memeriksa Gate `Panitia`. Periksa definisi Gate pada provider ketika mengubah otorisasi.
- Alur scan memiliki sesi sendiri: middleware OSOCA memeriksa `Osoca`, peserta memeriksa `oujian`, dan PBL memeriksa `kegiatan_pbl`. Controller juga memakai sesi seperti `Penguji`, `Peserta`, `Tutor`, `pblKelompok`, dan `skenario`. Nama dan kapitalisasi merupakan bagian dari kontrak.
- Middleware global `Power` dapat mengganti pengguna login berdasarkan sesi `power`. Perubahan autentikasi harus mempertimbangkan alur impersonasi dan logout.

## Aturan implementasi

1. Telusuri `route → middleware → controller → model/migration → view` dan cari pemanggil dengan `rg` sebelum mengedit. Pertahankan nama route, parameter, format respons, dan key sesi kecuali perubahan kontrak memang diminta.
2. Ikuti `.editorconfig`: UTF-8, LF, empat spasi, dan newline akhir. Format hanya file PHP yang diubah dengan Pint agar diff tidak melebar.
3. Perhatikan casing path dan namespace. Direktori controller PBL saat ini bernama `pbl`, sementara beberapa namespace memakai `Pbl`; pastikan class baru cocok dengan PSR-4 pada filesystem Linux. Jangan melakukan rename massal tanpa meninjau seluruh referensi.
4. Validasi input dan otorisasi di server. Batasi query berdasarkan ujian, kegiatan, kelompok, atau pemilik yang tepat; ID dari request maupun sesi tetap perlu diperiksa terhadap konteks akses.
5. Jangan meneruskan seluruh input request ke model. Periksa `$fillable`/`$guarded`, terutama model yang memakai `$guarded = []`, dan isi hanya atribut tervalidasi.
6. Gunakan transaksi untuk perubahan beberapa record yang harus konsisten. Pertimbangkan eager loading bila halaman melakukan query relasi berulang.
7. Untuk perubahan skema yang sudah dipakai, tambahkan migration baru. Periksa relasi, indeks, dan foreign key aktual; nama seperti `station`, `station_id`, `sesi`, dan `sesi_id` tidak selalu saling menggantikan.
8. Pertahankan rumus nilai, pembulatan, status peserta, dan transisi berita acara. Perubahan aturan bisnis harus disertai contoh hasil dan tes yang menunjukkan perilaku yang diminta.
9. Blade menggunakan escaping `{{ ... }}` untuk input biasa. Bila harus merender HTML materi, periksa sumber dan sanitasi sebelum memakai `{!! ... !!}`.
10. Gunakan layout dan komponen yang sudah dipakai modul. Build Vite tidak memvalidasi seluruh aset Bootstrap/jQuery yang dirujuk langsung dari `public/`.
11. Helper tanggal mencakup konversi UTC ke WIB. Periksa `config/app.php`, `APP_TIMEZONE`, penyimpanan database, dan pemanggil helper agar waktu tidak dikonversi dua kali.
12. Jangan mengedit dependency `vendor/`, output build, cache, atau log sebagai solusi permanen. Jangan menambah dependency untuk perubahan yang dapat diselesaikan dengan fasilitas yang sudah ada.

## Data, media, dan integrasi

- Jangan commit atau menampilkan nilai rahasia dari `.env`, token, data peserta, atau isi dump database. `osoca.sql` dan seeder berisi data yang perlu diperlakukan sebagai data sensitif; gunakan fixture sintetis untuk pengujian.
- Seeder seperti `UsersTableSeeder` dan `RolesTableSeeder` menghapus isi tabel sebelum insert. Tinjau `DatabaseSeeder` dan seeder terkait sebelum menjalankan `db:seed`; jangan jadikan seed penuh bagian otomatis setup atau tes.
- Jangan menjalankan `migrate:fresh`, `db:wipe`, impor dump, atau penghapusan volume pada database yang perlu dipertahankan. Reset hanya pada database disposable yang jelas ditujukan untuk pekerjaan tersebut.
- Disk `local` dan `private` sama-sama menunjuk `storage/app/private`; disk `public` menunjuk `storage/app/public`. Media privat dilayani melalui `/f/{token}` (`mfile`); jangan memindahkan media privat ke URL publik untuk memperbaiki tampilan.
- Impor PBL menerima arsip `.pbl`, membaca `data.json`, mengimpor media, dan mengganti token dalam HTML. Saat mengubah importer, pertahankan format paket, validasi file/path arsip, penanganan gagal, dan pembersihan file sementara. Rollback database tidak otomatis membatalkan penulisan file.
- Pengiriman feedback memakai HTTP client dan konfigurasi `services.feedback_api`. Gunakan `Http::fake()` untuk tes; jangan mengirim data ke layanan eksternal saat memverifikasi perubahan lokal.

## Validasi perubahan

Jalankan pemeriksaan sesuai file dan perilaku yang diubah. Semua perintah runtime berikut dijalankan melalui Sail; pastikan container sudah aktif. Jalankan pemeriksaan Git dari host.

```bash
# Daftar route dan middleware, tanpa mengubah database
./vendor/bin/sail artisan route:list

# Pemeriksaan sintaks dan format file PHP yang diubah
./vendor/bin/sail php -l app/Http/Controllers/OsocaController.php
./vendor/bin/sail pint --test app/Http/Controllers/OsocaController.php

# Tes terarah, lalu suite bila perubahan berdampak lintas modul
./vendor/bin/sail artisan test --filter=NamaTest
./vendor/bin/sail artisan test

# Build bila mengubah sumber aset Vite
./vendor/bin/sail npm run build

# Periksa whitespace dan diff sebelum menyelesaikan pekerjaan
git diff --check
git diff --stat
```

Sebelum tes database, pastikan koneksi benar-benar terisolasi. `phpunit.xml` mengatur `DB_DATABASE=testing`, tetapi belum mengatur `DB_CONNECTION`, host, atau kredensial khusus; nilai lainnya dapat berasal dari `.env`. Gunakan `.env.testing` lokal atau environment tes yang eksplisit. Gunakan `RefreshDatabase` hanya pada database disposable dan buat fixture/factory yang dibutuhkan, bukan seed data repository secara keseluruhan.

Tes yang tersedia masih berupa contoh. `tests/Feature/ExampleTest.php` mengharapkan `/` berstatus 200, sementara route `/` saat ini melakukan redirect ke `dashbord`; catat ketidaksesuaian ini jika suite gagal. Jangan mengubah perilaku aplikasi hanya untuk memenuhi asumsi tes contoh.

Tambahkan tes regresi untuk perubahan logika bisnis atau akses: input valid/tidak valid, pengguna tanpa akses, sesi hilang, konteks ujian/kegiatan yang berbeda, penyimpanan nilai, dan hasil perhitungan. Untuk UI, periksa halaman terkait beserta form, pesan validasi, navigasi, dan tampilan pada ukuran layar yang relevan. Untuk PDF, ekspor, atau impor, periksa artefak hasil dan jalur kegagalannya.

Perubahan dokumentasi cukup diperiksa terhadap file yang dirujuk dan `git diff --check`; tidak membutuhkan suite aplikasi.

## Penyelesaian pekerjaan

- Periksa `git status` sebelum mulai dan sebelum selesai; pertahankan perubahan pengguna yang sudah ada.
- Pastikan diff hanya mencakup tujuan pekerjaan, tanpa data pribadi, rahasia, atau perubahan dependency yang tidak diperlukan.
- Laporkan apa yang berubah, pemeriksaan yang dijalankan, hasilnya, serta pemeriksaan yang terhalang beserta alasannya. Jangan menyatakan tes lulus bila belum dijalankan.
- Perbarui panduan ini jika struktur, perintah setup, atau kontrak penting berubah.
