<?php
use Illuminate\Support\Facades\Redis;
?>
@extends('ui.layout.main_ui')
@section('content')
<style>
	.order-box .qty li span {
   
    font-size: 14px;
    line-height: 32px;
    color: #232323;
    font-weight: 400;
    width: 35%;
}
	.order-box .qty {
    
    border-bottom:none;
    margin-bottom: 37px;
}
</style>

@if($user==1)
<form action="{{url('payment-gatway-addcart')}}" method="Post" enctype="multipart/form-data">
@csrf
 
    <!-- breadcrumb End -->

  <main class="main main-test">
    <div class="page-header ">
				 
                 </div>
    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                  
                        <div class="row  justify-content-center">
                            <div class="col-lg-8 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Billing Details</h3>
                                </div>
                           <div class="row check-out" style="display:none">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">First Name</div>
                                        <input type="text"    onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" name="first_name" class="form-control"  maxlength="20" title="Enter A  Only 20 Letters" value="@if(Auth::check()){{Auth::user()->name}}@endif" placeholder="First Name" >
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Last Name</div>
                                        <input type="text" name="last_name"  onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" maxlength="20" class="form-control" value="" title="Enter A  Only 20 Letters" placeholder="Last Name" >
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Phone</div>
                                        <input type="text" name="phone"  class="form-control" title="Enter Valid mobile number ex.9811111111" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[78960]\d{9}$" maxlength="10" value="@if(Auth::check()){{Auth::user()->phone}}@endif" placeholder="Phone" >
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Email Address</div>
                                        <input type="email" name="email_address" class="form-control"  value="@if(Auth::check()){{Auth::user()->email}}@endif" placeholder="Email Address" > 
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Country</div>
                                        <select name="country"  class="countries form-control" id="countryId" required> 
                                            <option value="india">India</option> 
                     
<option value="Afghanistan" countryid="AF">Select Country</option><option value="India" countryid="In">India</option></select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">State</div>
                                        <select name="state" class="states form-control" id="stateId"  >
											<option value="">Select State</option>
											<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
 
</select>

</div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Town/City</div>
                                        <input type="text" name="town_city" class="cities form-control" id="cityId"  value=""  maxlength="35" placeholder="Town/City" >
											
									 
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Address</div>
                                        <textarea type="text" name="address" class="form-control"  rows="4"   maxlength="50" value="" placeholder="Address" ></textarea>
                                    </div>
                                    
                                  
                                    
                                    
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">Postal Code</div>
                                        <input type="text" maxlength="6" class="form-control"  name="postal_code"  title="6 digit Enter Only"value="" placeholder="Pincode "  >
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="checkbox" name="shipping-option" id="ac-option"  > &ensp;
                                        <label for="ac-option"><b>Welcome to  My website </b><br>These terms and conditions outline the rules and regulations for the use of My Website, located at My Place.

By accessing this website we assume you accept these terms and conditions. Do not continue to use ecom if you do not agree to take all of the terms and conditions stated on this page.</label>
                       
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-8	col-sm-12 col-xs-12">
                                <div class="checkout-details border p-5">
									<div class="mb-5">
									
										
										
									</div>
                                    <div class="order-box">
                                        <div class="title-box ">
                                        <ul class="qty border-bottom">
                                            
                                        <li>
                                            <span style="float: left;"><b>Product</b></span>
											 
                                            <span><b>Sub Product Price / Qty </b></span>
                                            <span style="float: right;"><b>Total </b></span>
                                         </li>
                                                   
</ul>

                                           </div>
                                          
                                        <?php $subtotal=0;
                                        $priceper=0;
                                        $gstplusval=0;
                                        $shippingr=0;
                                        ?>

                                       
                                        @foreach($user_cart as $value)
                                        <ul class="qty">
                                         <?php 
                                            
                                            
                                            
                                            if (!empty(Redis::get('productsize:data:' . $value->size))) {
                                                $productsize = json_decode(Redis::get('productsize:data:' . $value->size),0);
                                            } else {
                                                $productsize=DB::table('product_size')->where('id',$value->size)->first();  
                                            
                                            Redis::set('productsize:data:' . $value->size, json_encode($productsize), 'EX', 60*60*12);
                                            }
                                            ?>
                                         
                                            <li><span style="float: left;">{{$value->name}}<br>
												
												<?php $sa=0;
                                                if (!empty(Redis::get('damsa:data:' . $value->id.':'.Auth::user->id))) {
                                                $damsa = json_decode(Redis::get('damsa:data:' . $value->id.':'.Auth::user->id),0);
                                                } else {
                                                    $damsa=DB::table('add_sub_product_user')->where('product_id',$value->id)->where('user_id',Auth::user()->id)->get();  
                                                
                                                Redis::set('damsa:data:' . $value->id.':'.Auth::user->id, json_encode($damsa), 'EX', 60*60*12);
                                                }
   
   ?>
										@if($damsa != "[]")
										@foreach($damsa  as $key=>$dam)
												 
										<?php 
                                        
                                        
                                        
                                                if (!empty(Redis::get('brands:data:' . $dam->sub_product_id))) {
                                                    $brands = json_decode(Redis::get('brands:data:' . $dam->sub_product_id),0);
                                                } else {
                                                    $brands=DB::table('sub_product')->where('id',$dam->sub_product_id)->first(); 
                                                    Redis::set('brands:data:' . $dam->sub_product_id, json_encode($brands), 'EX', 60*60*12);
                                                }
                                        
                                        //dd($brands); ?>
									@if($brands != null)   <strong>  {{$brands->product_name}} </strong> 
												<?php $sa +=$brands->price; //echo($sa);?>
												@endif
										@endforeach	
										@endif
												
												</span><span>{{$sa}} / {{$value->quantity}}  </span><span style="float: right;">₹{{$value->quantity*$value->offer_price+$sa}}</span> </li>
                                                <?php  $subtotal+=$value->quantity*$value->offer_price+$sa;
                                                    
                                                ?>
                                            
                                            
                                               
                                               </ul>               
                                        @endforeach
                                        
                                        <ul class="sub-total border-top pt-3">
                                              <li style="font-size:16px;color:black">Subtotal <span class="count float-right"><i class="fa fa-rupee" style="font-size:16px"></i>{{$subtotal}}</span></li>
                                           
 
                                              
                                              <li style="font-size:16px;color:black">Use Rewards <span class="count float-right"><i class="fa fa-rupee" style="font-size:18px"></i>
											<?php
												  $sadmd=0;
												     date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
