
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        
        <div id="middle-center">        	
            <!-- menu-top -->
            <?php $this->load->view('front_end/menu-top');?>
            <!-- end menu-top -->
        	<div id="box_post_detail">
                <h2 id="title_post"><?php echo $post_detail->post_title;?></h2>            	
                <div id="post_content" class="fon">              	     
                     <p><?php echo $post_detail->post_content ;?></p>                                      
                </div><!-- end box-content -->
                <div id="post_meta">
                	<p>Bút danh: <span><a href="<?php echo base_url().'profile/'.$butdanh['id']; ?>"><?php echo $butdanh['user_nicename'];?></a></span></p>
                    <p>Đơn vị công tác: <span><?php echo $butdanh['name'] ;?></span></p>                                                                 
                </div>                                
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
<script type="text/javascript">
	bindckeditor('editor_content','BasicToolbar');
</script>