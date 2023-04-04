@extends('admin.layout.admin')

@section('content')



<div class="card1">

    <div class="card-header">

        {{ trans('global.edit') }} Product Color

    </div>



    <div class="card-body">

        <form action="{{ route("productscolor.update",[$productcolor->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

					<div class="form-group">
						<label>Product Name</label>
						<select name="product_id"   class="form-control select2" >
						@foreach($product as $key=>$value)
						
						<option value="{{$value->id}}" @if($productcolor->product_id==$value->id) selected @endif > {{$value->name}}</option>
						@endforeach
					 
				  
					 </select>
					</div>

                     <div class="form-group">
						<label>Color Name</label>
					<input type="text" name="color_name" value="{{ old('name', isset($productcolor) ? $productcolor->color_name : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('color_name'))
                        <p class="help-block">
                        {{ $errors->first('color_name') }}
						</p>
                    	 @endif 
					</div>

                    

            <div>

                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">

            </div>

        </form>

    </div>

</div>



@endsection