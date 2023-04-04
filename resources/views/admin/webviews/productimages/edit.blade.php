@extends('admin.layout.admin')

@section('content')



<div class="card1">

    <div class="card-header">

        {{ trans('global.edit') }} Product

    </div>



    <div class="card-body">

        <form action="{{ url("productsimages/update",[$images->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

			<div class="form-group">
						<label>Product Name</label>
						<select name="name"  class="form-control select2"  id="product_name"   onchange="load_color(this.value)" >
						@foreach($product as $key=>$value)
						
						<option value="{{$value->id}}" @if($images->product_id==$value->id) selected @endif > {{$value->name}}</option>
						@endforeach
					 
				  
					 </select>
					</div>

                      
                     

					 
					 
					<div class="form-group">
						<label>Images</label>
							<br>
						<br>
						<img src="{{asset($images->images)}}" height="100" width="100">
						
						<br>
					 
						
						
					<input type="file" name="image" value="" placehoder="Enter Address" class="form-control" >      
					<input type="hidden" name="image" value="{{$images->images}}" placehoder="Enter Address" multiple class="form-control" >      
				
					
						@if($errors->has('images'))
                        <p class="help-block">
                        {{ $errors->first('images') }}
						</p>
                    	 @endif 
					</div>
					 

            <div>

                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">

            </div>

        </form>

    </div>

</div>
<script>
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