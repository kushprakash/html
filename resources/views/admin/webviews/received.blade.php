@extends('admin.layout.admin')
@section('content')

<div class="page-body">
      <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Received
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                                <!--<li class="breadcrumb-item">Coupons </li>-->
                                <li class="breadcrumb-item active">Received</li>
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
             
         </div>
         
    </div>
    -->
     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Received</h5>
						
						
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
                                        <form class="needs-validation" action="{{asset(url('admin/addreceived'))}}" method="POST" enctype="multipart/form-data">
											@csrf
                                        
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Name :</label>
                                                    
                                                      <input class="form-control" name="name" type="text" >
                                                </div>
                                                
                                                
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Price :</label>
                                                    <input class="form-control" name="price" type="text">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Transfer Type:</label>
                                                    <select class="form-control" name="trasfer" type="text">
														<option>cash</option>
														<option>online</option>
													 </select>
                                                </div>
                                                 <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Date :</label>
                                                    <input class="form-control" name="date" type="date">
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

                                        

                                        <th>Name</th>
                                        <th>Received (Amount)</th>
                                         <th>Date</th>
                                        <th>Online/Cash</th>
										<th>Action</th>
                                         
                                         
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ad=DB::table('payment_received')->where('deleted_at',null)->first();
									
									$ads=DB::table('payment_received')->where('deleted_at',null)->get();
									$price=0;
									
									
									?>
									@if($ad !=null)
									@foreach($ads as $key=>$r)
                                    <tr>

                                        <td>{{$r->name}}</td> 
                                         <td> <?php $price+=$r->price;?> {{$r->price}}</td> 
                                        <td>{{$r->date}} </td>
                                       
                                        <td>{{$r->trasfer}}</td> 
										<td>
										
										 <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModals{{$r->id}}" ><i class="fa fa-edit"></i></button>
										
										<div class="modal fade" id="exampleModals{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Detail</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
										 
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" action="{{asset(url('admin/editreceived/'.$r->id))}}" method="POST" enctype="multipart/form-data">
											@csrf
                                        
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Name :</label>
                                                    
                                                      <input class="form-control" name="name" value="{{$r->name}}" type="text" >
                                                </div>
                                                
                                                
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Price :</label>
                                                    <input class="form-control" value="{{$r->price}}" name="price" type="text">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Transfer Type:</label>
                                                    <select class="form-control" value="{{$r->trasfer}}" name="trasfer" type="text">
														<option value="cash" @if($r->trasfer=='cash') selected @endif>cash</option>
														<option value="online" @if($r->trasfer=='online') selected @endif>online</option>
													 </select>
                                                </div>
                                                 <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Date :</label>
                                                    <input class="form-control" name="date" value="{{$r->date}}" type="date">
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
                                          
                                       
                                           
                                            </tbody>
                                        </table>
                                        
                                           <table  class=" table table-bordered table-striped table-hover">
                                            <tr>
                                                <th>Total </th>
                                                 <th>{{$price}} </th>
												<th></th>
												
												<th></th>
												<th></th>
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