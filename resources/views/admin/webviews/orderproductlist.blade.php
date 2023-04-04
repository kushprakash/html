@extends('admin.layout.admin')
@section('content')
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Invoice
                        <small> Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Invoice</li>
                    <li class="breadcrumb-item active">Invoice</li>
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
                    <h5>Invoice</h5>
                </div>
                 <div class="box-body  table-responsive"> 
    <table id="example" class="table table-bordered table-striped">
             <thead>
                        <tr>
                            <th>S.No.</th> 
                    
                    <th>Product detail</th>
                    
                    <th>user detail</th>
                    
                    <th>Vendor detail</th>
                    
                    <th>Order Id</th>
                    <!--<th>Shiprocket Order Id </th>-->
                     
                    <th>Price</th>
                     
					 
							<th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                               @foreach($order_detail as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                    <td>  
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable{{$value->order_id}}">
  Product detail
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable{{$value->order_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Product Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php $product=DB::table('sub_order')->where('order_id',$value->order_id)->get();
      //dd($product);
      $productcount=DB::table('sub_order')->where('order_id',$value->order_id)->count();
      
      ?> 
            <div class=form-group style="float:right;">  
             <label style="float:right;"> Item  : {{$productcount}}   </label>
             
            </div>       
           @if($product!=null)
           @foreach($product as $val)
           <?php $product1=DB::table('products')->where('id',$val->product_id)->first();
                  //dd($product1);
           ?> 
           <div class=form-group> 
             <label> Name : @if($product1!=null){{$product1->name}} @else N.A @endif </label>
             
            </div> 
            <div class=form-group> 
             <label> Product-Size:@if($product1!=null) {{$product1->size}} @else N.A @endif </label>
             
            </div>    


           @endforeach
           @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div> </td> 
                    <td>  
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollabl{{$value->user_id}}">
  user detail
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollabl{{$value->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php $userdetail=DB::table('users')->where('id',$value->user_id)->first(); ?>
            <div class=form-group> 
             <label> Name: @if($userdetail!=null){{$userdetail->name}} @endif </label>
            </div>   
            <div class=form-group> 
             <label> Emai Address: @if($userdetail!=null){{$userdetail->email}} @endif </label>

            </div> 
            <div class=form-group> 
             <label> Phone Number : @if($userdetail!=null){{$userdetail->phone}} @endif </label>
             
            </div> 
             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         
      </div>
    </div>
  </div>
</div></td> 

                    @if(Auth::user()->id==1)
                    <td> <?php $detail=DB::table('vendor_details')->where('user_id',$value->order_id)->first();
                         
                    
                    ?>
                   @if($detail!=null) {{$detail->legal_entry_name}}<br><br>{{$detail->register_address}} @else N.A. @endif
                    </td>
                    @endif
                    <td> <?php $da=DB::table('users')->where('id',$value->vendor_id)->first(); //dd($da);?> @if($da != null) {{$da->name}} @else N.A. @endif </td>  
                   
                     
                    <td> {{$value->payment_request_id}} </td> 
                    <td> {{$value->price}} </td> 
                     
					<td><a href="{{url('order-invoice-admin/'.$value->order_id)}}"><button class="btn btn-info mt-2">Invoice</button></a></td>
                    

                    
                          
                   
                </tr>
                 @endforeach
                         
                 </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

</div>
@endsection