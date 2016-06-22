
var csrf_token  = $('meta[name=csrf-token]').attr('content');

var otp_value   = 0;
$(document).on('keypress','#email',function(){ 
    $("#email").css('border','1px solid #d7d7d7');
});
$(document).on('keypress','#password',function(){ 
    $("#password").css('border','1px solid #d7d7d7');
});
$(document).on('keypress','#password_confirmation',function(){ 
    $("#password_confirmation").css('border','1px solid #d7d7d7');
});

    function statusModifier(type,element){
        var id=$(element).attr('data-team');
        $("#loader_"+id).css("visibility","visible");
        var url ='';
        switch (type) {
            case "investor":	url = BASE_URL+"/investor/set-status";
        break;
            case "business_user":	url = BASE_URL+"/business_user/set-status";
        break;
        }
				
				
        $(element).find('i').removeClass('fa fa-check-square-o');
        $(element).find('i').removeClass('glyphicon glyphicon-remove-sign');
        //$(element).find('i').addClass('fa fa-spinner');
                
        $.ajax({
                type:"post",
                data:{"id":id},
                url:url,
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success:function(msg){
                    //alert($(this).prop('data-status'));
                    if ($(element).hasClass("btn-success")==true) {
                          $(element).addClass("btn-primary");
                          $(element).removeClass("btn-success");
                          $(element).attr('title','Inactive');
                          //$(element).find('i').removeClass('fa fa-spinner');
                          $(element).find('i').addClass('glyphicon glyphicon-remove-sign');
                    }
                    else if ($(element).hasClass("btn-primary")==true) {
                          $(element).addClass("btn-success");
                          $(element).removeClass("btn-primary");
                          //$(element).find('i').removeClass('fa fa-spinner');
                          $(element).find('i').addClass('fa fa-check-square-o');
                          $(element).attr('title','Active');
                    }
                    //$("#loader_"+id).css("visibility","hidden");
                }
        });
    }
    
    
    function statusEditor(type,element){
        var id=$(element).attr('data-team');
        //$("#loader_"+id).css("visibility","visible");
        var url ='';
        switch (type) {
            case "business_proposal":	url = BASE_URL+"/business_proposal/set-status";
       
        break;
        }
			
        $(element).find('i').removeClass('fa fa-check-square-o');
                
        $.ajax({
                type:"post",
                data:{"id":id},
                url:url,
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success:function(msg){
                   
                    if ($(element).hasClass("btn-success")==true) {
                          $(element).addClass("btn-warning");
                          $(element).removeClass("btn-success");
                          $(element).attr('title','Requested');
                          $(element).find('i').addClass('fa fa-check-square-o');
			  $('.status-'+id).html('<a href="javascript:" class="btn btn-default btn-xs btn-warning"><i class="fa"></i>Requested</a>');
                    }
                    else if ($(element).hasClass("btn-warning")==true) {
                          $(element).addClass("btn-success");
                          $(element).removeClass("btn-warning");
                         
                          $(element).find('i').addClass('fa fa-check-square-o');
                          $(element).attr('title','Approval');
			  $('.status-'+id).html('<a href="javascript:" class="btn btn-default btn-xs btn-success"><i class="fa"></i>Approval</a>');
                    }
                    
                }
        });
    }

		$(document).on('click','#go_to_basic',function(){
				var email 			= $('#email').val();
				var password 			= $('#password').val();
				var password_confirmation 	= $('#password_confirmation').val();
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
				if(!regex.test(email)){
						alert('Please enter a valid email address');
						$("#email").css('border','1px solid red').focus();
						return false;
				}
		
				$.ajax({
						type: 'post',
						data: {email:$('#email').val(),_token: csrf_token},
						url: base_url+'/invester_email_unique/',
						success: function(data){ 
								if (data != 0){
										alert('Email id already taken. Please select another email ID');
										$("#password").css('border','1px solid red');
										return false;
								}
						}
				}); 
		
				if (password == ''){
						alert('Please enter password');
						$("#password").css('border','1px solid red');
						return false;
				}
		
				if (password_confirmation == ''){
						alert('Please enter confirm password');
						$("#password_confirmation").css('border','1px solid red').focus();
						return false;
				}
				else{
						if (password_confirmation != password){
								alert("Password and confirmation password aren't same");
								$("#password_confirmation").css('border','1px solid red').focus();
								return false;
						}
				}   
		
				$('#investor_div').css('display','none');
				$('#form_basic').css('display','block');
				$('.upper_tab').css('display','block');
				$('.basic_tab').addClass('active');
		});


/* OTP FOR INVESTOR SIGN UP SEND & VERIFIED SMS WITH TWILLO */

		//$(document).on('click','.verify_otp',function(){
		//    if ($('#contact').val() == '') {
		//				alert('Please enter Mobile Number');
		//				return false;
		//		}
		//		else{
		//		$.ajax({
		//				type: 'post',
		//				data: {contact:$('#contact').val(),_token: csrf_token},
		//				url: base_url+'/send_otp',
		//				success: function(data){
		//						if (data != 0){
		//								otp_value = data;
		//								$('.otp_status').html('OTP has been sent to your mobile please check.');
		//								$('.verify_otp').css('display','none');
		//								$('#hid_otp_val_investor').val(otp_value);
		//								$('.otp_status').after('<div class="enter_otp"><input type="text" name="otp_value" id="otp_value"/><button id="verify_button" class="buttonM bBlue verify_button" type="button">Verify</button></div>');
		//						}
		//						else
		//								$('.otp_status').html("Can't send sms please check your phone no.");
		//				},
		//				error: function(xhr, textStatus, errorThrown){
		//						$('.otp_status').html("Can't send sms please check your phone no.");
		//				}
		//		});
		//		}
		//});
  
		$(document).on('click','.verify_button',function(){
				var user_otp_value = $('#otp_value').val();
				
				var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
				
				var otp_value = Base64.decode($('#hid_otp_val_investor').val());
				
				if(user_otp_value == otp_value){
						$('#contact').attr('readonly','true');
						$('#otp_verified').val(1);
						$('.verify_otp,.otp_status,.enter_otp').remove();
						//alert('Successfully verified');
						$('#form_completion').css('display','block');
						$('#save_invester_step').submit();
				}
				else{
						alert('OTP mismatch.')
				}
		});

/* OTP FOR INVESTOR SIGN UP SEND & VERIFIED SMS WITH TWILLO */


