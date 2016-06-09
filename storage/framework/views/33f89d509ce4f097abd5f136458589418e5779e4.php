<?php $__env->startSection('content'); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-book_alt"></span>Add Discussion</span>        
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
               
                <li class="current"><a href="#" title="">Add</a></li>
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
		
                
		
		
                <div class="whead"><h6>Add Task</h6></div>
                  <?php echo Form::open(['route'=>'store_discussion','class' => 'form form-validate formRow','enctype'=>'multipart/form-data']); ?>

		    <?php echo Form::hidden('project_id', $project_details[0]->id, array('id' => 'id')); ?>

		    <?php echo Form::hidden('job_id', $task_id, array('id' => 'id')); ?>

                  <div class="formRow">
                    <div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label>Project Name</label>
			<?php echo Form::text('project_name',$project_details[0]->project_name.' ('.$project_details[0]->	project_unique_id.')',array('readonly','id'=>'project_name','placeholder'=>'Name','class'=>'form-control parsley-validated required')); ?>

			
                      </div>
                    </div>
	 
		    <?php if($task_id != 0 ): ?>
		    <div class="full-width two-frm clearfix">			
			<div class="form_sep">
                        <label class="req">Job Name</label>
			<?php echo Form::text('heading',$task_details[0]->title.' ('.$task_details[0]->job_no.')',array('readonly','id'=>'job_name','placeholder'=>'Job Name','class'=>'form-control parsley-validated required')); ?>

                      </div>	    
		    </div>
		    <?php endif; ?>
 
		    <div class="full-width two-frm clearfix">
			<div class="form_sep">
			  <label class="req">Text</label>
			  <?php echo Form::textarea('text','',array('placeholder'=>'Text','class'=>'form-control parsley-validated required ckeditor')); ?> 
			</div>
		    </div>
			
		    <div class="full-width two-frm clearfix">
			<div class="form_sep">
			  <label>Attached File</label>
			<?php echo Form::file('attached_file','',array('class'=>"form-control", 'placeholder'=>"Attached File", 'id'=>"attached_file")); ?>

			</div>
		    </div>
		  </div>
		     <div class="full-width clearfix btmButton">
			<?php echo Form::submit('Add',array('id'=>'add_discussion','class'=>'buttonM bBlue')); ?>

			<a href="<?php echo e(URL::route('project_details',$project_id)); ?>" class="back_lnk">Back</a>
                    
                    </div>
                <?php echo Form::close(); ?>             
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>