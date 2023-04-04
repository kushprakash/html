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
                                <h3>Add Products
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
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
                                          @if(Auth::user()->vendor==10)
	
                                        <form class="needs-validation add-product-form"action="{{ url('add-product-submit') }}" method="POST" enctype="multipart/form-data">
                                            @else
                                             <form class="needs-validation add-product-form"action="{{ url('vendor-add-product-submit') }}" method="POST" enctype="multipart/form-data">
                                      
                                            @endif
                                           @csrf()
                                            <div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Menus :</label>
                                                    <select   class="form-control col-xl-8 col-sm-7" id="header_name"  value=""   onchange="load_category(this.value)" name="header_name" required>
                                                              
                                                             @php //dd($vendors);@endphp
                                                             <option value="" diseble>Select Menu</option>
                                                             @foreach($menus as $r)
                                                             <option value="{{$r->id}}">{{$r->menu_name}}</option>
                                                             @endforeach
                                                             
                                                             
                                                         </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category : *</label>
                                                    <select   id="cat_id"  onchange="load_sub_category(this.value)" class="form-control col-xl-8 col-sm-7"   name="cat_id">
                                                               
                                                         </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">SubCategroy : *</label>
                                                    
                                                    	<select type="text" name="sub_cat_id" id="sub_cat_id" placeholder="SubCategory"   onchange="load_sub_sub_category(this.value)" class="form-control col-xl-8 col-sm-7">      
						                                     </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Sub SubCategory :</label>
                                                 	<select type="text" name="sub_sub_cat_id" id="sub_sub_cat_id" placehoder="Enter Address" class="form-control col-xl-8 col-sm-7">      
						                                     </select>   <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <?php $brand=DB::table('sub_product')->orderby('id','desc')->get(); ?>
                                               <div class="form-group mb-3 row">
                                                    
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Sub Product</label>
                                                 	<select type="text" name="sub_product[]" multiple id="sub_product" placehoder="Enter Address" class="form-control col-xl-8 col-sm-7  select2" style="height:40px;"> 
                                                  	@foreach($brand as $bran)
                                                 	<option value="{{$bran->id}}">{{$bran->product_name}}</option>
                                                 	@endforeach 
                                                 	</select>   
						                            <div class="valid-feedback">Looks good!</div>
                                                </div> 
                                                
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product Name : *</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id=" "  type="text" name="name" onclick="sk()">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <!-- <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Model Number:</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id=" " type="text" name="modal_number"  >
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">HSN Number:</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id=""  name="hsn" type="text">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Code : *</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="" type="text" name="product_code">
                                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please choose Valid Code.</div>
                                                </div> -->
                                            </div>
                                            
                                            <div class="form" id=""  style=" ">
                                                <!-- <div class="form-group row">
                                                    <label for="" class="col-xl-3 col-sm-4 mb-0">Select Size :</label>
                                                    <input name="size" class="form-control digits col-xl-8 col-sm-7" id="">
                                                        
                                                    
                                                </div> -->
                                            </div>
                                             
                                          <!--   <div class="form"    style=" ">
                                                <div class="form-group row">
                                                    <label for="" class="col-xl-3 col-sm-4 mb-0">GST: (Percentage) *</label>
                                                    <input name="gst" class="form-control digits col-xl-8 col-sm-7" type="number" id="" >
                                                        
                                                    
                                                </div>
                                            </div>-->
                                            
                                            
                                              <!-- <div class="form"    style=" ">
                                                <div class="form-group row">
                                                    <label for="" class="col-xl-3 col-sm-4 mb-0">Shipping Charges:(Amount)</label>
                                                    <input name="shipping_charges" class="form-control digits col-xl-8 col-sm-7" type="number" id="">
                                                        
                                                    
                                                </div>
                                            </div> -->
                                             <!-- <div class="form"    style=" ">
                                                <div class="form-group row">
                                                    <label for="" class="col-xl-3 col-sm-4 mb-0">Shipping Charges Detail</label>
                                                    <input name="shippingdetail" class="form-control digits col-xl-8 col-sm-7" type="text" id="">
                                                        
                                                    
                                                </div>
                                            </div>
                                            -->
                                            
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
                                             <!-- <div class="form"  id="color" style="">
                                                <div class="form-group row">
                                                    <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Color :</label>
                                                      <input class="form-control col-xl-8 col-sm-7" type="text" name="color"  >
                                                 </div>
                                            </div> -->
                                            <!-- <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Total Products : *</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="stock" type="number">
                                                 
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Total Products detail : *</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" "  name="total_detail" type="text">
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Reviews :</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="review" type="number" >
                                                 
                                            </div> -->
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Description : *</label>
                                                    
                                                        <textarea class="form-control col-xl-8 col-sm-7" id=" " name="main_details" ></textarea>
                                                    
                                                </div>
                                            <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Value </label>
                                                     
                                                        <textarea id="editor1" class="form-control col-xl-8 col-sm-7" name="long_description"></textarea>
                                                     
                                                </div> 
                                                 <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Description Image : *</label>
                                                    
                                                        <input type="file" class="form-control col-xl-8 col-sm-7" id=" "  name="describtion_image"> 
                                                    
                                                </div>
                                                 
                                                   @if(Auth::user()->vendor==10)
	
                                                <!-- <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Select Vendor Name : *</label>
                                                    
                                                         <select id="editor1" class="form-control col-xl-8 col-sm-7"   name="vendor_id">
                                                             <option value="">Select Your Choice</option>
                                                             @if($vendors!=[])
                                                             @php //dd($vendors);@endphp
                                                             @foreach($vendors as $vendor)
                                                             <option value="{{$vendor->user_id}}"> {{$vendor->legal_entry_name}}<br><br>{{$vendor->register_address}}<br></option>
                                                             @endforeach
                                                             @endif
                                                             
                                                         </select>
                                                 </div>
                                                 <div class="form-group  row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4">Vendor Commission :</label>
                                                    <input class="form-control col-xl-8 col-sm-7"   name="vendor_commission" type="text">
                                                </div>
                                                <div class="form-group  row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4">Commision Type :</label>
                                                    <select class="form-control col-xl-8 col-sm-7"  name="com_set" >
                                                        <option value="percentage">%</option>
                                                         <option value="amount">amount</option>
                                                        
                                                        </select>
                                                        
                                                </div>-->
                                                 @endif
                                                  
                                                 <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Price</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="price" type="text"  >
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Offer Price</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="offer_price" type="text" >
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Cover Images: *</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" "  name="cover_image" type="file" multiple>
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Images: *</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="image[]" type="file" multiple >
                                                 
                                            </div>
									        <!-- <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Product Video *</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " name="product_video" type="file">
                                                 
                                            </div> -->
                                            
                                            
                                            <div class="offset-xl-3 offset-sm-4">
                                                <button type="submit" onclick="this.form.submit()" class="btn btn-primary">Save</button>
                                                <!--<button type="button" class="btn btn-light">Discard</button>-->
                                            </div>
                                       
											 
                                    </div>
                                </div>
										 </form>
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