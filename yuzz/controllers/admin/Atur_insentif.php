<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atur_insentif extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/matur_tpp','m',TRUE);

				if ($this->session->userdata('lev') == 'user_admin' &&
				$this->session->userdata('log') == TRUE) {
				}
				else {
								redirect ('log');
				}
    }

	public function getdata()
	{
		$data['include']='admin/atur_insentif';
		$data['yy'] = $this->m->get_data();
		$data['unit_kerja'] = $this->m->unit_kerja();
		$data['jabatan'] = $this->m->get_jabatan();
		$data['golongan'] = $this->m->golongan();
		$this->load->view('content_admin',$data);
	}


	public function tambah_triwulan()
	{
		$data['include']='admin/tambah_triwulan';
		$data['yy'] = $this->m->get_data();
		$data['unit_kerja'] = $this->m->unit_kerja();
		$data['jabatan'] = $this->m->get_jabatan();
		$data['golongan'] = $this->m->golongan();
		$this->load->view('content_admin',$data);
	}

	public function insert_triwulan($tahun,$triwulan)
	{

		$this->db->where('id_unit_kerja',13);
		$pegawai=$this->db->get('ref_pegawai')->result();
		foreach ($pegawai as $peg) {
		$data = array(
		  	'tahun' =>$tahun,
				'triwulan'=>$triwulan,
				'nip'=>$peg->nik,
				'p-terima'=>0,
				'p-pph'=>0,
				'p-zakat'=>0,
				'p-sisa'=>0,

				'r-terima'=>0,
				'r-pph'=>0,
				'r-zakat'=>0,
				'r-sisa'=>0,
				'total'=>0,
			 );
			 $result= $this->db->insert('insentif_bapenda',$data);
 }
		redirect('admin/atur_insentif/getdata/'.$tahun.'/'.$triwulan);
			 }


			 public function update_data_umum($tahun)
		 	{

		 		$id=$this->input->post('id');
		 		$a=$this->input->post('a');
		 		$b=$this->input->post('b');
		 		$c=$this->input->post('c');
		 		$d=$this->input->post('d');
		 		$e=$this->input->post('e');
		 		$f=$this->input->post('f');
		 		$g=$this->input->post('g');
		 		$h=$this->input->post('h');
		 		$i=$this->input->post('i');
		 		$j=$this->input->post('j');
		 		$k=$this->input->post('k');
		 		$l=$this->input->post('l');
		 		$m=$this->input->post('m');
		 		$n=$this->input->post('n');

		 		$o=$this->input->post('o');
		 		$p=$this->input->post('p');

		 		$q=$this->input->post('q');

		 		$count=$this->db->get('tb_kelurahan')->num_rows();

		 		for ($kode=0; $kode <$count ; $kode++) {
		 			$data= array(
		 				'a' =>$a[$kode],
		 				'b' =>$b[$kode],
		 				'c' =>$c[$kode],
		 				'd' =>$d[$kode],
		 				'e' =>$e[$kode],
		 				'f' =>$f[$kode],
		 				'g' =>$g[$kode],
		 				'h' =>$h[$kode],
		 				'i' =>$i[$kode],
		 				'j' =>$j[$kode],
		 				'k' =>$k[$kode],
		 				'l' =>$l[$kode],
		 				'm' =>$m[$kode],
		 				'n' =>$n[$kode],
		 				'o' =>$o[$kode],
		 				'p' =>$p[$kode],
		 				'q' =>$q[$kode]
		 		 );

		 			$this->db->where('id',$id[$kode]);
		 			$cek=$this->db->update('tb_data_umum',$data);
		 		}

		 return    redirect(base_url('admin/data_umum_pkk/'.$tahun));




		 }

			 public function update_data()
			 {
				 $tahun=$this->input->post('tahun');
				 $triwulan=$this->input->post('triwulan');
				 $id=$this->input->post('id');
					 	 $a=str_replace(".","",$this->input->post('a'));
					 	 $b=str_replace(".","",$this->input->post('b'));
					 	 $c=str_replace(".","",$this->input->post('c'));
					 	 $d=str_replace(".","",$this->input->post('d'));

						 $where=['tahun'=>$tahun,'triwulan'=>$triwulan];
				 $this->db->where($where);
				 // $insentif=$this->db->get('insentif_bapenda')->result();
				 $count=$this->db->get('insentif_bapenda')->num_rows();

				 for ($kode=0; $kode <$count ; $kode++) {

				 $data = array(
						 'p-terima' =>$a[$kode],
						 'p-pph' =>$b[$kode],
						 'p-zakat' =>($a[$kode]-$b[$kode])*0.025,
						 'p-sisa' =>(($a[$kode]-$b[$kode])-($a[$kode]-$b[$kode])*0.025),

						 'r-terima' =>$c[$kode],
						 'r-pph' =>$d[$kode],
						 'r-zakat' =>($c[$kode]-$d[$kode])*0.025,
						 'r-sisa' =>(($c[$kode]-$d[$kode])-($c[$kode]-$d[$kode])*0.025),
						'total'=>(($a[$kode]-$b[$kode])-($a[$kode]-$b[$kode])*0.025)+(($c[$kode]-$d[$kode])-($c[$kode]-$d[$kode])*0.025),
						);
						$this->db->where('id',$id[$kode]);
						$cek=$this->db->update('insentif_bapenda',$data);
					}

			 return    redirect(base_url('admin//Atur_insentif/getdata/'.$tahun.'/'.$triwulan));
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

	function acuanji()
	{
		$id = $_GET['id'];
		$data['detil']=$this->m->acuanji($id);
		$data['jabatan']=$this->m->jabatan();
		$this->load->view('admin/data_pegawai_edit',$data);
	}


		function simpan()
		{
			$a=$this->input->post('a');
			$b=$this->input->post('b');
			$c=$this->input->post('c');
			$d=$this->input->post('d');
			$e=$this->input->post('e');
			$data=$this->m->simpan($a,$b,$c,$d,$e);
			echo json_encode($data);
		}

		function update()
		{
			$a=$this->input->post('a');
			$e=$this->input->post('e');
			$kelas=$this->input->post('kelas');
			$data=$this->m->update($a,$e,$kelas);
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
