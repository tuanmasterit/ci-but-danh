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
        	<div class="box-center" id="box-newtopic">
            	<h2>
                	<span>Chủ đề mới</span>                	
                    <div class="arrow">
                    	<a href="#" class="arrow-left">&nbsp;</a>
                        <a href="#" class="arrow-right">&nbsp;</a>
                    </div>
                </h2>
                <div id="div-topic-top">                	
	                <ul class="top-topic-top">
	                	<li class="topic-list-top"><a href="<?php echo base_url();?>ajax/getLatestTopic" class="topic-a-top publish active">Chủ đề mới lên trang</a></li>
	                	<li class="topic-list-top"><a href="<?php echo base_url();?>ajax/getLatestTopic" class="topic-a-top pending">Chủ đề mới đề xuất</a></li>
	                	<li class="topic-list-top"><a href="<?php echo base_url();?>ajax/getLatestTopic" class="topic-a-top reject">Chủ đề mới bị từ chối</a></li>
	                </ul>
                </div>
                <div class="box-content">
               		<div id="scroll_box-top">
					  <p style="margin-left:7px; color:#174775">
					    <?php 
					    	foreach ($lstLatesTopic as $new_topic)
					    	{
					    ?>
					    <a href="<?php echo base_url().'chu-de/'.urldecode($new_topic->guid);?>"><span class="item-toptic-new"><?php echo $new_topic->post_title;?></span></a><br/>
					    <?php
					     	}
					     ?>				    
					  </p>
					</div>                                       
                </div><!-- end box-content -->
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
