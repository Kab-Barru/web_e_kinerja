<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mstatus','m',TRUE);
				$this->load->model('admin/mcek','y',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['a'] = '2019';
		$data['b'] = '01';
		$data['include']='admin/status';
		$data['tahun'] = $this->y->get_tahun();
		$data['yy'] = $this->m->data();
		$data['zz'] = $this->m->sudah_proses();
		$this->load->view('content_admin',$data);
	}

	function cek()
	{
		$data['a'] = $this->input->POST('a');
		$data['b'] = $this->input->POST('b');
		$data['include']='admin/status';
		$data['tahun'] = $this->y->get_tahun();
		$data['yy'] = $this->m->data();
		$data['zz'] = $this->m->sudah_proses();
		$this->load->view('content_admin',$data);
	}

	function proses($id,$nip,$tanggal,$tot){
		$data=$this->m->proses($id,$nip,$tanggal,$tot);

	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
