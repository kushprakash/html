
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gameskraftcafe.in</title>
   <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css') }}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jsgrid.css') }}">
    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin.css') }}">
        

    @yield('styles')
    <style>
		.btn-group, .btn-group-vertical {
  position: relative;
  display: inline-flex;
  vertical-align: middle;
  width:50%;
  margin-bottom: 20px;
}
		body{
		background:#00ffbd !important;	
		}
		.page-wrapper .page-body-wrapper .page-body {
  min-height: calc(100vh - 80px);
  margin-top: 80px;
  padding: 0 15px;
  position: relative;
  background-color: #00ffbd !important;
}
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > thead > tr > th, .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > thead > tr > td, .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > tbody > tr > th, .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody > table > tbody > tr > td {
    vertical-align: top;
}
.page-wrapper .page-body-wrapper .page-sidebar .sidebar-menu .sidebar-header {
    font-size: 14px;
    letter-spacing: 0.5px;
    padding-bottom: 12px;
    padding-top: 12px;
    text-transform: capitalize;
    font-weight: 600;
    color: #fff !important;
} 
.card1 {
    background:#fff;
    margin-bottom: 30px !important;
    border: 0px  !important;
    -webkit-transition: all 0.3s ease  !important;
    transition: all 0.3s ease  !important;
    letter-spacing: 0.5px  !important;
    border-radius: 8px  !important;
    -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, 0.05)  !important;
    box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, 0.05)  !important;
            
    margin-left: 20%;
margin-top: 8%;
 
margin-right: 5%; 
}
.dataTables_wrapper .dataTables_paginate {
  border: 1px solid #50525a;
  border-radius: 0.25rem;
  padding-top: 0;
  margin-left: 500px !important;
  color: black;
  background: #434343;
}
  .jsgrid-button {
    width: 40px;
    height: 40px;
    border: none;
    cursor: pointer;
    background-image: url(http://exportindiagroup.com/ecom/public/assets/images/js-grid.png);
    background-repeat: no-repeat;
    background-color: transparent;
}

.paginate_button{
    margin:20px;
}
  
.jsgrid-edit-button {
    background-position: 0 -120px;
    width: 16px;
    height: 16px;
}
.jsgrid-delete-button {
    background-position: 0 -80px;
    width: 16px;
    height: 16px;
}
.btn-danger {
    background-color: #ea1313 !important;
    border-color: #ea1313 !important;
}
    </style>
</head>
<body>
<div class="page-wrapper">
  <!-- Page Header Start-->
  @include('admin.common.header')
  <!-- Page Header Ends -->
  <!-- Page Body Start-->
  <div class="page-body-wrapper">
    <!-- Page Sidebar Start-->
    @include('admin.common.sidebar')
    <!-- Page Sidebar Ends-->
       @yield('content')
    @include('admin.common.footer')
    <!-- footer end-->
  </div>
</div>
<audio controls id="yourAudioTag" style="opacity:0;visibility: hidden;display:none">
  <source src="https://gameskraftcafe.in/short-success-sound-glockenspiel-treasure-video-game-6346.mp3" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio> 
 
     

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>

<!-- feather icon js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Sidebar jquery-->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

<!--chartist js-->
<script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>

<!--chartjs js-->
<script src="{{ asset('assets/js/chart/chartjs/chart.min.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

<!--copycode js-->
<script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!--counter js-->
<script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>

<!--peity chart js-->
<script src="{{ asset('assets/js/chart/peity-chart/peity.jquery.js') }}"></script>

<!--sparkline chart js-->
<script src="{{ asset('assets/js/chart/sparkline/sparkline.js') }}"></script>

<script src="{{ asset('assets/js/jsgrid/jsgrid.min.js') }}"></script>
<script src="{{ asset('assets/js/jsgrid/griddata-digital-sub.js') }}"></script>
<script src="{{ asset('assets/js/jsgrid/jsgrid-digital-sub.js') }}"></script>

<!--Customizer admin-->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>



<!--Customizer admin-->
<script src="{{ asset('assets/js/admin-customizer.js') }}"></script>

<!--dashboard custom js-->
<script src="{{ asset('assets/js/dashboard/default.js') }}"></script>

<!--right sidebar js-->
<script src="{{ asset('assets/js/chat-menu.js') }}"></script>

<!--height equal js-->
<script src="{{ asset('assets/js/height-equal.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

<!--script admin-->
<script src="{{ asset('assets/js/admin-script.js') }}"></script>
 
   <script>
   
  
 $(document).ready(function() {
    $('.select2').select2();
});
 

$(document).ready(function() {
    $('#example').DataTable( {
        order: [],
    scrollX: true,
        pageLength: 100,
       dom: 'lBfrtip<"actions">',
        buttons: [
            // {
            //     extend:    'copy',
            //     text:      '<i class="fa fa-files-o"></i>',
            //     titleAttr: 'Copy'
            // },
            {
                extend:    'excel',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            // {
            //     extend:    'csv',
            //     text:      '<i class="fa fa-file-text-o"></i>',
            //     titleAttr: 'CSV'
            // },
            {
                extend:    'pdf',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print'
            },
            {
                extend:    'colvis',
                text:      '<i class="fa fa-eye-slash"></i>',
                titleAttr: 'Colvis'
            } 
             

        ]
    } );
} );
   
</script>
    @yield('scripts') 
<script>
	setInterval(function(){ 
    //code goes here that will be run every 5 seconds.
		msk();
},9000);
  function msk(){
        
        var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("notiadmin") }}',true);

      xhr.onload = function () {      
      var cat= JSON.parse(xhr.responseText);
       console.log(cat);
          if(cat.noti > 0)  { 
              $( "#body" ).load( "#example" );
 
			  document.getElementById('yourAudioTag').play();
			  sk();
			 // document.getElementById('yourAudioTag').play();
			   
	 
   
} 
	  }
  xhr.send(); 
 } 
</script>
	<script>
	 
   
 
</script>
		<script>
 
  function sk(){
        
        var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("notiadmin-t") }}',true);

      xhr.onload = function () {      
      var cat= JSON.parse(xhr.responseText);
       console.log(cat);
          if(cat.noti > 0)  { 
              $('.notification-badge').text(cat.noti);
			   document.getElementById('yourAudioTag').pause();
		 	 // document.getElementById('yourAudioTag').play();
			   
	 
   
} 
	  }
  xhr.send(); 
 } 
</script>
</body>

</html>