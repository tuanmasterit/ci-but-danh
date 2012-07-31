<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url();?>application/content/css/style.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_url();?>application/content/css/validationEngine.jquery.css"/>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/script.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.validationEngine-vi.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.validationEngine.js"></script>
<link href="<?php echo base_url();?>application/content/css/jquery-ui.css" type="text/css" media="all" rel="stylesheet"/>
<link href="<?php echo base_url();?>application/content/css/jquery-ui-timepicker-addon.css" type="text/css" media="all" rel="stylesheet"/>
<script src="<?php echo base_url();?>application/content/js/jquery-ui.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>application/content/js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>application/content/js/jquery-ui-sliderAccess.js" type="text/javascript"></script>
<title>Bút danh</title>
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
</head>
<body>
<div id="wr">
<div id="wrap">
	<div id="header">
    	<div id="banner">
        	<div id="logo">
            	<a href="/butdanh/index.html"><img src="<?php echo base_url();?>application/content/images/logo2.png" /></a>                                
            </div>
            <div class="ads-banner">
            	<img src="<?php echo base_url();?>application/content/images/header-ads.png" />
            </div>

            <form method="get" action="">
                <div id="search-bar">
                    <input type="text" value="Search" placeholder="Search" name="s">
                    <input type="submit" value="">
                </div>
            </form>
        </div><!-- end banner -->
        <div id="menu-top">
        	<ul class="nav-top">
            	<li><a href="<?php echo base_url();?>" class="current">Trang chủ</a></li>
				<li><a href="<?php echo base_url();?>category/1">Chính trị</a></li>
                <li><a href="<?php echo base_url();?>category/5">Văn hóa</a></li>
                <li><a href="<?php echo base_url();?>category/3">Xã hội</a></li>
                <li><a href="<?php echo base_url();?>category/4">Kinh tế</a></li>
                <li><a href="<?php echo base_url();?>category/10">Khoa học</a></li>
            </ul>
            <div class="user">
            	<?php if($this->session->userdata('username') != ''){?>
                	<p class="display-user">Xin chào: <a href="<?php echo base_url().'member/profile/'.$this->session->userdata('user_id');?>"><?php echo $this->session->userdata('username');?></a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>home/logout">Thoát</a></p>
                <?php }else{?>
            		<a id="link-login" href="javascript:return false;">Đăng nhập</a>
            		<a id="link-login" href="<?php echo base_url();?>home/register">Đăng ký |</a>
                    <div class="frm-login">
                		<form id="login" action="<?php echo base_url();?>home/authentication" method="post">                        
                            <p>
                                <label for="username" class="lbllogin">Tài khoản:</label>
                                <input type="text" id="username" name="txtuser" class="text" />
                            </p>
                            <p>
                                <label for="password" class="lbllogin">Mật khẩu:</label>
                                <input type="password" id="password" name="txtpassword" class="text" />
                            </p>
                            <p>
                                <input type="submit" class="btnlogin" value="Đăng nhập"  />
                            </p>
                        </form>
                    </div>
                <?php }?>                
            </div>
        </div><!-- end menu-top -->
    </div><!-- end header -->