<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != TRUE){
			redirect('admin/login');
		}
    }		
	public function index()
	{	
		//Google API info
		define('ga_email','khonggiantre.com@gmail.com');
		define('ga_password','khong!gian!tre1');
		define('ga_profile_id','38602940');
		//Create new api object
		require 'gapi.class.php';
		$ga = new gapi(ga_email,ga_password);
		//Get data
		$ga->requestReportData(ga_profile_id,array('date'),array('pageviews','visits'),null,null,date("Y-m-d", strtotime("- 6 days")),date("Y-m-d"));
		$str='';
		
		foreach($ga->getResults() as $result)
		{
			$str .= strrev($result->getVisits()).',';			
		}
		$str = strrev($str);
		$data['arr_view'] = $str;
		$ga->requestReportData(ga_profile_id,array('date'),array('pageviews','visits'),null,null,date("Y-m-d"),date("Y-m-d"));
		$data['view_today'] = $ga->getVisits();
		$this->load->view('back_end/view_dashboard',$data);
				
	}
	public function accesdenied(){?>
		<script>alert('Bạn không đủ quyền truy cập vào khu vực này !');</script>
        <?php
		$this->load->view('back_end/view_dashboard');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */