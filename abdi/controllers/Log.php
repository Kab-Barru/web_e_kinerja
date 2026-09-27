<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mlog', '', TRUE);
        $this->db2=$this->load->database('finger', TRUE);
    }

    public function index()
    {
        $this->load->view('log');

    }

    public function proses()
    {
        $username    = $this->input->post('username', TRUE);
        $password    = $this->input->post('password', TRUE);

        $result = $this->mlog->login($username, $password);

        $this->db->where('nip', $username);


        $finger = $this->db->get('view_ref_finger')->row();
        $unit=$finger->id_unit_kerja;
        $this->db2->where('kode_unit_kerja',$unit);
      	 $ms=$this->db2->get('devices')->row();

        $us=  $this->db->where('nik',$username);
        $user=$this->db->get('ref_pegawai')->row();
        //
        // if ($result->username =='198608152007011001') {
        //   $this->session->set_flashdata('ada', 'AKSES BERMASALAH');
        //   redirect('log');
        // }


        if (!$result) {
            $this->session->set_flashdata('ada', 'Username dan Password Tidak Terdaftar');
            redirect('log');
        } else {


    $unker= $user->id_unit_kerja;
    $this->db2->where('kode_unit_kerja',$unker);
    $status=$this->db2->get('unit_kerjas')->row();
    $aktif=$status->status;



            $level = $result->lev;
             if ($level == 'user_pegawai') {
            $data = array(
                'id' => $result->id_adm,
                'nama' => $result->nama_adm,
                'username' => $result->username,
                'id_unit_kerja' => $result->id_unit_kerja,
                'log' => TRUE,
                'lev' => $result->lev,
                'id_peg' => $finger->id,
                'id_unker' => $user->id_unit_kerja,
                'nip' => $finger->nip,
                'kode_mesin' =>$ms->id,
                'status'=>$aktif,

            );
          }else{
            $data = array(
                'id' => $result->id_adm,
                'nama' => $result->nama_adm,
                'username' => $result->username,
                'id_unit_kerja' => $result->id_unit_kerja,
                'log' => TRUE,
                'lev' => $result->lev,

                'id_unker' => $user->id_unit_kerja,

                'status'=>$aktif,

            );
          }

            $this->session->set_userdata($data);

            if ($level == 'user_su') {
                redirect('su/unit_kerja');
            } else if ($level == 'user_admin') {
                redirect('admin/data_pegawai');
            } else if ($level == 'user_pegawai') {
              // if ($aktif<>'0') {
              //
              //    redirect('peg/dasb');
              //        // or($unker=='34')
              //    }else{
              //     redirect('peg/dash');
              //    }

// diaihkan langsung sementara
             redirect('peg/dash');

            }
            // redirect('peg/dash');
             else if ($level == 'user_sdm') {
                redirect('sdm/mutasi');
            } else {
                redirect('log');
            }
        }
    }




    public function logout()
    {
        $this->session->sess_destroy();
        redirect('log', 'refresh');
        echo "ok";
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
