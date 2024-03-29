<?php include('header.php'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<?php if($post_type == 'post'){?>
                		<li class="current"><a href="<?php echo base_url();?>admin/topic/lists/post">Tất cả bài viết</a></li>
                    	<li><a href="<?php echo base_url();?>admin/topic/add/post">Thêm mới bài viết</a></li>
                    <?php }elseif($post_type == 'topic'){?>
                        <li><a href="<?php echo base_url();?>admin/topic/lists/topic">Tất cả chủ đề</a></li>
                        <li><a href="<?php echo base_url();?>admin/topic/add/topic">Thêm mới chủ đề</a></li>
                    	<li class="current"><a href="<?php echo base_url();?>admin/topic/approval/topic">Chủ đề cần phê duyệt</a></li>
                    	<li><a href="<?php echo base_url();?>admin/topic/reject/topic">Chủ đề từ chối</a></li>
                    <?php }?>
                </ul>                
                <div class="content">
                	<h1 id="ajaxtitle"></h1>                       	                            
                    <div class="contenttitle radiusbottom0">
                        <h2 class="table"><span>Table with Action</span></h2>
                    </div><!--contenttitle-->
                    <div class="tableoptions">
                                               	
                        	<form name="frmfilter" method="post" action="<?php echo base_url();?>admin/topic/approval/<?php echo $post_type;?>" >                        	
                        	<button class="deletebutton radius3" title="table2" name="delete_post" value="<?php echo base_url();?>admin/posts/delete">Delete Selected</button> &nbsp;
                            
                            <input type="text" class="txt" name="titleTopic" value="<?php echo $titleTopic; ?>" />
                            
                            <select class="category" name="slcategory">
                                <option value="">--- Tất cả ---</option>
                                <?php foreach($lstCategories as $l_category){?>                                 
                                	<?php if($l_category->term_id == $category){?>
                                    	<option selected="selected" value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }else{?>
                                    	<option value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }?>
                                <?php }?>
                            </select> &nbsp;                                                                                   
                            
                            <input type="submit" class="btn" value="Tìm kiếm"></button>
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
                                    <td class="center" style="min-width:100px;">
                                    	<a class="edit" href="<?php echo base_url();?>admin/topic/edit/<?php echo $Post->post_type;?>/<?php echo $Post->id;?>">Sửa</a> &nbsp;
                                    	<a class="edit" href="<?php echo base_url();?>admin/topic/confirm/<?php echo $Post->post_type;?>/<?php echo $Post->id;?>">Phê duyệt</a>
                                    </td>                                        
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>    
                    <?php echo $list_link;?>                             
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php $this->load->view('back_end/footer');?>