
{{--*/
$controller = Helpers::getRoute('controller');
$action = Helpers::getRoute('action');
$uri = Request::segment(1);
$investor_id = Session::get('INVESTORS_ID');
$buss_id     = Session::get('BUSINESS_ID');

if(isset($search_word) && $search_word!='')
{
$setval = $search_word;
}
else
{
$setval = '';
}

/*--}}

    <header id="header" class="clear">
    @if($investor_id != '' || $buss_id != '')
    <div class="upper_tab clear" style="display:block;">
		<ul>
				<li class="funds_tab"><a href="{{URL::route('changepassword')}}">Change Password</a></li>
				  
				@if($investor_id == '' && $buss_id != '')  
				  <li class="funds_tab"><a href="{{URL::route('business_dashboard')}}">Edit Profile</a></li>
			        @elseif($investor_id != '' && $buss_id == '')
					    <li class="funds_tab"><a href="{{URL::route('editprofile',$investor_id)}}">Edit Profile</a></li>
				@endif
				
				<li class="funds_tab"><a href="{{URL::route('logout')}}">Logout</a></li>
		</ul>
    </div>
    @endif
    <div class="logo"><a href="{{URL::route('register')}}"><img src="http://182.73.137.51:9999/images/logo.png" alt="Business Guru" title="Business Guru"></a></div>
    <div class="menu_sec clear">
      <div id="navbar" class="navbar">
	<nav id="site-navigation" class="navigation main-navigation" role="navigation">
	  <button class="menu-toggle">Menu</button>
	  <a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>
	  <div class="nav-menu">
	    <ul>
	      <li class="@if($controller =='DiscoverController' && $action == 'index') current-menu-item @endif"><a href="{{URL::route('discover')}}">Discover</a></li>
	      <li class="@if($controller =='CmsController' && $uri == 'about') current-menu-item @endif"><a href="{{URL::route('about_us')}}">About Us</a></li>
	      <li class="@if($controller =='CmsController' && $uri == 'how_it_works') current-menu-item @endif"><a href="{{URL::route('how_it_works')}}">How It Works</a></li>
	      <li class="@if($controller =='CmsController' && $uri == 'contact') current-menu-item @endif"><a href="{{URL::route('contact_us')}}">Contact Us</a></li>
	    </ul>
	  </div>
	</nav>
      </div>
      <div class="search_sec">
	{!! Form::open(array('route'=>'discover','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')) !!}
	  {!! Form::text('search',$setval,array('class'=>"form-control required", 'placeholder'=>"Search here", 'id'=>"searchHeader")) !!}
	  {!! Form::submit('Save', array('class' => 'btn')) !!}
	{!! Form::close() !!}
      </div>
    </div>
  </header>