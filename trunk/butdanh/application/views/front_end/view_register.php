<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">
        <?php echo form_open('home/register',array('id'=>'formID','class'=>'stdform'));?>
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
										<label for="password">Mật Khẩu:</label>
										<input id="password" class="textbox validate[required]" type="password" tabindex="1" value="" maxlength="50" name="password">
									</li>
									<li>
										<label for="passwordconfirm">Nhập lại Mật Khẩu:</label>
										<input id="passwordconfirm" class="textbox validate[required,quals[password]]" type="password" tabindex="1" value="" maxlength="50" name="passwordconfirm">
									</li>
								</ul>
								<p class="description">Nhập Mật khẩu cho tài khoản của bạn. Chú ý: Mật khẩu phân biệt chữ HOA và chữ thường.</p>
							</div>
							<div class="blockrow">
								<ul class="group">
									<li>
										<label for="email">Địa chỉ Email:</label>
										<input id="email" class="textbox validate[required,custom[email]]" type="text" tabindex="1" dir="ltr" value="" maxlength="50" name="email">
									</li>
									<li>
										<label for="emailconfirm">Nhập lại Email:</label>
										<input id="emailconfirm" class="textbox validate[required,custom[email],equals[email]]" type="text" tabindex="1" dir="ltr" value="" maxlength="50" name="emailconfirm">
									</li>
								</ul>
								<p class="description">Xin mời nhập địa chỉ Email của bạn.</p>
							</div>							
						</div>
						<h3 class="blocksubhead">Thông Tin cần thêm (Hồ sơ)</h3>
						<div class="section">
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
										<option value="1" selected="selected">Nam</option>
										<option value="2">Nữ</option>
										<option value="3">Không biết</option>
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
					<?php }?>								
					</div>				
				</div> 
			<?php echo form_close();?>       	
    	</div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
