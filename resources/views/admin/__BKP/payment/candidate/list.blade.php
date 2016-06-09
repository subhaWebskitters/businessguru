@extends('admin/layout')

@section('title', 'Car Model list')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Candidate Payment</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-shopping-cart"></i>&nbsp;
                    <a href="javascript:void(0);">Candidate Payment</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
			@if (count($errors) > 0)
				    <div class="alert alert-danger">
						<ul>
							    @foreach ($errors->all() as $error)
									    <li>{{ $error }}</li>
							    @endforeach
						</ul>
				    </div>
			@endif
			@if(Session::has('succmsg'))
					<div class="note note-success"><p><strong>Well done!</strong> {{ Session::get('succmsg') }}</p></div>
			@endif
			<div class="col-lg-12">
			<div class="portlet">
		    {!! Form::open(array('route'=>'admin_candidate_payment','method'=>'post','class'=>'form-validate','novalidate')) !!}
<div class="row">
			<div class="col-lg-3">
				<div class="form-group">
				     <div class="input-icon right"><i class="fa fa-search"></i>
					 {!! Form::text('keyword',$keyword,array('class'=>"form-control", "placeholder"=>"Enter The Keyword")) !!}
				     </div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
				     <div class="input-icon right"><i class="fa fa-search"></i>
					 {!! Form::text('amount',$amount,array('class'=>"form-control", "placeholder"=>"Enter Amount")) !!}
				     </div>
				</div>
			</div>
			<div class="col-lg-6">
				<input type="submit" name="search" value="Search" class="btn btn-danger" />
				<a href="{{ URL::route('admin_candidate_payment') }}" class="btn btn-success" >View All</a>
			</div>
				</div>
			{!! Form::close() !!}
			</div>

				<div class="portlet box portlet-orange">
						<div class="portlet-header">
								<div class="caption">Payment List</div>
						</div>
						<div class="portlet-body">
								<div id="flip-scroll">
										<table class="table table-bordered table-striped table-condensed cf no-more-tables">
												<thead class="cf">
													    <tr>
															<th>Candidate Name</th>
															<th>Amount</th>
															<th>transection Id</th>
															<th>Payment Status</th>
															<th>payment Date</th>
													    </tr>
												</thead>
												<tbody>
													    @if($lists->count() > 0)
															    @foreach($lists AS $r) 
																	    <tr>     
																	    <td data-title="Candidate Name">{{$r->first_name .' '.$r->last_name }}</td>
																	    <td data-title="Amount">{{$r->payment_amount}}</td>
																	    <td data-title="transection Id">{{$r->transection_id}}</td>
																	    <td data-title="Payment Status">{{$r->payment_status}}</td>
																	    <td data-title="payment Date">{{date('d-m-Y',strtotime($r->payment_date))}}</td>
				    
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