<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('sdm/mdetail','m',TRUE);
				$this->load->model('admin/mdata_pegawai','y',TRUE);

				if ($this->session->userdata('lev') == 'user_su'
				&&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='sdm/detail';
		$data['yy'] = $this->m->data();
		$data['tot'] = $this->m->tot();
		$this->load->view('content_sdm',$data);
	}

	public function detil()
	{
		$data['include']='sdm/data_pegawai';
		$data['yy'] = $this->y->get_data();
		$data['unit_kerja'] = $this->y->unit_kerja1();
		$data['jabatan'] = $this->y->get_jabatan();
		$data['golongan'] = $this->y->golongan();
		$data['agama'] = $this->y->agama();
		$this->load->view('content_sdm',$data);

	}

	function data()
	{
		$data=$this->m->data();
		echo json_encode($data);
	}

	function data1($id)
	{
		$id = $this->uri->segment('4');
		$data=$this->m->data1($id);
		echo json_encode($data);
	}

	function acuan()
	{	$id=$this->input->get('id');
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
