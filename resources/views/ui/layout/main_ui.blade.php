<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Gameskraftcafe.in</title>

    <meta name="keywords" content="" />
    <meta name="description" content="Myntra">
    <meta name="author" content="">
  
   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

 <!-- Favicon -->
 <link rel="icon" type="image/x-icon" href="{{asset('assets1/assets/images/icons/favicon.png')}}">

 <!-- Plugins CSS File -->
 <link rel="stylesheet" href="{{asset('assets1/assets/css/bootstrap.min.css')}}">

 <!-- Main CSS File -->
 <link rel="stylesheet" href="{{asset('assets1/assets/css/style.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets1/assets/vendor/fontawesome-free/css/all.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets1/assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" rel="stylesheet" type="text/css">
   
<style>
	.bg-light {
  background-color: #00FFBD !important;
}
	.page-header {
  padding: 1.5rem 0 !important;
  color: #222529;
  background-color: #6FC6A5 !important;
  text-align: center;
}
	.card-header {
  margin: 0;
  padding: 1.2rem 1.5rem;
  border-radius: 0;
  border-color: #00FFBD;
  background-color: #00FFBD;
  color: #000;
  font-weight: 700;
  line-height: 1.5;
  text-transform: uppercase;
}
	  .form-footer, form {
  margin-bottom: 1rem !important;
}
	.menu li a:hover{
	border-bottom:2px solid #ff3f6c !important;
	}
	.skwish i{
	 position: absolute; top:0; right:0;padding-right:10px;padding-top:5px;border-radius:50px;font-size:22px;color:red;z-index:999999999;	
	}
	.product-category{
	color:#ff905a !important;	
	}
	
	.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 99999999999999999999999999999999999999999999 !important;
  display: none;
  overflow: hidden;
  outline: 0;
}
		.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    color: #fff !important;
    background-color: #000;
    font-size: 14px;
    line-height: 3.2rem !important;
    text-align: center;
    text-decoration: none;
    opacity: 1;
			z-index:9999999999999;
}
	.fa-whatsapp{
	color:#26de6b !important;
		  background-color:white !important;
		font-size:25px !important;
	}
	.inner-icon .btn-icon-group {
  z-index: 0 !important;
}
	
	.inner-quickview figure .btn-quickview {
 
  z-index: 0 !important;
}
	.mobile-menu-container {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    max-width: 260px;
    background-color:#6fc6a5 !important;
    font-size: 1.2rem;
    line-height: 1.5;
    z-index: 1051;
    transform: translateX(-100%);
    transition: transform 0.25s;
    overflow-y: auto
}

	.price-box .old-price{
		color:#ff905a !important;	
	}
	.product-price{
		color:#000 !important;	
	}
	.skbtncolor{
	  border-color: #ff3e6c !important;
  background-color: #ff3e6c;
		 background: #ff3e6c;
  color: #fff;
 	
	}
	.skbtncolor:hover{
	  border-color: #ff5b5b !important;
  background-color: #ff5b5b !important;
  color: #fff;
 	
	}
	.btn-white{
	  border-color: #f1f1f1 !important;
  background-color: #fff  ;
		 background: #fff ;
  color: #000;
 	
	}
	.btn-white:hover{
	  border-color: #000 !important;
  background-color: #fff !important;
  color: #000;
 	
	}
	
	.at-branding-logo , .at-expanded-menu-branding{
		display:none !important;
		visibility:hidden !important;
		opacity:0 !important;
	}
	
	.product-default .product-details:hover{
		background:#fff !important;
		box-shadow: 10px 10px 10px 10px #f1f1f1 !important;	
		padding-left:30px;
	}
	
	.prod-full-screen {
  position: absolute;
  right: 2rem;
  bottom: 1.7rem;
  transition: all 0.5s;
  outline: none;
  opacity: 0;
  z-index: 99999999999999999999999;
  visibility: visible;
  display: block;
		opacity:1;
}
	footer .payment-icons .payment-icon {
  display: inline-block;
  vertical-align: middle;
  margin: 1px;
  width: 56px;
  height: 32px;
  background-color: #1bf3a2 !important;
  background-size: 80% auto;
  background-repeat: no-repeat;
  background-position: center;
  transition: opacity 0.25s;
  filter: invert(1);
  border-radius: 4px;
}
	.ratings-container .ratings::before {
  content: "";
  color: #fdaf17 !important;
}
	.skwish i:hover{
	 color:black;
	}
	.icon-plus{
	opacity:0 !important;	
	}
	#passwordmatch{
	display:none;	
	}
	#emailshow1{
		display:none;	
	}
	.skimg{
	height:250px !important;	
	}
	
	.product-action .viewcart{
		display:none;
	}
	.product-action .checkout{
		display:none;
	}
	.special-menu {
 padding-top:10px !important;
padding-bottom: 4px !important;
background: #fff;
	border-top:2px solid black;
  
}
	.FreeShippingBanner-sidebar {
  position: fixed;
  bottom: 130px;
  width: 44px;
  height: 288px;
  background-color: #535766;
  z-index: 6;
  color: #fff;
  letter-spacing: 1px;
  cursor: pointer;
		right:0;
}
	.FreeShippingBanner-arrow-collapsed {
  border-right: 14px solid #fff;
}
	.FreeShippingBanner-arrow {
  width: 0;
  height: 0;
  margin: 24px 16px;
  border-top: 12px solid transparent;
  border-bottom: 12px solid transparent;
}
	.FreeShippingBanner-sidebar-content {
  -webkit-writing-mode: vertical-rl;
  -ms-writing-mode: tb-rl;
  writing-mode: vertical-rl;
  -webkit-transform: rotate(-180deg);
  transform: rotate(-180deg);
  width: 36px;
  padding: 4px;
  height: 200px;
  vertical-align: middle;
  text-align: center;
  font-size: 24px;
  font-weight: 500;
  -webkit-margin-after: 0;
  margin-block-end: 0;
  -webkit-margin-before: 0;
  margin-block-start: 0;
  color: #fcfcfc;
  display: inline-block;
}
		 .skcart{
	opacity:1 !important;
			 visibility:visible;
	}
	@media only screen and (max-width: 800px) {
		.toolbox-right{
		margin-top:48px;	
		}
		 .skcart{
	 
			 opacity:0;
			  visibility:hidden;
	}
		.sticky-navbar{
  opacity: 1;
  visibility: visible;
  transform: translateY(-100%);
}
  .skbtncolor{
	    position: fixed;
            right: 0;
            bottom:70px;
            width: 100%;
            color: white;
            text-align: center;
	  padding:10px;
	  font-size:14px;
	  
		}
		.sticky-navbar .btn-white i {
  font-size: 17px !important;
  font-weight: 400;
}
		.sticky-navbar .sticky-info {
  flex: 0 0 20%;
  max-width: 50% !important;
  padding: 1rem 26px !important;
}
		 .btn-white{
	    position: fixed;
            left: 0;
             bottom:70px;
            width: 100%;
			 padding:5px !important;
			 font-size:14px;
            color: black;
            text-align: center;
			      
			 
		}
		
}

