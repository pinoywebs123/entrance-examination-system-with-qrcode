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
	span{
		font-size: 90px;
		color: #2980b9;
	}
</style>
@endsection

@section('contents')

<div class="container">
	<div class="col-md-6 col-md-offset-3 well">



		<p class="text-center">
			<span class="glyphicon glyphicon-qrcode"></span>
		</p>
		<h3 class="text-center">Scan QR-Code</h3>
		
		
			<div class="form-group ">
				<input type="text" name="qr" class="form-control" autofocus="" id="qr">
					
			</div>
			
			
		
	</div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
      var token = '{{Session::token()}}';
      var url = '{{route("qr_scanner_check")}}';
     
      $(document).ready(function(){

        $("#qr").keyup(function(){
          
           var qr = $("#qr").val();
           

          

         $.ajax({
            method : 'POST',
            url : url,
            data: {qr: qr ,_token : token}

         }).done(function(message){
          var data = message['message'];
            if(data == 1){
            	window.location = "{{route('student_result')}}?qr="+qr ;
            }

            
           

         });

        });


       
      });
    </script>
@endsection