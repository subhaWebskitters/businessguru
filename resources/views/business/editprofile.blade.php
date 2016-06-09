@extends('masterLayout')
@section('content')

<div class="loginWrapper">
		
<div id="main" class="clear edit-profile">
    <div class="tab_sec">
      <div class="main_container">
	
	<div id="horizontalTab">
	 
	  <div class="resp-tabs-container">
	    
	    <div class="accordian_box">
		<div class="tab_content clear">
		
		@if(Session::has('errmsg'))
				<div class="alert alert-error"><strong>{{ Session::get('errmsg') }}</strong></div>
		@endif
		@if(Session::has('succmsg'))
				<div class="alert alert-success"><strong>{{ Session::get('succmsg') }}</strong></div>
		@endif
		<div class="errorSuccess" style="color:red;">
				
				@if(isset($errors) && $errors->any())
						<div class="alert  alert-error">
								@foreach($errors->all() as $error)
										<p>{{ $error }}</p>
								@endforeach
						</div>
				@endif
		</div>
		  
		 
		{!! Form::open(['route'=>['business_updateprofile'],'id'=>'save_invester_step','class' => 'form form-validate','enctype'=>'multipart/form-data','onSubmit'=> 'return validate()']) !!}
		{!! Form::hidden('action','Process',array('id'=>'hidval')) !!}
		{!! Form::hidden('type','Business',array('id'=>'type')) !!}		
		{!! Form::hidden('profileid_business',$businessuser_details->id,array('id'=>'profileid_business')) !!}
		    <div class="tab3_inner">
		      <h2>Update Account</h2>
		      
		      
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			   <label class="req">Email</label>
			  <div class="one_tab_inner">
			   
			    
			    {{$businessuser_details->email}}
			    
			  </div>
			</div>
		      </div>
		
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Name</label>
			  <div class="one_tab_inner">
			    <div>
			    
			    {!! Form::text('business_name',$businessuser_details->business_name,array('id'=>'business_name','placeholder'=>'Business Name','class'=>'form-control required','required' => 'required')) !!}
			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Mobile Number</label>
			  <div class="one_tab_inner">
			    <div>
				{!! Form::text('mobile_number',$businessuser_details->mobile_number,array('id'=>'mobile_number','placeholder'=>'Mobile Number','class'=>'form-control  required','required' => 'required')) !!}
			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Website</label>
			  <div class="one_tab_inner">
			    <div>
				
				{!! Form::text('website',$businessuser_details->website,array('id'=>'website','placeholder'=>'Website','class'=>'form-control required','required' => 'required')) !!}
			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Registered Address</label>
			  <div class="one_tab_inner">
			    <div>
				
				{!! Form::text('registered_address',$businessuser_details->registered_address,array('id'=>'registered_address','placeholder'=>'Registered Address','class'=>'form-control  required','required' => 'required')) !!}
			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Business Logo</label>
			  <div class="one_tab_inner">
			    <div>
				
				{!! Form::file('image',array('id'=>'image','class'=>'form-control demoInputBox')) !!}
				<span id="file_error"></span>
				<br>
				<div class="image-display">
				{{ Html::image(asset('upload/businessuser/thumb/'.$businessuser_details->business_logo),$businessuser_details->business_logo,array()) }}
				</div>
			    </div>
				     
			  </div>
			</div>
		      </div>
		    </div>
		    <div class="submit_form">
				{!! Form::submit('Submit',array('id'=>'submit','class'=>'buttonM bBlue')) !!}
		    </div>
		  {!! Form::close() !!}
		  

		    
		</div>
		
	    </div>

	    
	  </div>
        </div>
	
      </div>
    </div>
    <span class="live_chat"><img src="{{ asset('front_assets/assets/images/live_chat.png')}}" alt="no img"></span>
  </div>


</div>

<script>

$(document).ready(function(){
		$("#save_invester_step").validate({
				rules: {		
						business_name: {
								required: true
						},
						website: {
								required: true
								
						},
						registered_address: {
								required: true
						},
						mobile_number: {
								required: true
						},
						

				},
				messages: {
						mobile_number: 	   "Please enter mobile no.",
						registered_address:"Please enter address.",
						website:         "Please enter website name.",
						business_name:  "Please enter business name.",
												
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

@endsection