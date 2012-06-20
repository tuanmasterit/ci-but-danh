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
							'display_name' => $display_name
						);
			$this->db->insert('ci_users',$arr_data);
			$id = $this->get_id_last_row();
			$arr_meta = array(
							'user_id'=>$id,
							'meta_key'=>'group',
							'meta_value'=>'butdanh'
						);
			$this->db->insert('ci_usermeta',$arr_meta);
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
		function get($id,$limit,$offset){
			if($id == 0){
				$this->db->select('id,user_nicename,display_name');
				$this->db->from('ci_users');
				$this->db->join('ci_usermeta', 'id = user_id');
				$this->db->where('meta_key','group');
				$this->db->where('meta_value','butdanh');					
				$this->db->limit($limit,$offset);
				$query = $this->db->get();			
				return $query->result();
			}elseif($id > 0){
				$query = $this->db->get_where('ci_users',array('ID'=>$id));			
				return $query->result();
			}
		}
		//get id last record
		function get_id_last_row(){
			$query = $this->db->get('ci_users');			
			$last_row = $query->last_row();
			return $last_row->ID;
		}		
	}
?>