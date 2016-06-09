<?php $__env->startSection('content'); ?>
<div class="col-sm-3 col-md-3">
		<div class="page-form">
				<?php if(Session::has('errorMessage')): ?>            
						<div class="alert alert-danger">
								<ul><li><?php echo e(Session::get('errorMessage')); ?></li></ul>
						</div>
				<?php endif; ?>
				<?php if(Session::has('succMessage')): ?>            
						<div class="note note-success">
								<p><?php echo e(Session::get('succMessage')); ?></p>
						</div>
				<?php endif; ?>
				<?php echo Form::open(array('route' => 'do_forgotpassword', 'class' => 'form-validate','novalidate','id' => 'login_form')); ?>

						<div class="header-content logofmr">Give your Email Id:</div>
						<div class="body-content">
								<div class="form-group">
										<div class="input-icon right">
												<i class="fa fa-user"></i>
												<input type="email" placeholder="Email" name="email" class="form-control required email" value="">
										</div>
								</div>
								<div class="form-group">
										<button type="submit" class="btn btn-success">
												Get Password&nbsp;<i class="fa fa-chevron-circle-right"></i>
										</button>
										<a class="investor" data-toggle="modal" data-target="#myModal">Log In</a>
								</div>
								<div class="clearfix"></div>
								<hr>
						</div>
				<?php echo Form::close(); ?>

		</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>