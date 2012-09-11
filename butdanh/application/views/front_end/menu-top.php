<!-- menu-top -->
            <div id="menu-top">
                <ul class="nav-top">
            	<li><a class="<?php if ($term_toptic==0) echo 'current_menutop';?>" href="<?php echo base_url();?>" ><img src="<?php echo base_url();?>application/content/images/icon-home.png" /></a></li>
				<li><a  class="<?php if ($term_toptic == 1 ) echo 'current_menutop';?> " href="<?php echo base_url();?>category/1">Chính trị</a></li>
                <li><a class="<?php if ($term_toptic == 5 ) echo 'current_menutop';?>" href="<?php echo base_url();?>category/5">Văn hóa</a></li>
                <li><a class="<?php if ($term_toptic == 3 ) echo 'current_menutop';?>" href="<?php echo base_url();?>category/3">Xã hội</a></li>
                <li><a class="<?php if ($term_toptic == 4 ) echo 'current_menutop';?>" href="<?php echo base_url();?>category/4">Kinh tế</a></li>
                <!--  <li><a class="<?php if ($term_toptic == 10 ) echo 'current_menutop';?>" href="<?php echo base_url();?>category/10">Khoa học</a></li>-->
                </ul>           
            </div><!-- end menu-top -->