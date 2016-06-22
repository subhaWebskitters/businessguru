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
@endif