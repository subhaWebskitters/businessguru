@extends('admin/layout')

@section('title', 'Users list')

@section('content')
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
                    <a href="javascript:void(0)">Create</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">New Company</div>
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
{!! Form::open(array('route'=>'admin_company_create_action','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')) !!}
                                    <div class="form-body pal">
                                    
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::select('referral_id',$agent,'',array('class'=>'form-control parsley-validated',
                                                'id'=>'referral_id','placeholder'=>'Select Type...')) !!}
                                            </div>
                                        </div>
        
                                    
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('name','',array('class'=>"form-control required", 'placeholder'=>"Company name", 'id'=>"inputName")) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-envelope"></i>
                                                {!! Form::text('email','',array('class'=>"form-control required", 'placeholder'=>"Email", 'id'=>"userEmail")) !!}
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-lock"></i>
                                                 {!! Form::text('phone_no','',array('class'=>"form-control", 'placeholder'=>"Phone No", 'id'=>"userPhone")) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-lock"></i>
                                                 {!! Form::password('password',array('class'=>"form-control required", 'placeholder'=>"Password", 'id'=>"userPassword")) !!}
                                            </div>
                                        </div>
                                     
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::text('address','',array('class'=>"form-control", 'placeholder'=>"Address", 'id'=>"userAddress")) !!}
                                            </div>
                                        </div>
                                                
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('state_id',$states,'',array('class'=>"form-control required", 'id'=>"userStates")) !!}
                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('city_id',array(),'',array('class'=>"form-control required", 'id'=>"userCities")) !!}
                                                {!! Form::hidden('changeCityId','',array('id'=>'changeCityId'))!!}
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-facebook"></i>
                                                {!! Form::text('facebook_link','',array('class'=>"form-control", 'placeholder'=>"Facebook Link", 'id'=>"userFacebook")) !!}
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-twitter"></i>
                                                {!! Form::text('twitter_link','',array('class'=>"form-control", 'placeholder'=>"Twitter Link", 'id'=>"usertwitter_link")) !!}
                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-linkedin"></i>
                                                {!! Form::text('linked_in_link','',array('class'=>"form-control", 'placeholder'=>"Linked In Link", 'id'=>"userlinked_in_link")) !!}
                                            </div>
                                        </div>
                                    <!--<div class="form-group">
                                            <div class="input-icon right">
                                           <div class="col-lg-12">Position of interest</div>
                                            @if(count($skills)>0)
                                                        @foreach($skills as $s)
                                                             <div class="col-lg-6">
                                                                      <input type="checkbox" name="skills[]" value="{{ $s->id }}"  />
                                                                      {{ $s->name }}
                                                            </div>
                                                        @endforeach
                                            @endif
                                            </div>
                                                <div style="clear:both"></div>
                                        </div>-->
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-picture-o"></i>
                                                {!! Form::file('logo','',array('class'=>"form-control", 'placeholder'=>"Logo", 'id'=>"userlogo")) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-right pal">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                       {!! Html::linkRoute('admin_company', 'Back', array(), array('class' => 'btn btn-default')) !!}
                                    </div>
                          {!! Form::close() !!}
                                
                            </div>
                        </div>
                     
                         </div>
                </div>
            </div>
@endsection