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
		$this->load->helper('captcha');
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
		$data['check_email_exit'] = false;
		$data['check_success'] = false;
		if($this->input->post('txtUserName'))
		{			
			$username = $this->input->post('txtUserName');
			$email = $this->input->post('email');
			if($this->User_model->check_user_exit($username))
			{
				$data['check_exit'] = true;
			}
			else 
			{
				if($this->User_model->check_email_exit($email))
				{
					$data['check_email_exit'] = true;
				}
				else{
					$pass = $this->input->post('txtpassword');
				
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
		}
		//Captcha
		$vals = array(
		    'word'		 => $this->rand_string(4),
		    'img_path'	 => './captcha/',
		    'img_url'	 => base_url().'captcha/',
		    'font_path'	 => base_url().'system/fonts/texb.ttf',
		    'img_width'	 => 100,
		    'img_height' => 25,
		    'expiration' => 7200
		    );
		
		$cap = create_captcha($vals);
		$data['image']=$cap['image'];
		$data['word'] = $cap['word'];
		//tranfer data
		
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		$this->load->view('front_end/view_register',$data);
	}
	
	function rand_string( $length ) {
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str='';
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}		
		return $str;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */