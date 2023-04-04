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
                                <h3>Edit Products
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Physical</li>
                                <li class="breadcrumb-item active">Edit Product</li>
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
                                <h5>Edit Product</h5>
                              @if(Auth::user()->vendor==10)
                               <a href="{{ url('add-product-image-view') }}" class="pull-right btn btn-success m-5" title="Edit Image"><i class="fa fa-edit"></i></a>
								@else
								 <a href="{{ url('vendor-add-product-image-view') }}" class="pull-right btn btn-success m-5" title="Edit Image"><i class="fa fa-edit"></i></a>
								
								
								@endif
                            </div>
                            <div class="card-body">
                                <div class="row product-adding">
                                    
                                    <div class="col-xl-7">
                                        <form class="needs-validation add-product-form"action="{{ url('edit-product-submit') }}" method="POST" enctype="multipart/form-data">
                                           @csrf()
                                           <input type="hidden" name="id" value="{{$product->id}}">
                                            <div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Menus :</label>
                                                    <select   class="form-control col-xl-8 col-sm-7" id="header_name" value="" onchange="load_category(this.value)" name="header_name">
                                                              
                                                             @php //dd($vendors);@endphp
                                                             <option value="" diseble>Select Menu</option>
                                                            
                                                             @foreach($menus as $r)
                                                             <option value="{{$r->id}}" @if($r->id==$product->header_name) selected @endif >{{$r->menu_name}}</option>
                                                             @endforeach
                                                             
                                                            
                                                         </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category : *</label>
                                                    <select   id="cat_id"  onchange="load_sub_category(this.value)" class="form-control col-xl-8 col-sm-7" required name="cat_id">
                                                        <?php $category=DB::table('category')->where('id',$product->cat_id)->first();?>
                                                        @if($category!=null)
                                                          <option value="{{$category->id}}" @if($category->id==$product->cat_id) selected @endif >{{$category->category}}</option>  
                                                          @endif
                                                         </select>
                                                         
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">SubCategroy : *</label>
                                                    
                                                    	<select type="text" name="sub_cat_id" id="sub_cat_id" placeholder="SubCategory"   onchange="load_sub_sub_category(this.value)" class="form-control col-xl-8 col-sm-7">      
						                                    <?php $subcategory=DB::table('sub_category')->where('id',$product->sub_cat_id)->first();?>
                                                    
						                                   @if($subcategory!=null)
															
                                                          <option value="{{$subcategory->id}}" @if($subcategory->id==$product->sub_cat_id) selected @endif >{{$subcategory->sub_category}}</option>  
                                                          @endif
						                                     </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Sub SubCategory :</label>
                                                 	<select type="text" name="sub_sub_cat_id" id="sub_sub_cat_id" placehoder="Enter Address" class="form-control col-xl-8 col-sm-7"> 
                                                 	 <?php $subsubcategory=DB::table('sub_sub_category')->where('id',$product->sub_sub_cat_id)->first();?>
                                                    
						                                   @if($subsubcategory!=null)
                                                          <option value="{{$subsubcategory->id}}" @if($subcategory->id==$product->sub_cat_id) selected @endif >{{$subcategory->sub_category}}</option>  
                                                          @endif
						                                     </select>   <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                
                                                 
                                                
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product Name : *</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id=" " value="{{$product->name}}" required type="text" name="name" onclick="sk()" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                 
                                            
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Description : *</label>
                                                    
                                                        <textarea class="form-control col-xl-8 col-sm-7" id=" " value="{{$product->main_details}}" required name="main_details">{{$product->main_details}}</textarea>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Value  :  </label>
                                                     
                                                        <textarea id="editor1" class="form-control col-xl-8 col-sm-7" value="{{$product->description}}" name="long_description">{{$product->description}}</textarea>
                                                     
                                                </div>
                                                  <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Describtion Image : * <img src="{{asset($product->describtion_image)}}"  style="width:100px;height:100px;">
                                                    </label>
                                                        <input type="file" class="form-control col-xl-8 col-sm-7" id=" " name="describtion_image"> 
                                                      <input type="hidden" class="form-control col-xl-8 col-sm-7" value="{{$product->describtion_image}}" name="describtion_image"> 
                                                    
                                                </div>
                                                 
                                               <!-- <div class="form" id="size"  style=" ">
                                                <div class="form-group row">
                                                    <label for="" class="col-xl-3 col-sm-4 mb-0">GST: (Percentage) *</label>
                                                    <input name="gst"  value="{{$product->gst}}" class="form-control digits col-xl-8 col-sm-7" required type="number" id="">
                                                        
                                                    
                                                </div>
                                            </div>-->
												<?php $brand=DB::table('sub_product')->orderby('id','desc')->get(); ?>
                                               <div class="form-group mb-3 row">
                                                    
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Sub Product</label>
                                                 	<select type="text" name="sub_product[]" multiple id="sub_product" placehoder="Enter Address" class="form-control col-xl-8 col-sm-7 select2"> 
                                                 	<option value="">Please Select Your Choice</option>
                                                 	@foreach($brand as $bran)
														<?php $sd=explode(",",$product->sub_product);?>
														@if($sd != "")
														@foreach($sd as $key=>$ks)
                                                 	<option value="{{$bran->id}}" @if($bran->id==$ks) selected @endif>{{$bran->product_name}}</option>
														
														@endforeach
														@endif
                                                 	@endforeach 
                                                 	</select>  
												</div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Price</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " value="{{$product->price}}" name="price" type="text"  >
                                                 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-sm-4 mb-0">Offer Price</label>
                                                      
                                                       <input class="form-control col-xl-8 col-sm-7" id=" " value="{{$product->offer_price}}" name="offer_price" type="text" >
                                                 
                                            </div>
                                            
                                               
                                           <!-- <div class="form" id=""  style=" ">
                                                <div class="form-group row">
                                                    <label for="" class="col-xl-3 col-sm-4 mb-0">Shipping Charges Detail</label>
                                                    <input name="shippingdetail"  value="{{$product->shippingdetail}}" class="form-control digits col-xl-8 col-sm-7" type="text" id="">
                                                        
                                                    
                                                </div>
                                            </div>-->
                                            
                                            
                                         
                                                    @if(Auth::user()->id==1)
                                                 <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Select Vendor Name: *</label>
                                                    
                                                         <select id="editor1" class="form-control col-xl-8 col-sm-7" required name="vendor_id">
                                                             @if($vendors!=[])
                                                             @php // dd($vendors);@endphp
                                                             @foreach($vendors as $vendor)
                                                             <option value="{{$vendor->user_id}}" @if($vendor->user_id==$product->vendor_id) selected @endif>{{$vendor->legal_entry_name}}<br>{{$vendor->register_address}}</option>
                                                             @endforeach
                                                             @endif
                                                             
                                                         </select>
                                                 </div>
                                                 
                                                 
                                                   <div class="form-group  row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4">Vendor Commission :</label>
                                                    <input class="form-control col-xl-8 col-sm-7"   name="vendor_commission" value="{{$product->vendor_commission}}" type="text">
                                                </div>
                                                <div class="form-group  row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4">Commision Type :</label>
                                                    <select class="form-control col-xl-8 col-sm-7"  name="com_set" >
                                                        <option value="percentage" @if($product->vendor_commission=='%') selected @endif>%</option>
                                                         <option value="amount" @if($product->vendor_commission=='amount') selected @endif>amount</option>
                                                        
                                                        </select>
                                                        
                                                </div>
                                                 @endif
											
											 
                                            
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