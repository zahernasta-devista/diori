@extends('layouts.vertical-menu.master')
@section('css')
	<link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
@endsection
@section('content')
	<!-- BACKGROUND-IMAGE -->
	<div >
		<!-- PAGE -->
		<div class="page">
			<div class="">
				<!-- CONTAINER OPEN -->
				<div class="container-login100">
					<div class="wrap-login100 p-6">
						<form class="login100-form validate-form" action="{{ route('add-customers') }}" method="POST">
							@csrf
							<span class="login100-form-title">
									Add New Customer
								</span>
							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="input100" type="text" name="name" placeholder="User name">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
										<i class="mdi mdi-account" aria-hidden="true"></i>
									</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="input100" type="text" name="email" placeholder="Email">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
							</div>
							<div class="container-login100-form-btn">
								<button  class="login100-form-btn btn-primary">
									{{ __('Add Customer') }}
								</button>
							</div>
						</form>
					</div>
				</div>
				<!-- CONTAINER CLOSED -->
			</div>
		</div>
		<!-- END PAGE -->

	</div>
	<!-- BACKGROUND-IMAGE CLOSED -->
@endsection
@section('js')
@endsection
