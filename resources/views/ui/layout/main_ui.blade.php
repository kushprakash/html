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
      <link rel="stylesheet" href="{{asset('assets1/assets/css/style-developer.css')}}">
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
         <div class="mobile-menu-overlay"></div>
         <!-- End .mobil-menu-overlay -->
         <div class="mobile-menu-container">
            <div class="mobile-menu-wrapper">
               <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
               <nav class="mobile-nav">
                  <ul class="mobile-menu">
                     <li><a href="{{url('/')}}">Home</a></li>
                     <?php 
                     foreach($headerMenus as $headerMenu) {
                      $categories = $headerMenu['categories'] ?? [];
                     ?>
                     <li>
                        <a href="javascript:void(0)">{{$headerMenu['name']}}</a>
                        <ul>
                           @foreach($categories as $key=>$category)
                           <li><a href="{{url('category-product/'.$category['id'])}}">{{$category['name']}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <?php } ?>
                  </ul>
                  <ul class="mobile-menu">
                     <li><a href="{{url('cart-detail')}}">Cart</a></li>
                  </ul>
               </nav>
               <!-- End .mobile-nav -->
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
            </div>
            <!-- End .mobile-menu-wrapper -->
         </div>
         <!-- End .mobile-menu-container -->
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
      <!--<script src="//geodata.solutions/includes/countrystatecity.js"></script>-->
      <!-- Main JS File -->
      <script src="{{asset('assets1/assets/js/main.min.js')}}"></script>
      <!--   <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fc2f9c5adb46c42"></script>--> 
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
      <!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63222793ed804ad5"></script>-->
      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
      <script></script>
      <script></script>
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
              var plus=+hr + +sa;
              document.getElementById('toa').innerHTML=plus;
              var idsk='skcart'+id;
              document.getElementById(idsk).style.backgroundColor = "red";
              i = i+1;
              alert('Success! Item Successfully added to your cart');
             } 
         }
             xhr.send();
         }       
            
      </script>
      <script>
         function addcartsizeev(id) 
          {
         var ska=document.getElementById('quantity').value;
              var xhr = new XMLHttpRequest();
              xhr.open('GET','{{ url("addCartJqueryd") }}?size_id='+id+'&qty='+ska,true);
              xhr.onload = function () {       
              var cat_id = JSON.parse(xhr.responseText);
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
                alert('Success! Item Successfully added to your cart');
              i = i+1;
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
           i=i+1;
         alert('Success! Item Successfully added to your cart');
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
          if (parseInt(password)==parseInt(passwordcon)) {
            sk.style.display = 'none';
          } else {
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
                  if(cat_id==0){
                    var div =  document.getElementById("emailshow1");
                    setTimeout(function() {
                      div.style.display = 'block';
                    },1 * 1000);
                  }else{
                    document.getElementById("emailshow1").style.display="none";
                  }
         } 
         xhr.send(); 
         }
      </script>
      <script>
         function addcartwish(id) 
         {
            var xhr = new XMLHttpRequest();
            xhr.open('GET','{{ url("addwishlist") }}?product_id='+id,true);
            xhr.onload = function () {       
            var cat_id = JSON.parse(xhr.responseText);
            document.getElementById("wishlistcount").innerHTML=+cat_id;
            var idsk='skwish'+id;
            document.getElementById(idsk).style.color = "red";
            alert('Success! Item Successfully added to your Wishlist');
             
         }
            xhr.send();
         }       
          
      </script>
      <script>
         setInterval(function(){ 
            //code goes here that will be run every 5 seconds.
          //msk();
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
            
              
             
            //goingameRaw()
           
         } 
           }
          xhr.send(); 
         } 
      </script>
      <script>
         setInterval(function(){ 
            //code goes here that will be run every 5 seconds.
          //mskm();
         },60 * 1000);
          function mskm(){
                
                var xhr = new XMLHttpRequest();
              xhr.open('GET','{{ url("notif") }}',true);
         
              xhr.onload = function () {      
              var cat= JSON.parse(xhr.responseText);
           }
          xhr.send(); 
         } 
      </script>
      <script>
         function goingameRaw()
         {
            //window.open("https://gameskraftcafe.in/my-order",'_self');
         }
            
      </script>
   </body>
</html>
