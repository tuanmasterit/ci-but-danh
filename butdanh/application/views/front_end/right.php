<div id="middle-right">
        	<div class="box-center" id="box-topichot">
        	<h3 >Top 10 thảo luận nóng</h3>
                <div class="content-box-right">
                	<input type="hidden" id="hdfCat" value="<?php echo $term_toptic;?>">
	                <ul id="topthang">
	                	<li ><a href="<?php echo base_url();?>ajax/getTopicTop" class="topic-a month active">Top tháng</a></li>
	                	<li ><a href="<?php echo base_url();?>ajax/getTopicTop" class="topic-a topic-b week">Top tuần</a></li>
	                </ul>
                </div>
                <ul id="list-topic-detail">	
                	<?php foreach($lstToppic_top as $topic){?>
                    	<li><a class="bullet1" href="<?php echo base_url();?>chu-de/<?php echo urldecode($topic->guid);?>"><?php echo $topic->post_title;?></a></li>
					<?php }?>                  
                </ul>
            </div>
            <div class="box-center" id="box-topichot">
            	<h3>Bút danh được yêu thích</h3>
                <div class="content-box-right">
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
            <div class="box-center" id="box-topichot">
                <h3>Bút danh có nhiều bài viết</h3>
                <div class="content-box-right">
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
            <div class="box-center" id="box-topichot">
                <h3>Bút danh mới nhất</h3>
                <div class="content-box-right">
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
            <div class="box-center">
                <h3>Comment mới nhất</h3>
                <div class="content-box-right">
                    <?php                     	
                    	$num = 1;
                    	foreach ($lstLatestComment as $LatestComment){
                    ?>
                    <ul>
                        <li><?php echo $num;?>.&nbsp;<a href="<?php echo base_url().'chu-de/'.$LatestComment->guid;?>">
                            <?php 
                            if(strlen($LatestComment->comment_agent)<60)
                            {
                                echo $LatestComment->comment_agent;
                            }
                            else
                            {
                                echo substr($LatestComment->comment_agent,0,57).'...';
                            }
                            ?></a></li>
                    </ul>
                    <?php 
                        $num++;
                        }
                    ?>
                </div>  
            </div>
           
        </div><!-- end middle-right -->