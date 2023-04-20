<?php
use Illuminate\Support\Facades\Redis;
?>
@extends('ui.layout.main_ui')
@section('content')
<style>
	#skms .owl-stage .active{
		/*width: auto !important;*/
	}
	
	
	.rating-stars a.active:before, .rating-stars a:hover:before {
    content: "";
    font-weight: 900;
    color: orange;
}
	.product-single-details .rating-link:hover {
    text-decoration: none !important;
}
	.product-single-details .short-divider {
    width: 40px;
    height: 0;
    border-top: 0px solid #e7e7e7 !important;
    margin: 0 0 2.2rem;
    text-align: left;
}
	.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    color: #fff;
    background-color: #000;
    font-size: 14px;
    line-height: 3.2rem !important;
    text-align: center;
    text-decoration: none;
    opacity: 1;
}
 
</style>
<main class="main mb-2">

            <div class="container pt-1">
                <div class="row">
                    <div class="col-lg-12 main-content">
                        <div class="product-single-container product-single-default">
                            <div class="cart-message d-none">
                                <strong class="single-cart-notice"> Product  Add to Cart </strong>
                                <span> </span>
                            </div>

                            <div class="row">
                                <div class="col-md-6 product-single-gallery">
                                    <div class="product-slider-container">
                                        <div class="label-group">
                                             <div class="product-label "> 
												<!-- <span class=" " style="text-align:right"><i class="  fa fa-share-alt" style="font-size:25px;" data-toggle="modal" data-target="#exampleModalCenter"></i> </span>-->
											</div> 
                                            <!---->

                                            <?php 
                               $offer_price=0;
                                $mrp=0;
                                $rate3=0;
                               if($productsize!=null)
                               {
                                  if($product_detail->offer_price!=null)
                                  {
                                      $offer_price=$product_detail->offer_price;
                                  }  
                                  
                                  else{
                                      $offer_price=0;
                                  }
                            
                                 if($product_detail->price!=null){
                                      $mrp=$product_detail->price;
                                  }  
                                  
                                  else{
                                      $mrp=0;
                                  }
                               //
                               $decress=$mrp-$offer_price;
								  // dd($decress);
								   if($decress>0){
									    $decressper=$decress/$mrp*100;
								   }
								   else{
									   $decressper=0;
								   }
									   
                                 
								    //dd($decressper);
                                  $rate3= round($decressper, 2);
                               }
                            ?>

                                            <div class="product-label label-sale">
                                                - {{$rate3}}%   

                                            </div>
											
											
                                        </div>
										   @foreach($product as $key=>$value1)
										@if($key==1)
										@endif
										@endforeach
                                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
											
												
                                        @foreach($product as $value1)
      
                                             <div class="product-item example">
												 
												<div class=" zoom-box">
												<!--<img class=" product-single-image img "  src="{{asset($value1->images)}}" alt="product" >-->
                                           <img class="product-single-image img "  src="{{asset($value1->images)}}" data-zoom-image="{{asset($value1->images)}}"  width="200" height="150" alt="product" > 
												 
		  	</div>
												
                                            </div> 
                                            @endforeach
											
                                             
                                        </div>
                                        <!-- End .product-single-carousel -->
                                        <span class="prod-full-screen">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </div>

                                    <div class="prod-thumbnail owl-dots">
                                    @foreach($product as $value1)

                                        <div class="owl-dot">
                                            <img src="{{asset($value1->images)}}" width="110" height="110" alt="product-thumbnail" />
                                        </div>
                                        @endforeach
										 <div class="owl-dot">
											 <video width="110" height="110">
  <source src="{{asset($product_detail->product_video)}}" type="video/mp4">
 
  Your browser does not support the video tag.
