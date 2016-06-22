@extends('admin/layout')

@section('title', 'Business Proposal list')

@section('content')
<div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
<div class="page-header pull-left">
<div class="page-title">Business Proposal List</div>
</div>
<ol class="breadcrumb page-breadcrumb pull-right">
<li>
<i class="fa fa-group"></i>&nbsp;
<a href="javascript:void(0);">Business Proposal</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
{!! Form::open(array('route'=>'business_proposal','method'=>'post','class'=>'form-validate','novalidate','id'=>'searchForm')) !!}

<!--<div class="col-lg-3">
<div class="form-group">
<div class="input-icon right"><i class="fa fa-group"></i>
{!! Form::text('search',$search,array('class'=>"form-control", 'id'=>"search","placeholder"=>"Search")) !!}
</div>
</div>
</div>-->
<!--<div class="col-lg-3">
<div class="form-group">
<div class="input-icon right"><i class="fa fa-calendar"></i>

</div>
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<div class="input-icon right"><i class="fa fa-calendar"></i>

</div>
</div>
</div>-->

<div class="col-lg-3">
<div class="form-group">
<div class="input-icon right">
<i class="fa"></i>
{!! Form::select('status_search',[''=>'Select Status', 'Requested'=>'Requested', 'Approval'=>'Approval'], $status_search, array('class'=>"form-control", 'id'=>"status_search")) !!}
</div>
</div>
</div>

<div class="col-lg-3">
<input type="submit" name="submit" value="Search" class="btn btn-danger" />
<a href="{{ URL::route('business_proposal') }}" class="btn btn-success" >View All</a>
</div>
{!! Form::close() !!}
</div>
<br>




<div class="portlet box portlet-orange">
<div class="portlet-header">
<div class="caption">Business Proposal List</div>
<div class="actions"></div>
</div>
<div class="portlet-body">
<div id="flip-scroll">
<table class="table table-bordered table-striped table-condensed cf">
<thead class="cf">
<tr>

<th>Investor name</th>
<th>Business Name</th>
<th>Status</th>

<th class="numeric">Action</th>                                           
</tr>
</thead>
	    <tbody>
			    @if($results->count() > 0)
					    @foreach($results AS $r)
							    @if(count($r->get_investor_detail()->first())>0)
									    {{--*/ $name = $r->get_investor_detail()->first()['name'];  /*--}}
							    @else
									    {{--*/ $name = 'NA';  /*--}}
							    @endif
							    
							    @if(count($r->get_business_detail()->first())>0)
									    {{--*/ $businessname = $r->get_business_detail()->first()['business_name'];  /*--}}
							    @else
									    {{--*/ $businessname = 'NA';  /*--}}
							    @endif
							    <tr>
									    <td>{{$r->Investor->name}}</td>
									    <td>{{$r->Business->business_name}}</td>
									    <td class='status-{{$r->id}}'>
											    @if($r->status == 'Requested')
													    <a href="javascript:void(0);" class="btn btn-default btn-xs btn-warning"><i class="fa"></i>Requested</a>
											    @else($r->status == 'Approval')
													    <a href="javascript:void(0);" class="btn btn-default btn-xs btn-success"><i class="fa"></i>Approved</a>					
											    @endif 
									    </td>
									    <td>
											    @if($r->status=='Requested')
													    <label onclick="javascript:statusEditor('business_proposal',this)" data-team='{{$r->id}}' class="btn btn-warning" title="Requested">
															    <i class="fa fa-check-square-o"></i>
													    </label>
	    
													    <!--<label onclick="javascript:statusEditor('business_proposal',this)" data-team='{{$r->id}}' class="btn btn-success" title="Approval">
													    <i class="fa fa-check-square-o"></i>
													    </label>-->
											    @endif																							
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

$('#search').val('');    
$('#searchForm').submit();
});
</script>		
@endsection