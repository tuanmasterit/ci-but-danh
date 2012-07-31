<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">
        <?php echo form_open('home/register',array('id'=>'formID','class'=>'stdform'));?>             	
        	<div id="box-newtopic" class="box-center">
				<h2>Thông tin thành viên</h2>
				<div class="profile_content">
					<div class="blocksubhead">						
						<h4 id="about-me" class="subsectionhead-understate">Thông tin cơ bản</h4>						
					</div>
					<div class="subsection">
						<div class="item-section">
							<div class="about-left">Tên đăng nhập</div>
							<div class="about-right"><?php echo $member['user_login'];?></div>
						</div>
						<div class="item-section">
							<div class="about-left">Họ và tên</div>
							<div class="about-right"><?php echo $member['user_nicename'];?></div>
						</div>
						<div class="item-section">
							<div class="about-left">Đến từ</div>
							<div class="about-right"><?php if($address=='') {echo 'N/A';} else{echo $address;}?></div>
						</div>
						<div class="item-section">
							<div class="about-left">Giới tính</div>
							<div class="about-right"><?php if($gender=='') {echo 'N/A';} else{echo $gender;}?></div>
						</div>
						<div class="item-section">
							<div class="about-left">Ngày sinh</div>
							<div class="about-right"><?php if($birthday=='') {echo 'N/A';} else{echo $birthday;}?></div>
						</div>
						<div class="item-section">
							<div class="about-left">Số điện thoại</div>
							<div class="about-right"><?php if($phone=='') {echo 'N/A';} else{echo $phone;}?></div>
						</div>
						<div class="item-section">
							<div class="about-left">Email</div>
							<div class="about-right"><?php echo $member['user_email'];?></div>
						</div>
						<div class="item-section">
							<div class="about-left">Tiểu sử, lý lịch</div>
							<div class="about-right">phamvanhung0818@gmail.com</div>
						</div>
						<div class="item-section">
							<div class="about-left">Sở thích</div>
							<div class="about-right">phamvanhung0818@gmail.com</div>
						</div>
					</div>
					<div class="blocksubhead">						
						<h4 id="about-me" class="subsectionhead-understate">Thống kê chung</h4>						
					</div>
					<div class="subsection">
						<div class="item-section">
							<div class="about-left">Tổng số bài gửi</div>
							<div class="about-right">50</div>
						</div>
						<div class="item-section">
							<div class="about-left">Tổng số lần thích</div>
							<div class="about-right">50</div>
						</div>
					</div>
				</div>				
			</div>			   	
    	</div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
