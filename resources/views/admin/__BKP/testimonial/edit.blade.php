@extends('admin/layout')

@section('title', 'Testimonial edit')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Testimonial</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-quote-left"></i>&nbsp;
                    <a href="{{ URL::route('admin_testimonial') }}">Testimonial</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
                            <div class="panel-heading">Testimonial Update</div>
                            <div class="panel-body pan">                                    
                                    {!! Form::open(array('route'=>array('admin_testimonial_update_action',$lists->id),'class'=>'form-horizontal form-validate','files'=>true)) !!}
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
						@if( Session::has('errmsg'))
							    <div class="alert alert-danger">
                                                                <ul>
                                                                        <li>{{ Session::get('errmsg') }}</li>
                                                                </ul>
                                                            </div>
						@endif
                                       <div class="form-group"><label class="col-md-3 control-label" for="inputName">Author Name</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::text('author',$lists->author,array('class'=>'form-control required','placeholder'=>'Author Name','id'=>'author' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <!--<div class="form-group"><label class="col-md-3 control-label" for="inputName">Company Name</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::text('company_name',$lists->company_name,array('class'=>'form-control required','placeholder'=>'Company Name','id'=>'company_name' ))!!}
                                                </div>
                                            </div>
                                        </div>-->
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Description</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::textarea('description',$lists->description,array('class'=>'form-control required','placeholder'=>'Description','id'=>'description' ))!!}
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Image</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::file('image',null,array('class'=>'form-control required','id'=>'image','files'=>true ))!!}
							    <br>
							    {{Html::image(asset('upload/testimonial/'.$lists->image),$lists->image,array('height'=>100,'width'=>100))}}
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
                                            {!! Html::linkRoute('admin_testimonial', 'Back', array(), array('class' => 'btn btn-default')) !!}
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