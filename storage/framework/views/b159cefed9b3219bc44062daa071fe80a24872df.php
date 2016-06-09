<?php $__env->startSection('title', 'Users list'); ?>

<?php $__env->startSection('content'); ?>
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">Dashboard</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="javascript:void(0);">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="hidden"><a href="javascript:void(0);">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
    </div>
            
            
            
    <div class="page-content">
            <div id="sum_box" class="row mbl">
                        <div class="col-sm-6 col-md-4">
                                    <a href="<?php echo e(URL::route('admin_investors')); ?>">
                                        <div class="panel income db mbm">
                                            <div class="panel-body"><p class="icon"><i class="icon fa fa-group" style="color : #D9534F"></i></p><h4 class="value"><span><b><?php echo e($investors); ?></b></span></h4>
            
                                                <p class="description">Number of active investors</p>
            
                                            </div>
                                        </div>
                                    </a>
                        </div>
                                    
                        <div class="col-sm-6 col-md-4">
                                    <a href="<?php echo e(URL::route('admin_business_users')); ?>">
                                        <div class="panel income db mbm">
                                            <div class="panel-body"><p class="icon"><i class="icon fa fa-group"></i></p><h4 class="value"><span><b><?php echo e($business); ?></b></span></h4>
            
                                                <p class="description">Number of active business users</p>
            
                                            </div>
                                        </div>
                                    </a>
                        </div>
                        
            </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>