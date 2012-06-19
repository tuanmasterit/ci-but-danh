<?php include('header.php'); ?>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckfinder/ckfinder.js"></script>
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
                    		<form method="post" action="<?php echo base_url();?>admin/posts/save_categories" class="stdform">
                            <p><label>Tên danh mục:</label></p>
                            <p><span class="field"><input type="text" class="longinput" name="txttitle"></span></p>
                            </br>
                            <p><label>Đường dẫn:</label></p>
                            <p><span class="field"><input type="text" class="longinput" name="txtslug"></span></p>
                            </br>
                            <p><label>Mô tả:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"></textarea></span></p>
                            </br>
                            <p><label>Danh mục cha:</label></p>                            
                            <p>
                            	<select name="butdanh" style="width:80%;">
									<?php foreach($lstCategories as $Category){?>
                                        <option value="<?php echo $Category->term_id;?>"><?php echo $Category->name;?></option>
                                    <?php }?>
                                </select>
                            </p>
                            </br>
                            <p class="stdformbutton">
                                <button class="submit radius2">Thêm mới</button>
                                <input type="reset" value="Hủy" class="reset radius2">
                            </p>                            
                            </form>
                    </div>
                    <div class="list-right">
                    	<div class="contenttitle radiusbottom0">
                            <h2 class="table"><span>Danh mục bài viết</span></h2>
                        </div><!--contenttitle-->
                        <div class="tableoptions">
                            <button class="deletebutton radius3" title="table2">Delete Selected</button> &nbsp;
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
                                        <td class="center"><span class="checkbox"><input type="checkbox"></span></td>
                                        <td><?php echo $Category->name;?></td>
                                        <td><?php echo $Category->description;?></td>
                                        <td class="center"><a class="edit" href="">Sửa</a> &nbsp; <a class="delete" href="">Xóa</a></td>
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
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'editor_content' );
	CKFinder.setupCKEditor( editor, '../../application/ckfinder/' );
</script>
</body>
</html>
