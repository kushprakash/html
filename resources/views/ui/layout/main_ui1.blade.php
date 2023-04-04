<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Gameskraft</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Myntra">
    <meta name="author" content="SW-THEMES">
  
   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

 <!-- Favicon -->
 <link rel="icon" type="image/x-icon" href="{{asset('assets1/assets/images/icons/favicon.png')}}">

 <!-- Plugins CSS File -->
 <link rel="stylesheet" href="{{asset('assets1/assets/css/bootstrap.min.css')}}">

 <!-- Main CSS File -->
 <link rel="stylesheet" href="{{asset('assets1/assets/css/style.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets1/assets/vendor/fontawesome-free/css/all.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets1/assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
</head>

<body class="full-screen-slider">
    <div class="page-wrapper">
 
    <header class="header">
            
       
@include('ui.common.header')
</header>
@yield('content')
@include('ui.common.footer')
  





  <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

  <div class="mobile-menu-container">
      <div class="mobile-menu-wrapper">
          <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
          <nav class="mobile-nav">
              <ul class="mobile-menu">
                  <li><a href="index.php">Home</a></li>
                  <li>
                      <a href="demo3-shop.html">Categories</a>
                      <ul>
                          <li><a href="category.html">Full Width Banner</a></li>
                          <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                          <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                          <li><a href="https://www.portotheme.com/html/porto_ecommerce/category-sidebar-left.html">Left Sidebar</a></li>
                          <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                          <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                          <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                          <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                          <li><a href="#">List Types</a></li>
                          <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span class="tip tip-new">New</span></a></li>
                          <li><a href="category.html">3 Columns Products</a></li>
                          <li><a href="category-4col.html">4 Columns Products</a></li>
                          <li><a href="category-5col.html">5 Columns Products</a></li>
                          <li><a href="category-6col.html">6 Columns Products</a></li>
                          <li><a href="category-7col.html">7 Columns Products</a></li>
                          <li><a href="category-8col.html">8 Columns Products</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="demo3-product.html">Products</a>
                      <ul>
                          <li>
                              <a href="#" class="nolink">PRODUCT PAGES</a>
                              <ul>
                                  <li><a href="product.html">SIMPLE PRODUCT</a></li>
                                  <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                                  <li><a href="product.html">SALE PRODUCT</a></li>
                                  <li><a href="product.html">FEATURED & ON SALE</a></li>
                                  <li><a href="product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
                                  <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                  <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                  <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                              </ul>
                          </li>
                          <li>
                              <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                              <ul>
                                  <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                  <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                                  <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                  <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                                  <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                  <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a></li>
                                  <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                                  <li><a href="#">BUILD YOUR OWN</a></li>
                              </ul>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                      <ul>
                          <li>
                              <a href="wishlist.html">Wishlist</a>
                          </li>
                          <li>
                              <a href="cart.html">Shopping Cart</a>
                          </li>
                          <li>
                              <a href="checkout.html">Checkout</a>
                          </li>
                          <li>
                              <a href="dashboard.html">Dashboard</a>
                          </li>
                          <li>
                              <a href="login.html">Login</a>
                          </li>
                          <li>
                              <a href="forgot-password.html">Forgot Password</a>
                          </li>
                      </ul>
                  </li>
                  <li><a href="blog.html">Blog</a></li>
                  <li>
                      <a href="#">Elements</a>
                      <ul class="custom-scrollbar">
                          <li><a href="element-accordions.html">Accordion</a></li>
                          <li><a href="element-alerts.html">Alerts</a></li>
                          <li><a href="element-animations.html">Animations</a></li>
                          <li><a href="element-banners.html">Banners</a></li>
                          <li><a href="element-buttons.html">Buttons</a></li>
                          <li><a href="element-call-to-action.html">Call to Action</a></li>
                          <li><a href="element-countdown.html">Count Down</a></li>
                          <li><a href="element-counters.html">Counters</a></li>
                          <li><a href="element-headings.html">Headings</a></li>
                          <li><a href="element-icons.html">Icons</a></li>
                          <li><a href="element-info-box.html">Info box</a></li>
                          <li><a href="element-posts.html">Posts</a></li>
                          <li><a href="element-products.html">Products</a></li>
                          <li><a href="element-product-categories.html">Product Categories</a></li>
                          <li><a href="element-tabs.html">Tabs</a></li>
                          <li><a href="element-testimonial.html">Testimonials</a></li>
                      </ul>
                  </li>
              </ul>

              <ul class="mobile-menu mt-2 mb-2">
                  <li class="border-0">
                      <a href="#">
                          Special Offer!
                      </a>
                  </li>
                  <li class="border-0">
                      <a href="https://1.envato.market/DdLk5" target="_blank">
                          Buy Porto!
                          <span class="tip tip-hot">Hot</span>
                      </a>
                  </li>
              </ul>

              <ul class="mobile-menu">
                  <li><a href="login.html">My Account</a></li>
                  <li><a href="demo3-contact.html">Contact Us</a></li>
                  <li><a href="blog.html">Blog</a></li>
                  <li><a href="wishlist.html">My Wishlist</a></li>
                  <li><a href="cart.html">Cart</a></li>
                  <li><a href="login.html" class="login-link">Log In</a></li>
              </ul>
          </nav><!-- End .mobile-nav -->

          <form class="search-wrapper mb-2" action="#">
              <input type="text" class="form-control mb-0" placeholder="Search..." required />
              <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
          </form>

          <div class="social-icons">
              <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
              </a>
              <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
              </a>
              <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
              </a>
          </div>
      </div><!-- End .mobile-menu-wrapper -->
  </div><!-- End .mobile-menu-container -->

  <div class="sticky-navbar">
      <div class="sticky-info">
          <a href="index.php">
              <i class="icon-home"></i>Home
          </a>
      </div>
      <div class="sticky-info">
          <a href="demo3-shop.html" class="">
              <i class="icon-bars"></i>Categories
          </a>
      </div>
      <div class="sticky-info">
          <a href="wishlist.html" class="">
              <i class="icon-wishlist-2"></i>Wishlist
          </a>
      </div>
      <div class="sticky-info">
          <a href="login.html" class="">
              <i class="icon-user-2"></i>Account
          </a>
      </div>
      <div class="sticky-info">
          <a href="cart.html" class="">
              <i class="icon-shopping-cart position-relative">
                  <span class="cart-count badge-circle">3</span>
              </i>Cart
          </a>
      </div>
  </div>

  <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url({{asset('assets1/assets/images/newsletter_popup_bg.jpg')}})">
      <div class="newsletter-popup-content">
           <h2>Subscribe to newsletter</h2>

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
      </div><!-- End .newsletter-popup-content -->

      <button title="Close (Esc)" type="button" class="mfp-close">
          ×
      </button>
  </div><!-- End .newsletter-popup -->

  <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>


















     <!-- Plugins JS File -->
     <script src="{{asset('assets1/assets/js/jquery.min.js')}}"></script>
   <script src="{{asset('assets1/assets/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('assets1/assets/js/plugins.min.js')}}"></script>
   <script src="{{asset('assets1/assets/js/jquery.appear.min.js')}}"></script>

   <!-- Main JS File -->
   <script src="{{asset('assets1/assets/js/main.min.js')}}"></script>
</div>
</body>

</html>