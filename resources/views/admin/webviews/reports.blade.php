@extends('admin.layout.admin')
@section('content')

<style>
	.modal-dialog {
  max-width: 600px;
  margin: 1.75rem auto;
}
</style>
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Reports
                        <small> Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item active">Orders Reports</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
	<form action="{{url('report-search')}}" method="post">
		@csrf
	<div class="row mb-4">
		
		<div class="col-lg-4">
			<label> Email Id</label>
			<select  name="emails" class="form-control">
				<option value="" @if($emailsd=="") selected @endif >Select Your Choice</option>
				
				<?php $user=DB::table('users')->where('vendor',1)->orderby('id','desc')->get()?>
				@if($user != "[]")
				@foreach($user as $key=>$r)
				<option value="{{$r->id}}" @if($emailsd==$r->id) selected @endif>{{$r->email}}</option>
				@endforeach
				@endif
			</select>
		</div>
			<div class="col-lg-3">
			<label> Start Date</label>
			<input type="date"  name="start_date" class="form-control"  value="{{$start_date}}" required>
				 
		</div>
		<div class="col-lg-3">
			<label> End Date</label>
			<input type="date"  name="end_date" class="form-control" value="{{$end_date}}" required>
				 
		</div>
			<div class="col-lg-1 ">
				<lable class=" "style="opacity:0"> Email Id</lable>
				<button class="btn btn-info btn-xs mt-3">Search</button>
			</div>
		
	</div>
		</form>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
				<?php $dak=0;?>
                <div class="card-header">
                    <h5>Manage Order Reports</h5>
                </div>
				
				
                 <div class=" table-responsive p-3">  
                 	<table class="table table-bordernone">
                 		<thead>
                        <tr>
                            <th>S.No.</th> 
                    
                             <th>Order</th>
							 <th>Email Id</th>
                     
							 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 <th>Product Name</th>
						 	 <th>Product Quantity</th>
						 	 
						 	 
						     <th>Product Price</th>
							 <th>Sub Product Price</th>
                    <!--<th>Shiprocket Order Id </th>-->
							<th>Rewards</th>
                             <th>Amount Pay</th>
							 <th>Total</th>
							 <th>Cancel</th>
							 <th>Order Accept</th>
							 <th>Food preparation </th>
							<th>Food is ready & Pick-up</th>
							<th>Delivered</th>
                    <!--<th>Invoice</th>-->
						 
							<th>Date</th>
							<th>Remark</th>
							
						 
                    
                        </tr>
                        </thead>
                        <tbody>
                               @foreach($order_detail as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                    
                    <td><a href="{{url('order-invoice-admin/'.$value->payment_request_id)}}" class="" style="text-align:right;color:black"> #Games-{{$value->payment_request_id}}   </a>
						
					 <?php  $countd=0;
						$skms=0;
						$sk=[];
						$quan=[];
						 $sama=0; 
						$order = DB::table('order_detail')->where('order_id',$value->order_id)->where('user_id',$value->user_id)->first();
		  //dd($order);
        $orderd = DB::table('sub_order')->where('order_id',$value->order_id)->where('user_id',$value->user_id)->get();
//	dd($orderd);
		 $userDetail=DB::table('user_address')->where('id',$order->address_id)->first();
				
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
			 
								<?php $sa=0;$sakdla=[];   $samamv=0;
	$damsa=DB::table('sub_order')->where('product_id',$item->product_id)->where('order_id',$item->order_id)->where('user_id',$item->user_id)->first();  ?> 
								@if($damsa != null) <?php 	$esx=explode(",",$damsa->sub_product);
										
										// dd($esx);
						?>
										@if($esx != null)
										@foreach($esx as $key=>$dam)
												 
										<?php $brands=DB::table('sub_product')->where('product_name',$dam)->first();  //dd($brands); ?>
									@if($brands != null)   
					<?php  $sakdla[]=$brands->product_name?>
												<?php 
	 
	$sama +=$brands->price; //echo($sa);?>
												@endif
										@endforeach	
										@endif
				 @endif
								
								
								
							 
								<?php
						$samamv +=$sama;
						$sk[]=@$productname->name.' '.$item->sub_product;?>
						
								<?php 
						$quan[]=@$item->quantity;
						$skms+=@$item->quantity*@$productname->offer_price;?>
								 
							 
						<?php $countd++; ?>
				@endforeach
				@endif
				 
					
					
					
					
					
					
					</td> 
					
					<td> <?php $userDetails=DB::table('users')->where('id',$value->user_id)->first(); ?>
						@if($userDetails != null) {{$userDetails->email}} @endif
				
		</td>
		
			<?php $count=0;?>
					 		<?php $orderds = DB::table('sub_order')->where('order_id',$value->order_id)->where('user_id',$value->user_id)->get();
					
					
					$dsk=DB::table('sub_order')->where('order_id',$value->order_id)->where('user_id',$value->user_id)->count();

?>
					
					
							@if($orderds != "[]")
							@foreach($orderds as $key=>$itm)
							<?php $productnames=DB::table('products')->where('id',$itm->product_id)->first();?>
					 
							<td>
							@if($productnames != null)	{{ $productnames->name }} @endif
								<br>
								<strong>	{{$itm->sub_product}} </strong>
							</td>
							
							 <td>{{ $itm->quantity }} </td>
				
					
							 <?php $count++; ?>
					@endforeach	
					@endif
						@if($dsk==0)
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					 
					@endif
					
						@if($dsk==1)
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					 
					 
					@endif
					
						@if($dsk==2)
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				 
					 
					@endif
						@if($dsk==3)
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					 
					 
					 
					@endif
					
						@if($dsk==4)
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				 
					 
					@endif
						@if($dsk==5)
				<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
						<td></td>
					<td></td>
					 
				 
					 
					@endif
						@if($dsk==6)
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				 
					 
					@endif
						@if($dsk==7)
				 
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					 
					 
					@endif
						@if($dsk==8)
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					 
					@endif
						@if($dsk==9)
					<td></td>
					<td></td>
				 
					 
					@endif
						@if($dsk==10)
					 
					 
					@endif
					
					
					
					
					 <td>{{$skms}}</td>
					<td>{{$samamv}}</td>
                  
                    
					<td>{{$value->wallet}} </td>
					<td>{{$value->total_amount-$value->wallet}}  </td>
					 <td> 
					    @if($value->total_amount != null)
						 
						{{$value->total_amount}}
						 
						 @else
							 <?php $ex=explode(",",$value->price);
							 $qun=explode(",",$value->quantity);

							 ?>
							 @foreach($ex as $key=>$r)
							 <?php    $dak += $r*$qun[$key]; ?>

							 @endforeach
							 <?php $das= $dak; ?>
						 {{$das}}
						 @endif
					</td> 
					<!--<td> <a href="{{url('order-invoice-admin/'.$value->payment_request_id)}}" class="" style="text-align:right;color:black">Click Here.. </a></td>-->
					<td>
						
						<?php $dsa1=DB::table('order_history')->where('order_id',$value->order_id)->where('status',6)->first();?>
          
				 		@if($dsa1 != null)
						@if($dsa1->status==6)
			 <strong>   {{$dsa1->created_at}}   </strong>  
						@endif
						@endif
					</td>
	 			
		  			<td>
						<?php $dsa2=DB::table('order_history')->where('order_id',$value->order_id)->where('status',4)->first();?>
          
				 		@if($dsa2 != null)
						@if($dsa2->status==4)
			 <strong>   {{$dsa2->created_at}}   </strong>  
						@endif
						@endif
					</td>
						<td>
			      <?php $dsa3=DB::table('order_history')->where('order_id',$value->order_id)->where('status',1)->first();?>
          
				 		@if($dsa3 != null)
						@if($dsa3->status==1)
			 <strong>  {{$dsa3->created_at}}  </strong>  
						@endif
						@endif
					</td>
					<td>
						  <?php $dsa4=DB::table('order_history')->where('order_id',$value->order_id)->where('status',2)->first();?>
          
				 		@if($dsa4 != null)
						@if($dsa4->status==2)
			 <strong>  {{$dsa4->created_at}} </strong>  
						@endif
						@endif
					</td>
		<td>
						  <?php $dsa5=DB::table('order_history')->where('order_id',$value->order_id)->where('status',3)->first();?>
          
				 		@if($dsa5 != null)
						@if($dsa5->status==3)
			 <strong>  {{$dsa5->created_at}} </strong>  
						@endif
						@endif
					</td>
					
		 	 
						 
					  
					 <td> {{$value->created_at}} </td>
					
					<td>{{$value->remarksk}}</td>
					 
                </tr>
                 @endforeach
                         
                 </tbody>
                    </table>
                    {!! $order_detail->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <!-- Script Local -->   <!-- <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script> -->
  
  
<script>
	function dispactched(){
		 let text;
  if (confirm("Are you sure you want to dispactched!") == true) {
    document.getElementById("dispactched").submit();
  } else {
     
  }
  
	}
	
	
		function delivered(){
		 let text;
  if (confirm("Are you sure you want to delivered!") == true) {
    document.getElementById("delivered").submit();
  } else {
     
  }
  
	}
	
</script>

 
	
@endsection