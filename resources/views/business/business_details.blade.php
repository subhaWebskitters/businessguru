@extends('masterLayout')
@section('content')

{!! Form::open(['route'=>'update','class' => 'form form-validate formRow','id'=>'business_form','enctype'=>'multipart/form-data', 'files'=>true]) !!}
{!! Form::hidden('action','Process',array('id'=>'action')) !!}
  <div id="main" class="clear inv_details">
    <div class="main_container">
      <div class="inv_inner">
	<h2>{{$businessDetails->business_name}}</h2>
	<div class="deatils_outer clear">
	  <div class="summary">
	    <div class="border_box">
	      <h3>Summary:</h3>
	   {!! Form::textarea('business_description',$businessDetails->business_description,array('class'=>'ckeditor','id'=>'business_description','cols'=>'75','rows'=>'10' ))!!}   
		
	    </div>
	    <div class="border_box upload_img clear">
	      <h3>Video and Photo:</h3>
		<input type="hidden" value="{{count($business_files)}}" id="business_file_count">
		@if(count($business_files)>0)
		<ul>
		@foreach($business_files as $files)
			<li><a class="fancybox2" rel="group" href="{{ asset('upload/businessfiles/'.$files->file_name) }}" title="{{$files->file_name}}" >{{ Html::image(asset('upload/businessfiles/thumb/'.$files->file_name),$files->file_name) }}</a>
			<br>
			<a href="javascript:void(0);" class="remove_photo" data-id="{{$files->id}}">Remove</a>
			</li>
				
		@endforeach
		</ul>
		@else
			{{'No photo and video exists'}}
		@endif
		
		<br>
	      <label class="upload_max">Upload Multiple Image(Max 5)</label>
					
				<div class="imageUploadDiv">
				<img src="images/img19.jpg" alt="no img" id="buss_logo2">
				{!! Form::file('media[]',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"image", 'multiple' => 'multiple')) !!}
		      <div id="image-holder"></div>
						
					</div>
						
	      <!--<input name="media[]" type="file" id="media" multiple/>-->
	      <!--<div id="image-holder"></div>-->
	      <div id="imgmsgdiv" style="color:red;"></div>
	      <div id="loader" style="display:none;"><img src="{{asset('front_assets/img/ajax-loader.gif')}}"></div> 
								
		
	      
	    </div>
	    <div class="border_box upload_img clear">
	      <h3>Company Portfolio</h3>
	      
	        @if(COUNT($uploaded_document)>0)
						<ul>
		
						@foreach($uploaded_document as $doc_id=>$filename)
							   							    
							    @if(file_exists(public_path().'/upload/attachment/'.$filename))
									{{--{{$v->document_name}}--}}
						<li>
						
						    <a href="{{URL::route('download_file',$filename)}}">
						    <div class="portfolio_display">{!! Html::image(asset('upload/attachment/'.$filename),'Download',array('title'=>'Download '.Helpers::get_extension($filename),'height'=>'100px','width'=>'100px' ))!!}
						    </div>
						    <span class="comPortfolioDoc">{{$filename}}</span>
						    </a>
						  <a href="javascript:void(0);" class="remove_doc" data-id="{{$doc_id}}">Remove</a>
						</li>
							    @endif    
							    
						 @endforeach
									    
				        @else
				           N/A  
				        @endif
						</ul>
						  
						  
				<div class="imageUploadDiv">
				<img src="images/img19.jpg" alt="no img" id="buss_logo3">		  

			      </div>
				<div style="display:none;">
				{!! Form::file('upload_doc[]',array('id'=>'add_file_1', 'placeholder'=>'Upload Doc','class'=>'form-control upload_doc ','multiple' => 'multiple')) !!}
				</div>
		      <!--<a href="javascript:void(0)" class="add_file">Add More</a><input type="hidden" name="file_count" class="file_count" value="1">-->
	     
	    </div>
	    <div class="border_box directorsBioDiv">
	      <h3>Director's BIO</h3>
		<ul>
	      @if(COUNT($business_bio)>0)
						
		
						@foreach($business_bio as $v)
							   						
									<li><span class="spanDirectorName">{{$v->director_name}}</span><p class="spanDirectorBio">{{$v->director_bio}}</p>
									<a href="javascript:void(0);" class="remove_bio" data-id="{{$v->id}}">Remove</a>
									</li>
							   
						 @endforeach
									    
				        @else
				           N/A  
				        @endif
						</ul>
	      <div class="addmore_bio" id="addmore_bio"><a href="javascript:void(0);">Add More</a></div>
	      <label id="addmore_bio_field"></label>

	      <div class="director_bio_section">
		<input type="text" name="director_name[]" placeholder="Director Name">
		<p>
		<textarea name="director_bio[]" rows="10" cols="25" class="ckeditor" placeholder="Director Bio"></textarea>
		
		</p>
		
		<a href="javascript:void(0);" class="remove_add_bio">Remove</a>
	      </div>
	    </div>
	    <div class="border_box upload_img clear">
	      <h3>Proposal</h3>
	      <ul> @if(file_exists(public_path().'/upload/proposal/'.$businessDetails->proposal_name) && $businessDetails->proposal_name != '')
	      <li>
						    <a href="{{URL::route('front_download_proposal_file',$businessDetails->proposal_name)}}">{!! Html::image(asset('icon/'.Helpers::get_extension_icon($businessDetails->proposal_name)),'Download',array('title'=>'Download '.Helpers::get_extension($businessDetails->proposal_name),'height'=>'50px','width'=>'50px' ))!!}
						    <span class="comPortfolioDoc">{{$businessDetails->proposal_name}}</span>
						    </a>
						</li>
							    
						@else
							    N/A
						@endif
						</ul>
