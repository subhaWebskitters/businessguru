@if(count($popularData) >0)
		@foreach($popularData as $pData)
				{{--*/
				$investorID = $pData->investor_id;
				$investorName = $pData->name;
				$businessID = $pData->business_id;
				$businessSlug = $pData->business_slug;
				$businessName = $pData->business_name;
				$businessImage = $pData->business_logo;
				$industryName = $pData->industry_name;
				$businessDescription = $pData->business_description;
				$businessAddress = $pData->registered_address;
				$listedDate = date('l jS \of F Y h:i:s A',strtotime($pData->listed_date));
				/*--}} 		

				<article class="single-blog clear">
						<div class="image">
						{{ Html::image(asset('upload/businessuser/thumb/'.$businessImage),$businessImage,array('height'=>'152','width'=>'229')) }}
						</div>
						<div class="entry-header">
								<h4><a href="{{URL::route('business_details',$businessSlug)}}">{{$businessName}}</a></h4>
						</div>
						<div class="entry-header">
								<a href="{{URL::route('discover_details',$businessSlug)}}" class="lmr">learn more</a>
								<p>{{substr($businessDescription,0,50)."...."}}</p>
						</div>
				</article>
		@endforeach
@else
		<article class="single-blog clear"><div class="well" style="color:red">No Record Found</div></article>
@endif