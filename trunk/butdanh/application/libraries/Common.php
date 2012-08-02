<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common{    
	/* configuration */		
	function get_post_status($name){
		$status = array(
			'xuat_ban' => 'publish',		//Xuất bản
			'cho_duyet' => 'pending',		//Chờ kiểm duyệt
			'tu_choi' => 'reject'			//Bị từ chối			
		);	
		return $status[$name];
	}
}