<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cek extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mcek','m',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		//$id = $this->uri->segment(4);
		$data['include']='admin/cek';
		//$data['pegawai']=$this->m->get_pegawai($id);
		$data['tahun'] = $this->m->get_tahun();
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

	function cek()
	{
		$tahun = $_GET['a'];
		$bulan = $_GET['b'];
		$nik = $_GET['c'];

		$data=$this->m->cek($tahun,$bulan,$nik);
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
			if ($plg_jam < 16 )
			{
				$plgg = $g;
			}
			else {
				$plgg = "16:00:00";
			}

			//kondisi penentuan jam dtg
			if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else {
				$dtgg = $e;
			}

			//kondisi untuk jam masuk 2 (siang)
			$day = date('D', strtotime($aa));

			if ($day == 'Fri') //jika hari jumat
			{
				if ($dtg2_jam <= 13 &&  $dtg2_menit < 40)
				{
					$dtgg2 = "13:40:00";
				}
				else {
					$dtgg2 = $f;
				}
			}
			else
			{
				if ($dtg2_jam <= 12 &&  $dtg2_menit < 50)
				{
					$dtgg2 = "12:50:00";
				}
				else {
					$dtgg2 = $f;
				}

			}



			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$plgg,$h,$nik);
			$data=$this->m->simpan($aa,$b,$c,$d,$dtgg,$dtgg2,$plgg,$h,$nik);

			//$data=$this->m->simpan($aa,$b,$c,$d,$e,$f,$g,$h,$nik);
			echo json_encode($data);
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
			if ($plg_jam < 16 )
			{
				$plgg = $h;
			}
			else {
				$plgg = "16:00:00";
			}

			//kondisi penentuan jam dtg
			if ($dtg_jam <= 07 &&  $dtg_menit < 30)
			{
				$dtgg = "07:30:00";
			}
			else {
				$dtgg = $f;
			}

			//kondisi untuk jam masuk 2 (siang)
			$day = date('D', strtotime($a));

			if ($day == 'Fri') //jika hari jumat
			{
				if ($dtg2_jam <= 13 &&  $dtg2_menit < 40)
				{
					$dtgg2 = "13:40:00";
				}
				else {
					$dtgg2 = $g;
				}
			}
			else
			{
				if ($dtg2_jam <= 12 &&  $dtg2_menit < 50)
				{
					$dtgg2 = "12:50:00";
				}
				else {
					$dtgg2 = $g;
				}

			}
			$data=$this->m->ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran);
			redirect ('admin/absensi/set/'.$nik);

		}



		function hapus(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus($id);
			echo json_encode($data);
		}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
