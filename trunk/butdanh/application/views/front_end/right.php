<div id="middle-right">        	
			<div class="box-center" id="box-topichot">			
				<h3>Top thảo luận nóng</h3>
                <div class="content-box-right tap-right">
                	<input type="hidden" id="hdfCat" value="<?php echo $term_toptic;?>">
	                <!-- <ul id="topthang">
	                	<li ><a href="<?php echo base_url();?>ajax/getTopicTop" class="topic-a month active">Top tháng</a></li>
	                	<li ><a href="<?php echo base_url();?>ajax/getTopicTop" class="topic-a topic-b week">Top tuần</a></li>
	                </ul>-->
                </div>
                <ul id="list-topic-detail">	
                	<?php foreach($lstToppic_top as $topic){?>
                    	<li><a class="bullet1" href="<?php echo base_url();?>chu-de/<?php echo urldecode($topic->guid);?>"><?php echo $topic->post_title;?></a></li>
					<?php }?>                  
                </ul>
            </div>            
            <div class="box-center" id="box-topichot">
            	<h3>Top bút danh Trách nhiệm</h3>
                <div class="content-box-right">
                    <?php 
                    	$lstTopLike = $this->Like_model->listTopLike();
                    	$num = 1;
                    	foreach ($lstTopLike as $TopLike){
                    ?>
                    <ul>
                    	<li><a href="<?php echo base_url().'profile/'.$TopLike->user_id;?>"><?php echo $num;?>.&nbsp;<b><?php echo $TopLike->user_nicename;?></b> &nbsp;(<?php echo $TopLike->name;?>)</a></li>
                    </ul>
                    <?php 
                    	$num++;
                    	}
                    	?>
                </div>    
            </div>
            <div class="box-center" id="box-topichot">
                <h3>Top bút danh viết nhiều</h3>
                <div class="content-box-right">
                    <?php 
                    	
                    	$num = 1;
                    	foreach ($lstAuthorMonth as $AuthorMonth){
                    ?>
                    <ul>
                    	<li><a href="<?php echo base_url().'profile/'.$AuthorMonth->post_author;?>"><?php echo $num;?>.&nbsp;<b><?php echo $AuthorMonth->user_nicename;?></b> &nbsp;(<?php echo $TopLike->name;?>)</a></li>
                    </ul>
                    <?php 
                    	$num++;
                    	}
                    	?>
                </div>  
            </div>
            <div class="box-center" id="box-topichot">
                <h3>Bút danh được thảo luận nhiều</h3>
                <div class="content-box-right">
                    <?php 
                    	
                    	$lstTopComment = $this->Comment_model->getTopAuthorComment();
                    	$num = 1;
                    	foreach ($lstTopComment as $TopComment){
                    ?>
                    <ul>
                    	<li><a href="<?php echo base_url().'profile/'.$TopComment->post_parent;?>"><?php echo $num;?>.&nbsp;<b><?php echo $TopComment->user_nicename;?></b> &nbsp;(<?php echo $TopComment->name;?>)</a></li>
                    </ul>
                    <?php 
                    	$num++;
                    	}
                    	?>
                </div>  
            </div>
            <div class="box-center" id="box-topichot">
                <h3>Bút danh mới</h3>
                <div class="content-box-right">
                    <?php                     	
                    	$num = 1;
                    	foreach ($lstLatestAuthor as $LatestAuthor){
                    ?>
                    <ul>
                    	<li><a href="<?php echo base_url().'profile/'.$LatestAuthor->id;?>"><?php echo $num;?>.&nbsp;<b><?php echo $LatestAuthor->user_nicename;?></b> &nbsp;(<?php echo $LatestAuthor->name;?>)</a></li>
                    </ul>
                    <?php 
                    	$num++;
                    	}
                    	?>
                </div>  
            </div>
            <!-- <div class="box-center">
                <h3>Comment mới</h3>
                <div class="content-box-right">
                    <?php                     	
                    	$num = 1;
                    	foreach ($lstLatestComment as $LatestComment){
                    	if($num<6){
                    ?>
                    <ul>
                        <li><a href="<?php echo base_url().'chu-de/'.$LatestComment->guid;?>"><?php echo $num;?>.&nbsp;
                            <?php 
                            if(strlen($LatestComment->comment_agent)<35)
                            {
                                echo $LatestComment->comment_agent;
                            }
                            else
                            {
                                echo substr($LatestComment->comment_agent,0,32).'...';
                            }
                            ?></a></li>
                    </ul>
                    <?php 
                    	}
                        $num++;
                        }
                    ?>
                </div>  
            </div>-->
           
        </div><!-- end middle-right -->