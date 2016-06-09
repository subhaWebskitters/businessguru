<?php if(count($businessData) >0): ?>
		<?php foreach($businessData as $bsD): ?>
				<?php /**/
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
				/**/ ?> 
				<article class="single-blog clear">
						<div class="site-left">
								<?php echo e(Html::image(asset('upload/businessuser/thumb/'.$businessImage),$businessImage,array('height'=>'200','width'=>'311'))); ?>	
						</div>
						<div class="site-content">
								<div class="entry-header">
										<h3><a href="<?php echo e(URL::route('business_details',$businessSlug)); ?>"><?php echo e($businessName); ?></a></h3>
										<span>By : <?php echo e($investorName); ?></span>
								</div>
								<div class="entry-content">
										<p><?php echo e(substr($businessDescription,0,80)."...."); ?></p>
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
