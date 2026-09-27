<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tl extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mizin','m',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='admin/tl';
		$data['yy'] = $this->m->data_tl();
		$data['zz'] = $this->m->sudah_proses();
		$this->load->view('content_admin',$data);
	}

	function proses($id,$nip,$tanggal,$tot){
		$data=$this->m->proses($id,$nip,$tanggal,$tot);

	}



}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
