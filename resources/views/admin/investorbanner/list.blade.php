@extends('admin/layout')    
@section('content')  
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('errmsg'))
                    <div class="alert alert-danger">{{Session::get('errmsg') }}</div>
                @endif
                @if(Session::has('succmsg'))
                    <div class="note note-success"><p>{{ Session::get('succmsg') }}</p></div>
                @endif
                <div class="portlet box portlet-orange">
                    <div class="portlet-header">
                        <div class="caption">Investor Banner List</div>
                        <div class="actions">
                            <a class="btn btn-sm btn-info" href="{{ URL::route('addinvestorbanner') }}">
                                <i class="fa fa-edit"></i>&nbsp;Add Banner
                            </a>
                        </div>
                    </div>
                    <div class="panel panel-green">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Banner Image</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($lists) > 0)
                                    @foreach( $lists as $list )
                                        <tr>
                                            <td><img src="{{ asset('/upload/investorBanner/thumb/'.$list->image) }}" alt="" /></td>
                                            <td>{{$list->title}}</td>
                                            <td>
                                                @if($list->status == 'Active')
                                                    <label class="btn btn-success" title="Active">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </label>
                                                @elseif($list->status == 'Inactive')
                                                    <label class="btn btn-primary" title="Inactive">
                                                        <i class="glyphicon glyphicon-remove-sign"></i>
                                                    </label>
                                                @endif
                                                
                                                <a class="btn btn-info" href="{{ URL::route('editinvestorbanner',$list->id) }}" title="Edit" >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                
                                                <a class="btn btn-danger" href="{{ URL::route('delinvestorbanner',$list->id) }}" title="Delete" onclick="return confirm('Are you sure! Do you want to delete this image?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                @else
                                <tr><td colspan="3">----No record found-----</td></tr>
                                @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection        