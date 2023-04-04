@extends('ui.layout.main_ui')
@section('content')

  <!-- main banner slider start -->
    <style>
        .my-profile {
    padding-bottom: 80px;
}
.inner-page {
    padding-top: 80px;
}
.my-profile .information-block .information-block-title {
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    padding-bottom: 10px;
    margin-bottom: 30px;
}
.my-profile .my-image {
    margin-bottom: 30px;
    margin-top: 18px;
}
*, ::after, ::before {
    box-sizing: border-box;
}
.my-profile .my-image .img-wrapper {
    flex: 0 0 60px;
}
.my-profile .my-image .my-info {
    flex: 0 0 calc(100% - 60px);
    padding-left: 20px;
    align-self: center;
}
.my-profile .my-image .my-info h4 {
    font-size: 18px;
    font-weight: 600;
    margin: 0;
}
.my-profile .my-image .my-info h4 span {
    font-size: 14px;
    font-weight: 500;
    display: block;
}
.my-profile .nav {
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    border-top: 1px solid rgba(0, 0, 0, 0.2);
}

.flex-column {
    -ms-flex-direction: column !important;
    flex-direction: column !important;
}
.my-profile .nav .nav-link.active::before {
    position: absolute;
    content: "";
    top: 0;
    right: -30px;
    height: 100%;
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-left: 30px solid #17a8b5;
    border-right: 0px solid transparent;
}
 
 
.my-profile .nav .nav-link:not(:last-child) {
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}
.my-profile .nav .nav-link {
    background: #fff;
    color: #000;
    font-weight: 600;
    padding: 15px 15px;
    border-radius: 0;
    border-right: 1px solid rgba(0, 0, 0, 0.2);
    border-left: 1px solid rgba(0, 0, 0, 0.2);
    position: relative;
}
    </style>
    <!-- main banner slider end -->

    <!-- About Section start -->
    <section class="my-profile inner-page">
        <div class="section-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="my-image">
                            <div class="d-flex">
                                <div class="img-wrapper">
                                    <img src="https://a1fonz.in/assets/images/profile-image/profile-pic-male_2fd3e8.svg" alt="">
                                </div>
                                <div class="my-info">
                                    <h4>
                                        <span>Hello,</span>
                                        {{Auth::user()->name}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                          
                        <div class="nav flex-column nav-pills" id="v-pills-tab">
                            <a class="nav-link active" data-toggle="pill" href="#v-pills-profile"
                                aria-selected="true" style="background:#17a8b5;">My Profile</a>
                            <!--<a class="nav-link" data-toggle="pill" href="#v-pills-addresses"-->
                            <!--    aria-selected="false">Manage Addresses</a>-->
                            <!--<a class="nav-link" href=" ">Training Fee Detail</a>-->
							 <!--<a class="nav-link" href="{{url('passwordreset/'.Auth::user()->id)}}">Create New Password</a> -->
         
                            <a class="nav-link" href="{{url('my-order')}}">My Orders</a>
                            <a class="nav-link"  href="{{url('logout1')}}">Log Out</a>
                                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile">
                                <div class="information-block">
                                    <div
                                        class="information-block-title d-flex flex-wrap justify-content-between">
                                        <h5>Personal Information</h5>
                                       <!-- <a href="#" data-toggle="modal" data-target="#edit-personal-info"><i
                                                class="fa fa-pencil"></i> Edit Info</a> -->
                                    </div>
                                    
                                    <!--{{-- <div class="inner-block">-->
                                    <!--    <h6>Your Gender</h6>-->
                                    <!--    <div class="custom-control custom-radio custom-control-inline">-->
                                    <!--        <input type="radio" id="Male" name="gender"-->
                                    <!--            class="custom-control-input">-->
                                    <!--        <label class="custom-control-label" for="Male">Male</label>-->
                                    <!--    </div>-->
                                    <!--    <div class="custom-control custom-radio custom-control-inline">-->
                                    <!--        <input type="radio" id="Female" name="gender"-->
                                    <!--            class="custom-control-input">-->
                                    <!--        <label class="custom-control-label" for="Female">Female</label>-->
                                    <!--    </div>-->
                                    <!--</div> --}}-->
                                    <div class="inner-block">
                                        <h6>UserId</h6>
                                        <p>{{Auth::user()->id}}</p>
                                    </div>
                                    <div class="inner-block">
                                        <h6>Email Address</h6>
                                        <p>{{Auth::user()->email}}</p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-addresses">
                                <div class="information-block">
                                    <div
                                        class="information-block-title d-flex flex-wrap justify-content-between">
                                        <h5>Manage Addresses</h5>
                                    </div>
                                    <div class="address-block">
                                        <a href="#" class="btn add-address" data-toggle="modal"
                                            data-target="#edit-address"><i class="fa fa-plus"></i> Add New
                                            Address</a>
                                    </div>
								 								
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section end -->

 <div class="modal fade" tabindex="-1" id="registration-successful" data-backdrop="static" data-keyboard="false">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title text-center text-{{Session::get('class') == "success"?'success':'danger'}}">{{Session::get('message')}}</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body text-center">
                     
                
                    <div class="success-send text-center">
                        <img src="{{asset('sunny/images/icons/recharge-success.svg')}}" height="50" width="50" />
                        <br>
                        <br>
                    </div>


                    <div class="success-send text-center">
                        <!--<p><strong>Name: </strong> {{Session::get('first_name')}} {{Session::get('last_name')}}</p> -->
                        <!--<p><strong>email: </strong> {{Session::get('email')}}</p>                   -->
                        
                        <!--<br>-->
                        <br>
                        <p>Thankyou for using with us.</p>
                    </div>

                </div>


            </div>

        </div>         


    </div>
 @endsection
