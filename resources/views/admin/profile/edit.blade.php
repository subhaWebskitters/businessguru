@extends('admin/layout')

@section('title', 'Profile Update')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Profile</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-file-text-o"></i>&nbsp;
                    <a href="{{ URL::route('edit_profile') }}">Edit Profile</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Update </a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
		    <div class="panel panel-yellow">
                            <div class="panel-heading">Profile Update</div>
                            <div class="panel-body pan industryview">                                    
                                    {!! Form::open(array('route'=>array('update_profile'),'class'=>'form-horizontal form-validate','files'=>true)) !!}
                                    <div class="form-body pal">
																						@if (count($errors) > 0)
																								<div class="alert alert-danger">
																										<ul>
																												@foreach ($errors->all() as $error)
																														<li>{{ $error }}</li>
																												@endforeach
																										</ul>
																								</div>
																						@endif
																						@if(Session::has('succmsg'))
																									<div class="note note-success"><p>{{ Session::get('succmsg') }}</p></div>
				
																						@endif
                                        <div class="form-group">
																						<label class="col-md-3 control-label" for="inputName">First Name</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right state-success">
                                                            {!! Form::text('name',$lists->name,array('class'=>'form-control required','placeholder'=>'Enter First Name','id'=>'name' ))!!}
                                                </div>
                                            </div>
                                        </div>
																		</div>
																		<div class="form-body pal">
																				<div class="form-group">
																						<label class="col-md-3 control-label" for="Email">Email</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right state-success">
                                                    {!! Form::text('email',$lists->email,array('class'=>'form-control required','placeholder'=>'Enter Email','id'=>'email','readonly'=>'readonly' ))!!}
                                                </div>
                                            </div>
                                        </div>
																		</div>
																		<div class="form-body pal">
																				<div class="form-group">
																						<label class="col-md-3 control-label" for="Password">Password</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::text('password',null,array('class'=>'form-control','placeholder'=>'Enter Password','id'=>'password' ))!!}
                                                </div>
                                            </div>
                                        </div>
																		</div>
																		<div class="form-body pal">
																				<div class="form-group">
																						<label class="col-md-3 control-label" for="image">Image</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::file('image',array('class'=>'','id'=>'image' ))!!}
							    <br>
							    {{ Html::image(asset('upload/adminUser/'.$lists->image),$lists->image,array('height'=>'100','width'=>'100')) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <div class="col-md-offset-3 col-md-6">
                                            {!! Form::submit('Submit',array('class'=>'btn btn-primary' )) !!}&nbsp;&nbsp;
                                            {!! Html::linkRoute('admin_dashboard', 'Back', array(), array('class' => 'btn btn-default')) !!}
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                            </div>
                        </div>
                     
                         </div>
                </div>
            </div>
		
@endsection