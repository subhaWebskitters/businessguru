@extends('admin/layout')

@section('title', 'News Articles Update')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">News Articles</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-file-text-o"></i>&nbsp;
                    <a href="{{ URL::route('admin_specification') }}">News Articles</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
                            <div class="panel-heading">News Articles Update</div>
                            <div class="panel-body pan">                                    
                                    {!! Form::open(array('route'=>array('admin_newsarticales_update_action',$lists->id),'class'=>'form-horizontal form-validate','files'=>true)) !!}
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
                                                            {!! Form::text('title',$lists->title,array('class'=>'form-control required','placeholder'=>'Enter Title','id'=>'title' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Short Description</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::textarea('short_desc',$lists->short_desc,array('class'=>'form-control required','placeholder'=>'Enter Short Description','id'=>'short_desc' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Content</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::textarea('content',$lists->content,array('class'=>'form-control required ckeditor','placeholder'=>'Enter Content','id'=>'content' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Image title</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::text('image_title',$lists->image_title,array('class'=>'form-control required','placeholder'=>'Enter image title','id'=>'image_title' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Image</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::file('image',array('class'=>'form-control'))!!}
							    @if(file_exists(public_path().'/upload/newsarticales/'.$lists->image) && $lists->image !='')
									{!! Html::image(asset('upload/newsarticales/'.$lists->image), $lists->image ,array('height'=>'100','width'=>'100'))!!}
							    @else
									{!! Html::image(asset('admin_assets/images/no-img.png'), 'no-img',array('height'=>'100','width'=>'100'))!!}
							    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Status</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::select('status',['Active' => 'Active','Inactive' => 'Inactive'],$lists->status,array('class'=>'form-control required','id'=>'inputName' ))!!}
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