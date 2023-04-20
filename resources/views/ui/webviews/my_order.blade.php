<?php
use Illuminate\Support\Facades\Redis;
?>
@extends('ui.layout.main_ui')
@section('content')
 
    <!-- breadcrumb End -->

    <main class="main main-test">
    <div class="page-header ">
				 
                 </div>
    <!--section start-->
    <section class="wishlist-section section-b-space">
        <div class="container-fluid" style=" ">
            <div class="row">
                
                <div class="col-sm-12">
                <div class="card">
                <div class="card-header">
                    <h5>My Order</h5>
                </div>
<div class="box-body  table-responsive">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
							     <th>Sr.No.</th>
                                <th scope="col">Order Id</th>
                                <th scope="col">Product</th>
                                <th scope="col">Payment Status/Order Status</th>
                                
                                <th scope="col">Date</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Action</th>
                             
                        </thead>
                        
                        <tbody>
							<?php $count=0;$sama=0; ?>
                            @foreach($my_order as $key=>$r)
                            <tr>
<td> {{$key+1}}</td>
                            <td>
                            {{$r->order_id}}
                            </td>
                                <td>
                                 
                                 
                                 
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable{{$r->order_id}}">
  Product detail
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable{{$r->order_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Product List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php 
      
      $product=DB::table('sub_order')->where('order_id',$r->order_id)->get();
    
     

      $productcount=DB::table('sub_order')->where('order_id',$r->order_id)->count();
      
      ?> 
            <div class="form-group" style="float:right;">  
             <label style="float:right;"> Item  : {{$productcount}}   </label>
             
            </div>       
           @if($product!=null)
           <?php  $count=1;$sama=0; ?>
           @foreach($product as $val)
           <?php 
           
           

           if (!empty(Redis::get('product1:id:' . $val->product_id))) {
              $product1 = json_decode(Redis::get('product1:id:' . $val->product_id),0);
          } else {
              $product1=DB::table('products')->where('id',$val->product_id)->first();
              Redis::set('product1:id:' . $val->product_id, json_encode($product1), 'EX', 60*60*12);
          }
           
          
            if (!empty(Redis::get('product2:data:' . $val->size_id .':' . $val->color_id))) {
                $product2 = json_decode(Redis::get('product2:data:' . $val->size_id .':' . $val->color_id),0);
            } else {
                $product2=DB::table('product_size')->where('id',$val->size_id)->where('color_id',$val->color_id)->first();
                Redis::set('product2:data:' . $val->size_id .':' . $val->color_id, json_encode($product2), 'EX', 60*60*12);
            }

           
                  //dd($product1);
           ?> 
           <div class="form-group" style="text-align:left;"> 
             <label> Name : @if($product1!=null) {{$product1->name}}
				 
				 <?php
          $sa=0; $sama=0;
         if (!empty(Redis::get('damsa:data:' . $val->product_id .':' . $r->order_id.':' . Auth::user()->id))) {
                $damsa = json_decode(Redis::get('damsa:data:' . $val->product_id .':' . $r->order_id.':' . Auth::user()->id),0);
            } else {
               $damsa=DB::table('sub_order')
               ->where('product_id',$val->product_id)
               ->where('order_id',$r->order_id)
               ->where('user_id',Auth::user()->id)
               ->first();
               
                Redis::set('damsa:data:' . $val->product_id .':' . $r->order_id.':' . Auth::user()->id, json_encode($product2), 'EX', 60*60*12);
            }	
	          ?> 
					 
           	
              
              @if($damsa != null) <?php 	$esx=explode(",",$damsa->sub_product);
										
										// dd($esx);	?>
										@if($esx != null)
										@foreach($esx as $key=>$dam)
												 
										<?php 
                    
                    if (!empty(Redis::get('brands:data:' . $dam))) {
                    $brands = json_decode(Redis::get('brands:data:' . $dam),0);
                    } else {
                    $brands=DB::table('sub_product')->where('product_name',$dam)->first(); 

                    Redis::set('brands:data:' . $dam, json_encode($brands), 'EX', 60*60*12);
                    }	
                    //dd($brands); ?>
									@if($brands != null)   <strong>  {{$brands->product_name}} </strong> 
												<?php $sama +=$brands->price; //echo($sa);?>
												@endif
										@endforeach	
										@endif
				 @endif
				 
				 @else N.A @endif </label>
             
            </div> 
            
            <div class="form-group" style="text-align:left;"> 
             <label> Price:@if($product2!=null) {{$product1->offer_price+$sama}} @else N.A @endif </label>
             
            </div> 
            <div class="form-group" style="text-align:left;"> 
             <label> Qantity:@if($product2!=null) {{$val->quantity}} @else N.A @endif </label>
             
            </div> 
            <div class="form-group" style="text-align:left;"> 
             <label> Product-images: @if($product1!=null) <?php $productimage1=DB::table('product_images')->where('product_id',$product1->id)->where('color_id',$val->color_id)->first();  ?> <img class="img-fluid " src="@if($productimage1!=null){{asset($productimage1->images)}} @endif"  style="height:100px;width:100px;"> @else N.A @endif </label>
             
            </div> 

          <hr>
          <?php  $count++;?>
           @endforeach
           @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
                                        
                                        
                                        
                                        </td>
                            <td><span @if($r->payment_status!='paid') class="badge badge-secondary" @else class="badge badge-success"  @endif>{{$r->payment_status}}</span> /
                            <!-- <td>Online</td> -->
                             <span class="badge badge-success">
								  @if($r->order_status==6) Cancel @endif
								 @if($r->order_status!=6)  
								 
						  
						  @if($r->delivery==1)
			Food preparation
                            @endif
								  @if($r->delivery==4)
			Order Accept
                            @endif
						   @if($r->delivery==2)
               Food is ready & Pick-up <!--Your food is ready. Head on over to the Tuck Shop counter & collect it soon!-->			 
                            @endif
								  @if($r->delivery==3)
								 
								Delivered
								 @endif
								 
								 @endif
								 
								  
								</span></td>
                            <td>{{$r->created_at}}</td>
                            <td>
								  
								₹{{$r->total_amount-$r->wallet}} </td>
                            <td>
                                @if($r->order_status==6)
								 
								
                            <a href="#"> <button class="btn btn-danger btn-xs">Cancelled</button></a>
                            @else
							 
								  @if($r->delivery==0)
                             <form action="{{url('product-cancel/'.$r->order_id)}}" method="get" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                       @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" value="Cancel">Cancel</button>
                                    </form>
								 
							@endif
                          @endif
                            
                            
                           <!--  <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#exampleModalLongd{{$r->order_id}}">Tracking</button>
								-->
								
								<div class="modal fade" id="exampleModalLongd{{$r->order_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tracking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <center>
		  <b>   The Order Status   </b>	 @if($r->delivery==0)
		  <button class="btn btn-warning btn-xs" > Process </button>
                            @endif
						  
						  @if($r->delivery==1)
						  
		  <button class="btn btn-info btn-xs" >   Dispatched </button>
                            @endif
						   @if($r->delivery==2)
                         <button class="btn btn-success btn-xs" > Food is ready & Pick-up <!--Your food is ready. Head on over to the Tuck Shop counter & collect it soon!--></button>
                            @endif
		  </center>
      </div>
      <div class="modal-footer">
           
		   <!--<a type="button" href="{{url('user/return-order/'.$r->order_id)}}"  class="btn btn-primary">Apply</a> -->
      </div>
    </div>
  </div>
</div>
								
								
                              <a href="{{url('order-invoice/'.$r->order_id)}}"><button class="btn btn-info  btn-xs">Print invoice</button></a>
                            
								@if($r!=null)
                              @if($r->return_pay!=1)
                              
                              <?php   $date = strtotime($r->created_at);
   $date = strtotime("+7 day", $date);
   $dates =date('M d, Y', $date); 
   $today = date("M d, Y");  
   
     ?>
     @if($dates>=$today)
                                          <!--  <a href="#" class="btn btn-info btn-xs  text-white" data-toggle="modal" data-target="#exampleModalLong{{$r->order_id}}"> RETURN PAY</a>-->
                                         @endif
                                            @endif
								@endif
<!-- Modal -->
<div class="modal fade" id="exampleModalLong{{$r->order_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Return Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        The Order Will be return in 7 days 
      </div>
      <div class="modal-footer">
          <a type="button" href="#"  class="btn btn-primary">Apply</a>
		  
		   <!--<a type="button" href="{{url('user/return-order/'.$r->order_id)}}"  class="btn btn-primary">Apply</a> -->
      </div>
    </div>
  </div>
</div>
                          
                            
                            </td>
                            
                            </tr>
							<?php $count++; ?>
                            @endforeach
                        </tbody>
                         
                    </table>
					</div>
                </div>
            </div>
        </div>
            <!-- <div class="row wishlist-buttons">
                <div class="col-12"><a href="{{url('/')}}" class="btn btn-solid">continue shopping</a> 
               <a href="#"  class="btn btn-solid">check out</a> -->
                <!-- </div>
            </div>  -->
    </div>
</section>
</main>
@endsection