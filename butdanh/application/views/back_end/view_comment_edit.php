<?php $this->load->view('back_end/header'); ?>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckfinder/ckfinder.js"></script>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php $this->load->view('back_end/sidebar-left');?>       
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">                	
                		<li class="current"><a href="<?php echo base_url();?>admin/comments">Cập nhật bình luận</a></li>                    
                </ul>
                <div class="content">     
                	           	                	
                	<?php foreach($lstComments as $Comment){?>
                	<form method="post" action="<?php echo base_url();?>admin/comments/edit" class="stdform">                             
                	<div class="edit-main">                    	                    	                            
                    		<input type="hidden" value="<?php echo $Comment->comment_ID;?>" name="comment_id" />
                            <p><label>Tiêu đề:</label></p>
                            <p><span class="field"><input type="text" class="longinput" name="txttitle" value="<?php echo $Comment->comment_agent;?>"></span></p>
                            <br/>
                            <p><label>Người đăng:</label></p>                            
                            <p><span class="field"><input type="text" readonly="readonly" class="longinput" name="txtauthor" value="<?php echo $Comment->comment_author;?>" ></span></p>
                            <br/>
                            <p><label>Email:</label></p>                            
                            <p><span class="field"><input type="text" readonly="readonly" class="longinput" name="txtemail" value="<?php echo $Comment->comment_author_email;?>" ></span></p>
                            <br/>
                            <p><label>Nội dung:</label></p>                            
                            <p><textarea name="txtcontent" id="txtcontent"><?php echo $Comment->comment_content;?></textarea></p>
                            <br/>
                            <p><label>Trạng thái:</label></p>
                            <p>
                            	<select name="slStatus">
                            		<?php 
                            		if($Comment->comment_approved == 'approved')
                            		{?>
                            		<option value="approved" selected="selected">Phê duyệt</option>
                            		<option value="unapproved">Chưa phê duyệt</option>
                            		<?php 
                            		}else{                            		
                            		?>
                            		<option value="approved">Phê duyệt</option>
                            		<option value="unapproved" selected="selected">Chưa phê duyệt</option>
                            		<?php }?>
                            	</select>
                            </p>
                            <br/>
                    </div>
                    <div class="edit-right">
                    	<div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Thao tác</span></h2></div>
                            <div class="widgetcontent" style="display: block;">                            	
                                <p class="stdformbutton">
                                    <button class="submit radius2">Cập nhật</button>
                                    <input type="reset" value="Hủy" onclick="javascript:history.back(-1);" class="reset radius2">
                                </p>
                            </div><!--widgetcontent-->
                        </div>                        
                    </div>
                    </form>    
                    <?php }?>          
                </div><!--content-->                
            </div><!--maincontentinner-->            
            <div class="footer">
            	<p>Starlight Admin Template &copy; 2012. All Rights Reserved. Designed by: <a href="">ThemePixels.com</a></p>
            </div><!--footer-->
            
        </div><!--maincontent--> 

     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->        
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'editor_content',
	{			
		filebrowserBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=file',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=image',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=flash',
		filebrowserImageUploadUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=image',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=flash',
		filebrowserImageWindowWidth : '950',
		filebrowserImageWindowHeight : '490',
		filebrowserWindowWidth : '950',
		filebrowserWindowHeight : '490'
	});

</script>
</body>
</html>