body{

background:#6FC6A5;
 font-family:'Montserrat';
}
	p,h1,h2,h3,h3,h4,h5,h6,span,button{

 font-family:'Montserrat';
}
	</style>
</head>

<body class="full-screen-slider">
    <div class="page-wrapper">
 
    <header class="header bg-white" style="height:90px;">
            
       
@include('ui.common.header')
</header>
@yield('content')
@include('ui.common.footer')
  
<!--<div class=" FreeShippingBanner-sidebar FreeShippingBanner-sidebar-collapsed"><div class=" FreeShippingBanner-arrow FreeShippingBanner-arrow-collapsed"></div><p class="FreeShippingBanner-sidebar-content">FLAT ₹300 OFF</p></div>
		
		
		
	-->	
		

		
		
		
		
		



  <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

  <div class="mobile-menu-container">
      <div class="mobile-menu-wrapper">
          <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
          <nav class="mobile-nav">
              <ul class="mobile-menu">
                  <li><a href="{{url('/')}}">Home</a></li>
				    <?php $menu=DB::table('header_menu')->where('deleted_at',null)->get();
                
                ?>
				  @if($menu != "[]")
					 @foreach($menu as $key=>$sm)
                  <li>
					  
                      <a href="#">@if($sm != null) {{$sm->menu_name}} @endif</a>
                       <ul>
						  <?php $cat=DB::table('category')->where('header_name',$sm->id)->where('deleted_at',null)->get();
                $cats=DB::table('category')->where('header_name',$sm->id)->where('deleted_at',null)->first();
                $count=1;
                ?>
                @if($cats != null)
                @foreach($cat as $key=>$ca)
                          <li><a href="{{url('category-product/'.$ca->id)}}">{{$ca->category}}</a></li>
						   
						     @endforeach
                              @endif
                          
                      </ul>  
                  </li>
				   @endforeach
                              @endif
                  <!-- <li>
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
                  </li> -->
                  <!-- <li>
                      <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                      <ul>
                           <li>
                              <a href="wishlist.html">Wishlist</a>
                          </li>  
                          <li>
                              <a href="{{url('cart-detail')}}">Shopping Cart</a>
                          </li>
                          <li>
                              <a href="{{url('checkout-form')}}">Checkout</a>
                          </li>
                          <li>
                              <a href="#">Dashboard</a>
                          </li>
                          <li>
                              <a href="{{url('user-login')}}">Login</a>
                          </li>
                            <li>
                              <a href="forgot-password.html">Forgot Password</a>
                          </li>  
                      </ul>
                  </li> -->
                  <!-- <li><a href="blog.html">Blog</a></li> -->
                  <!-- <li>
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
                  </li> -->
              </ul>

              

              <ul class="mobile-menu">
				   
                  <!-- <li><a href="demo3-contact.html">Contact Us</a></li> -->
                  <!-- <li><a href="blog.html">Blog</a></li> -->
                  <!-- <li><a href="wishlist.html">My Wishlist</a></li> -->
                  <li><a href="{{url('cart-detail')}}">Cart</a></li>
                   
              </ul>
          </nav><!-- End .mobile-nav -->

          <form class="search-wrapper mb-2" action="{{url('search2')}}" method="get">
              <input type="text" name="search2" class="form-control mb-0" placeholder="Search..." required />
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
          <a href="{{url('/')}}">
              <i class="icon-home"></i>Home
          </a>
      </div>
       
       <!--<div class="sticky-info">
		   
          <a href="{{url('wishlist')}}" class="">
			  
              <i class="icon-wishlist-2"></i>Wishlist
          </a>
      </div> -->
	  <div class="sticky-info">
		  @if(Auth::check())
		    <a href="{{url('profile')}}" class="" >
		  @else
          <a href="#" class="" title="Login" data-toggle="modal" data-target=".bd-example-modal-lg">
		@endif	  
              <i class="icon-user-2"></i>Profile
          </a>
      </div> 
       
      <div class="sticky-info">
          <a href="{{url('cart-detail')}}" class="">
              <i class="icon-shopping-cart position-relative">
                  <span class="cart-count badge-circle"  id="countouput1"></span>
              </i>Bag
          </a>
      </div>
  </div>

 
  <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>



