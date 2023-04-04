
<!DOCTYPE html>
<html>
<head>
	<title>invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<style>
	  
		.table td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

        .page-content {
		padding-left: 0 !important;
	}

	.cross-box {
		display: none;
	}

	.cross-box .cross-1:after,
	.cross-box .cross-1:before {
		position: absolute;
		content: "";
		top: 0;
		left: 50%;
		height: 100%;
		border-right: 2px solid red;
		z-index: 99;
	}

	.cross-box .cross-1:after {
		transform: rotateZ(45deg);
	}

	.cross-box .cross-1:before {
		transform: rotateZ(-45deg);
	}

	.cross-box .cancelled {
		position: absolute;
		top: 50%;
		left: 50%;
		font-size: 100px;
		opacity: 0.7;
		font-weight: bold;
		color: red;
		z-index: 99;
		transform: translate(-50%, -50%);
	}
	 
	</style>
</head>
<body>
<section class="dashboard-invoice">

<div class="container-fluid"  style="margin-top:10px; background:#f8f9fa; background-color:#f8f9fa;">
<div class="table-responsive position-relative" id="print">
<table style="border: 1px solid gray; width: 100%;  float: left; padding: 10px;">
		<tr style="width: 100%;"> 
			<td style="width: 100%;">
				<table style="width: 100%;">
					<tr style="width: 100%;">
						<td style="width: 50%; text-align: right; font-weight: bold; font-size: 1.17em;">Tax Invoice</td>
						<td style="width: 50%;  text-align: right;">Triplicate Copy</td>
					</tr>
				</table>
				<table style="width: 100%;">
					<tr style="width: 100%;">
						<td style="width: 50%; text-align: left; ">
							<h1 style="margin-top: 0px; margin-bottom: 0px;"> <div class="brand-title">
                        <a href="{{url('/')}}">Dinkachika </a>
                    </div>
                    </h1>
				        </td>
						<td style="width: 50%; text-align: right; ">
							<p style="margin-bottom: 0px; margin-top: 0px;"> Invoice No: A1/GST/2022/0{{$order->id}}</p>
							 
				            <p style="margin-bottom: 0px; margin-top: 0px;"> Invoice Date:{{$order->created_at}}</p>
				        </td>
					</tr>
				</table>
				<table style="width: 100%;">
					<tr style="width: 100%;">
						
					</tr>
					<tr style="width: 100%;">
						<td style="width: 100%; text-align: left; ">
							Sold By:
				        </td>
					</tr>
				</table>
				<table style="width: 100%;">
					<tr style="width: 100%;">
						<td style="width: 50%; text-align: left; ">
						  
						     <p style="margin-bottom: 0px; margin-top: 0px;"> 
                                   Address vendor
                                    <!--AmeysAlmuda<br> K-2/841 sangam  <br> vihar new delhir<br>-->
                                    <!--110062 -->
                                     <br>Email: inf@odinkachika .com</p>
                            	
				        </td>
				        <td style="width: 50%; text-align: right; ">
				            	<p style="margin-bottom: 0px; margin-top: 0px;">User Detail</p>
							<p style="margin-bottom: 0px; margin-top: 0px;">{{@$userDetail->name}}</p>
							<p style="margin-bottom: 0px; margin-top: 0px;">{{@$order->phone}}</p>
						
							<!--<p style="margin-bottom: 0px; margin-top: 0px;">Jyothinivas college Road</p>-->
							<!--<p style="margin-bottom: 0px; margin-top: 0px;">Opposite To Mec Donald’s ,</p>-->
							<!--<p style="margin-bottom: 0px; margin-top: 0px;">Koramanagala 5th Block </p>-->
							<!--	<p style="margin-bottom: 0px; margin-top: 0px;">Bangalore -560095</p>-->
				        </td>
					</tr>
				</table>
				<table style="width: 100%;">
					<tr style="width: 100%;">
				        <td style="width: 100%; text-align: right; ">
							<p style="margin-bottom: 0px; margin-top: 0px;">User Address</p>
							<p style="margin-bottom: 0px; margin-top: 0px;">{{@$userDetail->address}}</p>
							<p style="margin-bottom: 0px; margin-top: 0px;">{{@$userDetail->city}} {{@$userDetail->state}} </p>
						 
						
						</td>
					</tr>
				</table>
				<table class="table" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%; margin-bottom: 15px; margin-top: 15px;">
					<tr>
				<th>Sr. No</th>
				<th>Product</th>
                 
				<th>Unit Price</th>
				<th>Qty</th>
				<th>Gst</th>
				<th>Shipping Charges</th>
            	<th>Total INR</th>
			</tr>
                       <?php    $total=00;
                       $subtotal=00;
                       $toda=00;
                       $totall=00;
					$totals =00;
                       ?>
                            
            
		 
              
			 @foreach($orderd as $key=>$item)
			<tr>
                 	@php 
									$productsize=DB::table('product_size')->where('id',$item->size_id)->first();
								//	dd($order);
									$productname=DB::table('products')->where('id',$item->product_id)->first();// dd($par); 
									@endphp
										@php $productcolor=DB::table('product_color')->where('id',$item->color_id)->first(); 
								@endphp
                    				<td>{{$key+1}}</td>
                    				<td>{{@$productname->name}}</td>
                    				 
				 
				<td>
										 
					{{$item->price}}
					<?php	 $pris=$item->quantity*$item->price; ?>
										 
                <?php    if($productsize!=null){
										 $total=$productsize->offer_price*@$item->quantity;
										 }
										 else{
											 $total=1;
										 }
               $toda=$total+$subtotal+@$productname->shipping_charges;
              $totall +=$total+$subtotal+@$productname->shipping_charges;
                ?></td>
			             
				  
                                  
               
                
				<td>{{@$item->quantity}} </td>
                <td> <?php  $prissf= $pris*($productname->gst/100); ?> ₹  {{$prissf}}</td>
                 <td> ₹{{@$productname->shipping_charges}}</td>
                <td>₹{{@$item->quantity*@$item->price}}
                <?php    $totals +=$prissf+ $productname->shipping_charges+$pris; ?>
                </td>
			 
			       
			 
			</tr>
            @endforeach
		 
			<tr>
				
				
				<tr>
			    
				<!--<td  colspan="7" style="text-align: center;">Six Hundred Ninety Nine Rupees Only</td>-->
				<td  colspan="5" style="text-align: center;"> </td>
				<td>Shipping Amount</td>

				<td>₹{{@$order->shipping}}</td>
			</tr>
					<tr>
			    
				<!--<td  colspan="7" style="text-align: center;">Six Hundred Ninety Nine Rupees Only</td>-->
				<td  colspan="5" style="text-align: center;"> </td>
				<td>GST Amount</td>

				<td>₹{{@$order->gst}}</td>
			</tr>
			 
			<tr>
			    
				<!--<td  colspan="7" style="text-align: center;">Six Hundred Ninety Nine Rupees Only</td>-->
				<td  colspan="5" style="text-align: center;"> </td>
				<td>Payable Amount</td>

				<td>₹{{$totals}}</td>
			</tr>
		</table>
		<!--<div class="img">-->
		<!--	<center><img src="" alt="Bar Code Scanner" style="text-align: center;"></center>-->
		<!--</div>-->

		 
        <div class="text-center">

    <button class="btn btn-primary" style="margin-top: 15px;" onclick="print_invoice('print')">Print Invoice</button>
 

  </div>
	</div>
  </div>
  </section>  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>

    function print_invoice(paravalue) {

        var backup = document.body.innerHTML;

        var divcontent = document.getElementById(paravalue).innerHTML;

        document.body.innerHTML = divcontent;

        window.print();

        document.body.innerHTML = backup;

    }



</script>
	

</body>
</html>
