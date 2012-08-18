
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        
        <div id="middle-center">        	
         <!-- menu-top -->
            <div id="menu-top">
        	<ul class="nav-top">
            	<li><a href="<?php echo base_url();?>" class="current">Trang chủ</a></li>
				<li><a href="<?php echo base_url();?>category/1">Chính trị</a></li>
                <li><a href="<?php echo base_url();?>category/5">Văn hóa</a></li>
                <li><a href="<?php echo base_url();?>category/3">Xã hội</a></li>
                <li><a href="<?php echo base_url();?>category/4">Kinh tế</a></li>
                <li><a href="<?php echo base_url();?>category/10">Khoa học</a></li>
            </ul>
            
            </div><!-- end menu-top -->
        	<div id="box_post_detail">
                <h2 id="title_post"><?php echo $post_detail->post_title;?></h2>            	
                <div id="post_content" class="fon">              	     
                     <p><?php echo $post_detail->post_content ;?></p>                                      
                </div><!-- end box-content -->
                <div id="post_meta">
                	<p>Bút danh: <span><?php echo $butdanh['user_nicename'];?></span></p>
                    <p>Đơn vị công tác: <span><?php echo $butdanh['name'] ;?></span></p>                                                                 
                </div>
                <div id="showSuggestTopic">                        
                        <img id="imgShow" src="<?php echo base_url();?>application/content/images/show.png" alt="suggest"/>
                        
                        <input type="hidden" id="imageHidden" value="<?php echo base_url();?>application/content/images/hidden.png" />
                        <input type="hidden" id="imageShow" value="<?php echo base_url();?>application/content/images/show.png" />
                                                                    
                        <label id="btSuggestTopic" >Đề xuất chủ đề</label>                                                                            
                </div> 
                <div id="suggestTopic">                	
                	<form method="post" id="formID" action="<?php echo base_url().'post/suggest/'.$post_id;?>"  accept-charset="utf-8" enctype="multipart/form-data">        
                    	<div class="edit-main">   
                                <p><label>Tiêu đề:</label></p>
                                <p><span class="field "><input type="text" class=" textbox longinput validate[required]" name="txttitle" size="40"></span></p>
                                <br/>                                
                                <p><label>Ảnh đại diện:</label></p>
                                <p><span class="field"><input class="textbox" type="file" name="userfile" size="40"  /></span></p>
                                <br/>                            
                                <p><label>Tóm tắt:</label></p>                            
                                <p><span class="field"><textarea class="validate[required]" name="txtexcerpt"></textarea></span></p>
                                <br/>
                                <p><label>Nội dung:</label></p>                            
                                <p><textarea class="validate[required]" name="txtcontent" id="editor_content"></textarea></p>                                
                                <br/>
                                <?php if ($check_login == 1) { ?>
                                <p class="btSubmit"><input type="submit" name="submit" value="Đề xuất"/></p>
                                <?php } else { ?>
                                    <p class="btSubmit link-login-like"><input type="submit" name="submit" value="Đề xuất"/></p>
                                <?php } ?>
                        </div>                    
                    </form>              
            </div><!--suggusetTopic-->
            </div><!-- end newtopic -->           
        </div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
<script type="text/javascript">
	bindckeditor('editor_content','BasicToolbar');
</script>