<?php 
	class Author_model extends CI_Model{
		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
			date_default_timezone_set('Asia/Ho_Chi_Minh');				
		}
		//add
		function add($user_nicename,$user_regitered,$display_name){
			$arr_data = array(
							'user_nicename' => $user_nicename,
							'user_registered' => $user_regitered,
							'display_name' => $display_name,
							'user_activation_key'=>'butdanh'
						);
			$this->db->insert('ci_users',$arr_data);
			
			
		}
		//update
		function update($id,$user_nicename,$user_regitered,$display_name){
			$arr_data = array(
							'user_nicename' => $user_nicename,
							'display_name' => $display_name
						);
			$this->db->where('ID',$id);			
			$this->db->update('ci_users',$arr_data);
		}
		//delete
		function delete($id){
			$this->db->where('user_id',$id);
			$this->db->delete('ci_usermeta');
			$this->db->where('ID',$id);
			$this->db->delete('ci_users');
		}
		//get
		//List Posts
		function get($id=0,$magazine='',$limit=-1,$offset=0){
			if($id == 0){
				$this->db->select('id,user_nicename,display_name');
				$this->db->from('ci_users');
				
				$this->db->where('user_activation_key','butdanh');
				if($magazine != '' and $magazine > 0){
					$this->db->join('ci_term_relationships','id = object_id');
					$this->db->where('term_taxonomy_id',$magazine);
				}					
				if($limit > 0){
					$this->db->limit($limit,$offset);
				}
				$query = $this->db->get();			
				return $query->result();
			}elseif($id > 0){
				$query = $this->db->get_where('ci_users',array('ID'=>$id));			
				return $query->result();
			}
		}
		
		function getAjax($user_nicename)
		{
			$this->db->select('id,user_nicename,display_name,name');
			$this->db->from('ci_users');
			$this->db->join('ci_term_relationships', 'ci_term_relationships.object_id = ci_users.id');
			$this->db->join('ci_term_taxonomy', 'ci_term_taxonomy.term_taxonomy_id = ci_term_relationships.term_taxonomy_id');
			$this->db->join('ci_terms', 'ci_terms.term_id = ci_term_taxonomy.term_id');
			$this->db->where('user_activation_key','butdanh');	
			$this->db->where('taxonomy','magazine');			
			$this->db->like('user_nicename',$user_nicename);
			
			$query = $this->db->get();			
			return $query->result();
		}
		
		function checkExitUser($user_nicename,$term_id)
		{
			$this->db->select('user_nicename');
			$this->db->from('ci_users');
			$this->db->join('ci_term_relationships','id = object_id');
			$this->db->where('term_taxonomy_id',$term_id);			
			$this->db->where("ENCODE(user_nicename,'key') = ENCODE('".$user_nicename."','key')");
				
			$query = $this->db->get();		
			if($query->num_rows()>0)
			{
				return true;
			}
			else {
				return false;
			}
		}
		//get id last record
		function get_id_last_row(){
			$query = $this->db->get('ci_users');			
			$last_row = $query->last_row();
			return $last_row->ID;
		}

		function get_by_user_nicename($user_nicename)
		{
			$this->db->select('id');
			$this->db->from('ci_users');			
			$this->db->where("ENCODE(UPPER(user_nicename),'key') = ENCODE(UPPER('".$user_nicename."'),'key')");			
			
			$query = $this->db->get();
			$result = $query->result();			
			if(count($result)>0)
			{
				return  $result[0]->id;
			}
			else 
			{
				return 0;
			}
		}
		
		function add_magazine_author($author_id,$magazine_id)
		{
			$arr = array(
				'user_id'=>$author_id,
				'meta_key'=>'magazine',
				'meta_value'=>$magazine_id
			);
			$this->db->insert('ci_usermeta',$arr);
		}
		
		function addAuthorTag($user_nicename)
		{
			$author_id = $this->get_by_user_nicename($user_nicename);			
			if($author_id>0)
			{
				$this->db->select('user_id,num_tag,date_search');
				$this->db->from('ci_tags');
				$this->db->where('user_id',$author_id);
				$query = $this->db->get();
				$result = $query->result();
				if(count($result)>0)
				{
					$array = array(
						'num_tag'=>($result[0]->num_tag +1),
						'date_search' => date('Y-m-d H:i:s')
					);
					$this->db->where('user_id',$author_id);
					$this->db->update('ci_tags',$array);
				}
				else 
				{
					$array = array(
						'user_id'=>$author_id,
						'num_tag'=>1,
						'date_search'=>date('Y-m-d H:i:s')
					);
					$this->db->insert('ci_tags',$array);					
				}
				return true;
			}
			else 
			{
				return false;				
			}
		}
		
		function getTopTag($limit=0,$ofset=0)
		{
			$this->db->select('user_id,num_tag,date_search,user_nicename');
			$this->db->from('ci_tags');
			$this->db->join('ci_users', 'ci_users.id = user_id');
			$this->db->order_by('num_tag','DESC');
			$this->db->order_by('date_search','DESC');
			if($limit>0)
			{
				$this->db->limit($limit,$ofset);
			}
			$query = $this->db->get();
			return $query->result();
		}
	}
?>