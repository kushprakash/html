 @extends('ui.layout.main_ui')
@section('content')
	
<div class="special-menu  slider-wrap" id="page" loop style="overflow:scroll !important;z-index:999999999999">
			<div class="special-menu-inner slider-wrap" style="overflow:scroll !important;">
			
				 <?php $catss=DB::table('category')->where('deleted_at',null)->get();
                $catssd=DB::table('category')->where('deleted_at',null)->first();
                $count=1;
                ?>
                @if($catssd != null)
                @foreach($catss as $key=>$ca)   
			  
				<a href="{{url('category-product/'.$ca->id)}}" class="slider-slide-wrap" ><img src="{{asset($ca->cat_img)}}" alt="img-1" class="p-2"/><p>{{$ca->category}}</p></a>
				 
				   @endforeach
                    @endif
				
				<!--<a href="#"><img src="https://images.unsplash.com/photo-1516257984-b1b4d707412e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bWVucyUyMGZhc2hpb258ZW58MHx8MHx8&w=1000&q=80" alt="img-1"/><p>Men</p></a>
				<a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8HjVrwHanBpF_dMUqgwBGbAoL7WDdMN5RmQ&usqp=CAU" alt="img-1"/><p>Women</p></a>
				<a href="#"><img src="https://media.istockphoto.com/photos/child-boy-modern-stock-photo-picture-id1296361252?b=1&k=20&m=1296361252&s=170667a&w=0&h=4SZXoxCb-tq_pUk8X04vaMdT4H91Qk1MYbN9iXvUV2g=" alt="img-1"/><p>Kids</p></a>
				<a href="#"><img src="https://adocouture.files.wordpress.com/2014/02/cropped-makeup.jpg" alt="img-1"/><p>Beauty</p></a>
				<a href="#"><img src="https://glaminati.com/wp-content/uploads/2016/11/tp-holiday-outfit-ideas-womens-fashion-1.jpg" alt="img-1"/><p>Winterwear</p></a>
				<a href="#"><img src="https://images.unsplash.com/photo-1531310197839-ccf54634509e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fGZvb3R3ZWFyfGVufDB8fDB8fA%3D%3D&w=1000&q=80" alt="img-1"/><p>Footwear</p></a>
				<a href="#"><img src="https://blog-admin.voylla.com/voylla-blog/wp-content/uploads/2020/04/Fashion-jewelry.png" alt="img-1"/><p>Jwellery</p></a>
				<a href="#"><img src="https://s3.envato.com/files/291606028/photo_potato_b51_018.jpg" alt="img-1"/><p>Accessories</p></a> -->
			</div>
		</div>
 
        <main class="main">
            <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big">
                <?php $banner=DB::table('banner_image')->where('deleted_at',null)->get();
                $banners=DB::table('banner_image')->where('deleted_at',null)->first();
                $count=1;
                ?>
                @if($banners != null)
                @foreach($banner as $key=>$ban)
                <div class="home-slide home-slide1 banner d-flex align-items-center">
                    @if($ban->image != null)
                    <img class="  w-100 img-fluid" src="{{asset($ban->image)}}" style="background-color: #ecc;" alt="home banner">
                   @endif
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                      <!--  @if($ban->style_text != null ) <h2>{{$ban->style_text}}</h2> @endif
                        @if($ban->offer_text != null )    <h3 class="text-uppercase mb-0">{{$ban->offer_text}}</h3> @endif
                        @if($ban->product_name != null )  <h4 class="m-b-4">{{$ban->product_name}}</h4> @endif

                        <h5 class="text-uppercase">@if($ban->starting_price_tittle != null ) {{$ban->starting_price_tittle}} @endif<span class="coupon-Offer-text"><sup>₹</sup>@if($ban->price){{$ban->price}}@endif</span></h5>
                        <a href="@if($ban->links != null ){{$ban->links}}@endif" class="btn btn-dark btn-xl" role="button">Shop Now</a>
                    --></div> 
                </div><!-- End .home-slide -->
                <?php $count++; ?>
@endforeach
@endif
               
                <!-- End .home-slide -->
            </div><!-- End .home-slider -->
<!-- <img src="{{asset('Tasty-Food-Web-Banner-Design-scaled.jpg')}}" class="img-fluid w-100"> -->
            <!--<section class="container">-->
            <!--    <h2 class="section-title ls-n-15 text-center pt-2 m-b-4">Order By Category</h2>-->

            <!--    <div class="owl-carousel owl-theme nav-image-center show-nav-hover nav-outer cats-slider appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">-->
                <?php $catss=DB::table('category')->where('deleted_at',null)->get();
                $catssd=DB::table('category')->where('deleted_at',null)->first();
                $count=1;
                ?>
                @if($catssd != null)
                @foreach($catss as $key=>$ca)   
                
                <!--<div class="product-category" style=" " >-->
                <!--        <a href="{{url('category-product/'.$ca->id)}}"  >-->
                         <!--   <figure style="background-image:url({{asset('assets/images/backimage.png')}}) !important;										   padding-left: 10px;padding-top: 10px;/*! background-color:#d3cdff !important; */ 
										  width:100%;/*! border: 2px solid #d3cdff; *//*! border-right: 30px solid #adaaf2; */
/*! border-bottom: 10px solid #adaaf2; */padding-right:10px;
padding-bottom: 0px;
										   background-repeat: no-repeat;
;
										   background-size:cover;