</div>









 <audio controls id="yourAudioTag" style="opacity:0;visibility: hidden;display:none">
  <source src="{{asset('short-success-sound-glockenspiel-treasure-video-game-6346.mp3')}}" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio> 


     <!-- Plugins JS File -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		
     <script src="{{asset('assets1/assets/js/jquery.min.js')}}"></script>
   <script src="{{asset('assets1/assets/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('assets1/assets/js/plugins.min.js')}}"></script>
   <script src="{{asset('assets1/assets/js/jquery.appear.min.js')}}"></script>
 <!--<script src="//geodata.solutions/includes/countrystatecity.js"></script> -->
		<script src="//geodata.solutions/includes/countrystatecity.js"></script>
   <!-- Main JS File -->
   <script src="{{asset('assets1/assets/js/main.min.js')}}"></script>
	<!--	 <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fc2f9c5adb46c42"></script>--> 
	  <!-- Go to www.addthis.com/dashboard to customize your tools -->
<!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63222793ed804ad5"></script>-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
 
<script>
    
 
</script>
	  <script>
		   
	  </script>
	  <script>
		  
		  
		  
		  
/*$(document).ready(function() {
$('.zoom-box').hover(function() {
 $('.img').css('width', '200px');
$('.img').css('height', '200px');
});
});*/
	  </script>
			<script>
			
			$("#buttoncloas").click(function(){
  $('.bd-example-modal-lg').hide();
}); 
		</script>
   <script>
    $(window).on('load', function () {
        setTimeout(function () {
            $('#exampleModal').modal('show');
        }, 2500);
    });
    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
       function addcartsize(id) 
    {
    //  document.getElementById('adding').innerHTML='';
        console.log(id);
        var xhr = new XMLHttpRequest();
        xhr.open('GET','{{ url("addCartJquery") }}?size_id='+id,true);
        xhr.onload = function () {       
        var cat_id = JSON.parse(xhr.responseText);
        console.log(cat_id);
        if(cat_id.address>0){
        document.getElementById("countouput").innerHTML=+cat_id.address;
        document.getElementById("countouput1").innerHTML=+cat_id.address;
		
          var i = 1;

       var field='<div class="product"><div class="product-details"><h4 class="product-title"><a href="#">'+cat_id.address1.name+'</a></h4><span class="cart-product-info"> <span class="cart-product-qty">1</span>× ₹ '+cat_id.address4+'</span></div><figure class="product-image-container"><a href="#" class="product-image"> <img src=https://gameskraftcafe.in'+cat_id.address2.cover_image+' alt="product" width="80" height="80"> </a><a href="https://gameskraftcafe.in/add-cart-delete/'+cat_id.address1.id+'" class="btn-remove" title="Remove Product"><span>×</span></a>  </figure></div>'   
         $('.appending_divsr').append(field);
    var hr=document.getElementById('toa').innerHTML;
            var sa=cat_id.address4;
            console.log(hr);
              console.log(sa);
           var plus=+hr + +sa;
          document.getElementById('toa').innerHTML=plus;
          console.log(plus);
       var idsk='skcart'+id;
			console.log(idsk);
		 document.getElementById(idsk).style.backgroundColor = "red";
       //  location.reload();
        i = i+1
			alert('Success! Item Successfully added to your cart');
	

      //   location.reload();
         
        } 
    }
        xhr.send();
    }       
       
