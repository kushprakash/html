@extends('admin.layout.admin')
@section('content')

<div class="page-body">
      <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Cashflow
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                                <!--<li class="breadcrumb-item">Coupons </li>-->
                                <li class="breadcrumb-item active">Cashflow</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
     <!--<div class="container-fluid">
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
             
         </div>
         
    </div>-->
    
     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Cashflow</h5>
						<div class="btn-popup pull-right">
							     <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModal" >Add</button>

							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Detail</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
										 
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" action="{{asset(url('admin/addcashflow'))}}" method="POST" enctype="multipart/form-data">
											@csrf
                                        
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Date :</label>
                                                    
                                                      <input class="form-control" name="date" type="date" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Received :</label>
                                                    <input class="form-control" name="received" type="text" >
                                                </div>
                                                
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Payable :</label>
                                                    <input class="form-control" name="payable" type="text">
                                                </div>
                                                 
                                                
                                            </div>
                                        <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" onclick="this.form.submit()">Save</button>
                                      
                                        <!--  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                                    </div>
                                </form>
                             </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
							
							
							
							
						</div>
						
						
						
						
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table   class=" table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>

                                        

                                        <th>Date</th>
                                        <th>Received (Amount)</th>
                                        <th>Payable (Amount)</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $pricess=DB::table('cashflow')->get();
                                    $pricesss =0;
									$payable=0;
									?>
                                    @foreach($pricess as $r)
                                    <tr>
                                        <td>{{$r->date}}</td>
                                        <td>₹{{$r->received}} </td> 
  <?php $pricesss += $r->received; ?>

                                        
                                        <td><?php $payable += $r->payable; ?> {{$r->payable}}</td> 
 	<td>   <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModals{{$r->id}}" ><i class="fa fa-edit"></i></button>
										
										<div class="modal fade" id="exampleModals{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" action="{{asset(url('admin/editcashflow/'.$r->id))}}" method="POST" enctype="multipart/form-data">									@csrf
                                        
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Date :</label>
                                                    
                                                      <input class="form-control" name="date" value="{{$r->date}}" type="date" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Received :</label>
                                                    <input class="form-control" name="received" value="{{$r->received}}" type="text" >
                                                </div>
                                                
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Payable :</label>
                                                    <input class="form-control" name="payable"  value="{{$r->payable}}" type="text">
                                                </div>
                                                 
                                                
                                            </div>
                                        <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" onclick="this.form.submit()">Save</button>
                                      
                                        <!--  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                                    </div>
                                </form>
			
      </div>
       
    </div>
  </div>
</div>
										
										
										
										</td> 
                                                            
                                        </tr>
                                          
                                       @endforeach
                                         <tr>
  
                                        

                                        <td>Total</td>
                                        <td>₹{{$pricesss}}</td>
                                        <td>₹{{$payable}}</td> 
										 <td></td> 
 
                                                            
                                        </tr>
                                                 
                                            </tbody>
                                        </table>
                                        
                                          
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  
</div>
    




@endsection