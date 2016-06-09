<?php $__env->startSection('content'); ?>

  <div id="main" class="clear inv_details">
    <div class="main_container">
      <div class="inv_inner">
	<h2><?php echo e($businessDetails->business_name); ?><!--<span>by <?php echo e($investor_name); ?> </span>--></h2>
	<div class="deatils_outer clear">
	  <div class="summary">
	    <div class="border_box">
	      <h3>Summary:</h3>
	      <p><?php echo e($businessDetails->business_description); ?></p>
	    </div>
	    <div class="border_box upload_img clear">
	      <h3>Video and Photo:</h3>
		<?php if(count($business_files)>0): ?>
		<ul>
		<?php foreach($business_files as $files): ?>
			<li><a class="fancybox2" rel="group" href="<?php echo e(asset('upload/businessfiles/'.$files->file_name)); ?>" title="<?php echo e($files->file_name); ?>" ><?php echo e(Html::image(asset('upload/businessfiles/thumb/'.$files->file_name),$files->file_name)); ?></a></li>
				
		<?php endforeach; ?>
		</ul>
		<?php else: ?>
			<?php echo e('No photo and video exists'); ?>

		<?php endif; ?>
		
		<!--<form enctype="multipart/form-data" action="" method="post" class="putImages" id="formId">
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<input type="hidden" name="action" value="Process">
								<label>Upload Multiple Image(Max 5)</label> 
								<input name="media[]" type="file" id="media" multiple/>
								<div id="image-holder"></div>
								<div id="imgmsgdiv" style="color:red;"></div>
								<div id="loader" style="display:none;"><img src="<?php echo e(asset('front_assets/img/ajax-loader.gif')); ?>"></div> 
								<input class="button" type="submit" alt="Upload" value="Upload" />
		</form>-->
	      
	    </div>
	    <div class="border_box upload_img clear">
	      <h3>Company Portfolio</h3>
	      
	        <?php if(COUNT($businessDetails->getDocumentList)>0): ?>
						<ul>
		
						<?php foreach($businessDetails->getDocumentList as $v): ?>
							   							    
							    <?php if(file_exists(public_path().'/upload/attachment/'.$v->document_name)): ?>
									<?php /*<?php echo e($v->document_name); ?>*/ ?>
						<li>
						    <a href="<?php echo e(URL::route('download_file',$v->document_name)); ?>"><?php echo Html::image(asset('icon/'.Helpers::get_extension_icon($v->document_name)),'Download',array('title'=>'Download '.Helpers::get_extension($v->document_name),'height'=>'40px','width'=>'40px' )); ?>

						    <span class="comPortfolioDoc"><?php echo e($v->document_name); ?></span>
						    </a>
						</li>
							    <?php endif; ?>    
							    
						 <?php endforeach; ?>
									    
				        <?php else: ?>
				           N/A  
				        <?php endif; ?>
						</ul>
	     
	    </div>
	    <div class="border_box directorsBioDiv">
	      <h3>Director's BIO</h3>
	      <?php if(COUNT($businessDetails->business_details)>0): ?>
						<ul>
		
						<?php foreach($businessDetails->business_details as $v): ?>
							   						
									<li><span class="spanDirectorName"><?php echo e($v->director_name); ?></span><p class="spanDirectorBio"><?php echo e($v->director_bio); ?></p></li>
							   
						 <?php endforeach; ?>
									    
				        <?php else: ?>
				           N/A  
				        <?php endif; ?>
						</ul>
	    </div>
	    <div class="border_box upload_img clear">
	      <h3>Proposal</h3>
	      <ul><?php if(file_exists(public_path().'/upload/proposal/'.$businessDetails->proposal_name) && $businessDetails->proposal_name != ''): ?>
	      <li>
						    <a href="<?php echo e(URL::route('front_download_proposal_file',$businessDetails->proposal_name)); ?>"><?php echo Html::image(asset('icon/'.Helpers::get_extension_icon($businessDetails->proposal_name)),'Download',array('title'=>'Download '.Helpers::get_extension($businessDetails->proposal_name),'height'=>'40px','width'=>'40px' )); ?>

						    <span class="comPortfolioDoc"><?php echo e($businessDetails->proposal_name); ?></span>
						    </a>
						</li>
							    
						<?php else: ?>
							    N/A
						<?php endif; ?>
						</ul>

	      <?php if(isset($business_proposal->status) && $business_proposal->status == 'Requested'): ?>
		<div class="want_to">
		<div class="want_to_inner want_to_inner2">
		  <img src="<?php echo e(asset('front_assets/assets/images/openlock.png')); ?>" class="lockProposal">
		  <span class="propContent">We unlock your proposal within 24 hours</span>
		</div>
		</div>
	      <?php elseif((isset($business_proposal->status) && $business_proposal->status == 'Declained') ): ?>
		<div class="want_to">
		<div class="want_to_inner want_to_inner2">
		  <img src="<?php echo e(asset('front_assets/assets/images/icon21.png')); ?>" class="lockProposal">
		  <span class="blue propBlue">Want to view the proposal?</span>
		  <span class="propContent">Register you interest and will contact <br> you within 24 hours</span>
		  <span class="propError"></span>
		  <a href="javascript:void(0);" class="sign_up1" id="buss_view_propal" data-item="<?php echo e(($investor_details->email)); ?>" data-item1="<?php echo e(($investor_name)); ?>" data-item2="<?php echo e($businessDetails->business_name); ?>" data-item3="<?php echo e($businessDetails->id); ?>">Register</a>
		</div>
		</div>
		<?php else: ?>
		<div class="want_to">
		<div class="want_to_inner want_to_inner2">
		  <img src="<?php echo e(asset('front_assets/assets/images/icon21.png')); ?>" class="lockProposal">
		  <span class="blue propBlue">Want to view the proposal?</span>
		  <span class="propContent">Register you interest and will contact <br> you within 24 hours</span>
		  <span class="propError"></span>
		  <a href="javascript:void(0);" class="sign_up1" id="buss_view_propal" data-item="<?php echo e(($investor_details->email)); ?>" data-item1="<?php echo e(($investor_name)); ?>" data-item2="<?php echo e($businessDetails->business_name); ?>" data-item3="<?php echo e($businessDetails->id); ?>">Register</a>
		</div>
		</div>
		<?php endif; ?>
	      
	    </div>
	  </div>
	  <div class="looking">
	    <div class="border_box">
	      <h3>Looking For</h3>
	      <div class="selling">
		<h4>Selling/Investment</h4>
		<span class="line"><?php echo e($businessDetails->getspCurrency->country_currency_symbol); ?><?php echo e($businessDetails->selling_price); ?></span>
		<span><?php echo e($businessDetails->equity_exchange."%"); ?></span>
	      </div>
	      <a href="javascript:void(0);" class="interest <?php if(count($businessDetails->get_business_interest_mail) > 0): ?> disabled <?php endif; ?>" data-item="<?php echo e($businessDetails->id); ?>" data-item1="<?php echo e($businessDetails->business_name); ?>">I am Interested</a>
		<?php if(count($businessDetails->get_business_interest_mail) > 0): ?>
		<span class="interestedContent">Your requested already been sent.We will get back to you within 24 hours</span>
		<?php else: ?>
		<span class="interestedContent" style="display:none;"></span>
		<?php endif; ?>
	      <a href="<?php echo e(URL('getDownload')); ?>" class="download">Download sales report</a>
	      
	    </div>
	    
	    <div class="border_box">
	      <div class="company_name">
		<div class="company_img"><?php echo e(Html::image(asset('upload/businessuser/'.$businessDetails->business_logo),$businessDetails->business_logo)); ?></div>
		<span class="compBussName"><?php echo e($businessDetails->business_name); ?></span>
		<span><?php echo e($businessDetails->acta_number); ?></span>
		<span><?php echo e($businessDetails->number_of_year); ?> years</span>
		<span><?php echo e($indus_name); ?></span>
		<a href="<?php echo e($businessDetails->website); ?>" target="_blank"><?php echo e($businessDetails->website); ?></a>
	      </div>

	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>

<div class="contact_right" style="display:none;">
<span class="contact_msg"></span>
	  <?php echo Form::open(['method'=>'post','class' => 'form form-validate formRow','id'=>'contact_interest','enctype'=>'multipart/form-data', 'files'=>true]); ?>

<?php echo Form::hidden('action','Process',array('id'=>'action')); ?>

	    <?php echo Form::text('first_name','',array('id'=>'first_name','placeholder'=>'First Name*','class'=>'form-control required','required' => 'required')); ?>

	    <span class="first_name_error"></span>
	    <?php echo Form::email('email','',array('id'=>'con_email','placeholder'=>'Email Address*','class'=>'form-control required','required' => 'required')); ?>

	    <span class="email_error"></span>
	    <?php echo Form::textarea('enquiry','',array('id'=>'enquiry','placeholder'=>'Your Enquiry*','class'=>'form-control required','required' => 'required')); ?>

	    <span class="msg_error"></span>
	    <input type="button" name="submit" id="contact_submit" value="Submit now">
	  <?php echo Form::close(); ?>    
</div>		
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){			
$(".fancybox2").fancybox();
	$(document).on('click','.interest',function(){
		//$('.contact_right').css('display','block');
		var buss_id 	= $(this).attr('data-item');
		var buss_name 	= $(this).attr('data-item1');
				$.ajax({
						type: 'post',
						data: {buss_id:buss_id,buss_name:buss_name,_token: csrf_token},
						url: base_url+'/contact_submit',
						success: function(data){
								if (data != 0){
								$('.interestedContent').css('display','block');
								$('.interestedContent').html('We will get back to you within 24 hours');
								$('.interest').addClass('disabled');
								$('.interest').css('pointer-events','none');
								}
								else if (data == 2) {
								$('.interestedContent').css('display','block');
								$('.interestedContent').html('Your request already been sent.');
								$('.interest').addClass('disabled');
								$('.interest').css('pointer-events','none');
								}
								else
								{
								$('.interestedContent').html('Your request cannot be sent. Please check your email id');		
								}
						}
				}); 
	});
	//$(document).on('click', function (e) {
	//if ($(e.target).hasClass('interest')== false && $(e.target).attr('id')!='contact_interest' && $(e.target).parents('#contact_interest').length == 0 ) {
	//   $(".contact_right").css('display','none');
	//			}
	//	});
	//	$(document).on('click','#contact_submit',function(){
	//			var email 	= $('#con_email').val();
	//			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	//			if ($('#first_name').val() == '') {
	//					$('.first_name_error').html('Please enter first name');
	//					$("#first_name").css('border','1px solid red').focus();
	//					return false;
	//			}
	//			if (email == '') {
	//					$('.email_error').html('Please enter email address');
	//					return false;
	//			}
	//			if(!regex.test(email)){
	//					$('.email_error').html('Please enter a valid email address');
	//					$("#con_email").css('border','1px solid red').focus();
	//					return false;
	//			}
	//			if ($('#enquiry').val() == '') {
	//					$('.msg_error').html('Please enter Message');
	//					$("#enquiry").css('border','1px solid red').focus();
	//					return false;
	//			}
	//			$.ajax({
	//					type: 'post',
	//					data: {email:$('#con_email').val(),first_name:$('#first_name').val(),enquiry:$('#enquiry').val(),_token: csrf_token},
	//					url: base_url+'/contact_submit',
	//					success: function(data){
	//							if (data != 0){
	//									$('.contact_msg').html('Your request has been sent successfully.');
	//									return false;
	//							}
	//							else
	//							{
	//									$('.contact_msg').html('Your request cannot be sent.');
	//							}
	//					}
	//			}); 
	//});
	$(document).on('click','#buss_view_propal',function(){
				var email 	= $(this).attr('data-item');
				var name 	= $(this).attr('data-item1');
				var buss_name 	= $(this).attr('data-item2');
				var buss_id 	= $(this).attr('data-item3');
				var loc = base_url+'/front_assets/assets/images/openlock.png';
				$.ajax({
						type: 'post',
						data: {email:email,name:name,buss_name:buss_name,buss_id:buss_id,_token: csrf_token},
						url: base_url+'/view_proposal_mail',
						success: function(data){
								if (data != 0){
										$('.propBlue').html('');
										$('.propContent').html('We unlock your proposal within 24 hours');
										$('.lockProposal').attr("src",loc);
										$('#buss_view_propal').html('');
								}
								else if (data == 2) {
										$('.propError').html('Your request already been sent.');
								}
								else
								{
										$('.propError').html('Your request cannot be sent. Please check your email id');
								}
						}
				}); 
	});

});
</script>

