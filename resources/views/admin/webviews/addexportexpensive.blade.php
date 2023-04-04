
@extends('admin.layout.admin')
@section('content')
<div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Create Expensive Detail
                                    <small> Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Expensive Detail</li>
                                <li class="breadcrumb-item active">Expensive Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>Expensive Detail</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                  </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <form class="needs-validation" method="post" action="add-export-expensive-submit">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Expensive</label>
                                                <input class="form-control col-md-7" name="exe_name" id="validationCustom0" type="text" required="">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-md-4">Detal</label>
                                                <input class="datepicker-here form-control digits col-md-7" name="detail" type="text" data-language="en">
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>price</label>
                                                <input class="form-control col-md-7" id="validationCustom1" type="text" name="pay" required="" >
                                                <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                            </div>
                                            
                                            <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>
@endsection