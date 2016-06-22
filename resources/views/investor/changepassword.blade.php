@extends('masterLayout')
@section('content')

<div class="loginWrapper">
		
<div id="main" class="clear chng-pwd">
    <div class="tab_sec">
      <div class="main_container">
	
	<div id="horizontalTab">
	 
	  <div class="resp-tabs-container">
	    
	    <div class="accordian_box">
		<div class="tab_content clear">
		
		@if(Session::has('errmsg'))
				<div class="alert alert-error" ><strong>{{ Session::get('errmsg') }}</strong></div>
		@endif
		@if(Session::has('succmsg'))
				<div class="alert alert-success"><strong>{{ Session::get('succmsg') }}</strong></div>
		@endif
		<div class="errorSuccess" style="color:red;">
				
				@if(isset($errors) && $errors->any())
						<div class="alert alert-error">
								@foreach($errors->all() as $error)
										<p>{{ $error }}</p>
								@endforeach
						</div>
				@endif
		</div>
		  
		 
		  {!! Form::open(['route'=>['do_changepassword'],'id'=>'changepass','class' => 'form form-validate tab3_option1 clear accountTypePan','enctype'=>'multipart/form-data']) !!}
		    {!! Form::hidden('action','Process',array('id'=>'hidval')) !!}
		    {!! Form::hidden('type','Investor',array('id'=>'type')) !!}
		    <div class="tab3_inner">
		      <h2>Change Your Password</h2>
		      
		      
		      
		      <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Old Password</label>
			  <div class="one_tab_inner">
			    <div>
			      
			      {!! Form::password('old_password','',array('id'=>'old_password','placeholder'=>'Old Password','class'=>'form-control required','required' => 'required')) !!}
			    </div>
			  </div>
			</div>
		      </div>
		
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>New Password</label>
			  <div class="one_tab_inner">
			    <div>
			      
			      {!! Form::password('password','',array('placeholder'=>'New Password','class'=>'form-control required')) !!}
			    </div>
				     
			  </div>
			</div>
		      </div>
		      
		     <div class="tab_form clear">
			<div class="tab_form_left full_tab">
			  <label>Retype Password</label>
			  <div class="one_tab_inner">
			    <div>
			      
			      {!! Form::password('password_confirm','',array('id'=>'password_confirm','placeholder'=>'Confirm Password','class'=>'form-control required')) !!}
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
		$("#changepass").validate({
				rules: {		
						old_password: {
								required: true
						},
						password: {
								required: true
						},
						password_confirm: {
								required: true,
								equalTo: '[name="password"]'
						},
				},
				messages: {
						old_password: "Please enter Old Password.",
						password: 	  "Please enter a password.",
						password_confirm: {
								required :"Please re-type Password.",
								equalTo  : "Password does not match."
						},
						
				},
				submitHandler: function(form) {
				    form.submit();
				}
		});
});
</script>
@endsection