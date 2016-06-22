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
                    <a href="javascript:void(0);">Details </a>&nbsp;&nbsp;
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
				<div class="form-body">
				    <div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="inputFirstName"><h5><b>Email</b></h5></label>
					<div class="col-md-6">					    
					   {{$details->email}}
					</div>
				    </div>
				    <div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="inputFirstName"><h5><b>User Type</b></h5></label>
					<div class="col-md-6">					    
					   {{$details->user_type}}
					</div>
				    </div>
						
				    @if($details->user_type == 'Start Up')
				    <div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="inputFirstName"><h5><b>Business Name</b></h5></label>
					<div class="col-md-6">					    
					   {{$details->business_name}}
					</div>
				    </div>	
				    <div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="inputFirstName"><h5><b>Industry/Category</b></h5></label>
						@if(COUNT($details->businessindustry)>0)
							    <ul>
							    @foreach($details->businessindustry as $v)
									<li>{{$v->industryDetails->industry_name}}</li>
							    @endforeach
							    </ul>
						@else
							    <div class="col-md-6">					    
							       N/A
							    </div>   
						@endif
				    </div>
				    <div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="inputFirstName"><h5><b>ACRA Number</b></h5></label>
					<div class="col-md-6">					    
					   {{$details->acta_number}}
					</div>
				    </div>	
				    <div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="inputFirstName"><h5><b>Number of Year</b></h5></label>
					<div class="col-md-6">					    
					   {{$details->number_of_year}}
					</div>
				    </div>	
				    <div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="inputFirstName"><h5><b>Address</b></h5></label>
					<div class="col-md-6">					    
					   {{$details->registered_address}}
					</div>
				    </div>
				    <div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="inputFirstName"><h5><b>Director Name</b></h5></label>
					<div class="col-md-6">					    
					   {{$details->name_of_director}}
					</div>
				    </div>	
				    <div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="inputFirstName"><h5><b>Description</b></h5></label>
					<div class="col-md-6">					    
					   {{$details->business_description}}
					</div>
				    </div>	
				    <div class="form-group col-md-12">
						<label class="col-md-3 control-label" for="inputFirstName"><h5><b>Docx</b></h5></label>
						@if(COUNT($details->getDocumentList)>0)
							    <ul>
							    @foreach($details->getDocumentList as $v)
									<li>{{$v->document_name}} <a href="{{URL::route('download_file',$v->document_name)}}" class="download_attached_files">Download</a></li>
							    @endforeach
							    </ul>
						@else
							    <div class="col-md-6">					    
							       N/A
							    </div>   
						@endif
				    </div>
				    @endif
			    
			</div>
		    </div>
                                    </div>
		    <div class="panel panel-yellow">
                            <div class="panel-heading">Basic</div>
                            <div class="panel-body pan">                                    
                                    <div class="form-body pal">
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName"><b>Email</b></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            <h5>{{$details->email}}</h5>
                                                </div>
                                            </div>
                                        </div>
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Status</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                           
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
                </div>
            </div>
		
@endsection