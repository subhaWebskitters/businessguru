@extends('admin/layout')

@section('title', 'Users list')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Investors</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0)">Investors</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
                                <div class="caption">View Investors</div>
                                <div class="actions"></div>
                            </div>
                            <div class="portlet-body">
                            @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                        @endif
                            @if(Session::has('errmsg'))
                                          <div class="alert alert-success"><strong>Well done!</strong> {{ Session::get('errmsg') }}</div>
                            @endif
{!! Form::open(array('route'=>'admin_investor_update_action','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')) !!}
{!! Form::hidden('id',$details->id) !!}
                                    <div class="form-body pal">
                                    
                                         <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('name',$details->name,array('class'=>"form-control required", 'placeholder'=>"Investors name", 'id'=>"name", 'title' => 'Investor Name', 'readonly')) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-envelope"></i>
                                                {!! Form::text('email',$details->email,array('class'=>"form-control required",'readonly', 'placeholder'=>"Email", 'id'=>"email" , 'title' => 'Investor Email')) !!}
                                            </div>
                                        </div>
                                                
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('investor_type',$details->investor_type, array('class'=>"form-control required", 'placeholder'=>"Investors Type", 'id'=>"investor_type", 'title' => 'Investor Type', 'readonly')) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-mobile"></i>
                                                {!! Form::text('contact',$details->contact, array('class'=>"form-control required",'readonly', 'placeholder'=>"Contact", 'id'=>"contact" , 'title' => 'Contact')) !!}
                                            </div>
                                        </div>
                                                
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('company_name',$details->company_name, array('class'=>"form-control required", 'placeholder'=>"Company Name", 'id'=>"company_name", 'title' => 'Company Name', 'readonly')) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-lock"></i>
                                                {!! Form::text('arca_no',$details->arca_no, array('class'=>"form-control",'readonly', 'placeholder'=>"ACTA NUmber", 'id'=>"arca_no" , 'title' => 'ACTA Number', 'readonly')) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-envelope"></i>
                                                 {!! Form::textarea('address',$details->address,array('class'=>"form-control", 'placeholder'=>"Address", 'id'=>"address", 'title' => 'Address', 'readonly')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right">
                                               @if(file_exists(public_path().'/upload/Investor/thumb/'.$details->image) && $details->image != '')
							    {!! Html::image(asset('upload/Investor/thumb/'.$details->image),'image/logo',array('class'=>'img-responsive img-circle','title'=>'image/logo','width'=>'140'))!!}
						@else
							    {!! Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100'))!!}
						@endif			
                                            </div>
                                        </div>
                                      
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::textarea('about_company',$details->about_company,array('class'=>"form-control", 'placeholder'=>"About Company", 'id'=>"about_company", 'title' => 'About Company', 'readonly')) !!}
                                            </div>
                                        </div>
                                     <div class="form-group">
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
                                    
                                    <div class="form-group">
                                            <div class="input-icon right">
                                                {!! Form::text('annual_salary',$details->annual_salary, array('class'=>"form-control",'readonly', 'placeholder'=>"Annual Salary", 'id'=>"annual_salary" , 'title' => 'Annual Salary', 'readonly')) !!}
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="input-icon right">
                                                {!! Form::text('willing_to_invest',$details->willing_to_invest, array('class'=>"form-control",'readonly', 'placeholder'=>"Willing to Invest", 'id'=>"willing_to_invest" , 'title' => 'Willing to Invest', 'readonly')) !!}
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="input-icon right">
                                                {!! Form::text('status',$details->status, array('class'=>"form-control",'readonly', 'placeholder'=>"status", 'id'=>"status" , 'title' => 'status', 'readonly')) !!}
                                            </div>
                                    </div>
                                    </div>
                                    </div>
                                    <!--<div class="form-actions text-right pal">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                
                                    </div>-->
                          {!! Form::close() !!}
                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
@endsection