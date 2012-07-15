<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Threads extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
		$this->load->model('Comment_model');
    }	
	public function index($id=0)
	{				
		//tranfer data
		$data['post_id'] = $id;
		$data['thread'] = $this->Post_model->get($id);
		$data['lstComment'] = $this->Comment_model->getByPost($id);
		$this->load->view('front_end/thread_view',$data);		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */