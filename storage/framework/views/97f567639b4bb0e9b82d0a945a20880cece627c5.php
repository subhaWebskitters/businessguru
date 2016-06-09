<?php $__env->startSection('content'); ?>


  <div id="main" class="clear">
    <div class="tab_sec">
      <div class="main_container">
	
	<div id="horizontalTab">
	  <div class="three_option"><h2>Welcome to our company <br> we just need a few more details...</h2></div>
	  <ul class="resp-tabs-list">
	      <li id="basic_li" class="active_list">BASICS</li>
	      <li id="portfolio_li">PORTFOLIO</li>
	      <li id="funds_li">FUNDS</li>
	  </ul>
	  <?php echo Form::open(['route'=>['sign_up'],'id'=>'save_invester_step','class' => 'form form-validate','enctype'=>'multipart/form-data']); ?>

	    <?php echo Form::hidden('email',$email,array('id'=>'email','placeholder'=>'Email','class'=>'form-control')); ?>

	    <?php echo Form::hidden('password',$password,array('id'=>'password','placeholder'=>'Password','class'=>'form-control')); ?>  
	    
	  <div class="resp-tabs-container">
	    <div class="accordian_box" id="form_basic">
	    		
		<div class="three_steps_p2 clear">
		  <ul>
		    <li class="active_icon"><span>&nbsp;</span></li>
		    <li><span>&nbsp;</span></li>
		    <li><span>&nbsp;</span></li>
		  </ul>
		</div>
		
		<div class="three_option clear">
		  <h2>Are you a/an...</h2>
		  <div class="three_option_inner clear">
		    
		    <div class="cust_radio">
		    <?php echo Form::radio('investor_type', 'Individual', '',array('class'=>'regular-radio','id'=>'radio-1-1','checked')); ?> 		     
		      <label for="radio-1-1"></label>
		      <label for="radio-1-1" class="click_radio">Individual</label>
		    </div>
		    <div class="cust_radio">
		    <?php echo Form::radio('investor_type', 'VC Firm', '',array('class'=>'regular-radio','id'=>'radio-1-2')); ?>

		      
		      <label for="radio-1-2"></label>
		      <label for="radio-1-2" class="click_radio">Vc Firm </label>
		    </div>
		    
		  </div>
		</div>
		
		<div class="tab_content clear">
		  
		 
		    <div class="tab_content_left">
		      <div class="tab_form clear">
			<div class="tab_form_left one_tab">
			  <label>Name</label>
			  <div class="one_tab_inner"><?php echo Form::text('name','',array('id'=>'name','placeholder'=>'Name','class'=>'form-control')); ?></div>
			</div>
		      </div>
		      <div class="tab_form clear">
			<div class="tab_form_left one_tab">
			  <label class="dubble_line">Contact<span>(OTP Verification)</span></label>
			  <div class="one_tab_inner"><?php echo Form::number('contact','',array('id'=>'contact','placeholder'=>'Contact No With Area Code','class'=>'form-control')); ?></div>
			    <?php echo Form::hidden('otp_verified',0,array('id'=>'otp_verified')); ?>

			<a href="javascript:void(0)" class="verify_otp">Verify OTP</a>
		      <span class="otp_status"></span>
			
			</div>
		      </div>

		      <div class="tab_form clear">
			<div class="tab_form_left one_tab">
			  <label>Company</label>
			  <div class="one_tab_inner"><?php echo Form::text('company_name','',array('id'=>'company_name','placeholder'=>'Company Name','class'=>'form-control')); ?></div>
			</div>
			<div class="tab_form_right one_tab">
			  <label>Arca No</label>
			  <div class="one_tab_inner"><?php echo Form::text('arca_no','',array('id'=>'arca_no','placeholder'=>'ARCA No','class'=>'form-control')); ?></div>			  
			</div>
		      </div>
		        
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <div class="help_sec">
			    <label>Address</label>
			  </div>
			  <div class="one_tab_inner textarea_sec">
			    <?php echo Form::text('address','',array('id'=>'address','placeholder'=>'Address','class'=>'form-control')); ?>

			  </div>
			</div>
		      </div>
		      
		      <div class="submit_form">
		     
		      <?php echo Form::button('Next',array('id'=>'go_to_protfolio','class'=>'buttonM bBlue')); ?>

		      </div>

		    </div>
		    <div class="tab_content_right">
		    
		      <img src="images/img16.jpg" alt="no img" id="invest_logo">
		    <div id="image-holder"></div>  
		      <div style="display:none;">
		      <?php echo Form::file('image',array('id'=>'fileUpload','class'=>'form-control')); ?>

		      
		      </div>
			
		    </div>
		  
		  
		</div>
		
	    </div>
	      
	  
          
            <div class="accordian_box" style="display:none;" id="form_portfolio">
		
		<div class="three_steps_p2 clear">
		  <ul>
		    <li class="complete_icon"><span>&nbsp;</span></li>
		    <li class="active_icon"><span>&nbsp;</span></li>
		    <li><span>&nbsp;</span></li>
		  </ul>
		</div>
		
		<div class="tab_content clear">
		  
		 
		    <div class="p2_tab2">
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="dubble_line">About <br> You/Company</label>
			  <div class="one_tab_inner">
			    <?php echo Form::textarea('about_company', null, ['id'=>'about_company','class' => 'field desc']); ?>

			    <label id="textarea_feedback"></label>
			    <span class="count" id="textarea_feedback_count">2000/2000</span>
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab width70">
			  <label class="dubble_line">Upload Your <br> Bio/Portfolio</label>
			  <div class="one_tab_inner">
			    
			    <?php echo Form::file('portfolio',array('id'=>'portfolioUpload','class'=>'form-control')); ?>

			    <span class="span_style">(PDF, PPT, DOC, DOCX,  15MB File Limit) </span>
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab width50">
			  <label class="dubble_line">What are the <br> Industries<br> You are<br> Interested ?</label>
			  <div class="one_tab_inner tab_select multiBussCat">
			    <?php echo Form::select('industry_status[]', $industries,'',array('class' => 'form-control required ddown','id'=> 'industries','multiple'=>'multiple')); ?>

			    <span class="span_style">You can select multiple category</span>
			      <div id="msg" style="color:red;"></div>
			  </div>
			</div>
		      </div>
		      
		      <div class="submit_form">
			
			<?php echo Form::button('Next',array('id'=>'go_to_fund_next','class'=>'buttonM bBlue')); ?>

		      </div>
		      
		    </div>
		  
		  
		</div>
		
	    </div>

          
          
            <div class="accordian_box" style="display:none;" id="form_fund">
		
		<div class="three_steps_p2 clear">
		  <ul>
		    <li class="complete_icon"><span>&nbsp;</span></li>
		    <li class="complete_icon"><span>&nbsp;</span></li>
		    <li class="active_icon"><span>&nbsp;</span></li>
		  </ul>
		</div>
		
		<div class="tab_content clear">
		  
		  
		    <div class="p2_tab2">
		        
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab width30">
			  <label>Annual Salary</label>
			  <div class="one_tab_inner tab_select">
			    <?php echo Form::select('annual_salary', array('100000' => '100000','200000'=>'200000','300000'=>'300000','400000'=>'400000'),'',array('class' => 'form-control','id'=> 'annual_salary')); ?>

			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab width30">
			  <label class="dubble_line">How mutch are <br> you willing <br> to invest</label>
			  <div class="one_tab_inner tab_select">
			    <?php echo Form::select('willing_to_invest', array('100000' => '100000','200000'=>'200000','300000'=>'300000','400000'=>'400000'),'',array('class' => 'form-control','id'=> 'willing_to_invest')); ?>

			  </div>
			</div>
		      </div>
		      
		      <div class="submit_form">
		      <?php echo Form::button('Next',array('id'=>'go_to_completion','class'=>'buttonM bBlue')); ?>

		      </div>
		      
		    </div>
		 
		  
		</div>
		
	    </div>
          </div>
	    
	   <?php echo Form::close(); ?> 
        </div>
	
      </div>
    </div>
    <span class="live_chat"><img src="images/live_chat.png" alt="no img"></span>
  </div>
    
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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>