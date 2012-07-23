<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
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
		redirect('admin/posts/lists/post');			
	}
	public function lists($post_type='post',$term=0,$row=0)
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
		//paging
		include('paging.php');		
		$config['base_url']= base_url()."/admin/posts/lists/".$post_type."/".$data['category']."/";
		$config['total_rows']=$this->Post_model->getCount($data['post_type'],$data['category']);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();	
		//data tranfer
		$data['lstPosts'] = $this->Post_model->get(0,$data['post_type'],$data['category'],'',$config['per_page'],$row);
		$data['lstCategories'] = $this->Term_model->get();
		$data['post_type'] = $post_type;
		$this->load->view('back_end/listposts_view',$data);
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
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');		
		$l_butdanh = $this->input->post('cbxbutdanh');		
		$l_post_type = $this->input->post('hdfposttype');
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');
		if($flag==false){			
			//Insert posts			
			$last_id = $this->Post_model->add($l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_post_type,$l_featured_image,$l_arr_categories);
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
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');
		$l_post_id = $this->input->post('cbxbaiviet');
		$l_featured_image = $this->input->post('hdffeatured_image');		
		if($l_title == ''){$flag = true;}
		if($l_exerpt == ''){$flag = true;}
		if($l_content == ''){$flag = true;}
		if($l_post_id == ''){$flag = true;}
		if($flag==false){
			$l_arr_categories = $this->Post_model->get_categories_of_post($l_post_id);			
			//Insert posts			
			$last_id = $this->Post_model->add($l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,'topic',$l_featured_image,$l_arr_categories,$l_post_id);
			if($last_id > 0){
				redirect('admin/posts/lists/topic');							
			}
		}
		redirect('admin/posts/add/topic');
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
		if($this->Post_model->update($l_id,$l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_featured_image,$l_arr_categories,0,'post')){
			redirect('admin/posts/lists/post');							
		}		
		redirect('admin/posts/lists/post/'.$l_id);
	}
	public function update_topic($id){		
		$flag=false;				
		$l_butdanh = $this->input->post('hdfauthor');
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');
		$l_post_id = $this->input->post('cbxbaiviet');
		$l_featured_image = $this->input->post('hdffeatured_image');		
		if($l_title == ''){$flag = true;}
		if($l_exerpt == ''){$flag = true;}
		if($l_content == ''){$flag = true;}
		if($l_post_id == ''){$flag = true;}
		//if($l_featured_image == ''){$flag = true;}
		if($flag==false){
			$l_arr_categories = $this->Post_model->get_categories_of_post($l_post_id);			
			//print_r($l_arr_categories);
			//Insert posts			
			$last_id = $this->Post_model->update($id,$l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_featured_image,$l_arr_categories,$l_post_id,'topic');
			if($last_id > 0){
				redirect('admin/posts/edit/topic/'.$id);							
			}
		}
		redirect('admin/posts/edit/topic/'.$id);
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
			$data['ofpost'] = $ofpost[0];
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */