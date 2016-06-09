    
<?php $__env->startSection('content'); ?>  
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
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
                <?php if(Session::has('succmsg')): ?>
                    <div class="note note-success"><p><?php echo e(Session::get('succmsg')); ?></p></div>
                <?php endif; ?>
                <div class="portlet box portlet-orange">
                    <div class="portlet-header">
                        <div class="caption">Investor Banner List</div>
                        <div class="actions">
                            <a class="btn btn-sm btn-info" href="<?php echo e(URL::route('addinvestorbanner')); ?>">
                                <i class="fa fa-edit"></i>&nbsp;Add Banner
                            </a>
                        </div>
                    </div>
                    <div class="panel panel-green">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Banner Image</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(count($lists) > 0): ?>
                                    <?php foreach( $lists as $list ): ?>
                                        <tr>
                                            <td><img src="<?php echo e(asset('/upload/investorBanner/thumb/'.$list->image)); ?>" alt="" /></td>
                                            <td><?php echo e($list->title); ?></td>
                                            <td>
                                                <?php if($list->status == 'Active'): ?>
                                                    <label class="btn btn-success" title="Active">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </label>
                                                <?php elseif($list->status == 'Inactive'): ?>
                                                    <label class="btn btn-primary" title="Inactive">
                                                        <i class="glyphicon glyphicon-remove-sign"></i>
                                                    </label>
                                                <?php endif; ?>
                                                
                                                <a class="btn btn-info" href="<?php echo e(URL::route('editinvestorbanner',$list->id)); ?>" title="Edit" >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                
                                                <a class="btn btn-danger" href="<?php echo e(URL::route('delinvestorbanner',$list->id)); ?>" title="Delete" onclick="return confirm('Are you sure! Do you want to delete this image?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                        
                                    <?php endforeach; ?>
                                <?php else: ?>
                                <tr><td colspan="3">----No record found-----</td></tr>
                                <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>        
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>