<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">        	
        	<div class="box-center" id="box-newtopic">
            	<h2>
                	<span>Bút danh: <?php echo $butdanh['user_nicename'];?></span>
                </h2>
                <div class="box-content">
                	<p>Đơn vị công tác: <span><?php echo $butdanh['name'];?></span></p>
                    <div class="list-post">
                    	<h3>Danh sách các bài viết</h3>
                        <ul>
                        	<?php foreach($lstpostofbutdanh as $post){?>                            
                        		<li><a class="bullet" href="#"><?php echo $post->post_title;?><span class="post_date">(<?php echo $post->post_date;?>)</span></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="topic-relation">
                    	<h3>Chủ đề bình luận liên quan</h3>
                        <ul>
                        	<li><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="like" id="div-like">
                    <input type="hidden" id="hdflike" value="<?php echo $check_like;?>" />
                    <?php 
                    	if($check_login==false)
                    	{
                    ?>
                    	<a class="link-login-like" href="#"><img src="<?php echo base_url();?>application/content/images/icon-like.png" /></a>
                    <?php
                    	}
                    	else {
                    	if($check_like==false)
                    	{
                    ?>
                    <a class="link-like" id="<?php echo $butdanh['id'];?>" href="<?php echo base_url();?>like/add"><img src="<?php echo base_url();?>application/content/images/icon-like.png" /></a>
                    <?php 
                    	}else{                    	
                    ?>
                    <a class="link-dislike" id="<?php echo $butdanh['id'];?>" href="<?php echo base_url();?>like/dislike"><img src="<?php echo base_url();?>application/content/images/dislike-button.jpg" /></a>
                    <?php }}?>                    	
                    </div>
                </div><!-- end box-content -->
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