/* OTP FOR BUSINESS SIGN UP SEND & VERIFIED SMS WITH TWILLO */

		//$(document).on('click','.buss_verify_otp',function(){
		//		if ($('#contact').val() == '') {
		//				alert('Please enter Mobile Number');
		//				return false;
		//		}
		//		else{
		//				//$('#buss_otp_verify').val(1);
		//				$.ajax({
		//						type: 'post',
		//						data: {contact:$('#contact').val(),_token: csrf_token},
		//						url: base_url+'/buss_send_otp',
		//						success: function(data){ 
		//								if (data != 0){
		//										otp = data; 
		//										$('.buss_otp_status').html('OTP has been sent to your mobile please check.');
		//										$('.buss_verify_otp').css('display','none');
		//										$('#hid_otp_val_business').val(otp);
		//										$('.buss_otp_status').after('<div class="enter_otp"><input type="text" name="otp_value" id="otp_value"/><a href="javascript:void(0)" class="buss_verify_button">Verify</a></div>');
		//								}
		//								else{
		//										$('.buss_otp_status').html("Can't send sms please check your phone no.");
		//										//$('#buss_otp_verify').val(0);
		//								}
		//						},
		//						error: function(xhr, textStatus, errorThrown){
		//								$('.buss_otp_status').html("Can't send sms please check your phone no.");
		//								//$('#buss_otp_verify').val(0);
		//						}
		//				});
		//		}
		//});

		$(document).on('click','.buss_verify_button',function(){ 
				
				var otpval= $('#otp_value').val(); 
				
				var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
				
				var otp= Base64.decode($('#hid_otp_val_business').val());
				
				if(otpval == otp){
						$('#contact').attr('readonly','true');
						$('#buss_otp_verify').val(1);
						$('.buss_verify_otp,.buss_otp_status,.enter_otp').remove();
						//alert('Successfully verified');
						$('#action').val('Process');
				    $('#business_form').submit();
				}
				else{
						alert('OTP mismatch.')
				}
		});

/* OTP FOR BUSINESS SIGN UP SEND & VERIFIED SMS WITH TWILLO */

/* *************************************************** */
   
	  
		/************ IMAGE FILE UPLOAD FOR INVESTOR *********************/
		
		$(document).on('change','#fileUpload',function(){ 
				var countFiles = $(this)[0].files.length;
				var imgPath = $(this)[0].value;
				var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
				var image_holder = $("#invest_logo");
				var old_image = $("#invest_logo").attr("src"); //alert(old_image); 

				//image_holder.empty();
		
				if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") { 
						
						if (typeof (FileReader) != "undefined") {		
								//loop for each file selected for uploaded.
								for (var i = 0; i < countFiles; i++) { 
										var reader = new FileReader();
										var fileSize = this.files[0]; 
										var sizeInMb = (fileSize.size/1024)/1024; 
										var sizeLimit= 15;
										if (sizeInMb > sizeLimit) {
												$("#invest_logo").attr("src",'images/img16.jpg');
												$('#image-holder').html('File size must be less than 15MB');
										}
										else{
												reader.onload = function (e) {
														$("#invest_logo").attr("src",e.target.result);
														$("#invest_logo").addClass("thumb-image");
																				//$("<img />", {
																				//		"src": e.target.result,
																				//		"class": "thumb-image"
																				//}).appendTo(invest_logo);
																		}
												$('#image-holder').html('');
												//image_holder.show();
												reader.readAsDataURL($(this)[0].files[i]);
										}
								}
						}
						else {
								alert("This browser does not support FileReader.");
						}
				}
				else {
						alert("Pls select only images");
						$('#fileUpload').val('');
				}
		});
   
		/************ IMAGE FILE UPLOAD FOR INVESTOR *********************/
	 
		/************ File Upload *********************/
	 
	  $(document).on('change','#portfolioUpload',function(){ 
				var filename = $("#portfolioUpload").val(); 
        var extension = filename.replace(/^.*\./, ''); 
        if (extension == filename) {
            extension = '';
        }
				else {
            extension = extension.toLowerCase();
						if (extension == "pdf" || extension == "doc" || extension == "docx") {
								var fileSize = this.files[0]; 
								var sizeInMb = (fileSize.size/1024)/1024; 
								var sizeLimit= 5;
								if (sizeInMb > sizeLimit) {
										$('#portfolioUpload').val('');
										alert('File size must be less than 2MB');
								}	
						}
						else{
								$('#portfolioUpload').val('');
								alert("Please upload DOC/DOCX/PDF");
						}
        }
		});
	 
		/* ************************************************** */
	 
	 
	 
   
$(document).on('click','#back_to_basic',function(){
    $('#investor_div').css('display','block');
    $('#form_basic').css('display','none');
    $('.upper_tab').css('display','none');
});


		/*  VALIDATE BASIC PAGE FOR INVESTOR SIGN UP  */

		$(document).on('click','#go_to_protfolio',function(){
		    
				var name         = $('#name').val();
				var contact         = $('#contact').val();
				var company_name    = $('#company_name').val();
				var arca_no         = $('#arca_no').val();
				
				var business_type = $("input[name='investor_type']").is(':checked');
				//alert(business_type);
				if (business_type == false) {
				    alert('Please select Individual/Vc Firm');
				    return false;
				}
				
				if (name == ''){
						alert('Please enter name');
						$("#name").css('border','1px solid red');
						return false;
				}
		
				if (contact == ''){
						alert('Please enter contact no');
						$("#contact").css('border','1px solid red');
						return false;
				}
				
				if (company_name == ''){
						alert('Please enter company name');
						$("#company_name").css('border','1px solid red');
						return false;
				}
				if (arca_no == ''){
						alert('Please enter ARCA no');
						$("#arca_no").css('border','1px solid red');
						return false;
				}
				
				$('#contactno').html(contact);
				$('.three_option h2').html('Let us understand <br> you better');
				$('#form_basic').css('display','none');
				$('#form_portfolio').css('display','block');
				$('.basic_tab').removeClass('active');
				$('.portfolio_tab').addClass('active');
				
				$('#basic_li').removeClass('active_list');
				$('#basic_li').addClass('complete_list');
				$('#portfolio_li').addClass('active_list');
		});

		/*  END OF VALIDATE BASIC PAGE FOR INVESTOR SIGN UP  */

		/* VALIDATE PORTFOLIO PAGE FOR INVESTOR SIGN UP */

		$(document).on('click','#go_to_fund_next',function(){
				var about_company   = $('#about_company').val();
				var portfolio    		= $('#portfolioUpload').val();
				var industries      = $('#industries').val();
		
				if (about_company == ''){
						alert('Please enter About Company');
						$("#about_company").css('border','1px solid red');
						return false;
				}
				if (portfolio == ''){
						alert('Please Upload file');
						$("#portfolioUpload").css('border','1px solid red');
						return false;
				}
				if (!industries){
						alert('Please enter industries');
						$("#industries").css('border','1px solid red');
						return false;
				}
				
				$('.three_option h2').html('an investment in knowledge <br> pays the best interest-benjamin franklinin');
				$('#form_basic').css('display','none');
				$('#form_portfolio').css('display','none');
				$('#go_to_fund_next').css('display','none');
				$('#form_fund').css('display','block');
				$('.basic_tab').removeClass('active');
				$('.portfolio_tab').addClass('active');
				
				$('#portfolio_li').removeClass('active_list');
				$('#portfolio_li').addClass('complete_list');
				$('#funds_li').addClass('active_list');
		});

		/* END OF VALIDATE PORTFOLIO PAGE FOR INVESTOR SIGN UP */

		/* VALIDATE FUND PAGE FOR INVESTOR SIGN UP */

		$(document).on('click','#go_to_otp_verify',function(){ 
				var annual_salary   = $('#annual_salary').val();
				var will_invest    	= $('#willing_to_invest').val();
		
				if (annual_salary == ''){
						alert('Please enter Annual Salary');
						$("#annual_salary").css('border','1px solid red');
						return false;
				}
				if (will_invest == ''){
						alert('Please Fill the willing to invest field');
						$("#willing_to_invest").css('border','1px solid red');
						return false;
				}
				
				$.ajax({
						type: 'post',
						data: {contact:$('#contact').val(),_token: csrf_token},
						url: base_url+'send_otp',
						success: function(data){
								if (data != 0){
										otp_value = data;
										
										$('.verify_otp').css('display','none');
										$('#hid_otp_val_investor').val(otp_value);
										
										//alert('OTP has been sent to your mobile for future verification.');
										//$('.otp_status').html('OTP has been sent to your mobile please check.');
										//$('.otp_status').after('<div class="enter_otp"><input type="text" name="otp_value" id="otp_value"/><button id="verify_button" class="buttonM bBlue verify_button" type="button">Verify</button></div>');
								}
								else
										alert("Can't send sms please check your phone no.");
										//$('.otp_status').html("Can't send sms please check your phone no.");
						},
						error: function(xhr, textStatus, errorThrown){
								alert("Can't send sms please check your phone no.");
								//$('.otp_status').html("Can't send sms please check your phone no.");
						}
				});

				$('.three_option h2').html('OTP Verification');
				$('#investor_div').css('display','none');
				$('#form_basic').css('display','none');
				$('#form_portfolio').css('display','none');
				$('#form_fund').css('display','none');
				$('#form_otd_verify').css('display','block');
				
				$('#portfolio_li').remove();
				$('#basic_li').remove();
				$('#funds_li').remove();

				
				
				
				//$('.basic_tab').removeClass('active');
				//$('.portfolio_tab').addClass('active');
				
				
				
		});

		/* VALIDATE FUND PAGE FOR INVESTOR SIGN UP */
		
		/* VALIDATE SMS OTP VERIFIED PAGE FOR INVESTOR SIGN UP */
		
		
		//$(document).on('click','#go_to_completion',function(){
		//		var otp_verified    = $('#otp_verified').val();		
		//		if (otp_verified == 0){
		//				alert('OTP verification failed');
		//				return false;
		//		}
		//		$('#investor_div').css('display','none');
		//		$('#form_basic').css('display','none');
		//		$('#form_portfolio').css('display','none');
		//		$('#form_fund').css('display','none');
		//		$('#form_otd_verify').css('display','none');
		//		
		//		
		//		//$('#save_invester_step').submit();
		//});
		
		/* END OF VALIDATE SMS OTP VERIFIED PAGE FOR INVESTOR SIGN UP */
		


//debamala
		$('.business').click(function(){
				$('.chooseUserType').css('display','none');
				$('.business_div').css('display','block');
				$('.errorSuccess').css('display','none');
		});
 
 
		

    

$(document).on('click','.business_type',function(){
    var val = $(this).val();
    if (val == 'start_up' || val == 'existing_business') {
	$('.business').css('display','block');
	$('.general').css('display','block');
	$('.existing').css('display','block');
	$('.buss_desc').css('display','block');
	$('.business_first_step').css('display','block');
    }
    if (val == 'business_ideas') {
	$('.business').css('display','block');
	$('.general').css('display','none');
	$('.existing').css('display','block');
	$('.buss_desc').css('display','block');
	$('.business_first_step').css('display','block');
    }
});
			 
		
		/* Character checking for textarea About You / Company */	 
			 
		$(document).ready(function() {
		    $('.business').css('display','block');
		    $('.general').css('display','block');
		    $('.existing').css('display','block');
		    $('.buss_desc').css('display','block');
		    $('.business_first_step').css('display','block');
				var text_max = 2000;
				$('#textarea_feedback_count').html(text_max+'/'+text_max);
		
				$('.desc').keyup(function() { 
						var text_length = $('.desc').val().length; 
						var text_remaining = text_max - text_length;
						$('#textarea_feedback_count').html(text_remaining+"/"+text_max);
				});
		});
		
		/* ***************************************************** */

