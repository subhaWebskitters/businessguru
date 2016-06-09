<?php $__env->startSection('title', 'Users list'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Comapny</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0)">Company</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0)">Update</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Update Company</div>
                                <div class="actions"></div>
                            </div>
                            <div class="portlet-body">
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
                                          <div class="alert alert-success"><strong>Well done!</strong> <?php echo e(Session::get('errmsg')); ?></div>
                            <?php endif; ?>
<?php echo Form::open(array('route'=>'admin_company_update_action','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')); ?>

<?php echo Form::hidden('id',$details->id); ?>

                                    <div class="form-body pal">
                                    
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                <?php echo Form::select('referral_id',$agent,$details->referral_id,array('class'=>'form-control parsley-validated',
                                                'id'=>'referral_id','placeholder'=>'Select Type...')); ?>

                                            </div>
                                        </div>         
                                    
                                    
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                <?php echo Form::text('name',$details->name,array('class'=>"form-control required", 'placeholder'=>"Company name", 'id'=>"inputName")); ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-envelope"></i>
                                                <?php echo Form::text('email',$details->email,array('class'=>"form-control required",'readonly', 'placeholder'=>"Email", 'id'=>"userEmail")); ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-lock"></i>
                                                 <?php echo Form::text('phone_no',$details->phone_no,array('class'=>"form-control", 'placeholder'=>"Phone No", 'id'=>"userPhone")); ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-lock"></i>
                                                 <?php echo Form::password('password',array('class'=>"form-control", 'placeholder'=>"Password", 'id'=>"userPassword")); ?>

                                            </div>
                                        </div>
                                      
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                <?php echo Form::text('address',$details->address,array('class'=>"form-control required", 'placeholder'=>"Address", 'id'=>"userAddress")); ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                <?php echo Form::select('state_id',$states,$details->state_id,array('class'=>"form-control required", 'id'=>"userStates")); ?>

                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                <?php echo Form::select('city_id',array(),array(),array('class'=>"form-control required", 'id'=>"userCities")); ?>

                                                <?php echo Form::hidden('changeCityId',$details->city_id,array('id'=>'changeCityId')); ?>

                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                <?php echo Form::select('status',$status,$details->status,array('class'=>"form-control", 'id'=>"userStatus")); ?>

                                            </div>
                                        </div>
<div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-facebook"></i>
                                                <?php echo Form::text('facebook_link',$details->facebook_link,array('class'=>"form-control", 'placeholder'=>"Facebook Link", 'id'=>"userFacebook")); ?>

                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-twitter"></i>
                                                <?php echo Form::text('twitter_link',$details->twitter_link,array('class'=>"form-control", 'placeholder'=>"Twitter Link", 'id'=>"usertwitter_link")); ?>

                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-linkedin"></i>
                                                <?php echo Form::text('linked_in_link',$details->linked_in_link,array('class'=>"form-control", 'placeholder'=>"Linked In Link", 'id'=>"userlinked_in_link")); ?>

                                            </div>
                                        </div>
                                    <!--<div class="form-group">
                                            <div class="input-icon right">
                                           <div class="col-lg-12">Position of interest</div>
                                            <?php if(count($skills)>0): ?>
                                                        <?php foreach($skills as $s): ?>
                                                             <div class="col-lg-6">
                                                                      <input type="checkbox" <?php if(in_array($s->id,$exists_skills)): ?> checked <?php endif; ?> name="skills[]" value="<?php echo e($s->id); ?>" /><?php echo e($s->name); ?>

                                                            </div>
                                                        <?php endforeach; ?>
                                            <?php endif; ?>
                                            </div>
                                                <div style="clear:both"></div>
                                        </div>-->
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-picture-o"></i>
                                                <?php if(file_exists(public_path().'/upload/company/'.$details->logo) ): ?>
                                            <?php echo Html::image(asset('upload/company/'.$details->logo),'',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

                                            <?php else: ?>
                                            <?php echo Html::image(asset('admin_assets/images/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle')); ?>

                                            <?php endif; ?>
                                               
                                                <?php echo Form::file('logo','',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"userlogo")); ?>

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-actions text-right pal">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                <?php echo Html::linkRoute('admin_company', 'Back', array(), array('class' => 'btn btn-default')); ?>

                                    </div>
                          <?php echo Form::close(); ?>

                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>