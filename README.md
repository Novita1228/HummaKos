# HummaKos

**HummaKos** adalah aplikasi web berbasis Laravel yang dirancang untuk membantu pengelolaan kos secara digital. Aplikasi ini menyediakan platform terintegrasi bagi pengelola kos (Admin) untuk mengelola kamar, penyewa, dan keluhan, serta bagi penyewa untuk mencari kamar, melakukan pemesanan, dan memantau status hunian mereka.

---

## 🚀 Fitur Utama

HummaKos menerapkan sistem **Role-Based Access Control (RBAC)** dengan dua peran utama, yaitu **Admin** dan **Penyewa**.

### 🛡️ Fitur Admin

#### 📊 Dashboard Monitoring

* Melihat statistik jumlah kamar, penyewa, dan keluhan.
* Menampilkan ringkasan aktivitas terbaru dalam sistem.

#### 🏠 Manajemen Tipe Kamar

* Menambah tipe kamar baru.
* Mengubah informasi tipe kamar.
* Menghapus tipe kamar.

#### 🚪 Manajemen Kamar

* Menambahkan data kamar.
* Mengubah informasi kamar.
* Menghapus kamar.
* Mengelola status kamar (Tersedia / Terisi).

#### 👥 Manajemen Penyewa

* Melihat daftar penyewa.
* Melihat detail data penyewa.
* Mengelola informasi penghuni kos.

#### 📋 Manajemen Pemesanan

* Melihat pengajuan pemesanan kamar.
* Melakukan verifikasi pemesanan.
* Menyetujui atau menolak pengajuan penyewa.

#### 📢 Manajemen Keluhan

* Melihat seluruh keluhan yang dikirim penyewa.
* Mengubah status penanganan keluhan.
* Memantau progres penyelesaian keluhan.

---

### 👤 Fitur Penyewa

#### 🔍 Jelajahi Kamar

* Melihat daftar kamar yang tersedia.
* Melihat detail kamar dan fasilitas.

#### 📝 Pemesanan Kamar

* Mengajukan pemesanan kamar.
* Mengunggah dokumen pendukung.
* Memantau status pengajuan pemesanan.

#### 🏠 Kamar Saya

* Melihat informasi kamar yang sedang ditempati.
* Menampilkan detail tipe kamar dan status hunian.

#### 📋 Pemesanan Saya

* Melihat riwayat pemesanan.
* Memantau status verifikasi pemesanan.

#### 📢 Keluhan Saya

* Mengirim keluhan kepada pengelola kos.
* Melihat status penanganan keluhan.

#### 👤 Profil Pengguna

* Mengelola data profil akun.
* Mengubah informasi pribadi dan password.

---

## 🗄️ Struktur Database

HummaKos menggunakan 5 database:

| Tabel      | Deskripsi                    |
| ---------- | ---------------------------- |
| users      | Data akun pengguna dan admin |
| room_types | Data tipe kamar              |
| rooms      | Data kamar kos               |
| tenants    | Data penghuni/penyewa        |
| complaints | Data keluhan penyewa         |

---

## 🛠️ Teknologi yang Digunakan

* Laravel 11
* PHP 8.3+
* MySQL / SQLite
* Bootstrap CSS
* Vite
* Spatie Laravel Permission
* Blade Template Engine

---

## 💻 Persyaratan Sistem

Pastikan perangkat telah terpasang:

* PHP >= 8.3
* Composer
* Node.js & NPM
* MySQL/MariaDB atau SQLite

---

## ⚙️ Panduan Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/hummakos.git
cd hummakos
```

### 2. Install Dependensi PHP

```bash
composer install
```

### 3. Install Dependensi Frontend

```bash
npm install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`

```bash
cp .env.example .env
```

### 5. Konfigurasi Database

Contoh konfigurasi MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hummakos
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Generate Application Key

```bash
php artisan key:generate
```

### 7. Jalankan Migrasi Database

```bash
php artisan migrate --seed
```

### 8. Jalankan Vite

```bash
npm run dev
```

### 9. Jalankan Server Laravel

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```text
http://localhost:8000
```

---

## 🔐 Role Pengguna

### Admin

Memiliki akses penuh terhadap seluruh fitur manajemen sistem.

### Penyewa

Memiliki akses untuk melihat kamar, melakukan pemesanan, mengirim keluhan, dan mengelola profil pribadi.

---

## 🎯 Tujuan Pengembangan

HummaKos dikembangkan untuk membantu digitalisasi pengelolaan kos agar proses administrasi, pemesanan kamar, serta komunikasi antara penyewa dan pengelola menjadi lebih efisien, terstruktur, dan mudah diakses.

---

## 👨‍💻 Developer

**Novita Herawati Liono**

SMK Antartika 1 Sidoarjo
Rekayasa Perangkat Lunak (RPL)

---

© 2026 HummaKos. All Rights Reserved.
