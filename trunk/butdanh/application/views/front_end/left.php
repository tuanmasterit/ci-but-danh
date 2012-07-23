<div id="middle-left">
        	<div class="box-sidebar" id="box-butdanh">
                <h2>Bút danh</h2>
                <ul class="lst-bao">                	
                    <?php $lstbutdanh='';?>
                	<?php foreach($lstmagazine as $magazine){?>
                    <li>
                    	<a class="bullet" href="#"><?php echo $magazine->name;?></a> 
                        <?php $lstbutdanh = $this->User_model->get(0,-1,0,'butdanh',$magazine->term_id);?>                       
                    	<div class="lst-butdanh">
                        	<?php foreach($lstbutdanh as $butdanh){?>
                        		<a href="#"><?php echo $butdanh->user_nicename;?></a>,&nbsp;
							<?php }?>
                        </div>
                    </li>
                    <?php }?>                    	                    
                </ul>
            </div>
            <div class="ads-sidebar">
            	<embed width="300" height="250" allowscriptaccess="always" wmode="transparent" loop="true" play="true" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="link=http%3A//180.148.142.153/clk.aspx%3Flg%3D-1%26t%3D5%26i%3D0%26b%3D23823%26s%3D1%26r%3D0%26c%3D1%26p%3D13%26n%3D0%26l%3Dhttp%253A//www.trananh.vn/%26uc%3D24%26uv%3Dundefined%26ud%3D1280x800%26rd%3D0.668235768181294%26ui%3DVNEVPLELMMAK&amp;zoneid=LargeLogo5&amp;actionTag=http%3A//180.148.142.153/act.aspx%3Ft%3D5%26i%3D0%26b%3D23823%26s%3D1%26r%3D0%26c%3D1%26p%3D13%26n%3D0%26uc%3D24%26uv%3Dundefined%26ud%3D1280x800%26rd%3D0.4535174713453032" src="http://st.polyad.net/AdImages/2012/07/12/TranAnh_300x250_120712(3).swf">
            </div>
            
        </div><!-- end middle-left -->