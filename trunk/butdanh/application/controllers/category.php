<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('User_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
		$this->load->model('Comment_model');
    }	
	public function index($id=0)
	{				
		//tranfer data
		$data['term_toptic'] =$id;
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,$id);
		$data['lstToppic_top'] = $lstToppic_top;
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		
		$data['lsttopic'] = $this->Post_model->get(0,'topic',$id);
		$Term = $this->Term_model->get($id);	
		$data['category_name'] = $Term['name'];
		$this->load->view('front_end/category_view',$data);		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */