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
		if($this->session->userdata('logged_in') == 1 && ($this->session->userdata('user_activation_key') == 'administrator' || $this->session->userdata('user_activation_key') == 'bandieuphoi' || $this->session->userdata('user_activation_key') == 'congtacvien')){
			$this->load->model('User_model');
			$this->load->model('Term_model');
			$this->load->model('Post_model');
			$this->load->library('pagination');
			$this->load->model('Author_model');
		}else{redirect('admin/index/accesdenied');}		
		$this->load->database();
		$this->db->cache_delete($this->router->fetch_class(), $this->router->fetch_method());
        $this->db->simple_query('SET NAMES \'utf-8\'');
    }
    
	public function index($term=0,$butdanh='~',$row=0)
	{
		
        $data['keymagazine'] = $term;
		if($this->input->post('slmagazine') != ''){
			$data['keymagazine'] = $this->input->post('slmagazine');
		}
        $data['butdanh'] = urldecode($butdanh);
        if ($this->input->post('butdanh') != '')
        {
            $data['butdanh'] = $this->input->post('butdanh');
        }
        //echo $data['magazine'];
		include('paging.php');		        
		$config['base_url']= base_url()."/admin/author/index/".$data['keymagazine']."/".$data['butdanh']."/";
        if  ($data['butdanh'] == '~' ) $data['butdanh'] = '';
		$config['total_rows']= $this->User_model->getCount('butdanh',$data['keymagazine'],$data['butdanh']);		
		$config['cur_page']= $row;	
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();
		$data['lstthanhvien'] = $this->User_model->get(0,$config['per_page'],$row,'butdanh',$data['keymagazine'],'user_registered','DESC',-1,$data['butdanh']);
        //get($id=0,$limit=-1,$offset=0,$user_activation_key='',$term_id=0,$order_by='user_registered',$order='DESC',$status=-1,$butdanh=''){
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
        //print_r($data['lstmagazine']);
		$this->load->view('back_end/author_view',$data);
	}
	
	public function add()
	{
		
		if($this->input->post('txtnicename'))
		{
			$user_nicename = $this->input->post('txtnicename');
			$user_nicename = trim($user_nicename);
			$term = $this->input->post('slmagazine');
			if($this->Author_model->checkExitUser($user_nicename,$term)==true)
			{	
				
				$this->session->set_flashdata('trang_thai','Exited');						
				redirect('admin/author','refresh');
			}
			else 
			{
				
				$user_regitered = date('Y-m-d h-i-s');
				$display_name = $this->input->post('txtdescription');
				
				
				
				$this->User_model->add('',$user_nicename,'',$user_regitered,$display_name,'butdanh');
				$id = $this->User_model->get_id_last_row();
				$this->Author_model->add_magazine_author($id,$term);
				$this->Term_model->add_term_relationship($id,$term);			
						
				redirect('admin/author','refresh');
			}
			
		}
		else 
		{
			
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
			$lstbutdanh = $this->User_model->get($id);
						
			$html = '<p>Tác giả đã chọn: <label id="lblAuthor" style="color:red">';
			$html .='<b>'.$lstbutdanh['user_nicename'].'</b></label></p>';
			$html .='<input type="hidden" name="txtAuthor" id="txtAuthor" class="validate[required]" value="'.$lstbutdanh['id'].'">';				

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
			$magazine = $this->input->post('slmagazine');		
			$this->User_model->update_author($user_id,$user_nicename,$user_email,$display_name,$magazine);			
			redirect('admin/author','refresh');
		}
		else 
		{
			$data['user'] = $this->User_model->get_butdanh($id);
			$data['lstthanhvien'] = $this->User_model->get(0,$config['per_page'],$row,'butdanh');
			$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
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