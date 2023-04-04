@extends('admin.layout.admin')
@section('content')

<div class="card1">
	<div class="card-header">
		{{ trans('global.create') }}  Products  size
	</div>

				 	<div class="card-body">
	     @if(Auth::user()->id==1)
		<form action="{{ route("productsize.store") }}" method="POST" enctype="multipart/form-data">
		  @else
		  	<form action="{{ url("vendor-addproductsize-submit") }}" method="POST" enctype="multipart/form-data">
	
		  @endif
			{{csrf_field()}}
             
		 
div class="form-group">
						<label>Product Name</label>
						<select name="product_id"  class="form-control"  id="product_name"  onchange="load_color(this.value)" >
						    <option value=""  >Please select</option>
						@foreach($product as $key=>$value)
						
						<option value="{{$value->id}}">{{$value->name}}</option>
						@endforeach
					 
				  
					 </select>
					</div>

                     <div class="form-group">
						<label>Color Name</label>
						<select name="color_id"  id="color_name" class="form-control select2"  >
						 
					 
				  
					 </select>
					 	@if($errors->has('color_name'))
                        <p class="help-block">
                        {{ $errors->first('color_name') }}
						</p>
                    	 @endif 
					</div>

                     

					 
					 
				 
					 <div class="form-group">
						<label>Size</label>
						 <input type="text" name="size" id="size" class="form-control">
                       
					</div>

					<div class="form-group">
						<label>Mrp</label>
					<input type="text" name="mrp" value="{{ old('name', isset($bannerimage) ? $coursecategory->image : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('mrp'))
                        <p class="help-block">
                        {{ $errors->first('mrp') }}
						</p>
                    	 @endif 
					</div>

					<div class="form-group">
						<label>Offer Price</label>
					<input type="text" name="offer_price" value="{{ old('name', isset($bannerimage) ? $coursecategory->image : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('offer_price'))
                        <p class="help-block">
                        {{ $errors->first('offer_price') }}
						</p>
                    	 @endif 
					</div>

					<div class="form-group">
						<label>Stock</label>
					<input type="text" name="stock" value="{{ old('name', isset($bannerimage) ? $coursecategory->image : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('stock'))
                        <p class="help-block">
                        {{ $errors->first('stock') }}
						</p>
                    	 @endif 
					</div>
					 
              


			<input class="btn btn-danger" type="submit" value="Save">
			</div>
		</form>
	</div>
</div>
@endsection
@section('scripts')
@parent
<script>
 

    function load_category(id) 
    {
      document.getElementById('cat_id').innerHTML='';
      console.log(id);
      var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("admin/json-response") }}?header_name='+id,true);

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
      xhr.open('GET','{{ url("admin/json-response") }}?cat_id='+id,true);

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