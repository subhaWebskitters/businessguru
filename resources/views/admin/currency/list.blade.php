@extends('admin/layout')

@section('title', 'Users list')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Currency List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-list"></i>&nbsp;
                    <a href="javascript:void(0);">Currency List</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
				<div id="del_succ_msg">
				@if(Session::has('succmsg'))
								<div class="note note-success"><p><strong>Well done!</strong> {{ Session::get('succmsg') }}</p></div>
		
				@endif
			   </div>
                    <div class="col-lg-12">
		     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Currency List</div>
                               <div class="actions"><a class="btn btn-sm btn-info" href="{{ URL::route('currency_create') }}"><i class="fa fa-edit"></i>&nbsp;
                                    Add Currency</a></div>
                            </div>
                            <div class="portlet-body">
                                    <div id="flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed cf">
                                        <thead class="cf">
                                        <tr>
					    <th>Country Name</th>
                                            <th>Currency Name</th>
                                            <th>Country Currency Symbol</th>
                                            <th class="numeric">Action</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @if($currency_list->count() > 0)
								@foreach($currency_list AS $r)
								<tr>
									<td>{{ $r->country_name  }}</td>
									<td>{{ $r->currency_name  }}</td>
									<td>{{ $r->country_currency_symbol }}</td>				
									<td>
									<a title="edit" class="tablectrl_small bDefault tipS" href="{{ URL::route('currency_edit',$r->id) }}">
                                                    <button class="btn btn-success btn-xs" type="button"><i class="fa fa-pencil"></i>&nbsp;
                                                        edit 
                                                    </button>
                                                </a>
							    
									<a title="delete" data_id="{{$r->id}}" class="tablectrl_small bDefault tipS delete_currency" href="javascript:void(0)">
                                                    <button class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash-o"></i>&nbsp;
                                                        delete 
                                                    </button>
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
					  {!! $currency_list->appends($search)->render() !!}
						 
						  </div>
                                </div>

                                
                            </div>
                        </div>
                     
                     
                     
                         </div>
                </div>
            </div>
		
@endsection