</script>
		
		<script>
			
			
			function addcartsizeev(id) 
    {
   var ska=document.getElementById('quantity').value;
        console.log(id);
        var xhr = new XMLHttpRequest();
        xhr.open('GET','{{ url("addCartJqueryd") }}?size_id='+id+'&qty='+ska,true);
        xhr.onload = function () {       
        var cat_id = JSON.parse(xhr.responseText);
        console.log(cat_id);
        if(cat_id.address>0){
        document.getElementById("countouput").innerHTML=+cat_id.address;
        document.getElementById("countouput1").innerHTML=+cat_id.address;
          var i = 1;

       var field='<div class="product"><div class="product-details"><h4 class="product-title"><a href="#">'+cat_id.address1.name+'</a></h4><span class="cart-product-info"> <span class="cart-product-qty">'+cat_id.address5+'</span>× ₹ '+cat_id.address4+'</span></div><figure class="product-image-container"><a href="#" class="product-image"> <img src=https://gameskraftcafe.in/'+cat_id.address2.cover_image+' alt="product" width="80" height="80"> </a>  <a href="https://gameskraftcafe.in/add-cart-delete/'+cat_id.address1.id+'" class="btn-remove" title="Remove Product"><span>×</span></a> </figure></div>'   
         $('.appending_divsr').append(field);
    var hr=document.getElementById('toa').innerHTML;
            var sa=cat_id.address4 * cat_id.address5;
            console.log(hr);
              console.log(sa);
           var plus=+hr + +sa;
          document.getElementById('toa').innerHTML=plus;
          console.log(plus);
alert('Success! Item Successfully added to your cart');
	

       //  location.reload();
        i = i+1;
      //   location.reload();
         
        } 
    }
        xhr.send();
    }       
       
		</script>

<script>
    
        function addcartsized(id,ex,y) 
    {
    //  document.getElementById('adding').innerHTML='';
        console.log(id);
         var i=1;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','{{ url("addCartJquerycat") }}?size_id='+id+'&cat_id='+ex+'&prod_id='+y,true);
        xhr.onload = function () {       
        var cat_id = JSON.parse(xhr.responseText);
        console.log(cat_id);
        if(cat_id.address>0){
        document.getElementById("countouput").innerHTML=+cat_id.address;
     //    document.getElementById("countouput1").innerHTML=+cat_id.address;
         
     var field='<div class="product"><div class="product-details"><h4 class="product-title"><a href="#">'+cat_id.address1.name+'</a></h4><span class="cart-product-info"> <span class="cart-product-qty">1</span>× ₹ '+cat_id.address4+'</span></div><figure class="product-image-container"><a href="#" class="product-image"> <img src=https://gameskraftcafe.in/'+cat_id.address2.cover_image+' alt="product" width="80" height="80"> </a><a href="https://gameskraftcafe.in/add-cart-delete/'+cat_id.address1.id+'" class="btn-remove" title="Remove Product"><span>×</span></a>  </figure></div>'   
        $('.appending_divsr').append(field);
            
            var hr=document.getElementById('toa').innerHTML;
            var sa=cat_id.address4;
            console.log(hr);
              console.log(sa);
           var plus=parseFloat(hr) + parseFloat(sa);
          document.getElementById('toa').innerHTML=plus;
          console.log(plus);
          i=i+1;
			alert('Success! Item Successfully added to your cart');
	

        //  location.reload();
        } 
    }
        xhr.send();
    }       
       
