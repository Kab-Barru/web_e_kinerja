<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Mreset','m',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='admin/reset';
		$this->load->view('content_admin',$data);
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
			$b=$this->input->post('b');
			$c=$this->input->post('c');
			$d=$this->input->post('d');

			$data=$this->m->simpan($a,$b,$c,$d);
			echo json_encode($data);
		}

		function update()
		{
			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$c=$this->input->post('c');
			$d=$this->input->post('d');
			$e=$this->input->post('e');
			$f=$this->input->post('f');
			$g=$this->input->post('g');
			$data=$this->m->ubah($a,$b,$c,$d,$e,$f,$g);
			//$data=$this->m->ubah($a);
			echo json_encode($data);
		}



		function hapus(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus($id);
			echo json_encode($data);
		}

		function reset(){
			$id=$this->input->post('kode');
			$data=$this->m->reset($id);
			echo json_encode($data);
		}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
