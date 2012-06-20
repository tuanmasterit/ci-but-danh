<?php include('header.php'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<li class="current"><a href="<?php echo base_url();?>admin/posts/lists/post">Tất cả bài viết</a></li>
                    <li><a href="<?php echo base_url();?>admin/posts/add/post">Thêm mới bài viết</a></li>
                    <li><a href="<?php echo base_url();?>admin/posts/categories">Danh mục bài viết</a></li>
                </ul>                
                <div class="content">
                	<h1 id="ajaxtitle"></h1>                       	                            
                    <div class="contenttitle radiusbottom0">
                        <h2 class="table"><span>Table with Action</span></h2>
                    </div><!--contenttitle-->
                    <div class="tableoptions">
                        <button class="deletebutton radius3" title="table2" name="delete_post" value="<?php echo base_url();?>admin/posts/delete">Delete Selected</button> &nbsp;
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
                                <th class="head1">Tiêu đề</th>
                                <th class="head0">Tác giả</th>
                                <th class="head1">Tóm tắt</th>
                                <th class="head0">Ngày cập nhật</th>
                                <th class="head0" width="60">&nbsp;</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="head0"><input type="checkbox" class="checkall" /></th>
                                <th class="head1">Tiêu đề</th>
                                <th class="head0">Tác giả</th>
                                <th class="head1">Tóm tắt</th>
                                <th class="head0">Ngày cập nhật</th>
                                <th class="head0">&nbsp;</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($lstPosts as $Post){?>                            	
                            	<tr>
                                	<td class="center"><input value="<?php echo $Post->id;?>" type="checkbox"></td>
                                    <td><?php echo $Post->post_title;?></td>
                                    <td><?php echo $Post->user_nicename;?></td>
                                    <td><?php echo $Post->post_excerpt;?></td>
                                    <td><?php echo $Post->post_date;?></td>
                                    <td class="center">
                                    	<a class="edit" href="<?php echo base_url();?>admin/posts/edit/<?php echo $Post->id;?>">Sửa</a> &nbsp; 
                                        <a class="delete" name="delete_post" id="<?php echo $Post->id;?>" href="<?php echo base_url();?>admin/posts/delete">Xóa</a></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>                                 
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
