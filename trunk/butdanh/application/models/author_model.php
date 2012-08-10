<?php 
	class Author_model extends CI_Model{
		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();				
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
			$this->db->select('id,user_nicename,display_name');
			$this->db->from('ci_users');
			$this->db->where('user_activation_key','butdanh');				
			$this->db->like('user_nicename',$user_nicename);
			
			$query = $this->db->get();			
			return $query->result();
		}
		
		function checkExitUser($user_nicename,$bao_id)
		{
			$this->db->select('user_nicename');
			$this->db->from('ci_users');
			$this->db->join('ci_usermeta', 'ci_usermeta.user_id = ci_users.id');
			$this->db->where('meta_key','magazine');
			$this->db->where('meta_value',$bao_id);	
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
			$this->db->where('user_nicename',$user_nicename);			
			
			$query = $this->db->get();
			$result = $query->result();			
			if(count($result)>0)
			{
				return  $result[0]->id;
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
	}
?>