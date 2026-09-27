<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_all_dinkes extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
				$this->load->model('admin/mtpp','y',TRUE);
				$this->load->model('admin/mcetak','m',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }


		public function index()
		{
			$data['include']='admin/cetak_cari_all_dinkes';
			$data['tahun'] = $this->y->get_tahun();
			$data['peg']= $this->m->get_pegawaii();

			$this->load->view('content_admin',$data);
		}



		public function view()
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
					$data['ttd1'] = $ttd1;
					$data['ttd2'] = $ttd2;
					$data['tgl'] = $tgl;

					$data['peg'] = $this->m->get_data_pegawai($a,$b);
					$data['pus_shift'] = $this->m->get_data_pegawai_pus_shift_all($a,$b); // rs_shift
					$data['pus_6'] = $this->m->get_data_pegawai_pus_6_all($a,$b); // rs_6


					$data['bobot'] = $this->m->get_bobot();
					$data['target'] = $this->m->get_target($a,$b);
					$data['target_pus_shift'] = $this->m->get_target_pus_shift($a,$b);
					$data['target_pus_6'] = $this->m->get_target_pus_6($a,$b);
					$data['bulan'] = $this->m->get_bulan($b);
					$data['tahun'] = $a;
					$id = $this->session->userdata('id_unit_kerja');
					$data['unit'] = $this->m->get_unit($id);
					$this->load->view('admin/cetak_all_dinkes',$data);
				}
				else
				{
					$id = $this->session->userdata('id_unit_kerja');
					$data['ttd1'] = $ttd1;
					$data['ttd2'] = $ttd2;
					$data['tgl'] = $tgl;

					$data['peg'] = $this->m->get_data_pegawai($a,$b);
					$data['pus_shift'] = $this->m->get_data_pegawai_pus_shift_all($a,$b); // rs_shift
					$data['pus_6'] = $this->m->get_data_pegawai_pus_6_all($a,$b); // rs_6

					$data['bobot'] = $this->m->get_bobot();
					$data['target'] = $this->m->get_target($a,$b);
					$data['target_pus_shift'] = $this->m->get_target_pus_shift($a,$b);
					$data['target_pus_6'] = $this->m->get_target_pus_6($a,$b);
					$data['bulan'] = $this->m->get_bulan($b);
					$data['tahun'] = $a;
					$id = $this->session->userdata('id_unit_kerja');
					$data['unit'] = $this->m->get_unit($id);
					$this->load->view('admin/cetak_tt_all_dinkes',$data);
				}




		}


		public function view1()
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
				$data['pus_shift'] = $this->m->get_data_pegawai_pus_shift_all($a,$b); // rs_shift
				$data['pus_6'] = $this->m->get_data_pegawai_pus_6_all($a,$b); // rs_6

				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target($a,$b);

				$data['target_pus_shift'] = $this->m->get_target_pus_shift($a,$b);
				$data['target_pus_6'] = $this->m->get_target_pus_6($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$data['nip2'] = $nip2;
				$data['tgl'] = $tgl;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('admin/cetak1_all_dinkes',$data);
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

				$data['pus_shift'] = $this->m->get_data_pegawai_pus_shift_all($a,$b); // rs_shift
				$data['pus_6'] = $this->m->get_data_pegawai_pus_6_all($a,$b); // rs_6

				$data['bobot'] = $this->m->get_bobot();
				$data['target'] = $this->m->get_target($a,$b);

				$data['target_pus_shift'] = $this->m->get_target_pus_shift($a,$b);
				$data['target_pus_6'] = $this->m->get_target_pus_6($a,$b);
				$data['bulan'] = $this->m->get_bulan($b);
				$data['tahun'] = $a;
				$data['tgl'] = $tgl;
				$id = $this->session->userdata('id_unit_kerja');
				$data['unit'] = $this->m->get_unit($id);
				$this->load->view('admin/cetak2_all_dinkes',$data);
		}










}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
