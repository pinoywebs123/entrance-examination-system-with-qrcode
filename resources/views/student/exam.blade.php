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
		;
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
	<div class="container">
		
	</div>
	<div class="container" id="contentMe">
		<div class="pull-right">
			<h3 class="text-center">Time Remaining: </h3>
	         <h3 class="center"><div id="countdowntimer" class="text-center">&nbsp;</div></h3>
		</div>
		<div class="pull-left">
			<h3>Question <span class="badge">{{$find->id}}</span> of {{$count}}</h3>
		</div>
		<br>
		<br>
		<br>
		<br>

		<h3 class="text-center">{{$find->question}} ? </h3>
		@if(Session::has('err'))
			<div class="alert alert-danger">
				<h5 class="text-center">{{Session::get('err')}}</h5>
			</div>
		@endif
		<br>
		<div class="col-md-6 col-md-offset-3" id="choicesMe">
		<h3>Choose your answer below.</h3>
		@if($count == $find->id)
			<form action="{{route('student_exam_finish', ['id'=> $find->id])}}" method="POST">
			<div class="form-group">
				<input type="radio" name="answer" value="{{$find->a}}"> {{$find->a}}<br>
			</div>
			<div class="form-group">
				<input type="radio" name="answer" value="{{$find->b}}"> {{$find->b}}<br>
			</div>
			<div class="form-group">
				<input type="radio" name="answer" value="{{$find->c}}"> {{$find->c}}<br>
			</div>
			<div class="form-group">
				<input type="radio" name="answer" value="{{$find->d}}"> {{$find->d}}<br>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" onclick='submitbutton()'>Finish</button>
				{{csrf_field()}}
			</div>
		</form>
		@else
			<form action="{{route('student_exam_starting', ['id'=> $find->id])}}" method="POST">
			<div class="form-group">
				<input type="radio" name="answer" value="{{$find->a}}"> {{$find->a}}<br>
			</div>
			<div class="form-group">
				<input type="radio" name="answer" value="{{$find->b}}"> {{$find->b}}<br>
			</div>
			<div class="form-group">
				<input type="radio" name="answer" value="{{$find->c}}"> {{$find->c}}<br>
			</div>
			<div class="form-group">
				<input type="radio" name="answer" value="{{$find->d}}"> {{$find->d}}<br>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" onclick='submitbutton()'>Next</button>
				{{csrf_field()}}
			</div>
		</form>
		@endif
		
	</div>
	</div>
	
	
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	function questionRefresh() {

      var lasttimerem = document.querySelector('#countdowntimer').innerHTML;

      
      // AJAX for timeIsUp.php
      xmlhttp = new XMLHttpRequest();

      xmlhttp.open("GET","{{route('student_timer', ['id'=> $find->id])}}?timerem="+lasttimerem,true);
      xmlhttp.send();
  }

  document.body.onclick = function() {
    questionRefresh();
  };

  window.onbeforeunload = function(event)
    {
    	questionRefresh();
        return confirm("Confirm refresh");
    };

   var seconds = {{$find->time}};
  
  function submitbutton() {
  	questionRefresh();
  	window.onbeforeunload = null;

  }

  function timecountdown() {
  	if (seconds == 0) {
  		window.onbeforeunload=null;
  		window.location = "{{route('student_timeout', ['id'=> $find->id, 'answer'=> 'none'])}}" ;
      
  	}
    seconds--;
    document.querySelector('#countdowntimer').innerHTML = seconds;
    
  }


 
 
  setInterval(timecountdown, 1000);
</script>
@endsection