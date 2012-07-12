<?php include('header.php'); ?>
 
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">                	
                    <li><a href="<?php echo base_url();?>admin/users/profile">Thông tin cá nhân</a></li>
                    <li  class="current"><a href="<?php echo base_url();?>admin/users/change_pass">Đổi mật khẩu</a></li>
                    
                </ul>
                <div class="content">                	
                	<div class="edit-left">                	
                		<?php
                			if($this->session->flashdata('meassage')=='pass succeed')
                			{
                		?>    
                		<div class="notification msgsuccess">
							<a class="close"></a>
							<p>Đổi mật khẩu thành công!</p>
						</div>						
                		<?php 
                			}
                			if ($this->session->flashdata('meassage')=='pass false')
                			{
                		?> 
                		<div class="notification msgerror">
							<a class="close"></a>
							<p>Mật khẩu cũ không đúng!</p>
						</div>
                		<?php }?>           		
                			<?php echo form_open('admin/users/change_pass',array('id'=>'formID','class'=>'stdform'));?>
                			<input type="hidden" name="txtId" value="<?php echo $user['id'];?>">                    		 
                            <p><label>Mật khẩu cũ:</label></p>
                            <p><span class="field"><input type="password" class="longinput" name="txtPass" /></span></p>
                            <br />
                            <p><label>Mật khẩu mới:</label></p>                            
                            <p><span class="field"><input type="password" class="longinput validate[required]" name="txtPassNew" id="txtPassNew" /></span></p>
                            <br />
                            <p><label>Nhập lại mật khẩu mới:</label></p>                            
                            <p><span class="field"><input type="password" class="longinput validate[required,equals[txtPassNew]]" name="txtPassRepeat" /></span></p>
                            <br />                            
                            <p class="stdformbutton">
                            	<button class="submit radius2">Đổi mật khẩu</button>
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
            
