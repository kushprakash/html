@extends('admin.layout.admin')
@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Product View
                            <small>Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Digital</li>
                        <li class="breadcrumb-item active">Product View</li>
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
                        <h5>Product view</h5>
                        <!-- <a  href="{{url('product-inventory/'.$value->id)}}">
                         <button class="btn btn-primary pull-right">Add inventory</button>
                        </a> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class=" table table-bordered table-striped table-hover">
                                     
                                    <tr>
                                         
                                        <th>Name</th>
                                          
                                        <td> {{$value->name}} </td>
                                        </tr>
                                        
                                        <tr> 
                                        <th>menu</th>
                                        <td> @php $menus=DB::table('header_menu')->where('id',$value->header_name)->first(); @endphp
                                            @if($menus!=null) {{$menus->menu_name}} @else N.A. @endif</td> 
                                               </tr>  
                                                    <tr> 
                                             <th>Category</th>

                                        <td><?php $category_name=DB::table('category')->where('id',$value->cat_id)->first(); ?>
                                                @if($category_name!=null){{$category_name->category}} @else N.A. @endif</td> 
                                                  </tr>  
                                                    <tr> 
                                                
                                                <th>Sub Category</th>
                                        <td> @php $menuss=DB::table('sub_category')->where('id',$value->sub_cat_id)->first(); @endphp
                                                @if($menuss!=null) {{$menuss->sub_category}} @else N.A. @endif</td>
                                                  </tr>  
                                                    <tr> 
                                                 <th>Sub subCategory</th>
                                        <td> @php $menusss=DB::table('sub_sub_category')->where('id',$value->sub_sub_cat_id)->first(); @endphp
                                                @if($menusss!=null) {{$menusss->sub_sub_category}} @else N.A. @endif</td>
                                                           
                                                    </tr>  
                                                      <tr>   
                                                 <th>images</th>
                                                 
                                                 
                                           <td> @php $images=DB::table('product_images')->where('product_id',$value->id)->get(); @endphp
                                                @if($images!=[]) @foreach($images as $imgs) <img src="{{asset($imgs->images)}}" style="height:150px;width:150px; margin:10px;"> @endforeach @else N.A. @endif </td> 
                                           
                                               </tr>
                                                    
                                               <tr>
                                                <th>Price</th>
                                                 
                                                 
                                           <td>  
                                                 {{$value->price}}</td> 
                                           
                                               </tr>
                                                <tr>
                                                
                                                <th>Offer Price</th>
                                                 
                                                 
                                               <td>{{$value->offer_price}}   </td>
                                               </tr>
                                                
                                                <tr>
                                         
                                        <th>Description</th>
                                          
                                        <td> {!!$value->description!!} </td>
                                        </tr>
                                             <tr>
                                         
                                        <th>Recipe/Ingredients</th>
                                          
                                        <td> {{$value->main_details}} </td>
                                        </tr>
                                             
                                        <tr>
                                         
                                          
                                         
                                        </tr>
                                            
                                        
 
                                               
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