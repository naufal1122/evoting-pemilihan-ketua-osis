# E-Voting Pemilihan Ketua OSIS

Aplikasi e-voting untuk pemilihan ketua OSIS menggunakan Laravel dengan dukungan notifikasi SweetAlert.

## Fitur

- **Pemungutan Suara** - Pengguna dapat memilih kandidat ketua OSIS dengan mudah.
- **Notifikasi Dinamis** - Menggunakan SweetAlert untuk memberikan notifikasi konfirmasi dan keberhasilan secara interaktif.
- **Tampilan Responsif** - Tampilan yang dapat menyesuaikan dengan berbagai ukuran perangkat.
- **Manajemen Admin** - Fitur untuk mengelola daftar pemilih, kandidat, dan hasil pemungutan suara.

## Teknologi yang Digunakan

- **Laravel** - Framework PHP untuk mengelola backend aplikasi.
- **SweetAlert** - Plugin JavaScript untuk menampilkan notifikasi yang menarik dan interaktif.
- **Bootstrap** - Untuk tampilan antarmuka yang responsif.

## Instalasi

1. **Clone repository ini**:


2. **Instal Dependensi**:

Pastikan Anda sudah menginstal Composer dan Node.js. Lalu jalankan perintah berikut:


3. **Konfigurasi Environment**:

Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database:


Kemudian edit file `.env` untuk mengatur koneksi database:


4. **Migrasi Database**:

Jalankan migrasi untuk membuat tabel-tabel yang diperlukan:


5. **Menjalankan Server Lokal**:

Setelah semua pengaturan selesai, jalankan server lokal:


Akses aplikasi di [http://localhost:8000](http://localhost:8000).

## Penggunaan SweetAlert

SweetAlert digunakan dalam aplikasi ini untuk memberikan notifikasi visual yang interaktif saat pengguna:

- Memilih kandidat (konfirmasi sebelum mengirim suara).
- Mendapatkan notifikasi keberhasilan setelah pemungutan suara.
- Menghapus data di halaman admin (dengan konfirmasi sebelum penghapusan).

Untuk informasi lebih lanjut mengenai SweetAlert, kunjungi dokumentasi SweetAlert di https://sweetalert2.github.io/.

## Kontribusi

Silakan membuat pull request jika Anda ingin berkontribusi pada proyek ini.

## Lisensi

Proyek ini dilisensikan di bawah MIT License.
