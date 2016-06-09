@extends('admin/layout')

@section('title', 'Email Template edit')

@section('content')
    <div class="page-title-breadcrumb" id="title-breadcrumb-option-demo">
                <div class="page-header pull-left">
                    <div class="page-title">Email Template</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                    <i class="fa fa-building"></i>&nbsp;
                    <a href="{{ URL::route('admin_emailtemplate') }}">Email Template</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li>
                    <i class="fa fa-info"></i>&nbsp;
                    <a href="javascript:void(0);">Edit</a>&nbsp;&nbsp;
                    </li>
                 
                </ol>
                <div class="clearfix"></div>
            </div>
<div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
		    <div class="panel panel-yellow">
                            <div class="panel-heading">Email Template edit</div>
                            <div class="panel-body pan">                                    
                                    {!! Form::open(array('route'=>array('admin_emailtemplate_update_action',$details->id),'class'=>'form-horizontal form-validate')) !!}
                                    <div class="form-body pal">
                                                @if (count($errors) > 0)
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                @endif
				        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Title</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                          {!! Form::text('title',$details->title,array('class'=>'form-control required','placeholder'=>'Enter Template Title','id'=>'title' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-group"><label class="col-md-3 control-label" for="inputName">Subject</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                          {!! Form::text('mail_subject',$details->mail_subject,array('class'=>'form-control required','placeholder'=>'Enter Mail Subject','id'=>'mail_subject' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group"><label class="col-md-3 control-label" for="inputName">Body</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                         {!! Form::textarea('mail_body',$details->mail_body,array('class'=>'form-control required ckeditor','placeholder'=>'Enter Mail Body','id'=>'mail_body' ))!!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Status</label>

                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                            {!! Form::select('status',['Active' => 'Active','Inactive' => 'Inactive'],$details->status,array('class'=>'form-control required','id'=>'status' ))!!}
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group"><label class="col-md-3 control-label" for="inputName">Dynamic Variable</label>
                                           <div class="col-md-9">
                                               <div class="input-icon right" style="padding-top:7px;">
                                                    @foreach (explode(',', $details->dynamic_variable) as $value)
                                                    <strong>{{ $value }}</strong><br>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>        
                                              
                                      </div>
                                    <div class="form-actions pal">
                                        <div class="form-group mbn">
                                            <div class="col-md-offset-3 col-md-6">
                                            {!! Form::submit('Submit',array('class'=>'btn btn-primary' )) !!}&nbsp;&nbsp;
                                            {!! Html::linkRoute('admin_emailtemplate', 'Back', array(), array('class' => 'btn btn-default')) !!}
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                            </div>
                        </div>
                     
                         </div>
                </div>
            </div>
		
@endsection