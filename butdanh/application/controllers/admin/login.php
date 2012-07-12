<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
    }		
	public function index()
	{		
		$this->load->view('back_end/login_view');		
	}		
	public function authentication(){		
		if(!is_null($_REQUEST['txtuser']) && !is_null($_REQUEST['txtpassword'])){
			$user_name =	$_REQUEST['txtuser'];
			$password = $_REQUEST['txtpassword'];
			$this->load->model('User_model');
			if($this->User_model->authentication($user_name,$password)){
				redirect('admin/index');	
			}else{
				redirect('admin/login');
			}
		}else{
			redirect('admin/login');	
		}	
	}
	function logout(){
		$userdata = array(
                   'username'  => '',
                   'logged_in' => FALSE
               );
		$this->session->set_userdata($userdata);
		$this->session->sess_destroy();
		redirect('admin/login');
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */