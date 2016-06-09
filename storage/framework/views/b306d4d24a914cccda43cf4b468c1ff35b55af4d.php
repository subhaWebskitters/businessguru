<?php $__env->startSection('title', 'Users list'); ?>
<?php $__env->startSection('content'); ?>
		<div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
				<div class="page-header pull-left">
						<div class="page-title">Comapny</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
						<li>
								<i class="fa fa-home"></i>&nbsp;
								<a href="javascript:void(0);">Company</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
						</li>
						<li>
								<i class="fa fa-list"></i>&nbsp;
								<a href="javascript:void(0);">List</a>&nbsp;&nbsp;
						</li>
				</ol>
				<div class="clearfix"></div>
		</div>
		<div class="page-content">
				<div class="row">
						<?php if(Session::has('succmsg')): ?>
								<div class="note note-success"><p><strong>Well done!</strong> <?php echo e(Session::get('succmsg')); ?></p></div>
						<?php endif; ?>
						<div class="col-lg-12">
								<div class="form-body pal">
										<?php echo Form::open(array('route'=>'admin_company','method'=>'get','class'=>'form-validate','novalidate')); ?>

												<div class="col-lg-3">
														<div class="form-group">
																<div class="input-icon right">
																		<i class="fa fa-user"></i>
																		<?php echo Form::text('keyword',$keyword,array('class'=>"form-control", 'id'=>"start_date","placeholder"=>"Enter The Keyword")); ?>

																</div>
														</div>
												</div>
												<div class="col-lg-3">
														<div class="form-group">
																<div class="input-icon right">
																		<i class="fa fa-check"></i>
																		<?php echo Form::select('status_search',[''=>'Select Status', 'Active'=>'Active', 'Inactive'=>'Inactive'], $status_search, array('class'=>"form-control", 'id'=>"status_search")); ?>

																</div>
														</div>
												</div>
												<div class="col-lg-3">
														<input type="submit" name="submit" value="Search" class="btn btn-danger" />
														<a href="<?php echo e(URL::route('admin_company')); ?>" class="btn btn-success" >View All</a>
												</div>
										<?php echo Form::close(); ?>

								</div>
						
								<div class="portlet box portlet-orange">
										<div class="portlet-header">
												<div class="caption">Company List</div>
												<div class="actions">
														<a class="btn btn-sm btn-info" href="<?php echo e(URL::route('admin_company_create')); ?>">
																<i class="fa fa-edit"></i>&nbsp;New Company
														</a>
												</div>
										</div>
										<div class="portlet-body">
												<div id="flip-scroll">
														<table class="table table-bordered table-striped table-condensed cf">
																<thead class="cf">
																		<tr>
																				<th>Name</th>
																				<th>Agent Name</th>
																				<th>Email</th>
																				<th class="numeric">Action</th>
																		</tr>
																</thead>
																<tbody>
																		<?php if($lists->count() > 0): ?>
																				<?php foreach($lists AS $r): ?>
																						<tr>
																								<td><?php echo e($r->name); ?></td>
																								<td><?php if($r->agent_company): ?> <?php echo e($r->agent_company->name); ?> <?php else: ?> N/A <?php endif; ?></td>
																								<td><?php echo e($r->email); ?></td>			
																								<td>
																										<?php if($r->status=='Active'): ?>
																												<label onclick="javascript:statusModifier('company',this)" data-team='<?php echo e($r->id); ?>' class="btn btn-success" title="Active"  >
																														<i class="fa fa-check-square-o"></i>
																												</label>
																										<?php elseif($r->status=='Inactive'): ?>
																												<label onclick="javascript:statusModifier('company',this)" data-team='<?php echo e($r->id); ?>' class="btn btn-primary" title="Inactive" >
																														<i class="glyphicon glyphicon-remove-sign"></i>
																												</label>
																										<?php endif; ?>
																										<a class="btn btn-info" href="<?php echo e(URL::route('admin_company_edit',$r->id)); ?>" title="Edit" >
																												<i class="fa fa-edit"></i>
																										</a>
																										<a class="btn btn-danger" href="<?php echo e(URL::route('admin_company_delete',$r->id)); ?>" title="Delete" onclick="return confirm('Are you sure! Do you want to delete with its all relevent data?');">
																												<i class="fa fa-trash-o"></i>
																										</a>
																										<a class="btn btn-success" href="<?php echo e(URL::route('admin_company_jobs',$r->id)); ?>" title="Jobs"  >
																												<i class="fa fa-list"></i>
																										</a>
																								</td>
																						</tr>
																				<?php endforeach; ?>
																		<?php else: ?>
																				<tr><td colspan="7" align="center">.:: Record Not Found ::.</td></tr>
																		<?php endif; ?>	
																</tbody>
														</table>
														<div class="pagination-panel">
																<?php if(count($search)>0): ?>
																		<?php echo $lists->appends($search)->render(); ?>

																<?php else: ?>
																		<?php echo $lists->render(); ?>

																<?php endif; ?>											
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>