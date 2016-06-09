<?php $__env->startSection('title', 'Investor Details'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Investor Details</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-book"></i>&nbsp;
                    <a href="javascript:void(0);">Investor</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-info"></i>&nbsp;
                    <a href="javascript:void(0);">Investor Details </a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
		    <div class="panel panel-yellow">
                            <div class="panel-heading">Basic</div>
                            <div class="panel-body pan industryview">
                            
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Investor Type</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php echo Form::text('investor_type', $details->investor_type, array('class'=>'form-control','readonly')); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Name</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php echo Form::text('name', $details->name, array('class'=>'form-control','readonly' )); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Email</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php echo Form::email('email', $details->email, array('class'=>'form-control','readonly' )); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Company Name</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php echo Form::text('company_name', $details->company_name, array('class'=>'form-control','readonly' )); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
				    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">ACTA No</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php echo Form::text('arca_no', $details->arca_no, array('class'=>'form-control','readonly' )); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Address</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php echo Form::textarea('address', $details->address, array('class'=>'form-control','readonly' )); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Photo/Logo</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php if(file_exists(public_path().'/upload/Investor/thumb/'.$details->image) && $details->image != ''): ?>
							    <?php echo Html::image(asset('upload/Investor/thumb/'.$details->image),'image/logo',array('class'=>'img-responsive img-circle','title'=>'image/logo','width'=>'140')); ?>

						<?php else: ?>
							    <?php echo Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100')); ?>

						<?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
				    
                             </div>
                        </div>
                     
			<div class="panel panel-blue">
                            <div class="panel-heading">PORTFOLIO</div>
                            <div class="panel-body pan industryview">                                    
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">About the company</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php echo Form::textarea('about_company', $details->about_company, array('class'=>'form-control','readonly' )); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
				    
				    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Company's Bio/Portfolio</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php /**/
                                            $ext = pathinfo($details->portfolio, PATHINFO_EXTENSION);
                                            if($ext == 'pdf')
                                            {
                                            $img_name = 'pdf_icon.png';
                                            }
                                            else if($ext == 'doc' || $ext == 'docx')
                                            {
                                            $img_name = 'word_icon.png';
                                            }
                                            else if($ext == 'xls' || $ext == 'xlsx')
                                            {
                                            $img_name = 'doc_icon.png';
                                            }
                                            /**/ ?>
                                                <?php if(file_exists(public_path().'/upload/Investor/'.$details->portfolio) && $details->portfolio != ''): ?> 
							    <a href="<?php echo e(URL::route('download_portfolio_file',$details->portfolio)); ?>">
								 <?php echo Html::image(asset('icon/'.Helpers::get_extension_icon($details->portfolio)),'Download',array('title'=>'Download '.Helpers::get_extension($details->portfolio) )); ?></a>
                                               
						<?php else: ?>
							    No file uploaded for portfolio
						<?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
				    
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Interested Industries

                                        </label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
<?php echo Form::select('industry_status[]', $industries_master, $selected_category, array('class' => 'form-control required ddown ddHeight','id'=> 'industries','multiple'=>'multiple', 'disabled' => 'disabled')); ?>

                                                <br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    
				    		
				    
			    </div>
			</div>
			
			
			<div class="panel panel-green">
                            <div class="panel-heading">FUNDS</div>
                            <div class="panel-body pan industryview">                                    
                                    <div class="form-body pal">
                                        
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Annual Salary</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php echo Form::text('annual_salary', $details->annual_salary, array('class'=>'form-control','readonly' )); ?>

                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
						
				    <div class="form-body pal">
                                       
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Willing to invest</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                <?php echo Form::text('willing_to_invest', $details->willing_to_invest, array('class'=>'form-control','readonly' )); ?>

                                                </div>
                                            </div>
                                        </div>
                                   
                                    </div>
				</div>
			</div>
				    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <div class="col-md-offset-3 col-md-6">
                                            <?php echo Html::linkRoute('admin_investors', 'Back', array(), array('class' => 'btn btn-default')); ?>

                                            </div>
                                        </div>
                                    </div>
                        </div>
                </div>
            </div>
		
<?php $__env->stopSection(); ?>
<style>
    .ddHeight{height:200px !important;}        
</style>
<?php echo $__env->make('admin/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>