<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('peg/mpassword','m',TRUE);

				if ($this->session->userdata('lev') == 'user_pegawai'
				or $this->session->userdata('lev') == 'user_admin'
				or $this->session->userdata('lev') == 'user_su'
				or $this->session->userdata('lev') == 'user_sdm'
				&&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='peg/password';
		$this->load->view('content_pegawai',$data);
	}

	public function ubah()
	{
		$a=$this->input->post('a');
		$b=$this->input->post('b');
		$nik = $this->session->userdata('username');

		$result = $this->m->cek($a,$nik);
		if ($result > 0){
			$hasil=$this->db->query("UPDATE ref_log set password = MD5('$b') where username ='$nik'");
			$this->session->set_flashdata('ada', 'Password anda telah diganti dengan ' . $b);

		}
		else
		{
			$this->session->set_flashdata('ada', 'Tidak dapat diproses (Password lama tidak sesuai !)');
		}


		redirect('peg/password');
	}


	public function ubah_password()
	{
		$a=$this->input->post('a');
		$b=$this->input->post('b');
		$nik = $this->session->userdata('username');

		$result = $this->m->cek($a,$nik);
		if ($result > 0){
			$hasil=$this->db->query("UPDATE ref_log set password = MD5('$b') where username ='$nik'");
			$json = [	'status' => true, 'messages' => 'Password Berhasil di Ubah'	] ;

		}
		else
		{
			$json = [
				'messages' => 'Upsss sepertinya ada kesalahan'
			];
		}
     echo json_encode($json);
	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
