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
                	<li><a href="<?php echo base_url();?>admin/topic/lists/topic">Tất cả chủ đề</a></li>
                    <li class="current"><a href="<?php echo base_url();?>admin/topic/add/topic">Cập nhật chủ đề</a></li>
                    <li><a href="<?php echo base_url();?>admin/topic/approval/topic">Chủ đề cần phê duyệt</a></li>
                   	<li><a href="<?php echo base_url();?>admin/topic/reject/topic">Chủ đề từ chối</a></li>
                </ul>
                <div class="content">
                
                	<?php foreach($lsttopic as $l_topic){ ?>                                   	
                	<form method="post" action="<?php echo base_url();?>admin/topic/update_topic/<?php echo $l_topic->id;?>" class="stdform">
                	<div class="edit-main">     
                    		<input type="hidden" name="hdfauthor" value="<?php echo $l_topic->post_author;?>"  />
                            <p><label>Tiêu đề:</label></p>

                            <p><span class="field"><input type="text" class="longinput" value="<?php echo htmlspecialchars(stripslashes($l_topic->post_title));?>" name="txttitle"></span></p>

                            </br>
                            <p><label>Đường dẫn:</label></p>
                            <p><span class="field"><input type="text" url="<?php echo base_url();?>" class="longinput" id="link_post"  name="txtlink" value="<?php echo urldecode($l_topic->guid);?>" onblur="check_link();" /></span>
                                <span id ="alert_link" class=""><img  src='<?php echo base_url();?>application/content/images/link_error.png' width="15" height="15" alt="" /></span>
                                <input type="hidden" id="link_confirm" value="<?php echo urldecode($l_topic->guid);?>" />
                                
                            </p>
                            </br>
                           
                            <!--
<p><label>Tóm t?t:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"><?php echo $l_topic->post_excerpt;?></textarea></span></p>
                            </br>
-->
                            <p><label>Nội dung:</label></p>                            
                            <p><textarea name="txtcontent" id="editor_content"><?php echo $l_topic->post_content;?></textarea></p>                            
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
                            <div class="title"><h2 class="general"><span>Chọn bài viết</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                            	<input type="hidden" id="hdurlajax" value="<?php echo base_url();?>/admin/posts/list_posts_ajax" />
                            	<p id="sl_butdanh_ajax">
                                    Tác giả:
                                    <input type="text" id="inputString" class="longinput validate[required]" name="txtnicename" onkeyup="lookupauthor(this.value);" onblur="fillauthor();" value="<?php echo $author;?>" />
                                    <div class="suggestionsBox" id="suggestions" style="display: none;">
										<img src="<?php echo base_url();?>application/content-admin/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
										<div class="suggestionList" id="autoSuggestionsList">
											&nbsp;
										</div>
									</div>                                    
                                <p/>
                                <div id="author_load_ajax">
                                    <p>Tác giả đã chọn: <label id="lblAuthor" style="color:red"><b><?php echo $author;?></b></label></p>
                                    <input type="hidden" name="txtAuthor" id="txtAuthor" class="validate[required]" value="<?php echo $author;?> ">
                                </div>
                                <br/>
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
<?php $this->load->view('back_end/footer');?>        
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
