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
                    <h3>Vendor List
                        <small>Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Vendors</li>
                    <li class="breadcrumb-item active">Vendor List</li>
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
            <h5>Vendor Details</h5>
        </div>
       <div class="box-body  table-responsive"> 
    <table id="example" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Sr. No.</th>
          <th>Authorized Name</th>  
          
          <th>Category</th> 
          <th>Password</th>
          <th>Brand</th>  
          <th>Contact Details</th>   
          <th>Address Details</th> 
          <th>Action</th> 
        </tr>
      </thead>
      <tbody> 
        <?php $count = 1; ?>
        @foreach($vendor as $r)
        @php
          $brand = DB::table('vendor_brands')->where('vendor_id',$r->id)->get(); 
        @endphp
        <tr>
          <td>{{$count++}}</td>
          <td>{{$r->legal_entry_name}} </td>  
          <td><?php  $brand12 = DB::table('category')->where('id',$r->category)->first(); ?> @if($brand12 !=null)  {{$brand12->category}}  @endif</td> 
           <td>{{$r->password}} </td> 
          <td>
            @if($brand != null)
            @foreach($brand as $brands)
              @php
                $brand1 = DB::table('brands')->where('id',$brands->brand)->first(); 
              @endphp
          	  @if($brand1 != null)
              <b>{{$brand1->brand_name}},</b><br>
          	  @endif
            @endforeach
            @endif
          </td> 
          <td>Email: {{$r->email_id}}<br> Mobile Number: {{$r->authorized_contact_no}}</td>  
          <td>Register Address: {{$r->register_address}}<br> Shipping Address: {{$r->shiping_address}}</td>    
          <td>
            
            
            @if($r->status == 1)
                <a href="{{ url('toggle-vendors-status/0/'.$r->id) }}" class="btn btn-danger btn-xs mb-1">Deactivate</a>
            @endif
			  @if($r->status == 0)
                <a href="{{ url('toggle-vendors-status/1/'.$r->id) }}" class="btn btn-success btn-xs mb-1">Activate</a>
            @endif
 
            @if($r->appoved_by_admin == 0) 
                <a href="{{ url('vendor-approve/1/'.$r->id) }}" class="btn btn-warning btn-xs mb-1">Approved Now</a>
            @endif
			    
			  <a href="{{ url('vendor-delete/'.$r->id) }}" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash"></i></a> 
			  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal{{$r->id}}">
 <i class="fa fa-eye"></i>
</button>
			  
			  <div class="modal fade" id="exampleModal{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vendor detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row mb-3">
			<div class="col-md-6 mb-2">
			Authorized Name -: {{$r->legal_entry_name}}
		    </div>
			<div class="col-md-6 mb-2">
			Category -:   <?php  $brand12 = DB::table('category')->where('id',$r->category)->first(); ?> @if($brand12 !=null) {{$brand12->category}}   @endif
         
		    </div>
		   
		   <div class="col-md-6 mb-2">
			Email -: {{$r->email_id}}
		    </div>
		   <div class="col-md-6 mb-2">
			Mobile Number -: {{$r->authorized_contact_no}}
		    </div>
				
		    <div class="col-md-6 mb-2">
			Register Address -: {{$r->register_address}}
		    </div>
				
		    <div class="col-md-6 mb-2">
			Shipping Address -: {{$r->shiping_address}}
		    </div>
				
		    <div class="col-md-6 mb-2">
			State -: {{$r->state}}
		    </div>
		    <div class="col-md-6 mb-2">
			District -: {{$r->district}}
		    </div>
		   <div class="col-md-6 mb-2">
		   PAN Card Number -:<br>
				{{$r->pan_no}}
			    </div>
		    <div class="col-md-6 mb-2">
		   PAN Card image -:<br>
				<img src="{{asset($r->pan_image)}}" style="height:100px; width:100px;">
			    </div>
		    <div class="col-md-6 mb-2">
		   Aadhar Card Number -:<br>
				{{$r->aadhar_no}}
			    </div>
		    <div class="col-md-6 mb-2">
		   Aadhar Card image -:<br>
				<img src="{{asset($r->aadhar_image)}}" style="height:100px; width:100px;">
			    </div>
		    <div class="col-md-6 mb-2">
		   Bank Name -:<br>
				{{$r->bank_name}}
			    </div>
		    <div class="col-md-6 mb-2">
		   Bank Account Number -:<br>
				{{$r->bank_account_number}}
			    </div>
		     <div class="col-md-6 mb-2">
		   IFSC Code -: {{$r->ifsc_code}}

			    </div>
		    <div class="col-md-6 mb-2">
		   Upload cancelled cheque -:<br>
					<img src="{{asset($r->cancelled_cheque)}}" style="height:100px; width:100px;">
				
				 </div>
		    <div class="col-md-6 mb-2">
		  GST Number -: {{$r->gst_no}}

			    </div>
		    <div class="col-md-6 mb-2">
		  GST Certificate-:<br>
					<img src="{{asset($r->gst_certificate)}}" style="height:100px; width:100px;">
				
				 </div>
		   
      </div>
      <div class="modal-footer">
       <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
			  
			  
			  
			  
			  
			  
		 
          </td>
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