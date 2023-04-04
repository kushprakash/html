<style>
	.mkso{
	display:none;	
	}
	.dropbtn {
  
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
   
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
	font-size:14px;
  background:white;
  min-width:200px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 999;
	height:200px;
	overflow:hidden;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
	
}

.dropdown a:hover { }

.show {display: block;}
	
	
	
	
	
	
	
	
	.cart-counts {
  width: 16px;
  height: 20px;
  font-size: 0.963rem;
  line-height: 15px;
}
.cart-counts {
  z-index: 1;
}
.badge-circles {
  position:fixed;
  top:31px;
  margin:-10px;
    height:17px;
  width: 1.6rem;
  border-radius: 50%;
  color: #fff;
  background: #ff5b5b;
  font-weight: 600;
  font-size: 1.1rem;
  line-height: 1.6rem;
  font-family: "Open Sans", sans-serif;
  text-align: center;
}
	.modal-backdrop.show {
  opacity: 0;
  display: none;
}
	.sticky-header .cart-dropdown {
  margin-top: 0;
  margin-bottom: 30px;
}
	.main-nav .menu > li:first-child > a {
  padding-left: 28px;
}
	.header-icon {
  margin-left: -3px;
  margin-right: 23px;
  font-size: 26px;
  padding-bottom:17px;
}
	.sticky-header{
	padding-top:15px !important;
		padding-bottom:60px !important;
	}
	
	.header-right .header-icon-wishlist{
		padding-bottom:37px;
		 
	}
	.fixed .container-fluid{
		
	margin-top:5rem;	
	}
	.header-middle .header-right {
  margin-bottom: 18px;
}
	@media only screen and (max-width:800px) {
 .skh {
    margin-top:-10px;
  }
  .badge-circles {
  position:fixed;
  top:31px;
  margin:-10px;
  height:15px;
  margin-top:-22px;
  margin-left:-10px;
  width: 1.6rem;
  border-radius: 50%;
  color: #fff;
  background: #ff5b5b;
  font-weight: 600;
  font-size: 1.1rem;
  line-height: 1.6rem;
  font-family: "Open Sans", sans-serif;
  text-align: center;
}
		.mkso{
		display:block;
			opacity:1;
		}
		.skmol{
		height: 37px !important;	
		}
		.sticky-header{
	padding-top:0px !important;
		padding-bottom:0px !important;
	}
		.mobile-menu-toggler{
		margin-bottom:60px !important;	
		}
		.logo{
		margin-bottom:60px !important;	
		}
		.header-icon-wishlist{
			margin-bottom:17px !important;	
			
		}
			
	.header-right .header-icon-wishlist{
		padding-bottom:15px;
		margin-right: 2.3rem;
		
	}
}
	
</style>

 <div class="header-middle sticky-header fixed" style="top: 0px;">
     <div class="container-fluid">
         <div class="header-left">
             <button class="mobile-menu-toggler" type="button">
                 <i class="fas fa-bars"></i>
             </button>

             <a href="{{url('/')}}" class="logos" style="margin-bottom: 24px;">
                 <!-- <img src="{{asset('assets1/assets/images/logo-black.png')}}" alt="Porto Logo"> -->
				 <h3 class="skh"> <img src="{{asset('gk logo-01.png')}}" class="img-fluid skmol" style="height:50px; width:100%;">
               </h3>
             </a>

             <nav class="main-nav font2">
                 <ul class="menu">
                     <li class="active">
						 <a href="{{url('/index')}}"><h5>Home</h5></a>
                     </li>
				<!--	 <li class="">
                                              <a href="" class="sf-with-ul">Women </a>
                         <div class="megamenu megamenu-fixed-width megamenu-3cols" style="display: none; left: -15px;">
                             <div class="row">
                                 <div class="col-lg-4">
                                     <a href="#" class="nolink">VARIATION 1</a>
                                     <ul class="submenu">
                                                                                                              <li><a href="https://dinkcha.com/dinkcha/public/category-product/99">Sunglasses</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/100">Bags</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/101">Electronics</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/102">Fashion</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/103">Headphone</a></li>
                                                                                                                           
                                     </ul>
                                 </div>
                                 <div class="col-lg-4">
                                     <a href="#" class="nolink">VARIATION 2</a>
                                     <ul class="submenu">
                                                                                                              <li><a href="https://dinkcha.com/dinkcha/public/category-product/104">Shoes</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/105">cloth</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/107">Frocks</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/108">Soap</a></li>
                                                                                                                          
                                        </ul>
                                 </div>
                                 <div class="col-lg-4 p-0">
                                     <div class="menu-banner">
                                         <figure>
                                          
                                             <img src="https://dinkcha.com/dinkcha/public/upload/image1651155110.jpg" alt="Menu banner" width="300" height="300">
                                                                                         </figure>
                                      
                                     </div>
                                 </div>
                             </div>
                         </div> 
                     </li>
					 <li class="">
                                              <a href="" class="sf-with-ul"> Men</a>
                         <div class="megamenu megamenu-fixed-width megamenu-3cols" style="display: none; left: -15px;">
                             <div class="row">
                                 <div class="col-lg-4">
                                     <a href="#" class="nolink">VARIATION 1</a>
                                     <ul class="submenu">
                                                                                                              <li><a href="https://dinkcha.com/dinkcha/public/category-product/99">Sunglasses</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/100">Bags</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/101">Electronics</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/102">Fashion</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/103">Headphone</a></li>
                                                                                                                           
                                     </ul>
                                 </div>
                                 <div class="col-lg-4">
                                     <a href="#" class="nolink">VARIATION 2</a>
                                     <ul class="submenu">
                                                                                                              <li><a href="https://dinkcha.com/dinkcha/public/category-product/104">Shoes</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/105">cloth</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/107">Frocks</a></li>
                                                                                  <li><a href="https://dinkcha.com/dinkcha/public/category-product/108">Soap</a></li>
                                                                                                                          
                                        </ul>
                                 </div>
                                 <div class="col-lg-4 p-0">
                                     <div class="menu-banner">
                                         <figure>
                                          
                                             <img src="https://dinkcha.com/dinkcha/public/upload/image1651155110.jpg" alt="Menu banner" width="300" height="300">
                                                                                         </figure>
                                       
                                     </div>
                                 </div>
                             </div>
                         </div> 
                     </li>-->
					  <?php $menu=DB::table('header_menu')->where('deleted_at',null)->get();
                
                ?>
					 @foreach($menu as $key=>$sm)
                     <li>
                    
						 
                         <a href=""> @if($sm != null) {{$sm->menu_name}} @endif</a>
                         <div class="megamenu megamenu-fixed-width megamenu-3cols">
                             <div class="row">
                                 <div class="col-lg-4">
                                    <!-- <a href="#" class="nolink">VARIATION 1</a>-->
                                     <ul class="submenu">
                                     <?php $cat=DB::table('category')->where('header_name',$sm->id)->where('deleted_at',null)->take(5)->get();
                $cats=DB::table('category')->where('header_name',$sm->id)->where('deleted_at',null)->first();
                $count=1;
                ?>
                @if($cats != null)
                @foreach($cat as $key=>$ca)
                                         <li><a href="{{url('category-product/'.$ca->id)}}">{{$ca->category}}</a></li>
                                         @endforeach
                                         @endif
                                         
                                     </ul>
                                 </div>
                                 <div class="col-lg-4">
                                     <!--<a href="#" class="nolink">VARIATION 2</a>-->
                                     <ul class="submenu">
                                     <?php $cat=DB::table('category')->where('header_name',$sm->id)->where('deleted_at',null)->skip(5)->take(5)->get();
                $cats=DB::table('category')->where('header_name',$sm->id)->where('deleted_at',null)->skip(5)->take(5)->first();
                $count=1;
                ?>
                @if($cats != null)
                @foreach($cat as $key=>$ca)
                                         <li><a href="{{url('category-product/'.$ca->id)}}">{{$ca->category}}</a></li>
                                         @endforeach
                                         @endif
                                        
                                        </ul>
                                 </div>
                                 <div class="col-lg-4 p-0">
                                     <div class="menu-banner">
                                         <figure>
                                         @if($sm != null) 
                                             <img src="{{asset($sm->images)}}" alt="Menu banner" width="300" height="300">
                                             @endif
                                            </figure>
                                       <!--  <div class="banner-content">
                                            <!-- <h4>
                                                 <span class="">UP TO</span><br />
                                                 <b class="">50%</b>
                                                 <i>OFF</i>
                                             </h4>
                                             <a href="#" class="btn btn-sm btn-dark">SHOP
                                                 NOW</a> 
                                         </div>-->
                                     </div>
                                 </div>
                             </div>
                         </div> 
                     </li>
					 @endforeach
                     <!-- <li>
                         <a href="product.php">Products</a>
                         <div class="megamenu megamenu-fixed-width megamenu-3cols">
                             <div class="row">
                                 <div class="col-lg-4">
                                     <a href="#" class="nolink">PRODUCT PAGES</a>
                                     <ul class="submenu">
                                         <li><a href="product.html">SIMPLE PRODUCT</a></li>
                                         <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                                         <li><a href="product.html">SALE PRODUCT</a></li>
                                         <li><a href="product.html">FEATURED & ON SALE</a></li>
                                         <li><a href="product-custom-tab.html">WITH CUSTOM TAB</a></li>
                                         <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                         <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                         <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                                     </ul>
                                 </div>  -->

                                 <!-- <div class="col-lg-4">
                                     <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                     <ul class="submenu">
                                         <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                         <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                                         <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                         <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                                         <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                         <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a>
                                         </li>
                                         <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                                         <li><a href="#">BUILD YOUR OWN</a></li>
                                     </ul>
                                 </div> -->
                                 <!-- End .col-lg-4 -->
