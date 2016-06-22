<?php $__env->startSection('content'); ?>
<?php echo Form::open(['route'=>'update','class' => 'form form-validate formRow','id'=>'business_form','enctype'=>'multipart/form-data', 'files'=>true]); ?>

<?php echo Form::hidden('action','Process',array('id'=>'action')); ?>

  <div id="main" class="clear inv_details">
    <div class="main_container">
      <div class="inv_inner">
	<h2><?php echo e($businessDetails->business_name); ?></h2>
		<div class="deatils_outer clear">
				<div class="summary">
						<div class="border_box discoverDetailsBorder">
								<h3>Summary:</h3>
								<?php echo Form::textarea('business_description', $businessDetails->business_description, array('class'=>'summernote', 'id'=>'business_description', 'cols'=>'75','rows'=>'10' )); ?>

						</div>
						<div class="border_box upload_img upload_border clear discoverDetailsBorder portfolioUpload">
								<h3>Video and Photo:</h3>
								<input type="hidden" value="<?php echo e(count($business_files)); ?>" id="business_file_count">
								<?php if(count($business_files)>0): ?>
										<ul>
										<!--images/img18.jpg-->
												<?php foreach($business_files as $files): ?>
							 
							 <?php /**/
							 $extension = pathinfo($files->file_name, PATHINFO_EXTENSION);;
							/**/ ?>
							<?php if($extension == 'mp4' || $extension == 'avg' || $extension == 'mkv'): ?>
							  <li>
																<a  href="javascript:void(0);" title="<?php echo e($files->file_name); ?>">
																		<?php echo e(Html::image(asset('images/img18.jpg'))); ?>

																</a>
																<a href="javascript:void(0);" class="remove_photo remove_item" data-id="<?php echo e($files->id); ?>">Remove</a>
														</li>
							<?php else: ?>
														<li>
																<a class="fancybox2" rel="group" href="<?php echo e(asset('upload/businessfiles/'.$files->file_name)); ?>" title="<?php echo e($files->file_name); ?>">
																		<?php echo e(Html::image(asset('upload/businessfiles/thumb/'.$files->file_name),$files->file_name)); ?>

																</a>
																<a href="javascript:void(0);" class="remove_photo remove_item" data-id="<?php echo e($files->id); ?>">Remove</a>
														</li>
														<?php endif; ?>
												<?php endforeach; ?>
											</ul>	
										
								<?php else: ?>
								  
														<!--<div class="imageUploadDiv photoVideoDiv">
																<img src="images/img19.jpg" alt="no img" id="buss_logo2">
																<?php echo Form::file('media[]',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"media", 'multiple' => 'multiple')); ?>

																<div id="image-holder"></div>
														</div>-->
												
								<?php endif; ?>
		
				<?php echo Form::file('media[]',array( 'placeholder'=>'Logo','class'=>'form-control media')); ?>

				<?php echo Form::file('media[]',array( 'placeholder'=>'Logo','class'=>'form-control media')); ?>

				<?php echo Form::file('media[]',array( 'placeholder'=>'Logo','class'=>'form-control media')); ?>

				<?php echo Form::file('media[]',array( 'placeholder'=>'Logo','class'=>'form-control media')); ?>

				<?php echo Form::file('media[]',array( 'placeholder'=>'Logo','class'=>'form-control media')); ?>

				<?php echo Form::file('media[]',array( 'placeholder'=>'Logo','class'=>'form-control media')); ?>

	      <!--<label class="upload_max">Upload Multiple Image(Max 5)</label>
					
				<div class="imageUploadDiv photoVideoDiv">
				<img src="images/img19.jpg" alt="no img" id="buss_logo2">
				<?php echo Form::file('media[]',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"media", 'multiple' => 'multiple')); ?>

		      <div id="image-holder"></div>
						
					</div>-->
						
	      <!--<input name="media[]" type="file" id="media" multiple/>-->
	      <!--<div id="image-holder"></div>-->
	      <div id="imgmsgdiv" style="color:red;"></div>
	      <div id="loader" style="display:none;"><img src="<?php echo e(asset('front_assets/img/ajax-loader.gif')); ?>"></div> 
								
		
	      
	    </div>
	      
	  <div class="border_box discoverDetailsBorder">
	      <h3>Company Portfolio</h3>
				
				
	  <?php echo Form::textarea('company_portfolio',$businessDetails->company_portfolio,array('class'=>'summernote','id'=>'company_portfolio','cols'=>'75','rows'=>'10' )); ?>

	  
	    </div>

	    <div class="border_box upload_img clear discoverDetailsBorder portfolioUpload">
	      <h3>View Portfolios Uploaded</h3>
	      
	      
	        <?php if(isset($uploaded_document) && COUNT($uploaded_document)>0): ?>
						<ul>
		
						<?php foreach($uploaded_document as $doc_id=>$filename): ?>
							   							    
							    <?php if(file_exists(public_path().'/upload/attachment/'.$filename)): ?>
									<?php /*<?php echo e($v->document_name); ?>*/ ?>
<li><a href="<?php echo e(URL::route('download_file',$filename)); ?>"><div class="portfolio_display">
						    <?php echo Html::image(asset('icon/'.Helpers::get_extension_icon($filename)),'Download',array('title'=>'Download '.Helpers::get_extension($filename),'height'=>'40px','width'=>'40px' )); ?>

						   </div><span class="comPortfolioDoc"><?php echo e($filename); ?></span>
						    </a>
						  <a href="javascript:void(0);" class="remove_doc remove_item" data-id="<?php echo e($doc_id); ?>">Remove</a>
						</li>
							    <?php endif; ?>    
							    
						 <?php endforeach; ?>
					
				        <?php endif; ?> 	  
					</ul>  
				<!--<div class="imageUploadDiv">
				<img src="images/img19.jpg" alt="no img" id="buss_logo3">
			      </div>-->
				<?php echo Form::file('upload_doc[]',array( 'placeholder'=>'Upload Doc','class'=>'form-control upload_doc  ')); ?>

				<?php echo Form::file('upload_doc[]',array( 'placeholder'=>'Upload Doc','class'=>'form-control upload_doc ')); ?>

				<?php echo Form::file('upload_doc[]',array( 'placeholder'=>'Upload Doc','class'=>'form-control upload_doc ')); ?>

				
						
					
				<div style="display:none;">
				<!--<?php echo Form::file('upload_doc[]',array('id'=>'add_file_1', 'placeholder'=>'Upload Doc','class'=>'form-control upload_doc ','multiple' => 'multiple')); ?>-->
				</div>
		      <!--<a href="javascript:void(0)" class="add_file">Add More</a><input type="hidden" name="file_count" class="file_count" value="1">-->
	     
	    </div>
	    <div class="border_box discoverDetailsBorder  list_full_bio">
	      <h3>Director's BIO</h3>
		<ul>
	      <?php if(COUNT($business_bio)>0): ?>
						
		
						<?php foreach($business_bio as $v): ?>
							
	      <li><div class="director_bio_section">
		<input type="text" name="director_name[]" placeholder="Director Name" value="<?php echo e($v->director_name); ?>">
		<p>
		  <?php echo Form::textarea('director_bio[]',$v->director_bio ,array('class'=>'summernote','cols'=>'75','rows'=>'10' )); ?>

		</p>
	      </div></li>
									<!--<li><span class="spanDirectorName"><?php echo e($v->director_name); ?></span><p class="spanDirectorBio"><?php echo $v->director_bio; ?></p>
									<a href="javascript:void(0);" class="remove_bio" data-id="<?php echo e($v->id); ?>">Remove</a>
									</li>-->
							   
						 <?php endforeach; ?>
									    
				      
				        <?php endif; ?>
					
					 <label id="addmore_bio_field"></label>
					  <div class="director_bio_section" style="display:none;">
		<input type="text" name="director_name[]" placeholder="Director Name">
		<p>
		<textarea name="director_bio[]" rows="10" cols="75" id="director_bio1" class="summernote" placeholder="Director Bio"></textarea>
		 
		</p>
		
		<a href="javascript:void(0);" class="remove_add_bio remove_item">Remove</a>
	      </div>
					
						</ul>
	      <div class="addmore_bio" id="addmore_bio"><a href="javascript:void(0);" class="add_bio">Add More</a></div>
	     

	      
	    </div>
	    <div class="border_box upload_img clear discoverDetailsBorder">
	      <h3>Proposal</h3>
	      <ul> <?php if(file_exists(public_path().'/upload/proposal/'.$businessDetails->proposal_name) && $businessDetails->proposal_name != ''): ?>
	      <li>
						    <a href="<?php echo e(URL::route('front_download_proposal_file',$businessDetails->proposal_name)); ?>"><?php echo Html::image(asset('icon/'.Helpers::get_extension_icon($businessDetails->proposal_name)),'Download',array('title'=>'Download '.Helpers::get_extension($businessDetails->proposal_name),'height'=>'50px','width'=>'50px' )); ?>

						    <span class="comPortfolioDoc"><?php echo e($businessDetails->proposal_name); ?></span>
						    </a>
						</li>
							    
						
						<?php endif; ?>
						<li>
						<div class="imageUploadDiv detailsUploadImage" style="cursor:pointer;"  id="buss_logo4">
	    <!--<img src="images/img19.jpg" alt="no img">		  
-->
	  </div><span class="proposalImageName"></span>
	    <div style="display:none;">
	      <?php echo Form::file('upload_proposal',array('id'=>'upload_proposal', 'placeholder'=>'Upload Proposal','class'=>'form-control upload_proposal ')); ?>

	      </div>
	    </div>
	  </div>
						</li>
						</ul>

	  <div class="looking">
<!--	    <div class="border_box">
	      <h3>Looking For</h3>
	      <?php echo Form::hidden('looking_for',$businessDetails->looking_for,array('id'=>'looking_for')); ?>

		
		<?php if($businessDetails->looking_for == 'Investors'): ?>
		  <div class="selling forInvestment">
		  <h4>Investment</h4>
		    <div class="full_tab clear">
		<div class="one_tab_inner clear">
		  <div class="select_input clear">
		    <div class="cust_select_sec2">
		      <?php echo Form::select('currency', $currency, $businessDetails->currency,array('id'=>'currency','class' => 'form-control','style' => 'background-color:#009AE1')); ?>

		    </div>
		    <?php echo Form::text('funds_required',$businessDetails->funds_required,array('id'=>'funds_required','placeholder'=>'Enter Amount','class'=>'form-control required')); ?>

		    <span class="fundsErr"  style="color:red; font-size:12px;"></span>
		  </div>
		</div>			    
		
	      </div>
		
		</div>
	      <?php else: ?>
		<div class="selling">
	      <h4>Selling</h4>
		<div class="full_tab clear">
		<div class="one_tab_inner clear">
		  <div class="select_input clear">
		    <div class="cust_select_sec2">
		      <?php echo Form::select('sp_currency', $currency, $businessDetails->sp_currency,array('id'=>'sp_currency','class' => 'form-control','style' => 'background-color:#009AE1')); ?>

		    </div>
		    <?php echo Form::text('enter_selling_amt',$businessDetails->selling_price,array('id'=>'enter_selling_amt','class'=>'sellingAmt','placeholder'=>'Enter Amount')); ?>

		    <span class="fundsErr"  style="color:red; font-size:12px;"></span>
		  </div>
		</div>			    
		<div class="equity_exchange"><?php echo Form::text('equity_exchange',$businessDetails->equity_exchange,array('id'=>'equity_exchange','placeholder'=>'Enter Amount')); ?>%</div>
	      </div>
		  </div>
		<?php endif; ?>
	      
	      <a href="javascript:void(0);" class="interest <?php if(count($businessDetails->get_business_interest_mail) > 0): ?> disabled <?php endif; ?> disable_item" data-item="<?php echo e($businessDetails->id); ?>" data-item1="<?php echo e($businessDetails->business_name); ?>">I am Interested</a>
		<?php if(count($businessDetails->get_business_interest_mail) > 0): ?>
		<span class="interestedContent">Your requested already been sent.We will get back to you within 24 hours</span>
		<?php else: ?>
		<span class="interestedContent" style="display:none;"></span>
		<?php endif; ?>
	      <a href="<?php echo e(URL::route('download',array('salse',$businessDetails->sales_report_name))); ?>" class="download disable_item">Download sales report</a>
		<span class="salesReportName"></span>
	    <div style="display:none;">
	      <?php echo Form::file('sales_report',array('id'=>'sales_report', 'placeholder'=>'sales report','class'=>'form-control sales_report ')); ?>

	      </div>
	    </div>