$(document).on('keyup','#email',function(){
    
var email = $('#email').val();
   if(email== ''){ 
	       $('.email_error').css('color','red');
	       $('.email_error').html('email cannot be blank');
               return false;
            }
   if(IsEmail(email)==false){
                $('.email_error').css('color','red');
	        $('.email_error').html('please enter correct email');
                return false;
            }
	    
	$.ajax({
	type: 'post',
	data: {email:$('#email').val(),_token: csrf_token},
	url: base_url+'/business_email_unique',
	success: function(data){
	    
	    if (data != 0)
	    {
		$('.email_error').css('color','red');
	        $('.email_error').html('Email id already taken. Please select another email ID');
		$('#bussiness_regi').prop( "disabled", true );
		return false;
	    }
	    else if (data == 0)
	    {
		$('.email_error').html('');
		$('#bussiness_regi').prop( "disabled", false );
	    }
	}
	    });    
	    
});
$(document).on('keyup','#password',function(){
var pass = $('#password').val();
   var len = pass.length;
        if(len < 1) {
           
            $('.pass_error').css('color','red');
	    $('.pass_error').html('Password cannot be blank');
               return false;
        }
	if(len < 6) {
           
            $('.pass_error').css('color','red');
	    $('.pass_error').html('Password cannot be less than 6 characters');
               return false;
        }
	    else
	    {
	      $('.pass_error').html('');
               return true; 
	    }
});
$(document).on('keyup','#password_confirmation',function(){
var pass = $('#password').val();
   var len = pass.length;
        
       var len = pass.length;  
        if(len < 1) {
           
            $('.pass_error').css('color','red');
	    $('.pass_error').html('Password cannot be blank');
               return false;
        }
         
        if($('#password').val() != $('#password_confirmation').val()) {
	
	    $('.passconf_error').css('color','red');
	    $('.passconf_error').html('Password and Confirm Password dont match');
            return false;
        }
	    else
	    {
	      $('.pass_error').html('');
	      $('.passconf_error').html('');
               return true; 
	    }
});

   $(document).on('click','#next',function(){
   var email = $('#email').val();
   pass = $('#password').val();
   if(email== ''){ 
	       $('.email_error').css('color','red');
	       $('.email_error').html('email cannot be blank');
               return false;
            }
        var len = pass.length;
        
        if(len < 1) {
           
            $('.pass_error').css('color','red');
	    $('.pass_error').html('Password cannot be blank');
               return false;
        }
         
        if($('#password').val() != $('#password_confirmation').val()) {
	
	    $('.passconf_error').css('color','red');
	    $('.passconf_error').html('Password and Confirm Password dont match');
            return false;
        }
	    else
	    {
	       $('.email_error').html('');
	       $('.pass_error').html('');
	       $('.passconf_error').html('');
	       $('#buss_email').val(email);
	       $('.signup_basic').css('display','block');
	       $('.business_div').css('display','none');
               return true;
	           
	    }
        

});
	 
	 
	 
function IsEmail(email) {
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(email)) {
				return false;
		}
		else{
				return true;
		}
}


   $(document).ready(function(){  

var counter = 2;
	
	$('#del_file').hide();
	$('#add_file').click(function(){
		$('#file_tools').before('<div class="file_upload" id="f'+counter+'"><label for="f_'+counter+'"><input id="f_'+counter+'" class="filePic" name="file[]" type="file"></label><span class="fileName"></span><span class="removeSpan" id="span_f_'+counter+'">Remove</span></div>');
		$('.removeSpan').fadeIn(0);
	counter++;
	});

	$(document).on('click','.removeSpan',function(e){
		var divId = $(this).attr('id').replace('span_f_', '');
		$('#f' + divId).remove();

	});

	/*$('.removeSpan').click(function(){
		
		if(counter==3){
			$(this).hide();
		}   
		counter--;
		$('#f'+counter).remove();
	});*/

	$(document).on('change','.filePic',function(e){
		$(this).parents().find('.fileName').html(e.target.value);

	});

   				
      $(document).on('click','.add_file',function(){
	var file_count = $('.file_count').val();
	var myFile = $('#add_file_'+file_count).val();
	
	if(myFile != '')
	{
	file_count = parseInt(file_count) + 1;
	 if (file_count > 5) {
	 alert('you can add upto 5 file at a time');
	 return false;
	 }
	 else
	 {
	 $('.file_count').val(file_count);
	 $('.add_file').after('<input type="file" name="upload_doc[]" id="add_file_'+file_count+'" class="form-control upload_doc"  ><a href="javascript:void(0)" class="remove_file" id="remove_file_'+file_count+'">Remove</a>');
	 return true;
	 }
	}
	else
	{
	alert('Please upload previous Doc.');
	return false;
	}
    });
    
       $(document).on('click','.remove_file',function(){
	var file_count = $('.file_count').val();
	$('#add_file_'+file_count).remove();
	$('#remove_file_'+file_count).remove();
	file_count = parseInt(file_count) - 1;
	$('.file_count').val(file_count);
    });
       
       
       
    $(document).on('click','.add_director',function(){
	var director_count = $('.director_count').val();
	var director = $('#add_director_'+director_count).val();
	
	if(director != '')
	{
	director_count = parseInt(director_count) + 1;
	 if (director_count > 5) {
	 alert('you can add upto 5 director at a time');
	 return false;
	 }
	 else
	 {
	 $('.director_count').val(director_count);
	 $('.add_director').after('<input type="text" name="director_name[]" id="add_director_'+director_count+'" class="form-control"><a href="javascript:void(0)" class="remove_director" id="remove_director_'+director_count+'">Remove</a>');
	 return true;
	 }
	}
	else
	{
	alert('Please Enter previous director.');
	return false;
	}
    });
    
       $(document).on('click','.remove_director',function(){
	var director_count = $('.director_count').val();
	$('#add_director_'+director_count).remove();
	$('#remove_director_'+director_count).remove();
	director_count = parseInt(director_count) - 1;
	$('.director_count').val(director_count);
    });

  });
 
  
		$(document).on('click','#next2',function(){
				
				if($(".business_type:checked").val()=='start_up' || $(".business_type:checked").val()=='existing_business'){
						if($('#bussiness_name').val() == ''){
								$('#bussiness_name').css('border-color','red').focus();
								alert('Business Name required');
								return false;
						}
						if($('#contact').val() == ''){
								$('#contact').focus();
								alert('Mobile number required with country code (+917278345678)');
								return false;
						}
						//if ($('#buss_otp_verify').val() == 0){
						//		alert('OTP verification failed');
						//		return false;
						//}
						if($('#acra_number').val() == ''){
								$('#acra_number').css('border-color','red').focus();
								alert('acta number required');
								return false;
						}
						if($('#no_year').val() == ''){
								$('#no_year').css('border-color','red').focus();
								alert('no of year required');
								return false;
						}
						if($('#no_year').val() != ''){
								var year= $('#no_year').val(); 
								if (isNaN(year)) {
										alert("Please Give Integer value for the year");
										$('#no_year').css('border-color','red').focus();
										return false;
								}
						}
						if($('select#director_name').val() == ''){
								$('select#director_name').css('border-color','red').focus();
								alert('Director Name required');
								return false;
						}
						//if($('select#business_cat').val()== null){
						//		$('select#business_cat').css('border-color','red').focus();
						//		alert('business category required');
						//		return false;
						//}
						if($('#website').val() == ''){
							$('#website').focus();
								alert('website required');
								return false;
						}
						if ($('#website').val() != '') {
								var url = $('#website').val();
		var url_validate = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
								if(!url_validate.test(url)){
										$('#website').css('border-color','red').focus();
										alert('Please give proper website address');
										return false;
								}
						}
						//if($('select#business_cat').val()== null){
						//		$('select#business_cat').css('border-color','red').focus();
						//		alert('business category required');
						//		return false;
						//}
				}
				
				if ($(".business_type:checked").val()=='business_ideas') {
						var email = $('#buss_email').val();
						if($('#bussiness_name').val() == ''){
								$('#bussiness_name').css('border-color','red').focus();
								alert('business name required');
								return false;
						}
						if($('#contact').val() == ''){
								$('#contact').focus();
								alert('contact number required');
								return false;
						}
						//if ($('#buss_otp_verify').val() == 0){
						//		alert('OTP verification failed');
						//		return false;
						//}
						if($('#buss_email').val() == ''){
								$('#buss_email').focus();
								alert('email required');
								return false;
						}
						if(IsEmail(email)==false){
								$('#buss_email').focus();
								alert('please enter correct email');
								return false;
						}
						if($('#website').val() == ''){
								$('#website').focus();
								alert('website required');
								return false;
						}
						//if($('select#business_cat').val()== null){
						//		$('select#business_cat').css('border-color','red').focus();
						//		alert('business category required');
						//		return false;
						//}
				}
		
				if($('#address').val() == ''){
						$('#address').css('border-color','red').focus();
						alert('address required');
						return false;
				}
				if($('#desc').val() == ''){
						$('#desc').css('border-color','red').focus();
						alert('description required');
						return false;
				}
				var contact = $('#contact').val();
				$('#contactno_buss').html(contact);
				$('.proposal_div').css('display','block');
				$('.signup_basic').css('display','none');
				
				
		});
  
  
      $(document).on('keyup','#bussiness_name',function(){
    
var bussiness_name = $('#bussiness_name').val();

   if(bussiness_name == ''){
	       $('#bussiness_name').css('border-color','red').focus();
		alert('business name required');
               return false;
            }
   
	   $.ajax({
		    type: 'post',
		    data: {bussiness_name:$('#bussiness_name').val(),_token: csrf_token},
		    url: base_url+'/buss_name_unique',
		    success: function(data){
				    if (data != 0)
				    {
				    $('#bussiness_name').css('border-color','red').focus();
				    $('.buss_name_error').html('Business Name exists. Please change Business Name');
				    $('#bussiness_name').val(' ');
				    return false;
				    }
				    else
				    {
					$('.buss_name_error').html(' ');
				    }
				    
		    }
				});  
	   
	    
});
      
      
       var last_valid_selection = null;
  $(document).on('click','select#business_cat',function(event){
        if ($(this).val().length > 3) {
          alert('You can only choose 3!');
          $(this).val(last_valid_selection);
	  return false;
        } else {
         return true;
        }
      });
