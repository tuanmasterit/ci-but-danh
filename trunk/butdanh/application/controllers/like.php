<?php
	class Like extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
		}
		
		function add()
		{
			$id = $this->input->post('id');
			$user_liked = $this->session->userdata('username');
			$this->User_model->add_like($id,$user_liked);
			echo '<a class="link-dislike" id="'.$id.'" href="'.base_url().'like/dislike"><img src="'.base_url().'application/content/images/dislike-button.jpg" /></a>';
		}
		
		function dislike()
		{
			$id = $this->input->post('id');
			$user_liked = $this->session->userdata('username');
			$this->User_model->delete_like($id,$user_liked);
			echo '<a class="link-like" id="'.$id.'" href="'.base_url().'like/add"><img src="'.base_url().'application/content/images/icon-like.png" /></a>';
		}
	}
?>