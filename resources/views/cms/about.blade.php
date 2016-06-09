@extends('masterLayout')  
@section('content')
  <div id="main" class="clear">
    <div class="block1">
      <div class="main_container clear">
	<h2>RETHINKING INVESTING</h2>
	<div class="center block1_center">
	  <h3>We see things <span>differently.</span></h3>
	  <img src="{{ asset('front_assets/assets/images/img3.jpg') }}" alt="no img">
	  <h3>And what others don't see is <span>their loss and our gain.</span></h3>
	</div>
      </div>
    </div>
    <div class="block2 same_gap">
      <img src="{{ asset('front_assets/assets/images/img4.jpg') }}" alt="no img" class="none">
      <div class="main_container clear">
	<div class="block2_right">
	  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
	</div>
      </div>
    </div>
    <div class="block3 same_gap">
      <div class="main_container center">
	<h2>We see an untapped pool of founders who are <br> pursuing scalable business opportunities,<br> addressing challenging social and environmental issues,<br> yet lack the capital to grow. </h2>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>
    </div>
    <div class="full_img"><img src="{{ asset('front_assets/assets/images/img5.jpg') }}" alt="no img"></div>    
    <div class="block4 same_gap">
      <div class="main_container center">
	<h2>We see an untapped pool of founders who are <br> pursuing scalable business opportunities, <br> addressing challenging social and environmental issues, <br> yet lack the capital to grow. </h2>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>
    </div>   
    <div class="block5">
      <div class="main_container center">
	<h2>We are accomplished at seeing value where others see none.</h2>
	<p>We have deep experience in impact investing, innovation and technology development and cultivating community. We are serial pioneers that have led successful "firsts" across diverse sectors and geographies.</p>
	<div class="customer_name clear">
	  <ul>
	    <li>
	      <div class="img_box">&nbsp;</div>
	      <span>Custoamer Name</span>
	    </li>
	    <li>
	      <div class="img_box">&nbsp;</div>
	      <span>Custoamer Name</span>
	    </li>
	  </ul>
	</div>
	
	{{--*/
	$investor_id = Session::get('INVESTORS_ID');
	$buss_id     = Session::get('BUSINESS_ID');
	/*--}}
						
	@if($investor_id == '' && $buss_id == '')  
	<div class="business">
	  <h2>Get Started Now</h2>
	  <ul>
	    <li class="investors1"><a href="javascript:void(0);"><h2>Business Investors</h2><span>I want to invest</span></a></li>
	    <li class="start_up1"><a href="javascript:void(0);"><h2>Business Start Up</h2><span>Invest in me</span></a></li>
	  </ul>
	</div>
	  
	@endif
	
      </div>
    </div>

    <span class="live_chat"><img src="{{ asset('front_assets/assets/images/live_chat.png') }}" alt="no img"></span>
  </div>
<script>
     $(document).on('click', function (e) {
	if ($(e.target).parents('.investors1').length == 0 && $(e.target).attr('id')!='scrollbar1' && $(e.target).parents('#scrollbar1').length == 0 ) {
	   $("#scrollbar1").hide();$(".invester_signin").hide();
	}
	
	if ($(e.target).parents('.start_up1').length == 0 && $(e.target).attr('id')!='scrollbar2' && $(e.target).parents('#scrollbar2').length == 0 ) {
	   $("#scrollbar2").hide();$(".business_signin").hide();
	}
});
$(document).ready(function(){
$(".invester_signin").hide();
$(".business_signin").hide();
$(".start_up1").click(function(){
$('.business_signin').css('style','block');$(".invester_signin").css('style','none');
});
$(".investors1").click(function(){
$('.business_signin').css('style','none');$(".invester_signin").css('style','block');
});
});
</script>
@endsection