" >-->
							 <!--<figure style="" >-->
        <!--                        <img src="{{asset($ca->cat_img)}}" width="273" height="273"  class="skimg" alt="category" />-->
								<!-- <a href="#" class="skwish"><i class="icon-wishlist-2" ></i></a> -->
        <!--                    </figure>-->
        <!--                    <div class="category-content">-->
        <!--                        <h3>{{$ca->category}}</h3>-->
                                 
        <!--                    </div>-->
        <!--                </a>-->
        <!--            </div>-->
                    @endforeach
                    @endif
                    <!-- <div class="product-category">
                        <a href="demo3-shop.html">
                            <figure>
                                <img src="{{asset('assets1/assets/images/demoes/demo3/categories/category-2.jpg')}}" width="273" height="273" alt="category" />
                            </figure>
                            <div class="category-content">
                                <h3>Bags</h3>
                                <span><mark class="count">4</mark> products</span>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="demo3-shop.html">
                            <figure>
                                <img src="{{asset('assets1/assets/images/demoes/demo3/categories/category-3.jpg')}}" width="273" height="273" alt="category" />
                            </figure>
                            <div class="category-content">
                                <h3>Electronics</h3>
                                <span><mark class="count">8</mark> products</span>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="demo3-shop.html">
                            <figure>
                                <img src="{{asset('assets1/assets/images/demoes/demo3/categories/category-4.jpg')}}" width="273" height="273" alt="category" />
                            </figure>
                            <div class="category-content">
                                <h3>Fashion</h3>
                                <span><mark class="count">11</mark> products</span>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="demo3-shop.html">
                            <figure>
                                <img src="{{asset('assets1/assets/images/demoes/demo3/categories/category-5.jpg')}}" width="273" height="273" alt="category" />
                            </figure>
                            <div class="category-content">
                                <h3>Headphone</h3>
                                <span><mark class="count">3</mark> products</span>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="demo3-shop.html">
                            <figure>
                                <img src="{{asset('assets1/assets/images/demoes/demo3/categories/category-6.jpg')}}" width="273" height="273" alt="category" />
                            </figure>
                            <div class="category-content">
                                <h3>Shoes</h3>
                                <span><mark class="count">4</mark> products</span>
                            </div>
                        </a>
                    </div> -->
            <!--    </div>-->
            <!--</section>-->

         

            <section class="container pb-3 mb-1">
                <h2 class="section-title ls-n-15 text-center pb-2 m-b-4">Popular Products</h2>

                <div class="row py-4"style="background:#FFFFFF;padding:20px !important;">

                <?php  $products=DB::table('products')->where('trending',0)->where('deleted_at',null)->get();?>
                @if($products != [])
                @foreach($products as $d)
                <?php 
                                 // dd($value1->id);
                                $product_coloru=DB::table('product_color')->where('product_id',$d->id)->first();
                                     if($product_coloru!=null){
                                          $color_id=$product_coloru->id;
                                     }  
                                     else{
                                          $color_id=0;
                                     }
                                        
                                ?>

                    <div class="col-6 col-sm-4 col-md-3 col-xl-3 appear-animate" data-animation-name="fadeIn" data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon bg-light p-2"  >

                        <?php $productimage=DB::table('product_images')->where('product_id',$d->id)->first();?>
                        <?php $product_size=DB::table('product_size')->where('product_id',$d->id)->first();    ?>
                               
                            <figure>
                                <a href="{{url('product-detail/'.$d->id.'/'.$color_id)}}">
                                 @if($productimage != null)   <img src="{{asset($productimage->cover_image)}}" width="273" height="273" alt="productr" /> @endif
                                </a>
                                <div class="label-group">
                                    <!-- <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-Offer">-20%</div> -->
                                </div>
								 @if(Auth::check())
         <?php   $session = Session::getId();    
         $resultad=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$d->id)->count();  
                   $wishtr=DB::table('wishlist')->where('customer_id',Auth::user()->id)->where('product_id',$d->id)->count(); ?> 
		                                 
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
										<?php $catssid=DB::table('category')->where('id',$d->cat_id)->where('deleted_at',null)->first();
                 
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
                                <?php $size=DB::table('product_size')->where('product_id',$d->id)->first(); $count=0;  ?>
                                          

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
 <!-- End .row .feature-boxes-container-->
            </section>
        </main>







 <!--<div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url({{asset('assets1/assets/images/newsletter_popup_bg.jpg')}})">
      <div class="newsletter-popup-content">
           
          <p>
              Subscribe to the Porto mailing list to receive updates on new
              arrivals, special offers and our promotions.
          </p>

          <form action="#">
              <div class="input-group">
                  <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                  <input type="submit" class="btn btn-primary" value="Submit" />
              </div>
          </form>
          <div class="newsletter-subscribe">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                  <label for="show-again" class="custom-control-label">
                      Don't show this popup again
                  </label>
              </div>
          </div>
      </div> 

      <button title="Close (Esc)" type="button" class="mfp-close">
          ×
      </button>
  </div>  End .newsletter-popup -->
<!--<script type="text/javascript">
      $(document).ready(function(){

          if (!document.cookie.split(';').some((item) => item.includes('popup=hide'))) {
            $(".newsletter-popup").modal();
          }
      });

      $(".newsletter-popup").on('shown.bs.modal', function () {
          document.cookie = "popup=hide";
      });
    </script>-->
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