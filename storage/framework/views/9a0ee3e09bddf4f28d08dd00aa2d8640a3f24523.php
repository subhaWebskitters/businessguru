<?php $__env->startSection('content'); ?>
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-book_alt"></span>Add Comment</span>        
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
		
                
		
		
                <div class="whead"><h6>Add Comment</h6></div>
                  <?php echo Form::open(['route'=>'client_add_comment_store','class' => 'form form-validate formRow','enctype'=>'multipart/form-data']); ?>

		
                  <div class="formRow">
                    <div class="full-width two-frm clearfix">
                      <div class="form_sep">
                        <label>Project Name</label>
			<?php echo Form::text('project_name',$project_details->project_name,array('readonly','id'=>'project_name','placeholder'=>'Name','class'=>'form-control parsley-validated required')); ?>

			<?php echo Form::hidden('project_id', $project_details->id, array('id' => 'id')); ?>

                      </div>		     
                    </div>
		    <div class="full-width two-frm clearfix">
			<div>
                        <label class="req">Note</label>
			<?php echo Form::text('note','',array('id'=>'note','placeholder'=>'Note','class'=>'form-control parsley-validated required')); ?>

			</div>
		    </div>
		    <div class="full-width two-frm clearfix">
			<div class="form_sep">
			    <label class="req">Attached File</label>
			    <?php echo Form::file('filename','',array('class'=>"form-control", 'placeholder'=>"File", 'id'=>"filename")); ?>

			</div>
		    </div>
		    </div>
		  </div>
		     <div class="full-width clearfix btmButton">
		    <!--<a href="#" class="btn btn-default">Submit</a>-->
			<?php echo Form::submit('Add Design',array('id'=>'add_task','class'=>'buttonM bBlue')); ?>

			<a href="<?php echo e(URL::route('project')); ?>" class="back_lnk">Back</a>
                    
                    </div>
                <?php echo Form::close(); ?>             
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('clientView.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>