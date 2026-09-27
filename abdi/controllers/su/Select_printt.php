<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Select_printt extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('su/mdetail','h',TRUE);
				$this->load->model('admin/mtpp','y',TRUE);
				$this->load->model('su/mprintt','m',TRUE);

				if ($this->session->userdata('lev') == 'user_su'
				or $this->session->userdata('lev') == 'user_sdm' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='su/select_printt';
		$data['yy'] = $this->h->data();
		$data['tot'] = $this->h->tot();
		$this->load->view('content',$data);
	}

	public function cek($unit)
	{
		$data['include']='su/print';
		$data['tahun'] = $this->y->get_tahun();
		$data['peg']= $this->m->get_pegawaii();

		$this->load->view('content',$data);
	}



	public function view($id)
	{
			$a = $_POST['tahun'];
			$b = "04";
				$data['peg_ji'] = $this->m->get_data_pegawai_ji();
				$data['bobot'] = $this->m->get_bobot();

				$data['bulan'] = $this->m->get_bulan($b); //dipakai
				$data['tahun'] = $a; //dipakai
				
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/printt',$data);
	}

	public function view1($id)
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];

				$data['peg_ji'] = $this->m->get_data_pegawai_ji();
				$data['bobot'] = $this->m->get_bobot();

				$data['bulan'] = $this->m->get_bulan($b); //dipakai
				$data['tahun'] = $a; //dipakai
				
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/printt1',$data);

	}


	public function view_sd()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$jenis = $_POST['jenis'];
			$ttd1 = $_POST['ttd1'];
			$ttd2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			if ($jenis == '01')
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['peg'] = $this->m->get_data_pegawai_sd($a,$b);
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_sd($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak',$data);
			}
			else
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['peg'] = $this->m->get_data_pegawai_sd($a,$b);
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_sd($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak_tt',$data);
			}




	}

	public function view_rs_ok()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$jenis = $_POST['jenis'];
			$ttd1 = $_POST['ttd1'];
			$ttd2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			if ($jenis == '01')
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_rs_ok($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak',$data);
			}
			else
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_rs_ok($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak_tt',$data);
			}
	}

	public function view_rs_6()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$jenis = $_POST['jenis'];
			$ttd1 = $_POST['ttd1'];
			$ttd2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			if ($jenis == '01')
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_rs_6($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak',$data);
			}
			else
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_rs_6($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak_tt',$data);
			}
	}

	public function view_rs_shift()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$jenis = $_POST['jenis'];
			$ttd1 = $_POST['ttd1'];
			$ttd2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			if ($jenis == '01')
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_rs_shift($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak',$data);
			}
			else
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_rs_shift($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak_tt',$data);
			}
	}

	//start puskesmas
	public function view_pus_6()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$jenis = $_POST['jenis'];
			$ttd1 = $_POST['ttd1'];
			$ttd2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			if ($jenis == '01')
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['peg'] = $this->m->get_data_pegawai_pus_6($a,$b);
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_pus_6($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak',$data);
			}
			else
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['peg'] = $this->m->get_data_pegawai_pus_6($a,$b);
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_pus_6($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak_tt',$data);
			}
	}


	public function view_pus_shift()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$jenis = $_POST['jenis'];
			$ttd1 = $_POST['ttd1'];
			$ttd2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			if ($jenis == '01')
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['peg'] = $this->m->get_data_pegawai_pus_shift($a,$b);
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_pus_shift($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak',$data);
			}
			else
			{
				$id = $this->session->userdata('id_unit_kerja');
				$data['ttd1'] = $ttd1;
				$data['ttd2'] = $ttd2;
				$data['tgl'] = $tgl;
				$data['peg'] = $this->m->get_data_pegawai_pus_shift($a,$b);
				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target_pus_shift($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('su/cetak_tt',$data);
			}
	}






	public function view2()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai($a,$b);
			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak2',$data);
	}


	public function view1_sd()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_sd($a,$b);

			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_sd($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['nip2'] = $nip2;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak1',$data);
	}

	public function view2_sd()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_sd($a,$b);
			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_sd($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak2',$data);
	}


	public function view1_rs_ok()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);

			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_rs_ok($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['nip2'] = $nip2;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak1',$data);
	}

	public function view2_rs_ok()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);
			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_rs_ok($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak2',$data);
	}


	public function view1_rs_6()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);

			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_rs_6($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['nip2'] = $nip2;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak1',$data);
	}

	public function view2_rs_6()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);
			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_rs_6($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak2',$data);
	}


	public function view1_rs_shift()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);

			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_rs_shift($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['nip2'] = $nip2;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak1',$data);
	}

	public function view2_rs_shift()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_rs($a,$b);
			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_rs_shift($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak2',$data);
	}

	//pus start
	public function view1_pus_6()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_pus($a,$b);

			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_pus_6($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['nip2'] = $nip2;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak1',$data);
	}

	public function view2_pus_6()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_pus($a,$b);
			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_pus_6($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak2',$data);
	}


	public function view1_pus_shift()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_pus($a,$b);

			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_pus_shift($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['nip2'] = $nip2;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak1',$data);
	}

	public function view2_pus_shift()
	{
			$a = $_POST['tahun'];
			$b = $_POST['bulan'];
			$nip = $_POST['ttd1'];
			$nip2 = $_POST['ttd2'];
			$tgl = $_POST['tgl'];

			$data['ttd'] = $this->m->get_ttd($nip);
			$data['ttd2'] = $this->m->get_ttd2($nip2);
			$id = $this->session->userdata('id_unit_kerja');
			$data['peg'] = $this->m->get_data_pegawai_pus($a,$b);
			$data['bobot'] = $this->m->get_bobot();
			$data['target'] = $this->m->get_target_pus_shift($a,$b);
			$data['bulan'] = $this->m->get_bulan($b);
			$data['tahun'] = $a;
			$data['tgl'] = $tgl;
			$id = $this->session->userdata('id_unit_kerja');
			$data['unit'] = $this->m->get_unit($id);
			$this->load->view('su/cetak2',$data);
	}






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
