<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">
        <?php echo form_open_multipart('home/register',array('id'=>'formID','class'=>'stdform'));?>
        <script type="text/javascript">
        	$(function(){
        		$('#txtNgaySinh').datepicker({ dateFormat: 'dd/mm/yy' });
            	});
        </script>        	
        	<div id="box-newtopic" class="box-center">
				<h2>Đăng ký thành viên</h2>
				<div class="box-content">
					<?php 
					if($check_success==false)
					{
					?>					
					<div class="blockbody formcontrols">
						<h3 class="blocksubhead">Thông Tin cần phải nhập</h3>
						<div class="section">
							<div class="blockrow">
								<label for="regusername">Tên tài khoản:</label>
								<div class="rightcol">
									<input type="hidden" name="hdfCheckExit" id="hdfCheckExit">
									<input id="txtUserName" class="primary textbox validate[required]" type="text" tabindex="1" value="" maxlength="25" name="txtUserName"/>
									<?php 
										if($check_exit==true)
										{
									?>
									<p class="description" style="color:red">Tài khoản đã tồn tại.</p>
									<?php }?>																	
									<p class="description">Xin mời nhập Tên tài khoản bạn muốn dùng trong diễn đàn.</p>
								</div>
							</div>
							<div class="blockrow">
								<ul class="group">
									<li>
										<label for="txtpassword">Mật Khẩu: </label><br>
										<input id="txtpassword" class="textbox validate[required]" type="password" tabindex="1" value="" maxlength="50" name="txtpassword">
									<p class="description">Nhập Mật khẩu cho tài khoản của bạn. </p>
									</li>
									<li>
										<label for="passwordconfirm">Nhập lại Mật Khẩu:</label><br>
										<input id="passwordconfirm" class="textbox validate[required,equals[txtpassword]]" type="password" tabindex="1" value="" maxlength="50" name="passwordconfirm">
									<p class="description">Chú ý: Mật khẩu phân biệt chữ HOA và chữ thường.</p>
									</li>
								</ul>
								
							</div>
							<div class="blockrow">
								<ul class="group">
									<li>
										<label for="email">Địa chỉ Email:</label><br>
										<input id="email" class="textbox validate[required,custom[email]]" type="text" tabindex="1" dir="ltr" value="" maxlength="50" name="email">
									</li>
									<li>
										<label for="emailconfirm">Nhập lại Email:</label><br>
										<input id="emailconfirm" class="textbox validate[required,custom[email],equals[email]]" type="text" tabindex="1" dir="ltr" value="" maxlength="50" name="emailconfirm">
									</li>
								</ul>
								<?php 
										if($check_email_exit==true)
										{
									?>
									<p class="description" style="color:red">Email này đã được đăng ký.</p>
								<?php }?>	
								<p class="description">Xin mời nhập địa chỉ Email của bạn.</p>
							</div>							
						</div>
						<h3 class="blocksubhead">Thông Tin cần thêm (Hồ sơ)</h3>
						<div class="section">
							<div class="blockrow">
								<label>Họ và tên:</label>
								<div class="rightcol">
									<input id="txtHoTen" class="primary textbox" type="text" tabindex="1" maxlength="100" value="" name="txtHoTen">
									<p class="description">Nhập họ tên thật của bạn ?</p>									
								</div>
							</div>
							<div class="blockrow">
								<label>Đến từ:</label>
								<div class="rightcol">
									<input id="txtAddress" class="primary textbox" type="text" tabindex="1" maxlength="100" value="" name="txtAddress">
									<p class="description">Hiện tại bạn đang ở đâu ?</p>									
								</div>
							</div>
							<div class="blockrow">
								<label>Giới tính:</label>
								<div class="rightcol">
									<select id="ddlSex" class="primary" tabindex="1" name="ddlSex">
										<option value="Nam" selected="selected">Nam</option>
										<option value="Nữ">Nữ</option>
										<option value="Không biết">Không biết</option>
									</select>									
									<p class="description">Bạn là Nam (Male) hay Nữ (Female) vậy ?</p>
								</div>
							</div>
							<div class="blockrow">
								<label>Ngày sinh:</label>
								<div class="rightcol">
									<input id="txtNgaySinh" class="primary textbox" type="text" tabindex="1" maxlength="100" value="" name="txtNgaySinh">
									<p class="description">Hãy nhập ngày sinh của bạn ?</p>									
								</div>
							</div>
						</div>
						<h3 class="blocksubhead">Thông Tin Bổ Sung</h3>
						<div class="section">
							<div class="blockrow">
								<label>Số điện thoại:</label>
								<div class="rightcol">
									<input id="txtPhone" class="primary textbox" type="text" tabindex="1" maxlength="100" value="" name="txtPhone">
									<p class="description">Hãy nhập số điện thoại ?</p>									
								</div>
							</div>
						</div>
						<div class="section">
							<div class="blockrow">
								<label>Ảnh đại diện:</label>
								<div class="rightcol">
									<input id="userfile" class="primary textbox" type="file" tabindex="1" maxlength="100" value="" name="userfile">
									<p class="description">Hãy chọn ảnh đại diện của bạn ?</p>									
								</div>
							</div>
						</div>
						<div class="section">
							<div class="blockrow">
								<label>Nhập mã xác nhận:</label>
								<div class="rightcol">
									<input id="txtCaptcha" class="primary textbox validate[required,equals[hdfCaptcha]" style="width:150px;" type="text" tabindex="1" maxlength="100" value="" name="txtCaptcha">
									<input type="hidden" id="hdfCaptcha" value="<?php echo $word;?>">
									<img id="refresh-img" title="Đổi mã xác nhận" style="vertical-align:top;cursor:pointer;  padding-top:1px;" width="25px" height="25px" onclick="ChangeImage()" alt="Thay hình khác" urllink="<?php echo base_url();?>ajax/refreshCaptcha" src="<?php echo base_url();?>application/content/images/refresh.jpg"/>
									<span id="img-captcha"><?php echo $image;?></span>
									<p class="description">Hãy nhập mã xác nhận ?</p>									
								</div>
							</div>
						</div>
						<div class="section">
							<div class="blockrow">
								<label></label>
								<div class="rightcol">
									<input class="button" type="submit" accesskey="s" tabindex="1" value="Hoàn tất đăng ký">
							<input class="button" type="reset" value="Nhập lại thông tin" tabindex="1" name="Reset">									
								</div>
							</div>
						</div>
																				
					</div>	
					<?php 
					}else 
					{											
					?>
					<p>Chúc mừng bạn đã đăng ký thành công!</p>
					<br/>
					<p>Chúng tôi sẽ gửi mail xác nhận cho bạn trong ít phút nữa. Hãy vào hòm thư của bạn để kích hoạt tài khoản.</p>
					<?php }?>								
					</div>				
				</div> 
			<?php echo form_close();?>       	
    	</div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
