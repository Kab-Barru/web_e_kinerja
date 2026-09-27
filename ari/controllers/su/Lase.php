<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lase extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('su/mlase','m',TRUE);

				if ($this->session->userdata('lev') == 'user_su' or
				$this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='su/lase';
		$data['yy'] = $this->m->get_tpp_master();
		$data['detail'] = $this->m->get_pegawai();
		$data['tot'] = $this->m->get_tot();
		$data['time'] = $this->m->get_time();

		$this->load->view('content_tes',$data);
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
