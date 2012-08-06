<?php include('header.php'); ?>
 
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<li><a href="<?php echo base_url();?>admin/author">Quản trị bút danh</a></li>
                    <li class="current"><a href="<?php echo base_url();?>admin/magazine">Quản trị báo</a></li>
                </ul>
                <div class="content">                	
                	<div class="edit-left">
                	<?php if(!isset($magazine))
                	{
                	?>
                		<?php echo form_open('admin/magazine/save',array('id'=>'formID','class'=>'stdform'));?>
                    		
                            <p><label>Tên báo:</label></p>
                            <?php $data = array('name'=> 'txttitle','id'=> 'txttitle','class'=>'longinput validate[required]');?>
                            <p><span class="field"><?php echo form_input($data);?></span></p>
                            <br />
                            <p><label>Mô tả:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"></textarea></span></p>                            
                            <br />
                            <p class="stdformbutton">
                            	<?php echo form_submit('submit','Thêm mới',"class='submit radius2'");?>                                
                                <input type="reset" value="Hủy" class="reset radius2">
                            </p>                            
                        <?php echo form_close();?>
                    <?php 
                	}
                	else 
                	{
                		
                    ?>
                    <?php echo form_open('admin/magazine/edit',array('id'=>'formID','class'=>'stdform'));?>   
                    		<input type="hidden" value="<?php echo $magazine['term_id']?>" name="term_id">
                            <p><label>Tên danh mục:</label></p>
                            <?php $data = array('name'=> 'txttitle','id'=> 'txttitle','value'=>$magazine['name'],'class'=>'longinput validate[required]');?>
                            <p><span class="field"><?php echo form_input($data);?></span></p>
                            <br />                            
                            <p><label>Mô tả:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"  ><?php echo $magazine['description']?></textarea></span></p>                            
                            <br />
                            <p class="stdformbutton">
                            	<?php echo form_submit('submit','Cập nhật',"class='submit radius2'");?>                                
                                <input type="reset" value="Hủy" class="reset radius2">
                            </p>                            
                           	<?php echo form_close();?>
                    <?php 
                	}
                	?>
                    </div>
                    <div class="list-right">
                    	<div class="contenttitle radiusbottom0">
                            <h2 class="table"><span>Danh mục bài viết</span></h2>
                        </div><!--contenttitle-->
                        <div class="tableoptions">
                            <button class="deletebutton radius3" name="delete_term" value="<?php echo base_url();?>admin/categories/delete" title="table2">Delete Selected</button> &nbsp;
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
                                <?php foreach($lstmagazine as $mag){?>                            	
                                    <tr>
                                        <td class="center"><input value="<?php echo $mag->term_id;?>" type="checkbox"></td>
                                        <td><?php echo $mag->name;?></td>
                                        <td><?php echo $mag->description;?></td>

                                        <td class="center"><a class="edit" title="Sửa" href="<?php echo base_url();?>admin/magazine/edit/<?php echo $mag->term_id;?>">Sửa</a> &nbsp; <a class="delete" id="<?php echo $mag->term_id;?>" name="delete" title="Xóa danh mục" href="<?php echo base_url();?>admin/magazine/delete" >Xóa</a></td>
                                        

                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>                                  
                </div><!--content-->                
            </div><!--maincontentinner-->            
<?php $this->load->view('back_end/footer');?>