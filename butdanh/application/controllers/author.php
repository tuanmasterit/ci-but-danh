<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/dashboard/login');
		}
		$this->load->model('Author_model');
    }
	public function index()
	{
		$data['lstbutdanh'] = $this->Author_model->get(0,100,0);
		$this->load->view('back_end/author_view',$data);
	}
	public function save()
	{
		$butdanh = $this->input->post('txtbutdanh');
		$excerpt = $this->input->post('txtexcerpt');
		$this->Author_model->add($butdanh,date('Y-m-d h-i-s'),$excerpt);
		redirect('admin/author/index');
	}
	public function delete(){
		$method	= $this->input->post('method');
		$param = $this->input->post('param');		
		if($method == 'delete_author'){
			//delete post meta
			$this->Author_model->delete($param);					
		}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */