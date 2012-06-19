<?php include('header.php'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu">
                	<li class="current"><a href="./dashboard.html">Tables</a></li>
                </ul><!--maintabmenu-->                
                <div class="content">                                    
                    <div class="contenttitle radiusbottom0">
                        <h2 class="table"><span>Danh sách Bút Danh</span></h2>
                    </div><!--contenttitle-->
                    <div class="tableoptions">
                        <button class="deletebutton radius3" title="dyntable">Delete Selected</button> &nbsp;
                        <select class="radius3">
                            <option value="">Show All</option>
                            <option value="">Rendering Engine</option>
                            <option value="">Platform</option>
                        </select> &nbsp;
                        <button class="radius3">Apply Filter</button>
                    </div><!--tableoptions-->
                    <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb" id="dyntable">
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
                            	<th class="head0"><input type="checkbox" class="checkall" /></th>
                                <th class="head1">Rendering engine</th>
                                <th class="head0">Browser</th>
                                <th class="head1">Platform(s)</th>
                                <th class="head0">Engine version</th>
                                <th class="head1">CSS grade</th>
                                <th class="head0">&nbsp;</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="head0"><input type="checkbox" class="checkall" /></th>
                                <th class="head1">Rendering engine</th>
                                <th class="head0">Browser</th>
                                <th class="head1">Platform(s)</th>
                                <th class="head0">Engine version</th>
                                <th class="head1">CSS grade</th>
                                <th class="head0">&nbsp;</th>
                            </tr>
                        </tfoot>
                        <tbody>                            
                            <tr class="gradeA">
                            	<td class="center"><input type="checkbox" /></td>
                                <td>Misc</td>
                                <td>NetFront 3.4</td>
                                <td>Embedded devices</td>
                                <td class="center">-</td>
                                <td class="center">A</td>
                                <td class="center"><a href="" class="edit">Edit</a> &nbsp; <a href="" class="delete">Delete</a></td>
                            </tr>
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
