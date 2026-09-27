<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atasan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('peg/matasan','m',TRUE);

				if ($this->session->userdata('lev') == 'user_pegawai' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='peg/atasan';
		$data['yy'] = $this->m->get_data();
		$nik = $this->m->get_data();
		$data['peg'] = $this->m->get_pegawai($nik->id_unit_kerja);
		$data['yyy'] = $this->m->get_nama($nik->nik_atasan);
		$this->load->view('content_pegawai',$data);
	}

	public function set_atasan()
	{
		$data['include']='atasan';
		$data['yy'] = $this->m->get_data();
		$nik = $this->m->get_data();
		$data['peg'] = $this->m->get_pegawai($nik->id_unit_kerja);
		$data['yyy'] = $this->m->get_nama($nik->nik_atasan);
		$this->load->view('content_asn',$data);
	}

	public function get_atasan($id){
		$nik=$_SESSION['nip'];
		$cek=$this->db->query("select * from ref_pegawai where nik=$nik")->row();
		$id_pangkat=$cek->id_pangkat;
		$json=['data'=>[]];
			$data=$this->db->query("select * from ref_pegawai where id_unit_kerja=$id and id_pangkat>$id_pangkat")->result();
		$json['data']=$data;
		echo json_encode($json);
	}

	function yusran ()
	{
					if(!isset($_POST['searchTerm'])){
						$fetchData = $this->db->query("select * from ref_pegawai order by nik DESC limit 5");
						$row2 = $fetchData->result();


			  //$fetchData = mysqli_query($con,"select * from ref_pegawai order by nik limit 5");
			}else{
			  $search = $_POST['searchTerm'];
				$fetchData = $this->db->query("select * from ref_pegawai where nik like '%".$search."%' limit 5");
				$row2 = $fetchData->result();
			  //$fetchData = mysqli_query($con,"select * from ref_pegawai where nik like '%".$search."%' limit 5");
			}

			$data = array();
			foreach ($row2 as $roww) {

				$data[] = array("id"=>$roww->nik, "text"=>$roww->nik);
			}


			/*while ($row = mysqli_fetch_array($fetchData)) {
			  $data[] = array("id"=>$row['nik'], "text"=>$row['nama']);
			}*/
			echo json_encode($data);
	}



	function cari_atasan()
	{
		$json = [];
		$this->load->database();
		if(!empty($this->input->get("q"))){
			$this->db->like('nik', $this->input->get("q"));

			$query = $this->db->select('namadf as text')
						->limit(10)
						->get("ref_pegawai");
			$json = $query->result();
		}


		echo json_encode($json);
	}

		function cek_nip($nik)
		{

				$query = $this->db->query("select * from ref_pegawai where nik=$nik");
				$json = $query->row();
					echo json_encode($json);
			}




	function data()
	{
		$data=$this->m->data();
		echo json_encode($data);
	}

	function acuan()
	{
		$id = $_GET['id'];
		$data=$this->m->acuan($id);
		echo json_encode($data);
	}

function pilih($nik){
	$nip=$_SESSION['username'];

 $data= array('nik_atasan' =>$nik );
  $this->db->where('nik',$nip);
 $update= $this->db->update('ref_pegawai',$data);
	$data ? $json = [
		'status' => true, 'messages' => 'Atasan Telah dipilih'
	] : $json = [
		'messages' => 'Upsss sepertinya ada kesalahan'
	];
	echo json_encode($json);
}

		function simpan()
		{
			$a=$this->input->post('aa');
			$nik = $this->session->userdata('username');
			if ($a == $nik)
			{
				$this->session->set_flashdata('ada','Atasan tidak boleh atas nama diri sendiri !');
			}
			else
			{
				if ($a == ''){
					$this->session->set_flashdata('ada','Data NIP belum ada yang dipilih !');

				}
				else {
					$hasil=$this->db->query("UPDATE ref_pegawai set nik_atasan = '$a' where nik ='$nik'");
					$this->session->set_flashdata('ada','Data Berhasil diupdate');
				}

			}
  		redirect('peg/atasan');
		}

		function update()
		{
			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$data=$this->m->update($a,$b);
			echo json_encode($data);
		}

		function hapus(){
			$id=$this->input->post('kode');
			$data=$this->m->hapus($id);
			echo json_encode($data);
		}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
