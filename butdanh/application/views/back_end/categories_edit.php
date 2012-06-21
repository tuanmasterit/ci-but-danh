<?php include('header.php'); ?>
 
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<li><a href="<?php echo base_url();?>admin/posts/lists/post">Tất cả bài viết</a></li>
                    <li><a href="<?php echo base_url();?>admin/posts/add/post">Thêm mới bài viết</a></li>
                    <li class="current"><a href="<?php echo base_url();?>admin/posts/categories">Danh mục bài viết</a></li>
                </ul>
                <div class="content">                	
                	<div class="edit-left">
                		<?php echo form_open('admin/posts/editCat',array('id'=>'formID','class'=>'stdform'));?>   
                    		<input type="hidden" value="<?php echo $category['term_id']?>" name="term_id">
                            <p><label>Tên danh mục:</label></p>
                            <?php $data = array('name'=> 'txttitle','id'=> 'txttitle','value'=>$category['name'],'class'=>'longinput validate[required]');?>
                            <p><span class="field"><?php echo form_input($data);?></span></p>
                            <br />
                            <p><label>Đường dẫn:</label></p>
                            <p><span class="field"><input type="text" value="<?php echo $category['slug']?>" class="longinput validate[required]" name="txtslug"></span></p>
                            <br />
                            <p><label>Mô tả:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"  class="validate[required]"><?php echo $TermTaxonomy['description']?></textarea></span></p>
                            <br />
                            <p><label>Danh mục cha:</label></p>                            
                            <p>
                            	<select name="select">
                            		<option value="0">-- Không có danh mục cha --</option>
                                	<?php foreach($Categories as $cat){?>
                                	<?php 
                                		if($cat->term_id == $TermTaxonomy['parent'])
                                		{                                		
                                	?>
                                		<option selected="selected" value="<?php echo $cat->term_id;?>"><?php echo $cat->name;?></option>
                                	<?php 
                                		}
                                		else {
                                	?>
	                                    <option value="<?php echo $cat->term_id;?>"><?php echo $cat->name;?></option>
									<?php }
                                	}
									?>
                                </select>
                            </p>
                            <br />
                            <p class="stdformbutton">
                            	<?php echo form_submit('submit','Cập nhật',"class='submit radius2'");?>                                
                                <input type="reset" value="Hủy" class="reset radius2">
                            </p>                            
                           	<?php echo form_close();?>
                    </div>
                    <div class="list-right">
                    	<div class="contenttitle radiusbottom0">
                            <h2 class="table"><span>Danh mục bài viết</span></h2>
                        </div><!--contenttitle-->
                        <div class="tableoptions">
                            <button class="deletebutton radius3" name="delete_term" value="<?php echo base_url();?>admin/posts/delete" title="table2">Delete Selected</button> &nbsp;
                            <select class="radius3">
                                <option value="">Show All</option>
                                <option value="">Rendering Engine</option>
                                <option value="">Platform</option>
                            </select> &nbsp;
                            <button class="radius3">Apply Filter</button>
                        </div><!--tableoptions-->	
                        <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                            <colgroup>
                                <col class="con0" />
                                <col class="con1" />
                                <col class="con0" />
                                <col class="con1" />
                                <col class="con0" />
                                <col class="con1" />
                                <col class="con0" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                                    <th class="head1">Tên danh mục</th>
                                    <th class="head0">Mô tả</th>
                                    <th class="head0" width="60">&nbsp;</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="head0"><input type="checkbox" class="checkall" /></th>
                                    <th class="head1">Tên danh mục</th>
                                    <th class="head0">Mô tả</th>
                                    <th class="head0">&nbsp;</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($lstCategories as $Category){?>                            	
                                    <tr>
                                        <td class="center"><input value="<?php echo $Category->term_id;?>" type="checkbox"></td>
                                        <td><?php echo $Category->name;?></td>
                                        <td><?php echo $Category->description;?></td>
                                        <td class="center"><a class="edit" title="Sửa" href="<?php echo base_url();?>admin/posts/editCat/<?php echo $Category->term_id;?>">Sửa</a> &nbsp; <a class="delete" id="<?php echo $Category->term_id;?>" title="Xóa danh mục" href="<?php echo base_url();?>admin/posts/delete/<?php echo $Category->term_id;?>" >Xóa</a></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>                                  
                </div><!--content-->                
            </div><!--maincontentinner-->            
            <div class="footer">
            	<p>Starlight Admin Template &copy; 2012. All Rights Reserved. Designed by: <a href="">ThemePixels.com</a></p>
            </div><!--footer-->
            
        </div><!--maincontent--> 

     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->        

</body>
</html>
