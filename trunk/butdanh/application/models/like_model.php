<?php
	class Like_model extends  CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		function listTopLike()
		{
			$this->db->select('user_id,user_nicename,name,Count(*) as count_like');
			$this->db->from('ci_usermeta');
			$this->db->join('ci_users', 'ci_users.id=ci_usermeta.user_id');
			$this->db->join('ci_term_relationships', 'ci_term_relationships.object_id=user_id');
			$this->db->join('ci_term_taxonomy', 'ci_term_taxonomy.term_taxonomy_id = ci_term_relationships.term_taxonomy_id');
			$this->db->join('ci_terms', 'ci_terms.term_id = ci_term_taxonomy.term_id');
			$this->db->where('taxonomy','magazine');  
			$this->db->where('meta_key','like');
			$this->db->group_by('user_id');
			$this->db->order_by('count_like','DESC');
			$this->db->limit(10,0);
			$query = $this->db->get();
			$result = $query->result();
			
			return  $result;
		}
		
	}
?>