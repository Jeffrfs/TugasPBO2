BeliKatsu - Web Laravel penjualan Nasi Katsu

NAMA ANGGOTA KELOMPOK
- Jefri Handanu
- Ali Yafi
- Naufal Abiyu
- Syahrul Ibrahim

  
Kebutuhan Sistem
- PHP versi 8 atau lebih baru
- Composer
- Laravel versi 10 atau setara

Cara Menjalankan Aplikasi

1. Clone atau unduh project ini dari GitHub:
   git clone https://github.com/Jeffrfs/TugasPBO2.git

2. Masuk ke folder project
   cd belikatsu

3. Install semua dependensi
   composer install

4. Copy file environment
   cp .env.example .env

5. Generate key aplikasi
   php artisan key:generate

6. Gunakan SQLite sebagai database
   - Buat file kosong bernama database.sqlite di folder database
   - Atur .env bagian ini:
     DB_CONNECTION=sqlite
     DB_DATABASE=/fullpath/ke/project/database/database.sqlite

7. Jalankan migrasi
   php artisan migrate

8. Jalankan aplikasi
   php artisan serve
   Akses melalui browser localhost http://localhost:8000


Fitur Utama

- Pengguna bisa melihat menu makanan di halaman depan
- Menambahkan menu ke keranjang
- Checkout pesanan
- Riwayat pesanan
- Admin bisa tambah, ubah, dan hapus menu
- Admin bisa upload gambar makanan
