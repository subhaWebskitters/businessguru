<?php $__env->startSection('content'); ?>
  <div class="loginWrapper">

  <div class="adminLogin">
      <?php echo Form::open(['route'=>'admin','class' => 'form form-validate']); ?>

      <div class="loginPic">
            <a href="#" title=""><img src="<?php echo e(asset('admin_assets/images/userLogin2.png')); ?>" alt="" /></a>
	     <?php if(Session::has('errorMessage')): ?>
	  
			<div class="nNote nFailure">
				<p><?php echo e(Session::get('errorMessage')); ?></p>
			</div>
		
		
	        <?php endif; ?>
	       <?php if(Session::has('successMessage')): ?>
		
			<div class="nNote nSuccess">
				<?php echo e(Session::get('successMessage')); ?>

			</div>
		
		
	      <?php endif; ?>
	       <?php if(isset($errors) && $errors->any()): ?>
       <div class="nNote nFailure">
       <?php foreach($errors->all() as $error): ?>
        <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
      </div>
       <?php endif; ?>
        </div>
	  
          <div class="form-group"> 
	   <?php echo Form::text('admin_email','',array('id'=>'admin_email','placeholder'=>'Email','class'=>'form-control input-lg required email loginEmail','data-required-message'=>'Please enter a valid Username','data-required'=>'true','data-minlength'=>'2')); ?>

          </div>
          <div class="form-group"> 
	    <?php echo Form::password('admin_password',array('id'=>'admin_password','placeholder'=>'Password','class'=>'form-control input-lg required loginPassword','data-required-message'=>'Please enter a valid Password','data-required'=>'true','data-minlength'=>'6','data-minlength-message'=>'Password should have at least 6 characters.')); ?>         
          </div>
	    <div class="logControl">
            <div class="memory"><a class="form_toggle" id="reg_form">Forgot Password ? </a></div>
           <?php echo Form::submit('Log In',array('id'=>'log_in','class'=>'buttonM bBlue')); ?>     
        </div>
               
      <?php echo Form::close(); ?>

</div>
 <div class="forgotLogin" style="display:none;">

        <?php echo Form::open(['route'=>'forgot_password','id'=>'register_form','class' => 'form form-validate']); ?>

	 <div class="loginPic">
            <div class="loginActions">
               <a class="form_toggle"  id="login_form">send me back to the sign-in screen</a>
            </div>
        </div>
        <div class="form-group">
          <?php echo Form::text('login_username','',array('id'=>'login_username','placeholder'=>'Email','class'=>'form-control input-lg required email loginEmail','data-required'=>'true')); ?>

        </div><p></p>
        <div class="login_submit">
           <?php echo Form::submit('Forgot Password',array('id'=>'forgot_password','class'=>'buttonM bBlue')); ?> 
        </div>
        <?php echo Form::close(); ?>

        
  </div>
 </div>
  <script>
    $(document).ready(function(){
      $(document).on('click','#reg_form',function(){
      $('.forgotLogin').css('display','block');
      $('.adminLogin').css('display','none');
      });
      $(document).on('click','#login_form',function(){
      $('.forgotLogin').css('display','none');
      $('.adminLogin').css('display','block');
      });
    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>