-->	    
	    
			
			
			
			<div class="border_box ">
	      <div class="company_name">
		<div class="company_img companyImgUpload">
		
		<?php if(!$businessDetails->business_logo): ?>
																														<?php echo e(Html::image(asset('upload/businessuser/thumb/311200.jpg'))); ?>

																												<?php else: ?>
																														<?php echo e(Html::image(asset('upload/businessuser/'.$businessDetails->business_logo),$businessDetails->business_logo)); ?>

																												<?php endif; ?>
		
		<div class="imageUploadDiv detailsUploadImage"  style="cursor:pointer;"  id="buss_logo6">
		 <!-- <img src="images/img19.jpg" alt="no img">-->		  
		</div>
		</div>
		  
	    <div style="display:none;">
		  <?php echo Form::file('image',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"image_logo")); ?>

	    </div>
		<span class="compBussName">
		<label>Business Name</label>
		<?php echo Form::text('bussiness_name',$businessDetails->business_name,array('id'=>'bussiness_name','placeholder'=>'Bussiness Name','class'=>'form-control')); ?>

		</span>
		<span>
		<label>ACTA Number</label>
		<?php echo Form::text('acta_number',$businessDetails->acta_number,array('id'=>'acra_number','placeholder'=>'ACTA Number','class'=>'form-control required')); ?>

		</span>
		<span>
		<label>Number of Year</label>
		<?php echo Form::text('no_year',$businessDetails->number_of_year,array('id'=>'no_year','placeholder'=>'Number of Year','class'=>'form-control','required','onkeypress'=>'Numeric(event)')); ?>

		</span><span id="yrerrmsg"></span>
		<span>
		<label>Website Name</label>
		<?php echo Form::text('website',$businessDetails->website,array('id'=>'website','placeholder'=>'Website Name','class'=>'form-control required')); ?>

		</span>
		<span id="websiteerrmsg" style="color:red"></span>
	      </div>
	    <div>
	      <input class="button" type="button" id="update" alt="Update" value="Update" />
	       
	    </div>
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>
 <?php echo Form::close(); ?>







<script type="text/javascript" charset="utf-8">

$(document).ready(function(){

$(".upload_doc").change(function () {
				var ext = $('.upload_doc').val().split('.').pop().toLowerCase();
						
						 if($.inArray(ext, ['pdf','doc','docx','xls','xlsx']) == -1) {
						  alert('invalid extension! Only pdf,doc,docx,xls,xlsx are allowed');
						  this.value = null;
						  $('.upload_doc').val('');
						  $(this).next().attr('title','');
						  return false;
					      }
});
$(".media").change(function () {

				var ext = $('.media').val().split('.').pop().toLowerCase();
						 if($.inArray(ext, ['gif','png','jpg','jpeg','mp4','avg','mkv','flv','3gp']) == -1) {
						  alert('invalid extension! Only mp4,avg,mkv,flv,3gp,gif,jpg,jpeg are allowed');
						   $(this).next().attr('title','');
						  this.value = null;
						  return false;
					      }
});

 $("#funds_required").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $(".fundsErr").html("Digits Only").show();
               return false;
    }
    else
    {'business_users.id as business_id',
      $(".fundsErr").html("Digits Only").hide();
               return true;
    }
   });

		$(document).on('click','#update',function(){ 
				
				if($('#website').val() == '') { 
						$('#website').css('border-color','red').focus();
						$('#websiteerrmsg').html('website is required');
						return false;
				}
				if ($('#business_description').summernote('isEmpty')) {
					      alert('Please enter business description text');
					      return false;
						
				}
				if ($('#company_portfolio').summernote('isEmpty')) {
					      alert('Please enter company portfolio text');
						return false;
				}
				if ($('#website').val() != '') {
						var url = $('#website').val();
						var url_validate = /(http|https):\/\/(\w+:{0,1}\w*@)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.(?:com|net|org|in))?$/;
						if(!url_validate.test(url)){
								$('#website').css('border-color','red').focus();
								$('#websiteerrmsg').html('Please enter valid website');
								return false;
						}
						else{
								$('#business_form').submit();
						}
				}
		});

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
						$("#media").change(function () {
								var countfileno = $(this)[0].files.length;
								var business_file_count = $('#business_file_count').val();
								var tot_img = parseInt(business_file_count) + countfileno;
								if (tot_img <= 5) {
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
				
				"class": "thumb-image",
				"height":"100px",
				"width":"180px"
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
										$("#imgmsgdiv").html("Upload total 5 files");
										$("#image-holder").hide();
										$("#media").val('');
								}
						});
				</script>
