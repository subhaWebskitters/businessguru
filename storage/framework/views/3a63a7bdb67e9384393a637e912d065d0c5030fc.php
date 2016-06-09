<?php $__env->startSection('content'); ?>


 <div id="main" class="clear inv_details">
    <div class="main_container">
      <div class="inv_inner">
	<h2><?php echo e($businessDetails->business_name); ?> <!--<span>by <?php echo e($businessDetails->business_name); ?></span>--></h2>
	<div class="deatils_outer clear">
	  <div class="summary">
	    <div class="border_box">
	      <h3>Summary:</h3>
	      <p><?php echo e($businessDetails->business_description); ?></p>
	    </div>
	    <div class="border_box upload_img clear">
	      <h3>Upload Video and Photo:</h3>
	      <?php if(count($businessDetails->get_business_files)>0): ?>
		<ul>
		<?php foreach($businessDetails->get_business_files as $files): ?>
			<li><a class="fancybox2" rel="group" href="<?php echo e(asset('upload/businessfiles/'.$files->file_name)); ?>" title="<?php echo e($files->file_name); ?>" ><?php echo e(Html::image(asset('upload/businessfiles/thumb/'.$files->file_name),$files->file_name)); ?></a></li>
				
		<?php endforeach; ?>
		</ul>
		<?php else: ?>
			<?php echo e('No photo and video exists'); ?>

		<?php endif; ?>
	    </div>
	    <div class="border_box upload_img clear">
	      <h3>Company Portfolio</h3>
	       <?php if(COUNT($businessDetails->getDocumentList)>0): ?>
			<ul>

			<?php foreach($businessDetails->getDocumentList as $v): ?>
											    
				    <?php if(file_exists(public_path().'/upload/attachment/'.$v->document_name)): ?>
						<?php /*<?php echo e($v->document_name); ?>*/ ?>
						<li>
						    <a href="<?php echo e(URL::route('download_file',$v->document_name)); ?>"><?php echo Html::image(asset('icon/'.Helpers::get_extension_icon($v->document_name)),'Download',array('title'=>'Download '.Helpers::get_extension($v->document_name),'height'=>'40px','width'=>'40px' )); ?>

						    <span class="comPortfolioDoc"><?php echo e($v->document_name); ?></span>
						    </a>
						</li>
				    <?php endif; ?>    
				    
			 <?php endforeach; ?>
			</ul>			    
		<?php else: ?>
		   N/A  
		<?php endif; ?>
					
	    </div>
		
		
	    <div class="border_box directorsBioDiv">
	      <h3>Director's BIO</h3>
		<?php if(COUNT($businessDetails->business_details)>0): ?>
			<ul>
			<?php foreach($businessDetails->business_details as $v): ?>
			    <li>
				<span class="spanDirectorName"><?php echo e($v->director_name); ?></span><p class="spanDirectorBio"><?php echo e($v->director_bio); ?></p>
			    </li>
			<?php endforeach; ?>
			</ul>			    
		<?php else: ?>
		   N/A  
		<?php endif; ?>
		
	    </div>
		
	    <div class="border_box upload_img clear">
	      <h3>Proposal</h3>
	       <ul>
		    <?php if(file_exists(public_path().'/upload/proposal/'.$businessDetails->proposal_name) && $businessDetails->proposal_name != ''): ?>
			<li>
				<a href="<?php echo e(URL::route('front_download_proposal_file',$businessDetails->proposal_name)); ?>"><?php echo Html::image(asset('icon/'.Helpers::get_extension_icon($businessDetails->proposal_name)),'Download',array('title'=>'Download '.Helpers::get_extension($businessDetails->proposal_name),'height'=>'40px','width'=>'40px' )); ?>

					<span class="comPortfolioDoc"><?php echo e($businessDetails->proposal_name); ?></span>
				</a>
			</li>
		    <?php else: ?>
			N/A
		    <?php endif; ?>
		</ul>
	      <div class="want_to">
		<div class="want_to_inner">
		  <img src="<?php echo e(asset('front_assets/assets/images/icon21.png')); ?>">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>
	    </div>
	  </div>
	  <div class="looking">
	    <div class="border_box">
	      <h3>Looking For</h3>
	      <div class="selling">
		<h4>Selling/Investment</h4>
		<span class="line">$45,000,00</span>
		<span>45%</span>
	      </div>
	      <a href="#" class="interest">I am Interested</a>
	      <a href=#" class="download">Download sales report</a>
	      
	      <div class="want_to">
		<div class="want_to_inner">
		  <img src="<?php echo e(asset('front_assets/assets/images/icon21.png')); ?>">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>

	    </div>
	    
	    <div class="border_box">
	      <div class="company_name">
		<div class="company_img"></div>
		<span>Company name</span>
		<span>082-47-x2s <br> 2013<br> Art, Games, Food</span>
		<a href="#">www.website.com</a>
	      </div>

      	      <div class="want_to">
		<div class="want_to_inner">
		  <img src="<?php echo e(asset('front_assets/assets/images/icon21.png')); ?>">
		  <span class="blue">Want to find out more about this company?</span>
		  <span>Sign Up as a investor now</span>
		  <a href="javascript:void(0);" class="sign_up1 investors1">Sign Up</a>
		</div>
	      </div>

	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>
<script>
$(document).ready(function(){			
    $(".fancybox2").fancybox();
});
   $(document).on('click', function (e) {
	if ($(e.target).attr('class')!= 'sign_up1 investors1' && $(e.target).attr('id')!='scrollbar1' && $(e.target).parents('#scrollbar1').length == 0 ) {
	   $("#scrollbar1").hide();$(".invester_signin").hide();
	}
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>