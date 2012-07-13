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
        	<div class="box-center" id="thread">
        		<?php        		
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
            	<div id="comments">
            		
            	</div>
            	<div id="comment-post">
            		<p id="pShow" style="display: block;">
						<a class="SForm" onclick="ShowFormComment()">
							<img border="0" alt="Ý kiến của bạn" style="cursor:pointer" src="<?php echo base_url();?>application/content/images/Y-kien-cua-ban.gif">
						</a>
					</p>
            		<form id="frmComment" action=""  method="post">
	            		
						<div class="adword-hdf">&nbsp;</div> 
						<div class="adword adword-middle" style="padding-top:0px;">
							<div class="adword-nav2 fl" style="padding-top:10px; width:100%; background-color:#ffffff">
								<div style="padding-bottom:5px; overflow:hidden;">
									<div class="fl" style="width:60%;margin-left:5px">
										<input id="txtAddedBy" class="adword-textbox" type="text" onclick="if(this.value=='Họ tên'){this.value=''}" onblur="if(this.value==''){this.value='Họ tên'}" size="29" style="width:280px;" name="txtAddedBy" value="Họ tên">
									</div>
									<div class="fr" style="width:180px;margin-right:5px;">
										<input id="txtAddedByEmail" class="adword-textbox" type="text" onclick="if(this.value=='Email'){this.value=''}" onblur="if(this.value==''){this.value='Email'}"  size="29" style="width:172px" name="txtAddedByEmail" value="Email">
									</div>
								</div>
								<div style="padding-bottom:5px; overflow:hidden;;margin-left:5px">
									<div class="fl" style="width:60%">
										<input id="txtAddedTitle" class="adword-textbox" type="text" onclick="if(this.value=='Tiêu đề'){this.value=''}" onblur="if(this.value==''){this.value='Tiêu đề'}" size="29" style="width:280px;" name="txtAddedTitle" value="Tiêu đề">
									</div>
								</div>
								<div style="overflow:hidden;">
									<div class="fl" style="width:60%;margin-left:5px">
										<input class="SForm" type="submit" onclick="submitForm(); return false;" name="B1" value="Gửi bình luận">
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
            </div>           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
