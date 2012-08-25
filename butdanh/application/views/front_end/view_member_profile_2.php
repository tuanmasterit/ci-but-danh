
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <script type="text/javascript">
        	$(function(){
        		$('#txtBirthday').datepicker({ dateFormat: 'dd/mm/yy' });
            	});
        </script>        
        <div id="middle-center">
        <?php $term_toptic=0;?>
            <?php $this->load->view('front_end/menu-top');?>    
         <!-- menu-top -->
       	<div class="box-center" id="box-newtopic">            
            <div class="box-content">                	
			
            <div class="panel-panel panel-col-first">
					<div class="inside">
						<input type="hidden" name="hdfID" value="<?php echo $member['id'];?>" id="hdfID">
						<div class="panel-pane pane-block pane-usercp-page-title pane-left-top box-center" >				 
							<ul class="top-topic-top">
								<li>
									<a class="tab-active" href="">Hồ sơ thành viên</a>
								</li>
							</ul>				  				 
							<div class="pane-content">
								<div class="user-title-block profile clear-block">
									<div class="picture">
										<?php 
										if($avatar!='')
										{
										?>
										<img src="<?php echo base_url().'application/content/images/avatars/'.$avatar;?>" alt=""  class="imagecache imagecache-profile" width="110" height="110" />
										<?php }else{?>
										<img src="<?php echo base_url().'application/content/images/avatars/no_avatar.gif';?>" alt=""  class="imagecache imagecache-profile" width="110" height="110" />
										<?php }?>
										<?php 
											if($check_duplicate==true){
										?>                                      	
                                      		<div class="info-member">
	                                      		Change Avatar &nbsp;
												<?php 
													if($check_duplicate==true){
												?>
												<a href="#" id="link-avatar"><img alt="change-info" title="Edit Value" src="<?php echo base_url();?>application/content/images/userfield_edit.gif"></a>
												<?php }?>
											</div>											                                    	
                                      	<?php }?>                      	
                                    </div>      
									</div>
										                                      
									<div class="profile-about">																		
										<p>Tên hiển thị: <b><span><?php echo $member['user_nicename'];?></span></b></p>
										<div class="expertise">Ngày tham gia: <b><span><?php echo date_format(date_create($member['user_registered']),'d/m/Y');?></span></b></div>							                                 
                                        										
										<div class="pane-content">
											<div class="list-post">	                                                
			                                      <ul class="tab_month">                                      	
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
			                                      		<div class="info-member-detail info-member-images">
															<?php 
																if($avatar=='') {echo "N/A";} else{
															?>													
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
							</div>				 
						</div>						
						<div class="panel-region-separator"></div>
						<div class="panel-pane pane-views pane-istar-top-voting user-main-block" >				  
							<h2 class="pane-title profile_member1 arrow-up1"><a >Những chủ đề đã tạo:</a></h2>	  				  
							<div class ="box1 list_bai"  id="scroll_box-top">
		                        <ul>
		                          <?php 
		                              foreach ($lstTopicMember as $topicmember)
		                              {
		                          ?>
		                          <li>
		                          <a href="<?php echo base_url().'chu-de/'.urldecode($topicmember->guid);?>"><span class="item-toptic-new"><?php echo $topicmember->post_title;?></span></a>&nbsp;<span class="date-time"><?php echo date_format(date_create($topicmember->post_date),'d-m-Y H:i:s');?></span><br>
		                          </li>
		                          <?php
		                              }
		                           ?>				    
		                        </ul>
		                    </div>		                    				 
						</div>
						<div class="panel-region-separator"></div>
						<div class="panel-pane pane-views pane-istar-top-voting user-main-block" >				  
							<h2 class="pane-title profile_member1 arrow-up1">Những bài mới đăng:</h2>				  				  
							<div  class="box1 list_bai">
								<ul>	
			                    <?php                     	
			                    	$num = 1;
			                    	foreach ($lstCommentMember as $commentMember){
			                    ?>			                    
			                        <li>
		                          <a href="<?php echo base_url().'chu-de/'.urldecode($commentMember->guid);?>"><span class="item-toptic-new"><?php echo $commentMember->comment_agent;?></span></a>&nbsp;<span class="date-time"><?php echo date_format(date_create($commentMember->comment_date),'d-m-Y H:i:s');?></span><br>
		                          </li>			                    
			                    <?php 
			                        $num++;
			                        }
			                    ?>
			                    </ul>
			                </div>   				 
						</div>
					</div>
					
				</div>  	
                
                </div><!-- end box-content -->
			                  
             
                
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div>
<?php $this->load->view('front_end/footer');?>    
