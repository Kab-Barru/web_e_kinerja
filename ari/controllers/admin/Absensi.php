<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mabsensi','m',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='admin/absensi';
		$data['yy'] = $this->m->data();
		$this->load->view('content_admin',$data);
	}

	public function set($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
	}

	public function set_ra($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set_ra';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
	}

	public function set_sd($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set_sd';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
	}

	public function set_smp($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set_smp';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
	}

	public function set_tk($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set_tk';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
	}

	public function set_rs_ok($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set_rs_ok';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
	}

	public function set_rs_shift($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set_rs_shift';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
	}

	public function set_rs_6($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set_rs_6';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
	}

	public function set_pus_6($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set_pus_6';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
	}

	public function set_pus_shift($id)
	{
		$id = $this->uri->segment(4);
		$data['include']='admin/absensi_set_pus_shift';
		$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
		$this->load->view('content_admin',$data);
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


	//puskesmas start
	function load_absen_detil_pus()
	{
		$tahun = $_GET['a'];
		$bulan = $_GET['b'];
		$nik = $_GET['c'];

		$data=$this->m->load_absen_detil_pus($tahun,$bulan,$nik);
		echo json_encode($data);
	}

	function load_absen_detil_pus_shift()
	{
		$tahun = $_GET['a'];
		$bulan = $_GET['b'];
		$nik = $_GET['c'];

		$data=$this->m->load_absen_detil_pus_shift($tahun,$bulan,$nik);
		echo json_encode($data);
	}

	function acuan()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit',$data);
	}


	function acuan_ra()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit_ra',$data);
	}

	function acuan_sd()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan_sd($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit_sd',$data);
	}

	function acuan_smp()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan_sd($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit_smp',$data);
	}

	function acuan_tk()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan_sd($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit_tk',$data);
	}

	function acuan_rs_ok()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan_sd($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit_rs_ok',$data);
	}

	function acuan_rs_6()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan_sd($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit_rs_shift',$data);
	}

	function acuan_rs_shift()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan_rs_shift($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit_rs_shift',$data);
	}

	function acuan_pus_6()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan_pus($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit_pus_6',$data);
	}

	function acuan_pus_shift()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuan_pus_shift($id);
		//$data['jabatan']=$this->m->jabatan();
		//$data['golongan'] = $this->m->golongan();
		$this->load->view('admin/absensi_edit_pus_shift',$data);
	}


		function simpan()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin

			$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($f,0,2);
			$dtg2_menit = substr($f,3,2);


			//kondisi penentuan jam plg
			if ($g == null)
			{
				$plgg = "16:00:00";
			}
			else if ($plg_jam < 16 )
			{
				$plgg = $g;
			}
			else {
				$plgg = "16:00:00";
			}

			//kondisi penentuan jam dtg
			if ($e == null)
			{
				$dtgg = "12:00:00";
			}
			else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else if ($dtg_jam >= 12 )
			{
				$dtgg = "12:00:00";
			}
			else {
				$dtgg = $e;
			}

			//kondisi untuk jam masuk 2 (siang)
			$day = date('D', strtotime($aa));

			if ($day == 'Fri') //jika hari jumat
			{
				if ($f == null)
				{
					$dtgg2 = "16:00:00";
				}
				else if ($dtg2_jam <= 13 &&  $dtg2_menit < 40)
				{
					$dtgg2 = "13:40:00";
				}
				else {
					$dtgg2 = $f;
				}
			}
			else
			{
				if ($f == null)
				{
					$dtgg2 = "16:00:00";
				}
				else if ($dtg2_jam <= 12 &&  $dtg2_menit < 50)
				{
					$dtgg2 = "12:50:00";
				}
				else {
					$dtgg2 = $f;
				}

			}

			//cek jika jam jam siang lebih lama dari jam pulang
			if ($dtg2_jam > $plgg)
			{
				$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
			}
			else
			{
				$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$plgg,$h,$nik);
			}



			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$plgg,$h,$nik);


			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
			echo json_encode($data);
		}



		function simpan_ra()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin

			$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($f,0,2);
			$dtg2_menit = substr($f,3,2);

			$day = date('D', strtotime($aa));

			if ($day == 'Fri') //jika hari jumat
			{
				//kondisi penentuan jam plg
				if ($g == null)
				{
					$plgg = "15:30:00";
				}
				else if ($plg_jam <= 15 && $plg_menit < 30 )
				{
					$plgg = $g;
				}
				else {
					$plgg = "15:30:00";
				}
			}
			else
			{
				//kondisi penentuan jam plg
				if ($g == null)
				{
					$plgg = "15:00:00";
				}
				else if ($plg_jam < 15 )
				{
					$plgg = $g;
				}
				else {
					$plgg = "15:00:00";
				}
			}


			//kondisi penentuan jam dtg
			if ($day == 'Fri') //jika hari jumat
			{
				if ($e == null)
				{
					$dtgg = "11:30:00";
				}
				else if ($dtg_jam < 8)
				{
					$dtgg = "08:00:00";
				}
				else if ($dtg_jam >= 11  and $dtg_menit > 0)
				{
					$dtgg = "11:30:00";
				}
				else {
					$dtgg = $e;
				}

			}
			else
			{
				if ($e == null)
				{
					$dtgg = "12:00:00";
				}
				else if ($dtg_jam < 8)
				{
					$dtgg = "08:00:00";
				}
				else if ($dtg_jam >= 12 )
				{
					$dtgg = "12:00:00";
				}
				else {
					$dtgg = $e;
				}
			}


			//kondisi untuk jam masuk 2 (siang)

			if ($day == 'Fri') //jika hari jumat
			{
				if ($f == null)
				{
					$dtgg2 = "15:30:00";
				}
				else if ($dtg2_jam <= 12 &&  $dtg2_menit < 30)
				{
					$dtgg2 = "12:30:00";
				}
				else {
					$dtgg2 = $f;
				}
			}
			else
			{
				if ($f == null)
				{
					$dtgg2 = "15:00:00";
				}
				else if ($dtg2_jam <= 12 &&  $dtg2_menit < 30)
				{
					$dtgg2 = "12:30:00";
				}
				else {
					$dtgg2 = $f;
				}

			}

			//cek jika jam jam siang lebih lama dari jam pulang
			if ($dtg2_jam > $plgg)
			{
				$data=$this->m->simpan_ra($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
			}
			else
			{
				$data=$this->m->simpan_ra($aa,$b,$c,$d,$dtgg,$dtgg2,$plgg,$h,$nik);
			}



			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$plgg,$h,$nik);


			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
			echo json_encode($data);
		}


		function simpan_sd()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin

			/*$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);
			*/

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);


		/*	//kondisi penentuan jam plg
			if ($g == null)
			{
				$plgg = "12:05:00";
			}
			else if ($plg_jam <= 12 && $plg_menit < 05 )
			{
				$plgg = $g;
			}
			else {
				$plgg = "12:05:00";
			}

			*/

			//kondisi penentuan jam dtg
			if ($e == null)
			{
				$day = date('D', strtotime($aa));
				if ($day == 'Fri') //jika hari jumat
				{
					$dtgg = "10:40:00";
				}
				else
				{
					$dtgg = "12:05:00";
				}

			}
			else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else if ($dtg_jam >= 12 )
			{
				$dtgg = "12:05:00";
			}
			else {
				$dtgg = $e;
			}

			//kondisi untuk jam pulang
			$day = date('D', strtotime($aa));

			if ($day == 'Fri') //jika hari jumat
			{
				if ($g == null)
				{
					$dtgg2 = "10:40:00";
				}
				else if ($dtg2_jam >= 10 &&  $dtg2_menit < 40)
				{
					$dtgg2 = "10:40:00";
				}
				else {
					$dtgg2 = $g;
				}
			}
			else
			{
				if ($g == null)
				{
					$dtgg2 = "12:05:00";
				}
				else if ($dtg2_jam >= 12 &&  $dtg2_menit < 05)
				{
					$dtgg2 = "12:05:00";
				}
				else {
					$dtgg2 = $g;
				}

			}

			//cek jika jam jam siang lebih lama dari jam pulang

			if ($dtg_jam > $dtg2_jam)
			{
				$data=$this->m->simpan_sd($aa,$b,$c,$d,$dtgg2,$dtgg2,$h,$nik);
			}
			else
			{
				$data=$this->m->simpan_sd($aa,$b,$c,$d,$dtgg,$dtgg2,$h,$nik);
			}

			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$plgg,$h,$nik);


			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
			echo json_encode($data);
		}

		function simpan_smp()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin

			/*$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);
			*/

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);


		/*	//kondisi penentuan jam plg
			if ($g == null)
			{
				$plgg = "12:05:00";
			}
			else if ($plg_jam <= 12 && $plg_menit < 05 )
			{
				$plgg = $g;
			}
			else {
				$plgg = "12:05:00";
			}

			*/

			//kondisi penentuan jam dtg
			$day = date('D', strtotime($aa));
			if ($day == 'Fri') //jika hari jumat
			{
				if ($e == null)
				{
						$dtgg = "11:10:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 15)
				{
					$dtgg = "07:15:00";
				}
				else if ($dtg_jam >= 11 && $dtg_menit >15 )
				{
					$dtgg = "11:10:00";
				}
				else {
					$dtgg = $e;
				}

			}
			else if ($day == 'Mon') //jika hari senin
			{
				if ($e == null)
				{
						$dtgg = "13:10:00";
				}
				else if ($dtg_jam < 7)
				{
					$dtgg = "07:00:00";
				}
				else if ($dtg_jam >= 13 && $dtg_menit >10 )
				{
					$dtgg = "13:10:00";
				}
				else {
					$dtgg = $e;
				}


			}
			else
			{
				if ($e == null)
				{
						$dtgg = "13:10:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 15)
				{
					$dtgg = "07:15:00";
				}
				else if ($dtg_jam >= 13 && $dtg_menit >10 )
				{
					$dtgg = "13:10:00";
				}
				else {
					$dtgg = $e;
				}

			}



			//kondisi untuk jam pulang
			$day = date('D', strtotime($aa));

			if ($day == 'Fri') //jika hari jumat
			{
				if ($g == null)
				{
					$dtgg2 = "11:10:00";
				}
				else if ($dtg2_jam >= 11 &&  $dtg2_menit > 10)
				{
					$dtgg2 = "11:10:00";
				}
				else if ($dtg2_jam == 11 &&  $dtg2_menit < 10)
				{
					$dtgg2 = $g;
				}
				else {
					$dtgg2 = $g;
				}
			}
			else
			{
				if ($g == null)
				{
					$dtgg2 = "13:10:00";
				}
				else if ($dtg2_jam >= 13 &&  $dtg2_menit > 10)
				{
					$dtgg2 = "13:10:00";
				}
				else if ($dtg2_jam == 13 &&  $dtg2_menit < 10)
				{
					$dtgg2 = $g;
				}
				else {
					$dtgg2 = $g;
				}

			}

			//cek jika jam jam siang lebih lama dari jam pulang

			if ($dtg_jam > $dtg2_jam)
			{
				$data=$this->m->simpan_smp($aa,$b,$c,$d,$dtgg2,$dtgg2,$h,$nik);
			}
			else
			{
				$data=$this->m->simpan_smp($aa,$b,$c,$d,$dtgg,$dtgg2,$h,$nik);
			}

			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$plgg,$h,$nik);


			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
			echo json_encode($data);
		}


		function simpan_tk()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin

			/*$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);
			*/

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);


			//kondisi penentuan jam dtg
			if ($e == null)
			{
				$dtgg = "10:30:00";
			}
			else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else if ($dtg_jam >= 10 && $dtg_menit > 30 )
			{
				$dtgg = "10:30:00";
			}
			else {
				$dtgg = $e;
			}

			//kondisi untuk jam pulang

				if ($g == null)
				{
					$dtgg2 = "10:30:00";
				}
				else if ($dtg2_jam >= 10 &&  $dtg2_menit > 30)
				{
					$dtgg2 = "10:30:00";
				}
				else if ($dtg2_jam > 10)
				{
					$dtgg2 = "10:30:00";
				}
				else {
					$dtgg2 = $g;
				}


			//cek jika jam jam siang lebih lama dari jam pulang

			if ($dtg_jam > $dtg2_jam)
			{
				$data=$this->m->simpan_tk($aa,$b,$c,$d,$dtgg2,$dtgg2,$h,$nik);
			}
			else
			{
				$data=$this->m->simpan_tk($aa,$b,$c,$d,$dtgg,$dtgg2,$h,$nik);
			}

			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$plgg,$h,$nik);


			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
			echo json_encode($data);
		}


		function update_sd()
		{
			$a=$this->input->post('aa');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			//$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$plg_jam = substr($h,0,2);
			$plg_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			/*$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);
			*/


			//kondisi penentuan jam dtg
			if ($f == null)
			{
				$dtgg = "12:05:00";
			}
			else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else if ($dtg_jam >= 12 && $dtg_menit > 05 )
			{
				$dtgg = "12:05:00";
			}
			else {
				$dtgg = $f;
			}

			//kondisi untuk jam pulang
			$day = date('D', strtotime($a));

			if ($day == 'Fri') //jika hari jumat
			{
				if ($h == null)
				{
					$dtgg2 = "10:40:00";
				}
				else if ($plg_jam >= 10 && $plg_menit >40 )
				{
					$dtgg2 = "10:40:00";
				}
				else {
					$dtgg2 = $h;
				}
			}
			else
			{
				if ($h == null)
				{
					$dtgg2 = "12:05:00";
				}
				else if ($plg_jam >= 12 &&  $plg_menit > 5)
				{
					$dtgg2 = "12:05:00";
				}
				else if ($plg_jam >= 13)
				{
					$dtgg2 = "12:05:00";
				}
				else
				{
					$dtgg2 = $h;
				}

			}

			if ($dtg_jam > $plg_jam)
			{
				//$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg2,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			else
			{
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set_sd/'.$nik);

		}


		function update_smp()
		{
			$a=$this->input->post('aa');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			//$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$plg_jam = substr($h,0,2);
			$plg_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			/*$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);
			*/

			//kondisi penentuan jam dtg
			$day = date('D', strtotime($a));
			if ($day == 'Fri') //jika hari jumat
			{
				if ($f == null)
				{
						$dtgg = "11:10:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 15)
				{
					$dtgg = "07:15:00";
				}
				else if ($dtg_jam >= 11 && $dtg_menit >15 )
				{
					$dtgg = "11:10:00";
				}
				else {
					$dtgg = $f;
				}

			}
			else if ($day == 'Mon') //jika hari senin
			{
				if ($f == null)
				{
						$dtgg = "13:10:00";
				}
				else if ($dtg_jam < 7)
				{
					$dtgg = "07:00:00";
				}
				else if ($dtg_jam >= 13 && $dtg_menit >10 )
				{
					$dtgg = "13:10:00";
				}
				else {
					$dtgg = $f;
				}


			}
			else
			{
				if ($f == null)
				{
						$dtgg = "13:10:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 15)
				{
					$dtgg = "07:15:00";
				}
				else if ($dtg_jam >= 13 && $dtg_menit >10 )
				{
					$dtgg = "13:10:00";
				}
				else {
					$dtgg = $f;
				}

			}



			//kondisi untuk jam pulang


			if ($day == 'Fri') //jika hari jumat
			{
				if ($h == null)
				{
					$dtgg2 = "11:10:00";
				}
				else if ($plg_jam >= 11 &&  $plg_menit > 10)
				{
					$dtgg2 = "11:10:00";
				}
				else if ($plg_jam > 11)
				{
					$dtgg2 = "11:10:00";
				}
				else if ($plg_jam == 11 &&  $plg_menit < 10)
				{
					$dtgg2 = $h;
				}
				else {
					$dtgg2 = $h;
				}
			}
			else
			{
				if ($h == null)
				{
					$dtgg2 = "13:10:00";
				}
				else if ($plg_jam >= 13 &&  $plg_menit > 10)
				{
					$dtgg2 = "13:10:00";
				}
				else if ($plg_jam == 13 &&  $plg_menit < 10)
				{
					$dtgg2 = $h;
				}
				else {
					$dtgg2 = $h;
				}

			}



			if ($dtg_jam > $plg_jam)
			{
				//$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg2,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			else
			{
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}

			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set_smp/'.$nik);

		}





		function simpan_rs_ok()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin

			/*$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);
			*/

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);


			//kondisi penentuan jam dtg
			if ($e == null)
			{
				$dtgg = "21:00:00";
			}
			else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else if ($dtg_jam >= 21 && $dtg_menit > 00 )
			{
				$dtgg = "21:00:00";
			}
			else {
				$dtgg = $e;
			}

			//kondisi untuk jam pulang

				if ($g == null)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam >= 21 &&  $dtg2_menit > 00)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam > 21)
				{
					$dtgg2 = "21:00:00";
				}
				else {
					$dtgg2 = $g;
				}


			//cek jika jam jam siang lebih lama dari jam pulang

			if ($dtg_jam > $dtg2_jam)
			{
				$data=$this->m->simpan_rs_ok($aa,$b,$c,$d,$dtgg2,$dtgg2,$h,$nik);
			}
			else
			{
				$data=$this->m->simpan_rs_ok($aa,$b,$c,$d,$dtgg,$dtgg2,$h,$nik);
			}

			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$plgg,$h,$nik);


			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
			echo json_encode($data);
		}




		function simpan_rs_6()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin

			/*$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);
			*/

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);


			//kondisi penentuan jam dtg
			$day = date('D', strtotime($aa));
			if ($day == 'Sat') //jika hari sabtu
			{
				if ($e == null)
				{
						$dtgg = "13:30:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 13 && $dtg_menit >30 )
				{
					$dtgg = "13:30:00";
				}
				else {
					$dtgg = $e;
				}

			}

			else
			{
				if ($e == null)
				{
						$dtgg = "14:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 14 && $dtg_menit >00 )
				{
					$dtgg = "14:00:00";
				}
				else {
					$dtgg = $e;
				}

			}



			//kondisi untuk jam pulang
			$day = date('D', strtotime($aa));

			if ($day == 'Sat') //jika hari sabtu
			{
				if ($g == null)
				{
					$dtgg2 = "13:30:00";
				}
				else if ($dtg2_jam >= 13 &&  $dtg2_menit > 30)
				{
					$dtgg2 = "13:30:00";
				}
				else if ($dtg2_jam > 13 )
				{
					$dtgg2 = "13:30:00";
				}
				else if ($dtg2_jam == 13 &&  $dtg2_menit <= 30)
				{
					$dtgg2 = $g;
				}
				else {
					$dtgg2 = $g;
				}
			}
			else
			{
				if ($g == null)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam >= 14 &&  $dtg2_menit > 00)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam == 14 &&  $dtg2_menit == 00)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam > 14)
				{
					$dtgg2 = "14:00:00";
				}
				else
				{
					$dtgg2 = $g;
				}

			}

			//cek jika jam jam siang lebih lama dari jam pulang

			if ($dtg_jam > $dtg2_jam)
			{
				$data=$this->m->simpan_rs_6($aa,$b,$c,$d,$dtgg2,$dtgg2,$h,$nik);
			}
			else
			{
				$data=$this->m->simpan_rs_6($aa,$b,$c,$d,$dtgg,$dtgg2,$h,$nik);
			}

			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$plgg,$h,$nik);


			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
			echo json_encode($data);
		}


		function simpan_rs_shift()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin
			$jenis=$this->input->post('jenis'); //jenis shift

			/*$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);
			*/

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);


			//kondisi penentuan jam dtg
			if ($jenis == '1')
			{
				if ($e == null)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 14 && $dtg_menit > 0 )
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam > 14)
				{
					$dtgg = "14:00:00";
				}
				else {
					$dtgg = $e;
				}

			}
			else if ($jenis == '2')
			{
				if ($e == null)
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam <= 14 &&  $dtg_menit < 0)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam < 14)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam >= 21 && $dtg_menit > 0 )
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam > 21)
				{
					$dtgg = "21:00:00";
				}
				else {
					$dtgg = $e;
				}

			}
			else
			{
				if ($e == null)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam <= 21 &&  $dtg_menit < 0)
				{
					$dtgg = "21:00:00";
				}

				else {
					$dtgg = $e;
				}
			}

			//kondisi untuk jam pulang
			if ($jenis == '1')
			{
				if ($g == null)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam >= 14 &&  $dtg2_menit > 0)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam > 14)
				{
					$dtgg2 = "14:00:00";
				}
				else {
					$dtgg2 = $g;
				}

			}
			else if ($jenis == '2')
			{
				if ($g == null)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam >= 21 &&  $dtg2_menit > 0)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam > 21)
				{
					$dtgg2 = "21:00:00";
				}
				else {
					$dtgg2 = $g;
				}

			}
			else
			{
				if ($g == null)
				{
					$dtgg2 = "07:30:00";
				}
				/*else if ($dtg2_jam >= 7 &&  $dtg2_menit > 30)
				{
					$dtgg2 = "07:30:00";
				}
				else if ($dtg2_jam > 7)
				{
					$dtgg2 = "07:30:00";
				}
				*/
				else {
					$dtgg2 = $g;
				}

			}

			$data=$this->m->simpan_rs_shift($aa,$b,$c,$d,$dtgg,$dtgg2,$h,$nik,$jenis);
			echo json_encode($data);
		}

		function update_rs_shift()
		{
			$a=$this->input->post('oioi');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			//$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$jenis=$this->input->post('jenis');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$dtg2_jam = substr($h,0,2);
			$dtg2_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			/*$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);
			*/

			//kondisi penentuan jam dtg
			//kondisi penentuan jam dtg
			if ($jenis == '1')
			{
				if ($f == null)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 14 && $dtg_menit > 0 )
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam > 14)
				{
					$dtgg = "14:00:00";
				}
				else {
					$dtgg = $f;
				}

			}
			else if ($jenis == '2')
			{
				if ($f == null)
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam <= 14 &&  $dtg_menit < 0)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam < 14)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam >= 21 && $dtg_menit > 0 )
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam > 21)
				{
					$dtgg = "21:00:00";
				}
				else {
					$dtgg = $f;
				}

			}
			else
			{
				if ($f == null)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam <= 21 &&  $dtg_menit < 0)
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam < 21)
				{
					$dtgg = "21:00:00";
				}

				else {
					$dtgg = $f;
				}
			}

			//kondisi untuk jam pulang
			if ($jenis == '1')
			{
				if ($h == null)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam >= 14 &&  $dtg2_menit > 0)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam > 14)
				{
					$dtgg2 = "14:00:00";
				}
				else {
					$dtgg2 = $h;
				}

			}
			else if ($jenis == '2')
			{
				if ($h == null)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam >= 21 &&  $dtg2_menit > 0)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam > 21)
				{
					$dtgg2 = "21:00:00";
				}
				else {
					$dtgg2 = $h;
				}

			}
			else
			{
				if ($h == null)
				{
					$dtgg2 = "07:30:00";
				}
				/*else if ($dtg2_jam >= 7 &&  $dtg2_menit > 30)
				{
					$dtgg2 = "07:30:00";
				}
				else if ($dtg2_jam > 7)
				{
					$dtgg2 = "07:30:00";
				}
				*/
				else {
					$dtgg2 = $h;
				}

			}




				$data=$this->m->ubah_rs_shift($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran,$jenis);

			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set_rs_shift/'.$nik);

		}

		function update_rs_6()
		{
			$a=$this->input->post('oioi');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			//$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$plg_jam = substr($h,0,2);
			$plg_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			/*$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);
			*/

			//kondisi penentuan jam dtg
			$tes = date('D', strtotime($a));
			if ($tes == "Sat")
			{
				if ($f == null)
				{
						$dtgg = "13:30:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 13 && $dtg_menit >30 )
				{
					$dtgg = "13:30:00";
				}
				else if ($dtg_jam > 13)
				{
					$dtgg = "13:30:00";
				}
				else {
					$dtgg = $f;
				}
			}
			else {
				if ($f == null)
				{
						$dtgg = "14:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 14 && $dtg_menit >0 )
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam > 14)
				{
					$dtgg = "14:00:00";
				}
				else {
					$dtgg = $f;
				}
			}

			//kondisi jam pulang
			if ($tes == "Sat")
			{
				if ($h == null)
				{
					$dtgg2 = "13:30:00";
				}
				else if ($plg_jam >= 13 &&  $plg_menit > 30)
				{
					$dtgg2 = "13:30:00";
				}
				else if ($plg_jam > 13)
				{
					$dtgg2 = "13:30:00";
				}
				else if ($plg_jam == 13 &&  $plg_menit < 30)
				{
					$dtgg2 = $h;
				}
				else {
					$dtgg2 = $h;
				}
			}
			else
			{
				if ($h == null)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($plg_jam >= 14 &&  $plg_menit > 0)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($plg_jam > 14)
				{
					$dtgg2 = "14:00:00";
				}
				else {
					$dtgg2 = $h;
				}
			}

			if ($dtg_jam > $plg_jam)
			{
				//$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg2,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			else
			{
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}

			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set_rs_6/'.$nik);

		}


		function update_tk()
		{
			$a=$this->input->post('aa');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			//$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$plg_jam = substr($h,0,2);
			$plg_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			/*$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);
			*/


			//kondisi penentuan jam dtg
			if ($f == null)
			{
				$dtgg = "10:30:00";
			}
			else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else if ($dtg_jam >= 10 && $dtg_menit > 30 )
			{
				$dtgg = "10:30:00";
			}
			else if ($dtg_jam >=10 )
			{
				$dtgg = "10:30:00";
			}
			else {
				$dtgg = $f;
			}

			//kondisi untuk jam pulang
			$day = date('D', strtotime($a));


				if ($h == null)
				{
					$dtgg2 = "10:30:00";
				}
				else if ($plg_jam >= 10 && $plg_menit >40 )
				{
					$dtgg2 = "10:30:00";
				}
				else if ($plg_jam > 10)
				{
					$dtgg2 = "10:30:00";
				}
				else {
					$dtgg2 = $h;
				}




			if ($dtg_jam > $plg_jam)
			{
				//$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg2,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			else
			{
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set_sd/'.$nik);

		}


		function update_rs_ok()
		{
			$a=$this->input->post('aa');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			//$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$plg_jam = substr($h,0,2);
			$plg_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			/*$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);
			*/


			//kondisi penentuan jam dtg
			if ($f == null)
			{
				$dtgg = "21:00:00";
			}
			else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else if ($dtg_jam >= 21 && $dtg_menit > 00 )
			{
				$dtgg = "21:00:00";
			}
			else if ($dtg_jam >=21 )
			{
				$dtgg = "21:00:00";
			}
			else {
				$dtgg = $f;
			}

			//kondisi untuk jam pulang
			$day = date('D', strtotime($a));


				if ($h == null)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($plg_jam >= 21 && $plg_menit >00 )
				{
					$dtgg2 = "21:00:00";
				}
				else if ($plg_jam > 21)
				{
					$dtgg2 = "21:00:00";
				}
				else {
					$dtgg2 = $h;
				}




			if ($dtg_jam > $plg_jam)
			{
				//$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg2,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			else
			{
				$data=$this->m->ubah_sd($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set_sd/'.$nik);

		}



		function update_ra()
		{
			$a=$this->input->post('aa');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$plg_jam = substr($h,0,2);
			$plg_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);

			$day = date('D', strtotime($a));


			//kondisi penentuan jam plg
			if ($day == 'Fri') //jika hari jumat
			{
				//kondisi penentuan jam plg
				if ($h == null)
				{
					$plgg = "15:30:00";
				}
				else if ($plg_jam <= 15 && $plg_menit < 30 )
				{
					$plgg = $h;
				}
				else {
					$plgg = "15:30:00";
				}
			}
			else
			{
				//kondisi penentuan jam plg
				if ($h == null)
				{
					$plgg = "15:00:00";
				}
				else if ($plg_jam < 15 )
				{
					$plgg = $h;
				}
				else {
					$plgg = "15:00:00";
				}
			}


			//kondisi penentuan jam dtg
			if ($f == null)
			{
				$dtgg = "12:00:00";
			}
			else if ($dtg_jam < 8)
			{
				$dtgg = "08:00:00";
			}
			else if ($dtg_jam >= 12 )
			{
				$dtgg = "12:00:00";
			}
			else {
				$dtgg = $f;
			}


			//kondisi untuk jam masuk 2 (siang)
			if ($day == 'Fri') //jika hari jumat
			{
				if ($g == null)
				{
					$dtgg2 = "15:30:00";
				}
				else if ($dtg2_jam <= 13 &&  $dtg2_menit < 30)
				{
					$dtgg2 = "13:30:00";
				}
				else {
					$dtgg2 = $g;
				}
			}
			else
			{
				if ($g == null)
				{
					$dtgg2 = "15:00:00";
				}
				else if ($dtg2_jam <= 12 &&  $dtg2_menit < 30)
				{
					$dtgg2 = "12:30:00";
				}
				else {
					$dtgg2 = $g;
				}

			}


			if ($dtg2_jam > $plg_jam)
			{
				//$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
				$data=$this->m->ubah($a,$b,$c,$d,$e,$dtgg2,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			else
			{
				$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}

			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set_ra/'.$nik);

		}




		function update()
		{
			$a=$this->input->post('aa');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$plg_jam = substr($h,0,2);
			$plg_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);


			//kondisi penentuan jam plg
			if ($h == null)
			{
				$plgg = "16:00:00";
			}
			else if ($plg_jam < 16 )
			{
				$plgg = $h;
			}
			else {
				$plgg = "16:00:00";
			}

			//kondisi penentuan jam dtg
			if ($f == null)
			{
				$dtgg = "12:00:00";
			}
			else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else if ($dtg_jam >= 12 )
			{
				$dtgg = "12:00:00";
			}
			else {
				$dtgg = $f;
			}

			//kondisi untuk jam masuk 2 (siang)
			$day = date('D', strtotime($a));

			if ($day == 'Fri') //jika hari jumat
			{
				if ($g == null)
				{
					$dtgg2 = "16:00:00";
				}
				else if ($dtg2_jam <= 13 &&  $dtg2_menit < 40)
				{
					$dtgg2 = "13:40:00";
				}
				else if ($dtg_jam >= 12 )
				{
					$dtgg = "12:00:00";
				}
				else {
					$dtgg2 = $g;
				}
			}
			else
			{
				if ($g == null)
				{
					$dtgg2 = "16:00:00";
				}
				else if ($dtg2_jam <= 12 &&  $dtg2_menit < 50)
				{
					$dtgg2 = "12:50:00";
				}
				else {
					$dtgg2 = $g;
				}

			}

			if ($dtg2_jam > $plg_jam)
			{
				//$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
				$data=$this->m->ubah($a,$b,$c,$d,$e,$dtgg2,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			else
			{
				$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}

			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set/'.$nik);

		}



		//puskesmas start

		function simpan_pus_6()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin

			/*$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);
			*/

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);


			//kondisi penentuan jam dtg
			$day = date('D', strtotime($aa));
			if ($day == 'Fri') //jika hari jumat
			{
				if ($e == null)
				{
						$dtgg = "12:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam > 12)
				{
					$dtgg = "12:00:00";
				}
				else if ($dtg_jam > 12 && $dtg_menit < 0)
				{
					$dtgg = "12:00:00";
				}
				else {
					$dtgg = $e;
				}

			}

			else
			{
				if ($e == null)
				{
						$dtgg = "14:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 14 && $dtg_menit >00 )
				{
					$dtgg = "14:00:00";
				}
				else {
					$dtgg = $e;
				}

			}



			//kondisi untuk jam pulang
			$day = date('D', strtotime($aa));

			if ($day == 'Fri') //jika hari jumat
			{
				if ($g == null)
				{
					$dtgg2 = "12:00:00";
				}
				else if ($dtg2_jam > 12 &&  $dtg2_menit > 0)
				{
					$dtgg2 = "12:00:00";
				}
				else if ($dtg2_jam > 12 )
				{
					$dtgg2 = "12:00:00";
				}
				else {
					$dtgg2 = $g;
				}
			}
			else
			{
				if ($g == null)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam >= 14 &&  $dtg2_menit > 00)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam == 14 &&  $dtg2_menit == 00)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam > 14)
				{
					$dtgg2 = "14:00:00";
				}
				else
				{
					$dtgg2 = $g;
				}

			}

			//cek jika jam jam siang lebih lama dari jam pulang

			if ($dtg_jam > $dtg2_jam)
			{
				$data=$this->m->simpan_pus_6($aa,$b,$c,$d,$dtgg2,$dtgg2,$h,$nik);
			}
			else
			{
				$data=$this->m->simpan_pus_6($aa,$b,$c,$d,$dtgg,$dtgg2,$h,$nik);
			}

			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$plgg,$h,$nik);


			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
			echo json_encode($data);
		}

		function update_pus_6()
		{
			$a=$this->input->post('oioi');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			//$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$plg_jam = substr($h,0,2);
			$plg_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			/*$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);
			*/

			//kondisi penentuan jam dtg
			$tes = date('D', strtotime($a));
			if ($tes == "Fri")
			{
				if ($f == null)
				{
						$dtgg = "12:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 12 && $dtg_menit >0 )
				{
					$dtgg = "12:00:00";
				}
				else if ($dtg_jam > 12)
				{
					$dtgg = "12:00:00";
				}
				else {
					$dtgg = $f;
				}
			}
			else {
				if ($f == null)
				{
						$dtgg = "14:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 14 && $dtg_menit >0 )
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam > 14)
				{
					$dtgg = "14:00:00";
				}
				else {
					$dtgg = $f;
				}
			}

			//kondisi jam pulang
			if ($tes == "Fri")
			{
				if ($h == null)
				{
					$dtgg2 = "12:00:00";
				}
				else if ($plg_jam >= 12 &&  $plg_menit > 0)
				{
					$dtgg2 = "12:00:00";
				}
				else if ($plg_jam > 12)
				{
					$dtgg2 = "12:00:00";
				}
				else {
					$dtgg2 = $h;
				}
			}
			else
			{
				if ($h == null)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($plg_jam >= 14 &&  $plg_menit > 0)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($plg_jam > 14)
				{
					$dtgg2 = "14:00:00";
				}
				else {
					$dtgg2 = $h;
				}
			}

			if ($dtg_jam > $plg_jam)
			{
				//$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$dtgg2,$h,$nik);
				$data=$this->m->ubah_pus($a,$b,$c,$d,$e,$dtgg2,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}
			else
			{
				$data=$this->m->ubah_pus($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			}

			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set_pus_6/'.$nik);

		}


		function simpan_pus_shift()
		{
			$a=$this->input->post('a'); //tgl
			$aa = date('Y-m-d', strtotime($a));
			$b=$this->input->post('b'); //status kehadiran
			$c=$this->input->post('c'); //apel / upacara
			$d=$this->input->post('d'); //apel pulang
			$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi
			$f=str_replace(".", ":", $this->input->post('f')); //masuk siang
			$g=str_replace(".", ":", $this->input->post('g')); //pulang
			$h=str_replace(".", ":", $this->input->post('h')); //total izin
			$nik=$this->input->post('nik'); //total izin
			$jenis=$this->input->post('jenis'); //jenis shift

			/*$plg_jam = substr($g,0,2);
			$plg_menit = substr($g,3,2);
			*/

			$dtg_jam = substr($e,0,2);
			$dtg_menit = substr($e,3,2);

			$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);


			//kondisi penentuan jam dtg
			if ($jenis == '1')
			{
				if ($e == null)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 14 && $dtg_menit > 0 )
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam > 14)
				{
					$dtgg = "14:00:00";
				}
				else {
					$dtgg = $e;
				}

			}
			else if ($jenis == '2')
			{
				if ($e == null)
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam <= 14 &&  $dtg_menit < 0)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam < 14)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam >= 21 && $dtg_menit > 0 )
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam > 21)
				{
					$dtgg = "21:00:00";
				}
				else {
					$dtgg = $e;
				}

			}
			else
			{
				if ($e == null)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam <= 21 &&  $dtg_menit < 0)
				{
					$dtgg = "21:00:00";
				}

				else
				{
					$dtgg = $e;
				}
			}

			//kondisi untuk jam pulang
			if ($jenis == '1')
			{
				if ($g == null)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam >= 14 &&  $dtg2_menit > 0)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam > 14)
				{
					$dtgg2 = "14:00:00";
				}
				else {
					$dtgg2 = $g;
				}

			}
			else if ($jenis == '2')
			{
				if ($g == null)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam >= 21 &&  $dtg2_menit > 0)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam > 21)
				{
					$dtgg2 = "21:00:00";
				}
				else {
					$dtgg2 = $g;
				}

			}
			else
			{
				if ($g == null)
				{
					$dtgg2 = "07:30:00";
				}
				/*
				else if ($dtg2_jam >= 7 &&  $dtg2_menit > 30)
				{
					$dtgg2 = "07:30:00";
				}
				else if ($dtg2_jam > 7)
				{
					$dtgg2 = "07:30:00";
				}
				*/
				else {
					$dtgg2 = $g;
				}

			}

			$data=$this->m->simpan_pus_shift($aa,$b,$c,$d,$dtgg,$dtgg2,$h,$nik,$jenis);
			echo json_encode($data);
		}


		function update_pus_shift()
		{
			$a=$this->input->post('oioi');
			$b=$this->input->post('bb');
			$c=$this->input->post('cc');
			$d=$this->input->post('dd');
			$e=$this->input->post('ee');
			$f=$this->input->post('ff'); //jam jam_masuk_1
			//$g=$this->input->post('gg');//jam jam_masuk_2
			$h=$this->input->post('hh');//jam pulang
			$i=$this->input->post('ii');
			$id=$this->input->post('id');
			$nik=$this->input->post('nik');
			$jenis=$this->input->post('jenis');
			$status_kehadiran=$this->input->post('status_kehadiran');

			$dtg2_jam = substr($h,0,2);
			$dtg2_menit = substr($h,3,2);

			$dtg_jam = substr($f,0,2);
			$dtg_menit = substr($f,3,2);

			/*$dtg2_jam = substr($g,0,2);
			$dtg2_menit = substr($g,3,2);
			*/

			//kondisi penentuan jam dtg
			//kondisi penentuan jam dtg
			if ($jenis == '1')
			{
				if ($f == null)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam <= 07 &&  $dtg_menit < 30)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam >= 14 && $dtg_menit > 0 )
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam > 14)
				{
					$dtgg = "14:00:00";
				}
				else {
					$dtgg = $f;
				}

			}
			else if ($jenis == '2')
			{
				if ($f == null)
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam <= 14 &&  $dtg_menit < 0)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam < 14)
				{
					$dtgg = "14:00:00";
				}
				else if ($dtg_jam >= 21 && $dtg_menit > 0 )
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam > 21)
				{
					$dtgg = "21:00:00";
				}
				else {
					$dtgg = $f;
				}

			}
			else
			{
				if ($f == null)
				{
					$dtgg = "07:30:00";
				}
				else if ($dtg_jam <= 21 &&  $dtg_menit < 0)
				{
					$dtgg = "21:00:00";
				}
				else if ($dtg_jam < 21)
				{
					$dtgg = "21:00:00";
				}

				else {
					$dtgg = $f;
				}
			}

			//kondisi untuk jam pulang
			if ($jenis == '1')
			{
				if ($h == null)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam >= 14 &&  $dtg2_menit > 0)
				{
					$dtgg2 = "14:00:00";
				}
				else if ($dtg2_jam > 14)
				{
					$dtgg2 = "14:00:00";
				}
				else {
					$dtgg2 = $h;
				}

			}
			else if ($jenis == '2')
			{
				if ($h == null)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam >= 21 &&  $dtg2_menit > 0)
				{
					$dtgg2 = "21:00:00";
				}
				else if ($dtg2_jam > 21)
				{
					$dtgg2 = "21:00:00";
				}
				else {
					$dtgg2 = $h;
				}

			}
			else
			{
				if ($h == null)
				{
					$dtgg2 = "07:30:00";
				}
				else if ($dtg2_jam >= 7 &&  $dtg2_menit > 30)
				{
					$dtgg2 = "07:30:00";
				}
				else if ($dtg2_jam > 7)
				{
					$dtgg2 = "07:30:00";
				}
				else {
					$dtgg2 = $h;
				}

			}




				$data=$this->m->ubah_pus_shift($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran,$jenis);

			//$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set_pus_shift/'.$nik);

		}




		function hapus(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus($id);
			echo json_encode($data);
		}

		function hapus_sd(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus_sd($id);
			echo json_encode($data);
		}

		function hapus_rs(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus_rs($id);
			echo json_encode($data);
		}

		function hapus_pus(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus_pus($id);
			echo json_encode($data);
		}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
