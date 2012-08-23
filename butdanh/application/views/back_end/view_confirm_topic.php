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
                    <li class="current"><a href="#">Phê Duyệt chủ đề</a></li>
                </ul>
                <div class="box-center box-thread" id="thread">
            		<?php        		
            		foreach($lsttopic as $l_topic)
            		{
            		?>
            		<div>
    	            	<div class="date-title">
    	            		<?php echo $l_topic->post_date;?>
    	            	</div>
    	            	<div class="post-author">
    	            		<img src="<?php echo base_url();?>/application/content/images/avatar1789_1.jpg">
    	            		<div class="author-info">
    	            			<p>Người đề xuất:<a href="#"><span><?php echo $l_topic->user_nicename;?></span></a>
    	            			</p>
    	            		</div>
    	            	</div>
    	            	<div class="content">
    	            		<div class="post-title">
    	            			<strong> <?php echo $l_topic->post_title;?></strong>
    	            		</div>
    	            		<br>
    	            		<div class="post-content">
    	            			<?php echo $l_topic->post_content;?>
    	            		</div>
    	            	</div>
                	</div>            	
                	<?php }?>
                    <form method="post" action="<?php echo base_url();?>admin/topic/confirm/topic/<?php echo $l_topic->id;?>">
                            <input type="submit" value="Duyệt" name="approval" />
                            <input type="submit" value="Từ chối" name="reject" />
                    </form>
                </div>
                            
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
