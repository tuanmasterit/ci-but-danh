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
	public function index($id=0,$row=0)
	{		
		include('paging.php');	

		$config['base_url'] = base_url().'category/index/'.$id.'/';
		$config['total_rows'] = count($this->Comment_model->get());
		$config['per_page'] = 15;
		$config['cur_page']= $row;
        $config['num_links'] = 5;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();			
		//tranfer data
		$data['lstAuthorMonth'] = $this->Post_model->get_top_author_month(date('m'),date('Y'),10,0);
		$data['lstLatestAuthor'] = $this->User_model->get_latest_author();
		$data['lstLatestComment'] = $this->Comment_model->get($config['per_page'],$row);
		$data['term_toptic'] =$id;
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,$id);
        $data['lstLatestComment'] = $this->Comment_model->get(5,0,'comment_date','DESC','',$id);
        $data['lstLatesTopic'] = $this->Post_model->get(0, 'topic', $id,'', 0, 0, 'DESC', 'post_date','publish','',date('Y-m-d h:i:s',strtotime('-1 days')),date('Y-m-d h:i:s'));
        $data['lstPendingTopic'] = $this->Post_model->get(0, 'topic', $id,'', 0, 0, 'DESC', 'post_date','pending','',date('Y-m-d h:i:s',strtotime('-1 days')),date('Y-m-d h:i:s'));
		$data['lstToppic_top'] = $lstToppic_top;
		$data['new_topics'] = $this->Post_model->get(0, 'topic', $id,'', -1, 0, 'DESC', 'post_date','pending');
		$data['new_topics_reject'] = $this->Post_model->get(0, 'topic', $id,'', -1, 0, 'DESC', 'post_date','reject');
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