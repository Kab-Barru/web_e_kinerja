# Sistem Informasi E-Kinerja Pemerintah Kabupaten Barru

Sistem Informasi E-Kinerja adalah platform manajemen kinerja aparatur sipil negara (ASN) di lingkungan Pemerintah Kabupaten Barru. Sistem ini dirancang untuk mencatat aktivitas kerja harian, mengintegrasikan data presensi mesin fingerprint, memfasilitasi verifikasi bertingkat oleh atasan langsung, serta mengakumulasi skor kinerja bulanan sebagai dasar perhitungan Tambahan Penghasilan Pegawai (TPP).

Aplikasi ini kini telah dilengkapi dengan modul **RESTful API v1** yang siap diintegrasikan secara mulus dengan aplikasi mobile (Android/iOS), frontend modern, maupun sistem kepegawaian eksternal seperti SIASN BKN dan SIMPEG.

---

## Daftar Isi
- [Fitur Utama](#fitur-utama)
- [Arsitektur & Teknologi](#arsitektur--teknologi)
- [Alur Kerja Laporan (State Machine)](#alur-kerja-laporan-state-machine)
- [Modul RESTful API v1](#modul-restful-api-v1)
- [Struktur Direktori Proyek](#struktur-direktori-proyek)
- [Panduan Instalasi & Konfigurasi](#panduan-instalasi--konfigurasi)
- [Dokumentasi API & Integrasi](#dokumentasi-api--integrasi)
- [Hak Cipta](#hak-cipta)

---

## Fitur Utama

1. **Pencatatan Aktivitas Harian Mandiri (ASN)**
   - Pengisian laporan kinerja harian per tanggal kerja dengan validasi pencegahan duplikasi.
   - Pencatatan rincian aktivitas (jam pelaksanaan, uraian tugas, dan output luaran).
   - Kemudahan edit dan hapus selama laporan masih berstatus *Draft* atau *Revisi*.

2. **Evaluasi & Persetujuan Berjenjang (Atasan Langsung)**
   - Monitoring daftar pegawai bawahan langsung beserta jumlah laporan yang menunggu persetujuan.
   - Evaluasi komprehensif: melihat rincian pekerjaan, riwayat izin/sakit (`ref_izin`), serta kepatuhan batas waktu pengiriman.
   - Putusan penilaian fleksibel: **SETUJUI** (dengan skor ketepatan dan kesesuaian tugas) atau **REVISI** (dengan catatan feedback perbaikan).

3. **Kalkulasi Kepatuhan Waktu Cerdas**
   - Mendeteksi otomatis keterlambatan kirim laporan berdasarkan jenis OPD:
     - **OPD 5 Hari Kerja (Umum)**: Laporan Senin–Kamis toleransi $\le 1$ hari. Khusus laporan hari Jumat toleransi s/d Senin ($\le 3$ hari).
     - **OPD 6 Hari Kerja (Faskes/Puskesmas/RSUD)**: Laporan Senin–Jumat toleransi $\le 1$ hari. Khusus hari Sabtu toleransi s/d Selasa ($\le 3$ hari).

4. **Integrasi Presensi Fingerprint**
   - Sinkronisasi otomatis jam masuk dan jam pulang kantor dari database presensi ke dalam rincian kegiatan laporan harian secara aman (*graceful fallback*).

5. **Modul RESTful API v1 Modern**
   - Autentikasi stateless menggunakan **Bearer JWT Token** (HS256).
   - Format respons JSON seragam (*Standard Response Envelope*).
   - Arsitektur berlapis: Controller, Service Layer (logika bisnis & transaksi), dan Model/Repository (query database teroptimasi).
   - Berjalan harmonis berdampingan dengan portal web eksisting tanpa risiko konflik sesi ataupun perubahan skema database (*zero breaking changes*).

---

## Arsitektur & Teknologi

* **Backend Framework**: [CodeIgniter 3](https://codeigniter.com/) (PHP 7.4 - 8.3 compatible)
* **Database**: MySQL / MariaDB (Database utama: `bkpsdm_yusran`, Database absensi: `absensi`)
* **Autentikasi API**: JSON Web Token (JWT) native implementation (HS256)
* **Spesifikasi API**: OpenAPI 3.0.3 (Swagger) & Postman Collection v2.1
* **Web Server**: Apache dengan modul `mod_rewrite` aktif

---

## Alur Kerja Laporan (State Machine)

Status laporan kinerja dikelola melalui 4 tahapan status:

```
                  +-----------------------------------+
                  |                                   |
                  v                                   | (Minta Perbaikan / Catatan Revisi)
          +---------------+                           |
          |   0. DRAFT    |<--------------------------+
          +---------------+
                  |
                  | (Kirim Laporan: POST /kinerja/{id}/submit)
                  v
          +---------------+
          | 1. SUBMITTED  |
          +---------------+
             /         \
            /           \
 (Setujui) /             \ (Revisi)
          v               v
  +---------------+  +---------------+
  |  2. APPROVED  |  |  3. REVISION  |
  +---------------+  +---------------+
          |                  |
          v                  | (Dapat diperbaiki & dikirim ulang)
   [ TERKUNCI &              +-------------------------------> [ Kembali ke 1. SUBMITTED ]
    Masuk TPP ]
```

### Ringkasan Status:
* **0 (Draft)**: Laporan baru dibuat oleh pegawai. Bebas diubah, ditambah kegiatannya, atau dihapus.
* **1 (Submitted)**: Laporan sudah diajukan ke atasan langsung. Berstatus *read-only* bagi pegawai selama menunggu review.
* **2 (Approved)**: Laporan disetujui atasan. Terkunci permanen (tidak dapat diubah/dihapus) dan masuk perhitungan kalkulasi TPP bulanan.
* **3 (Revision)**: Laporan dikembalikan atasan beserta catatan evaluasi. Pegawai dapat memperbaiki rincian kegiatan lalu mengajukannya kembali.

---

## Modul RESTful API v1

Format Base URL: `https://e-kinerja.barrukab.go.id/api/v1`

### Ringkasan Endpoint

| Modul | Method | Endpoint | Deskripsi |
| :--- | :---: | :--- | :--- |
| **Autentikasi** | `POST` | `/auth/login` | Login menggunakan NIP & password, menghasilkan Bearer Token JWT. |
| | `GET` | `/profile` | Mengambil profil lengkap pegawai, unit kerja, dan atasan langsung. |
| **Kinerja Pegawai** | `GET` | `/kinerja` | Riwayat laporan bulanan pegawai dengan pagination & filter. |
| | `POST` | `/kinerja` | Membuat draft laporan harian baru. |
| | `GET` | `/kinerja/{id_pro_lap}` | Detail laporan harian beserta seluruh rincian kegiatan kerja. |
| | `PUT` | `/kinerja/{id_pro_lap}` | Mengubah keterangan header laporan (hanya status Draft/Revisi). |
| | `DELETE` | `/kinerja/{id_pro_lap}` | Menghapus draft laporan beserta seluruh kegiatan terkait. |
| | `POST` | `/kinerja/{id_pro_lap}/items` | Menambahkan rincian kegiatan baru pada laporan. |
| | `PUT` | `/kinerja/items/{id_item}` | Memperbarui baris kegiatan kerja tertentu. |
| | `DELETE` | `/kinerja/items/{id_item}` | Menghapus baris kegiatan kerja. |
| | `POST` | `/kinerja/{id_pro_lap}/submit` | Mengajukan laporan ke atasan langsung. |
| **Approval Atasan** | `GET` | `/approval/bawahan` | Daftar pegawai bawahan langsung beserta jumlah laporan pending. |
| | `GET` | `/approval/pending` | Daftar laporan bawahan yang sedang menunggu verifikasi atasan. |
| | `GET` | `/approval/{id_pro_lap}/review` | Review lengkap aktivitas bawahan, evaluasi waktu kirim, & data izin. |
| | `POST` | `/approval/{id_pro_lap}/decide` | Memberikan putusan: `SETUJUI` (dengan skor) atau `REVISI` (dengan catatan). |
| **Master & Integrasi**| `GET` | `/master/skor-penilaian` | Pilihan opsi standar skor ketepatan waktu dan kesesuaian tugas. |
| | `POST` | `/integrasi/fingerprint/sync-daily` | Sinkronisasi presensi harian fingerprint ke laporan kerja. |

### Format Standar Respons JSON
Seluruh respons API dibungkus dalam format standar seragam:

**Respons Berhasil:**
```json
{
  "success": true,
  "message": "Detail laporan kinerja berhasil dimuat.",
  "data": { ... },
  "meta": {
    "current_page": 1,
    "per_page": 15,
    "total_items": 30,
    "total_pages": 2,
    "has_next": true,
    "has_prev": false
  }
}
```

**Respons Kesalahan:**
```json
{
  "success": false,
  "message": "Laporan tidak dapat dikirim karena belum memiliki rincian kegiatan kerja.",
  "errors": { ... },
  "code": 422
}
```

---

## Struktur Direktori Proyek

```
e-kinerja/
├── abdi/                               # Direktori Aplikasi Utama (CodeIgniter 3)
│   ├── config/
│   │   ├── config.php                  # Konfigurasi umum CodeIgniter
│   │   ├── database.php                # Konfigurasi koneksi MySQL
│   │   ├── jwt.php                     # Konfigurasi rahasia & masa aktif JWT
│   │   └── routes.php                  # Pemetaan route RESTful API v1
│   ├── controllers/
│   │   ├── api/v1/                     # Controller RESTful API v1
│   │   │   ├── Auth.php                # Endpoint /auth/login & /profile
│   │   │   ├── Kinerja.php             # Endpoint /kinerja (CRUD & submit)
│   │   │   ├── Approval.php            # Endpoint /approval (review & decide)
│   │   │   └── Master.php              # Endpoint /master & integrasi finger
│   │   ├── peg/                        # Controller modul web ASN eksisting
│   │   ├── admin/                      # Controller modul web admin OPD
│   │   └── su/                         # Controller modul super admin BKPSDM
│   ├── core/
│   │   └── MY_Controller.php           # Base API Controller (CORS, JWT, Envelopes)
│   ├── libraries/
│   │   └── JWT.php                     # Library native HS256 encoder/decoder
│   ├── models/
│   │   └── api/                        # Model/Repository query teroptimasi API
│   │       ├── Pegawai_model.php       # Query pegawai & autentikasi
│   │       ├── Kinerja_model.php       # Query header & detil laporan
│   │       ├── Approval_model.php      # Query evaluasi atasan & izin
│   │       └── Master_model.php        # Query master skor & absen finger
│   ├── services/                       # Service Layer (Business Invariants & TX)
│   │   ├── Auth_service.php            # Logika bisnis autentikasi & profil
│   │   ├── Kinerja_service.php         # Validasi tanggal, duplikasi, & submit
│   │   ├── Approval_service.php        # Toleransi kepatuhan waktu & putusan
│   │   └── Master_service.php          # Integrasi presensi harian
│   └── views/                          # Blade/Template antarmuka web eksisting
├── docs/                               # Dokumentasi Teknis Lengkap
│   └── api/
│       ├── AI_AGENT_API_GUIDE.md       # Panduan integrasi AI Agent & Frontend
│       ├── openapi.json                # Spesifikasi OpenAPI 3.0.3 (JSON)
│       ├── openapi.yaml                # Spesifikasi OpenAPI 3.0.3 (YAML)
│       └── ekinerja_api_postman_collection.json # Koleksi Postman siap pakai
├── index.php                           # Front Controller utama
├── master_prompt.md                    # Dokumen spesifikasi dasar perancangan API
└── README.md                           # Dokumentasi umum sistem
```

---

## Panduan Instalasi & Konfigurasi

### 1. Kebutuhan Sistem
* PHP versi 7.4 s/d 8.3 dengan ekstensi: `mysqli`, `json`, `hash`, `curl`, `mbstring`.
* Web server Apache dengan `mod_rewrite` aktif.
* Server MySQL / MariaDB.

### 2. Kloning Repository
```bash
git clone git@github.com:Kab-Barru/web_e_kinerja.git
cd web_e_kinerja
```

### 3. Konfigurasi Database
Buka berkas `abdi/config/database.php` dan sesuaikan kredensial server database lokal/staging Anda:
```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'bkpsdm_yusran',
    'dbdriver' => 'mysqli',
    // ...
);
```

### 4. Konfigurasi Kunci Rahasia JWT
Buka berkas `abdi/config/jwt.php` untuk menyesuaikan kunci enkripsi token JWT:
```php
$config['jwt_secret_key'] = 'ganti_dengan_kunci_rahasia_yang_sangat_kuat_2026';
$config['jwt_ttl']        = 86400 * 7; // Masa aktif token (contoh: 7 hari)
```

### 5. Konfigurasi Apache Header Authorization
Pastikan server Apache meneruskan header `Authorization` ke PHP dengan memastikan baris berikut ada di `.htaccess`:
```apache
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

---

## Dokumentasi API & Integrasi

Untuk memudahkan pengembang frontend, mobile app, maupun AI coding assistant dalam mengintegrasikan endpoint, tersedia beberapa dokumen pendukung di dalam folder `docs/api/`:

* **Panduan AI Agent & Mobile**: Baca [AI_AGENT_API_GUIDE.md](docs/api/AI_AGENT_API_GUIDE.md) untuk detail alur state machine, aturan invariant, skenario error handling, dan deklarasi Function Calling schema.
* **Koleksi Postman**: Impor berkas [ekinerja_api_postman_collection.json](docs/api/ekinerja_api_postman_collection.json) ke aplikasi Postman. Koleksi ini sudah dilengkapi otomatisasi penyimpanan token JWT ke *environment variables*.
* **Swagger / OpenAPI**: Berkas [openapi.yaml](docs/api/openapi.yaml) dan [openapi.json](docs/api/openapi.json) dapat langsung diunggah ke [Swagger Editor](https://editor.swagger.io/) untuk menghasilkan antarmuka uji interaktif atau membuat client SDK otomatis.

---

## Hak Cipta

Dikembangkan untuk **Pemerintah Kabupaten Barru**  
Dikelola oleh **Badan Kepegawaian dan Pengembangan Sumber Daya Manusia (BKPSDM) Kabupaten Barru**.  
Seluruh hak cipta dilindungi undang-undang.
