@extends('admin.layout.admin')
@section('content')
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Banner
                        <small>Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Banner</li>
                    <li class="breadcrumb-item active">Banner</li>
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
                    <h5>Banner Images</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Banner Image</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Banner Images</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" action="{{ url('banner-submit') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form">
                                               
                                                <!-- <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Style Text :</label>
                                                    <input class="form-control"   name="style_text" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Offer Text :</label>
                                                    <input class="form-control"   name="offer_text" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Product Name :</label>
                                                    <input class="form-control"   name="product_name" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Price Tittle :</label>
                                                    <input class="form-control"   name="starting_price_tittle" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Price :</label>
                                                    <input class="form-control"   name="price" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Link :</label>
                                                    <input class="form-control"   name="links" type="text">
                                                </div> -->
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Banner Image :</label>
                                                    <input class="form-control" required  name="banner_image" type="file">
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" onclick="this.form.submit()">Save</button>
                                      
                                        <!--  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                                    </div>
                                </form>
                             </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class=" table table-bordered table-striped table-hover">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                    <th> Image</th>
                    <!-- <th>Style Text</th>
                    <th>Offer Text</th>
                    <th>Product Name</th>
                    <th>Price Tittle</th>
                    <th>Price</th> -->
                     
                     
                    <th> <input type="button" class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" title="Switch to inserting"></th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($banner as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                      <td> <div style="display:flex; justify-content:center; align-items:center; width:100%; height:100px;"><img src="{{asset($value->image)}}" alt="" style=" box-shadow: none;-webkit:box-shadow:none; max-height:100%; max-width:100%;margin:10px;"></div></td>
                     
                      <!-- <td> {{$value->style_text}} </td> 
                      <td> {{$value->offer_text}} </td> 
                      <td> {{$value->product_name}} </td> 
                      <td> {{$value->starting_price_tittle}} </td> 
                      <td> {{$value->price}} </td> 
                       -->
                    
                      
                    
                     <td>
                               
                                     
                                
                                 <a class="btn btn-xs btn-danger" href=" {{url('banner-delete/'.$value->id)}}" >
                                       <i class="fa fa-trash"></i>
                                    </a>  
                                
                               
                                    
                            </td>
                   
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

</div>
@endsection
 
 