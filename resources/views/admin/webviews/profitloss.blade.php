@extends('admin.layout.admin')
@section('content')

<div class="page-body">
      <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Profit & Loss
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                                <!--<li class="breadcrumb-item">Coupons </li>-->
                                <li class="breadcrumb-item active">Profit & Loss</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
   <!--  <div class="container-fluid">
         <div class="mt-5" >
            <h2> Filter  </h2>
         </div>
         <div class="row ">
            
            
           <div class="col-md-4  col-lg-4  ">
               Start Date: <input type="date" name="date" class="form-control" >
            </div>   
             <div class="col-md-4  col-lg-4  ">
               End Date : <input type="date" name="date" class="form-control">
              </div>
               <div class="col-md-4  col-lg-4 mt-4 ">
                <button class="btn btn-danger">Submit</button>
             </div>
             
         </div>-->
        <div class="row mt-5">
            
            <div class="col-md-12  col-lg-12 mt-5">
            
            <div class="card" style="width:20rem;">
          <div class="card-body">
            <h5 class="card-title">Profit & loss</h5>
            <!--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->
          <!--  <p class="card-text">Month:july</p>-->
            <!--<a href="#" class="card-link">Card link</a>-->
            <a href="#" class="card-link">	Amount: <?php $receivedprice=DB::table('cashflow')->sum('received');
				$payable=DB::table('cashflow')->sum('payable');
				
			
				echo($receivedprice-$payable);?> </a>
          </div>
        </div>
         </div>   
           <!-- <div class="col-md-6  col-lg-6 mt-5">
            <div class="card" style="width:20rem;">
          <div class="card-body">
            <h5 class="card-title">Loss</h5>
            <!--<h6 class="card-subtitle mb-2 text-muted">Month:july</h6>-->
            <!-- <p class="card-text">Month:july</p> -->
            <!--<a href="#" class="card-link">Card link</a>-->
          <!--  <a href="#" class="card-link">Amount: ₹0.00</a>
          </div>
        </div>
        </div> -->
        </div>
    </div>
 
    




@endsection