@extends('masterLayout')  
@section('content')
      <div id="main" class="clear how_it_works">
    <div class="block1">
      <div class="main_container clear">
	<h2>How It Works</h2>
	<div class="center ani_img">
	  <img src="{{ asset('front_assets/assets/images/icon1.png') }}" alt="no img" class="icon1 outer_border wp9 wp">
	  <span class="text1">Lorem Ipsum is simply dummy</span>
	  <img src="{{ asset('front_assets/assets/images/icon2.png') }}" alt="no img" class="icon2 outer_border wp9 wp">
	  <span class="text2">Lorem Ipsum is simply dummy</span>
	  <img src="{{ asset('front_assets/assets/images/icon3.png') }}" alt="no img" class="icon3 outer_border wp9 wp">
	  <span class="text3">Lorem Ipsum is simply dummy</span>
	  <img src="{{ asset('front_assets/assets/images/icon4.png') }}" alt="no img" class="icon4 outer_border wp9 wp">
	  <span class="text4">Lorem Ipsum is simply dummy</span>
	  <div class="center_ele">
	    <img src="{{ asset('front_assets/assets/images/icon5.png') }}" alt="no img">
	    <span>Like a diamond master Transforming a stone to a diamond with brilliant cut</span>
	  </div>
	</div>
      </div>
    </div>
    
    <div class="block6">
      <div class="main_container clear">
	<div class="same_gap block6_1 clear">
	  <ul>
	    <li>
	      <img src="{{ asset('front_assets/assets/images/icon7.png') }}" alt="no img">
	      <h3>Customer Engagement</h3>
	      <p>Social media and mobile apps are setting new standards for digital customer engagement. </p>
	    </li>
	    <li>
	      <img src="{{ asset('front_assets/assets/images/icon8.png') }}" alt="no img">
	      <h3>New Business Models</h3>
	      <p>Social media and mobile apps are setting new standards for digital customer engagement. </p>
	    </li>
	    <li>
	      <img src="{{ asset('front_assets/assets/images/icon9.png') }}" alt="no img">
	      <h3>Accelerate Digital Innovation</h3>
	      <p>Social media and mobile apps are setting new standards for digital customer engagement. </p>
	    </li>
	  </ul>
	</div>
	<div class="block6_2 clear">
	  <h3>Leaders in FinTech Choose US</h3>
	  <div class="half_half clear">
	    <div class="left_half">
	      <h4>Lorem Ipsum is simply dummy text of the <br> printing and typesetting industry.</h4>
	      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	    </div>
	    <div class="right_half"><img class="full_border" src="{{ asset('front_assets/assets/images/img8.jpg') }}" alt="no img"></div>
	  </div>
	  <div class="half_half clear">
	    <div class="right_half"><img class="full_border" src="{{ asset('front_assets/assets/images/img8.jpg') }}" alt="no img"></div>
	    <div class="left_half">
	      <h4>Lorem Ipsum is simply dummy text of the <br> printing and typesetting industry.</h4>
	      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	    </div>
	  </div>

	</div>
	<div class="same_gap block6_3 clear">
	  <div id="owl-demo" class="owl-carousel">
	    <div class="item clear">
	      <div class="slider1_left"><img class="full_border" src="{{ asset('front_assets/assets/images/img9.jpg') }}" alt="no img"></div>
	      <div class="slider1_right">
		<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
		<div class="author_desc">
		  <span class="au_name">Brauan Silliman</span>
		  <span class="au_desc">CEO of Company name dummy</span>
		</div>
	      </div>
	    </div>
	    <div class="item clear">
	      <div class="slider1_left"><img class="full_border" src="{{ asset('front_assets/assets/images/img8.jpg') }}" alt="no img"></div>
	      <div class="slider1_right">
		<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
		<div class="author_desc">
		  <span class="au_name">Brauan Silliman</span>
		  <span class="au_desc">CEO of Company name dummy</span>
		</div>
	      </div>
	    </div>
	    <div class="item clear">
	      <div class="slider1_left"><img class="full_border" src="{{ asset('front_assets/assets/images/img8.jpg') }}" alt="no img"></div>
	      <div class="slider1_right">
		<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
		<div class="author_desc">
		  <span class="au_name">Brauan Silliman</span>
		  <span class="au_desc">CEO of Company name dummy</span>
		</div>
	      </div>
	    </div>
	  </div>
	</div>	
	
      </div>
    </div>
    
    <div class="block7">
      <div class="main_container clear">
	<div class="block7_inner">
	  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
	  <a href="#" class="get_demo">Get the DEMO</a>
	</div>
      </div>
    </div>
   

    <span class="live_chat"><img src="{{ asset('front_assets/assets/images/live_chat.png') }}" alt="no img"></span>
  </div>


@endsection