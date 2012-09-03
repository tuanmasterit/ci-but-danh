<?php
	class Comment_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		
		// Get Comments By Post ID
		function getByPost($post_id,$comment_approved,$limit=0,$offset=0)
		{
			$this->db->select('comment_ID,comment_author,comment_author_email,comment_date,comment_content,comment_agent,user_id,comment_approved,id,user_registered');
			$this->db->from('ci_comments');	
			$this->db->join('ci_users', 'ci_users.user_login = comment_author');		
			$this->db->where('ci_comments.comment_post_ID',$post_id);
			$this->db->where('comment_approved',$comment_approved);
			if($limit>0)
			{
				$this->db->limit($limit,$offset);
			}
			$query = $this->db->get();
			return  $query->result();
		}
		
		function get($limit=0,$offset=0,$order_by='comment_date',$order='DESC',$comment_approved='',$term_id=0,$user_id='')
		{
			$this->db->select('comment_ID,comment_post_ID,comment_author,comment_author_email,comment_date,comment_content,comment_agent,ci_comments.user_id,comment_approved,guid,post_title,post_date,user_login,post_author');
			$this->db->from('ci_comments');	
			if($comment_approved!='')
			{		
				$this->db->where('comment_approved',$comment_approved);
			}
                        $this->db->group_by('comment_post_ID');
			$this->db->order_by($order_by,$order);
			if($limit>0)
			{
				$this->db->limit($limit,$offset);
			}
			$this->db->join('ci_posts', 'ci_posts.id = ci_comments.comment_post_ID');
            $this->db->join('ci_users','ci_users.id = ci_posts.post_author');
            if($term_id != '' and $term_id > 0 ){
            	$this->db->join('ci_term_relationships','ci_posts.id=object_id');
                $this->db->join('ci_term_taxonomy','ci_term_relationships.term_taxonomy_id = ci_term_taxonomy.term_taxonomy_id');	
                $this->db->where('ci_term_taxonomy.term_id',$term_id);	
			}
			if($user_id!='')
			{
				$this->db->where('ci_comments.user_id',$user_id);
			}
			$query = $this->db->get();
			return  $query->result();
		}
		
		function add($comment_post_ID,$comment_author,$comment_author_email,$comment_date,$comment_content,$title,$user_id,$comment_approved)
		{
			$comment = array(
				'comment_post_ID'=>$comment_post_ID,
				'comment_author'=>$comment_author,
				'comment_author_email'=>$comment_author_email,
				'comment_date'=>$comment_date,
				'comment_content'=>$comment_content,
				'comment_agent'=>$title,
				'user_id'=>$user_id,
				'comment_approved'=>$comment_approved
			);
			
			$this->db->insert('ci_comments',$comment);
		}
		
		function get_by_id($id){
			$this->db->select('comment_ID,comment_author,comment_author_email,comment_date,comment_content,comment_agent,user_id,comment_approved');
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
		
		function update($comment_ID,$comment_author,$comment_author_email,$comment_content,$title,$comment_approved)
		{
			$comment = array(
				'comment_author'=>$comment_author,
				'comment_author_email'=>$comment_author_email,
				'comment_content'=>$comment_content,
				'comment_agent'=>$title,
				'comment_approved'=>$comment_approved
			);
			$this->db->where('comment_ID',$comment_ID);
			$this->db->update('ci_comments',$comment);			
		}
		
		function delete($id)
		{			
			$this->db->delete('ci_comments',array('comment_ID'=>$id));
		}
		
		function getTopAuthorComment()
		{
			$this->db->select('post_parent,user_nicename,name,Count(*) as count_comment');			
			$this->db->from('ci_users');
			$this->db->join('ci_posts', 'ci_posts.post_parent = ci_users.id');
			$this->db->join('ci_comments', 'ci_comments.comment_post_ID = ci_posts.id');
			$this->db->join('ci_term_relationships', 'ci_term_relationships.object_id=ci_users.id');
			$this->db->join('ci_term_taxonomy', 'ci_term_taxonomy.term_taxonomy_id = ci_term_relationships.term_taxonomy_id');
			$this->db->join('ci_terms', 'ci_terms.term_id = ci_term_taxonomy.term_id');
			$this->db->where('taxonomy','magazine');
			$this->db->where('post_type','topic');
			$this->db->group_by('post_parent');
			$this->db->order_by('count_comment','DESC');
			$this->db->limit(10,0);
			
			$query = $this->db->get();
			$result = $query->result();
			
			return  $result;
		}
	}	
?>