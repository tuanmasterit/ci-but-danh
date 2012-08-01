<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">
        <script type="text/javascript">
        	$(function(){
        		$('#txtBirthday').datepicker({ dateFormat: 'dd/mm/yy' });
            	});
        </script>               	
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
								<?php 
									if($check_duplicate==true){
								?>
								<a href="#" id="link-address"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
								<?php }?>
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
								<?php 
									if($check_duplicate==true){
								?>
								<a href="#" id="link-gender"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
								<?php }?>
							</div>
							<div class="about-right">
								<label id="gender-show"><?php if($gender=='') {echo 'N/A';} else{echo $gender;}?></label>
								<div id="gender-hidden">
									<select id="ddlGender" class="primary" tabindex="1" name="ddlGender">
										
										<option selected="selected" value="Nam">Nam</option>
										<option value="Nữ">Nữ</option>
									<option value="Không biết">Không biết</option>
									</select>
									
									<p class="description">Bạn là Nam (Male) hay Nữ (Female) vậy ?</p>
									
									<div>
										<input id="submitbutton-gender" urllink="<?php echo base_url();?>member/updateProfile" class="userprof_button" type="submit" value=" Lưu lại ">
										<input id="cancelbutton-gender" class="userprof_button" type="reset" value="Hủy bỏ">
										
									</div>
								</div>
							</div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Ngày sinh &nbsp;
								<?php 
									if($check_duplicate==true){
								?>
								<a href="#" id="link-birthday"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
								<?php }?>
							</div>
							<div class="about-right">
								<label id="birthday-show"><?php if($birthday=='') {echo 'N/A';} else{echo $birthday;}?></label>
								<div id="birthday-hidden">
									<input id="txtBirthday" class="primary textbox" type="text" tabindex="1" maxlength="100" value="" name="txtBirthday">
									<p class="description">Ngày sinh của bạn?</p>
									
									<div id="field_edit_error_container" class="hidden">
									<div>
										<input id="submitbutton-birthday" urllink="<?php echo base_url();?>member/updateProfile" class="userprof_button" type="submit" value=" Lưu lại ">
										<input id="cancelbutton-birthday" class="userprof_button" type="reset" value="Hủy bỏ">										
									</div>
								</div>
							</div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Số điện thoại &nbsp;
								<?php 
									if($check_duplicate==true){
								?>
								<a href="#" id="link-phone"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
								<?php }?>
							</div>
							<div class="about-right">
								<label id="phone-show"><?php if($phone=='') {echo 'N/A';} else{echo $phone;}?></label>
								<div id="phone-hidden">
									<input id="txtPhone" class="primary textbox" type="text" tabindex="1" maxlength="100" value="" name="txtPhone">
									<p class="description">Số điện thoại của bạn?</p>
									
									<div id="field_edit_error_container" class="hidden">
									<div>
										<input id="submitbutton-phone" urllink="<?php echo base_url();?>member/updateProfile" class="userprof_button" type="submit" value=" Lưu lại ">
										<input id="cancelbutton-phone" class="userprof_button" type="reset" value="Hủy bỏ">										
									</div>
								</div>
							</div>
							</div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Email &nbsp;								
							</div>
							<div class="about-right"><?php echo $member['user_email'];?></div>
						</div>
						<div class="item-section">
							<div class="about-left">
								Tiểu sử, lý lịch &nbsp;
								<?php 
									if($check_duplicate==true){
								?>
								<a href="#" id="link-tieusu"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
								<?php }?>
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
								<?php 
									if($check_duplicate==true){
								?>
								<a href="#" id="link-sothich"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
								<?php }?>
							</div>
							<div class="about-right">
								<label id="sothich-show"><?php if($sothich=='') {echo 'N/A';} else{echo $sothich;}?></label>
								<div id="sothich-hidden">								
									<div>
										<textarea id="txtSoThich" class="primary textbox" tabindex="1" cols="35" rows="0" name="txtSoThich"></textarea>
									</div>
									<p class="description">Sở thích của bạn?</p>
									
									<div id="field_edit_error_container" class="hidden">
										<div>
											<input id="submitbutton-sothich" urllink="<?php echo base_url();?>member/updateProfile" class="userprof_button" type="submit" value=" Lưu lại ">
											<input id="cancelbutton-sothich" class="userprof_button" type="reset" value="Hủy bỏ">										
										</div>
									</div>
								</div>
							</div>
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
		</div>	
		</div>
    	</div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
