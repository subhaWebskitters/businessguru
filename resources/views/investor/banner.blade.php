<div id="owl-demo" class="owl-carousel owl">
    @if(count($investors_banner) > 0)
      @foreach($investors_banner as $ibanner)
	@if (file_exists(public_path('upload/investorBanner/'.$ibanner->image)))
	<div class="item">
	    
	      <img src="{{ asset('/upload/investorBanner/'.$ibanner->image) }}" alt=""/>
	     
	</div>
      @endif 
    @endforeach
    @endif
</div>