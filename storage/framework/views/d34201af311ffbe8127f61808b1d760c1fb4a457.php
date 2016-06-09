<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
<title>Welcome to Job Tracking System</title>
<link rel="stylesheet" href="<?php echo e(asset('admin_assets/bootstrap/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin_assets/css/todc-bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin_assets/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin_assets/css/theme/color_1.css')); ?>" id="theme">
<link href='http://fonts.googleapis.com/css?family=Roboto:300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo e(asset('admin_assets/css/custom-styles.css')); ?>">
<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<!--[if lt IE 9]>
		<script src="<?php echo e(asset('admin_assets/js/ie/html5shiv.js')); ?>"></script>
		<script src="<?php echo e(asset('admin_assets/js/ie/respond.min.js')); ?>"></script>
	<![endif]-->
</head>
<body>

<div class="login_wrapper">
	<?php echo $__env->yieldContent('content'); ?>
</div>
<script src="<?php echo e(asset('admin_assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/js/form-validation.js')); ?>"></script> 
<!-- jquery cookie --> 
<script src="<?php echo e(asset('admin_assets/js/jquery_cookie.min.js')); ?>"></script> 
<script src="<?php echo e(asset('admin_assets/js/lib/parsley/parsley.min.js')); ?>"></script> 
<script>
		$(function() {
			
			//* validation
			$('#login_form').parsley({
				errors: {
					classHandler: function ( elem, isRadioOrCheckbox ) {
						if(isRadioOrCheckbox) {
							return $(elem).closest('.form_sep');
						}
					},
					container: function (element, isRadioOrCheckbox) {
						if(isRadioOrCheckbox) {
							return element.closest('.form_sep');
						}
					}
				}
			});
			
			//* change form
			$('.form_toggle').on('click',function(e){
				$('.login_panel').slideToggle(function() {
					if($('.log_section').is(':visible')) {
						$('.login_toggle').closest('li').addClass('active').siblings('li').removeClass('active');
					} else {
						$('.register_toggle').closest('li').addClass('active').siblings('li').removeClass('active');
					}
				});
				e.preventDefault();
			});
			
			$('.login_toggle').on('click',function(e){
				if($('.log_section').is(':hidden')) {
					$('.reg_section').slideUp();
					$('.log_section').slideDown();
					$(this).closest('li').addClass('active').siblings('li').removeClass('active');
				}
				e.preventDefault();
			});
			$('.register_toggle').on('click',function(e){
				if($('.reg_section').is(':hidden')) {
					$('.log_section').slideUp();
					$('.reg_section').slideDown();
					$(this).closest('li').addClass('active').siblings('li').removeClass('active');
				}
				e.preventDefault();
			});
			
			// set theme from cookie
			if($.cookie('ebro_color') != undefined) {
				$('#theme').attr('href','css/theme/'+$.cookie('ebro_color')+'.css');
			}
			
		});
	</script>
</body>
</html>