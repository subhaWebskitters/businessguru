@extends('masterLayout')
@section('content')
		
		<!--<script type="text/javascript" src="{{ asset('admin_assets/js/jquery.lazyscript.js')}}"></script>-->

<style>
body{margin-top:50px;}
.glyphicon { margin-right:10px; }
.panel-body { padding:0px; }
.panel-body table tr td { padding-left: 15px }
.panel-body .table {margin-bottom: 0px; }
</style>
		
@if(Session::has('errmsg'))
		<div class="alert alert-success"><strong>{{ Session::get('errmsg') }}</strong></div>
@endif
<script>
		function searchBusiness(industryid,investorid) {
				var base_url_suffix	= '';
				var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
				var csrf_token = $('meta[name="csrf-token"]').attr('content'); 
				$.ajax({ 
						type: 'POST', 
						url: base_url+'business_search', 
						data:"_token="+csrf_token+"&industryid="+industryid+"&investorid="+investorid,
						success: function (response) {
								
								if (response) {
										$('#busnessdetails').html(response);
								
								}
						}
				});
		}
		
		
</script>

<div class="banner">
		@include('investor.banner')
</div>

<div id="main" class="clear dash-page"> 
		<div class="main_container clear">
		
				<div class="fnctn">
						<ul class="clear">
								@if($allindustryData->count() > 0)
										@foreach($allindustryData as $ivstD)
												{{--*/
												$industryName = $ivstD->industry_name;
												/*--}}
												<li><a class="{{strtolower($industryName)}} catIndustry" id="{{$ivstD->id}}" style="cursor:pointer;">{{$industryName}}</a></li>
										@endforeach
								@endif
						</ul>
				</div>
		
		
		
				<div class="discover-details clear">	
						<div class="menu-listing-left menu-listing dash-left">
								<div class="main-blog">
										<div class="search">
												<input type="search" name="search_text" id="search_text" placeholder="Business Name" />
										</div>
										
										<h3>Search by Category :</h3>
										<ul class="category">
												@if($allindustryData->count() > 0)
														@foreach($allindustryData as $ivstD)
																{{--*/
																$industryID = $ivstD->id;
																$industryName = $ivstD->industry_name;
																$investorID = $ivstD->investor_id;
																/*--}} 
																<li>
																		<input type="checkbox" name="industryid[]" id="industryid{{ $industryID}}" value="{{ $industryID}}" class="industryChoose custom" />
																		<label>{{$industryName}}</label>
																</li>
														@endforeach
												@endif
										</ul>
								
										<h3>Search by Price :</h3>
										<div class="price_slider">
												<div id="slider-range"></div>
												<div class="price_span clear">
														<span class="left_span"></span>
														<span class="right_span"></span>
												</div>
												<input type="hidden" name="max_price" id="max_price" value="{{$max_price}}">
										</div>
								</div>
						</div>
				
						<div class="menu-listing-right menu-listing">
								<div class="main-blog">
										<h3>Recent Business Viewed</h3>
										<div id="scrollbar5">
												<div class="scrollbar">
														<div class="track">
																<div class="thumb">
																		<div class="end"></div>
																</div>
														</div>
												</div>
												<div class="viewport">
														<div class="overview">
																<div id="listbusiness" class="blog-page blg-cmn">
																		@if(count($businessData) >0)
																				@foreach($businessData as $bsD)
																						{{--*/
																						$investorID = $bsD->investor_id;
																						$investorName = $bsD->name;
																						$businessID = $bsD->business_id;
																						$businessSlug = $bsD->business_slug;
																						$businessName = $bsD->business_name;
																						$businessImage = $bsD->business_logo;
																						$industryName = $bsD->industry_name;
																						$businessDescription = $bsD->business_description;
																						$businessAddress = $bsD->registered_address;
																						$categoryList = $bsD->category_list;
																						$listedDate = date('l jS \of F Y h:i:s A',strtotime($bsD->listed_date));
																						/*--}}
																						<article class="single-blog clear">
																								<div class="site-left">
																										{{ Html::image(asset('upload/businessuser/thumb/'.$businessImage),$businessImage) }}
																								</div>
																								<div class="site-content">
																										<div class="entry-header">
																												<h3><a href="{{URL::route('business_details',$businessSlug)}}">{{$businessName}}</a></h3>
																												<span>By : {{$investorName}}</span>
																										</div>
																										<div class="entry-content">
																												<p>{{substr($businessDescription,0,80)."...."}}</p>
																												<div class="blg-ft clear">
																														<div class="add">
																																<a href="#" class="lct">{{$businessAddress}}</a>
																																<a href="#" class="ctg">{{$categoryList}}</a>
																														</div>			
																														<a href="{{URL::route('business_details',$businessSlug)}}" class="lmr">learn more</a>			
																												</div>
																										</div>
																								</div>
																						</article>
																				@endforeach
																		@else
																				<div class="well" style="color:red">No Record Found</div>
																		@endif
																		<div class="pagination-panel">
																				{!! $businessData->render() !!}			
																		</div>
																</div>
																<input type="hidden" name="currentpagelb" id="currentpagelb" value="1">
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<span class="live_chat">
				<img alt="no img" src="images/live_chat.png">
		</span>
</div>	
		
  @endsection
