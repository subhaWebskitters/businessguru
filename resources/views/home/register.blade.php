@extends('masterLayout')  
@section('content')
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
																						{!! Form::email('email_investor','',array('id'=>'email_investor','placeholder'=>'Email','class'=>'form-control  required','autocomplete' => 'off')) !!}
																						<span class="email_error error" style="color:yellow;"></span>
																				</div>
																				<div class="form_field clear">
																						<label>Password</label>
																						{!! Form::password('password_investor',array('placeholder'=>'Password','class'=>'form-control required','autocomplete' => 'off')) !!}
																						<span class="pass_error error"></span>
																				</div>
																				<div class="form_field clear">
																						<label>Confirm Password</label>
																						{!! Form::password('password_confirmation_investor',array('id'=>'password_confirmation_investor','placeholder'=>'Retype Password','class'=>'form-control required','autocomplete' => 'off')) !!}
																						<span class="passconf_error error"></span>
																				</div>
																				<div class="form_field clear">
																						<input type="submit" name="submitbtn" value="Sign up" id="investor_regi">
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
										<div class="scrollbar">
												<div class="track">
														<div class="thumb">
																<div class="end"></div>
														</div>
												</div>
										</div>
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
																		{!! Form::open(['route'=>'business_register','name'=> 'frmSignUpBusiness','class' => 'form form-validate formRow','id'=>'frmSignUpBusiness','enctype'=>'multipart/form-data', 'files'=>true]) !!}
																				{!! Form::hidden('action','Process',array('id'=>'action')) !!}
																				{!! Form::hidden('type','Business',array('id'=>'type')) !!}
																				<h2>Sign Up</h2>
																				<div class="form_field clear">
																						<label>Email Address</label>
																						{!! Form::email('email_business','',array('id'=>'email_business','placeholder'=>'Email','autocomplete' => 'off','class'=>'form-control parsley-validated required','required' => 'required','minlength'=>'6')) !!}
																						<span class="email_error error"></span>
																				</div>
																				<div class="form_field clear">
																						<label>Password</label>
																						{!! Form::password('password_business',array('placeholder'=>'Password','class'=>'form-control parsley-validated required','autocomplete' => 'off','required' => 'required','minlength'=>'6')) !!}
																						<span class="pass_error error"></span>
																				</div>
																				<div class="form_field clear">
																						<label>Confirm Password</label>
																						{!! Form::password('password_confirmation_business',array('id'=>'password_confirmation_business', 'placeholder'=>'retype password','autocomplete' => 'off','class'=>'form-control')) !!}
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


		<script>
				var base_url_suffix	= '';
				var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
				
				$(function(){
				
						/* FOR INVESTOR SIGN UP VALIDATE */
				
						$('#frmSignUpInvestor').validate({
								rules: {
										password_investor: {
										  required: true,
										  minlength: 6
										},
										password_confirmation_investor: {
												required: true,
												equalTo: '[name="password_investor"]'
										},
										email_investor:{
												remote: {
												  url: base_url+'invester_email_unique',
												  type: "post",
												  data: {
													email_investor: function() {
													  return $( "#email_investor" ).val();
													},'_token':csrf_token
												  }
												}
										}
								},
								messages: {
								email_investor	: {required:"Please enter a valid email address", remote: "Your email address is already exist"}
								}
						});
						
						/* FOR INVESTOR SIGN UP VALIDATE */
						
						
						/* FOR BUSINESS SIGN UP VALIDATE */
						
						$('#frmSignUpBusiness').validate({
								rules: {
										password_business: {
										  required: true,
										  minlength: 6
										},
										password_confirmation_business: {
												required: true,
												equalTo: '[name="password_business"]'
										},
										email_business:{
												remote: {
												  url: base_url+'business_email_unique',
												  type: "post",
												  data: {
													email_business: function() {
													  return $( "#email_business" ).val();
													},'_token':csrf_token
												  }
												}
										}
								},
								messages: {
								email_business	: {required:"Please enter a valid email address", remote: "Your email address is already exist"}
								}
						});
						
						/* FOR BUSINESS SIGN UP VALIDATE */

				});
		</script>

@endsection