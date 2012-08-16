<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Threads extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('User_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
		$this->load->model('Comment_model');
		$this->load->helper('captcha');
    }	
	public function index($id=0)
	{				
		//tranfer data
		$data['lstAuthorMonth'] = $this->Post_model->get_top_author_month(date('m'),date('Y'),10,0);
		$data['lstLatestAuthor'] = $this->User_model->get_latest_author();
		$data['lstLatestComment'] = $this->Comment_model->get(5);
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$term_id = $this->Post_model->get_term_id_by_id_post($id);
		$data['term_toptic'] =$term_id;
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,$term_id);
		$data['lstToppic_top'] = $lstToppic_top;
		$data['new_topics'] = $this->Post_model->get(0, 'topic',$term_id ,'', -1, 0, 'DESC', 'post_date','pending');
		$data['new_topics_reject'] = $this->Post_model->get(0, 'topic', $term_id,'', -1, 0, 'DESC', 'post_date','reject');
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		
		$data['post_id'] = $id;
		$data['thread'] = $this->Post_model->get($id);
		
		$data['lstComment'] = $this->Comment_model->getByPost($id,'approved');
		
		$vals = array(
		    'word'		 => $this->rand_string(3),
		    'img_path'	 => './captcha/',
		    'img_url'	 => base_url().'captcha/',
		    'font_path'	 => base_url().'system/fonts/texb.ttf',
		    'img_width'	 => 30,
		    'img_height' => 20,
		    'expiration' => 7200
		    );
		
		$cap = create_captcha($vals);
		$data['image']=$cap['image'];
		$data['word'] = $cap['word'];	
		
		$this->load->view('front_end/thread_view',$data);
				
	}
	
	function rand_string( $length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str='';
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
	}
		
		return $str;
	}
    public function detail($post_term='')
	{				
		//tranfer data
		$data['lstAuthorMonth'] = $this->Post_model->get_top_author_month(date('m'),date('Y'),10,0);
		$data['lstLatestAuthor'] = $this->User_model->get_latest_author();
		$data['lstLatestComment'] = $this->Comment_model->get(5);
        $data['post_term'] = $post_term;
        //data post
        $data['thread'] = $this->Post_model->get_seo($data['post_term']);
        foreach ($data['thread'] as $temp)
        {
            $id = $temp->id;
        }
        
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$term_id = $this->Post_model->get_term_id_by_id_post($id);
		$data['term_toptic'] =$term_id;
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,$term_id);
		$data['lstToppic_top'] = $lstToppic_top;
		$data['new_topics'] = $this->Post_model->get(0, 'topic',$term_id ,'', -1, 0, 'DESC', 'post_date','pending');
		$data['new_topics_reject'] = $this->Post_model->get(0, 'topic', $term_id,'', -1, 0, 'DESC', 'post_date','reject');
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
		
		$data['post_id'] = $id;
		//$data['thread'] = $this->Post_model->get($id);
        
		$data['lstComment'] = $this->Comment_model->getByPost($id,'approved');
        
        
        // like --------------------------
        $author_id = $temp->post_author;
        //echo $author_id;
        $data['author_id'] = $author_id;
        $list_thanks = $this->User_model->list_thanks($author_id,$temp->id);		
		$data['list_thanks'] =$list_thanks;
		//check login
		if($this->session->userdata('logged_in') != 1){
			$data['check_login'] = false;
		}
		else {
			$data['check_login'] = true;
		}
		//check like
		$user_thanks = $this->session->userdata('user_id');
		$check_thanks = $this->User_model->check_thanks($author_id,$user_thanks,$temp->id);
		$data['check_thanks'] = $check_thanks;
        
        //end like ---------------------------------------------------
		$vals = array(
		    'word'		 => $this->rand_string(3),
		    'img_path'	 => './captcha/',
		    'img_url'	 => base_url().'captcha/',
		    'font_path'	 => base_url().'system/fonts/texb.ttf',
		    'img_width'	 => 30,
		    'img_height' => 20,
		    'expiration' => 7200
		    );
		
		$cap = create_captcha($vals);
		$data['image']=$cap['image'];
		$data['word'] = $cap['word'];	
		
		$this->load->view('front_end/thread_view2',$data);
				
	}
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */