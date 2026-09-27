<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->load->model('su/mdash','m');

            if ($this->session->userdata('lev') == 'user_su'
                    && $this->session->userdata('log') == TRUE) {

            }
            else {
                    redirect ('log');
            }
         }


	public function index()
	{
		$data['include']='su/dash';
    $data['yy'] = $this->m->getpegawai_total();
		$this->load->view('content',$data);
		//$this->load->view('su/dash');
	}

}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
