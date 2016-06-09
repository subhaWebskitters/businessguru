<?php $__env->startSection('content'); ?>

  <div id="main" class="clear">
  
    <div class="errorSuccess">
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
    <div class="tab_sec">
      <div class="main_container">
	
	<div id="horizontalTab">
	  <ul class="resp-tabs-list">
	      <li class="active_list basic_tab">BASICS</li>
	      <li class="proposal_tab">PROPOSAL</li>
	      <li class="funds_tab">Accounts</li>
	  </ul>
	  <div class="resp-tabs-container">
	    <div class="accordian_box business_signup">
		<?php echo Form::open(['route'=>'save_business_step','class' => 'form form-validate formRow clear ','id'=>'business_form','enctype'=>'multipart/form-data', 'files'=>true]); ?>

<?php echo Form::hidden('action','',array('id'=>'action')); ?>

<div class="signup_basic"  style="display:block;"> 
		<div class="three_steps clear">
		  <ul>
		    <li class="active_icon"><span>&nbsp;</span></li>
		    <li><span>&nbsp;</span></li>
		    <li><span>&nbsp;</span></li>
		  </ul>
	    <?php echo Form::hidden('email',$email,array('id'=>'email','placeholder'=>'Email','class'=>'form-control')); ?>

	    <?php echo Form::hidden('password',$password,array('id'=>'password','placeholder'=>'Password','class'=>'form-control')); ?>

		</div>
		
		<div class="three_option clear">
		  <h2>I AM A/AN...</h2>
		  <div class="three_option_inner clear">
		    
		    <div class="cust_radio">
		     
		      <?php echo Form::radio('business_type', 'start_up', '', array('id'=>"radio-1-1" ,'class' => 'regular-radio basicType business_type','checked'=>'checked')); ?>

		      <label for="radio-1-1"></label>
		      <label for="radio-1-1" class="click_radio">Start Up</label>
		    </div>
		    <div class="cust_radio">
		      <?php echo Form::radio('business_type', 'existing_business', '', array('id'=>"radio-1-2" ,'class' => 'regular-radio basicType business_type')); ?>

		      <label for="radio-1-2"></label>
		      <label for="radio-1-2" class="click_radio">Existing Business </label>
		    </div>
		    <div class="cust_radio">
		      <?php echo Form::radio('business_type', 'business_ideas', '', array('id'=>"radio-1-3" ,'class' => 'regular-radio basicType business_type')); ?>

		      <label for="radio-1-3"></label>
		      <label for="radio-1-3" class="click_radio">Business Ideas Only </label>
		    </div>
		    
		  </div>
		</div>
		
		<div class="tab_content business_first_step clear" style="display:none;">
		  
		    <div class="tab_content_left">
		      <h2>Basic Info</h2>
		      <div class="tab_form clear">
		      <div class="business" style="display:none;">
			<div class="tab_form_left one_tab">
			  <label>Business Name</label>
			  <div class="one_tab_inner"><?php echo Form::text('bussiness_name','',array('id'=>'bussiness_name','placeholder'=>'Bussiness Name','class'=>'form-control')); ?></div>
			      <span class="buss_name_error" style="color:red"></span>
			</div>
		      </div>
		    <div class="existing" style="display:none;">
			<div class="tab_form_right one_tab">
			  <label class="dubble_line">Mobile Number<span>(OTP Verification)</span></label>
			  <div class="one_tab_inner"> <?php echo Form::text('contact','',array('id'=>'contact','placeholder'=>' +8584322788','class'=>'form-control')); ?><a href="javascript:void(0)" class="buss_verify_otp">Verify OTP</a>
	       <span class="buss_otp_status" style="color:red;"></span><?php echo Form::hidden('buss_otp_verify','0',array('id'=>'buss_otp_verify')); ?></div>			  
			</div>
		    </div>
		      </div>
		      <div class="tab_form clear">
		      <div class="general"  style="display:none;">
			<div class="tab_form_left one_tab">
			  <label>ACTA Number</label>
			  <div class="one_tab_inner"><?php echo Form::text('acta_number','',array('id'=>'acra_number','placeholder'=>'ACTA Number','class'=>'form-control required')); ?></div>
			</div>
		      </div>
		    <div class="existing" style="display:none;">
			<div class="tab_form_right one_tab">
			  <label>Email Address</label>
			  <div class="one_tab_inner"><?php echo Form::email('buss_email',$email,array('id'=>'buss_email','placeholder'=>'Email','class'=>'form-control','readonly')); ?></div>			  
			</div>
		    </div>
		      </div>
		      <div class="tab_form clear">
		      <div class="general"  style="display:none;">
			<div class="tab_form_left one_tab">
			  <label>Number of Years</label>
			  <div class="one_tab_inner"><?php echo Form::text('no_year','',array('id'=>'no_year','placeholder'=>'Number of Year','class'=>'form-control required')); ?></div>
			</div>
		      </div>
		    <div class="existing" style="display:none;">
			<div class="tab_form_right one_tab">
			  <label>Website</label>
			  <div class="one_tab_inner"><?php echo Form::text('website','',array('id'=>'website','placeholder'=>'Website','class'=>'form-control')); ?></div>			  
			</div>
		    </div>
		      </div>
		    <div class="general"  style="display:none;">
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Director Name</label>
			  <div class="one_tab_inner"><?php echo Form::text('director_name[]','',array('id'=>'add_director_1','placeholder'=>'Director Name','class'=>'form-control required')); ?><a href="javascript:void(0)" class="add_director">Add More + </a><input type="hidden" name="director_count" class="director_count" value="1"></div>
			</div>
		      </div>
		    </div>
		    <div class="business" style="display:none;">
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="dubble_line">Industry/ <br> Category<span>(upto 3 categories)</span></label>
			  <div class="one_tab_inner tab_select multiBussCat">
			   <?php echo Form::select('business_cat[]', $industry, '',array('id'=>'business_cat','class' => 'form-control ','multiple' => "multiple")); ?>

			    <span class="span_style">You can select multiple category</span>
			  </div>
			</div>
		      </div>
		      </div>
		      <div class="buss_desc"  style="display:none;">
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <div class="help_sec">
			    <label class="dubble_line">Business <br> Description</label>
			    <div class="help"><img src="images/icon14.png" alt="no img"></div>
			  </div>
			  <div class="one_tab_inner textarea_sec">
			    <div class="answer"> Tell us more about your business
			      <ul class="listing_arrow">
				<li>History</li>
				<li>What Does your Business Provide</li>
			      </ul>
			    </div>
			    <?php echo Form::textarea('desc','',array('placeholder'=>'Description','id'=>'desc','class'=>'form-control parsley-validated desc required','maxlength'=>"2000")); ?><div id="textarea_feedback"></div>
			  </div>
			</div>
		      </div>
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <div class="help_sec">
			    <label class="dubble_line">Upload Your <br>Doc <span>(Max. 5 File)</span></label>
			    <div class="help"><img src="images/icon14.png" alt="no img"></div>
			  </div>
			  <div class="one_tab_inner textarea_sec">
			    <div class="answer">
			      <span>Upload your presentation deck, portfolio, product <br>cataloge etc. </span>
			    </div>
			     <?php echo Form::file('upload_doc[]',array('id'=>'add_file_1', 'placeholder'=>'Upload Doc','class'=>'form-control upload_doc ', 'multiple' => 'multiple')); ?>

		    <!-- <a href="javascript:void(0)" class="add_file">Add More</a><input type="hidden" name="file_count" class="file_count" value="1">
 -->
		    	<!-- <div class='file_upload' id='f1'>
	<input class="filePic" name='file[]' type='file'/>
	
	</div>
	<div id='file_tools'>
		
		<span class="addSpan" id='add_file'>Add</span>
		
		
	</div> -->

			  </div>
			</div>
		      </div>
		      
		      </div>
		      <div class="submit_form"><?php echo Form::button('Next',array('id'=>'next2')); ?></div>

		    </div>
		<div class="general"  style="display:none;">
		   
		    <div class="tab_content_right">
		      <img src="images/img11.jpg" alt="no img" id="buss_logo"><?php echo Form::file('image',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"image")); ?>

		      <div id="image-holder"></div>
		    </div>
		</div>
		 
		</div>
</div>
<div class="proposal_div" style="display:none;">
		
		<div class="three_steps clear">
		  <ul>
		    <li class="complete_icon"><span>&nbsp;</span></li>
		    <li class="active_icon"><span>&nbsp;</span></li>
		    <li><span>&nbsp;</span></li>
		  </ul>
		</div>
		
		<div class="three_option clear">
		  <h2>Are you looking for/OR...</h2>
		  <div class="three_option_inner clear">
		    
		    <div class="cust_radio">
		      <!--<input type="radio" checked="checked" class="regular-radio proposalType" name="radio-1-set" id="radio-1-1" value="1">-->
		      <?php echo Form::radio('looking_for', 'investors', '', array('id'=>"radio-2-1",'class' => 'regular-radio proposalType looking_for', 'checked' => 'checked')); ?>

		      <label for="radio-2-1"></label>
		      <label for="radio-2-1" class="click_radio">Investors</label>
		    </div>
		    <div class="cust_radio">
		      <?php echo Form::radio('looking_for', 'selling_your_company', '', array('id'=>"radio-2-2",'class' => 'regular-radio proposalType looking_for')); ?>

		      <label for="radio-2-2"></label>
		      <label for="radio-2-2" class="click_radio">Selling your company</label>
		    </div>
		    
		  </div>
		</div>
		
		
		  
		  <div class="investors" style="display:none;">
		  <div class="tab_content clear">
		    <div class="tab2_inner">
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Funds Required</label>
			  <div class="one_tab_inner">
			    <div class="select_input clear">
			      <div class="cust_select_sec2">
				<?php echo Form::select('funds_req_currency', $currency, '',array('id'=>'funds_req_currency','class' => 'form-control')); ?>

			      </div>
			      <?php echo Form::number('enter_amt','',array('id'=>'enter_amt','placeholder'=>'Enter Amount','class'=>'form-control required')); ?>

			    </div>
			  </div>
			</div>
		      </div>
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="dubble_line">Amount of Equity <br> in Exchange</label>
			  <div class="one_tab_inner"><?php echo Form::number('equity_exchange','',array('id'=>'equity_exchange','placeholder'=>'%','class'=>'form-control required')); ?></div>
			</div>
		      </div>
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="dubble_line">Upload Your  <br>Proposal <span>(PDF, DOCX)</span></label>
			  <div class="one_tab_inner upload_prop"><img src="images/img13.jpg" alt="no img" id="proposalImage" style="cursor:pointer;"><?php echo Form::file('upload_proposal',array('id'=>'upload_proposal', 'placeholder'=>'Upload Proposal','class'=>'form-control upload_proposal ')); ?>

			  <span class="proposalImageName"></span>
			  </div>
			</div>
			      
		      </div>

		      <div class="use_full_tips clear">
			<h3>Useful Tip</h3>
			<div class="tips_inner clear">
			  <div class="tips_left"><img src="images/img14.jpg" alt="no img"></div>
			  <div class="tips_right">
			    <p>Proposal format is preferred by Spring Singapore <a href="<?php echo e(URL::route('download_file','1463563557.docx')); ?>" class="download_files" data-file="filename.txt">click here</a> to download a copy</p>
			  </div>
			</div>
		      </div>

		      
		    </div>
		  </div>
		    
		  </div>
		  
		  <div class="selling_your_company" style="display:none;">
		  <div class="tab_content clear">
		    <div class="tab2_inner">
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Selling Price</label>
			  <div class="one_tab_inner">
			    <div class="select_input clear">
			      <div class="cust_select_sec2">
				<?php echo Form::select('sp_currency', $currency, '',array('id'=>'sp_currency','class' => 'form-control')); ?>

			      </div>
			       <?php echo Form::number('enter_selling_amt','',array('id'=>'enter_sell_amt','placeholder'=>'Enter Amount','class'=>'form-control required')); ?>

			    </div>
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Company Valuation</label>
			  <div class="one_tab_inner">
			    <div class="select_input clear">
			      <div class="cust_select_sec2">
				<?php echo Form::select('cv_currency', $currency, '',array('id'=>'cv_currency','class' => 'form-control')); ?>

			      </div>
			      <?php echo Form::number('cmp_val','',array('id'=>'cmp_val','placeholder'=>'Company Valuation','class'=>'form-control required')); ?>

			    </div>
			  </div>
			</div>
		      </div>

		      <!--<div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="dubble_line">Reasons for <br> Selling</label>
			  <div class="one_tab_inner">
			    <textarea></textarea>
			    <span class="count">2000/2000</span>
			  </div>
			</div>
		      </div>-->
		      
		      <p class="icon15">If you wish to get an accurate valuation, Contact us to get a valuation. <a href="javascript:void(0);" class="mail_accurate_valuation" data-href="<?php echo e($site_settings->sitesettings_value); ?>

 "  data-item="<?php echo e($site_settings->sitesettings_lebel); ?> ">click here</a></p>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="dubble_line">Upload Your  <br>Proposal <span>(PDF, DOCX)</span></label>
			  <div class="one_tab_inner upload_prop"><img src="images/img13.jpg" alt="no img" id="proposalImage1"  style="cursor:pointer;"><?php echo Form::file('upload_proposal',array('id'=>'upload_proposal1', 'placeholder'=>'Upload Proposal','class'=>'form-control upload_proposal1 ')); ?>

			  <span class="proposalImageName1"></span>
			  </div>
			</div>
			      
		      </div>

		      <div class="use_full_tips clear">
			<h3>Useful Tip</h3>
			<div class="tips_inner clear">
			  <div class="tips_left"><span class="masterTooltipNew"><img src="images/img14.jpg" alt="no img">
	        <strong class="infoBox"> <span> PDF of preferred proposal format </span> </strong>
	       </span></div>
			  <div class="tips_right">
			    <p>Proposal format is preferred by Spring Singapore  <a href="<?php echo e(URL::route('download_file','1463563557.docx')); ?>" class="download_files" data-file="filename.txt">click here</a> to download a copy</p>
			  </div>
			</div>
		      </div>

		      
		    </div>
		    
		  
		  </div>
		    
		    </div>
		    
	  

		    <div class="investNext submit_form">
		<?php echo Form::button('Previous',array('id'=>'prev3','class'=>'buttonM bBlue')); ?>

			   <?php echo Form::button('Next',array('id'=>'next3','class'=>'buttonM bBlue')); ?>

		    </div>
