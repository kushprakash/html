@extends('ui.layout.main_ui')
@section('content')

 <section class="section-b-space light-layout" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<center>
                    <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                    <?php //dd($orderdetail);?>
                        <h2 style="color:green;">Thank you</h2>
                        <p style="color:green;">Payment is successfully processsed and your order is being processsed </p>
                        <p style="color:green;">Transaction ID:{{$orderdetail->payment_request_id}}</p>
                        <p style="color:green;">Order Id Number:{{$orderdetail->order_id}}</p>
                    </div>
					</center>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    
   
    <!-- Section ends -->


    <!-- order-detail section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-order">
                        <h3>your order details</h3>
                        <?php  
                        $explodepro=DB::table('sub_order')->where('payment_request_id',$orderdetail->payment_request_id)->get();
                        Redis::set('sub_order:explodepro', json_encode($explodepro), 'EX', 60*60*12);
                        $count=1;
                        
                        ?> 
                          <?php $subtotal=0; 
                           $priceper=0;
  
  $shippingr=0;?>
                        
                        <div class="row product-order-detail">
							<div class="col-3">
							</div>
							<div class="col-3">
								<h6><strong>Product Name</strong></h6>
								 
								</div>
							 <div class="col-3 order_detail">
								 <h6><strong>Sub Product Price / Quantity</strong></h6>
							</div>
							<div class="col-3 order_detail">
								<h6><strong>Price</strong></h6>
						</div>
							
							
							
							@foreach($explodepro as $r)
                        <?php $data12=DB::table('products')->where('id',$r->product_id)->first();
                             $data123=DB::table('product_size')->where('id',$r->size_id)->first();
                             $dataimg=DB::table('product_images')->where('product_id',$r->product_id)->where('color_id',$r->color_id)->first();
                         //  dd($data123
							$sa=0;
                        ?>
                            <div class="col-3"><img src="@if($dataimg!=null){{asset($dataimg->images)}} @endif" alt=""
                                    class="img-fluid blur-up lazyload mb-2"></div>
                            <div class="col-3 order_detail">
                                <div>
                                    
                                    <h5>@if($data12!=null){{$data12->name}} @endif
									 
									<br>
										<?php $sa=0;
	                   $damsa=DB::table('sub_order')->where('order_id',$r->order_id)->where('product_id',$data12->id)->where('user_id',Auth::user()->id)->first();  
										$esx=explode(",",$damsa->sub_product);
										 
										// dd($esx);	?>
										@if($esx != null)
										@foreach($esx as $key=>$dam)
												 
										<?php $brands=DB::table('sub_product')->where('product_name',$dam)->first();  //dd($brands); ?>
									@if($brands != null)   <strong>  {{$brands->product_name}} {{$brands->price}}</strong> 
												<?php $sa +=$brands->price; //echo($sa);?>
												@endif
										@endforeach	
										@endif
									
									</h5>
									
									
									
                                </div>
                            </div>
                            <div class="col-3 order_detail">
                                <div>
                                   
                                    <h5>@if($r!=null) {{$sa}} / {{$r->quantity}} @endif</h5>
                                </div>
                            </div>
                            <div class="col-3 order_detail">
                                <div>
                                    
									<?php //echo($sa); ?>
                                    
                                    <h5>{{$r->quantity*$data12->offer_price+$sa}}</h5>
                                    <?php  $subtotal+=$r->quantity*$data12->offer_price+$sa;?>
                                    
                                     
                                 
                                </div>
                            </div>
							  <?php  $count++;?>
                        @endforeach
                         
                        </div>
                      
                        <div class="total-sec">
                            <ul>
                                <li style="font-size:22px;">Subtotal <span style="float:right">₹{{$subtotal}}</span></li>
                                           
                                             
                                 
                            </ul>
							<ul>
                                <li style="font-size:22px;">Rewards<span style="float:right">₹ {{$orderdetail->wallet}}</span></li>
                                           
                                             
                                 
                            </ul>
                        </div>
                        <div class="final-total">
                            <h3>Total <span style="float:right">₹{{$subtotal-$orderdetail->wallet}}</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row order-success-sec">
                        <div class="col-sm-6">
                            <h4>summery</h4>
                            <ul class="order-detail">
								<li>Email ID: {{Auth::user()->email}}</li>
                                @if($orderdetail!=null)
                                <li>order ID: {{$orderdetail->order_id}}</li>
                                <?php $createat=explode(" ",$orderdetail->created_at)?>
                                <li>Order Date: <?php echo($createat[0]);?></li>
                                 @endif
                                <li>Order Total: ₹{{$subtotal-$orderdetail->wallet}}</li>
                               
                            </ul>
                        </div>
                        
                         
                        <div class="col-md-6 payment-mode">
                         <h4 class="mb-2"> Invoice Download Pdf</h4><span ><a href="{{url('order-invoice/'.$orderdetail->order_id)}}" style="color:blue">click here</a><span>   
							 
							<br><br>
							@if($orderdetail->order_status!='6')
							
								 
								  @if($orderdetail->delivery==0)
                             <!-- <a href=""> <button class="btn btn-danger btn-xs">Cancel</button></a>-->
							 <form action="{{url('product-cancel/'.$orderdetail->order_id)}}" method="get" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                       @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" value="Cancel">Cancel</button>
                                    </form>
							
							@else
							 <a href="#"> <button class="btn btn-danger btn-xs">Cancelled</button></a>
							
								 
							@endif
							
							@else
							 <a href="#"> <button class="btn btn-danger btn-xs">Cancelled</button></a>
							
							@endif
							 
                       </div> 
                     <!--   <div class="col-md-12">
                            <div class="delivery-sec">
                                <h3>expected date of delivery</h3>
                                <h2><?php $prodv= date('Y-m-d', strtotime($createat[0]. ' + 12 day')); 
                                         echo $prodv;
                                
                                ?></h2>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  
@endsection