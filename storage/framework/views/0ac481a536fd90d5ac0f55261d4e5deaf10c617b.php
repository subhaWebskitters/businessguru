<?php $__env->startSection('title', 'Sitesettings Update'); ?>
<?php $__env->startSection('content'); ?>
		<div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
				<div class="page-header pull-left">
						<div class="page-title">Sitesettings</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
						<li>
								<i class="fa fa-cogs"></i>&nbsp;
								<a href="<?php echo e(URL::route('admin_sitesettings')); ?>">Sitesettings</a>&nbsp;&nbsp;
								<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
						</li>
						<li>
								<i class="fa fa-home"></i>&nbsp;
								<a href="javascript:void(0);">Edit </a>&nbsp;&nbsp;
						</li>
				</ol>
				<div class="clearfix"></div>
		</div>
		<div class="page-content">
				<div class="row">
						<div class="col-lg-12">
								<div class="panel panel-yellow">
										<div class="panel-heading">Sitesettings Update</div>
										<div class="panel-body pan industryview">                                    
												<?php echo Form::open(array('route'=>array('admin_sitesettings_update_action',$lists->id),'class'=>'form-horizontal form-actions form-validate')); ?>

														<?php echo Form::hidden('value_type',$lists->sitesettings_type); ?>

														<div class="form-body">
																<div class="form-group">
																		<?php if(count($errors) > 0): ?>
																				<div class="alert alert-danger">
																						<ul>
																								<?php foreach($errors->all() as $error): ?>
																										<li><?php echo e($error); ?></li>
																								<?php endforeach; ?>
																						</ul>
																				</div>
																		<?php endif; ?>
																</div>
														</div>
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="sitesettings_lebel">Setting Label</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						<?php echo Form::text('sitesettings_lebel',$lists->sitesettings_lebel,array('class'=>'form-control required','id'=>'sitesettings_lebel','disabled'=>'disabled' )); ?>

																				</div>
																		</div>
																</div>
														</div>
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="sitesettings_value">Setting Value</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						<?php /**/ $sitesettings_type = $lists->sitesettings_type /**/ ?>
																						<?php if($sitesettings_type =='TEXTAREA'): ?>
																								<?php echo Form::textarea( 'sitesettings_value',$lists->sitesettings_value,array('class'=>'form-control required','id'=>'sitesettings_value' )); ?>

																						<?php else: ?>
																								<?php echo Form::text('sitesettings_value',$lists->sitesettings_value,array('class'=>'form-control required','id'=>'sitesettings_value' )); ?>

																						<?php endif; ?>
																				</div>
																		</div>
																</div>
														</div>
														<div class="form-body pal">
																<div class="form-group mbn">
																		<div class="col-md-offset-3 col-md-6">
																				<?php echo Form::submit('Submit',array('class'=>'btn btn-primary' )); ?>&nbsp;&nbsp;
																				<?php echo Html::linkRoute('admin_sitesettings', 'Back', array(), array('class' => 'btn btn-default')); ?>

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