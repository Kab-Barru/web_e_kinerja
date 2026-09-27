<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dasb extends CI_Controller
{
	private $db_absen;
	public function __construct()
	{
		parent::__construct();

		$this->load->model('peg/mdash', 'm');
		$this->load->model('peg/matasan', 'y', TRUE);
	  $this->db2=$this->load->database('finger', TRUE);
		if(
			$this->session->userdata('lev') == 'user_su'
			or $this->session->userdata('lev') == 'user_pegawai'
			&& $this->session->userdata('log') == TRUE
		) { } else {
			redirect('log');
		}
	}


	public function index()
	{
   // $db2=$this->load->database('finger',TRUE);
	 // $tes=$this->db2->get('users')->result_object();
		// 	var_dump($tes);
		// 	exit;
			// $tes=$db2->get('users')->result_object();
			//  var_dump($tes);
			//  exit;
			$data['include'] = 'dashboard';
			$data['yy'] = $this->m->getpegawai_total();

			$data['tpp'] = $this->m->tpp();
			$nik = $this->y->get_data();
			$data['tpp_max']=$nik->tpp_max;

			$data['nik'] = $this->y->get_data();
			$data['nik_atasan']=$nik->nik_atasan;
			$data['atasan'] = $this->y->get_atasan($nik->nik_atasan);

			$data['izin'] = $this->m->tot_izin();
			$data['halo'] = $this->m->tes();

			$data['c_5_b'] = $this->m->c_5_b();
			$data['c_5_j'] = $this->m->c_5_j();


		//kode 1 sd
		$data['c_sd_1'] = $this->m->c_sd_1();
		$data['c_sd_2'] = $this->m->c_sd_2();


		// // Shift
		$data['shift'] = $this->m->shift();
		// $data['absen']=$this->$db_absen->get('users')->num_row();


		$this->load->view('content_asn',$data);
		//$this->load->view('su/dash');
	}

	public function test()
	{
		$curangJumat = $this->m->getDataCurangJ();
		$curangBiasa = $this->m->getDataCurangB();

		print_r(json_encode($curangJumat));
	}

	public function profil($nip){
		$config['upload_path']="./foto/";
		$config['allowed_types']='gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
				$data = array('upload_data' => $this->upload->data());

				$image= $data['upload_data']['file_name'];
		}
		// $result= $this->Aksi->foto_kadis($image,$id);
		$result= $this->m->foto($image,$nip);
		$result ? $json = [
			'status' => true, 'messages' => 'Data berhasil tersimpan'
		] : $json = [
			'messages' => 'Upsss sepertinya ada kesalahan'
		];
		echo json_encode($json);
	}

}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
