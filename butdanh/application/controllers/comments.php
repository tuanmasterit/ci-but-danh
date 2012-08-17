<?php
	class Comments extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Comment_model');
			$this->load->model('User_model');
		}
		
		function add()
		{
		      
			$comment_post_ID = $this->input->post('post_id');
			$author_id = $this->session->userdata('user_id');
			$comment_author = $this->session->userdata('username');
			$author = $this->User_model->get($author_id);
			$register_date = date_format(date_create($author['user_registered']),'d-m-Y');
			$comment_author_email = $author['user_email'];
			$comment_date = date('Y-m-d H-i-s');
			//$lstPost = $this->Post_model->get_post_by_month($author_id);
			//$list_thanks_all = $this->User_model->list_thanks($author_id,0);
			$comment_content = $this->security->xss_clean($this->input->post('comment_content'));
			$comment_title = $this->security->xss_clean($this->input->post('comment_title'));
			$this->Comment_model->add($comment_post_ID,$comment_author,$comment_author_email,$comment_date,$comment_content,$comment_title,$author_id,'approved');
			/*$avatar = $this->User_model->get_usermeta($author_id,'avatar');
			if($avatar=='')
			{
				$avatar = base_url().'application/content/images/no_avatar.gif';
			}
			else 
			{
				$avatar = base_url().'application/content/images/avatars/'.$avatar;
			}
			$last_id =  $this->Comment_model->get_id_last_row();
			$last_comment = $this->Comment_model->get_by_id($last_id);
			$html='';
			$html2 = '';
			$lstComment = $this->Comment_model->getByPost($comment_post_ID,'approved');
			$mess2 = count($lstComment);
			if($mess2<=14)
			{
				$html.="<form id='formID' class='vbform' method='post' name='quick_reply'>";
					$html.="<div class='fullwidth'>";
						$html.="<h3 id='quickreply_title' class='blockhead'>";
							$html.="<img style='float:left;padding-right:10px' alt='Trả lời nhanh' src='".base_url()."application/content/images/reply_40b.png' title='Trả lời nhanh'>";
							$html.="Trả lời nhanh";										
						$html.="</h3>";
					$html.="</div>";
					$html.="<div class='wysiwyg_block'>";
						$html.="<div class='blockbody formcontrols'>";
							$html.="<div class='blockrow'>";
								$html.="<label class='full' for='title'>Tiêu đề:</label>";
								$html.="<input id='title'  class='primary textbox full validate[required]' type='text' title='nếu muốn' tabindex='1' maxlength='200' value='' name='title'>";
							$html.="</div>";
							$html.="<div class='blockrow'>";
								$html.= "<textarea id='editor_content" . $mess2 ."' class='editor_content' name='txtcontent'>";									
								$html.="</textarea>";
							$html.="</div>";
						$html.="</div>";
						$html.="<div class='blockfoot actionbuttons'>";
							$html.="<div class='group'>";											
								$html.="<input id='qr_submit' class='button qr_submit' type='submit'  tabindex='1' name='sbutton' title='Gửi trả lời' accesskey='s' value='Gửi Trả Lời'>";											
								$html.="<input id='qr_cancelbutton' class='button qr_cancelbutton' type='reset'  tabindex='4' name='cancel' title='Hủy bỏ' accesskey='c' value='Hủy bỏ' style=''>";
							$html.="</div>";
						$html.="</div>";
					$html.="</div>";
				$html.="</form>";
			}*/
			//echo json_encode(array('mess1'=>$html,'mess2'=>$mess2));    
			       
		}
	}
?>