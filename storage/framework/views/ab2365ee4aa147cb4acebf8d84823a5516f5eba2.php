<?php $__env->startSection('title', 'Sitesetting list'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Sitesetting</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-cogs"></i>&nbsp;
                    <a href="javascript:void(0);">Sitesetting</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
			    <div class="note note-success"><p><?php echo e(Session::get('succmsg')); ?></p></div>
		
	        <?php endif; ?>
                    <div class="col-lg-12">
                     <div class="portlet box portlet-yellow">
                            <div class="portlet-header">
                                <div class="caption">Sitesetting List</div>
                            </div>
                            <div class="portlet-body">
                                    <div id="flip-scroll">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead >
                                        <tr>
						<th>SL No.</th>
						<th>Settings Name</th>
						<th>Settings Value</th>
						<th>Actions</th> 
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php if($lists->count() > 0): ?>
								<?php foreach($lists AS $k=>$r): ?>
								<tr>
									<td><?php echo $k+1; ?></td>
									<td><?php echo $r->sitesettings_lebel; ?></td>
									<td><?php echo Str::limit($r->sitesettings_value,20); ?></td>
									<td>
									<?php if($r->status == 'Active'): ?>
										    <span class="label label-sm label-success"> <?php echo e($r->status); ?></span>
									<?php else: ?>
										    <span class="label label-sm label-danger"> <?php echo e($r->status); ?></span>
									<?php endif; ?>
									</td>
													
									<td>
									<a class="btn btn-info" href="<?php echo e(URL::route('admin_sitesettings_edit',$r->id)); ?>" title="Edit" ><i class="fa fa-edit"></i>
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
						 <?php echo $lists->render(); ?>

						  </div>
                                </div>

                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>