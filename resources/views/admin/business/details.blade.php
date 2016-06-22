@extends('admin/layout')
@section('title', 'Business Details')
@section('content')
		<div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
				<div class="page-header pull-left">
						<div class="page-title">Business Details</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
						<li>
								<i class="fa fa-book"></i>&nbsp;
								<a href="javascript:void(0);">Business</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
						</li>
						<li>
								<i class="fa fa-info"></i>&nbsp;
								<a href="javascript:void(0);">Business Details </a>&nbsp;&nbsp;
						</li>
				</ol>
				<div class="clearfix"></div>
		</div>
		<div class="page-content">
				<div class="row">
						<div class="col-lg-12">
								<div class="panel panel-yellow">
										<div class="panel-heading">Basic</div>
										<div class="panel-body pan industryview">                                    
												<div class="form-body pal">
														<div class="form-group">
																<label class="col-md-3 control-label" for="inputName">Email</label>
																<div class="col-md-9">
																		<div class="input-icon right">
																				{!! Form::email('email',$details->email,array('class'=>'form-control','readonly' ))!!}
																		</div>
																</div>
														</div>
												</div>
												<div class="form-body pal">
														<div class="form-group">
																<label class="col-md-3 control-label" for="inputName">Am I a</label>
																<div class="col-md-9">
																		<div class="input-icon right">
																				{!! Form::text('user_type',$details->user_type,array('class'=>'form-control','readonly' ))!!}
																		</div>
																</div>
														</div>
												</div>
										
												
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="inputName">Business Name</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						{!! Form::text('business_name',$details->business_name,array('class'=>'form-control','readonly' ))!!}
																				</div>
																		</div>
																</div>
														</div>
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="inputName">Industry/Category</label>
																		@if(COUNT($details->businessindustry)>0)
																				<div class="col-md-9">		
																						<ul>
																								@foreach($details->businessindustry as $v)
																										<li>{{$v->industryDetails->industry_name}}</li>
																								@endforeach
																						</ul>
																				</div>
																		@else
																				<div class="col-md-9">
																						<div class="input-icon right">N/A</div>
																				</div>    
																		@endif
																</div>
														</div>
						@if($details->user_type == 'Start Up'|| $details->user_type == 'Existing Business')
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="inputName">ACRA Number</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						{!! Form::text('acta_number',$details->acta_number,array('class'=>'form-control','readonly' ))!!}
																				</div>
																		</div>
																</div>
														</div>
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="inputName">Number of Year</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						{!! Form::text('number_of_year',$details->number_of_year,array('class'=>'form-control','readonly' ))!!}
																				</div>
																		</div>
																</div>
														</div>
														@endif
										@if(isset($details->registered_address) && $details->registered_address != '')
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="inputName">Address</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						{!! Form::textarea('registered_address',$details->registered_address,array('class'=>'form-control','readonly' ))!!}
																				</div>
																		</div>
																</div>
														</div>
														@endif
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="inputName">Business Logo</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						@if(file_exists(public_path().'/upload/businessuser/thumb/'.$details->business_logo) && $details->business_logo != '')
																								{!! Html::image(asset('upload/businessuser/thumb/'.$details->business_logo),'',array('class'=>'img-responsive img-circle','width'=>'140'))!!}
																						@else
																								{!! Html::image(asset('upload/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width'=>'100'))!!}
																						@endif							    
																				</div>
																		</div>
																</div>
														</div>
																
				@if(COUNT($details->business_details)>0)
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="inputName">Director Name</label>					
			
					<div class="col-md-9">
																				<div class="input-icon right">
					@foreach($details->business_details as $v)																	{!! Form::text('name_of_director',$v->director_name,array('class'=>'form-control','readonly' ))!!}
					@endforeach
																				</div>
																		</div>
																		
																</div>
														</div>
					@endif
										@if($details->business_description != '')
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="inputName">Description</label>
																		<div class="col-md-9">
																				<div class="input-icon right">
																						{!! Form::textarea('business_description',$details->business_description,array('class'=>'form-control','readonly' ))!!}
																				</div>
																		</div>
																</div>
														</div>
														@endif
														<div class="form-body pal">
																<div class="form-group">
																		<label class="col-md-3 control-label" for="inputName">Documents</label>
																		@if(COUNT($details->getDocumentList)>0)
																				<div class="col-md-9">
																						<ul>
																								@foreach($details->getDocumentList as $v)
																										<li>							    
																												@if(file_exists(public_path().'/upload/attachment/'.$v->document_name))
																														{{--{{$v->document_name}}--}}
																														<a href="{{URL::route('download_business_file',$v->document_name)}}">
																																{!! Html::image(asset('icon/'.Helpers::get_extension_icon($v->document_name)), 'Download', array('title'=>'Download '.Helpers::get_extension($v->document_name) ))!!}
																														</a>
																												@endif    
																										</li>
																								@endforeach
																						</ul>
																				</div>
																		@else
																				<div class="col-md-9">
																						<div class="input-icon right">N/A</div>
																				</div>    
																		@endif
																</div>
														</div>
												
										
										<div class="form-body pal">
										<div class="form-group"><label class="col-md-3 control-label" for="inputName">Mobile Number</label>
										<div class="col-md-9">
										<div class="input-icon right">
										{!! Form::text('mobile_number',$details->mobile_number,array('class'=>'form-control','readonly' ))!!}
										</div>
										</div>
										</div>
										</div>
										
										<div class="form-body pal">
										<div class="form-group"><label class="col-md-3 control-label" for="inputName">Website</label>
										<div class="col-md-9">
										<div class="input-icon right">
										{!! Form::text('website',$details->website,array('class'=>'form-control','readonly' ))!!}
										</div>
										</div>
										</div>
										</div>	
										@if($details->registered_address != '')
												<div class="form-body pal">
														<div class="form-group">
																<label class="col-md-3 control-label" for="inputName">Address</label>
																<div class="col-md-9">
																		<div class="input-icon right">
																				{!! Form::textarea('registered_address',$details->registered_address,array('class'=>'form-control','readonly' ))!!}
																		</div>
																</div>
														</div>
												</div>
												
											@endif	
												
										
										
										</div>
								</div>
						
						<div class="panel panel-blue">
						<div class="panel-heading">PROPOSAL</div>
						<div class="panel-body pan industryview">                                    
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">Looking For</label>
						<div class="col-md-9">
						<div class="input-icon right">
						{!! Form::text('looking_for',$details->looking_for,array('class'=>'form-control','readonly' ))!!}
						</div>
						</div>
						</div>
						</div>
						
						@if($details->looking_for == 'Investors')
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">Funds Require</label>
						<div class="col-md-9">
						<div class="input-icon right">
						{!! Form::text('funds_required',$details->getCurrency->country_currency_symbol.$details->funds_required,array('class'=>'form-control','readonly' ))!!}
						</div>
						</div>
						</div>
						</div>
						
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">Amount of Equity in Exchange</label>
						<div class="col-md-9">
						<div class="input-icon right">
						{!! Form::text('funds_required', $details->equity_exchange.'% ', array('class'=>'form-control','readonly' ))!!}
						</div>
						</div>
						</div>
						</div>
						
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">Uploaded Proposal</label>
						<div class="col-md-9">
						<div class="input-icon right">
						@if(file_exists(public_path().'/upload/proposal/'.$details->proposal_name) && $details->proposal_name != '')
						<a href="{{URL::route('download_proposal_file',$details->proposal_name)}}">{!! Html::image(asset('icon/'.Helpers::get_extension_icon($details->proposal_name)),'Download',array('title'=>'Download '.Helpers::get_extension($details->proposal_name) ))!!}</a>
						@else
						N/A
						@endif 
						</div>
						</div>
						</div>
						</div>
						@endif
						
						@if($details->looking_for == 'Selling Your Company')
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">Selling Price</label>
						<div class="col-md-9">
						<div class="input-icon right">
						{!! Form::text('funds_required',$details->getspCurrency->country_currency_symbol.' '.$details->selling_price,array('class'=>'form-control','readonly' ))!!}
						</div>
						</div>
						</div>
						</div>
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">Company Valuation</label>
						<div class="col-md-9">
						<div class="input-icon right">
						{!! Form::text('funds_required',$details->getcvCurrency->country_currency_symbol.' '.$details->	company_valuation,array('class'=>'form-control','readonly' ))!!}
						</div>
						</div>
						</div>
						</div>
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">Uploaded Proposal</label>
						<div class="col-md-9">
						<div class="input-icon right">
						@if(file_exists(public_path().'/upload/proposal/'.$details->proposal_name) && $details->proposal_name != '')
						<a href="{{URL::route('download_proposal_file',$details->proposal_name)}}">{!! Html::image(asset('icon/'.Helpers::get_extension_icon($details->proposal_name)),'Download',array('title'=>'Download '.Helpers::get_extension($details->proposal_name) ))!!}</a>
						@else
						N/A
						@endif 
						</div>
						</div>
						</div>
						</div>
						@endif		
						
						</div>
						</div>
						
						
						<div class="panel panel-green">
						<div class="panel-heading">ACCOUNTS</div>
						<div class="panel-body pan industryview">                                    
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">Sales Report</label>
						<div class="col-md-9">
						<div class="input-icon right">
						@if(file_exists(public_path().'/upload/sales_report/'.$details->sales_report_name) && $details->sales_report_name != '')
						<a href="{{URL::route('download_sales_report',$details->sales_report_name)}}">{!! Html::image(asset('icon/'.Helpers::get_extension_icon($details->sales_report_name)),'Download',array('title'=>'Download '.Helpers::get_extension($details->sales_report_name) ))!!}</a>
						@else
						N/A
						@endif 
						</div>
						</div>
						</div>
						</div>
						
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">PLL Report</label>
						<div class="col-md-9">
						
						<div class="input-icon right">
						@if(file_exists(public_path().'/upload/pll_report/'.$details->pll_report_name) && $details->pll_report_name != '')
						<a href="{{URL::route('download_pll_report',$details->pll_report_name)}}">{!! Html::image(asset('icon/'.Helpers::get_extension_icon($details->pll_report_name)),'Download',array('title'=>'Download '.Helpers::get_extension($details->pll_report_name) ))!!}</a>
						@else
						N/A
						@endif 
						</div>
						</div>
						</div>
						</div>
						
						<div class="form-body pal">
						<div class="form-group"><label class="col-md-3 control-label" for="inputName">Valuation Report</label>
						<div class="col-md-9">
						<div class="input-icon right">
						@if(file_exists(public_path().'/upload/valuation_report/'.$details->valuation_report_name) && $details->valuation_report_name != '')
						<a href="{{URL::route('download_valuation_report',$details->valuation_report_name)}}">{!! Html::image(asset('icon/'.Helpers::get_extension_icon($details->valuation_report_name)),'Download',array('title'=>'Download '.Helpers::get_extension($details->valuation_report_name) ))!!}</a>
						@else
						N/A
						@endif 
						</div>
						</div>
						</div>
						</div>	
						
						
						</div>
						</div>
						<div class="form-actions pal">
						<div class="form-group mbn">
						<div class="col-md-offset-3 col-md-6">
						{!! Html::linkRoute('admin_business_users', 'Back', array(), array('class' => 'btn btn-default')) !!}
						</div>
						</div>
						</div>
						</div>
				</div>
		</div>

@endsection