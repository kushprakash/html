@extends('admin.layout.admin')
@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Product List
                            <small>Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Digital</li>
                        <li class="breadcrumb-item active">Product List</li>
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
                        <h5>Product Lists</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class=" table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th>S.No.</th> 

                                        <th>Name</th>
                                        <th>menu</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Sub subCategory</th>
                                        
                                        <th> <input type="button" class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" title="Switch to inserting"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $key=>$value)
                                    <tr>

                                        <td>{{$key+1}} </td>

                                        <td> {{$value->name}} </td>
                                        <td> @php $menus=DB::table('header_menu')->where('id',$value->header_name)->first(); @endphp
                                            @if($menus!=null) {{$menus->menu_name}} @else N.A. @endif</td> 

                                        <td><?php $category_name=DB::table('category')->where('id',$value->cat_id)->first(); ?>
                                                @if($category_name!=null){{$category_name->category}} @else N.A. @endif</td> 
                                        <td> @php $menuss=DB::table('sub_category')->where('id',$value->sub_cat_id)->first(); @endphp
                                                @if($menuss!=null) {{$menuss->sub_category}} @else N.A. @endif</td>
                                        <td> @php $menusss=DB::table('sub_sub_category')->where('id',$value->sub_sub_cat_id)->first(); @endphp
                                                @if($menusss!=null) {{$menusss->sub_sub_category}} @else N.A. @endif</td>
                                        <td>

                                                            <!--                                 
                                                            <a class="  jsgrid-button jsgrid-edit-button  " href="#">
                                                            <i class="fas fa-edit"></i>
                                                            </a> -->
                                                            
                                                            <!-- <a class="btn btn-xs btn-danger" href="#">
                                                            <i class="fas fa-trash"></i>
                                                            </a> -->
                                          
											
											 @if($value->trending==0)
                                      <a class="btn btn-xs btn-success" title=" Trending Unactive"  style="margin:10px;" href="{{ url('product-stat/trending/'.$value->id.'/'.'1') }}">
                                                     Active
                                         </a>
                                      @else
                                      <a class="btn btn-xs btn-danger" title="Tranding Active" style="margin:10px;" href="{{ url('product-stat/trending/'.$value->id.'/'.'0') }}">
                                                   Inactive
                                         </a>
                                         @endif
                                          
                                        
                                                            
                                                 
                                                            <a class="btn btn-xs btn-info"   title="edit" href="{{ url('product/edit/'.$value->id) }}">
                                         <i class="fa fa-edit"></i>
                                    </a>
                                       <a class="btn btn-xs btn-success"  title="view" href="{{ url('product/view/'.$value->id) }}">
                                         <i class="fa fa-eye"></i>
                                    </a>
                              
                                
                                   <a class="btn btn-xs btn-danger" title="delete" href="{{ url('product/delete/'.$value->id) }}">
                                         <i class="fa fa-trash"></i>
                                    </a>
											
								 	
                               
                                       
											
										 
                                       <!--    @if($value->export_product==0)
                                          <a class="btn btn-xs btn-danger" href="{{ url('export-add/'.$value->id) }}">
                                                           Add to Export
                                                            </a> 
                                                            @else
                                                            <a class="btn btn-xs btn-success" href="#">
                                                           Added to Export
                                                            </a> 
                                                            
                                                            @endif-->
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