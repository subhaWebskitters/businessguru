    
<?php $__env->startSection('content'); ?>  
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
<!--                <div class="form-body pal">
                    <?php echo Form::open(array('route'=>'admin','method'=>'get','class'=>'form-validate','novalidate')); ?>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <?php echo Form::text('keyword','',array('class'=>"form-control", 'id'=>"start_date","placeholder"=>"Enter The Keyword")); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa fa-check"></i>
                                    <?php echo Form::select('status_search',[''=>'Select Status', 'Active'=>'Active', 'Inactive'=>'Inactive'], '', array('class'=>"form-control", 'id'=>"status_search")); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <input type="submit" name="submit" value="Search" class="btn btn-danger" />
                            <a href="<?php echo e(URL::route('admin')); ?>" class="btn btn-success" >View All</a>
                        </div>
                    <?php echo Form::close(); ?>   
                </div>
                
                
-->

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
                        <div class="caption">Discover Banner List</div>
                        <div class="actions">
                            <a class="btn btn-sm btn-info" href="<?php echo e(URL::route('addbanner')); ?>">
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
                                       <!-- <th>#</th>-->
                                        <th>Banner Image</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php foreach( $images as $image ): ?>
                                        <tr>
                                            <!--<td><?php echo e($image->order); ?></td>-->
                                            <td><img src="<?php echo e(asset('/upload/homeBanner/thumb/'.$image->bannerimage)); ?>" alt="" /></td>
                                            <td><?php echo e($image->banner_title); ?></td>
                                            <td>
                                                <!--
                                                <?php if($image->status == 'Active'): ?>
                                                    <label onclick="javascript:statusModifier('candidate',this)" data-team='<?php echo e($image->id); ?>' class="btn btn-success" title="Active">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </label>
                                                <?php elseif($image->status == 'Inactive'): ?>
                                                    <label onclick="javascript:statusModifier('candidate',this)" data-team='<?php echo e($image->id); ?>' class="btn btn-primary" title="Inactive">
                                                        <i class="glyphicon glyphicon-remove-sign"></i>
                                                    </label>
                                                <?php endif; ?>
                                                -->                       
                                                <a class="btn btn-info" href="<?php echo e(URL::route('editbanner',$image->id)); ?>" title="Edit" >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                
                                                <a class="btn btn-danger" href="<?php echo e(URL::route('delbanner',$image->id)); ?>" title="Delete" onclick="return confirm('Are you sure! Do you want to delete this image?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                        
                                    <?php endforeach; ?>
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