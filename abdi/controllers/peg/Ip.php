<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ip extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('peg/mabsensi','m',TRUE);

				if ($this->session->userdata('lev') == 'user_pegawai' &&
				$this->session->userdata('log') == TRUE) {
				}
				else 
				{
				redirect ('log');
				}
    }

	public function index()
	{
	echo "kl";
 
	
}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
