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
								<?php echo e(Html::image(asset('upload/businessuser/thumb/'.$businessImage),$businessImage)); ?>

						</div>
						<div class="site-content">
								<div class="entry-header">
										<h3><a href="<?php echo e(URL::route('business_details',$businessSlug)); ?>"><?php echo e($businessName); ?></a></h3>
								</div>
								<div class="entry-content">
										<p><?php echo e(substr($businessDescription,0,80)."...."); ?></p>
										<div class="blg-ft clear">
												<div class="add">
														<a href="#" class="lct"><?php echo e($businessAddress); ?></a>
														<a href="#" class="ctg"><?php echo e($industryName); ?></a>
												</div>			
												<a href="<?php echo e(URL::route('business_details',$businessSlug)); ?>" class="lmr">learn more</a>			
										</div>
								</div>
						</div>
						
				</article>
		<?php endforeach; ?>
<?php endif; ?>