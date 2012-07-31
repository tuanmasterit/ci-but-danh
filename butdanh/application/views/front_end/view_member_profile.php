<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">
                     	
        	<div id="box-newtopic" class="box-center">
				<h2>Thông tin thành viên</h2>
				<div class="profile_content">
					<div class="blocksubhead">						
						<h4 id="about-me" class="subsectionhead-understate">Thông tin cơ bản</h4>						
					</div>
					<div class="subsection">
						<input type="hidden" name="hdfID" value="<?php echo $member['id'];?>" id="hdfID">
						<div class="item-section">
							<div class="about-left">Tên đăng nhập</div>
							<div class="about-right"><?php echo $member['user_login'];?></div>
						</div>
						<div class="item-section">
							<div class="about-left">Họ và tên</div>
							<div class="about-right"><?php echo $member['user_nicename'];?></div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Đến từ &nbsp;
								<a href="#" id="link-address"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
							</div>
							<div class="about-right" id="div-address">
								<label id="address-show"><?php if($address=='') {echo 'N/A';} else{echo $address;}?></label>
								<div id="address-hidden">
									<input id="txtAddress" class="primary textbox" type="text" tabindex="1" maxlength="100" value="" name="txtAddress">
									<p class="description">Hiện tại bạn đang ở đâu?</p>
									
									<div id="field_edit_error_container" class="hidden">
									<div>
										<input id="submitbutton-address" urllink="<?php echo base_url();?>member/updateProfile" class="userprof_button" type="submit" value=" Lưu lại ">
										<input id="cancelbutton-address" class="userprof_button" type="reset" value="Hủy bỏ">										
									</div>
								</div>
							</div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Giới tính &nbsp;
								<a href="#" id="link-gender"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
							</div>
							<div class="about-right">
								<label id="gender-show"><?php if($gender=='') {echo 'N/A';} else{echo $gender;}?></label>
								<div>
									<select id="cfield_5" class="primary" tabindex="1" name="userfield[field5]">
										<option value="0"></option>
										<option selected="selected" value="1">Nam</option>
										<option value="2">Nữ</option>
									<option value="3">Kh&ocirc;ng biết</option>
									</select>
									
									<p class="description">Bạn l&agrave; Nam (Male) hay Nữ (Female) vậy ?</p>
									
									<div>
										<input id="submitbutton" class="userprof_button" type="submit" value=" Lưu lại ">
										<input id="cancelbutton" class="userprof_button" type="reset" value="Hủy bỏ">
										
									</div>
								</div>
							</div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Ngày sinh &nbsp;
								<a href="#" id="link-birthday"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
							</div>
							<div class="about-right"><?php if($birthday=='') {echo 'N/A';} else{echo $birthday;}?></div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Số điện thoại &nbsp;
								<a href="#" id="link-phone"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
							</div>
							<div class="about-right">
								<label id="phone-show"><?php if($phone=='') {echo 'N/A';} else{echo $phone;}?></label>
							</div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Email &nbsp;
								<a href="#" id="link-email"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
							</div>
							<div class="about-right"><?php echo $member['user_email'];?></div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Tiểu sử, lý lịch &nbsp;
								<a href="#" id="link-tieusu"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
							</div>
							<div class="about-right" id="div-tieusu">
								<label id="tieusu-show"><?php if($tieusu=='') {echo 'N/A';} else{echo $tieusu;}?></label>
								<div id="tieusu-hidden">								
									<div>
										<textarea id="txtTieuSu" class="primary textbox" tabindex="1" cols="35" rows="0" name="userfield[field1]"></textarea>
									</div>
									<p class="description">Một chút thông tin chi tiết về bản thân bạn</p>
									
									<div id="field_edit_error_container" class="hidden">
										<div>
											<input id="submitbutton-tieusu" urllink="<?php echo base_url();?>member/updateProfile" class="userprof_button" type="submit" value=" Lưu lại ">
											<input id="cancelbutton-tieusu" class="userprof_button" type="reset" value="Hủy bỏ">										
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Sở thích &nbsp;
								<a href="#" id="link-hobby"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
							</div>
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
