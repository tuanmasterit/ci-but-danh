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
                	<li><a href="<?php echo base_url();?>admin/posts/lists/topic">Tất cả chủ đề</a></li>
                    <li class="current"><a href="<?php echo base_url();?>admin/posts/add/topic">Cập nhật chủ đề</a></li>
                </ul>
                <div class="content"> 
                	<?php foreach($lsttopic as $l_topic){?>                                   	
                	<form method="post" action="<?php echo base_url();?>admin/posts/update_topic/<?php echo $l_topic->id;?>" class="stdform">
                	<div class="edit-main">     
                    		<input type="hidden" name="hdfauthor" value="<?php echo $l_topic->post_author;?>"  />
                            <p><label>Tiêu đề:</label></p>
                            <p><span class="field"><input type="text" class="longinput" value="<?php echo $l_topic->post_title;?>" name="txttitle"></span></p>
                            </br>
                            <p><label>Tóm tắt:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"><?php echo $l_topic->post_excerpt;?></textarea></span></p>
                            </br>
                            <p><label>Nội dung:</label></p>                            
                            <p><textarea name="txtcontent" id="editor_content"><?php echo $l_topic->post_content;?></textarea></p>                            
                            </br>
                    </div>
                    <div class="edit-right">
                    	<div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Chọn bài viết</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                            	<input type="hidden" id="hdurlajax" value="<?php echo base_url();?>/admin/posts/list_posts_ajax" />
                            	<p>
                                    Bút danh:                                    
                                    <select name="cbxbutdanh" style="width:100%;" id="cbxbutdanh">
                                    	<option value="">-- Tất cả --</option>
                                    	<?php foreach($lstbutdanh as $butdanh){?>
                                        	<?php if($butdanh->id == $ofpost->post_author){?>
	                                        	<option selected="selected" value="<?php echo $butdanh->id;?>"><?php echo $butdanh->user_nicename;?></option>	
                                            <?php }else{?>
        										<option value="<?php echo $butdanh->id;?>"><?php echo $butdanh->user_nicename;?></option>	                                    
                                            <?php }?>
                                        <?php }?>
                                    </select>
                                </p>
                                </br>
                                <p>
                                    Danh mục bài viết:                                       
                                    <select name="cbxcategory" style="width:100%;" id="cbxcategory">
                                    	<option value="">-- Tất cả --</option>
                                    	<?php foreach($lstCategories as $category){?> 
                                        	<?php $flag=false;?>
                                        	<?php foreach($categories_of_topic as $category_of_topic){
												if(	$category->term_id == $category_of_topic->term_taxonomy_id){$flag=true;}
											}?>                                        	
                                            <?php if($flag){?>
                                        		<option selected="selected" value="<?php echo $category->term_id;?>"><?php echo $category->name;?></option>
                                            <?php }else{?>
       											<option value="<?php echo $category->term_id;?>"><?php echo $category->name;?></option>                                     
                                            <?php }?>
                                        <?php }?>
                                    </select>                                    
                                </p>
                                </br>
                                <p>
                                    Bài viết:   
                                    <div id='divpostajax'>                                    
                                    <select name="cbxbaiviet" style="width:100%;" id="cbxbaiviet">
											<option selected="selected" value="<?php echo $ofpost->id;?>"><?php echo $ofpost->post_title;?></option>
                                    </select>
                                    </div>
                                </p>
                                </br>
                                <p class="stdformbutton">
                                    <button class="submit radius2">Cập nhật</button>
                                    <input type="reset" value="Hủy" class="reset radius2">
                                </p>
                            </div><!--widgetcontent-->
                        </div>                        
                        <div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Ảnh đại diện</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                                <input type="hidden" id="featured_image" name="hdffeatured_image" value="<?php echo $featured_image;?>" >
                                <img src="<?php echo $featured_image;?>" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
                                <button id="imageUpload" class="submit radius2" >Chọn ảnh đại diện</button>
                            </div>
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
