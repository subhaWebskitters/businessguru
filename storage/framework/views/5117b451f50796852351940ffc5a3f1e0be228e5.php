<?php $__env->startSection('content'); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-users"></span>Edit Adminuser</span>        
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?php echo e(URL::route('dashboard')); ?>">Dashboard</a></li>
		<li><a href="<?php echo e(URL::route('user')); ?>">Adminuser</a></li>  
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
		
                
		
		
                <div class="whead"><h6>Edit Adminuser</h6></div>
                 <?php echo Form::open(['route'=>'update_user','class' => 'form form-validate formRow','enctype'=>'multipart/form-data']); ?>

		
                  <div class="formRow">
                    <div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label class="req">Name</label>
			<?php echo Form::text('name',$adminuser_details->name,array('id'=>'name','placeholder'=>'Name','class'=>'form-control parsley-validated required')); ?>

			<?php echo Form::hidden('id', $adminuser_details->id, array('id' => 'id')); ?>

			<?php echo Form::hidden('previous_image', $adminuser_details->image, array('id' => 'previous_image')); ?>

                      </div>
                      <div class="form_sep">
                        <label>Email</label>
			<?php echo Form::text('email',$adminuser_details->email,array('readonly','id'=>'email','placeholder'=>'Email','class'=>'form-control parsley-validated required')); ?>

                      </div>
		      <div class="form_sep">
                        <label>Password(Please keep blank if you dont want to change)</label>
			<?php echo Form::password('password',array('id'=>'password','placeholder'=>'password','class'=>'form-control')); ?>

                      </div>
		       <div class="form_sep">
                        <label>Retype Password</label>
			<?php echo Form::password('password_confirmation',array('id'=>'password_confirmation','placeholder'=>'retype password','class'=>'form-control')); ?>

                      </div>
		      <div class="form_sep">
                        <label>Role</label>
			<select class="selectBox templateExc form-control" name="role">
			  <option value="">Select any Role</option>
			   <?php if(count($role_list)>0): ?>
			     <?php foreach($role_list as $index=>$t): ?>
			       <option value="<?php echo e($t->id); ?>" <?php if(($t->id) == $adminuser_details->getRole->role_id): ?>selected <?php endif; ?>><?php echo e($t->display_name); ?></option>
			     <?php endforeach; ?>
			   <?php endif; ?>
			 </select>
                      </div>
		      <br>
		      <div class="form-group">
			  <div class="input-icon right"><i class="fa fa-picture-o"></i>
			      <?php if($adminuser_details->image!= '' && file_exists(public_path().'/upload/adminuser/'.$adminuser_details->image) ): ?>
				<?php echo Html::image(asset('upload/adminuser/'.$adminuser_details->image),'',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			      <?php else: ?>
				<?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

			      <?php endif; ?>
			      <?php echo Form::file('image','',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"userlogo")); ?>

			  </div>
		      </div>
		      <div class="form_sep">
                        <label>Status</label>
			<?php echo Form::select('status', array('Active'=>'Active','Inactive'=>'Inactive'), $adminuser_details->status,array('class' => 'form-control')); ?>

                      </div>
			
                    </div>
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