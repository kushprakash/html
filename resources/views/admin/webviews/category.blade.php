@extends('admin.layout.admin')
@section('content')
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Category
                        <small>Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Digital</li>
                    <li class="breadcrumb-item active">Category</li>
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
                    <h5>Digital Products</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Category</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Category</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" action="{{ url('categorys-submit') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Menus * :</label>
                                                    
                                                    <select class="form-control" required  name="header_name" type="text">
                                                         <option value="">Select Your Choice</option>
                                                        @foreach($menus as $r)
                                                        <option value="{{$r->id}}">{{$r->menu_name}}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Category Name * :</label>
                                                    <input class="form-control"   name="category" type="text" required>
                                                </div>
                                                
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Category Image *:</label>
                                                    <input class="form-control" required  name="category_image" type="file">
                                                </div>
                                               <!--  <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Vendor Commission :</label>
                                                    <input class="form-control"   name="vendor_commission" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Commision Type :</label>
                                                    <select class="form-control"   name="com_set" >
                                                        
                                                        <option value="percentage">%</option>
                                                         <option value="amount">amount</option>
                                                        
                                                        </select>
                                                        
                                                </div>-->
                                            </div>
                                        <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" onclick="this.form.submit()">Save</button>
                                      
                                        <!--  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                                    </div>
                                </form>
                             </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class=" table table-bordered table-striped table-hover">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                    <th> Image</th>
                     <th>Menu</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th> <input type="button" class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" title="Switch to inserting"></th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($category as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                      <td> <div style="display:flex; justify-content:center; align-items:center; width:100%; height:100px;"><img src="{{asset($value->cat_img)}}" alt="" style=" box-shadow: none;-webkit:box-shadow:none; max-height:100%; max-width:100%;margin:10px;"></div></td>
                     <td> @php       $menuss=DB::table('header_menu')->where('id',$value->header_name)->first(); @endphp
                     @if($menuss!=null) {{$menuss->menu_name}} @else N.A. @endif</td> 
                      <td> {{$value->category}} </td> 
                    
                     <td> Active </td> 
                    
                    
                     <td> 
                                 <a class="btn btn-xs btn-danger m-1" href="{{ url('categorys-delete/'.$value->id) }}">
                                         <i class="fa fa-trash"></i>
                                    </a>
						 
						 
						  <button class="btn btn-xs btn-info" data-toggle="modal" data-original-title="test" data-target="#exampleModall{{$value->id}}">
                                         <i class="fa fa-edit"></i>
                                    </button>
                                <div class="modal fade" id="exampleModall{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Category</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" action="{{ url('categorysedit-submit') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
											<input type="hidden" name="id" value="{{$value->id}}">
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Menus :</label>
                                                    
                                                    <select class="form-control w-100 mb-2"   name="header_name" type="text">
                                                         <option value=" ">Select Your Choice</option>
                                                        @foreach($menus as $r)
                                                        <option value="{{$r->id}}" @if($r->id==$value->header_name) selected @endif>{{$r->menu_name}}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="mb-1">Category Name * :</label>
                                                    <input class="form-control w-100 mb-2"  value="{{$value->category}}"  name="category" type="text" required>
                                                </div>
                                                
                                                <div class="form-group mb-0">
                                                    <label   class="mb-1">Category Image :</label>
													<img src="{{asset($value->cat_img)}}" class="m-2" style="height:100px; width:100px;">
                                                    <input class="form-control w-100 mb-2"  name="category_image" type="file">
													 <input class="form-control w-100 mb-2"  value="{{$value->cat_img}}" name="category_image" type="hidden">
                                                </div>
                                               <!--  <div class="form-group">
                                                    <label   class="mb-1">Vendor Commission :</label>
                                                    <input class="form-control w-100 mb-2"   name="vendor_commission" type="text" value="{{$value->vendor_commission}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-1">Commision Type :</label>
                                                    <select class="form-control w-100 mb-2" value="{{$value->com_set}}"  name="com_set" >
                                                        
                                                        <option value="percentage" @if($value->com_set=='percentage') selected @endif>%</option>
                                                         <option value="amount" @if($value->com_set=='amount') selected @endif>amount</option>
                                                        
                                                        </select>
                                                        
                                                </div>-->
                                            </div>
                                        <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" onclick="this.form.submit()">Save</button>
                                      
                                        <!--  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                                    </div>
                                </form>
                             </div>
                                    
                                    
                                </div>
                            </div>
                        </div>      
                                  
						 
						 
						 
						 
						 
                                 
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
    </div>
</div>
<!-- Container-fluid Ends-->

</div>
@endsection
 
 