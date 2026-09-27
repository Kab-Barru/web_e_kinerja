<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Absensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peg/Mlap', 'm', TRUE);
	  $this->db2=$this->load->database('finger', TRUE);
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

			$data['include'] = 'absensi';
			$id_lap = $this->uri->segment(4);
			$data['detil'] = $this->m->detil($id_lap);
			$id=$_SESSION['id_peg'];
	  	$data['absen']=$this->db2->query("select * from t_view_absen where id_pagi=$id OR (id_siang=$id) OR (id_pulang=$id) OR (id_izin=$id) ORDER BY kode DESC")->result();
			$this->load->view('content_asn', $data);
		// }
	}


	public function absen()
	{
		$data['include'] = 'peg/absensi';
		// $id_lap = $this->uri->segment(4);
		// $data['detil'] = $this->m->detil($id_lap);
		$this->load->view('content_pegawai', $data);
	}
	public function detil()
	{
		$data['include'] = 'lap_detil';
		$id_lap = $this->uri->segment(4);
		$data['detil'] = $this->m->detil($id_lap);
		$this->load->view('content_asn', $data);
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

	function detail_absen($id)
	{
		$json=['data'=>[]];

				$data=$this->db2->query("select * from t_view_absen where id_pagi=$id OR (id_siang=$id) OR (id_pulang=$id) OR (id_izin=$id) ORDER BY kode DESC")->result();
		$json['data']=$data;
		echo json_encode($json);
	}

	function acuan()
	{
		$id = $_GET['id'];
		$data = $this->m->acuan($id);
		echo json_encode($data);
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
	function cuti()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$status='0';
		$alasan=$this->input->post('keterangan');
		$nip=$_SESSION['nip'];

	$config['upload_path']="./uploads/";
	$config['allowed_types']='gif|jpg|png|jpeg';
	$config['encrypt_name'] = TRUE;

	 $this->load->library('upload',$config);
	 if($this->upload->do_upload("file")){
			 $data = array('upload_data' => $this->upload->data());
			 $image= $data['upload_data']['file_name'];
		 }

		$data=array('nip' =>$nip,'tgl_awal'=>$tgl1,'tgl_akhir'=>$tgl2,'status'=>$status,'alasan'=>$alasan,'file'=>$image);

		$insert=$this->db->insert('cuti',$data);
		$insert ? $json = [
			'status' => true, 'messages' => 'Data berhasil ditambahkan'
		] : $json = [
			'messages' => 'Upsss sepertinya ada kesalahan'
		];

		echo json_encode($json);

	}
	function tl()
	{
		$nip=$_SESSION['nip'];
		$id_instansi=$_SESSION['id_unker'];
		$tgl=$this->input->post('tanggal');
		$waktu=$this->input->post('waktu');
		$lat=$this->input->post('lat');
		$long=$this->input->post('long');
		$status='0';

		$alasan=$this->input->post('alasan');


	 $config['upload_path']="./uploads/";
	 $config['allowed_types']='gif|jpg|png|jpeg';
	 $config['encrypt_name'] = TRUE;

	 $this->load->library('upload',$config);
	 if($this->upload->do_upload("file")){
			 $data = array('upload_data' => $this->upload->data());
			 $img=$data['upload_data']['file_name'];
		 }

		$data=array(
		'nip'=>$nip,
		'id_absensi'=>$_SESSION['id_peg'],
		'id_instansi'=>$id_instansi,
		'tgl'=>$tgl,
		'jenis_absen'=>$waktu,
		'status'=>$status,
		'keterangan'=>$alasan,
		'lat'=>$lat,
		'long'=>$long,
		'file'=>$img
	);

		$insert=$this->db->insert('tugas_luar',$data);
		$insert ? $json = [
			'status' => true, 'messages' => 'Data berhasil ditambahkan'
		] : $json = [
			'messages' => 'Upsss sepertinya ada kesalahan'
		];

		echo json_encode($json);

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

	function hapus_absensi($kode){

		$id=substr($kode,0,-20);
		$tgl=str_replace($id.'-',"",$kode);
		$time=str_replace("x"," ",$tgl);

		$json = ['status' => false, 'messages' => []];
		$where= array('id_absensi' =>$id,
	                'scan_date'=>$time,
							  	);
		$this->db2->where($where);

		$delete = $this->db2->delete('kehadirans');
		$delete ? $json = [
			'status' => true, 'messages' => 'Data berhasil dihapus'
		] : $json = [
			'messages' => 'Upsss sepertinya ada kesalahan'
		];
		echo json_encode($json);

	}

	function hapus_absensi($kode){


		$this->db->where('nip',$kode);

		$delete = $this->db->delete('testing');
		$delete ? $json = [
			'status' => true, 'messages' => 'Data berhasil dihapus'
		] : $json = [
			'messages' => 'Upsss sepertinya ada kesalahan'
		];
		echo json_encode($json);

	}

	function batal_cuti($id){


 		$this->db->where('id',$id);

 		$delete = $this->db->delete('cuti');
 		$delete ? $json = [
 			'status' => true, 'messages' => 'Data berhasil dihapus'
 		] : $json = [
 			'messages' => 'Upsss sepertinya ada kesalahan'
 		];
 		echo json_encode($json);

 	}
	function batal_tl($id){


 		$this->db->where('id',$id);

 		$delete = $this->db->delete('tugas_luar');
 		$delete ? $json = [
 			'status' => true, 'messages' => 'Data berhasil dihapus'
 		] : $json = [
 			'messages' => 'Upsss sepertinya ada kesalahan'
 		];
 		echo json_encode($json);

 	}
	function kirim()
	{
		$a = $this->input->post('a');

		$cek = $this->db->query("select * from pro_lap_detil where id_pro_lap = '$a' ");
		$cekk = $cek->num_rows();

		if ($cekk > 0) {
			$data = $this->m->kirim($a);
			$this->session->set_flashdata('ada', 'Data berhasil dikirim');
			echo json_encode($data);
		} else {
			$data = $this->session->set_flashdata('ada', 'Silahkan input detil laporan terlebih dahulu !');
			echo json_encode($data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
