@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }}Product Detail
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                 
                <tr>
                    <th>
                  Header Name
                    </th>
                    <td><?php $header_name=DB::table('header_name')->where('id',$product->header_name)->first(); ?> @if($header_name!=null){{$header_name->header_name}} @else N.A. @endif</td> 
                   
                </tr>
                 <tr>
                    <th>
                   Category Name
                    </th>
                     <td><?php $category_name=DB::table('category')->where('id',$product->cat_id)->first(); ?> @if($category_name!=null){{$category_name->category}} @else N.A. @endif</td> 
                  
                </tr>
                 <tr>
                    <th>
                   Sub Category
                    </th>
                    <td><?php $subcategory_name=DB::table('sub_category')->where('id',$product->sub_cat_id)->first(); ?> @if($subcategory_name!=null){{$subcategory_name->sub_category}} @else N.A. @endif</td> 

                 
                </tr>
                
                  <tr>
                    <th>
                   Product Name
                    </th>
                    <td> {{$product->name}}</td>
                 
                </tr>
                 <tr>
                    <th>
                   Main Description
                    </th>
                    <td> {!!$product->main_details!!}</td>
                 
                </tr>
                 <tr>
                    <th>
                    Description
                    </th>
                    <td> {!!$product->description!!}</td>
                 
                </tr>
                
                 <tr>
                    <th>
                    HSN
                    </th>
                    <td> {{$product->hsn}}</td>
                 
                </tr>
                <tr>
                    <th>
                   MRP
                    </th>
                    <td> {{$product->mrp}}</td>
                 
                </tr>
                
                <tr>
                    <th>
                   Offer Price
                    </th>
                    <td> {{$product->offer_price}}</td>
                 
                </tr>
                
                <tr>
                    <th>
                     Stock
                    </th>
                    <td> {{$product->stock}}</td>
                 
                </tr>
                
                <tr>
                    <th>
                     Images
                    </th>
                    <td>  <?php 
          
             $productimage1=DB::table('product_image')->where('product_id',$product->id)->get();
                   
            ?>
            @if($productimage1!=null)
            @foreach($productimage1 as $value)
             <img src="{{asset($value->images)}}" style="height:100px;width:100px;">
            @endforeach
            @endif
            </td>
                 
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection