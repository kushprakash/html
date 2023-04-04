@extends('ui.layout.main_ui')
@section('content')

<main class="main ">
 
            <div class="container mb-3 mt-3">
                <div class="row">
                    <div class="col-lg-9 main-content">
                        <div class="category-banner pt-0 pb-2">
                            <img class="slide-bg" src="{{asset('web-banner-Top-Three-Restaurant-Trends.jpg')}}" alt="banner" width="1500" height="320" style="height:200px;">
                            <div class="category-slide-content pt-1">
                                <!-- <h2 class="m-b-3">Winter Fashion Trends</h2>
                                <h3 class="text-uppercase ml-0">Up to 30% off on Jackets</h3> -->

                             <!--   <h5 class="text-uppercase d-inline-block mb-1 pb-2">Starting at<span class="coupon-sale-text font2"><sup>$</sup>199<sup>99</sup></span></h5>
                                <a href="#" class="btn btn-dark btn-xl ls-0" role="button">Shop Now</a> -->
                            </div><!-- End .category-slide-content -->
                        </div><!-- End .category-slide -->

                        
     <?php   //dd($product);?>
                        @if($product!='[]')

                        <div class="row">
                       
                        @foreach($product as $new)
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
                                <div class="product-default inner-quickview inner-icon">
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
 @if(Auth::check())
         <?php   $session = Session::getId();    
         $resultad=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$new->id)->count();  
                   $wishtr=DB::table('wishlist')->where('customer_id',Auth::user()->id)->where('product_id',$new->id)->count(); ?> 
		                                 
                                                     @else
                                                     <?php  
 $session = Session::getId();   
  $resultad=DB::table('carts_temp')->where('user_id',$session)->where('product_id',$new->id)->count();
								$wishtr=DB::table('wishlist')->where('customer_id',$session)->where('product_id',$new->id)->count();
								?> 
 
                                                     @endif
										
										
										
                                        <div class="btn-icon-group">
                                            <a href="#"  @if($size!=null) id="skcart{{$size->id}}"  onclick="addcartsize({{$size->id}})" @endif class="btn-icon btn-add-cart product-type-simple" @if($resultad >0) style="background-color:red" @endif ><i class="icon-shopping-cart"></i></a>
											 <!-- <a href="#" class="btn-icon btn-add-cart" ><i class="icon-wishlist-2"></i></a>-->
											
                                        </div>
                                        <!-- <button onclick="addcartwish({{$new->id}})" class="btn-quickview" title="Wishlist"  style="color:black;background:white;display:block" ><i   id="skwish{{$new->id}}"  class="fa fa-heart" @if($wishtr >0) style="color:red" @else @endif></i> &nbsp; Wishlist</button>  -->
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                             <?php $catssid=DB::table('category')->where('id',$new->cat_id)->where('deleted_at',null)->first();
                 
                ?>
										@if($catssid != null)
                                        <a href="{{url('category-product/'.$catssid->id)}}" class="product-category">{{$catssid->category}}</a>
										@endif
												
															 
 <div class="modal fade" id="exampleModalCenter{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Share</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                             <div class="row ">
                                                 <div class="col-lg-1 col-2">
                                                  
                                                                                   
                                                              <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                                                              <?php $currentURL = URL::current();
                                                     ?>
                                                       <a href="whatsapp://send?text={{url('product-detail/'.$new->id.'/'.$color_id)}}" onclick="window.open(this.href, 'Dinkachika',
                                      'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;" class="social-icon social-facebook fab fa-whatsapp success" title="icon-whatsapp"></a>
                                                 </div>
                                                        <div class="col-lg-1 col-2">
                                                       <a href="https://www.facebook.com/sharer/sharer.php?u={{url('product-detail/'.$new->id.'/'.$color_id)}}" class="social-icon social-facebook icon-facebook" onclick="window.open(this.href, 'Dinkachika',
                                      'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;" title="Facebook"></a>
                                                             </div>
                                                        <div class="col-lg-1 col-2">
                                                        <a href="https://twitter.com/intent/tweet?original_referer={{url('product-detail/'.$new->id.'/'.$color_id)}}&url={{url('product-detail/'.$new->id.'/'.$color_id)}}" onclick="window.open(this.href, 'Dinkachika',
                                      'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;" class="social-icon social-twitter icon-twitter"  title="Twitter"></a>
                                                             </div>
                                                        <div class="col-lg-1 col-2">
                                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=={{url('product-detail/'.$new->id.'/'.$color_id)}}" class="social-icon social-linkedin fab fa-linkedin-in" onclick="window.open(this.href, 'Dinkachika',
                                      'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;" title="Linkedin"></a>
                                                             </div>
                                                        
                                                        <div class="col-lg-1 col-2 ">
                                                        <a href="mailto:?subject={{$new->name}}&body={{url('product-detail/'.$new->id.'/'.$color_id)}}" class="social-icon social-mail icon-mail-alt"  title="Mail" onclick="window.open(this.href, 'Dinkachika',
                                      'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;"></a> 
                                                                            
                                              
                                            </div>
                                                 </div>
                                                
                                            </div>
                                            
                                          </div>
                                        </div>
                                      </div>
                                                                              
                                                 
												
												
												
												
												
												
												
												
												
												
												
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="{{url('product-detail/'.$new->id.'/'.$color_id)}}">{{$new->name}}</a>
                                        </h3>
                                        <!-- End .product-container -->
                                        <div class="price-box">
                                        <?php $size=DB::table('product_size')->where('product_id',$new->id)->first(); $count=0;  ?>

                                            <span class="old-price">₹ {{$new->price}} </span>
                                            <span class="product-price">₹ {{$new->offer_price}}</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            @endforeach
							
                            
                        </div>
						@else
								<center>
						<h2 style="font-weight:800">This food  item is not currently available. </h2>
						
					</center>
                            @endif

                        <nav class="toolbox toolbox-pagination">
                        

                             
                        </nav>
                    </div><!-- End .main-content -->

                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
										 <?php 	$count = 1;
?>                           
                                        <ul class="cat-list">
											
											<?php $category=DB::table('category')->where('deleted_at',null)->get();?>
											 @foreach($category as $cat)
                                            <li>
                                                <a href="{{url('category-product/'.$cat->id)}}" onclick="this.form.submit()" class="collapsed">
                                                   {{$cat->category}} 
                                                </a>
                                                <div class="collapse" id="widget-category-1">
                                                    <ul class="cat-sublist">
														<?php $categorys=DB::table('products')->where('cat_id',$cat->id)->where('deleted_at',null)->count();?>
                                                        <li><span class="products-count">({{$categorys}})</span></li>
                                                   
                                                    </ul>
                                                </div>
                                            </li>
											
                                         
											  <?php 	$count++; ?>
                                        @endforeach
                                        </ul>
										  
                                       
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                           
                           <!-- <div class="widget widget-size">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true" aria-controls="widget-body-5">Size</a>

                                </h3>

                                <div class="collapse show" id="widget-body-5">
                                    <div class="widget-body">
                                        <ul class="config-size-list">
                                            <li class="active"><a href="#">XL</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">S</a></li>
                                        </ul>
                                    </div> 
                                </div> 
                            </div> -->

                             <!-- End .widget -->
                        </div><!-- End .sidebar-wrapper -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </main>
@endsection