</video> 
											</div>
                                        
                                    </div>
                                </div><!-- End .product-single-gallery -->

                                <div class="col-md-6 product-single-details">
                                    <h1 class="product-title">{{$product_detail->name}}</h1>

                                     
                                    <div class="ratings-container">
                                        <div class="product-ratings1">
											 <?php 
                                             if (!empty(Redis::get('product:review:' . $product_detail->id))) {
                                                $reviewsd = json_decode(Redis::get('product:review:' . $product_detail->id), 0);
                                              } else {
                                                $reviewsd=DB::table('product_review')->where('product_id',$product_detail->id)->where('status',0)->sum('rating');
                                                Redis::set('product:review:' . $product_detail->id, json_encode($reviewsd), 'EX', 60*60*12);
                                              }
                                             ?>
                                        </div>
                                    </div><!-- End .ratings-container -->
									<div class="float-right">									
										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <?php 
            $currentURL = URL::current();
            ?>
				 <a href="whatsapp://send?text={{$currentURL}}" onclick="window.open(this.href, 'Dinkachika',
'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;" class="social-icon social-facebook fab fa-whatsapp success" title="icon-whatsapp"></a>
		   </div>
			      <div class="col-lg-1 col-2">
				 <a href="https://www.facebook.com/sharer/sharer.php?u={{$currentURL}}" onclick="window.open(this.href, 'Dinkachika',
'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;" class="social-icon social-facebook icon-facebook"  title="Facebook"></a>
					   </div>
			      <div class="col-lg-1 col-2">
                  <a href="https://twitter.com/intent/tweet?original_referer={{$currentURL}}&url={{$currentURL}}"  onclick="window.open(this.href, 'Dinkachika',
'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;" class="social-icon social-twitter icon-twitter"  title="Twitter"></a>
					   </div>
			      <div class="col-lg-1 col-2">
                  <a href="https://www.linkedin.com/sharing/share-offsite/?url=={{$currentURL}}" onclick="window.open(this.href, 'Dinkachika',
'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;" class="social-icon social-linkedin fab fa-linkedin-in"  title="Linkedin"></a>
					   </div>
			      
			      <div class="col-lg-1 col-2">
                  <a href="mailto:?subject={{$product_detail->name}}&body={{$currentURL}}" onclick="window.open(this.href, 'Dinkachika',
'left=100,top=100,width=500,height=500,toolbar=1,resizable=0'); return false;" class="social-icon social-mail icon-mail-alt"  title="Mail"></a> 
                                      
		
	  </div>
		   </div>
		  
      </div>
      
    </div>
  </div>
</div>
										
										
										
										
										
										
										
									</div>
                                    <hr class="short-divider">

                                    <div class="price-box">
                                        <span class="product-price"><del>@if($productsize!=null) ₹ {{$product_detail->price}} @endif </del>  &nbsp;</span>
                                        <span class="product-price">@if($productsize!=null) ₹ {{$product_detail->offer_price}} @endif</span>
                                    </div><!-- End .price-box -->

                                    <div class="product-desc">
                                        
                                    </div><!-- End .product-desc -->

                                    <ul class="single-info-list">
                                        <?php 
                                        if (!empty(Redis::get('product:details:categories:'))) {
                                            $categories = json_decode(Redis::get('product:details:categories'), 0);
                                        } else {
                                            $categories=DB::table('category')->first();
                                            Redis::set('product:details:categories', json_encode($categories), 'EX', 60*60*12);
                                        }
                                        ?>
                                        <li class="text-white">
                                            CATEGORIES:
                                            <strong><a href="#" class="product-category text-white" style="color:white !important;">@if($categories != null) {{@$categories->category}} @endif  </a></strong>
                                        </li>
                                    </ul>
                                    <div class="product-filters-container">
										<div class="row">
											 
										 
											<div class="col-lg-12 col-12">
                                        <div class="product-single-filter flex-column align-items-start">
											 <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" id="quantity" type="text">
                                        </div>
											 </div>
									</div>
								</div>
                                       <!-- <div class="product-single-filter">
                                            <a class="font1 text-uppercase clear-btn ml-0" href="#">Clear</a>
                                        </div>
                                         ---->
                                    </div>

                                    <div class="product-action  ">
                                          @if(Auth::check())
         <?php   
         $session = Session::getId();
         if (!empty(Redis::get('product:details:carts:'. $product_detail->id))) {
            $resultad = json_decode(Redis::get('product:details:carts:' . $product_detail->id), 0);
        } else {
            $resultad=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$product_detail->id)->count();
            Redis::set('product:details:carts'. $product_detail->id, json_encode($resultad), 'EX', 60*60*12);
        }

        if (!empty(Redis::get('product:details:wishlist:'. $product_detail->id))) {
            $wishtr = json_decode(Redis::get('product:details:wishlist:' . $product_detail->id), 0);
        } else {
            $wishtr=DB::table('wishlist')->where('customer_id',Auth::user()->id)->where('product_id',$product_detail->id)->count();
            Redis::set('product:details:wishlist'. $product_detail->id, json_encode($wishtr), 'EX', 60*60*12);
        }
         ?> 
		                                 
                                                     @else
                                                     <?php  
 $session = Session::getId();   
  $resultad=DB::table('carts_temp')->where('user_id',$session)->where('product_id',$product_detail->id)->count();
								$wishtr=DB::table('wishlist')->where('customer_id',$session)->where('product_id',$product_detail->id)->count();
								?> 
 @endif
                                       

                                       <!-- End .product-single-qty -->
										 <button   class="btn btn-dark add-cart mr-2 skcart skbtncolor  " @if($productsize!=null) onclick="addcartsizeev({{$productsize->id}})"  id="skcart{{$productsize->id}}"  @endif @if($resultad >0) style="background-color:red" @endif title="Add to Bag">Add to Bag</button>
										<!-- <button   class="btn btn-white   skcart mr-2" @if($productsize!=null) onclick="addcartwish({{$product_detail->id}})"  id="skwish{{$product_detail->id}}"  @endif @if($wishtr >0) style="background-color:red" @else  @endif  title="Wishlist"><i class="icon-wishlist-2"></i>&nbsp; Wishlist</button> -->
										
