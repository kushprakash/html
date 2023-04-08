<style>
  a {
    color: #fff;
}
.page-wrapper .page-body-wrapper .page-sidebar .main-header-left .logo-wrapper {
    padding-left: 10px;
    height: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-left: 55px;
}
.page-wrapper .page-body-wrapper .page-sidebar .sidebar-user h6 {
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 1.5px;
    margin-bottom: 3px;
}
  </style>

<div class="page-sidebar" style="background:#6fc6a5;">
            <div class="main-header-left d-none d-lg-block">
				<div class="logo-wrapper text-center"><a href="{{url('/')}}"> <h4>Gameskraft</h4> </a></div>
            </div>
            @if(Auth::user()->vendor==10)
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div>
                    <!-- Dinkachika -->
                      <!-- <img class="img-60 rounded-circle lazyloaded blur-up" src="{{asset('assets/images/dashboard/login-bg.png')}}" alt="#"> -->
                    </div>
                    <h6 class="mt-3 f-14">Admin</h6>
                     
                </div>                 
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="{{url('/dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>
                  
					 <li><a  class="sidebar-header"  href="{{ route("users.index") }}"><i data-feather="users"></i><span>Employee</span></a></li> 
                     
                     <li><a class="sidebar-header" href="#"><i data-feather="align-left"></i><span>Menus</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{url('menus-list')}}"><i class="fa fa-circle"></i>Menu Lists</a></li>
                            <li><a href="{{url('menus-create')}}"><i class="fa fa-circle"></i>Create Menu</a></li>
                        </ul>
                    </li>
                     <li><a class="sidebar-header" href="{{url('/banner')}}"><i data-feather="box"></i><span>Banner</span></a></li>
                 <!--  <li><a class="sidebar-header" href="{{url('/product-review')}}"><i data-feather="box"></i><span>Product Review</span></a></li>-->
                   
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                             
                               
                                    <li><a href="{{url('category')}}"><i class="fa fa-circle"></i>Category</a></li>
                                    <li><a href="{{url('sub-category')}}"><i class="fa fa-circle"></i>Sub Category</a></li>
                                    <li><a href="{{url('sub-sub-category')}}"><i class="fa fa-circle"></i>Sub SubCategory</a></li>
                                    <!-- <li><a href="{{url('brands')}}"><i class="fa fa-circle"></i>Brands</a></li> -->
                                    <li><a href="{{url('product-list')}}"><i class="fa fa-circle"></i>Product List</a></li>
                                    <li><a href="{{url('add-product')}}"><i class="fa fa-circle"></i>Add Product</a></li>
                                    <!-- <li><a href="{{ route('productscolor.index') }}"><i class="fa fa-circle"></i>Product Color</a></li>
                                    <li><a href="{{ route('productsize.index') }}"><i class="fa fa-circle"></i>Product Size & Detail</a></li> -->
                                   
                                    <li><a href="{{url('add-product-image-view')}}"><i class="fa fa-circle"></i>Product Image</a></li>
                              
                             
                        </ul>
                    </li>
					<li><a class="sidebar-header" href="{{url('sub-product-list')}}"><i data-feather="chrome"></i><span>Sub Product</span> </a>
                        
                    </li>
                    <li><a class="sidebar-header" href="{{url('order')}}"><i data-feather="chrome"></i><span>Orders</span> </a>
                        
                    </li>
					
					 <li><a class="sidebar-header" href="{{url('report')}}"><i data-feather="chrome"></i><span>Reports</span> </a>
                        
                    </li>
                   
                     <li><a class="sidebar-header" href="{{url('block-url')}}"><i data-feather="chrome"></i><span>Block Url</span> </a>
                        
                    </li>
                   
                   
                  <!--  <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{url('user-list')}}"><i class="fa fa-circle"></i>User List</a></li>
                            <li><a href="{{url('add-user')}}"><i class="fa fa-circle"></i>Create User</a></li>
                        </ul>
                    </li>-->
                    <li><a class="sidebar-header" href="#"><i data-feather="users"></i><span>Vendors</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{url('vendor-list')}}"><i class="fa fa-circle"></i>Vendor List</a></li>
                            <li><a href="{{url('add-vendor')}}"><i class="fa fa-circle"></i>Create Vendor</a></li>
                        </ul>
                    </li>
                    <!-- <li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>Localization</span><i class="fa fa-angle-right pull-right"></i></a>-->
                    <!--    <ul class="sidebar-submenu">-->
                    <!--        <li><a href="translations.html"><i class="fa fa-circle"></i>Translations</a></li> -->
                    <!--         <li><a href="currency-rates.html"><i class="fa fa-circle"></i>Currency Rates</a></li> -->
                    <!--         <li><a href="taxes.html"><i class="fa fa-circle"></i>Taxes</a></li> -->
                    <!--     </ul>-->
                    <!--</li> --> 
                     <!--    <li><a class="sidebar-header" href="#"><i data-feather="bar-chart"></i><span>Reports</span></a></li> -->
                 
                    <!--<li><a class="sidebar-header" href="{{url('reports')}}"><i data-feather="bar-chart"></i><span>Reports</span></a></li>-->
                    <!-- <li><a class="sidebar-header" href="#"><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="profile.html"><i class="fa fa-circle"></i>Profile</a></li>
                        </ul>
                    </li> -->
                      <!-- <li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>Accounts</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="#"><i class="fa fa-circle"></i>Business Reports <i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                            <li><a href="{{url('balancesheet')}}"><i class="fa fa-circle"></i>Balancesheet</a></li> 
                            <li><a href="{{url('cashflow')}}"><i class="fa fa-circle"></i>Cashflow</a></li>
                             <li><a href="{{url('profitloss')}}"><i class="fa fa-circle"></i>Profit & loss</a></li> 
                          </ul>
                            
                            
                            </li> 
                             <li><a href="#"><i class="fa fa-circle"></i>Payment Reports <i class="fa fa-angle-right pull-right"></i></a>
                               <ul class="sidebar-submenu">
                            <li><a href="{{url('received')}}"><i class="fa fa-circle"></i>Received Reports</a></li> 
                             <li><a href="{{url('transfred')}}"><i class="fa fa-circle"></i>Transfer Reports</a></li> 
                           </ul>
                             </li> 
                             <li><a href="#"><i class="fa fa-circle"></i>Expenses Reports <i class="fa fa-angle-right pull-right"></i> </a>
                               <ul class="sidebar-submenu">
                            <li><a href="{{url('bussiness-report')}}"><i class="fa fa-circle"></i>Business Reports</a></li> 
                            <li><a href="#"><i class="fa fa-circle"></i>Other Reports</a></li>  
                           </ul>
                             </li> 
							 <li><a href="{{url('other-reports')}}"><i class="fa fa-circle"></i>Other Reports </a> -->
                               
                             <!-- </li> -->
                         <!-- </ul>
                    </li>  -->
             
                    <!-- <li><a class="sidebar-header" href="{{url('invoice')}}"><i data-feather="archive"></i><span>Invoice</span></a>
                    </li>
                     <li><a class="sidebar-header" href="#"><i data-feather="log-in"></i><span>Export</span><i class="fa fa-angle-right pull-right"></i></a> 
                     <ul class="sidebar-submenu">
                      <li><a href="{{url('export-product-list')}}"><i class="fa fa-circle"></i>Product List</a></li>
                                    <li><a href="{{url('add-export-product')}}"><i class="fa fa-circle"></i>Add Product</a></li> -->
                                    <!--<li><a href="{{ route('productscolor.index') }}"><i class="fa fa-circle"></i>Product Color</a></li>-->
                                    <!--<li><a href="{{ route('productsize.index') }}"><i class="fa fa-circle"></i>Product Size & Detail</a></li>-->
                                   
                                    <!-- <li><a href="{{url('export-product-image')}}"><i class="fa fa-circle"></i>Product Image</a></li> -->
                           <!--- <li><a class="sidebar-header" href="#"><i class="fa fa-circle"></i><span>Accounts</span><i class="fa fa-angle-right pull-right"></i></a>
                    <!--    <ul class="sidebar-submenu">
                            <li><a href="#"><i class="fa fa-circle"></i>Business Reports <i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                            <li><a href="{{url('balancesheet')}}"><i class="fa fa-circle"></i>Balancesheet</a></li> 
                            <li><a href="{{url('cashflow')}}"><i class="fa fa-circle"></i>Cashflow</a></li>
                             <li><a href="{{url('profitloss')}}"><i class="fa fa-circle"></i>Profit & loss</a></li> 
                          </ul>
                            
                            
                            </li> -->
                        <!--     <li><a href="#"><i class="fa fa-circle"></i>Payment Reports <i class="fa fa-angle-right pull-right"></i></a>
                               <ul class="sidebar-submenu">
                            <li><a href="{{url('received')}}"><i class="fa fa-circle"></i>Received Reports</a></li> 
                             <li><a href="{{url('transfred')}}"><i class="fa fa-circle"></i>Trasfer Reports</a></li> 
                           </ul>
                             </li> 
                             <li><a href="#"><i class="fa fa-circle"></i>Expenses Reports <i class="fa fa-angle-right pull-right"></i> </a>
                               <ul class="sidebar-submenu">
                            <li><a href="{{url('bussiness-report')}}"><i class="fa fa-circle"></i>Business Reports</a></li> 
                              <li><a href="#"><i class="fa fa-circle"></i>Other Reports</a></li>  
                           </ul>
                             </li>
							
							 <li><a href="#"><i class="fa fa-circle"></i>Other Reports </a>
                               
                             </li>
							
                         </ul>
								
                    </li> -->
						
                    </ul>                
                    </li>
                </ul>
            </div>
            @else
             <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{asset('assets/images/dashboard/login-bg.png')}}" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">{{Auth::user()->name}}</h6>
                    <p>Vendor</p>
                </div>                
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="{{url('/dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>
    
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                                    <li><a href="{{url('product-list')}}"><i class="fa fa-circle"></i>Product List</a></li>
                                    <li><a href="{{url('add-product')}}"><i class="fa fa-circle"></i>Add Product</a></li>
                                   
                                    <li><a href="{{url('add-product-image-view')}}"><i class="fa fa-circle"></i>Product Image</a></li>
                              
                             
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="{{url('block-url')}}"><i data-feather="chrome"></i><span>Block Url</span> </a>
                        
                    </li>
                  <li><a class="sidebar-header" href="{{url('vendor-order')}}"><i data-feather="chrome"></i><span>Orders</span></a></li>

                     
                </ul>
            </div>
            @endif
</div>