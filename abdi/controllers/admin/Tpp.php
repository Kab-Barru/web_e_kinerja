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

	public function set_sd($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='admin/tpp_set_sd';
		$data['tahun'] = $this->m->get_tahun();
		$data['tahunn'] = $this->m->get_tahun();
		$data['pegawai']=$this->y->get_pegawai($id);
		$this->load->view('content_admin',$data);
	}

	public function set_smp($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='admin/tpp_set_smp';
		$data['tahun'] = $this->m->get_tahun();
		$data['tahunn'] = $this->m->get_tahun();
		$data['pegawai']=$this->y->get_pegawai($id);
		$this->load->view('content_admin',$data);
	}

	public function set_tk($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='admin/tpp_set_tk';
		$data['tahun'] = $this->m->get_tahun();
		$data['tahunn'] = $this->m->get_tahun();
		$data['pegawai']=$this->y->get_pegawai($id);
		$this->load->view('content_admin',$data);
	}

	public function set_rs_ok($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='admin/tpp_set_rs_ok';
		$data['tahun'] = $this->m->get_tahun();
		$data['tahunn'] = $this->m->get_tahun();
		$data['pegawai']=$this->y->get_pegawai($id);
		$this->load->view('content_admin',$data);
	}

	public function set_rs_6($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='admin/tpp_set_rs_6';
		$data['tahun'] = $this->m->get_tahun();
		$data['tahunn'] = $this->m->get_tahun();
		$data['pegawai']=$this->y->get_pegawai($id);
		$this->load->view('content_admin',$data);
	}

	public function set_rs_shift($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='admin/tpp_set_rs_shift';
		$data['tahun'] = $this->m->get_tahun();
		$data['tahunn'] = $this->m->get_tahun();
		$data['pegawai']=$this->y->get_pegawai($id);
		$this->load->view('content_admin',$data);
	}


	public function set_pus_6($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='admin/tpp_set_pus_6';
		$data['tahun'] = $this->m->get_tahun();
		$data['tahunn'] = $this->m->get_tahun();
		$data['pegawai']=$this->y->get_pegawai($id);
		$this->load->view('content_admin',$data);
	}


	public function set_pus_shift($id)
	{
		//$id = $this->uri->segment(3);
		$data['include']='admin/tpp_set_pus_shift';
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


	function load_tpp_detil_sd()
	{
		$tahun = $_GET['a'];
		//$bulan = $_GET['b'];
		//$data['tahun'] = $this->m->get_tahun();

		$nik = $_GET['c'];

		$data=$this->m->load_tpp_detil_sd($tahun,$nik);
		echo json_encode($data);
	}

	function load_tpp_detil_rs()
	{
		$tahun = $_GET['a'];
		//$bulan = $_GET['b'];
		//$data['tahun'] = $this->m->get_tahun();

		$nik = $_GET['c'];

		$data=$this->m->load_tpp_detil_rs($tahun,$nik);
		echo json_encode($data);
	}

	function load_tpp_detil_pus()
	{
		$tahun = $_GET['a'];
		//$bulan = $_GET['b'];
		//$data['tahun'] = $this->m->get_tahun();

		$nik = $_GET['c'];

		$data=$this->m->load_tpp_detil_pus($tahun,$nik);
		echo json_encode($data);
	}

	function acuan()
	{

		$id=$this->input->get('id');
		$data=$this->m->acuan($id);
		echo json_encode($data);
	}

	function acuan_sd()
	{

		$id=$this->input->get('id');
		$data=$this->m->acuan_sd($id);
		echo json_encode($data);
	}


	function acuan_rs()
	{

		$id=$this->input->get('id');
		$data=$this->m->acuan_rs($id);
		echo json_encode($data);
	}

	function acuan_pus()
	{

		$id=$this->input->get('id');
		$data=$this->m->acuan_pus($id);
		echo json_encode($data);
	}


	function simpan()
	{

		$tahun	=$this->input->post('a'); //tahun
		$bulan	=$this->input->post('b'); //bulan
		$nik		=$this->input->post('nik'); //nik

		/*all master data */
		$master = $this->m->get_tpp_master($tahun,$bulan);  
		$det = $this->m->get_pegawai($nik); 
		$yuss = $this->m->get_bobot(); 
		$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
		$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
		$tot = $this->m->get_tot($tahun,$bulan,$nik); 
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
		$akhir_fri = date_create('11:30:00') ;
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
		$izin=0;

		$anaks = 0;

		foreach ($time1 as $time1) 
		{

				$pembagiji = "06:30:00";
				//$pembagiji = "06:30:00"; 

			$pisah = explode(":",$pembagiji); 
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
			$day11 = date('D', strtotime($time->tanggal));

			if ($day11 == 'Fri')
			{
				$diff   = date_diff($awal , $akhir_fri );
			}
			else
			{
				$diff   = date_diff($awal , $akhir );
			}
			//$diff   = date_diff($awal , $akhir );

			$akhir2 = date_create($time->jam_pulang) ;
			$awal2  = date_create($time->jam_masuk_2);
			$diff2  = date_diff($awal2 , $akhir2 );


			$jam    = $diff->format('%H');
			$menit  = $diff->format('%I');
			$detik  = $diff->format('%S');

			$jam2    = $diff2->format('%H');
			$menit2  = $diff2->format('%I');
			$detik2  = $diff2->format('%S');

			$izin = $time->jam_izin; 


			$time1_unix = strtotime($jam.':'.$menit.':'.$detik);
			$time2_unix = strtotime($jam2.':'.$menit2.':'.$detik2);
			$begin_day_unix = strtotime(' 00:00:00');
			$jumlah_time = date('H:i:s', ($time1_unix + ($time2_unix - $begin_day_unix)));


/*

			$naura1 = $jam + $jam2;
			$naura2 = $menit + $menit2;
			$naura3 = $detik + $detik2;
*/

			//$naura = $naura1.':'.$naura2.':'.$naura3; 
			$naura = $jumlah_time;
			if ($izin == '00:00:00')
			{
			$akhir3 = date_create("00:00:00");
			}
			else
			{
				$akhir3 = date_create($time->jam_izin);
			}

			$awal3  = date_create($jumlah_time);
			$diff3  = date_diff($awal3 , $akhir3); 

			$jammm    = $diff3->format('%H');
			$menittt  = $diff3->format('%I');
			$detikkk  = $diff3->format('%S');


			$day = date('D', strtotime($time->tanggal));

			if ($day == 'Fri')
			{
				$pembagi = 630;
				$pembagii = "06:30:00";

				//$pembagi = 600;
				//$pembagii = "06:00:00"; 

			}
			else
			{
				$pembagi = 630;
				$pembagii = "06:30:00";

				//$pembagi = 630;
				//$pembagii = "06:30:00"; 

			}





			$pisah = explode(":",$pembagii); 
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

			//$yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja-$tot_jam_izin; //perhari
			$yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; 

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

		//$jml_lap_input = $this->m->jml_lap_input($nik,$tahun,$bulan); 
		//$jml_lap_blm_input = $master->hari_kerja - $jml_lap_input; 

		//$tot_bb_lap_blm_input = $jml_lap_blm_input * 10; 


		//$super_tot_kinerja = $hernita3+$tot_bb_lap_blm_input; 
		$super_tot_kinerja = $hernita3; 



		//$jjj = ($hernita3*$det->tpp_max_kinerja)/($master->hari_kerja*100); 
		$jjj = ($super_tot_kinerja*$new_max_kinerja)/($master->hari_kerja*100);

		$tpp_kinerja = $new_max_kinerja; // mak kinerja

		$her_hr_kerja = $master->hari_kerja; // hari kerja



	 //akhir

	 //simpan data untuk indikator kedisiplinan
	//$data=$this->m->simpan($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$new_max_disiplin);
	//$data=$this->m->simpan($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj);
	$data=$this->m->simpan($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah,$det->tpp_max);

	echo json_encode($data);
	}


		function simpan1()
		{

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */
			$master = $this->m->get_tpp_master($tahun,$bulan);  
			$det = $this->m->get_pegawai($nik); 
			$yuss = $this->m->get_bobot(); 
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot($tahun,$bulan,$nik); 
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
			$izin=0;

			$anaks = 0;

			foreach ($time1 as $time1) 
			{
			  $day1 = date('D', strtotime($time1->tanggal));
			  if ($day1 == 'Fri')
			  {
			   // $pembagi = 650;
					$pembagiji= "06:50:00";
					//$pembagiji= "06:00:00";
			  }
			  else
			  {
			   // $pembagi = 740;
					$pembagiji = "07:40:00";
					//$pembagiji = "06:30:00";
			  }

				$pisah = explode(":",$pembagiji); 
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

				$izin = $time->jam_izin; 


				$time1_unix = strtotime($jam.':'.$menit.':'.$detik);
				$time2_unix = strtotime($jam2.':'.$menit2.':'.$detik2);
				$begin_day_unix = strtotime(' 00:00:00');
				$jumlah_time = date('H:i:s', ($time1_unix + ($time2_unix - $begin_day_unix)));


/*

			  $naura1 = $jam + $jam2;
			  $naura2 = $menit + $menit2;
			  $naura3 = $detik + $detik2;
*/

				//$naura = $naura1.':'.$naura2.':'.$naura3; 
				$naura = $jumlah_time;
				if ($izin == '00:00:00')
				{
				$akhir3 = date_create("00:00:00");
				}
				else
				{
					$akhir3 = date_create($time->jam_izin);
				}

			  $awal3  = date_create($jumlah_time);
			  $diff3  = date_diff($awal3 , $akhir3); 

				$jammm    = $diff3->format('%H');
			  $menittt  = $diff3->format('%I');
			  $detikkk  = $diff3->format('%S');


			  $day = date('D', strtotime($time->tanggal));

			  if ($day == 'Fri')
			  {
			    $pembagi = 650;
					$pembagii = "06:50:00";

					//$pembagi = 600;
					//$pembagii = "06:00:00";

			  }
			  else
			  {
			    $pembagi = 740;
					$pembagii = "07:40:00";

					//$pembagi = 630;
					//$pembagii = "06:30:00";

			  }





				$pisah = explode(":",$pembagii); 
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

			  //$yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja-$tot_jam_izin; //perhari
				$yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; 

			  $nita += $yusran; 

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
			$hernita = $this->m->get_nita($nik,$tahun,$bulan); 
			$hernita1 = $hernita->a;
			$hernita2 = $hernita->b;

			$hernita3 = $hernita1+$hernita2; //total capaian dari laporan yang diinput

			//$jml_lap_input = $this->m->jml_lap_input($nik,$tahun,$bulan);
			//$jml_lap_blm_input = $master->hari_kerja - $jml_lap_input; 

			//$tot_bb_lap_blm_input = $jml_lap_blm_input * 10;


			//$super_tot_kinerja = $hernita3+$tot_bb_lap_blm_input; 
			$super_tot_kinerja = $hernita3; // total capaian (lap input) laporan tidak diinput = 0



			//$jjj = ($hernita3*$det->tpp_max_kinerja)/($master->hari_kerja*100); 
			$jjj = ($super_tot_kinerja*$new_max_kinerja)/($master->hari_kerja*100); 

			$tpp_kinerja = $new_max_kinerja; 

			$her_hr_kerja = $master->hari_kerja; 



		 //akhir

		 //simpan data untuk indikator kedisiplinan
		//$data=$this->m->simpan($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$new_max_disiplin);
		//$data=$this->m->simpan($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj);
		$data=$this->m->simpan($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah,$det->tpp_max);

		echo json_encode($data);
		}







		function simpan_sd()
		{

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */
			$master = $this->m->get_tpp_master_sd($tahun,$bulan);  // master tpp untuk bulan ini untuk sd
			$det = $this->m->get_pegawai($nik); // det pegawai dan jabatan
			$yuss = $this->m->get_bobot(); // get bobot kinerja dan disiplin
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot_sd($tahun,$bulan,$nik); //mendapatkan detil kediplinan
			$time  = $this->m->get_time_sd($tahun,$bulan,$nik); //total jam masuk kerja
			$time1 = $this->m->get_time1_sd($tahun,$bulan,$nik); // total keseluruhan
			$bobot_disiplin = $this->m->get_bobot_disiplin();
			/*end master data */


			$bh_apel_masuk 	= $bobot_disiplin->apel_masuk*$new_max_disiplin/100/$master->apel_masuk;
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

			foreach ($time1 as $time1) //total keseluruhan jam
			{
			  $day1 = date('D', strtotime($time1->tanggal));
			  if ($day1 == 'Fri')
			  {
			   // $pembagi = 255;
					$pembagiji= "02:55:00";
			  }
			  else
			  {
			   // $pembagi = 405;
					$pembagiji = "04:05:00";
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
			  //$awal   = date_create($time->jam_masuk_1);
			  //$diff   = date_diff($awal , $akhir );

			  $akhir2 = date_create($time->jam_pulang) ;
			  $awal2  = date_create($time->jam_masuk_1);
			  $diff2  = date_diff($awal2 , $akhir2 );


			  //$jam    = $diff->format('%H');
			  //$menit  = $diff->format('%I');
			  //$detik  = $diff->format('%S');

			  $jam2    = $diff2->format('%H');
			  $menit2  = $diff2->format('%I');
			  $detik2  = $diff2->format('%S');

				//$akhir = date_create('12:00:00') ;
				$cui = $jam2.':'.$menit2.':'.$detik2;

/*
					//ingat ini variabwl
			  $jammm 		= $jam2;
			  $menittt 	= $menit2;
			  $detikkk 	= $detik2;
*/

			  $day = date('D', strtotime($time->tanggal));
			  if ($day == 'Fri')
			  {
			    $pembagi = 255;
					$pembagii = "02:55:00";
					$kurang = "00:15:00";
			  }
			  else
			  {
			    $pembagi = 405;
					$pembagii = "04:05:00";
					$kurang = "00:30:00";
			  }

				/*ini proses untuk mengurai dengan total istirahat */
				$mau_dikurang = date_create($cui) ;
			  $pengurang  = date_create($kurang);
			  $testes  = date_diff($pengurang , $mau_dikurang );

				/* ini variabel jam menit detik untuk capaian ja kerja */
				$naura1    = $testes->format('%H');
			 	$naura2  = $testes->format('%I');
			 	$naura3  = $testes->format('%S');

				$izin = $time->jam_izin;


				$naura = $naura1.':'.$naura2.':'.$naura3;
				$akhir3 = date_create($izin);
			  $awal3  = date_create($naura);
			  $diff3  = date_diff($awal3 , $akhir3);

				$jammm    = $diff3->format('%H');
			  $menittt  = $diff3->format('%I');
			  $detikkk  = $diff3->format('%S');


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

			  $yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; //perhari

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
		$data=$this->m->simpan_sd($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah);

		echo json_encode($data);
		}


		function simpan_smp()
		{

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */
			$master = $this->m->get_tpp_master_sd($tahun,$bulan);  // master tpp untuk bulan ini untuk sd
			$det = $this->m->get_pegawai($nik); // det pegawai dan jabatan
			$yuss = $this->m->get_bobot(); // get bobot kinerja dan disiplin
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot_sd($tahun,$bulan,$nik); //mendapatkan detil kediplinan
			$time  = $this->m->get_time_sd($tahun,$bulan,$nik); //total jam masuk kerja
			$time1 = $this->m->get_time1_sd($tahun,$bulan,$nik); // total keseluruhan
			$bobot_disiplin = $this->m->get_bobot_disiplin();
			/*end master data */


			$bh_apel_masuk 	= $bobot_disiplin->apel_masuk*$new_max_disiplin/100/$master->apel_masuk;
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

			foreach ($time1 as $time1) //total keseluruhan jam
			{
			  $day1 = date('D', strtotime($time1->tanggal));
			  if ($day1 == 'Fri')
			  {
			   // $pembagi = 255;
					$pembagiji= "03:35:00";
			  }
				else if ($day1 == 'Mon')
			  {
			   // $pembagi = 255;
					$pembagiji= "05:50:00";
			  }
			  else
			  {
			   // $pembagi = 405;
					$pembagiji = "05:35:00";
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
			  //$awal   = date_create($time->jam_masuk_1);
			  //$diff   = date_diff($awal , $akhir );

			  $akhir2 = date_create($time->jam_pulang) ;
			  $awal2  = date_create($time->jam_masuk_1);
			  $diff2  = date_diff($awal2 , $akhir2 );


			  //$jam    = $diff->format('%H');
			  //$menit  = $diff->format('%I');
			  //$detik  = $diff->format('%S');

			  $jam2    = $diff2->format('%H');
			  $menit2  = $diff2->format('%I');
			  $detik2  = $diff2->format('%S');

				//$akhir = date_create('12:00:00') ;
				$cui = $jam2.':'.$menit2.':'.$detik2;

/*
					//ingat ini variabwl
			  $jammm 		= $jam2;
			  $menittt 	= $menit2;
			  $detikkk 	= $detik2;
*/

			  $day = date('D', strtotime($time->tanggal));
			  if ($day == 'Fri')
			  {
			    $pembagi = 335;
					$pembagii = "03:35:00";
					$kurang = "00:20:00";
			  }
				else if ($day == 'Mon')
			  {
			    $pembagi = 550;
					$pembagii = "05:50:00";
					$kurang = "00:20:00";
			  }
			  else
			  {
			    $pembagi = 535;
					$pembagii = "05:35:00";
					$kurang = "00:20:00";
			  }

				/*ini proses untuk mengurai dengan total istirahat */
				$mau_dikurang = date_create($cui) ;
			  $pengurang  = date_create($kurang);
			  $testes  = date_diff($pengurang , $mau_dikurang );

				/* ini variabel jam menit detik untuk capaian ja kerja */
				$naura1    = $testes->format('%H');
			 	$naura2  = $testes->format('%I');
			 	$naura3  = $testes->format('%S');

				$izin = $time->jam_izin;


				$naura = $naura1.':'.$naura2.':'.$naura3;
				$akhir3 = date_create($izin);
			  $awal3  = date_create($naura);
			  $diff3  = date_diff($awal3 , $akhir3);

				$jammm    = $diff3->format('%H');
			  $menittt  = $diff3->format('%I');
			  $detikkk  = $diff3->format('%S');


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

			  $yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; //perhari

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
		$data=$this->m->simpan_sd($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah);

		echo json_encode($data);
		}


		function simpan_tk()
		{

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */
			$master = $this->m->get_tpp_master_sd($tahun,$bulan);  // master tpp untuk bulan ini untuk sd
			$det = $this->m->get_pegawai($nik); // det pegawai dan jabatan
			$yuss = $this->m->get_bobot(); // get bobot kinerja dan disiplin
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot_sd($tahun,$bulan,$nik); //mendapatkan detil kediplinan
			$time  = $this->m->get_time_sd($tahun,$bulan,$nik); //total jam masuk kerja
			$time1 = $this->m->get_time1_sd($tahun,$bulan,$nik); // total keseluruhan
			$bobot_disiplin = $this->m->get_bobot_disiplin();
			/*end master data */


			$bh_apel_masuk 	= $bobot_disiplin->apel_masuk*$new_max_disiplin/100/$master->apel_masuk;
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

			foreach ($time1 as $time1) //total keseluruhan jam
			{
			  $day1 = date('D', strtotime($time1->tanggal));

				$pembagiji= "02:45:00";


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
			  //$awal   = date_create($time->jam_masuk_1);
			  //$diff   = date_diff($awal , $akhir );

			  $akhir2 = date_create($time->jam_pulang) ;
			  $awal2  = date_create($time->jam_masuk_1);
			  $diff2  = date_diff($awal2 , $akhir2 );


			  //$jam    = $diff->format('%H');
			  //$menit  = $diff->format('%I');
			  //$detik  = $diff->format('%S');

			  $jam2    = $diff2->format('%H');
			  $menit2  = $diff2->format('%I');
			  $detik2  = $diff2->format('%S');

				//$akhir = date_create('12:00:00') ;
				$cui = $jam2.':'.$menit2.':'.$detik2;

/*
					//ingat ini variabwl
			  $jammm 		= $jam2;
			  $menittt 	= $menit2;
			  $detikkk 	= $detik2;
*/


			    $pembagi 	= 245;
					$pembagii = "02:45:00";
					$kurang 	= "00:15:00";


				/*ini proses untuk mengurai dengan total istirahat */
				$mau_dikurang = date_create($cui) ;
			  $pengurang  = date_create($kurang);
			  $testes  = date_diff($pengurang , $mau_dikurang );

				/* ini variabel jam menit detik untuk capaian ja kerja */
				$naura1    = $testes->format('%H');
			 	$naura2  = $testes->format('%I');
			 	$naura3  = $testes->format('%S');

				$izin = $time->jam_izin;


				$naura = $naura1.':'.$naura2.':'.$naura3;
				$akhir3 = date_create($izin);
			  $awal3  = date_create($naura);
			  $diff3  = date_diff($awal3 , $akhir3);

				$jammm    = $diff3->format('%H');
			  $menittt  = $diff3->format('%I');
			  $detikkk  = $diff3->format('%S');


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

			  $yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; //perhari

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
		$data=$this->m->simpan_sd($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah);

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

		function simpan_rs_ok()
		{

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */
			$master = $this->m->get_tpp_master_rs_ok($tahun,$bulan);  // master tpp untuk bulan ini untuk rs ok
			$det = $this->m->get_pegawai($nik); // det pegawai dan jabatan
			$yuss = $this->m->get_bobot(); // get bobot kinerja dan disiplin
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot_sd($tahun,$bulan,$nik); //mendapatkan detil kediplinan
			$time  = $this->m->get_time_sd($tahun,$bulan,$nik); //total jam masuk kerja
			$time1 = $this->m->get_time1_sd($tahun,$bulan,$nik); // total keseluruhan
			$bobot_disiplin = $this->m->get_bobot_disiplin();
			/*end master data */


			$bh_apel_masuk 	= $bobot_disiplin->apel_masuk*$new_max_disiplin/100/$master->apel_masuk;
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

			foreach ($time1 as $time1) //total keseluruhan jam
			{
			  $day1 = date('D', strtotime($time1->tanggal));

				$pembagiji= "13:30:00";


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
			  //$awal   = date_create($time->jam_masuk_1);
			  //$diff   = date_diff($awal , $akhir );

			  $akhir2 = date_create($time->jam_pulang) ;
			  $awal2  = date_create($time->jam_masuk_1);
			  $diff2  = date_diff($awal2 , $akhir2 );


			  //$jam    = $diff->format('%H');
			  //$menit  = $diff->format('%I');
			  //$detik  = $diff->format('%S');

			  $jam2    = $diff2->format('%H');
			  $menit2  = $diff2->format('%I');
			  $detik2  = $diff2->format('%S');

				//$akhir = date_create('12:00:00') ;
				$cui = $jam2.':'.$menit2.':'.$detik2;

/*
					//ingat ini variabwl
			  $jammm 		= $jam2;
			  $menittt 	= $menit2;
			  $detikkk 	= $detik2;
*/


			    $pembagi 	= 1330;
					$pembagii = "13:30:00";
					$kurang 	= "00:00:00";


				/*ini proses untuk mengurai dengan total istirahat */
				$mau_dikurang = date_create($cui) ;
			  $pengurang  = date_create($kurang);
			  $testes  = date_diff($pengurang , $mau_dikurang );

				/* ini variabel jam menit detik untuk capaian kerja */
				$naura1    = $testes->format('%H');
			 	$naura2  = $testes->format('%I');
			 	$naura3  = $testes->format('%S');

				$izin = $time->jam_izin;


				$naura = $naura1.':'.$naura2.':'.$naura3;
				$akhir3 = date_create($izin);
			  $awal3  = date_create($naura);
			  $diff3  = date_diff($awal3 , $akhir3);

				$jammm    = $diff3->format('%H');
			  $menittt  = $diff3->format('%I');
			  $detikkk  = $diff3->format('%S');


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

			  $yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; //perhari

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
		$data=$this->m->simpan_rs($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah);

		echo json_encode($data);
		}


		function simpan_rs_6()
		{

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */

			/*all master data */
			//$master = $this->m->get_tpp_master_rs_6($tahun,$bulan);  // master tpp untuk bulan ini untuk rs ok
			//$master = $this->m->get_tpp_master_rs_6('2019','07');  // master tpp untuk bulan ini untuk rs ok
			//$master = $this->m->get_tpp_master_rs_6_tes($tahun,$bulan);  // master tpp untuk bulan ini untuk rs ok
			$master = $this->m->get_tpp_master_rs_6($tahun,$bulan);  // master tpp untuk bulan ini untuk rs ok
			$det = $this->m->get_pegawai($nik); // det pegawai dan jabatan
			$yuss = $this->m->get_bobot(); // get bobot kinerja dan disiplin
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot_sd($tahun,$bulan,$nik); //mendapatkan detil kediplinan
			$time  = $this->m->get_time_sd($tahun,$bulan,$nik); //total jam masuk kerja
			$time1 = $this->m->get_time1_sd($tahun,$bulan,$nik); // total keseluruhan
			$bobot_disiplin = $this->m->get_bobot_disiplin();
			/*end master data */


			$bh_apel_masuk 	= $bobot_disiplin->apel_masuk*$new_max_disiplin/100/$master->apel_masuk;
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

			foreach ($time1 as $time1) //total keseluruhan jam
			{
			  $day1 = date('D', strtotime($time1->tanggal));

				if($day1 == 'Fri')
				{
					$pembagiji= "05:30:00";
				}
				else if($day1 == 'Sat')
				{
					$pembagiji= "06:00:00";
				}
				else
				{
					$pembagiji= "06:30:00";
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
			  //$awal   = date_create($time->jam_masuk_1);
			  //$diff   = date_diff($awal , $akhir );

			  $akhir2 = date_create($time->jam_pulang) ;
			  $awal2  = date_create($time->jam_masuk_1);
			  $diff2  = date_diff($awal2 , $akhir2 );


			  //$jam    = $diff->format('%H');
			  //$menit  = $diff->format('%I');
			  //$detik  = $diff->format('%S');

			  $jam2    = $diff2->format('%H');
			  $menit2  = $diff2->format('%I');
			  $detik2  = $diff2->format('%S');

				//$akhir = date_create('12:00:00') ;
				$cui = $jam2.':'.$menit2.':'.$detik2;

/*
					//ingat ini variabwl
			  $jammm 		= $jam2;
			  $menittt 	= $menit2;
			  $detikkk 	= $detik2;
*/

						$day2 = date('D', strtotime($time->tanggal));

						if($day2 == 'Fri')
						{
							$pembagi 	= 530;
							$pembagii = "05:30:00";
						}
						else if($day2 == 'Sat')
						{
							$pembagi 	= 600;
							$pembagii = "06:00:00";
						}
						else
						{
							$pembagi 	= 630;
							$pembagii = "06:30:00";
						}

						if($day2 == 'Fri')
						{
							$kurang 	= "01:00:00";
						}

						else
						{
							$kurang 	= "00:00:00";
						}

						//$kurang 	= "00:00:00";

				/*ini proses untuk mengurai dengan total istirahat */
				$mau_dikurang = date_create($cui) ;
			  $pengurang  = date_create($kurang);
			  $testes  = date_diff($pengurang , $mau_dikurang );

				/* ini variabel jam menit detik untuk capaian kerja */
				$naura1    = $testes->format('%H');
			 	$naura2  = $testes->format('%I');
			 	$naura3  = $testes->format('%S');

				$izin = $time->jam_izin;


				$naura = $naura1.':'.$naura2.':'.$naura3;
				$akhir3 = date_create($izin);
			  $awal3  = date_create($naura);
			  $diff3  = date_diff($awal3 , $akhir3);

				$jammm    = $diff3->format('%H');
			  $menittt  = $diff3->format('%I');
			  $detikkk  = $diff3->format('%S');


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

			  $yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; //perhari

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
		$data=$this->m->simpan_rs($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah);

		echo json_encode($data);
		}


		function simpan_rs_shift()
		{

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */
			$master = $this->m->get_tpp_master_rs_shift($tahun,$bulan);  // master tpp untuk bulan ini untuk rs ok
			$det = $this->m->get_pegawai($nik); // det pegawai dan jabatan
			$yuss = $this->m->get_bobot(); // get bobot kinerja dan disiplin
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot_rs($tahun,$bulan,$nik); //mendapatkan detil kediplinan
			$time  = $this->m->get_time_rs_shift($tahun,$bulan,$nik); //total jam masuk kerja
			$time1 = $this->m->get_time1_rs_shift($tahun,$bulan,$nik); // total keseluruhan
			$bobot_disiplin = $this->m->get_bobot_disiplin();
			/*end master data */


			$bh_apel_masuk 	= $bobot_disiplin->apel_masuk*$new_max_disiplin/100/$master->apel_masuk;
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

			foreach ($time1 as $time1) //total keseluruhan jam
			{
			  $day1 = $time1->jenis;

				if($day1 == '1')
				{
					$pembagiji= "06:30:00";
				}
				else if($day1 == '2')
				{
					$pembagiji= "07:00:00";
				}
				else if($day1 == '4')
				{
					$pembagiji= "00:00:00";
				}
				else
				{
					$pembagiji= "13:30:00";
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
			  //$awal   = date_create($time->jam_masuk_1);
			  //$diff   = date_diff($awal , $akhir );

			  $akhir2 = date_create($time->jam_pulang) ;
			  $awal2  = date_create($time->jam_masuk_1);
			  $diff2  = date_diff($awal2 , $akhir2 );


			  //$jam    = $diff->format('%H');
			  //$menit  = $diff->format('%I');
			  //$detik  = $diff->format('%S');

			  $jam2    = $diff2->format('%H');
			  $menit2  = $diff2->format('%I');
			  $detik2  = $diff2->format('%S');

				//$akhir = date_create('12:00:00') ;
				$cui = $jam2.':'.$menit2.':'.$detik2;

/*
					//ingat ini variabwl
			  $jammm 		= $jam2;
			  $menittt 	= $menit2;
			  $detikkk 	= $detik2;
*/

							$day1 = $time->jenis;

							if($day1 == '1')
							{
								$pembagi 	= 630;
								$pembagii = "06:30:00";
							}
							else if($day1 == '2')
							{
								$pembagi 	= 700;
								$pembagii = "07:00:00";
							}
							else if($day1 == '4')
							{
								$pembagiji= "00:00:00";

								$pembagi 	= 0;
								$pembagii = "00:00:00";
							}
							else
							{
								$pembagi 	= 1330;
								$pembagii = "13:30:00";
							}



						$kurang 	= "00:00:00";

				/*ini proses untuk mengurai dengan total istirahat */
				$mau_dikurang = date_create($cui) ;
			  $pengurang  = date_create($kurang);
			  $testes  = date_diff($pengurang , $mau_dikurang );

				/* ini variabel jam menit detik untuk capaian kerja */
				$naura1    = $testes->format('%H');
			 	$naura2  = $testes->format('%I');
			 	$naura3  = $testes->format('%S');

				$izin = $time->jam_izin;


				$naura = $naura1.':'.$naura2.':'.$naura3;
				$akhir3 = date_create($izin);
			  $awal3  = date_create($naura);
			  $diff3  = date_diff($awal3 , $akhir3);

				$jammm    = $diff3->format('%H');
			  $menittt  = $diff3->format('%I');
			  $detikkk  = $diff3->format('%S');


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

			  $yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; //perhari

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
		$data=$this->m->simpan_rs($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah);

		echo json_encode($data);
		}


		//puskesmas START
		function simpan_pus_66()
		{

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */
			$master = $this->m->get_tpp_master_pus_6($tahun,$bulan);  // master tpp untuk bulan ini untuk rs ok
			$det = $this->m->get_pegawai($nik); // det pegawai dan jabatan
			$yuss = $this->m->get_bobot(); // get bobot kinerja dan disiplin
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot_pus($tahun,$bulan,$nik); //mendapatkan detil kediplinan
			$time  = $this->m->get_time_pus($tahun,$bulan,$nik); //total jam masuk kerja
			$time1 = $this->m->get_time1_pus($tahun,$bulan,$nik); // total keseluruhan
			$bobot_disiplin = $this->m->get_bobot_disiplin();
			/*end master data */


			$bh_apel_masuk 	= $bobot_disiplin->apel_masuk*$new_max_disiplin/100/$master->apel_masuk;
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

			foreach ($time1 as $time1) //total keseluruhan jam
			{
			  $day1 = date('D', strtotime($time1->tanggal));

				if($day1 == 'Fri')
				{
					$pembagiji= "04:30:00";
				}
				else
				{
					$pembagiji= "06:00:00";
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
			  //$awal   = date_create($time->jam_masuk_1);
			  //$diff   = date_diff($awal , $akhir );

			  $akhir2 = date_create($time->jam_pulang) ;
			  $awal2  = date_create($time->jam_masuk_1);
			  $diff2  = date_diff($awal2 , $akhir2 );


			  //$jam    = $diff->format('%H');
			  //$menit  = $diff->format('%I');
			  //$detik  = $diff->format('%S');

			  $jam2    = $diff2->format('%H');
			  $menit2  = $diff2->format('%I');
			  $detik2  = $diff2->format('%S');

				//$akhir = date_create('12:00:00') ;
				$cui = $jam2.':'.$menit2.':'.$detik2;

/*
					//ingat ini variabwl
			  $jammm 		= $jam2;
			  $menittt 	= $menit2;
			  $detikkk 	= $detik2;
*/

						$day2 = date('D', strtotime($time->tanggal));

						if($day2 == 'Fri')
						{
							$pembagi 	= 430;
							$pembagii = "04:30:00";
						}
						else
						{
							$pembagi 	= 600;
							$pembagii = "06:00:00";
						}

						if($day2 == 'Fri')
						{
							$kurang 	= "00:00:00";
						}

						else
						{
							$kurang 	= "00:30:00";
						}

						//$kurang 	= "00:00:00";

				/*ini proses untuk mengurai dengan total istirahat */
				$mau_dikurang = date_create($cui) ;
			  $pengurang  = date_create($kurang);
			  $testes  = date_diff($pengurang , $mau_dikurang );

				/* ini variabel jam menit detik untuk capaian kerja */
				$naura1    = $testes->format('%H');
			 	$naura2  = $testes->format('%I');
			 	$naura3  = $testes->format('%S');

				$izin = $time->jam_izin;


				$naura = $naura1.':'.$naura2.':'.$naura3;
				$akhir3 = date_create($izin);
			  $awal3  = date_create($naura);
			  $diff3  = date_diff($awal3 , $akhir3);

				$jammm    = $diff3->format('%H');
			  $menittt  = $diff3->format('%I');
			  $detikkk  = $diff3->format('%S');


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

			  $yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; //perhari

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
		$data=$this->m->simpan_pus_6($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah);

		echo json_encode($data);
		}


		function simpan_pus_shift()
		{

			$tahun	=$this->input->post('a'); //tahun
			$bulan	=$this->input->post('b'); //bulan
			$nik		=$this->input->post('nik'); //nik

			/*all master data */
			$master = $this->m->get_tpp_master_pus_shift($tahun,$bulan);  // master tpp untuk bulan ini untuk rs ok
			$det = $this->m->get_pegawai($nik); // det pegawai dan jabatan
			$yuss = $this->m->get_bobot(); // get bobot kinerja dan disiplin
			$new_max_disiplin = $det->tpp_max*$yuss->indikator_disiplin/100;
			$new_max_kinerja = $det->tpp_max*$yuss->indikator_kinerja/100;
			$tot = $this->m->get_tot_pus($tahun,$bulan,$nik); //mendapatkan detil kediplinan
			$time  = $this->m->get_time_pus($tahun,$bulan,$nik); //total jam masuk kerja
			$time1 = $this->m->get_time1_pus($tahun,$bulan,$nik); // total keseluruhan
			$bobot_disiplin = $this->m->get_bobot_disiplin();
			/*end master data */


			$bh_apel_masuk 	= $bobot_disiplin->apel_masuk*$new_max_disiplin/100/$master->apel_masuk;
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

			foreach ($time1 as $time1) //total keseluruhan jam
			{
			  $day1 = $time1->jenis;

				if($day1 == '1')
				{
					$pembagiji= "06:30:00";
				}
				else if($day1 == '2')
				{
					$pembagiji= "07:00:00";
				}
				else if($day1 == '4')
				{
					$pembagiji= "00:00:00";
				}
				else
				{
					$pembagiji= "13:30:00";
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
			  //$awal   = date_create($time->jam_masuk_1);
			  //$diff   = date_diff($awal , $akhir );

			  $akhir2 = date_create($time->jam_pulang) ;
			  $awal2  = date_create($time->jam_masuk_1);
			  $diff2  = date_diff($awal2 , $akhir2 );


			  //$jam    = $diff->format('%H');
			  //$menit  = $diff->format('%I');
			  //$detik  = $diff->format('%S');

			  $jam2    = $diff2->format('%H');
			  $menit2  = $diff2->format('%I');
			  $detik2  = $diff2->format('%S');

				//$akhir = date_create('12:00:00') ;
				$cui = $jam2.':'.$menit2.':'.$detik2;

/*
					//ingat ini variabwl
			  $jammm 		= $jam2;
			  $menittt 	= $menit2;
			  $detikkk 	= $detik2;
*/

							$day1 = $time->jenis;

							if($day1 == '1')
							{
								$pembagi 	= 630;
								$pembagii = "06:30:00";
							}
							else if($day1 == '2')
							{
								$pembagi 	= 700;
								$pembagii = "07:00:00";
							}
							else if($day1 == '4')
							{
								$pembagiji= "00:00:00";

								$pembagi 	= 0;
								$pembagii = "00:00:00";
							}
							else
							{
								$pembagi 	= 1330;
								$pembagii = "13:30:00";
							}



						$kurang 	= "00:00:00";

				/*ini proses untuk mengurai dengan total istirahat */
				$mau_dikurang = date_create($cui) ;
			  $pengurang  = date_create($kurang);
			  $testes  = date_diff($pengurang , $mau_dikurang );

				/* ini variabel jam menit detik untuk capaian kerja */
				$naura1    = $testes->format('%H');
			 	$naura2  = $testes->format('%I');
			 	$naura3  = $testes->format('%S');

				$izin = $time->jam_izin;


				$naura = $naura1.':'.$naura2.':'.$naura3;
				$akhir3 = date_create($izin);
			  $awal3  = date_create($naura);
			  $diff3  = date_diff($awal3 , $akhir3);

				$jammm    = $diff3->format('%H');
			  $menittt  = $diff3->format('%I');
			  $detikkk  = $diff3->format('%S');


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

			  $yusran = $capaian_kerja_fix/$pembagi*$bh_jam_kerja; //perhari

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
		$data=$this->m->simpan_pus_shift($tahun,$bulan,$nik,$tot,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$jjj,$apakah,$adakah);

		echo json_encode($data);
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

		//start hitung tpp






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
