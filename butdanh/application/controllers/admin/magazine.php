<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class magazine extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == 1 && ($this->session->userdata('user_activation_key') == 'administrator' || $this->session->userdata('user_activation_key') == 'bandieuphoi' || $this->session->userdata('user_activation_key') == 'congtacvien')){
			$this->load->model('Term_model');			
		}else{redirect('admin/index/accesdenied');}				
    }
	
	public function index(){
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['magazine_parent'] = $this->Term_model->get(0,-1,0,'magazine');
		$this->load->view('back_end/magazine_view',$data);	
	}
	
	public function save()
	{
		if($this->input->post('txttitle'))
		{
			$name = $this->input->post('txttitle');
			$taxonomy = 'magazine';
			$description = $this->input->post('txtexcerpt');
			$this->Term_model->add($name,$name,$taxonomy,$description,'');			
			$this-> session-> set_flashdata('message','Category created');			
			redirect('admin/magazine','refresh');				
		}
		else {
			$this-> session-> set_flashdata('message','Lỗi!');
			redirect('admin/magazine','refresh');
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
		$description = $this->input->post('txtexcerpt');
		if ($this-> input-> post('txttitle')){
			$id=$this->input->post('term_id');
			$this-> Term_model-> update($id,$name,'',$description,'');
			$this-> session-> set_flashdata('message','Category updated');
			redirect('admin/magazine','refresh');
		}else{
			$data['magazine'] = $this->Term_model->get($id,0,0,'magazine');
			//$data['TermTaxonomy'] = $this->Term_model->getTermTaxonomy($id);
			$data['lstmagazine'] = $this->Term_model->get(0,10,0,'magazine');
			//$this->load->vars($data);
			$this->load->view('back_end/magazine_view',$data);	
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */