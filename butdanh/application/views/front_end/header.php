<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url();?>application/content/css/style.css" />
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/script.js"></script>
<title>Bút danh</title>
 
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
                	<p class="display-user">Xin chào: <a href="<?php echo base_url();?>profile"><?php echo $this->session->userdata('username');?></a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>home/logout">Thoát</a></p>
                <?php }else{?>
            		<a id="link-login" href="javascript:return false;">Đăng nhập</a>
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