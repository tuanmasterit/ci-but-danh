<?php $this->load->view('back_end/header'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent">

        	<div class="maincontentinner">            	
                <ul class="maintabmenu">
                	<li class="current"><a href="./dashboard.html">Dashboard</a></li>
                </ul><!--maintabmenu-->                
                <div class="content">
                	<ul class="widgetlist">
                    	<li><a href="./calendar.html" class="events">Latest Events</a></li>
                    	<li><a href="./editor.html" class="message">New Message</a></li>
                        <li><a href="<?php echo base_url();?>application/elfinder/standalone-elfinder.php?mode=image" id="imageUpload" class="upload submit radius2">Upload Image</a></li>
                    	<li><a href="./calendar.html" class="events">Statistics</a></li>
                    	<li><a href="./editor.html" class="message">New Message</a></li>
                    	
                    </ul>
                    
                    <br clear="all" /><br />
                    
                    <div class="contenttitle">
                    	<h2 class="chart"><span>Simple Chart</span></h2>
                    </div><!--contenttitle-->
                    <br />
                    <div id="chartplace2" style="height:300px;"></div>                
                	<br /><br />

                    
                </div><!--content-->
                
            </div><!--maincontentinner-->            
            <div class="footer">
            	<p>Starlight Admin Template &copy; 2012. All Rights Reserved. Designed by: <a href="">ThemePixels.com</a></p>
            </div><!--footer-->            
        </div><!--maincontent-->        
        <?php include('sidebar-right.php');?>                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->    
</body>
</html>
