<div id="middle-left">

<!-- top left -->
		<div id="top-left">
			<div id="top-func">
				<p class="time">
                    <?php
						//$today =  mktime(date("h"),date("m"),0,date("m"),date("d")+1,date("Y"));
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$ngay=date("d");
						$thang=date("m");
						$nam=date("Y");
						
						$jd=cal_to_jd(CAL_GREGORIAN,$thang,$ngay,$nam);
						$day=jddayofweek($jd,0);
						switch($day)
						{
						case 0:
							$thu="Chủ Nhật";
						break;
						case 1:
							$thu="Thứ Hai";
						break;
						case 2:
							$thu="Thứ Ba";
						break;
						case 3:
							$thu="Thứ Tư";
						break;
						case 4:
							$thu="Thứ Năm";
						break;
						case 5:
							$thu="Thứ Sáu";
						break;
						case 6:
							$thu="Thứ 7";
						break;
						//Vì mod bằng 0
						}
						$gio=date("H");
						$phut=date("i");
						$xuat_thu="$thu, $ngay / $thang / $nam";
						echo $xuat_thu;
					?> 
                    
                </p>
                <div id="top-link">
                	<ul>
                		<li><a href="<?php echo base_url().'home/page/1137'?>">Giới thiệu</a>&nbsp;/&nbsp;</li>
                		<li><a href="<?php echo base_url().'home/contact'?>">Liên hệ</a></li>
                	</ul>
                </div>
			</div>
            <div id="logo">
            	<a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>application/content/images/logo.png"></a>
            </div>                        
         </div>
<!-- end top left -->
<!-- form login -->
 				<div class="user">
            	<?php if($this->session->userdata('username') != ''){?>
                	<p class="display-user">Xin chào: <a href="<?php echo base_url().'member/profile/'.$this->session->userdata('user_id');?>"><span class="span_user"><?php echo $this->session->userdata('username');?></span></a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>home/logout">Thoát</a></p>
                <?php }else{?>
            		
            		  <div class="frm-login">
                		<form id="login" action="<?php echo base_url();?>home/authentication" method="post">                        
                            <div class="frm-left">
                            <p>
                                <input type="text" id="username" name="txtuser" class="txt" />
                            </p>
                            <p>
                                <input type="password" id="password" name="txtpassword" class="txt" />
                            </p>
                            <p><input type="checkbox" value="" name="rememberme">Ghi nhớ&nbsp;|&nbsp;<a href="#">Quên mật khẩu</a></p>
                            </div>
                       		 <div class="frm-right">
                            <p>
                                <input type="submit" class="btnlogin" value="Đăng nhập"  />
                            </p>
                            <p>
                            	<a   id="link-login" href="<?php echo base_url();?>home/register">Đăng ký </a>
                            </p>
                            </div>
                         </form>
                    </div>
                  
<!-- end form login -->
                  
                <?php }?>                
            </div>
		 
<!-- search form  -->
			<form  class="frm-search" name="frmsearch" method="post" action="<?php echo base_url().'home/search'; ?>">
                
                    <input type="text" class="txt" value="" placeholder="Search" name="titleTopic">
                   
                    	<input type="submit" class="btn-search" value="" name="submit">
             
            </form>
<!--  end form search -->

			<div class="box-sidebar" id="box-tag">
				<h3 class="tamgiac arrow-up"><a class="bullet" >Bút danh được tìm kiếm nhiều nhất</a></h3>
				<div id="suggestButdanh0" class="lst-butdanh" style="display: block;">
					<?php 
						$lstTag = $this->Author_model->getTopTag(40,0);						
						$top = 0;
						if(count($lstTag)>0)
						{
							$top = $lstTag[0]->num_tag;							
						}
						$i=1;
						foreach ($lstTag as $tag)
						{
					?>
						<a <?php 
						if($tag->num_tag > ($top*0.8)) 
						{
							echo "style='font-size:12px;font-weight: bold;'";
						}
						elseif ($tag->num_tag > ($top*0.6))
						{
							echo "style='font-size:11px;font-weight: bold;'";
						}
						?> href="<?php echo base_url().'profile/'.$tag->user_id?>"><?php echo $tag->user_nicename;?></a><?php if($i!=count($lstTag)) echo ",";?>
					<?php $i++;}?>					
				</div>
			</div>
        	<div class="box-sidebar" id="box-butdanh">
                <ul class="lst-bao">                	
                    <?php 
                    	$lstbutdanh='';
                    	$num_bao=count($lstmagazine);
                    	$jj=0;
                    ?>
                	<?php foreach($lstmagazine as $magazine){
                		?>
                	
                    <li class="name-butdanh">
                    	<h3 class="tamgiac arrow-up" id="btSuggestBao<?php echo $jj;?>"><a class="bullet" ><?php echo $magazine->name;?></a></h3> 
                        <?php $lstbutdanh = $this->User_model->get_butdanh_order($magazine->term_id);?>                       
                    	<div class="lst-butdanh" id="suggestButdanh<?php echo $jj;?>">
                        	<?php 
                        	$count1=count($lstbutdanh);
                        	$i=0;
                        	foreach($lstbutdanh as $butdanh)
                        	{
                        		$i++;
                        		if($i==$count1)
                        		{?>
                        		<a href="<?php echo base_url();?>profile/<?php echo $butdanh->id;?>"><?php echo $butdanh->user_nicename;?></a>&nbsp;
          						<?php continue;}?>
                        		<a href="<?php echo base_url();?>profile/<?php echo $butdanh->id;?>"><?php echo $butdanh->user_nicename;?></a>,&nbsp;
							<?php }?>
                        </div>
                    </li>
                    
                    <?php $jj++;  }?>                    	                    
                </ul>
            </div>            
            
        </div><!-- end middle-left -->