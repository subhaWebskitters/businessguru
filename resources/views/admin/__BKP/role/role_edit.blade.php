@extends('admin/layout')

@section('title', 'Admin Role Edit')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title"> Edit Role</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-cog"></i>&nbsp;
                    <a href="javascript:void(0)">Role</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-edit"></i>&nbsp;
                    <a href="javascript:void(0)">Edit</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Edit Role</div>
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
{!! Form::open(array('route'=>'admin_role_update','class'=>'form-validate','novalidate')) !!}
{!! Form::hidden('id',$details->id) !!}
                                    <div class="form-body pal">
                                        <div class="form-group">
                                            <div class="input-icon right">
                                                {!! Form::text('name',$details->name,array('class'=>"form-control required", 'placeholder'=>"Admin Role Name", 'id'=>"name")) !!}
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="input-icon right">
                                                {!! Form::text('display_name',$details->display_name,array('class'=>"form-control required", 'placeholder'=>"Display Role Name", 'id'=>"display_name")) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="input-icon right">
                                                {!! Form::textarea('desc',$details->description,array('class'=>"form-control required", 'placeholder'=>"Role Description", 'id'=>"desc")) !!}
                                            </div>
                                        </div>
                                        <!--<div class="form-group">
                                            <div class="input-icon right">
                                                {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],$details->status,array('class'=>'form-control parsley-validated required')) !!}
                                            </div>
                                        </div>-->
                                        
                                       
                                    </div>
                                    <div class="form-actions text-right pal">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                       {!! Html::linkRoute('admin_role', 'Back', array(), array('class' => 'btn btn-default')) !!}
                                    </div>
                          {!! Form::close() !!}
                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
@endsection