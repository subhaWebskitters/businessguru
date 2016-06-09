<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
				<div class="modal-content">
						<div class="modal-header">
								<!--<button type="button" class="close" data-dismiss="modal">&times;</button>
								<a href="http://182.73.137.51:9999/save_business_step">&times;</a>-->
								<h4 class="modal-title">Log In</h4>
						</div>
						<div class="modal-body">
								<form method="POST" action="http://182.73.137.51:9999" accept-charset="UTF-8" name="frmLogin" id="sign_in" class="form form-validate" enctype="multipart/form-data"><input name="_token" type="hidden" value="TrJFDpEyIGt5rzYSLNK9FLvYnVAQxZpcMCqur0eg">
								<input id="hidval" class="buttonM bBlue" name="action" type="hidden" value="Process">
								<input id="type" class="buttonM bBlue" name="type" type="hidden" value="Investor">
										<div class="form_sep">
												<label class="req"><b>Email</b></label>
												<input id="email" placeholder="Email" class="form-control parsley-validated required" required="required" name="email" type="email" value="">
										</div>
										<div class="form_sep">
												<label class="req"><b>Password</b></label>
												<input id="password" placeholder="Password" class="form-control parsley-validated required" required="required" name="password" type="password" value="">
										</div>
										<div>&nbsp;</div>
										<div class="form_sep">
												<div class="modal-footer">
														<a href="http://182.73.137.51:9999" class="btn btn-default">Close</a>
														<input id="submit" class="buttonM bBlue" type="submit" value="Login">
														<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
												</div>
												<div id="errormsg" style="color:red;"></div>
										</div>
										<div class="form_sep">
												<div class="modal-footer">
														<a href="http://182.73.137.51:9999/save_invester_step" style="text-decoration:none;">Sign Up&nbsp;&nbsp;</a>
														<a href="http://182.73.137.51:9999" style="text-decoration:none;">&nbsp;&nbsp;Forgot Password?</a>
												</div>
										</div>
								</form> 
						</div>
				</div>
    </div>
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="csrf-token" content="TrJFDpEyIGt5rzYSLNK9FLvYnVAQxZpcMCqur0eg"/>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Invest System</title>
<script>var base_url = 'http://182.73.137.51:9999';</script>
<link href="http://182.73.137.51:9999/admin_assets/css/styles.css" rel="stylesheet" type="text/css" />
<!--[if IE]> <link href="css/ie.css" rel="stylesheet" type="text/css"> <![endif]-->


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/charts/excanvas.min.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/charts/jquery.flot.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/charts/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/charts/jquery.flot.pie.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/charts/jquery.flot.resize.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/charts/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/tables/jquery.sortable.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/tables/jquery.resizable.js"></script>

<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.autosize.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.uniform.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.autotab.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.select2.min.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.cleditor.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.ibutton.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.validationEngine.js"></script>

<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/wizards/jquery.form.wizard.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/wizards/jquery.validate.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/wizards/jquery.form.js"></script>

<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.fancybox.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.fileTree.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/others/jquery.fullcalendar.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/others/jquery.elfinder.js"></script>

<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/forms/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/plugins/ui/jquery.easytabs.min.js"></script>
		
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>



<!--<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/files/bootstrap.js"></script>-->


<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/files/login.js"></script>
<!--<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/files/functions.js"></script>-->
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/custom_script.js"></script>
		
<script type="text/javascript" src="http://182.73.137.51:9999/admin_assets/js/jquery.validate.my-methods.js"></script>		
</head>

<body>

<!-- Top line begins -->
<!-- Sidebar ends -->
<script>
//var countChecked = function(event) {
//  var n = $( "input[name='page[]']:checked" ).length;
//  if (n<1) {
//    event.preventDefault();
//    alert('Please select atleast one item to delete');
//    $('#apply_action option:eq(0)').attr("selected", "selected");
//  }
//  else{
//    $('#frmPages').submit();
//  }
//}; 
//$( "#apply_action" ).on( "change", countChecked );
//
//$(".chkBox").click(function(){
//        var status = $(this).is(':checked');
//	if (status)
//	{
//	   $(this).parent().addClass('checked');
//	}
//	else
//	{
//	    $(this).parent().removeClass('checked');
//	}
//})

//$('#titleCheck').bind('click', function(){
//
//    var status = $(this).is(':checked'); 
//    $('input[name="page[]"]').attr('checked', status);
//    if (status) {
//	$('input[name="page[]"]').parent().addClass('checked');
//    } else {
//	$('input[name="page[]"]').parent().removeClass('checked');
//    }
//    
//});

</script>

<div class="loginWrapper">
		<div class="errorSuccess">
														</div>
		<div class="chooseUserType">
				<ul>
						<li><a class="investor" data-toggle="modal" data-target="#myModal">Investors "I WANT TO INVEST"</a></li>
						<li><a href="http://182.73.137.51:9999/save_business_step" class="business">Business Start Up "INVEST IN ME"</a></li>
				</ul>
				<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>-->
		</div>

</div>
<script>
$('.investor').click(function(){
		$('.chooseUserType').css('display','none');
		$('.investor_div').css('display','block');
		$('.errorSuccess').css('display','none');
});

$('.business').click(function(){
		$('.chooseUserType').css('display','none');
		$('.business_div').css('display','block');
		$('.errorSuccess').css('display','none');
});

$('.back_lnk').click(function(){
		$('.investor_div').css('display','none');
		$('.business_div').css('display','none');
		$('.chooseUserType').css('display','block');
});   
</script>
		
<script>
		$(document).ready(function(){
				$("#sign_in").validate({
						rules: {		
								email: {
										required: true,
										email: true
								},
								password: {
										required: true,
										minlength: 6,
								},
						},
						messages: {
								password: {
										required: "Please provide a password",
										minlength: "Your password must be at least 6 characters long"
								},
								email: "Please enter a valid email address",
						},
						submitHandler: function() {
								var base_url_suffix	= '';
								var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
								var url = base_url + 'sign_in';
								$.ajax({
										type: "POST",
										url: url,
										data: $("#sign_in").serialize(),
										beforeSend: function(){
								
										},
										dataType: "json",
										success: function(response){ 				   					
												if(response.id > 0){
														window.location.href= base_url+ 'investor_dashboard';
												}
												else{ 
														alert("Fail");
														$('#errormsg').html('Login Failed!!');		
												}
										}
								});
						}
				});
		});
</script>

</body>
</html>