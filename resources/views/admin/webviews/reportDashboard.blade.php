@extends('admin.layout.admin')
<div class="container">
    <div class="page-body" style="margin-left:130px;margin-top:100px;width:95%;">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="page-header-left">
                            <h3>Dashboard
                                <small>Admin panel</small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-8">

                        <form action="{{ url('reportDashboard') }}" method="post">
                            @csrf
                            <div class="row mb-4" style="margin-top:-10px;">

                                <div class="col-lg-2"></div>
                                <div class="col-lg-4">
                                    <label> Start Date</label>
                                    <input type="date" name="start" class="form-control"
                                        value="{{ $startDate }}" required>

                                </div>
                                <div class="col-lg-4">
                                    <label> End Date</label>
                                    <input type="date" name="end" class="form-control"
                                        value="{{ $endDate }}" required>

                                </div>
                                <div class="col-lg-2">
                                    <lable class=" "style="opacity:0"> Email Id</lable>
                                    <button class="btn btn-info btn-xs mybtn" style="height:37px;margin-top:10px;">Search</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <style>
            .mybtn {
               margin-top:10px;
               background-color:white !important;
               color:black;

            }

            .card{
                height:120px;
            }
        </style>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card o-hidden widget-cards">
                        <div class="bg-warning card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="navigation"
                                            class="font-warning"></i></div>
                                </div>
                                <?php
                                $month = date('m');
                                $data0 = DB::table('order_detail')
                                    ->where('created_at', '>=', $startDate)
                                    ->where('created_at', '<=', $endDate)
                                    ->count();
                                ?>

                                <div class="media-body col-8"><span class="m-0">Total Order</span>
                                    <h3 class="mb-0"><span class="counter">{{ $data0 }}</span></h3>
                                </div>

                            </div>
                            <form action="{{ url('dashboard_rport') }}" method="post">
                                @csrf
                            <input type="hidden" name="order_status"  value="" required> 
                            <input type="hidden" name="delivery"  value="" required> 
                            <input type="hidden" name="start" class="form-control" value="{{ $startDate }}" required> 
                            <input type="hidden" name="end" class="form-control" value="{{ $endDate }}" required>
                            <center><button style="background-color:white !important;color:black;" class="mybtn btn btn-info btn-xs  ">View More</button></center>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card o-hidden  widget-cards">
                        <div class="card-body" style="background-color:#C47C28;">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="box"
                                            class="font-secondary"></i></div>
                                </div>
                                <?php
                                $month = date('m');
                                $data1 = DB::table('order_detail')
                                    ->where('order_status', null)
                                    ->where('delivery', 0)
                                    ->where('created_at', '>=', $startDate)
                                    ->where('created_at', '<=', $endDate)
                                    ->count();
                                ?>
                                <div class="media-body col-8"><span class="m-0" style="color:white;">Pending</span>
                                    <h3 class="mb-0"><span class="counter">{{ $data1 }}</span></h3>
                                </div>

                               
                            </div>
                             <form action="{{ url('dashboard_rport') }}" method="post">
                                @csrf
                            <input type="hidden" name="order_status"  value="" required> 
                            <input type="hidden" name="delivery"  value="0" required> 
                            <input type="hidden" name="start" class="form-control" value="{{ $startDate }}" required> 
                            <input type="hidden" name="end" class="form-control" value="{{ $endDate }}" required>
                            <center><button style="background-color:white !important;color:black;" class="btn btn-info btn-xs mybtn ">View More</button></center>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card o-hidden widget-cards">
                        <div class=" card-body" style="background-color:#A8E57C;">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="navigation"
                                            class="font-danger"></i></div>
                                </div>
                                <?php
                                $month = date('m');
                                $data3 = DB::table('order_detail')
                                    ->where('order_status', '!=', 6)
                                    ->where('delivery', 4)
                                    ->where('created_at', '>=', $startDate)
                                    ->where('created_at', '<=', $endDate)
                                    ->count();
                                ?>
                                <div class="media-body col-8"><span class="m-0" style="color:white;">Accept</span>
                                    <h3 class="mb-0"><span class="counter">{{ $data3 }}</span></h3>
                                </div>
                               
                            </div>

                             <form action="{{ url('dashboard_rport') }}" method="post">
                                @csrf
                            <input type="hidden" name="order_status"  value="6" required> 
                            <input type="hidden" name="delivery"  value="4" required> 
                            <input type="hidden" name="start" class="form-control" value="{{ $startDate }}" required> 
                            <input type="hidden" name="end" class="form-control" value="{{ $endDate }}" required>
                            <center><button style="background-color:white !important;color:black;" class="btn btn-info btn-xs mybtn ">View More</button></center>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card o-hidden  widget-cards">
                        <div class="bg-secondary card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="box"
                                            class="font-secondary"></i></div>
                                </div>
                                <?php
                                $month = date('m');
                                $data1 = DB::table('order_detail')
                                    ->where('order_status', '!=', 6)
                                    ->where('delivery', 1)
                                    ->where('created_at', '>=', $startDate)
                                    ->where('created_at', '<=', $endDate)
                                    ->count();
                                ?>
                                <div class="media-body col-8"><span class="m-0">Preparation</span>
                                    <h3 class="mb-0"><span class="counter">{{ $data1 }}</span></h3>
                                </div>

                                
                            </div>

                            <form action="{{ url('dashboard_rport') }}" method="post">
                                @csrf
                            <input type="hidden" name="order_status"  value="6" required> 
                            <input type="hidden" name="delivery"  value="1" required> 
                            <input type="hidden" name="start" class="form-control" value="{{ $startDate }}" required> 
                            <input type="hidden" name="end" class="form-control" value="{{ $endDate }}" required>
                            <center><button style="background-color:white !important;color:black;" class="btn btn-warning btn-xs mybtn ">View More</button></center>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card o-hidden widget-cards">
                        <div class="bg-info card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="message-square"
                                            class="font-primary"></i></div>
                                </div>
                                <?php
                                $month = date('m');
                                $data2 = DB::table('order_detail')
                                    ->where('order_status', '!=', 6)
                                    ->where('delivery', 2)
                                    ->where('created_at', '>=', $startDate)
                                    ->where('created_at', '<=', $endDate)
                                    ->count();
                                ?>
                                <div class="media-body col-8"><span class="m-0">Ready & Pick-up</span>
                                    <h3 class="mb-0"><span class="counter">{{ $data2 }}</span></h3>
                                </div>
                            </div>

                            <form action="{{ url('dashboard_rport') }}" method="post">
                                @csrf
                            <input type="hidden" name="order_status"  value="6" required> 
                            <input type="hidden" name="delivery"  value="2" required> 
                            <input type="hidden" name="start" class="form-control" value="{{ $startDate }}" required> 
                            <input type="hidden" name="end" class="form-control" value="{{ $endDate }}" required>
                            <center><button style="background-color:white !important;color:black;" class="btn btn-warning btn-xs mybtn ">View More</button></center>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card o-hidden widget-cards">
                        <div class="bg-success card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="users"
                                            class="font-danger"></i></div>
                                </div>
                                <?php
                                $month = date('m');
                                $data3 = DB::table('order_detail')
                                    ->where('order_status', '!=', 6)
                                    ->where('delivery', 3)
                                    ->where('created_at', '>=', $startDate)
                                    ->where('created_at', '<=', $endDate)
                                    ->count();
                                ?>
                                <div class="media-body col-8"><span class="m-0">Delivered</span>
                                    <h3 class="mb-0"><span class="counter">{{ $data3 }}</span></h3>
                                </div>
                            </div>

                            <form action="{{ url('dashboard_rport') }}" method="post">
                                @csrf
                            <input type="hidden" name="order_status"  value="6" required> 
                            <input type="hidden" name="delivery"  value="3" required> 
                            <input type="hidden" name="start" class="form-control" value="{{ $startDate }}" required> 
                            <input type="hidden" name="end" class="form-control" value="{{ $endDate }}" required>
                            <center><button style="background-color:white !important;color:black;" class="btn btn-warning btn-xs mybtn ">View More</button></center>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card o-hidden widget-cards " style="background-color:#E97070;">
                        <div class="card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="users"
                                            class="font-danger"></i></div>
                                </div>
                                <?php
                                $month = date('m');
                                $data4 = DB::table('order_detail')
                                    ->where('order_status', 6)
                                    ->where('created_at', '>=', $startDate)
                                    ->where('created_at', '<=', $endDate)
                                    ->count();
                                ?>
                                <div class="media-body col-8"><span class="m-0"
                                        style="color:white;">Cancelled</span>
                                    <h3 class="mb-0"><span class="counter">{{ $data4 }}</span></h3>
                                </div>
                            </div>

                            <form action="{{ url('dashboard_rport') }}" method="post">
                                @csrf
                            <input type="hidden" name="order_status"  value="6" required> 
                            <input type="hidden" name="delivery"  value="" required> 
                            <input type="hidden" name="start" class="form-control" value="{{ $startDate }}" required> 
                            <input type="hidden" name="end" class="form-control" value="{{ $endDate }}" required>
                            <center><button style="background-color:white !important;color:black;" class="btn btn-info btn-xs mybtn ">View More</button></center>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card o-hidden widget-cards " style="background-color:#239D0F;">
                        <div class="card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="navigation"
                                            class="font-danger"></i></div>
                                </div>
                                <?php
                                
                                $dataer = DB::table('sub_order')
                                    ->where('created_at', '>=', $startDate)
                                    ->where('created_at', '<=', $endDate)
                                    ->sum('price');
                                ?>
                                <div class="media-body col-8"><span class="m-0"
                                        style="color:white;">Earnings</span>
                                    <h3 class="mb-0">₹ <span class="counter">{{ $dataer }}</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card o-hidden widget-cards " style="background-color:#799F73;">
                        <div class="card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="navigation"
                                            class="font-danger"></i></div>
                                </div>
                                <?php
                                
                                $dataers = DB::table('wallet')
                                    ->where('created_at', '>=', $startDate)
                                    ->where('created_at', '<=', $endDate)
                                    ->sum('amount');
                                ?>
                                <div class="media-body col-8"><span class="m-0" style="color:white;">Reward</span>
                                    <h3 class="mb-0">₹ <span class="counter">{{ $dataers }}</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card o-hidden widget-cards " style="background-color:#99b195;">
                        <div class="card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="navigation"
                                            class="font-danger"></i></div>
                                </div>
                                <?php
                                
                                $dataer33 = $dataer - $dataers;
                                ?>
                                <div class="media-body col-8"><span class="m-0" style="color:white;">Total
                                        Income</span>
                                    <h3 class="mb-0">₹ <span class="counter">{{ $dataer33 }}</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
