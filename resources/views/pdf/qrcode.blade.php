<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>NORSU BCC Entrance Examination</title>
        
        <style type="text/css">
        @page { size: 500pt 420pt; }
	.border{
		width: 100%;
	clear: both;
	border-top: 2px solid #000;
	border-bottom: 2px solid #000;
	
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


	.iline {

		float: left;


	}

	h3.iline {

		margin-left: 20px;

	}
	#aw{
		width: 80px;
		height: 80px;
	}

</style>

    </head>
    <body>
    	<p class='iline'>
    		<img src="{{URL::to('images/logo.png')}}" width="80px">

    	</p>
    	<h3 class='iline'>Negros Oriental State University Bais Campus</h3>
      <div class="border" >
		<h2>C.A.R.E. CENTER</h2>
		<h3>COUNSELING*ASSESMENT*RESOURCES*ENHANCEMENT</h3>
		
	</div>
	<br>
	<p>Date: <?php echo date("Y/m/d");?></p>
	<br>
	<div id="aw">
		<?php 
			echo DNS2D::getBarcodeHTML($ran, "QRCODE",3,3);


		 ?>
	</div>
    </body>
    
   
</html>
