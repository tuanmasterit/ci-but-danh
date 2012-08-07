
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">        	
        	<div class="box-center" id="box-newtopic">
            	<h2>
                	<span>Bút danh: <?php echo $butdanh['user_nicename'];?></span>
                </h2>
                <div class="info-butdanh">
                    <p>Đơn vị công tác: <span><?php echo $butdanh['name'];?></span></p>
                    <p>Lĩnh vực bài viết: <span><?php echo $butdanh['display_name'];?></span></p>
                    <p>Danh sách bài viết:</p>
                </div>    
                <div class="box-content">                	
                	<div class="list-post">
                        <ul class="tab_month">
                            <?php								
                                $month = date("m");                                 
                                for($i=1;$i<=12;$i++){
                                    $numberPost = $this->Post_model->count_post_by_month($author_id,$i); 
									if( $numberPost > 0){
										if($i!=$month){    
										?>
												<li><a class="ajaxmonth" month="<?php echo $i; ?>"id="<?php echo $author_id;?>" href="<?php echo base_url();?>profile/listpostbymonth/<?php echo $i;?>">Tháng <?php echo $i.'('.$numberPost.')' ;?></a></li>
										        <div class="resultmonth" id="resultpostmonth<?php echo $author_id.$i; ?>"></div>  
										 <?php  } else { ?>
												<li><a class="ajaxmonth active" month="<?php echo $i; ?>" id="<?php echo $author_id;?>" href="<?php echo base_url();?>profile/listpostbymonth/<?php echo $i;?>">Tháng <?php echo $i.'('.$numberPost.')';?></a></li>
                                                <div class="resultmonth" id="resultpostmonth<?php echo $author_id.$i; ?>"></div>  
										<?php }?>                                        
                            <?php }} ?>
                        </ul>
                                         	                                                
                        <input type="hidden" id="urlLoading" value="<?php echo base_url(); ?>"/>                                                                         
                    </div>
                    <div class="topic-relation">
                    	<h3>Chủ đề bình luận liên quan</h3>
                        <ul>
                      
                            <?php foreach($listTopicRelation as $topic){?>
                        	<li><a class="bullet resultmonth" href="<?php echo base_url().'threads/'.$topic->id; ?>"><?php echo $topic->post_title; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <input type="hidden" id="hdflike" value="<?php echo $check_like;?>" />
                    <div class="like" id="div-like">
                    
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
                    <br/>
                    <div id="list-like">
                    
                    	<?php 
                    	if(count($list_like)>0)
                    	{
                    		echo "Có ".count($list_like)." người like bút danh này.";
                    	}                  	
                    	?>
                    </div>
                </div><!-- end box-content -->
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
