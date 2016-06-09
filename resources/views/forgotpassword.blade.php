@extends('app')
@section('content')
<div class="col-sm-3 col-md-3">
		<div class="page-form">
				@if(Session::has('errorMessage'))            
						<div class="alert alert-danger">
								<ul><li>{{ Session::get('errorMessage') }}</li></ul>
						</div>
				@endif
				@if(Session::has('succMessage'))            
						<div class="note note-success">
								<p>{{ Session::get('succMessage') }}</p>
						</div>
				@endif
				{!! Form::open(array('route' => 'do_forgotpassword', 'class' => 'form-validate','novalidate','id' => 'login_form')) !!}
						<div class="header-content logofmr">Give your Email Id:</div>
						<div class="body-content">
								<div class="form-group">
										<div class="input-icon right">
												<i class="fa fa-user"></i>
												<input type="email" placeholder="Email" name="email" class="form-control required email" value="">
										</div>
								</div>
								<div class="form-group">
										<button type="submit" class="btn btn-success">
												Get Password&nbsp;<i class="fa fa-chevron-circle-right"></i>
										</button>
										<a class="investor" data-toggle="modal" data-target="#myModal">Log In</a>
								</div>
								<div class="clearfix"></div>
								<hr>
						</div>
				{!! Form::close() !!}
		</div>
</div>
@endsection