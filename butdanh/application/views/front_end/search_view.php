<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">  
            <!-- end menu-top -->
            <?php $this->load->view('front_end/menu-top');?>    
            <!-- menu-top -->   	
        	<div class="box-center" id="box-newtopic">  
                <div class="detailLeft">
        			<div class="navTagnSearch" >
        				<a class="tagHeader"><label>Tìm kiếm</label></a>								
        			</div>
        			<div class="divSearch">        				
                        <form name="frmfilter" method="post" action="<?php echo base_url();?>home/search/<?php echo $post_type;?>" >
        					<div class="upSearch">
        						<div class="InputSearch">
        							<div class="inputS-left"></div>
        						    <input type="text" class="txtS"  id="txtSearch" name="titleTopic" value="<?php echo $titleTopic; ?>"  />
        							
        						</div>
                                
                                <select class="InputSearch1" name="post_type">                                                                                              
                                	<?php if($post_type == 'topic'){?>
                                        <option value="all"> Tất cả</option>
                                    	<option selected="selected" value="topic"> Chủ đề</option>                                        
                                        <option value="post"> Bài viết</option>
                                        <option value="author">Bút danh</option>
                                    <?php }elseif ($post_type == 'post') {?>
                                        <option value="all"> Tất cả</option>
                                    	<option  value="topic">Chủ đề</option>
                                        <option selected="selected" value="post"> Bài viết</option>
                                        <option value="author">Bút danh</option>
                                    <?php }elseif($post_type == 'author') {?>
                                        <option value="all"> Tất cả</option>
                                    	<option  value="topic">Chủ đề</option>
                                        <option  value="post"> Bài viết</option>
                                        <option selected="selected" value="author">Bút danh</option>
                                    <?php }else{?>
                                    	<option selected="selected" value="all"> Tất cả</option>
                                    	<option  value="topic">Chủ đề</option>
                                        <option  value="post"> Bài viết</option>
                                        <option value="author">Bút danh</option>
                                    <?php }?>
                                
                                </select>
                                <select class="InputSearch1" name="slcategory">
                                <option value=""> Tất cả</option>
                                <?php foreach($lstCategories as $l_category){?>                                 
                                	<?php if($l_category->term_id == $category){?>
                                    	<option selected="selected" value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }else{?>
                                    	<option value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }?>
                                <?php }?>
                                </select>
        						<input type="submit" class="bttSearch" value="Tìm kiếm"/>
        						<input type="hidden" name="searchAction" id="searchAction" value="0" style="float:left;">
        					</div>
        				</form>  				
        			</div>  
        			<div class="analyticResult">        					
        				<?php 
        				if(count($lstAuthor)>0)
        				{
        				?>
        				Kết quả tìm kiếm cho bút danh:
        				<?php }?>		
        			</div> 
        			<div class="wrapSearch">
        				<ul class="ulTag">
        					<?php 
        						foreach ($lstAuthor as $author)
        						{
        					?>
        					<li>
        						<div class="divTagLeft">
        							<a class="img100" href="<?php echo base_url().'profile/'.$author->id;?>">
										<img alt="" src="<?php echo base_url().'application/content/images/butdanh_logo.png';?>">
										<div class="frame100"></div>
									</a>
        						</div>
        						<div class="divTagRight">
        							<h2 class="tagTitle">
        								Bút danh: <a href="<?php echo base_url().'profile/'.$author->id;?>"><b><?php echo $author->user_nicename;?></b></a>
        							</h2>
									<h2 class="tagLead">
										Báo: <b><?php echo $author->name;?></b>
									</h2>
        						</div>
        					</li>
        					<?php }?>
        				</ul>
        				<?php echo $list_link2;?>
        			</div>
        			<div class="analyticResult">        					
        				<!-- Đang hiển thị <label><?php echo $row; ?></label> kết quả chủ đề, bài viết trong tổng số <label><?php echo $total_rows; ?></label> kết quả tìm kiếm cho "<a href="#" class="aHotWord"><?php echo $titleTopic; ?></a>" -->
        				<?php 
        					if(count($lstPosts)>0)
        					{
        				?>
        				Kết quả tìm kiếm cho chủ đề, bài viết:
        				<?php }?>        						
        			</div>      			
        			<div class="wrapSearch" id="wrapSearch">        				                            				
        					<ul class="ulTag">
                                <?php foreach($lstPosts as $Post){?>          					        					        					
        					<li>
        						<div class="divTagLeft">
                                        <?php if($post_type == 'topic'){?>
        							    <a href="<?php echo base_url().'chu-de/'.urldecode($Post->guid);?>" class="img100">
                                        <?php }else{?>
                                            <a href="<?php echo base_url().'bai-viet/'.urldecode($Post->guid);?>" class="img100">
                                        <?php }?>
        								<img src="<?php 
                                            
                                                $avatar =  $this->Post_model->get_featured_image($Post->id);
                                                if ($avatar != '')
                                                {
                                                    $avatar = base_url().$avatar;
                                                }                                
                                                else
                                                {
                                                    $avatar = base_url().'application/content/images/noavatar.png';
                                                }                
                                                echo $avatar;
                                            ?>" alt=''>
        								<div class="frame100"></div>
        							</a>
        						</div>
        						<div class="divTagRight">
        							<h2 class="tagTitle">
                                            <?php if($post_type == 'topic'){?>
        							        <a href="<?php echo base_url().'chu-de/'.urldecode($Post->guid);?>" class="aTitleTag"><?php echo $Post->post_title;?></a>
                                            <?php }else{?>
                                                <a href="<?php echo base_url().'bai-viet/'.urldecode($Post->guid);?>" class="aTitleTag"><?php echo $Post->post_title;?></a>
                                            <?php }?>        									
        							</h2>
        							<h2 class="tagLead">
                                       <?php if($Post->post_type == 'topic'){?>
        								<p>Người đề xuất : <a href="<?php echo base_url().'member/profile/'.$Post->post_author;?>"><b><?php echo $Post->user_nicename;?></b></a>
                            			</p>
                                        <?php } else {?>
                                            <p>Bút danh : <a href="<?php echo base_url().'profile/'.$Post->post_author;?>"><b><?php echo $Post->user_nicename;?></b></a>
                            			</p>
                                        <?php } ?>    
                                            <div class="date-title">
                            		     <p>Ngày : <?php echo date_format(date_create($Post->post_date),'d-m-Y');?></p>
                     	                </div>									
        							</h2>        								
        						</div>
        					</li>
                                <?php }?>                           
                                <?php echo $list_link;?> 
                           </ul>
                        </div>  
                </div>  
                
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
