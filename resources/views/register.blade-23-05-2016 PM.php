@extends('app')
@section('content')
<div class="loginWrapper">
		<div class="errorSuccess"></div>				
		<div class="chooseUserType">
				<ul>
						<li><a class="investor" data-toggle="modal" data-target="#myModal">Investors "I WANT TO INVEST"</a></li>
						<li><a href="http://182.73.137.51:9999/save_business_step" class="business">Business Start Up "INVEST IN ME"</a></li>
				</ul>
				<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>-->
		</div>
</div>
<script>
$('.investor').click(function(){
		$('.chooseUserType').css('display','none');
		$('.investor_div').css('display','block');
		$('.errorSuccess').css('display','none');
});

$('.business').click(function(){
		$('.chooseUserType').css('display','none');
		$('.business_div').css('display','block');
		$('.errorSuccess').css('display','none');
});

$('.back_lnk').click(function(){
		$('.investor_div').css('display','none');
		$('.business_div').css('display','none');
		$('.chooseUserType').css('display','block');
});   
</script>
		
<script>
$(document).ready(function(){
		$("#sign_in").validate({
				rules: {		
						email: {
								required: true,
								email: true
						},
						password: {
								required: true,
								minlength: 6,
						},
				},
				messages: {
						password: {
								required: "Please provide a password",
								minlength: "Your password must be at least 6 characters long"
						},
						email: "Please enter a valid email address",
				},
				submitHandler: function() {
						var base_url_suffix	= '';
						var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
						var url = base_url + 'sign_in';
						$.ajax({
								type: "POST",
								url: url,
								data: $("#sign_in").serialize(),
								beforeSend: function(){
						
								},
								dataType: "json",
								success: function(response){ 			   					
										if(response.id > 0){
												window.location.href= base_url+ 'investor_dashboard';
										}
										else{ 
												$('#errormsg').html('Login Failed!!');		
										}
								}
						});
				}
		});
});
</script>

  @endsection
	
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
				<div class="modal-content">
						<div class="modal-header">
								<!--<button type="button" class="close" data-dismiss="modal">&times;</button>
								<a href="http://182.73.137.51:9999/save_business_step">&times;</a>-->
								<h4 class="modal-title">Log In</h4>
						</div>
						<div class="modal-body">
								
{!! Form::open(['name'=> 'frmLogin', 'route'=>['save_invester_step'],'id'=>'sign_in','class' => 'form form-validate','enctype'=>'multipart/form-data']) !!}
				{!! Form::hidden('action','Process',array('id'=>'hidval')) !!}
				{!! Form::hidden('type','Investor',array('id'=>'type')) !!}
										
										<div class="form_sep">
												<label class="req"><b>Email</b></label>
												<input id="email" placeholder="Email" class="form-control parsley-validated required" required="required" name="email" type="email" value="">
										</div>
										<div class="form_sep">
												<label class="req"><b>Password</b></label>
												<input id="password" placeholder="Password" class="form-control parsley-validated required" required="required" name="password" type="password" value="">
										</div>
										<div>&nbsp;</div>
										<div class="form_sep">
												<div class="modal-footer">
														<a href="{{URL::route('register')}}" class="btn btn-default">Close</a>
														<input id="submit" class="buttonM bBlue" type="submit" value="Login">
														<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
												</div>
												<div id="errormsg" style="color:red;"></div>
										</div>
										<div class="form_sep">
												<div class="modal-footer">
														<a href="{{URL::route('save_invester_step')}}" style="text-decoration:none;">Sign Up&nbsp;&nbsp;</a>
														<a href="{{URL::route('forgot_password')}}" style="text-decoration:none;">&nbsp;&nbsp;Forgot Password?</a>
												</div>
										</div>
								</form> 
						</div>
				</div>
    </div>
</div>
	
<script>
		$(document).ready(function(){
				$(document).on('click','.business',function(){
						alert("Test");
				});		
		});
</script>	