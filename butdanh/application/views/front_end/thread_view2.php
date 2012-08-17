<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckfinder/ckfinder.js"></script>
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
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
          
        </div><!-- end menu-top -->        	
        	<div id="postlist" class="postlist restrain">
				<div class="forumbitBody">
					<input type="hidden" id="hdfCount" value="<?php echo count($lstComment);?>">
					<input id="post_id" type="hidden" name="post_id" value="<?php echo $post_id;?>">
					<input type="hidden" id="hdfurl" value="<?php echo base_url();?>/comments/add">
					<ul id="posts" class="posts">
					<?php                	
	        		foreach ($thread as $thr)
	        		{
	        		  
	        		?>
						<li id="thread-li" class="postbit postbitim postcontainer old">
							<div class="postdetails_noavatar">
								<div class="posthead">
									<span class="postdate old">
										<span class="date">
											<?php echo date_format(date_create($thr->post_date),'d-m-Y');?>
											<span class="time2"><?php echo date_format(date_create($thr->post_date),'H:s:i');?></span>
										</span>
									</span>
									<span class="nodecontrols">
										<span class="nodecontrols">
											<a class="postcounter" href="">#1</a>
											<a name="1"></a>
										</span>
									</span>
								</div>
								<div class="userinfo">
									<div class="contact">
										<a class="postuseravatarlink" title="<?php echo $thr->user_nicename;?> " href="<?php echo base_url().'member/profile/'.$thr->post_author;?>" rel="nofollow">
											<img alt="<?php echo $thr->user_nicename;?>'s Avatar" 
												 src="<?php 
												 	$avatar = $this->User_model->get_usermeta($thr->post_author,'avatar');
												 	if($avatar=='')
												 	{
												 		echo base_url().'application/content/images/no_avatar.gif';
												 	}
												 	else 
												 	{
												 		echo base_url().'application/content/images/avatars/'.$avatar;
												 	}
												 	?>" 
											 	 title="<?php echo $thr->user_nicename;?>'s Avatar">
										</a>
										<div class="username_container">
											<div class="popupmenu memberaction">
												<a class="username offline popupctrl" title="<?php echo $thr->user_nicename;?>" href="<?php echo base_url().'member/profile/'.$thr->post_author;?>" rel="nofollow">
												<strong>Thành viên:</strong><br/>
												<strong><?php echo $thr->user_nicename;?></strong>
												</a>												
											</div>																						
											<div class="imlinks"> </div>											
										</div>
									</div>
									<div class="userinfo_extra">
										<dl class="userstats">
											<dt>Tham gia</dt>
											<dd><?php echo date_format(date_create($thr->user_registered),'d-m-Y');?></dd>
											<dt>Bài viết</dt>
											<dd><?php $lstPost = $this->Post_model->get_post_by_month($thr->post_author); echo count($lstPost);?></dd>
											<dt>Cảm ơn</dt>
											<dd><?php $list_thanks_all = $this->User_model->list_thanks($thr->post_author,0); echo count($list_thanks_all);?></dd>											
										</dl>
									</div>
								</div>	
							</div>
							<div class="postbody">
								<div class="postrow">
									<h2 class="posttitle icon">
										<img alt="Post" src="<?php echo base_url();?>application/content/images/icon1.png" title="Post">
										<?php echo $thr->post_title;?>
									</h2>									
									<div class="postcontent restore">
										<?php echo $thr->post_content;?> 
									</div>									
								</div>
							</div>
							<?php 
							if($check_login)
							{
							?>
							<div class="postfoot">
								<div class="textcontrols floatcontainer">
									<span class="postcontrols">
										 <img style="display:none" src="<?php echo base_url();?>application/content/images/progress.gif" alt=""> 
										 <a class="quickreply" href="" rel="nofollow" title="Trả Lời Nhanh">
										 	<img title="Trả Lời Nhanh" id="replyimg_13234602" src="<?php echo base_url();?>application/content/images/clear.gif" alt="Trả Lời Nhanh"> Trả lời
									 	</a> 
									 	<span class="seperator">&nbsp;</span> 
									 	<a id="qrwq_13234602" class="newreply" href="" rel="nofollow" title="Trả Lời Với Trích Dẫn">
									 		<img title="Trả Lời Với Trích Dẫn" id="quoteimg_13234602" src="<?php echo base_url();?>application/content/images/clear.gif" alt="Trả Lời Với Trích Dẫn">  Trả Lời Với Trích Dẫn
							 			</a> 
							 			<?php 
					                    	if(($check_login)&&($check_thanks==false))
					                    	{                    	
					                    ?>
							 			<span class="seperator">&nbsp;</span> 							 			
							 			<a class="multiquote link-thanks" threads_id="<?php echo $thr->id;?>" href="<?php echo base_url();?>like/add_thanks" rel="nofollow"  id="<?php echo $author_id;?>" title="Thanks This Message">
							 				&nbsp;
						 				</a> 
						 				<?php }?>
									</span>									
								</div>
							</div>
							<?php }?>
						</li>
						<li class="comment-form">
							<form id="formID" class="vbform" method="post" name="quick_reply">
								<div class="fullwidth">
									<h3 id="quickreply_title" class="blockhead">
										<img style="float:left;padding-right:10px" alt="Trả lời nhanh" src="<?php echo base_url();?>application/content/images/reply_40b.png" title="Trả lời nhanh">
										Trả lời nhanh										
									</h3>
								</div>
								<div class="wysiwyg_block">
									<div class="blockbody formcontrols">
										<div class="blockrow">
											<label class="full" for="title">Tiêu đề:</label>
											<input id="title"  class="primary textbox full" type="text" title="nếu muốn" tabindex="1" maxlength="200" value="" name="title">											
										</div>
										<div class="blockrow">
											<textarea id="editor_content0" name="txtcontent" class="editor_content">
												
											</textarea>
										</div>
									</div>
									<div class="blockfoot actionbuttons">
										<div class="group">											
											<input id="qr_submit qr_submit" class="button qr_submit" type="submit" tabindex="1" name="sbutton" title="Gửi trả lời" accesskey="s" value="Gửi Trả Lời">											
											<input id="qr_cancelbutton" class="button qr_cancelbutton" type="reset"  tabindex="4" name="cancel" title="Hủy bỏ" accesskey="c" value="Hủy bỏ" style="">
										</div>
									</div>
								</div>
							</form>
						</li>
						<li>
							<ul class="box-social-network">
			                    <li><div class="fb-like" data-href="http://butdanh.com/chu-de/<?php echo urldecode($thr->guid); ?>" data-send="true" data-layout="button_count" data-width="100" data-show-faces="true"></div></li> 
			                    <li><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://butdanh.com/chu-de/<?php echo urldecode($thr->guid); ?>" data-text="Bút danh" data-dnt="true">Tweet</a></li>                    
			                    <li><div class="g-plus" data-action="share" data-annotation="bubble" data-href="http://butdanh.com/chu-de/<?php echo urldecode($thr->guid); ?>"></div></li>		                    
		                	</ul>
						</li>
						<li id="post_thanks_box_13234602" class="postbit postbitim">
							<div class="postbody">
								<div class="postrow">
									<h2 class="posttitle"> Có <span id="totalThanks" style="color:red;"><?php  $total_thanks = count($list_thanks); echo $total_thanks;?></span> thành viên cảm ơn <span style="color:red;"><?php echo $thr->user_nicename;?></span> cho bài viết này: </h2>
									<div class="content">
										<div id="post_thanks_bit_13234602">
											<blockquote class="postcontent restore" id="list-user-thanks">
											<?php      
					                            $i = 0;                           
					                            foreach( $list_thanks as $thanks){
					                                $i++;
					                                if ($i!=$total_thanks)
					                                 {        
					                        ?>
												<a rel="nofollow" href='<?php echo base_url()."member/profile/".$thanks->meta_value;?>'><?php $name =  $this->User_model->getById($thanks->meta_value); echo $name['user_nicename'];?> &nbsp;</a> ,												
 											<?php } else 
				                                  {                             
				                            ?>
 												<a rel="nofollow" href='<?php echo base_url()."member/profile/".$thanks->meta_value;?>'><?php $name =  $this->User_model->getById($thanks->meta_value); echo $name['user_nicename']?></a> 												
 											<?php }}?>
											</blockquote>
										</div>
									</div>
								</div>
							</div>
							
						</li>
						<?php }?>
						<?php 
	            			$i=2;		            			
	            			foreach ($lstComment as $Comment)
	            			{
	            		?>
						<li id="post_13234602" class="postbit postbitim postcontainer old">
							<div class="postdetails_noavatar">
								<div class="posthead">
									<span class="postdate old">
										<span class="date">
											<?php echo date_format(date_create($Comment->comment_date),'d-m-Y');?>
											
											<span class="time2"><?php echo date_format(date_create($Comment->comment_date),'H:s:i');?></span>
										</span>
									</span>
									<span class="nodecontrols">
										<span class="nodecontrols">
											<a class="postcounter" href="#">#<?php echo $i;?></a>
											<a name="1"></a>
										</span>
									</span>
								</div>
								<div class="userinfo">
									<div class="contact">
										<a class="postuseravatarlink" title="<?php echo $Comment->comment_author;?>" href="<?php echo base_url().'member/profile/'.$Comment->id;?>" rel="nofollow">
											<img alt="<?php echo $Comment->comment_author;?>'s Avatar" 
												src="<?php 
													$avatar = $this->User_model->get_usermeta($Comment->id,'avatar');
												 	if($avatar=='')
												 	{
												 		echo base_url().'application/content/images/no_avatar.gif';
												 	}
												 	else 
												 	{
												 		echo base_url().'application/content/images/avatars/'.$avatar;
												 	}
												 	?>" 
												title="<?php echo $Comment->comment_author;?>'s Avatar">
										</a>
										<div class="username_container">
											<div id="yui-gen23" class="popupmenu memberaction">
												<a class="username offline popupctrl" title="<?php echo $Comment->comment_author;?>vẫn chưa có mặt trong diễn đàn" href="<?php echo base_url().'member/profile/'.$Comment->id;?>" rel="nofollow">
												<strong>Thành viên:</strong><br/>
												<strong><?php echo $Comment->comment_author;?></strong>
												</a>												
											</div>																						
											<div class="imlinks"> </div>											
										</div>
									</div>
									<div class="userinfo_extra">
										<dl class="userstats">
											<dt>Tham gia</dt>
											<dd><?php echo date_format(date_create($Comment->user_registered),'d-m-Y');?></dd>
											<dt>Bài viết</dt>
											<dd><?php $lstPost = $this->Post_model->get_post_by_month($Comment->id); echo count($lstPost);?></dd>
											<dt>Cảm ơn</dt>
											<dd><?php $list_thanks_all = $this->User_model->list_thanks($Comment->id,0); echo count($list_thanks_all);?></dd>
										</dl>
									</div>
								</div>	
							</div>
							<div class="postbody">
								<div class="postrow">
									<h2 class="posttitle icon">
										<img alt="Post" src="<?php echo base_url();?>application/content/images/icon1.png" title="Post">
										<?php echo $Comment->comment_agent;?>
									</h2>									
									<div class="postcontent restore">
										<?php echo $Comment->comment_content;?>												  
									</div>								
								</div>
							</div>
							<?php 
							if($check_login)
							{
							?>
							<div class="postfoot">
								<div class="textcontrols floatcontainer">
									<span class="postcontrols">
										 <img style="display:none" id="progress_13234602" src="<?php echo base_url();?>application/content/images/progress.gif" alt=""> 
										 <a id="qr_13234602" class="quickreply" href="" rel="nofollow" title="Trả Lời Nhanh">
										 	<img title="Trả Lời Nhanh" id="replyimg_13234602" src="<?php echo base_url();?>application/content/images/clear.gif" alt="Trả Lời Nhanh"> Trả lời
									 	</a> 
									 	<span class="seperator">&nbsp;</span> 
									 	<a id="qrwq_13234602" class="newreply" href="" rel="nofollow" title="Trả Lời Với Trích Dẫn">
									 		<img title="Trả Lời Với Trích Dẫn" id="quoteimg_13234602" src="<?php echo base_url();?>application/content/images/clear.gif" alt="Trả Lời Với Trích Dẫn">  Trả Lời Với Trích Dẫn
							 			</a> 							 			
									</span>								
								</div>
							</div>
							<?php }?>
						</li>
						<li class="comment-form">
							<form id="formID" class="vbform" method="post" name="quick_reply">
								<div class="fullwidth">
									<h3 id="quickreply_title" class="blockhead">
										<img style="float:left;padding-right:10px" alt="Trả lời nhanh" src="<?php echo base_url();?>application/content/images/reply_40b.png" title="Trả lời nhanh">
										Trả lời nhanh										
									</h3>
								</div>
								<div class="wysiwyg_block">
									<div class="blockbody formcontrols">
										<div class="blockrow">
											<label class="full" for="title">Tiêu đề:</label>
											<input id="title"  class="primary textbox full validate[required]" type="text" title="nếu muốn" tabindex="1" maxlength="200" value="" name="title">											
										</div>
										<div class="blockrow">
											<textarea id="editor_content<?php echo ($i-1);?>" class="editor_content" name="txtcontent">
												
											</textarea>
										</div>
									</div>
									<div class="blockfoot actionbuttons">
										<div class="group">											
											<input id="qr_submit" class="button qr_submit" type="submit"  tabindex="1" name="sbutton" title="Gửi trả lời" accesskey="s" value="Gửi Trả Lời">											
											<input id="qr_cancelbutton" class="button qr_cancelbutton" type="reset"  tabindex="4" name="cancel" title="Hủy bỏ" accesskey="c" value="Hủy bỏ" style="">
										</div>
									</div>
								</div>
							</form>
						</li>
						<?php $i++;}?>
						<li id="last-comment">
							
						</li>
					</ul>
				</div>
				<div class="bottomBar">					
					<?php echo $list_link;?>
				</div>
				<br>
				<div class="separator"></div>
				<div class="postlistfoot"> </div>				
			</div>          
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
<script type="text/javascript">
	var count = $('#hdfCount').attr('value');
	for(var i=0;i<=count;i++)
	{
		bindckeditor('editor_content'+i,'BasicToolbar');		
	}
</script>
