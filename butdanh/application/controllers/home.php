<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('User_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
    }	
	public function index($module='',$obj_id=0)
	{				
		//tranfer data
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		$this->load->view('front_end/index_view',$data);		
	}	
	public function authentication(){		
		if(!is_null($_REQUEST['txtuser']) && !is_null($_REQUEST['txtpassword'])){
			$user_name =	$_REQUEST['txtuser'];
			$password = $_REQUEST['txtpassword'];
			$this->User_model->authentication($user_name,$password);
			redirect('home');				
		}else{
			redirect('home');	
		}	
	}
	function logout(){
		$this->db->where('user_login',$this->session->userdata('username'));
		$this->db->update('ci_users',array('user_status'=>0));
		$userdata = array(
                   'username'  => '',
                   'logged_in' => FALSE
               );
		$this->session->set_userdata($userdata);
		$this->session->sess_destroy();
		redirect('home');
	}
	
	function register()
	{
		$data['check_exit'] = false;
		$data['check_success'] = false;
		if($this->input->post('txtUserName'))
		{			
			$username = $this->input->post('txtUserName');
			if($this->User_model->check_user_exit($username))
			{
				$data['check_exit'] = true;
			}
			else 
			{
				$pass = $this->input->post('txtpassword');
				$email = $this->input->post('email');
				$user_nicename = $this->input->post('txtHoTen');
				$address = $this->input->post('txtAddress');
				$gender =  $this->input->post('ddlSex');
				$phone = $this->input->post('txtPhone');
				$birthday = $this->input->post('txtNgaySinh');
				$user_regitered = date('Y-m-d h-i-s');
				$this->User_model->add($username,$user_nicename,$email,$user_regitered,$user_nicename,'thanhvien',$pass,$birthday,$phone);
				
				$data['check_success'] = true;
			}			
		}
		//tranfer data
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		$this->load->view('front_end/view_register',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */