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
                <div class="tableoptions">
                        <form name="frmfilter" method="post" action="<?php echo base_url();?>home/search/<?php echo $post_type;?>" >                        	                        	                            
                            <input type="text" class="txt" name="titleTopic" value="<?php echo $titleTopic; ?>" />
                            
                            <select class="category" name="slcategory">
                                <option value="">--- Tất cả ---</option>
                                <?php foreach($lstCategories as $l_category){?>                                 
                                	<?php if($l_category->term_id == $category){?>
                                    	<option selected="selected" value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }else{?>
                                    	<option value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }?>
                                <?php }?>
                            </select> &nbsp;                                                                                   
                            
                            <input type="submit" class="btn" value="Tìm kiếm"></button>
                        </form>
                </div><!--tableoptions-->      	
                <div class="box-content">
               	     <?php foreach($lstPosts as $Post){?>                            	
                            	                                	                        
                        <div>
        	            	
        	            	<div class="post-author">
        	            		<img src="<?php echo base_url().$this->Post_model->get_featured_image($Post->id);?>">
        	            		<div class="author-info">
        	            			
                                    <p><strong>Tiêu đề: <a href="<?php echo base_url().'chu-de/'.urldecode($Post->guid);?>"><?php echo $Post->post_title;?></a></strong></p>
                                    <br />
                                    <p>Người đề xuất:<a href="#"><span><?php echo $Post->user_nicename;?></span></a>
        	            			</p>
                                    <div class="date-title">
        	            		     <?php echo date_format(date_create($Post->post_date),'d-m-Y');?>
 	            	                </div>
        	            		</div>
        	            	</div>
        	            	
                    	</div>     
                                            
                     <?php }?>                           
                     <?php echo $list_link;?>                                  
                </div><!-- end box-content -->
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
