<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('User_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
    }	
	public function index($author_id=0)
	{				
		//tranfer data
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		
		//data profile
		$data['butdanh'] = $this->User_model->get_butdanh($author_id);
		$data['lstpostofbutdanh'] = $this->Post_model->get(0,'post','',$author_id);
		$data['lsttopicofbutdanh'] = $this->Post_model->get(0,'topic','',$author_id);
		
		$list_like = $this->User_model->list_like($author_id);
		
		$data['list_like'] =$list_like;
		
		
		//check login
		if($this->session->userdata('logged_in') != 1){
			$data['check_login'] = false;
		}
		else {
			$data['check_login'] = true;
		}
		//check like
		$user_like = $this->session->userdata('username');
		$check_like = $this->User_model->check_like($author_id,$user_like);
		$data['check_like'] = $check_like;
		if($author_id != 0){
			$this->load->view('front_end/view_profile',$data);
			
		}else{redirect('home');}
	}		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */