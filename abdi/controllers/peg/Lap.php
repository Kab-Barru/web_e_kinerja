<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peg/Mlap', 'm', TRUE);
	  // $this->db2=$this->load->database('finger', TRUE);


		if (
			$this->session->userdata('lev') == 'user_pegawai' &&
			$this->session->userdata('log') == TRUE
		) {
		} else {
			redirect('log');
		}
	}




	public function index()
	{
		$cek = $this->m->cek_atasan();
		if ($cek->nik_atasan == 0) {
			$ada = $this->session->set_flashdata('ada', 'Silahkan update data atasan terlebih dahulu');
			redirect('peg/atasan');
		} else {
			$data['include'] = 'peg/lap';
			$data['yy'] = $this->m->get_data();
			$data['unit_kerja'] = $this->m->unit_kerja();
			// $data['pegawai'] = $this->m->data();
			$this->load->view('content_pegawai', $data);
		}
	}

	public function laps()
	{
		$cek = $this->m->cek_atasan();
		if ($cek->nik_atasan == 0) {
			$ada = $this->session->set_flashdata('ada', 'Silahkan update data atasan terlebih dahulu');
			redirect('peg/atasan');
		} else {
			$data['include'] = 'peg/laps';
			$data['yy'] = $this->m->get_data();
			$data['unit_kerja'] = $this->m->unit_kerja();
			// $data['pegawai'] = $this->m->data();
			$this->load->view('content_pegawai', $data);
		}
	}


	public function chek(){
	$daftar_hari = array(
 'Sunday' => 'Minggu',
 'Monday' => 'Senin',
 'Tuesday' => 'Selasa',
 'Wednesday' => 'Rabu',
 'Thursday' => 'Kamis',
 'Friday' => 'Jumat',
 'Saturday' => 'Sabtu'
);
$date="2022-01-13";
$namahari = date('l', strtotime($date));

echo $daftar_hari[$namahari];

if ($daftar_hari[$namahari]=='Jumat') {
echo 'ok';
}else{
	echo 'no';
}
	}

	public function hack()
	{
		$cek = $this->m->cek_atasan();
		if ($cek->nik_atasan == 0) {
			$ada = $this->session->set_flashdata('ada', 'Silahkan update data atasan terlebih dahulu');
			redirect('peg/atasan');
		} else {
			$data['include'] = 'peg/lap1';
			$data['yy'] = $this->m->get_data();
			$data['unit_kerja'] = $this->m->unit_kerja();

			$this->load->view('content_pegawai', $data);
		}
	}

	public function cetak()
	{
		$data['include'] = 'peg/cetak_laporan';
		$id_lap = $this->uri->segment(4);
		$data['detil'] = $this->m->detil($id_lap);
		$this->load->view('content_pegawai', $data);
	}

	public function detils()
	{
		if ($_SESSION['username'] =='199508222020121006') {
				$hal='peg/lap_detill2';
		}else{
			$hal='peg/lap_detil2';
		}
		$data['include'] = $hal;
		$id_lap = $this->uri->segment(4);
		$data['detil'] = $this->m->detil($id_lap);
		$this->load->view('content_pegawai', $data);
	}
	public function detil()
	{
		$data['include'] = 'peg/lap_detil';
		$id_lap = $this->uri->segment(4);
		$data['detil'] = $this->m->detil($id_lap);
		$this->load->view('content_pegawai', $data);
	}
	public function selisih()

	{
	$batas= strtotime("16:00:00");
	$jam1=strtotime("12:50:20");

	 echo $selisih=$batas-$jam1;
}

	function acuanji()
	{
		$id = $_GET['id'];
		$data['detil'] = $this->m->acuanji($id);
		$this->load->view('peg/lap_edit', $data);


	}

	function data()
	{
		$data = $this->m->data();
		echo json_encode($data);
	}

	function data_detil($id)
	{

		$json=['data'=>[]];
		// $this->db->where('status',$id);
		$data=$this->db->query("SELECT * FROM pro_lap_detil where id_pro_lap ='$id' order by urutan ASC, 	id_pro_lap_detil ASC")->result();
		$json['data']=$data;
		echo json_encode($json);
	}

	function data_detil2($id)
	{
		$data = $this->m->data_detil($id);
		echo json_encode($data);
	}

	function acuan($id)
	{
		// $id = $_GET['id'];

		// $data = $this->m->acuan($id);
		// echo json_encode($data);

		// $json=['data'=>[]];
		// $this->db->where('status',$id);

		$data=$this->db->query("SELECT * FROM pro_lap_detil WHERE id_pro_lap_detil='$id'")->row();
		// $json['data']=$data;
		echo json_encode($data);
	}

	function acuanku()
	{
		$id = $_GET['id'];

		$data = $this->m->acuan($id);
		echo json_encode($data);

		// $json=['data'=>[]];
		// $this->db->where('status',$id);

		// $data=$this->db->query("SELECT * FROM pro_lap_detil WHERE id_pro_lap_detil='$id'")->row();
		// $json['data']=$data;
		// echo json_encode($data);
	}
	function simpan()
	{
		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$nik = $this->session->userdata('username');
		$tgl = date('Y-m-d', strtotime($a));
		$cek = $this->db->query("select * from pro_lap where tanggal = '$tgl' and nik ='$nik'");
		$cekk = $cek->num_rows();
		if ($cekk == 0) {
			$kembali['query'] = $this->m->simpan($a, $b);
			$kembali['status'] = true;
			$kembali['pesan'] = "Sukses";
			//$data=$this->m->simpan($a,$b);
			echo json_encode($kembali);
		} else {
		}
	}

	function auto_simpan()
	{
		// $a = $this->input->post('a');
		$nip =$this->input->post('nip');

		$jam_masuk =date('H:i:s', strtotime($this->input->post('jam')));
		// $ckl=$this->db2->query("select * from `t_kehadirans` where `id_absensi`='$ip' and `tanggal`='$skr'")->row();
		$uk=$this->input->post('uk');
		echo $jam_masuk;
		echo $nip;
		echo $uk;

		if ($jam_masuk<'07:35:00') {
		$jam='07:30:00';
	}else{
		$jam=$jam_masuk;
	}

		$b = '0';

		$nik = $this->session->userdata('username');
		$now = date('Y-m-d');
		$tgl = date('Y-m-d', strtotime($now));
		$cek = $this->db->query("select * from pro_lap where tanggal ='$tgl' and nik ='$nik'");

		$cekk = $cek->num_rows();
		echo $cekk;
		if ($cekk == 0) {
			$kembali['query'] = $this->m->simpan($now, $b);
			$kembali['status'] = true;
			$kembali['pesan'] = "Sukses";

			$jp = date("H:i:s", strtotime("07:35:00"));
			$jm = date('H:i:s', strtotime($jam));
			if ($jp < $jm) {
				$ket = "Terlambat";
			} else {
				$ket = "Tepat Waktu";
			}

			$batas= strtotime("12:00:00");
			$jam1=strtotime($jam);
			$selisih=$batas-$jam1;

			$data = array(
				'nip' => $nip,
				'jam_masuk' => date('H:i:s', strtotime($jam)),
				'tgl' => date('Y-m-d', strtotime($tgl)),
				'selisih_jam_masuk'=>$selisih,
				'id_instansi'=>$uk,
				'ket_jam_masuk' => $ket,
			);

			$this->db->insert('absen_finger', $data);

	    $cek2 = $this->db->query("select * from pro_lap where tanggal = '$tgl' and nik ='$nik'")->row();
			$datas = array(
				'id_pro_lap' =>$cek2->id_pro_lap,
				'uraian_tugas' => 'Masuk Kantor',
				'jam' =>date('H:i', strtotime($jam)),
				'output'=>'Data dari Mesin Finger',
				'urutan' =>'1',
			);
				$this->db->insert('pro_lap_detil', $datas);

	   	echo json_encode($kembali);
		}
	}

	function auto_tarik()
	{
		$id = $this->input->post('id');
		$kode=$this->input->post('kode');

		$this->db->where('id',$id);
		$cek_nip=$this->db->get('ref_pegawai')->row();
		$nip=$cek_nip->nik;

		$tgl=substr($kode,0,10);
		$jam_masuk=str_replace($tgl.'x',"",$kode);
		// $jam_masuk=str_replace("x"," ",$date);


		$uk=$cek_nip->id_unit_kerja;
		echo $tgl.'</br>';
		echo $jam_masuk.'</br>';
		echo $nip.'</br>';
		echo $uk;

	if ($jam_masuk<'07:35:00') {
		$jam='07:30:00';
	}else{
		$jam=$jam_masuk;
	}

		$b = '0';

		$nik = $nip;
		$now =$tgl;

		$cek = $this->db->query("select * from pro_lap where tanggal ='$tgl' and nik ='$nik'");

		$cekk = $cek->num_rows();

		if ($cekk == 0) {
			$kembali['query'] = $this->m->simpan_lap($nik,$now,$b);
			$kembali['status'] = true;
			$kembali['pesan'] = "Sukses";

			$jp = date("H:i:s", strtotime("07:35:00"));
			$jm = date('H:i:s', strtotime($jam));
			if ($jp < $jm) {
				$ket = "Terlambat";
			} else {
				$ket = "Tepat Waktu";
			}

			$batas= strtotime("12:00:00");
			$jam1=strtotime($jam);
			$selisih=$batas-$jam1;


	    $cek2=$this->db->query("select * from `pro_lap` where `tanggal`='$tgl' and `nik`='$nik'")->row();


			$datas = array(
				'id_pro_lap' =>$cek2->id_pro_lap,
				'uraian_tugas' => 'Masuk Kantor',
				'jam' =>date('H:i', strtotime($jam)),
				'output'=>'Data dari Mesin Finger',
				'urutan' =>'1',
			);
				$this->db->insert('pro_lap_detil',$datas);

	   	echo json_encode($kembali);
		}
	}

	function simpan_detil()
	{

		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$c = $this->input->post('c');
		$d = $this->input->post('d');
		$e = $this->input->post('e');

		$data = $this->m->simpan_detil($a, $b, $c, $d, $e);
		echo json_encode($data);
	}

	function update()
	{
		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$c = $this->input->post('c');


		$data = $this->m->update($a, $b, $c);
		echo json_encode($data);
	}

	function update_det()
	{
		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$c = $this->input->post('c');
		$d = $this->input->post('d');
		$e = $this->input->post('e');

		$data = $this->m->update_det($a, $b, $c, $d, $e);
		echo json_encode($data);
	}

	function hapus()
	{
		$id = $this->input->post('kode');
		$kembali['query'] = $this->m->hapus($id);
		$kembali['status'] = true;
		$kembali['pesan'] = "Sukses";
		// $data=$this->m->hapus($id);
		echo json_encode($kembali);
	}

	function hapus_detil()
	{
		$id = $this->input->post('kode');
		$data = $this->m->hapus_detil($id);
		echo json_encode($data);
	}


	function kirim_lap($a)
	{
		// $a= $_POST['a'];
		$tgl=date('Y-m-d');
		$cek = $this->db->query("select * from pro_lap_detil where id_pro_lap = '$a' ");
		$cekk = $cek->num_rows();
		$query1=$this->db->query("select * from pro_lap where id_pro_lap = '$a' ")->row();

		if ($cekk > 0) {

			$this->db->where('id_pro_lap',$a);
			$data = array('status' =>'1','tanggal_kirim'=>$tgl);

			$json=$this->db->update('pro_lap',$data);
					// redirect('../../../peg/lap');
		}

	}

	function kirim($id)
	{
		$a= $id;

		$cek = $this->db->query("select * from pro_lap_detil where id_pro_lap = '$a' ");
		$cekk = $cek->num_rows();
		$query1=$this->db->query("select * from pro_lap where id_pro_lap = '$a' ")->row();
		$tgl=$query1->tanggal;

		if ($cekk > 0) {

			$id_peg=$_SESSION['id_peg'];
			$tgl=$query1->tanggal;
			$kode=$id_peg.'-'.$tgl;

			$absen = $this->db2->query("select * from t_absen_tiga_kali where kode ='$kode'")->row();

		// 	$daftar_hari = array(
		//  'Sunday' => 'Minggu',
		//  'Monday' => 'Senin',
		//  'Tuesday' => 'Selasa',
		//  'Wednesday' => 'Rabu',
		//  'Thursday' => 'Kamis',
		//  'Friday' => 'Jumat',
		//  'Saturday' => 'Sabtu'
		// );
		//
		// $namahari = date('l', strtotime($tgl));
		//
		// echo $daftar_hari[$namahari];
		// if ($daftar_hari[$namahari]=='Jumat') {
		// 	if ($absen->jam_siang) {
		// 		// code...
		// 	}
		// }

  	 $js=$absen->jam_siang;

	   $jp=$absen->jam_pulang;
		 echo $js;

			$data = $this->m->kirim($a,$js,$jp);
   	$data ? $json = [
			'status' => true, 'messages' => 'Data Telah Dikirim'
		] : $json = [
			'messages' => 'Upsss sepertinya ada kesalahan'
		];
		echo json_encode($json);
		}
	}


	function hapus_laporan($id){
		$json = ['status' => false, 'messages' => []];

		$this->db->where('id_pro_lap_detil',$id);
		$delete = $this->db->delete('pro_lap_detil');
		$delete ? $json = [
			'status' => true, 'messages' => 'Data berhasil dihapus'
		] : $json = [
			'messages' => 'Upsss sepertinya ada kesalahan'
		];
		echo json_encode($json);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
