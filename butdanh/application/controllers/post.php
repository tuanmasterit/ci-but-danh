<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('User_model');
		$this->load->model('Term_model');
        $this->load->model('Comment_model');
	
    }
    public function index($post_id=0)
	{				
		//tranfer data
		$data['lstAuthorMonth'] = $this->Post_model->get_top_author_month(date('m'),date('Y'),10,0);
		$data['lstLatestAuthor'] = $this->User_model->get_latest_author();
		$data['lstLatestComment'] = $this->Comment_model->get(5);
		$term_id = $this->Post_model->get_term_id_by_id_post($post_id);
		$data['term_toptic'] =$term_id;
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,$term_id);
		$data['lstToppic_top'] = $lstToppic_top;
		$data['new_topics'] = $this->Post_model->get(0, 'topic', $term_id,'', -1, 0, 'DESC', 'post_date','pending');
		$data['new_topics_reject'] = $this->Post_model->get(0, 'topic', $term_id,'', -1, 0, 'DESC', 'post_date','reject');
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');		
        $data['post_id'] = $post_id;
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
    function imageResize($image_path,$image_name)
    {
        
        $gallery_path = './application/content/images/SuggestTopic/thumbs/';
        $config = array(
        'source_image' => $image_path,
        'new_image' => $gallery_path.$image_name ,
        'maintain_ration' => true,
        'width' => 300,
        'height' => 300
        );
        
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        return $gallery_path.$image_name;

    }
    public function suggest()
    {    
        if($this->session->userdata('logged_in') == 0 ) redirect('home');
        $data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
    	$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
    	$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
        
        $this->load->helper('url');        
    	$flag=false;			        	
    	$post_id = $this->uri->segment(3);
        $data['post_id'] = $post_id;        
        $result = $this->Post_model->get($post_id);
        $featured_image = '';
        //$featured_image = $this->Post_model->get_featured_image($post_id);         
        //default image
        //if ($featured_image == '') $featured_image = '/butdanh/application/content/images/SuggestTopic/484028_363931040346350_2004736770_n4.jpg';
        //$data['featured_image'] = $featured_image;    
        if (count($result) >0)
        foreach($result as $temp)
        {
           $data['post_detail'] = $temp; 
	       $data['butdanh'] = $this->User_model->get_butdanh($temp->post_author); 
		} else {redirect('home');}

        $butdanh = $this->session->userdata('user_id');
    	$title = $this->input->post('txttitle');
        
        $link = $this->get_link($l_title);		
    	
        $exerpt = $this->input->post('txtexcerpt');		
    	$content = $this->input->post('txtcontent');    	    	
        
        
        $config['upload_path'] = './application/content/images/SuggestTopic/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload())
        {
            $uploadData = $this->upload->data();
            $featured_image = $this->imageResize($uploadData['full_path'],$uploadData['file_name']);
            
            //$featured_image = '/butdanh/application/content/images/SuggestTopic/'.$uploadData['file_name'];
            
        } else
        {
            $uploadError = $this->upload->display_errors();
            //redirect('home');
        }
        
        if($title == ''){$flag = true;}
    	if($exerpt == ''){$flag = true;}
    	if($content == ''){$flag = true;}
    	if($post_id == ''){$flag = true;}
        		
    	if($flag==false){
    		$arr_categories = $this->Post_model->get_categories_of_post($post_id);			
    		//Insert posts			
    		$last_id = $this->Post_model->add($butdanh,date('Y-m-d h-i-s'),$content,$title,$exerpt,'topic',$featured_image,$arr_categories,$post_id,'pending',$link);
            if($last_id > 0){
    			redirect('home');							
    		}
    	} else
    	$this->load->view('front_end/post_view',$data);
    }
    public function detail($post_term='')
	{				
		//tranfer data
		$data['lstAuthorMonth'] = $this->Post_model->get_top_author_month(date('m'),date('Y'),10,0);
		$data['lstLatestAuthor'] = $this->User_model->get_latest_author();
		$data['lstLatestComment'] = $this->Comment_model->get(5);
        $post_id = 29;
		$term_id = $this->Post_model->get_term_id_by_id_post($post_id);
		$data['term_toptic'] =$term_id;
		$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,$term_id);
		$data['lstToppic_top'] = $lstToppic_top;
		$data['new_topics'] = $this->Post_model->get(0, 'topic', $term_id,'', -1, 0, 'DESC', 'post_date','pending');
		$data['new_topics_reject'] = $this->Post_model->get(0, 'topic', $term_id,'', -1, 0, 'DESC', 'post_date','reject');
		$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
		$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
		$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');	
        $data['post_id'] = $post_id;	
        //$data['post_term'] = $this->common->removesign(urldecode($post_term));
        $data['post_term'] = $post_term;
        //data post
        $result = $this->Post_model->get_seo($data['post_term']);
        if (count($result) >0)
        foreach($result as $temp)
        {
           $data['post_detail'] = $temp; 
	       $data['butdanh'] = $this->User_model->get_butdanh($temp->post_author); 
		} else {}//redirect('home');}
        
        //print_r($data['post_detail']);
        if($post_id != 0){
			$this->load->view('front_end/post_view',$data);
			
		} else {redirect('home');}
	}
    function get_link($str)
    {
        $link = urlencode($this->common->removespace($str));
        if ($this->check_link($link)==false)
        {
            return $link;
        }
        $i = 0;
        while (1)
        {	
            $i++;
            $link_temp = $link.'_'.$i;
            if ($this->check_link($link_temp)==false) return $link_temp;
        }
        
    }		
    function check_link($link)
    {
        //co thi la true ko co l� false
        if (count($this->Post_model->get_seo($link))>0)
        {
            return true;
        } else return false;
        
    }	
}