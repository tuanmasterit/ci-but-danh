
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        
        <div id="middle-center">
        <?php $this->load->view('front_end/menu-top');?>  
         <!-- menu-top -->
       	<div class="box-center" id="box-newtopic">            
            <div class="box-content">                	

            <div class="panel-panel panel-col-first">
					<div class="inside">
						<div class="panel-pane pane-block pane-usercp-page-title pane-left-top" >				 
							<h2 class="pane-title"><span>Bút danh: <?php echo $butdanh['user_nicename'];?></span></h2>				  				 
							<div class="pane-content">
								<div class="user-title-block profile clear-block">
									<div class="picture">
										<img src="<?php echo base_url().'application/content/images/butdanh_logo.png'; ?>" alt=""  class="imagecache imagecache-profile" width="60" height="60" /></div>                                        
									<div class="profile-about">
									
										<p>Đơn vị công tác: <b><span><?php echo $butdanh['name'];?></span></b></p>
										<div class="expertise">Lĩnh vực viết bài: <b><span><?php echo $butdanh['display_name'];?></span></b></div>
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
                                        		echo "<b>Có ".count($list_like)." người like bút danh này.</b>";
                                        	}                  	
                                        	?>
                                        </div>
									</div>
								</div>  
							</div>				 
						</div>
						<div class="panel-region-separator"></div>
						<div class="panel-pane pane-views pane-istar-latest-articles-by-author user-main-block" >
				  
							<h2 class="pane-title">Danh sách bài viết</h2>				  				 
							<div class="pane-content">
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
						</div>
						<div class="panel-region-separator"></div>
						<div class="panel-pane pane-views pane-istar-top-voting user-main-block" >				  
							<h2 class="pane-title">Chủ đề bình luận liên quan</h2>				  				  
							<div class="pane-content">
								<ul>                      
                                    <?php foreach($listTopicRelation as $topic){?>
                                	<li class="topic_relation"><a class="bullet2" href="<?php echo base_url().'chu-de/'.urldecode($topic->guid); ?>"><?php echo $topic->post_title; ?></a></li>
                                    <?php } ?>
                                </ul>
							</div>				 
						</div>
					</div>
				</div>  	
                
                </div><!-- end box-content -->
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
