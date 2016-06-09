<?php $__env->startSection('content'); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-users"></span>Add Adminuser</span>        
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>
		<li><a href="<?php echo e(URL::route('user')); ?>">Adminuser</a></li>  
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
		
                
		
		
                <div class="whead"><h6>Add Adminuser</h6></div>
                 <?php echo Form::open(['route'=>'store_user','class' => 'form form-validate formRow','enctype'=>'multipart/form-data']); ?>

		
                  <div class="formRow">
                    <div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label class="req">Name</label>
			<?php echo Form::text('name','',array('id'=>'name','placeholder'=>'Name','class'=>'form-control parsley-validated required')); ?>

                      </div>
                      <div class="form_sep">
                        <label class="req">Email</label>
			<?php echo Form::text('email','',array('id'=>'email','placeholder'=>'Email','class'=>'form-control parsley-validated required')); ?>

                      </div>
		      <div class="form_sep">
                        <label class="req">Password</label>
			<?php echo Form::password('password',array('id'=>'password','placeholder'=>'password','class'=>'form-control')); ?>

                      </div>
		       <div class="form_sep">
                        <label class="req">Retype Password</label>
			<?php echo Form::password('password_confirmation',array('id'=>'password_confirmation','placeholder'=>'retype password','class'=>'form-control')); ?>

                      </div>
		      <div class="form_sep">
                        <label class="req">Role</label>
			<select class="selectBox templateExc form-control" name="role">
			  <option value="">Select any Role</option>
			   <?php if(count($role_list)>0): ?>
			     <?php foreach($role_list as $index=>$t): ?>
			       <option value="<?php echo e($t->id); ?>"><?php echo e($t->display_name); ?></option>
			     <?php endforeach; ?>
			   <?php endif; ?>
			 </select>
                      </div>
		      <br>
		      <div class="form-group">
			  <div class="input-icon right">Image
			      <?php echo Form::file('image','',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"userlogo")); ?>

			  </div>
		      </div>
		      <div class="form_sep">
                        <label>Status</label>
			<?php echo Form::select('status', array('Active'=>'Active','Inactive'=>'Inactive'), '',array('class' => 'form-control')); ?>

                      </div>
			
                    </div>
                  </div>
                  <div class="full-width clearfix btmButton">
		    <!--<a href="#" class="btn btn-default">Submit</a>-->
			<?php echo Form::submit('Add',array('id'=>'add','class'=>'buttonM bBlue')); ?>

			<a href="<?php echo e(URL::route('user')); ?>"  class="back_lnk">Back</a>
                    
                    </div>
                <?php echo Form::close(); ?>           
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>