@extends('admin/layout')

@section('title', 'Email Template list')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Email Template</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-book"></i>&nbsp;
                    <a href="javascript:void(0);">Email Template</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
			    <div class="note note-success"><p>{{ Session::get('succmsg') }}</p></div>
		
	        @endif
                    <div class="col-lg-12">
                     <div class="portlet box portlet-yellow">
                            <div class="portlet-header">
                                <div class="caption">Email Template</div>
<!--                                <div class="actions">
																		<a class="btn btn-info btn-xs" href="{{ URL::route('admin_emailtemplate_create') }}">
																				<i class="fa fa-plus"></i>&nbsp;
																				New Template
																		</a>&nbsp;
																</div>
-->                            </div>
                            <div class="portlet-body">
                                    <div id="flip-scroll">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead >
                                        <tr>
                                            <th width="50%">Title</th>
                                            <th>Subject</th>
                                            <th>Status</th>
                                            <th class="numeric">Action</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @if($lists->count() > 0)
								@foreach($lists AS $r)
								<tr>
									<td>{{$r->title}}</td>
									<td>{{$r->mail_subject}}</td>
									<td>
                                                                        @if($r->status == 'Active')
										    <span class="label label-sm label-success"> {{ $r->status }}</span>
									@else
										    <span class="label label-sm label-danger"> {{ $r->status }}</span>
									@endif
                                                                        </td>
                                                                        <td>
									<a class="btn btn-info" href="{{ URL::route('admin_emailtemplate_edit',$r->id) }}" title="Edit" ><i class="fa fa-edit"></i>
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
						  {!! $lists->render() !!}
						  </div>
                                </div>

                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
		
@endsection