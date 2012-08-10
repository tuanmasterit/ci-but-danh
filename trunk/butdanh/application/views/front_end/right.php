<div id="middle-right">
        	<div class="box-sidebar" id="box-topichot">
                <h2>Thảo luận nóng</h2>
                <div id="div-topic">
                	<input type="hidden" id="hdfCat" value="<?php echo $term_toptic;?>">
	                <ul class="top-topic">
	                	<li class="topic-list"><a href="<?php echo base_url();?>ajax/getTopicTop" class="topic-a month active">Top tháng</a></li>
	                	<li class="topic-list"><a href="<?php echo base_url();?>ajax/getTopicTop" class="topic-a week">Top tuần</a></li>
	                </ul>
                </div>
                <ul id="list-topic-detail">	
                	<?php foreach($lstToppic_top as $topic){?>
                    	<li><a class="bullet" href="<?php echo base_url();?>chu-de/<?php echo urldecode($topic->guid);?>"><?php echo $topic->post_title;?></a></li>
					<?php }?>                  
                </ul>
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
            <div class="box-sidebar" id="box-topichot">
                <h2>Bút danh có nhiều bài viết</h2>                
                <p>&nbsp;</p>
                <div class="lst-butdanh">
                    <?php 
                    	
                    	$num = 1;
                    	foreach ($lstAuthorMonth as $AuthorMonth){
                    ?>
                    <ul>
                    	<li><?php echo $num;?>.&nbsp;<a href="<?php echo base_url().'profile/'.$AuthorMonth->post_author;?>"><b><?php echo $AuthorMonth->user_nicename;?></b> &nbsp;(<?php echo $TopLike->name;?>)</a></li>
                    </ul>
                    <?php 
                    	$num++;
                    	}
                    	?>
                </div>  
            </div>
            <div class="box-sidebar" id="box-topichot">
                <h2>Bút danh mới nhất</h2>                
                <p>&nbsp;</p>
                <div class="lst-butdanh">
                    <?php                     	
                    	$num = 1;
                    	foreach ($lstLatestAuthor as $LatestAuthor){
                    ?>
                    <ul>
                    	<li><?php echo $num;?>.&nbsp;<a href="<?php echo base_url().'profile/'.$LatestAuthor->id;?>"><b><?php echo $LatestAuthor->user_nicename;?></b> &nbsp;(<?php echo $LatestAuthor->name;?>)</a></li>
                    </ul>
                    <?php 
                    	$num++;
                    	}
                    	?>
                </div>  
            </div>
            <div class="box-sidebar" id="box-topichot">
                <h2>Bình luận mới nhất</h2>                
                <p>&nbsp;</p>
                <div class="lst-butdanh">
                    <?php                     	
                    	$num = 1;
                    	foreach ($lstLatestComment as $LatestComment){
                    ?>
                    <ul>
                    	<li><?php echo $num;?>.&nbsp;<?php echo $LatestComment->comment_agent;?></li>
                    </ul>
                    <?php 
                    	$num++;
                    	}
                    	?>
                </div>  
            </div>
            <div class="ads-sidebar">
                <?php 
                    $listAD = $this->Post_model->get(81); 
                    foreach($listAD as $ad)
                    {
                        echo $ad->post_content;
                    }                
                ?>      	
            </div>
        </div><!-- end middle-right -->