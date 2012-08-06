<?php include('header.php'); ?>
 
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">                	
                    <li class="current"><a href="<?php echo base_url();?>admin/users/profile">Thông tin cá nhân</a></li>
                    <li><a href="<?php echo base_url();?>admin/users/change_pass">Đổi mật khẩu</a></li>
                    
                </ul>
                <div class="content">                	
                	<div class="edit-left">
                		<?php
                			if($this->session->flashdata('profile_change')==true)
                			{
                		?>    
                		<div class="notification msgsuccess">
							<a class="close"></a>
							<p>Cập nhật thành công!</p>
						</div>						
                		<?php }?>            		
                			<?php echo form_open('admin/users/profile',array('id'=>'formID','class'=>'stdform'));?>
                			<input type="hidden" name="txtId" value="<?php echo $user['id'];?>">                    		 
                            <p><label>Tên đăng nhập:</label></p>
                            <p><span class="field"><input type="text" class="longinput" value="<?php echo $user['user_login'];?>" readonly="readonly" name="txtname" /></span></p>
                            <br />
                            <p><label>Tên người dùng:</label></p>                            
                            <p><span class="field"><input type="text" class="longinput validate[required]" value="<?php echo $user['user_nicename'];?>" name="txtnicename" /></span></p>
                            <br />
                            <p><label>Email:</label></p>                            
                            <p><span class="field"><input type="text" class="longinput validate[required,custom[email]]" value="<?php echo $user['user_email'];?>" name="txtemail" /></span></p>
                            <br />
                            <p><label>Tên hiển thị:</label></p>                            
                            <p><span class="field"><input type="text" class="longinput" value="<?php echo $user['display_name'];?>"  name="txtdisplay" /></span></p>
                            <br />
                            <p class="stdformbutton">
                            	<button class="submit radius2">Cập nhật</button>
                                <input type="reset" value="Hủy" class="reset radius2">
                            </p>        
	                    
                            <?php echo form_close();?>                        
                    	</div>
                    </div>
               </div>
                <?php $this->load->view('back_end/footer');?>     
           </div>  
       </div> 
                   
   </div><!--maincontentinner-->                        