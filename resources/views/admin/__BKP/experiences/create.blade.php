@extends('admin/layout')

@section('title', 'Experience Add')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Experience</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-money"></i>&nbsp;
                    <a href="{{ URL::route('admin_experience') }}">Experience</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-plus"></i>&nbsp;
                    <a href="javascript:void(0);">Add</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
		    <div class="panel panel-yellow">
                            <div class="panel-heading">Experience Add</div>
                            <div class="panel-body pan">                                    
                                    {!! Form::open(array('route'=>'admin_experience_create_action','class'=>'form-horizontal form-validate')) !!}
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
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Experience Range</label>

                                            <div class="col-md-9">
						<div class="input-group input-daterange">
			  	    {!!Form::number('minimum_experience','',array('class'=>'form-control','placeholder'=>'Enter Minimum Experience','min'=>0,'id'=>'minimum_experience'))!!}
				    <span class="input-group-addon">to</span>
				    {!! Form::number('maximum_experience','',array('class'=>'form-control','placeholder'=>'Enter Maximum Experience','min'=>0,'id'=>'maximum_experience'))!!}
				    <span class="input-group-addon">years</span>
						</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <div class="col-md-offset-3 col-md-6">
                                            {!! Form::submit('Submit',array('class'=>'btn btn-primary' )) !!}&nbsp;&nbsp;
                                            {!! Html::linkRoute('admin_experience', 'Back', array(), array('class' => 'btn btn-default')) !!}
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