<!-- 
                                 <div class="col-lg-4 p-0">
                                     <div class="menu-banner menu-banner-2">
                                         <figure>
                                             <img src="{{asset('assets1/assets/images/menu-banner-1.jpg')}}" alt="Menu banner" class="product-promo" width="380" height="790">
                                         </figure>
                                         <i>OFF</i>
                                         <div class="banner-content">
                                             <h4>
                                                 <span class="">UP TO</span><br />
                                                 <b class="">50%</b>
                                             </h4>
                                         </div>
                                         <a href="shop.php" class="btn btn-sm btn-dark">SHOP NOW</a>
                                     </div>
                                 </div> 
                             </div> 
                         </div> 
                     </li> -->
                     
                     <!-- <li><a href="blog.html">Blog</a></li> -->
                     <!-- <li><a href="#">Buy Porto!</a> -->
					  
                      <li>
						   
						<!--   <form class="example hidelogs"  action="{{url('search2')}}" method="get"   style="">
							   
							    <input type="search" class="form-control radius w-100" name="search2" id="q" placeholder="I'm searching for..." required="" style="width: 500px !important;border-radius: 25px;">
                         
							      <button class="btn btn-xs text-dark icon-magnifier" type="submit"></button>
							    
						  </form>-->
						  <form class="example hidelogs "  action="{{url('search2')}}" method="get" style="background:#e1e1e1e1;"   >
   <button type="submit" style="border-radius:5px;border:none;background:#e1e1e1e1;font-size:15px;height:40px;width:50px;"><i class="fa fa-search"></i></button>
<input type="text" class="" placeholder="I'm searching for.................." name="search2" style="border-radius:5px;background:#e1e1e1e1;width:150px;height:40px;border:none;padding:20px;">
 </form>

						  
					 </li>
                 </ul>
             </nav>
         </div><!-- End .header-left -->

         <div class="header-right">
			 
			 
			
			 
             <div class="header-search header-search-popup header-search-category d-none d-sm-block">
             <!--    <a href="#" class="search-toggle" role="button"><h5><i class="icon-magnifier"></i></h5></a> -->
				  
                 <form class="example hidelogs"  action="{{url('search2')}}" method="get"   style="">

                     <div class="header-search-wrapper">
                         <input type="search" class="form-control" name="search2" id="q" placeholder="I'm searching for..." required="">
                         <div class="select-custom">
                            <select  name="category"  style="" class="  skser "> 
                                            <?php $categroy1=DB::table('category')->get(); $count=0;   ?>
                                             <?php $categroy2=DB::table('header_menu')->get(); $count=0;   ?>
                                             <option class="dropdown-item">All</option>
                                            @foreach($categroy1 as $re)
                                          
                                            <option class="dropdown-item" value="{{$re->id}}">{{$re->category}}</option>
                                            @endforeach
                                             @foreach($categroy2 as $re1)
                                          
                                            <option class="dropdown-item" value="{{$re1->id}}">{{$re1->menu_name}}</option>
                                            @endforeach
                                            </select>

                         </div><!-- End .select-custom -->
                         <button class="btn text-dark icon-magnifier" type="submit"></button>
                     </div><!-- End .header-search-wrapper -->
                 </form>
             </div>

             @if(Auth::check())
			 
			 
    <div class="header-icon header-icon-user dropdown" >
       <button class="header-icon header-icon-user"  onclick="myFunction()" style="background:white;border:none"> <i class="fa fa-bell" style="font-size: 2.2rem !important;"></i>
		   <?php  $order = DB::table('order_detail')->where('user_id',Auth::user()->id)->where('notify',2)->count();?>
		   <span class="cart-counts badge-circles"  onclick="myFunction()" id="ids">{{$order}}</span>
		   </button> 
		   
		   <div id="myDropdown" class="dropdown-content">
			   <a href="{{url('my-order')}}" id="do" style="display:none"> </a>
			 <?php  $orderd = DB::table('order_detail')->where('user_id',Auth::user()->id)->where('notify',2)->get();?>
		      @if($orderd != "[]")
		       @foreach($orderd as $key=>$da) 
			         <a href="{{url('my-order')}}"># {{$da->order_id}}  @if($da->delivery==1)
													Food preparation
																	@endif
												   @if($da->delivery==2)
										  Food ready
													@endif
											  @if($da->delivery==3)

											 pick-up
											 @endif
						 
						{{$da->delivery_time}}
			   </a>
          @endforeach
			   @endif
  </div>
		 
    </div>
 
 
			 
			 
             <a href="{{url('profile')}}" class="header-icon header-icon-user" title="Profile"><h5 style="font-size: 13px;font-weight:700"><i class="icon-user-2"></i> </h5></a>

             @else
             <a href="#" class="header-icon header-icon-user" title="Login" data-toggle="modal" data-target=".bd-example-modal-lg"><h5 style="font-size: 13px;font-weight:700"><i class="icon-user-2"></i> </h5></a>
			 
			 
			 
			 
			 
			 
			 
			 
			 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			
			<div class="modal-content">
				<div class="page-wrapper">
					<button title="Close (Esc)" type="button" class="mfp-close" id="buttoncloas">
          ×
      </button>
					<!--<div class="authentication-box">-->
						<div class="container">
							<div class="row" style="display: flex;width: 100%;padding: 20px;"> 
								<!--<div class="col-md-5" style="background:rgba(0,0,0,0.5);">
									<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top:100px;">
										<div class="carousel-inner">
											<div class="carousel-item active">
												<img class="d-block w-100" src="{{asset('assets/images/home-banner/6.jpg')}}" alt="First slide">
											</div>
											<div class="carousel-item">
												<img class="d-block w-100" src="{{asset('assets/images/home-banner/3.jpg')}}" alt="Second slide">
											</div>
											<div class="carousel-item">
												<img class="d-block w-100" src="{{asset('assets/images/home-banner/1.jpg')}}" alt="Third slide">
											</div>
										</div>
										<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
									</div>
								</div> -->
								<div class="col-md-12">
									<div class="card tab2-card">
										<div class="card-body">
											<ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><span class="icon-user mr-2"></span>Login</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><span class="icon-unlock mr-2"></span>Register</a>
												</li>
											</ul>
											<div class="tab-content mt-2" id="top-tabContent">
												<div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
													<form action="{{ route('login') }}" method="POST">
													    {{ csrf_field() }}	
														<div class="form-group">
														<input type="email"   id="email" class="form-control @error('email') is-invalid @enderror" required placeholder="{{ trans('global.login_email') }}" name="email" autocomplete="off">
                                                            @error('email')
                                                        <div class="invalid-feedback">
                                                        {{ $message }}
                                                        </div>
                                                        @enderror	
                                                        </div>
														<div class="form-group">
															<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" minlength="8" onchange="skfunciton1()" required placeholder="{{ trans('global.login_password') }}" name="password" autocomplete="off">
                        								  <span id="emailshow1">
                                        Password Not Match
                                    </span>
                        								@error('password')
                            							<div class="invalid-feedback">
                               							 {{ $message }}
                            							</div>
                        								@enderror   
														</div>
														<div class="form-terms">
															<div class="custom-control custom-checkbox mr-sm-2">
																<input type="checkbox" class="custom-control-input" id="customControlAutosizing" required>
																<label class="custom-control-label" for="customControlAutosizing">Remember me</label>
																<a href="{{url('forget-password')}}" class="btn btn-default forgot-pass">lost your password</a>
															</div>
														</div>
														<div class="form-button">
															<button class="btn btn-primary" type="submit">Login</button>
														</div>

													</form>
												</div>
												<div class="tab-pane fade mt-2" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
													<form method="POST" action="{{ route('register') }}">
                        							@csrf
														<div class="form-group">
														<input required="" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{ old('name') }}" placeholder="Username *"  required>
															@if ($errors->has('name'))
                                    						<span class="invalid-feedback" role="alert">
                                        						<strong>{{ $errors->first('name') }}</strong>
                                    						</span>
                               								@endif
                               								</div>
														<div class="form-group">
														<input required=""  type="email"class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email *">
															@if ($errors->has('email'))
                                   							<span class="invalid-feedback" role="alert">
                                        						<strong>{{ $errors->first('email') }}</strong>
                                    						</span>
                                							@endif
                                							</div>
                                							<div class="form-group">
															<input required="" name="phone" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[78960]\d{9}$" title="Enter Valid mobile number ex.9811111111" type="text" class="form-control" placeholder="Phone Number *" id="exampleInputEmail12">
														</div>
														<div class="form-group">
														 <input id="passwordw"  placeholder="Password will be 8 character. *" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                    </div>
                                    <div class="form-group">
                                    <input id="password-confirm" placeholder="Confirm password *"  minlength="8" onchange="matchpassword(this.value)" onmouseover="matchpassword(this.value)" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                       <span id="passwordmatch">Password dont be match</span>
                                         
                                    </div>
                                   
														<div class="form-terms">
															<div class="custom-control custom-checkbox mr-sm-2">
																<input type="checkbox" class="custom-control-input" id="customControlAutosizing1" onclick="matchpassword(this.value)">
																<label class="custom-control-label" for="customControlAutosizing1"><span>I agree all statements in <a href="#"  class="pull-right">Terms &amp; Conditions</a></span></label>
															</div>
														</div>
														<div class="form-button">
															<button class="btn btn-primary" type="submit" onclick="this.form.submit()">Register</button>
														</div>

													</form>
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
		
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
@endif
			   @if(Auth::check())
         <?php   $session = Session::getId();    
         $wisht=DB::table('wishlist')->where('customer_id',Auth::user()->id)->count(); ?> 
                                                    
                                                     @else
                                                     <?php  
 $session = Session::getId();   
  $wisht=DB::table('wishlist')->where('customer_id',$session)->count(); ?> 
 
                                                     @endif
              <!-- <a href="{{url('wishlist')}}" class="header-icon header-icon-wishlist "  title="Wishlist" ><i class="icon-wishlist-2"></i> <span class="cart-count badge-circle" id="wishlistcount" style="right:auto !important;top: auto !important;">{{$wisht}}</span><p style="font-size: 13px;font-weight:700">Wishlist</p></a> -->

             <div class="dropdown cart-dropdown">
                 <a href="#" class="dropdown-toggle   cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" style="font-size: 13px;font-weight:700">
                     <i class="icon-cart-thick"></i>
					 
					
                     @if(Auth::check())
         <?php   $session = Session::getId();    
         $result=DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->count(); ?> 
                                                    
                                                     @else
                                                     <?php  
 $session = Session::getId();   
  $result=DB::table('carts_temp')->where('user_id',$session)->count(); ?> 
 
                                                     @endif

                     <span class="cart-count badge-circle" id="countouput"><?php echo($result); ?></span>
					  
                 </a>

                 <div class="cart-overlay"></div>

                 <div class="dropdown-menu mobile-cart">
                     <a href="#" title="Close (Esc)" class="btn-close">×</a>

                     <div class="dropdownmenu-wrapper custom-scrollbar">
                         <div class="dropdown-cart-header">Shopping Cart</div>
                         <!-- End .dropdown-cart-header -->
                         <?php  $totald=00;?>
                         @if(Auth::check())
                                                    <?php  $session = Session::getId(); 
            $user_carts= DB::table('products')->join('carts','products.id','=','carts.product_id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->orderBy('carts.id','desc')->select('products.*','carts.quantity','carts.cat_id as catid','carts.id as cart_id','carts.size','carts.color_id')->get();
            $counts=0;
        ?>
        @else
        <?php 
        $session = Session::getId(); 
            $user_carts = DB::table('products')->join('carts_temp','products.id','=','carts_temp.product_id')->where('carts_temp.user_id',$session)->orderBy('carts_temp.id','desc')->select('products.*','carts_temp.quantity','carts_temp.cat_id as catid','carts_temp.id as cart_id','carts_temp.size','carts_temp.color_id')->get();
        $counts=0;
        ?>
        @endif
        

                         <div class="dropdown-cart-products">
                         @foreach($user_carts as $value)

                             <div class="product">
                                 <div class="product-details">
                                     <h4 class="product-title">
                                         <a href="#">{{$value->name}}</a>
                                     </h4>
                                     <?php $productsizes=DB::table('product_size')->where('id',$value->size)->first();?>
                                     <span class="cart-product-info">
                                         <span class="cart-product-qty">{{$value->quantity}}</span>
                                         × ₹ @if($productsizes != null) <?php echo($value->offer_price); ?> @endif
                                     </span>
                                 </div><!-- End .product-details -->

                                 <figure class="product-image-container">
                                 <?php $productsrs=DB::table('product_images')->where('product_id',$value->id)->where('color_id',$value->color_id)->first(); ?>

                                     <a href="#" class="product-image">
                                         <img src="@if($productsrs!=null) {{asset($productsrs->images)}} @endif" alt="product" width="80" height="80">
                                     </a>

                                  <a href="{{url('add-cart-delete/'.$value->cart_id)}}" class="btn-remove" title="Remove Product"><span>×</span></a> 

                                 </figure>
                             </div><!-- End .product -->
                            @if($productsizes != null) 
                                        <?php 
                                      $totald+=$value->offer_price*$value->quantity;
                                      ?>
                                    
                                    @endif
                                        <?php $counts++; ?>   

                             @endforeach

                           
                              <!-- End .product -->
                         </div><!-- End .cart-product -->
                         <div class="dropdown-cart-products  appending_divsr" id="appending_divsr">

</div>


                         <div class="dropdown-cart-total">
                             <span>SUBTOTAL:</span>

							 <span class="cart-total-price float-right" id="toa">{{$totald}}</span>
                         </div><!-- End .dropdown-cart-total -->

                         <div class="dropdown-cart-action">
                             <a href="{{url('cart-detail')}}" class="btn btn-gray btn-block view-cart">View
                                 Cart</a>
                             <a href="{{url('checkout-form')}}" class="btn btn-dark btn-block">Checkout</a>
                         </div><!-- End .dropdown-cart-total -->
                     </div><!-- End .dropdownmenu-wrapper -->
                 </div><!-- End .dropdown-menu -->
             </div><!-- End .dropdown -->
         </div><!-- End .header-right -->
     </div><!-- End .container -->
  <!-- End .header-middle -->
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.hover = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>