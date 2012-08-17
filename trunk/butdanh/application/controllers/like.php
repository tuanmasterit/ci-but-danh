<?php
	class Like extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
		}
		
		function add()
		{
			$id = $this->input->post('id');
			$user_liked = $this->session->userdata('username');
			$this->User_model->add_like($id,$user_liked);
			$mess1=  "<a id='".$id."' class='link-dislike' href='".base_url()."like/dislike'>
						<img src='".base_url()."application/content/images/dislike-button.jpg'>
				   </a>";
			$list_like = $this->User_model->list_like($id);
			$mess2='';
			if(count($list_like)>0)
            {
                $mess2= "<b>Có ".count($list_like)." người like bút danh này.</b>";
            } 
            echo json_encode(array('mess1'=>$mess1,'mess2'=>$mess2));            
		}
		
		function dislike()
		{
			$id = $this->input->post('id');
			$user_liked = $this->session->userdata('username');
			$this->User_model->delete_like($id,$user_liked);
			$mess1=  "<a id='".$id."' class='link-like' href='".base_url()."like/add'>
						<img src='".base_url()."application/content/images/icon-like.png'>
				   </a>";
			$list_like = $this->User_model->list_like($id);
			$mess2='';
			if(count($list_like)>0)
            {
                $mess2= "<b>Có ".count($list_like)." người like bút danh này.</b>";
            } 
            echo json_encode(array('mess1'=>$mess1,'mess2'=>$mess2)); 
		}
        
       function add_thanks()
		{
			$id = $this->input->post('id');
            $threads_id = $this->input->post('threads_id');
			$user_liked = $this->session->userdata('user_id');
			$this->User_model->add_thanks($id,$user_liked,$threads_id);
			$mess1=  '';
			$list_thanks = $this->User_model->list_thanks($id,$threads_id);
			$mess2='<br />';
            $total_thanks = count($list_thanks);
			if($total_thanks>0)
            {
                $mess2.= $total_thanks;
                $i = 0;
                foreach( $list_thanks as $thanks)
                  {
                    $i++;
                    $name =  $this->User_model->getById($thanks->meta_value);
                    if ($i!=$total_thanks)
                    {                        
                        $mess1.="<a rel='nofollow' href='".base_url()."member/profile/".$thanks->meta_value."'>".$name['user_nicename']."</a>&nbsp; ,";
                    } else
                    {
                        $mess1.="<a rel='nofollow' href='".base_url()."member/profile/".$thanks->meta_value."'>".$name['user_nicename']."</a>";
                    }                  
                  }
            } 
            echo json_encode(array('mess1'=>$mess1,'mess2'=>$mess2));            
		}
		
		function dislike_thanks()
		{
			$id = $this->input->post('id');
            $threads_id = $this->input->post('threads_id');
			$user_liked = $this->session->userdata('user_id');
			$this->User_model->delete_thanks($id,$user_liked,$threads_id);
			$mess1=  "<a id='".$id."' threads_id='".$threads_id."' class='link-thanks' href='".base_url()."like/add_thanks'>
						<img src='".base_url()."application/content/images/thanks.jpg'>
				   </a>";
			$list_thanks = $this->User_model->list_thanks($id,$threads_id);
			$mess2='';
			if(count($list_thanks)>0)
            {
                $mess2= "Thanked: ".count($list_thanks);
            } 
            echo json_encode(array('mess1'=>$mess1,'mess2'=>$mess2)); 
		}
	}
?>