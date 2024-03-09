<!DOCTYPE html>
<html>
	<head>
		<x-head></x-head>
	</head>
	<body class="login-page">
        <x-auth_header></x-auth_header>
        <div
        class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">

        <div class="signup">
            <div class=" bg-white box-shadow border-radius-10">
                <div class="wizard-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <section class="vh-100" style="background-color: #eee;">
                            <div class="container h-100">
                              <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-lg-12 col-xl-11">
                                  <div class="card text-black" style="border-radius: 25px;">
                                    <div class="card-body p-md-5">
                                      <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                            <!-- Step 2 -->
                                            <section>
                                                <div class="form-group row align-items-center">
                                                    <label class="col-sm-4 col-form-label">UserName*</label>
                                                    <div class="col-sm-8">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid
                                                        @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-wrap max-width-600 mx-auto">
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-4 col-form-label">First Name (EN)*</label>
                                                        <div class="col-sm-8">
                                                            <input id="first_name_eng" type="text" class="form-control @error('first_name_eng') is-invalid
                                                            @enderror" name="first_name_eng" value="{{ old('first_name_eng') }}" required autocomplete="first_name_eng" autofocus>

                                                            @error('first_name_eng')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-4 col-form-label">Father Name (EN)*</label>
                                                        <div class="col-sm-8">
                                                            <input id="father_name_eng" type="text" class="form-control @error('father_name_eng') is-invalid
                                                            @enderror" name="father_name_eng" value="{{ old('father_name_eng') }}" required autocomplete="father name eng" autofocus>

                                                            @error('father_name_eng')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-4 col-form-label">Last Name (EN)*</label>
                                                        <div class="col-sm-8">
                                                            <input id="last_name_eng" type="text" class="form-control @error('last_name_eng') is-invalid
                                                            @enderror" name="last_name_eng" value="{{ old('last_name_eng') }}" required autocomplete="last_name_eng" autofocus>

                                                            @error('last_name_eng')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-4 col-form-label">Gender*</label>
                                                        <div class="col-sm-8">
                                                            <div class="custom-control custom-radio custom-control-inline pb-0">
                                                                <input type="radio"id="male" value="male" name="gender"class="custom-control-input"/>
                                                                <label class="custom-control-label" for="male">Male</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline pb-0">
                                                                <input type="radio" id="female" value="female" name="gender" class="custom-control-input"/>
                                                                <label class="custom-control-label" for="female">Female</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-4 col-form-label">Mobile Phone*</label>
                                                        <div class="col-sm-8">
                                                            <input id="mbl" type="text" class="form-control @error('mbl') is-invalid
                                                            @enderror" name="mbl" value="{{ old('mbl') }}" required autocomplete="mbl" autofocus>

                                                            @error('mbl')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-4 col-form-label">Personal Email*</label>
                                                        <div class="col-sm-8">
                                                            <input id="personal_email" type="text" class="form-control @error('personal_email') is-invalid
                                                            @enderror" name="personal_email" value="{{ old('personal_email') }}" required autocomplete="personal_email" autofocus>

                                                            @error('personal_email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-4 col-form-label">SID*</label>
                                                        <div class="col-sm-8">
                                                            <input id="sid" type="text" class="form-control @error('sid') is-invalid
                                                            @enderror" name="sid" value="{{ old('sid') }}" required autocomplete="sid" autofocus>

                                                            @error('sid')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-4 col-form-label">Group*</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control selectpicker @error('sid') is-invalid
                                                            @enderror" title="Select Card Type" name="group" required>
                                                                @foreach ($groups as $group)
                                                                <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('group')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                            </section>


                                          <section>
                                            <div class="form-wrap max-width-600 mx-auto">

                                                <div class="form-group row align-items-center">
                                                    <label class="col-sm-4 col-form-label">Password*</label>
                                                    <div class="col-sm-8">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row align-items-center">
                                                    <label class="col-sm-4 col-form-label"
                                                        >Confirm Password*</label
                                                    >
                                                    <div class="col-sm-8">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>


                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>


                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </section>


                    </form>
                </div>
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

	</body>
    <x-footer></x-footer>
</html>

