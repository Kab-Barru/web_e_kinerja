<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yu extends CI_Controller {

	
	public function index()
	{
	$data['include']='peg/yu';
	$this->load->view('content_pegawai',$data);

	}

	public function detil()
	{
		$data['include']='peg/lap_detil';
		$id_lap = $this->uri->segment(4);
		$data['detil']= $this->m->detil($id_lap);
		$this->load->view('content_pegawai',$data);
	}

	function data()
	{
		$data=$this->m->data();
		echo json_encode($data);
	}

	function data_detil($id)
	{
		$data=$this->m->data_detil($id);
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
			$a=str_replace(".", ":", $this->input->get('a'));
			$b=str_replace(".", ":", $this->input->get('b'));
			$nik = $this->session->userdata('username');
			$data=$this->m->simpan($a,$b);
			echo json_encode($data);


		}

		function simpan_detil()
		{

			$a=str_replace(".", ":", $this->input->post('a'));
			$b=str_replace(".", ":", $this->input->post('b'));

				$data=$this->m->simpan_detil($a,$b);
				echo json_encode($data);



		}

		function update()
		{
			$a=str_replace(".", ":", $this->input->post('a'));
			$b=str_replace(".", ":", $this->input->post('b'));

			//$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi

			$data=$this->m->update($a,$b,$c,$d);
			echo json_encode($data);
		}

		function hapus(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus($id);
			echo json_encode($data);
		}

		function hapus_detil(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus_detil($id);
			echo json_encode($data);
		}

		function kirim(){
			$a=$this->input->post('a');

			$cek = $this->db->query("select * from pro_lap_detil where id_pro_lap = '$a' ");
			$cekk = $cek->num_rows();
			if ($cekk > 0)
			{
				$data=$this->m->kirim($a);
				$this->session->set_flashdata('ada','Data berhasil dikirim');
				echo json_encode($data);
			}
			else {
				$data=$this->session->set_flashdata('ada','Silahkan input detil laporan terlebih dahulu !');
				echo json_encode($data);

		}
		}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
