@extends('admin/layout')
@section('title', 'Industry List')

@section('content')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Edit</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li>
            <i class="fa fa-cogs"></i>&nbsp;
            <a href="{{URL::route('industries_list')}}">Industry List</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li>
            <i class="fa fa-home"></i>&nbsp;
            <a href="javascript:void(0);">Edit </a>&nbsp;&nbsp;
            </li>
         
        </ol>
        <div class="clearfix"></div>
    </div>
        
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Industry Update</div>
                    <div class="panel-body pan industryview">                                    
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <p class="text-red">{{$error}}</p>
                            @endforeach
                        @endif
                        @if(Session::has('errMsg'))
                        <p class="text-red">{{Session::get('errMsg')}}</p>
                        @endif
                        {{ Form::open(array('route'=>array('industry_edit',$id))) }}
                            
                            <div class="form-body pal">
                                <div class="form-group">
                                    <label for="sitesettings_lebel" class="col-md-3 control-label">Industry Name</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            {{Form::text('industry_name',$industry_details['industry_name'],array('class'=>'form-control required'))}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body pal">
                                <div class="form-group">
                                    <label for="sitesettings_value" class="col-md-3 control-label">Status</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                        {{ Form::select('status',array('Active'=>'Active','Inactive'=>'Inactive'),$industry_details['status'],array('class'=>'form-control')) }}
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions pal">
                                <div class="form-group mbn">
                                    <div class="col-md-offset-3 col-md-6">
                                    <input type="submit" value="Update" class="btn btn-primary">&nbsp;&nbsp;
                                    {{ Html::linkRoute('industries_list','Back',array(),array('class' => 'btn btn-default') ) }}
                                    
                                    </div>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                     
            </div>
        </div>
    </div>
@endsection