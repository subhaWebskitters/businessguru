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
<?php endif; ?>