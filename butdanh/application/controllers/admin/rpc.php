<?php
	class Rpc extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Author_model');
		}
		
		function index()
		{
			// Is there a posted query string?
			if($this->input->post('queryString')) {
				$user_nicename = $this->input->post('queryString');
				$lstUser = $this->Author_model->getAjax($user_nicename);
					if(count($lstUser)>0) {						
						foreach ($lstUser as $User){							
		         			echo '<li onClick="fill(\''.$User->user_nicename.'\');">'.$User->user_nicename.' &nbsp; ('.$User->name.')</li>';
		         		}
					} else {
						echo 'Không có bút danh nào.';
					}
				} else {
					// Dont do anything.
				} // There is a queryString.
			
		}
		
		function fill()
		{
			if($this->input->post('queryString')) 
			{
				$user_nicename = $this->input->post('queryString');
				$lstUser = $this->Author_model->getAjax($user_nicename);
				if(count($lstUser)>0) 
				{						
					foreach ($lstUser as $User)
					{							
         				echo '<li onClick="fill(\''.$User->user_nicename.'\');">'.$User->user_nicename.' &nbsp; ('.$User->name.')</li>';
         			}
				} else 
				{
					echo 'Không có bút danh nào.';
				}
			} else 
			{
					// Dont do anything.
			}
		}
	}
?>