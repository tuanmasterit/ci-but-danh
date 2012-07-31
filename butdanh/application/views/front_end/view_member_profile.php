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
							<div class="about-right">Vanhung90_hd</div>
						</div>
						<div class="item-section">
							<div class="about-left">Họ và tên</div>
							<div class="about-right">Phạm Văn Hưng</div>
						</div>
						<div class="item-section">
							<div class="about-left">Đến từ</div>
							<div class="about-right">Hải Dương</div>
						</div>
						<div class="item-section">
							<div class="about-left">Giới tính</div>
							<div class="about-right">Nam</div>
						</div>
						<div class="item-section">
							<div class="about-left">Ngày sinh</div>
							<div class="about-right">08/01/1990</div>
						</div>
						<div class="item-section">
							<div class="about-left">Số điện thoại</div>
							<div class="about-right">0972263179</div>
						</div>
						<div class="item-section">
							<div class="about-left">Email</div>
							<div class="about-right">phamvanhung0818@gmail.com</div>
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
