<?php 
	class Comments extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('logged_in') != 1){
				redirect('admin/login');
			}
			$this->load->model('Comment_model');
			$this->load->library('pagination');
			$this->load->helper('captcha');
		}
		function index($row=0)
		{			
			$data['status'] = '';
			if($this->input->post('slstatus') != ''){
				$data['status'] = $this->input->post('slstatus');
			}
			$Comments = $this->Comment_model->get(0,0,'comment_date','DESC',$data['status']);
			include('paging.php');
			$config['base_url']= base_url()."/admin/comments/index/";
			$config['total_rows']=count($Comments);		
			$config['cur_page']= $row;		
			$this->pagination->initialize($config);
			$data['list_link'] = $this->pagination->create_links();	
			$lstComments = $this->Comment_model->get($config['per_page'],$row,'comment_date','DESC',$data['status']);		
			$data['lstComments'] = $lstComments;
			$this->load->view('back_end/view_comment', $data);
		}
		
		function edit($id=0)
		{
			$comment_id = $this->input->post('comment_id');
			$comment_agent = $this->input->post('txttitle');
			$comment_author = $this->input->post('txtauthor');		
			$comment_author_email = $this->input->post('txtemail');
			$comment_content = $this->input->post('txtcontent');
			$status = $this->input->post('slStatus');
			if ($this-> input-> post('txttitle')){
				$this->Comment_model->update($comment_id,$comment_author,$comment_author_email,$comment_content,$comment_agent,$status);
				redirect('admin/comments','refresh');
			}else{
				$data['lstComments'] = $this->Comment_model->get_by_id($id);
				$this->load->view('back_end/view_comment_edit',$data);	
			}
		}
		
		function delete()
		{
			$id = $this->input->post('param');
			$this->Comment_model->delete($id);
		}
	}
?>