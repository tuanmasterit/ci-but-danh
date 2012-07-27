$(document).ready(function(){
	$(".openfull").click(function(){
		$(".excerpt").hide();
		$(".fullcontent").show();
	});
	$(".closefull").click(function(){		
		$(".fullcontent").hide();	
		$(".excerpt").show();
	});
	
	/**********Comment*************/
	$("#frmComment").hide();
	$("#link-login").click(function(){
		$('.frm-login').show();
	});
	
	/********* Like *******/
	$('.link-like').click(function(){
		
		var url = $(this).attr('href');
		var id = $(this).attr('id');
		
		$.post(url,{id:id},function(data) {
			$('#div-like').html(data);	
		});
		return false;
	});
	/********* Dislike *******/
	$('.link-dislike').click(function(){
		
		var url = $(this).attr('href');
		var id = $(this).attr('id');
		
		$.post(url,{id:id},function(data) {
			$('#div-like').html(data);	
		});
		return false;
	});
	
	/********* Check login to like *******/
	$('.link-login-like').click(function(){
		alert('Bạn cần đăng nhập để thực hiện chức năng này!');		
		return false;
	});
});
var flag = false;
function ShowFormComment() {
	if(flag==false){
		$("#frmComment").show();
		$("#pShow").hide();
	}
	else {
		$("#frmComment").hide();
		$("#pShow").show();
	}
	flag = !flag;
}
function InputDefault() {
	document.frmComment.txtAddedBy.value = 'Họ tên';
	document.frmComment.txtAddedBy.className = 'adword-textbox';
	document.frmComment.txtAddedByEmail.value = 'Email';
	document.frmComment.txtAddedByEmail.className = 'adword-textbox';		
	document.frmComment.txtAddedTitle.value = 'Tiêu đề';
	document.frmComment.txtAddedTitle.className = 'adword-textbox';
	document.frmComment.txtValidCode.value = 'Mã xác nhận';		
	document.frmComment.txtValidCode.className = 'adword-textbox';
	document.frmComment.txtAddedContent.value = '';
	document.frmComment.txtAddedContent.focus();
}
function submitForm(){
	var flag =true; 
	var name = $("#txtAddedBy").attr('value');
	var email = $("#txtAddedByEmail").attr('value');
	var title = $("#txtAddedTitle").attr('value');
	var content = $("#txtAddedContent").attr('value');
	if(name==''||name=="Họ tên")
	{
		alert("Cần nhập họ tên!");
		$("#txtAddedBy").select();
		$("#txtAddedBy").focus();
		flag =false; 
	}
	else
	{
		
		if(email==''||email=="Email")
		{
			alert("Cần nhập Email!");
			$("#txtAddedByEmail").select();
			$("#txtAddedByEmail").focus();
			flag =false; 
		}
		else
		{
			
			if(title==''||title=="Tiêu đề")
			{
				alert("Cần nhập tiêu đề!");
				$("#txtAddedTitle").select();
				$("#txtAddedTitle").focus();
				flag =false; 
			}
			else
			{
				if(content=='')
				{
					alert("Cần nhập nội dung!");
					$("#txtAddedContent").select();
					$("#txtAddedContent").focus();
					flag =false; 
				}
			}
		}
		
		if(flag==true)
		{
			var url = $("#frmComment").attr('action');
			var post_id = $("#post_id").attr('value');
			
			jQuery.post(url,{post_id:post_id,comment_author:name,comment_author_email:email,comment_content:content,comment_title:title},function(data) {
				jQuery("#last-comment").html(data);				
			});
		}
	}	
	
	return false;	
}

