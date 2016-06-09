@extends('admin/layout')

@section('title', 'Jobs Create')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Jobs</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Jobs</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Create</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">New Job</div>
                                <div class="actions"></div>
                            </div>
                            <div class="portlet-body">
                            @if(Session::has('errmsg'))
                                          <div class="alert alert-success"><strong>Well done!</strong> {{ Session::get('errmsg') }}</div>
                            @endif
                            @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endif
{!! Form::open(array('route'=>'admin_job_create_action','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')) !!}
                                    <div class="form-body pal">
                                    
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('company_id',$companies,'',array('class'=>"form-control required", 'id'=>"company")) !!}
                                            </div>
                                       </div>        
                                    
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('job_title','',array('class'=>"form-control required", 'placeholder'=>"Job Title", 'id'=>"inputName")) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::textarea('job_description','',array('class'=>"form-control required", 'placeholder'=>"Job Description", 'id'=>"jobDescription")) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="input-icon right">
                                           <div class="col-lg-12">Position of interest</div>
                                                @if(count($skills)>0)
                                                        @foreach($skills as $s)
                                                             <div class="col-lg-6">
                                                                      <input type="checkbox"  name="skills[]" value="{{ $s->id }}" />{{ $s->name }}
                                                            </div>
                                                        @endforeach
                                                @endif
                                        </div>
                                                <div style="clear:both"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::select('educations',$basic_education,'',array('class'=>"form-control required",'id'=>"education")) !!}
                                            </div>
                                        </div>        
                                    
                                                
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('city_id',$cities,'',array('class'=>"form-control required", 'id'=>"userCities")) !!}
                                            </div>
                                       </div>
                                                
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-dollar"></i>
                                                {!! Form::select('salary_range_id',$salaries,'',array('class'=>"form-control", 'id'=>"salaries")) !!}
                                            </div>
                                       </div>
                                        
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::selectRange('exp_min_year', 0, 20, '', ['class' => 'form-control required', 'placeholder' => 'Select your minimum job experince']) !!}
                                            </div>
                                       </div>
                                                
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                
                                                {!! Form::selectRange('exp_max_year', 0, 20, '', ['class' => 'form-control required', 'placeholder' => 'Select your maximum job experince']) !!}
                                            </div>
                                    </div>
                                    
                                    <div class="form-group">
                                                <div class="input-icon right">
                                                            {!! Form::file('image',null,array('class'=>'form-control required','id'=>'image' ))!!}
                                                </div>
                                    </div>
                                                
                                    </div>
                                    <div class="form-actions text-right pal">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                       {!! Html::linkRoute('admin_jobs', 'Back', array(), array('class' => 'btn btn-default')) !!}
                                    </div>
                          {!! Form::close() !!}
                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
@endsection