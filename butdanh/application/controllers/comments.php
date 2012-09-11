<?php
	class Comments extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Comment_model');
			$this->load->model('User_model');
		}
		
		function add()
		{		      
			$comment_id = $this->input->post('comment_id');
			$check_edit = $this->input->post('check_edit');			
			$comment_post_ID = $this->input->post('post_id');
			$author_id = $this->session->userdata('user_id');
			$comment_author = $this->session->userdata('username');
			$author = $this->User_model->get($author_id);
			$register_date = date_format(date_create($author['user_registered']),'d-m-Y');
			$comment_author_email = $author['user_email'];
			$comment_date = date('Y-m-d H-i-s');			
			$comment_content = $this->security->xss_clean($this->input->post('comment_content'));
			$comment_title = $this->security->xss_clean($this->input->post('comment_title'));
			if($check_edit=='')
			{
				$this->Comment_model->add($comment_post_ID,$comment_author,$comment_author_email,$comment_date,$comment_content,$comment_title,$author_id,'approved');
			}
			elseif($check_edit=='true')
			{
				$this->Comment_model->update($comment_id,$comment_author,$comment_author_email,$comment_content,$comment_title,'approved');
			}			      
		}
	}
?>