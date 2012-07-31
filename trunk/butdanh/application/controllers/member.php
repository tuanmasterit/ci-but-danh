<?php
	class Member extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
			$this->load->model('Post_model');
			$this->load->model('Term_model');
		}
		
		function profile($id)
		{
			$member = $this->User_model->get($id);
			$data['address'] = $this->User_model->get_usermeta($id,'address');
			$data['birthday'] = $this->User_model->get_usermeta($id,'birthday');
			$data['gender'] = $this->User_model->get_usermeta($id,'gender');
			$data['phone'] = $this->User_model->get_usermeta($id,'phone_number');
			//tranfer data
			$data['member'] = $member;
			$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
			$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
			$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
			$this->load->view('front_end/view_member_profile', $data);
		}
	}
?>