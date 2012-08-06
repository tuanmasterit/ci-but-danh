<?php $this->load->view('front_end/header');?>
    <div id="middle">    	
    	<?php $this->load->view('front_end/left');?>
        <div id="middle-center">
        <?php echo form_open('home/register',array('id'=>'formID','class'=>'stdform'));?>
        <script type="text/javascript">
        	$(function(){
        		$('#txtNgaySinh').datepicker({ dateFormat: 'dd/mm/yy' });
            	});
        </script>        	
        	<div id="box-newtopic" class="box-center">
				<h2>Xác nhận thành viên</h2>
				<div class="box-content">
					<?php 
						if($check == true){
					?>		
					<p>Xác nhận thành công. Chúc mừng bạn đã trở thành thành viên của <b>Bút Danh</b>.</p>		
					<?php }else {?>
					<p>Quá hạn xác nhận hoặc thông tin xác nhận không đúng!</p>
					<?php }?>
				</div>				
			</div>			   	
    	</div><!-- end middle-center -->
        <?php $this->load->view('front_end/right');?>
    </div><!-- end middle -->
<?php $this->load->view('front_end/footer');?>    
