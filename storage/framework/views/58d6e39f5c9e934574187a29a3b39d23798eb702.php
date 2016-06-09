<?php $__env->startSection('content'); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-book_alt"></span>Edit Project</span>        
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>
		<li><a href="<?php echo e(URL::route('project')); ?>">Project</a></li>  
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
		
                <div class="whead"><h6>Edit Project</h6></div>
                 <?php echo Form::open(['route'=>'update_project','class' => 'form form-validate formRow']); ?>

		
                  <div class="formRow">
                    <div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label class="req">Name</label>
			<?php echo Form::text('project_name',$project_details->project_name,array('id'=>'project_name','placeholder'=>'Name','class'=>'form-control parsley-validated required')); ?>

			<?php echo Form::hidden('id', $project_details->id, array('id' => 'id')); ?>

			<?php echo Form::hidden('del_list','', array('id' => 'del_list')); ?>

			<?php echo Form::hidden('prev_project_status',$project_details->project_status, array('id' => 'prev_project_status')); ?>

                      </div>
                      <div class="form_sep">
                        <label>Project Unique Id</label>
			<?php echo Form::text('project_unique_id',$project_details->project_unique_id,array('readonly','id'=>'project_unique_id','placeholder'=>'Project Unique Id','class'=>'form-control parsley-validated required')); ?>

                      </div>
			<div class="form_sep">
                        <label class="req">Client Name</label>
			<?php echo Form::text('project_unique_id',$project_details->clientDtls->name,array('readonly','placeholder'=>'Project Unique Id','class'=>'form-control parsley-validated')); ?>

                      </div>
		      <div class="form_sep">
                        <label class="req">Project Duration(In Hours)</label>
			<?php echo Form::text('project_duration',$project_details->project_duration,array('id'=>'project_duration','placeholder'=>'Project Unique Id','class'=>'form-control parsley-validated required')); ?>

                      </div>
                     
		      <div class="form_sep">
                        <label class="req">Biding Amount</label>
			<?php echo Form::text('biding_amount',$project_details->bid_submitted,array('placeholder'=>'Biding Amount','class'=>'form-control parsley-validated required')); ?> 
                      </div>
		      <div class="form_sep">
                        <label>Assign Member</label>
			<?php if(COUNT($assign_list)>0): ?>
			  <?php foreach($assign_list as $v): ?>
			    <?php if(Session::get('USER_ACCESS_ID') != $v->id): ?>
			      <div class="asignMem"><?php echo Form::checkbox('role_list[]', $v->id, $v->is_available,array('class'=>'form-control roleCheck')); ?> <?php echo e($v->name); ?> (<?php echo e($v->getRole->getRoleDetails->display_name); ?>)</div>
			    <?php endif; ?>
			  <?php endforeach; ?>
			<?php endif; ?>
                      </div>
		      <div class="form_sep">
                        <label class="req">Status</label>
			<?php echo Form::select('project_status', array('Pending'=>'Pending','Won'=>'Won','Lost'=>'Lost'), $project_details->project_status,array('class' => 'form-control')); ?>

                      </div>
			 <div class="form_sep">
                        <label class="req">Description</label>
			<?php echo Form::textarea('project_description',$project_details->project_description,array('placeholder'=>'Description','class'=>'form-control parsley-validated required')); ?> 
                      </div>
                    </div>
                  </div>
                  <div class="full-width clearfix btmButton">
			<?php echo Form::submit('Update',array('id'=>'update','class'=>'buttonM bBlue')); ?>

			<a href="<?php echo e(URL::route('project')); ?>" class="back_lnk">Back</a>
                    
                    </div>
                <?php echo Form::close(); ?>                 
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>