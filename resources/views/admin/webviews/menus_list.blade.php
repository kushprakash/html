@extends('admin.layout.admin')
@section('content')
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Menu Lists
                        <small> Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Menus</li>
                    <li class="breadcrumb-item active">Menu Lists</li>
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
                    <h5>Menu Lists <span class="pull-right"><a href="{{ url('menus-create') }}" class="btn btn-xs btn-success">  Create Menu </a></span></h5>
                </div>
                  <div class="card-body">
        <div class="table-responsive">
            <table id="example" class=" table table-bordered table-striped table-hover">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                     <th>Image</th>
                    <th>Name</th>
                    
                    <th> <input type="button" class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" title="Switch to inserting"></th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($menus as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                     <td> @if($value->images!=null)<div style="display:flex; justify-content:center; align-items:center; width:100%; height:100px;"><img src="{{asset($value->images)}}" alt="" style=" box-shadow: none;-webkit:box-shadow:none; max-height:100%; max-width:100%;margin:10px;"></div> @else N.A. @endif</td>
                   
                   
                      <td> {{$value->menu_name}} </td> 
                    
                     
                    
                     <td>
                                      
                               
                                     
                                        <a  href="{{ url('menus-delete/'.$value->id) }}" class="btn btn-xs btn-danger">
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
<!-- Container-fluid Ends-->

</div>
@endsection