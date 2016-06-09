@extends('admin/layout')

@section('title', 'Jobs Report')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Jobs Report</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="{{URL::route('admin_jobs_report')}}">Report</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-tasks"></i>&nbsp;
                    <a href="javascript:void(0);">List</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
		@if(Session::has('succmsg'))
			    <div class="note note-success"><p><strong>Well done!</strong> {{ Session::get('succmsg') }}</p></div>
		
	        @endif
                    <div class="col-lg-12">
		    <div class="form-body pal">
		    {!! Form::open(array('route'=>'admin_jobs_report','method'=>'get','class'=>'form-validate','novalidate')) !!}

			<div class="col-lg-3">
				    
			
				<div class="form-group">
				     <div class="input-icon right"><i class="fa fa-group"></i>
					 {!! Form::select('company_id',$companies,$search_company_id,array('class'=>"form-control", 'id'=>"company")) !!}
				     </div>
				</div>
			</div>
			<div class="col-lg-3">
			<div class="input-group date">
				    {!! Form::text('start_date',$search_start_date,array('class'=>"form-control", 'id'=>"start_date","placeholder"=>"Start Date","readonly"=>"true")) !!}
				    <span class="input-group-addon jobSearchDate">
				    <i class="fa fa-calendar"></i>
				    </span>
			</div>
			</div>
			<div class="col-lg-3">
				<div class="input-group date">
					 {!! Form::text('end_date',$search_end_date,array('class'=>"form-control jobSearchDate", 'id'=>"end_date","placeholder"=>"End Date","readonly"=>"true")) !!}
					 <span class="input-group-addon jobSearchDate">
						<i class="fa fa-calendar"></i>
						</span>
				</div>
			</div>
			<div class="col-lg-3">
				<input type="submit" name="submit" value="Search" class="btn btn-danger" />
			</div>
		    {!! Form::close() !!}
		    </div>
                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Jobs Report</div>
                               
                            </div>
                            <div class="portlet-body">
                                    <div id="flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed cf">
                                        <thead class="cf">
                                        <tr>
									        <th >Posted Date</th>
                                            <th>Title</th>
									        <th>Company Name</th>
                                            <th>Applies</th>
                                            <th class="numeric">Status</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @if($results->count() > 0)
								@foreach($results AS $r)
								<tr>
									<td>{{date('m/d/Y',strtotime($r->created_at))}}</td>
									<td>{{$r->job_title}}</td>
									<td>{{ $r->company->name  }}</td>
									<td>{{$r->jobapplies()->count()?$r->jobapplies()->count():0}}</td>
									<td>{{ $r->status }}</td>
													
									
								</tr>
								@endforeach
							@else
								<tr><td colspan="7" align="center">.:: Record Not Found ::.</td></tr>
							@endif	
                                        </tbody>
                                    </table>
                                          <div class="pagination-panel">
					  {!! $results->appends($search)->render() !!}
						 
						  </div>
                                </div>

                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
		
@endsection