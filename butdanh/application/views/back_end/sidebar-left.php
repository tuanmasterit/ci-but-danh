<div class="mainleft">
    <div class="mainleftinner">    
        <div class="leftmenu">
            <ul>
                <li class="current"><a href="<?php echo base_url();?>admin/index" class="dashboard"><span>Quản trị</span></a></li>
                <li><a href="<?php echo base_url();?>admin/posts/lists/post" class="editor menudrop"><span>Bài viết</span></a>
                    <ul>
                        <li><a href="<?php echo base_url();?>admin/posts/lists/post"><span>Tất cả bài viết</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/posts/add/post"><span>Thêm mới bài viết</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/categories"><span>Danh mục bài viết</span></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>admin/posts/lists/page" class="grid menudrop"><span>Trang</span></a>
                    <ul>
                        <li><a href="<?php echo base_url();?>admin/posts/lists/page"><span>Tất cả trang</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/posts/add/page"><span>Thêm mới trang</span></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>admin/posts/lists/topic" class="tables menudrop"><span>Chủ đề</span></a>
                    <ul>
                        <li><a href="<?php echo base_url();?>admin/topic/lists/topic"><span>Tất cả chủ đề</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/topic/add/topic"><span>Thêm mới chủ đề</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/topic/approval/topic"><span>Phê duyệt chủ đề</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/topic/reject/topic"><span>Chủ đề từ chối</span></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>admin/author" class="editor menudrop"><span>Bút Danh</span></a>
                    <ul>
                    	<li><a href="<?php echo base_url();?>admin/author/"><span>Danh sách bút danh</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/magazine"><span>Danh sách báo</span></a></li>
                    </ul>
                </li>
                
                <li><a href="<?php echo base_url();?>admin/comments" class="chat menudrop"><span>Comment</span></a>                   
                </li>                       
                <?php if($this->session->userdata('logged_in') == 1 && $this->session->userdata('user_activation_key') == 'administrator'){?>
					<li><a href="<?php echo base_url();?>admin/users" class="elements menudrop"><span>Thành viên</span></a>
                        <ul>
                            <li><a href="<?php echo base_url();?>admin/users"><span>Tất cả thành viên</span></a></li>
                            <!-- <li><a href="<?php echo base_url();?>admin/users/add"><span>Thêm mới thành viên</span></a></li> -->
                            <!-- <li><a href="<?php echo base_url();?>admin/users/group"><span>Nhóm thành viên</span></a></li> -->
                        </ul>
                    </li>
				<?php }?>                  
            </ul>                
        </div><!--leftmenu-->
        <div id="togglemenuleft"><a></a></div>
    </div><!--mainleftinner-->
</div><!--mainleft-->