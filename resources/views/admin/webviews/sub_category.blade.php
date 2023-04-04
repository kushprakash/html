@extends('admin.layout.admin')
@section('content')
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Sub Category
                        <small> Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Digital</li>
                    <li class="breadcrumb-item active">Sub Category</li>
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
                    <h5>Digital Sub Category</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Sub Category</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add SubCategory</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <form class="needs-validation" action="{{ url('sub-category-submit') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                             <div class="form">
                                                   <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Menus :</label>
                                                    
                                                    <select class="form-control"   name="header_name"  id="header_name" value="" onchange="load_category(this.value)" type="text">
                                                         <option value=" ">Select Your Choice</option>
                                                        @foreach($menus as $r)
                                                        <option value="{{$r->id}}">{{$r->menu_name}}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Category Name :</label>
                                                      <select type="text" name="category_id" value="" id="cat_id"  onchange="load_sub_category(this.value)" placehoder="Enter Address" class="form-control" >      
						 
						 
						                              </select>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Sub Category Name:</label>
                                                    <input class="form-control" name="sub_category"type="text">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" onclick="this.form.submit()">Save</button>
                                         <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
        <div class="table-responsive">
            <table  id="example" class=" table table-bordered table-striped table-hover">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                    <th>Menu</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Action</th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($subcategory as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                    <td> @php       $menuss=DB::table('header_menu')->where('id',$value->header_name)->first(); @endphp
                     @if($menuss!=null) {{$menuss->menu_name}} @else N.A. @endif</td> 
                    
                      <td><?php $category_name=DB::table('category')->where('id',$value->category_id)->first(); ?> @if($category_name!=null){{$category_name->category}} @else N.A. @endif</td> 

                    <td>{{$value->sub_category}} </td> 
                    
                          <td>
                                 <a class="btn btn-xs btn-danger m-1" href="{{ url('sub-categorys-delete/'.$value->id) }}">
                                         <i class="fa fa-trash"></i>
                                    </a>
							  
							  
							   <button class="btn btn-xs btn-info m-1" data-toggle="modal" data-original-title="test" data-target="#exampleModall{{$value->id}}">
                                         <i class="fa fa-edit"></i>
                                    </button>
                                <div class="modal fade" id="exampleModall{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit SubCategory</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" action="{{ url('sub-categoryedit-submit') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
										 
											<input type="hidden" name="id" value="{{$value->id}}">
                                             <div class="form">
                                                   <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Menus :</label>
                                                    
                                                    <select class="form-control w-100 mb-1"   name="header_name"  id="header_namee" value="" onchange="load_categorys(this.value)" type="text">
                                                         <option value=" ">Select Your Choice</option>
                                                        @foreach($menus as $r)
                                                        <option value="{{$r->id}}" @if($r->id==$value->header_name) selected @endif>{{$r->menu_name}}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Category Name :</label>
													<?php $df=DB::table('category')->where('id',$value->category_id)->where('deleted_at',null)->first();?>
                                                      <select  name="category_id"  id="cat_ide"   placehoder="Enter Address" class="form-control w-100 mb-1" >    @if($df != null)  <option value="{{$df->id}}">{{$df->category}}</option> @endif
						 
						 
						                              </select>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Sub Category Name:</label>
                                                    <input class="form-control w-100 mb-1" i name="sub_category" value="{{$value->sub_category}}"type="text">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" onclick="this.form.submit()">Save</button>
                                         <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
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
<!-- Container-fluid Ends-->

</div>

<script>

 function load_category(id) 
    {
      document.getElementById('cat_id').innerHTML='';
      console.log(id);
      var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("admin/json-response1") }}?header_name='+id,true);

      xhr.onload = function () {       
      var cat_id = JSON.parse(xhr.responseText);
   console.log(cat_id);
     var op = document.createElement('option');
    op.innerText = 'Select  Category';
    op.setAttribute('selected', 'selected');
    document.getElementById('cat_id').appendChild(op);

    for(i=0; i<cat_id.address.length;i++) {
  //console.log(team.address[i].name);
    var op = document.createElement('option');
    op.innerText = cat_id.address[i].category;
    op.setAttribute('value',cat_id.address[i].id);
    document.getElementById('cat_id').appendChild(op);
    }
}
xhr.send();
}
	</script>
	<script>
	function load_categorys(id) 
    {
      document.getElementById('cat_ide').innerHTML='';
      console.log(id);
      var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("admin/json-response1") }}?header_name='+id,true);

      xhr.onload = function () {       
      var cat_id = JSON.parse(xhr.responseText);
   console.log(cat_id);
     var op = document.createElement('option');
    op.innerText = 'Select  Category';
    op.setAttribute('selected', 'selected');
    document.getElementById('cat_ide').appendChild(op);

    for(i=0; i<cat_id.address.length;i++) {
  //console.log(team.address[i].name);
    var op = document.createElement('option');
    op.innerText = cat_id.address[i].category;
    op.setAttribute('value',cat_id.address[i].id);
    document.getElementById('cat_ide').appendChild(op);
    }
}
xhr.send();
}

</script>
	<script>
function load_sub_category(id) 
    {
      document.getElementById('sub_cat_id').innerHTML='';
      console.log(id);
      var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("admin/json-response1") }}?cat_id='+id,true);

      xhr.onload = function () {       
      var sub_cat_id = JSON.parse(xhr.responseText);
   console.log(sub_cat_id);
     var op = document.createElement('option');
    op.innerText = 'Select  Sub Category';
    op.setAttribute('selected', 'selected');
    document.getElementById('sub_cat_id').appendChild(op);

    for(i=0; i<sub_cat_id.address.length;i++) {
  //console.log(team.address[i].name);
    var op = document.createElement('option');
    op.innerText = sub_cat_id.address[i].sub_category;
    op.setAttribute('value',sub_cat_id.address[i].id);
    document.getElementById('sub_cat_id').appendChild(op);
    }
}
xhr.send();
}
function load_sub_sub_category(id) 
    {
      document.getElementById('sub_sub_cat_id').innerHTML='';
      console.log(id);
      var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("admin/json-response1") }}?sub_cat_id='+id,true);

      xhr.onload = function () {       
      var sub_sub_cat_id = JSON.parse(xhr.responseText);
   console.log(sub_sub_cat_id);
     var op = document.createElement('option');
    op.innerText = 'Select  Sub SubCategory';
    op.setAttribute('selected', 'selected');
    document.getElementById('sub_sub_cat_id').appendChild(op);

    for(i=0; i<sub_sub_cat_id.address.length;i++) {
  //console.log(team.address[i].name);
    var op = document.createElement('option');
    op.innerText = sub_sub_cat_id.address[i].sub_sub_category;
    op.setAttribute('value',sub_sub_cat_id.address[i].id);
    document.getElementById('sub_sub_cat_id').appendChild(op);
    }
}
xhr.send();
}
 </script>
@endsection
 