<div class="sticky-navbar">
                                        <button   class="btn btn-dark add-cart mr-2 skbtncolor sticky-info" @if($productsize!=null) onclick="addcartsizeev({{$productsize->id}})" id="skcart{{$productsize->id}}" @endif @if($resultad >0) style="background-color:red" @endif title="Add to Bag">Add to Bag</button>
										<!-- <button   class="btn btn-white sticky-info  mr-2" @if($productsize!=null) onclick="addcartwish({{$product_detail->id}})" id="skwish{{$product_detail->id}}" @endif title="Wishlist" @if($wishtr >0) style="background-color:red" @else   @endif ><i class="icon-wishlist-2"></i>&nbsp; Wishlist</button> -->
										</div>
									@if(Auth::check())	 
										<!-- <button   class="btn btn-dark add-cart mr-2" onclick="skquantity()"  >buy now</button> -->
										@else
										<!--	 <button   class="btn btn-dark add-cart mr-2" data-toggle="modal" data-target=".bd-example-modal-lg" >buy now</button> -->
										@endif
								

                                       <!-- <a href="{{url('cart-detail')}}" class="btn btn-gray view-cart d-none">View cart</a>-->
                                    </div><!-- End .product-action -->

                                    <hr class="divider mb-0 mt-0 ">
	 
									
            <div class="row mt-3">
											<?php $sds=explode(",",$product_detail->sub_product); $sacount=0; //dd($sds);?>
											@if($sds != "[]")
											 @foreach($sds as $key=>$s)
											<?php $brands=DB::table('sub_product')->where('id',$s)->first();  //dd($brands); ?>
                                           
											@if($brands != null)
												<div class="col-lg-4">
													<div class=" border p-1 bg-white">
													@if($brands  != null)
													<img src="{{asset($brands->image)}}" style="height:150px;width:100%">
													
													@endif
														<form action="{{url('action-user-add-product')}}" method="Post">
															@csrf
															<input type="hidden" name="product_id" value="{{$product_detail->id}}">
															<input type="hidden" name="sub_product_id" value="{{$s}}">
															<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
															<?php $damsa=DB::table('add_sub_product_user')->where('product_id',$product_detail->id)->where('sub_product_id',$s)->where('user_id',Auth::user()->id)->first(); //dd($damsa);	?>
														
															@if($damsa == null)
														<button type="submit" class="btn   btn-info w-100 skbtncolor">Add</button>
															@else
															<a class="btn   btn-info w-100 skbtncolor" style="background:#6fc6a5;background-color:#6fc6a5;border:none;color:white;">Added</a>
															@endif
														
														
													<p style="text-align:center;color:black; font-size:20px">@if($brands  != null) {{$brands->product_name}} @endif <br>@if($brands  != null) Rs. {{$brands->price}} @endif</p>
															</form>
													 </div>
												
				</div>
				<?php $sacount++; ?>
				@endif
											@endforeach
												@endif
												</div>
									
									
									
                                    <div class="product-single-share mb-2">
                                    <!--    <label class="sr-only">Share:</label> -->

                                        <div class="social-iconsd mr-2">
                                        </div>
                                    </div><!-- End .product single-share -->
                                </div><!-- End .product-single-details -->
                            </div><!-- End .row -->
                        </div><!-- End .product-single-container -->

                        <div class="product-single-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                                </li>
                              
                            </ul>

                            <div class="tab-content   ">
                                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                    <div class="product-desc-content">
                                        <h6 class="text-white"> {{$product_detail->main_details}} </h6>
                                    </div><!-- End .product-desc-content -->
                                </div><!-- End .tab-pane -->
 			<div class="tab-pane fade" id="product-tab-spec" role="tabpanel" aria-labelledby="product-tab-spec">
                                    <div class="product-desc-content">
                                        <p> {{$product_detail->description}} </p>
                                    </div><!-- End .product-desc-content -->
                                </div>
                                <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                                    <div class="product-size-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="{{asset($product_detail->describtion_image)}}" alt="body shape">
                                            </div><!-- End .col-md-4 -->

                                            
                                        </div><!-- End .row -->
                                    </div><!-- End .product-size-content -->
                                </div><!-- End .tab-pane -->
     <!-- End .tab-pane -->

                                 
                                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                    <table class="table table-striped mt-2">
                                        <tbody>
                                            <!-- <tr>
                                                <th>Weight</th>
                                                <td>23 kg</td>
                                            </tr> -->

                                            <!-- <tr>
                                                <th>Dimensions</th>
                                                <td>12 × 24 × 35 cm</td>
                                            </tr> -->
                                            <?php 
                                            if (!empty(Redis::get('product:details:product_color:'. $product_detail->id))) {
                                                $product_color = json_decode(Redis::get('product:details:product_color:'. $product_detail->id), 0);
                                              } else {
                                                $product_color=DB::table('product_color')->where('product_id',$product_detail->id)->get();
                                                Redis::set('product:details:product_color:'. $product_detail->id, json_encode($product_color), 'EX', 60*60*12);
                                              }
                                            ?>

                                            <tr>
                                                <th>Color</th>
                                                <td>   @if($product_color!=null)
                                 @foreach($product_color as $valcolor)
                                     
                                 {{$valcolor->color_name}}

@endforeach
                                @endif

</td>
                                            </tr>

                                            <tr>
                                                <th>Size</th>
                                                <?php 
                                                if (!empty(Redis::get('product:details:product_size:'. $product_detail->id))) {
                                                $product_size1 = json_decode(Redis::get('product:details:product_size:'. $product_detail->id), 0);
                                              } else {
                                                $product_size1=DB::table('product_size')->where('product_id',$product_detail->id)->get();
                                                Redis::set('product:details:product_size:'. $product_detail->id, json_encode($product_size1), 'EX', 60*60*12);
                                              }
                                             ?>

                                                <td> @if($product_size1 != []) 
													@foreach($product_size1 as $r1)
                                                {{$r1->size}}   @endforeach @endif
