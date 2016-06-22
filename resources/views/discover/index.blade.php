@extends('masterLayout')
@section('content')
		<div class="banner">
				<div id="owl-demo" class="owl-carousel owl">
						@foreach($bannerData as $bdata)
								<div class="item">
										@if (file_exists(public_path('upload/homeBanner/'.$bdata->bannerimage))) 
												<img src="{{ asset('/upload/homeBanner/'.$bdata->bannerimage) }}" alt="" />
										@endif
										<div class="dis_content">
												<div class="main_container">
														<div class="banner_text_slider">
																<h2>{!! $bdata->question !!}</h2>
																<p>{!! $bdata->answer !!}</p>
														</div>
												</div>
										</div>
								</div>
						@endforeach
				</div>
		</div>
		<div id="main" class="clear dash-page discoverMainPage"> 
				<div class="main_container clear">
						<div class="fnctn">
								<ul class="clear industryList">
										@if($allindustryData->count() > 0)
										@foreach($allindustryData as $ivstD)
												{{--*/
												$industryID = $ivstD->id;
												$industryName = $ivstD->industry_name;
												/*--}}
												<li style="cursor:pointer;"><a item="{{$industryID}}" class="{{strtolower($industryName)}} discoverCat">{{$industryName}}</a></li>
										@endforeach
								@endif
								</ul>
						</div>
						<div class="discover-details clear">	
								<div class="menu-listing-left menu-listing discoverPopularListing">
										<div class="main-blog">
												<h3>Popular listings</h3>
												<div id="scrollbar4">
														<div class="scrollbar">
																<div class="track">
																		<div class="thumb">
																				<div class="end"></div>
																		</div>
																</div>
														</div>
														<div class="viewport">
																<div class="overview">
																		<div id="side-bar" class="side-bar blg-cmn">
																				@if(count($popularData) >0)
																						@foreach($popularData as $pData)
																								{{--*/
																								$businessID = $pData->id;
																								$businessSlug = $pData->business_slug;
																								$businessName = $pData->business_name;
																								$businessImage = $pData->business_logo;
																								$industryName = $pData->category_list;
																								$businessDescription = $pData->business_description;
																								$businessAddress = $pData->registered_address;
																								$listedDate = date('l jS \of F Y h:i:s A',strtotime($pData->created_at));
																								/*--}} 		
																				
																								<article class="single-blog clear">
																										<div class="image">
																										@if (!$businessImage)
																												{{ Html::image(asset('upload/businessuser/popularthumb/229152.jpg')) }}
																										@else
																												{{ Html::image(asset('upload/businessuser/popularthumb/'.$businessImage),$businessImage) }}
																										@endif
																										</div>
																										<div class="entry-header">
																												<h4><a href="{{URL::route('discover_details',$businessSlug)}}">{{$businessName}}</a></h4>
																										</div>
																										<div class="entry-header">
																												<a href="{{URL::route('discover_details',$businessSlug)}}" class="lmr">learn more</a>
																												<p>{!! substr($businessDescription,0,50)."...." !!}</p>
																										</div>
																								</article>
																						@endforeach
																				@else
																						<article class="single-blog clear"><div class="well" style="color:red">No Record Found</div></article>
																				@endif
																		</div>
																		<input type="hidden" name="currentpagepopular" id="currentpagepopular" value="1">
																</div>
														</div>
												</div>
										</div>
								</div>
								<div class="menu-listing-right menu-listing  discoverPopularListing">
										<div class="main-blog">
												<h3>Latest Business Listings</h3>
												<div id="scrollbar3">
														<div class="scrollbar">
																<div class="track">
																		<div class="thumb">
																				<div class="end"></div>
																		</div>
																</div>
														</div>
														<div class="viewport">
																<div class="overview discoverPopularListing">
																		<div id="blogdiscover" class="blog-page blg-cmn">
																				@if(count($businessData) >0)
																						@foreach($businessData as $bsD)
																								{{--*/
																										$businessID = $bsD->id;
																										$businessSlug = $bsD->business_slug;
																										$businessName = $bsD->business_name;
																										$businessImage = $bsD->business_logo;
																										$industryName = $bsD->category_list;
																										$businessDescription = $bsD->business_description;
																										$businessAddress = $bsD->registered_address;
																										$listedDate = date('l jS \of F Y h:i:s A',strtotime($bsD->created_at));
																								/*--}}
																								<article class="single-blog clear">
																										<div class="site-left">
																												@if (!$businessImage)
																														{{ Html::image(asset('upload/businessuser/thumb/311200.jpg')) }}
																												@else
																														{{ Html::image(asset('upload/businessuser/thumb/'.$businessImage),$businessImage) }}
																												@endif
																										</div>
																										<div class="site-content">
																												<div class="entry-header">
										<div class="businessInvestType clear">																<h3><a href="{{URL::route('discover_details',$businessSlug)}}">{{$businessName}}</a></h3><span>{{'Looking For '.$bsD->investor_type}}</span>
										</div>
																												</div>
																												<div class="entry-content">
																														<p>{!! substr(strip_tags($businessDescription),0,80)."...." !!}</p>
																														<div class="blg-ft clear">
																																<div class="add">
																																		<a href="#" class="lct">{{$businessAddress}}</a>
																																		<a href="#" class="ctg">{{$industryName}}</a>
																																</div>			
																																<a href="{{URL::route('discover_details',$businessSlug)}}" class="lmr">learn more</a>			
																														</div>
																												</div>
																										</div>
																								</article>

																								
																						@endforeach
																				@else
																						<article class="single-blog clear"><div class="well" style="color:red">No Record Found</div></article>
																				@endif
																		</div>
																		<input type="hidden" name="currentpage" id="currentpage" value="1">
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
								
						{{--*/
						$investor_id = Session::get('INVESTORS_ID');
						$buss_id     = Session::get('BUSINESS_ID');
						/*--}}
						
						@if($investor_id == '' && $buss_id == '')	
						<div class="block5">
								<div class="main_container center">
									<div class="business businessGetStarted">
										<h2>Get Started Now</h2>
										<ul>
										<li class="investors1"><a href="javascript:void(0);"><h2>Business Investors</h2><span>I want to invest</span></a></li>
										<li class="start_up1"><a href="javascript:void(0);"><h2>Business Start Up</h2><span>Invest in me</span></a></li>
												</ul>
										</div>
								</div>
						</div>
						@endif
				</div>
				<span class="live_chat">
						<img alt="no img" src="{{asset("images/live_chat.png")}}">
				</span>
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