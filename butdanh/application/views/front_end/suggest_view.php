
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>        
        <div id="middle-center">        	
            <!-- menu-top -->
            <?php $this->load->view('front_end/menu-top');?>
            <!-- end menu-top -->
        	<div id="box_post_detail">
                <div id="profile_title"><p>Đề xuất thảo luận</p></div>	
                <div id="suggestTopic">                	
                	<form method="post" id="formID" action="<?php echo base_url().'post/suggest/';?>"  accept-charset="utf-8" enctype="multipart/form-data">        
                    	<div class="edit-main">   
                                <p><label>Tiêu đề:</label></p>
                                <p><span class="field "><input type="text" class=" textbox longinput validate[required]" name="txttitle" size="40"></span></p>
                                <br/>                                
                                <p><label>Ảnh đại diện:</label></p>
                                <p><span class="field"><input class="textbox" type="file" name="userfile" size="40"  /></span></p>
                                <br/>   
                                 
                                <div class="widgetbox">                                    
                                    <div class="widgetcontent" style="display: block;">
                                    	<input type="hidden" id="hdurlajax" value="<?php echo base_url();?>/admin/posts/list_posts_ajax" />
                                    	<p id="sl_butdanh_ajax">
                                            <p><label>Tác giả:</label></p>
                                            <input type="text" id="inputString" autocomplete="off" class=" textbox longinput validate[required]" name="txtnicename" onkeyup="lookupauthor(this.value);" onblur="fillauthor();" size="40" />
                                            <div class="suggestionsBox" id="suggestions" style="display: none;">
        										<img src="<?php echo base_url();?>application/content-admin/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
        										<div class="suggestionList" id="autoSuggestionsList">
        											&nbsp;
        										</div>
        									</div>                                    
                                        <p/>
                                        <div id="author_load_ajax">
                                            <p>Tác giả đã chọn: <label id="lblAuthor" style="color:red">Chưa chọn tác giả</label></p>
                                            <input type="hidden" name="txtAuthor" id="txtAuthor" class="validate[required]">
                                        </div>
                                        <br/>
                                       
                                        <p><label>Danh mục bài viết:</label></p>   
                                        <div id="suggest_category">
                                            <p><span class="field">                                    
                                                <select name="cbxcategory" style="width:100%;" id="cbxcategory" class="textbox longinput" >
                                                	
                                                	<?php foreach($lstCategories as $category){?>                                        	
                                                    	<option value="<?php echo $category->term_id;?>"><?php echo $category->name;?></option>
                                                    <?php }?>
                                                </select>  
                                            </span></p>                                  
                                        </div>                                                                                                                       
                                    </div><!--widgetcontent-->
                                </div>    
                                                                                     
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