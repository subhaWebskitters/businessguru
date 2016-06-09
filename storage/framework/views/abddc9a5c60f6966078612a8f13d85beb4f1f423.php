<?php $__env->startSection('title', 'Industry List'); ?>

<?php $__env->startSection('content'); ?>
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Edit</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li>
            <i class="fa fa-cogs"></i>&nbsp;
            <a href="<?php echo e(URL::route('industries_list')); ?>">Industry List</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
                    <div class="panel-heading">Industry Update</div>
                    <div class="panel-body pan industryview">                                    
                        <?php if(count($errors)>0): ?>
                            <?php foreach($errors->all() as $error): ?>
                                <p class="text-red"><?php echo e($error); ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if(Session::has('errMsg')): ?>
                        <p class="text-red"><?php echo e(Session::get('errMsg')); ?></p>
                        <?php endif; ?>
                        <?php echo e(Form::open(array('route'=>array('industry_edit',$id)))); ?>

                            
                            <div class="form-body pal">
                                <div class="form-group">
                                    <label for="sitesettings_lebel" class="col-md-3 control-label">Industry Name</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <?php echo e(Form::text('industry_name',$industry_details['industry_name'],array('class'=>'form-control required'))); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body pal">
                                <div class="form-group">
                                    <label for="sitesettings_value" class="col-md-3 control-label">Status</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                        <?php echo e(Form::select('status',array('Active'=>'Active','Inactive'=>'Inactive'),$industry_details['status'],array('class'=>'form-control'))); ?>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions pal">
                                <div class="form-group mbn">
                                    <div class="col-md-offset-3 col-md-6">
                                    <input type="submit" value="Update" class="btn btn-primary">&nbsp;&nbsp;
                                    <?php echo e(Html::linkRoute('industries_list','Back',array(),array('class' => 'btn btn-default') )); ?>

                                    
                                    </div>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
                     
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>