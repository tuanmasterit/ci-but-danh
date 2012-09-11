<?php $this->load->view('front_end/header');?>

<script type="text/javascript">
      $(function() {
        var moveLeft = 20;
        var moveDown = 10;
        
        $('.link-popup').hover(function(e) {
        	$(this).next().show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');                      
        }, function() {
        	$(this).next().hide();
        });
        
        $('.link-popup').mousemove(function(e) {
        	$(this).next().css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
        
      });
    </script>
    <div id="middle">
    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">   
        	<?php $term_toptic=0;?>
            <?php $this->load->view('front_end/menu-top');?>
             	
            <div class="box-center" id="box-newtopic">            	
                <!-- <div id="div-topic-top">                	
                    <ul class="top-topic-top">                            
                        <li class="topic-list-top"><a href="<?php echo base_url();?>ajax/getLatestTopic" class="topic-a-top publish tab-active">Thảo luận mới</a></li>
                        <li class="topic-list-top"><a href="<?php echo base_url();?>ajax/getLatestTopic" class="topic-a-top pending">Thảo luận mới đề xuất</a></li>
                        <li class="topic-list-top"><a href="<?php echo base_url();?>ajax/getLatestTopic" class="topic-a-top reject">Thảo luận mới từ chối</a></li>
                    </ul>
                </div> -->
                <div class="box-content box-content-left">
                	<div id="div-topic-top"> 
                		<ul class="top-topic-top"> 
                			<li class="topic-list-top">                		                        
                        		<a>Thảo luận mới</a>   
                        	</li>
                    	</ul>                 	
                	</div>
                    <div class ="box1" id="scroll_box-top">
                        <ul>
                          <?php 
                              foreach ($lstLatesTopic as $new_topic)
                              {
                          ?>
                          <li>
                          <a class="link-popup" href="<?php echo base_url().'chu-de/'.urldecode($new_topic->guid);?>"><span class="item-toptic-new"><?php echo $new_topic->post_title;?></span></a>
                          <div class="pop-up">
					        <p><b><?php echo $new_topic->post_title;?></b></p>
					        
					        	<span style="font-weight: normal;"><?php 
					        		$content = $new_topic->post_content;
					        		if(strlen($content)>250)
					        		{
						        		$content = substr($content,0,250);
						        		echo $content.'...';
					        		}
					        		else 
					        		{
					        			echo $content;
					        		}
				        			?>
			        			</span><br />
					        	<span class="date-time"><?php echo date_format(date_create($new_topic->post_date),'d-m-Y H:i:s');?></span>
					        
					      </div>
                          </li>
                          <?php
                              }
                           ?>				    
                        </ul>
                    </div>                                       
                </div><!-- end box-content -->
                <div class="box-content content-right">
                	<div id="div-topic-top"> 
                		<ul class="top-topic-top"> 
                			<li class="topic-list-top">                		                        
                        		<a>Thảo luận mới đề xuất</a>   
                        	</li>
                    	</ul>                 	
                	</div>
                    <div class ="box1" id="scroll_box-top">
                        <ul>
                          <?php 
                              foreach ($lstPendingTopic as $pending_topic)
                              {
                          ?>
                          <li>
                          <a class="link-popup" href="<?php echo base_url().'chu-de/'.urldecode($pending_topic->guid);?>"><span class="item-toptic-new"><?php echo $pending_topic->post_title;?></span></a>
                          <div class="pop-up">
					        <p><b><?php echo $pending_topic->post_title;?></b></p>
					        
					        	<span style="font-weight: normal;"><?php 
					        		$content = $pending_topic->post_content;
					        		if(strlen($content)>250)
					        		{
						        		$content = substr($content,0,250);
						        		echo $content.'...';
					        		}
					        		else 
					        		{
					        			echo $content;
					        		}
				        			?>
			        			</span><br />
					        	<span class="date-time"><?php echo date_format(date_create($pending_topic->post_date),'d-m-Y H:i:s');?></span>
					        
					      </div>
                          </li>
                          <?php
                              }
                           ?>	                           			    
                        </ul>
                    </div>                                       
                </div><!-- end box-content -->
            </div><!-- end newtopic -->       
            <!-- binh luan moi nhat -->
            <div class="box-center" id="box-topichot">
                <ul class="top-topic-top">
                    <li >
                        <!-- <a class="tab-active" href=""  >Thảo luận mới nhất</a>-->
                    </li>
					<li>
						<div id="suggest_topic"><a href="<?php echo base_url().'post/suggest' ?>">Đề xuất thảo luận</a></div>
					</li>
                </ul>
                <div class="lst-butdanh1">
                    <?php                     	
                    	$num = 1;
                    	foreach ($lstLatestComment as $LatestComment){
                    ?>
                    <ul>
                        <li>
                            <div class="left-comment">                            	
                                <p><a href="<?php echo base_url().'chu-de/'.$LatestComment->guid;?>"><span class="item-toptic-new"><?php echo $LatestComment->post_title;?></span></a></p>
                                <p>Được đăng bởi <a href="<?php echo base_url().'member/profile/'.$LatestComment->post_author;?>"><b><?php echo $LatestComment->user_login;?></b></a>, <?php echo date_format(date_create($LatestComment->post_date),'d-m-Y');?></p>                                
                            </div>
                            <div class="right-comment">
                                <img src="<?php 
                                    if($this->User_model->get_usermeta($LatestComment->user_id,'avatar')=='')
                                    {
                                        echo base_url().'application/content/images/avatars/no_avatar.gif';
                                    }
                                    else {
                                        echo base_url().'application/content/images/avatars/'.$this->User_model->get_usermeta($LatestComment->post_author,'avatar');
                                    }
                                    ?>">
                                <p class="info-comment">
                                    <a href="<?php echo base_url().'member/profile/'.$LatestComment->user_id;?>"><?php echo $LatestComment->comment_author;?></a>
                                </p>
                                <p class="comment-date"><?php echo date_format(date_create($LatestComment->comment_date),'d-m-Y H:s:i ');?></p>
                                
                            </div>
                        </li>
                    </ul>
                    <?php 
                        $num++;
                        }
                    ?>
                    
                </div>  
            </div>    <!-- end binh luan moi nhat -->
        </div><!-- end middle-center -->
        
        
        
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
