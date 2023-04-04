@extends('admin.layout.admin')
@section('content')

<style>
	
	.modal-dialog {
  max-width: 700px;
  
}
</style>
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Product Review
                        <small>Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Product Review</li>
                    <li class="breadcrumb-item active">Product Review</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Product Review</h5>
        </div>
       <div class="box-body  table-responsive"> 
    <table id="example" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Sr. No.</th>
          <th>Name</th>  
          
          <th>Email</th> 
          <th>Rating</th>
          <th>Review</th>  
          <th>Product</th>   
          <th>status</th> 
           
        </tr>
      </thead>
      <tbody> 
        <?php $count = 1; ?>
        @foreach($review as $r)
        
        <tr>
          <td>{{$count++}}</td>
          <td>{{$r->name}} </td> 
			<td>{{$r->email}} </td> 
			<td>{{$r->rating}} </td> 
			<td>{{$r->review}} </td> 
          <td><?php  $brand12 = DB::table('products')->where('id',$r->product_id)->first(); ?> @if($brand12 !=null)  {{$brand12->name}}  @endif</td> 
           
          <td>@if($r->status==0) 
			  
			  <a class="btn btn-success btn-xs text-white"> Actived  </a>
			  
			   <a class="btn btn-danger btn-xs text-white" href="{{url('review-status/'.$r->id.'/'.'1')}}"> DeActive  </a>
			  @else
			   <a class="btn btn-success btn-xs text-white" href="{{url('review-status/'.$r->id.'/'.'0')}}">Active </a>
			  <a class="btn btn-danger btn-xs text-white"> DeActive </a>
			  
			  
			  
			  @endif</td> 
			 
            
        </tr>
        @endforeach
      </tbody> 
      
    </table>
  </div>
    </div>
</div>
<!-- Container-fluid Ends-->

</div>
@endsection