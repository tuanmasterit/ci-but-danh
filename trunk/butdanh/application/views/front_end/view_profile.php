
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        
        <div id="middle-center">

            <!-- end menu-top -->
            <?php $this->load->view('front_end/menu-top');?>    
            <!-- menu-top -->
       	          
            <div id="box_content_profile">                	          
				               									 
				<div id="profile_title"><p>Hồ sơ bút danh</p></div>							  				 							
				<div class="profile_detail">
					<div id="avatar_profile">
						<img src="<?php echo base_url().'application/content/images/butdanh_logo.png'; ?>" alt=""  class="" width="114" height="114" />
                        <h2><?php echo $butdanh['user_nicename'];?></h2>
                    </div>   
                                                         
					<div id="profile_detail_more">									
						<p><span>Báo: <?php echo $butdanh['name'];?></span></p>
						
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
                        <div id="list-like">
                        
                        	<?php 
                        	if(count($list_like)>0)
                        	{
                        		echo "<p>".count($list_like)." người đã vote</p>";
                        	}                  	
                        	?>
                        </div>									
				    </div>  
		  	   </div>				 						
                        
				<div class="profile_info">
					<div id="profile_article" >				  
						<h2 ><b>Danh sách bài viết:</b></h2>				  				 						
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
    												<li><a class="ajaxmonth" month="<?php echo $i; ?>" id="<?php echo $author_id;?>" href="<?php echo base_url();?>profile/listpostbymonth/<?php echo $i;?>">Tháng <?php echo $i.'('.$numberPost.')';?></a></li>
                                                    <div class="resultmonth" id="resultpostmonth<?php echo $author_id.$i; ?>"></div>  
    										<?php }?>                                        
                                <?php }} ?>
    
                            </ul>                                     	                                                
                            <input type="hidden" id="urlLoading" value="<?php echo base_url(); ?>"/>                                                                         
                        </div>										 
					</div>
                
				
					<div id="profile_topic" >				  
						<h2><b>Chủ đề bình luận liên quan:</b></h2>				  				  
						<div class="">
							<ul>                      
                                <?php foreach($listTopicRelation as $topic){?>
                            	<li class="topic_relation"><a class="bullet2" href="<?php echo base_url().'chu-de/'.urldecode($topic->guid); ?>"><?php echo $topic->post_title; ?></a></li>
                                <?php } ?>
                            </ul>
						</div>				 
					</div>
                </div>
            </div><!-- end box-content -->                   
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
