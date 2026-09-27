# DOKUMENTASI LENGKAP INTEGRASI RESTful API E-KINERJA
## Panduan Resmi & Kontrak Data untuk AI Agent Frontend & Mobile

> **Target Pembaca**: AI Coding Agent (Cursor, Claude, Copilot, Antigravity) & Frontend/Mobile Developer (Flutter, React Native, Next.js).  
> **Versi API**: `v1`  
> **Base URL**: `https://e-kinerja.barrukab.go.id/api/v1`  
> **Skema Autentikasi**: **API Key + NIP Header Langsung** (`X-API-KEY` & `X-USER-NIP`), Passwordless, JSON Envelope Konsisten, Zero Unbounded Query.

---

## 1. MEKANISME AUTENTIKASI (API KEY & NIP DIRECT HEADER)

Sistem menggunakan mekanisme autentikasi tanpa password (*passwordless*) yang cepat, aman, dan langsung (*stateless*). Setiap pemanggilan request HTTP dari aplikasi mobile, frontend, atau AI Agent **WAJIB menyertakan 2 Header Utama**:

```http
X-API-KEY: barru_ekinerja_api_key_2026_secret_mobile
X-USER-NIP: 198801012015011001
Content-Type: application/json
```

### Cara Kerja Autentikasi Backend:
1. **Verifikasi Kunci API (`X-API-KEY`)**:
   Backend mencocokkan nilai header dengan daftar kunci resmi yang terdaftar di konfigurasi sistem (`abdi/config/api_key.php`). Jika tidak cocok/kosong, server mengembalikan error `401 Unauthorized`.
2. **Identifikasi & Resolusi Pegawai (`X-USER-NIP`)**:
   Backend secara otomatis memvalidasi data pegawai di tabel `ref_pegawai` dan mengecek hak akses/role di `ref_log`. Jika NIP terdaftar, identitas (`nik`, `nama`, `id_unit_kerja`, `id_jabatan`, `nik_atasan`, dan `role`) langsung aktif dan terikat pada request tersebut.
3. **Tanpa Password**:
   Pengguna ASN tidak perlu lagi mengingat atau memasukkan kata sandi ke aplikasi mobile/frontend. Identitas cukup ditentukan dari NIP yang diautentikasi oleh API Key terpercaya.
4. **Kompatibilitas Mundur (Fallback JWT)**:
   Backend tetap menerima header `Authorization: Bearer <token>` jika klien masih menyertakan token sesi.

---

## 2. STATE MACHINE & WORKFLOW RULES

Setiap laporan harian (`pro_lap`) memiliki status numerik (`0` s/d `3`) dengan aturan transisi ketat:

```
                  +-----------------------------------+
                  |                                   |
                  v                                   | (Revisi oleh Atasan)
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
          v                  | (Dapat diedit & dikirim ulang)
   [ TERKUNCI &              +-------------------------------> [ Kembali ke 1. SUBMITTED ]
    Masuk TPP ]
```

### Tabel Status Laporan:
| Kode | Label UI | Deskripsi & Hak Akses | Aksi yang Diizinkan Pegawai |
| :---: | :--- | :--- | :--- |
| `0` | **Draft** | Laporan baru dibuat, belum dikirim. | Edit keterangan, tambah/ubah/hapus item kegiatan, hapus laporan, kirim ke atasan. |
| `1` | **Menunggu Verifikasi Atasan** | Laporan telah diajukan ke atasan langsung. | **Read-Only**. Tidak dapat diedit atau dihapus oleh pegawai. |
| `2` | **Disetujui (Approved)** | Laporan telah dinilai dan disetujui atasan. | **Terkunci Permanen**. Tidak dapat diubah atau dihapus oleh siapapun. Masuk akumulasi TPP. |
| `3` | **Revisi** | Laporan dikembalikan atasan beserta catatan perbaikan. | Dapat diedit keterangan dan rincian kegiatannya, lalu dikirim ulang (`submit`). |

---

## 3. BUSINESS INVARIANTS (ATURAN BISNIS MUTLAK)

AI Agent atau Frontend WAJIB mematuhi dan mengimplementasikan validasi lokal sebelum memanggil endpoint backend:

1. **Prasyarat Atasan Langsung (`nik_atasan`)**:
   - Pegawai dengan data `nik_atasan = null` atau `nik_atasan = '0'` **dilarang membuat laporan**. Tampilkan peringatan: *"Silakan hubungi administrator untuk memperbarui data atasan langsung terlebih dahulu."*
