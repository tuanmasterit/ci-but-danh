<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
    }	
	public function index($module='',$obj_id=0)
	{				
		switch($module){
			case '':
				$this->home();
				break;
			case 'category':
				$this->category($obj_id);
				break;
			case 'threads':
				$this->threads($obj_id);
				break;			
		}		
	}
	function home(){
		//tranfer data
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$this->load->view('front_end/index_view',$data);	
	}
	function category($cat_id){
		
	}
	function threads($id){
		//tranfer data
		$data['thread'] = $this->Post_model->get($id);
		$this->load->view('front_end/thread_view',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */