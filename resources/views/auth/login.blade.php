@extends('default.template')

@section('styles')
<style type="text/css">
	.well {
		margin-top: 10%;
		border-radius: 10px;
		opacity: 0.9;
	}
	p img {
		margin-top: -60px;
	}

	body{
		background: #3498db;
	}
	#studentRes{
		margin-top: 2%;
		
	}
	#studentRes a {
		color: grey !important;
	}
</style>
@endsection

@section('contents')

<div class="container">
	<div class="col-md-6 col-md-offset-3 well">
		<p class="text-center">
			<img src="{{URL::to('images/logo.png')}}" width="120px">
		</p>
		<h3 class="text-center">Enter Credentials</h3>
		@if(Session::has('error'))
			<div class="alert alert-danger">
				<p class="text-center">{{Session::get('error')}}</p>
			</div>
		@endif	
		<form action="{{route('lock_check')}}" method="POST">
			<div class="form-group {{$errors->has('credit') ? 'has-error' : ''}}">
				<input type="password" name="credit" class="form-control">
				@if($errors->has('credit'))
					<span class="help-block">{{$errors->first('credit')}}</span>
				@endif	
			</div>
			<div class="form-group ">
				<input type="hidden" name="password" class="form-control" value="login">
				
			</div>
			<div class="form-group">
				{{csrf_field()}}
				<button type="submit" class="btn btn-primary btn-block btn-lg">Sign-In</button>
				<p class="text-center" id="studentRes">
					<a href="{{route('qr_scanner')}}" >Student Result</a>
				</p>
				
			</div>
		</form>
	</div>
</div>
@endsection

@section('scripts')

@endsection