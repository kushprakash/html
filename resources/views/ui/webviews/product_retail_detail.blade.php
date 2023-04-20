<?php
use Illuminate\Support\Facades\Redis;
?>
@extends('ui.layout.main_ui')
@section('content')
  <?php 
// Program to display URL of current page. 
  
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
  
// Here append the common URL characters. 
$link .= "://"; 
  
// Append the host(domain name, ip) to the URL. 
$link .= $_SERVER['HTTP_HOST']; 
  
// Append the requested resource location to the URL 
$link .= $_SERVER['REQUEST_URI']; 
       
// Print the link 
 
?> 

<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>product</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
     <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-sm-2 col-xs-12">
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-right-nav">
                                    @foreach($product as $value1)
                                    <div ><img src="{{asset($value1->images)}}" alt=""
                                            class="img-fluid  lazyload"></div>
                                 @endforeach           
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-10 col-xs-12 order-up">
                        <div class="product-right-slick">
                             @foreach($product as $value1)
                            <div><img src="{{asset($value1->images)}}" alt=""
                                            class="img-fluid   lazyload  example1 block__pic"></div>
                            @endforeach  
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>{{$product_detail->name}}</h2>
                                             
                                                    <h4>₹ {{$product_detail->retailer_price}}</h4>
                                            
                           
                            <?php 
                                 // dd($value1->id);
                                $product_color=DB::table('product_color')->where('product_id',$product_detail->id)->get();
                                ?>
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                            <ul class="color-variant">
                                @if($product_color!=null)
                                 @foreach($product_color as $valcolor)
                                     
                                   <a href="{{url('product-detail/'.$product_detail->id.'/'.$valcolor->id)}}"><li class="bg-light1" style="background-color:{{$valcolor->color_name}}; background:{{$valcolor->color_name}};"></li></a> 
                                @endforeach
                                @endif
                            </ul>
                           
                            <div class="product-description border-product">
                                 <div class="row">
                            <div class="col-md-6"> 
                            <h6 class="product-title"> Available Size</h6>
                                
                                <form action="{{url('product-detail-by-size')}}" method="get">
                                            <input type="hidden" value="{{$product_detail->id}}" name="id">
                                            
                                          <select name="size" class="btn btn-link shadow" onchange="this.form.submit()" style="margin-top:0px;border-top-right-radius: 60px 60px;border-bottom-right-radius: 60px 60px;border-top-left-radius: 60px 60px;border-bottom-left-radius: 60px 60px;">
                                               <?php  $product_size1=DB::table('product_size')->where('product_id',$product_detail->id)->get();
                                            ?>
                                            
                                          <option selected>Select</option>
                                          @foreach($product_size1 as $r1)
                                          <option value="{{$r1->id}}" >{{$r1->size}}</option>
                                          @endforeach
                                          
                                        </select>
                                    </form>       </div>
                            <div class="col-md-6">
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                class="btn quantity-left-minus" data-type="minus" data-field="">-</button> </span>
                                         <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button"
                                                class="btn quantity-right-plus" data-type="plus" data-field="">+</button></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                                        
                                            
                                 
                               
                            <div class="product-buttons">
                                @if(Auth::check())
                            
                            <a href="#" style="color:white;" @if($productsize!=null)  onclick="addcartsized({{$productsize->id}},'retailer',{{$product_detail->id}})" @endif data-toggle="modal" data-target="#addtocart" class="btn btn-solid">add to cart</a> 
                            <a href="{{url('checkout-form-bynowdetail/'.$product_detail->id.'/'.$productsize->id.'/'.'retailer')}}"  class="btn btn-solid">buy now</a>
                            <div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg addtocart">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="media">

                                          @foreach($product as $key=>$value1)
                                           @if($key==0)
                                        <a href="#">
                                            <img class="img-fluid blur-up lazyload pro-img"
                                                src="{{asset($value1->images)}}" alt="">
                                        </a>
                                        @endif
                                        @endforeach
                                        <div class="media-body align-self-center text-center">
                                            <a href="#">
                                                <h6>
                                                    <i class="fa fa-check"></i>Item
                                                    <span>men full sleeves</span>
                                                    <span> successfully added to your Cart</span>
                                                </h6>
                                            </a>
                                            <div class="buttons">
                                                <a href="{{url('cart-detail')}}" class="view-cart btn btn-solid">Your cart</a>
                                                <a href="{{url('checkout-form')}}" class="checkout btn btn-solid">Check out</a>
                                                <a href="{{url('/')}}" class="continue btn btn-solid">Continue shopping</a>
                                            </div>

                                            <div class="upsell_payment">
                                                <img src="{{asset('assets/images/payment_cart.png')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-section">
                                        <div class="col-12 product-upsell text-center">
                                            <h4>Customers who bought this item also.</h4>
                                        </div>
                                        <div class="row" id="upsell_product">
                                    <?php  $user_cart  = DB::table('products')->join('carts','products.id','=','carts.product_id')->where('carts.user_id',Auth::user()->id)->orderBy('carts.id','desc')->select('products.*','carts.quantity','carts.id as cart_id','carts.size','carts.color_id','carts.price')->get();
                                         ?>
                                           
                                           
                                        <?php $productst=DB::table('product_images')->where('product_id',$product_detail->id)->first(); ?>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="@if($productst!=null) {{asset($productst->images)}} @endif"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>{{$product_detail->name}}</span></a></h6>
                                                        <h4><span>₹ {{$product_detail->retailer_price}}</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $counte=0;?>
                                            @foreach($user_cart as $key=>$valu22)
                                             @if($counte>=1)
                                            
                                              <?php $productsr=DB::table('product_images')->where('product_id',$valu22->id)->first(); ?>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="@if($productsr!=null) {{asset($productsr->images)}} @endif"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>{{$valu22->name}}</span></a></h6>
                                                        <h4><span>₹{{$valu22->retailer_price*$valu22->quantity}}</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endif
                                       <?php $counte++; ?>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                            
                            
                             @else
                             <a style="color: white;" @if($productsize!=null) onclick="addcartsized({{$productsize->id}},'retailer',{{$product_detail->id}})" @endif data-toggle="modal" data-target="#addtocart" class="btn btn-solid">add to cart</a> <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-solid">buy now</a>
                          <div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg addtocart">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="media">

                                          @foreach($product as $key=>$value1)
                                           @if($key==0)
                                        <a href="#">
                                            <img class="img-fluid blur-up lazyload pro-img"
                                                src="{{asset($value1->images)}}" alt="">
                                        </a>
                                        @endif
                                        @endforeach
                                        <div class="media-body align-self-center text-center">
                                            <a href="#">
                                                <h6>
                                                    <i class="fa fa-check"></i>Item
                                                    <span>men full sleeves</span>
                                                    <span> successfully added to your Cart</span>
                                                </h6>
                                            </a>
                                            <div class="buttons">
                                                <a href="{{url('cart-detail')}}" class="view-cart btn btn-solid">Your cart</a>
                                                <a href="{{url('checkout-form')}}" class="checkout btn btn-solid">Check out</a>
                                                <a href="{{url('/')}}" class="continue btn btn-solid">Continue shopping</a>
                                            </div>

                                            <div class="upsell_payment">
                                                <img src="{{asset('assets/images/payment_cart.png')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-section">
                                        <div class="col-12 product-upsell text-center">
                                            <h4>Customers who bought this item also.</h4>
                                        </div>
                                        <div class="row" id="upsell_product">
                                    <?php  
                                    $user_cart  = DB::table('products')->join('carts_temp','products.id','=','carts_temp.product_id')->where('carts_temp.user_id',Session::getId())->orderBy('carts_temp.id','desc')->select('products.*','carts_temp.quantity','carts_temp.id as cart_id','carts_temp.size','carts_temp.color_id','carts_temp.price')->get();
                                          ?>
                                           
                                           
                                        <?php $productst=DB::table('product_images')->where('product_id',$product_detail->id)->first(); ?>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="@if($productst!=null) {{asset($productst->cover_image)}} @endif"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>{{$product_detail->name}}</span></a></h6>
                                                        <h4><span>₹ {{$product_detail->retailer_price}} </span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $counte=0;?>
                                            @foreach($user_cart as $key=>$valu22)
                                             @if($counte>=1)
                                            
                                              <?php 
                                              
                                               
                                              if (!empty(Redis::get('productsr:data:' . $valu22->id))) {
                                                    $productsr = json_decode(Redis::get('productsr:data:' . $valu22->id),0);
                                                } else {
                                                    $productsr=DB::table('product_images')->where('product_id',$valu22->id)->first();
                                                    Redis::set('productsr:data:' . $valu22->id, json_encode($productsr), 'EX', 60*60*12);
                                                }
                                              ?>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="@if($productsr!=null) {{asset($productsr->images)}} @endif"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>{{$valu22->name}}</span></a></h6>
                                                        <h4><span>₹{{$valu22->price*$valu22->quantity}}</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endif
                                       <?php $counte++; ?>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                            
                             @endif
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                @if($product_detail->main_details != null)
                                <p>{!!$product_detail->main_details!!}</p>
                                @endif
                                 @if($product_detail->describtion_image!=null)
                                <img src="{{asset($product_detail->describtion_image)}}"  class="img-fluid w-100">
                                @else
                                
                                @endif
                                
                                
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">share it</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                    <!--<div class="d-inline-block">-->
                                    <!--     	# @if(Auth::check())-->
                                    <!--    <a class="wishlist-btn"  @if($productsize!=null) href="{{url('add-to-wishlist/'.$productsize->id)}}" @endif ><i class="fa fa-heart ti-heart"></i><span-->
                                    <!--            class="title-font">Add To WishList</span></a>-->
                                    <!--    #  @else       -->
                                    <!--             <a class="wishlist-btn"  data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-heart ti-heart"></i><span-->
                                    <!--            class="title-font">Add To WishList</span></a>-->
                                    <!--  #  @endif    -->
                                    <!--</div>-->
                                </div>
                            </div>
                             @if($product_detail->today_deals==1)
                            <div class="border-product">
                                <h6 class="product-title">Time Reminder</h6>
                                <div class="timer">
                                    <p id="demo"><span>25 <span class="padding-l">:</span> <span
                                                class="timer-cal">Days</span> </span><span>22 <span
                                                class="padding-l">:</span> <span class="timer-cal">Hrs</span>
                                        </span><span>13 <span class="padding-l">:</span> <span
                                                class="timer-cal">Min</span> </span><span>57 <span
                                                class="timer-cal">Sec</span></span>
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- related products -->
    <section class="section-b-space pt-0 ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    
                    <h2>related products</h2>
                </div>
            </div>
            
            <div class="row search-product">
                  <?php
                   $relproduct=DB::table('products')->where('cat_id',$product_detail->cat_id)->where('sub_cat_id',$product_detail->sub_cat_id)->where('header_name',$product_detail->header_name)->get();
                  
                  ?>
            @foreach($relproduct as $value4)
            <?php 
          //  dd($value4->id);
             

             if (!empty(Redis::get('productimage1:data:' . $value4->id))) {
            $productimage1 = json_decode(Redis::get('productimage:data:' . $value4->id),0);
            } else {
            $productimage1=DB::table('product_images')->where('product_id',$value4->id)->first();

            Redis::set('productimage1:data:' . $value4->id, json_encode($productimage1), 'EX', 60*60*12);
            }

                   //dd($productimage1);
            ?>
            
              <?php 
                                 // dd($value1->id);
                                

                                if (!empty(Redis::get('product_colorf:data:' . $value4->id))) {
                                $product_colorf = json_decode(Redis::get('productimage:data:' . $value4->id),0);
                                } else {
                               $product_colorf=DB::table('product_color')->where('product_id',$value4->id)->first();

                                Redis::set('product_colorf:data:' . $value4->id, json_encode($product_colorf), 'EX', 60*60*12);
                                }


                                     if($product_colorf!=null){
                                          $color_id=$product_colorf->id;
                                     }  
                                     else{
                                          $color_id=0;
                                     }
                                        
                                ?>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="{{url('product-detail/'.$value4->id.'/'.$color_id)}}"><img src="@if($productimage1!=null){{asset($productimage1->images)}} @endif"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="{{url('product-detail/'.$value4->id.'/'.$color_id)}}"><img src="@if($productimage1!=null){{asset($productimage1->images)}} @endif"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                             <div class="cart-info cart-wrap">
                               	@if(Auth::check())
                                    <button data-toggle="modal"  onclick="addcart({{$value4->id}})" data-target="#addtocart" title="Add to cart">
                                        <i class="ti-shopping-cart"></i>
                                    </button>
                                    @else
                                    <button data-toggle="modal" data-target=".bd-example-modal-lg" title="Add to cart">
                                        <i class="ti-shopping-cart"></i>
                                    </button>
                                    @endif
                                    <!--    @if(Auth::check())-->
                                    <!--<a href="javascript:void(0)"  onclick="wishlist({{$value4->id}})" title="Add to Wishlist">-->
                                    <!--    <i class="ti-heart" aria-hidden="true"></i>-->
                                    <!--</a>-->
                                    <!--@else-->
                                    <!--  <a href="#"  data-toggle="modal" data-target=".bd-example-modal-lg" title="Add to Wishlist">-->
                                    <!--    <i class="ti-heart" ></i>-->
                                    <!--</a>-->
                                    <!--@endif-->
                                    <!--<a href="#"-->
                                    <!--data-toggle="modal" data-target="#quick-view" title="Quick View"><i-->
                                    <!--    class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"-->
                                    <!--title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>-->
                                    </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                            <a href="product-page(no-sidebar).html">
                                <h6>{{$value4->name}}</h6>
                            </a>
                            
                            <?php 
                            
                            
                             if (!empty(Redis::get('size:data:' . $value4->id))) {
                                $size = json_decode(Redis::get('size:data:' . $value4->id),0);
                                } else {
                               $size=DB::table('product_size')->where('product_id',$value4->id)->first();

                                Redis::set('size:data:' . $value4->id, json_encode($size), 'EX', 60*60*12);
                                }
                            
                            $count=0;  ?>
                                            
                                            
                                              
                                        <h4>₹ {{$value4->retailer_price}}</h4>
                                        
                            
                            <ul class="color-variant">
                                 @if($product_color!=null)
                                 @foreach($product_color as $valcolor)
                                     
                                    <li class="bg-light1" style="background-color:{{$valcolor->color_name}}; background:{{$valcolor->color_name}};"></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
        </div>
    </section>
  <section class="section-b-space pt-0 ratio_asos  ">
         <div class="container">
            <div class="col-12 product-related">
                    <h2>product detail</h2>
            </div>
         <p style="font-size:18px;color:#000;">{!!$product_detail->description!!}</p>
          
         </div>
         
     </section>
       
@endsection