@extends('admin/layout')

@section('title', 'Users list')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Jobs</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Jobs</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-list"></i>&nbsp;
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
		    {!! Form::open(array('route'=>'admin_jobs','method'=>'get','class'=>'form-validate','novalidate')) !!}

			<div class="col-lg-3">
				<div class="form-group">
				     <div class="input-icon right"><i class="fa fa-group"></i>
					 {!! Form::select('company_id',$companies,$search_company_id,array('class'=>"form-control", 'id'=>"company")) !!}
				     </div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
				     <div class="input-icon right"><i class="fa fa-calendar"></i>
					 {!! Form::text('start_date',$search_start_date,array('class'=>"form-control jobSearchDate", 'id'=>"start_date","placeholder"=>"Start Date")) !!}
				     </div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
				     <div class="input-icon right"><i class="fa fa-calendar"></i>
					 {!! Form::text('end_date',$search_end_date,array('class'=>"form-control jobSearchDate", 'id'=>"end_date","placeholder"=>"End Date")) !!}
				     </div>
				</div>
			</div>
			<div class="col-lg-3">
				<input type="submit" name="submit" value="Search" class="btn btn-danger" />
			</div>
		    {!! Form::close() !!}
		    </div>
                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Jobs List</div>
                               <div class="actions"><a class="btn btn-sm btn-info" href="{{ URL::route('admin_jobs_create') }}"><i class="fa fa-edit"></i>&nbsp;
                                    New Job</a></div>
                            </div>
                            <div class="portlet-body">
                                    <div id="flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed cf">
                                        <thead class="cf">
                                        <tr>
					    <th>Image</th>
                                            <th>Title</th>
					    <th>Company Name</th>
                                            <th>Experience</th>
                                            <th class="numeric">Status</th>
                                            <th class="numeric">Action</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @if($results->count() > 0)
								@foreach($results AS $r)
								<tr>
									<td>
									@if(file_exists(public_path('upload/job/'.$r->image)) && $r->image != '')
										    {{ Html::image(asset('upload/job/'.$r->image), $r->image, array( 'width' => 70, 'height' => 70 )) }}
									@else
										    {!! Html::image(asset('admin_assets/images/no-img.png'), 'no-img',array('class'=>'img-responsive img-circle','width' => 70, 'height' => 70))!!}
									@endif			
									</td>
									<td>{{$r->job_title}}</td>
									<td>{{ $r->company->name  }}</td>
									<td>{{$r->exp_min_year}} - {{$r->exp_max_year}} years</td>
									<td>{{ $r->status }}</td>
													
									<td>
									<a class="btn btn-info" href="{{ URL::route('admin_jobs_edit',$r->id) }}" title="Edit" ><i class="fa fa-edit"></i>
									</a>
									<a class="btn btn-primary" href="{{ URL::route('admin_jobs_apply',$r->id) }}" title="Apply Candidates" ><i class="fa fa-list"></i>
									</a>
									</td>
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