<!--<script>
						$("input[type='file']").change(function () {
								var countfileno = $(this)[0].files.length;
								
								if (countfileno <= 5) {
										var imgPath = $(this)[0].value;
										var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
										var image_holder = $("#image-holder");
										image_holder.empty();
										if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
												if (typeof(FileReader) != "undefined") {
														for (var i = 0; i < countfileno; i++){
																var reader = new FileReader();
																reader.onload = function(e) {
																		$("<img />", {
																				"src": e.target.result,
																				"class": "thumb-image"
																		}).appendTo(image_holder);
																}
																image_holder.show();
																reader.readAsDataURL($(this)[0].files[i]);
														}
												}
												else{
														alert("This browser does not support FileReader.");
												}
										}
										else{
												alert("Pls select only images");
										}
								
										$("#imgmsgdiv").html("");
										$('#formId').submit(function( e ) { 
												var base_url_suffix	= '';
												var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
												//var csrf_token = $('meta[name="csrf-token"]').attr('content'); 
												var FormSubmitUrl= base_url + 'uploadimage'; 
												$.ajax({
														url: FormSubmitUrl,
														type: 'POST',
														data: new FormData(this),
														processData: false,
														contentType: false,
														beforeSend: function() {
																$("#loader").css('display','block');
														},
														success: function (response) { 
																if (response == 'ok') {
																		$('#imgmsgdiv').html("upload Successfull"); 
																		$("#loader").css('display','none');
																		$("#image-holder").hide();
																		$("#image-holder").html("");
																		$("#media").val("");
																		setTimeout(function(){ $('#imgmsgdiv').html(""); }, 7000); 
																}
														}
												});
												e.preventDefault();
										});
								}
								else{
										$("#imgmsgdiv").html("Upload only 5 files");
										$("#image-holder").hide();
										$("#media").val('');
								}
						});
				</script>-->



<?php $__env->stopSection(); ?>
	

<?php echo $__env->make('masterLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>