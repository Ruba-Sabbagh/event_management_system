<!DOCTYPE html>
<html>
	<head>
		<x-head></x-head>
	</head>
	<body class="login-page">
        <x-auth_header></x-auth_header>
		<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="/back/vendors/images/login-page-img.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">{{__('svu.login') }}</h2>
							</div>
							<form action="{{route('login')}}" method="POST">
								@csrf
								@if(Session::get('fail'))
								<div class="alert alert-danger">
									{{Session::get('fail')}}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								@endif

								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Email"
										name="email" value="{{old('email')}}"
									/>

									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
									@error('email')
										<div class="d-block text-danger" style="margin-top:-25px; margin-bottom:15px;">
										{{$message}}
										</div>
									@enderror
								</div>
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="**********"
                                        required autocomplete="current-password"
										name="password"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
									@error('password')
										<div class="d-block text-danger" style="margin-top:-25px; margin-bottom:15px;">
										{{$message}}
										</div>
									@enderror
								</div>
								<div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input
												type="checkbox"
												class="custom-control-input"
                                                name="remember" value="1"
											/>
											<label class="custom-control-label" for="customCheck1"
												>{{ __('svu.remember_me')}}</label
											>
										</div>
									</div>
									<div class="col-6">
                                        @if(Route::has('password.request'))
										<div class="forgot-password">
											<a href="{{route('password.request')}}">{{ __('svu.forgot_password')}}</a>
										</div>
                                        @endif
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">


										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">

											<!--<a
												class="btn btn-primary btn-lg btn-block"
												href="index.html"
												>Sign In</a
											>-->
										</div>
										<div
											class="font-16 weight-600 pt-10 pb-10 text-center"
											data-color="#707373"
										>
											OR
										</div>
										<div class="input-group mb-0">
											<a
												class="btn btn-outline-primary btn-lg btn-block"
												href="{{route('register')}}"
												>Register To Create Account</a
											>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- welcome modal end -->
		<!-- js -->
		<script src="/back/vendors/scripts/core.js"></script>
		<script src="/back/vendors/scripts/script.min.js"></script>
		<script src="/back/vendors/scripts/process.js"></script>
		<script src="/back/vendors/scripts/layout-settings.js"></script>
		@stack('scripts')
        <x-footer></x-footer>
	</body>
</html>