-->

<script>
	  $('.remove_doc').click(function(){
	  
		    var data_id = $(this).attr('data-id');
		    var ths = $(this);
		if (confirm('Are you sure')) {
		    
		
		    $.ajax({
			      'type':'post',
			      'url':'<?php echo e(URL::route('remove_doc')); ?>',
			      'data':{_token:csrf_token,data_id:data_id},
			      'success':function(msg){					
					ths.parent('li').remove();
			      }
		    });
	          }
		    
	  
	  });
	  
	  $('.remove_bio').click(function(){
	  
		    var data_id = $(this).attr('data-id');
		    var ths = $(this);
		if (confirm('Are you sure')) {
		    
		
		    $.ajax({
			      'type':'post',
			      'url':'<?php echo e(URL::route('remove_bio')); ?>',
			      'data':{_token:csrf_token,data_id:data_id},
			      'success':function(msg){					
					ths.parent('li').remove();
			      }
		    });
	          }
		    
	  
	  });
	  
	  $('.remove_photo').click(function(){
	  
		    var data_id = $(this).attr('data-id');
		    var ths = $(this);
		if (confirm('Are you sure')) {
		    
		
		    $.ajax({
			      'type':'post',
			      'url':'<?php echo e(URL::route('remove_photo')); ?>',
			      'data':{_token:csrf_token,data_id:data_id},
			      'success':function(msg){					
					ths.parent('li').remove();
			      }
		    });
	          }
		    
	  
	  });
	  
	  $(document).on('click','.remove_add_bio',function(){
	  
	    if (confirm('Are you sure')) {
	      $(this).parent('div').remove();
	    }
	  });
	 
	  var boiCount = 2;
	  $('#addmore_bio').click(function(){
	  
	    //var html = '<div class="director_bio_section"><input type="text" name="director_name[]" placeholder="Director Name"><p><textarea name="director_bio[]" id="director_bio'+boiCount+'" class="ckeditor" placeholder="Directors Bio"></textarea></p><a href="javascript:void(0);" class="remove_add_bio">Remove</a></div>';
	    
	     var html = '<li><div class="director_bio_section"><a href="javascript:void(0);" class="remove_add_bio remove_item">Remove</a><input type="text" name="director_name[]" placeholder="Director Name"><p><textarea name="director_bio[]" id="director_bio'+boiCount+'" class="summernote"  rows="10" cols="75"  placeholder="Directors Bio"></textarea></p></div></li>';
	    
	    $('#addmore_bio_field').after(html);
            $('.summernote').summernote();
	    
	    //CKEDITOR.replace( 'director_bio'+boiCount,{height:'100px'} );
	    //CKEDITOR.replace('director_bio['+boiCount+']');
            //alert(CKEDITOR.instances['director_bio2'].getData());
            //$('#director_bio'+boiCount).val(CKEDITOR.instances['director_bio2'].getData());
	    //CKEDITOR.add
	    boiCount++;
	  });
	   // CKEDITOR POST VALUE
            $("form#business_form").submit(function(){
                //for (instance in CKEDITOR.instances) {
                //    CKEDITOR.instances[instance].updateElement();
                //}
            });
	 function Numeric(e){
    
	      var keyCode = (e.keyCode ? e.keyCode : e.which);
	     
	      if ((keyCode < 48 || keyCode > 57) && keyCode !== 8 &&keyCode!==37 &&keyCode!==39 &&keyCode!==46) {
		  
		  e.preventDefault();
		  return false;
	      }
	  }
	 
	  
</script>
<script type="text/javascript">
					$(document).ready(function() {
						$('.summernote').summernote({
							 height: 200,
							 focus: true
						});
					});
</script>
<?php $__env->stopSection(); ?>
	

<?php echo $__env->make('masterLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>