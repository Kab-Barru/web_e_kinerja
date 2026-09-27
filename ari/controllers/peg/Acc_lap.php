<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acc_lap extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('peg/macc_lap','m',TRUE);

				if ($this->session->userdata('lev') == 'user_pegawai' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$cek = $this->m->cek_bawahan();

		if ($cek == 0)
		{
			$data['include']='peg/acc_lap_error';
			$this->load->view('content_pegawai',$data);

		}
		else
		{
			$data['include']='peg/acc_lap';
			$data['yy'] = $this->m->get_data();
			$data['unit_kerja'] = $this->m->unit_kerja();
			$this->load->view('content_pegawai',$data);
		}


	}

	public function detil()
	{
		$data['include']='peg/acc_lap_detil';
		$data['t'] = $this->m->get_ketepatan();
		$data['k'] = $this->m->get_kesesuaian();
		$id_lap = $this->uri->segment(4);
		$data['detil']= $this->m->detil($id_lap);

		$nip = $this->m->detil($id_lap);
		$data['detil_peg']= $this->m->detil_peg($nip->nik);
		$data['cek']= $this->m->cek($nip->nik,$nip->tanggal);
		$data['cek_detil']= $this->m->cek_detil($nip->nik,$nip->tanggal);
		$data['tes']= $this->m->lap($id_lap);
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
			$a=$this->input->post('a');
			$tgl = date('Y-m-d', strtotime($a));
			$cek = $this->db->query("select * from pro_lap where tanggal = '$tgl'");
			$cekk = $cek->num_rows();
			if ($cekk == 0)
			{
				$data=$this->m->simpan($a);
				echo json_encode($data);
			}
			else {

			}

		}

		function simpan_detil()
		{

			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$c=$this->input->post('c');
			$d=$this->input->post('d');

				$data=$this->m->simpan_detil($a,$b,$c,$d);
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

		function hapus_detil(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus_detil($id);
			echo json_encode($data);
		}

		function verif(){
			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$c=$this->input->post('c');
			$d=$this->input->post('d');
			$e=$this->input->post('e'); // acuan
			$izin=$this->input->post('izin'); // acuan



			if ($a == 3) //jika revisi
			{
				$data=$this->m->revisi($a,$b,$c,$d,$e);
				$this->session->set_flashdata('ada','Proses berhasil (pilihan laporan direvisi)');
				echo json_encode($data);
			}
			else if ($a == 2) { //jika disetujui
				$data=$this->m->disetujui($a,$b,$c,$d,$e);
				$data=$this->session->set_flashdata('ada','Proses berhasil (laporan disetujui)');
				echo json_encode($data);

		}
		}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
