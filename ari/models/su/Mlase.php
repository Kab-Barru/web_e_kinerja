<?php
class Mlase extends Ci_model{


    function get_tpp_master()
    {
        $query = $this->db->query("select * from tpp_master");
        $tes = $query->result();
        return $tes;
    }

    function get_pegawai()
    {
        $query = $this->db->query("select * from ref_pegawai a, ref_jabatan b where a.id_jabatan=b.id_jabatan and a.nik='123'");
        $tes = $query->result();
        return $tes;
    }

    function get_tot()
    {
        $query = $this->db->query("select
        sum(apel_masuk) as tot_apel_masuk,
        sum(apel_pulang) as tot_apel_pulang,
        sum(upacara_hari_senin) as tot_upacara_hari_senin,
        sum(upacara_hari_besar) as tot_upacara_hari_besar,
        sum(hari_kerja) as tot_hari_kerja,
        sum(jam_izin) as tot_jam_izin
        from pro_tpp where nik = '123'");
        $tes = $query->row();
        return $tes;
    }

    function get_time()
    {
        $query = $this->db->query("select * from pro_tpp where nik='123'");
        $tes = $query->result();
        return $tes;
    }

}
