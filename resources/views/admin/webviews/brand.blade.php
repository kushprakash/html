@extends('admin.layout.admin')
@section('content')
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Brands
                        <small> Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Digital</li>
                    <li class="breadcrumb-item active">Brands</li>
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
                    <h5>Brands</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add brands</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Brand</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                    <form class="needs-validation" action="{{ url('brands-submit') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                             <div class="form">
                                                   <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Menus :</label>
                                                    
                                                    <select class="form-control"   name="header_name" type="text" id="header_name" value="" onchange="load_category(this.value)">
                                                          <option value=" ">Select Your Choice</option>
                                                        @foreach($menus as $r)
                                                        <option value="{{$r->id}}">{{$r->menu_name}}</option>
                                                        @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Category Name :</label>
                                                      <select   name="category_id" value=""  id="cat_id"  onchange="load_sub_category(this.value)" placehoder="Enter Address" class="form-control" >      
						 
					 
					                                  </select>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Sub Category Name:</label>
                                                    <select   name="sub_category" value="" id="sub_cat_id" placeholder="SubCategory"   onchange="load_sub_sub_category(this.value)"  class="form-control" >      
						 
					 
						                          </select>
                                                </div>
                                                 <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Sub subCategory Name:</label>
                                                    <select  class="form-control" name="sub_sub_category" id="sub_sub_cat_id" type="text">
                                                    </select>        
                                                </div>
                                                 <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Brands:</label>
                                                    <input class="form-control" name="brands"type="text">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">image:</label>
                                                    <input class="form-control" name="image"type="file">
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
                    <th>Sub  Subcategory</th>
                    <th>brands</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($brand as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                    <td> @php       $menuss=DB::table('header_menu')->where('id',$value->header_name)->first(); @endphp
                     @if($menuss!=null) {{$menuss->menu_name}} @else N.A. @endif</td> 
                    
                      <td><?php $category_name=DB::table('category')->where('id',$value->category)->first(); ?> @if($category_name!=null){{$category_name->category}} @else N.A. @endif</td> 
                         <td> @php       $menuss=DB::table('sub_category')->where('id',$value->subcategory)->first(); @endphp
                     @if($menuss!=null) {{$menuss->sub_category}} @else N.A. @endif</td>
                    <td>
                        @php       $menusss=DB::table('sub_sub_category')->where('id',$value->sub_subcategory)->first(); @endphp
                     @if($menusss!=null) <?php //dd($menusss) ?>{{$menusss->sub_sub_category}} @else N.A. @endif
                         </td> 
                    
                         <td>
                          {{$value->brands}}
                         </td>
                          <td>
                          <img src="{{asset($value->images)}}" style="width:100px;height:100px;">
                         </td>
                           <td> 
                                 <a class="btn btn-xs btn-danger" href="{{ url('brand-delete/'.$value->id) }}">
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
 