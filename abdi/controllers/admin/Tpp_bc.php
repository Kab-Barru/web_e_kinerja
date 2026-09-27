<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpp extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mtpp','m',TRUE);
				$this->load->model('admin/mabsensi','y',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='admin/tpp';
		$data['yy'] = $this->m->data();
		$this->load->view('content_admin',$data);
	}

	public function set($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='admin/tpp_set';
		$data['tahun'] = $this->m->get_tahun();
		$data['tahunn'] = $this->m->get_tahun();
		$data['pegawai']=$this->y->get_pegawai($id);
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

	function load_tpp_detil()
	{
		$tahun = $_GET['a'];
		//$bulan = $_GET['b'];
		//$data['tahun'] = $this->m->get_tahun();

		$nik = $_GET['c'];

		$data=$this->m->load_tpp_detil($tahun,$nik);
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

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */
			$master = $this->m->get_tpp_master($tahun,$bulan);  // master tpp untuk bulan ini
			$det = $this->m->get_pegawai($nik); // det pegawai dan jabatan
			$yuss = $this->m->get_bobot(); // get bobot kinerja dan disiplin
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot($tahun,$bulan,$nik); //mendapatkan detil kediplinan
			$time  = $this->m->get_time($tahun,$bulan,$nik);
			$time1 = $this->m->get_time1($tahun,$bulan,$nik);
			$bobot_disiplin = $this->m->get_bobot_disiplin();
			/*end master data */


			$bh_apel_masuk 	= $bobot_disiplin->apel_masuk*$new_max_disiplin/100/$master->apel_masuk;
			$bh_apel_pulang = $bobot_disiplin->apel_pulang*$new_max_disiplin/100/$master->hari_kerja;
			$bh_hari_besar 	= $bobot_disiplin->hari_besar*$new_max_disiplin/100/$master->hari_besar;
			$bh_hari_senin 	= $bobot_disiplin->hari_senin*$new_max_disiplin/100/$master->upacara_hari_senin;
			$bh_hari_kerja 	= $bobot_disiplin->hari_kerja*$new_max_disiplin/100/$master->hari_kerja;
			$bh_jam_kerja 	= $bobot_disiplin->jam_kerja*$new_max_disiplin/100/$master->hari_kerja;



			//$awal

			$akhir = date_create('12:00:00') ;
			$nita = 0;
			$tar_jam_kerja = 0;
			$cap_jam_kerja = 0;
			$nita_jam = 0;
			$nita_menit = 0;
			$capaian_jam = 0;
			$capaian_menit = 0;
			$tot_jam_izin = $tot->tot_jam_izin/100;
			$apakah=0;
			$seconds = 0;
			$capaian_kerja_fix = 0;

			$anaks = 0;

			foreach ($time1 as $time1)
			{
			  $day1 = date('D', strtotime($time1->tanggal));
			  if ($day1 == 'Fri')
			  {
			   // $pembagi = 650;
					$pembagiji= "06:50:00";
			  }
			  else
			  {
			   // $pembagi = 740;
					$pembagiji = "07:40:00";
			  }

				$pisah = explode(":",$pembagiji); //untuk target jam kerja
				$seconds += $pisah[0]*3600;
				$seconds += $pisah[1]*60;
				$seconds += $pisah[2];
/*
				$anaks += $jammm*3600;
				$anaks += $menittt*60;
				$anaks += $pisah[2];
				*/

			}



			foreach ($time as $time)
			{
			  $awal   = date_create($time->jam_masuk_1);
			  $diff   = date_diff($awal , $akhir );

			  $akhir2 = date_create($time->jam_pulang) ;
			  $awal2  = date_create($time->jam_masuk_2);
			  $diff2  = date_diff($awal2 , $akhir2 );


			  $jam    = $diff->format('%H');
			  $menit  = $diff->format('%I');
			  $detik  = $diff->format('%S');

			  $jam2    = $diff2->format('%H');
			  $menit2  = $diff2->format('%I');
			  $detik2  = $diff2->format('%S');

			  $jammm = $jam + $jam2;
			  $menittt = $menit + $menit2;
			  $detikkk = $detik + $detik2;

			  $day = date('D', strtotime($time->tanggal));

			  if ($day == 'Fri')
			  {
			    $pembagi = 650;
					$pembagii = "06:50:00";

			  }
			  else
			  {
			    $pembagi = 740;
					$pembagii = "07:40:00";

			  }





				$pisah = explode(":",$pembagii); //untuk target jam kerja
			/*	$seconds += $pisah[0]*3600;
				$seconds += $pisah[1]*60;
				$seconds += $pisah[2];

				*/

				$anaks += $jammm*3600;
				$anaks += $menittt*60;
				$anaks += $pisah[2];



			  $capaian_kerja = intVal($jammm.$menittt);

				/*untuk mencari capaian jam kerja maksimal */
				if ($capaian_kerja > $pembagi)
				{
					$capaian_kerja_fix = $pembagi;
				}
				else if ($capaian_kerja <= $pembagi)
				{
					$capaian_kerja_fix = $capaian_kerja;
				}

			  $yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja-$tot_jam_izin; //perhari

			  $nita += $yusran; //tampung total bayaran bulanan

				$capaian_jam += $jammm;
				$capaian_menit += $menittt;
			}

			//echo 'Total terbayar jam kerja untuk sebulan = ' . number_format($nita);
				$bb_jam_kerja = $nita;

				$hours = floor($seconds/3600);
				$seconds -= $hours*3600;
				$minutes = floor($seconds/60);
				$seconds -= $minutes*60;
				$apakah= $hours.':'.$minutes; //total target jam kerja


				$jams = floor($anaks/3600);
				$anaks -= $jams*3600;
				$menits = floor($anaks/60);
				$anaks -= $menits*60;
				$adakah = $jams.':'.$menits; //total capaian jam kerja

				//$adakah=date("H:i:s",mktime($capaian_jam,$capaian_menit,'00','0','0','0'));




			/*mulai hitung untuk kinerja*/
			$hernita = $this->m->get_nita($nik,$tahun,$bulan); // untuk dapat total capaian kinerja yg diinput
			$hernita1 = $hernita->a;
			$hernita2 = $hernita->b;

			$hernita3 = $hernita1+$hernita2; //total capaian dari laporan yang diinput

			//$jml_lap_input = $this->m->jml_lap_input($nik,$tahun,$bulan); //jml laporan yg telah diinput
			//$jml_lap_blm_input = $master->hari_kerja - $jml_lap_input; // total laporan yg belum diinput

			//$tot_bb_lap_blm_input = $jml_lap_blm_input * 10; //total capaian laporan yang tidak diinput


			//$super_tot_kinerja = $hernita3+$tot_bb_lap_blm_input; // total capaian (lap input + lap tidak input)
			$super_tot_kinerja = $hernita3; // total capaian (lap input) laporan tidak diinput = 0



			//$jjj = ($hernita3*$det->tpp_max_kinerja)/($master->hari_kerja*100); //bayaran bulanan untuk laporan yg telah diinput (sebelum ditambah dengan laporan yang tidak diinput)
			$jjj = ($super_tot_kinerja*$new_max_kinerja)/($master->hari_kerja*100); //bayaran bulanan untuk laporan yg telah diinput

			$tpp_kinerja = $new_max_kinerja; // mak kinerja

			$her_hr_kerja = $master->hari_kerja; // hari kerja



		 //akhir

		 //simpan data untuk indikator kedisiplinan
		//$data=$this->m->simpan($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$new_max_disiplin);
		//$data=$this->m->simpan($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj);
		$data=$this->m->simpan($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah);

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

		//start hitung tpp






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
