<?php $__env->startSection('content'); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-users"></span>Edit Sitesettings</span>        
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>
		<li><a href="<?php echo e(URL::route('sitesettings')); ?>">Sitesettings</a></li>  
                <li class="current"><a href="#" title="">Edit</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
        <div class="fluid">
            <!-- Wizard with custom fields validation -->
            <div class="widget">
	     <?php if(count($errors) > 0): ?> 
                   <div align="center">
			<div class="nNote nFailure" style="width: 600px;">
                            <?php foreach($errors->all() as $error): ?>
                                    <p><?php echo e($error); ?><p>
                            <?php endforeach; ?>
                    </div>
		</div>
		    <?php endif; ?>
		<?php if(Session::has('errorMessage')): ?>
	  <div align="center">
			<div class="nNote nFailure" style="width: 600px;">
				<p><?php echo e(Session::get('errorMessage')); ?></p>
			</div>
		</div>
		
	        <?php endif; ?>
	       <?php if(Session::has('successMessage')): ?>
		 <div align="center">
			<div class="nNote nSuccess" style="width: 600px;">
				<?php echo e(Session::get('successMessage')); ?>

			</div>
		</div>
		
		<?php endif; ?>
		
                
		
		
                <div class="whead"><h6>Edit sitesettings</h6></div>
                 <?php echo Form::open(['route'=>'update_sitesettings','class' => 'form form-validate formRow','enctype'=>'multipart/form-data']); ?>

		
                  <div class="formRow">
                    <div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label class="req">Site Settings Name</label>
			<?php echo Form::text('site_value',$sitesetting_dtls->sitesettings_lebel,array('id'=>'site_value','placeholder'=>'Site Settings Value','class'=>'form-control parsley-validated','readonly')); ?>

			<?php echo Form::hidden('id', $sitesetting_dtls->id, array('id' => 'id')); ?>

                      </div>
			</div>
			<div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label>Site Settings Value</label>
			<?php /**/
									$valDataType = $sitesetting_dtls->sitesettings_type;
								      /**/ ?>
									<?php if($valDataType == 'TEXTAREA' ): ?>
									<?php echo Form::textarea('site_value',$sitesetting_dtls->sitesettings_value,array('id'=>'site_value','placeholder'=>'Site Settings Value','class'=>'form-control parsley-validated required')); ?>

									<?php elseif($valDataType == 'TEXT' ): ?>
										<?php echo Form::text('site_value',$sitesetting_dtls->sitesettings_value,array('id'=>'site_value','placeholder'=>'Site Settings Value','class'=>'form-control parsley-validated required')); ?>

									<?php endif; ?>
									
                      </div>
		      
                    </div>
                  </div>
                  
		  <div class="full-width clearfix btmButton">
		    <!--<a href="#" class="btn btn-default">Submit</a>-->
			<?php echo Form::submit('Update',array('id'=>'update','class'=>'buttonM bBlue')); ?>

			<a href="<?php echo e(URL::route('user')); ?>" class="back_lnk">Back</a>
                    
                    </div>
                <?php echo Form::close(); ?>         
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>