</div>
	  
<div class="accounts_div" style="display:none;">
		
		<div class="three_steps clear">
		  <ul>
		    <li class="complete_icon"><span>&nbsp;</span></li>
		    <li class="active_icon"><span>&nbsp;</span></li>
		    <li><span>&nbsp;</span></li>
		  </ul>
		</div>
		
		<!--<div class="three_option_inner clear">
		    
		    <div class="cust_radio">
		      <input type="radio" id="radio-1-1" name="radio-1-set" class="regular-radio accountType" checked="checked" value="1">
		      <label for="radio-1-1"></label>
		      <label class="click_radio" for="radio-1-1">Start Up</label>
		    </div>
		    <div class="cust_radio">
		      <input type="radio" id="radio-1-2" name="radio-1-set" class="regular-radio accountType" value="2">
		      <label for="radio-1-2"></label>
		      <label class="click_radio" for="radio-1-2">Existing Business </label>
		    </div>
		    <div class="cust_radio">
		      <input type="radio" id="radio-1-3" name="radio-1-set" class="regular-radio accountType" value="3">
		      <label for="radio-1-3"></label>
		      <label class="click_radio" for="radio-1-3">Business Ideas Only </label>
		    </div>
		    
		  </div>-->
		<div class="tab_content clear">
		   <div class="start_exist" style="display:none">
		    <div class="tab3_inner">
		   
		      <h2>Upload your</h2>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Sales Report</label>
			  <div class="one_tab_inner">
			    <?php echo Form::file('sales_report',array('id'=>'sales_report', 'placeholder'=>'sales report','class'=>'form-control sales_report ')); ?>

			  </div>
			</div>
		      </div>
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>PDL Report</label>
			  <div class="one_tab_inner">
			    <?php echo Form::file('pll_report',array('id'=>'pll_report', 'placeholder'=>'PLL report','class'=>'form-control pll_report ')); ?>

			  </div>
			</div>
		      </div>
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Valuation Report</label>
			  <div class="one_tab_inner">
			    <?php echo Form::file('valuation_report',array('id'=>'valuation_report', 'placeholder'=>'Valuation report','class'=>'form-control valuation_report ')); ?>

			  </div>
			</div>
		      </div>
		    </div> 
		    
		    </div>
		 <div class="business_ideas" style="display:none">
		    <div class="tab3_inner">
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Predicted Valuation</label>
			  <div class="one_tab_inner">
			    <div class="select_input clear">
			      <div class="cust_select_sec2">
				<?php echo Form::select('pv_currency', $currency, '',array('id'=>'pv_currency','class' => 'form-control')); ?>

			      </div>
			      <?php echo Form::text('enter_pv_amt','',array('id'=>'enter_pv_amt','placeholder'=>'Enter Amount','class'=>'form-control required')); ?>

			    </div>
			  </div>
			</div>
		      </div>

		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="dubble_line">Supporting  <br> Documents</label>
			  <div class="one_tab_inner">
			     <?php echo Form::file('supporting_documents',array('id'=>'supporting_documents', 'placeholder'=>'Supporting Documents','class'=>'form-control supporting_documents ')); ?>

			  </div>
			</div>
		      </div>
		       
		    </div>
		 </div>
		   <div class="accountsNext submit_form">
		<?php echo Form::button('Previous',array('id'=>'prev4','class'=>'buttonM bBlue')); ?>

			   <?php echo Form::button('Finish',array('id'=>'next4','class'=>'buttonM bBlue')); ?>

		    </div>
		    
		</div>

		    
</div>
  
		   
		   <?php echo Form::close(); ?>

	   
	      
	  </div>
        </div>
	
      </div>
    </div>
    <span class="live_chat"><img src="images/live_chat.png" alt="no img"></span>
  </div>

  <style>

.masterTooltipNew .infoBox {
    display: none;
}
.masterTooltipNew:hover .infoBox {
    display: block;
}

  </style> 
 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('masterLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>