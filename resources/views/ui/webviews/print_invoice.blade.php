<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<style>
			
body{margin-top:20px;
background:#eee;
}




/**    17. Panel
 *************************************************** **/
/* pannel */
.panel {
	position:relative;

	background:transparent;

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;

	-webkit-box-shadow: none;
	   -moz-box-shadow: none;
			box-shadow: none;
}
.panel.fullscreen .accordion .panel-body,
.panel.fullscreen .panel-group .panel-body {
	position:relative !important;
	top:auto !important;
	left:auto !important;
	right:auto !important;
	bottom:auto !important;
}
	
.panel.fullscreen .panel-footer {
	position:absolute;
	bottom:0;
	left:0;
	right:0;
}


.panel>.panel-heading {
	text-transform: uppercase;

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;
}
			.table td, .table th {
  padding: .75rem;
  vertical-align: top;
  border-top: 1px solid #fff !important;
}
.panel>.panel-heading small {
	text-transform:none;
}
.panel>.panel-heading strong {
	font-family:Arial,Helvetica,Sans-Serif;
}
.panel>.panel-heading .buttons {
	display:inline-block;
	margin-top:-3px;
	margin-right:-8px;
}
.panel-default>.panel-heading {
	padding: 15px 15px;
	background:#fff;
}
.panel-default>.panel-heading small {
	color:#9E9E9E;
	font-size:12px;
	font-weight:300;
}
.panel-clean {
	border: 1px solid #ddd;
	border-bottom: 3px solid #ddd;

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;
}
.panel-clean>.panel-heading {
	padding: 11px 15px;
	background:#fff !important;
	color:#000;	
	border-bottom: #eee 1px solid;
}
.panel>.panel-heading .btn {
	margin-bottom: 0 !important;
}

.panel>.panel-heading .progress {
	background-color:#ddd;
}

.panel>.panel-heading .pagination {
	margin:-5px;
}

.panel-default {
	border:0;
}

.panel-light {
	border:rgba(0,0,0,0.1) 1px solid;
}
.panel-light>.panel-heading {
	padding: 11px 15px;
	background:transaprent;
	border-bottom:rgba(0,0,0,0.1) 1px solid;
}

.panel-heading a.opt>.fa {
    display: inline-block;
    font-size: 14px;
    font-style: normal;
    font-weight: normal;
    margin-right: 2px;
    padding: 5px;
    position: relative;
    text-align: right;
    top: -1px;
}

.panel-heading>label>.form-control {
	display:inline-block;
	margin-top:-8px;
	margin-right:0;
	height:30px;
	padding:0 15px;
}
.panel-heading ul.options>li>a {
	color:#999;
}
.panel-heading ul.options>li>a:hover {
	color:#333;
}
.panel-title a {
	text-decoration:none;
	display:block;
	color:#333;
}

.panel-body {
	background-color:#fff;
	padding: 15px;

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;
}
.panel-body.panel-row {
	padding:8px;
}

.panel-footer {
	font-size:12px;
	border-top:rgba(0,0,0,0.02) 1px solid;
	background-color:rgba(0255,255,255,1);

	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;
}
		</style>
	</head>
	<body>
