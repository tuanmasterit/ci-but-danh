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
                        		<a href="<?php echo base_url();?>profile/<?php echo $butdanh->id;?>"><?php echo $butdanh->user_nicename;?></a>,&nbsp;
							<?php }?>
                        </div>
                    </li>
                    <?php }?>                    	                    
                </ul>
            </div>
            <div class="ads-sidebar">
                <?php 
                    $listAD = $this->Post_model->get(80); 
                    foreach($listAD as $ad)
                    {
                        echo $ad->post_content;
                    }                
                ?>            	
            </div>
            
        </div><!-- end middle-left -->