$(document).on('change','.upload_doc',function(){ 
			var f=this.files[0];
			if((f.size||f.fileSize) > 15728640)
			{
			   alert("Allowed file size exceeded. (Max. 15 MB)")
			   //reset file upload control 
			   this.value = null;
			   return false;
			}
			else
			{
			   return true;
			}
		});

/************ IMAGE FILE UPLOAD FOR BUSINESS *********************/

$(document).on('change','#image',function(e){ 
				var countFiles = $(this)[0].files.length;
				var imgPath = $(this)[0].value;
				var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
				var image_holder = $("#buss_image-holder");
				var old_image = $("#buss_logo").attr("src");
				
				//image_holder.empty();
		
				if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
						if (typeof (FileReader) != "undefined") {		
								//loop for each file selected for uploaded.
								for (var i = 0; i < countFiles; i++) {
										var reader = new FileReader();
										var fileSize = this.files[0]; 
										var sizeInMb = (fileSize.size/1024)/1024; 
										var sizeLimit= 15;
										if (sizeInMb > sizeLimit) {
												$("#buss_logo").attr("src",'images/img11.jpg');
												$('#buss_image-holder').html('File size must be less than 15MB');
										}
										else{
												reader.onload = function (e) {
														$("#buss_logo").attr("src",e.target.result);
														$("#buss_logo").addClass("thumb-image");
														$('#buss_logo').css({'height':'233px','width':'243px'}); 
																				
																				//$("<img />", {
																				//		"src": e.target.result,
																				//		"class": "thumb-image",
																				//		"height": "100px",
																				//		"width": "150px"
																				//}).appendTo(image_holder);
																				
																		}
														$('#buss_image-holder').html('');
														//image_holder.show();
														reader.readAsDataURL($(this)[0].files[i]);
										}	
								}
								
								var files = e.target.files,
								filesLength = files.length;
								
								var f = files[0]
								var fileReader = new FileReader();
								fileReader.onload = (function(e) {
								var file = e.target;
								$("#imageHolder").html("<img src='"+e.target.result+"' class='imageThumb' title='"+file.name+"'/>");
								});
								fileReader.readAsDataURL(f);     	
								
						} else {
								alert("This browser does not support FileReader.");
						}
				} else {
						alert("Please select only images");
						$('#image').val('');
				}
   });

/************ IMAGE FILE UPLOAD FOR BUSINESS *********************/

