<div id="user-online">
	<h3>Danh sách thành viên</h3>
	
    <div class="ctn">
    	Online: <?php echo $this->Count_access->countOnline();?>
		&nbsp;&nbsp;&nbsp;
		Thành viên:  <?php echo $this->Count_access->countMemberOnline();?>
		<br/>
    	<?php 
    	$lstuser = $this->User_model->get(0,-1,0,'thanhvien',0,'user_registered','DESC');
    	foreach($lstuser as $user){?>
        	<?php 
        				if($user->user_status==1){ echo '<a href="#" style="color:red">'.$user->user_nicename.'</a>,&nbsp;';} 
        				else { echo '<a href="#">'.$user->user_nicename.'</a>,&nbsp;';} 
        				?>
        <?php }?>
    </div>
    
   
</div>
<div id="footer">
    	<p class="copyright">&copy; ButDanh.com</p>
        <p>Địa chỉ: 401, 31 Truong Han Sieu, Hoan Kiem, Hanoi, VIETNAM</p>
        <p>Tel/Fax: 04.62631763 Email: center@red.org.vn</p>
</div><!-- end footer -->
</div><!-- end wrap -->
</div><!-- end wr -->
</body>
</html>