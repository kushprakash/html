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
         
   </body>
</html>
