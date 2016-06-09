@extends('admin/layout')

@section('title', 'Admin Permission List')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Permission</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-lock"></i>&nbsp;
                    <a href="javascript:void(0);">Permission</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
		    {!! Form::open(array('route'=>'admin_permission','method'=>'post','class'=>'form-validate','novalidate')) !!}

			<div class="col-lg-3">
				<div class="form-group">
				     <div class="input-icon right"><i class="fa fa-search"></i>
					 {!! Form::text('keyword',$keyword,array('class'=>"form-control","placeholder"=>"Enter The Keyword")) !!}
				     </div>
				</div>
			</div>
			
			<div class="col-lg-3">
				<input type="submit" name="submit" value="Search" class="btn btn-danger" />
				<a href="{{ URL::route('admin_permission') }}" class="btn btn-success" >View All</a>
			</div>
		    {!! Form::close() !!}
		    </div>

                     <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Permission List</div>
                                <div class="actions"><a class="btn btn-sm btn-info" href="{{ URL::route('admin_permission_create') }}"><i class="fa fa-edit"></i>&nbsp;
                                    Add New Permission</a></div>
                            </div>
                            <div class="portlet-body">
                                                                <div id="flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed cf">
                                        <thead class="cf">
                                        <tr>
                                            <th>Permission Name</th>
                                            <th>Display Name</th>
                                            <!--<th>Status</th>-->
                                            <th class="numeric">Action</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @if($lists->count() > 0)
								@foreach($lists AS $r)
								<tr>     
                                                                        
                                                                        <td>{{$r->name}}</td>
									<td>{{$r->display_name}}</td>
									<!--<td>{{$r->status}}</td>-->
									
                                                                       <td>
									
									<a class="btn btn-info" href="{{ URL::route('admin_permission_edit',$r->id) }}" title="Edit" ><i class="fa fa-edit"></i>
									</a>
									<a class="btn btn-danger" href="{{ URL::route('admin_permission_delete',$r->id) }}" title="Delete" onclick="return confirm('Are you sure! Do you want to delete this permission?');" >
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