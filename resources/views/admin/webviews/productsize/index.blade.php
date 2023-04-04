@extends('admin.layout.admin')
@section('content')
  
    <div class="card1">
    <div class="card-header">
        <div style="margin-bottom: 10px;" class="row">
        <div class="col-md-6">
          <h5 class="">  Products  Size & Detail</h5>
           </div>
         <div class="col-md-6">
            <a class="btn btn-success pull-right" href="{{ route('productsize.create') }}">
                add  Products  Size & Detail
            </a>
        </div>
    </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class=" table table-bordered table-striped table-hover datatable">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                     
                    <th>Product Name</th>
                    <th>Color Name</th>
                    <th>Size</th>
                    <th>MRP</th>
                    <th>Offer Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($productsize as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                   <td><?php $product_name=DB::table('products')->where('id',$value->product_id)->first(); ?> @if($product_name!=null){{$product_name->name}} @else N.A. @endif</td> 

                 
                   <td><?php $color_name=DB::table('product_color')->where('id',$value->color_id)->first(); ?> @if($color_name!=null){{$color_name->color_name}} @else N.A. @endif</td> 

                       
                       <td>{{$value->size}} </td> 
                       <td>{{$value->price}} </td> 
                       <td>{{$value->offer_price}} </td> 
                       <td>{{$value->stock}} </td> 
                     <td>
                            
                                  
                                    <a class="btn btn-xs btn-info" href="{{ route('productsize.edit', $value->id) }}">
                                         <i class="fa fa-edit"></i>
                                    </a>
                              
                                
                                   <a class="btn btn-xs btn-danger" href="{{ url('product/size/delete/'.$value->id) }}">
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
  @endsection
   