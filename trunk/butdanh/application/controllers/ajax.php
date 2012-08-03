<?php
	class Ajax extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper('captcha');
			$this->load->model('Post_model');
		}
		
		function refreshCaptcha()
		{
			$vals = array(
		    'word'		 => $this->rand_string(4),
		    'img_path'	 => './captcha/',
		    'img_url'	 => base_url().'captcha/',
		    'font_path'	 => base_url().'system/fonts/texb.ttf',
		    'img_width'	 => 100,
		    'img_height' => 25,
		    'expiration' => 7200
		    );
		    
		    $cap = create_captcha($vals);
			$image=$cap['image'];
			$word = $cap['word'];
			
			$mess1 = $image;
			$mess2 = $word;
			echo json_encode(array('mess1'=>$mess1,'mess2'=>$mess2));
		}
		
	function rand_string( $length ) {
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str='';
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}		
		return $str;
	}
	
	function getTopicTop()
	{
		$term_id = $this->input->post('term_id');
		$by = $this->input->post('by');
		$html='';
		if($by=='month')
		{
			if($term_id==0)
			{
				$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,'',date('Y-m-d h:i:s',strtotime('-30 days')),date('Y-m-d h:i:s'));
				
				foreach($lstToppic_top as $topic){
                    $html.="<li><a class='bullet' href='".base_url()."'threads/".$topic->id."'>".$topic->post_title."</a></li>";
				}
			}
			else 
			{
				$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,$term_id,date('Y-m-d h:i:s',strtotime('-30 days')),date('Y-m-d h:i:s'));
				foreach($lstToppic_top as $topic){
                    $html.="<li><a class='bullet' href='".base_url()."'threads/".$topic->id."'>".$topic->post_title."</a></li>";
				}
			}
		}
		elseif($by=='week')
		{
			if($term_id==0)
			{
				$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,'',date('Y-m-d h:i:s',strtotime('-7 days')),date('Y-m-d h:i:s'));
				foreach($lstToppic_top as $topic){
                    $html.="<li><a class='bullet' href='".base_url()."'threads/".$topic->id."'>".$topic->post_title."</a></li>";
				}
			}
			else 
			{
				$lstToppic_top = $this->Post_model->get_top_toppic_comment(5,0,$term_id,date('Y-m-d h:i:s',strtotime('-7 days')),date('Y-m-d h:i:s'));
				foreach($lstToppic_top as $topic){
                    $html.="<li><a class='bullet' href='".base_url()."'threads/".$topic->id."'>".$topic->post_title."</a></li>";
				}
			}
		}
		echo $html;
	}	
}
?>