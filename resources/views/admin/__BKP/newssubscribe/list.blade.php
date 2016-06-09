@extends('admin/layout')

@section('title', 'Company News Letter Subscriber List')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title"> News Letter Subscriber List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-book"></i>&nbsp;
                    <a href="javascript:void(0);">Company News Letter Subscriber List</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
                                <div class="caption">Company News Letter Subscriber List</div>
                                <!--<div class="actions">    <a class="btn btn-info btn-xs" href="{{ URL::route('admin_emailtemplate_create') }}"><i class="fa fa-plus"></i>&nbsp;
                                     New Template</a>&nbsp;</div>-->
                            </div>
                            <div class="portlet-body">
                                    <div id="flip-scroll">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead >
                                        <tr>
                                            <th width="50%">Email Address</th>
                                            <th>Company Name</th>
                                            <th>Status</th>
                                            <th class="numeric">Action</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @if($lists->count() > 0)
								@foreach($lists AS $r)
								<tr>
									<td>{{$r->subscriber_email}}</td>
									<td>{{$r->company_name}}</td>
									<td>
                                                                        @if($r->status == 'Active')
										    <a href="{{ URL::route('subscriber_status_change',$r->id) }}" title="Change Status" ><span class="label label-sm label-success"> {{ $r->status }}</span></a>
									@else
										    <a href="{{ URL::route('subscriber_status_change',$r->id) }}" title="Change Status" ><span class="label label-sm label-danger"> {{ $r->status }}</span></a>
									@endif
                                                                        </td>
                                                                        <td>
									<a class="btn btn-danger" onclick="javascript:return confirm('Do you want to delete it?');" href="{{ URL::route('news_subscription_delete',$r->id) }}" title="Delete" ><i class="fa fa-trash-o"></i>
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