
<?php /**/
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

/**/ ?>

    <header id="header" class="clear">
    <?php if($investor_id != '' || $buss_id != ''): ?>
    <div class="upper_tab clear" style="display:block;">
		<ul>
				<li class="funds_tab">
						<?php if($investor_id != ''): ?>
								<a href="<?php echo e(URL::route('changepassword')); ?>">
						<?php elseif($buss_id != ''): ?>
								<a href="<?php echo e(URL::route('business_changepassword')); ?>">
						<?php endif; ?>
								Change Password
						</a>
				</li>
				  
				<?php if($investor_id == '' && $buss_id != ''): ?>  
				  <li class="funds_tab"><a href="<?php echo e(URL::route('business_dashboard')); ?>">Edit Profile</a></li>
			        <?php elseif($investor_id != '' && $buss_id == ''): ?>
					    <li class="funds_tab"><a href="<?php echo e(URL::route('editprofile',$investor_id)); ?>">Edit Profile</a></li>
				<?php endif; ?>
				
				<li class="funds_tab"><a href="<?php echo e(URL::route('logout')); ?>">Logout</a></li>
		</ul>
    </div>
    <?php endif; ?>
    <div class="logo"><a href="<?php echo e(URL::route('register')); ?>"><img src="http://182.73.137.51:9999/images/logo.png" alt="Business Guru" title="Business Guru"></a></div>
    <div class="menu_sec clear">
      <div id="navbar" class="navbar">
	<nav id="site-navigation" class="navigation main-navigation" role="navigation">
	  <button class="menu-toggle">Menu</button>
	  <a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>
	  <div class="nav-menu">
	    <ul>
	      <li class="<?php if($controller =='DiscoverController' && $action == 'index'): ?> current-menu-item <?php endif; ?>"><a href="<?php echo e(URL::route('discover')); ?>">Discover</a></li>
	      <li class="<?php if($controller =='CmsController' && $uri == 'about'): ?> current-menu-item <?php endif; ?>"><a href="<?php echo e(URL::route('about_us')); ?>">About Us</a></li>
	      <li class="<?php if($controller =='CmsController' && $uri == 'how_it_works'): ?> current-menu-item <?php endif; ?>"><a href="<?php echo e(URL::route('how_it_works')); ?>">How It Works</a></li>
	      <li class="<?php if($controller =='CmsController' && $uri == 'contact'): ?> current-menu-item <?php endif; ?>"><a href="<?php echo e(URL::route('contact_us')); ?>">Contact Us</a></li>
	    </ul>
	  </div>
	</nav>
      </div>
		<div class="search_sec">
				<?php echo Form::open(array('route'=>'investor_dashboard','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')); ?>

						<?php echo Form::text('search',$setval,array('class'=>"form-control required", 'placeholder'=>"Search here", 'id'=>"searchHeader")); ?>

						<?php echo Form::submit('Save', array('class' => 'btn')); ?>

				<?php echo Form::close(); ?>

		</div>
    </div>
  </header>