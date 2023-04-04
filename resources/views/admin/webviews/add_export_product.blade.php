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
                                <h3>Add Export Products
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Physical</li>
                                <li class="breadcrumb-item active">Add Product</li>
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
                                <h5>Add Product</h5>
                            </div>
                            <div class="card-body">
                                <div class="row product-adding">
                                    
                                    <div class="col-xl-7">
                                     
	
                                        <form class="needs-validation add-product-form"action="{{ url('add-export-product-submit') }}" method="POST" enctype="multipart/form-data">
                                            
                                           @csrf()
                                            <div class="form">
                                               
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category :</label>
                                                    <select   id="cat_id"  onchange="load_sub_category(this.value)" class="form-control col-xl-8 col-sm-7"  name="cat_id">
                                                            
                                                             <option value="export">Export</option> 
                                                         </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                 
                                                
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product Name :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id=" " type="text" name="name" onclick="sk()" >
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Model Number:</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id=" " type="text" name="modal_number" >
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">HSN Number:</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id=""  name="hsn" type="text" >
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Code :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="" type="text" name="product_code" >
                                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please choose Valid Code.</div>
                                                </div>
                                            </div>
                                            <div class="form"    style=" ">
                                                <div class="form-group row">
                                                    <label for="size" class="col-xl-3 col-sm-4 mb-0">Select Size/Quantity :</label>
                                                    <input name="size" class="form-control digits col-xl-8 col-sm-7" id="size">
                                                 </div>
                                            </div>
                                            <!--<div class="form"  id="quantity" style="display:none;">-->
                                            <!--    <div class="form-group row">-->
                                            <!--        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Select Quantity :</label>-->
                                            <!--        <select name="quantity" class="form-control digits col-xl-8 col-sm-7 select2" id=""  multiple="multiple">-->
                                            <!--            <option value="gm">Gm</option>-->
                                            <!--            <option value="kg">KG</option>-->
                                            <!--            <option value="ml">ML</option>-->
                                            <!--            <option value="l">L</option>-->
                                            <!--        </select>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                             <div class="form"  id="color" style="">
                                                <div class="form-group row">
                                                    <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Color :</label>
                                                      <input class="form-control col-xl-8 col-sm-7" type="text" name="color" >
                                                 </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="stock" type="text" >
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Reviews :</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="review" type="text" >
                                                 
                                            </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Add short Description :</label>
                                                    
                                                        <textarea class="form-control col-xl-8 col-sm-7" id=" " name="main_details"></textarea>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Add Long Description :</label>
                                                     
                                                        <textarea id="editor1" class="form-control col-xl-8 col-sm-7" name="long_description"></textarea>
                                                     
                                                </div>
                                                
                                                 <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Price</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="price" type="text" >
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Offer Price</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="offer_price" type="text">
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Cover Images:</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="cover_image" type="file" multiple  >
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Images:</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="image[]" type="file" multiple  >
                                                 
                                            </div>
                                            </div>
                                            
                                            <div class="offset-xl-3 offset-sm-4">
                                                <button type="submit" class="btn btn-primary">Save</button>
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