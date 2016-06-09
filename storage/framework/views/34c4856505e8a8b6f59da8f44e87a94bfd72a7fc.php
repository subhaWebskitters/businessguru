<?php $__env->startSection('title', 'Currency Edit'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Currency</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Jobs</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Update</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Update Currency</div>
                                <div class="actions"></div>
                            </div>
                            <div class="portlet-body">
                            <?php if(Session::has('sucMsg')): ?>
                                          <div class="alert alert-success"><p><?php echo e(Session::get('sucMsg')); ?></p></div>
                            <?php endif; ?>
                            <?php if(Session::has('errMsg')): ?>
                                          <div class="alert alert-danger"><p><?php echo e(Session::get('errMsg')); ?></p></div>
                            <?php endif; ?>
                            
                            <?php if(count($errors) > 0): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php foreach($errors->all() as $error): ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                            <?php endif; ?>
                        
<?php echo Form::open(array('route'=>'currency_update_action','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')); ?>

<?php echo Form::hidden('currency_id',$currency_details->id); ?>

                                    <div class="form-body">
                                    
                                              
                                    
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                <?php echo Form::text('country_name',$currency_details->country_name,array('class'=>"form-control required", 'placeholder'=>"Job Title", 'id'=>"inputName")); ?>

                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-body">
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                <?php echo Form::text('country_code',$currency_details->country_code,array('class'=>"form-control required", 'placeholder'=>"Job Title", 'id'=>"inputName")); ?>

                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-body">
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                <?php echo Form::text('currency_code',$currency_details->currency_code,array('class'=>"form-control required", 'placeholder'=>"Job Title", 'id'=>"inputName")); ?>

                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-body">
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                <?php echo Form::text('currency_name',$currency_details->currency_name,array('class'=>"form-control required", 'placeholder'=>"Job Title", 'id'=>"inputName")); ?>

                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-body">
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                <?php echo Form::text('country_currency_symbol',$currency_details->country_currency_symbol,array('class'=>"form-control required", 'placeholder'=>"Job Title", 'id'=>"inputName")); ?>

                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-body">            
                                     
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                <?php echo Form::select('country_currency_status', ['active'=>'Active', 'inactive'=>'Inactive'], $currency_details->country_currency_status, ['class' => 'form-control required', 'placeholder' => 'Select status']); ?>

                                            </div>
                                    </div>
                                    
    
                                    </div>
                                    <div class="form-actions text-right pal">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                       <?php echo Html::linkRoute('currency', 'Back', array(), array('class' => 'btn btn-default')); ?>

                                    </div>
                          <?php echo Form::close(); ?>

                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
                       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>