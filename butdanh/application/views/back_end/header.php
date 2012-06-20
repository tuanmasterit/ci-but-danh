<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard | Starlight Premium Admin Template</title>
<link rel="stylesheet" href="<?php echo base_url();?>application/content-admin/css/style.css" type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>application/content-admin/css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>application/content-admin/css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>application/content-admin/css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/plugins/jquery-1.6.min.js"></script>
<link rel="stylesheet" media="screen" href="<?php echo base_url();?>application/content-admin/css/validationEngine.jquery.css"/>

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/jquery.validationEngine-vi.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/jquery.validationEngine.js"></script>
<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
</script>
<script type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script src="<?php echo base_url();?>application/content-admin/js/jquery.popupWindow.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/custom/general.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/custom/tables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/content-admin/js/custom/dashboard.js"></script>
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<meta charset="UTF-8"></head>

<body class="loggedin">
	
	<!-- START OF HEADER -->
	<div class="header radius3">
    	<div class="headerinner">        	
            <a href="" class="logo">Bút Danh</a>                          
            <div class="headright">
            	<div class="headercolumn">&nbsp;</div>
            	<div id="searchPanel" class="headercolumn">
                	<div class="searchbox">
                        <form action="" method="post">
                            <input type="text" id="keyword" name="keyword" class="radius2" value="Search here" /> 
                        </form>
                    </div><!--searchbox-->
                </div><!--headercolumn-->
            	<div id="notiPanel" class="headercolumn">
                    <div class="notiwrapper">
                        <a href="<?php echo base_url();?>application/content-admin/ajax/messages.php.html" class="notialert radius2">5</a>
                        <div class="notibox">
                            <ul class="tabmenu">
                                <li class="current"><a href="./ajax/messages.php.html" class="msg">Thống báo (2)</a></li>
                                <li><a href="<?php echo base_url();?>application/content-admin/ajax/activities.php.html" class="act">Hoạt động (3)</a></li>
                            </ul>
                            <br clear="all" />
                            <div class="loader"><img src="<?php echo base_url();?>application/content-admin/images/loaders/loader3.gif" alt="Loading Icon" /> Loading...</div>
                            <div class="noticontent"></div><!--noticontent-->
                        </div><!--notibox-->
                    </div><!--notiwrapper-->
                </div><!--headercolumn-->
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo radius2">
                        <img src="<?php echo base_url();?>application/content-admin/images/avatar.png" alt="" class="radius2" />
                        
                        <span><strong><?php echo $this->session->userdata('username');?></strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                            <li><a href="">Profile</a></li>
                            <li><a href="">Account Settings</a></li>
                            <li><a href="<?php echo base_url();?>admin/login/logout">Logout</a></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->                     	        