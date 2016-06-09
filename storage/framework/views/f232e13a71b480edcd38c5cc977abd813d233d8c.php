      
<?php $__env->startSection('content'); ?>  
		<div class="page-content">
				<div class="row">
						<div class="col-lg-12">
								<div class="portlet box portlet-orange">
										<div class="portlet-header">
												<div class="caption">Add Banner Image for Discover</div>
												<div class="actions"></div>
										</div>
										<div class="portlet-body industryview">
												
												<?php if(count($errors) > 0): ?>
														<div class="alert alert-danger">
																<ul>
																		<?php foreach($errors->all() as $error): ?>
																				<li><?php echo e($error); ?></li>
																		<?php endforeach; ?>
																</ul>
														</div>
												<?php endif; ?>
        
												<?php if(Session::has('errmsg')): ?>
												    <div class="alert alert-danger"><?php echo e(Session::get('errmsg')); ?></div>
												<?php endif; ?>
												
												<?php echo Form::open(array('route'=>'addbanner','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')); ?>

														<?php echo e(Form::hidden('action', 'Process', array('id' => 'secret_id'))); ?>

														
														<div class="form-body pal">
																<div class="form-group">
																		<label for="sitesettings_lebel" class="col-md-3 control-label">Banner Title</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						
																						<?php echo Form::text('banner_title','',array('class'=>"form-control required", 'placeholder'=>"Banner Title", 'id'=>"banner_title")); ?>

																				</div>
																		</div>
																</div>
														</div>
														<div class="form-body pal">
																<div class="form-group">
																		<label for="sitesettings_lebel" class="col-md-3 control-label">First Text</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						
																						<?php echo Form::text('question','',array('class'=>"form-control required", 'placeholder'=>"First Text", 'id'=>"question")); ?>

																				</div>
																		</div>
																</div>
														</div>
														<div class="form-body pal">
																<div class="form-group">
																		<label for="sitesettings_lebel" class="col-md-3 control-label">Second Text</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						<?php echo Form::text('answer','',array('class'=>"form-control required", 'placeholder'=>"Second Text", 'id'=>"answer")); ?>

																				</div>
																		</div>
																</div>
														</div>
														<div class="form-body pal">
																<!--<div class="form-group">
																		<div class="input-icon right">
																				<i class="fa fa-user"></i>
																				<?php echo Form::select('order',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'),'',array('class'=>'form-control parsley-validated required', 'id'=>'order','placeholder'=>'Select Order...')); ?>

																		</div>
																</div>-->
																<div class="form-group">
																		<label for="sitesettings_lebel" class="col-md-3 control-label">Upload Banner Image</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						<label>Banner Image</label>&nbsp;&nbsp;<strong>[Image width not greater than 2500 & height not greater than 1500]</strong>
																						<?php echo Form::file('bannerimage','',array('class'=>"form-control", 'placeholder'=>"Upload Image", 'id'=>"bannerimage")); ?>

																				</div>
																		</div>
																</div>
														</div>
														<div class="form-actions text-right pal">
																<button class="btn btn-primary" type="submit">Submit</button>
																<?php echo Html::linkRoute('homepagebannerlist', 'Back', array(), array('class' => 'btn btn-default')); ?>

														</div>
												<?php echo Form::close(); ?>

										</div>
								</div>
						</div>
				</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>