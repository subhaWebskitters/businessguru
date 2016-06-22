@extends('masterLayout')  
@section('content')
		<script>
				var base_url_suffix	= '';
				var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
				 $(document).ready(function(){
				 	$("#investor_regi").click(function(){
					$("#email_investor").removeData("previousValue");
			$("#frmSignUpInvestor").validate({
						rules: {		
								password_investor: {
										required: true,
										minlength: 6,
								},
								password_confirmation_investor: {
										required: true,
										equalTo: '[name="password_investor"]'
								},
								email_investor: {
										required: true,
										email: true
										//remote: {
										//		url: base_url+'invester_email_unique',
										//		data:{'_token':csrf_token},
										//		type: "post",
										//		cache: false,
										//		success: function(response) { alert(response);
										//				if (response == 0) {
										//						$("#frmSignUpInvestor").submit();
										//				}
										//				else {
										//						alert("Not Submit");
										//						return false;
										//				}
										//		}
										//}
								}
						},
						messages: {
								email_investor	: {required:"Please enter a valid email address", remote: "Your email address is already exist"},
								password_investor: "Please enter Password.",
								password_confirmation_investor: {
										required : "Please re-type Password.",
										equalTo  : "Password does not match."
								}
						},
						submitHandler: function(form) {
							
								//form.submit();
								var isUnique = true;
								$("#email_investor").removeData("previousValue");
								
										$.ajax({
								type: 'post',
								data: {email:$('#email_investor').val(),_token: csrf_token},
								url: base_url+'invester_email_unique',
								success: function(data){ alert(data);
										if (data > 0){
												$('.email_error').css('color','red');
												$('.email_error').html('Email id already exists. Please select another email ID');
												//$('#investor_regi').prop( "disabled", true );
												return false;
										}
										else{
												//$("#frmSignUpInvestor").submit();
												$('#investor_regi').attr('disabled','disabled');
												isUnique = true;
												
												//return true;
										}
										
										//else if (data == 0){
										//		
										//		
										//		//$('.email_error').html('');
										//		
										//		//$('#investor_regi').prop( "disabled", false );
										//}
										//return false;
								}
						});
						
						
						setTimeout(function(){
						if (isUnique) { 
								form.submit();
						}
						},5000);
						
						
								
						},
						 invalidHandler: function(event, validator) {
								console.log(validator);
								var errors = validator.numberOfInvalids();
								console.log('You have missed:' + errors);
						 }
				});

				//$(document).on('click','#investor_regi',function(e){
				//		$.ajax({
				//				type: 'post',
				//				data: {email:$('#email_investor').val(),_token: csrf_token},
				//				url: base_url+'/invester_email_unique',
				//				success: function(data){ 
				//						if (data > 0){
				//								$('.email_error').css('color','red');
				//								$('.email_error').html('Email id already exists. Please select another email ID');
				//								//$('#investor_regi').prop( "disabled", true );
				//						}
				//						else{
				//								$("#frmSignUpInvestor").submit();
				//						}
				//						//else if (data == 0){
				//						//		
				//						//		
				//						//		//$('.email_error').html('');
				//						//		
				//						//		//$('#investor_regi').prop( "disabled", false );
				//						//}
				//				}
				//		});
				//});

				});
						});
				
				
				
		</script>
		<div id="main" class="clear">
				<div class="two_img clear">
						<div class="two_img_inner investors">
								<div class="two_img_text">
										<h2>Business Investors</h2>
										<span>I want to invest</span>
								</div>
								<div id="scrollbar1">
										<div class="scrollbar">
												<div class="track">
														<div class="thumb">
																<div class="end"></div>
														</div>
												</div>
										</div>
										<div class="viewport">
												<div class="overview">
														<div class="two_img_form" id="investor_login">
																<div class="login">
																		{!! Form::open(['name'=> 'frmLogin', 'route'=>['investor_sign_in'],'id'=>'investor_sign_in','class' => 'form form-validate','enctype'=>'multipart/form-data']) !!}
																				{!! Form::hidden('action','Process',array('id'=>'hidval')) !!}
																				{!! Form::hidden('type','Investor',array('id'=>'type')) !!}
																				<h2>Log In</h2>
																				<div id="errormsg" style="color:red;"></div>
																				<div class="form_field clear">
																						<label>Email Address</label>
																						<input id="email1" placeholder="Email" autocomplete="off" class="form-control required" required="required" name="email" type="email" value="">
																				</div>
																				<div class="form_field clear">
																						<label>Password</label>
																						<input id="password1" placeholder="Password" autocomplete="off" class="form-control required" required="required" name="password" type="password" value="">
																				</div>
																				<div class="form_field clear">
																						<input id="submit" type="submit" name="submit" value="Login">
																				</div>
																		{!! Form::close() !!}	      
																</div>
																		
																<div class="login sign_up">
																		{!! Form::open(['name'=> 'frmSignUpInvestor', 'route'=>['save_invester_step'],'id'=>'frmSignUpInvestor','class' => 'form form-validate','enctype'=>'multipart/form-data']) !!}
																				{!! Form::hidden('action','Process',array('id'=>'hidval')) !!}
																				{!! Form::hidden('type','Investor',array('id'=>'type')) !!}
																				<h2>Sign Up</h2>
																				<div class="form_field clear">
																						<label>Email Address</label>
																						{!! Form::email('email_investor','',array('id'=>'email_investor','placeholder'=>'Email','class'=>'form-control parsley-validated required','autocomplete' => 'off')) !!}
																						<span class="email_error error" style="color:yellow;"></span>
																				</div>
																				<div class="form_field clear">
																						<label>Password</label>
																						{!! Form::password('password_investor',array('placeholder'=>'Password','class'=>'form-control parsley-validated required','autocomplete' => 'off')) !!}
																						<span class="pass_error error"></span>
																				</div>
																				<div class="form_field clear">
																						<label>Confirm Password</label>
																						{!! Form::password('password_confirmation_investor',array('id'=>'password_confirmation_investor','placeholder'=>'Retype Password','class'=>'form-control required','autocomplete' => 'off')) !!}
																						<span class="passconf_error error"></span>
																				</div>
																				<div class="form_field clear">
																						<input type="submit" name="submit" value="Sign up" id="investor_regi">
																				</div>
																		{!! Form::close() !!}	      
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				
						<div class="two_img_inner start_up">
						<div class="two_img_text">
						<h2>Business Start Up</h2>
						<span>Invest in me</span>
						</div>
						
						<div id="scrollbar2">
						<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
						<div class="viewport">
						<div class="overview">
						<div class="two_img_form" id="start_login">
						<div class="login">
						{!! Form::open(['name'=> 'frmLogin', 'route'=>['business_login'],'id'=>'business_sign_in','class' => 'form form-validate frmLogin','enctype'=>'multipart/form-data']) !!}
						{!! Form::hidden('action','Process',array('id'=>'hidval')) !!}
						{!! Form::hidden('type','Business',array('id'=>'type')) !!}
						<h2>Log In</h2>
						<div id="errormsg1" style="color:red;"></div>
						<div class="form_field clear">
						<label>Email Address</label>
						<input id="email1" placeholder="Email" class="form-control required" required="required" name="email" type="email" value="">
						</div>
						<div class="form_field clear">
						<label>Password</label>
						<input id="password1" placeholder="Password" class="form-control required" required="required" name="password" type="password" value="">
						</div>
						
						<div class="form_field clear">
						<input id="submit" type="submit" name="submit" value="Login">
						</div>
						{!! Form::close() !!}	      
						</div>
						<div class="login sign_up">
						{!! Form::open(['route'=>'business_register','class' => 'form form-validate formRow','id'=>'business_form','enctype'=>'multipart/form-data', 'files'=>true]) !!}
						{!! Form::hidden('action','Process',array('id'=>'action')) !!}
						<h2>Sign Up</h2>
						<div class="form_field clear">
						<label>Email Address</label>
						{!! Form::email('email','',array('id'=>'email','placeholder'=>'Email','class'=>'form-control parsley-validated required','required' => 'required')) !!}
						<span class="email_error error"></span>
						</div>
						<div class="form_field clear">
						<label>Password</label>
						{!! Form::password('password',array('id'=>'password','placeholder'=>'Password','class'=>'form-control parsley-validated required','required' => 'required')) !!}
						<span class="pass_error error"></span>
						</div>
						<div class="form_field clear">
						<label>Confirm Password</label>
						{!! Form::password('password_confirmation',array('id'=>'password_confirmation','placeholder'=>'retype password','class'=>'form-control')) !!}
						<span class="passconf_error error"></span>
						</div>
						<div class="form_field clear">
						<input type="submit" name="submit" value="Sign up" id="bussiness_regi">
						</div>
						{!! Form::close() !!}      
						</div>
						</div>
						</div>
						</div>
						</div>
						
						</div>
				
				</div>
				<span class="live_chat">
						<img src="{{ asset('front_assets/assets/images/live_chat.png') }}" alt="no img">
				</span>
		</div>

		
@endsection