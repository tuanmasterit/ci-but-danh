<?php $this->load->view('front_end/header');?>
    <div id="middle">
    	<!--<div id="middle-top">
        	<div class="time">
            	<p>Thứ 2 ngày 6 tháng 4 năm 2012 12:19:10</p>
            </div>
            <div class="search">
            	<input type="text" id="txtsearch" class="txt" value="tìm kiếm chủ đề" />
                <a href="#" class="btn-search">Tìm</a>
            </div>
        </div>-->
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">   
        	<?php $term_toptic=0;?>
            <?php $this->load->view('front_end/menu-top');?>
             	
            <div class="box-center" id="box-newtopic">            	
                <div id="div-topic-top">                	
                    <ul class="top-topic-top">                            
                        <li class="topic-list-top"><a href="<?php echo base_url();?>ajax/getLatestTopic" class="topic-a-top publish tab-active">Thảo luận mới</a></li>
                        <li class="topic-list-top"><a href="<?php echo base_url();?>ajax/getLatestTopic" class="topic-a-top pending">Thảo luận mới đề xuất</a></li>
                        <!-- <li class="topic-list-top"><a href="<?php echo base_url();?>ajax/getLatestTopic" class="topic-a-top reject">Thảo luận mới từ chối</a></li>-->
                    </ul>
                </div>
                <div class="box-content">
                    <div class ="box1" id="scroll_box-top">
                        <ul>
                          <?php 
                              foreach ($lstLatesTopic as $new_topic)
                              {
                          ?>
                          <li>
                          <a href="<?php echo base_url().'chu-de/'.urldecode($new_topic->guid);?>"><span class="item-toptic-new"><?php echo $new_topic->post_title;?></span></a>&nbsp;<span class="date-time"><?php echo date_format(date_create($new_topic->post_date),'d-m-Y H:i:s');?></span><br>
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
