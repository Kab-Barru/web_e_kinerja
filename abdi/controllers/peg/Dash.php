<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peg/mdash', 'm');
		$this->load->model('peg/matasan', 'y', TRUE);
		$this->db_absen=$this->load->database('finger');

		if (
			$this->session->userdata('lev') == 'user_su'
			or $this->session->userdata('lev') == 'user_pegawai'
			&& $this->session->userdata('log') == TRUE
		) { } else {
			redirect('log');
		}
	}


	public function index()
	{
if ($_SESSION['status']<>'1') { //=='0' ganti nol

		$data['include'] = 'peg/dash';
		$data['yy'] = $this->m->getpegawai_total();

		$data['tpp'] = $this->m->tpp();
		$nik = $this->y->get_data();

		$data['nik'] = $this->y->get_data();


		$data['atasan'] = $this->y->get_atasan($nik->nik_atasan);

		$data['izin'] = $this->m->tot_izin();
		$data['halo'] = $this->m->tes();

		$data['c_5_b'] = $this->m->c_5_b();
		$data['c_5_j'] = $this->m->c_5_j();


		//kode 1 sd
		$data['c_sd_1'] = $this->m->c_sd_1();
		$data['c_sd_2'] = $this->m->c_sd_2();


		// // Shift
		$data['shift'] = $this->m->shift();


		$this->load->view('content_pegawai',$data);
	}else{
		  redirect('peg/dasb');
	}
// $data['include'] = 'peg/dash';
// 		$data['yy'] = $this->m->getpegawai_total();
//
// 		$data['tpp'] = $this->m->tpp();
// 		$nik = $this->y->get_data();
//
// 		$data['nik'] = $this->y->get_data();
//
//
// 		$data['atasan'] = $this->y->get_atasan($nik->nik_atasan);
//
// 		$data['izin'] = $this->m->tot_izin();
// 		$data['halo'] = $this->m->tes();
//
// 		$data['c_5_b'] = $this->m->c_5_b();
// 		$data['c_5_j'] = $this->m->c_5_j();
//
//
// 		//kode 1 sd
// 		$data['c_sd_1'] = $this->m->c_sd_1();
// 		$data['c_sd_2'] = $this->m->c_sd_2();
//
//
// 		// // Shift
// 		$data['shift'] = $this->m->shift();
// 	$this->load->view('content_pegawai',$data);
	}

	public function test()
	{
		$curangJumat = $this->m->getDataCurangJ();
		$curangBiasa = $this->m->getDataCurangB();

		print_r(json_encode($curangJumat));
	}

}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
