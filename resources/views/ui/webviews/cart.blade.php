<?php
use Illuminate\Support\Facades\Redis;
?>
@extends('ui.layout.main_ui')
@section('content')
<main class="main mb-2">
    <section class="cart-section section-b-space" style="margin-top:-39px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div style="overflow-x:auto;">
                    <table class="table cart-table  ">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
								<th scope="col">Sub Product Price</th>
                                <th scope="col">price</th>
                               <!-- <th scope="col">Size</th>-->
                                <th scope="col">quantity</th>
                                <th scope="col">total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                      <?php   $total =00;?>
                        
                        @foreach($user_cart as $value)
                        <tbody>
                            <tr>
                                <td>
                                     <?php 
                                     if (!empty(Redis::get('cart:productsr:' . $value->id . ':' .$value->color_id))) {
                                        $productsr = json_decode(Redis::get('cart:productsr:' . $value->id . ':' .$value->color_id), 0);
                                      } else {
                                        $productsr=DB::table('product_images')->where('product_id',$value->id)->where('color_id',$value->color_id)->first();
                                        Redis::set('cart:productsr:' . $value->id . ':' .$value->color_id , json_encode($productsr), 'EX', 60*60*12);
                                      }

                                     ?>
                                    <a href="#"><img src="@if($productsr!=null) {{asset($productsr->images)}} @endif" alt="" width="80">
	
									</a>
                                </td>
                                <td><a href="#">{{$value->name}}  
									
									<?php  
                                    $sa=0;
                                    $userID = Auth::user()->id;
                                    if (!empty(Redis::get('cart:sub_product_user:' . $value->id . ':' .$value->color_id))) {
                                        $damsa = json_decode(Redis::get('cart:sub_product_user:' . $value->id . ':' .$userID), 0);
                                      } else {
                                        $damsa=DB::table('add_sub_product_user')->where('product_id',$value->id)->where('user_id',$userID)->get();
                                        Redis::set('cart:sub_product_user:' . $value->id . ':' .$userID , json_encode($damsa), 'EX', 60*60*12);
                                      }
                                    ?>
										@if($damsa != "[]")
										@foreach($damsa  as $key=>$dam)
										<?php 
                                        if (!empty(Redis::get('cart:sub_product:' . $dam->sub_product_id))) {
                                            $brands = json_decode(Redis::get('cart:sub_product:' . $dam->sub_product_id), 0);
                                          } else {
                                            $brands=DB::table('sub_product')->where('id',$dam->sub_product_id)->first();
                                            Redis::set('cart:sub_product:' . $dam->sub_product_id , json_encode($brands), 'EX', 60*60*12);
                                          }

                                         ?>
									@if($brands != null) <br> <strong>  {{$brands->product_name}} </strong>
										<?php $sa +=$brands->price;?>
									@endif
										@endforeach	
										@endif
																						
									
									
									</a>
                               
								<td> <h6><strong> {{$sa}} </strong></h6></td>
                                <td>
                                <?php 
                                if (!empty(Redis::get('cart:product_size:' . $value->size))) {
                                    $productsize = json_decode(Redis::get('cart:product_size:' . $value->size), 0);
                                } else {
                                    $productsize=DB::table('product_size')->where('id',$value->size)->first();
                                    Redis::set('cart:product_size:' . $value->size , json_encode($productsize), 'EX', 60*60*12);
                                }
                                ?>
                     
                                    <h6>{{$value->offer_price}}</h6>
                                </td>
                                <td>
                                    <div class="qty-box ">
                                        <div class="input-group">
                                            <form action="{{url('add-cart-quantity')}}" method="get">
                                                <input type="hidden"  name="cart_id"  value="{{$value->cart_id}}" class=" ">
                                            <div class="product-single-filter flex-column align-items-start">
											 <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" name="quantity" id="quantity" value="{{$value->quantity}}" type="text" onchange="this.form.submit()" >
                                        </div>
											 </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                 <td>
                                    
                                   
                                    <h6 class="td-color"> 
                                   <?php 
                                    echo($value->offer_price*$value->quantity+$sa); 
                                    $total+=$value->offer_price*$value->quantity+$sa;
                                    ?>
                                        
                                    </h6>
                                </td>
                                <td><a href="{{url('add-cart-delete/'.$value->cart_id)}}" class="icon" ><i  class="fa fa-trash" style="color: red;font-size: 22px;"></i></a></td>
                               
                            </tr>
                        </tbody>
                         @endforeach
                    </table>
                     </div>
                    <table class="table cart-table table-responsive-md float-right sktablewidth" >
                        <tfoot>
                            <tr>
                                <td  class="text-right"> <h2>Total price : </h2></td>
                                <td class="text-right">
                                    <h2>₹{{$total}}</h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                   
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="{{url('/')}}" class="btn btn-primary">continue shopping</a></div>
                <div class="col-6"><a href="{{url('checkout-form')}}" class="btn btn-primary">check out</a></div>
            </div>
        </div>
    </section>
</main>
@endsection