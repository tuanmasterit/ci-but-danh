<?php
	class Comments extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Comment_model');
		}
		
		function add()
		{
			$comment_post_ID = $this->input->post('post_id');
			$comment_author = $this->input->post('comment_author');
			$comment_author_email = $this->input->post('comment_author_email');
			$comment_date = date('Y-m-d h-i-s');
			$comment_content = $this->input->post('comment_content');
			$comment_title = $this->input->post('comment_title');
			$this->Comment_model->add($comment_post_ID,$comment_author,$comment_author_email,$comment_date,$comment_content,$comment_title);
			
			$last_id =  $this->Comment_model->get_id_last_row();
			$last_comment = $this->Comment_model->get($last_id);
			$html='';
			foreach ($last_comment as $comment)
			{
				$html.="<p class='Title'>".$comment->comment_agent."</p>";
				$html.="<p class='Normal'></p>";
				$html.="<p class='Normal'>".$comment->comment_content."</p>";
				$html.="<p></p>";
				$html.="<p class='Normal' style='margin-top:3px'>";
				$html.="<label class='Author'>".$comment->comment_author."</label>";
				$html.="<label class='CommSep'>|</label>";
				$html.="<label class='CommDate'>".$comment->comment_date."</label>";
				$html.="</p>";
			}
			echo $html;
		}
	}
?>