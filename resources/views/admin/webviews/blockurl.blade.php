@extends('admin.layout.admin')
@section('content')
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Block Url
                        <small>Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                     
                    <li class="breadcrumb-item active">Block Url</li>
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
                    <h5>Block Url</h5>
                </div>
                <div class="card-body">
                     
                    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class=" table table-bordered table-striped table-hover">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                    <th>Content</th>
                     <th>Status</th>
					 <th>Action</th>
                     
                </tr>
                 </thead>
                <tbody>
                     
                <tr>
                   <?php //dd($exp);?>
                    <td>1 </td>
                      
                      <td> {{$exp->content}} </td> 
                    
					<td> @if($exp->active==0) <h6 style="color:green"> Active </h6>@else <h6 style="color:red">Inactive</h6> @endif </td> 
                    
                    
                     <td> 
                                 
						 
						  <button class="btn btn-xs btn-info" data-toggle="modal" data-original-title="test" data-target="#exampleModall">
                                         <i class="fa fa-edit"></i>
                                    </button>
                                <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Category</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" action="{{ url('block-url-submit') }}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
											 
                                        <div class="form">
                                              <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Content :</label>
                                                    
                                                    <textarea class="form-control w-100 mb-2"   name="content">{{$exp->content}}
												  </textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="mb-1">Status * :</label>
                                                    <select class="form-control w-100 mb-2"  value="{{$exp->active}}"  name="active" type="text" required>
														<option value=""  @if($exp->active=="") selected @endif>Select Your Choice</option>
														<option value="0" @if($exp->active==0) selected @endif>Active</option>
														<option value="1"  @if($exp->active==1) selected @endif>Inactive</option>
														
													</select>
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
                                  
						 
						 
						 
						 
						 
                                 
                            </td>
                   
                </tr>
                
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
 
 