</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
									<?php
                                    if (!empty(Redis::get('product:review:product_id' . $product_detail->id))) {
                                        $revd = json_decode(Redis::get('product:review:product_id' . $product_detail->id), 0);
                                      } else {
                                        $revd=DB::table('product_review')->where('product_id',$product_detail->id)->where('status',0)->get(); 
                                        Redis::set('product:review:product_id' . $product_detail->id, json_encode($revd), 'EX', 60*60*12);
                                      }
                                      $rev = count($revd);
									?>
                                    <div class="product-reviews-content">
                                        <h3 class="reviews-title">{{$rev}} review for {{$product_detail->name}}</h3>

										@if($revd != "[]")
										@foreach($revd as $rs)
                                        <div class="comment-list">
                                            <div class="comments">
                                                <figure class="img-thumbnail">
                                                    <img src="{{asset('assets1/assets/images/blog/author.jpg')}}" alt="author" width="80" height="80">
                                                </figure>

                                                <div class="comment-block">
                                                    <div class="comment-header">
                                                        <div class="comment-arrow"></div>

                                                         

                                                        <span class="comment-by">
                                                            <strong>{{ $rs->name }}</strong>  
                                                        </span>
                                                    </div>

                                                     
                                                </div>
                                            </div>
                                        </div>
										@endforeach
										@endif

                                        <div class="divider"></div>

                                        <div class="add-product-review">
                                            <h3 class="review-title">Add a review</h3>

                                            <form action="{{url('productreview')}}" class="comment-form m-0">
												@csrf
												<input type="hidden" name="product_id" value="{{$product_detail->id}}">
                                                <div class="rating-form">
                                                    <label for="rating">Your rating <span class="required">*</span></label>
                                                    <span class="rating-stars">
                                                        <a class="star-1" href="#">1</a>
                                                        <a class="star-2" href="#">2</a>
                                                        <a class="star-3" href="#">3</a>
                                                        <a class="star-4" href="#">4</a>
                                                        <a class="star-5" href="#">5</a>
                                                    </span>

                                                    <select name="rating" id="rating" required="" style="display: none;">
                                                        <option value="">Rate…</option>
                                                        <option value="5">Perfect</option>
                                                        <option value="4">Good</option>
                                                        <option value="3">Average</option>
                                                        <option value="2">Not that bad</option>
                                                        <option value="1">Very poor</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Your review <span class="required">*</span></label>
                                                    <textarea cols="5" rows="6"  name="review" class="form-control form-control-sm"></textarea>
                                                </div><!-- End .form-group -->


                                                <div class="row">
                                                    <div class="col-md-6 col-xl-12">
                                                        <div class="form-group">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input type="text" name="name" class="form-control form-control-sm" required>
                                                        </div><!-- End .form-group -->
                                                    </div>

                                                    <div class="col-md-6 col-xl-12">
                                                        <div class="form-group">
                                                            <label>Email <span class="required">*</span></label>
                                                            <input type="text" name="email" class="form-control form-control-sm" required>
                                                        </div><!-- End .form-group -->
                                                    </div>

                                                    <div class="col-md-6 col-xl-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="save-name" />
                                                            <label class="custom-control-label mb-0" for="save-name">Save my
                                                                name, email, and website in this browser for the next
                                                                time I
                                                                comment.</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </form>
                                        </div><!-- End .add-product-review -->
                                    </div><!-- End .product-reviews-content -->
                                </div><!-- End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .product-single-tabs -->
                    </div><!-- End .main-content -->

                    <div class="sidebar-overlay"></div>
                 <!--   <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>-->
                     <!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </main>

<script>
function skquantity(){
    var productdetail=<?php if($product_detail->id !=null){echo($product_detail->id);}?>;
    var productsize=<?php if($product_detail->id !=null){ echo($productsize->id);}?>;
        //alert(productdetail);
    
  var sk= document.getElementById('quantity').value;
   var url="https://dinkcha.com/dinkcha/public/checkout-form-bynow/"+productdetail+"/"+productsize+"/"+sk;
   window.location.replace(url);
    
}

</script>
@endsection