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

	div {

		color: #fff;

	}


	button {

		margin-top: 30px;

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
	<div>
		<h2>Student Rating Below</h2>
	</div>
	<div class="row">
		<form action="{{route('student_qrcode')}}" method="POST">
		<div class="col-md-4">
			<p>Average (40%)</p>
			<select name="average" class="form-control">
				<option value=".40">.40</option>
								<option value=".39">.39</option>
								<option value=".38">.38</option>
								<option value=".37">.37</option>
								<option value=".36">.36</option>
								<option value=".35">.35</option>
								<option value=".34">.34</option>
								<option value=".33">.33</option>
								<option value=".32">.32</option>
								<option value=".31">.31</option>
								<option value=".30">.30</option>
								<option value=".29">.29</option>
								<option value=".28">.28</option>
								<option value=".27">.27</option>
								<option value=".26">.26</option>
								<option value=".25">.25</option>
								<option value=".24">.24</option>
								<option value=".23">.23</option>
								<option value=".22">.22</option>
								<option value=".21">.21</option>
								<option value=".20">.20</option>
								<option value=".19">.19</option>
								<option value=".18">.18</option>
								<option value=".17">.17</option>
								<option value=".16">.16</option>
								<option value=".15">.15</option>
								<option value=".14">.14</option>
								<option value=".13">.13</option>
								<option value=".12">.12</option>
								<option value=".11">.11</option>
								<option value=".10">.10</option>
								<option value=".09">.09</option>
								<option value=".08">.08</option>
								<option value=".07">.07</option>
								<option value=".06">.06</option>
								<option value=".05">.05</option>
								<option value=".04">.04</option>
								<option value=".03">.03</option>
								<option value=".02">.02</option>
								<option value=".01">.01</option>
			</select>
		</div>
		<div class="col-md-4">
			<p>Communication Skills (20%)</p>
			<select name="commu" class="form-control">
				<option value=".20">.20</option>
								<option value=".19">.19</option>
								<option value=".18">.18</option>
								<option value=".17">.17</option>
								<option value=".16">.16</option>
								<option value=".15">.15</option>
								<option value=".14">.14</option>
								<option value=".13">.13</option>
								<option value=".12">.12</option>
								<option value=".11">.11</option>
								<option value=".10">.10</option>
								<option value=".09">.09</option>
								<option value=".08">.08</option>
								<option value=".07">.07</option>
								<option value=".06">.06</option>
								<option value=".05">.05</option>
								<option value=".04">.04</option>
								<option value=".03">.03</option>
								<option value=".02">.02</option>
								<option value=".01">.01</option>
			</select>
		</div>
		<div class="col-md-4">
			<p>Interest (10%) </p>
			<select name="interest" class="form-control">
				<option value=".10">.10</option>
								<option value=".09">.09</option>
								<option value=".08">.08</option>
								<option value=".07">.07</option>
								<option value=".06">.06</option>
								<option value=".05">.05</option>
								<option value=".04">.04</option>
								<option value=".03">.03</option>
								<option value=".02">.02</option>
								<option value=".01">.01</option>
			</select>
		</div>

		<div class="col-md-4">
			<p>Special Skills (5%) </p>
			<select name="special" class="form-control">
				<option value=".05">.05</option>
								<option value=".04">.04</option>
								<option value=".03">.03</option>
								<option value=".02">.02</option>
								<option value=".01">.01</option>
			</select>
		</div>
		<div class="col-md-4">
			<p>Personality (20%)</p>
			<select name="personality" class="form-control">
				<option value=".20">.20</option>
								<option value=".19">.19</option>
								<option value=".18">.18</option>
								<option value=".17">.17</option>
								<option value=".16">.16</option>
								<option value=".15">.15</option>
								<option value=".14">.14</option>
								<option value=".13">.13</option>
								<option value=".12">.12</option>
								<option value=".11">.11</option>
								<option value=".10">.10</option>
								<option value=".09">.09</option>
								<option value=".08">.08</option>
								<option value=".07">.07</option>
								<option value=".06">.06</option>
								<option value=".05">.05</option>
								<option value=".04">.04</option>
								<option value=".03">.03</option>
								<option value=".02">.02</option>
								<option value=".01">.01</option>
			</select>
		</div>
		<div class="col-md-4">
			<p>Bearing (5%) </p>
			<select name="bearing" class="form-control">
				<option value=".05">.05</option>
								<option value=".04">.04</option>
								<option value=".03">.03</option>
								<option value=".02">.02</option>
								<option value=".01">.01</option>
			</select>
		</div>

		<div class="col-md-4 col-md-offset-4" id="btnSubmit">
			<button type="submit" class="btn btn-primary btn-block btn-lg">SUBMIT</button>
			{{csrf_field()}}
		</div>
		</form>
	</div>
	
</div>

@endsection

@section('scripts')

@endsection