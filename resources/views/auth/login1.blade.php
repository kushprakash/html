@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--<div class="card-header">{{ __('Login') }}</div>-->

                <div class="card-body">
                   
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
 @if(session('mymsg23') != null)
 <div class="alert alert-success alertsuss alert-dismissible"  id="skms">
	  <a href="#" class="close" onclick="skm()" data-dismiss="alert" aria-label="close">&times;</a>
	 {{session('mymsg23')}}
</div>
			@endif
			
		
                      
                        
                       <!--   <div class="form-group row">-->
                       <!--     <div class="col-md-3 "></div>-->
                       <!--     <div class="col-md-6 ">-->
                       <!--     <label for="password" class="">{{ __('E-Mail Address') }}</label><br>-->

                          
                       <!--         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>-->

                       <!--         @error('email')-->
                       <!--             <span class="invalid-feedback" role="alert">-->
                       <!--                 <strong>{{ $message }}</strong>-->
                       <!--             </span>-->
                       <!--         @enderror-->
                       <!--    </div> -->
                       <!-- </div> -->
                        

                       <!--<div class="form-group row">-->
                       <!--     <div class="col-md-3 "></div>-->
                       <!--     <div class="col-md-6 ">-->
                       <!--     <label for="password" class="">{{ __('Password') }}</label><br>-->

                          
                       <!--         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">-->

                       <!--         @error('password')-->
                       <!--             <span class="invalid-feedback" role="alert">-->
                       <!--                 <strong>{{ $message }}</strong>-->
                       <!--             </span>-->
                       <!--         @enderror-->
                       <!--    </div> -->
                       <!-- </div> -->

                        <div class="form-group row">
                            <div class="col-md-3 "></div>
                            <div class="col-md-6 ">
                               
                                     <center>
                                         
         <!--                                <button type="submit" class="btn btn-primary" style="width:100%;">-->
         <!--                           {{ __('Login') }}-->
         <!--                       </button>-->
         <!--                           <a href="{{url('reset')}}">-->
         <!--                           <label class="form-check-label" for="remember">-->
         <!--                           Create New Password-->
         <!--                           </label>-->
									<!--</a>-->
         <!--                            </center>  -->
                                     
                                     <br>
                                     
                                      <center>
                                          <img src="{{asset('images.png')}}" style="height:50px;width:50px;margin-bottom:20px">
                                          
                                          <a href="{{ url('google/login') }}" style="width:100%;" class="btn btn-danger">Google login</a></center>
                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              

                             <!--   @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
