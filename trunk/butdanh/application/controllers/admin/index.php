<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != TRUE){
			redirect('admin/login');
		}
    }		
	public function index()
	{		
		$this->load->view('back_end/view_dashboard');		
	}
	public function accesdenied(){?>
		<script>alert('Bạn không đủ quyền truy cập vào khu vực này !');</script>
        <?php
		$this->load->view('back_end/view_dashboard');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */