<?php
	class Comment_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		
		// Get Comments By Post ID
		function getByPost($post_id)
		{
			$this->db->select('comment_ID,comment_author,comment_author_email,comment_date,comment_content,ci_posts.id');
			$this->db->from('ci_comments');			
			$this->db->where('ci_comments.comment_post_ID',$post_id);
			$query = $this->db->get();
			return  $query;
		}
		
		function add($comment_post_ID,$comment_author,$comment_author_email,$comment_date,$comment_content)
		{
			$comment = array(
				'comment_post_ID'=>$comment_post_ID,
				'comment_author'=>$comment_author,
				'comment_author_email'=>$comment_author_email,
				'comment_date'=>$comment_date,
				'comment_content'=>$comment_content
			);
			
			$this->db->insert('ci_comments',$comment);
		}
	}	
?>