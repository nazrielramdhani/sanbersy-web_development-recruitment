# EventApp — Sanbersy Web Development Recruitment Test

Aplikasi web manajemen pendaftaran event yang dibangun menggunakan Laravel 12.

---

## Fitur Aplikasi

### Untuk User Umum
- **Registrasi & Login** — dengan validasi dan fitur show/hide password
- **Daftar Event** — melihat semua event yang tersedia beserta lokasi
- **Detail Event** — informasi lengkap event termasuk alamat lengkap
- **Pendaftaran Event** — mendaftar event dengan satu klik
- **Email Konfirmasi** — email otomatis terkirim setelah mendaftar event
- **Dashboard Pribadi** — ringkasan jumlah dan daftar event yang diikuti
- **Active Navigation** — indikator halaman aktif di navbar

### Untuk Admin
- **Kelola Event (CRUD)** — tambah, edit, dan hapus event
- **Manajemen Lokasi** — setiap event memiliki alamat lengkap hingga nama ruangan
- **Akses Terbatas** — halaman admin hanya bisa diakses oleh user berole admin

---

## Tech Stack

- **Framework** — Laravel 12
- **Autentikasi** — Laravel Breeze
- **Database** — MySQL
- **Frontend** — Blade Template + Tailwind CSS
- **Email Testing** — Mailtrap (Email Sandbox)
- **Version Control** — Git + GitHub

---

## Cara Instalasi

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL (atau Laragon)

### Langkah Instalasi

**1. Clone repositori**
```bash
git clone https://github.com/USERNAME/sanbersy-web_development-recruitment.git
cd sanbersy-web_development-recruitment
```

**2. Install dependencies**
```bash
composer install
npm install
```

**3. Salin file environment dan generate key**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Konfigurasi database di `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sanbersy_web_development_recruitment
DB_USERNAME=root
DB_PASSWORD=
```

**5. Konfigurasi email di `.env` (gunakan Mailtrap)**
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_FROM_ADDRESS="noreply@eventapp.com"
MAIL_FROM_NAME="EventApp"
```

**6. Jalankan migration dan seeder**
```bash
php artisan migrate
php artisan db:seed
```

**7. Build assets dan jalankan server**
```bash
npm run dev
php artisan serve
```

**8. Buka browser ke `http://localhost:8000`**

---

## Akun & Role

| Role | Cara Akses | Email | Password |
|------|-----------|-------|----------|
| Admin | Sudah tersedia via seeder | admin@eventapp.com | password123 |
| User | Daftar mandiri lewat `/register` | bebas | bebas |

### Perbedaan Hak Akses
- **Admin** — dapat mengakses halaman Kelola Event (`/admin/events`) untuk menambah, mengedit, dan menghapus event beserta lokasinya
- **User** — dapat melihat daftar event, mendaftar event, menerima email konfirmasi, dan melihat dashboard pribadi

---

## Struktur Halaman

| Halaman | URL | Akses |
|---------|-----|-------|
| Landing Page | `/` | Public |
| Daftar Event | `/events` | Public |
| Detail Event | `/events/{id}` | Public |
| Login | `/login` | Public |
| Register | `/register` | Public |
| Pendaftaran Event | `/events/{id}/register` | User Login |
| Dashboard | `/dashboard` | User Login |
| Kelola Event | `/admin/events` | Admin |
| Tambah Event | `/admin/events/create` | Admin |
| Edit Event | `/admin/events/{id}/edit` | Admin |

---

## Alur Email Konfirmasi

1. User login dan membuka halaman detail event
2. User klik tombol **"Daftar Sekarang"**
3. Data tersimpan ke tabel `event_registrations`
4. Laravel Mail otomatis mengirim email konfirmasi ke inbox user
5. Email berisi nama user, nama event, tanggal, dan lokasi event
6. Email dapat dipantau melalui Mailtrap Email Sandbox
