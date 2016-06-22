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
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ URL::asset('front_assets/assets/style.css') }}">
<link type="text/css" rel="stylesheet" href="{{ URL::asset('front_assets/assets/css/genericons.css') }}">
<link type="text/css" rel="stylesheet" href="{{ URL::asset('front_assets/assets/css/jquery.multiselect.css') }}">
<link rel="stylesheet" href="{{ URL::asset('front_assets/assets/css/jquery-ui.css')}}">


<script type="text/javascript" src="{{ asset('front_assets/assets/js/jquery.min.js') }}"></script> 
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/files/login.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/custom_script.js')}}"></script>	
<script type="text/javascript" src="{{ asset('admin_assets/js/jquery.validate.my-methods.js')}}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/functions.js') }}"></script>


    
<script type="text/javascript" src="{{ asset('front_assets/assets/js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/easyResponsiveTabs.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/js/jquery.fancybox.js')}}"></script>
<!--<script  type="text/javascript" src="{{ asset('front_assets/ckeditor/ckeditor.js')}}"></script>-->
<script type="text/javascript" src="{{ asset('front_assets/assets/js/tinyscrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/common.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_assets/assets/js/jquery.multiselect.js') }}"></script>
    
<!-- include libraries(jQuery, bootstrap) -->

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>

   
  
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/fancybox/jquery.fancybox.css')}}" media="screen" />

<script>
    var base_url = '{{URL::route('register')}}';
    var BASE_URL = '{{URL::route('register')}}';
    var csrf_token = '{{ csrf_token() }}';
</script>
<!--Start of Zopim Live Chat Script-->

    <script>
    $(document).ready(function(){
        $(document).on('click','.live_chat',function(){
            if ($(".zopim").length >0 ){
                $(".zopim:eq(1)").show();
            }else{
                 window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
                 d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
                 _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
                 $.src="//v2.zopim.com/?3ylk3F8iCWuUYTixpENO4iJqgRcImC4w";z.t=+new Date;$.
                 type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
                 $zopim(function(){
                    window.setTimeout(function() {
                    $zopim.livechat.window.show();
                    }, 30000); //time in milliseconds
                    });
            }
        })
    });
    $(document).on('click', function (e) {
	if ($(e.target).parents('.live_chat').length == 0 ){
	   $(".zopim").hide();
	}
	
        });
    </script>
<!--End of Zopim Live Chat Script-->
</head>
{{--*/
$controller = Helpers::getRoute('controller');
$action = Helpers::getRoute('action');
/*--}}


<body class="@if($controller =='RegisterController' && $action == 'index') home_page @endif dashboard">

    @if($controller =='CmsController' || $controller =='DiscoverController')
    
        <div class="business_signin" style="display:none;">
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
                                {!! Form::open(['name'=> 'frmSignUpInvestor', 'route'=>['save_invester_step'],'id'=>'frmSignUpInvestor','class' => 'form form-validate','enctype'=>'multipart/form-data']) !!}
                                    {!! Form::hidden('action','Process',array('id'=>'hidval')) !!}
                                    {!! Form::hidden('type','Investor',array('id'=>'type')) !!}
                                    <h2>Sign Up</h2>
                                    <div class="form_field clear">
                                        <label>Email Address</label>
                                        {!! Form::email('email_investor','',array('id'=>'email_investor','placeholder'=>'Email','class'=>'form-control  required','autocomplete' => 'off')) !!}
                                        <span class="email_error error"></span>
                                    </div>
                                    <div class="form_field clear">
                                        <label>Password</label>
                                        {!! Form::password('password_investor',array('placeholder'=>'Password','class'=>'form-control required','autocomplete' => 'off')) !!}
                                        <span class="pass_error error"></span>
                                    </div>
                                    <div class="form_field clear">
                                        <label>Confirm Password</label>
                                        {!! Form::password('password_confirmation_investor', array('id'=>'password_confirmation_investor', 'placeholder'=>'Retype Password', 'class'=>'form-control required','autocomplete' => 'off')) !!}
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
    
    
</body>
</html>