$(document).ready(function() {
    $('.investors').css('display','block');
	$('.selling_your_company').css('display','none');
	$('.investNext').css('display','block');
 $(document).on('click','#prev3',function(){
 $('.proposal_div').css('display','none');
 $('.signup_basic').css('display','block');
 });
  $(document).on('click','#prev2',function(){
 $('.signup_basic').css('display','none');
 $('.business_div').css('display','block');
 });
 
// $('#investor_regi').click(function(){
//    
//    var email = $('#email2').val();
//
//   if(email== ''){
//	       $('.email_error_inv').css('color','red');
//	       $('.email_error_inv').html('email cannot be blank');
//               return false;
//            }
//   if(IsEmail(email)==false){
//                $('.email_error_inv').css('color','red');
//	        $('.email_error_inv').html('please enter correct email');
//                return false;
//            }
//   
//  if($('#password2').val() != $('#password_confirmation2').val()) {
//	    
//		$('.passconf_error').css('color','red');
//		$('.passconf_error').html('Password and Confirm Password dont match');
//		return false;
//	    }
//    
//	$.ajax({
//	type: 'post',
//	data: {email:email,_token: csrf_token},
//	url: base_url+'/invester_email_unique',
//	success: function(data){
//	
//	    alert(data);
//	    return false;
//	}
//	});
//    
//});
 
 
        
	
$(document).on('click','.looking_for',function(){
    var val = $(this).val();
    if (val == 'investors') {
	$('.investors').css('display','block');
	$('.selling_your_company').css('display','none');
	$('.investNext').css('display','block');
    }
    if (val == 'selling_your_company') {
	$('.selling_your_company').css('display','block');
	$('.investors').css('display','none');
	$('.investNext').css('display','block');
    }
});
	$(document).on('change','.upload_proposal',function(){
	var ext = $('.upload_proposal').val().split('.').pop().toLowerCase();
		     if($.inArray(ext, ['pdf','doc','docx']) == -1) {
			 alert('invalid extension!');
			 $(this).next('.customfile-filename').attr('title',' ');
			  $(this).next('.customfile-filename').val(' ');
			 this.value = null;
			 return false;
		     }
		     else
			{
			    $('.proposalImageName').html($(this).next('.customfile-filename').attr('title'));
			   return true;
			}
			
		});
	$(document).on('change','.upload_proposal1',function(){
	var ext = $('.upload_proposal1').val().split('.').pop().toLowerCase();
		     if($.inArray(ext, ['pdf','doc','docx']) == -1) {
			 alert('invalid extension!');
			 $(this).next('.customfile-filename').attr('title',' ');
			  $(this).next('.customfile-filename').val(' ');
			 this.value = null;
			 return false;
		     }
		     else
			{
			     $('.proposalImageName1').html($(this).next('.customfile-filename').attr('title'));
			   return true;
			}
			
		});
      	$(document).on('change','.upload_proposal_selling',function(){
	var ext = $('.upload_proposal_selling').val().split('.').pop().toLowerCase();
		     if($.inArray(ext, ['pdf','doc','docx']) == -1) {
			 alert('invalid extension!');
			 this.value = null;
			 return false;
		     }
		     else
			{
			   return true;
			}
			
		});
      $(document).on('click','.mail_accurate_valuation',function(){
	var admin_mail = $(this).attr('data-href');
        var admin_name = $(this).attr('data-item');
	var buss_name = $('#bussiness_name').val();
	var email = $('#email').val();
	var address = $('#address').val();
	var contact = $('#contact').val();
	$.ajax({
	type: 'post',
	data: {admin_mail:admin_mail,admin_name:admin_name,buss_name:buss_name,email:email,address:address,contact:contact,_token: csrf_token},
	url: base_url+'/business_evaluation_email',
	success: function(data){
	
	    if (data != '')
	    {
	    $('.accurate_evaluation_success').css('display','block');
	    }
	}
	    }); 
		});
      
//      $(document).on('keyup','#industry_name',function(){
//var industry_name = $('#industry_name').val();
//
//   if(industry_name == ''){
//	       $('#industry_name').css('border-color','red').focus();
//		alert('industry name required');
//               return false;
//            }
//	   $.ajax({
//		    type: 'post',
//		    data: {industry_name:$('#industry_name').val(),_token:CSRF_TOKEN},
//		    url: BASE_URL+'/industory_name_unique',
//		    success: function(data){
//				    if (data != 0)
//				    {
//					$('#industry_name').css('border-color','red').focus();
//					$('.industry_name_error').html('Industry Name exists. Please change Industry Name');
//					$('#industry_name').val(' ');
//				    return false;
//				    }
//				    else
//				    {
//					$('.industry_name_error').html(' ');
//				    }
//				    
//		    }
//				});  
//	   
//	    
//});
      
$(document).on('click','#next3',function(){

		if($(".looking_for:checked").val()=='investors') {
				if($('select#funds_req_currency').val()== null){
						alert('Funds currency required');
						$('select#funds_req_currency').css('border-color','red').focus();
						return false;
				}
				if($('#enter_amt').val() == ''){
						$('#enter_amt').focus();
						alert('Fund Amount required');
						$('#enter_amt').css('border-color','red').focus();
						return false;
				}
				if($('#equity_exchange').val() == ''){
						$('#equity_exchange').focus();
						alert('equity exchange Amount required');
						$('#equity_exchange').css('border-color','red').focus();
						return false;
				}
				if($('#upload_proposal').val() == ''){
						alert('upload proposal required');
						$('#upload_proposal').css('border-color','red').focus();
						return false;
				} 
		}
		
		if($(".looking_for:checked").val()=='selling_your_company') {
				if($('select#sp_currency').val()== null){
						alert('Selling Price currency required');
						$('select#sp_currency').css('border-color','red').focus();
						return false;
				}
				if($('#enter_sell_amt').val() == ''){
						alert('selling Amount required');
						$('#enter_sell_amt').css('border-color','red').focus();
						return false;
				}
				if($('select#cv_currency').val()== null){
						alert('Company Valuation currency required');
						$('select#cv_currency').css('border-color','red').focus();
						return false;
				}
				if($('#cmp_val').val() == ''){
						$('#cmp_val').focus();
						alert('Company Valuation Amount required');
						$('#cmp_val').css('border-color','red').focus();
						return false;
				}
				if($('#upload_proposal1').val() == ''){
						alert('upload proposal required');
						$('#upload_proposal1').css('border-color','red').focus();
						return false;
				} 
		}

    $('.proposal_div').css('display','none');
    $('.accounts_div').css('display','block');
    var val = $('.business_type:checked').val();
    
		if (val == 'start_up' || val == 'business_ideas') {
				$('.start_exist').css('display','block');
				$('.business_ideas').css('display','none');
				$('.accountsNext').css('display','block');
    }
    if (val == 'existing_business') {
				$('.start_exist').css('display','none');
				$('.business_ideas').css('display','block');
				$('.accountsNext').css('display','block');
    }
	
		$('.basic_tab').removeClass('active_list').addClass('complete_list');
    $('.proposal_tab').removeClass('active_list').addClass('complete_list');
    $('.funds_tab').addClass('active_list');
});


$(document).on('click','#prev4',function(){
		$('.proposal_div').css('display','block');
		$('.accounts_div').css('display','none');
});

$(document).on('click','#prev5',function(){
		$('.business_otp_verify_div').css('display','none');
		$('.accounts_div').css('display','block');
});

$(document).on('change','.sales_report',function(){
			var ext = $('.sales_report').val().split('.').pop().toLowerCase();
			var f=this.files[0];
			if((f.size||f.fileSize) > 15728640)
			{
			   alert("Allowed file size exceeded. (Max. 15 MB)")
			   //reset file upload control 
			   this.value = null;
			   return false;
			}
			if($.inArray(ext, ['pdf','doc','docx','xls','xlsx']) == -1) {
			    alert('invalid extension!');
			    this.value = null;
			    return false;
			}
			else
			{
			     $('.salesReportName').html($(this).next('.customfile-filename').attr('title'));
			   return true;
			}
		});
$(document).on('change','.pll_report',function(){
    var ext = $('.pll_report').val().split('.').pop().toLowerCase();
			var f=this.files[0];
			if((f.size||f.fileSize) > 15728640)
			{
			   alert("Allowed file size exceeded. (Max. 15 MB)")
			   //reset file upload control 
			   this.value = null;
			   return false;
			}
			if($.inArray(ext, ['pdf','doc','docx','xls','xlsx']) == -1) {
			    alert('invalid extension!');
			    this.value = null;
			    return false;
			}
			else
			{
			   return true;
			}
		});
$(document).on('change','.valuation_report',function(){
    var ext = $('.valuation_report').val().split('.').pop().toLowerCase();
			var f=this.files[0];
			if((f.size||f.fileSize) > 15728640)
			{
			   alert("Allowed file size exceeded. (Max. 15 MB)")
			   //reset file upload control 
			   this.value = null;
			   return false;
			}
			if($.inArray(ext, ['pdf','doc','docx','xls','xlsx']) == -1) {
			    alert('invalid extension!');
			    this.value = null;
			    return false;
			}
			else
			{
			   return true;
			}
		});
$(document).on('change','.supporting_documents',function(){
    var ext = $('.supporting_documents').val().split('.').pop().toLowerCase();
			var f=this.files[0];
			if((f.size||f.fileSize) > 15728640)
			{
			   alert("Allowed file size exceeded. (Max. 15 MB)")
			   //reset file upload control 
			   this.value = null;
			   return false;
			}
			if($.inArray(ext, ['pdf','doc','docx','xls','xlsx']) == -1) {
			    alert('invalid extension!');
			    this.value = null;
			    return false;
			}
			else
			{
			   return true;
			}
		});

$(document).on('click','#next4',function(){
     
    var val = $('.business_type:checked').val();

		if (val == 'start_up' || val == 'business_ideas'){
				if($('#sales_report').val()== ''){
						$('#sales_report').focus();
						alert('Sales Report required');
						return false;
				}
				if($('#pll_report').val() == ''){
						$('#pll_report').focus();
						alert('PLL report required');
						return false;
				}
				if($('#valuation_report').val() == ''){
						$('#valuation_report').focus();
						alert('valuation report required');
						return false;
				}
		}
		
		if (val == 'existing_business') {
				if($('#enter_pv_amt').val() == ''){
						$('#enter_pv_amt').focus();
						alert('Predicted Valuation');
						return false;
				}
				if($('#supporting_documents').val()== ''){
						$('#supporting_documents').focus();
						alert('supporting documents required');
						return false;
				}
		}
		
		$.ajax({
		type: 'post',
		data: {contact:$('#contact').val(),_token: csrf_token},
		url: base_url+'buss_send_otp',
		success: function(data){ 
				if (data != 0){
						otp = data;
						
						//$('.buss_verify_otp').css('display','none');
						$('#hid_otp_val_business').val(otp);
						
						$('.basic_tab').removeClass('active_list').addClass('complete_list');
						$('.proposal_tab').addClass('active_list');
						
						
						//alert('OTP has been sent to your mobile for future verification.');
						
						//$('.buss_otp_status').html('OTP has been sent to your mobile please check.');
						//$('.buss_otp_status').after('<div class="enter_otp"><input type="text" name="otp_value" id="otp_value"/><a href="javascript:void(0)" class="buss_verify_button">Verify</a></div>');
				}
				else{
						
						alert("Can't send sms please check your phone no.");
						
						
						//$('.buss_otp_status').html("Can't send sms please check your phone no.");
						//$('#buss_otp_verify').val(0);
				}
		},
		error: function(xhr, textStatus, errorThrown){
				
				alert("Can't send sms please check your phone no.");
				
				
				//$('.buss_otp_status').html("Can't send sms please check your phone no.");
				//$('#buss_otp_verify').val(0);
		}
});
		
		$('.basic_tab').remove();
		$('.proposal_tab').remove();
		$('.funds_tab').remove();
		$('.proposal_div').css('display','none');
    $('.accounts_div').css('display','none');
		$('.business_otp_verify_div').css('display','block');
 
//		$('#action').val('Process');
//    $('#business_form').submit();
  });
    
    
    /*
     * currency delete section
     * By Maantu Das
     */
    
    $(document).on('click','.delete_currency',function(){
        var id  = $(this).attr('data_id');
        data    = 'currency_id='+id;
        var parent= $(this).parent().parent();
        //parent.remove();
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                type: 'post',
                data: data,
                url: BASE_URL +'/currency/delete',
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                success: function(res){
                    if (res == "ok") {
                        parent.remove();
                        $("#del_succ_msg").html('<div class="note note-success"><p>Currency deleted successfully.</p></div>');
                    }
                    else{
                        $("#del_succ_msg").html('<div class="note note-alert"><p>Something wrong happened.</p></div>');
                    }
                }
            });
        }
    });
    
    /*
     *Investor status modify
     *By Maantu Das
     */
    
    $(document).on('click','.status_modify',function(){
        var id = $(this).attr('data_id');
        var type = $(this).attr('data_type');
        var url ='';
        if (type == 'investor') {
            url = BASE_URL+"/investor/set-status";
        }
        else{
            url = BASE_URL+"/business_user/set-status";
        }
        
	var aID = 'status_modify_'+id;
        
        $.ajax({
                type: 'post',
                data: 'id='+id,
                url: url,
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                beforeSend: function() {
                        $("#loader_"+id).css("visibility","visible");
                        $(this).find('i').removeClass('fa fa-check-square-o');
                        $(this).find('i').removeClass('glyphicon glyphicon-remove-sign');
                        $(this).find('i').addClass('fa fa-spinner');
                },
                success: function(res){
		    
                    if (res == 'Active') {
			$('#'+ aID).addClass("btn-success");
			    $('#'+ aID).removeClass("btn-primary");
			    $('#'+ aID).find('i').removeClass('fa-check-square-o glyphicon glyphicon-remove-sign fa');
			    $('#'+ aID).find('i').addClass('fa fa-check-square-o');
			    $('#'+ aID).attr('title','Active');
		
                        
                    }
                    else{
                        $('#'+ aID).removeClass("btn-success");
                        $('#'+ aID).addClass("btn-primary");
                        $('#'+ aID).find('i').removeClass('fa fa-check-square-o');
                        $('#'+ aID).find('i').addClass('fa-check-square-o glyphicon glyphicon-remove-sign fa');
                        $('#'+ aID).attr('title','Inactive');
                    }
                }
        });
    });
		
		/* Investor Signup EmaIL check */
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		//$(document).on('blur','#email2',function(){
		//		var email = $('#email2').val(); alert(email);
		//		if(email== ''){ 
		//				$('.email_error').css('color','red');
		//				$('.email_error').html('Email cannot be blank');
		//				return false;
		//		}
		//		if(IsEmail(email)==false){
		//				$('.email_error').css('color','red');
		//				$('.email_error').html('please enter correct email');
		//				return false;
		//		}
		//		else{
		//				$.ajax({
		//						type: 'post',
		//						data: {email:$('#email2').val(),_token: csrf_token},
		//						url: base_url+'/invester_email_unique',
		//						success: function(data){
		//								if (parseInt(data) > 0){
		//										$('.email_error').css('color','red');
		//										$('.email_error').html('Email id already taken. Please select another email ID');
		//										$('#investor_regi').prop( "disabled", true );
		//								}
		//								else if (data == 0){
		//										$('.email_error').html('');
		//										$('#investor_regi').prop( "disabled", false );
		//								}
		//						}
		//				});
		//		}
		//});
		//
		
		//$(document).on('blur','#password2',function(){
		//		var pass = $('#password2').val();
		//		var len = pass.length;
		//		if(len < 1) {
		//				$('.pass_error').css('color','red');
		//				$('.pass_error').html('Password cannot be blank4');
		//				return false;
		//		}
		//		if(len < 6) {
		//				$('.pass_error').css('color','red');
		//				$('.pass_error').html('Password cannot be less than 6 characters');
		//				return false;
		//		}
		//		//else{
		//		//		$('.pass_error').html('');
		//		//		return true; 
		//		//}
		//		
		//		if($('#password2').val() != $('#password_confirmation2').val()) {
		//				$('.passconf_error').css('color','red');
		//				$('.passconf_error').html('Password and Confirm Password does not match');
		//				return false;
		//		}
		//		else{
		//				$('.pass_error').html('');
		//				$('.passconf_error').html('');
		//				return true; 
		//		}
		//});
		
		//$(document).on('keyup','#password_confirmation2',function(){
		//		var pass = $('#password2').val();
		//		var len = pass.length;
		//		  
		//		if(len < 1) {
		//				$('.pass_error').css('color','red');
		//				$('.pass_error').html('Password cannot be blank5');
		//				return false;
		//		}
		//
		//		
		//});


		
		/* Investor Signup EmaIL check end */
		
		
		
    
});

