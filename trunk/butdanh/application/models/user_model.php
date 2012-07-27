<?php 
class User_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();		
		$this->load->database();	
		$this->load->helper('security');	
    }		
	//List User
	function get($id=0,$limit=-1,$offset=0,$user_activation_key='',$term_id=0,$order_by='user_registered',$order='DESC',$status=-1){
		if($id==0)
		{
			$this->db->select('id,user_login,user_nicename,user_email,display_name,user_activation_key,user_status');
			$this->db->from('ci_users');
			if($user_activation_key != ''){
				$this->db->where('user_activation_key',$user_activation_key);	
			}
			if($term_id > 0){
				$this->db->join('ci_term_relationships','id = object_id');
				$this->db->where('term_taxonomy_id',$term_id);	
			}
			if($limit > 0){
				$this->db->limit($limit,$offset);
			}
			$this->db->order_by($order_by,$order);
			if($status>-1)
			{
				$this->db->where('user_status',$status);
			}
			$query = $this->db->get();
        
			return $query->result();
		}
		elseif ($id>0)
		{
			$this->db->select('id,user_login,user_nicename,user_email,display_name,term_taxonomy_id,user_activation_key');
			$this->db->from('ci_users');
			$this->db->where('id',$id);
			$query = $this->db->get();
        	$data = array();
        	$data = $query->row_array();
			return $data;
		}		
		
	}
	function get_butdanh($id=0,$limit=-1,$offset=0,$user_activation_key='',$term_id=0,$order_by='user_registered',$order='DESC'){
		if($id==0)
		{
			$this->db->select('id,user_login,user_nicename,user_email,display_name,user_activation_key');
			$this->db->from('ci_users');
			if($user_activation_key != ''){
				$this->db->where('user_activation_key',$user_activation_key);	
			}
			if($term_id > 0){
				$this->db->join('ci_term_relationships','id = object_id');
				$this->db->where('term_taxonomy_id',$term_id);	
			}
			if($limit > 0){
				$this->db->limit($limit,$offset);
			}
			$this->db->order_by($order_by,$order);
			$query = $this->db->get();
        
			return $query->result();
		}
		elseif ($id>0)
		{
			$this->db->select('id,user_login,user_nicename,user_email,display_name,user_activation_key,term_taxonomy_id,name');
			$this->db->from('ci_users');
			$this->db->join('ci_term_relationships','id = object_id');
			$this->db->join('ci_terms','term_taxonomy_id = term_id');
			$this->db->where('id',$id);
			$query = $this->db->get();
        	$data = array();
        	$data = $query->row_array();
			return $data;
		}		
		
	}
	//List User byParent
	function getByParent($parentid){
			$this->db->select('user_login,display_name,meta_value');
			$this->db->from('ci_users');
			$this->db->join('ci_usermeta', 'id = user_id');
			$this->db->where('meta_key','parent');
			$this->db->where('meta_value',$parentid);
			$query = $this->db->get();   
			return $query->result();
	}
	
	function getCountByParent($parentid)
	{
		$this->db->from('ci_users');
		$this->db->join('ci_usermeta', 'id = user_id');
		$this->db->where('meta_key','parent');
		$this->db->where('meta_value',$parentid);	
		return $this->db->count_all_results();
	}
	
	function authentication($user_name,$password){		
		$user_pass = do_hash($password, 'md5'); // MD5
		$query = $this->db->get_where('ci_users',array('user_login'=>$user_name,'user_pass'=>$user_pass));
		if ($query->num_rows() > 0)
		{
			$userdata = array(
                   'username'  => $user_name,
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($userdata);
			$this->db->where('user_login',$user_name);
			$this->db->update('ci_users',array('user_status'=>1));
		 	return true;
		}
		return false;	
	}
	
	function add($user_login,$user_nicename,$user_email,$user_regitered,$display_name,$user_activation_key,$user_pass='')
	{
		if($user_pass != ''){
			$user_pass = do_hash($user_pass, 'md5');	
		}
		$user = array(
			'user_login'=>$user_login,
			'user_nicename'=>$user_nicename,
			'user_email'=>$user_email,
			'user_registered'=>$user_regitered,
			'display_name'=>$display_name,
			'user_pass'=>$user_pass,
			'user_activation_key'=>$user_activation_key
		);

		//Thêm thành viên
		$this->db->insert('ci_users',$user);
		$id = $this->get_id_last_row();						
	}
	
	//get id last record
	function get_id_last_row(){
		$this->db->order_by('id','ASC');
		$query = $this->db->get('ci_users');
					
		$last_row = $query->last_row();
		return $last_row->ID;
	}
	
	function edit($id,$user_nicename,$user_email,$display_name,$meta_value='',$user_pass='')
	{
		$user = array(
			'user_nicename'=>$user_nicename,
			'user_email'=>$user_email,
			'display_name'=>$display_name,
			'user_pass'=>$user_pass			
		);		
		$this->db->where('id',$id);
		$this->db->update('ci_users',$user);
		if($meta_value != ''){
			$this->db->where('user_id',$id);	
			$this->db->where('meta_key','group');
			$this->db->update('ci_usermeta',array('meta_key'=>$meta_value));
		}
		if($user_pass != ''){
			
			$this->changePass($id,$user_pass);
		}
	}
	function update_author($id,$user_nicename,$user_email,$display_name,$magazine_id)
	{
		$user = array(
			'user_nicename'=>$user_nicename,
			'user_email'=>$user_email,
			'display_name'=>$display_name,			
		);		
		$this->db->where('id',$id);
		$this->db->update('ci_users',$user);
		
		//update magazine
		$arr_magazine = array(
			'term_taxonomy_id' => $magazine_id
		);
		$this->db->where('object_id',$id);
		$this->db->update('ci_term_relationships',$arr_magazine);
	}
	function delete($id)
	{
		//Delete User		
		$this->db->delete('ci_users',array('id'=>$id));
		
		//Delete User Meta		
		$this->db->delete('ci_usermeta',array('user_id'=>$id));
		
	}
	
	function getCount($meta_value)
	{
		$this->db->from('ci_users');
		$this->db->join('ci_usermeta', 'id = user_id');
		$this->db->where('meta_key','group');
		$this->db->where('meta_value',$meta_value);		
		return $this->db->count_all_results();
	}
	
	function getByUsername($username)
	{
		$this->db->from('ci_users');
		$this->db->where('user_login',$username);
		$query = $this->db->get();
		$row =  $query->first_row();
		return $row->ID;		
	}
	function searchByUsername($username)
	{
		$this->db->select('user_login');
		$this->db->from('ci_users');
		$this->db->like('user_login', $username);
		$this->db->limit(5,0);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function getById($id)
	{
		$this->db->select('id,user_login,user_pass,user_nicename,user_email,display_name');
		$this->db->from('ci_users');		
		$this->db->where('id',$id);
		$query = $this->db->get();
        $data = array();
        if($query->num_rows>0)
        {
        	$data = $query->row_array();        	
        }
        return $data;
	}
	function changePass($user_id,$new_pass){
		$user_pass = do_hash($new_pass, 'md5'); // MD5
		$this->db->where('id',$user_id);
		$this->db->update('ci_users',array('user_pass'=>$user_pass));	
	}
	
	function add_like($user_be_liked,$user_liked)
	{
		$like = array(
			'user_id' 	=> $user_be_liked,
			'meta_key'	=> 'like',
			'meta_value'=> $user_liked
		);
		
		$this->db->insert('ci_usermeta',$like);
	}
	
	function delete_like($user_be_liked,$user_liked)
	{
		$like = array(
			'user_id' 	=> $user_be_liked,
			'meta_key'	=> 'like',
			'meta_value'=> $user_liked
		);
		
		$this->db->delete('ci_usermeta',$like);
	}
	
	function check_like($user_be_liked,$user_liked)
	{
		
		$this->db->where('user_id',$user_be_liked);
		$this->db->where('meta_key','like');
		$this->db->where('meta_value',$user_liked);
		$query = $this->db->get('ci_usermeta');
		$result = $query->result();
		if(count($result)>0)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
}
?>