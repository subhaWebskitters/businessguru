<?php if(count($popularData) >0): ?>
		<?php foreach($popularData as $pData): ?>
				<?php /**/
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
				/**/ ?> 		

				<article class="single-blog clear">
						<div class="image">
						<?php echo e(Html::image(asset('upload/businessuser/thumb/'.$businessImage),$businessImage,array('height'=>'152','width'=>'229'))); ?>

						</div>
						<div class="entry-header">
								<h4><a href="<?php echo e(URL::route('business_details',$businessSlug)); ?>"><?php echo e($businessName); ?></a></h4>
						</div>
						<div class="entry-header">
								<a href="<?php echo e(URL::route('discover_details',$businessSlug)); ?>" class="lmr">learn more</a>
								<p><?php echo e(substr($businessDescription,0,50)."...."); ?></p>
						</div>
				</article>
		<?php endforeach; ?>
<?php else: ?>
		<article class="single-blog clear"><div class="well" style="color:red">No Record Found</div></article>
<?php endif; ?>