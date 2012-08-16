<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckfinder/ckfinder.js"></script>
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">        	
        	<div id="postlist" class="postlist restrain">
				<div class="forumbitBody">
					<ol id="posts" class="posts" start="1">
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
									<div class="content">
										<div id="post_message_13234602">
											<blockquote class="postcontent restore">
												<?php echo $thr->post_content;?> 
											</blockquote>
										</div>
									</div>
									<blockquote class="signature restore">
										
									</blockquote>
								</div>
							</div>
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
							 			<span class="seperator">&nbsp;</span> 
							 			<a class="multiquote" href="" rel="nofollow" onclick="return false;" id="mq_13234602" title="Multi-Quote This Message">
							 				&nbsp;
						 				</a> 
									</span>									
								</div>
							</div>
						</li>
						<li>
							<form id="formID" class="vbform" onsubmit="return qr_prepare_submit(this, 10);" action="http://www.vn-zoom.com/newreply.php?do=postreply&t=2202838" method="post" name="quick_reply">
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
											<textarea id="editor_content" name="txtcontent">
												
											</textarea>
										</div>
									</div>
									<div class="blockfoot actionbuttons">
										<div class="group">											
											<input id="qr_submit" class="button" type="submit" onclick="clickedelm = this.value" tabindex="1" name="sbutton" title="(Alt + S)" accesskey="s" value="Gửi Trả Lời">											
											<input id="qr_cancelbutton" class="button" type="reset" onclick="qr_reset();" tabindex="4" name="cancel" title="(Alt + Shirt +C)" accesskey="c" value="Hủy bỏ" style="">
										</div>
									</div>
								</div>
							</form>
						</li>
						<li id="post_thanks_box_13234602" class="postbit postbitim">
							<div class="postbody">
								<div class="postrow">
									<h2 class="posttitle"> Có <span style="color:red;"><?php  $total_thanks = count($list_thanks); echo $total_thanks;?></span> thành viên cảm ơn <span style="color:red;"><?php echo $thr->user_nicename;?></span> cho bài viết này: </h2>
									<div class="content">
										<div id="post_thanks_bit_13234602">
											<blockquote class="postcontent restore">
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
												<a id="yui-gen25" class="username offline popupctrl" title="<?php echo $Comment->comment_author;?>vẫn chưa có mặt trong diễn đàn" href="http://www.vn-zoom.com/1166099-kissmy890/" rel="nofollow">
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
									<div class="content">
										<div id="post_message_13234602">
											<blockquote class="postcontent restore">
												<?php echo $Comment->comment_content;?>												  
											</blockquote>
										</div>
									</div>
									<blockquote class="signature restore">
										
									</blockquote>
								</div>
							</div>
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
							 			<span class="seperator">&nbsp;</span> 
							 			<a class="multiquote" href="" rel="nofollow" onclick="return false;" id="mq_13234602" title="Multi-Quote This Message">
							 				&nbsp;
						 				</a> 
									</span>								
								</div>
							</div>
						</li>
						<?php }?>
					</ol>
				</div>
				<div class="bottomBar">
					
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
	var editor = CKEDITOR.replace( 'editor_content',
	{			
		filebrowserBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=file',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=image',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=flash',
		filebrowserImageUploadUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=image',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=flash',
		filebrowserImageWindowWidth : '950',
		filebrowserImageWindowHeight : '490',
		filebrowserWindowWidth : '950',
		filebrowserWindowHeight : '490'
	});

</script>
