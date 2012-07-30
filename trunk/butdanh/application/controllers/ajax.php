<?php
	class Ajax extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->helper('captcha');
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
	}
?>