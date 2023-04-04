@extends('admin.layout.admin')
@section('content')

<div class="page-body">
      <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Balance Sheet
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                                <!--<li class="breadcrumb-item">Coupons </li>-->
                                <li class="breadcrumb-item active">Balance Sheet</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    <!-- <div class="container-fluid">
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
                        <h5>Balance Sheet</h5>
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
                                        <form class="needs-validation" action="{{asset(url('admin/addbalancesheet'))}}" method="POST" enctype="multipart/form-data">
											@csrf
                                        
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Assets :</label>
                                                    
                                                      <input class="form-control" name="assets" type="text" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Assets price :</label>
                                                    <input class="form-control" name="assets_price" type="text" >
                                                </div>
                                                
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Liabilities :</label>
                                                    <input class="form-control" name="liabilities" type="text">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Liabilities price :</label>
                                                    <input class="form-control" name="liabilities_price" type="text">
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

                                        <th>S.No.</th> 

                                        <th>Assets</th>
                                        <th>Price </th>
                                         
                                          <th>Action</th>
                                         
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ad=DB::table('balance_account')->where('assets','!=',null)->first();
									
									$ads=DB::table('balance_account')->where('assets','!=',null)->get();
									$price=0;
									?>
									@if($ad !=null)
									@foreach($ads as $key=>$r)
                                    <tr>

                                        <td>{{$key+1}}</td>

                                        <td>{{$r->assets}}</td>
                                        
                                        <td><?php $price+=$r->assets_price;?>  {{$r->assets_price}} </td> 
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
        <form class="needs-validation" action="{{asset(url('admin/editbalancesheet/'.$r->id))}}" method="POST" enctype="multipart/form-data">
											@csrf
                                        
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Assets :</label>
                                                    
                                                      <input class="form-control" value="{{$r->assets}}" name="assets" type="text" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Assets price :</label>
                                                    <input class="form-control" value="{{$r->assets_price}}" name="assets_price" type="text" >
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
									@endif
                                       
                                         <tr>
  
                                        <td> </td>

                                        <td>Total</td>
                                        <td>₹{{$price}}</td> 
 <td> </td>
                                                            
                                        </tr>
                                                 
                                            </tbody>
                                        </table>
                                        
                                          <table   class=" table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th>S.No.</th> 

                                        <th>Liabilities</th>
                                        <th>Price</th>
										<th>Action</th>
                                         
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $ads=DB::table('balance_account')->where('liabilities','!=',null)->first();
									
									$adss=DB::table('balance_account')->where('liabilities','!=',null)->get();
									$prices=0;
									?>
									@if($ads !=null)
									@foreach($adss as $key=>$r)
                                    <tr>

                                        <td>{{$key+1}}</td>

                                        <td>{{$r->liabilities}}</td>
                                        
                                        <td><?php $prices+=$r->liabilities_price;?>  {{$r->liabilities_price}} </td> 
 
										<td>   <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModalss{{$r->id}}" ><i class="fa fa-edit"></i></button>
										
										<div class="modal fade" id="exampleModalss{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" action="{{asset(url('admin/editbalancesheetss/'.$r->id))}}" method="POST" enctype="multipart/form-data">
											@csrf
                                        
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Liabilities :</label>
                                                    
                                                      <input class="form-control" value="{{$r->liabilities}}" name="liabilities" type="text" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Liabilities price :</label>
                                                    <input class="form-control" value="{{$r->liabilities_price}}" name="liabilities_price" type="text" >
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
									@endif
                                       
                                         <tr>
  
                                        <td> </td>

                                        <td>Total</td>
                                        <td>₹{{$prices}}</td> 
											 <td> </td>
                                                            
                                        </tr>
                                                 
                                            </tbody>
                                        </table>
                                        
                                        <table  class=" table table-bordered table-striped table-hover">
                                            <tr>
                                                <th>Total Balance   </th>
                                                 <th>₹ {{$price-$prices}}</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  
</div>
    




@endsection