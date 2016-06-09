@extends('masterLayout')
@section('content')

      <div class="upper_tab">
		<ul>
				<li class="basic_tab">BASICS</li>
				<li class="proposal_tab">PROPOSAL</li>
				<li class="funds_tab">FUNDS</li>
		</ul>
</div>
  <!--<div class="loginWrapper">-->
  <div id="content">
    <!-- Main content -->
    <div class="wrapper">
        <div class="fluid">
            <!-- Wizard with custom fields validation -->
            <div class="widget">
  <div class="errorSuccess">
       @if(Session::has('errorMessage'))
    
		  <div class="nNote nFailure">
			  <p>{{ Session::get('errorMessage') }}</p>
		  </div>
	  
	  
	  @endif
	 @if(Session::has('successMessage'))
	  
		  <div class="nNote nSuccess">
			  {{ Session::get('successMessage') }}
		  </div>
	  
	  
	@endif
	 @if(isset($errors) && $errors->any())
 <div class="nNote nFailure">
 @foreach($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach
</div>
 @endif
  </div>
  
 <div class="business_signup">

{!! Form::open(['route'=>'save_business_step','class' => 'form form-validate formRow','id'=>'business_form','enctype'=>'multipart/form-data', 'files'=>true]) !!}
{!! Form::hidden('action','',array('id'=>'action')) !!}
<!--<div class="business_div">
<div class="loginPic">
            <a title="" href="#"><img alt="" src="http://192.168.2.60:8070/admin_assets/images/userLogin2.png"></a>
       </div>
	      <div class="form-group"> 
	    {!! Form::email('email','',array('id'=>'email','placeholder'=>'Email','class'=>'form-control parsley-validated required','required' => 'required')) !!}
	    <span class="email_error"></span>
          </div>
	      <div class="form-group"> 
	   {!! Form::password('password',array('id'=>'password','placeholder'=>'Password','class'=>'form-control parsley-validated required','required' => 'required')) !!}
	   <span class="pass_error"></span>
          </div>
	      <div class="form-group"> 
	  {!! Form::password('password_confirmation',array('id'=>'password_confirmation','placeholder'=>'retype password','class'=>'form-control')) !!}
	  <span class="passconf_error"></span>
          </div>
	   
           <div class="full-width clearfix btmButton">
			{!! Form::button('Next',array('id'=>'next','class'=>'buttonM bBlue')) !!}
			
                    </div>
       

</div>-->
  <div class="signup_basic"  style="display:block;">   
	<div class="formRow">
	  <div class="">
	    <div class="form_sep">
	      Welcome to Business System
	    </div>
	    <div class="form_sep">
	    {!! Form::hidden('email',$email,array('id'=>'email','placeholder'=>'Email','class'=>'form-control')) !!}
	    {!! Form::hidden('password',$password,array('id'=>'password','placeholder'=>'Password','class'=>'form-control')) !!}
	      <label class="req">Am I a</label>
		{!! Form::radio('business_type', 'start_up', '', array('class' => 'business_type')) !!} Start Up<br>
		{!! Form::radio('business_type', 'existing_business', '', array('class' => 'business_type')) !!} Existing Business <br>
		{!! Form::radio('business_type', 'business_ideas', '', array('class' => 'business_type')) !!} Business Ideas Only
		
	    </div>
	       <div class="business" style="display:none;">
		  <div class="form_sep">
		     <label class="req">Business Name</label>
		     {!! Form::text('bussiness_name','',array('id'=>'bussiness_name','placeholder'=>'Bussiness Name','class'=>'form-control')) !!}
		     
		   </div>
		   <div class="form_sep">
		     <label class="req">Industry/Category</label>
		    {!! Form::select('business_cat[]', $industry, '',array('id'=>'business_cat','class' => 'form-control','multiple' => "multiple")) !!}
		   </div>
	       </div>
	       <div class="existing" style="display:none;">
		  <div class="form_sep">
		     <label class="req">Mobile Number</label>
		    {!! Form::number('contact','',array('id'=>'contact','placeholder'=>'Contact No','class'=>'form-control')) !!}
	      <a href="javascript:void(0)" class="buss_verify_otp">Verify OTP</a>
	       <span class="buss_otp_status"></span>
		   </div>
		   <div class="form_sep">
		     <label class="req">Email Address</label>
		     {!! Form::email('buss_email','',array('id'=>'buss_email','placeholder'=>'Email','class'=>'form-control','readonly')) !!}
		   </div>
		   <div class="form_sep">
		     <label class="req">Website</label>
		     {!! Form::text('website','',array('id'=>'website','placeholder'=>'Website','class'=>'form-control')) !!}
		   </div>
	       </div>
		  <div class="general"  style="display:none;">
	    <div class="form_sep">
	      <label class="req">ACTA Number</label>
	      {!! Form::text('acta_number','',array('id'=>'acra_number','placeholder'=>'ACTA Number','class'=>'form-control required')) !!}

	    </div>
	    <div class="form_sep">
	      <label class="req">Number of Year</label>
	      {!! Form::text('no_year','',array('id'=>'no_year','placeholder'=>'Number of Year','class'=>'form-control required')) !!}
	    </div>
	    <div class="form_sep">
	      <label class="req">Address</label>
	      {!! Form::textarea('address','',array('id'=>'address','placeholder'=>'Address','class'=>'form-control parsley-validated required')) !!} 
	    </div>
	    <div class="form-group">
	      Business Logo
		{!! Form::file('image',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"image")) !!}
		<div id="image-holder"></div>
	    </div>
	    <div class="form_sep">
		     <label class="req">Director Name</label>
		    {!! Form::text('director_name','',array('id'=>'director_name','placeholder'=>'Director Name','class'=>'form-control required')) !!}
	    </div>
	       </div>
		  <div class="buss_desc"  style="display:none;">
		   <div class="form_sep">
		   <div class="container1">
	      <label class="req">Description
	       <span class="masterTooltipNew">(?)
	        <strong class="infoBox"> <span> Tell us more about your business,history,what does your business provide  </span> </strong>
	       </span></label>
	      {!! Form::textarea('desc','',array('placeholder'=>'Description','id'=>'desc','class'=>'form-control parsley-validated desc required','maxlength'=>"2000")) !!}
	      <div id="textarea_feedback"></div>
		   </div>
	    </div>
	       <div class="form_sep">
	       <div class="container">
	       
		     <label class="req">Upload your DOC
	       <span class="masterTooltipNew">(?)
	        <strong class="infoBox"> <span> Upload your presentation doc,portfolio,product category etc </span> </strong>
	       </span></label>
		    {!! Form::file('upload_doc[]',array('id'=>'add_file_1', 'placeholder'=>'Upload Doc','class'=>'form-control upload_doc ')) !!}
		    <a href="javascript:void(0)" class="add_file">Add More</a><input type="hidden" name="file_count" class="file_count" value="1">
	       </div>
		     </div>
			<div class="full-width clearfix btmButton">
			{!! Form::button('Previous',array('id'=>'prev2','class'=>'buttonM bBlue')) !!}
			{!! Form::button('Next',array('id'=>'next2','class'=>'buttonM bBlue')) !!}
			
                    </div>
		  </div>
		     
	  </div>
	</div>
          
  </div>
   <div class="proposal_div" style="display:none;">

	  <div class="form-group"> 
	   <div class="form_sep">
	      <label class="req">Funds Require</label>
		{!! Form::radio('looking_for', 'investors', '', array('class' => 'looking_for')) !!} Investors<br>
		{!! Form::radio('looking_for', 'selling_your_company', '', array('class' => 'looking_for')) !!} Selling your company
	    </div>
          </div>
	  <div class="form-group">
	    <div class="investors" style="display:none;">
	       <div class="form_sep">
		  <label class="req">Funds Require</label>
		{!! Form::select('funds_req_currency', $currency, '',array('id'=>'funds_req_currency','class' => 'form-control')) !!}
		{!! Form::number('enter_amt','',array('id'=>'enter_amt','placeholder'=>'Enter Amount','class'=>'form-control required')) !!}
	       </div>
	       <div class="form_sep">
		  <label class="req">Amount of Equity in Exchange</label>
		{!! Form::number('equity_exchange','',array('id'=>'equity_exchange','placeholder'=>'%','class'=>'form-control required')) !!}
	       </div>
	       <div class="form_sep">
		  <label class="req">Upload your Proposal</label>
		{!! Form::file('upload_proposal',array('id'=>'upload_proposal', 'placeholder'=>'Upload Proposal','class'=>'form-control upload_proposal ')) !!}
	       </div>
	       <div class="form_sep">
	       <label class="req">useful tip
	       <span class="masterTooltipNew">(?)
	        <strong class="infoBox"> <span> PDF of preferred proposal format </span> </strong>
	       </span></label>
		Proposal format is preferred by spring singapore. <a href="{{URL::route('download_file','1458901932.jpg')}}" class="download_files" data-file="filename.txt">click here</a> to download a copy.
	       </div>
	    </div>
	    <div class="selling_your_company" style="display:none;">
	       <div class="form_sep">
		  <label class="req">Selling Price</label>
		{!! Form::select('sp_currency', $currency, '',array('id'=>'sp_currency','class' => 'form-control')) !!}
		{!! Form::number('enter_selling_amt','',array('id'=>'enter_selling_amt','placeholder'=>'Enter Amount','class'=>'form-control required')) !!}
	       </div>
	       <div class="form_sep">
		  <label class="req">Company Valuation</label>
		{!! Form::select('cv_currency', $currency, '',array('id'=>'cv_currency','class' => 'form-control')) !!}
		{!! Form::number('cmp_val','',array('id'=>'cmp_val','placeholder'=>'Company Valuation','class'=>'form-control required')) !!}
	       </div>
	       <div class="form_sep">
		  <label class="req">If you wish to get an accurate valuation, contact us to get a valuator
		  <a href="javascript:void(0);" class="mail_accurate_valuation" data-href="{{$site_settings->sitesettings_value}}
 "  data-item="{{$site_settings->sitesettings_lebel}} ">click here</a></label>
   <span class="accurate_evaluation_success" style="display:none">We will get back to you within 24 hours</span>
	       </div>
	       <div class="form_sep">
		  <label class="req">Upload your Proposal</label>
		{!! Form::file('upload_proposal_selling',array('id'=>'upload_proposal_selling', 'placeholder'=>'Upload Proposal','class'=>'form-control upload_proposal_selling ')) !!}
	       </div>
	       <div class="form_sep">
		  <label class="req">useful tip
	       <span class="masterTooltipNew">(?)
	        <strong class="infoBox"> <span> PDF of preferred proposal format </span> </strong>
	       </span></label>
		Proposal format is preferred by spring singapore. <a href="{{URL::route('download_file','1463563557.docx')}}" class="download_files" data-file="filename.txt">click here</a> to download a copy.
	       </div>
	    </div>
          <div class="investNext" style="display:none">
	    <div class="full-width clearfix btmButton">
			   {!! Form::button('Previous',array('id'=>'prev3','class'=>'buttonM bBlue')) !!}
			   {!! Form::button('Next',array('id'=>'next3','class'=>'buttonM bBlue')) !!}
			  
	    </div>
	  </div>
	  </div>
	     
           
   </div>
   <div class="accounts_div" style="display:none;">

	  <div class="form-group"> 
	    <label class="req">We need your Books</label>
	    <div class="start_exist" style="display:none">
	    Upload Your ... 
	       <div class="form_sep">
	        <label class="req">Sales Report</label>
		    {!! Form::file('sales_report',array('id'=>'sales_report', 'placeholder'=>'sales report','class'=>'form-control sales_report ')) !!}
		    
	       </div>
	       <div class="form_sep">
	        <label class="req">PLL Report</label>
		    {!! Form::file('pll_report',array('id'=>'pll_report', 'placeholder'=>'PLL report','class'=>'form-control pll_report ')) !!}
		    
	       </div>
	       <div class="form_sep">
	        <label class="req">Valuation Report</label>
		    {!! Form::file('valuation_report',array('id'=>'valuation_report', 'placeholder'=>'Valuation report','class'=>'form-control valuation_report ')) !!}
		    
	       </div>
	    </div>
	    <div class="business_ideas" style="display:none">
	       <div class="form_sep">
		  <label class="req">Predicted Valuation</label>
		{!! Form::select('pv_currency', $currency, '',array('id'=>'pv_currency','class' => 'form-control')) !!}
		{!! Form::text('enter_pv_amt','',array('id'=>'enter_pv_amt','placeholder'=>'Enter Amount','class'=>'form-control required')) !!}
	       </div>
	       <div class="form_sep">
	        <label class="req">Supporting Documents</label>
		    {!! Form::file('supporting_documents',array('id'=>'supporting_documents', 'placeholder'=>'Supporting Documents','class'=>'form-control supporting_documents ')) !!}
		    
	       </div>
	    </div>
	   <div class="accountsNext" style="display:none">
	    <div class="full-width clearfix btmButton">
			   {!! Form::button('Previous',array('id'=>'prev4','class'=>'buttonM bBlue')) !!}
			   {!! Form::button('Finish',array('id'=>'next4','class'=>'buttonM bBlue')) !!}
			  
	    </div>
	   </div>
          </div>
	  
   </div>

   
   {!! Form::close() !!}
   </div>
 </div>
	</div></div></div>
  <style>

.masterTooltipNew .infoBox {
    display: none;
}
.masterTooltipNew:hover .infoBox {
    display: block;
}

  </style> 
 
  @endsection