@extends('admin/layout')

@section('title', 'News Articles Add')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">News Articles</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-bolt"></i>&nbsp;
                    <a href="{{ URL::route('admin_newsarticales') }}">News Articles</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
                            <div class="panel-heading">News Articles Add</div>
                            <div class="panel-body pan">                                    
                                    {!! Form::open(array('route'=>'admin_newsarticales_create_action','class'=>'form-horizontal form-validate','files'=>true)) !!}
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
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Title</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::text('title',null,array('class'=>'form-control required','placeholder'=>'Enter Title','id'=>'title' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Short Description</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::textarea('short_desc',null,array('class'=>'form-control required','placeholder'=>'Enter Short Description','id'=>'short_desc' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Content</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::textarea('content',null,array('class'=>'form-control required ckeditor','placeholder'=>'Enter Content','id'=>'content' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Image title</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::text('image_title',null,array('class'=>'form-control required','placeholder'=>'Enter image title','id'=>'image_title' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Image</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::file('image',array('class'=>'form-control'))!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <div class="col-md-offset-3 col-md-6">
                                            {!! Form::submit('Submit',array('class'=>'btn btn-primary' )) !!}&nbsp;&nbsp;
                                            {!! Html::linkRoute('admin_newsarticales', 'Back', array(), array('class' => 'btn btn-default')) !!}
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