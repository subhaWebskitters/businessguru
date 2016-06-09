<?php $__env->startSection('content'); ?>

<div class="loginWrapper">
		
<div id="main" class="clear chng-pwd">
    <div class="tab_sec">
      <div class="main_container">
	
	<div id="horizontalTab">
	 
	  <div class="resp-tabs-container">
	    
	    <div class="accordian_box">
		<div class="tab_content clear">
		
		<?php if(Session::has('errmsg')): ?>
				<div class="alert alert-error" ><strong><?php echo e(Session::get('errmsg')); ?></strong></div>
		<?php endif; ?>
		<?php if(Session::has('succmsg')): ?>
				<div class="alert alert-success"><strong><?php echo e(Session::get('succmsg')); ?></strong></div>
		<?php endif; ?>
		<div class="errorSuccess" style="color:red;">
				
				<?php if(isset($errors) && $errors->any()): ?>
						<div class="alert alert-error">
								<?php foreach($errors->all() as $error): ?>
										<p><?php echo e($error); ?></p>
								<?php endforeach; ?>
						</div>
				<?php endif; ?>
		</div>
		  
		 
		  <?php echo Form::open(['route'=>['business_do_changepassword'],'id'=>'changepass','class' => 'form form-validate tab3_option1 clear accountTypePan','enctype'=>'multipart/form-data']); ?>

		    <?php echo Form::hidden('action','Process',array('id'=>'hidval')); ?>

		    <?php echo Form::hidden('type','Business',array('id'=>'type')); ?>

		    <?php echo Form::hidden('action','Process',array('id'=>'hidval')); ?>

		    <div class="tab3_inner">
		      <h2>Change Your Password</h2>
		      
		      
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Old Password</label>
			  <div class="one_tab_inner">
			    <div>
			      
			      <?php echo Form::password('old_password','',array('id'=>'old_password','placeholder'=>'Old Password','class'=>'form-control required','required' => 'required')); ?>

			    </div>
			  </div>
			</div>
		      </div>
		
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Current Password</label>
			  <div class="one_tab_inner">
			    <div>
			      
			      <?php echo Form::password('password','',array('id'=>'password','placeholder'=>'Current Password','class'=>'form-control required')); ?>

			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Retype Password</label>
			  <div class="one_tab_inner">
			    <div>
			      
			      <?php echo Form::password('password_confirm','',array('id'=>'password_confirm','placeholder'=>'Confirm Password','class'=>'form-control required')); ?>

			    </div>
				     
			  </div>
			</div>
		      </div>

		      
		    </div>
		    <div class="submit_form">
				<?php echo Form::submit('Submit',array('id'=>'submit','class'=>'buttonM bBlue')); ?>

		    </div>
		  <?php echo Form::close(); ?>

		  

		    
		</div>
		
	    </div>

	    
	  </div>
        </div>
	
      </div>
    </div>
    <span class="live_chat"><img src="<?php echo e(asset('front_assets/assets/images/live_chat.png')); ?>" alt="no img"></span>
  </div>


</div>
<script>
$(document).ready(function(){
		$("#changepass").validate({
				rules: {		
						old_password: {
								required: true
						},
						password: {
								required: true
								
						},
						password_confirm: {
								required: true
						},
						

				},
				messages: {
						old_password: 	   "Please enter old password.",
						password: 	   "Please enter a password.",
						password_confirm:  "Please re-type Password.",
						
				},
				submitHandler: function(form) {
				    form.submit();
				}
		});
		
		
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>