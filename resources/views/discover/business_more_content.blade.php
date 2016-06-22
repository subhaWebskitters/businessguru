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
								{{ Html::image(asset('upload/businessuser/thumb/'.$businessImage),$businessImage) }}
						</div>
						<div class="site-content">
								<div class="entry-header">
										<h3><a href="{{URL::route('business_details',$businessSlug)}}">{{$businessName}}</a></h3>
								</div>
								<div class="entry-content">
										<p>{{substr($businessDescription,0,80)."...."}}</p>
										<div class="blg-ft clear">
												<div class="add">
														<a href="#" class="lct">{{$businessAddress}}</a>
														<a href="#" class="ctg">{{$industryName}}</a>
												</div>			
												<a href="{{URL::route('business_details',$businessSlug)}}" class="lmr">learn more</a>			
										</div>
								</div>
						</div>
						
				</article>
		@endforeach
@endif