2. **Larangan Duplikasi Hari**:
   - 1 NIP pegawai hanya boleh memiliki maksimal 1 header laporan pada tanggal yang sama. Backend akan menolak dengan error `422 Unprocessable Entity` jika tanggal duplikat.
3. **Immutability Status Approved (`status = 2`)**:
   - Record berstatus `2` terkunci permanen. Tombol aksi (Edit, Hapus, Tambah Item, dsb.) harus dinonaktifkan / disembunyikan di UI.
4. **Minimal 1 Kegiatan Saat Submit**:
   - Laporan tidak dapat diajukan (`POST /kinerja/{id}/submit`) jika daftar kegiatan (`items`) masih kosong.
5. **Kalkulasi Toleransi Pengiriman (Ketepatan Waktu)**:
   - **OPD 5 Hari Kerja (Umum)**:
     - Laporan hari Senin s/d Kamis: toleransi kirim $\le 1$ hari (contoh: tugas Kamis kirim Jumat = `TEPAT WAKTU`).
     - Laporan hari Jumat: toleransi kirim s/d hari Senin berikutnya ($\le 3$ hari = `TEPAT WAKTU`).
     - Melebihi toleransi di atas $\rightarrow$ `TERLAMBAT`.
   - **OPD 6 Hari Kerja (Puskesmas / Rumah Sakit)**:
     - Laporan hari Senin s/d Jumat: toleransi kirim $\le 1$ hari.
     - Laporan hari Sabtu: toleransi kirim s/d Selasa ($\le 3$ hari = `TEPAT WAKTU`).

---

## 4. STANDARD RESPONSE ENVELOPES (KONTRAK JSON)

Setiap endpoint API mengembalikan payload standar seragam:

### A. Format Respons Sukses (200 / 201)
```json
{
  "success": true,
  "message": "Pesan deskriptif keberhasilan",
  "data": { ... } | [ ... ] | null,
  "meta": {
    "current_page": 1,
    "per_page": 15,
    "total_items": 42,
    "total_pages": 3,
    "has_next": true,
    "has_prev": false
  } | null
}
```

### B. Format Respons Error (400 / 401 / 403 / 404 / 422 / 500)
```json
{
  "success": false,
  "message": "Pesan kesalahan yang mudah dipahami pengguna",
  "errors": {
    "field_name": "Rincian spesifik validasi field yang gagal"
  } | null,
  "code": 422
}
```

---

## 5. SPESIFIKASI ENDPOINT API LENGKAP

### Kelompok 1: Autentikasi & Profil Akun

#### 1.1. Verifikasi NIP Pegawai (Passwordless)
- **Method & URL**: `POST /auth/login`
- **Headers**:
  - `X-API-KEY: barru_ekinerja_api_key_2026_secret_mobile`
  - `Content-Type: application/json`
- **Request Body**:
  ```json
  {
    "nip": "198801012015011001"
  }
  ```
  *(Catatan: NIP juga dapat dikirim langsung via header `X-USER-NIP: 198801012015011001`).*
- **Response Success (200 OK)**:
  ```json
  {
    "success": true,
    "message": "Verifikasi NIP berhasil. Akses API aktif.",
    "data": {
      "authenticated": true,
      "role": "user_pegawai",
      "pegawai": {
        "nik": "198801012015011001",
        "nama": "Ahmad Dani, S.STP",
        "id_unit_kerja": 12,
        "unit_kerja": "Badan Kepegawaian dan Pengembangan SDM",
        "kode_unit_kerja": "0",
        "id_jabatan": 45,
        "jabatan": "Analis SDM Aparatur Ahli Pertama",
        "nik_atasan": "197505121998031002"
      },
      "status_atasan_valid": true
    },
    "meta": null
  }
  ```
- **Error Responses**:
  - `401 Unauthorized`: `"Akses ditolak. API Key yang disertakan pada header X-API-KEY tidak valid."`
  - `404 Not Found`: `"Pegawai dengan NIP '1988...' tidak ditemukan dalam sistem ref_pegawai."`

#### 1.2. Ambil Profil Pengguna Aktif
- **Method & URL**: `GET /profile`
- **Headers**:
  - `X-API-KEY: barru_ekinerja_api_key_2026_secret_mobile`
  - `X-USER-NIP: 198801012015011001`
