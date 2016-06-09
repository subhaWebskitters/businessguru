@extends('admin/layout')      
@section('content')  
		<div class="page-content">
				<div class="row">
						<div class="col-lg-12">
								<div class="portlet box portlet-orange">
										<div class="portlet-header">
												<div class="caption">Add Banner Image for Investor</div>
												<div class="actions"></div>
										</div>
										<div class="portlet-body industryview">
												
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
												
												{!! Form::open(array('route'=>'storeinvestorbanner','class'=>'form-validate','novalidate','enctype'=>'multipart/form-data')) !!}
														<div class="form-body pal">
																<div class="form-group">
																		<label for="sitesettings_lebel" class="col-md-3 control-label">Title</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						
																						{!! Form::text('title','',array('class'=>"form-control required", 'placeholder'=>"Banner Title", 'id'=>"title")) !!}
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
																						{!! Form::file('image','',array('class'=>"form-control", 'placeholder'=>"Upload Image", 'id'=>"image")) !!}
																				</div>
																		</div>
																</div>
														</div>
														<div class="form-actions text-right pal">
																<button class="btn btn-primary" type="submit">Submit</button>
																{!! Html::linkRoute('investorbannerlist', 'Back', array(), array('class' => 'btn btn-default')) !!}
														</div>
												{!! Form::close() !!}
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection