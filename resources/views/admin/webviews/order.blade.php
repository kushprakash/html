@extends('admin.layout.admin') @section('content') <style>
  .modal-dialog {
    max-width: 600px;
    margin: 1.75rem auto;
  }
</style>
<div class="page-body">
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6">
          <div class="page-header-left">
            <h3>Orders <small> Admin panel</small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item">
              <a href="#">
                <i data-feather="home"></i>
              </a>
            </li>
            <li class="breadcrumb-item">Sales</li>
            <li class="breadcrumb-item active">Orders</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <form action="{{url('report-search-order')}}" method="post"> @csrf <div class="row mb-4">
        <div class="col-lg-4">
          <label> Email Id</label>
          <select name="emails" class="form-control">
            <option value="" @if($emailsd=="" ) selected @endif>Select Your Choice</option> <?php $user=DB::table('users')->where('vendor',1)->orderby('id','desc')->get()?> @if($user != "[]") @foreach($user as $key=>$r) <option value="{{$r->id}}" @if($emailsd==$r->id) selected @endif>{{$r->email}}</option> @endforeach @endif
          </select>
        </div>
        <div class="col-lg-3">
          <label> Start Date</label>
          <input type="date" name="start_date" class="form-control" value="{{$start_date}}" required>
        </div>
        <div class="col-lg-3">
          <label> End Date</label>
          <input type="date" name="end_date" class="form-control" value="{{$end_date}}" required>
        </div>
        <div class="col-lg-1 ">
          <lable class=" " style="opacity:0"> Email Id</lable>
          <button class="btn btn-info btn-xs mt-3">Search</button>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="col-sm-12">
        <div class="card"> <?php $dak=0;?> <div class="card-header">
            <h5>Manage Order</h5>
          </div>
          <div class=" table-responsive p-3">
             <table class="table table-bordernone">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Order</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Sub Product Price</th>
                  <th>Rewards</th>
                  <th>Amount Pay</th>
                  <th>Total </th>
                  <th>Status</th>
                  <th>Payment Image</th>
                  <th>Date</th>
                  <th>Remark</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $order_detail =  DB::table('order_detail')->where('payment_status','paid')
              ->orderby('id','desc')
              ->paginate(50);
              ?>
              <tbody> @foreach($order_detail as $key=>$value) <tr>
                  <td>{{$key+1}} </td>
                  <td>
                    <a href="{{url('order-invoice-admin/'.$value->payment_request_id)}}" class="" style="text-align:right;color:black"> #Games-{{$value->payment_request_id}} </a>
                    <i class="fa fa-eye" data-toggle="modal" data-target="#exampleModalLong{{$value->payment_request_id}}" style="color:gray;"></i>
                    <div class="modal fade" id="exampleModalLong{{$value->payment_request_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Order #Games-{{$value->payment_request_id}} @if($value->order_status==6) <button class="btn btn-danger">Cancelled</button> @endif @if($value->order_status!=6) @if($value->delivery==1) <button class="btn btn-info">Food preparation</button> @endif @if($value->delivery==4) <button class="btn btn-info">Order Accept</button> @endif @if($value->delivery==2) <option value="2"> Food is ready & Pick-up </option> @endif @if($value->delivery==3) <a href="#" class="btn btn-success">Delivered</a> @endif @endif </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container bootstrap snippets bootdey">
                              <div class="panel panel-default">
                                <div class="panel-body">
                                  <div class="row" style="border-top:5px solid black;"> <?php  
				$order = DB::table('order_detail')->where('order_id',$value->order_id)->where('user_id',$value->user_id)->first();
				$orderd = DB::table('sub_order')->where('order_id',$value->order_id)->where('user_id',$value->user_id)->get();
				$userDetail=DB::table('user_address')->where('id',$order->address_id)->first();
				?> <div class="col-md-6 col-sm-6 text-left mt-3">
                                      <h4>Billing Detail</h4> @if($userDetail != null) <?php  
				$userDetailem=DB::table('users')->where('id',$userDetail->user_id)->first();
				?> <h6>
                                        <strong>Email </strong>
                                        <br>@if($userDetailem != null) {{@$userDetailem->email}} @endif <br>
                                      </h6>
                                      <br>
                                      <br> @endif
                                    </div>
                                  </div>
                                  <div class="table-responsive " style="border-top:5px solid black;">
                                    <table class="table table-condensed nomargin">
                                      <thead>
                                        <tr>
                                          <th>Product</th>
                                          <th>Sub Product Price / Quantity</th>
                                          <th>Total</th>
                                          <th>Total Amount </th>
                                        </tr>
                                      </thead> 
                                      <?php   
                                        $total=00;
										$subtotal=00;
										$toda=00;
										$totall=00;
										$totals =00;
										$sa=0;
										$countd=0;
										$pris=0;
										$sk=[];
										$skms=0;
										$samamv=0;
										?>
					 <tbody> @if($orderd != "[]") @foreach($orderd as $key=>$item) <tr>
                      <td>@php $productsize=DB::table('product_size')->where('id',$item->size_id)->first(); $productname=DB::table('products')->where('id',$item->product_id)->first(); @endphp @php $productcolor=DB::table('product_color')->where('id',$item->color_id)->first(); @endphp <div>
                          <strong>{{@$productname->name}}</strong> 
                      <?php 
								$sa=0;
								$sama=0;
								$sakdla=[];
								$damsa=DB::table('sub_order')
								->where('order_id',$item->order_id)
								->where('product_id',$item->product_id)
								->where('user_id',$item->user_id)
								->first();
								?> @if($damsa != null) <?php
								 	$esx=explode(",",$damsa->sub_product);
								 	$countmk=0;
								 	$samam=0;
								?> @if($esx != null) @foreach($esx as $key=>$dam) <?php 
								$brandsk=DB::table('sub_product')->where('product_name',$dam)->first();
								 ?> @if($brandsk != null) <strong> <?php echo($brandsk->product_name); ?> </strong> <?php 
									$sakdla[]=$brandsk->product_name
									 ?> <?php 
									 $samam += $brandsk->price;
									 $sama +=$brandsk->price;
									?> @endif <?php 
									$countmk++;
									?> @endforeach @endif @endif
                                            </div> <?php 
								$samamv +=$samam;
								$sk[]=@$productname->name.' '.$item->sub_product;?> <?php 
								$skms+=@$item->quantity*@$productname->offer_price+$samam;
								?> </td>
                                          <td>{{$sama}} / {{@$item->quantity}} </td>
                                          <td>Rs ₹{{@$productname->offer_price}}</td>
                                          <td>Rs ₹{{@$item->quantity*@$productname->offer_price+$sama}}</td>
                                        </tr> <?php $countd++; ?> @endforeach @endif </tbody>
                                    </table>
                                    
                                  </div>
                                  <div class="pagination">
                                  	{!! $order_detail->links() !!}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td> <?php $sa=implode(",",$sk);
						echo($sa);?> <br>
                  </td>
                  <td>{{$skms-$samamv}}</td>
                  <td>{{$samamv}}</td>
                  <td>{{$value->wallet}} </td>
                  <td>{{$value->total_amount-$value->wallet}} </td>
                  <td> @if($value->total_amount != null) {{$value->total_amount}} @else <?php $ex=explode(",",$value->price);
							 $qun=explode(",",$value->quantity);

							 ?> @foreach($ex as $key=>$r) <?php    $dak += $r*$qun[$key]; ?> @endforeach <?php $das= $dak; ?> {{$das}} @endif </td>
                  <td> 
                  	<?php $dsa=DB::table('order_history')->where('order_id',$value->order_id)->get()?> @if($dsa != "[]") @foreach($dsa as $key=>$sr) @if($sr->status==6) Cancelled <strong> ( {{$sr->created_at}} ) </strong>
                    <br> @endif @if($sr->status!=6) @if($sr->status==1) Food preparation <strong> ( {{$sr->created_at}} ) </strong>
                    <br> @endif @if($sr->status==2) Food is ready & Pick-up
                    <!--Your food is ready. Head on over to the Tuck Shop counter & collect it soon!-->
                    <strong> ( {{$sr->created_at}} ) </strong>
                    <br> @endif @if($sr->status==3) Delivered <strong> ( {{$sr->created_at}} ) </strong>
                    <br> @endif @if($sr->status==4) Order Accept <strong> ( {{$sr->created_at}} ) </strong>
                    <br> @endif @endif @endforeach @endif
                  </td>
                  <td>
                    <a href="{{asset($value->imgorde)}}" class="" style="text-align:right;color:black"> @if($value->imgorde != null) <img src="{{asset($value->imgorde)}}" style="height:100px;width:100px;"> @endif </a>
                  </td>
                  <td> {{$value->created_at}} </td>
                  <td>{{$value->remarksk}}</td>
                  <td> <?php $dsa=DB::table('order_history')->where('order_id',$value->order_id)->where('status',6)->first();?> @if($dsa == null) @if($value->order_status=="6") @endif <?php //echo($item->order_status);?> @if($value->order_status=="3") @endif @if($value->order_status=="4") <form action="{{url('order-process/'.$value->order_id)}}" id="delivered" method="get">
                      <select name="valu" class="form-control" required>
                        <option value=""> select Your Choice</option> <?php $dsaord=DB::table('order_history')->where('order_id',$value->order_id)->where('status',4)->first();?> @if($dsaord == null) <option value="4">Order Accept</option> @endif <?php $dsaopri=DB::table('order_history')->where('order_id',$value->order_id)->where('status',1)->first();?> @if($dsaopri== null) <option value="1">Food preparation</option> @endif <?php  $dsaopick=DB::table('order_history')->where('order_id',$value->order_id)->where('status',2)->first();?> @if($dsaopick== null) <option value="2"> Food is ready & Pick-up
                          <!--Your food is ready. Head on over to the Tuck Shop counter & collect it soon!-->
                        </option> @endif <?php $dsaodie=DB::table('order_history')->where('order_id',$value->order_id)->where('status',3)->first();?> @if($dsaodie== null) <option value="3">Delivered </option> @endif
                      </select>
                      <input type="text" class="mt-2" name="delivery_time" placeholder="Enter a value in min" required>
                      <button type="submit" class="btn btn-info btn-xs mt-2"> Save </button>
                    </form> @endif @if($value->order_status=="1") <form action="{{url('order-process/'.$value->order_id)}}" id="delivered" method="get">
                      <select name="valu" class="form-control" onchange="this.form.submit()">
                        <option value=""> select Your Choice</option> <?php $dsaord=DB::table('order_history')->where('order_id',$value->order_id)->where('status',4)->first();?> @if($dsaord == null) <option value="4">Order Accept</option> @endif <?php $dsaopri=DB::table('order_history')->where('order_id',$value->order_id)->where('status',1)->first();?> @if($dsaopri== null) <option value="1">Food preparation</option> @endif <?php  $dsaopick=DB::table('order_history')->where('order_id',$value->order_id)->where('status',2)->first();?> @if($dsaopick== null) <option value="2"> Food is ready & Pick-up
                          <!--Your food is ready. Head on over to the Tuck Shop counter & collect it soon!-->
                        </option> @endif <?php $dsaodie=DB::table('order_history')->where('order_id',$value->order_id)->where('status',3)->first();?> @if($dsaodie== null) <option value="3">Delivered </option> @endif
                      </select>
                    </form> @endif @if($value->order_status=="2") <form action="{{url('order-process/'.$value->order_id)}}" id="delivered" method="get">
                      <select name="valu" class="form-control" onchange="this.form.submit()">
                        <option value=""> select Your Choice</option> <?php $dsaord=DB::table('order_history')->where('order_id',$value->order_id)->where('status',4)->first();?> @if($dsaord == null) <option value="4">Order Accept</option> @endif <?php $dsaopri=DB::table('order_history')->where('order_id',$value->order_id)->where('status',1)->first();?> @if($dsaopri== null) <option value="1">Food preparation</option> @endif <?php  $dsaopick=DB::table('order_history')->where('order_id',$value->order_id)->where('status',2)->first();?> @if($dsaopick== null) <option value="2"> Food is ready & Pick-up
                          <!--Your food is ready. Head on over to the Tuck Shop counter & collect it soon!-->
                        </option> @endif <?php $dsaodie=DB::table('order_history')->where('order_id',$value->order_id)->where('status',3)->first();?> @if($dsaodie== null) <option value="3">Delivered </option> @endif
                      </select>
                    </form> @endif @if($value->order_status=="") <form action="{{url('order-process/'.$value->order_id)}}" id="delivered" method="get">
                      <select name="valu" class="form-control" onchange="this.form.submit()">
                        <option value=""> select Your Choice</option> <?php $dsaord=DB::table('order_history')->where('order_id',$value->order_id)->where('status',4)->first();?> @if($dsaord == null) <option value="4">Order Accept</option> @endif <?php $dsaopri=DB::table('order_history')->where('order_id',$value->order_id)->where('status',1)->first();?> @if($dsaopri== null) <option value="1">Food preparation</option> @endif <?php  $dsaopick=DB::table('order_history')->where('order_id',$value->order_id)->where('status',2)->first();?> @if($dsaopick== null) <option value="2"> Food is ready & Pick-up
                          <!--Your food is ready. Head on over to the Tuck Shop counter & collect it soon!-->
                        </option> @endif <?php $dsaodie=DB::table('order_history')->where('order_id',$value->order_id)->where('status',3)->first();?> @if($dsaodie== null) <option value="3">Delivered </option> @endif
                      </select>
                    </form> @endif @endif </td>
                </tr> @endforeach </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Script Local -->
<!-- <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script> -->
<script>
  function dispactched() {
    let text;
    if (confirm("Are you sure you want to dispactched!") == true) {
      document.getElementById("dispactched").submit();
    } else {}
  }

  function delivered() {
    let text;
    if (confirm("Are you sure you want to delivered!") == true) {
      document.getElementById("delivered").submit();
    } else {}
  }
</script> @endsection