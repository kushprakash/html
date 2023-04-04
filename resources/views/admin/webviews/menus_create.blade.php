@extends('admin.layout.admin')
@section('content')
<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <div class="page-header-left">
                    <h3>Create Menu
                        <small> Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Menus</li>
                    <li class="breadcrumb-item active">Create Menu</li>
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
                    <h5>Add Menu <span class="pull-right"><a href="{{ url('menus-list') }}"> View Menu List </a></span></h5>
                    
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ url('menus-submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Menu Name</label>
                            <input class="form-control col-md-8" id="validationCustom0" name="menu_name" type="text" required>
                        </div>
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>Image</label>
                            <input class="form-control col-md-8" id="validationCustom0" name="image" required type="file">
                        </div>
                       <!-- <div class="form-group row">
                            <label class="col-xl-3 col-md-4">Status</label>
                            <div class="checkbox checkbox-primary col-xl-9 col-md-8">
                                <input id="checkbox-primary-2" type="checkbox" name="status" data-original-title="" value="1" required>
                                <label for="checkbox-primary-2">Enable the Menu</label>
                            </div>
                        </div>-->
                        <button type="submit" class="btn btn-primary d-block" onclick="this.form.submit()">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

</div>
@endsection