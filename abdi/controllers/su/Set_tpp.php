<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Set_tpp extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('su/mset_tpp','m',TRUE);

				if ($this->session->userdata('lev') == 'user_su' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='su/set_tpp';
		$data['yy'] = $this->m->data();
		$this->load->view('content',$data);
	}

	public function unit($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='su/set_tpp_unit';
		//$data['yy'] = $this->m->data_unit($id);
		$this->load->view('content',$data);
	}

	function data()
	{
		$data=$this->m->data();
		echo json_encode($data);
	}

	function data_unit($id)
	{

		$data=$this->m->data_unit($id);
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
			$a=$this->input->post('a'); //id_jabatan
			$b=$this->input->post('b');
			$c=$this->input->post('c'); //tpp_max
			$data=$this->m->ubah($a,$b,$c);
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