- **Response Success (200 OK)**:
  ```json
  {
    "success": true,
    "message": "Data profil pegawai berhasil dimuat.",
    "data": {
      "nik": "198801012015011001",
      "nama": "Ahmad Dani, S.STP",
      "role": "user_pegawai",
      "unit_kerja": {
        "id_unit_kerja": 12,
        "nama": "Badan Kepegawaian dan Pengembangan SDM",
        "kode": "0"
      },
      "jabatan": {
        "id_jabatan": 45,
        "nama": "Analis SDM Aparatur Ahli Pertama"
      },
      "atasan_langsung": {
        "nik": "197505121998031002",
        "nama": "Drs. H. Syamsuddin, M.Si",
        "jabatan": "Kepala Bidang Pengadaan, Pemberhentian dan Informasi",
        "unit_kerja": "Badan Kepegawaian dan Pengembangan SDM"
      },
      "status_atasan_valid": true
    },
    "meta": null
  }
  ```

---

### Kelompok 2: Manajemen Kinerja Harian (Role: Pegawai)

#### 2.1. Daftar Riwayat Laporan Kinerja
- **Method & URL**: `GET /kinerja`
- **Headers**:
  - `X-API-KEY: barru_ekinerja_api_key_2026_secret_mobile`
  - `X-USER-NIP: 198801012015011001`
- **Query Parameters**:
  - `bulan` (integer 1-12, opsional): Filter bulan laporan.
  - `tahun` (integer YYYY, opsional): Filter tahun laporan.
  - `status` (integer 0, 1, 2, 3, opsional): Filter status laporan.
  - `page` (integer, default: 1): Nomor halaman.
  - `per_page` (integer, default: 15): Jumlah item per halaman.
- **Response Success (200 OK)**:
  ```json
  {
    "success": true,
    "message": "Daftar riwayat laporan kinerja berhasil dimuat.",
    "data": [
      {
        "id_pro_lap": 1052,
        "nik": "198801012015011001",
        "tanggal": "2026-09-27",
        "nik_atasan": "197505121998031002",
        "nama_atasan": "Drs. H. Syamsuddin, M.Si",
        "status": 1,
        "status_label": "Menunggu Verifikasi Atasan",
        "ket": "0",
        "note": null,
        "total_items": 4,
        "tanggal_kirim": "2026-09-27",
        "penilaian": {
          "ketepatan_waktu": null,
          "kesesuaian_lap": null,
          "total_skor": null
        }
      }
    ],
    "meta": {
      "current_page": 1,
      "per_page": 15,
      "total_items": 22,
      "total_pages": 2,
      "has_next": true,
      "has_prev": false
    }
  }
  ```

#### 2.2. Buat Draft Header Laporan Baru
- **Method & URL**: `POST /kinerja`
- **Headers**:
  - `X-API-KEY: barru_ekinerja_api_key_2026_secret_mobile`
  - `X-USER-NIP: 198801012015011001`
  - `Content-Type: application/json`
- **Request Body**:
  ```json
  {
    "tanggal": "2026-09-27",
    "ket": "0"
  }
  ```
  *(Catatan: `ket = "0"` artinya hari kerja normal).*
- **Response Success (201 Created)**:
  ```json
  {
    "success": true,
    "message": "Draft laporan kinerja berhasil dibuat.",
    "data": {
      "id_pro_lap": 1053,
      "nik": "198801012015011001",
      "nama_pegawai": "Ahmad Dani, S.STP",
      "tanggal": "2026-09-27",
      "nik_atasan": "197505121998031002",
      "nama_atasan": "Drs. H. Syamsuddin, M.Si",
      "status": 0,
      "status_label": "Draft",
      "tanggal_kirim": null,
      "ket": "0",
      "note": null,
      "penilaian": {
        "ketepatan_waktu": null,
        "kesesuaian_lap": null,
        "total_skor": null
      },
      "items": []
    },
    "meta": null
  }
  ```

#### 2.3. Detail Laporan Kinerja beserta Rincian Kegiatan
- **Method & URL**: `GET /kinerja/{id_pro_lap}`
- **Headers**:
  - `X-API-KEY: barru_ekinerja_api_key_2026_secret_mobile`
  - `X-USER-NIP: 198801012015011001`
