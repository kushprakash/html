@extends('admin.layout.admin')
<div class="container" >
<div class="page-body" style="margin-left:130px;margin-top:100px;width:95%;">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Dashboard
                                    <small>Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
@if(Auth::user()->vendor==10)
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-warning card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                                    </div>
                                    <?php 
                                    $to=date('Y-m-d');
                                    $from=date('Y-m-d', strtotime('today - 30 days'));
                                  //  dd($from);
                                    $dataer=DB::table('sub_order')->whereMonth('created_at',date('m'))->sum('price'); //dd($dataer); ?>
                                   
									<div class="media-body col-8"><span class="m-0">Earnings</span>
                                        <h3 class="mb-0">₹ <span class="counter">{{$dataer}}</span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                    </div>
                                     <?php 
                                     
                                    $datapro=DB::table('products')->whereMonth('created_at',date('m'))->count(); //dd($dataer); ?>
                                    <div class="media-body col-8"><span class="m-0">Products</span>
                                        <h3 class="mb-0"><span class="counter">{{$datapro}}</span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-primary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                                    </div>
                                      <?php 
                                     
                                    $datauser=DB::table('users')->whereMonth('created_at',date('m'))->count(); //dd($dataer); ?>
                                    <div class="media-body col-8"><span class="m-0">Employee</span>
                                        <h3 class="mb-0"><span class="counter">{{$datauser}}</span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-danger card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                    </div>
                                      <?php 
                                        $datalistm=DB::table('order_detail')->where('payment_status','paid')->whereMonth('created_at',date('m'))->count(); 
                                 //   $datavendor=DB::table('vendors')->whereMonth('created_at',date('m'))->count(); //dd($dataer); ?>
                                    <div class="media-body col-8"><span class="m-0">Order</span>
                                        <h3 class="mb-0"><span class="counter">{{$datalistm}}</span><small> This Month</small></h3>
                                    </div>
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
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-status table-responsive latest-order-table " style="width:100%" >
                                      
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
                                            <?php 
                                     
                                    $datalist=DB::table('order_detail')->whereMonth('created_at',date('m'))->orderby('id','desc')->get();  //dd( $datalist); ?>
                                    @if($datalist!=[])
                                    
                                    @foreach($datalist as $key=>$value)
                                        <tr>
                                            
                                            <td>{{$key+1}}</td>
                                                 
                                            <td class="digits">
												  <?php 
                                     
                                    $listss=DB::table('sub_order')->where('order_id',$value->order_id)->sum('price'); //dd($dataer); ?>
                                    
												
												₹{{$listss}}</td>
                                            <td class="font-danger">Online</td>
                                            <td class="digits">
												@if($value->order_status==6)
			<button   class="btn btn-danger">Cancelled</button>
						@endif
												 @if($value->order_status!=6)
			         @if($value->delivery==1)
						    <button    class="btn btn-info">Food  preparation</button>
                            @endif
						
						  @if($value->delivery==2)
						  
						   
                               <button    class="btn btn-info"> Food ready & Pick-up</button>
                            @endif
						   @if($value->delivery==3)
                               <a href="#" class="btn btn-success">Delivered</a>
                            @endif 
												
												@endif
												  
		 
		   </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <a href="{{url('order')}}" class="btn btn-primary">View All Orders</a>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                    <pre class=" language-html"><code class=" language-html" id="example-head1">
 
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                 
    
                </div>
            </div>
	
	@else
	
	 <div class="container-fluid">
                <div class="row">
                    <!--<div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-warning card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                                    </div>
                                    <?php 
                                    $to=date('Y-m-d');
                                    $from=date('Y-m-d', strtotime('today - 30 days'));
                                  //  dd($from);
                                    $dataer=DB::table('sub_order')->whereMonth('created_at',date('m'))->sum('price'); //dd($dataer); ?>
                                   
									<div class="media-body col-8"><span class="m-0">Earnings</span>
                                        <h3 class="mb-0">₹ <span class="counter">{{$dataer}}</span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                    </div>
                                     <?php 
                                     
                                    $datapro=DB::table('products')->whereMonth('created_at',date('m'))->count(); //dd($dataer); ?>
                                    <div class="media-body col-8"><span class="m-0">Products</span>
                                        <h3 class="mb-0"><span class="counter">{{$datapro}}</span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-primary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                                    </div>
                                      <?php 
                                     
                                    $datauser=DB::table('users')->whereMonth('created_at',date('m'))->count(); //dd($dataer); ?>
                                    <div class="media-body col-8"><span class="m-0">Employee</span>
                                        <h3 class="mb-0"><span class="counter">{{$datauser}}</span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-danger card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                    </div>
                                      <?php 
                                        $datalistm=DB::table('order_detail')->where('payment_status','paid')->whereMonth('created_at',date('m'))->count(); 
                                 //   $datavendor=DB::table('vendors')->whereMonth('created_at',date('m'))->count(); //dd($dataer); ?>
                                    <div class="media-body col-8"><span class="m-0">Order</span>
                                        <h3 class="mb-0"><span class="counter">{{$datalistm}}</span><small> This Month</small></h3>
                                    </div>
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
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-status table-responsive latest-order-table " style="width:100%" >
                                      
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
                                            <?php 
                                     
                                    $datalist=DB::table('order_detail')->whereMonth('created_at',date('m'))->orderby('id','desc')->get();  //dd( $datalist); ?>
                                    @if($datalist!=[])
                                    
                                    @foreach($datalist as $key=>$value)
                                        <tr>
                                            
                                            <td>{{$key+1}}</td>
                                                 
                                            <td class="digits">
												  <?php 
                                     
                                    $listss=DB::table('sub_order')->where('order_id',$value->order_id)->sum('price'); //dd($dataer); ?>
                                    
												
												₹{{$listss}}</td>
                                            <td class="font-danger">Online</td>
                                            <td class="digits">
												@if($value->order_status==6)
			<button   class="btn btn-danger">Cancelled</button>
						@endif
												 @if($value->order_status!=6)
			         @if($value->delivery==1)
						    <button    class="btn btn-info">Food  preparation</button>
                            @endif
						
						  @if($value->delivery==2)
						  
						   
                               <button    class="btn btn-info"> Food ready & Pick-up</button>
                            @endif
						   @if($value->delivery==3)
                               <a href="#" class="btn btn-success">Delivered</a>
                            @endif 
												
												@endif
												  
		 
		   </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <a href="{{url('order')}}" class="btn btn-primary">View All Orders</a>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                    <pre class=" language-html"><code class=" language-html" id="example-head1">
 
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                 
    
                </div>
            </div>
	
	
	@endif
	
	@if(Auth::user()->vendor==2)
	
	
	
	
	
	
	
	
	@endif
            <!-- Container-fluid Ends-->

        </div>
</div>