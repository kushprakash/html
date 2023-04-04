@extends('admin.layout.admin')
@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Sub Product List
                            <small>Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Digital</li>
                        <li class="breadcrumb-item active">Sub Product List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Sub Product Lists</h5>
						<span class="pull-right"><a href="{{url('add-sub-product')}}" class="btn btn-xs btn-success"> Add Sub Product </a></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class=" table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th>S.No.</th> 
										<th>Image</th>
                                        <th>Product Name</th>
                                        <th>Decription</th>
                                        <th>price</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $key=>$value)
                                    <tr>

                                        <td>{{$key+1}} </td>
										<td><img src="{{$value->image}}" style="height:100px;width:100px;"> </td>
                                        <td> {{$value->product_name}} </td>
										 <td> {{$value->decription}} </td>
										 <td> {{$value->price}} </td>
                                        
                                           <td>
 
                                                 
                                                            <a class="btn btn-xs btn-info"   title="edit" href="{{ url('sub-product/edit/'.$value->id) }}">
                                         <i class="fa fa-edit"></i>
                                    </a>
                                       
                                
                                   <a class="btn btn-xs btn-danger" title="delete" href="{{ url('sub-product/delete/'.$value->id) }}">
                                         <i class="fa fa-trash"></i>
                                    </a>
											
								 	
                               
                                       
											
										 
 
                                      </td>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                                            
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
                                                
            </div>
@endsection