- **Response Success (200 OK)**:
  ```json
  {
    "success": true,
    "message": "Detail laporan kinerja berhasil dimuat.",
    "data": {
      "id_pro_lap": 1052,
      "nik": "198801012015011001",
      "nama_pegawai": "Ahmad Dani, S.STP",
      "tanggal": "2026-09-27",
      "nik_atasan": "197505121998031002",
      "nama_atasan": "Drs. H. Syamsuddin, M.Si",
      "status": 0,
      "status_label": "Draft",
      "tanggal_kirim": null,
      "ket": "0",
      "note": null,
      "penilaian": {
        "ketepatan_waktu": null,
        "kesesuaian_lap": null,
        "total_skor": null
      },
      "items": [
        {
          "id_pro_lap_detil": 4201,
          "urutan": 1,
          "jam": "07:30",
          "uraian_tugas": "Masuk Kantor",
          "output": "Data Mesin Finger"
        },
        {
          "id_pro_lap_detil": 4202,
          "urutan": 2,
          "jam": "08:30 - 11:30",
          "uraian_tugas": "Penyusunan draft telaahan staf evaluasi TPP",
          "output": "1 Berkas Draft Telaahan"
        }
      ]
    },
    "meta": null
  }
  ```

#### 2.4. Perbarui Keterangan Header Laporan
- **Method & URL**: `PUT /kinerja/{id_pro_lap}`
- **Headers**: `X-API-KEY`, `X-USER-NIP`, `Content-Type: application/json`
- **Syarat**: Hanya boleh dipanggil jika `status` adalah `0` (Draft) atau `3` (Revisi).
- **Request Body**:
  ```json
  {
    "ket": "0"
  }
  ```

#### 2.5. Hapus Laporan Kinerja
- **Method & URL**: `DELETE /kinerja/{id_pro_lap}`
- **Headers**: `X-API-KEY`, `X-USER-NIP`
- **Syarat**: Hanya diizinkan jika `status` adalah `0` (Draft). Cascade delete seluruh items.

#### 2.6. Tambah Rincian Kegiatan Kerja
- **Method & URL**: `POST /kinerja/{id_pro_lap}/items`
- **Headers**: `X-API-KEY`, `X-USER-NIP`, `Content-Type: application/json`
- **Request Body**:
  ```json
  {
    "uraian_tugas": "Mengikuti rapat koordinasi teknis aplikasi e-Kinerja di Aula Kantor Bupati",
    "jam": "09:00 - 11:30",
    "output": "1 Berkas Notulen Rapat",
    "urutan": 2
  }
  ```

#### 2.7. Ubah Rincian Kegiatan Kerja
- **Method & URL**: `PUT /kinerja/items/{id_pro_lap_detil}`
- **Headers**: `X-API-KEY`, `X-USER-NIP`, `Content-Type: application/json`
- **Request Body**:
  ```json
  {
    "uraian_tugas": "Penyusunan laporan hasil rapat teknis",
    "jam": "13:00 - 15:30",
    "output": "1 Dokumen Laporan",
    "urutan": 3
  }
  ```

#### 2.8. Hapus Rincian Kegiatan Kerja
- **Method & URL**: `DELETE /kinerja/items/{id_pro_lap_detil}`
- **Headers**: `X-API-KEY`, `X-USER-NIP`

#### 2.9. Ajukan Laporan ke Atasan (Submit)
- **Method & URL**: `POST /kinerja/{id_pro_lap}/submit`
- **Headers**: `X-API-KEY`, `X-USER-NIP`
- **Response Success (200 OK)**:
  ```json
  {
    "success": true,
    "message": "Laporan kinerja berhasil diajukan kepada atasan langsung.",
    "data": {
      "id_pro_lap": 1052,
      "status": 1,
      "status_label": "Menunggu Verifikasi Atasan",
      "tanggal_kirim": "2026-09-27",
      "sync_note": "Log pulang absensi finger otomatis disisipkan.",
      "items": [ ... ]
    },
    "meta": null
  }
  ```

---

### Kelompok 3: Approval & Evaluasi (Role: Atasan Langsung)

#### 3.1. Daftar Bawahan Langsung
- **Method & URL**: `GET /approval/bawahan`
- **Headers**:
  - `X-API-KEY: barru_ekinerja_api_key_2026_secret_mobile`
  - `X-USER-NIP: 197505121998031002` *(NIP Atasan)*
