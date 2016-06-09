@extends('admin/layout')
@section('title', 'Agent list')
@section('content')
		<div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
				<div class="page-header pull-left">
						<div class="page-title">Agent</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
						<li>
								<i class="fa fa-home"></i>&nbsp;
								<a href="javascript:void(0);">Agent</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
										{!! Form::open(array('route'=>'admin_agent','method'=>'get','class'=>'form-validate','novalidate')) !!}
												<div class="col-lg-3">
														<div class="form-group">
																<div class="input-icon right">
																		<i class="fa fa-user"></i>
																		{!! Form::text('keyword',$keyword,array('class'=>"form-control", 'id'=>"keyword","placeholder"=>"Enter The Keyword")) !!}
																</div>
														</div>
												</div>
												<div class="col-lg-3">
														<div class="form-group">
																<div class="input-icon right">
																		<i class="fa fa-check"></i>
																		{!! Form::select('status_search',[''=>'Select Status', 'Active'=>'Active', 'Inactive'=>'Inactive'], $status_search, array('class'=>"form-control", 'id'=>"status_search")) !!}
																</div>
														</div>
												</div>
												<div class="col-lg-3">
														<input type="submit" name="submit" value="Search" class="btn btn-danger" />
														<a href="{{ URL::route('admin_agent') }}" class="btn btn-success" >View All</a>
												</div>
										{!! Form::close() !!}
								</div>
						
								<div class="portlet box portlet-orange">
										<div class="portlet-header">
												<div class="caption">Agent List</div>
												<div class="actions">
														<a class="btn btn-sm btn-info" href="{{ URL::route('admin_agent_create') }}">
																<i class="fa fa-edit"></i>&nbsp;New Agent
														</a>
												</div>
										</div>
										<div class="portlet-body">
												<div id="flip-scroll">
														<table class="table table-bordered table-striped table-condensed cf">
																<thead class="cf">
																		<tr>
																				<th>Agent Name</th>
																				<th>Agent Code</th>
																				<th>Email</th>
																				<th class="numeric">Action</th>
																		</tr>
																</thead>
																<tbody>
																		@if($lists->count() > 0)
																				@foreach($lists AS $r)
																						<tr>
																								<td>{{$r->name}}</td>
																								<td>{{$r->agent_code}}</td>			
																								<td>{{$r->email}}</td>			
																								<td>
																										@if($r->status=='Active')
																												<label onclick="javascript:statusModifier('agent',this)" data-team='{{$r->id}}' class="btn btn-success" title="Active"  >
																														<i class="fa fa-check-square-o"></i>
																												</label>
																										@elseif($r->status=='Inactive')
																												<label onclick="javascript:statusModifier('agent',this)" data-team='{{$r->id}}' class="btn btn-primary" title="Inactive" >
																														<i class="glyphicon glyphicon-remove-sign"></i>
																												</label>
																										@endif
																										<a class="btn btn-info" href="{{ URL::route('admin_agent_edit',$r->id) }}" title="Edit" >
																												<i class="fa fa-edit"></i>
																										</a>
																										<a class="btn btn-danger" href="{{ URL::route('admin_agent_delete',$r->id) }}" title="Delete" onclick="return confirm('Are you sure! Do you want to delete with its all relevent data?');">
																												<i class="fa fa-trash-o"></i>
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
																@if(count($search)>0)
																		{!! $lists->appends($search)->render() !!}
																@else
																		{!! $lists->render() !!}
																@endif											
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection