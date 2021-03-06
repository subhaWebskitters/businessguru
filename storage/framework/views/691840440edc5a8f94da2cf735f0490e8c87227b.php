<?php $__env->startSection('content'); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-suitcase"></span>Edit Role</span>        
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>
		<li><a href="<?php echo e(URL::route('role')); ?>">Role</a></li>  
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
		
                
		
		
                <div class="whead"><h6>Edit Role</h6></div>
                <?php echo Form::open(['route'=>'update_role','class' => 'form form-validate formRow']); ?>

		
                  <div class="formRow">
                    <div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label class="req">Name</label>
			<?php echo Form::text('name',$role_details->name,array('id'=>'name','placeholder'=>'Name','class'=>'form-control parsley-validated required')); ?>

			<?php echo Form::hidden('role_id', $role_details->id, array('id' => 'role_id')); ?>

                      </div>
                      <div class="form_sep">
                        <label class="req">Display Name</label>
			<?php echo Form::text('display_name',$role_details->display_name,array('id'=>'display_name','placeholder'=>'Display Name','class'=>'form-control parsley-validated required')); ?>

                      </div>
			</div>
                      <div class="form_sep">
                        <label class="req">Description</label>
			<?php echo Form::textarea('desc',$role_details->description,array('placeholder'=>'Description','class'=>'form-control parsley-validated required')); ?> 
                      </div>
			
                    
                  </div>
                  <div class="full-width clearfix btmButton">
		    <!--<a href="#" class="btn btn-default">Submit</a>-->
			<?php echo Form::submit('Update',array('id'=>'update','class'=>'buttonM bBlue')); ?>

			<a href="<?php echo e(URL::route('role')); ?>" class="back_lnk">Back</a>
                   
                    </div>
                <?php echo Form::close(); ?>         
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>