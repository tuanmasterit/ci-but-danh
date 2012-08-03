<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckfinder/ckfinder.js"></script>
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">        	
        	<div class="box-center" id="box-newtopic">
                <h2><p> <?php echo $post_detail->post_title;?></p></h2>            	
                <div class="box-content">              	     
                     <p><?php echo $post_detail->post_content ;?></p>                                      
                </div><!-- end box-content -->
                <div class="meta_post">
                	<p>Bút danh: <span><?php echo $butdanh['user_nicename'];?></span></p>
                    <p>Đơn vị công tác: <span><?php echo $butdanh['name'] ;?></span></p>
                    <button id="btSuggestTopic">Hiện đề xuất chủ đề</button>                            
                </div>
                <div class="suggestTopic">                	
                	<form method="post" action="<?php echo base_url().'post/suggest/'.$post_id;?>" class="stdform" accept-charset="utf-8" enctype="multipart/form-data">        
                    	<div class="edit-main">   
                                <p><label>Tiêu đề:</label></p>
                                <p><span class="field"><input type="text" class="longinput" name="txttitle"></span></p>
                                <br/>                                
                                <p><label>Ảnh đại diện:</label></p>
                                <p><span class="field"><input type="file" name="userfile" size="30"  /></span></p>
                                <br/>                            
                                <p><label>Tóm tắt:</label></p>                            
                                <p><span class="field"><textarea name="txtexcerpt"></textarea></span></p>
                                <br/>
                                <p><label>Nội dung:</label></p>                            
                                <p><textarea name="txtcontent" id="editor_content"></textarea></p>                                
                                <br/>
                                <input type="submit" name="submit" value="Đề xuất"/>
                        </div>                    
                    </form>              
            </div><!--suggusetTopic-->
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
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