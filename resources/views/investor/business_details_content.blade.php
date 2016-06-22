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
								@if (!$businessImage)
										{{ Html::image(asset('upload/businessuser/thumb/311200.jpg')) }}
								@else
										{{ Html::image(asset('upload/businessuser/thumb/'.$businessImage),$businessImage) }}
								@endif
						</div>
						<div class="site-content">
								<div class="entry-header">
										<h3><a href="{{URL::route('business_details',$businessID)}}">{{$businessName}}</a></h3>
										<!--<span>By : {{$investorName}}</span>-->
								</div>
								<div class="entry-content">
										<p>{!! substr(strip_tags($businessDescription),0,80)."...." !!}</p>
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