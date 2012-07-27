<?php include('header.php'); ?>
 
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">                	
                    <li class="current"><a href="<?php echo base_url();?>admin/users">Quản trị Thành viên</a></li>
                </ul>
                <div class="content">                	
                	<div class="edit-left">                		
                		<?php 
                			if(!isset($user))
                			{
                		?>   
                			<?php echo form_open('admin/users/add',array('id'=>'formID','class'=>'stdform'));?>
                    		
                            <p><label>Tên đăng nhập:</label></p>
                            <p><span class="field"><input type="text" class="longinput validate[required]" name="txtname" /></span></p>
                            <br />
                            <p><label>Tên thành viên:</label></p>                            
                            <p><span class="field"><input type="text" class="longinput validate[required]" name="txtnicename" /></span></p>
                            <br />
                            <p><label>Email:</label></p>                            
                            <p><span class="field"><input type="text" class="longinput validate[required,custom[email]]" name="txtemail" /></span></p>
                            <br />
                            <p><label>Tên hiển thị:</label></p>                            
                            <p><span class="field"><input type="text" class="longinput" name="txtdisplay" /></span></p>
                            <br />
                            <p><label>Nhóm người dùng:</label></p>
                            <p><span class="field">
                            	<select name="group">
                            		<option value="thanhvien">Thành viên</option>
                                    <option value="congtacvien">Cộng tác viên</option>
                                    <option value="bandieuphoi">Ban điều phối</option>
                            	</select>
                            </span></p>
                            <br />
                            <p><label>Mật khẩu:</label></p>                            
                            <p><span class="field"><input type="password" id="txtpassword" class="longinput validate[required]" name="txtpassword" /></span></p>
                            <br />
                            <p><label>Xác nhận mật khẩu:</label></p>                            
                            <p><span class="field"><input type="password" class="longinput validate[required,equals[txtpassword]]" name="txtconfirmpassword" /></span></p>
                            <br />
                            <p class="stdformbutton">
                            	<button class="submit radius2">Thêm mới</button>
                                <input type="reset" value="Hủy" class="reset radius2">
                            </p>                            
                            <?php echo form_close();?>
                        <?php 
                			}
                			else {
                		?>
                			<?php echo form_open('admin/users/edit',array('id'=>'formID','class'=>'stdform'));?>
                			<input type="hidden" name="id" value="<?php echo $user['id'];?>">
                            <p><label>Tên đăng nhập:</label></p>
                            <p><span class="field"><input type="text" disabled="disabled" value="<?php echo $user['user_login']?>" readonly="readonly" class="longinput validate[required]" name="txtname" /></span></p>
                            <br />
                            <p><label>Tên thành viên:</label></p>                            
                            <p><span class="field"><input type="text" value="<?php echo $user['user_nicename'];?>" class="longinput validate[required]" name="txtnicename" /></span></p>
                            <br />
                            <p><label>Email:</label></p>                            
                            <p><span class="field"><input type="text" value="<?php echo $user['user_email']?>" class="longinput validate[required,custom[email]]" name="txtemail" /></span></p>
                            <br />
                            <p><label>Tên hiển thị:</label></p>                            
                            <p><span class="field"><input type="text" value="<?php echo $user['display_name']?>" class="longinput" name="txtdisplay" /></span></p>
                            </br>
                            <p><label>Nhóm người dùng:</label></p>
                            <p><span class="field">
                            	<select class="radius3" name="group">
                            	<?php switch($user['user_activation_key']){
										case 'thanhvien':?>
                                            <option value="thanhvien">Thành viên</option>
                                            <option value="congtacvien">Cộng tác viên</option>
                                            <option value="bandieuphoi">Ban điều phối</option>
                                            <?php break;
                                    	case 'congtacvien':?>        
                                        	<option value="thanhvien">Thành viên</option>
                                            <option selected="selected" value="congtacvien">Cộng tác viên</option>
                                            <option value="bandieuphoi">Ban điều phối</option>
                                            <?php break;
										case 'bandieuphoi':?>        
                                        	<option value="thanhvien">Thành viên</option>
                                            <option value="congtacvien">Cộng tác viên</option>
                                            <option selected="selected" value="bandieuphoi">Ban điều phối</option>
                                            <?php break;
										default:?>		
											<option selected="selected" value="thanhvien">Thành viên</option>
                                            <option value="congtacvien">Cộng tác viên</option>
                                            <option value="bandieuphoi">Ban điều phối</option>
                                <?php }?>
                                </select>
                            </span></p>
                            <br />                            
                            <p><label>Mật khẩu:</label></p>                            
                            <p><span class="field"><input type="password" id="txtpassword" class="longinput" name="txtpassword" /></span></p>
                            <br />
                            <p><label>Xác nhận mật khẩu:</label></p>                            
                            <p><span class="field"><input type="password" class="longinput validate[equals[txtpassword]]" name="txtconfirmpassword" /></span></p>
                            <br />
                            <p class="stdformbutton">
                            	<button class="submit radius2">Cập nhật</button>
                                <input type="reset" value="Hủy" class="reset radius2">
                            </p>                            
                            <?php echo form_close();?>
                		<?php }?>
                    </div>
                    <div class="list-right">
                    	<div class="contenttitle radiusbottom0">
                            <h2 class="table"><span>Danh sách thành viên</span></h2>
                        </div><!--contenttitle-->
                        <div class="tableoptions">
                        	<form name="frmfilter" method="post" action="<?php echo base_url();?>admin/users/index" >
                                <button class="deletebutton radius3" name="delete" value="<?php echo base_url();?>admin/users/delete" title="table2">Delete Selected</button> &nbsp;
                                <select class="radius3" name="slgroup">
                                	<?php switch($group){
										case 'thanhvien':?>
                                            <option value="thanhvien">Thành viên</option>
                                            <option value="congtacvien">Cộng tác viên</option>
                                            <option value="bandieuphoi">Ban điều phối</option>
                                            <?php break;
                                    	case 'congtacvien':?>        
                                        	<option value="thanhvien">Thành viên</option>
                                            <option selected="selected" value="congtacvien">Cộng tác viên</option>
                                            <option value="bandieuphoi">Ban điều phối</option>
                                            <?php break;
										case 'bandieuphoi':?>        
                                        	<option value="thanhvien">Thành viên</option>
                                            <option value="congtacvien">Cộng tác viên</option>
                                            <option selected="selected" value="bandieuphoi">Ban điều phối</option>
                                            <?php break;
										default:?>		
											<option selected="selected" value="thanhvien">Thành viên</option>
                                            <option value="congtacvien">Cộng tác viên</option>
                                            <option value="bandieuphoi">Ban điều phối</option>
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
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                                    <th class="head1">Username</th>
                                    <th class="head0">Tên thành viên</th>
                                    <th class="head0">Email</th>                                    
                                    <th class="head0" width="60">&nbsp;</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="head0"><input type="checkbox" class="checkall" /></th>
                                    <th class="head1">Username</th>
                                    <th class="head0">Tên thành viên</th>
                                    <th class="head0">Email</th>                                    
                                    <th class="head0" width="60">&nbsp;</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($lstthanhvien as $thanhvien){?>                            	
                                    <tr>
                                        <td class="center"><input value="<?php echo $thanhvien->id;?>" type="checkbox"></td>
                                        <td><?php echo $thanhvien->user_login;?></td> 
                                        <td><?php echo $thanhvien->user_nicename;?></td> 
                                        <td><?php echo $thanhvien->user_email;?></td>                                                                             
                                        <td class="center"><a class="edit" title="Sửa" href="<?php echo base_url();?>admin/users/edit/<?php echo $thanhvien->id;?>">Sửa</a> &nbsp; <a class="delete" id="<?php echo $thanhvien->id;?>" title="Xóa thành viên" href="<?php echo base_url();?>admin/users/delete" name="delete_user" >Xóa</a></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <?php echo $list_link;?>
                    </div>                                  
                </div><!--content-->                
            </div><!--maincontentinner-->            
<?php $this->load->view('back_end/footer');
