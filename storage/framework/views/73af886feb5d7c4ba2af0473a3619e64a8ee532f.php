<!DOCTYPE html>
<html lang="en">
<head><title>Business Guru</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--Loading bootstrap css-->
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/font-awesome/css/font-awesome.min.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/bootstrap/css/bootstrap.min.css')); ?>">
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/animate.css/animate.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/vendors/iCheck/skins/all.css')); ?>">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/css/themes/style1/pink-blue.css')); ?>" class="default-style">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/css/themes/style1/pink-blue.css')); ?>" id="theme-change" class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('admin_assets/css/style-responsive.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('admin_assets/images/favicon.ico')); ?>">
</head>
<body id="signin-page">
<div class="page-form">
                <?php if(Session::has('errorMessage')): ?>            
		<div class="alert alert-danger">
			<ul>
			<li><?php echo e(Session::get('errorMessage')); ?></li>
			</ul>
		</div>
		<?php endif; ?>
                <?php if(Session::has('succMessage')): ?>            
		<div class="note note-success">
			<p><?php echo e(Session::get('succMessage')); ?></p>
		</div>
		<?php endif; ?>
    <?php echo Form::open(array('route' => 'admin', 'class' => 'form-validate','novalidate','id' => 'login_form')); ?>

        <div class="header-content"><h1>Log In</h1></div>
        <div class="body-content">

           
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Enter your Email"  value="<?php echo e($admin_email); ?>" name="admin_email" class="form-control required"></div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input type="password" placeholder="Enter your Password" name="admin_password" class="form-control required" value="<?php echo e($admin_password); ?>"></div>
            </div>
            <div class="form-group pull-left">
                <div class="checkbox-list"><label><input type="checkbox" name="remember_login"  <?php if($admin_email): ?> checked='checked' <?php endif; ?>>&nbsp;
                    Keep me signed in</label></div>
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success">Log In
                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
            <div class="clearfix"></div>
            <!--<div class="forget-password"><h4>Forgotten your Password?</h4>

                <p>no worries, click <a href='#' class='btn-forgot-pwd'>here</a> to reset your password.</p></div>
            <hr>-->
            </div>
    <?php echo Form::close(); ?>

</div>
<script src="<?php echo e(asset( 'admin_assets/js/jquery-1.10.2.min.js')); ?>"></script>
<script src="<?php echo e(asset( 'admin_assets/js/jquery-migrate-1.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset( 'admin_assets/js/jquery-ui.js')); ?>"></script>
<!--loading bootstrap js-->
<script src="<?php echo e(asset( 'admin_assets/vendors/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset( 'admin_assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js')); ?>"></script>
<script src="<?php echo e(asset( 'admin_assets/js/html5shiv.js')); ?>"></script>
<script src="<?php echo e(asset( 'admin_assets/js/respond.min.js')); ?>"></script>
<script src="<?php echo e(asset( 'admin_assets/vendors/iCheck/icheck.min.js')); ?>"></script>
<script src="<?php echo e(asset( 'admin_assets/vendors/iCheck/custom.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendors/jquery-validate/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/js/form-validation.js')); ?>"></script>    
<script>//BEGIN CHECKBOX & RADIO
$('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-grey',
    increaseArea: '20%' // optional
});
$('input[type="radio"]').iCheck({
    radioClass: 'iradio_minimal-grey',
    increaseArea: '20%' // optional
});
//END CHECKBOX & RADIO</script>
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
ga('create', 'UA-145464-12', 'auto');
ga('send', 'pageview');</script>
</body>
</html>