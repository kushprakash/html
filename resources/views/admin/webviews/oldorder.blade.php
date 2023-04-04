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
                    <h3>Orders
                        <small> Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Sales</li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
				<?php $dak=0;?>
                <div class="card-header">
                    <h5>Manage Order</h5>
                </div>
                 <div class="box-body  table-responsive"> 
    <table id="example" class="table table-bordered table-striped">
             <thead>
                        <tr>
                            <th>S.No.</th> 
                    
                    <th>Order</th>
							<th>Employee Id</th>
                    <th>Date</th>
                    
                    <th>Status</th>
                    <!--<th>Shiprocket Order Id </th>-->
                    <th>Total </th>
                    <th>Invoice</th>
						 <th>Payment Image</th> 
							<th>Remark</th>
							<th>Action</th>
                    
                        </tr>
                        </thead>
                        <tbody>
                               @foreach($order_detail as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                    
                    <td><a href="{{url('order-invoice-admin/'.$value->payment_request_id)}}" class="" style="text-align:right;color:black"> #Games-{{$value->payment_request_id}}   </a>
						
					 
						<i class="fa fa-eye" data-toggle="modal" data-target="#exampleModalLong{{$value->payment_request_id}}" style="color:gray;"></i> 
					
					<div class="modal fade" id="exampleModalLong{{$value->payment_request_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Order #DINK-{{$value->payment_request_id}} 
			
			  @if($value->order_status==6)
			<button   class="btn btn-danger">Cancelled</button>
						@endif
												 @if($value->order_status!=6)
			        @if($value->delivery==1)
						    <button    class="btn btn-info">Food  preparation</button>
                            @endif
			
			 @if($value->delivery==4)
						    <button    class="btn btn-info">Order Accept</button>
                            @endif
						
						  @if($value->delivery==2)
						  
						   
                               <button    class="btn btn-info"> Food ready</button>
                            @endif
						   @if($value->delivery==3)
                               <a href="#" class="btn btn-success">Pick-up</a>
                            @endif 
												
			@endif</h5>
		  
		  
		  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
		  <div class="container bootstrap snippets bootdey">
	<div class="panel panel-default">
		<div class="panel-body">
			 
		 
			<div class="row"  style="border-top:5px solid black;">
				<?php  $order = DB::table('order_detail')->where('order_id',$value->order_id)->where('user_id',$value->user_id)->first();
		  //dd($order);
        $orderd = DB::table('sub_order')->where('order_id',$value->order_id)->where('user_id',$value->user_id)->get();
//	dd($orderd);
		 $userDetail=DB::table('user_address')->where('id',$order->address_id)->first();
				
				?>
				<div class="col-md-6 col-sm-6 text-left mt-3">
					<h4 >Billing Detail</h4>
					@if($userDetail != null)
					<?php  $userDetailem=DB::table('users')->where('id',$userDetail->user_id)->first();
		?>
					<h5 class=" "><strong>{{@$userDetail->first_name}} {{@$userDetail->last_name}} </strong></h5>
					<h6> @if($userDetailem != null) {{$userDetailem->emp_id}} @endif <br>
						<br>
						 
						 <strong>Email </strong> <br>@if($userDetailem != null) {{@$userDetailem->email}} @endif
						<br>
						 
					 <strong>Phone Number  </strong> <br> @if($userDetailem != null) {{@$userDetailem->phone}} @endif</h6>
					
					<br>
					<strong>Payment via </strong><br>
Credit Card/Debit Card/NetBanking 
						<br>
					<br>
					
					 
					@endif
					 
				</div>
				 
			</div>

			<div class="table-responsive " style="border-top:5px solid black;">
				<table class="table table-condensed nomargin">
					<thead>
						<tr>
							 <th>Product</th>
							<th>Quantity</th>
							<th>Total</th>
							 <th>Total Amount </th>
							
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
                
				<tbody>
				 
						    @if($orderd != "[]")        
			 @foreach($orderd as $key=>$item)  
							<tr>
						    <td>@php 
									$productsize=DB::table('product_size')->where('id',$item->size_id)->first();
								//	dd($order);
									$productname=DB::table('products')->where('id',$item->product_id)->first();// dd($par); 
									@endphp
										@php $productcolor=DB::table('product_color')->where('id',$item->color_id)->first(); 
								@endphp
				<div><strong>{{@$productname->name}}</strong></div>
								 </td>
							<td>{{@$item->quantity}} </td>
			 
							 
							 <td>Rs ₹{{@$item->price}}</td>
									<td>Rs ₹{{@$item->quantity*@$item->price}}</td>
									 
								
						</tr>
						<?php $countd++; ?>
				@endforeach
				@endif
					</tbody>
				</table>
				
			<!--	<div><strong>Unique side and front panel design</strong></div>
								<small><strong>HSN:12211111, 12.0% IGST</strong> </small>
				<table class="table table-condensed nomargin" >
					<tbody>
						 
							<tr>
						    <td>2</td>
							<td>2</td>
							<td>Rs 23,78</td>
							<td>Rs 23,78</td>
							<td>Rs 23,78</td>
									<td>Rs 23,78</td>
									<td>Rs 23,78</td>
									<td>Rs 23,78</td>
								<td> </td>
									<td>Rs 23,78</td>
									 
								
						</tr>
				</table>-->
				 
			</div>

 
		</div>
	</div>
 
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
      </div>
       
    </div>
  </div>
</div>
						</div>		
					
					
					
					
					
					
					
					</td> 
					<td><?php $userDetail=DB::table('user_address')->where('id',$value->address_id)->first();
?>	@if($userDetail != null)
						<?php  $userDetailem=DB::table('users')->where('id',$userDetail->user_id)->first();
		?> @if($userDetailem != null) {{$userDetailem->emp_id}} @endif @endif</td>
                   <td> {{$value->created_at}} </td>
					
                    <td> @if($value->order_status==6)
			<button   class="btn btn-danger">Cancelled</button>
						@endif
			  
	 					 
		  @if($value->order_status!=6)
			        @if($value->delivery==1)
						    <button    class="btn btn-info">Food  preparation</button>
                            @endif
						
						  @if($value->delivery==2)
						  
						   
                               <button    class="btn btn-info"> Food ready</button>
                            @endif
						   @if($value->delivery==3)
                               <a href="#" class="btn btn-success">Pick-up</a>
                            @endif 
						   @if($value->delivery==4)
						    <button    class="btn btn-info">Order Accept</button>
                            @endif
		 	@endif
					</td>
					 <td> 
					    @if($value->total_amount != null)
						 
						{{$value->total_amount-100}}
						 
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
					<td> <a href="{{url('order-invoice-admin/'.$value->payment_request_id)}}" class="" style="text-align:right;color:black">Click Here.. </a></td>
					<td> <a href="{{asset($value->imgorde)}}" class="" style="text-align:right;color:black">
					@if($value->imgorde != null)	<img src="{{asset($value->imgorde)}}" style="height:100px;width:100px;">  @endif
						
						</a>
					
					</td>
					<td>{{$value->remarksk}}</td>
					<td>
						<form action="{{url('order-process/'.$value->order_id)}}" id="delivered" method="get">
							  <select name="valu" class="form-control" onchange="this.form.submit()">
								    <option value=""> select Your Choice</option>
								   <option value="4">Order Accept</option>
								  <option value="1">Food preparation</option>
								   <option value="2"> Food ready</option>
								  <option value="3"> Pick-up</option>
								  <option value="6"> Order Cancel</option>
							</select>
						  </form>
					</td>
					        
                   
                </tr>
                 @endforeach
                         
                 </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <!-- Script Local -->   <!-- <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script> -->
 
   <script type='text/javascript'>
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){
 
      // Fetch all records
      $('#but_fetchall').click(function(){
 
         // AJAX GET request
         $.ajax({
           url: 'getUsers',
           type: 'get',
           dataType: 'json',
           success: function(response){
 
              createRows(response);
 
           }
         });
      });
 
      // Search by userid
      $('#but_search').click(function(){
         var userid = Number($('#search').val().trim());
 
         if(userid > 0){
 
           // AJAX POST request
           $.ajax({
              url: 'getUserbyid',
              type: 'post',
              data: {_token: CSRF_TOKEN, userid: userid},
              dataType: 'json',
              success: function(response){
 
                 createRows(response);
 
              }
           });
         }
 
      });
 
   });
 
   // Create table rows
   function createRows(response){
      var len = 0;
      $('#empTable tbody').empty(); // Empty <tbody>
      if(response['data'] != null){
         len = response['data'].length;
      }
 
      if(len > 0){
        for(var i=0; i<len; i++){
           var id = response['data'][i].id;
           var username = response['data'][i].username;
           var name = response['data'][i].name;
           var email = response['data'][i].email;
 
           var tr_str = "<tr>" +
             "<td align='center'>" + (i+1) + "</td>" +
             "<td align='center'>" + username + "</td>" +
             "<td align='center'>" + name + "</td>" +
             "<td align='center'>" + email + "</td>" +
           "</tr>";
 
           $("#empTable tbody").append(tr_str);
        }
      }else{
         var tr_str = "<tr>" +
           "<td align='center' colspan='4'>No record found.</td>" +
         "</tr>";
 
         $("#empTable tbody").append(tr_str);
      }
   } 
   </script>
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