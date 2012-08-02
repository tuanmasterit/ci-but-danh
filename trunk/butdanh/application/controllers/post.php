<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('User_model');
		$this->load->model('Term_model');
	
    }
    public function index($post_id=0)
	{				
		//tranfer data
		$term_id = $this->Post_model->get_term_id_by_id_post($id);
		$data['term_toptic'] =$term_id;
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,$term_id);
		$data['lstToppic_top'] = $lstToppic_top;
		$data['new_topics'] = $this->Post_model->get(0, 'topic', $term_id,'', -1, 0, 'DESC', 'post_date','pending');
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');		
		//data post
        $result = $this->Post_model->get($post_id);
        //sprint_r($result);
        if (count($result) >0)
        foreach($result as $temp)
        {
           $data['post_detail'] = $temp; 
	       $data['butdanh'] = $this->User_model->get_butdanh($temp->post_author); 
		} else {redirect('home');}
        
        //print_r($data['post_detail']);
        if($post_id != 0){
			$this->load->view('front_end/post_view',$data);
			
		} else {redirect('home');}
	}	
}