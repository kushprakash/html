@extends('admin.layout.admin')
@section('content')

<div class="card1">
	<div class="card-header">
		{{ trans('global.create') }}  Products  Images
	</div>

	<div class="card-body">
		<form action="{{ url("add-export-product-image-submit") }}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
             
		 
					<div class="form-group">
						<label>Product Name</label>
						<select name="product_id"  class="form-control select2"  id="product_name"  onchange="load_color(this.value)" >
						    	 <option value=""  >Please select</option>
						@foreach($product as $key=>$value)
					
						<option value="{{$value->id}}">{{$value->name}}</option>
						@endforeach
					 
				  
					 </select>
					</div>
 

					 
					 
					<div class="form-group">
						<label>Images</label>
					<input type="file" name="image[]" value="{{ old('name', isset($bannerimage) ? $coursecategory->image : '') }}" placehoder="Enter Address" multiple class="form-control" >      
						@if($errors->has('images'))
                        <p class="help-block">
                        {{ $errors->first('images') }}
						</p>
                    	 @endif 
					</div>
					 
              

<div>
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