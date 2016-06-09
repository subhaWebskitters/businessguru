	<?php /**/
	$controller = Helpers::getRoute('controller');
	$action = Helpers::getRoute('action');
	$alise = Helpers::getRoute('alise');
	/**/ ?>

<!DOCTYPE html>
<html lang="en">
<head><title>Business Guru Admin </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/font-awesome/css/font-awesome.min.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/bootstrap/css/bootstrap.min.css')); ?>">
    <!--LOADING STYLESHEET FOR PAGE--><!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/animate.css/animate.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/jquery-pace/pace.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/iCheck/skins/all.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/jquery-notific8/jquery.notific8.min.css')); ?>">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/css/themes/style1/orange-blue.css')); ?>" class="default-style">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/css/themes/style1/orange-blue.css')); ?>" id="theme-change" class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/css/style-responsive.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/css/custom.css')); ?>">
    
    
    <script src="<?php echo e(asset('admin_assets/js/jquery-2.2.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/js/jquery-migrate-1.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/js/jquery-ui.js')); ?>"></script>    
    <!--loading bootstrap js-->
    <script src="<?php echo e(asset('admin_assets/vendors/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/js/html5shiv.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/js/respond.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendors/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendors/slimScroll/jquery.slimscroll.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendors/jquery-cookie/jquery.cookie.js')); ?>"></script>
    
    <?php if(1/*Route::currentRouteName() != 'admin_menu_listing' && Route::currentRouteName() != 'admin_menu_edit'*/): ?>    
<script src="<?php echo e(asset('admin_assets/vendors/iCheck/icheck.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/iCheck/custom.min.js')); ?>"></script>
<?php endif; ?>

<script src="<?php echo e(asset('admin_assets/vendors/jquery-notific8/jquery.notific8.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/jquery-highcharts/highcharts.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/js/jquery.menu.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/jquery-pace/pace.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/holder/holder.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/responsive-tabs/responsive-tabs.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/jquery-news-ticker/jquery.newsTicker.min.js')); ?>"></script>

<script src="<?php echo e(asset('admin_assets/vendors/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin_assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')); ?>"></script>
        
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/bootstrap-datepicker/css/datepicker.css')); ?>">
<!--CORE JAVASCRIPT-->
<script src="<?php echo e(asset('admin_assets/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/jquery-validate/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/js/form-validation.js')); ?>"></script>
<script> var BASE_URL = "<?php echo e(URL::to('/').'/admin'); ?>"; </script>   
<!--<script>
    var FRONT_URL = "<?php echo e(URL::to('/')); ?>";
    var BASE_URL = "<?php echo e(URL::to('/').'/admin'); ?>";
    var CSRF_TOKEN = "<?php echo e(csrf_token()); ?>";
