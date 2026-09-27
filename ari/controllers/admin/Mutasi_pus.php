<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mutasi_pus extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mmutasi_pus','m',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function index()
	{
		$data['include']='admin/mutasi_pus';
		$data['yy'] = $this->m->data();
		$this->load->view('content_admin',$data);
	}

	public function daftar($id)
	{
		$data['include']='admin/mutasi_pus_daftar';
		$data['yy'] = $this->m->daftar($id);
		$this->load->view('content_admin',$data);
	}

	public function exe($id)
	{
		$data['include']='admin/mutasi_pus_exe';
		$data['yy'] = $this->m->daftar_detail($id);
		$data['list'] = $this->m->data($id);
		$this->load->view('content_admin',$data);
	}


	public function proses(){
    // Ambil data ID Provinsi yang dikirim via ajax post
    $id = $this->input->post('id_provinsi');

		$kota = $this->m->load_jabatan($id);

    //$kota = $this->KotaModel->viewByProvinsi($id_provinsi);

    // Buat variabel untuk menampung tag-tag option nya
    // Set defaultnya dengan tag option Pilih
    $lists = "<option value=''>Pilih Ki Disini Jabatannya (Jangan Sampe Lupa)</option>";

    foreach($kota as $data){
      $lists .= "<option value='".$data->id_jabatan."'>".$data->jabatan."</option>"; // Tambahkan tag option ke variabel $lists
    }

    $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  }

	public function save(){
		$a = $this->input->post('nik');
		$b = $this->input->post('b');
		$c = $this->input->post('jabatan');

		/*echo $a .'<br>';
		echo $b .'<br>';
		echo $c .'<br>';
		*/

		$this->m->simpan($a,$b,$c);

		$this->session->set_flashdata('sukses', 'Mutasi / Perpindahan Data Pegawai Berhasil Dilakukan');

		redirect('admin/mutasi_rs');


	}











}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
