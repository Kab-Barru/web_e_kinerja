<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Master Data & External Integration Service
 * Manages evaluation score templates and attendance log synchronization.
 */
class Master_service
{
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('api/Master_model', 'master_model');
        $this->CI->load->model('api/Kinerja_model', 'kinerja_model');
        $this->CI->load->model('api/Pegawai_model', 'pegawai_model');
    }

    /**
     * Get evaluation score configuration options
     */
    public function get_skor_penilaian()
    {
        $ketepatan = $this->CI->master_model->get_options_ketepatan_waktu();
        $kesesuaian = $this->CI->master_model->get_options_kesesuaian();

        return [
            'ketepatan_waktu' => $ketepatan,
            'kesesuaian_lap'  => $kesesuaian,
        ];
    }

    /**
     * Synchronize daily fingerprint attendance into report items
     *
     * @param string $nik
     * @param string $tanggal YYYY-MM-DD
     * @return array
     */
    public function sync_daily_fingerprint($nik, $tanggal)
    {
        if (empty($nik) || empty($tanggal)) {
            throw new Exception('NIK dan tanggal wajib diisi.', 422);
        }

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
            throw new Exception('Format tanggal tidak valid (harus YYYY-MM-DD).', 422);
        }

        // Cek apakah sudah ada laporan header pada tanggal ini
        $report = $this->CI->kinerja_model->find_by_nik_and_date($nik, $tanggal);

        if (!$report) {
            // Jika belum ada header, buat header draft otomatis
            $profile = $this->CI->pegawai_model->get_profile_by_nik($nik);
            if (!$profile || empty($profile->nik_atasan) || $profile->nik_atasan === '0') {
                throw new Exception('Pegawai belum memiliki atasan langsung yang terdaftar.', 422);
            }

            $id_pro_lap = $this->CI->kinerja_model->insert_report([
                'nik'        => $nik,
                'tanggal'    => $tanggal,
                'nik_atasan' => $profile->nik_atasan,
                'status'     => 0, // Draft
                'ket'        => '0',
            ]);
        } else {
            $id_pro_lap = (int)$report->id_pro_lap;
            if ((int)$report->status === 2) {
                throw new Exception('Laporan tanggal ini sudah disetujui dan tidak dapat dimutasi.', 422);
            }
        }

        // Ambil data absensi lokal atau remote
        $finger_data = $this->CI->master_model->get_local_absen_finger($nik, $tanggal);
        $jam_masuk = null;
        $jam_pulang = null;

        if ($finger_data) {
            $jam_masuk  = !empty($finger_data->jam_masuk) ? substr($finger_data->jam_masuk, 0, 5) : null;
            $jam_pulang = !empty($finger_data->jam_pulang) ? substr($finger_data->jam_pulang, 0, 5) : null;
        } else {
            $remote = $this->CI->master_model->fetch_remote_finger_attendance($nik, $tanggal);
            if ($remote) {
                $jam_masuk  = !empty($remote['jam_masuk']) ? substr($remote['jam_masuk'], 0, 5) : null;
                $jam_pulang = !empty($remote['jam_pulang']) ? substr($remote['jam_pulang'], 0, 5) : null;
            }
        }

        $inserted = [];
        $existing_items = $this->CI->kinerja_model->get_items($id_pro_lap);
        $has_masuk = false;
        $has_pulang = false;

        foreach ($existing_items as $item) {
            if (stripos($item->uraian_tugas, 'Masuk Kantor') !== false) {
                $has_masuk = true;
            }
            if (stripos($item->uraian_tugas, 'Pulang Kantor') !== false) {
                $has_pulang = true;
            }
        }

        $this->CI->db->trans_start();

        if ($jam_masuk && !$has_masuk) {
            $item_id = $this->CI->kinerja_model->insert_item([
                'id_pro_lap'   => $id_pro_lap,
                'uraian_tugas' => 'Masuk Kantor',
                'jam'          => $jam_masuk,
                'output'       => 'Data Mesin Finger',
                'urutan'       => 1,
            ]);
            $inserted[] = 'Masuk Kantor (' . $jam_masuk . ')';
        }

        if ($jam_pulang && !$has_pulang) {
            $count = $this->CI->kinerja_model->count_items($id_pro_lap);
            $item_id = $this->CI->kinerja_model->insert_item([
                'id_pro_lap'   => $id_pro_lap,
                'uraian_tugas' => 'Pulang Kantor',
                'jam'          => $jam_pulang,
                'output'       => 'Data Mesin Finger',
                'urutan'       => $count + 1,
            ]);
            $inserted[] = 'Pulang Kantor (' . $jam_pulang . ')';
        }

        $this->CI->db->trans_complete();

        return [
            'id_pro_lap'         => $id_pro_lap,
            'nik'                => $nik,
            'tanggal'            => $tanggal,
            'log_finger'         => [
                'jam_masuk'  => $jam_masuk ?: 'Tidak terdeteksi',
                'jam_pulang' => $jam_pulang ?: 'Tidak terdeteksi',
            ],
            'item_disinkronkan'  => $inserted,
            'catatan'            => count($inserted) > 0
                ? 'Sinkronisasi berhasil: ' . implode(', ', $inserted)
                : 'Tidak ada data presensi baru yang perlu ditambahkan.'
        ];
    }
}