$(document).ready(function(){
        if ($('.basicType').length > 0) {
       // $('.basicTypePan').fadeOut();
        //$('.tab1_option1').fadeIn();
        $(document).on('click','.basicType',function(){
            var selectedVal = $('.basicType:checked').val();
            var panOpt = 'tab1_option' + selectedVal;
            $('.basicTypePan').fadeOut();
            $('.' + panOpt).fadeIn();
        });
    }
    
    if ($('.proposalType').length > 0) {
        //$('.proposalTypePan').fadeOut();
        //$('.tab2_option1').fadeIn();
        $(document).on('click','.proposalType',function(){
            var selectedVal = $('.proposalType:checked').val();
            var panOpt = 'tab2_option' + selectedVal;
            $('.proposalTypePan').fadeOut();
            $('.' + panOpt).fadeIn();
        });
    }
    
    if ($('.accountType').length > 0) {
       // $('.accountTypePan').fadeOut();
       // $('.tab3_option1').fadeIn();
        $(document).on('click','.accountType',function(){
            var selectedVal = $('.accountType:checked').val();
            var panOpt = 'tab3_option' + selectedVal;
            $('.accountTypePan').fadeOut();
            $('.' + panOpt).fadeIn();
        });
    } 
  $("#buss_logo").click(function(){
    $("#image").click();
   });
	
$("#buss_logo2").click(function(){
    $("#media").click();
   });
$("#buss_logo3").click(function(){
    $("#add_file_1").click();
   });
$("#buss_logo4").click(function(){
    $("#upload_proposal").click();
   });
$("#buss_logo5").click(function(){
    $("#sales_report").click();
   });
$("#buss_logo6").click(function(){
    $("#image_logo").click();
   });

  $("#invest_logo").click(function(){
    $("#fileUpload").click();
   });
    $("#proposalImage").click(function(){
    $("#upload_proposal").click();
   });
     $("#proposalImage1").click(function(){
    $("#upload_proposal1").click();
   });

		$("#investor_sign_in").validate({
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
						
						var url = '';
						var frmData 	= '';
						var redirectURl	= '';
						
						frmData 	= $("#investor_sign_in").serialize();	//code
						redirectURl	= base_url + 'investor-dashboard';
						url 		= base_url + 'investor_sign_in';
						
						$.ajax({
								type: "POST",
								url: url,
								data: frmData,
								beforeSend: function(){
						
								},
								dataType: "json",
								success: function(response){
										if(response.id > 0){
												window.location.href = redirectURl;
										}
										else{
												$('#errormsg').html('Login Failed!!');		
										}
								}
						});
				}
		});
		
		$("#business_sign_in").validate({
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
						
						var frmData 	= $("#business_sign_in").serialize();	//code
						var redirectURl	= base_url + 'business-dashboard';
						var url 	= base_url + 'business_login';
						
						$.ajax({
								type: "POST",
								url: url,
								data: frmData,
								beforeSend: function(){
						
								},
								dataType: "json",
								success: function(response){
										if(response.id > 0){
												window.location.href= redirectURl;
										}
										else{ 
												$('#errormsg1').html('Login Failed!!');		
										}
								}
						});
				}
		});
  if($(".fancybox2").length > 0)
   { 		
$(".fancybox2").fancybox();
   }
       $(".help").click(function(){
        $(this).parent().parent().find(".answer").toggle();
    });
       
    
	
});



