
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
                    <a href="#">Đề xuất chủ đề</a>                            
                </div>
                
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
