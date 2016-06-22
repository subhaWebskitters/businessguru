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
		  
		 
		{!! Form::open(['route'=>['updateprofile'],'id'=>'save_invester_step','class' => 'form form-validate','enctype'=>'multipart/form-data','onSubmit'=> 'return validate()']) !!}
		{!! Form::hidden('action','Process',array('id'=>'hidval')) !!}
		{!! Form::hidden('type','Investor',array('id'=>'type')) !!}		
		{!! Form::hidden('profileid',$investor_details->id,array('id'=>'profileid')) !!}
		    <div class="tab3_inner">
		      <h2>Update Account</h2>
		      
		      
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			   <label class="req">Email</label>
			  <div class="one_tab_inner">
			   
			    
			    {{$investor_details->email}}
			    
			  </div>
			</div>
		      </div>
		
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Name</label>
			  <div class="one_tab_inner">
			    <div>
			    
			    {!! Form::text('name',$investor_details->name,array('id'=>'name','placeholder'=>'Name','class'=>'form-control required','required' => 'required')) !!}
			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Contact</label>
			  <div class="one_tab_inner">
			    <div>
				{!! Form::text('contact',$investor_details->contact,array('id'=>'contact','placeholder'=>'Contact','class'=>'form-control  required','required' => 'required')) !!}
			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Company Name</label>
			  <div class="one_tab_inner">
			    <div>
				
				{!! Form::text('company_name',$investor_details->company_name,array('id'=>'company_name','placeholder'=>'Company Name','class'=>'form-control required','required' => 'required')) !!}
			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Address</label>
			  <div class="one_tab_inner">
			    <div>
				
				{!! Form::text('address',$investor_details->address,array('id'=>'address','placeholder'=>'Address','class'=>'form-control  required','required' => 'required')) !!}
			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label class="req">Photo/Logo</label>
			  <div class="one_tab_inner">
			    <div>
				
				{!! Form::file('image', array('id'=>'image','class'=>'form-control demoInputBox')) !!}
				<span id="file_error"></span>
				<div class="image-display" id="imageHolder">
				  @if($investor_details->image != '' && file_exists(public_path().'/upload/Investor/thumb/'.$investor_details->image))
				{{ Html::image(asset('upload/Investor/thumb/'.$investor_details->image),$investor_details->image) }}
			    @else
				{{ Html::image(asset('upload/no-img.png'),'no-img') }}
			    @endif
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
@endsection