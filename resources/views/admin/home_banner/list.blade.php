@extends('admin/layout')    
@section('content')  
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
<!--                <div class="form-body pal">
                    {!! Form::open(array('route'=>'admin','method'=>'get','class'=>'form-validate','novalidate')) !!}
                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    {!! Form::text('keyword','',array('class'=>"form-control", 'id'=>"start_date","placeholder"=>"Enter The Keyword")) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class="input-icon right">
                                    <i class="fa fa-check"></i>
                                    {!! Form::select('status_search',[''=>'Select Status', 'Active'=>'Active', 'Inactive'=>'Inactive'], '', array('class'=>"form-control", 'id'=>"status_search")) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <input type="submit" name="submit" value="Search" class="btn btn-danger" />
                            <a href="{{ URL::route('admin') }}" class="btn btn-success" >View All</a>
                        </div>
                    {!! Form::close() !!}   
                </div>
                
                
-->

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
                        <div class="caption">Discover Banner List</div>
                        <div class="actions">
                            <a class="btn btn-sm btn-info" href="{{ URL::route('addbanner') }}">
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
                                       <!-- <th>#</th>-->
                                        <th>Banner Image</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach( $images as $image )
                                        <tr>
                                            <!--<td>{{$image->order}}</td>-->
                                            <td><img src="{{ asset('/upload/homeBanner/thumb/'.$image->bannerimage) }}" alt="" /></td>
                                            <td>{{$image->banner_title}}</td>
                                            <td>
                                                <!--
                                                @if($image->status == 'Active')
                                                    <label onclick="javascript:statusModifier('candidate',this)" data-team='{{$image->id}}' class="btn btn-success" title="Active">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </label>
                                                @elseif($image->status == 'Inactive')
                                                    <label onclick="javascript:statusModifier('candidate',this)" data-team='{{$image->id}}' class="btn btn-primary" title="Inactive">
                                                        <i class="glyphicon glyphicon-remove-sign"></i>
                                                    </label>
                                                @endif
                                                -->                       
                                                <a class="btn btn-info" href="{{ URL::route('editbanner',$image->id) }}" title="Edit" >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                
                                                <a class="btn btn-danger" href="{{ URL::route('delbanner',$image->id) }}" title="Delete" onclick="return confirm('Are you sure! Do you want to delete this image?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                        
                                    @endforeach
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