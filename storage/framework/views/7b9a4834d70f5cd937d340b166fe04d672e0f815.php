<?php $__env->startSection('content'); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-book_alt"></span>Add Task</span>        
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
                  <?php echo Form::open(['route'=>'insert_task','class' => 'form form-validate formRow']); ?>

		
                  <div class="formRow">
                    <div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label>Project Name</label>
			<?php echo Form::text('project_name',$project_details->project_name,array('readonly','id'=>'project_name','placeholder'=>'Name','class'=>'form-control parsley-validated required')); ?>

			<?php echo Form::hidden('id', $project_details->id, array('id' => 'id')); ?>

                      </div>
		      <div class="form_sep">
                        <label class="req">Task Heading</label>
			<?php echo Form::text('heading','',array('id'=>'heading','placeholder'=>'Task Heading','class'=>'form-control parsley-validated required')); ?>

                      </div>
                    </div>
               
		    <div class="full-width two-frm clearfix">
		      <div class="form_sep">
			<label class="req">Deadline Date</label>
			<?php echo Form::text('deadline','',array('id'=>'datepicker','class'=>'form-control parsley-validated required','autocomplete'=>'off')); ?>

		      </div>
		    </div>    
		 
		    <div class="full-width two-frm clearfix">
		    <div class="form_sep">
		      <label class="req">Description</label>
		      <?php echo Form::textarea('note','',array('placeholder'=>'Description','class'=>'form-control parsley-validated required ckeditor')); ?> 
		    </div>
		    
		    <div class="form_sep">
		      <label>Assign Member</label>
		      <?php if(COUNT($project_details->assignList)>0): ?>
			<?php foreach($project_details->assignList as $v): ?>
			  <div class="asignMem"><?php echo Form::checkbox('assigned_user[]',$v->admin_id,'',array('class'=>'form-control roleCheck')); ?> <?php echo e($v->userDetails->name); ?> (<?php echo e($v->userDetails->getRole->getRoleDetails->display_name); ?>)</div>
			<?php endforeach; ?>
		      <?php endif; ?>
		    </div>
		    </div>
		  </div>
		     <div class="full-width clearfix btmButton">
		    <!--<a href="#" class="btn btn-default">Submit</a>-->
			<?php echo Form::submit('Add task',array('id'=>'add_task','class'=>'buttonM bBlue')); ?>

			<a href="<?php echo e(URL::route('project')); ?>" class="back_lnk">Back</a>
                    
                    </div>
                <?php echo Form::close(); ?>             
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>