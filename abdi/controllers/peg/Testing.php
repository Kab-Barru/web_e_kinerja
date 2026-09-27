<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testing extends CI_Controller {
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
		$nip=$_SESSION['nip'];
		$this->db->where('nip',$nip);
		$cek = $this->db->get('testing')->num_rows();
		if ($cek<1) {
			// $ada = $this->session->set_flashdata('ada', 'Silahkan update data atasan terlebih dahulu');
			redirect(base_url('peg/Dasb'));
		} else {

			$data['include'] = 'testing';
			// $data['yy'] = $this->m->get_data();
			// $data['unit_kerja'] = $this->m->unit_kerja();
			// $data['pegawai'] = $this->m->data();
			$this->load->view('content_asn', $data);
	}
}

public function admin()
{

		$this->load->view('aspat/super_admin');

}

public function Maps()
{

		$this->load->view('aspat/map');

}

public function bantu($id='0')
{
// 	if ($_GET['id']) {
// 	$id='1';
// }else{
// 	$id=$_GET['id'];
// }

	$nip=$_SESSION['nip'];
	$this->db->where('nip',$nip);
	$cek = $this->db->get('testing')->num_rows();
	if ($cek<1) {
		// $ada = $this->session->set_flashdata('ada', 'Silahkan update data atasan terlebih dahulu');
		redirect(base_url('peg/Dasb'));
	} else {

		$data['include'] = 'testing2';
		// $data['yy'] = $this->m->get_data();
		// $data['unit_kerja'] = $this->m->unit_kerja();
		// $data['pegawai'] = $this->m->data();
		$this->db2->where('status','1');
		$data['unit_kerja'] = $this->db2->get('unit_kerjas')->result();
		$this->db2->where('status','1');
		$data['unit_kerja'] = $this->db2->get('unit_kerjas')->result();
		if ($id=='0') {
		$data['pegawai']=$this->db->get('ref_pegawai')->result();
			}else{
				$this->db->where('id_unit_kerja',$id);
				$data['pegawai']=$this->db->get('ref_pegawai')->result();
			}
		$this->load->view('content_asn', $data);
}
}

public function get_pegawai(){

}

public function data_absen($id)
{
	$nip=$_SESSION['nip'];
	$this->db->where('nip',$nip);
	$cek = $this->db->get('testing')->num_rows();
	if ($cek<1) {
		// $ada = $this->session->set_flashdata('ada', 'Silahkan update data atasan terlebih dahulu');
		redirect(base_url('peg/Dasb'));
	} else {

		$data['include'] = 'data_absen';

		$id_lap = $this->uri->segment(4);
		$data['detil'] = $this->m->detil($id_lap);
		$data['absen']=$this->db2->query("select * from t_view_absen where id_pagi=$id OR (id_siang=$id) OR (id_pulang=$id) OR (id_izin=$id) ORDER BY kode DESC")->result();
		$this->load->view('content_asn', $data);
}
}
public function buka()
{
	$nip=$_SESSION['nip'];
	$this->db->where('nip',$nip);
	$cek = $this->db->get('testing')->num_rows();
	if ($cek<1) {
		// $ada = $this->session->set_flashdata('ada', 'Silahkan update data atasan terlebih dahulu');
		redirect(base_url('peg/Dasb'));
	} else {

		$data['include'] = 'buka';

		$id_lap = $this->uri->segment(4);
		$data['detil'] = $this->m->detil($id_lap);
		$data['buka']=$this->db->get('testing')->result();
		$this->load->view('content_asn', $data);
}
}
public function ceklok(){
	$unit=$_SESSION['id_unit_kerja'];
	$this->db2->where('kode_unit_kerja',$unit);
	$device=$this->db2->get('devices')->row();

	$id_absensi=$_SESSION['id_peg'];
	$sn=$device->device_sn;
	$tanggal=date($this->input->post('tanggal'));
	$jam=date($this->input->post('jam'));
	$status=$this->input->post('status');
	$scan=$tanggal.' '.$jam;
	$scan_date=date($scan);

$data = array('id_absensi' =>$id_absensi ,'sn'=>$sn,'status'=>$status,'scan_date'=>$scan);

$insert=$this->db2->insert('kehadirans',$data);
echo $insert;

redirect(base_url('peg/Absensi'));

}
public function ceklokkan(){


	$id_absensi=$this->input->post('id');

	$sn=$this->input->post('sn');
	$tanggal=date($this->input->post('tanggal'));
	$jam=date($this->input->post('jam'));
	$status=$this->input->post('status');
	$scan=$tanggal.' '.$jam;
	$scan_date=date($scan);

$data = array('id_absensi' =>$id_absensi ,'sn'=>$sn,'status'=>$status,'scan_date'=>$scan);

$insert=$this->db2->insert('kehadirans',$data);
echo $insert;

redirect(base_url('peg/Testing/data_absen/'.$id_absensi));

}

	function data()
	{
		$data=$this->m->data();
		echo json_encode($data);
	}

	function data_detil($id)
	{
		$data=$this->m->data_detil($id);
		echo json_encode($data);
	}

	function acuan()
	{
		$id = $_GET['id'];
		$data=$this->m->acuan($id);
		echo json_encode($data);
	}


		function simpan()
		{
			$a=str_replace(".", ":", $this->input->get('a'));
			$b=str_replace(".", ":", $this->input->get('b'));
			$nik = $this->session->userdata('username');
			$data=$this->m->simpan($a,$b);
			echo json_encode($data);


		}

		function simpan_detil()
		{

			$a=str_replace(".", ":", $this->input->post('a'));
			$b=str_replace(".", ":", $this->input->post('b'));

				$data=$this->m->simpan_detil($a,$b);
				echo json_encode($data);



		}

		function update()
		{
			$a=str_replace(".", ":", $this->input->post('a'));
			$b=str_replace(".", ":", $this->input->post('b'));

			//$e=str_replace(".", ":", $this->input->post('e')); //masuk pagi

			$data=$this->m->update($a,$b,$c,$d);
			echo json_encode($data);
		}

		function hapus(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus($id);
			echo json_encode($data);
		}

		function hapus_detil(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus_detil($id);
			echo json_encode($data);
		}

		function kirim(){
			$a=$this->input->post('a');

			$cek = $this->db->query("select * from pro_lap_detil where id_pro_lap = '$a' ");
			$cekk = $cek->num_rows();
			if ($cekk > 0)
			{
				$data=$this->m->kirim($a);
				$this->session->set_flashdata('ada','Data berhasil dikirim');
				echo json_encode($data);
			}
			else {
				$data=$this->session->set_flashdata('ada','Silahkan input detil laporan terlebih dahulu !');
				echo json_encode($data);

		}
		}

		public function absen(){
			$absen=$this->db->query("SELECT * FROM `ref_pegawai` WHERE `id_unit_kerja`='29'")->result();

			foreach ($absen as $abs) {
				$data = array('id_absensi' =>$abs->id,
											'sn'=>'665950191302',
											'status'=>'3',
											'scan_date'=>'2022-02-22 16:00:00',
											'keterangan'=>'',
											'file'=>'',
											'created_at'=>'',
											'updated_at'=>''
			         );
			    	$insert=$this->db2->insert('kehadirans',$data);
			}
			// echo $abs->id;
			// echo '</br>';
			// echo '</br>';

		}




}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
