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

                   
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                             
                               
                                    <li><a href="{{url('category')}}"><i class="fa fa-circle"></i>Category</a></li>
                                    <li><a href="{{url('sub-category')}}"><i class="fa fa-circle"></i>Sub Category</a></li>
                                    <li><a href="{{url('sub-sub-category')}}"><i class="fa fa-circle"></i>Sub SubCategory</a></li>
                                    <!-- <li><a href="{{url('brands')}}"><i class="fa fa-circle"></i>Brands</a></li> -->
                                    <li><a href="{{url('product-list')}}"><i class="fa fa-circle"></i>Product List</a></li>
                                    <li><a href="{{url('add-product')}}"><i class="fa fa-circle"></i>Add Product</a></li>
                                    
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
                    <li><a class="sidebar-header" href="#"><i data-feather="users"></i><span>Vendors</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{url('vendor-list')}}"><i class="fa fa-circle"></i>Vendor List</a></li>
                            <li><a href="{{url('add-vendor')}}"><i class="fa fa-circle"></i>Create Vendor</a></li>
                        </ul>
                    </li>
						
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