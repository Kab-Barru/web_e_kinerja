<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   require APPPATH . 'libraries/REST_Controller.php';



class Api extends CI_Controller {

	// public function __construct()
 //    {
 //        parent::__construct();
 //        $this->load->model('su/munit_kerja','m',TRUE);

	// 			if ($this->session->userdata('lev') == 'user_su' &&
	// 			$this->session->userdata('log') == TRUE) {
	// 			}
	// 			else {
	// 							redirect ('log');
	// 			}
 //    }




	public function index()
	{
		$data['include']='su/unit_kerja';
		$data['yy'] = $this->m->data();
		$this->load->view('content',$data);
	}


  	public function unit_kerja()
  	{

      $data=$this->db->get('ref_unit_kerja')->result_array();
          echo json_encode($data);
 }
  	

	function data()
	{
		 if ($this->input->get('id')== null) {
			 $data=$this->db->get('view_ref_finger')->result_array();
		    echo json_encode($data);
		 }
		else{
				 $this->db->where('id', $this->input->get('id')
				);
				 $data=$this->db->get('view_ref_finger')->result_array();
		         echo json_encode($data);
		}

	}

  function pegawai()
	{
		 if ($this->input->get('nip')== null) {
			 $data=$this->db->get('ref_pegawai')->result_array();
		    echo json_encode($data);
		 }
		else{
				 $this->db->where('nik', $this->input->get('nip')
				);
				 $data=$this->db->get('ref_pegawai')->result_array();
		         echo json_encode($data);
		}

	}

	function unit()
	{
		 if ($this->input->get('id_unit_kerja')==null) {
			 $data=$this->db->get('ref_unit_kerja')->result_array();
		    echo json_encode($data);
		 }
		else{
				 $this->db->where('id_unit_kerja', $this->input->get('id_unit_kerja')
				);
				 $data=$this->db->get('ref_unit_kerja')->result_array();
		         echo json_encode($data);
		}

	}

	function Api_pegawai()
	{


			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://e-kinerja.barrukab.go.id/api/Api/data/',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET',
			  CURLOPT_HTTPHEADER => array(
			    'Cookie: ci_session=6m0vliva7ekgt5t4pvnms3785a0495kr'
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;

	}

	function finger(){

		$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://e-finger.barrukab.go.id/api/data-absensi?tanggal=2021-10-22&waktu=1&unker=19&id_absensi=555',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
	}






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
