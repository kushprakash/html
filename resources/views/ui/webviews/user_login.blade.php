@extends('ui.layout.main_ui1')
@section('content')
<main class="main">
			<div class="page-header">
				<div class="container d-flex flex-column align-items-center">
					<nav aria-label="breadcrumb" class="breadcrumb-nav">
						<div class="container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Shop</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									My Account
								</li>
							</ol>
						</div>
					</nav>

					<h1>My Account</h1>
				</div>
			</div>

			<div class="container login-container">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="row">
							<div class="col-md-6">
								<div class="heading mb-1">
									<h2 class="title">Login</h2>
								</div>

								<form action="{{ route('login') }}" method="POST">
													    {{ csrf_field() }}	

									<label for="login-email">
										Username or email address
										<span class="required">*</span>
									</label>
									<input type="email" class="form-input form-wide" id="login-email"  name="email" autocomplete="off" required />

									<label for="login-password">
										Password
										<span class="required">*</span>
									</label>
									<input type="password" class="form-input form-wide" id="login-password" name="password" autocomplete="off" required />

									<div class="form-footer">
										<div class="custom-control custom-checkbox mb-0">
											<input type="checkbox" class="custom-control-input" id="lost-password" />
											<label class="custom-control-label mb-0" for="lost-password">Remember
												me</label>
										</div>

										<a href="forgot-password.html"
											class="forget-password text-dark form-footer-right">Forgot
											Password?</a>
									</div>
									<button type="submit" class="btn btn-dark btn-md w-100"    onclick="this.form.submit()">
										LOGIN
									</button>
								</form>
							</div>
							<div class="col-md-6">
								<div class="heading mb-1">
									<h2 class="title">Register</h2>
								</div>

								<form method="POST" action="{{ route('register') }}">

								<label for="register-email">
										Name
										<span class="required">*</span>
									</label>

									
									<input type="text" class="form-input form-wide" id="register-name " name="name"  required />

									<label for="register-email">
										Email address
										<span class="required">*</span>
									</label>

									
									<input type="email" class="form-input form-wide" id="register-email"   type="email" required />

									<label for="register-password">
										Password
										<span class="required">*</span>
									</label>
									<input   class="form-input form-wide" id="register-password"  placeholder="Password will be 8 character. *" type="password" minlength="8" 
										required />

									<div class="form-footer mb-2">
										<button   type="submit" onclick="this.form.submit()" class="btn btn-dark btn-md w-100 mr-0">
											Register
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>


        @endsection