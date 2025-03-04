# Community-Based Web Application (Social Blogging Platform)

## Deskripsi Proyek
Proyek ini termasuk dalam kategori **Community-Based Web Application** atau **Social Blogging Platform**. Fokus utama aplikasi ini adalah memungkinkan pengguna untuk membagikan atau memposting karya berupa **blog/post** dan **portofolio proyek** yang telah mereka buat, untuk ditampilkan dan dilihat oleh publik.

Setiap pengguna memiliki **halaman dashboard pribadi** masing-masing, yang digunakan untuk mengelola karya mereka dengan fitur **CRUD (Create, Read, Update, Delete)**.

## Fitur Utama Aplikasi
- **Autentikasi Pengguna**: Registrasi dan login.
- **CRUD Blog/Post**: Membuat, membaca, memperbarui, dan menghapus artikel.
- **CRUD Projects/Portofolio**: Membuat, membaca, memperbarui, dan menghapus project.
- **Search**: Mencari post atau project dengan cepat berdasarkan title atau nama judul.
- **Dark Mode**: Tema gelap yang dapat diaktifkan oleh pengguna.
- **Responsive Design**: Tampilan yang menyesuaikan dengan perangkat desktop maupun mobile.

## Fitur Yang Belum Diterapkan
- Like dan Komentar
- Follow/Unfollow
- Share/Bagikan

## Teknologi yang Digunakan
- Backend: **Laravel 11**
- Styling UI: **TailwindCSS** dan **Flowbite**
- Database: **MySQL**
- Debugging: **Barryvdh-Laravel Debugbar**
- API Gambar: **Picsum Photos**

## Cara Menjalankan Project
### 1. Clone Repository dari GitHub
Clone repository menggunakan perintah berikut:
```bash
git clone https://github.com/slmnfqh/aspro-technical-test-be
```

### 2. Instal Dependensi
- Packages vendor Laravel:
```bash
composer install
```
- Packages Node Modules:
```bash
npm install
```

### 3. Konfigurasi File Environment
- Duplicate file `.env.example` sehingga menghasilkan file baru dengan nama `.env.copy.example`
- Rename file tersebut menjadi `.env`

### 4. Setting Database
- Buka file `.env`
- Sesuaikan konfigurasi database seperti nama database, username, dan password sesuai dengan yang digunakan.

### 5. Migrasi Database
- Jalankan migrasi menggunakan perintah:
```bash
php artisan migrate
```
Jika ada peringatan, ketik **yes**.

### 6. Mengisi Data Dummy dengan Seeder
- Jalankan perintah berikut untuk mereset dan meregenerasi seluruh data pada tabel:
```bash
php artisan migrate --seed
```
- Atau, Anda bisa mengimport file SQL secara manual.

### 7. Generate Key
Sebelum menjalankan server, generate key aplikasi dengan perintah berikut:
```bash
php artisan key:generate
```

### 8. Menjalankan Aplikasi
Jalankan dua terminal terpisah:
- Terminal 1: Jalankan Laravel Vite dengan perintah:
```bash
npm run dev
```
- Terminal 2: Jalankan server Laravel dengan perintah:
```bash
php artisan serve
```

### 9. Akses Aplikasi
Setelah server berjalan, akses aplikasi melalui URL berikut:
```
http://127.0.0.1:8000
```

## Video Penjelasan
Tutorial lengkap cara menjalankan aplikasi beserta penjelasan singkat tersedia di YouTube melalui link berikut:  
[https://www.youtube.com/watch?v=v6c_9JEcM4o&t=106s](https://www.youtube.com/watch?v=v6c_9JEcM4o&t=106s)

## Lisensi
Proyek ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).

