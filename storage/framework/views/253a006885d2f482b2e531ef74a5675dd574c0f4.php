<?php $__env->startSection('content'); ?>


<div class="loginWrapper">
		
<div id="main" class="clear edit-profile">
    <div class="tab_sec">
      <div class="main_container">
	
	<div id="horizontalTab">
	 
	  <div class="resp-tabs-container">
	    
	    <div class="accordian_box">
		<div class="tab_content clear">
		
		<?php if(Session::has('errmsg')): ?>
				<div class="alert alert-error"><strong><?php echo e(Session::get('errmsg')); ?></strong></div>
		<?php endif; ?>
		<?php if(Session::has('succmsg')): ?>
				<div class="alert alert-success"><strong><?php echo e(Session::get('succmsg')); ?></strong></div>
		<?php endif; ?>
		<div class="errorSuccess" style="color:red;">
				
				<?php if(isset($errors) && $errors->any()): ?>
						<div class="alert  alert-error">
								<?php foreach($errors->all() as $error): ?>
										<p><?php echo e($error); ?></p>
								<?php endforeach; ?>
						</div>
				<?php endif; ?>
		</div>
		  
		 
		<?php echo Form::open(['route'=>['updateprofile'],'id'=>'save_invester_step','class' => 'form form-validate','enctype'=>'multipart/form-data','onSubmit'=> 'return validate()']); ?>

		<?php echo Form::hidden('action','Process',array('id'=>'hidval')); ?>

		<?php echo Form::hidden('type','Investor',array('id'=>'type')); ?>		
		<?php echo Form::hidden('profileid',$investor_details->id,array('id'=>'profileid')); ?>

		    <div class="tab3_inner">
		      <h2>Update Account</h2>
		      
		      
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			   <label class="req">Email</label>
			  <div class="one_tab_inner">
			   
			    
			    <?php echo e($investor_details->email); ?>

			    
			  </div>
			</div>
		      </div>
		
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Name</label>
			  <div class="one_tab_inner">
			    <div>
			    
			    <?php echo Form::text('name',$investor_details->name,array('id'=>'name','placeholder'=>'Name','class'=>'form-control required','required' => 'required')); ?>

			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Contact</label>
			  <div class="one_tab_inner">
			    <div>
				<?php echo Form::text('contact',$investor_details->contact,array('id'=>'contact','placeholder'=>'Contact','class'=>'form-control  required','required' => 'required')); ?>

			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Company Name</label>
			  <div class="one_tab_inner">
			    <div>
				
				<?php echo Form::text('company_name',$investor_details->company_name,array('id'=>'company_name','placeholder'=>'Company Name','class'=>'form-control required','required' => 'required')); ?>

			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Address</label>
			  <div class="one_tab_inner">
			    <div>
				
				<?php echo Form::text('address',$investor_details->address,array('id'=>'address','placeholder'=>'Address','class'=>'form-control  required','required' => 'required')); ?>

			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Photo/Logo</label>
			  <div class="one_tab_inner">
			    <div>
				
				<?php echo Form::file('image',array('id'=>'image','class'=>'form-control demoInputBox')); ?>

				<span id="file_error"></span>
				<br>
				<div class="image-display">
				<?php echo e(Html::image(asset('upload/Investor/thumb/'.$investor_details->image),$investor_details->image,array())); ?>

				</div>
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
		$("#save_invester_step").validate({
				rules: {		
						name: {
								required: true
						},
						company_name: {
								required: true
								
						},
						address: {
								required: true
						},
						contact: {
								required: true
						},
						

				},
				messages: {
						contact: 	   "Please enter contact no.",
						address: 	   "Please enter address.",
						company_name:  "Please enter company name.",
						name:  "Please enter name.",
												
				},
				submitHandler: function(form) {
				    form.submit();
				}
		});
		
		
});

function validate() {
	$("#file_error").html("");
	$(".demoInputBox").css("border-color","#F0F0F0");
	var file_size = $('#image')[0].files[0].size;
	
	if(file_size>2097152) {
		$("#file_error").html("File size is greater than 2MB");
		$(".demoInputBox").css("border-color","#FF0000");
		return false;
	} 
	return true;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>