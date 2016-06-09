@extends('admin/layout')
@section('title', 'Agents list')
@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Agent</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0)">Agent</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
                                <div class="caption">Update Agent</div>
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
                    {!! Form::open(array('route'=>'admin_agent_update_action','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')) !!}
                    {!! Form::hidden('id',$details->id) !!}
                                    <div class="form-body pal">
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('name',$details->name,array('class'=>"form-control required", 'placeholder'=>"Agent name", 'id'=>"inputName")) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-user"></i>
                                                {!! Form::text('agent_code',$details->agent_code,array('class'=>"form-control required", 'placeholder'=>"Agent code", 'id'=>"agent_code")) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-lock"></i>
                                                 {!! Form::text('phone_no',$details->phone_no,array('class'=>"form-control", 'placeholder'=>"Phone No", 'id'=>"userPhone")) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-envelope"></i>
                                                {!! Form::text('email',$details->email,array('class'=>"form-control required",'', 'placeholder'=>"Email", 'id'=>"userEmail")) !!}
                                            </div>
                                        </div>
                                      
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::text('address',$details->address,array('class'=>"form-control required", 'placeholder'=>"Address", 'id'=>"userAddress")) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::text('state',$details->state,array('class'=>"form-control required", 'id'=>"userStates",'placeholder'=>'State')) !!}
                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-home"></i>
                                                {!! Form::select('city_id',$cities,$details->city_id,array('class'=>"form-control required", 'id'=>"userCities")) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-facebook"></i>
                                                {!! Form::text('facebook_link',$details->facebook_link,array('class'=>"form-control", 'placeholder'=>"Facebook Link", 'id'=>"userFacebook")) !!}
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-twitter"></i>
                                                {!! Form::text('twitter_link',$details->twitter_link,array('class'=>"form-control", 'placeholder'=>"Twitter Link", 'id'=>"usertwitter_link")) !!}
                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-linkedin"></i>
                                                {!! Form::text('linked_in_link',$details->linked_in_link,array('class'=>"form-control", 'placeholder'=>"Linked In Link", 'id'=>"userlinked_in_link")) !!}
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <div class="input-icon right"><i class="fa fa-picture-o"></i>
                                                @if(file_exists(public_path().'/upload/company/'.$details->logo) )
                                            {!! Html::image(asset('upload/agent/thumb/'.$details->image),'',array('class'=>'img-responsive ','width'=>'100'))!!}
                                            @else
                                            {!! Html::image(asset('admin_assets/images/no-img.png'), 'no-img',array('class'=>'img-responsive'))!!}
                                            @endif
                                            <br>   
                                            {!! Form::file('image','',array('class'=>"form-control", 'placeholder'=>"Agent Image", 'id'=>"image")) !!}
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-actions text-right pal">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                {!! Html::linkRoute('admin_agent', 'Back', array(), array('class' => 'btn btn-default')) !!}
                                    </div>
                          {!! Form::close() !!}
                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
@endsection