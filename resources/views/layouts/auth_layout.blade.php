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

					<div class="col-md-6 col-lg-5" style="display: contents">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">{{__('svu.login') }}</h2>
							</div>
                            <div class="mt-2">
                                @include('layouts.partials.messagesf')
                            </div>
							<form action="{{route('login.store')}}" method="POST">
								@csrf

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
                                    @if ($errors->has('email'))
                                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
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
                                    @if ($errors->has('password'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
								</div>
								<div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input
												type="checkbox"

                                                name="remember" @if(isset($_COOKIE['email'])) checked="" @endif
											/>
											<label class="" for="customCheck1"
												>{{ __('svu.remember_me')}}</label
											>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">


										<input class="btn btn-primary btn-lg btn-block" type="submit" value="{{__('svu.login') }}">

											<!--<a
												class="btn btn-primary btn-lg btn-block"
												href="index.html"
												>Sign In</a
											>-->
										</div>
										<div class="" >
                                            @if(Route::has('password.request'))
                                            <div class="forgot-password">
                                                <a href="{{route('password.request')}}">{{ __('svu.forgot_password')}}</a>
                                            </div>
                                            @endif
                                            <!--@if(Route::has('username.request'))
                                            <div class="forgot-password" style="padding: 12px;">
                                                <a href="{{route('username.request')}}">{{ __('svu.forgot_username')}}</a>
                                            </div>-->
                                            @endif
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
