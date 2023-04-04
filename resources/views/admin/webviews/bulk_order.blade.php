@extends('admin.layout.admin')
@section('content')
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Bulk Order
                        <small> Bulk Order</small>
                    </h3>
                </div>
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
                    <h5>Bulk Order  </h5>
                </div>
                  <div class="card-body">
        <div class="table-responsive">
            <table id="example" class=" table table-bordered table-striped table-hover">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                     
                    <th>Product Name</th>
                     <th>Product Terms</th>
                    <th>Quantity</th>
                    <th>User Detail</th>
                    <th>Country</th>
                    <th>Port</th>
                    <th>Eco Term</th>
					<th>Date</th>
                    <th>Status</th>
                    
                </tr>
                 </thead>
                <tbody>
                    @foreach($product as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                     <td> @if($value->product_name!=null)  {{$value->product_name}} @endif</td>
                      <td> @if($value->shipping_option!=null)  {{$value->shipping_option}} @endif</td>
                     <td> {{$value->product_quentity}}  {{$value->quantity_type}} </td> 
                      <td> Name :{{$value->user_name}} <br> Email:{{$value->user_email}}  <br>Email:{{$value->user_phone}}<br> Address:{{$value->user_address}}</td> 
                    
                     <td> {{$value->country}} </td> 
                     <td> {{$value->port}} </td> 
                     <td> {{$value->ecoterm}} </td> 
					 <td> {{$value->created_at}} </td> 
                    
                    
                     <td>
                                      
                               
                                     
                                        <a  href="{{ url('bulk-delete/'.$value->id) }}" class="btn btn-xs btn-danger">
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