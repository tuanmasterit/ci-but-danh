<?php
	class Member extends CI_Controller
	{
		var $gallery_path; 
		function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
			$this->load->model('Post_model');
			$this->load->model('Term_model');
			$this->load->model('Upload_model');
			$gallery_path = realpath(APPPATH . '../uploads');
		}
		
		function profile($id)
		{
			
			$member = $this->User_model->get($id);	
			$data['member_id'] = $id;		
			$data['address'] = $this->User_model->get_usermeta($id,'address');
			$data['birthday'] = $this->User_model->get_usermeta($id,'birthday');
			$data['gender'] = $this->User_model->get_usermeta($id,'gender');
			$data['phone'] = $this->User_model->get_usermeta($id,'phone_number');
			$data['tieusu']=$this->User_model->get_usermeta($id,'tieu_su');
			$data['sothich'] = $this->User_model->get_usermeta($id,'so_thich');
			$lstPost = $this->Post_model->get_post_by_month($id);
			$data['count_post'] = count($lstPost);
			$data['avatar'] = $this->User_model->get_usermeta($id,'avatar');
			//tranfer data
			$member_id = $this->session->userdata('user_id');
			if($member_id==$id)
			{
				$data['check_duplicate'] = true;
			}
			else 
			{
				$data['check_duplicate'] = false;
			}
			$data['member'] = $member;
			$data['term_toptic'] =0;
			$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,'');
			$data['lstToppic_top'] = $lstToppic_top;
			$data['new_topics'] = $this->Post_model->get(0, 'topic', 0,'', -1, 0, 'DESC', 'post_date','pending');
			$data['new_topics_reject'] = $this->Post_model->get(0, 'topic', 0,'', -1, 0, 'DESC', 'post_date','reject');
			$data['lsttopic'] = $this->Post_model->get(0,'topic','','',10,0);
			$data['lstmagazine'] = $this->Term_model->get(0,-1,0,'magazine');
			$data['lstuser'] = $this->User_model->get(0,-1,0,'thanhvien');
			$this->load->view('front_end/view_member_profile', $data);
		}
		
		function updateProfile()
		{
			$member_id = $this->session->userdata('user_id');
			if($member_id!='')
			{
				$id= $this->input->post('id');
				$meta_key = $this->input->post('key');
				$meta_value = $this->input->post('value');
				$type = $this->input->post('type');
				if($type=='meta')
				{
					$this->User_model->update_meta($id,$meta_key,$meta_value);
				}
			}
		}	

		function changeAvatar()
		{ 	
			$id = $this->input->post('hdfMemberID');
			$member_id = $this->session->userdata('user_id');
			if($member_id!='')
			{
				$config = array(
					'allowed_types' => 'jpg|jpeg|gif|png',
					'upload_path' => './application/content/images/avatars',
					'max_size' => 2000
				);
		
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload()){
					$this->session->set_flashdata('message','Lỗi upload ảnh');
				}
				else {
					//$this->User_model->update_meta($member_id,'avatar','');
					$image_data = $this->upload->data();
					$title = $image_data['file_name'];
					$this->User_model->update_meta($member_id,'avatar',$title);
				}
			}
			redirect('member/profile/'.$id);
		}
	}
?>