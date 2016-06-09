<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Business Guru</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="csrf-token" content="{{ csrf_token() }}" />   
<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<link type="text/css" rel="stylesheet" href="{{ URL::asset('front_assets/assets/style.css') }}">
<link type="text/css" rel="stylesheet" href="{{ URL::asset('front_assets/assets/css/genericons.css') }}">
<link rel="stylesheet" href="{{ URL::asset('front_assets/assets/css/jquery-ui.css')}}">


<script type="text/javascript" src="{{ asset('front_assets/assets/js/jquery.min.js') }}"></script> 
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/files/login.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/custom_script.js')}}"></script>	
<script type="text/javascript" src="{{ asset('admin_assets/js/jquery.validate.my-methods.js')}}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/functions.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/common.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/tinyscrollbar.js') }}"></script>
    
<script type="text/javascript" src="{{ asset('front_assets/assets/js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/easyResponsiveTabs.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/jquery.fancybox.js')}}"></script>
<script  type="text/javascript" src="{{ asset('front_assets/ckeditor/ckeditor.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/fancybox/jquery.fancybox.css')}}" media="screen" />

<script>
    var base_url = '{{URL::route('register')}}';
    var BASE_URL = '{{URL::route('register')}}';
    var csrf_token = '{{ csrf_token() }}';
</script>
</head>
{{--*/
$controller = Helpers::getRoute('controller');
$action = Helpers::getRoute('action');
/*--}}


<body class="@if($controller =='RegisterController' && $action == 'index') home_page @endif dashboard">
@if($controller =='CmsController' || $controller =='DiscoverController')
    <div class="business_signin" style="display:none;">
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
		      <div id="errormsg" style="color:red;"></div>
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
		      <input type="submit" name="submit" value="Sign up">
		    </div>
		  {!! Form::close() !!}      
		</div>
	      </div>
	    </div>
	  </div>
	</div>
	</div>  

	
      <div class="invester_signin" style="display:none;">
  	<div id="scrollbar1">
	  <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
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
		  {!! Form::open(['name'=> 'frmLogin', 'route'=>['save_invester_step'],'id'=>'save_invester_step','class' => 'form form-validate','enctype'=>'multipart/form-data']) !!}
				{!! Form::hidden('action','Process',array('id'=>'hidval')) !!}
				{!! Form::hidden('type','Investor',array('id'=>'type')) !!}
		    <h2>Sign Up</h2>
		    <div class="form_field clear">
		      <label>Email Address</label>
		      {!! Form::email('email','',array('id'=>'email2','placeholder'=>'Email','class'=>'form-control parsley-validated required','required' => 'required')) !!}
		      <span class="email_error error"></span>
		    </div>
		    <div class="form_field clear">
		      <label>Password</label>
		      {!! Form::password('password',array('id'=>'password2','placeholder'=>'Password','class'=>'form-control parsley-validated required','required' => 'required')) !!}
		      <span class="pass_error error"></span>
		    </div>
		    <div class="form_field clear">
		      <label>Confirm Password</label>
		      {!! Form::password('password_confirmation',array('id'=>'password_confirmation2','placeholder'=>'Retype Password','class'=>'form-control')) !!}
		      <span class="passconf_error error"></span>
		    </div>
		    <div class="form_field clear">
		      <input type="submit" name="submit" value="Sign up">
		    </div>
		  {!! Form::close() !!}	      
		</div>
	      </div>
	    </div>
	  </div>
	</div>
	 </div> 
@endif
    <div class="wrapper">
    <!-- header section------>  
    @include('layout.header')
    <!-- End header section------>
    
    <!-- Mid section------>
    @yield('content')
    <!-- End mid section------>
    
    <!-- footer section------>
    @include('layout.footer')
    <!-- End footer section------>
    </div>    


</body>
</html>
