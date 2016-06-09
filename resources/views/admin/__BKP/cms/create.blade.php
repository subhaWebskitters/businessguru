@extends('admin/layout')

@section('title', 'CMS Add')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">CMS</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-bolt"></i>&nbsp;
                    <a href="{{ URL::route('admin_cms') }}">CMS</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
                            <div class="panel-heading">CMS Add</div>
                            <div class="panel-body pan">                                    
                                    {!! Form::open(array('route'=>'admin_cms_create_action','class'=>'form-horizontal form-validate')) !!}
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
                                                            {!! Form::text('cms_title',null,array('class'=>'form-control required','placeholder'=>'Enter Title','id'=>'cms_title' ))!!}
                                                </div>
                                            </div>
                                        </div>

					<div class="form-group"><label class="col-md-3 control-label" for="inputName">Display Title</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::text('cms_display_title',null,array('class'=>'form-control required','placeholder'=>'Enter Display Title','id'=>'cms_display_title' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Short Description</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::textarea('cms_short_desc',null,array('class'=>'form-control required','placeholder'=>'Enter Short Description','id'=>'cms_short_desc' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Content</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::textarea('cms_content',null,array('class'=>'form-control required ckeditor','placeholder'=>'Enter Content','id'=>'cms_content' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">CMS meta title</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::text('cms_meta_title',null,array('class'=>'form-control required','placeholder'=>'Enter CMS meta title','id'=>'cms_meta_title' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">CMS meta keyword</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::textarea('cms_meta_key',null,array('class'=>'form-control required','placeholder'=>'Enter CMS meta keyword','id'=>'cms_meta_key' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">CMS meta description</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::textarea('cms_meta_desc',null,array('class'=>'form-control required','placeholder'=>'Enter CMS meta description','id'=>'cms_meta_desc' ))!!}
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <div class="col-md-offset-3 col-md-6">
                                            {!! Form::submit('Submit',array('class'=>'btn btn-primary' )) !!}&nbsp;&nbsp;
                                            {!! Html::linkRoute('admin_cms', 'Back', array(), array('class' => 'btn btn-default')) !!}
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