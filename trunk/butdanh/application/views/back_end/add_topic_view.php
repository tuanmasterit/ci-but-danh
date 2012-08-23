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
                    <li class="current"><a href="<?php echo base_url();?>admin/topic/add/topic">Thêm mới chủ đề</a></li>                    
                   	<li><a href="<?php echo base_url();?>admin/topic/approval/topic">Chủ đề cần phê duyệt</a></li>
                   	<li><a href="<?php echo base_url();?>admin/topic/reject/topic">Chủ đề từ chối</a></li>
                </ul>
                <div class="content">                	
                	<form method="post" action="<?php echo base_url();?>admin/topic/save_topic" class="stdform">
                	<div class="edit-main">                    	                    	                            
                            <p><label>Tiêu đề:</label></p>
                            <p><span class="field"><input type="text" class="longinput" name="txttitle"></span></p>
                            <br/>
                            <!--
<p><label>Tóm t?t:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"></textarea></span></p>
                            <br/>
-->                                                                                                
                            <p><label>Nội dung:</label></p>                            
                            <p><textarea name="txtcontent" id="editor_content"></textarea></p>
                            <input type="hidden" value="<?php echo $post_type;?>" name="hdfposttype"  />
                            <br/>
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
                                    <input type="text" id="inputString" class="longinput validate[required]" name="txtnicename" onkeyup="lookupauthor(this.value);" onblur="fillauthor();" />
                                    <div class="suggestionsBox" id="suggestions" style="display: none;">
										<img src="<?php echo base_url();?>application/content-admin/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
										<div class="suggestionList" id="autoSuggestionsList">
											&nbsp;
										</div>
									</div>                                    
                                <p/>
                                <div id="author_load_ajax">
                                    <p>Tác giả đã chọn: <label id="lblAuthor" style="color:red"><b>Chưa chọn tác giả</b></label></p>
                                    <input type="hidden" name="txtAuthor" id="txtAuthor" class="validate[required]">
                                </div>
                                <br/>
                                <p>
                                    Danh mục bài viết:                                       
                                    <select name="cbxcategory" style="width:100%;" id="cbxcategory">
                                    	<option value="">-- Tất cả --</option>
                                    	<?php foreach($lstCategories as $category){?>                                        	
                                        	<option value="<?php echo $category->term_id;?>"><?php echo $category->name;?></option>
                                        <?php }?>
                                    </select>                                    
                                </p>
                                <br/>
                                <p>
                                    Bài viết:   
                                    <div id='divpostajax'>
                                    <select name="cbxbaiviet" style="width:100%;" id="cbxbaiviet">
                                    	<?php foreach($lstposts as $post){?>                                        	
                                        	<option value="<?php echo $post->id;?>"><?php echo $post->post_title;?></option>
                                        <?php }?>
                                    </select>
                                    </div>
                                <p/>
                                <br/>
                                <p class="stdformbutton">
                                    <button class="submit radius2">Xuất bản</button>
                                    <input type="reset" value="Hủy" class="reset radius2">
                                </p>
                            </div><!--widgetcontent-->
                        </div>                        
                        <div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Ảnh đại diện</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                                <input type="hidden" id="featured_image" name="hdffeatured_image" >
                                <img src="" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
                                <button id="imageUpload" class="submit radius2" >Chọn ảnh đại diện</button>
                            </div>
                        </div>
                    </div>
                    </form>              
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