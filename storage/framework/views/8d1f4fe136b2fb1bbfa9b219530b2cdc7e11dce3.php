<?php $__env->startSection('title', 'Business list'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Business List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Business</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
						<?php echo Form::open(array('route'=>'admin_business_users','method'=>'post','class'=>'form-validate','novalidate','id'=>'searchForm')); ?>

								<div class="col-lg-3">
										<div class="form-group">
												<div class="input-icon right">
														<i class="fa fa-group"></i>
														<?php echo Form::text('search',$search,array('class'=>"form-control", 'id'=>"search","placeholder"=>"Search")); ?>

												</div>
										</div>
								</div>
								<!--
								<div class="col-lg-3">
										<div class="form-group">
												<div class="input-icon right">
														<i class="fa fa-calendar"></i>
												</div>
										</div>
								</div>
								<div class="col-lg-3">
										<div class="form-group">
												<div class="input-icon right">
														<i class="fa fa-calendar"></i>
												</div>
										</div>
								</div>
								-->
								<div class="col-lg-3">
										<div class="form-group">
												<div class="input-icon right">
														<i class="fa"></i>
														<?php echo Form::select('status_search',[''=>'Select Status', 'Active'=>'Active', 'Inactive'=>'Inactive'], $status_search, array('class'=>"form-control", 'id'=>"status_search")); ?>

												</div>
										</div>
								</div>
								<div class="col-lg-3">
										<input type="submit" name="submit" value="Search" class="btn btn-danger" />
										<a href="<?php echo e(URL::route('admin_business_users')); ?>" class="btn btn-success" >View All</a>
								</div>
						<?php echo Form::close(); ?>

				</div>
                     
										 
										 
										 
										 <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Business List</div>
                               <div class="actions"></div>
                            </div>
                            <div class="portlet-body">
                                    <div id="flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed cf">
                                        <thead class="cf">
                                        <tr>
					    <th>Email</th>
                                            <th>User Type</th>
					    <th>Business Name</th>
                                            <th>Website</th>
				            <th>Looking For</th>
                                            <th class="numeric">Action</th>                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php if($results->count() > 0): ?>
						      
								<?php foreach($results AS $r): ?>
								<tr>
									<td><?php echo e($r->email); ?></td>
									<td><?php echo e($r->user_type); ?></td>
									<td><?php echo e($r->business_name); ?></td>
									<td><?php echo e($r->website); ?></td>
									<td><?php echo e($r->looking_for); ?></td>
									<td>
									<?php if($r->status=='Active'): ?>
																												<label onclick="javascript:statusModifier('business_user',this)" data-team='<?php echo e($r->id); ?>' class="btn btn-success" title="Active"  >
																														<i class="fa fa-check-square-o"></i>
																												</label>
																										<?php elseif($r->status=='Inactive'): ?>
																												<label onclick="javascript:statusModifier('business_user',this)" data-team='<?php echo e($r->id); ?>' class="btn btn-primary" title="Inactive" >
																														<i class="glyphicon glyphicon-remove-sign"></i>
																												</label>
																										<?php endif; ?>
																										<a class="btn btn-info" href="<?php echo e(URL::route('admin_business_users_details',$r->id)); ?>" title="View" >
										    <i class="fa fa-edit"></i>
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
					  <?php echo $results->appends($search)->render(); ?>

						 
						  </div>
                                </div>

                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>

<script>
	    $('#show_all').click(function(){
	    alert('sss');
			$('#search').val('');    
			$('#searchForm').submit();
	    });
</script>		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>