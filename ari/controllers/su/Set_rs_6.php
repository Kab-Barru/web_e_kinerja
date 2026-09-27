<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Set_rs_6 extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('su/mset_rs_6','m',TRUE);

				if ($this->session->userdata('lev') == 'user_su' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='su/set_rs_6';
		$data['yy'] = $this->m->data();
		$data['tahun'] = $this->m->tahun();
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
			$b=$this->input->post('b');
			$c=$this->input->post('c');
			$d=$this->input->post('d');
			$e=$this->input->post('e');
			$f=$this->input->post('f');
			$data=$this->m->simpan($a,$b,$c,$d,$e,$f);
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


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
