<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Comment_model');
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('User_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
		$this->load->helper('captcha');
		$this->load->library('email');
		$this->load->helper('security');
    }	
	public function index($module='',$obj_id=0)
	{				
		//tranfer data
		$data['term_toptic'] =0;
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,'',date('Y-m-d h:i:s',strtotime('-30 days')),date('Y-m-d h:i:s'));
		$data['lstToppic_top'] = $lstToppic_top;
		
		$data['lstAuthorMonth'] = $this->Post_model->get_top_author_month(date('m'),date('Y'),10,0);
		$data['lstLatestAuthor'] = $this->User_model->get_latest_author();
		$data['lstLatestComment'] = $this->Comment_model->get(5);
		$data['lstLatesTopic'] = $this->Post_model->get(0, 'topic', 0,'', 5, 0, 'DESC', 'post_date','publish');
		//New topic
		
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		$this->load->view('front_end/index_view',$data);		
	}	
	public function authentication(){		
		if(!is_null($_REQUEST['txtuser']) && !is_null($_REQUEST['txtpassword'])){
			$user_name =	$_REQUEST['txtuser'];
			$password = $_REQUEST['txtpassword'];
			$this->User_model->authentication($user_name,$password);
			redirect('home');				
		}else{
			redirect('home');	
		}	
	}
	function logout(){
		$this->db->where('user_login',$this->session->userdata('username'));
		$this->db->update('ci_users',array('user_status'=>0));
		$userdata = array(
                   'username'  => '',
                   'logged_in' => FALSE
               );
		$this->session->set_userdata($userdata);
		$this->session->sess_destroy();
		redirect('home');
	}
	
	function register()
	{
		$data['check_exit'] = false;
		$data['check_email_exit'] = false;
		$data['check_success'] = false;
		if($this->input->post('txtUserName'))
		{			
			$username = $this->input->post('txtUserName');
			$email = $this->input->post('email');
			if($this->User_model->check_user_exit($username))
			{
				$data['check_exit'] = true;
			}
			else 
			{
				if($this->User_model->check_email_exit($email))
				{
					$data['check_email_exit'] = true;
				}
				else{
					$pass = $this->input->post('txtpassword');
				
					$user_nicename = $this->input->post('txtHoTen');
					$address = $this->input->post('txtAddress');
					$gender =  $this->input->post('ddlSex');
					$phone = $this->input->post('txtPhone');
					$birthday = $this->input->post('txtNgaySinh');
					$user_regitered = date('Y-m-d h-i-s');
					$this->User_model->add($username,$user_nicename,$email,$user_regitered,$user_nicename,'pending',$pass,$birthday,$phone,$address,$gender);
					
					$data['check_success'] = true;
					$user_id = $this->User_model->getByUsername($username);
					
					$config = array(
						'allowed_types' => 'jpg|jpeg|gif|png',
						'upload_path' => './application/content/images/avatars',
						'max_size' => 2000
					);
			
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload()){
						$this->session->set_flashdata('message','Lỗi upload ảnh');
					}
					else {
						//$this->User_model->update_meta($member_id,'avatar','');
						$image_data = $this->upload->data();
						$title = $image_data['file_name'];
						$this->User_model->add_usermeta($user_id,'avatar',$title);
					}
					$verify_code = do_hash($pass, 'md5');
					$verify_code = do_hash($verify_code, 'md5');
					//Send Mail
					$this->email->from('dangky@butdanh.com','Bút Danh');		
					
					
					$this->email->to($email);  
					$this->email->subject('Đăng ký thành viên');
					$email_msg='Chào mừng bạn đến với '.base_url().' <br/><br/>';
					$email_msg.='Hãy nhấn vào đường dẫn sau để kích hoạt tài khoản của bạn: <br/>';
					$email_msg.=base_url().'home/verify/'.$user_id.'/'.$verify_code;
					$this->email->message($email_msg);  
					$this->email->send();   
				}
				
			}			
		}
		//Captcha
		$vals = array(
		    'word'		 => $this->rand_string(4),
		    'img_path'	 => './captcha/',
		    'img_url'	 => base_url().'captcha/',
		    'font_path'	 => base_url().'system/fonts/texb.ttf',
		    'img_width'	 => 100,
		    'img_height' => 25,
		    'expiration' => 7200
		    );
		
		$cap = create_captcha($vals);
		$data['image']=$cap['image'];
		$data['word'] = $cap['word'];
		//tranfer data
		$data['lstAuthorMonth'] = $this->Post_model->get_top_author_month(date('m'),date('Y'),10,0);
		$data['lstLatestAuthor'] = $this->User_model->get_latest_author();
		$data['lstLatestComment'] = $this->Comment_model->get(5);
		$data['new_topics'] = $this->Post_model->get(0, 'topic', 0,'', -1, 0, 'DESC', 'post_date','pending');
		$data['new_topics_reject'] = $this->Post_model->get(0, 'topic', 0,'', -1, 0, 'DESC', 'post_date','reject');
		$data['term_toptic'] =0;
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,'');
		$data['lstToppic_top'] = $lstToppic_top;
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		$this->load->view('front_end/view_register',$data);
	}
	
	function rand_string( $length ) {
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str='';
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}		
		return $str;
	}
	
	function verify($user_id,$verify_code)
	{
		$check = $this->User_model->verify($user_id,$verify_code);
		$data['check'] = $check;
		//tranfer data	
		$data['lstAuthorMonth'] = $this->Post_model->get_top_author_month(date('m'),date('Y'),10,0);
		$data['lstLatestAuthor'] = $this->User_model->get_latest_author();
		$data['lstLatestComment'] = $this->Comment_model->get(5);	
		$data['term_toptic'] =0;
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,'');
		$data['lstToppic_top'] = $lstToppic_top;
		$data['new_topics'] = $this->Post_model->get(0, 'topic', 0,'', -1, 0, 'DESC', 'post_date','pending');
		$data['new_topics_reject'] = $this->Post_model->get(0, 'topic', 0,'', -1, 0, 'DESC', 'post_date','reject');
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		$this->load->view('front_end/view_verify',$data);
	}	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */