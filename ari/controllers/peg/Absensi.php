<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('peg/mabsensi','m',TRUE);

				if ($this->session->userdata('lev') == 'user_pegawai' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='peg/absensi';
		$data['yy'] = $this->m->data();
		$this->load->view('content_pegawai',$data);
	}

	public function set($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='peg/absensi_set';
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_pegawai',$data);
	}

	function data()
	{
		$data=$this->m->data();
		echo json_encode($data);
	}

	function load_absen($id)
	{

		$data=$this->m->load_absen($id);
		echo json_encode($data);
	}

	function load_absen_detil()
	{
		$tahun = $_GET['a'];
		$bulan = $_GET['b'];
		$nik = $_GET['c'];

		$data=$this->m->load_absen_detil($tahun,$bulan,$nik);
		echo json_encode($data);
	}

	function load_absen_detil_sd()
	{
		$tahun = $_GET['a'];
		$bulan = $_GET['b'];
		$nik = $_GET['c'];

		$data=$this->m->load_absen_detil_sd($tahun,$bulan,$nik);
		echo json_encode($data);
	}

	function load_absen_detil_rs_shift()
	{
		$tahun = $_GET['a'];
		$bulan = $_GET['b'];
		$nik = $_GET['c'];

		$data=$this->m->load_absen_detil_rs_shift($tahun,$bulan,$nik);
		echo json_encode($data);
	}


	function load_absen_detil_pus_6()
	{
		$tahun = $_GET['a'];
		$bulan = $_GET['b'];
		$nik = $_GET['c'];

		$data=$this->m->load_absen_detil_pus_6($tahun,$bulan,$nik);
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
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=$this->input->post('e'); //masuk pagi
			$f=$this->input->post('f'); //masuk siang
			$g=$this->input->post('g'); //pulang
			$h=$this->input->post('h'); //total izin
			$nik=$this->input->post('nik'); //total izin
			$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
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
