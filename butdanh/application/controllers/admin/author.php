<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author extends CI_Controller {

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
		$this->load->model('Term_model');
		$this->load->model('Post_model');
		$this->load->library('pagination');
    }
    
	public function index($row=0)
	{
		include('paging.php');		
		$config['base_url']= base_url()."/admin/author/index/";
		$config['total_rows']= $this->User_model->getCount('butdanh');		
		$config['cur_page']= $row;	
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();
		$data['lstthanhvien'] = $this->User_model->get(0,'butdanh',$config['per_page'],$row);
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$this->load->view('back_end/author_view',$data);
	}
	
	public function add()
	{
		if($this->input->post('txtnicename'))
		{
			$user_nicename = $this->input->post('txtnicename');
			$user_regitered = date('Y-m-d h-i-s');
			$display_name = $this->input->post('txtdescription');
			$term = $this->input->post('slmagazine');
			$meta_value = 'butdanh';
			
			$this->User_model->add('',$user_nicename,'',$user_regitered,$display_name,$meta_value);
			$id = $this->User_model->get_id_last_row();
			$this->Term_model->add_term_relationship($id,$term);
			$this-> session-> set_flashdata('message','Thêm thành viên thành công!');			
			redirect('admin/author','refresh');	
		}
		else 
		{
			$this-> session-> set_flashdata('message','Lỗi!');
			redirect('admin/author','refresh');
		}
	}
	public function add_ajax()
	{
		if($this->input->post('txtnicename'))
		{
			$user_nicename = $this->input->post('txtnicename');
			$user_regitered = date('Y-m-d h-i-s');
			$display_name = '';
			$term = $this->input->post('slmagazine');
			$meta_value = 'butdanh';
			
			$this->User_model->add('',$user_nicename,'',$user_regitered,$display_name,$meta_value);
			$id = $this->User_model->get_id_last_row();
			$this->Term_model->add_term_relationship($id,$term);
			$lstbutdanh = $this->User_model->get(0,'butdanh');
			$html = 'Tác giả:';
			$html .= '<select name="cbxbutdanh" style="width:80%;">';
			foreach($lstbutdanh as $butdanh){
				if($butdanh->id == $id){
					$html .= '<option selected="selected" value="'.$butdanh->id.'">'.$butdanh->user_nicename.'</option>';		
				}else{
					$html .= '<option value="'.$butdanh->id.'">'.$butdanh->user_nicename.'</option>';
				}				
			}
			$html .= '</select>';
			echo $html;	
		}
		else 
		{
			$this-> session-> set_flashdata('message','Lỗi!');
			redirect('admin/author','refresh');
		}
	}
	
	public function edit($id=0,$row=0)
	{
		include('paging.php');		
		$config['base_url']= base_url()."/admin/author/edit/".$id."/";
		$config['total_rows']= $this->User_model->getCount('butdanh');		
		$config['cur_page']= $row;	
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();
		if($this->input->post('txtnicename'))
		{
			$user_id = $this->input->post('id');
			$user_nicename = $this->input->post('txtnicename');
			$user_email = $this->input->post('txtemail');			
			$display_name = $this->input->post('txtdisplay');
			
			$this->User_model->edit($user_id,$user_nicename,$user_email,$display_name);
			
			redirect('admin/author','refresh');
		}
		else 
		{
			$data['user'] = $this->User_model->get($id);
			$data['lstthanhvien'] = $this->User_model->get(0,'butdanh',10,0);
			$this->load->view('back_end/author_view',$data);
		}
	}
	
	public function delete()
	{
		$param = $this->input->post('param');		
		$this->User_model->delete($param);		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */