@extends('masterLayout')
@section('content')


 <div id="main" class="clear inv_details">
    <div class="main_container">
    <a class="lmr" href="{{URL::route('discover')}}">Back</a>
      <div class="inv_inner">
	<h2>{{$businessDetails->business_name}} <!--<span>by {{$businessDetails->business_name}}</span>--></h2>
	<div class="deatils_outer clear">
	  <div class="summary">
	    <div class="border_box discoverDetailsBorder">
	      <h3>Summary:</h3>
	      <p>{!!$businessDetails->business_description!!}</p>
	       
	    </div>
	    <div class="border_box  clear discoverDetailsBorder">
	      <h3>Upload Video and Photo:</h3>
	       
	       @if(count($businessDetails->get_business_files)>0)
		<div class="owl_new1">
		  <div id="owl-demoBusiness" class="owl-carousel owl">
		    @foreach($businessDetails->get_business_files as $files)
		      <div class="item">
			@if (file_exists(public_path('upload/businessfiles/businessSliderThumb/'.$files->file_name))) 
					<img src="{{ asset('/upload/businessfiles/businessSliderThumb/'.$files->file_name) }}" alt=""/>
			@endif			
		      </div>
		    @endforeach
		  </div>
		</div>
				 
		@else
			{{'No photo and video exists'}}
		@endif
	       <div class="want_to">
		<div class="want_to_inner">
		  <img src="{{ asset('front_assets/assets/images/icon21.png') }}">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>
	    </div>
	    <div class="border_box discoverDetailsBorder">
	      <h3>Company Portfolio</h3>
	      <p>{!!$businessDetails->company_portfolio!!}</p>
	       <div class="want_to">
		<div class="want_to_inner">
		  <img src="{{ asset('front_assets/assets/images/icon21.png') }}">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>
	    </div>
	   <!-- <div class="border_box upload_img clear discoverDetailsBorder">
	      <h3>View Portfolios Uploaded</h3>
	       
	       @if(COUNT($businessDetails->getDocumentList)>0)
			<ul>

			@foreach($businessDetails->getDocumentList as $v)
											    
				    @if(file_exists(public_path().'/upload/attachment/'.$v->document_name))
						{{--{{$v->document_name}}--}}
						<li>
						    <a href="{{URL::route('download_file',$v->document_name)}}">
						    {!! Html::image(asset('upload/attachment/'.$v->document_name),'Download',array('title'=>'Download '.Helpers::get_extension($v->document_name),'height'=>'100px','width'=>'100px' ))!!}
						    
						    <span class="comPortfolioDoc">{{$v->document_name}}</span>
						    </a>
						</li>
				    @endif    
				    
			 @endforeach
			</ul>			    
		@else
		   N/A  
		@endif
					
	    </div>-->
	    <div class="border_box clear discoverDetailsBorder">
	      <h3>View Portfolios Uploaded</h3>
	      
	        @if(COUNT($businessDetails->getDocumentList)>0)
						<ul>
		
						@foreach($businessDetails->getDocumentList as $v)
							   							    
							    @if(file_exists(public_path().'/upload/attachment/'.$v->document_name))
									{{--{{$v->document_name}}--}}
						<li>
						    <a href="{{URL::route('download_file',$v->document_name)}}">{!! Html::image(asset('icon/'.Helpers::get_extension_icon($v->document_name)),'Download',array('title'=>'Download '.Helpers::get_extension($v->document_name),'height'=>'40px','width'=>'40px' ))!!}
						    <span class="comPortfolioDoc">{{$v->document_name}}</span>
						    </a>
						</li>
							    @endif    
							    
						 @endforeach
						</ul>			    
				        @else
				           N/A 
						@endif
	    <div class="want_to">
		<div class="want_to_inner">
		  <img src="{{ asset('front_assets/assets/images/icon21.png') }}">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>
	     
	    </div>
		
		
	   <div class="border_box discoverDetailsBorder list_full_bio">
	      <h3>Director's BIO</h3>
	      @if(COUNT($businessDetails->business_details)>0)
						<ul>
		
						@foreach($businessDetails->business_details as $v)
							   						
									<li><span class="spanDirectorName">{{$v->director_name}}</span><p class="spanDirectorBio">{!!$v->director_bio!!}</p></li>
							   
						 @endforeach
									    
				        @else
				           N/A  
				        @endif
						</ul>
	       <div class="want_to">
		<div class="want_to_inner">
		  <img src="{{ asset('front_assets/assets/images/icon21.png') }}">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>
	    </div>
		
	    <div class="border_box clear discoverDetailsBorder">
	      <h3>Proposal</h3>
	       <ul>
		    @if(file_exists(public_path().'/upload/proposal/'.$businessDetails->proposal_name) && $businessDetails->proposal_name != '')
			<li>
				<a href="{{URL::route('front_download_proposal_file',$businessDetails->proposal_name)}}">{!! Html::image(asset('icon/'.Helpers::get_extension_icon($businessDetails->proposal_name)),'Download',array('title'=>'Download '.Helpers::get_extension($businessDetails->proposal_name),'height'=>'40px','width'=>'40px' ))!!}
					<span class="comPortfolioDoc">{{$businessDetails->proposal_name}}</span>
				</a>
			</li>
		    @else
			N/A
		    @endif
		</ul>
	      <div class="want_to">
		<div class="want_to_inner">
		  <img src="{{ asset('front_assets/assets/images/icon21.png') }}">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>
	    </div>
	  </div>
	  <div class="looking">
	    <div class="border_box discoverDetailsBorder">
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
		  <img src="{{ asset('front_assets/assets/images/icon21.png') }}">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>

	    </div>
	    
	    <div class="border_box discoverDetailsBorder">
	      <div class="company_name">
		<div class="company_img"></div>
		<span>Company name</span>
		<span>082-47-x2s <br> 2013<br> Art, Games, Food</span>
		<a href="#">www.website.com</a>
	      </div>

      	      <div class="want_to">
		<div class="want_to_inner">
		  <img src="{{ asset('front_assets/assets/images/icon21.png') }}">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>

	    </div>
	  </div>
	</div>
	 <a class="lmr" href="{{URL::route('investor_dashboard')}}">Back</a>
      </div>
    </div>
  </div>
<script>
 $(document).ready(function() {
     
      var owl = $("#owl-demoBusiness");
     
      owl.owlCarousel({
          items : 3,
	  center:true,
	  loop:true,
	  navigation:true,
	  pagination: false,
      });
     
     $(".fancybox2").fancybox();
    });

   $(document).on('click', function (e) {
	if ($(e.target).attr('class')!= 'sign_up1 investors1' && $(e.target).attr('id')!='scrollbar1' && $(e.target).parents('#scrollbar1').length == 0 ) {
	   $("#scrollbar1").hide();$(".invester_signin").hide();
	}
});

</script>
@endsection