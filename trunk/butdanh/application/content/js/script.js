
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
	
	/************ Quick Reply   ************************/
	$(".vbform").hide();
	$(".quickreply").click(function(){
		$(this).parent().parent().parent().parent().next().find('.vbform').show();
		
		return false;
	});
	$(".qr_cancelbutton").click(function(){
		$(this).parent().parent().parent().parent().hide();
	});
	
	$(document).on("click",".qr_submit",function(){
		//$('.qr_submit').click(function(){
		var title = $(this).parent().parent().prev().find('#title').attr('value');
		
		var editor = $(this).parent().parent().prev().find('.editor_content').attr('id');
		var content = (CKEDITOR.instances[editor].getData());
		
		var url = $('#hdfurl').attr('value');
		var post_id = $("#post_id").attr('value');
		var comment_id = $(this).attr('id');
		
		var check = $(this).parent().parent().parent().parent().parent().prev().children().next().next().children().children().children();
		var check2 = check.next().next().next().next().next().next('#hdfCheckEdit').attr('value');
		var check_edit = '';
		if(check2)
		{
			check_edit = check2;
		}		
		
		$.ajax({
		     type: "POST",
		     url: url, 
		     data: {post_id:post_id,comment_content:content,comment_title:title,check_edit:check_edit,comment_id:comment_id}, 
		     complete:function(){
		        window.location.reload(true);
		     } 
		  });
		return false;	
	});
	
	$('.newreply').click(function(){		
		var editor = $(this).parent().parent().parent().parent().next().find('.vbform').find('.editor_content').attr('id');
		$(this).parent().parent().parent().parent().next().find('.vbform').show();
		var content =  $(this).parent().parent().parent().prev().find('.postcontent').html();
		content = "<blockquote class='qoute-comment'>"+content+"</blockquote><br/>";		
		CKEDITOR.instances[editor].setData(content);
		
		return false;
	});
	
	$('.editpost').click(function(){		
		var editor = $(this).parent().parent().parent().parent().next().find('.vbform').find('.editor_content').attr('id');
		$(this).parent().parent().parent().parent().next().find('.vbform').show();
		var content =  $(this).parent().parent().parent().prev().find('.postcontent').html();		
		var title = $(this).attr('comment_title');
		$(this).parent().parent().parent().parent().next().find('#title').val(title);
		$(this).next().next().next().next().next().next().val('true');
		
		CKEDITOR.instances[editor].setData(content);
		
		return false;
	});
	/********* Check login to like *******/
	$('.link-login-like').click(function(){
		alert('Bạn cần đăng nhập để thực hiện chức năng này!');		
		return false;
	});
	/********* Thanks *******/	
	$(document).on("click",".link-thanks",function(){		
		var url = $(this).attr('href');
		var id = $(this).attr('id');
		var threads_id = $(this).attr('threads_id');
        //alert(threads_id);
		$.post(url,{id:id,threads_id:threads_id},function(data) {
		  
		    $('.link-thanks').hide();  	
			$('#list-user-thanks').html(data.mess1);
			$('#totalThanks').html(data.mess2);
		},'json');
		return false;
	});
	
	/********* Disthanks *******/
	$(document).on("click",".link-disthanks",function(){
		var url = $(this).attr('href');
		var id = $(this).attr('id');
		var threads_id = $(this).attr('threads_id');
		$.post(url,{id:id,threads_id:threads_id},function(data) {
			$('#div-thanks').html(data.mess1);
			$('#list-thanks').html(data.mess2);
		},'json');
		return false;
	});
	
	/********* Check login to Thanks *******/
	$('.link-login-thanks').click(function(){
		alert('Bạn cần đăng nhập để thực hiện chức năng này!');		
		return false;
	});
	/***********  Datetime picker  **************************/
	
    var isFirst = [];
    for (var i = 0; i<=12;i++) isFirst[i] = true;
    var isShowMonth = [];
    for (var i = 0; i<=12;i++) isShowMonth[i] = false;
    $(".ajaxmonth").click(function(){
        var month = $(this).attr('month');        
        var author_id = $(this).attr('id');            
        if (isFirst[month] == true )
        {
            isFirst[month] = false;
            isShowMonth[month] = true;                               
            var u = $(this).attr('href');    		
            var urlLoading = $("#urlLoading").attr('value');
            $("#resultpostmonth"+author_id+month).html('<p><img src="'+urlLoading+'application/content/images/loading.gif" width="66" height="66" /></p>');
            $.ajax({
              type:"POST",
              url:u, 
              data:"author_id="+author_id, 
              //dataType:"xml",                
              success: function (data){ 
                $("#resultpostmonth"+author_id+month).html(data);
              }
            });
            //$(".ajaxmonth").removeClass('active');
            $(this).addClass('active');
         } else
         {
            if (isShowMonth[month] == true )
            {     
                $(this).removeClass('active');
                //alert("#resultpostmonth"+author_id+month);
                $("#resultpostmonth"+author_id+month).hide(100);
                isShowMonth[month] = false;
            } else
            {
                $(this).addClass('active');
               // alert(month + 'chua show');
               $("#resultpostmonth"+author_id+month).show(100);
               isShowMonth[month] = true;
            }
         }   
         return false;
    });	
    var isOpened = false;
    $(function(){
        $("#btSuggestTopic").click(function(){
           //alert('ajsb'); 
           
           if (!isOpened)
           {
                 $("#suggestTopic").slideDown(900);
                 $("#btSuggestTopic").text('Đề xuất thảo luận');
                 $imageHidden = $("#imageHidden").attr("value");                 
                 $("#imgShow").attr("src",$imageHidden); 
                 isOpened = true;
                 
           } else
           {
                $("#suggestTopic").slideUp(500);
                $("#btSuggestTopic").text('Đề xuất thảo luận');
                $imageShow = $("#imageShow").attr("value");
                $("#imgShow").attr("src",$imageShow);
                isOpened = false; 
                
           }
        });
    });
    
    /****************list but danh - bao************************/
   $(".name-butdanh:first-child .lst-butdanh").show();
   $(".name-butdanh:first-child h3").removeClass("arrow-up");
   $(".name-butdanh:first-child h3").addClass("arrow-down");
   var isOpened1 = false;
   $('.tamgiac').toggle(function() {
	   if($(this).attr("class")=="tamgiac arrow-up"){
		   $(this).removeClass("arrow-up");
		   $(this).addClass("arrow-down");
	   }else{
		   $(this).removeClass("arrow-down");
		   $(this).addClass("arrow-up");
	   }
		   $(this).next().slideToggle("500");
	},function(){
		if($(this).attr("class")=="tamgiac arrow-up"){
			   $(this).removeClass("arrow-up");
			   $(this).addClass("arrow-down");
		   }else{
			   $(this).removeClass("arrow-down");
			   $(this).addClass("arrow-up");
		   }
		   $(this).next().slideToggle("500");
		
	});
  
   /***************************view member profile***********************************/

   	$('.profile_member1').toggle(function (){
   		
   		if($(this).attr("class")=="pane-title profile_member1 arrow-up1"){
   			$(this).removeClass("arrow-up1");
 		   $(this).addClass("arrow-down1");
 	   }else{
 		   $(this).removeClass("arrow-down1");
 		   $(this).addClass("arrow-up1");
 	   }
 		   $(this).next().slideToggle("500");
 	},function(){
 		if($(this).attr("class")=="pane-title profile_member1 arrow-up1"){
 			   $(this).removeClass("arrow-up1");
 			   $(this).addClass("arrow-down1");
 		   }else{
 			   $(this).removeClass("arrow-down1");
 			   $(this).addClass("arrow-up1");
 		   }
 		   $(this).next().slideToggle("500");
 		
 	});
   	
    /**************   Topic Top    ******************************/
    $(".topic-a").click(function(){
        var url = $(this).attr('href');
		var term_id = $("#hdfCat").attr("value");
		var get_by = '';
		if($(this).hasClass('month')){
			get_by='month';
		}
		if($(this).hasClass('week')){
			get_by='week';
		}
		$.post(url,{term_id:term_id,by:get_by},function(data) {
			$("#list-topic-detail").html(data);			
		});
        $(".topic-a").removeClass('active');
        $(this).addClass('active');
        return false;
    });	
    
    $(".topic-a-top").click(function(){
        var url = $(this).attr('href');		
        var get_by = '';
        if($(this).hasClass('publish')){
                get_by='publish';
        }
        if($(this).hasClass('pending')){
                get_by='pending';
        }
        if($(this).hasClass('reject')){
                get_by='reject';
        }
        var term_id = $("#hdfCat").attr("value");
        $.post(url,{get_by:get_by,term_id:term_id},function(data) {
                $("#scroll_box-top").html(data);			
        });
        
        $(".topic-a-top").removeClass('tab-active');
        $(this).addClass('tab-active');
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
    /*Ảnh đại diện*/
    $("#avatar-hidden").hide();
    $("#link-avatar").click(function(){
    	var str = $("#avatar-show").text();
    	
    	$("#avatar-show").hide(500);
    	$("#avatar-hidden").show(500);
    	return false;
    });
    $("#cancelbutton-avatar").click(function(){
    	$("#avatar-show").show(500);
    	$("#avatar-hidden").hide(500);
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

function bindckeditor(elementid,toolbar){
	if(toolbar == 'MyToolbar'){
		var editor = CKEDITOR.replace( elementid,
		{			
			toolbar : toolbar,		
			filebrowserBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=file',
			filebrowserImageBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=image',
			filebrowserFlashBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=flash',
			filebrowserImageUploadUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=image',
			filebrowserFlashUploadUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=flash',
			filebrowserImageWindowWidth : '950',
			filebrowserImageWindowHeight : '490',
			filebrowserWindowWidth : '950',
			filebrowserWindowHeight : '490'
		});	
	}else{
		var editor = CKEDITOR.replace( elementid,
		{			
			toolbar : toolbar					
		});	
	}
}
function checkRefresh()
{
	// Get the time now and convert to UTC seconds
	var today = new Date();
	var now = today.getUTCSeconds();

	// Get the cookie
	var cookie = document.cookie;
	var cookieArray = cookie.split('; ');

	// Parse the cookies: get the stored time
	for(var loop=0; loop < cookieArray.length; loop++)
	{
		var nameValue = cookieArray[loop].split('=');
		// Get the cookie time stamp
		if( nameValue[0].toString() == 'SHTS' )
		{
			var cookieTime = parseInt( nameValue[1] );
		}
		// Get the cookie page
		else if( nameValue[0].toString() == 'SHTSP' )
		{
			var cookieName = nameValue[1];
		}
	}

	if( cookieName &&
		cookieTime &&
		cookieName == escape(location.href) &&
		Math.abs(now - cookieTime) < 5 )
	{
		// Refresh detected

		// Insert code here representing what to do on
		// a refresh

		// If you would like to toggle so this refresh code
		// is executed on every OTHER refresh, then 
		// uncomment the following line
		// refresh_prepare = 0; 
	}	

	// You may want to add code in an else here special 
	// for fresh page loads
}

function prepareForRefresh()
{
	if( refresh_prepare > 0 )
	{
		// Turn refresh detection on so that if this
		// page gets quickly loaded, we know it's a refresh
		var today = new Date();
		var now = today.getUTCSeconds();
		document.cookie = 'SHTS=' + now + ';';
		document.cookie = 'SHTSP=' + escape(location.href) + ';';
	}
	else
	{
		// Refresh detection has been disabled
		document.cookie = 'SHTS=;';
		document.cookie = 'SHTSP=;';
	}
}

function disableRefreshDetection()
{
	// The next page will look like a refresh but it actually
	// won't be, so turn refresh detection off.
	refresh_prepare = 0;

	// Also return true so this can be placed in onSubmits
	// without fear of any problems.
	return true;
} 

// By default, turn refresh detection on
var refresh_prepare = 1;
