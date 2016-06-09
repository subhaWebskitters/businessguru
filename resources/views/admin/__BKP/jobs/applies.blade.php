@extends('admin/layout')

@section('title', 'Users list')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Jobs Applies</div>
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
                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Jobs Applies for <strong>{{ $jobDetails->job_title }}</strong> for <strong>{{ $jobDetails->company->name  }}</strong></div>
                         
                            </div>
                            <div class="portlet-body">
                                    <div id="flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed cf">
                                        <thead class="cf">
                                        <tr>
                                            <th class="numeric">Candidate Name</th>
				            <th class="numeric">Schedule Date</th>
                                            <th class="numeric">Status</th>
                                            <th class="numeric">Action</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
					
                                          @if($results->count() > 0)
								@foreach($results AS $r)
									 
								<tr>
									<td>{{ $r->candidate->first_name.' '.$r->candidate->last_name }}</td>
									<td id="schedule_date_time{{$r->id}}">{{ $r->get_schedule_date  }}</td>
									<td>{{ $r->status }}</td>
									<td class="schedule_td">
									<a class="btn btn-info schedule_edit{{$r->id}}
									@if($r->schedule_status == 'Active') disabled @endif" data-toggle="modal" data-target="#myModal{{$r->id}}" href="javascript:" title="@if($r->schedule_status == 'Active') Already scheduled @else Schedule @endif" ><i class="fa fa-edit"></i>
									</a>
									<div id="myModal{{$r->id}}" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
									<div class="modal-dialog">
								      
									  <!-- Modal content-->
									  <div class="modal-content">
									    <div class="modal-header">
									      <button type="button" class="close" data-dismiss="modal">&times;</button>
									      <h4 class="modal-title">Schedule Interview</h4>
                                                
									    </div>
									    <div class="modal-body">
									    <div id="error_show{{$r->id}}"></div>
									    <div class="form-group input-group datetimepicker-default date">
									    <input type="text" name="schedule_date{{$r->id}}" class="form-control" placeholder="Schedule Date" />
									    <span class="input-group-addon"><i class="fa fa-calendar"></i></span></div>
										    <div class="form-group">
									{!! Form::text('address'.$r->id,$r->job->company->address,array('class'=>'form-control','placeholder'=>'Enter address')) !!}
										    </div>
									    </div>
									    <div class="modal-footer">
									      <span class="loader">{{Html::image(asset('admin_assets/images/ui-anim_basic_16x16.gif'))}}</span>
									      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        {!! Form::button('Save changes',array('class'=>'btn btn-primary saveSchedule','id'=>$r->id))!!}
									    </div>
									  </div>
								      
									</div>
								      </div>
									</td>
								</tr>
								@endforeach
							@else
								<tr><td colspan="7" align="center">.:: Record Not Found ::.</td></tr>
							@endif	
                                        </tbody>
                                    </table>
                                          <div class="pagination-panel">
						 {!! $results->render() !!}
						  </div>
                                </div>

                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
		
@endsection