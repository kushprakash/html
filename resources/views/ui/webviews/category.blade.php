<?php
use Illuminate\Support\Facades\Redis;
?>
@extends('ui.layout.main_ui')
@section('content')
    <main class="main ">
        <div class="page-header ">

        </div>
        <div class="container mb-3 mt-5">
            <div class="row">
                <div class="col-lg-9 main-content">
                    <div class="category-banner pt-0 pb-2">
                        <img class="slide-bg" src="{{ asset('web-banner-Top-Three-Restaurant-Trends.jpg') }}" alt="banner"
                            width="1500" height="320px" style="height:200px;">
                        <div class="category-slide-content pt-1">
                        </div>
                    </div>
                    <?php if(count($products)) { ?>
                    <div class="row">
                        <?php $checkproduct=array(); 
                            foreach($products as $product){
                        if(!isset($checkproduct[$product->id])){
                        
                        ?>
                        <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    @if (!empty($product->product_image))
                                        <a href="{{ url('product-detail/' . $product->id . '/' . $product->product_color_id) }}">
                                            <img src="{{ asset($product->product_image) }}" width="273" height="273"
                                                alt="productr" />
                                        </a>
                                    @else
                                        <a href="{{ url('product-detail/' . $product->id . '/' . $product->product_color_id) }}">
                                            <img src="#" width="273" height="273" alt="productr" />
                                        </a>
                                    @endif
                                    <div class="label-group">
                                        <!-- <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-20%</div> -->
                                    </div>
                                    <?php
                                    if (Auth::check()) {
                                        $resultad = DB::table('carts')
                                            ->where('user_id', Auth::user()->id)
                                            ->where('product_id', $product->id)
                                            ->count();

                                        $wishtr = DB::table('wishlist')
                                            ->where('customer_id', Auth::user()->id)
                                            ->where('product_id', $product->id)
                                            ->count();
                                    } else {
                                        $session = Session::getId();
                                        $resultad = DB::table('carts_temp')
                                            ->where('user_id', $session)
                                            ->where('product_id', $product->id)
                                            ->count();
                                        $wishtr = DB::table('wishlist')
                                            ->where('customer_id', $session)
                                            ->where('product_id', $product->id)
                                            ->count();
                                    }
                                    ?>
                                    <div class="btn-icon-group">
                                        <a href="#"
                                            @if (!empty($product->product_size_id)) id="skcart{{ $product->product_size_id }}"  onclick="addcartsize({{ $product->product_size_id }})" @endif
                                            class="btn-icon btn-add-cart product-type-simple"
                                            @if ($resultad > 0) style="background-color:red" @endif><i
                                                class="icon-shopping-cart"></i></a>

                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <?php  
                                             if(!empty($product->category_id && $product->category_name)) {
                                             ?>
                                            <a href="{{ url('category-product/' . $product->id) }}"
                                                class="product-category">{{ $product->category_name }}</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <h3 class="product-title">
                                        <a
                                            href="{{ url('product-detail/' . $product->id . '/' . $product->product_color_id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="price-box">
                                        <span class="old-price">₹ {{ $product->price }} </span>
                                        <span class="product-price">₹ {{ $product->offer_price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } $checkproduct[$product->id]=1;} ?>


                    </div>
                    <?php } else { ?>
                    <center>
                        <h2 style="font-weight:800">This food item is not currently available. </h2>
                    </center>
                    <?php } ?>
                    <nav class="toolbox toolbox-pagination">



                    </nav>
                </div><!-- End .main-content -->

                <div class="sidebar-overlay"></div>
                <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                    aria-controls="widget-body-2">Categories</a>
                            </h3>

                            <div class="collapse show" id="widget-body-2">
                                <div class="widget-body">
                                    <ul class="cat-list">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ url('category-product/' . $category->id) }}"
                                                    onclick="this.form.submit()" class="collapsed">
                                                    {{ $category->category }}
                                                </a>
                                                <div class="collapse" id="widget-category-1">
                                                    <ul class="cat-sublist">
                                                        <li>
                                                            <span
                                                                class="products-count">({{ $category->total_product }})</span>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>


                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div>
                    </div><!-- End .sidebar-wrapper -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </main>
@endsection
