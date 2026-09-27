<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mjabatan','m',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='admin/jabatan';
		$data['yy'] = $this->m->get_data();
		$data['unit_kerja'] = $this->m->unit_kerja();
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


		function simpan()
		{
			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$data=$this->m->simpan($a,$b);
			echo json_encode($data);
		}

		function update()
		{
			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$data=$this->m->update($a,$b);
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
