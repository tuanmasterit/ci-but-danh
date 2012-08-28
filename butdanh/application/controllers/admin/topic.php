<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topic extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == 1 && ($this->session->userdata('user_activation_key') == 'administrator' || $this->session->userdata('user_activation_key') == 'bandieuphoi' || $this->session->userdata('user_activation_key') == 'congtacvien')){
			$this->load->model('Post_model');
			$this->load->model('Author_model');
			$this->load->model('Term_model');
			$this->load->library('pagination');
			// thiết lập vùng giờ mặc định 
			date_default_timezone_set('Asia/Ho_Chi_Minh');
		}else{redirect('admin/index/accesdenied');}		
    }
	public function delete()
	{	
		$param = $this->input->post('param');	
		$this->Post_model->delete_post($param);								
	}
	//------------------------------------------------------------------------
	//-- Function default: List posts by post_type
	//------------------------------------------------------------------------ 
	public function index()
	{
		redirect('admin/topic/lists/topic');			
	}
	public function lists($post_type='post',$term=0,$titleTopic='~',$row=0)
	{
		// Get post type
		$data['post_type'] = $post_type;
		if($this->input->post('hdfposttype') != ''){
			$data['post_type'] = $this->input->post('hdfposttype');	
		}
		// Get category
		$data['category'] = $term;
		if($this->input->post('slcategory') != ''){
			$data['category'] = $this->input->post('slcategory');
		}
        
        $data['titleTopic'] =  urldecode($titleTopic);
        if ($this->input->post('titleTopic') != '')
        {
            $data['titleTopic'] = $this->input->post('titleTopic');
        }
        //paging
		include('paging.php');		
		$config['base_url']= base_url()."/admin/topic/lists/".$post_type."/".$data['category']."/".$data['titleTopic']."/";
        if  ($data['titleTopic'] == '~' ) $data['titleTopic'] = '';
		$config['total_rows']=$this->Post_model->getCount($data['post_type'],$data['category'],'','',$data['titleTopic']);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();	
		//data tranfer
		$data['lstPosts'] = $this->Post_model->get(0,$data['post_type'],$data['category'],'',$config['per_page'],$row,'DESC','post_date','',$data['titleTopic']);
        $data['lstCategories'] = $this->Term_model->get();
		$data['post_type'] = $post_type;
		$this->load->view('back_end/view_list_topic',$data);
	}	
	public function list_posts_ajax(){
		$butdanh = $this->input->post('butdanh');
		$category = $this->input->post('category');	
		$lstposts = $this->Post_model->get(0,'post',$category,$butdanh);
		$html = '<select name="cbxbaiviet" style="width:100%;" id="cbxbaiviet">';
		foreach($lstposts as $post){
			$html .= "<option value='" . $post->id . "'>" . $post->post_title . "</option>";
		}
		$html .= '</select>';
		echo $html;
	}
	//------------------------------------------------------------------------
	//-- Add post
	//-- Param: $post_type
	//------------------------------------------------------------------------
	public function add($post_type='post')
	{						
		if($post_type == 'post'){
			$data['lstbutdanh'] = $this->Author_model->get(0,-1,0);
			$data['lstCategories'] = $this->Term_model->get(0,-1,0,'category');
			$data['post_type'] = $post_type;		
			$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
			$this->load->view('back_end/view_add_post',$data);
		}elseif($post_type == 'topic'){
			$data['lstbutdanh'] = $this->Author_model->get(0,100,0);
			$data['lstCategories'] = $this->Term_model->get(0,100,0,'category');
			$data['lstposts'] = $this->Post_model->get(0,'post');
			$data['post_type'] = $post_type;			
			$this->load->view('back_end/add_topic_view',$data);	
		}
	}
	//------------------------------------------------------------------------
	//-- Get Parameter
	//------------------------------------------------------------------------ 
	public function save_add(){
		$flag=false;		
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = '';		
		$l_content = $this->input->post('txtcontent');		
		$l_butdanh = $this->input->post('txtAuthor');	
		$id_butdanh = $this->Author_model->get_by_user_nicename($l_butdanh);	
		$l_post_type = $this->input->post('hdfposttype');
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');
		if($flag==false){			
			//Insert posts			
			$last_id = $this->Post_model->add($id_butdanh,date('Y-m-d H-i-s'),$l_content,$l_title,$l_exerpt,$l_post_type,$l_featured_image,$l_arr_categories);
			if($last_id > 0){
				redirect('admin/posts/lists/post');							
			}
		}
		redirect('admin/posst/add/'.$l_post_type);									
	}
	public function save_topic(){
		$flag=false;				
		$l_butdanh = $this->session->userdata('user_id');
		$l_title = $this->input->post('txttitle');		
        
        $l_link = $this->get_link($l_title);		
        //$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');
		$l_butdanh = $this->input->post('txtAuthor');	
		$l_post_id = $this->Author_model->get_by_user_nicename($l_butdanh);	
		$l_featured_image = $this->input->post('hdffeatured_image');		
		if($l_title == ''){$flag = true;}
		//if($l_exerpt == ''){$flag = true;}
		if($l_content == ''){$flag = true;}
		if($l_post_id == ''){$flag = true;}		
		if($flag==false){
			$l_arr_categories = $this->input->post('cbcategory');			
			//Insert posts			
			$last_id = $this->Post_model->add($l_butdanh,date('Y-m-d H-i-s'),$l_content,$l_title,'','topic',$l_featured_image,$l_arr_categories,$l_post_id,'public',$l_link);            
			if($last_id > 0){
				redirect('admin/topic/lists/topic');							
			}
		}
		redirect('admin/topic/add/topic');
	}
	//------------------------------------------------------------------------
	//-- Update post
	//------------------------------------------------------------------------ 
	public function update(){		
		$l_id = $this->input->post('post_id');
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');		
		$l_butdanh = $this->input->post('cbxbutdanh');		
		$l_post_type = $this->input->post('hdfposttype');
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');
		//Insert posts			
		if($this->Post_model->update($l_id,$l_butdanh,date('Y-m-d H-i-s'),$l_content,$l_title,$l_exerpt,$l_featured_image,$l_arr_categories,0,'post')){
			redirect('admin/posts/lists/post');							
		}		
		redirect('admin/posts/lists/post/'.$l_id);
	}
	public function update_topic($id){		
		
		$flag=false;				
		$l_butdanh = $this->input->post('hdfauthor');
        $l_title = $this->input->post('txttitle');
        $l_link = $this->input->post('txtlink');
        if ($l_link == '') $l_link = $l_title;      
        $l_link = $this->get_link($l_link);
        
		//$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');
		$l_post_id = $this->input->post('cbxbaiviet');
		$l_featured_image = $this->input->post('hdffeatured_image');		
		if($l_title == ''){$flag = true;}
		//if($l_exerpt == ''){$flag = true;}
		if($l_content == ''){$flag = true;}
		if($l_post_id == ''){$flag = true;}
		//if($l_featured_image == ''){$flag = true;}
		if($flag==false){
			$l_arr_categories = $this->Post_model->get_categories_of_post($l_post_id);			
			//print_r($l_arr_categories);
			//Insert posts			
			$last_id = $this->Post_model->update($id,$l_butdanh,date('Y-m-d H-i-s'),$l_content,$l_title,'',$l_featured_image,$l_arr_categories,$l_post_id,'topic',$l_link);
			if($last_id > 0){
				
				redirect('admin/topic/lists/topic');							
			}
		}
		redirect('admin/topic/edit/topic/'.$id);
	}
	public function edit($post_type='post', $id=0){
		if($post_type == 'post'){
			$data['lstbutdanh'] = $this->Author_model->get(0,100,0);
			$data['lstCategories'] = $this->Term_model->get(0,100,0,'category');
			$data['Post'] = $this->Post_model->get($id,$post_type);
			$data['featured_image'] = $this->Post_model->get_featured_image($id);
			$data['categories_of_post'] = $this->Post_model->get_categories_of_post($id);
			$this->load->view('back_end/view_edit_post',$data);	
		}elseif($post_type == 'topic'){
			$data['lstbutdanh'] = $this->Author_model->get(0,100,0);
			$data['lstCategories'] = $this->Term_model->get(0,100,0,'category');
			$data['lstposts'] = $this->Post_model->get(0,'post');			
			$data['lsttopic'] = $this->Post_model->get($id);			
			$ofpost = $this->Post_model->get($data['lsttopic'][0]->post_parent);
			//print_r($ofpost);
			$data['ofpost'] = $ofpost[0];
			$data['author'] = $this->Post_model->get_author_name($ofpost[0]->id);
			$data['featured_image'] = $this->Post_model->get_featured_image($id);
			$data['categories_of_topic'] = $this->Post_model->get_categories_of_post($id);
			//print_r($data['categories_of_topic']);
			$this->load->view('back_end/edit_topic_view',$data);
		}
	}
	public function categories(){
		$data['lstCategories'] = $this->Post_model->list_categories(10,0);
		$data['Categories'] = $this->Post_model->list_categories(100,0);
		$this->load->view('back_end/categories_view',$data);	
	}
    public function approval($post_type='post',$term=0,$titleTopic='~',$row=0)
	{
		// Get post type
		$data['post_type'] = $post_type;
		
		// Get category		
        $data['category'] = $term;
		if($this->input->post('slcategory') != ''){
			$data['category'] = $this->input->post('slcategory');
		}
        
        $data['titleTopic'] = urldecode($titleTopic);
        if ($this->input->post('titleTopic') != '')
        {
            $data['titleTopic'] = $this->input->post('titleTopic');
        }
		//paging
		include('paging.php');		
		$config['base_url']= base_url()."/admin/topic/approval/".$post_type."/".$data['category']."/".$data['titleTopic']."/";
        if  ($data['titleTopic'] == '~' ) $data['titleTopic'] = '';
		$config['total_rows']=$this->Post_model->getCount($data['post_type'],$data['category'],'','pending',$data['titleTopic']);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();	
		//data tranfer
		$data['lstPosts'] = $this->Post_model->get(0,$data['post_type'],$data['category'],'',$config['per_page'],$row,'DESC','post_date','pending',$data['titleTopic']);
		$data['lstCategories'] = $this->Term_model->get();
		$data['post_type'] = $post_type;
		$this->load->view('back_end/view_approval_topic',$data);
	}
    public function reject($post_type='post',$term=0,$titleTopic='~',$row=0)
	{
		// Get post type
		$data['post_type'] = $post_type;
		
		// Get category
		$data['category'] = $term;
		if($this->input->post('slcategory') != ''){
			$data['category'] = $this->input->post('slcategory');
		}
        $data['titleTopic'] = urldecode($titleTopic);
        if ($this->input->post('titleTopic') != '')
        {
            $data['titleTopic'] = $this->input->post('titleTopic');
        }
		//paging
		include('paging.php');		
		$config['base_url']= base_url()."/admin/topic/reject/".$post_type."/".$data['category']."/".$data['titleTopic']."/";
        if  ($data['titleTopic'] == '~' ) $data['titleTopic'] = '';
		$config['total_rows']=$this->Post_model->getCount($data['post_type'],$data['category'],'','reject',$data['titleTopic']);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();	
		//data tranfer
		$data['lstPosts'] = $this->Post_model->get(0,$data['post_type'],$data['category'],'',$config['per_page'],$row,'DESC','post_date','reject',$data['titleTopic']);
		$data['lstCategories'] = $this->Term_model->get();
		$data['post_type'] = $post_type;
		$this->load->view('back_end/view_reject_topic',$data);
	}
   public function confirm($post_type='topic', $id=0){
		
            if ($this->input->post('approval')!= '')
            {
               $this->Post_model->update_status($id,'publish');
               redirect('/admin/topic/approval/topic');
            } 
            else if ($this->input->post('reject')!= '')
            {
                $this->Post_model->update_status($id,'reject');
                redirect('/admin/topic/approval/topic');
            } 
            else
            {      
    			$data['lstbutdanh'] = $this->Author_model->get(0,100,0);
    			$data['lstCategories'] = $this->Term_model->get(0,100,0,'category');
    			$data['lstposts'] = $this->Post_model->get(0,'post');			
    			$data['lsttopic'] = $this->Post_model->get($id);			
    			$ofpost = $this->Post_model->get($data['lsttopic'][0]->post_parent);
    			//print_r($ofpost);
    			$data['ofpost'] = $ofpost[0];
    			$data['featured_image'] = $this->Post_model->get_featured_image($id);
    			$data['categories_of_topic'] = $this->Post_model->get_categories_of_post($id);
    			//print_r($data['categories_of_topic']);
    			$this->load->view('back_end/view_confirm_topic',$data);
            }		
	}
    
    function truncateString_($str, $len, $charset="UTF-8"){
        $str = html_entity_decode($str, ENT_QUOTES, $charset);   
        if(mb_strlen($str, $charset)> $len){
            $arr = explode(' ', $str);
            $str = mb_substr($str, 0, $len, $charset);
            $arrRes = explode(' ', $str);
            $last = $arr[count($arrRes)-1];
            unset($arr);
            if(strcasecmp($arrRes[count($arrRes)-1], $last))   unset($arrRes[count($arrRes)-1]);
          return implode(' ', $arrRes);   
       }
        return $str;
    }

    function get_link($str)
    {
                
        $max_length = 100;
        if  (strlen($str)>$max_length)
        {
            $link = $this->truncateString_($str,$max_length);
        } else $link = $str;
        $link =$this->common->remove_disallow($link);
        $link =$this->common->removespace($link);
        $link = urlencode($link);
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
        //co thi la true ko co là false
        if (count($this->Post_model->get_seo($link))>0)
        {
            return true;
        } else return false;
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */