@extends('default.template')

@section('styles')
<style type="text/css">
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
</style>
@endsection

@section('contents')
<div class="container">
	<div class="border" >
		<h1>C.A.R.E. CENTER</h1>
		<h2>COUNSELING*ASSESMENT*RESOURCES*ENHANCEMENT</h2>
		
	</div>
	<div>
		<?php 
			echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG("4", "QRCODE") . '" alt="barcode"   width="200px"/>';
		 ?>
	</div>
	
</div>

@endsection

@section('scripts')

@endsection