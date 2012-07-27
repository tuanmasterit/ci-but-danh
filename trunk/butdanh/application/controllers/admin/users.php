<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->model('User_model');
		$this->load->library('pagination');
		// thiết lập vùng giờ mặc định 
		date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    
	public function index($row = 0,$group='thanhvien')
	{				
		//paging
		include('paging.php');		
		$config['base_url']= base_url()."/admin/users/index/";
		$config['total_rows']= $this->User_model->getCount($group);		
		$config['cur_page']= $row;	
		$this->pagination->initialize($config);		
		$data['list_link'] = $this->pagination->create_links();
		
		//data transfer
		if($this->input->post('slgroup') != ''){
			$group = $this->input->post('slgroup');			
		}
		$data['group'] = $group;
		$data['lstthanhvien'] = $this->User_model->get(0,$config['per_page'],$row,$group);
		$this->load->view('back_end/view_users',$data);
	}
	
	public function add()
	{
		if($this->input->post('txtname'))
		{
			$user_login = $this->input->post('txtname');
			$user_nicename = $this->input->post('txtnicename');
			$user_email = $this->input->post('txtemail');
			$user_regitered = date('Y-m-d h-i-s');
			$display_name = $this->input->post('txtdisplay');
			$meta_value = $this->input->post('group');
			$user_pass = $this->input->post('txtpassword');
			
			$this->User_model->add($user_login,$user_nicename,$user_email,$user_regitered,$display_name,$meta_value,$user_pass);
			$this-> session-> set_flashdata('message','Thêm thành viên thành công!');			
			redirect('admin/users/index/0/'.$meta_value,'refresh');
		}
		else 
		{
			$this-> session-> set_flashdata('message','Lỗi!');
			redirect('admin/users'.$meta_value,'refresh');
		}
	}
	
	public function edit($id=0,$row=0)
	{
		if($this->input->post('txtnicename'))
		{
			$user_id = $this->input->post('id');
			$user_nicename = $this->input->post('txtnicename');
			$user_email = $this->input->post('txtemail');			
			$display_name = $this->input->post('txtdisplay');
			$meta_value = $this->input->post('group');
			$user_pass = $this->input->post('txtpassword');
			
			$this->User_model->edit($user_id,$user_nicename,$user_email,$display_name,$meta_value,$user_pass);
			redirect('admin/users','refresh');
		}
		else 
		{
			include('paging.php');		
			$config['base_url']= base_url()."/admin/users/index/";
			$config['total_rows']= $this->User_model->getCount('thanhvien');		
			$config['cur_page']= $row;	
			$this->pagination->initialize($config);
			$data['list_link'] = $this->pagination->create_links();
			
			$data['user'] = $this->User_model->get($id);
			
			$data['lstthanhvien'] = $this->User_model->get(0,$config['per_page'],$row,'thanhvien');
			$this->load->view('back_end/view_users',$data);
		}
	}
	public function profile()
	{
		$username =  $this->session->userdata('username');		
		$user_id = $this->User_model->getByUsername($username);
		if(!$this->input->post('txtId'))
		{			
			$user = $this->User_model->getById($user_id);
			if(!count($user))
			{
				redirect('admin/index');
			}
			else {				
				$data['user'] = $user;
				$this->load->view('back_end/view_profile',$data);
			}
		}
		else
		{
			$user_nicename = $this->input->post('txtnicename');
			$user_email = $this->input->post('txtemail');
			$display_name = $this->input->post('txtdisplay');
			
			$this->User_model->edit($user_id,$user_nicename,$user_email,$display_name);
			$this->session->set_flashdata('profile_change',true);
			redirect('admin/users/profile');
		}
	}
	
	public function change_pass()
	{
		$username =  $this->session->userdata('username');		
		$user_id = $this->User_model->getByUsername($username);
		$user = $this->User_model->getById($user_id);
		if(!count($user))
		{
			redirect('admin/index');
		}
		else {
			if(!$this->input->post('txtPass'))
			{	
				$this->session->set_flashdata('meassage','no pass');								
				$data['user'] = $user;				
				$this->load->view('back_end/view_change_pass',$data);
				
			}
			else
			{
				$user_pass = $this->input->post('txtPass');
				if($user['user_pass']!=$user_pass)
				{
					$this->session->set_flashdata('meassage','pass false');
					
				}
				else 
				{
					$pass_new = $user_pass = $this->input->post('txtPassNew');
					$this->User_model->changePass($user_id,$user_pass);
					$this->session->set_flashdata('meassage','pass succeed');
				}
				
				redirect('admin/users/change_pass');
			}
		}		
	}
	
	public function delete()
	{
		$param = $this->input->post('param');		
		$this->User_model->delete($param);		
	}
	
	public function group(){
		$this->load->view('back_end/view_group',$data);	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */