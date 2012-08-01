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
	$(document).on("click",".link-like",function(){		
		var url = $(this).attr('href');
		var id = $(this).attr('id');
		
		$.post(url,{id:id},function(data) {
			
			$('#div-like').html(data.mess1);
			$('#list-like').html(data.mess2);
		},'json');
		return false;
	});
	
	/********* Dislike *******/
	$(document).on("click",".link-dislike",function(){
		var url = $(this).attr('href');
		var id = $(this).attr('id');
		
		$.post(url,{id:id},function(data) {
			$('#div-like').html(data.mess1);
			$('#list-like').html(data.mess2);
		},'json');
		return false;
	});
	
	/********* Check login to like *******/
	$('.link-login-like').click(function(){
		alert('Bạn cần đăng nhập để thực hiện chức năng này!');		
		return false;
	});
	
	/***********  Datetime picker  **************************/
	
    
    $(".ajaxmonth").click(function(){
            var u = $(this).attr('href');
    		var author_id = $(this).attr('id');
            var urlLoading = $("#urlLoading").attr('value');
            $("#resultpostmonth").html('<p><img src="'+urlLoading+'application/content/images/loading.gif" width="32" height="32" /></p>');
            $.ajax({
              type:"POST",
              url:u, 
              data:"author_id="+author_id, 
              //dataType:"xml",                
              success: function (data){ 
                $("#resultpostmonth").html(data);
              }
            });
            $(".ajaxmonth").removeClass('active');
            $(this).addClass('active');
            return false;
    });	
    
    /************** Change Info **********************/
    /*Tiểu sử*/
    $("#tieusu-hidden").hide();
    $("#link-tieusu").click(function(){
    	var str = $("#tieusu-show").text();
    	$("#txtTieuSu").html(str); 
    	$("#tieusu-show").hide(500);
    	$("#tieusu-hidden").show(500);
    	return false;
    });
    $("#cancelbutton-tieusu").click(function(){
    	$("#tieusu-show").show(500);
    	$("#tieusu-hidden").hide(500);
    });
    $("#submitbutton-tieusu").click(function(){
    	var id = $("#hdfID").attr("value");
    	var meta_key = 'tieu_su';
    	var meta_value = $("#txtTieuSu").val();
    	var url= $(this).attr("urllink");
    	if(meta_value=='')
		{
    		meta_value ='N/A';
		}
    	$.post(url,{id:id,key:meta_key,value:meta_value,type:'meta'},function(data) {    		
    		$("#tieusu-show").text(meta_value);		
		});
    	
    	$("#tieusu-show").show(500);
    	$("#tieusu-hidden").hide(500);
    	return false;
    });
    
    /*Địa chỉ*/
    $("#address-hidden").hide();
    $("#link-address").click(function(){
    	var str = $("#address-show").text();
    	$("#txtAddress").val(str); 
    	$("#address-show").hide(500);
    	$("#address-hidden").show(500);
    	return false;
    });
    $("#cancelbutton-address").click(function(){
    	$("#address-show").show(500);
    	$("#address-hidden").hide(500);
    });
    $("#submitbutton-address").click(function(){
    	var id = $("#hdfID").attr("value");
    	var meta_key = 'address';
    	var meta_value = $("#txtAddress").val();
    	var url= $(this).attr("urllink");
    	if(meta_value=='')
		{
    		meta_value ='N/A';
		}
    	$.post(url,{id:id,key:meta_key,value:meta_value,type:'meta'},function(data) {    		
    		$("#address-show").text(meta_value);		
		});
    	
    	$("#address-show").show(500);
    	$("#address-hidden").hide(500);
    	return false;
    });
    
    /*Giới tính*/
    $("#gender-hidden").hide();
    $("#link-gender").click(function(){
    	var str = $("#gender-show").text();
    	 
    	$("#gender-show").hide(500);
    	$("#gender-hidden").show(500);
    	return false;
    });
    $("#cancelbutton-gender").click(function(){
    	$("#gender-show").show(500);
    	$("#gender-hidden").hide(500);
    });
    $("#submitbutton-gender").click(function(){
    	var id = $("#hdfID").attr("value");
    	var meta_key = 'gender';
    	var meta_value = $("#ddlGender").val();
    	
    	var url= $(this).attr("urllink");
    	if(meta_value=='')
		{
    		meta_value ='N/A';
		}
    	$.post(url,{id:id,key:meta_key,value:meta_value,type:'meta'},function(data) {    		
    		$("#gender-show").text(meta_value);		
		});
    	
    	$("#gender-show").show(500);
    	$("#gender-hidden").hide(500);
    	return false;
    });
    
    /*Ngày sinh*/
    $("#birthday-hidden").hide();
    $("#link-birthday").click(function(){
    	var str = $("#birthday-show").text();
    	$("#txtBirthday").val(str); 
    	$("#birthday-show").hide(500);
    	$("#birthday-hidden").show(500);
    	return false;
    });
    $("#cancelbutton-birthday").click(function(){
    	$("#birthday-show").show(500);
    	$("#birthday-hidden").hide(500);
    });
    $("#submitbutton-birthday").click(function(){
    	var id = $("#hdfID").attr("value");
    	var meta_key = 'birthday';
    	var meta_value = $("#txtBirthday").val();
    	var url= $(this).attr("urllink");
    	if(meta_value=='')
		{
    		meta_value ='N/A';
		}
    	$.post(url,{id:id,key:meta_key,value:meta_value,type:'meta'},function(data) {    		
    		$("#birthday-show").text(meta_value);		
		});
    	
    	$("#birthday-show").show(500);
    	$("#birthday-hidden").hide(500);
    	return false;
    });
    
    /*Phone*/
    $("#phone-hidden").hide();
    $("#link-phone").click(function(){
    	var str = $("#phone-show").text();
    	$("#txtPhone").val(str); 
    	$("#phone-show").hide(500);
    	$("#phone-hidden").show(500);
    	return false;
    });
    $("#cancelbutton-phone").click(function(){
    	$("#phone-show").show(500);
    	$("#phone-hidden").hide(500);
    });
    $("#submitbutton-phone").click(function(){
    	var id = $("#hdfID").attr("value");
    	var meta_key = 'phone_number';
    	var meta_value = $("#txtPhone").val();
    	var url= $(this).attr("urllink");
    	if(meta_value=='')
		{
    		meta_value ='N/A';
		}
    	$.post(url,{id:id,key:meta_key,value:meta_value,type:'meta'},function(data) {    		
    		$("#phone-show").text(meta_value);		
		});
    	
    	$("#phone-show").show(500);
    	$("#phone-hidden").hide(500);
    	return false;
    });
    
    /*Sở thích*/
    $("#sothich-hidden").hide();
    $("#link-sothich").click(function(){
    	var str = $("#sothich-show").text();
    	$("#txtSoThich").html(str); 
    	$("#sothich-show").hide(500);
    	$("#sothich-hidden").show(500);
    	return false;
    });
    $("#cancelbutton-sothich").click(function(){
    	$("#sothich-show").show(500);
    	$("#sothich-hidden").hide(500);
    });
    $("#submitbutton-sothich").click(function(){
    	var id = $("#hdfID").attr("value");
    	var meta_key = 'so_thich';
    	var meta_value = $("#txtSoThich").val();
    	var url= $(this).attr("urllink");
    	if(meta_value=='')
		{
    		meta_value ='N/A';
		}
    	$.post(url,{id:id,key:meta_key,value:meta_value,type:'meta'},function(data) {    		
    		$("#sothich-show").text(meta_value);		
		});
    	
    	$("#sothich-show").show(500);
    	$("#sothich-hidden").hide(500);
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
				jQuery("#last-comment").html(data.mess1);	
				jQuery("#lblCountComment").html(data.mess2);
			},'json');
		}
	}	
	
	return false;	
}

function ChangeImage(){
	var url = $("#refresh-img").attr('urllink');	
	$.post(url,function(data) {
		$("#img-captcha").html(data.mess1);
		$("#hdfCaptcha").val(data.mess2);
	},'json');
}


