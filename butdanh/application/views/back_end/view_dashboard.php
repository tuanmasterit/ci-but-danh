<?php $this->load->view('back_end/header'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent">

        	<div class="maincontentinner">            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">Dashboard</a></li>
                </ul><!--maintabmenu-->                
                <div class="content">
                	<ul class="widgetlist">
                    	<li><a href="<?php echo base_url();?>admin/posts/add/post" class="events">Add Post</a></li>
                    	<li><a href="<?php echo base_url();?>admin/topic/add/topic" class="events">Add Topic</a></li>
                    	<li><a href="<?php echo base_url();?>admin/categories" class="events">Add Category</a></li>
                        <li><a href="<?php echo base_url();?>application/elfinder/standalone-elfinder.php?mode=image" id="imageUpload" class="upload submit radius2">Upload Image</a></li>	
                    	
                    </ul>
                    
                    <br clear="all" /><br />
                    
                   

                    
                </div><!--content-->
                
            </div><!--maincontentinner-->            
            <div class="footer">
            	<p>&copy; 2012 ButDanh.com. All Rights Reserved. Designed by: <a href="http://tasvis.com.vn">TasVis</a></p>
            </div><!--footer-->            
        </div><!--maincontent-->        
        <?php include('sidebar-right.php');?>                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->    
</body>
</html>
