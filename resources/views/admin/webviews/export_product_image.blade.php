@extends('admin.layout.admin')
@section('content')
 
   
 
<div class="card1">
    <div class="card-header">
        <div class="raw">
            <div class="col-lg-12">
        Export  Products
          </div>
         <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="text-align:right;">
            <a class="btn btn-success" href="{{ url('add-export-product-image') }}">
              add Export Products Images
            </a>
        </div>
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
                     
                    <th>Images</th>
                    <th>Action</th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($productimages as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                   <td><?php $product_name=DB::table('export_products')->where('id',$value->product_id)->first(); ?> @if($product_name!=null){{$product_name->name}} @else N.A. @endif</td> 
                <td>	<img src="{{asset($value->images)}}" height="100" width="100"> </td> 
                 
                     <td>
                            
                                
                                
                                    <a class="btn btn-xs btn-info" href="{{ url('edit-export-product-image', $value->id) }}">
                                         <i class="fa fa-edit"></i>
                                    </a>
                               
                                   <a class="btn btn-xs btn-danger" href="{{ url('delete-export-product-image/'.$value->id) }}">
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
  @section('scripts')
@parent
   
@endsection