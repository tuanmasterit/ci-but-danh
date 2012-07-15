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
			$this->db->select('comment_ID,comment_author,comment_author_email,comment_date,comment_content');
			$this->db->from('ci_comments');			
			$this->db->where('ci_comments.comment_post_ID',$post_id);
			$query = $this->db->get();
			return  $query->result();
		}
		
		function add($comment_post_ID,$comment_author,$comment_author_email,$comment_date,$comment_content,$title)
		{
			$comment = array(
				'comment_post_ID'=>$comment_post_ID,
				'comment_author'=>$comment_author,
				'comment_author_email'=>$comment_author_email,
				'comment_date'=>$comment_date,
				'comment_content'=>$comment_content,
				'comment_agent'=>$title
			);
			
			$this->db->insert('ci_comments',$comment);
		}
		
		function get($id){
			$this->db->select('comment_ID,comment_author,comment_author_email,comment_date,comment_content,comment_agent');
			$this->db->from('ci_comments');			
			$this->db->where('ci_comments.comment_ID',$id);
			$query = $this->db->get();
			return $query->result();					
		}	
		
		function get_id_last_row()
		{
			$this->db->select('comment_ID');
			$this->db->from('ci_comments');	
			$this->db->order_by('comment_ID','DESC');
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return  $query->first_row()->comment_ID;
			}
		}
	}	
?>