<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/dashboard/login');
		}
		$this->load->model('Term_model');		
    }
	
	public function index(){
		$data['lstCategories'] = $this->Term_model->get(0,10,0,'category');
		$data['Categories'] = $this->Term_model->get(0,100,0,'category');
		$this->load->view('back_end/categories_view',$data);	
	}
	
	public function save_categories()
	{
		if($this->input->post('txttitle'))
		{
			$name = $this->input->post('txttitle');
			$slug = $this->input->post('txtslug');
			$taxonomy = 'category';
			$description = $this->input->post('txtexcerpt');
			$parent = $this->input->post('select');
			$this->Term_model->add($name,$slug,$taxonomy,$description,$parent);			
			$this-> session-> set_flashdata('message','Category created');			
			redirect('admin/categories','refresh');				
		}
		else {
			$this-> session-> set_flashdata('message','Lỗi!');
			redirect('admin/categories','refresh');
		}
	}
	//delete ajax
	public function delete()
	{		
		$param = $this->input->post('param');		
		$this->Term_model->delete($param);			
	}		
	
	function edit($id=0)
	{	
		//echo $id;			
		$name = $this->input->post('txttitle');
		$slug = $this->input->post('txtslug');		
		$description = $this->input->post('txtexcerpt');
		$parent = $this->input->post('select');
		if ($this-> input-> post('txttitle')){
			$id=$this->input->post('term_id');
			$this-> Term_model-> update($id,$name,$slug,$description,$parent);
			$this-> session-> set_flashdata('message','Category updated');
			redirect('admin/categories','refresh');
		}else{
			$data['category'] = $this->Term_model->get($id,0,0,'category');
			//$data['TermTaxonomy'] = $this->Term_model->getTermTaxonomy($id);
			$data['lstCategories'] = $this->Term_model->get(0,10,0,'category');
			$data['Categories'] = $this->Term_model->get(0,100,0,'category');
			//$this->load->vars($data);
			$this->load->view('back_end/categories_view',$data);	
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */