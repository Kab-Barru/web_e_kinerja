<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_pegawai extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mdata_pegawai','m',TRUE);

				if (
					$this->session->userdata('lev') == 'user_admin' or
					$this->session->userdata('lev') == 'user_sdm' or
					$this->session->userdata('lev') == 'user_su' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='admin/data_pegawai';
		$data['yy'] = $this->m->get_data();
		$data['unit_kerja'] = $this->m->unit_kerja();
		$data['jabatan'] = $this->m->get_jabatan();
		$data['golongan'] = $this->m->golongan();
		$data['agama'] = $this->m->agama();
		$data['pend'] = $this->m->pendidikan();
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
		$data['golongan'] = $this->m->golongan();
		$data['agama'] = $this->m->agama();
		$data['pend'] = $this->m->pendidikan();
		$this->load->view('admin/data_pegawai_edit',$data);
	}


		function simpan()
		{
			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$c=$this->input->post('c');
			$d=$this->input->post('d');
			$e=$this->input->post('e');
			$f=$this->input->post('f');
			$g1=$this->input->post('g1');
			$g2=$this->input->post('g2');
			$pend=$this->input->post('pend');
			$data=$this->m->simpan($a,$b,$c,$d,$e,$f,$g1,$g2,$pend);
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
			$g1=$this->input->post('g1');
			$g2=$this->input->post('g2');
			$pendi=$this->input->post('pendi');
			$data=$this->m->update($a,$b,$c,$d,$e,$f,$g1,$g2,$pendi);
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
