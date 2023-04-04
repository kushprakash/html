@extends('ui.layout.main_ui')
@section('content')

<style>
 
    </style>

<main class="main mb-2">
 
    <!-- breadcrumb End -->


    <!--section start-->
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
                                     <?php $productsr=DB::table('product_images')->where('product_id',$value->id)->where('color_id',$value->color_id)->first(); ?>
                                    <a href="#"><img src="@if($productsr!=null) {{asset($productsr->images)}} @endif" alt="" width="80">
	
									</a>
                                </td>
                                <td><a href="#">{{$value->name}}  
									
									<?php  $sa=0; $damsa=DB::table('add_sub_product_user')->where('product_id',$value->id)->where('user_id',Auth::user()->id)->get();  //dd($damsa);	?>
										@if($damsa != "[]")
										@foreach($damsa  as $key=>$dam)
										<?php $brands=DB::table('sub_product')->where('id',$dam->sub_product_id)->first(); //dd($brands); ?>
									@if($brands != null) <br> <strong>  {{$brands->product_name}} </strong>
										<?php $sa +=$brands->price; //echo($sa);?>
									@endif
										@endforeach	
										@endif
																						
									
									
									</a>
                               
								<td> <h6><strong> {{$sa}} </strong></h6></td>
                                <td>
                                <?php $productsize=DB::table('product_size')->where('id',$value->size)->first();?>
                     
                                    <h6>{{$value->offer_price}}
                                   
                                    </h6>
                                </td>
                               
                                <!-- <td>
                                    <h6> @if($productsize->size!=[])<?php echo($productsize->size); ?>    @endif</h6>
                                </td>
                             -->
                                
                                  
                               
                                <td>
                                    <div class="qty-box ">
                                        <div class="input-group">
											<!-- <div class="quantity buttons_added">
	<input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
</div>-->
											
											
											
                                            <form action="{{url('add-cart-quantity')}}" method="get">
                                                <input type="hidden"  name="cart_id"  value="{{$value->cart_id}}" class=" ">
                                            <div class="product-single-filter flex-column align-items-start">
											 <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" name="quantity" id="quantity" value="{{$value->quantity}}" type="text" onchange="this.form.submit()" >
                                        </div>
											 </div>
                                        <!--  <input type="number" onchange="this.form.submit()"  name="quantity"  value="{{$value->quantity}}" class="form-control input-number" style="width:40%;">-->
												 
												 
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
                             <?php   //$total+=$value->offer_price*$value->quantity; ?>
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