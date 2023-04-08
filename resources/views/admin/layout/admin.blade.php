
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
<body id="body">
<div class="page-wrapper">
  <!-- Page Header Start-->
  @include('admin.common.header')
  <!-- Page Header Ends -->
  <!-- Page Body Start-->
  <div class="page-body-wrapper">
    <!-- Page Sidebar Start-->
    @include('admin.common.sidebar')
    <!-- Page Sidebar Ends-->
    <!-- Right sidebar Start-->
    <!-- Right sidebar Ends-->
    <div class="page-body">
      <!-- Container-fluid starts-->
      <div class="container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-lg-6">
              <div class="page-header-left">
                <h3>Dashboard <small>Multikart Admin panel</small>
                </h3>
              </div>
            </div>
            <div class="col-lg-6">
              <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item">
                  <a href="index.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                      <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                  </a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid Ends-->
      <!-- Container-fluid starts-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
              <div class="warning-box card-body">
                <div class="media static-top-widget align-items-center">
                  <div class="icons-widgets">
                    <div class="align-self-center text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation font-warning">
                        <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                      </svg>
                    </div>
                  </div>
                  <div class="media-body media-doller">
                    <span class="m-0">Earnings</span>
                    <h3 class="mb-0">$ <span class="counter">6659</span>
                      <small> This Month</small>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
              <div class="secondary-box card-body">
                <div class="media static-top-widget align-items-center">
                  <div class="icons-widgets">
                    <div class="align-self-center text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box font-secondary">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                      </svg>
                    </div>
                  </div>
                  <div class="media-body media-doller">
                    <span class="m-0">Products</span>
                    <h3 class="mb-0">$ <span class="counter">9856</span>
                      <small> This Month</small>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
              <div class="primary-box card-body">
                <div class="media static-top-widget align-items-center">
                  <div class="icons-widgets">
                    <div class="align-self-center text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square font-primary">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                      </svg>
                    </div>
                  </div>
                  <div class="media-body media-doller">
                    <span class="m-0">Messages</span>
                    <h3 class="mb-0">$ <span class="counter">893</span>
                      <small> This Month</small>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
              <div class="danger-box card-body">
                <div class="media static-top-widget align-items-center">
                  <div class="icons-widgets">
                    <div class="align-self-center text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users font-danger">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      </svg>
                    </div>
                  </div>
                  <div class="media-body media-doller">
                    <span class="m-0">New Vendors</span>
                    <h3 class="mb-0">$ <span class="counter">5631</span>
                      <small> This Month</small>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 xl-100">
            <div class="card">
              <div class="card-header">
                <h5>Market Value</h5>
                <div class="card-header-right">
                  <ul class="list-unstyled card-option">
                    <li>
                      <i class="icofont icofont-simple-left"></i>
                    </li>
                    <li>
                      <i class="view-html fa fa-code"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-maximize full-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-minus minimize-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-refresh reload-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-error close-card"></i>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="market-chart">
                  <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;">
                    <g class="ct-grids">
                      <line y1="273" y2="273" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                      <line y1="244.33333333333334" y2="244.33333333333334" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                      <line y1="215.66666666666666" y2="215.66666666666666" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                      <line y1="187" y2="187" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                      <line y1="158.33333333333331" y2="158.33333333333331" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                      <line y1="129.66666666666666" y2="129.66666666666666" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                      <line y1="101" y2="101" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                      <line y1="72.33333333333334" y2="72.33333333333334" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                      <line y1="43.66666666666666" y2="43.66666666666666" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                      <line y1="15" y2="15" x1="40" x2="493.5" class="ct-grid ct-vertical"></line>
                    </g>
                    <g>
                      <g class="ct-series ct-series-a">
                        <line x1="62.34375" x2="62.34375" y1="273" y2="129.66666666666666" class="ct-bar" ct:value="2.5"></line>
                        <line x1="119.03125" x2="119.03125" y1="273" y2="101" class="ct-bar" ct:value="3"></line>
                        <line x1="175.71875" x2="175.71875" y1="273" y2="101" class="ct-bar" ct:value="3"></line>
                        <line x1="232.40625" x2="232.40625" y1="273" y2="221.4" class="ct-bar" ct:value="0.9"></line>
                        <line x1="289.09375" x2="289.09375" y1="273" y2="198.46666666666664" class="ct-bar" ct:value="1.3"></line>
                        <line x1="345.78125" x2="345.78125" y1="273" y2="169.8" class="ct-bar" ct:value="1.8"></line>
                        <line x1="402.46875" x2="402.46875" y1="273" y2="55.133333333333326" class="ct-bar" ct:value="3.8"></line>
                        <line x1="459.15625" x2="459.15625" y1="273" y2="187" class="ct-bar" ct:value="1.5"></line>
                      </g>
                      <g class="ct-series ct-series-b">
                        <line x1="74.34375" x2="74.34375" y1="273" y2="55.133333333333326" class="ct-bar" ct:value="3.8"></line>
                        <line x1="131.03125" x2="131.03125" y1="273" y2="169.8" class="ct-bar" ct:value="1.8"></line>
                        <line x1="187.71875" x2="187.71875" y1="273" y2="26.466666666666697" class="ct-bar" ct:value="4.3"></line>
                        <line x1="244.40625" x2="244.40625" y1="273" y2="141.13333333333333" class="ct-bar" ct:value="2.3"></line>
                        <line x1="301.09375" x2="301.09375" y1="273" y2="66.6" class="ct-bar" ct:value="3.6"></line>
                        <line x1="357.78125" x2="357.78125" y1="273" y2="112.46666666666667" class="ct-bar" ct:value="2.8"></line>
                        <line x1="414.46875" x2="414.46875" y1="273" y2="112.46666666666667" class="ct-bar" ct:value="2.8"></line>
                        <line x1="471.15625" x2="471.15625" y1="273" y2="112.46666666666667" class="ct-bar" ct:value="2.8"></line>
                      </g>
                    </g>
                    <g class="ct-labels">
                      <foreignObject style="overflow: visible;" x="40" y="278" width="56.6875" height="20">
                        <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">100 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" x="96.6875" y="278" width="56.6875" height="20">
                        <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">200 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" x="153.375" y="278" width="56.6875" height="20">
                        <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">300 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" x="210.0625" y="278" width="56.6875" height="20">
                        <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">400 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" x="266.75" y="278" width="56.6875" height="20">
                        <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">500 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" x="323.4375" y="278" width="56.6875" height="20">
                        <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">600 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" x="380.125" y="278" width="56.6875" height="20">
                        <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">700 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" x="436.8125" y="278" width="56.6875" height="20">
                        <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">800 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="244.33333333333334" x="0" height="28.666666666666668" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">0 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="215.66666666666669" x="0" height="28.666666666666668" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">0.5 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="187" x="0" height="28.666666666666664" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">1 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="158.33333333333331" x="0" height="28.66666666666667" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">1.5 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="129.66666666666663" x="0" height="28.66666666666667" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">2 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="101" x="0" height="28.666666666666657" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">2.5 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="72.33333333333334" x="0" height="28.666666666666657" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">3 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="43.66666666666666" x="0" height="28.666666666666686" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">3.5 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="15" x="0" height="28.666666666666657" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">4 </span>
                      </foreignObject>
                      <foreignObject style="overflow: visible;" y="-15" x="0" height="30" width="30">
                        <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">4.5 </span>
                      </foreignObject>
                    </g>
                  </svg>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-xl-6 xl-100">
            <div class="card">
              <div class="card-header">
                <h5>Latest Orders</h5>
                <div class="card-header-right">
                  <ul class="list-unstyled card-option">
                    <li>
                      <i class="icofont icofont-simple-left"></i>
                    </li>
                    <li>
                      <i class="view-html fa fa-code"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-maximize full-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-minus minimize-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-refresh reload-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-error close-card"></i>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="user-status table-responsive latest-order-table">
                  <table class="table table-bordernone">
                    <thead>
                      <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Order Total</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td class="digits">$120.00</td>
                        <td class="font-danger">Bank Transfers</td>
                        <td class="digits">On Way</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td class="digits">$90.00</td>
                        <td class="font-secondary">Ewallets</td>
                        <td class="digits">Delivered</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td class="digits">$240.00</td>
                        <td class="font-warning">Cash</td>
                        <td class="digits">Delivered</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td class="digits">$120.00</td>
                        <td class="font-primary">Direct Deposit</td>
                        <td class="digits">$6523</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td class="digits">$50.00</td>
                        <td class="font-primary">Bank Transfers</td>
                        <td class="digits">Delivered</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="order.html" class="btn btn-primary mt-4">View All Orders</a>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
              <div class="card-header b-header">
                <h6>Total Sales</h6>
                <div class="row">
                  <div class="col-6">
                    <div class="small-chartjs">
                      <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-3">
                        <canvas style="display: inline-block; width: 90px; height: 60px; vertical-align: top;" width="90" height="60"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="value-graph">
                      <h3>42% <span>
                          <i class="fa fa-angle-up font-primary"></i>
                        </span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="media">
                  <div class="media-body">
                    <span>Sales Last Month</span>
                    <h2 class="mb-0">9054</h2>
                    <p>0.25% <span>
                        <i class="fa fa-angle-up"></i>
                      </span>
                    </p>
                  </div>
                  <div class="bg-primary b-r-8">
                    <div class="small-box">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="sales-contain">
                  <h5 class="f-w-600">Gross sales of August</h5>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
              <div class="card-header b-header">
                <h6>Total purchase</h6>
                <div class="row">
                  <div class="col-6">
                    <div class="small-chartjs">
                      <div class="flot-chart-placeholder" id="simple-line-chart-sparkline">
                        <canvas style="display: inline-block; width: 90px; height: 60px; vertical-align: top;" width="90" height="60"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="value-graph">
                      <h3>20% <span>
                          <i class="fa fa-angle-up font-secondary"></i>
                        </span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="media">
                  <div class="media-body">
                    <span>Monthly purchase</span>
                    <h2 class="mb-0">2154</h2>
                    <p>0.13% <span>
                        <i class="fa fa-angle-up"></i>
                      </span>
                    </p>
                  </div>
                  <div class="bg-secondary b-r-8">
                    <div class="small-box">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="sales-contain">
                  <h5 class="f-w-600">Avg Gross purchase</h5>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
              <div class="card-header b-header">
                <h6>Total cash transaction</h6>
                <div class="row">
                  <div class="col-6">
                    <div class="small-chartjs">
                      <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-2">
                        <canvas style="display: inline-block; width: 90px; height: 60px; vertical-align: top;" width="90" height="60"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="value-graph">
                      <h3>28% <span>
                          <i class="fa fa-angle-up font-warning"></i>
                        </span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="media">
                  <div class="media-body">
                    <span>Cash on hand</span>
                    <h2 class="mb-0">4672</h2>
                    <p>0.8% <span>
                        <i class="fa fa-angle-up"></i>
                      </span>
                    </p>
                  </div>
                  <div class="bg-warning b-r-8">
                    <div class="small-box">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="sales-contain">
                  <h5 class="f-w-600">Details about cash</h5>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
              <div class="card-header b-header">
                <h6>Daily Deposits</h6>
                <div class="row">
                  <div class="col-6">
                    <div class="small-chartjs">
                      <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-1">
                        <canvas style="display: inline-block; width: 90px; height: 60px; vertical-align: top;" width="90" height="60"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="value-graph">
                      <h3>75% <span>
                          <i class="fa fa-angle-up font-danger"></i>
                        </span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="media">
                  <div class="media-body">
                    <span>Security Deposits</span>
                    <h2 class="mb-0">0782</h2>
                    <p>0.25% <span>
                        <i class="fa fa-angle-up"></i>
                      </span>
                    </p>
                  </div>
                  <div class="bg-danger b-r-8">
                    <div class="small-box">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="sales-contain">
                  <h5 class="f-w-600">Gross sales of June</h5>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Buy / Sell</h5>
                <div class="card-header-right">
                  <ul class="list-unstyled card-option">
                    <li>
                      <i class="icofont icofont-simple-left"></i>
                    </li>
                    <li>
                      <i class="view-html fa fa-code"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-maximize full-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-minus minimize-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-refresh reload-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-error close-card"></i>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body sell-graph">
                <canvas id="myGraph" style="width: 1131px; height: 316px;" width="2262" height="632"></canvas>
                
              </div>
            </div>
          </div>
          <div class="col-xl-6 xl-100">
            <div class="card height-equal" style="min-height: 512px;">
              <div class="card-header">
                <h5>Goods return</h5>
                <div class="card-header-right">
                  <ul class="list-unstyled card-option">
                    <li>
                      <i class="icofont icofont-simple-left"></i>
                    </li>
                    <li>
                      <i class="view-html fa fa-code"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-maximize full-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-minus minimize-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-refresh reload-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-error close-card"></i>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="user-status table-responsive products-table">
                  <table class="table table-bordernone mb-0">
                    <thead>
                      <tr>
                        <th scope="col">Details</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Simply dummy text of the printing</td>
                        <td class="digits">1</td>
                        <td class="font-primary">Pending</td>
                        <td class="digits">$6523</td>
                      </tr>
                      <tr>
                        <td>Long established</td>
                        <td class="digits">5</td>
                        <td class="font-secondary">Cancle</td>
                        <td class="digits">$6523</td>
                      </tr>
                      <tr>
                        <td>sometimes by accident</td>
                        <td class="digits">10</td>
                        <td class="font-secondary">Cancle</td>
                        <td class="digits">$6523</td>
                      </tr>
                      <tr>
                        <td>Classical Latin literature</td>
                        <td class="digits">9</td>
                        <td class="font-primary">Return</td>
                        <td class="digits">$6523</td>
                      </tr>
                      <tr>
                        <td>keep the site on the Internet</td>
                        <td class="digits">8</td>
                        <td class="font-primary">Pending</td>
                        <td class="digits">$6523</td>
                      </tr>
                      <tr>
                        <td>Molestiae consequatur</td>
                        <td class="digits">3</td>
                        <td class="font-secondary">Cancle</td>
                        <td class="digits">$6523</td>
                      </tr>
                      <tr>
                        <td>Pain can procure</td>
                        <td class="digits">8</td>
                        <td class="font-primary">Return</td>
                        <td class="digits">$6523</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-xl-6 xl-100">
            <div class="card height-equal" style="min-height: 512px;">
              <div class="card-header">
                <h5>Empolyee Status</h5>
                <div class="card-header-right">
                  <ul class="list-unstyled card-option">
                    <li>
                      <i class="icofont icofont-simple-left"></i>
                    </li>
                    <li>
                      <i class="view-html fa fa-code"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-maximize full-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-minus minimize-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-refresh reload-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-error close-card"></i>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="user-status table-responsive products-table">
                  <table class="table table-bordernone mb-0">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Skill Level</th>
                        <th scope="col">Experience</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="bd-t-none u-s-tb">
                          <div class="align-middle image-sm-size">
                            <img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="assets/images/dashboard/user2.jpg" alt="" data-original-title="" title="">
                            <div class="d-inline-block">
                              <h6 class="mb-0">John Deo <span class="text-muted digits">(14+ Online)</span>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>Designer</td>
                        <td>
                          <div class="progress-showcase">
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="digits">2 Year</td>
                      </tr>
                      <tr>
                        <td class="bd-t-none u-s-tb">
                          <div class="align-middle image-sm-size">
                            <img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="assets/images/dashboard/user1.jpg" alt="" data-original-title="" title="">
                            <div class="d-inline-block">
                              <h6 class="mb-0">Holio Mako <span class="text-muted digits">(250+ Online)</span>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>Developer</td>
                        <td>
                          <div class="progress-showcase">
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-secondary" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="digits">3 Year</td>
                      </tr>
                      <tr>
                        <td class="bd-t-none u-s-tb">
                          <div class="align-middle image-sm-size">
                            <img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="assets/images/dashboard/user3.jpg" alt="" data-original-title="" title="">
                            <div class="d-inline-block">
                              <h6 class="mb-0">Mohsib lara <span class="text-muted digits">(99+ Online)</span>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>Tester</td>
                        <td>
                          <div class="progress-showcase">
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="digits">5 Month</td>
                      </tr>
                      <tr>
                        <td class="bd-t-none u-s-tb">
                          <div class="align-middle image-sm-size">
                            <img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="assets/images/dashboard/user.jpg" alt="" data-original-title="" title="">
                            <div class="d-inline-block">
                              <h6 class="mb-0">Hileri Soli <span class="text-muted digits">(150+ Online)</span>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>Designer</td>
                        <td>
                          <div class="progress-showcase">
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="digits">3 Month</td>
                      </tr>
                      <tr>
                        <td class="bd-t-none u-s-tb">
                          <div class="align-middle image-sm-size">
                            <img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="assets/images/dashboard/designer.jpg" alt="" data-original-title="" title="">
                            <div class="d-inline-block">
                              <h6 class="mb-0">Pusiz bia <span class="text-muted digits">(14+ Online)</span>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>Designer</td>
                        <td>
                          <div class="progress-showcase">
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="digits">5 Year</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Sales Status</h5>
                <div class="card-header-right">
                  <ul class="list-unstyled card-option">
                    <li>
                      <i class="icofont icofont-simple-left"></i>
                    </li>
                    <li>
                      <i class="view-html fa fa-code"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-maximize full-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-minus minimize-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-refresh reload-card"></i>
                    </li>
                    <li>
                      <i class="icofont icofont-error close-card"></i>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-3 col-sm-6 xl-50">
                    <div class="order-graph">
                      <h6>Orders By Location</h6>
                      <div class="chart-block chart-vertical-center">
                        <canvas id="myDoughnutGraph" style="width: 250px; height: 125px;" width="500" height="250"></canvas>
                      </div>
                      <div class="order-graph-bottom">
                        <div class="media">
                          <div class="order-color-primary"></div>
                          <div class="media-body">
                            <h6 class="mb-0">Saint Lucia <span class="pull-right">$157</span>
                            </h6>
                          </div>
                        </div>
                        <div class="media">
                          <div class="order-color-secondary"></div>
                          <div class="media-body">
                            <h6 class="mb-0">Kenya <span class="pull-right">$347</span>
                            </h6>
                          </div>
                        </div>
                        <div class="media">
                          <div class="order-color-danger"></div>
                          <div class="media-body">
                            <h6 class="mb-0">Liberia <span class="pull-right">$468</span>
                            </h6>
                          </div>
                        </div>
                        <div class="media">
                          <div class="order-color-warning"></div>
                          <div class="media-body">
                            <h6 class="mb-0">Christmas Island <span class="pull-right">$742</span>
                            </h6>
                          </div>
                        </div>
                        <div class="media">
                          <div class="order-color-success"></div>
                          <div class="media-body">
                            <h6 class="mb-0">Saint Helena <span class="pull-right">$647</span>
                            </h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 xl-50">
                    <div class="order-graph sm-order-space">
                      <h6>Sales By Location</h6>
                      <div class="peity-chart-dashboard text-center">
                        <span class="pie-colours-1" style="display: none;">4,7,6,5</span>
                        <svg class="peity" height="180" width="250">
                          <path d="M 125 0 A 60 60 0 0 1 179.57791972127112 35.075099219886816 L 125 60" fill="#ff4c3b"></path>
                          <path d="M 179.57791972127112 35.075099219886816 A 60 60 0 0 1 125 120 L 125 60" fill="#02cccd"></path>
                          <path d="M 125 120 A 60 60 0 0 1 65.61071348714404 51.4611097036029 L 125 60" fill="#ffbc58"></path>
                          <path d="M 65.61071348714404 51.4611097036029 A 60 60 0 0 1 124.99999999999999 0 L 125 60" fill="#a5a5a5"></path>
                        </svg>
                      </div>
                      <div class="order-graph-bottom sales-location">
                        <div class="media">
                          <div class="order-shape-primary"></div>
                          <div class="media-body">
                            <h6 class="mb-0 me-0">Germany <span class="pull-right">25%</span>
                            </h6>
                          </div>
                        </div>
                        <div class="media">
                          <div class="order-shape-secondary"></div>
                          <div class="media-body">
                            <h6 class="mb-0 me-0">Brasil <span class="pull-right">10%</span>
                            </h6>
                          </div>
                        </div>
                        <div class="media">
                          <div class="order-shape-danger"></div>
                          <div class="media-body">
                            <h6 class="mb-0 me-0">United Kingdom <span class="pull-right">34%</span>
                            </h6>
                          </div>
                        </div>
                        <div class="media">
                          <div class="order-shape-warning"></div>
                          <div class="media-body">
                            <h6 class="mb-0 me-0">Australia <span class="pull-right">5%</span>
                            </h6>
                          </div>
                        </div>
                        <div class="media">
                          <div class="order-shape-success"></div>
                          <div class="media-body">
                            <h6 class="mb-0 me-0">Canada <span class="pull-right">25%</span>
                            </h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 xl-100">
                    <div class="order-graph xl-space">
                      <h6>Revenue for last month</h6>
                      <div class="ct-4 flot-chart-container">
                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;">
                          <g class="ct-grids">
                            <line x1="50" x2="50" y1="15" y2="315" class="ct-grid ct-horizontal"></line>
                            <line x1="107.3125" x2="107.3125" y1="15" y2="315" class="ct-grid ct-horizontal"></line>
                            <line x1="164.625" x2="164.625" y1="15" y2="315" class="ct-grid ct-horizontal"></line>
                            <line x1="221.9375" x2="221.9375" y1="15" y2="315" class="ct-grid ct-horizontal"></line>
                            <line x1="279.25" x2="279.25" y1="15" y2="315" class="ct-grid ct-horizontal"></line>
                            <line x1="336.5625" x2="336.5625" y1="15" y2="315" class="ct-grid ct-horizontal"></line>
                            <line x1="393.875" x2="393.875" y1="15" y2="315" class="ct-grid ct-horizontal"></line>
                            <line x1="451.1875" x2="451.1875" y1="15" y2="315" class="ct-grid ct-horizontal"></line>
                            <line y1="315" y2="315" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                            <line y1="281.6666666666667" y2="281.6666666666667" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                            <line y1="248.33333333333331" y2="248.33333333333331" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                            <line y1="215" y2="215" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                            <line y1="181.66666666666666" y2="181.66666666666666" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                            <line y1="148.33333333333334" y2="148.33333333333334" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                            <line y1="115" y2="115" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                            <line y1="81.66666666666666" y2="81.66666666666666" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                            <line y1="48.333333333333314" y2="48.333333333333314" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                            <line y1="15" y2="15" x1="50" x2="508.5" class="ct-grid ct-vertical"></line>
                          </g>
                          <g>
                            <g class="ct-series ct-series-a">
                              <path d="M50,315L50,148.333C69.104,103.889,88.208,15,107.313,15C126.417,15,145.521,81.667,164.625,81.667C183.729,81.667,202.833,48.333,221.938,48.333C241.042,48.333,260.146,121.667,279.25,148.333C298.354,175,317.458,215,336.563,215C355.667,215,374.771,148.333,393.875,148.333C412.979,148.333,432.083,170.556,451.188,181.667L451.188,315Z" class="ct-area"></path>
                              <path d="M50,148.333C69.104,103.889,88.208,15,107.313,15C126.417,15,145.521,81.667,164.625,81.667C183.729,81.667,202.833,48.333,221.938,48.333C241.042,48.333,260.146,121.667,279.25,148.333C298.354,175,317.458,215,336.563,215C355.667,215,374.771,148.333,393.875,148.333C412.979,148.333,432.083,170.556,451.188,181.667" class="ct-line"></path>
                              <line x1="50" y1="148.33333333333334" x2="50.01" y2="148.33333333333334" class="ct-point" ct:value="5"></line>
                              <line x1="107.3125" y1="15" x2="107.3225" y2="15" class="ct-point" ct:value="9"></line>
                              <line x1="164.625" y1="81.66666666666666" x2="164.635" y2="81.66666666666666" class="ct-point" ct:value="7"></line>
                              <line x1="221.9375" y1="48.333333333333314" x2="221.9475" y2="48.333333333333314" class="ct-point" ct:value="8"></line>
                              <line x1="279.25" y1="148.33333333333334" x2="279.26" y2="148.33333333333334" class="ct-point" ct:value="5"></line>
                              <line x1="336.5625" y1="215" x2="336.5725" y2="215" class="ct-point" ct:value="3"></line>
                              <line x1="393.875" y1="148.33333333333334" x2="393.885" y2="148.33333333333334" class="ct-point" ct:value="5"></line>
                              <line x1="451.1875" y1="181.66666666666666" x2="451.1975" y2="181.66666666666666" class="ct-point" ct:value="4"></line>
                            </g>
                          </g>
                          <g class="ct-labels">
                            <foreignObject style="overflow: visible;" x="50" y="320" width="57.3125" height="20">
                              <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">1 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" x="107.3125" y="320" width="57.3125" height="20">
                              <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">2 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" x="164.625" y="320" width="57.3125" height="20">
                              <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">3 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" x="221.9375" y="320" width="57.3125" height="20">
                              <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">4 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" x="279.25" y="320" width="57.3125" height="20">
                              <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">5 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" x="336.5625" y="320" width="57.3125" height="20">
                              <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">6 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" x="393.875" y="320" width="57.3125" height="20">
                              <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">7 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" x="451.1875" y="320" width="57.3125" height="20">
                              <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 57px; height: 20px;">8 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="281.6666666666667" x="10" height="33.333333333333336" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 33px; width: 30px;">0 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="248.33333333333334" x="10" height="33.333333333333336" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 33px; width: 30px;">1 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="215" x="10" height="33.33333333333333" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 33px; width: 30px;">2 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="181.66666666666666" x="10" height="33.33333333333334" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 33px; width: 30px;">3 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="148.33333333333334" x="10" height="33.333333333333314" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 33px; width: 30px;">4 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="115" x="10" height="33.33333333333334" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 33px; width: 30px;">5 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="81.66666666666666" x="10" height="33.33333333333334" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 33px; width: 30px;">6 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="48.333333333333314" x="10" height="33.33333333333334" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 33px; width: 30px;">7 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="15" x="10" height="33.333333333333314" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 33px; width: 30px;">8 </span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30">
                              <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">9 </span>
                            </foreignObject>
                          </g>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
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
        /*!
     * AdminLTE v3.0.0-alpha.2 (https://adminlte.io)
     * Copyright 2014-2018 Abdullah Almsaeed <abdullah@almsaeedstudio.com>
     * Licensed under MIT (https://github.com/almasaeed2010/AdminLTE/blob/master/LICENSE)
     */
    !function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(exports):"function"==typeof define&&define.amd?define(["exports"],t):t(e.adminlte={})}(this,function(e){"use strict";var i,t,o,n,r,a,s,c,f,l,u,d,h,p,_,g,y,m,v,C,D,E,A,O,w,b,L,S,j,T,I,Q,R,P,x,B,M,k,H,N,Y,U,V,G,W,X,z,F,q,J,K,Z,$,ee,te,ne="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},ie=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")},oe=(i=jQuery,t="ControlSidebar",o="lte.control.sidebar",n=i.fn[t],r=".control-sidebar",a='[data-widget="control-sidebar"]',s=".main-header",c="control-sidebar-open",f="control-sidebar-slide-open",l={slide:!0},u=function(){function n(e,t){ie(this,n),this._element=e,this._config=this._getConfig(t)}return n.prototype.show=function(){this._config.slide?i("body").removeClass(f):i("body").removeClass(c)},n.prototype.collapse=function(){this._config.slide?i("body").addClass(f):i("body").addClass(c)},n.prototype.toggle=function(){this._setMargin(),i("body").hasClass(c)||i("body").hasClass(f)?this.show():this.collapse()},n.prototype._getConfig=function(e){return i.extend({},l,e)},n.prototype._setMargin=function(){i(r).css({top:i(s).outerHeight()})},n._jQueryInterface=function(t){return this.each(function(){var e=i(this).data(o);if(e||(e=new n(this,i(this).data()),i(this).data(o,e)),"undefined"===e[t])throw new Error(t+" is not a function");e[t]()})},n}(),i(document).on("click",a,function(e){e.preventDefault(),u._jQueryInterface.call(i(this),"toggle")}),i.fn[t]=u._jQueryInterface,i.fn[t].Constructor=u,i.fn[t].noConflict=function(){return i.fn[t]=n,u._jQueryInterface},u),re=(d=jQuery,h="Layout",p="lte.layout",_=d.fn[h],g=".main-sidebar",y=".main-header",m=".content-wrapper",v=".main-footer",C="hold-transition",D=function(){function n(e){ie(this,n),this._element=e,this._init()}return n.prototype.fixLayoutHeight=function(){var e={window:d(window).height(),header:d(y).outerHeight(),footer:d(v).outerHeight(),sidebar:d(g).height()},t=this._max(e);d(m).css("min-height",t-e.header),d(g).css("min-height",t-e.header)},n.prototype._init=function(){var e=this;d("body").removeClass(C),this.fixLayoutHeight(),d(g).on("collapsed.lte.treeview expanded.lte.treeview collapsed.lte.pushmenu expanded.lte.pushmenu",function(){e.fixLayoutHeight()}),d(window).resize(function(){e.fixLayoutHeight()}),d("body, html").css("height","auto")},n.prototype._max=function(t){var n=0;return Object.keys(t).forEach(function(e){t[e]>n&&(n=t[e])}),n},n._jQueryInterface=function(t){return this.each(function(){var e=d(this).data(p);e||(e=new n(this),d(this).data(p,e)),t&&e[t]()})},n}(),d(window).on("load",function(){D._jQueryInterface.call(d("body"))}),d.fn[h]=D._jQueryInterface,d.fn[h].Constructor=D,d.fn[h].noConflict=function(){return d.fn[h]=_,D._jQueryInterface},D),ae=(E=jQuery,A="PushMenu",w="."+(O="lte.pushmenu"),b=E.fn[A],L={COLLAPSED:"collapsed"+w,SHOWN:"shown"+w},S={screenCollapseSize:768},j={TOGGLE_BUTTON:'[data-widget="pushmenu"]',SIDEBAR_MINI:".sidebar-mini",SIDEBAR_COLLAPSED:".sidebar-collapse",BODY:"body",OVERLAY:"#sidebar-overlay",WRAPPER:".wrapper"},T="sidebar-collapse",I="sidebar-open",Q=function(){function n(e,t){ie(this,n),this._element=e,this._options=E.extend({},S,t),E(j.OVERLAY).length||this._addOverlay()}return n.prototype.show=function(){E(j.BODY).addClass(I).removeClass(T);var e=E.Event(L.SHOWN);E(this._element).trigger(e)},n.prototype.collapse=function(){E(j.BODY).removeClass(I).addClass(T);var e=E.Event(L.COLLAPSED);E(this._element).trigger(e)},n.prototype.toggle=function(){(E(window).width()>=this._options.screenCollapseSize?!E(j.BODY).hasClass(T):E(j.BODY).hasClass(I))?this.collapse():this.show()},n.prototype._addOverlay=function(){var e=this,t=E("<div />",{id:"sidebar-overlay"});t.on("click",function(){e.collapse()}),E(j.WRAPPER).append(t)},n._jQueryInterface=function(t){return this.each(function(){var e=E(this).data(O);e||(e=new n(this),E(this).data(O,e)),t&&e[t]()})},n}(),E(document).on("click",j.TOGGLE_BUTTON,function(e){e.preventDefault();var t=e.currentTarget;"pushmenu"!==E(t).data("widget")&&(t=E(t).closest(j.TOGGLE_BUTTON)),Q._jQueryInterface.call(E(t),"toggle")}),E.fn[A]=Q._jQueryInterface,E.fn[A].Constructor=Q,E.fn[A].noConflict=function(){return E.fn[A]=b,Q._jQueryInterface},Q),se=(R=jQuery,P="Treeview",B="."+(x="lte.treeview"),M=R.fn[P],k={SELECTED:"selected"+B,EXPANDED:"expanded"+B,COLLAPSED:"collapsed"+B,LOAD_DATA_API:"load"+B},H=".nav-item",N=".nav-treeview",Y=".menu-open",V="menu-open",G={trigger:(U='[data-widget="treeview"]')+" "+".nav-link",animationSpeed:300,accordion:!0},W=function(){function i(e,t){ie(this,i),this._config=t,this._element=e}return i.prototype.init=function(){this._setupListeners()},i.prototype.expand=function(e,t){var n=this,i=R.Event(k.EXPANDED);if(this._config.accordion){var o=t.siblings(Y).first(),r=o.find(N).first();this.collapse(r,o)}e.slideDown(this._config.animationSpeed,function(){t.addClass(V),R(n._element).trigger(i)})},i.prototype.collapse=function(e,t){var n=this,i=R.Event(k.COLLAPSED);e.slideUp(this._config.animationSpeed,function(){t.removeClass(V),R(n._element).trigger(i),e.find(Y+" > "+N).slideUp(),e.find(Y).removeClass(V)})},i.prototype.toggle=function(e){var t=R(e.currentTarget),n=t.next();if(n.is(N)){e.preventDefault();var i=t.parents(H).first();i.hasClass(V)?this.collapse(R(n),i):this.expand(R(n),i)}},i.prototype._setupListeners=function(){var t=this;R(document).on("click",this._config.trigger,function(e){t.toggle(e)})},i._jQueryInterface=function(n){return this.each(function(){var e=R(this).data(x),t=R.extend({},G,R(this).data());e||(e=new i(R(this),t),R(this).data(x,e)),"init"===n&&e[n]()})},i}(),R(window).on(k.LOAD_DATA_API,function(){R(U).each(function(){W._jQueryInterface.call(R(this),"init")})}),R.fn[P]=W._jQueryInterface,R.fn[P].Constructor=W,R.fn[P].noConflict=function(){return R.fn[P]=M,W._jQueryInterface},W),ce=(X=jQuery,z="Widget",q="."+(F="lte.widget"),J=X.fn[z],K={EXPANDED:"expanded"+q,COLLAPSED:"collapsed"+q,REMOVED:"removed"+q},$="collapsed-card",ee={animationSpeed:"normal",collapseTrigger:(Z={DATA_REMOVE:'[data-widget="remove"]',DATA_COLLAPSE:'[data-widget="collapse"]',CARD:".card",CARD_HEADER:".card-header",CARD_BODY:".card-body",CARD_FOOTER:".card-footer",COLLAPSED:".collapsed-card"}).DATA_COLLAPSE,removeTrigger:Z.DATA_REMOVE},te=function(){function n(e,t){ie(this,n),this._element=e,this._parent=e.parents(Z.CARD).first(),this._settings=X.extend({},ee,t)}return n.prototype.collapse=function(){var e=this;this._parent.children(Z.CARD_BODY+", "+Z.CARD_FOOTER).slideUp(this._settings.animationSpeed,function(){e._parent.addClass($)});var t=X.Event(K.COLLAPSED);this._element.trigger(t,this._parent)},n.prototype.expand=function(){var e=this;this._parent.children(Z.CARD_BODY+", "+Z.CARD_FOOTER).slideDown(this._settings.animationSpeed,function(){e._parent.removeClass($)});var t=X.Event(K.EXPANDED);this._element.trigger(t,this._parent)},n.prototype.remove=function(){this._parent.slideUp();var e=X.Event(K.REMOVED);this._element.trigger(e,this._parent)},n.prototype.toggle=function(){this._parent.hasClass($)?this.expand():this.collapse()},n.prototype._init=function(e){var t=this;this._parent=e,X(this).find(this._settings.collapseTrigger).click(function(){t.toggle()}),X(this).find(this._settings.removeTrigger).click(function(){t.remove()})},n._jQueryInterface=function(t){return this.each(function(){var e=X(this).data(F);e||(e=new n(X(this),e),X(this).data(F,"string"==typeof t?e:t)),"string"==typeof t&&t.match(/remove|toggle/)?e[t]():"object"===("undefined"==typeof t?"undefined":ne(t))&&e._init(X(this))})},n}(),X(document).on("click",Z.DATA_COLLAPSE,function(e){e&&e.preventDefault(),te._jQueryInterface.call(X(this),"toggle")}),X(document).on("click",Z.DATA_REMOVE,function(e){e&&e.preventDefault(),te._jQueryInterface.call(X(this),"remove")}),X.fn[z]=te._jQueryInterface,X.fn[z].Constructor=te,X.fn[z].noConflict=function(){return X.fn[z]=J,te._jQueryInterface},te);e.ControlSidebar=oe,e.Layout=re,e.PushMenu=ae,e.Treeview=se,e.Widget=ce,Object.defineProperty(e,"__esModule",{value:!0})});
    //# sourceMappingURL=adminlte.min.js.map

    </script>
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