- **Response Success (200 OK)**:
  ```json
  {
    "success": true,
    "message": "Daftar pegawai bawahan langsung berhasil dimuat.",
    "data": [
      {
        "nik": "198801012015011001",
        "nama": "Ahmad Dani, S.STP",
        "jabatan": "Analis SDM Aparatur Ahli Pertama",
        "unit_kerja": "Badan Kepegawaian dan Pengembangan SDM",
        "pending_reports_count": 3
      }
    ],
    "meta": null
  }
  ```

#### 3.2. Daftar Laporan Menunggu Persetujuan (Pending)
- **Method & URL**: `GET /approval/pending`
- **Headers**: `X-API-KEY`, `X-USER-NIP: <nip_atasan>`
- **Query Parameters**: `nik_bawahan`, `bulan`, `tahun`, `page`, `per_page`

#### 3.3. Review Komprehensif Laporan Bawahan
- **Method & URL**: `GET /approval/{id_pro_lap}/review`
- **Headers**: `X-API-KEY`, `X-USER-NIP: <nip_atasan>`

#### 3.4. Kirim Keputusan Evaluasi Atasan (Setujui / Revisi)
- **Method & URL**: `POST /approval/{id_pro_lap}/decide`
- **Headers**: `X-API-KEY`, `X-USER-NIP: <nip_atasan>`, `Content-Type: application/json`

##### Opsi A: Menyetujui Laporan
```json
{
  "keputusan": "SETUJUI",
  "ketepatan_waktu": 50,
  "kesesuaian_lap": 50
}
```

##### Opsi B: Meminta Revisi Laporan
```json
{
  "keputusan": "REVISI",
  "note": "Uraian tugas jam 13:00 belum menyertakan berkas laporan pendukung, mohon dilengkapi."
}
```

---

### Kelompok 4: Master Data & Integrasi Presensi

#### 4.1. Opsi Skor Penilaian Atasan
- **Method & URL**: `GET /master/skor-penilaian`
- **Headers**: `X-API-KEY`, `X-USER-NIP`

#### 4.2. Sinkronisasi Presensi Fingerprint Harian
- **Method & URL**: `POST /integrasi/fingerprint/sync-daily`
- **Headers**: `X-API-KEY`, `X-USER-NIP`, `Content-Type: application/json`
- **Request Body**:
  ```json
  {
    "nik": "198801012015011001",
    "tanggal": "2026-09-27"
  }
  ```

---

## 6. TABEL KODE ERROR & STRATEGI PENANGANAN CLIENT

| HTTP Code | Error Message Khas | Penyebab Utama | Tindakan Rekomendasi Frontend / Mobile |
| :---: | :--- | :--- | :--- |
| `401` | Akses ditolak. API Key tidak valid. | Header `X-API-KEY` tidak disertakan atau salah. | Periksa konfigurasi API Key pada environment klien. |
| `401` | Akses ditolak. NIP pegawai wajib disertakan. | Header `X-USER-NIP` kosong atau tidak dikirim. | Pastikan sesi aplikasi menyimpan NIP pegawai yang sedang aktif dan menyertakannya di setiap request. |
| `404` | Pegawai dengan NIP '...' tidak terdaftar. | NIP tidak ada di database kepegawaian. | Arahkan pengguna memeriksa kembali NIP yang diinput. |
| `403` | Akses ditolak. Role tidak memiliki izin / bukan atasan. | Pegawai mengakses endpoint atasan atau memeriksa laporan pegawai lain. | Tampilkan dialog akses ditolak atau batasi navigasi menu berdasarkan role. |
| `422` | Anda belum memiliki atasan langsung yang terdaftar. | Profil belum memiliki NIP atasan di `ref_pegawai`. | Tampilkan peringatan pembaruan data atasan di profil. |
| `422` | Laporan kinerja pada tanggal ini sudah pernah dibuat. | Duplikasi penginputan tanggal tugas. | Buka laporan yang sudah ada pada tanggal tersebut. |
| `422` | Laporan yang sudah disetujui (Approved) terkunci permanen. | Percobaan edit/hapus pada status `2`. | Sembunyikan tombol Edit dan Hapus di detail laporan status `2`. |

---

## 7. AI AGENT TOOL DEFINITIONS (FUNCTION CALLING SPECIFICATION)

Bagi AI Agent yang berinteraksi via LLM Tool Use / Function Calling, berikut deklarasi schema JSON terkini:

```json
[
  {
    "name": "verify_pegawai_nip",
    "description": "Verifikasi status keaktifan NIP pegawai menggunakan API Key.",
    "parameters": {
      "type": "object",
      "properties": {
        "nip": { "type": "string", "description": "NIP Pegawai 18 digit" }
      },
      "required": ["nip"]
    }
  },
  {
    "name": "get_daftar_kinerja",
    "description": "Ambil daftar riwayat laporan kinerja harian pegawai dengan filter bulan/tahun/status.",
    "parameters": {
      "type": "object",
      "properties": {
        "nip": { "type": "string", "description": "NIP Pegawai pelapor" },
        "bulan": { "type": "integer", "description": "Nomor bulan (1-12)" },
        "tahun": { "type": "integer", "description": "Tahun empat digit (contoh: 2026)" },
        "status": { "type": "integer", "description": "0: Draft, 1: Submitted, 2: Approved, 3: Revision" },
        "page": { "type": "integer", "default": 1 }
      },
      "required": ["nip"]
    }
  },
  {
    "name": "create_draft_kinerja",
    "description": "Buat draft laporan harian baru pada tanggal tertentu.",
    "parameters": {
      "type": "object",
      "properties": {
        "nip": { "type": "string", "description": "NIP Pegawai pelapor" },
        "tanggal": { "type": "string", "description": "Format YYYY-MM-DD" },
        "ket": { "type": "string", "default": "0", "description": "Keterangan jenis hari (0 = normal)" }
      },
      "required": ["nip", "tanggal"]
    }
  },
  {
    "name": "add_kinerja_activity_item",
    "description": "Tambah rincian kegiatan kerja harian ke dalam laporan kinerja.",
    "parameters": {
      "type": "object",
      "properties": {
        "nip": { "type": "string", "description": "NIP Pegawai pelapor" },
        "id_pro_lap": { "type": "integer", "description": "ID header laporan" },
        "uraian_tugas": { "type": "string", "description": "Deskripsi pekerjaan yang dikerjakan" },
        "jam": { "type": "string", "description": "Waktu kegiatan, contoh: 08:30 - 11:30" },
        "output": { "type": "string", "description": "Output pekerjaan, contoh: 1 Dokumen SOP" },
        "urutan": { "type": "integer", "description": "Urutan aktivitas kerja" }
      },
      "required": ["nip", "id_pro_lap", "uraian_tugas", "jam", "output"]
    }
  },
  {
    "name": "submit_kinerja_report",
    "description": "Kirim laporan kinerja harian ke atasan langsung untuk dievaluasi dan disetujui.",
    "parameters": {
      "type": "object",
      "properties": {
        "nip": { "type": "string", "description": "NIP Pegawai pelapor" },
        "id_pro_lap": { "type": "integer", "description": "ID header laporan yang akan dikirim" }
      },
      "required": ["nip", "id_pro_lap"]
    }
  },
  {
    "name": "review_laporan_bawahan",
    "description": "Sebagai atasan, periksa rincian aktivitas bawahan, evaluasi keterlambatan waktu kirim, dan catatan izin.",
    "parameters": {
      "type": "object",
      "properties": {
        "nip_atasan": { "type": "string", "description": "NIP Atasan langsung yang sedang login" },
        "id_pro_lap": { "type": "integer", "description": "ID laporan bawahan yang akan direview" }
      },
      "required": ["nip_atasan", "id_pro_lap"]
    }
  },
  {
    "name": "decide_laporan_bawahan",
    "description": "Berikan putusan terhadap laporan bawahan: SETUJUI (dengan skor) atau REVISI (dengan catatan feedback).",
    "parameters": {
      "type": "object",
      "properties": {
        "nip_atasan": { "type": "string", "description": "NIP Atasan yang mengevaluasi" },
        "id_pro_lap": { "type": "integer", "description": "ID laporan yang dievaluasi" },
        "keputusan": { "type": "string", "enum": ["SETUJUI", "REVISI"] },
        "ketepatan_waktu": { "type": "number", "description": "Skor nilai ketepatan waktu (diperlukan jika SETUJUI)" },
        "kesesuaian_lap": { "type": "number", "description": "Skor nilai kesesuaian tupoksi (diperlukan jika SETUJUI)" },
        "note": { "type": "string", "description": "Catatan perbaikan jika keputusan adalah REVISI" }
      },
      "required": ["nip_atasan", "id_pro_lap", "keputusan"]
    }
  }
]
```
