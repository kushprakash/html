@extends('admin.layout.admin')
@section('content')

<div class="page-body">
      <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Bussiness
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                                <!--<li class="breadcrumb-item">Coupons </li>-->
                                <li class="breadcrumb-item active">Bussiness</li>
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
         
    </div> -->
    
     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Bussiness</h5>
                        <a href="{{url('add-export-expensive')}}" class="btn btn-success float-right">Add Expensive detail </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table   class=" table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>

                                        

                                         
                                        <th>Expensive Detail</th>
                                        <th>Detail</th>
                                        <th>Expensive (Amount)</th>
                                         
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $price=00; ?>
                                    @foreach($exp as $ex)
                                    
                                    <tr>

                                        <td>{{$ex->exe_name}}</td> 
                                         <td>{{$ex->detail}}</td> 
                                        <td> {{$ex->pay}}</td>
                                        <?php $price+=$ex->pay; ?>
                                  </tr>
                                       @endforeach
                                           
                                            </tbody>
                                        </table>
                                        
                                           <table  class=" table table-bordered table-striped table-hover">
                                            <tr>
                                                <th>Total </th>
                                                  
                                                 <th> <p class="text-center">{{$price}} </p></th>
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