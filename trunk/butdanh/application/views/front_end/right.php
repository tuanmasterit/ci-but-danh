<div id="middle-right">
        	<div class="box-sidebar" id="box-topichot">
                <h2>Chủ đề nóng</h2>
                <div id="div-topic">
                	<input type="hidden" id="hdfCat" value="<?php echo $term_toptic;?>">
	                <ul class="top-topic">
	                	<li class="topic-list"><a href="<?php echo base_url();?>ajax/getTopicTop" class="topic-a month active">Top tháng</a></li>
	                	<li class="topic-list"><a href="<?php echo base_url();?>ajax/getTopicTop" class="topic-a week">Top tuần</a></li>
	                </ul>
                </div>
                <ul id="list-topic-detail">	
                	<?php foreach($lstToppic_top as $topic){?>
                    	<li><a class="bullet" href="<?php echo base_url();?>threads/<?php echo $topic->id;?>"><?php echo $topic->post_title;?></a></li>
					<?php }?>                  
                </ul>
            </div>
            <div class="box-sidebar" id="box-topichot">
                <h2>Chủ đề mới đề xuất</h2>
                <div id="scroll_box">
				  <p style="margin-left:7px; color:#174775">
				    <?php 
				    	foreach ($new_topics as $new_topic)
				    	{
				    ?>
				    <span class="item-toptic-new"><?php echo $new_topic->post_title;?></span><br/>
				    <?php
				     	}
				     ?>				    
				  </p>
				</div>
            </div>
            <div class="box-sidebar" id="box-topichot">
                <h2>Bút danh được yêu thích</h2>
                <p>&nbsp;</p>
                <div class="lst-butdanh">
                    <?php 
                    	$lstTopLike = $this->Like_model->listTopLike();
                    	$num = 1;
                    	foreach ($lstTopLike as $TopLike){
                    ?>
                    <ul>
                    	<li><?php echo $num;?>.&nbsp;<a href="<?php echo base_url().'profile/'.$TopLike->user_id;?>"><b><?php echo $TopLike->user_nicename;?></b> &nbsp;(<?php echo $TopLike->name;?>)</a></li>
                    </ul>
                    <?php 
                    	$num++;
                    	}
                    	?>
                </div>    
            </div>
            <div class="ads-sidebar">
            	<embed width="180" height="270" align="middle" quality="high" wmode="transparent" allowscriptaccess="always" flashvars="alink1=http%3A%2F%2Flogging.admicro.vn%2F_adc.html%3Fadm_domain%3Dhttp%253A%2F%2Fdantri.com.vn%2F%26adm_campaign%3D1024453%26adm_aditem%3D144550%26adm_zoneid%3D228%26adm_channelid%3D-1%26adm_rehttp%3Dhttp%253A%2F%2Fwww.pnj.com.vn%2Ftintuc-ruc-ro-don-he-cung-bo-suu-tap-colors-of-your-style-cua-pnjsilver-165-_-2012-07-02%26adm_random%3D0.3391509298396217&amp;atar1=_blank" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" alt="" src="http://admicro2.vcmedia.vn/images/pnj-silver-right-1-dan-tri-180x270-len-16-07.swf">
            </div>
            <div class="ads-sidebar">
            	<embed width="180" height="300" allowscriptaccess="always" wmode="transparent" loop="true" play="true" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="link=http%3A//180.148.142.153/clk.aspx%3Flg%3D-1%26t%3D5%26i%3D0%26b%3D31444%26s%3D1%26r%3D0%26c%3D0%26p%3D0%26n%3D0%26l%3Dhttp%253A//oisp.hcmut.edu.vn/tieu-diem/1933-ngay-hoi-thong-tin-bach-khoa-quoc-te-2012.html%26uc%3D24%26uv%3Dundefined%26ud%3D1280x800%26rd%3D0.9696493771068554%26ui%3DVNEVPLELMMAK&amp;zoneid=BasicLogo42&amp;actionTag=http%3A//180.148.142.153/act.aspx%3Ft%3D5%26i%3D0%26b%3D31444%26s%3D1%26r%3D0%26c%3D0%26p%3D0%26n%3D0%26uc%3D24%26uv%3Dundefined%26ud%3D1280x800%26rd%3D0.2520685743141353" src="http://st.polyad.net/AdImages/2012/07/16/DHbachKhoa_180x300.swf">
            </div>
        </div><!-- end middle-right -->