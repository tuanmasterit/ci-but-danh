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
                	<li><a href="<?php echo base_url();?>admin/posts/lists/post">Tất cả bài viết</a></li>
                    <li class="current"><a href="<?php echo base_url();?>admin/posts/add/post">Cập nhật bài viết</a></li>
                    <li><a href="<?php echo base_url();?>admin/posts/categories">Danh mục bài viết</a></li>
                </ul>
                <div class="content">     
                	<?php //print_r($Post);?>           	                	
                	<?php foreach($Post as $l_post){?>
                	<form method="post" action="<?php echo base_url();?>admin/posts/update" class="stdform">                             
                	<div class="edit-main">                    	                    	                            
                    		<input type="hidden" value="<?php echo $l_post->id;?>" name="post_id" />
                            <p><label>Tiêu đề:</label></p>
                            <p><span class="field"><input type="text" class="longinput" name="txttitle" value="<?php echo $l_post->post_title;?>"></span></p>
                            </br>
                            <p><label>Tóm tắt:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"><?php echo $l_post->post_excerpt;?></textarea></span></p>
                            </br>
                            <p><label>Nội dung:</label></p>                            
                            <p><textarea name="txtcontent" id="editor_content"><?php echo $l_post->post_content;?></textarea></p>
                            </br>
                    </div>
                    <div class="edit-right">
                    <style type="text/css">
	h3 {
		margin: 0px;
		padding: 0px;	
	}

	.suggestionsBox {
		position: relative;
		left: 0px;
		margin: 10px 0px 0px 0px;
		width: 95%;
		background-color: #212427;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;	
		color: #fff;
	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>
                    	<div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Xuất bản</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                            	<p id="sl_butdanh_ajax">
                                    Tác giả:
                                    <input type="text" id="inputString" value="<?php echo $butdanh;?>" class="longinput validate[required]" name="txtnicename" onkeyup="lookup(this.value);" onblur="fill();" />
                                    <div class="suggestionsBox" id="suggestions" style="display: none;">
										<img src="<?php echo base_url();?>application/content-admin/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
										<div class="suggestionList" id="autoSuggestionsList">
											&nbsp;
										</div>
									</div>                                    
                                </p>
                                <div id="author_load_ajax">
                                    <p>Tác giả đã chọn: <label id="lblAuthor" style="color:red"><b><?php echo $butdanh;?></b></label></p>
                                    <input type="hidden" name="txtAuthor" id="txtAuthor" class="validate[required]" value="<?php echo $butdanh;?>">
                                </div>
                                <br/>
                                <p class="stdformbutton">
                                    <button class="submit radius2">Cập nhật</button>
                                    <input type="reset" value="Hủy" onclick="javascript:history.back(-1);" class="reset radius2">
                                </p>
                            </div><!--widgetcontent-->
                        </div>
                        <div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Danh mục bài viết</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                                <?php $flag=false;?>
                                <?php foreach($lstCategories as $Category){?>
                                	<?php $flag=false;?>
                                    <?php $term_id = $Category->term_id;?>
									<?php foreach($categories_of_post as $category_of_post){
										if($term_id == $category_of_post->term_taxonomy_id){$flag=true;}		
									}?>                                	
                                	<?php if($flag){?>
                                    	<input type="checkbox" checked="checked" value="<?php echo $Category->term_id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $Category->name;?>
                                        <br>                                    
                                    <?php }else{?>
                                    	<input type="checkbox" value="<?php echo $Category->term_id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $Category->name;?>
                                        <br>
                                    <?php }?>
                                <?php }?>                                 
                            </div>
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