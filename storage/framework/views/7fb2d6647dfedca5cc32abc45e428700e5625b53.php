<?php $__env->startSection('title', 'Profile Update'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Profile</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Update </a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
		    <div class="panel panel-yellow">
                            <div class="panel-heading">CMS Update</div>
                            <div class="panel-body pan">                                    
                                    <?php echo Form::open(array('route'=>array('update_profile'),'class'=>'form-horizontal form-validate','files'=>true)); ?>

                                    <div class="form-body pal">
                                                <?php if(count($errors) > 0): ?>
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    <?php foreach($errors->all() as $error): ?>
                                                                        <li><?php echo e($error); ?></li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            </div>
                                                <?php endif; ?>
						<?php if(Session::has('succmsg')): ?>
							    <div class="note note-success"><p><?php echo e(Session::get('succmsg')); ?></p></div>
						
						<?php endif; ?>
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Name</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            <?php echo Form::text('name',$lists->name,array('class'=>'form-control required','placeholder'=>'Enter Name','id'=>'name' )); ?>

                                                </div>
                                            </div>
                                        </div>
				         <div class="form-group"><label class="col-md-3 control-label" for="Email">Email</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            <?php echo Form::text('email',$lists->email,array('class'=>'form-control required','placeholder'=>'Enter Email','id'=>'email','readonly'=>'readonly' )); ?>

                                                </div>
                                            </div>
                                        </div>
					<div class="form-group"><label class="col-md-3 control-label" for="Password">Password</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            <?php echo Form::text('password',null,array('class'=>'form-control','placeholder'=>'Enter Password','id'=>'password' )); ?>

                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="image">Image</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            <?php echo Form::file('image',array('class'=>'form-control','id'=>'image' )); ?>

							    <br>
							    <?php echo e(Html::image(asset('upload/adminUser/'.$lists->image),$lists->image,array('height'=>'100','width'=>'100'))); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <div class="col-md-offset-3 col-md-6">
                                            <?php echo Form::submit('Submit',array('class'=>'btn btn-primary' )); ?>&nbsp;&nbsp;
                                            <?php echo Html::linkRoute('admin_cms', 'Back', array(), array('class' => 'btn btn-default')); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php echo Form::close(); ?>

                            </div>
                        </div>
                     
                         </div>
                </div>
            </div>
		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>