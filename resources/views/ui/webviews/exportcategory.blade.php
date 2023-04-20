<?php
use Illuminate\Support\Facades\Redis;
?>
@extends('ui.layout.main_ui')
@section('content')
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
    

    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                        aria-hidden="true"></i> back</span></div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">brand</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                       
                                        <!--<div class="custom-control custom-checkbox collection-filter-checkbox">-->
                                        <!--    <input type="checkbox" class="custom-control-input" id="vera-moda">-->
                                        <!--    <label class="custom-control-label" for="vera-moda">vera-moda</label>-->
                                        <!--</div>-->
                                        <!--<div class="custom-control custom-checkbox collection-filter-checkbox">-->
                                        <!--    <input type="checkbox" class="custom-control-input" id="forever-21">-->
                                        <!--    <label class="custom-control-label" for="forever-21">forever-21</label>-->
                                        <!--</div>-->
                                        <!--<div class="custom-control custom-checkbox collection-filter-checkbox">-->
                                        <!--    <input type="checkbox" class="custom-control-input" id="roadster">-->
                                        <!--    <label class="custom-control-label" for="roadster">roadster</label>-->
                                        <!--</div>-->
                                        <!--<div class="custom-control custom-checkbox collection-filter-checkbox">-->
                                        <!--    <input type="checkbox" class="custom-control-input" id="only">-->
                                        <!--    <label class="custom-control-label" for="only">only</label>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                            <!-- color filter start here -->
                            <!--<div class="collection-collapse-block open">-->
                            <!--    <h3 class="collapse-block-title">colors</h3>-->
                            <!--    <div class="collection-collapse-block-content">-->
                            <!--        <div class="color-selector">-->
                            <!--            <ul>-->
                            <!--                <li class="color-1 active"></li>-->
                            <!--                <li class="color-2"></li>-->
                            <!--                <li class="color-3"></li>-->
                            <!--                <li class="color-4"></li>-->
                            <!--                <li class="color-5"></li>-->
                            <!--                <li class="color-6"></li>-->
                            <!--                <li class="color-7"></li>-->
                            <!--            </ul>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!-- price filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">price</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="hundred">
                                            <label class="custom-control-label" for="hundred">₹10 - ₹100</label>
                                        </div>
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="twohundred">
                                            <label class="custom-control-label" for="twohundred">₹100 - ₹200</label>
                                        </div>
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="threehundred">
                                            <label class="custom-control-label" for="threehundred">₹200 - ₹300</label>
                                        </div>
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fourhundred">
                                            <label class="custom-control-label" for="fourhundred">₹300 - ₹400</label>
                                        </div>
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fourhundredabove">
                                            <label class="custom-control-label" for="fourhundredabove">₹400
                                                above</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card">
                            <h5 class="title-border">new product</h5>
                            <div class="offer-slider slide-1">
                                <div>
                                    @foreach($newproduct as $new)
                                    <div class="media">
                                        
                                              
                                            <a href="{{url('export-product-detail/'.$new->id)}}"><img src="{{asset($new->image)}}" class="img-fluid blur-up lazyload" alt=""></a>
                                         
                                        
                                           <div class="media-body align-self-center">
                                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                            <a href=" ">
                                                <h6>{{$new->name}}</h6>
                                            </a>
                                       
                                            <h4>₹ {{$new->offer_price}}</h4>
                                        
                                             
                                        </div>
                                    </div>
                                    
                                    @endforeach
                                </div>
                                <div> 
                                @foreach($newproduct as $news)
                                    <div class="media">
                                          <?php 
                                            
                                             
                                            
                                            if (!empty(Redis::get('image:data:' . $news->id ))) {
                                                $image = json_decode(Redis::get('image:data:' . $news->id ),0);
                                            } else {
                                                $image=DB::table('export_product_image')->where('product_id',$news->id)->first();
                                                Redis::set('image:data:' . $news->id , json_encode($image), 'EX', 60*60*12);
                                            }
                                            
                                            $count=0;  ?>
                                        
                                            
                                            <a href="{{url('export-product-detail/'.$news->id)}}"><img src="{{asset($news->image)}}" class="img-fluid blur-up lazyload" alt=""></a>
                                       
                                       
                                        
                                        <div class="media-body align-self-center">
                                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                            <a href="product_detail.html">
                                                <h6>{{$news->name}}</h6>
                                            </a>
                                    
                                            <h4>₹ {{$news->offer_price}}</h4>
                                            
                                        </div>
                                    </div>
                                     
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                        <!-- side-bar banner start here -->
                        
                        <!-- side-bar banner end here -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter" style="border: 1px solid #ddd;">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                         
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">
                                                @if($product!=null)
                                                @foreach($product as $r)
                                              <?php   //dd($r);  ?>
                                           <div class="col-xl-3 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                         
                                                            <div class="front">
                                                                
                                                                <a href="{{url('export-product-detail/'.$r->id)}}"><img src="{{asset($r->image)}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="{{url('export-product-detail/'.$r->id)}}"><img src="{{asset($r->image)}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                             
                                                        <?php 
                                  
                                
                                             if (!empty(Redis::get('product_size:data:' . $r->id ))) {
                                                $product_size = json_decode(Redis::get('product_size:data:' . $r->id ),0);
                                            } else {
                                                $product_size=DB::table('product_size')->where('product_id',$r->id)->first();
                                                Redis::set('product_size:data:' . $r->id , json_encode($product_size), 'EX', 60*60*12);
                                            }  
                                ?>
                                                            <div class="cart-info cart-wrap">
                                                                <!--<button data-toggle="modal" data-target="#addtocart"   onclick="addcartsize({{$r->id}})" title="Add to cart">-->
                                                                <!--    <i class="ti-shopping-cart"></i></button> <a href="javascript:void(0)" title="Add to Wishlist">-->
                                                                <!--        <i class="ti-heart" aria-hidden="true"></i>-->
                                                                <!--        </a>-->
                                                                        <!--<a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>-->
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>
                                                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                <a href="{{url('export-product-detail/'.$r->id)}}">
                                                                    <h6>{{$r->name}}</h6>
                                                                </a>
                                                                <p>{{$r->main_details}}</p>
                                                               
                                            <h4>₹ {{$r->offer_price}}</h4>
                                            
                                                                <ul class="color-variant">
                                                                    <li class="bg-light0"></li>
                                                                    <li class="bg-light1"></li>
                                                                    <li class="bg-light2"></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                                <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span
                                                                            aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Previous</span></a></li>
                                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i
                                                                                class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Next</span></a></li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom">
                                                            <h5>Showing Products 1-24 of 10 Result</h5>
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
                </div>
            </div>
        </div>
    </section>

@endsection