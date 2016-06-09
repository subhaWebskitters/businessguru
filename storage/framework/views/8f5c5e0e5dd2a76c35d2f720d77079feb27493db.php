<div id="owl-demo" class="owl-carousel owl">
    <?php if(count($investors_banner) > 0): ?>
      <?php foreach($investors_banner as $ibanner): ?>
	<?php if(file_exists(public_path('upload/investorBanner/'.$ibanner->image))): ?>
	<div class="item">
	    
	      <img src="<?php echo e(asset('/upload/investorBanner/'.$ibanner->image)); ?>" alt=""/>
	     
	</div>
      <?php endif; ?> 
    <?php endforeach; ?>
    <?php endif; ?>
</div>