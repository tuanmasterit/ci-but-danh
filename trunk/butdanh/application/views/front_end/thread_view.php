
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">        	
        	<div class="box-center box-thread" id="thread">
        		<?php
                //print_r($thread);        		
        		foreach ($thread as $thr)
        		{
        		  
        		?>
        		<div>
	            	<div class="date-title">
	            		<?php echo $thr->post_date;?>
	            	</div>
	            	<div class="post-author">
	            		<img src="<?php echo base_url();?>/application/content/images/avatar1789_1.jpg">
	            		<div class="author-info">
	            			<p>Người đề xuất:<a href="#"><span><?php echo $thr->user_nicename;?></span></a>
	            			</p>
	            		</div>
	            	</div>
	            	<div class="content">
	            		<div class="post-title">
	            			<strong><?php echo $thr->post_title;?></strong>
	            		</div>
	            		<br>
	            		<div class="post-content">
	            			<?php echo $thr->post_content;?>
	            		</div>
	            	</div>
            	</div>            	
            	<?php }?>
                
                <ul class="box-social-network">
                    <li><div class="fb-like" data-href="http://butdanh.com/chu-de/<?php echo urldecode($thr->guid); ?>" data-send="true" data-layout="button_count" data-width="100" data-show-faces="true"></div></li> 
                    <li><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://butdanh.com/chu-de/<?php echo urldecode($thr->guid); ?>" data-text="Bút danh" data-dnt="true">Tweet</a></li>                    
                    <li><div class="g-plus" data-action="share" data-annotation="bubble" data-href="http://butdanh.com/chu-de/<?php echo urldecode($thr->guid); ?>"></div></li>
                                                                                                                                                      
                    
                </ul>
                
            	<div class="box-item" style="margin-top:10px;margin-bottom:5px; float: left;">                                    
            		<div class="othernews-header-fb">                    
						<div class="othernews-title fl" style="margin-left:18px; padding:0px 9px">
							<a id="aComment" name="aComment">
								Ý kiến bình luận
								<label style="font-weight:normal;" id="lblCountComment">( <?php echo count($lstComment);?> )</label>
							</a>
						</div>
					</div>
					<div id="divOutComment">
		            	<div id="DivShowComment">
		            		<?php 
		            			$i=0;		            			
		            			foreach ($lstComment as $Comment)
		            			{
		            		?>
		            		<div class="comment_ct_fb <?php if(($i%2==0)) {echo "cmg";} else {echo "cmw";}?>">
								<p class="Title"><?php echo $Comment->comment_agent;?></p>
								<p class="Normal"></p>
								<p class="Normal"><?php echo $Comment->comment_content;?></p>
								<p></p>
								<p class="Normal" style="margin-top:3px">
								<label class="Author"><?php echo $Comment->comment_author;?></label>
								<label class="CommSep">|</label>
								<label class="CommDate"><?php echo $Comment->comment_date;?></label>
								</p>
							</div>
							<?php
								$i++; 
		            			}
		            			?>							
							
	            			<div id="last-comment" class="comment_ct_fb <?php if(($i%2==0)) {echo "cmg";} else {echo "cmw";}?>">
								
							</div>
		            		
		            	</div>		            	
	            	</div>
            	</div>
                <?php if($this->session->userdata('username') != ''){?>
            	<div id="comment-post">
            		<p id="pShow" style="display: block;">
						<a class="SForm" onclick="ShowFormComment()">
							<img border="0" alt="Ý kiến của bạn" style="cursor:pointer" src="<?php echo base_url();?>application/content/images/Y-kien-cua-ban.gif">
						</a>
					</p>
            		<form id="frmComment" action="<?php echo base_url();?>/comments/add"  method="post">
	            		<input id="post_id" type="hidden" name="post_id" value="<?php echo $post_id;?>">
						<div class="adword-hdf">&nbsp;</div> 
						<div class="adword adword-middle" style="padding-top:0px;">
							<div class="adword-nav2 fl" style="padding-top:10px; width:100%; background-color:#ffffff">
								
								<div style="padding-bottom:5px; overflow:hidden;;margin-left:5px">
									<div class="fl" style="width:60%">
										<input id="txtAddedTitle" class="adword-textbox" type="text" onclick="if(this.value=='Tiêu đề'){this.value=''}" onblur="if(this.value==''){this.value='Tiêu đề'}" size="29" style="width:280px;" name="txtAddedTitle" value="Tiêu đề">
									</div>
									
								</div>
								<div style="overflow:hidden;">
									<div class="fl" style="width:60%;margin-left:5px">
										<input class="SForm" type="submit"  onclick="submitForm(); return false;" name="B1" value="Gửi bình luận">
										<input class="SForm" type="reset" onclick="InputDefault();" name="B2" value="Xoá trắng">
										<input class="SForm" type="button" onclick="ShowFormComment()" value="Đóng lại">									
									</div>
								</div>
							</div>
							<div class="adword-nav2 fl" style="padding-top:0px; width:100%">
								<textarea id="txtAddedContent" class="SForm" style="width:99%" onkeyup="initTyper(this)" cols="43" name="txtAddedContent" rows="10"></textarea>
							</div>
						</div>
						<div class="adword-ftf">&nbsp;</div>
					</form>           		
            	</div>
                <?php }?>                
            </div>           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
