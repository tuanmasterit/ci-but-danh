<?php 
include('class.php');
class User_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();		
		$this->load->database();		
    }		
	//List Posts
	function list_butdanh(){
		$this->db->select('id,user_nicename');
		$this->db->from('ci_users');
		$this->db->join('ci_usermeta', 'id = user_id');
		$this->db->where('meta_key','group');
		$this->db->where('meta_value','butdanh');
				
		$query = $this->db->get();
        
		return $query->result();
	}
	function authentication($user_name,$password){
		//$this->load->helper('security');
		//$user_pass = do_hash($pasword, 'md5'); // MD5
		$query = $this->db->get_where('ci_users',array('user_login'=>$user_name,'user_pass'=>$password));
		if ($query->num_rows() > 0)
		{
			$userdata = array(
                   'username'  => $user_name,
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($userdata);
		 	return true;
		}
		return false;	
	}
}
?>