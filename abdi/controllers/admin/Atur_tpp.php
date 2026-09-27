<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atur_tpp extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/matur_tpp','m',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='admin/atur_tpp';
		$data['yy'] = $this->m->get_data();
		$data['unit_kerja'] = $this->m->unit_kerja();
		$data['jabatan'] = $this->m->get_jabatan();
		$data['golongan'] = $this->m->golongan();
		$this->load->view('content_admin',$data);
	}

	function data()
	{
		$data=$this->m->data();
		echo json_encode($data);
	}

	function acuan()
	{
		$id = $_GET['id'];
		$data=$this->m->acuan($id);
		echo json_encode($data);
	}

	function acuanji()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuanji($id);
		$data['jabatan']=$this->m->jabatan();
		$this->load->view('admin/data_pegawai_edit',$data);
	}


		function simpan()
		{
			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$c=$this->input->post('c');
			$d=$this->input->post('d');
			$e=$this->input->post('e');
			$data=$this->m->simpan($a,$b,$c,$d,$e);
			echo json_encode($data);
		}

		function update()
		{
			$a=$this->input->post('a');
			$e=$this->input->post('e');
			$kelas=$this->input->post('kelas');
			$data=$this->m->update($a,$e,$kelas);
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
