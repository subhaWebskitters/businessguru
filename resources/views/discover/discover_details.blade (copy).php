@extends('app')
@section('content')

		
@if(Session::has('errmsg'))
		<div class="alert alert-success"><strong>{{ Session::get('errmsg') }}</strong></div>
@endif
<div class="container">
    <div class="row">
				
        <div class="col-sm-9 col-md-9" id="busnessdetails">
						<div class="well">
								<h3>{{$businessDetails->business_name}}</h3>
								<p>{{$businessDetails->business_description}}</p>
								<p>{{$businessDetails->registered_address}}</p>
								<span>{{date('l jS \of F Y h:i:s A',strtotime($businessDetails->created_at))}}</span>
						</div>
						<div style="margin:10px;">
								<div style="margin:20px;">
										{{ Html::image(asset('upload/businessuser/'.$businessDetails->business_logo),$businessDetails->business_logo,array('height'=>'400','width'=>'400')) }}
								</div>
						</div>
						
						<div><h3>Company Portfolio:</h3></div>
						<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non condimentum odio. Etiam pretium vehicula faucibus. Pellentesque at est tincidunt, fermentum magna et, vestibulum ipsum. Donec dolor eros, ornare eu quam nec, sagittis mattis lorem. Nam sit amet orci vestibulum mauris laoreet cursus. Mauris rhoncus mauris eu massa pretium, quis facilisis arcu convallis. Suspendisse ipsum neque, malesuada quis odio ut, volutpat posuere diam. </div>
						<div><h3>Director Biodata:</h3></div>
						<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non condimentum odio. Etiam pretium vehicula faucibus. Pellentesque at est tincidunt, fermentum magna et, vestibulum ipsum. Donec dolor eros, ornare eu quam nec, sagittis mattis lorem. Nam sit amet orci vestibulum mauris laoreet cursus. Mauris rhoncus mauris eu massa pretium, quis facilisis arcu convallis. Suspendisse ipsum neque, malesuada quis odio ut, volutpat posuere diam. </div>
						<div><h3>Proposal:</h3></div>
						<div>Want to register your interest and We will contact you within 24 hours</div>
						@if($investor_id != '' || $buss_id != '')
								<div class="logControl">
								{!! Form::button('Register',array('id'=>'go_to_protfolio','class'=>'buttonM bBlue')) !!}
						</div>
						@endif
				</div>
				
		</div>
</div>
    
    
      <div id="main" class="clear inv_details">
    <div class="main_container">
      <div class="inv_inner">
	<h2>Business Name <span>by Anders stanly</span></h2>
	<div class="deatils_outer clear">
	  <div class="summary">
	    <div class="border_box">
	      <h3>Summary:</h3>
	      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the .</p>
	    </div>
	    <div class="border_box upload_img clear">
	      <h3>Upload Video and Photo:</h3>
	      <ul>
		<li><img src="images/img17.jpg" alt="no img"></li>
		<li><img src="images/img18.jpg" alt="no img"></li>
		<li><img src="images/img19.jpg" alt="no img"></li>
	      </ul>
	    </div>
	    <div class="border_box">
	      <h3>Company Portfolio</h3>
	      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining </p>
	    </div>
	    <div class="border_box">
	      <h3>Director's BIO</h3>
	      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining </p>
	    </div>
	    <div class="border_box">
	      <h3>Proposal</h3>
	      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	      <div class="want_to">
		<div class="want_to_inner">
		  <img src="images/icon21.png">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="#" class="sign_up1">Sign Up</a>
		</div>
	      </div>
	    </div>
	  </div>
	  <div class="looking">
	    <div class="border_box">
	      <h3>Looking For</h3>
	      <div class="selling">
		<h4>Selling/Investment</h4>
		<span class="line">$45,000,00</span>
		<span>45%</span>
	      </div>
	      <a href="#" class="interest">I am Interested</a>
	      <a href=#" class="download">Download sales report</a>
	      
	      <div class="want_to">
		<div class="want_to_inner">
		  <img src="images/icon21.png">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="#" class="sign_up1">Sign Up</a>
		</div>
	      </div>

	    </div>
	    
	    <div class="border_box">
	      <div class="company_name">
		<div class="company_img"></div>
		<span>Company name</span>
		<span>082-47-x2s <br> 2013<br> Art, Games, Food</span>
		<a href="#">www.website.com</a>
	      </div>

      	      <div class="want_to">
		<div class="want_to_inner">
		  <img src="images/icon21.png">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="#" class="sign_up1">Sign Up</a>
		</div>
	      </div>

	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>

@endsection
	