//echo $date;
												  
												  $sad=DB::table('wallet')->where('user_id',Auth::user()->id)->whereDate('created_at',$date)->get();
                                                 // dd($sad);
												  
												  ?>	
												  @if($sad != "[]")
												 <?php $sadmd=DB::table('wallet')->where('user_id',Auth::user()->id)->whereDate('created_at',$date)->sum('amount');
												  
												  $dsk=100-$sadmd;
												  
												  ?>
												 
												  
											      @if(100>=$subtotal)
															<?php 
												  if($dsk>$subtotal){
												  $skm=$subtotal;
												  }
												  else{
													 $skm=$dsk;
												  }
												  
												  ?>	
												  @else
												   <?php $skm=$dsk;?>
												  @endif
												  
												  
												  @else
												   @if(100>=$subtotal)
															<?php $skm=$subtotal;?>	
												   @else
												  <?php $skm=100;?>	
													@endif
												  @endif
												   @if($sadmd>100)
												  <?php $skm=0;?>
												  @endif
												  
												  {{$skm}}
                                             </span></li>
                                             
                                             
                                              
                                        </ul>
                                        
                                        
                                         <ul class="total">
											 <li style="font-size:18px;color:black" ><strong>Total </strong><span class="count" style="float:right"><i class="fa fa-rupee" style="font-size:18px"></i><?php echo(sprintf("%.2f",$subtotal-$skm));?></span></li>
                                             <input type="hidden" name="amount" value="<?php echo(sprintf("%.2f",$subtotal));?>">
											 <input type="hidden" name="walletamount" value="{{$skm}}">
											   
                                       
                                        </ul>

                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    
                                                   
                                                    <li>
														<div class="row">
															
                                                        <div class="radio-option paypal col-lg-3">
                                                            
                                                            <label for="payment-3"> <span class="image"><img
                                                                        src="{{asset('qrcode.jpeg')}}"
                                                                        alt="" style="height:150px;width:150px;"></span></label>
                                                        </div>
															<div class="col-lg-9">
														<?php $sadd=$subtotal-$skm;
																?>
																@if($sadd =='0')
																			 @else
														<input type="file" name="imgorde"required>
																@endif
																<br><br>
																<label>Remark</label>
																<textarea name="remarksk" cols="60" class="form-controlw w-100"></textarea>
														</div>
													</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
										
                                        @if(Auth::check())
                                        
										<?php $das=DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->count();?>
										@if($das !=0)
                                         <div class="text-right"><button type="submit"    class="btn btn-dark btn-place-order text-white">Place Order</button></div>  
										@else
										<div class="text-right"><button type="button"    class="btn btn-dark btn-place-order text-white" onclick="alert('Please Add Product');">Place Order</button></div>  
										@endif 
                                        @else
                                         <div class="text-right"><a  data-toggle="modal" data-target=".bd-example-modal-lg"  class="btn btn-dark btn-place-order text-white">Place Order</a></div>  
                                     
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
						 
                </div>
            </div>
        </div>
    </section>
	</main>
    </form>
	
    @else
    <form action="{{url('payment-gatway')}}" method="get">
    @csrf
     <!-- breadcrumb End -->

  <main class="main main-test">
    <div class="page-header ">
				 
                 </div>
    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                   
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Billing Details</h3>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">First Name</div>
                                        <input type="text" class="form-control"   onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" name="first_name" maxlength="20" title="Enter A  Only 20 Letters" value="@if(Auth::check()){{Auth::user()->name}}@endif" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Last Name</div>
                                        <input type="text" name="last_name" class="form-control" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" maxlength="20" value="" title="Enter A  Only 20 Letters" placeholder="Last Name" >
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Phone</div>
                                        <input type="text" name="phone" class="form-control" maxlength="10" title="Enter Valid mobile number ex.9811111111" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[78960]\d{9}$" value="@if(Auth::check()){{Auth::user()->phone}}@endif" placeholder="Phone" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Email Address</div>
                                        <input type="email" name="email_address" class="form-control" value="@if(Auth::check()){{Auth::user()->email}}@endif" placeholder="Email Address" required> 
                                    </div>
                                     <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Country</div>
                                        <select name="country"  class="countries form-control" id="countryId" required> 
                                          <!--  <option value="india">India</option>-->
                     
