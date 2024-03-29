@extends('layouts.vertical-menu.master')
@section('css')
	<link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
@endsection
@section('page-header')
	<!-- PAGE-HEADER -->
	<div>
		<h1 class="page-title">Add Employees</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Employee's List</a></li>
			<li class="breadcrumb-item active text-orange" aria-current="page">Add Employees</li>
		</ol>
	</div>
	<!-- PAGE-HEADER END -->
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<div >
		<!-- PAGE -->
		<div class="page">
			<div class="">
				<!-- CONTAINER OPEN -->
				<div class="container-login100">
					<div class="wrap-login100 p-6">
						<form class="login100-form validate-form" action="{{ route('add-user') }}" method="POST">
							@csrf
							<span class="login100-form-title">
									Add New Employee
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
							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="input100" type="text" name="position" placeholder="Position">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
										<i class="mdi mdi-account" aria-hidden="true"></i>
									</span>
							</div>
							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="password" placeholder="Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
							</div>

							<div class="container-login100-form-btn">
								
								<button  class="login100-form-btn btn-purple-gradient">
									{{ __('Add Employee') }}
								</button>
								<p class="text-muted text-sm"><small>The Password Format:[A-Z],[a-z],[0-9] and [#?!@$%^&*-]</small></p>
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
