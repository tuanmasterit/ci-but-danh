<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
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
	public function index($author_id=0)
	{				
		//tranfer data
		$data['lstAuthorMonth'] = $this->Post_model->get_top_author_month(date('m'),date('Y'),10,0);
		$data['lstLatestAuthor'] = $this->User_model->get_latest_author();
		$data['lstLatestComment'] = $this->Comment_model->get(5);
		$data['term_toptic'] =0;
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,'');
		$data['lstToppic_top'] = $lstToppic_top;
		$data['new_topics'] = $this->Post_model->get(0, 'topic', 0,'', -1, 0, 'DESC', 'post_date','pending');
		$data['new_topics_reject'] = $this->Post_model->get(0, 'topic', 0,'', -1, 0, 'DESC', 'post_date','reject');
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');		
		//data profile
		$data['butdanh'] = $this->User_model->get_butdanh($author_id);
		$data['author_id'] = $author_id;
        
        $data['listPostByMonth'] = $this->Post_model->get_post_by_month($author_id, date("m"));
        
        $data['listTopicRelation'] = $this->Post_model->get_relation_topic($author_id,'publish');        
		$list_like = $this->User_model->list_like($author_id);		
		$data['list_like'] =$list_like;
		//check login
		if($this->session->userdata('logged_in') != 1){
			$data['check_login'] = false;
		}
		else {
			$data['check_login'] = true;
		}
		//check like
		$user_like = $this->session->userdata('username');
		$check_like = $this->User_model->check_like($author_id,$user_like);
		$data['check_like'] = $check_like;
		if($author_id != 0){
			$this->load->view('front_end/view_profile',$data);
			
		}else{redirect('home');}
	}		
    function listPostByMonth()
    {
        $this->load->helper('url');
        $author_id = $this->input->post('author_id');
        $month = $this->uri->segment(3);
        $result = '';
        $listPostByMonth = $this->Post_model->get_post_by_month($author_id, $month);
        if (count($listPostByMonth) >0)
        {
            foreach($listPostByMonth as $post)
            {
                $result .= '<li><a class="bullet1" href="'.base_url().'bai-viet/'.urldecode($post->guid).'">'.$post->post_title.'</a></li>';
            }
        } else $result = 'Không có bài viết nào!';
        echo $result;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */