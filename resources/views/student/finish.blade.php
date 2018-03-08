@extends('default.template')

@section('styles')
<style type="text/css">
	.border{
		width: 100%;
	clear: both;
	border-top: 2px solid #000;
	border-bottom: 2px solid #000;
	color: #fff;
	}
	.border h1 {
		font-weight: bold;

	}
	.border h2 {
		font-weight: bold;
	}
	.border h3 {
		font-weight: bold;

	}
	body{
		background: #2980b9;
	}

	#contentMe{
		background: #fff;
	}
	.badge{
		background: #3498db !important;
	}

	.iline {

		float: left;

	}

	h3.iline {
		margin-left: 50px;
		margin-top: 50px;

	}
</style>
@endsection

@section('contents')
<div class="container">
	<div>
		<p class="text-left iline">
			<img src="{{URL::to('images/logo.png')}}" width="120px">
		</p>
		<h3 class="iline" style="color: #fff;">Negros Oriental State University Bais City Campus </h3>
	</div>
	<div class="border" >
		<h1>C.A.R.E. CENTER</h1>
		<h2>COUNSELING*ASSESMENT*RESOURCES*ENHANCEMENT</h2>
		
	</div>
	<br>
	<div class="col-md-6 col-md-offset-3">
		<h3 style="color: #fff" class="text-center">Enter Admin Credentials</h3>
		<form action="{{route('student_to_rating')}}" method="POST">
			<div class="form-group">
				<input type="password" name="credential" class="form-control" required="">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
				{{csrf_field()}}
			</div>
		</form>
		
	</div>
	
</div>

@endsection

@section('scripts')

@endsection