</script>
	<script>
  function  matchpassword(id){
var password = document.getElementById("passwordw").value;
var passwordcon = document.getElementById("password-confirm").value;
 var sk = document.getElementById("passwordmatch");
console.log(password);
console.log(passwordcon);
   if(parseInt(password)==parseInt(passwordcon)){
   console.log('none');
    sk.style.display = 'none';
 
   }
   else{
	   console.log('bloca');
         sk.style.display="block";
  
   }
    }
</script>
<script>
    function skfunciton1(){
        var email = document.getElementById("email").value;
         var password = document.getElementById("password").value;
        var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("countout1") }}?email_id='+email+',password='+password,true);

      xhr.onload = function () {       
      var cat_id = JSON.parse(xhr.responseText);
       console.log(cat_id);
             if(cat_id==0){

             var div =  document.getElementById("emailshow1");
                setTimeout(function() {
    div.style.display = 'block';
},1 * 1000);
   }
               
                else{
                      document.getElementById("emailshow1").style.display="none";
  
                }
               
     
          
     
} 
  xhr.send(); 
        
        
    }
</script>
		<script>
			
			  function addcartwish(id) 
    {
    //  document.getElementById('adding').innerHTML='';
        console.log(id);
        var xhr = new XMLHttpRequest();
        xhr.open('GET','{{ url("addwishlist") }}?product_id='+id,true);
        xhr.onload = function () {       
        var cat_id = JSON.parse(xhr.responseText);
        console.log(cat_id);
 
        document.getElementById("wishlistcount").innerHTML=+cat_id;
			var idsk='skwish'+id;
			console.log(idsk);
		 document.getElementById(idsk).style.color = "red";
             
         alert('Success! Item Successfully added to your Wishlist');

       //  location.reload();
       
      //   location.reload();
         
         
    }
        xhr.send();
    }       
      
		</script>
	  
	  <script>
 		  
	/*	  
    $(".slider-wrap").animate({ scrollLeft: $(document).height() }, 400000);
    setTimeout(function() {
       $('.slider-wrap').animate({scrollLeft:0}, 200000); 
    },200000);
  var scrolltopbottom =  setInterval(function(){
         // 4000 - it will take 4 secound in total from the top of the page to the bottom
    $(".slider-wrap").animate({ scrollLeft: $(document).height() }, 200000);
    setTimeout(function() {
       $('.slider-wrap').animate({scrollLeft:0}, 200000); 
    },200000);

    },400000);   

		  */
	
	  </script>
<script>
	setInterval(function(){ 
    //code goes here that will be run every 5 seconds.
		msk();
},9000);
  function msk(){
        
        var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("noti") }}',true);

      xhr.onload = function () {      
      var cat= JSON.parse(xhr.responseText);
       console.log(cat);
          if(cat.noti > 0)  { 
			    document.getElementById('yourAudioTag').play();
              document.getElementById("ids").innerHTML=cat.noti;
            document.getElementById("do").innerHTML=cat.order+" "+cat.status+" "+cat.deliverytime;
			  
         document.getElementById("do").style.display="block";
			    var msg=cat.order+" "+cat.status+" "+cat.deliverytime;
			   alert(msg);
			  //document.getElementById('yourAudioTag').pause();
			 // document.getElementById('yourAudioTag').play();
			
			  
			 
    goingameRaw()
   
} 
	  }
  xhr.send(); 
 } 
</script>
 <script>
	setInterval(function(){ 
    //code goes here that will be run every 5 seconds.
		mskm();
},60 * 1000);
  function mskm(){
        
        var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("notif") }}',true);

      xhr.onload = function () {      
      var cat= JSON.parse(xhr.responseText);
       console.log(cat);
           
			 
	  }
  xhr.send(); 
 } 
</script>
		<script>
			
function goingameRaw()
{
   window.open("https://gameskraftcafe.in/my-order",'_self');
}
		</script>

</body>

</html>