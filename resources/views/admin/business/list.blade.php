@extends('admin/layout')

@section('title', 'Business list')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Business List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-home"></i>&nbsp;
                    <a href="javascript:void(0);">Business</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
						{!! Form::open(array('route'=>'admin_business_users','method'=>'post','class'=>'form-validate','novalidate','id'=>'searchForm')) !!}
								<div class="col-lg-3">
										<div class="form-group">
												<div class="input-icon right">
														<i class="fa fa-group"></i>
														{!! Form::text('search',$search,array('class'=>"form-control", 'id'=>"search","placeholder"=>"Search")) !!}
												</div>
										</div>
								</div>
								<!--
								<div class="col-lg-3">
										<div class="form-group">
												<div class="input-icon right">
														<i class="fa fa-calendar"></i>
												</div>
										</div>
								</div>
								<div class="col-lg-3">
										<div class="form-group">
												<div class="input-icon right">
														<i class="fa fa-calendar"></i>
												</div>
										</div>
								</div>
								-->
								<div class="col-lg-3">
										<div class="form-group">
												<div class="input-icon right">
														<i class="fa"></i>
														{!! Form::select('status_search',[''=>'Select Status', 'Active'=>'Active', 'Inactive'=>'Inactive'], $status_search, array('class'=>"form-control", 'id'=>"status_search")) !!}
												</div>
										</div>
								</div>
								<div class="col-lg-3">
										<input type="submit" name="submit" value="Search" class="btn btn-danger" />
										<a href="{{ URL::route('admin_business_users') }}" class="btn btn-success" >View All</a>
								</div>
						{!! Form::close() !!}
				</div>
                     
										 
										 
										 
										 <div class="portlet box portlet-orange">
                            <div class="portlet-header">
                                <div class="caption">Business List</div>
                               <div class="actions"></div>
                            </div>
                            <div class="portlet-body">
                                    <div id="flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed cf">
                                        <thead class="cf">
                                        <tr>
					    <th>Email</th>
                                            <th>User Type</th>
					    <th>Business Name</th>
                                            <th>Website</th>
				            <th>Looking For</th>
                                            <th class="numeric">Action</th>                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @if($results->count() > 0)
						      
								@foreach($results AS $r)
								<tr>
									<td>{{$r->email}}</td>
									<td>{{$r->user_type}}</td>
									<td>{{$r->business_name}}</td>
									<td>{{$r->website}}</td>
									<td>{{$r->looking_for}}</td>
									<td>
									@if($r->status=='Active')
																												<label onclick="javascript:statusModifier('business_user',this)" data-team='{{$r->id}}' class="btn btn-success" title="Active"  >
																														<i class="fa fa-check-square-o"></i>
																												</label>
																										@elseif($r->status=='Inactive')
																												<label onclick="javascript:statusModifier('business_user',this)" data-team='{{$r->id}}' class="btn btn-primary" title="Inactive" >
																														<i class="glyphicon glyphicon-remove-sign"></i>
																												</label>
																										@endif
																										<a class="btn btn-info" href="{{ URL::route('admin_business_users_details',$r->id) }}" title="View" >
										    <i class="fa fa-edit"></i>
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

<script>
	    $('#show_all').click(function(){
	    alert('sss');
			$('#search').val('');    
			$('#searchForm').submit();
	    });
</script>		
@endsection