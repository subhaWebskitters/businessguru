<?php $__env->startSection('title', 'Users list'); ?>
<?php $__env->startSection('content'); ?>
		<div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
				<div class="page-header pull-left">
						<div class="page-title">Investor</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
						<li>
								<i class="fa fa-home"></i>&nbsp;
								<a href="javascript:void(0);">Investor</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
	    <?php echo Form::open(array('route'=>'admin_investors','method'=>'get','class'=>'form-validate','novalidate')); ?>

							<div class="col-lg-3">
							    <div class="form-group">
								<div class="input-icon right">
									<i class="fa fa-user"></i>
	    <?php echo Form::text('keyword',$keyword,array('class'=>"form-control", 'id'=>"start_date","placeholder"=>"Enter Search Word", 'title'=> 'Search by name, email or company name')); ?>

							        </div>
							    </div>
						         </div>
							    
							<div class="col-lg-3">
								<div class="form-group">
									<div class="input-icon right">
										<i class="fa"></i>
<?php echo Form::select('status_search',[''=>'Select Status', 'Active'=>'Active', 'Inactive'=>'Inactive'], $status_search, array('class'=>"form-control", 'id'=>"status_search", 'title'=> 'Select status')); ?>

									</div>
							        </div>
							</div>
							    
						<div class="col-lg-3">
							    <input type="submit" name="submit" value="Search" class="btn btn-danger" />
							    <a href="<?php echo e(URL::route('admin_investors')); ?>" class="btn btn-success" >View All</a>
						</div>
						<?php echo Form::close(); ?>

						
						</div>
						
								<div class="portlet box portlet-orange">
										<div class="portlet-header">
												<div class="caption">Investor List</div>
												
										</div>
										<div class="portlet-body">
												<div id="flip-scroll">
														<table class="table table-bordered table-striped table-condensed cf">
																<thead class="cf">
																		    <tr>
																				<th>Name</th>
			<th>Email</th>
			<th>Company Name</th>
			<th>Investor Type</th>
			<th class="numeric">Action</th>
	    </tr>
																</thead>
																<tbody>
																		<?php if($lists->count() > 0): ?>
																				<?php foreach($lists AS $r): ?>
																						<tr>
																								<td><?php echo e($r->name); ?></td>
							<td><?php echo e($r->email); ?></td>
							<td><?php echo e($r->company_name); ?></td>
						        <td><?php echo e($r->investor_type); ?></td>
							<td>
							
							
						<?php /*	
						<?php if($r->status=='Active'): ?>
								<a href="#">
								<label onclick="javascript:statusModifier('investor',this)" data-team='<?php echo e($r->id); ?>' class="btn btn-success" title="Active"  >
								<i class="fa fa-check-square-o"></i>
								</label></a>
						<?php else: ?>
								<label onclick="javascript:statusModifier('investor',this)" data-team='<?php echo e($r->id); ?>' class="btn btn-primary" title="Inactive" >
										<i class="glyphicon glyphicon-remove-sign"></i>
								</label>
						<?php endif; ?> */ ?>
							
						<?php if($r->status=='Active'): ?>
								<a  id="status_modify_<?php echo e($r->id); ?>" href="javascript:void(0)" data_id="<?php echo e($r->id); ?>" data_type="investor" class="btn status_modify btn-success" title="Active">
								<i class="fa fa-check-square-o"></i>
								</a>
						<?php else: ?>
								<a id="" href="javascript:void(0)" data_id="<?php echo e($r->id); ?>" data_type="investor" class="btn status_modify btn-primary" title="Inactive">
								  <i class="glyphicon glyphicon-remove-sign"></i>
								</a>
						<?php endif; ?>
																										<a class="btn btn-info" href="<?php echo e(URL::route('admin_investor_view',$r->id)); ?>" title="View" >
																												<i class="fa fa-edit"></i>
																										</a>
									<?php /* ?>																	<a class="btn btn-danger" href="{{ URL::route('admin_investor_delete',$r->id) }}" title="Delete" onclick="return confirm('Are you sure! Do you want to delete with its all relevent data?');">
																												<i class="fa fa-trash-o"></i>
																										</a>
																									    <?php */ ?>
																										
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