
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <script type="text/javascript">
        	$(function(){
        		$('#txtBirthday').datepicker({ dateFormat: 'dd/mm/yy' });
            	});
        </script> 
        <div id="middle-center">
        <div id="menu-top">
        	<ul class="nav-top">
            	<li><a href="<?php echo base_url();?>" class="current">Trang chủ</a></li>
				<li><a href="<?php echo base_url();?>category/1">Chính trị</a></li>
                <li><a href="<?php echo base_url();?>category/5">Văn hóa</a></li>
                <li><a href="<?php echo base_url();?>category/3">Xã hội</a></li>
                <li><a href="<?php echo base_url();?>category/4">Kinh tế</a></li>
                <li><a href="<?php echo base_url();?>category/10">Khoa học</a></li>
            </ul>
         
        </div><!-- end menu-top -->    
         <!-- menu-top -->
       	<div class="box-center" id="box-newtopic">            
            <div class="box-content">                	

            <div class="panel-panel panel-col-first">
					<div class="inside">
						<input type="hidden" name="hdfID" value="<?php echo $member['id'];?>" id="hdfID">
						<div class="panel-pane pane-block pane-usercp-page-title pane-left-top" >				 
							<h2 class="pane-title"><span>Thành viên: <?php echo $member['user_login'];?></span></h2>				  				 
							<div class="pane-content">
								<div class="user-title-block profile clear-block">
									<div class="picture">
										<img src="<?php echo base_url().'application/content/images/avatars/'.$avatar;?>" alt=""  class="imagecache imagecache-profile" width="60" height="60" /></div>                                        
									<div class="profile-about">
									
										<p>Tên hiển thị: <b><span><?php echo $member['user_nicename'];?></span></b></p>
										<div class="expertise">Email: <b><span><?php echo $member['user_email'];?></span></b></div>
										                    	
                                    </div>                                       
                                        
									</div>
								</div>  
							</div>				 
						</div>
						<div class="panel-region-separator"></div>
						<div class="panel-pane pane-views pane-istar-latest-articles-by-author user-main-block" >
				  
							<h2 class="pane-title">Thông tin cơ bản</h2>				  				 
							<div class="pane-content">
								<div class="list-post">	                                                
                                      <ul class="tab_month">
                                      	<?php 
											if($check_duplicate==true){
										?>
                                      	<li>
                                      		<div class="info-member">
	                                      		Đổi ảnh đại diện &nbsp;
												<?php 
													if($check_duplicate==true){
												?>
												<a href="#" id="link-avatar"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
												<?php }?>
											</div>
											<div class="info-member-detail">
												<?php 
													if($avatar=='') {echo "N/A";} else{
												?>
													<img width="150" height="100" src="<?php echo base_url().'application/content/images/avatars/'.$avatar;?>">
													<?php }?>
													<div id="avatar-hidden">
														<br/>
														<?php echo form_open_multipart('member/changeAvatar',array('id'=>'uploadform'));?>
															<input type="hidden" name="hdfMemberID" value="<?php echo $member_id;?>">
															<input id="userfile" class="primary textbox" type="file" tabindex="1" maxlength="100" value="" name="userfile">
															<p class="description">Chọn avatar cho bạn?</p>
															
															<div id="field_edit_error_container" class="hidden">
																<div>
																	<input id="submitbutton-avatar" urllink="<?php echo base_url();?>member/changeAvatar" class="userprof_button" type="submit" value=" Lưu lại ">
																	<input id="cancelbutton-avatar" class="userprof_button" type="reset" value="Hủy bỏ">										
																</div>
															</div>
														<?php echo form_close();?>
													</div>
											</div>
                                      	</li>
                                      	<?php }?>
                                      	<li>
                                      		<div class="info-member">
	                                      		Đến từ &nbsp;
												<?php 
													if($check_duplicate==true){
												?>
												<a href="#" id="link-address"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
												<?php }?>
											</div>
											<div class="info-member-detail">
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
                                      	</li>
                                      	<li>
                                      		<div class="info-member">
	                                      		Giới tính &nbsp;
												<?php 
													if($check_duplicate==true){
												?>
												<a href="#" id="link-gender"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
												<?php }?>
											</div>
											<div class="info-member-detail">
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
                                      	</li>
                                      	<li>
                                      		<div class="info-member">
	                                      		Ngày sinh &nbsp;
												<?php 
													if($check_duplicate==true){
												?>
												<a href="#" id="link-birthday"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
												<?php }?>
											</div>
											<div class="info-member-detail">
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
                                      	</li>
                                      	<li>
                                      		<div class="info-member">
	                                      		Số điện thoại &nbsp;
												<?php 
													if($check_duplicate==true){
												?>
												<a href="#" id="link-phone"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
												<?php }?>
											</div>
											<div class="info-member-detail">
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
                                      	</li>
                                      	<li>
                                      		<div class="info-member">
	                                      		Tiểu sử, lý lịch &nbsp;
												<?php 
													if($check_duplicate==true){
												?>
												<a href="#" id="link-tieusu"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
												<?php }?>
											</div>
											<div class="info-member-detail">
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
                                      	</li>
                                      	<li>
                                      		<div class="info-member">
	                                      		Sở thích &nbsp;
												<?php 
													if($check_duplicate==true){
												?>
												<a href="#" id="link-sothich"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
												<?php }?>
											</div>
											<div class="info-member-detail">
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
                                      	</li>
                                      </ul>                                                                       
                                </div>
							</div>				 
						</div>
						<div class="panel-region-separator"></div>
						<div class="panel-pane pane-views pane-istar-top-voting user-main-block" >				  
							<h2 class="pane-title">Thống kê chung</h2>				  				  
							<div class="pane-content">
								<ul>                      
                                    <li>
                                    	<div class="info-member">
                                      		Tổng số bài đã gửi &nbsp;											
										</div>
										<div class="info-member-detail">
											<label id="thongke"><?php echo $count_post;?></label>											
										</div>
                                    </li>
                                </ul>
							</div>				 
						</div>
					</div>
				</div>  	
                
                </div><!-- end box-content -->
                
            </div><!-- end newtopic -->     
            <?php $this->load->view('front_end/right');?>      
        </div><!-- end middle-center -->
        
    
<?php $this->load->view('front_end/footer');?>    
