@extends('admin.layout.admin')
@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Export Product List
                            <small>Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Digital</li>
                        <li class="breadcrumb-item active">Export Product List</li>
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
                        <h5>Export Product List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class=" table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th>S.No.</th> 
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>color</th>
                                        <th>Size</th>
                                        <th>Offer Price</th>
                                        <th>Price</th>
                                     
                                        
                                        <th> <input type="button" class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" title="Switch to inserting"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $key=>$value)
                                    <tr>

                                        <td>{{$key+1}} </td>

                                        <td> {{$value->name}} </td>
                                        

                                        <td>{{$value->cat_id}}</td> 
                                        <td>{{$value->color}}</td>
                                       
                                         <td>  {{$value->size}} </td>
                                          <td>  {{$value->offer_price}} </td>
                                           <td>  {{$value->price}} </td>
                                        
                                        <td>

                                                           
                                                              <a class="btn btn-xs btn-info"   title="edit" href="{{ url('edit-export-product/'.$value->id) }}">
                                         <i class="fa fa-edit"></i>
                                    </a>
                                    <!--   <a class="btn btn-xs btn-success"  title="view" href="{{ url('product/view/'.$value->id) }}">-->
                                    <!--     <i class="fa fa-eye"></i>-->
                                    <!--</a>-->
                              
                                
                                   <a class="btn btn-xs btn-danger" title="delete" href="{{ url('delete-export-product/'.$value->id) }}">
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