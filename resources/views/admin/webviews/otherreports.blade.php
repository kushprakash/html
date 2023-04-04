@extends('admin.layout.admin')
@section('content')

<div class="page-body">
      <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Other Reports
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                                <!--<li class="breadcrumb-item">Coupons </li>-->
                                <li class="breadcrumb-item active">Other Reports</li>
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
                        <h5>Other Reports</h5>				
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table   class=" table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>

                                        

                                        <th>Name</th>
										
                                        <th>Amount</th>
                                         <th>Comisssion</th>
                                        <th> Amount</th>
										 
                                         
                                         
                                        
                                    </tr>
                                </thead>
							<?php 	$vendor=DB::table('vendor_details')->orderBy('id','desc')->get(); ?>
     
                                <tbody>
									 @if($vendor != [])
									@foreach($vendor as $e)
                                     <tr>
										 <td> {{$e->legal_entry_name}}</td>
										  <td><?php  $vendor=DB::table('sub_order')->where('vendor_id',$e->user_id)->select('price')->first();
											  
											  $vendors=DB::table('sub_order')->where('vendor_id',$e->user_id)->sum('price');
											 if($vendor != null){
												 //dd($vendors->price);
											   
											 echo($vendors);
											   
											 } 
											 else{
											echo('N.A.'); 
											 }
											  
											  ?> </td>
										  <td><?php  $vendorsd=DB::table('category')->where('id',$e->category)->first();?>
										 @if($vendorsd->com_set=='percentage')
											  
											 <?php $da=$vendors*(10/100);?>
											  {{$da}}
											  @endif
										 
										 
										 </td>
										  <td> {{$vendors-$da}}</td>
										   
									</tr>
									@endforeach
									@endif
                                           
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