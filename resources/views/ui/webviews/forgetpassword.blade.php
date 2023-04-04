@extends('ui.layout.main_ui')
@section('content')

	<style>
	.user-login-main {
		background-color: #fff;
		box-shadow: 0 4px 9px rgb(0 0 0 / 14%);
		padding: 30px 30px;
	}
	.container i { 
		cursor: pointer;
	}
	.far.fa-eye {
    	position: absolute;
    	top: 43px;
    	right: 10px;
    }
    .form-group {
    	margin-bottom: 1rem;
    	position: relative;
    }
</style>
<main class="main mb-2">
<div class="page-header ">
				 
			</div>
<div class="block-space block-space--layout--after-header"></div>
<div class="block" style="margin:30px;">
	<div class="container container--max--lg">
	    @if(session('mymsg') != null)
			<div class="alert alert-success alert-dismissable" style="margin-top: 20px;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{session('mymsg')}}
			</div>
		@endif
	    <div class="row justify-content-center">  
			<div class="col-md-6 d-flex mt-4 mt-md-0"> 
				<div class="card flex-grow-1 mb-0 ml-0 ml-lg-3 mr-0 mr-lg-4" style="background:gray;">
					<div class="card-body card-body--padding--2">
						<h3 class="card-title" style="color:white;">Forgot Password</h3>
                        <form action="{{url('submit')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                          {{csrf_field()}} 
                         @if($forms!=null)
                          <input type="hidden" name="email" value="<?php echo($forms->email);?>"> 
                          @else
                          
                           <input type="hidden" name="email" value=""> 
                          @endif
							@if(session('mymsg23') != null)
 <div class="alert alert-success alertsuss alert-dismissible" id="skms">
	  {{session('mymsg23')}}
</div>
			@endif
                          <div class="form-group">
                              <label>	New Password:</label>
                              <input type="password" id="myInput1" class="form-control"  placeholder="Enter new Password" name="password" required>
                              <i class="far fa-eye" onclick="myFunction1()"></i>
                          </div>
                          <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" class="form-control"  placeholder="Enter Confirm Password" name="password_confirmation" required>
                          </div> <br>
                          <div class="box-footer">
                              <button type="submit" class="btn btn-md btn-primary">Update</button>
                          </div>
                        </form> 
</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
</main>
<script>
	function myFunction1() {
		var x = document.getElementById("myInput1");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>
@stop 

  