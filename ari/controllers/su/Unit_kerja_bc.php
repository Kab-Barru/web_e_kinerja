<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit_kerja extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('su/munit_kerja','m',TRUE);

				if ($this->session->userdata('lev') == 'user_su' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='su/unit_kerja';
		$data['yy'] = $this->m->data();
		$this->load->view('content',$data);
	}

	function data()
	{
		$data=$this->m->data();
		echo json_encode($data);
	}

	function acuan()
	{

		$id=$this->input->get('id');
		$data=$this->m->acuan($id);
		echo json_encode($data);
	}


		function simpan()
		{
			$a=$this->input->post('a');
			$data=$this->m->simpan($a);
			echo json_encode($data);
		}

		function update()
		{
			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$data=$this->m->ubah($a,$b);
			//$data=$this->m->ubah($a);
			echo json_encode($data);
		}



		function hapus(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus($id);
			echo json_encode($data);
		}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
