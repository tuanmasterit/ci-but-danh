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
         <!-- menu-top -->
                <div id="menu-top">
        	<ul class="nav-top">
            	<li><a href="<?php echo base_url();?>" class="current">Trang chủ</a></li>
				<li><a href="<?php echo base_url();?>category/1">Chính trị</a></li>
                <li><a href="<?php echo base_url();?>category/5">Văn hóa</a></li>
                <li><a href="<?php echo base_url();?>category/3">Xã hội</a></li>
                <li><a href="<?php echo base_url();?>category/4">Kinh tế</a></li>
                <li><a href="<?php echo base_url();?>category/10">Khoa học</a></li>
            </ul>
            <div class="user">
            	<?php if($this->session->userdata('username') != ''){?>
                	<p class="display-user">Xin chào: <a href="<?php echo base_url().'member/profile/'.$this->session->userdata('user_id');?>"><?php echo $this->session->userdata('username');?></a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>home/logout">Thoát</a></p>
                <?php }else{?>
            		
            		
                  
                <?php }?>                
            </div>
        </div><!-- end menu-top -->
        	<div class="box-center" id="box-newtopic">
            	<h2>
                	<span><?php echo $category_name;?></span>
                    <div class="arrow">
                    	<a href="#" class="arrow-left">&nbsp;</a>
                        <a href="#" class="arrow-right">&nbsp;</a>
                    </div>
                </h2>
                <div class="box-content">
                	<?php foreach($lsttopic as $topic){?>
                    	<div class="topic-item">
                            <div class="topic">                        
                                <a href="<?php echo base_url();?>chu-de/<?php echo urldecode($topic->guid);?>"><img src="<?php echo $this->Post_model->get_featured_image($topic->id); ?>" /></a>
                                <a href="#"><h3><a href="<?php echo base_url();?>chu-de/<?php echo urldecode($topic->guid);?>"><?php echo $topic->post_title;?></a></h3></a>
                                <p><?php echo $topic->post_excerpt;?></p>
                            </div>
                            <div class="info">
                                <p>Bút danh:<a href="<?php echo base_url();?>author"> <span><?php echo $this->Post_model->get_author_name($topic->post_parent);?></span></a></p>
                                <p>Người đề xuất:<a href="#"> <span><?php echo $topic->user_nicename;?></span></a></p>
                                <!-- <p>Bình luận: <span>25</span></p>
                                <p>Xem: <span>25.000</span></p>
                                <div class="rate">
                                    <p>Đánh giá: </p>
                                    <ul>
                                        <li class="rated"><a href="#">&nbsp;</a></li>
                                        <li class="rated"><a href="#">&nbsp;</a></li>
                                        <li class="rated"><a href="#">&nbsp;</a></li>
                                        <li><a href="#">&nbsp;</a></li>
                                        <li><a href="#">&nbsp;</a></li>
                                    </ul>                            
                                </div> -->
                            </div>
                        </div>
                    <?php }?>                                        
                </div><!-- end box-content -->
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