<div class="container bootstrap snippets bootdey">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6 col-sm-6 text-left">
					<h2><strong> Invoice</strong></h2>
				</div>
				<!--<div class="col-md-6 col-sm-6 text-right">
					<img src="{{asset('barcodes.png')}}" class="" style="height:100px;width:100%;">
				</div>-->
			</div>
			<div class="row mt-2">
				<div class="col-md-8 col-sm-8 text-left">
					
					<ul class="list-unstyled">
						
						<li><strong>Invoice Number:</strong> &nbsp;&nbsp;&nbsp;&nbsp;A1/GST/2023/0{{$order->id}} </li>
						<li><strong>Order Number:</strong> &nbsp;&nbsp;&nbsp;&nbsp; @if($order != null){{$order->id}} @endif</li>
						<li><strong>Nature of Transaction:</strong> &nbsp;&nbsp;&nbsp;&nbsp;Online</li>
						<!--<li><strong>Place of Supply:</strong> &nbsp;&nbsp;&nbsp;&nbsp;@if($userDetail != null) {{@$userDetail->state}} @endif</li>-->
						 
					</ul>
				</div>
	<div class="col-md-1 col-sm-1 text-left">
				</div>
				<div class="col-md-3 col-sm-3 text-left">
					<!--<h4><strong>Payment</strong> Details</h4> -->
					<ul class="list-unstyled">
						@if($order != null)
						  <?php $createat=explode(" ",$order->created_at)?>
						 
						<li><strong>Invoice Date:</strong> {{$createat[0]}}</li>
					 	<li><strong>Order Date:</strong> {{$createat[0]}}</li>
					<!-- <li><strong>Nature of Supply:</strong> 
						
						 <?php $prodv= date('Y-m-d', strtotime($createat[0]. ' + 12 day')); 
                                        // echo $prodv;
                                
                                ?></li>-->
					 @endif
					</ul>

				</div>

			</div>
			
			<div class="row"  style="border-top:5px solid black;">
				
				<div class="col-md-6 col-sm-6 text-left mt-3 mb-3">
					<h4 >Bill to </h4>
					  
					<h6><br>Email : {{Auth::user()->email}}<br>
					 </h6>
					 
					<!--	<h5 class=" mt-3"><strong>Bill From</strong></h5>
					<h6>No 20 1st cross 1st main jayanagar 1st block someshwar nagar bangalore 11</h6>-->
				</div>
				<div class="col-md-6 col-sm-6 text-left mt-3">
					<!--	<h4 class="mt-5"><strong>Customer Type: </strong>Registered</h4>
					<h5 class=" mt-5"><strong>Ship From</strong></h5>
				<h5>No 20 1st cross 1st main jayanagar 1st block someshwar nagar bangalore 11</h5>-->
					
				</div>
				
			</div>

			<div class="table-responsive " style="border-top:5px solid black;">
				<table class="table table-condensed nomargin">
					<thead>
						<tr>
							 <th>S.No</th>
							
							<th>Designation</th>
						 	<th>Qty</th>
							 
							<th>Total</th>
							 
						</tr>
					</thead>
				<tbody>
				
				 <?php    $total=00;
                       $subtotal=00;
                       $toda=00;
                       $totall=00;
					$totals =00;
				$sa=0;
				$countd=0;
				 $pris=0;
					$samad=0;
                       ?>
                   @if($orderd != "[]")        
			 @foreach($orderd as $key=>$item)  
					@php 
									$productsize=DB::table('product_size')->where('id',$item->size_id)->first();
								//	dd($order);
									$productname=DB::table('products')->where('id',$item->product_id)->first();// dd($par); 
									@endphp
										@php $productcolor=DB::table('product_color')->where('id',$item->color_id)->first(); 
								@endphp
				
				 
						 
							<tr>
						    <td>{{$key+1}}</td>
								<td><div><strong>{{@$productname->name}}</strong><br> <?php $sa=0; $sama=0;
	$damsa=DB::table('sub_order')->where('order_id',$item->order_id)->where('product_id',$productname->id)->where('user_id',Auth::user()->id)->first();  
										$esx=explode(",",$damsa->sub_product);
										
										// dd($esx);	?>
										@if($esx != null)
										@foreach($esx as $key=>$dam)
												 
										<?php $brands=DB::table('sub_product')->where('product_name',$dam)->first();  //dd($brands); ?>
									@if($brands != null)   <strong>  {{$brands->product_name}} </strong> 
												<?php $sama +=$brands->price; //echo($sa);?>
												@endif
										@endforeach	
										@endif</div>
								</td>
								
							  <td>{{@$item->quantity}} </td>
							<td>Rs {{$productname->offer_price * @$item->quantity + $sama }}
								
									
					<?php	 $pris+=$item->quantity*$productname->offer_price; ?>
										 
                <?php    
               
                ?>
								 <?php $samad +=$sama;?>
								</td>
							 	  
								  
						</tr>
				 
				<?php $countd++; ?>
				@endforeach
				@endif
				</tbody>
			</table>
				@if($order != null)
				<table  class="table table-condensed nomargin">
					<tbody>
						<tr style="border-top:4px solid #000; border-bottom:4px solid #000;margin:30px;">
							<td  colspan="3">
								<div class="text-right"><strong>Total</strong></div>
								 
							</td>
							  
									 
									<td class="text-center">Rs {{$pris+$samad }}</td>
						</tr>
						 
						<tr style="border-top:4px solid #000; margin:30px;">
							<td colspan="3"> <h5 class="text-right"> <strong>Rewards:</strong></h5> </td>
							<td class="text-center">Rs  {{$order->wallet}}</td>
								</tr>
							<tr  style="border-top:2px solid #000;">
								<td colspan="3" >  <h5 class="text-right" ><strong>Amount to be Paid:</strong></h5> </td >
								<td class="text-center" >Rs <?php $sa=$pris-$order->wallet+$samad; ?> {{$sa}} </td>
							
						</tr>
						 
					</tbody>
				</table>
				@endif
			</div>

			<hr class="nomargin-top">
	 
			 
		</div>
	</div>
 
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>



