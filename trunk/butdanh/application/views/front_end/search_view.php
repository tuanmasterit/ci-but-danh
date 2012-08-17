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
                <div class="detailLeft">
        			<div class="navTagnSearch" >
        				<a class="tagHeader"><label>T</label>ìm kiếm</a>								
        			</div>
        			<div class="divSearch">
        				<form method="POST" name="frmSearch" id="frmSearch">
        					<div class="upSearch">
        						<div class="InputSearch">
        							<div class="inputS-left"></div>
        							<input onkeyup="javascript:KeyCode(event);" type="text" class="txtS" name="txtSearch" id="txtSearch" value="" />
        							<input onkeyup="javascript:KeyCode(event);" name="t1" style="display:none;">
        							<div class="inputS-right"></div>
        						</div>
                                <select class="InputSearch1" name="slcategory">
                                <option value="">--- Tất cả ---</option>
                                <?php foreach($lstCategories as $l_category){?>                                 
                                	<?php if($l_category->term_id == $category){?>
                                    	<option selected="selected" value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }else{?>
                                    	<option value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }?>
                                <?php }?>
                                </select>
        						<input type="button" class="bttSearch" value="Tìm kiếm" onclick='doSubmit();'/>
        						<input type="hidden" name="searchAction" id="searchAction" value="0" style="float:left;">
        					</div>
        				</form>
        				
        						<script language="JavaScript">
        							document.getElementById("txtSearch").value = "ng";
        						</script>
        						
        				<div class="analyticResult">
        					
        							Đang hiển thị <label>10</label> kết quả trong tổng số <label>42</label> kết quả tìm kiếm cho "<a href="#" class="aHotWord">ng</a>"
        						
        				</div>
        				
        			</div>
        			<div class="wrapSearch" id="wrapSearch">
        				
        					<ul class="ulTag">
        					
        					
        					
        						<li>
        							<div class="divTagLeft">
        								<a href="/tin-tuc/showbiz-viet/2012/06/la-thanh-huyen-tuoi-tan-ben-nguoi-yeu-mai-phuong-thuy-203147/" class="img100">
        									<img src='http://localhost/butdanh/application/content/images/SuggestTopic/thumbs/Desert3.jpg' alt=''>
        									<div class="frame100"></div>
        								</a>
        							</div>
        							<div class="divTagRight">
        								<h2 class="tagTitle">
        									<a href="/tin-tuc/showbiz-viet/2012/06/la-thanh-huyen-tuoi-tan-ben-nguoi-yeu-mai-phuong-thuy-203147/" class="aTitleTag">Lã Thanh Huyền tươi tắn bên người yêu Mai Phương Thúy</a>
        								</h2>
        								<h2 class="tagLead">
        									Diễn viên 'Blog nàng dâu' vui vẻ tạo dáng bên doanh nhân Benny Ng khi cả hai có dịp gặp gỡ trong một event.
        										<img class="imgHTicon" src="/Images/icon/general_photo.gif" alt="">
        									
        								</h2>
        								
        							</div>
        						</li>
                           </ul>
                        </div>  
                        </div>      
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
                            
                            <input type="submit" class="bttSearch" value="Tìm kiếm"></button>
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
