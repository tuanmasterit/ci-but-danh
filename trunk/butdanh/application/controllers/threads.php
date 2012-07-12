<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Threads extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
    }	
	public function index($obj_id=0)
	{				
		//tranfer data
		$data['thread'] = $this->Post_model->get($id);
		$this->load->view('front_end/thread_view',$data);		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */