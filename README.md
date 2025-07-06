BeliKatsu - Aplikasi Laravel Sederhana

Kebutuhan Sistem
- PHP versi 8 atau lebih baru
- Composer
- Laravel versi 10 atau setara

Cara Menjalankan Aplikasi

1. Clone atau unduh project ini
   Jika dari GitHub:
   git clone https://github.com/username/belikatsu.git

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
   Akses aplikasi lewat browser di http://localhost:8000

Akses Admin

1. Jalankan perintah berikut di terminal untuk memberi status admin:
   php artisan tinker

   Di dalam Tinker, ketik:
   $user = \App\Models\User::where('email', 'emailpengguna@contoh.com')->first();
   $user->is_admin = 1;
   $user->save();

2. Setelah itu, login dengan akun tersebut lalu akses:
   http://localhost:8000/admin/barang

Fitur Utama

- Pengguna bisa melihat menu makanan di halaman depan
- Menambahkan menu ke keranjang
- Checkout pesanan
- Riwayat pesanan
- Admin bisa tambah, ubah, dan hapus menu
- Admin bisa upload gambar makanan