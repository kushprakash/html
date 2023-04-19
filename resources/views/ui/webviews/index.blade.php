 @extends('ui.layout.main_ui')
@section('content')
	
<div class="special-menu  slider-wrap" id="page" loop style="overflow:scroll !important;z-index:999999999999">
			<div class="special-menu-inner slider-wrap" style="overflow:scroll !important;">
			
				 <?php 
                 if (!empty(Redis::get('category:catss'))) {
                    $catss = Redis::get('category:catss');
                  } else {
                    $catss=DB::table('category')->where('deleted_at',null)->get();
                    Redis::set('category:catss', $catss, 'EX', 60*60*12);
                  }
                 
                 $count=1;
                ?>
                @foreach($catss as $key=>$ca)   
				 <a href="{{url('category-product/'.$ca->id)}}" class="slider-slide-wrap" ><img src="{{asset($ca->cat_img)}}" alt="img-1" class="p-2"/><p>{{$ca->category}}</p></a>
				@endforeach
			</div>
		</div>
 
        <main class="main">
            <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big">
                <?php 
                if (!empty(Redis::get('index:banner'))) {
                    $banner = Redis::get('index:banner');
                  } else {
                    $banner=DB::table('banner_image')->where('deleted_at',null)->get();
                    Redis::set('index:banner', $banner, 'EX', 60*60*12);
                  }
                $count=1;
                ?>
                @foreach($banner as $key=>$ban)
                <div class="home-slide home-slide1 banner d-flex align-items-center">
                    @if($ban->image != null)
                    <img class="  w-100 img-fluid" src="{{asset($ban->image)}}" style="background-color: #ecc;" alt="home banner">
                   @endif
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                      </div> 
                </div>
                <?php $count++; ?>
                @endforeach

            </div>

                    

         

            <section class="container pb-3 mb-1">
                <h2 class="section-title ls-n-15 text-center pb-2 m-b-4">Popular Products</h2>

                <div class="row py-4"style="background:#FFFFFF;padding:20px !important;">

                <?php  
                if (!empty(Redis::get('index:products'))) {
                    $products = Redis::get('index:products');
                } else {
                    $products=DB::table('products')->where('trending',0)->where('deleted_at',null)->get();
                    Redis::set('index:products', $products, 'EX', 60*60*12);
                }
                ?>
                @if($products != [])
                @foreach($products as $d)
                <?php
                if (!empty(Redis::get('product_coloru:' . $d->id))) {
                    $product_coloru = Redis::get('product_coloru:' . $d->id);
                } else {
                    $product_coloru=DB::table('product_color')->where('product_id',$d->id)->first();
                    Redis::set('product_coloru:' . $d->id, $product_coloru, 'EX', 60*60*12);
                }
                $color_id=0;
                if($product_coloru!=null) {
                    $color_id=$product_coloru->id;
                }
                ?>

                    <div class="col-6 col-sm-4 col-md-3 col-xl-3 appear-animate" data-animation-name="fadeIn" data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon bg-light p-2"  >

                        <?php 
                        if (!empty(Redis::get('product_images:' . $d->id))) {
                            $productimage = Redis::get('product_images:' . $d->id);
                        } else {
                            $productimage = DB::table('product_images')->where('product_id',$d->id)->first();
                            Redis::set('product_images:' . $d->id, $productimage, 'EX', 60*60*12);
                        }

                        if (!empty(Redis::get('product_size:' . $d->id))) {
                            $product_size = Redis::get('product_size:' . $d->id);
                        } else {
                            $product_size=DB::table('product_size')->where('product_id',$d->id)->first();
                            Redis::set('product_size:' . $d->id, $product_size, 'EX', 60*60*12);
                        }
                        ?>
                               
                            <figure>
                                <a href="{{url('product-detail/'.$d->id.'/'.$color_id)}}">
                                 @if($productimage != null)   <img src="{{asset($productimage->cover_image)}}" width="273" height="273" alt="productr" /> @endif
                                </a>
                                <div class="label-group">
                                   
                                </div>
								 @if(Auth::check())
                                 <?php 
                                 $session = Session::getId();
                                 $userId = Auth::user()->id;
                                 if (!empty(Redis::get('carts:count:' . $d->id .':' . $userId))) {
                                    $resultad = Redis::get('carts:count:' . $d->id .':' . $userId);
                                } else {
                                    $resultad=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$d->id)->count(); 
                                    Redis::set('carts:count:' . $d->id .':' . $userId, $resultad, 'EX', 60*60*12);
                                }

                                if (!empty(Redis::get('wishtr:count:' . $d->id .':' . $userId))) {
                                    $wishtr = Redis::get('wishtr:count:' . $d->id .':' . $userId);
                                } else {
                                    $wishtr=DB::table('wishlist')->where('customer_id',Auth::user()->id)->where('product_id',$d->id)->count();
                                    Redis::set('wishtr:count:' . $d->id .':' . $userId, $wishtr, 'EX', 60*60*12);
                                }
                                 ?> 
                                 @else
                                 <?php
                                 $session = Session::getId();
                                 $resultad=DB::table('carts_temp')->where('user_id',$session)->where('product_id',$d->id)->count();
                                 $wishtr=DB::table('wishlist')->where('customer_id',$session)->where('product_id',$d->id)->count();
                                 ?> 
                                 @endif
                                 <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"  @if($product_size!=null) onclick="addcartsize({{$product_size->id}})" id="skcart{{$product_size->id}}" @endif @if($resultad >0) style="background-color:red" @endif ><i class="icon-shopping-cart"></i></a>
                                </div>
                            </figure>
                            <div class="product-details ">
                                <div class="category-wrap">
                                    <div class="category-list">
										<?php 
                                        if (!empty(Redis::get('catssid:' . $d->cat_id ))) {
                                            $catssid = Redis::get('catssid:' . $d->cat_id);
                                        } else {
                                            $catssid=DB::table('category')->where('id',$d->cat_id)->where('deleted_at',null)->first();
                                            Redis::set('catssid:' . $d->cat_id , $catssid, 'EX', 60*60*12);
                                        }
                                        ?>
										@if($catssid != null)
                                        <a href="{{url('category-product/'.$catssid->id)}}" class="product-category">{{$catssid->category}}</a>
										@endif
										<div class="float-right">
 									</div>
										
										
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{url('product-detail/'.$d->id.'/'.$color_id)}}">{{$d->name}}</a>
                                </h3>
								
								
                                
                                <div class="price-box">
                                <?php 
                                if (!empty(Redis::get('product_size:' . $d->id ))) {
                                    $size = Redis::get('product_size:' . $d->id);
                                } else {
                                    $size = DB::table('product_size')->where('product_id',$d->id)->first();
                                    Redis::set('product_size:' . $d->id , $size, 'EX', 60*60*12);
                                }
                                $count=0;
                                ?>
                                          

                                    <span class="old-price">@if($size!=null) ₹ {{$d->price}} @endif </span>
                                    <span class="product-price">@if($size!=null) ₹ {{$d->offer_price}} @endif</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                </div>

                <hr class="mt-3 mb-6">
            </section>
        </main>

 <script>
	var page = document.getElementById('page');
var last_pane =$('.pane');
last_pane = last_pane[last_pane.length-1];
var dummy_x = null;

window.onscroll = function () {
  // Horizontal Scroll.
  var y = document.body.getBoundingClientRect().top;
  page.scrollLeft = -y;
  
  // Looping Scroll.
  var diff = window.scrollY - dummy_x;
  if (diff > 0) {
    window.scrollTo(0, diff);
  }
  else if (window.scrollY == 0) {
    window.scrollTo(0, dummy_x);
  }
}
// Adjust the body height if the window resizes.
window.onresize = resize;
// Initial resize.
resize();

// Reset window-based vars
function resize() {
  var w = page.scrollWidth-window.innerWidth+window.innerHeight;
  document.body.style.height = w + 'px';
  
  dummy_x = last_pane.getBoundingClientRect().left+window.scrollY;
}
	  </script>

        @endsection