<div class="imageUploadDiv">
	    <img src="images/img19.jpg" alt="no img" id="buss_logo4">		  

	  </div>
	    <div style="display:none;">
	      {!! Form::file('upload_proposal',array('id'=>'upload_proposal', 'placeholder'=>'Upload Proposal','class'=>'form-control upload_proposal ')) !!}
	      </div>
	    </div>
	  </div>
	  <div class="looking">
	    <div class="border_box">
	      <h3>Looking For</h3>
	      <div class="selling">
		<h4>Selling/Investment</h4>
		
		  {!! Form::select('sp_currency', $currency, $businessDetails->sp_currency,array('id'=>'sp_currency','class' => 'form-control')) !!}
		{!! Form::number('enter_selling_amt',$businessDetails->selling_price,array('id'=>'enter_selling_amt','placeholder'=>'Enter Amount','class'=>'form-control required')) !!}
		<span>
		{!! Form::text('equity_exchange',$businessDetails->equity_exchange,array('id'=>'equity_exchange','placeholder'=>'Enter Amount','class'=>'form-control required')) !!}%</span>
	      </div>
	      <a href="javascript:void(0);" class="interest @if(count($businessDetails->get_business_interest_mail) > 0) disabled @endif" data-item="{{$businessDetails->id}}" data-item1="{{$businessDetails->business_name}}">I am Interested</a>
		@if(count($businessDetails->get_business_interest_mail) > 0)
		<span class="interestedContent">Your requested already been sent.We will get back to you within 24 hours</span>
		@else
		<span class="interestedContent" style="display:none;"></span>
		@endif
	      <a href="{{ URL::route('download',array('salse',$businessDetails->sales_report_name)) }}" class="download">Download sales report</a>
		<div class="imageUploadDiv">
	    <img src="images/img19.jpg" alt="no img" id="buss_logo5">		  

	  </div>
	    <div style="display:none;">
	      {!! Form::file('sales_report',array('id'=>'sales_report', 'placeholder'=>'sales report','class'=>'form-control sales_report ')) !!}
	      </div>
	    </div>
	    
	    <div class="border_box">
	      <div class="company_name">
		<div class="company_img">{{ Html::image(asset('upload/businessuser/'.$businessDetails->business_logo),$businessDetails->business_logo) }}</div>
		  <div class="imageUploadDiv">
	    <img src="images/img19.jpg" alt="no img" id="buss_logo6">		  

	  </div>
	    <div style="display:none;">
		  {!! Form::file('image',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"image_logo")) !!}
	    </div>
		<span class="compBussName">
		{!! Form::text('bussiness_name',$businessDetails->business_name,array('id'=>'bussiness_name','placeholder'=>'Bussiness Name','class'=>'form-control')) !!}
		</span>
		<span>
		{!! Form::text('acta_number',$businessDetails->acta_number,array('id'=>'acra_number','placeholder'=>'ACTA Number','class'=>'form-control required')) !!}
		</span>
		<span>
		{!! Form::text('no_year',$businessDetails->number_of_year,array('id'=>'no_year','placeholder'=>'Number of Year','class'=>'form-control','required','onkeypress'=>'Numeric(event)')) !!}
		years</span>
		<span></span>
		
		{!! Form::text('website',$businessDetails->website,array('id'=>'website','placeholder'=>'Website Name','class'=>'form-control required')) !!}  
	      </div>
	    <div>
	      <input class="button" type="submit" alt="Update" value="Update" />
	       
	    </div>
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>
 {!! Form::close() !!} 
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

<script>
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
										$("#imgmsgdiv").html("Upload total 5 files");
										$("#image-holder").hide();
										$("#media").val('');
								}
						});
				</script>


<script>
	  $('.remove_doc').click(function(){
	  
		    var data_id = $(this).attr('data-id');
		    var ths = $(this);
		if (confirm('Are you sure')) {
		    
		
		    $.ajax({
			      'type':'post',
			      'url':'{{URL::route('remove_doc')}}',
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
			      'url':'{{URL::route('remove_bio')}}',
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
			      'url':'{{URL::route('remove_photo')}}',
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
	 
	  
	  $('#addmore_bio').click(function(){
	  
	    var html = '<div class="director_bio_section"><input type="text" name="director_name[]" placeholder="Director Name"><p><textarea name="director_bio[]" rows="10" cols="25" class="ckeditor" placeholder="Directors Bio"></textarea></p><a href="javascript:void(0);" class="remove_add_bio">Remove</a></div>';
	    
	    $('#addmore_bio_field').after(html);
	  });
	 
	 
	 function Numeric(e){
    
	      var keyCode = (e.keyCode ? e.keyCode : e.which);
	     
	      if ((keyCode < 48 || keyCode > 57) && keyCode !== 8 &&keyCode!==37 &&keyCode!==39 &&keyCode!==46) {
		  
		  e.preventDefault();
		  return false;
	      }
	  }
	 
	  
</script>
@endsection
	
