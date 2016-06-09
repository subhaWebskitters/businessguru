@extends('admin/layout')      
@section('content') 
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="portlet box portlet-orange">
                    <div class="portlet-header">
                        <div class="caption">Update Banner Image for Discover</div>
                        <div class="actions"></div>
                    </div>
                    <div class="portlet-body industryview">
                        {!! Form::open(array('route'=>'updatebanner','class'=>'form-validate form-actions','novalidate','enctype'=>'multipart/form-data')) !!}
                            {{ Form::hidden('action', 'Process', array('id' => 'secret_id')) }}
														 {{ Form::hidden('id', $details->id) }}
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
                                <div class="alert alert-danger">{{Session::get('errmsg') }}</div>
                            @endif
                            <div class="form-body pal">
                                <div class="form-group">
																		<label for="sitesettings_lebel" class="col-md-3 control-label">Banner Title</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						{!! Form::text('banner_title', $details->banner_title ,array('class'=>"form-control required", 'placeholder'=>"Banner Title",'')) !!}
																				</div>
																		</div>
                                </div>
														</div>
														<div class="form-body pal">
																<div class="form-group">
																		<label for="sitesettings_lebel" class="col-md-3 control-label">First Text</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						{!! Form::text('question', $details->question,array('class'=>"form-control required", 'placeholder'=>"First Text ",'')) !!}
																				</div>
																		</div>
                                </div>
														</div>
														<div class="form-body pal">
																<div class="form-group">
																		<label for="sitesettings_lebel" class="col-md-3 control-label">Second Text</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						{!! Form::text('answer', $details->answer ,array('class'=>"form-control required", 'placeholder'=>"Second Text",'')) !!}
																				</div>
																		</div>
                                </div>
														</div>
														<div class="form-body pal">
                                <div class="form-group">
																		<label for="sitesettings_lebel" class="col-md-3 control-label">Upload Banner Image</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						
																						<label>Banner Image</label>&nbsp;&nbsp;<strong>[Image width not greater than 2500 & height not greater than 1500]</strong>
																						{!! Form::file('bannerimage','',array('class'=>"form-control", 'placeholder'=>"Upload Image", 'id'=>"image")) !!}
																						<br><br>
																						@if (file_exists(public_path('upload/homeBanner/thumb/'.$details->bannerimage))) 
																								<img src="{{ asset('/upload/homeBanner/thumb/'.$details->bannerimage) }}" alt="" height="100" width="250" />
																						@else
																								{{"Not exists"}}
																						@endif    
																				</div>
																		</div>
																</div>
                           </div>
                            <div class="text-right pal">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                {!! Html::linkRoute('homepagebannerlist', 'Back', array(), array('class' => 'btn btn-default')) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection