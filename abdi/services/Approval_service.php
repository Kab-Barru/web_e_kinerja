<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Approval & Evaluasi Atasan Service
 * Implements supervisor evaluation, punctuality rule calculations,
 * ref_izin verification, and transaction-safe decisions.
 */
class Approval_service
{
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('api/Approval_model', 'approval_model');
        $this->CI->load->model('api/Kinerja_model', 'kinerja_model');
        $this->CI->load->model('api/Pegawai_model', 'pegawai_model');
    }

    /**
     * Get list of direct subordinates
     */
    public function get_subordinates($nik_atasan)
    {
        $rows = $this->CI->approval_model->get_subordinates($nik_atasan);

        $data = [];
        foreach ($rows as $r) {
            $data[] = [
                'nik'                   => $r->nik,
                'nama'                  => $r->nama,
                'jabatan'               => $r->jabatan,
                'unit_kerja'            => $r->unit_kerja,
                'pending_reports_count' => (int)$r->pending_reports_count,
            ];
        }

        return $data;
    }

    /**
     * Get pending submitted reports awaiting review
     */
    public function get_pending_reports($nik_atasan, array $filters = [], $page = 1, $per_page = 15)
    {
        $page = max(1, (int)$page);
        $per_page = max(1, (int)$per_page);
        $offset = ($page - 1) * $per_page;

        $total = $this->CI->approval_model->count_pending_reports($nik_atasan, $filters);
        $rows  = $this->CI->approval_model->get_pending_reports($nik_atasan, $filters, $per_page, $offset);

        $data = [];
        foreach ($rows as $r) {
            $data[] = [
                'id_pro_lap'    => (int)$r->id_pro_lap,
                'nik'           => $r->nik,
                'nama_bawahan'  => $r->nama_bawahan,
                'jabatan'       => $r->jabatan,
                'unit_kerja'    => $r->unit_kerja,
                'tanggal'       => $r->tanggal,
                'tanggal_kirim' => $r->tanggal_kirim,
                'status'        => (int)$r->status,
                'status_label'  => 'Menunggu Verifikasi Atasan',
                'ket'           => $r->ket,
                'total_items'   => (int)$r->total_items,
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
     * Calculate submission punctuality compliance based on OPD unit code & day of week
     *
     * @param string $tanggal_laporan YYYY-MM-DD
     * @param string|null $tanggal_kirim YYYY-MM-DD
     * @param int|string $opd_kode
     * @return array
     */
    public function calculate_punctuality($tanggal_laporan, $tanggal_kirim, $opd_kode = 0)
    {
        if (empty($tanggal_kirim)) {
            $tanggal_kirim = date('Y-m-d');
        }

        $tgl_lap   = date_create($tanggal_laporan);
        $tgl_krm   = date_create($tanggal_kirim);
        $diff      = date_diff($tgl_krm, $tgl_lap);
        $selisih   = (int)$diff->format("%a");

        $day_name  = date('D', strtotime($tanggal_laporan)); // Mon, Tue, Wed, Thu, Fri, Sat, Sun
        $opd_kode  = (int)$opd_kode;
        $is_tepat  = false;

        if ($opd_kode === 1 || $opd_kode === 2 || $opd_kode === 5) {
            // OPD 6 hari kerja
            if ($day_name !== 'Sat') {
                $is_tepat = ($selisih <= 1);
            } else {
                // Khusus hari Sabtu, toleransi s/d Selasa (<= 3 hari)
                $is_tepat = ($selisih <= 3);
            }
        } else {
            // OPD standar 5 hari kerja (kode 0 atau lainnya)
            if ($day_name !== 'Fri') {
                $is_tepat = ($selisih <= 1);
            } else {
                // Khusus hari Jumat, toleransi s/d Senin (<= 3 hari)
                $is_tepat = ($selisih <= 3);
            }
        }

        return [
            'selisih_hari'      => $selisih,
            'hari_laporan'      => $day_name,
            'opd_kode'          => $opd_kode,
            'status_ketepatan'  => $is_tepat ? 'TEPAT WAKTU' : 'TERLAMBAT',
            'is_tepat_waktu'    => $is_tepat,
        ];
    }

    /**
     * Get complete report details for supervisor evaluation
     */
    public function get_review_detail($id_pro_lap, $nik_atasan)
    {
        $report = $this->CI->approval_model->get_report_for_review($id_pro_lap, $nik_atasan);

        if (!$report) {
            throw new Exception('Laporan tidak ditemukan atau Anda tidak memiliki wewenang untuk memeriksa laporan ini.', 404);
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

        // Cek catatan izin pada tanggal terkait di ref_izin
        $izin_data = null;
        $izin = $this->CI->approval_model->get_izin_info($report->nik, $report->tanggal);
        if ($izin) {
            $izin_data = [
                'id_izin'    => (int)$izin->id_izin,
                'tanggal'    => $izin->tanggal,
                'total_izin' => $izin->total_izin,
                'status_izin'=> (int)$izin->sta === 1 ? 'Disetujui' : 'Menunggu',
            ];
        }

        // Kalkulasi ketepatan waktu pengiriman
        $evaluasi_waktu = $this->calculate_punctuality(
            $report->tanggal,
            $report->tanggal_kirim,
            $report->kode_unit_kerja
        );

        return [
            'laporan' => [
                'id_pro_lap'    => (int)$report->id_pro_lap,
                'nik'           => $report->nik,
                'nama_bawahan'  => $report->nama_bawahan,
                'jabatan'       => $report->jabatan,
                'unit_kerja'    => $report->unit_kerja,
                'tanggal'       => $report->tanggal,
                'tanggal_kirim' => $report->tanggal_kirim,
                'status'        => (int)$report->status,
                'status_label'  => 'Menunggu Verifikasi Atasan',
                'ket'           => $report->ket,
                'note'          => $report->note,
            ],
            'evaluasi_kepatuhan' => $evaluasi_waktu,
            'catatan_izin'       => $izin_data,
            'items'              => $items_data,
        ];
    }

    /**
     * Submit decision on subordinate report (SETUJUI or REVISI)
     */
    public function decide_report($id_pro_lap, $nik_atasan, array $payload)
    {
        $report = $this->CI->approval_model->get_report_for_review($id_pro_lap, $nik_atasan);

        if (!$report) {
            throw new Exception('Laporan tidak ditemukan atau Anda tidak memiliki wewenang untuk memeriksa laporan ini.', 404);
        }

        if ((int)$report->status === 2) {
            throw new Exception('Laporan ini sudah disetujui sebelumnya dan tidak dapat diubah.', 422);
        }

        $keputusan = isset($payload['keputusan']) ? strtoupper(trim($payload['keputusan'])) : '';

        if (!in_array($keputusan, ['SETUJUI', 'REVISI'])) {
            throw new Exception("Keputusan tidak valid. Pilihan yang diizinkan: 'SETUJUI' atau 'REVISI'.", 422);
        }

        $this->CI->db->trans_start();

        if ($keputusan === 'SETUJUI') {
            if (!isset($payload['ketepatan_waktu']) || !isset($payload['kesesuaian_lap'])) {
                throw new Exception('Skor ketepatan_waktu dan kesesuaian_lap wajib disertakan untuk persetujuan.', 422);
            }

            $update_data = [
                'status'          => 2, // Approved
                'ketepatan_waktu' => (float)$payload['ketepatan_waktu'],
                'kesesuaian_lap'  => (float)$payload['kesesuaian_lap'],
                'note'            => null, // Reset revisi note
            ];
            $message = 'Laporan kinerja bawahan berhasil disetujui.';
        } else {
            // REVISI
            if (empty($payload['note'])) {
                throw new Exception('Catatan evaluasi/revisi (note) wajib diisi jika laporan ditolak sementara untuk direvisi.', 422);
            }

            $update_data = [
                'status'          => 3, // Revision
                'note'            => trim($payload['note']),
                'ketepatan_waktu' => 0,
                'kesesuaian_lap'  => 0,
            ];
            $message = 'Laporan dikembalikan ke bawahan dengan catatan revisi.';
        }

        $this->CI->approval_model->save_decision($id_pro_lap, $update_data);
        $this->CI->db->trans_complete();

        if ($this->CI->db->trans_status() === FALSE) {
            throw new Exception('Gagal menyimpan keputusan evaluasi laporan.', 500);
        }

        return [
            'id_pro_lap' => (int)$id_pro_lap,
            'keputusan'  => $keputusan,
            'status'     => $update_data['status'],
            'message'    => $message,
            'penilaian'  => [
                'ketepatan_waktu' => $update_data['ketepatan_waktu'],
                'kesesuaian_lap'  => $update_data['kesesuaian_lap'],
                'note'            => $update_data['note']
            ]
        ];
    }
}
