 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
<style>
.bill{
	display:none
	}
	
	.ship{
	display:none
		
	}
				* {
    font-size: 12px;
    font-family: 'Times New Roman';
}
	

	td,
th{
    width: 65px;
    max-width:65px;
}

	.skrow{
		max-width:400px;width:100%;
	}
		* {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
	text-align: center;
}

	 
 
  #printableArea {
   max-width:400px;width:100%;
   /* for compatibility with both A4 and Letter */
  }
 
</style>

<div class="page-body"  id="body">
      <div class="container-fluid">
        
			 <div class="row mt-5 skrow">
				 <div class="col-md-9 col-sm-9 text-left  " id="printableArea" >
				 
			<div class="row mt-2 bg-white p-3">
				<div class="col-md-12 col-sm-12 text-left bg-w">
					<h4>Order #Games-{{$order->payment_request_id}}</h4>
					<!--<p>Payment via Credit Card/Debit Card/NetBanking. Customer IP: 122.172.85.48</p>
					 -->
				</div>
	 
		 

			 
				
				<div class="col-md-12 col-sm-6 text-left mt-3">
					 
					</div>
				
					@if($userDetail != null)
				<div class="col-md-4 col-sm-6 text-left mt-3">
					  
						@if($userDetail != null)
					<?php  $userDetailem=DB::table('users')->where('id',$userDetail->user_id)->first();
		?>  	<h6>	Email Address : @if($userDetailem != null) {{@$userDetailem->email}}  @endif<br><br></h6>
				
					@endif
					
					 
				</div>@endif
				 
				  	<div class="col-md-12 text-left mt-3">
			<div class="table-responsive " >
				<table class="table table-condensed nomargin"  >
					<thead>
						<tr>
							 <th>Item</th>
							<th>Cost</th>
							<th>Sub Item Price/Qty</th>
							 <th>Total </th>
							 
							 
							
							 
							 
						</tr>
					</thead>
				
				
				 <?php    $total=00;
                       $subtotal=00;
                       $toda=00;
                       $totall=00;
					$totals =00;
				$sa=0;
				$countd=0;
				 $pris=0;
                       ?>
                   @if($orderd != "[]")        
			 @foreach($orderd as $key=>$item)  
					
				 
						 
							<tr>
						    <td style="
    width: 33%;
">@php 
									$productsize=DB::table('product_size')->where('id',$item->size_id)->first();
								//	dd($order);
									$productname=DB::table('products')->where('id',$item->product_id)->first();// dd($par); 
								
									$product_images=DB::table('product_images')->where('product_id',$item->product_id)->first();// dd($par); 
								
									@endphp
										@php $productcolor=DB::table('product_color')->where('id',$item->color_id)->first(); 
								@endphp
				<div>
					<img src="{{asset($product_images->cover_image)}}" style="height:50px;width:50px;">
				<span style=" "><br>	<strong>{{@$productname->name}} <br></strong>
					<?php $sa=0;
					$sam=0;
	$damsa=DB::table('sub_order')->where('order_id',$item->order_id)->where('product_id',$item->product_id)->where('user_id',$userDetail->user_id)->first();  
										$esx=explode(",",$damsa->sub_product);
										 
										 //dd($esx);	?>
										@if($esx != null)
										@foreach($esx as $key=>$dam)
												 
										<?php $brands=DB::table('sub_product')->where('product_name',$dam)->first();  //dd($brands); ?>
									@if($brands != null)   <strong>  {{$brands->product_name}}  </strong> 
												<?php $sam +=$brands->price; //echo($sa);?>
												@endif
										@endforeach	
										@endif
					
					
					
					</span>
					</div>
								</td>
								<td>₹{{$productname->offer_price}}</td>
									<td> {{$sam}} / {{@$item->quantity}} </td>
								<!--	<td>₹{{@$item->quantity*@$item->price}}</td>-->
							       <?php 
								$pric=$item->quantity*$productname->offer_price;
							 
								?>
									 
									<td>₹{{$pric+$sam}}
								<?php $pris += $pric+$sam; ?>
								
								</td>
																	 
							 
									
									 
								
						</tr>
				 
				<?php $countd++; ?>
				@endforeach
				@endif
			 </table>
				@if($order != null)
				<table  class="table table-condensed nomargin" >
					<tbody>
						<tr style="border-top:0px solid #000; border-bottom:0px solid #000;margin:30px;">
							<td  >
								  
							</td>
							<td  >
							 	 
							</td>
							 
							<td   >
								<div class="text-right"><strong>Items Subtotal</strong></div>
								 
							</td>
							  
									 
									<td class="text-center">₹ {{$pris}}</td>
						</tr>
						 
						<tr style="border-top:0px solid #000; margin:30px;">
							<td  >
								  
							</td>
							<td  >
							 	 
							</td>
							 
							<td  > <h5 class="text-right"> <br><strong>Rewards </strong></h5> </td>
							<td class="text-center">₹  {{$order->wallet}}
							</td>
								</tr>
						 
							<tr  style="border-top:2px solid #000;">
								<td  >
								  
							</td>
							 
								<td >
							 	 
							</td>
								
								 
								<td   >  <h5 class="text-right" ><br><strong>Order Total</strong></h5> </td >
								<td class="text-center" >₹  {{$order->total_amount-$order->wallet}} </td>
							
						</tr>
						 
					</tbody>
				</table>
				@endif
			</div>

						</div>
			 

		</div>
				 </div>
				 
				  <div class="col-md-3 col-sm-3 mt-5">
					 
					 
					  <div class="card" style="border-radius:0px;">
						 <div class="card-header" style="padding:10px;">
							 
						 <div class="card-body"  style="padding:10px;" >
							 <br>
								 <a   class="text-blue" style="color:white;background:blue;padding:20px; margin-top:20px;" onclick="printDiv('printableArea')">Print </a>
							  <a href="https://gameskraftcafe.in/order"  class="text-blue" style="margin-left:10px;color:white;background:green;padding:20px; margin-top:20px;">  Back</a>
							 
							 
						 </div>
					 </div>
				 </div>
				 
		  </div>
					 
					 
 </div>
  
  </div>   

<script>
function skfunctionbill(){
	$('.bill').show();
	$('.bills').hide();
}
</script>
<script>
function skfunctionshipp(){
	$('.ship').show();
	$('.ships').hide();
}
</script>
<script>
	
	function printDiv(divName) {
		//$('.skbills').hide();
		var cas="#"+divName;
		//$(cas).addClass('adafd');
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     window.print();


     document.body.innerHTML = originalContents;
	//	$('.skbills').show();
				
}
</script>
 