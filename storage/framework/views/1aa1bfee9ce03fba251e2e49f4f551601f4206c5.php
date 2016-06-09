<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Job Tracking System Administration Section</title>
<script>var base_url = '<?php echo e(URL::route('admin')); ?>';</script>
<link href="<?php echo e(asset('admin_assets/css/styles.css')); ?>" rel="stylesheet" type="text/css" />
<!--[if IE]> <link href="css/ie.css" rel="stylesheet" type="text/css"> <![endif]-->


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/charts/excanvas.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/charts/jquery.flot.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/charts/jquery.flot.orderBars.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/charts/jquery.flot.pie.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/charts/jquery.flot.resize.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/charts/jquery.sparkline.min.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/tables/jquery.dataTables.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/tables/jquery.sortable.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/tables/jquery.resizable.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.autosize.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.uniform.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.inputlimiter.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.tagsinput.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.maskedinput.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.autotab.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.select2.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.dualListBox.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.cleditor.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.ibutton.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.validationEngine-en.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.validationEngine.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/uploader/plupload.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/uploader/plupload.html4.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/uploader/plupload.html5.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/uploader/jquery.plupload.queue.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/wizards/jquery.form.wizard.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/wizards/jquery.validate.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/wizards/jquery.form.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.collapsible.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.breadcrumbs.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.tipsy.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.progress.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.timeentry.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.colorpicker.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.jgrowl.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.fancybox.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.fileTree.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.sourcerer.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/others/jquery.fullcalendar.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/others/jquery.elfinder.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/forms/jquery.mousewheel.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/plugins/ui/jquery.easytabs.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/files/bootstrap.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/files/login.js')); ?>"></script>
<!--<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/files/functions.js')); ?>"></script>-->
<script type="text/javascript" src="<?php echo e(asset('admin_assets/js/custom_script.js')); ?>"></script>
</head>

<body>

<!-- Top line begins -->
<?php if(Session::has('USER_ACCESS_ID')): ?>
<div id="top">
    <div class="wrapper">
        <a href="<?php echo e(URL::route('dashboard')); ?>" title="" class="logo">Job Tracking System</a>
        
        <!-- Right top nav -->
        <!--<div class="topNav">
            <ul class="userNav">
                <li><a title="" class="search"></a></li>
                <li><a href="#" title="" class="screen"></a></li>
                <li><a href="#" title="" class="settings"></a></li>
                <li class="showTabletP"><a href="#" title="" class="sidebar"></a></li>
            </ul>
            <a title="" class="iButton"></a>
            <a title="" class="iTop"></a>
            <div class="topSearch">
                <div class="topDropArrow"></div>
                <form action="">
                    <input type="text" placeholder="search..." name="topSearch" />
                    <input type="submit" value="" />
                </form>
            </div>
        </div>-->
        
        <!-- Responsive nav -->
        
	
	<!--<ul class="altMenu">
            <li></li>
        </ul>  -->      
        
    
	</div>
        
      
        <div class="mainNav">
        <div class="user">
            <a title="" class="leftUserDrop">
                <!--<img src="" alt=""  width="72" height="70" />--><span><!--<strong>3</strong>--></span>
            </a><span></span>
            <ul class="leftUser">
                <li><a href="" title="" class="sProfile">My profile</a></li>                
                <li class="LogoutText"><a href="" title="">Logout</a></li>
            </ul>
        </div>
        
        <!-- Responsive nav -->
        <div class="altNav">
            <div class="userSearch">
                <form action="">
                    <input type="text" placeholder="search..." name="userSearch" />
                    <input type="submit" value="" />
                </form>
            </div>
            
            <!--<ul class="userNav">
                <li><a href="#" title="" class="profile"></a></li>
                <li><a href="#" title="" class="messages"></a></li>
                <li><a href="#" title="" class="settings"></a></li>
                <li><a href="#" title="" class="logout"></a></li>
            </ul>-->
        </div>
        
        <!-- Main nav -->
	
        <ul class="nav">
	
	    <li <?php if(Route::current()->getName() == 'dashboard'): ?> <?php echo e("class=activemenu"); ?> <?php endif; ?> ><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>

	    <li <?php if(Route::current()->getName() == 'project'||Route::current()->getName() =='client'||Route::current()->getName() =='discussion'): ?> <?php echo e("class=activemenu"); ?> <?php endif; ?>>
	    <a href="javascript:;">Project</a>
		<ul>
		    <li <?php if(Route::current()->getName() == 'project'): ?> <?php echo e("class=activemenu"); ?> <?php endif; ?> ><a href="<?php echo e(URL::route('client_project_list')); ?>">Project List</a></li>
		</ul>
	    </li>
	    <li><a href="<?php echo e(URL::route('user_logout')); ?>">Logout</a></li>
        </ul>
	
    </div>
</div>
	
<!-- Top line ends -->


<!-- Sidebar begins -->
<!--<div id="sidebar">

    <div class="secNav">
         
   </div>
</div>-->
	<?php endif; ?>
<!-- Sidebar ends -->
<script>
var countChecked = function(event) {
  var n = $( "input[name='page[]']:checked" ).length;
  if (n<1) {
    event.preventDefault();
    alert('Please select atleast one item to delete');
    $('#apply_action option:eq(0)').attr("selected", "selected");
  }
  else{
    $('#frmPages').submit();
  }
}; 
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

$('#titleCheck').bind('click', function(){

    var status = $(this).is(':checked'); 
    $('input[name="page[]"]').attr('checked', status);
    if (status) {
	$('input[name="page[]"]').parent().addClass('checked');
    } else {
	$('input[name="page[]"]').parent().removeClass('checked');
    }
    
});


</script>

<?php echo $__env->yieldContent('content'); ?>

</body>
</html>