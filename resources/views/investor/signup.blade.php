@extends('masterLayout')
@section('content')
<style>
    ul,li { margin:0; padding:0; list-style:none;}
</style>
		<div id="main" class="clear">
				<div class="tab_sec">
						<div class="main_container">
								<div id="horizontalTab">
												<div class="three_option">
														<h2>Welcome to our company <br> we just need a few more details...</h2>
												</div>
												<ul class="resp-tabs-list">
														<li id="basic_li" class="active_list">BASICS</li>
														<li id="portfolio_li">PORTFOLIO</li>
														<li id="funds_li">FUNDS</li>
												</ul>
										
										{!! Form::open(['route'=>['sign_up'],'id'=>'save_invester_step','class' => 'form form-validate','enctype'=>'multipart/form-data']) !!}
												{!! Form::hidden('email',$email,array('id'=>'email','placeholder'=>'Email','class'=>'form-control')) !!}
												{!! Form::hidden('password',$password,array('id'=>'password','placeholder'=>'Password','class'=>'form-control')) !!}  
												
												<div class="resp-tabs-container">
														<div class="accordian_box" id="form_basic">
																<div class="three_steps_p2 clear">
																		<ul>
																				<li class="active_icon"><span>&nbsp;</span></li>
																				<li><span>&nbsp;</span></li>
																				<li><span>&nbsp;</span></li>
																		</ul>
																</div>
																<div class="three_option clear">
																		<h2>Are you a/an...</h2>
																		<div class="three_option_inner clear">
																				<div class="cust_radio">
																						{!! Form::radio('investor_type', 'Individual', '',array('class'=>'regular-radio','id'=>'radio-1-1','checked')) !!} 		     
																						<label for="radio-1-1"></label>
																						<label for="radio-1-1" class="click_radio">Individual</label>
																				</div>
																				<div class="cust_radio">
																						{!! Form::radio('investor_type', 'VC Firm', '',array('class'=>'regular-radio','id'=>'radio-1-2')) !!}
																						<label for="radio-1-2"></label>
																						<label for="radio-1-2" class="click_radio">Vc Firm </label>
																				</div>
																		</div>
																</div>
																<div class="tab_content clear">
																		<div class="tab_content_left">
																				<div class="tab_form clear">
																						<div class="tab_form_left one_tab">
																								<label>Name</label>
																								<div class="one_tab_inner">
																										{!! Form::text('name','',array('id'=>'name','placeholder'=>'Name','class'=>'form-control')) !!}
																								</div>
																						</div>
																				</div>
																				<div class="tab_form clear">
																						<div class="tab_form_left one_tab">
																								<label class="dubble_line">Contact<span>(OTP Verification)</span></label>
																								<div class="one_tab_inner">
																										{!! Form::text('contact','',array('id'=>'contact','placeholder'=>'Contact No With country Code(+917278523411)','class'=>'form-control')) !!}
																								</div>
																							
																						</div>
																				</div>
																				<div class="tab_form clear">
																						<div class="tab_form_left one_tab">
																								<label>Company</label>
																								<div class="one_tab_inner">
																										{!! Form::text('company_name','',array('id'=>'company_name','placeholder'=>'Company Name','class'=>'form-control')) !!}
																								</div>
																						</div>
																						<div class="tab_form_right one_tab">
																								<label>ACRA Number</label>
																								<div class="one_tab_inner">
																										{!! Form::text('arca_no','',array('id'=>'arca_no','placeholder'=>'ACRA Number','class'=>'form-control')) !!}
																								</div>			  
																						</div>
																				</div>
																				<div class="tab_form clear">
																						<div class="tab_form_left full_tab">
																								<div class="help_sec">
																										<label>Address</label>
																								</div>
																								<div class="one_tab_inner textarea_sec">
																										{!! Form::textarea('address', null, ['id'=>'address','placeholder'=>'Address','class' => 'form-control field desc']) !!}
																								</div>
																						</div>
																				</div>
																				<div class="submit_form">
																						{!! Form::button('Next',array('id'=>'go_to_protfolio','class'=>'buttonM bBlue')) !!}
																				</div>
																		</div>
																		<div class="tab_content_right">
																				<img src="images/img16.jpg" alt="" id="invest_logo">
																				<div id="image-holder" style="color:red;"></div>  
																				<div style="display:none;">
																						{!! Form::file('image',array('id'=>'fileUpload','class'=>'form-control')) !!}
																				</div>
																		</div>
																</div>
														</div>
														<div class="accordian_box" style="display:none;" id="form_portfolio">
																<div class="three_steps_p2 clear">
																		<ul>
																				<li class="complete_icon"><span>&nbsp;</span></li>
																				<li class="active_icon"><span>&nbsp;</span></li>
																				<li><span>&nbsp;</span></li>
																		</ul>
																</div>
																<div class="tab_content clear">
																		<div class="p2_tab2">
																				<div class="tab_form clear">
																						<div class="tab_form_left full_tab">
																								<label class="dubble_line">About <br> You/Company</label>
																								<div class="one_tab_inner">
																										{!! Form::textarea('about_company', null, ['id'=>'about_company','class' => 'field desc']) !!}
																										<label id="textarea_feedback"></label>
																										<span class="count" id="textarea_feedback_count">2000/2000</span>
																								</div>
																						</div>
																				</div>
																				<div class="tab_form clear">
																						<div class="tab_form_left full_tab width70">
																								<label class="dubble_line">Upload Your <br> Bio/Portfolio</label>
																								<div class="one_tab_inner">
																										{!! Form::file('portfolio',array('id'=>'portfolioUpload','class'=>'form-control')) !!}
																										<span class="span_style">(PDF, PPT, DOC, DOCX,  15MB File Limit) </span>
																								</div>
																						</div>
																				</div>
																				<div class="tab_form clear">
																						<div class="tab_form_left full_tab full-tab_new new_tab1 width50">
																								<label class="dubble_line">What are the <br> Industries<br> You are<br> Interested ?</label>
																										
																										
																								<div class="one_tab_inner tab_select">
																										<div class="select-business">
																												{!! Form::select('industry_status[]', $industries,'',array('class' => 'form-control required ddown industrystatuscheckbox','multiple id'=> 'industries','multiple'=>'multiple')) !!}
																												<!--<select name="langOpt[]" multiple id="langOpt">
																														<option value="C++">C++</option>
																														<option value="C#">C#</option>
																														<option value="Java">Java</option>
																														<option value="Objective-C">Objective-C</option>
																														<option value="JavaScript">JavaScript</option>
																														<option value="Perl">Perl</option>
																														<option value="PHP">PHP</option>
																														<option value="Ruby on Rails">Ruby on Rails</option>
																														<option value="Android">Android</option>
																														<option value="iOS">iOS</option>
																														<option value="HTML">HTML</option>
																														<option value="XML">XML</option>
																												</select>-->
																										
																										
																										
																										
																										
																												<!--<div class="selectBox" onclick="showCheckboxes()">
																														<select>
																																<option>Select an option</option>
																														</select>
																														<div class="overSelect"></div>
																												</div>
																												<div id="checkboxes" class="clear">
																														@foreach($industries as $key => $val)
																																<label for="one"><input type="checkbox" class="industrystatuscheckbox" name="industry_status[]" value="{{$key}}" id="industries"/>{{$val}}</label>
																														@endforeach
																														
																												</div>-->
																										</div>
																								</div>
<!--																								<div class="one_tab_inner tab_select multiBussCat">
																										{!! Form::select('industry_status[]', $industries,'',array('class' => 'form-control required ddown','id'=> 'industries','multiple'=>'multiple')) !!}
																										<span class="span_style">You can select multiple category</span>
																										<div id="msg" style="color:red;"></div>
																								</div>
-->																						</div>

																				</div>
																				<div class="submit_form">
																						{!! Form::button('Next',array('id'=>'go_to_fund_next','class'=>'buttonM bBlue')) !!}
																				</div>
																		</div>
																</div>
														</div>
												
												
												
														<div class="accordian_box" style="display:none;" id="form_fund">
																<div class="three_steps_p2 clear">
																		<ul>
																				<li class="complete_icon"><span>&nbsp;</span></li>
																				<li class="complete_icon"><span>&nbsp;</span></li>
																				<li class="active_icon"><span>&nbsp;</span></li>
																		</ul>
																</div>
																<div class="tab_content clear">
																		<div class="p2_tab2">
																				<div class="tab_form clear">
																						<div class="tab_form_left full_tab width30">
																								<label>Annual Salary</label>
																								<div class="one_tab_inner tab_select">
																										<!--<div class="cust_select_sec2">
																												{!! Form::select('as_currency', $currency, '',array('id'=>'as_currency','class' => 'form-control')) !!}
																										</div>-->
																												{!! Form::select('annual_salary', array('0-5000'=>'0-5000','5001-10000' => '5001-10000','10001-30000'=>'10001-30000','30001-50000'=>'30001-50000','50001-100000'=>'50001-100000','>100000'=>'>100000'),'',array('class' => '','id'=> 'annual_salary')) !!}
																								</div>
																						</div>
																				</div>
																				<div class="tab_form clear">
																						<div class="tab_form_left full_tab width30">
																								<label class="dubble_line">How mutch are <br> you willing <br> to invest</label>
																								<div class="one_tab_inner tab_select">
																										<!--<div class="cust_select_sec2">
																												{!! Form::select('wi_currency', $currency, '',array('id'=>'wi_currency','class' => 'form-control')) !!}
																										</div>-->
																												{!! Form::select('willing_to_invest',  array('0-5000'=>'0-5000','5001-10000' => '5001-10000','10001-30000'=>'10001-30000','30001-50000'=>'30001-50000','50001-100000'=>'50001-100000','>100000'=>'>100000'),'',array('class' => '','id'=> 'willing_to_invest')) !!}
																								</div>
																						</div>
																				</div>
																				<div class="submit_form">
																						{!! Form::button('Next',array('id'=>'go_to_otp_verify','class'=>'buttonM bBlue')) !!}
																				</div>
																		</div>
																</div>
														</div>
																
														<div class="accordian_box" style="display:none;" id="form_otd_verify">
																<div class="three_steps_p2 clear"></div>
																<div class="tab_content clear">
																		<div class="p2_tab2">
																				<div class="tab_form clear">
																						<div class="tab_form_left full_tab width30">
																								<!--<label>Verify Code</label>-->
																								<div class="one_tab_inner otp_outer">																								
																										<!--<label>OTP</label>-->
																										<div class="otp clear">
																												<input type="text" name="otp_value" id="otp_value"/>
																												<!--<a href="javascript:void(0)" class="verify_otp">Verify OTP</a>-->
																												<button id="verify_button" class="buttonM bBlue verify_button" type="button" autocomplete="off">Verify</button>
																												{!! Form::hidden('otp_verified',0,array('id'=>'otp_verified')) !!}
																												<input type="hidden" id="hid_otp_val_investor" name="hid_otp_val_investor" value="">
																										</div>
																								</div>
																								<div style="text-align:center;">Your Verification No Sent to <span id="contactno"></span></div>
																						</div>
																				</div>
																				
																				<!--<div class="submit_form">
																						{!! Form::button('Next',array('id'=>'go_to_completion','class'=>'buttonM bBlue')) !!}
																				</div>-->
																		</div>
																</div>
														</div>

												</div>
										{!! Form::close() !!} 
								</div>
						</div>
				</div>
				<span class="live_chat"><img src="images/live_chat.png" alt="no img"></span>
		</div>
    
		<script>
				$(document).ready(function(){
				//		$(".industrystatuscheckbox").on("click", function(){ 
				//				var checkCheckbox = $(".industrystatuscheckbox:checked").length;
				//				if (checkCheckbox == 3) {
				//						$(".industrystatuscheckbox:not(:checked)").prop('disabled',true);
				//				}
				//				else{
				//						$(".industrystatuscheckbox:not(:checked)").prop('disabled',false);
				//				}
				//				
				//				
				//				
				//				
				//				
				//  });
					
				$(".ms-options").click(function(){ 
				    var checkCheckbox = $(".ms-options li.selected").length; 
				    if (checkCheckbox == 3) {
								$(".ms-options li input[type='checkbox']").attr('disabled', 'disabled');
								$(".ms-options li.selected input[type='checkbox']").attr('disabled', false);
				    }
						else{
								$(".ms-options li input[type='checkbox']").attr('disabled',false);
				    }
				});

								
								
								
						//		var fields = $("input[name='industry_status']").serializeArray();
						//		alert()
						//		var msg = $("#msg");
						//		var count = 0; alert(count);
						//		for (var i = 0; i < this.options.length; i++){ alert("cdgsgcv");
						//				var option = this.options[i];
						//				option.selected ? count++ : null;
						//		
						//				if (count > 3){ alert("acsa");
						//						option.selected = false;
						//						//option.disabled = true;
						//						msg.html("Please select only three options.");
						//				}
						//		}
						//});
				});
		</script>
				
<script>

		$('#industries').multiselect({
				columns: 1,
				placeholder: 'Select Languages'
		});


    //var expanded = false;
    //function showCheckboxes() {
    //    var checkboxes = document.getElementById("checkboxes");
    //    if (!expanded) {
    //        checkboxes.style.display = "block";
    //        expanded = true;
    //    } else {
    //        checkboxes.style.display = "none";
    //        expanded = false;
    //    }
    //}
</script>	
    
@endsection