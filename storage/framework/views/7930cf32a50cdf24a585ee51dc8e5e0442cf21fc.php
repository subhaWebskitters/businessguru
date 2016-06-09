<?php $__env->startSection('content'); ?>
<div class="loginWrapper">
	        <?php if(Session::has('errorMessage')): ?>            
		<div class="alert alert-danger">
			<ul>
			<li><?php echo e(Session::get('errorMessage')); ?></li>
			</ul>
		</div>
	        <?php endif; ?>
	       <?php if(Session::has('successMessage')): ?>
		<div class="alert alert-success">
			<ul>
			<li><?php echo e(Session::get('successMessage')); ?></li>
			</ul>
		</div>
		<?php endif; ?>
		<?php if(isset($errors) && $errors->any()): ?>
       <ul class="alert alert-danger">
       <?php foreach($errors->all() as $error): ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; ?>
       </ul>
       <?php endif; ?>
      <div class="loginFiledLt leftCls">
      <?php echo Form::open(['route'=>'change_admin_password']); ?>

          
          <div class="form-group"> 
	    <?php echo Form::password('change_password',array('id'=>'change_password','placeholder'=>'Password','class'=>'form-control input-lg','data-required-message'=>'Please enter a valid Password','data-required'=>'true','data-minlength'=>'6','data-minlength-message'=>'Password should have at least 6 characters.')); ?>

	    
	    <?php echo Form::hidden('email_enc', $admin_email, array('id' => 'email_enc')); ?>

          </div>
          <div class="login_submit">
	  <p></p>
	  <?php echo Form::submit('Change Password',array('id'=>'change_password','class'=>'buttonM bBlue')); ?>           
          </div>         
      <?php echo Form::close(); ?>

         
      </div>
     
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>