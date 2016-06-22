<?php $__env->startSection('content'); ?>
		<div class="banner">
				<div id="owl-demo" class="owl-carousel owl">
						<?php foreach($bannerData as $bdata): ?>
								<div class="item">
										<?php if(file_exists(public_path('upload/homeBanner/'.$bdata->bannerimage))): ?> 
												<img src="<?php echo e(asset('/upload/homeBanner/'.$bdata->bannerimage)); ?>" alt="" />
										<?php endif; ?>
										<div class="dis_content">
												<div class="main_container">
														<div class="banner_text_slider">
																<h2><?php echo $bdata->question; ?></h2>
																<p><?php echo $bdata->answer; ?></p>
														</div>
												</div>
										</div>
								</div>
						<?php endforeach; ?>
				</div>
		</div>
		<div id="main" class="clear dash-page discoverMainPage"> 
				<div class="main_container clear">
						<div class="fnctn">
								<ul class="clear industryList">
										<?php if($allindustryData->count() > 0): ?>
										<?php foreach($allindustryData as $ivstD): ?>
												<?php /**/
												$industryID = $ivstD->id;
												$industryName = $ivstD->industry_name;
												/**/ ?>
												<li style="cursor:pointer;"><a item="<?php echo e($industryID); ?>" class="<?php echo e(strtolower($industryName)); ?> discoverCat"><?php echo e($industryName); ?></a></li>
										<?php endforeach; ?>
								<?php endif; ?>
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
																				<?php if(count($popularData) >0): ?>
																						<?php foreach($popularData as $pData): ?>
																								<?php /**/
																								$businessID = $pData->id;
																								$businessSlug = $pData->business_slug;
																								$businessName = $pData->business_name;
																								$businessImage = $pData->business_logo;
																								$industryName = $pData->category_list;
																								$businessDescription = $pData->business_description;
																								$businessAddress = $pData->registered_address;
																								$listedDate = date('l jS \of F Y h:i:s A',strtotime($pData->created_at));
																								/**/ ?> 		
																				
																								<article class="single-blog clear">
																										<div class="image">
																										<?php if(!$businessImage): ?>
																												<?php echo e(Html::image(asset('upload/businessuser/popularthumb/229152.jpg'))); ?>

																										<?php else: ?>
																												<?php echo e(Html::image(asset('upload/businessuser/popularthumb/'.$businessImage),$businessImage)); ?>

																										<?php endif; ?>
																										</div>
																										<div class="entry-header">
																												<h4><a href="<?php echo e(URL::route('discover_details',$businessSlug)); ?>"><?php echo e($businessName); ?></a></h4>
																										</div>
																										<div class="entry-header">
																												<a href="<?php echo e(URL::route('discover_details',$businessSlug)); ?>" class="lmr">learn more</a>
																												<p><?php echo substr($businessDescription,0,50)."...."; ?></p>
																										</div>
																								</article>
																						<?php endforeach; ?>
																				<?php else: ?>
																						<article class="single-blog clear"><div class="well" style="color:red">No Record Found</div></article>
																				<?php endif; ?>
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
																				<?php if(count($businessData) >0): ?>
																						<?php foreach($businessData as $bsD): ?>
																								<?php /**/
																										$businessID = $bsD->id;
																										$businessSlug = $bsD->business_slug;
																										$businessName = $bsD->business_name;
																										$businessImage = $bsD->business_logo;
																										$industryName = $bsD->category_list;
																										$businessDescription = $bsD->business_description;
																										$businessAddress = $bsD->registered_address;
																										$listedDate = date('l jS \of F Y h:i:s A',strtotime($bsD->created_at));
																								/**/ ?>
																								<article class="single-blog clear">
																										<div class="site-left">
																												<?php if(!$businessImage): ?>
																														<?php echo e(Html::image(asset('upload/businessuser/thumb/311200.jpg'))); ?>

																												<?php else: ?>
																														<?php echo e(Html::image(asset('upload/businessuser/thumb/'.$businessImage),$businessImage)); ?>

																												<?php endif; ?>
																										</div>
																										<div class="site-content">
																												<div class="entry-header">
										<div class="businessInvestType clear">																<h3><a href="<?php echo e(URL::route('discover_details',$businessSlug)); ?>"><?php echo e($businessName); ?></a></h3><span><?php echo e('Looking For '.$bsD->investor_type); ?></span>
										</div>
																												</div>
																												<div class="entry-content">
																														<p><?php echo substr(strip_tags($businessDescription),0,80)."...."; ?></p>
																														<div class="blg-ft clear">
																																<div class="add">
																																		<a href="#" class="lct"><?php echo e($businessAddress); ?></a>
																																		<a href="#" class="ctg"><?php echo e($industryName); ?></a>
																																</div>			
																																<a href="<?php echo e(URL::route('discover_details',$businessSlug)); ?>" class="lmr">learn more</a>			
																														</div>
																												</div>
																										</div>
																								</article>

																								
																						<?php endforeach; ?>
																				<?php else: ?>
																						<article class="single-blog clear"><div class="well" style="color:red">No Record Found</div></article>
																				<?php endif; ?>
																		</div>
																		<input type="hidden" name="currentpage" id="currentpage" value="1">
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
								
						<?php /**/
						$investor_id = Session::get('INVESTORS_ID');
						$buss_id     = Session::get('BUSINESS_ID');
						/**/ ?>
						
						<?php if($investor_id == '' && $buss_id == ''): ?>	
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
						<?php endif; ?>
				</div>
				<span class="live_chat">
						<img alt="no img" src="<?php echo e(asset("images/live_chat.png")); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>