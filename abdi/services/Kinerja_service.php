<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Kinerja Harian Pegawai Service
 * Enforces business invariants: atasan validation, duplicate prevention,
 * state machine transitions, and database transactions.
 */
class Kinerja_service
{
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('api/Kinerja_model', 'kinerja_model');
        $this->CI->load->model('api/Pegawai_model', 'pegawai_model');
        $this->CI->load->model('api/Master_model', 'master_model');
    }

    /**
     * Map numeric status to human-readable label
     */
    public function get_status_label($status)
    {
        $labels = [
            0 => 'Draft',
            1 => 'Menunggu Verifikasi Atasan',
            2 => 'Disetujui',
            3 => 'Revisi'
        ];
        return isset($labels[$status]) ? $labels[$status] : 'Tidak Diketahui';
    }

    /**
     * Get paginated list of reports for authenticated pegawai
     */
    public function get_report_list($nik, array $filters = [], $page = 1, $per_page = 15)
    {
        $page = max(1, (int)$page);
        $per_page = max(1, (int)$per_page);
        $offset = ($page - 1) * $per_page;

        $total = $this->CI->kinerja_model->count_reports($nik, $filters);
        $rows = $this->CI->kinerja_model->get_reports($nik, $filters, $per_page, $offset);

        $data = [];
        foreach ($rows as $r) {
            $data[] = [
                'id_pro_lap'    => (int)$r->id_pro_lap,
                'nik'           => $r->nik,
                'tanggal'       => $r->tanggal,
                'nik_atasan'    => $r->nik_atasan,
                'nama_atasan'   => $r->nama_atasan,
                'status'        => (int)$r->status,
                'status_label'  => $this->get_status_label((int)$r->status),
                'ket'           => $r->ket,
                'note'          => $r->note,
                'total_items'   => (int)$r->total_items,
                'tanggal_kirim' => $r->tanggal_kirim,
                'penilaian'     => [
                    'ketepatan_waktu' => $r->ketepatan_waktu !== null ? (float)$r->ketepatan_waktu : null,
                    'kesesuaian_lap'  => $r->kesesuaian_lap !== null ? (float)$r->kesesuaian_lap : null,
                    'total_skor'      => ($r->ketepatan_waktu !== null && $r->kesesuaian_lap !== null)
                        ? ((float)$r->ketepatan_waktu + (float)$r->kesesuaian_lap)
                        : null,
                ]
            ];
        }

        return [
            'items' => $data,
            'total' => $total,
            'page'  => $page,
            'per_page' => $per_page
        ];
    }

    /**
     * Create a new draft report header
     */
    public function create_report($nik, array $payload)
    {
        $tanggal = isset($payload['tanggal']) ? trim($payload['tanggal']) : date('Y-m-d');
        $ket     = isset($payload['ket']) ? trim($payload['ket']) : '0';

        // 1. Validasi format tanggal (YYYY-MM-DD)
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
            throw new Exception('Format tanggal tidak valid (harus YYYY-MM-DD).', 422);
        }

        // Cegah input tanggal di masa depan
        if ($tanggal > date('Y-m-d')) {
            throw new Exception('Tanggal laporan tidak boleh melebihi tanggal hari ini.', 422);
        }

        // 2. Prasyarat Input: Validasi data atasan pegawai
        $profile = $this->CI->pegawai_model->get_profile_by_nik($nik);
        if (!$profile || empty($profile->nik_atasan) || $profile->nik_atasan === '0') {
            throw new Exception('Anda belum memiliki atasan langsung yang terdaftar. Silakan perbarui data atasan terlebih dahulu.', 422);
        }

        // 3. Larangan Duplikasi: 1 NIP hanya boleh memiliki 1 record pada tanggal yang sama
        $existing = $this->CI->kinerja_model->find_by_nik_and_date($nik, $tanggal);
        if ($existing) {
            throw new Exception("Laporan kinerja pada tanggal $tanggal sudah pernah dibuat (ID: {$existing->id_pro_lap}).", 422);
        }

        // 4. Insert data header
        $insert_data = [
            'nik'           => $nik,
            'tanggal'       => $tanggal,
            'nik_atasan'    => $profile->nik_atasan,
            'status'        => 0, // Draft
            'ket'           => $ket,
            'note'          => null,
            'ketepatan_waktu' => null,
            'kesesuaian_lap'  => null,
            'tanggal_kirim' => null,
        ];

        $id_pro_lap = $this->CI->kinerja_model->insert_report($insert_data);

        return $this->get_report_detail($id_pro_lap, $nik);
    }

    /**
     * Get detail report including all items
     */
    public function get_report_detail($id_pro_lap, $nik = null)
    {
        $report = $this->CI->kinerja_model->get_report_by_id($id_pro_lap, $nik);

        if (!$report) {
            throw new Exception('Laporan kinerja tidak ditemukan atau Anda tidak memiliki hak akses.', 404);
        }

        $items = $this->CI->kinerja_model->get_items($id_pro_lap);

        $items_data = [];
        foreach ($items as $item) {
            $items_data[] = [
                'id_pro_lap_detil' => (int)$item->id_pro_lap_detil,
                'urutan'           => (int)$item->urutan,
                'jam'              => $item->jam,
                'uraian_tugas'     => $item->uraian_tugas,
                'output'           => $item->output,
            ];
        }

        return [
            'id_pro_lap'    => (int)$report->id_pro_lap,
            'nik'           => $report->nik,
            'nama_pegawai'  => $report->nama_pegawai,
            'tanggal'       => $report->tanggal,
            'nik_atasan'    => $report->nik_atasan,
            'nama_atasan'   => $report->nama_atasan,
            'status'        => (int)$report->status,
            'status_label'  => $this->get_status_label((int)$report->status),
            'tanggal_kirim' => $report->tanggal_kirim,
            'ket'           => $report->ket,
            'note'          => $report->note,
            'penilaian'     => [
                'ketepatan_waktu' => $report->ketepatan_waktu !== null ? (float)$report->ketepatan_waktu : null,
                'kesesuaian_lap'  => $report->kesesuaian_lap !== null ? (float)$report->kesesuaian_lap : null,
                'total_skor'      => ($report->ketepatan_waktu !== null && $report->kesesuaian_lap !== null)
                    ? ((float)$report->ketepatan_waktu + (float)$report->kesesuaian_lap)
                    : null,
            ],
            'items'         => $items_data
        ];
    }

    /**
     * Update report header keterangan (only if status is 0 Draft or 3 Revision)
     */
    public function update_report($id_pro_lap, $nik, array $payload)
    {
        $report = $this->CI->kinerja_model->get_report_by_id($id_pro_lap, $nik);

        if (!$report) {
            throw new Exception('Laporan kinerja tidak ditemukan atau bukan milik Anda.', 404);
        }

        // Business Rule: Immutability Data Approved
        if ((int)$report->status === 2) {
            throw new Exception('Laporan yang sudah disetujui (Approved) terkunci permanen dan tidak dapat diubah.', 422);
        }

        // Hanya boleh diubah jika Draft (0) atau Revisi (3)
        if (!in_array((int)$report->status, [0, 3])) {
            throw new Exception('Laporan yang sudah diajukan dan sedang menunggu verifikasi tidak dapat diubah.', 422);
        }

        $update_data = [];
        if (isset($payload['ket'])) {
            $update_data['ket'] = trim($payload['ket']);
        }

        if (empty($update_data)) {
            throw new Exception('Tidak ada field yang diubah.', 422);
        }

        $this->CI->kinerja_model->update_report($id_pro_lap, $update_data);
        return $this->get_report_detail($id_pro_lap, $nik);
    }

    /**
     * Delete report header and items (only allowed if status is 0 Draft)
     */
    public function delete_report($id_pro_lap, $nik)
    {
        $report = $this->CI->kinerja_model->get_report_by_id($id_pro_lap, $nik);

        if (!$report) {
            throw new Exception('Laporan kinerja tidak ditemukan atau bukan milik Anda.', 404);
        }

        if ((int)$report->status === 2) {
            throw new Exception('Laporan yang telah disetujui tidak dapat dihapus.', 422);
        }

        if ((int)$report->status !== 0) {
            throw new Exception('Hanya laporan berstatus Draft (0) yang dapat dihapus.', 422);
        }

        $success = $this->CI->kinerja_model->delete_report_cascade($id_pro_lap);
        if (!$success) {
            throw new Exception('Gagal menghapus laporan kinerja.', 500);
        }

        return true;
    }

    /**
     * Add activity item to report
     */
    public function add_item($id_pro_lap, $nik, array $payload)
    {
        $report = $this->CI->kinerja_model->get_report_by_id($id_pro_lap, $nik);

        if (!$report) {
            throw new Exception('Laporan kinerja tidak ditemukan atau bukan milik Anda.', 404);
        }

        if (!in_array((int)$report->status, [0, 3])) {
            throw new Exception('Rincian kegiatan hanya dapat ditambahkan pada laporan berstatus Draft atau Revisi.', 422);
        }

        if (empty($payload['uraian_tugas'])) {
            throw new Exception('Uraian tugas kegiatan kerja wajib diisi.', 422);
        }
        if (empty($payload['jam'])) {
            throw new Exception('Jam kegiatan wajib diisi (contoh: 08:00 - 09:30).', 422);
        }
        if (empty($payload['output'])) {
            throw new Exception('Output / hasil kegiatan wajib diisi.', 422);
        }

        $current_count = $this->CI->kinerja_model->count_items($id_pro_lap);
        $urutan = isset($payload['urutan']) && (int)$payload['urutan'] > 0
            ? (int)$payload['urutan']
            : ($current_count + 1);

        $item_data = [
            'id_pro_lap'   => (int)$id_pro_lap,
            'uraian_tugas' => trim($payload['uraian_tugas']),
            'jam'          => trim($payload['jam']),
            'output'       => trim($payload['output']),
            'urutan'       => $urutan,
        ];

        $id_item = $this->CI->kinerja_model->insert_item($item_data);

        return [
            'id_pro_lap_detil' => $id_item,
            'id_pro_lap'       => (int)$id_pro_lap,
            'urutan'           => $urutan,
            'jam'              => $item_data['jam'],
            'uraian_tugas'     => $item_data['uraian_tugas'],
            'output'           => $item_data['output'],
        ];
    }

    /**
     * Update an activity item
     */
    public function update_item($id_pro_lap_detil, $nik, array $payload)
    {
        $item = $this->CI->kinerja_model->get_item_by_id($id_pro_lap_detil);

        if (!$item) {
            throw new Exception('Rincian kegiatan tidak ditemukan.', 404);
        }

        if ($item->nik !== $nik) {
            throw new Exception('Anda tidak memiliki izin untuk mengubah kegiatan ini.', 403);
        }

        if (!in_array((int)$item->status, [0, 3])) {
            throw new Exception('Kegiatan hanya dapat diubah pada laporan berstatus Draft atau Revisi.', 422);
        }

        $update_data = [];
        if (isset($payload['uraian_tugas'])) {
            $update_data['uraian_tugas'] = trim($payload['uraian_tugas']);
        }
        if (isset($payload['jam'])) {
            $update_data['jam'] = trim($payload['jam']);
        }
        if (isset($payload['output'])) {
            $update_data['output'] = trim($payload['output']);
        }
        if (isset($payload['urutan'])) {
            $update_data['urutan'] = (int)$payload['urutan'];
        }

        if (empty($update_data)) {
            throw new Exception('Tidak ada perubahan yang dikirimkan.', 422);
        }

        $this->CI->kinerja_model->update_item($id_pro_lap_detil, $update_data);

        return [
            'id_pro_lap_detil' => (int)$id_pro_lap_detil,
            'id_pro_lap'       => (int)$item->id_pro_lap,
            'urutan'           => isset($update_data['urutan']) ? $update_data['urutan'] : (int)$item->urutan,
            'jam'              => isset($update_data['jam']) ? $update_data['jam'] : $item->jam,
            'uraian_tugas'     => isset($update_data['uraian_tugas']) ? $update_data['uraian_tugas'] : $item->uraian_tugas,
            'output'           => isset($update_data['output']) ? $update_data['output'] : $item->output,
        ];
    }

    /**
     * Delete an activity item
     */
    public function delete_item($id_pro_lap_detil, $nik)
    {
        $item = $this->CI->kinerja_model->get_item_by_id($id_pro_lap_detil);

        if (!$item) {
            throw new Exception('Rincian kegiatan tidak ditemukan.', 404);
        }

        if ($item->nik !== $nik) {
            throw new Exception('Anda tidak memiliki izin untuk menghapus kegiatan ini.', 403);
        }

        if (!in_array((int)$item->status, [0, 3])) {
            throw new Exception('Kegiatan hanya dapat dihapus pada laporan berstatus Draft atau Revisi.', 422);
        }

        $this->CI->kinerja_model->delete_item($id_pro_lap_detil);
        return true;
    }

    /**
     * Submit report for atasan approval
     */
    public function submit_report($id_pro_lap, $nik)
    {
        $report = $this->CI->kinerja_model->get_report_by_id($id_pro_lap, $nik);

        if (!$report) {
            throw new Exception('Laporan kinerja tidak ditemukan atau bukan milik Anda.', 404);
        }

        if (!in_array((int)$report->status, [0, 3])) {
            throw new Exception('Hanya laporan berstatus Draft (0) atau Revisi (3) yang dapat diajukan.', 422);
        }

        // 1. Pastikan minimal ada 1 item di pro_lap_detil
        $item_count = $this->CI->kinerja_model->count_items($id_pro_lap);
        if ($item_count === 0) {
            throw new Exception('Laporan tidak dapat dikirim karena belum memiliki rincian kegiatan kerja.', 422);
        }

        // 2. Refresh & pastikan data atasan terbaru
        $profile = $this->CI->pegawai_model->get_profile_by_nik($nik);
        if (!$profile || empty($profile->nik_atasan) || $profile->nik_atasan === '0') {
            throw new Exception('Data atasan langsung tidak valid. Silakan hubungi admin atau perbarui data atasan.', 422);
        }

        // 3. DB Transaction
        $this->CI->db->trans_start();

        // Graceful non-blocking attempt to sync fingerprint if needed
        $finger_note = 'Fingerprint sync bypassed or already recorded.';
        try {
            $local_finger = $this->CI->master_model->get_local_absen_finger($nik, $report->tanggal);
            if ($local_finger && !empty($local_finger->jam_pulang)) {
                // Check if "Pulang Kantor" already exists in items
                $items = $this->CI->kinerja_model->get_items($id_pro_lap);
                $has_pulang = false;
                foreach ($items as $it) {
                    if (stripos($it->uraian_tugas, 'Pulang') !== false) {
                        $has_pulang = true;
                        break;
                    }
                }

                if (!$has_pulang) {
                    $this->CI->kinerja_model->insert_item([
                        'id_pro_lap'   => (int)$id_pro_lap,
                        'uraian_tugas' => 'Pulang Kantor',
                        'jam'          => substr($local_finger->jam_pulang, 0, 5),
                        'output'       => 'Data Mesin Finger',
                        'urutan'       => count($items) + 1,
                    ]);
                    $finger_note = 'Log pulang absensi finger otomatis disisipkan.';
                }
            }
        } catch (Throwable $e) {
            // Non-blocking fallback
            $finger_note = 'Fingerprint sync dilewati: ' . $e->getMessage();
        }

        // 4. Update status = 1, tanggal_kirim = CURDATE(), nik_atasan = pegawai.nik_atasan
        $update_data = [
            'status'        => 1, // Submitted
            'tanggal_kirim' => date('Y-m-d'),
            'nik_atasan'    => $profile->nik_atasan,
        ];

        $this->CI->kinerja_model->update_report($id_pro_lap, $update_data);

        $this->CI->db->trans_complete();

        if ($this->CI->db->trans_status() === FALSE) {
            throw new Exception('Gagal memproses pengiriman laporan kinerja.', 500);
        }

        $detail = $this->get_report_detail($id_pro_lap, $nik);
        $detail['sync_note'] = $finger_note;

        return $detail;
    }
}
