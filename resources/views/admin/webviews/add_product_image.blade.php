@extends('admin.layout.admin')
@section('content')
<style>
   .select2{
       width: 670px;
   }
       
       
</style>
<div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Product detail image
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Physical</li>
                                <li class="breadcrumb-item active">Produt image</li>
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
                                <h5>Add Product image</h5>
                            </div>
                            <div class="card-body">
                                <div class="row product-adding">
                                    
                                    <div class="col-xl-7">
                                           
	
                                        <form class="needs-validation add-product-form"action="{{ url('add-product-image-submit') }}" method="POST" enctype="multipart/form-data">
                                            
                                           @csrf()
                                               <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Menus :</label>
                                                    <select   class="form-control col-xl-8 col-sm-7" id="header_name" value="" onchange="load_category(this.value)" name="header_name">
                                                              
                                                             @php //dd($vendors);@endphp
                                                             <option value="" diseble>Select Menu</option>
                                                             @foreach($menus as $r)
                                                             <option value="{{$r->id}}">{{$r->menu_name}}</option>
                                                             @endforeach
                                                             
                                                             
                                                         </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category :</label>
                                                    <select   id="cat_id"  onchange="load_sub_category(this.value)" class="form-control col-xl-8 col-sm-7"  name="cat_id">
                                                               
                                                         </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                               
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product Name :</label>
                                                     <select   class="form-control col-xl-8 col-sm-7" value="" name="product_id" id="product_name"  onchange="load_color(this.value)">
                                                              
                                                         </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                
					                              <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Cover Images:</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id="" name="cover_images" type="file">
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Images:</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id="" name="image[]" type="file" multiple required="">
                                                 
                                            </div>
                                              
                                            </div>
                                            
                                            <div class="offset-xl-3 offset-sm-4">
                                                <button type="submit" class="btn btn-primary" onclick="this.form.submit()">Save</button>
                                                <!--<button type="button" class="btn btn-light">Discard</button>-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>
    </div>   
 </div>
 <script>
   
    function sk(){
         var cat_value= document.getElementById('cat_id').value; 
  console.log(cat_value);
  if(cat_value=='8'){
     document.getElementById('size').style.display="block"; 
       document.getElementById('color').style.display="block"; 
        document.getElementById('quantity').style.display="none"; 
  }
  
  else{
       
       document.getElementById('color').style.display="block"; 
        document.getElementById('size').style.display="none"; 
       document.getElementById('quantity').style.display="none"; 
  }
    
} 
 
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
      document.getElementById('product_name').innerHTML='';
      console.log(id);
      var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("admin/json-response1") }}?cat_id='+id,true);

      xhr.onload = function () {       
      var sub_cat_id = JSON.parse(xhr.responseText);
      console.log(sub_cat_id);
     
     var ot = document.createElement('option');
    ot.innerText = 'Select  Product';
    ot.setAttribute('selected', 'selected');
    document.getElementById('product_name').appendChild(ot);

    for(j=0; j<sub_cat_id.address1.length;j++) {
  //console.log(team.address[i].name);
    var ot = document.createElement('option');
    ot.innerText = sub_cat_id.address1[j].name;
    ot.setAttribute('value',sub_cat_id.address1[j].id);
    document.getElementById('product_name').appendChild(ot);
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
function load_color(id) 
    {
      document.getElementById('color_name').innerHTML='';
      console.log(id);
      var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("admin/json-response1") }}?product_name='+id,true);

      xhr.onload = function () {       
      var color_name = JSON.parse(xhr.responseText);
   console.log(color_name);
     var op = document.createElement('option');
    op.innerText = 'Select  Color';
    op.setAttribute('selected', 'selected');
    document.getElementById('color_name').appendChild(op);

    for(i=0; i<color_name.address.length;i++) {
  //console.log(team.address[i].name);
    var op = document.createElement('option');
    op.innerText = color_name.address[i].color_name;
    op.setAttribute('value',color_name.address[i].id);
    document.getElementById('color_name').appendChild(op);
    }
}
xhr.send();
}


 </script>   
@endsection