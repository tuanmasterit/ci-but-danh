
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">        	
        	<div class="box-center" id="box-newtopic">            	
                <div class="box-content">
              	     <h2><p> <?php echo $post_detail->post_title;?></p></h2>
                     <p><span><?php echo $post_detail->post_content ;?></span></p>                                      
                </div><!-- end box-content -->
                <h2>
                	<p> 
                        <span>Bút danh: <?php echo $butdanh['user_nicename'];?></span>
                        <span>Báo: <?php echo $butdanh['name'] ;?></span>
                        <span><a href="#">Đề xuất chủ đề</a></span>
                    </p>
                                       
                </h2>
                
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
