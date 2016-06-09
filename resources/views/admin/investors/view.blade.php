@extends('admin/layout')

@section('title', 'Investor Details')

@section('content')
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
                                                {!! Form::text('investor_type', $details->investor_type, array('class'=>'form-control','readonly'))!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Name</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                {!! Form::text('name', $details->name, array('class'=>'form-control','readonly' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Email</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                {!! Form::email('email', $details->email, array('class'=>'form-control','readonly' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Company Name</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                {!! Form::text('company_name', $details->company_name, array('class'=>'form-control','readonly' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
				    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">ACTA No</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                {!! Form::text('arca_no', $details->arca_no, array('class'=>'form-control','readonly' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Address</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                {!! Form::textarea('address', $details->address, array('class'=>'form-control','readonly' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Photo/Logo</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                @if(file_exists(public_path().'/upload/Investor/thumb/'.$details->image) && $details->image != '')
							    {!! Html::image(asset('upload/Investor/thumb/'.$details->image),'image/logo',array('class'=>'img-responsive img-circle','title'=>'image/logo','width'=>'140'))!!}
						@else
							    {!! Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100'))!!}
						@endif
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
                                                {!! Form::textarea('about_company', $details->about_company, array('class'=>'form-control','readonly' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
				    
				    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Company's Bio/Portfolio</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                {{--*/
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
                                            /*--}}
                                                @if(file_exists(public_path().'/upload/Investor/'.$details->portfolio) && $details->portfolio != '') 
							    <a href="{{URL::route('download_portfolio_file',$details->portfolio)}}">
								 {!! Html::image(asset('icon/'.Helpers::get_extension_icon($details->portfolio)),'Download',array('title'=>'Download '.Helpers::get_extension($details->portfolio) ))!!}</a>
                                               
						@else
							    No file uploaded for portfolio
						@endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
				    
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Interested Industries

                                        </label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
{!! Form::select('industry_status[]', $industries_master, $selected_category, array('class' => 'form-control required ddown ddHeight','id'=> 'industries','multiple'=>'multiple', 'disabled' => 'disabled')) !!}
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
                                                {!! Form::text('annual_salary', $details->annual_salary, array('class'=>'form-control','readonly' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
						
				    <div class="form-body pal">
                                       
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Willing to invest</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                {!! Form::text('willing_to_invest', $details->willing_to_invest, array('class'=>'form-control','readonly' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                   
                                    </div>
				</div>
			</div>
				    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <div class="col-md-offset-3 col-md-6">
                                            {!! Html::linkRoute('admin_investors', 'Back', array(), array('class' => 'btn btn-default')) !!}
                                            </div>
                                        </div>
                                    </div>
                        </div>
                </div>
            </div>
		
@endsection
<style>
    .ddHeight{height:200px !important;}        
</style>