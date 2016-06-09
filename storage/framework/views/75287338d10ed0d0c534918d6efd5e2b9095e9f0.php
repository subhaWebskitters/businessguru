<?php $__env->startSection('content'); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-reply-to-all"></span>Add Discussion</span>        
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li> 
                <li class="current"><a href="#" title="">Discussion Add</a></li>
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
		<?php if(count($errors) > 0): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php foreach($errors->all() as $error): ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                <?php endif; ?>
                
		
		
                <div class="whead"><h6>Add Discussion</h6></div>
		  <?php if(isset($job_list) && count($job_list) > 1 && is_array($job_list)): ?>
                 <?php echo Form::open(['route'=>'add_discussion','class' => 'form form-validate formRow']); ?>

		
                  <div class="formRow">
		  <div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label class="req">Job Select</label>
			<?php echo Form::select('job_id',$job_list,'',array('class' => 'form-control parsley-validated required')); ?>

                      </div>
                      
                    </div>
		 
                    <div class="full-width two-frm clearfix">
                     
			<div class="form_sep">
                        <label class="req">Description</label>
			<?php echo Form::textarea('desc','',array('placeholder'=>'Description','class'=>'form-control parsley-validated required ckeditor')); ?> 
                      </div>
                      
                    </div>
                  </div>
                  <div class="full-width clearfix btmButton">
			<?php echo Form::submit('Add',array('id'=>'add','class'=>'buttonM bBlue')); ?>

                    
                    </div>
                <?php echo Form::close(); ?>

	      <?php else: ?>
		<div class="formRow">
		  <div class="full-width two-frm clearfix">
		  No Job Added yet
		  </div>
		</div>
	      <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>