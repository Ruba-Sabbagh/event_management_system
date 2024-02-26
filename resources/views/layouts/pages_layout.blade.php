
<!DOCTYPE html>
<html>
	<head>
		<x-phead></x-phead>

	</head>
	<body>
		<x-loader></x-loader>

		<x-header></x-header>

        <x-setings-sidebar></x-setings-sidebar>

        <x-main-sidebar></x-main-sidebar>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="/dashboard">{{ __('svu.dashboard') }}</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											@yield('pageTitle')

										</li>
									</ol>
								</nav>
							</div>

						</div>
					</div>
					<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                        @yield('content')
                    </div>
				</div>

				<x-footer></x-footer>
			</div>
		</div>
		<!-- js -->
		<script src="/back/vendors/scripts/core.js"></script>
		<script src="/back/vendors/scripts/script.min.js"></script>
		<script src="/back/vendors/scripts/process.js"></script>
		<script src="/back/vendors/scripts/layout-settings.js"></script>
		@stack('scripts')

	</body>
</html>
