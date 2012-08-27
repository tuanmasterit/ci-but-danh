<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url();?>application/content/css/style.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_url();?>application/content/css/validationEngine.jquery.css"/>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/script.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.validationEngine-vi.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.validationEngine.js"></script>
<link href="<?php echo base_url();?>application/content/css/jquery-ui.css" type="text/css" media="all" rel="stylesheet"/>
<link href="<?php echo base_url();?>application/content/css/jquery-ui-timepicker-addon.css" type="text/css" media="all" rel="stylesheet"/>
<script src="<?php echo base_url();?>application/content/js/jquery-ui.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>application/content/js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>application/content/js/jquery-ui-sliderAccess.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>application/content/js/ajaxfileupload.js" type="text/javascript"></script>
<title>Diễn Đàn Nghiên Cứu Báo Chí</title>
<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
</script>
<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			jQuery('#suggestions').hide();
		} else {
			jQuery.post("<?php echo base_url();?>admin/rpc", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					jQuery('#suggestions').show();
					jQuery('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		if(thisValue != null){
			jQuery('#inputString').val(thisValue);
			jQuery('#lblAuthor').html(thisValue);
			jQuery('#txtAuthor').val(thisValue);
			setTimeout("jQuery('#suggestions').hide();", 200);
		}
	}

	function lookupauthor(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			jQuery('#suggestions').hide();
		} else {
			jQuery.post("<?php echo base_url();?>admin/rpc/fill", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					jQuery('#suggestions').show();
					jQuery('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fillauthor(thisValue) {
		if(thisValue != null){
			jQuery('#inputString').val(thisValue);
			jQuery('#lblAuthor').html('<b>'+thisValue+'</b>');
			jQuery('#txtAuthor').val(thisValue);
			setTimeout("jQuery('#suggestions').hide();", 200);
			
		}
	}
</script>
</head>
<body>
<div id="fb-root"></div>
<div id="wr">
<div id="wrap">
	<div id="header">
    	<div id="banner">
            
        </div><!-- end banner -->

    </div><!-- end header -->