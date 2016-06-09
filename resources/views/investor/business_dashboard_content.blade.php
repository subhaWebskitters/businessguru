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
				$listedDate = date('l jS \of F Y h:i:s A',strtotime($bsD->listed_date));
				/*--}}
				<article class="single-blog clear">
						<div class="site-left">
								{{ Html::image(asset('upload/businessuser/'.$businessImage),$businessImage,array('height'=>'100','width'=>'100')) }}
						</div>
						<div class="site-content">
								<div class="entry-header">
										<h3><a href="{{URL::route('business_details',$businessID)}}">{{$businessName}}</a></h3>
										<span>By : {{$investorName}}</span>
								</div>
								<div class="entry-content">
										<p>{{substr($businessDescription,0,80)."...."}}</p>
										<div class="blg-ft clear">
												<div class="add">
														<a href="#" class="lct">{{$businessAddress}}</a>
														<a href="#" class="ctg">
																@if($industryData->count() > 0)
																		{{--*/
																		$industryName = '';
																		/*--}} 		
																		@foreach($industryData as $ivstD)
																				{{--*/
																				$industryName .= $ivstD->industry_name . ' , ';
																				/*--}}
																		@endforeach
																@endif
																{{--*/
																$industryName = rtrim($industryName,',');
																/*--}} 
																{{$industryName}}
														</a>
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