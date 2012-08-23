<?php include('header.php'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">                	
                		<li class="current"><a href="<?php echo base_url();?>admin/comments">Tất cả bình luận</a></li>                    
                </ul>                
                <div class="content">
                	<h1 id="ajaxtitle"></h1>                       	                            
                    <div class="contenttitle radiusbottom0">
                        <h2 class="table"><span>Danh sách bình luận</span></h2>
                    </div><!--contenttitle-->
                    <div class="tableoptions">
                        <form name="frmfilter" method="post" action="<?php echo base_url();?>admin/comments" >                        	
                        	<button class="deletebutton radius3" title="table2" name="delete_post" value="<?php echo base_url();?>admin/comments/delete">Delete Selected</button> &nbsp;
                            <select class="category" name="slstatus">
                                <option value="">--- Tất cả ---</option>                              
                                <?php 
                                if($status=='approved')
                                {?>
                                <option value="approved"  selected="selected">Phê duyệt</option>                                
                                <option value="unapproved">Chưa phê duyệt</option>  
                                <?php 
                                }
                                else if($status=='unapproved')
                                {?>
                                <option value="approved"  >Phê duyệt</option>                                
                                <option value="unapproved" selected="selected">Chưa phê duyệt</option>  
                                <?php                                 
                                }else 
                                {?>
                                <option value="approved"  >Phê duyệt</option>                                
                                <option value="unapproved">Chưa phê duyệt</option> 
                                <?php }?>                              
                            </select> &nbsp;
                            <input type="submit" class="btn" value="Tìm kiếm"/>
                        </form>
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
                                 <th class="head0">Nội dung</th>
                                <th class="head1">Người đăng</th>
                                <th class="head0">Email</th>                                
                                <th class="head1" width="60">&nbsp;</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                                <th class="head1">Tiêu đề</th>
                                <th class="head0">Nội dung</th>
                                <th class="head1">Người đăng</th>
                                <th class="head0">Email</th>                                
                                <th class="head0" width="60">&nbsp;</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($lstComments as $Comment){?>                            	
                            	<tr>
                                	<th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                                	<td><?php echo $Comment->comment_agent;?></td>
                                	<td><?php echo $Comment->comment_content;?></td>
                                	<td><?php echo $Comment->comment_author;?></td>
                                	<td><?php echo $Comment->comment_author_email;?></td>                                	
                                    <td class="center">
                                    	<a class="edit" href="<?php echo base_url();?>admin/comments/edit/<?php echo $Comment->comment_ID;?>">Sửa</a> &nbsp;                                    	                                    	
                                        <a class="delete" name="delete_post" id="<?php echo $Comment->comment_ID;?>" href="<?php echo base_url();?>admin/comments/delete">Xóa</a>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>    
                    <?php echo $list_link;?>                             
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
