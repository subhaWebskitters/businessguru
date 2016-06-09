@extends('admin/layout')

@section('title', 'Users list')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Candidatesss</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="index.html">Candidate</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="index.html">Update</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Update Candidate</div>
                                <div class="actions"></div>
                            </div>
                            <div class="portlet-body">
{!! Form::open(array('route'=>'admin_candidate_update_action','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')) !!}
{!! Form::hidden('id',$details->id) !!}
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
                                                <div class="alert alert-danger">{{Session::get('errmsg') }}</div>
                                    @endif
                                    <div class="form-body pal">
                                    
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::select('referral_id',$agent,$details->referral_id,array('class'=>'form-control parsley-validated',
                                                'id'=>'referral_id','placeholder'=>'Select Type...')) !!}
                                            </div>
                                        </div>
        
                                    
                                    
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('first_name',$details->first_name,array('class'=>"form-control required", 'placeholder'=>"First name")) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('middle_name',$details->middle_name,array('class'=>"form-control ", 'placeholder'=>"Middle name")) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('last_name',$details->last_name,array('class'=>"form-control required", 'placeholder'=>"Last name")) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-envelope"></i>
                                                {!! Form::text('email',$details->email,array('class'=>"form-control required",'readonly', 'placeholder'=>"Email", 'id'=>"userEmail")) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-lock"></i>
                                                 {!! Form::password('password',array('class'=>"form-control", 'placeholder'=>"Leave blank if you don't want to change the password", 'id'=>"userPassword")) !!}
                                            </div>
                                        </div>
                                      
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::text('address',$details->address,array('class'=>"form-control", 'placeholder'=>"Address", 'id'=>"userAddress")) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('country',$countries,$details->country, array('class'=>"form-control required", 'id'=>"countryChange")) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('emirates_id',array(),array(), array('class'=>"form-control", 'id'=>"userStates")) !!}
                                                {!! Form::hidden('state_id',$details->emirates_id,array('id'=>'state_id'))!!}
                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('city_id',array(),array(),array('class'=>"form-control", 'id'=>"userCities")) !!}
                                                {!! Form::hidden('changeCityId',$details->city,array('id'=>'changeCityId'))!!}
                                            </div>
                                        </div>
                                                
                                      <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('experince', $experience, $details->experince, ['class' => 'form-control required']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('currency', $currency, $details->currency_id, ['class' => 'form-control required']) !!}
                                            </div>
                                        </div>         
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::text('current_salary', $details->current_salary,array('class'=>"form-control required", 'placeholder'=>"Type your current salary")) !!}
                                            </div>
                                        </div>
                                                
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::text('current_company', $details->current_company, array('class'=>"form-control required", 'placeholder'=>"Type your current company")) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-facebook"></i>
                                                {!! Form::text('facebook_link', $details->facebook_link, array('class'=>"form-control", 'placeholder'=>"Type facebook link")) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-linkedin"></i>
                                                {!! Form::text('linkedin_link', $details->linkedin_link, array('class'=>"form-control", 'placeholder'=>"Type linkedin link")) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::textarea('description',$details->description, array('class'=>"form-control", 'placeholder'=>"Type your description")) !!}
                                            </div>
                                        </div>
                                    <div class="form-group">
                                                <label class="req">Position of interest<span class="require">*</span></label>
                                                <div class="form-control ">
                                                <div id="targetLocLog">
                                                
                                                @if($skills->count()>0)
                                                @foreach($skills as $sname)
                                                       <div class="removeDiv">{!! $sname->name !!}<span class="remove_target" onclick="removeTarget(this,{{$sname->id}});">X</span>
                                </div>
                                                @endforeach
                                                @endif
                                                </div>
                                                {!! Form::hidden('skills',($details->skills != '')?$details->skills.',':'',array('id'=>'all_skill') ) !!}
                                                {!! Form::text('skill',null,array('placeholder'=>'Enter a skills','id'=>'skills','class'=>'skillBox')) !!}
                                                </div>
                                                 
                                    </div>        
                                           <!--<div class="form-group">
                                            <div class="input-icon right">
                                           <div class="col-lg-12">Position of interest</div>
                                            @if(count($skills)>0)
                                                        @foreach($skills as $s)
                                                             <div class="col-lg-6">
                                                                      <input type="checkbox" @if(in_array($s->id, explode(',',$details->skills))) checked @endif name="skills[]" value="{{ $s->id }}" />{{ $s->name }}
                                                            </div>
                                                        @endforeach
                                            @endif
                                            </div>
                                                <div style="clear:both"></div>
                                        </div>-->     
                                        <!--<div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::text('skills', $details->skills, array('class'=>"form-control required", 'placeholder'=>"Type your skills with comma")) !!}
                                            </div>
                                        </div>-->
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('basic_education',$basic_education, $details->basic_education, array('class'=>"form-control required")) !!}
                                            </div>
                                        </div>
                                                
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::file('resume', '' ,array('class'=>"form-control")) !!}<br>
                                                @if($details->resume_file)
                                                            Previous File :
                                                            @if(File::extension(asset('').'upload/resume/'.$details->resume_file) == 'jpg' || File::extension(asset('').'upload/resume/'.$details->resume_file) == 'jpeg')
                                                           <img src="{{ asset('').'upload/resume/'.$details->resume_file }}" height="200" width="200">
                                                         @else
                                                            <a href="{{ asset('').'upload/resume/'.$details->resume_file }}" target="_blank">                                                               {!! $details->resume_file !!}
                                                            </a>
                                                            @endif
                                                @endif            
                                            </div>
                                        </div>
                                                
                                        
                                                
                                    </div>
                                    <div class="form-actions text-right pal">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                       {!! Html::linkRoute('admin_candidate', 'Back', array(), array('class' => 'btn btn-default')) !!}
                                    </div>
                          {!! Form::close() !!}
                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
@endsection