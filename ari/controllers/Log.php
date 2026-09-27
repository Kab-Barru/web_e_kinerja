<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('mlog','',TRUE);
    }

	public function index()
	{
		$this->load->view('log');
		//$this->load->view('tes');
	}

	public function proses()
    {
        $username    = $this->input->post('username', TRUE);
        $password    = $this->input->post('password', TRUE);

        $result = $this->mlog->login($username, $password);

             if (!$result){
                 $this->session->set_flashdata('ada', 'Username dan Password Tidak Terdaftar');
                 redirect('log');
             } else {
             
                    //$level = $row['lev'];
                //  $level = $row->lev;

                  $level = $result->lev;
                    $data = array(
                        'id' => $result->id_adm,
                        'nama' => $result->nama_adm,
                        'username' => $result->username,
                        'id_unit_kerja' => $result->id_unit_kerja,
                        'log' => TRUE,
                        'lev' => $result->lev,
                    );

                        $this->session->set_userdata($data);

                    if ($level=='user_su')
                        {
                            redirect('su/unit_kerja');
                        }
						else if ($level=='user_admin')
                        {
                            redirect('admin/data_pegawai');
                        }
						else if ($level=='user_pegawai')
		                {
		                    redirect('peg/dash');
		                }
						else if ($level=='user_sdm')
				        {
				            redirect('sdm/mutasi');
				        }
						else
						{
							redirect('log');
						}



                }

                
     }




    public function logout()
    {
        $this->session->sess_destroy();
        redirect('log','refresh');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
