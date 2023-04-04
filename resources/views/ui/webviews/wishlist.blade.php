@extends('ui.layout.main_ui')
@section('content')

<main class="main ">
<div class="page-header ">
				 
                 </div>
            <div class="container-fluid mb-3 ">
                <div class="row">
                    <div class="col-lg-12 main-content">
                        <div class="category-banner pt-0 pb-2">
                            <img class="slide-bg" src="{{asset('assets1/assets/images/demoes/demo3/banners/banner-1.jpg')}}" alt="banner" width="1500" height="320">
                            <div class="category-slide-content pt-1">
                                <h2 class="m-b-3">Winter Fashion Trends</h2>
                                <h3 class="text-uppercase ml-0">Up to 30% off on Jackets</h3>

                             <!--   <h5 class="text-uppercase d-inline-block mb-1 pb-2">Starting at<span class="coupon-sale-text font2"><sup>$</sup>199<sup>99</sup></span></h5>
                                <a href="#" class="btn btn-dark btn-xl ls-0" role="button">Shop Now</a> -->
                            </div><!-- End .category-slide-content -->
                        </div><!-- End .category-slide -->
 
     <?php   //dd($product);?>
						<div class="container">
                        @if($wishlist!='[]')

                        <div class="row">
                       
                        @foreach($wishlist as $new)
                        <?php 
                                 // dd($value1->id);
                                $product_coloru=DB::table('product_color')->where('product_id',$new->id)->first();
                                     if($product_coloru!=null){
                                          $color_id=$product_coloru->id;
                                     }  
                                     else{
                                          $color_id=0;
                                     }
                                        
                                ?>
                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon border p-2">
                                    <figure>
                                    <?php $image=DB::table('product_images')->where('product_id',$new->id)->first(); $count=0;  ?>
                                        @if($image!=null)

                                        <a href="{{url('product-detail/'.$new->id.'/'.$color_id)}}">
                                            <img src="{{asset($image->images)}}" width="273" height="273" alt="productr" />
                                        </a>
                                        @else
                                        <a href="{{url('product-detail/'.$new->id.'/'.$color_id)}}">
                                            <img src="#" width="273" height="273" alt="productr" />
                                        </a>

                                        @endif
                                        <div class="label-group">
                                            <!-- <div class="product-label label-hot">HOT</div>
                                            <div class="product-label label-sale">-20%</div> -->
                                        </div>
										 <?php $size=DB::table('product_size')->where('product_id',$new->id)->first(); $count=0;  ?>

                                        <div class="btn-icon-group">
                                            
											  <a href="{{url('wishlist-delete/'.$new->wishlist_id)}}" class="btn-icon btn-add-cart" ><i class="fa fa-trash"></i></a>
                                        </div>
                                        
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                             <?php $catssid=DB::table('category')->where('id',$new->cat_id)->where('deleted_at',null)->first();
                 
                ?>
										@if($catssid != null)
                                        <a href="{{url('category-product/'.$catssid->id)}}" class="product-category">{{$catssid->category}}</a>
										@endif
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="{{url('product-detail/'.$new->id.'/'.$color_id)}}">{{$new->name}}</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                        <?php $size=DB::table('product_size')->where('product_id',$new->id)->first(); $count=0;  ?>

                                            <span class="old-price">₹ {{$size->price}} </span>
                                            <span class="product-price">₹ {{$size->offer_price}}</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            @endforeach
							
                            
                        </div>
							</div>
						@else
								<center>
						<h2 style="font-weight:800">	Data Not Found </h2>
						
					</center>
                            @endif

                        <nav class="toolbox toolbox-pagination">
                        

                             
                        </nav>
                    </div><!-- End .main-content -->

                    <div class="sidebar-overlay"></div>
                   <!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </main>
@endsection