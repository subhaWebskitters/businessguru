<?php $__env->startSection('content'); ?>
<div class="upper_tab" style="display:none">
		<ul>
				<li class="basic_tab">BASICS</li>
				<li class="portfolio_tab">PORTFOLIO</li>
				<li class="funds_tab">FUNDS</li>
		</ul>
</div>
<div class="loginWrapper">
		<?php if(Session::has('errmsg')): ?>
				<div class="alert alert-success"><strong><?php echo e(Session::get('errmsg')); ?></strong></div>
		<?php endif; ?>
		<div class="signup_basic">
				<?php echo Form::open(['route'=>['sign_up'],'id'=>'save_invester_step','class' => 'form form-validate','enctype'=>'multipart/form-data']); ?>

	    <?php echo Form::hidden('email',$email,array('id'=>'email','placeholder'=>'Email','class'=>'form-control')); ?>

	    <?php echo Form::hidden('password',$password,array('id'=>'password','placeholder'=>'Password','class'=>'form-control')); ?>

						<!--<div id="investor_div">
								Register An Account
								<div class="form-group"> 
										<?php echo Form::email('email','',array('id'=>'email','placeholder'=>'Email','class'=>'form-control parsley-validated required','required' => 'required')); ?>

								</div>
								<div class="form-group"> 
										<?php echo Form::password('password',array('id'=>'password','placeholder'=>'Password','class'=>'form-control parsley-validated required','required' => 'required')); ?>       
								</div>
								<div class="form-group"> 
										<?php echo Form::password('password_confirmation',array('id'=>'password_confirmation','placeholder'=>'Retype Password','class'=>'form-control')); ?>     
								</div>
								<div class="logControl">
										<div class="memory"><!--<a id="reg_form" class="form_toggle">Back</a></div>
										<?php echo Form::button('Next',array('id'=>'go_to_basic','class'=>'buttonM bBlue')); ?>

								</div>           
						</div>-->
				
						<div class="formRow" style="display:block;" id="form_basic">
								<div class="">
										<div class="form_sep">
												Welcome to Invest System. We just need a few more details...
										</div>
										<?php echo Form::text('otp_verified',0,array('id'=>'otp_verified')); ?>

										<div class="form_sep">
												<label class="req">Are you A/An</label>
												<?php echo Form::radio('investor_type', 'Individual'); ?> Individual<br>
												<?php echo Form::radio('investor_type', 'VC Firm'); ?> VC Firm
										</div>
										<div class="form_sep">
												<label class="req">Name</label>
												<?php echo Form::text('name','',array('id'=>'name','placeholder'=>'Name','class'=>'form-control')); ?>

										</div>
										<div class="form_sep">
												<label class="req">Contact*</label>
												<?php echo Form::number('contact','',array('id'=>'contact','placeholder'=>'Contact No With STD Code','class'=>'form-control')); ?>

												<a href="javascript:void(0)" class="verify_otp">Verify OTP</a>
												<span class="otp_status"></span>
										</div>
										<!--
										<div class="form_sep">
												<label class="req">Email</label>
												<?php echo Form::email('email','',array('id'=>'email','placeholder'=>'Email','class'=>'form-control','readonly')); ?>

										</div>
										-->
										<div class="form_sep">
												<label class="req">Company*</label>
												<?php echo Form::text('company_name','',array('id'=>'company_name','placeholder'=>'Company Name','class'=>'form-control')); ?>

										</div>
										<div class="form_sep">
												<label class="req">ARCA No*</label>
												<?php echo Form::text('arca_no','',array('id'=>'arca_no','placeholder'=>'ARCA No','class'=>'form-control')); ?>

										</div>
										<div class="form_sep">
												<label class="req">Address</label>
												<?php echo Form::text('address','',array('id'=>'address','placeholder'=>'Address','class'=>'form-control')); ?>

										</div>
										<div class="form_sep">
												<label class="req">Photo/Logo</label>
												<?php echo Form::file('image',array('id'=>'fileUpload','class'=>'form-control')); ?>

												<div id="image-holder"></div>
										</div>
										<div class="logControl">
												<div class="memory"><a id="back_to_basic" class="form_toggle">Back</a></div>
												<?php echo Form::button('Next',array('id'=>'go_to_protfolio','class'=>'buttonM bBlue')); ?>

										</div>  
								</div>
						</div>
		
						<div class="formRow" style="display:none;" id="form_portfolio">
								<div class="form_sep">
										<label class="req">About You / Company</label>
										<?php echo Form::textarea('about_company', null, ['id'=>'about_company','class' => 'field desc']); ?>

										<div id="textarea_feedback" style="color:red;"></div>
								</div>
								<div class="form_sep">
										<label class="req">Upload your Bio/Portfolio(PDF/Doc)</label>
										<?php echo Form::file('portfolio',array('id'=>'portfolioUpload','class'=>'form-control')); ?>

								</div>
								<div class="form_sep">
										<label class="req">What are the industries you are interested ?</label>
										<?php echo Form::select('industry_status[]', $industries,'',array('class' => 'form-control required ddown','id'=> 'industries','multiple'=>'multiple')); ?>

								</div>
								<div id="msg" style="color:red;"></div>
								<script>
										$(document).ready(function(){
												$("#industries").on("change", function(){
														var msg = $("#msg");
														var count = 0;
														for (var i = 0; i < this.options.length; i++){
																var option = this.options[i];
																option.selected ? count++ : null;
																
																if (count > 3){
																		option.selected = false;
																		//option.disabled = true;
												            msg.html("Please select only three options.");
																}
														}
												});
										});
								</script>
								<div class="form_sep">
										<a href="javascript:history.go(-1);" class="form_toggle">Back</a>
										<?php echo Form::button('Next',array('id'=>'go_to_fund_next','class'=>'buttonM bBlue')); ?>

								</div>
						</div>
								
								
						<div class="formRow" style="display:none;" id="form_fund">
								<div class="form_sep">
										<label class="req"><b>A Investment in knowledge pays the best interest- Benjamin Franclin</b></label>
										<span>&nbsp;</span>
								</div>
								<div class="form_sep">
										<label class="req">Annual Salary</label>
										<?php echo Form::select('annual_salary', array('100000' => '100000','200000'=>'200000','300000'=>'300000','400000'=>'400000'),'',array('class' => 'form-control','id'=> 'annual_salary')); ?>

								</div>
								<div class="form_sep">
										<label class="req">How much are you willing to invest?</label>
										<?php echo Form::select('willing_to_invest', array('100000' => '100000','200000'=>'200000','300000'=>'300000','400000'=>'400000'),'',array('class' => 'form-control','id'=> 'willing_to_invest')); ?>

								</div>
								<div class="form_sep">
										<a href="javascript:history.go(-1);" class="form_toggle">Back</a>
										<?php echo Form::button('Next',array('id'=>'go_to_completion','class'=>'buttonM bBlue')); ?>

								</div>
						</div>
								
						
				<?php echo Form::close(); ?>        
		</div>
</div>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>