@extends('admin.layout.admin')

@section('content')



<div class="card1">

    <div class="card-header">

        {{ trans('global.edit') }} Product Size  And Detail

    </div>



    <div class="card-body">

        <form action="{{ route("productsize.update",[$size->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

			<div class="form-group">
						<label>Product Name</label>
						<select name="product_id"  class="form-control "  id="product_name"   onchange="load_color(this.value)" >
						@foreach($product as $key=>$value)
						
						<option value="{{$value->id}}" @if($size->product_id==$value->id) selected @endif > {{$value->name}}</option>
						@endforeach
					 
				  
					 </select>
					</div>
                            <?php  $productcolor= DB::table('product_color')->where('id',$size->color_id)->first(); ?>
                     <div class="form-group">
						<label>Color Name</label>
						<select name="color_id"  id="color_name"  class="form-control "  >
						    @if($productcolor!=null)
					 	<option value="{{$size->color_id}}" > {{$productcolor->color_name}}</option>
					  @endif
				  
					 </select>
					 	@if($errors->has('color_name'))
                        <p class="help-block">
                        {{ $errors->first('color_name') }}
						</p>
                    	 @endif 
					</div>

                     
				 
					 <div class="form-group">
						<label>Size</label>
						 <select name="size" id="size" class="form-control  " >
                     
                        <option value="XS" @if($size->size=='XS') selected @endif>XS</option>
                         <option value="S" @if($size->size=='S') selected @endif>S</option>
						<option value="M" @if($size->size=='M') selected @endif>M</option>
						<option value="L" @if($size->size=='L') selected @endif>L</option>
						<option value="XL" @if($size->size=='XL') selected @endif>XL</option>
                     
                        </select>
					</div>

					<div class="form-group">
						<label>Mrp</label>
					<input type="text" name="mrp" value="{{ old('name', isset($size) ? $size->price : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('price'))
                        <p class="help-block">
                        {{ $errors->first('price') }}
						</p>
                    	 @endif 
					</div>

					<div class="form-group">
						<label>Offer Price</label>
					<input type="text" name="offer_price" value="{{ old('name', isset($size) ? $size->offer_price : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('offer_price'))
                        <p class="help-block">
                        {{ $errors->first('offer_price') }}
						</p>
                    	 @endif 
					</div>

					<div class="form-group">
						<label>Stock</label>
					<input type="text" name="stock" value="{{ old('name', isset($size) ? $size->stock : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('stock'))
                        <p class="help-block">
                        {{ $errors->first('stock') }}
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