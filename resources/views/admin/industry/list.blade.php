@extends('admin/layout')

@section('title', 'Industry List')

@section('content')
    
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Industry List</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li>
            <i class="fa fa-home"></i>&nbsp;
            <a href="javascript:void(0);">Industry</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
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
		      <div class="col-lg-12">
                <div class="form-body pal">
                @if(Session::has('sucMsg'))
                    <p class="text-green">{{Session::get('sucMsg')}}</p>
                @endif
                    {{Form::open(array('route'=>'industries_list','class'=>'form-validate','id'=>'searchForm') )}}
                        <div class="col-lg-3">
                           <div class="form-group">
                                <div class="input-icon right"><i class="fa fa-group"></i>
                              <input type="text" name="search" placeholder="Search" id="search" class="form-control">
                                </div>
                           </div>
                        </div>
             
                        <div class="col-lg-3">
                           <input type="submit" class="btn btn-danger" value="Search" name="submit">
                           <button id="show_all" type="button" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Show All</button>
                        </div>
                    {{Form::close()}}
                    {{ Html::linkRoute('industry_add','Add New Industry',array(),array('class' => 'btn btn-info') ) }}
                </div>
                <div class="portlet box portlet-orange">
                    <div class="portlet-header">
                        <div class="caption">Industry List</div>
                            <div class="actions"></div>
                        </div>
                        <div class="portlet-body">
                            <div id="flip-scroll">
                                <table class="table table-bordered table-striped table-condensed cf">
                                    <thead class="cf">
                                        <tr>
                                            <th>Industry Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($industry_list->count() > 0)
                                    @foreach( $industry_list as $industry)
                                        <tr>
                                            <td>{!! $industry['industry_name']!!}</td>
                                            <td>{!! $industry['status']!!}</td>
                                            <td>
                                                
                                                <a title="edit" class="tablectrl_small bDefault tipS" href="{{URL::route('industry_edit',$industry['id'])}}">
                                                    <button class="btn btn-success btn-xs" type="button"><i class="fa fa-pencil"></i>&nbsp;
                                                        edit 
                                                    </button>
                                                </a>
                                                <a title="delete" class="tablectrl_small bDefault tipS" href="#">
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
                                <div class="pagination-panel">{!! $industry_list->appends($search)->render() !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">
	    $('#show_all').click(function(){
            alert('sss');
			//$('#search').val('');    
			//$('#searchForm').submit();
	    });
</script>
@endsection