</script>-->
</head>
<body class=" ">
<div>
   
    <!--BEGIN BACK TO TOP--><a id="totop" href=""><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP--><!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="<?php echo e(URL::route('admin_dashboard')); ?>" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">Admin</span><span style="display: none" class="logo-text-icon">HR</span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown topbar-user">
                    <a data-hover="dropdown" href="<?php echo e(URL::route('admin_dashboard')); ?>" class="dropdown-toggle">
                    <?php if(file_exists(public_path().'/upload/adminUser/'.Session::get('ADMIN_ACCESS_IMAGE')) && Session::get('ADMIN_ACCESS_IMAGE') !=''): ?>
                    <?php echo Html::image(asset('upload/adminUser/'.Session::get('ADMIN_ACCESS_IMAGE')), Session::get('ADMIN_ACCESS_IMAGE'),array('class'=>'img-responsive img-circle')); ?>

                    <?php else: ?>
                    <?php echo Html::image(asset('admin_assets/images/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle')); ?>

                    <?php endif; ?>
                    &nbsp;<span class="hidden-xs"><?php echo e(Session::get('ADMIN_ACCESS_NAME')); ?></span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <!--<li><a href="extra-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                            -->
                            <li><a href="<?php echo e(URL::route('edit_profile')); ?>"><i class="fa fa-edit"></i>Edit profile</a></li>
                            <li><a href="<?php echo e(URL::route('admin_logout')); ?>"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </nav>
    </div>
    <!--END TOPBAR-->
    <div id="wrapper">
    <!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    <li class="user-panel">
                        <div class="thumb">
                        <?php if(file_exists(public_path().'/upload/adminUser/'.Session::get('ADMIN_ACCESS_IMAGE')) && Session::get('ADMIN_ACCESS_IMAGE') !=''): ?>
                            <?php echo Html::image(asset('upload/adminUser/'.Session::get('ADMIN_ACCESS_IMAGE')), Session::get('ADMIN_ACCESS_IMAGE'),array('class'=>'img-circle')); ?>

                        <?php else: ?>
                            <?php echo Html::image(asset('admin_assets/images/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle')); ?>

                        <?php endif; ?>
                        </div>
                        <div class="info"><p><?php echo e(Session::get('ADMIN_ACCESS_NAME')); ?></p>
                            <ul class="list-inline list-unstyled">
                                <li><a href="<?php echo e(URL::route('edit_profile')); ?>" data-hover="tooltip" title="Profile"><i class="fa fa-user"></i></a></li>
                              <li><a href="<?php echo e(URL::route('admin_logout')); ?>" data-hover="tooltip" title="Logout"><i class="fa fa-sign-out"></i></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="<?php echo e(Helpers::isActiveRoute('admin_dashboard')); ?>" ><a href="<?php echo e(URL::route('admin_dashboard')); ?>"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>
                    <li class="<?php echo e(Helpers::isActiveRoute('admin_sitesettings')); ?>" ><a href="<?php echo e(URL::route('admin_sitesettings')); ?>"><i class="fa fa-cogs">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Site Settings</span></a></li>
                        
                        
                    
                    <li class="<?php echo e(Helpers::isActiveRoute('currency')); ?><?php echo e(Helpers::isActiveRoute('currency_create')); ?><?php echo e(Helpers::isActiveRoute('currency_create_action')); ?><?php echo e(Helpers::isActiveRoute('currency_edit')); ?><?php echo e(Helpers::isActiveRoute('currency_update_action')); ?><?php echo e(Helpers::isActiveRoute('currency_delete')); ?><?php echo e(Helpers::isActiveRoute('currency_set_status')); ?>" >
                        <a href="<?php echo e(URL::route('currency')); ?>">
                            <i class="fa fa-dollar"></i>
                            <span class="submenu-title">Currency Management</span>
                        </a>
                    </li>
		    <!--<li class="<?php echo e(Helpers::isActiveRoute('homepagebannerlist')); ?><?php echo e(Helpers::isActiveRoute('editbanner')); ?>" >
                        <a href="<?php echo e(URL::route('homepagebannerlist')); ?>">
                            <i class="fa fa-picture-o"></i>
                            <span class="submenu-title">Banner Management</span>
                        </a>
                    </li>-->
                    <li class="<?php echo e(Helpers::isActiveRoute('homepagebannerlist')); ?><?php echo e(Helpers::isActiveRoute('editbanner')); ?><?php echo e(Helpers::isActiveRoute('investorbannerlist')); ?><?php echo e(Helpers::isActiveRoute('addinvestorbanner')); ?><?php echo e(Helpers::isActiveRoute('editinvestorbanner')); ?>"><a href="javascript:void(0);"><i class="fa fa-picture-o"></i>
			<span class="menu-title">Banner Management</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in" style="">
                            <li class="<?php echo e(Helpers::isActiveRoute('homepagebannerlist')); ?><?php echo e(Helpers::isActiveRoute('editbanner')); ?><?php echo e(Helpers::isActiveRoute('addbanner')); ?>"><a href="<?php echo e(URL::route('homepagebannerlist')); ?>"><i class="fa fa-angle-right"></i><span class="submenu-title">Discover Banner </span></a></li>
                            <li class="<?php echo e(Helpers::isActiveRoute('investorbannerlist')); ?><?php echo e(Helpers::isActiveRoute('addinvestorbanner')); ?><?php echo e(Helpers::isActiveRoute('editinvestorbanner')); ?>"><a href="<?php echo e(URL::route('investorbannerlist')); ?>"><i class="fa fa-angle-right"></i><span class="submenu-title">Investor Banner </span></a></li>
                        </ul>
                    </li>   
                    <li class="<?php echo e(Helpers::isActiveRoute('industries_list')); ?>" >
                        <a href="<?php echo e(URL::route('industries_list')); ?>">
                            <i class="fa fa-building-o"></i>
                            <span class="submenu-title">Industry List</span>
                        </a>
                    </li>
                                
                    <li class="<?php echo e(Helpers::isActiveRoute('admin_investors')); ?>" >
                        <a href="<?php echo e(URL::route('admin_investors')); ?>">
                            <i class="fa fa-group"></i>
                            <span class="submenu-title">Investor List</span>
                        </a>
                    </li>
                        
                    <li class="<?php echo e(Helpers::isActiveRoute('admin_business_users')); ?>" >
                        <a href="<?php echo e(URL::route('admin_business_users')); ?>">
                            <i class="fa fa-group"></i>
                            <span class="submenu-title">Business List</span>
                        </a>
                    </li>
		    
		    <li class="<?php echo e(Helpers::isActiveRoute('business_proposal')); ?>" >
                        <a href="<?php echo e(URL::route('business_proposal')); ?>">
                            <i class="fa fa-group"></i>
                            <span class="submenu-title">Business Proposal List</span>
                        </a>
                    </li>
                                
                </ul>
            </div>
        </nav>
    <!--END SIDEBAR MENU-->
    
    <!--BEGIN CHAT FORM-->
     
      
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
         <?php echo $__env->yieldContent('content'); ?>  
        </div>
        <!--BEGIN FOOTER-->
        <div id="footer">
            <div class="copyright"><?php echo e(date('Y')); ?> &copy; Admin</div>
        </div>
        <!--END FOOTER--><!--END PAGE WRAPPER--></div>
</div>
    
    
<script src="<?php echo e(asset('admin_assets/vendors/bootstrap-markdown/js/bootstrap-markdown.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/vendors/summernote/summernote.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/js/ui-editors.js')); ?>"></script>
    

<script src="<?php echo e(asset('admin_assets/js/custom_script.js')); ?>"></script>

<!--LOADING SCRIPTS FOR PAGE-->
<script type="text/javascript">(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-XXXX-XX', 'auto');
ga('send', 'pageview');


</script>
<script>
                                                //$(function(){
                                                //     $('.iCheck-helper').click(function(){
                                                //        alert('ssss');
                                                //    });
                                                //});
                                            </script>
</body>
</html>