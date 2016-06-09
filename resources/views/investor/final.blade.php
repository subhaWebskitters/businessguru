@extends('masterLayout')
@section('content')

  <div id="main" class="clear">
    <div class="tab_sec">
      <div class="main_container">
	
	<div id="horizontalTab">
	  <ul class="resp-tabs-list">
	      <li class="complete_list">BASICS</li>
	      <li class="complete_list">PROPOSAL</li>
	      <li class="complete_list">Accounts</li>
	  </ul>
	  <div class="resp-tabs-container">
	    
	    <div class="accordian_box">
		
		<div class="three_steps clear">
		  <ul>
		    <li class="complete_icon"><span>&nbsp;</span></li>
		    <li class="complete_icon"><span>&nbsp;</span></li>
		    <li class="complete_icon"><span>&nbsp;</span></li>
		  </ul>
		</div>
		
		<div class="tab_content clear successful">
		  
		  <img src="images/img15.jpg" alt="no img">
		  <span>Thank you for submitting your information. We will review your application and <br> contact you within 3 working days</span>
		  
		</div>
		
	    </div>

	    
	  </div>
        </div>
	
      </div>
    </div>
    <span class="live_chat"><img src="images/live_chat.png" alt="no img"></span>
  </div>



@endsection