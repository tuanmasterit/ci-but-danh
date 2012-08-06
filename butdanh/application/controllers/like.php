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
			$mess1=  "<a id='".$id."' class='link-dislike' href='".base_url()."like/dislike'>
						<img src='".base_url()."application/content/images/dislike-button.jpg'>
				   </a>";
			$list_like = $this->User_model->list_like($id);
			$mess2='';
			if(count($list_like)>0)
            {
                $mess2= "Có ".count($list_like)." người like bút danh này.";
            } 
            echo json_encode(array('mess1'=>$mess1,'mess2'=>$mess2));            
		}
		
		function dislike()
		{
			$id = $this->input->post('id');
			$user_liked = $this->session->userdata('username');
			$this->User_model->delete_like($id,$user_liked);
			$mess1=  "<a id='".$id."' class='link-like' href='".base_url()."like/add'>
						<img src='".base_url()."application/content/images/icon-like.png'>
				   </a>";
			$list_like = $this->User_model->list_like($id);
			$mess2='';
			if(count($list_like)>0)
            {
                $mess2= "Có ".count($list_like)." người like bút danh này.";
            } 
            echo json_encode(array('mess1'=>$mess1,'mess2'=>$mess2)); 
		}
	}
?>