<option value="Afghanistan" countryid="AF">Select Country</option><option value="India" countryid="In">India</option></select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">State</div>
                                        <select name="state" class="states form-control" id="stateId"  required>
											<option value="">Select State</option>
											<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
 
</select>

</div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Town/City</div>
                                        <input type="text" name="town_city" class="cities form-control" id="cityId"  value=""  maxlength="35" placeholder="Town/City" required>
											
									 
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Address</div>
                                        <textarea type="text" class="form-control" name="address" rows="4"   maxlength="50" value="" placeholder="Address" required></textarea>
                                    </div>
                                    
                                  
                                    
                                    
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">Postal Code</div>
                                        <input type="text" class="form-control" maxlenght="6" name="postal_code"  title="6 digit Enter Only"value="" placeholder="Pincode " required>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="checkbox" name="shipping-option" id="ac-option" required > &ensp;
                                        <label for="ac-option"><b>Welcome to  My website </b><br>These terms and conditions outline the rules and regulations for the use of My Website, located at My Place.

By accessing this website we assume you accept these terms and conditions. Do not continue to use ecom if you do not agree to take all of the terms and conditions stated on this page.</label>
                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details border p-5">
                                    <div class="order-box">
                                        <div class="title-box">
                                             <?php $productsize=DB::table('product_size')->where('product_id',$product->id)->first();?>
                                       
                                           <ul class="qty border-bottom">
                                            
                                        <li>
                                            <span style="float: left;"><b>Product</b></span>
                                            <span><b>Qty </b></span>
                                            <span style="float: right;"><b>Total </b></span>
                                         </li>
                                                   
</ul>
                                        </div>
                                        <ul class="qty"> 
                                         
                                             
                                               <li><span style="float: left;">{{$product->name}}  </span> <span> {{$quantity}}</span>  <span style="float: right;">{{ $value->offer_price*$quantity }}</span></li>
                                          
                                        </ul>
                                        <ul class="sub-total border-top pt-3">
                                                
                                                     
                                                <li>Subtotal <span class="count float-right" style="float:right"><i class="fa fa-rupee" style="font-size:16px"></i>{{ $value->offer_price*$quantity }}</span></li>
                                       
                                       
                                             
                                               <li>GST <span class="count float-right" style="float:right"><i class="fa fa-rupee" style="font-size:16px"></i><?php   $pre=$value->offer_price*$quantity; 
                                             $priceper=($product->gst / 100) * $pre; 
                                               echo(sprintf("%.2f",$priceper));
                                             ?></span></li>

                                            
                                            <li>Shipping Charges <span class="count float-right" style="float:right">₹ {{$product->shipping_charges}} {{$product->shippingdetail}} 
                                             </span></li>

                                              
                                             
                                             
                                        </ul>
                                        
                                        
                                        <ul class="total">
                                             
                                                   <li>Total <span class="count float-right">₹ <?php echo(sprintf("%.2f",$value->offer_price*$quantity+$priceper+$product->shipping_charges)); ?> </span></li>
                                             <input type="hidden" name="amount" value="<?php echo(sprintf("%.2f",$value->offer_price*$quantity+$priceper+$product->shipping_charges));?>">
                                             <input type="hidden" name="quantity" value="{{$quantity}}">
                                             <input type="hidden" name="product_id" value="{{$productsize->product_id}}">
                                             <input type="hidden" name="color_id" value="{{$productsize->color_id}}">
                                             <input type="hidden" name="size_id" value="{{$productsize->id}}">
                                             <input type="hidden" name="catid" value="">
											<input type="hidden" name="gst" value="<?php echo(sprintf("%.2f",$priceper));?>">
                                              <input type="hidden" name="shipping" value="<?php echo(sprintf("%.2f",$product->shipping_charges));?>">
                                             
                                              
                                            
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    
                                                     
                                                    <li>
                                                        <div class="radio-option paypal">
                                                             
                                                            <label for="payment-3"> 
																<span class="image"><img
                                                                        src="{{asset('img/rajaor.png')}}"
                                                                        alt=""></span></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                         @if(Auth::check())
                                        <div class="text-right">
                                            <button type="submit" onclick="this.form.submit()" class="btn btn-dark btn-place-order text-white">Place Order</button></div>
                                        @else
                                         <div class="text-right"><a  data-toggle="modal" data-target=".bd-example-modal-lg"  class="btn btn-dark btn-place-order text-white">Place Order</a></div>
                                     
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </section>
	    </main>
    </form>
  
    @endif




@endsection