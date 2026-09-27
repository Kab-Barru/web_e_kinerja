<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peg/Mlap', 'm', TRUE);

		if (
			$this->session->userdata('lev') == 'user_pegawai' &&
			$this->session->userdata('log') == TRUE
		) { } else {
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

	public function detil()
	{
		$data['include'] = 'peg/lap_detil';
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

	function data_detil($id)
	{
		$data = $this->m->data_detil($id);
		echo json_encode($data);
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
