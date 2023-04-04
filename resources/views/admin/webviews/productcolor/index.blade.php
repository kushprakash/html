@extends('admin.layout.admin')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>



<div class="card1">
    <div class="card-header">
        <div style="margin-bottom: 10px;" class="row">
        <div class="col-md-6">
          <h5 class="">  Product Color</h5>
           </div>
         <div class="col-md-6">
            <a class="btn btn-success pull-right" href="{{ route('productscolor.create') }}">
                Add  Product color
             </a>
        </div>
    </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class=" table table-bordered table-striped table-hover datatable">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                    
                    <th>Product Name</th>
                    <th>Color Name</th>
                   
                    <th>Action</th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($productcolor as $key=>$value)
                   
                <tr>
                   
                    <td>{{$key+1}} </td>
                  
                    <td><?php $product_name=DB::table('products')->where('id',$value->product_id)->first(); ?> @if($product_name!=null){{$product_name->name}} @else N.A. @endif</td> 

                 
                    
                      <td>{{$value->color_name}} </td> 
                      
                     <td>
                             
                               
                                   
                                    <a class="btn btn-xs btn-info" href="{{ route('productscolor.edit', $value->id) }}">
                                         <i class="fa fa-edit"></i>
                                    </a>
                                 
                                   <a class="btn btn-xs btn-danger" href="{{ url('product/color/delete/'.$value->id) }}">
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
 